/* ==========================================================================
   IdleMach — Shared frontend form validation

   This is the only common frontend validation engine used by IdleMach. Load it
   once from a shared layout before any page-specific JavaScript. Individual
   pages must not define their own validation functions.

   Rules are declared with the exact `data-validation` token list (pipe
   separated), or inferred from the existing HTML attributes already used in
   the Blade forms (required, type="email", minlength, maxlength, min, max,
   accept, data-filesize, and so on).

   Browser validation is a usability aid only. Laravel must independently
   validate every submitted value on the server.
   ========================================================================== */
(function () {
    "use strict";

    /* Guard against accidental double inclusion. */
    if (window.IdleMachFormValidation) {
        return;
    }

    var VALID_EVENT = "idleform:valid";
    var INVALID_EVENT = "idleform:invalid";

    /* Exact rule names only. Never use substring matching on these tokens. */
    var RULES = {
        required: true,
        email: true,
        strongPassword: true,
        min: true,
        max: true,
        confirmPassword: true,
        terms: true,
        alpha: true,
        numeric: true,
        file: true,
        filesize: true,
        "min-items": true,
        "max-items": true,
    };

    var MESSAGES = {
        required: "Complete this required field.",
        email: "Enter a valid email address.",
        strongPassword:
            "Use at least 8 characters with an uppercase letter, a lowercase letter, a number and a special character.",
        min: "Enter at least {value}.",
        max: "Use no more than {value}.",
        confirmPassword: "The passwords do not match.",
        terms: "You must accept the terms to continue.",
        alpha: "Use letters and spaces only.",
        numeric: "Use numbers only.",
        file: "Select a file of an allowed type.",
        filesize: "Each file must be {value} KB or smaller.",
        "min-items": "Select at least {value} {itemLabel}.",
        "max-items": "Select no more than {value} {itemLabel}.",
        native: "Enter a valid value.",
    };

    /* WeakMaps keep all internal state out of global scope and off the DOM. */
    var originalDescribedBy = new WeakMap();
    /* State is keyed by stable DOM elements, not by unit objects, because the
       unit list is rebuilt on every validation pass. */
    var errorOwners = new WeakMap();
    var errorAnchors = new WeakMap();
    var controlOwners = new WeakMap();
    var touchedControls = new WeakSet();
    var managedForms = new WeakSet();

    function toArray(collection) {
        return Array.prototype.slice.call(collection || []);
    }

    function trimString(value) {
        return String(
            value === null || value === undefined ? "" : value,
        ).trim();
    }

    function parseRuleList(value) {
        if (!value) {
            return [];
        }

        return String(value)
            .split("|")
            .map(function (rule) {
                return rule.trim();
            })
            .filter(function (rule) {
                return Object.prototype.hasOwnProperty.call(RULES, rule);
            });
    }

    function addRule(rules, rule) {
        if (rules.indexOf(rule) === -1) {
            rules.push(rule);
        }
    }

    function isDisabled(control) {
        if (!control) {
            return true;
        }

        if (control.disabled) {
            return true;
        }

        var fieldset = control.closest("fieldset");
        return Boolean(fieldset && fieldset.disabled);
    }

    function isHiddenControl(control) {
        return (
            !control ||
            control.type === "hidden" ||
            control.type === "submit" ||
            control.type === "button" ||
            control.type === "reset" ||
            Boolean(control.closest("[hidden]"))
        );
    }

    function isCheckable(control) {
        return (
            control && (control.type === "checkbox" || control.type === "radio")
        );
    }

    function isFileInput(control) {
        return Boolean(control && control.type === "file");
    }

    /* Infer rules from the HTML conventions already used across the project. */
    function inferRules(control) {
        var rules = parseRuleList(control.getAttribute("data-validation"));

        if (
            control.required ||
            control.getAttribute("aria-required") === "true"
        ) {
            addRule(rules, "required");
        }

        if (control.type === "email") {
            addRule(rules, "email");
        }

        if (isFileInput(control)) {
            addRule(rules, "file");
        }

        if (
            typeof control.minLength === "number" &&
            control.minLength > 0 &&
            !isFileInput(control)
        ) {
            addRule(rules, "min");
        }

        if (
            typeof control.maxLength === "number" &&
            control.maxLength > 0 &&
            !isFileInput(control)
        ) {
            addRule(rules, "max");
        }

        if (control.hasAttribute("min") || control.hasAttribute("data-min")) {
            addRule(rules, "min");
        }

        if (control.hasAttribute("max") || control.hasAttribute("data-max")) {
            addRule(rules, "max");
        }

        if (
            control.hasAttribute("data-password-confirm") ||
            control.hasAttribute("data-password-id")
        ) {
            addRule(rules, "confirmPassword");
        }

        if (
            control.type === "checkbox" &&
            (control.name === "terms" || control.hasAttribute("data-terms"))
        ) {
            addRule(rules, "terms");
        }

        if (
            control.hasAttribute("data-filetypes") ||
            control.hasAttribute("accept")
        ) {
            if (isFileInput(control)) {
                addRule(rules, "file");
            }
        }

        if (control.hasAttribute("data-filesize")) {
            addRule(rules, "filesize");
        }

        if (control.hasAttribute("data-min-items")) {
            addRule(rules, "min-items");
        }

        if (control.hasAttribute("data-max-items")) {
            addRule(rules, "max-items");
        }

        return rules;
    }

    function getAttributeSource(unit, key) {
        var container = unit.container;
        var control = unit.controls && unit.controls[0];

        if (
            container &&
            container.hasAttribute &&
            container.hasAttribute(key)
        ) {
            return container;
        }

        if (control && control.hasAttribute(key)) {
            return control;
        }

        return control || container;
    }

    function messageFor(unit, keys, fallback, replacements) {
        var sources = [];

        if (unit.container) {
            sources.push(unit.container);
        }

        toArray(unit.controls || []).forEach(function (control) {
            sources.push(control);
        });

        for (var index = 0; index < sources.length; index += 1) {
            for (var keyIndex = 0; keyIndex < keys.length; keyIndex += 1) {
                var source = sources[index];
                if (!source || !source.getAttribute) {
                    continue;
                }

                var message = trimString(
                    source.getAttribute("data-error-" + keys[keyIndex]),
                );
                if (message) {
                    return applyReplacements(message, replacements);
                }
            }
        }

        return applyReplacements(fallback, replacements);
    }

    function applyReplacements(message, replacements) {
        var result = String(message || "");
        var values = replacements || {};

        Object.keys(values).forEach(function (key) {
            result = result.split("{" + key + "}").join(String(values[key]));
        });

        return result;
    }

    function numericDataAttribute(source, name) {
        var element = getAttributeSource(
            { container: source, controls: [] },
            name,
        );
        var raw =
            element && element.getAttribute ? element.getAttribute(name) : null;
        if (raw === null || trimString(raw) === "") {
            return null;
        }

        var value = Number(raw);
        return isFinite(value) ? value : null;
    }

    function isValueRangeControl(control) {
        return (
            control.type === "number" ||
            control.type === "range" ||
            control.type === "date" ||
            control.type === "datetime-local" ||
            control.type === "month" ||
            control.type === "time"
        );
    }

    /* data-min/data-max are preferred so pages can supply a custom threshold
     without changing the native attribute. Native min/max are next, followed
     by minlength/maxlength for text-like controls. */
    function thresholdFor(unit, dataName, nativeName, lengthValue) {
        var control = unit.controls[0];
        var dataValue = control.getAttribute(dataName);

        if (dataValue !== null && trimString(dataValue) !== "") {
            return trimString(dataValue);
        }

        var nativeValue = control.getAttribute(nativeName);
        if (nativeValue !== null && trimString(nativeValue) !== "") {
            return trimString(nativeValue);
        }

        return lengthValue === null || lengthValue === undefined
            ? null
            : String(lengthValue);
    }

    function minimumValue(unit) {
        var control = unit.controls[0];
        var nativeLength =
            typeof control.minLength === "number" && control.minLength > 0
                ? control.minLength
                : null;

        return thresholdFor(unit, "data-min", "min", nativeLength);
    }

    function maximumValue(unit) {
        var control = unit.controls[0];
        var nativeLength =
            typeof control.maxLength === "number" && control.maxLength > 0
                ? control.maxLength
                : null;

        return thresholdFor(unit, "data-max", "max", nativeLength);
    }

    function belowMinimum(control, value, threshold) {
        if (threshold === null) {
            return false;
        }

        if (control.type === "date" || control.type === "datetime-local") {
            return String(value) < threshold;
        }

        if (isValueRangeControl(control)) {
            return Number(value) < Number(threshold);
        }

        return String(value).length < Number(threshold);
    }

    function aboveMaximum(control, value, threshold) {
        if (threshold === null) {
            return false;
        }

        if (control.type === "date" || control.type === "datetime-local") {
            return String(value) > threshold;
        }

        if (isValueRangeControl(control)) {
            return Number(value) > Number(threshold);
        }

        return String(value).length > Number(threshold);
    }

    function isEmptyValue(control) {
        if (isCheckable(control)) {
            return !control.checked;
        }

        if (isFileInput(control)) {
            return !control.files || control.files.length === 0;
        }

        return trimString(control.value) === "";
    }

    function isValidEmail(value) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
    }

    /* Build the Unicode pattern at runtime. Older engines that cannot parse
       \p{...} with the u flag will throw here and use the ASCII fallback. */
    var alphaPattern;
    try {
        alphaPattern = new RegExp("^[\\p{L}\\s]+$", "u");
        if (!alphaPattern.test("ABC")) {
            throw new Error("Unicode property escapes are unavailable.");
        }
    } catch (error) {
        alphaPattern = /^[A-Za-z\s]+$/;
    }

    function findPrimaryPassword(form, confirmField) {
        if (!form || !confirmField) {
            return null;
        }

        var explicitId = trimString(
            confirmField.getAttribute("data-password-id"),
        );
        if (explicitId) {
            var explicit = document.getElementById(explicitId);
            if (explicit && form.contains(explicit)) {
                return explicit;
            }
        }

        var marked = form.querySelector("[data-password-primary]");
        if (marked && marked !== confirmField) {
            return marked;
        }

        var candidates = toArray(form.querySelectorAll("input")).filter(
            function (input) {
                var type = String(input.type || "").toLowerCase();
                return (
                    input !== confirmField &&
                    !isDisabled(input) &&
                    !isHiddenControl(input) &&
                    !input.hasAttribute("data-password-confirm") &&
                    (type === "password" ||
                        type === "text" ||
                        input.hasAttribute("data-password-primary") ||
                        input.hasAttribute("data-password-id"))
                );
            },
        );

        for (var index = 0; index < candidates.length; index += 1) {
            var name = String(candidates[index].name || "").toLowerCase();
            if (name === "password" || name === "new_password") {
                return candidates[index];
            }
        }

        return candidates[0] || null;
    }

    function acceptedFileTokens(control) {
        var raw =
            control.getAttribute("data-filetypes") ||
            control.getAttribute("accept") ||
            "";
        var separators = /[\s,]+/;

        return trimString(raw)
            .split(separators)
            .map(function (token) {
                return token.trim().toLowerCase();
            })
            .filter(Boolean);
    }

    function matchesAcceptedType(file, token) {
        var name = String(file.name || "").toLowerCase();

        if (token.charAt(0) === ".") {
            return name.slice(-token.length) === token;
        }

        if (token.slice(-2) === "/*") {
            var prefix = token.slice(0, -1);
            return (
                String(file.type || "")
                    .toLowerCase()
                    .indexOf(prefix) === 0
            );
        }

        if (token.indexOf("/") !== -1) {
            return String(file.type || "").toLowerCase() === token;
        }

        return name.slice(-(token.length + 1)) === "." + token;
    }

    function validateFileRule(unit, rules) {
        var control = unit.controls[0];
        var files = toArray(control.files || []);
        var tokens = acceptedFileTokens(control);
        var maxKb = numericDataAttribute(control, "data-filesize");

        if (rules.indexOf("file") !== -1 && tokens.length && files.length) {
            for (var index = 0; index < files.length; index += 1) {
                var allowed = tokens.some(function (token) {
                    return matchesAcceptedType(files[index], token);
                });

                if (!allowed) {
                    return messageFor(
                        unit,
                        ["file", "filetypes", "invalid"],
                        MESSAGES.file,
                    );
                }
            }
        }

        if (
            rules.indexOf("filesize") !== -1 &&
            maxKb !== null &&
            files.length
        ) {
            for (var sizeIndex = 0; sizeIndex < files.length; sizeIndex += 1) {
                if (files[sizeIndex].size > maxKb * 1024) {
                    return messageFor(
                        unit,
                        ["filesize", "file", "invalid"],
                        MESSAGES.filesize,
                        { value: maxKb },
                    );
                }
            }
        }

        return "";
    }

    /* Native validity is also checked for controls that have no inferred
       custom rule, such as a text input with only a pattern. */
    function nativeValidationMessage(unit, control) {
        if (
            typeof control.checkValidity !== "function" ||
            control.checkValidity()
        ) {
            return "";
        }

        return (
            messageFor(unit, ["invalid"], "") ||
            control.validationMessage ||
            MESSAGES.native
        );
    }

    function hasNativeConstraint(control) {
        if (!control || typeof control.checkValidity !== "function") {
            return false;
        }

        if (control.validity && control.validity.customError) {
            return true;
        }

        var attributes = [
            "pattern",
            "min",
            "max",
            "step",
            "minlength",
            "maxlength",
            "required",
            "accept",
        ];

        for (var index = 0; index < attributes.length; index += 1) {
            if (control.hasAttribute(attributes[index])) {
                return true;
            }
        }

        var type = String(control.type || "").toLowerCase();
        return (
            type === "email" ||
            type === "number" ||
            type === "date" ||
            type === "datetime-local" ||
            type === "month" ||
            type === "time" ||
            type === "week" ||
            type === "url"
        );
    }

    /* Returns an empty string when the unit is valid. */
    function validateUnit(unit) {
        var control = unit.controls[0];
        var rules = unit.rules || [];
        var message = "";

        if (unit.type === "group") {
            var selected = unit.controls.filter(function (item) {
                return item.checked;
            }).length;

            if (
                rules.indexOf("min-items") !== -1 &&
                selected < (unit.minItems || 0)
            ) {
                return messageFor(
                    unit,
                    ["min-items", "minItems", "required", "invalid"],
                    MESSAGES["min-items"],
                    {
                        value: unit.minItems,
                        itemLabel:
                            Number(unit.minItems) === 1 ? "option" : "options",
                    },
                );
            }

            if (
                rules.indexOf("max-items") !== -1 &&
                selected > (unit.maxItems || 0)
            ) {
                return messageFor(
                    unit,
                    ["max-items", "maxItems", "invalid"],
                    MESSAGES["max-items"],
                    {
                        value: unit.maxItems,
                        itemLabel:
                            Number(unit.maxItems) === 1 ? "option" : "options",
                    },
                );
            }

            if (rules.indexOf("required") !== -1 && selected === 0) {
                return messageFor(
                    unit,
                    ["required", "invalid"],
                    MESSAGES.required,
                );
            }

            if (rules.indexOf("terms") !== -1 && selected === 0) {
                return messageFor(
                    unit,
                    ["terms", "required", "invalid"],
                    MESSAGES.terms,
                );
            }

            return "";
        }

        var value = isCheckable(control)
            ? control.checked
                ? "1"
                : ""
            : trimString(control.value);
        var empty = isEmptyValue(control);

        if (rules.indexOf("required") !== -1 && empty) {
            return messageFor(unit, ["required", "invalid"], MESSAGES.required);
        }

        if (rules.indexOf("terms") !== -1 && !control.checked) {
            return messageFor(
                unit,
                ["terms", "required", "invalid"],
                MESSAGES.terms,
            );
        }

        /* Optional empty fields must never fail a format rule, but native
           custom validity can still make an empty value invalid. */
        if (empty) {
            return nativeValidationMessage(unit, control);
        }

        if (isFileInput(control)) {
            message = validateFileRule(unit, rules);
            if (message) {
                return message;
            }
        }

        if (rules.indexOf("email") !== -1 && !isValidEmail(value)) {
            return messageFor(unit, ["email", "invalid"], MESSAGES.email);
        }

        if (rules.indexOf("strongPassword") !== -1) {
            var strong =
                value.length >= 8 &&
                /[a-z]/.test(value) &&
                /[A-Z]/.test(value) &&
                /[0-9]/.test(value) &&
                /[^A-Za-z0-9]/.test(value);

            if (!strong) {
                return messageFor(
                    unit,
                    ["strongPassword", "strong-password", "invalid"],
                    MESSAGES.strongPassword,
                );
            }
        }

        var minimum = minimumValue(unit);
        if (
            rules.indexOf("min") !== -1 &&
            belowMinimum(control, value, minimum)
        ) {
            return messageFor(unit, ["min", "invalid"], MESSAGES.min, {
                value: minimum,
            });
        }

        var maximum = maximumValue(unit);
        if (
            rules.indexOf("max") !== -1 &&
            aboveMaximum(control, value, maximum)
        ) {
            return messageFor(unit, ["max", "invalid"], MESSAGES.max, {
                value: maximum,
            });
        }

        if (rules.indexOf("alpha") !== -1 && !alphaPattern.test(value)) {
            return messageFor(unit, ["alpha", "invalid"], MESSAGES.alpha);
        }

        if (rules.indexOf("numeric") !== -1 && !/^\d+$/.test(value)) {
            return messageFor(unit, ["numeric", "invalid"], MESSAGES.numeric);
        }

        if (rules.indexOf("confirmPassword") !== -1) {
            var primary = findPrimaryPassword(control.form, control);
            if (!primary || control.value !== primary.value) {
                return messageFor(
                    unit,
                    [
                        "confirmPassword",
                        "confirm-password",
                        "mismatch",
                        "invalid",
                    ],
                    MESSAGES.confirmPassword,
                );
            }
        }

        /* Honour native constraints (pattern, number range, custom validity). */
        return nativeValidationMessage(unit, control);
    }

    function describedByIds(control) {
        return trimString(control.getAttribute("aria-describedby"))
            .split(/\s+/)
            .filter(Boolean);
    }

    function isErrorElement(element) {
        return Boolean(
            element &&
            (element.classList.contains("invalid-feedback") ||
                element.classList.contains("auth-field-error") ||
                /(-|_)(error)$/i.test(element.id || "") ||
                /(error)(-|_)$/i.test(element.id || "")),
        );
    }

    function errorAnchor(unit) {
        return unit.container || (unit.controls && unit.controls[0]) || null;
    }

    function findErrorElement(unit) {
        var errorTargetSource = getAttributeSource(unit, "data-error-target");
        var explicitTarget = trimString(
            errorTargetSource && errorTargetSource.getAttribute
                ? errorTargetSource.getAttribute("data-error-target")
                : "",
        );

        if (explicitTarget) {
            var explicit = document.getElementById(explicitTarget);
            if (explicit) {
                return explicit;
            }
        }

        var container = unit.container;
        if (container) {
            var contained = toArray(
                container.querySelectorAll(
                    ".invalid-feedback, .auth-field-error",
                ),
            ).filter(function (element) {
                return !errorAnchors.has(element);
            });

            if (contained.length) {
                return contained[0];
            }
        }

        var control = unit.controls[0];
        var ids = describedByIds(control);

        for (var index = 0; index < ids.length; index += 1) {
            var candidate = document.getElementById(ids[index]);
            if (
                candidate &&
                isErrorElement(candidate) &&
                !errorAnchors.has(candidate)
            ) {
                return candidate;
            }
        }

        if (control.id) {
            var bySuffix = [
                document.getElementById(control.id + "-error"),
                document.getElementById(control.id + "Error"),
            ];

            for (
                var suffixIndex = 0;
                suffixIndex < bySuffix.length;
                suffixIndex += 1
            ) {
                if (
                    bySuffix[suffixIndex] &&
                    !errorAnchors.has(bySuffix[suffixIndex])
                ) {
                    return bySuffix[suffixIndex];
                }
            }
        }

        var anchor = container || control;
        var generated = document.createElement("div");
        generated.className = "invalid-feedback";
        generated.setAttribute("data-validation-generated", "");

        var baseId = control.id || control.name || "field";
        var generatedId = baseId + "-error";
        var counter = 1;
        while (document.getElementById(generatedId)) {
            generatedId = baseId + "-error-" + counter;
            counter += 1;
        }
        generated.id = generatedId;

        if (anchor.parentNode) {
            anchor.parentNode.insertBefore(generated, anchor.nextSibling);
        }

        return generated;
    }

    function getErrorElement(unit) {
        var anchor = errorAnchor(unit);
        var existing = anchor ? errorOwners.get(anchor) : null;
        if (existing && document.contains(existing)) {
            return existing;
        }

        var element = findErrorElement(unit);
        if (element && anchor) {
            errorOwners.set(anchor, element);
            errorAnchors.set(element, anchor);
            toArray(unit.controls || []).forEach(function (control) {
                controlOwners.set(control, anchor);
            });
        }

        return element || null;
    }

    function rememberDescribedBy(control) {
        if (!originalDescribedBy.has(control)) {
            originalDescribedBy.set(
                control,
                control.getAttribute("aria-describedby") || "",
            );
        }
    }

    function addDescribedBy(control, errorElement) {
        rememberDescribedBy(control);

        if (!errorElement || !errorElement.id) {
            return;
        }

        var ids = describedByIds(control);
        if (ids.indexOf(errorElement.id) !== -1) {
            return;
        }

        ids.push(errorElement.id);
        control.setAttribute("aria-describedby", ids.join(" "));
    }

    function restoreDescribedBy(control) {
        if (!originalDescribedBy.has(control)) {
            return;
        }

        var original = originalDescribedBy.get(control);
        if (original) {
            control.setAttribute("aria-describedby", original);
        } else {
            control.removeAttribute("aria-describedby");
        }
    }

    function showError(errorElement, message) {
        if (!errorElement) {
            return;
        }

        errorElement.textContent = message || MESSAGES.native;
        errorElement.hidden = false;
        errorElement.classList.add("d-block");
    }

    function hideError(errorElement) {
        if (!errorElement) {
            return;
        }

        errorElement.textContent = "";
        errorElement.hidden = true;
        errorElement.classList.remove("d-block");
    }

    function applyUnitState(unit, message) {
        var valid = !message;
        var errorElement = valid
            ? errorOwners.get(errorAnchor(unit)) || null
            : getErrorElement(unit);

        unit.controls.forEach(function (control) {
            if (isDisabled(control) || isHiddenControl(control)) {
                return;
            }

            control.classList.toggle("is-invalid", !valid);
            control.classList.toggle("is-valid", valid);

            if (valid) {
                control.setAttribute("aria-invalid", "false");
                restoreDescribedBy(control);
            } else {
                control.setAttribute("aria-invalid", "true");
                addDescribedBy(control, errorElement);
            }
        });

        if (unit.container && unit.container.tagName === "FIELDSET") {
            unit.container.classList.toggle("is-invalid", !valid);

            if (valid) {
                unit.container.setAttribute("aria-invalid", "false");
                restoreDescribedBy(unit.container);
            } else {
                unit.container.setAttribute("aria-invalid", "true");
                addDescribedBy(unit.container, errorElement);
            }
        }

        if (valid) {
            hideError(errorElement);
        } else {
            showError(errorElement, message);
        }

        return valid;
    }

    function buildUnits(form) {
        var units = [];
        var grouped = [];
        var controls = toArray(
            form.querySelectorAll("input, select, textarea"),
        ).filter(function (control) {
            return !isHiddenControl(control);
        });

        var groupContainers = toArray(
            form.querySelectorAll(
                "[data-checkbox-group], [data-min-items], [data-max-items]",
            ),
        );

        groupContainers.forEach(function (container) {
            var checkboxes = toArray(
                container.querySelectorAll('input[type="checkbox"]'),
            ).filter(function (control) {
                return !isDisabled(control);
            });

            if (!checkboxes.length) {
                return;
            }

            checkboxes.forEach(function (checkbox) {
                grouped.push(checkbox);
            });

            var containerRules = parseRuleList(
                container.getAttribute("data-validation"),
            );
            var minItems = numericDataAttribute(container, "data-min-items");
            var maxItems = numericDataAttribute(container, "data-max-items");

            if (minItems !== null) {
                addRule(containerRules, "min-items");
            }
            if (maxItems !== null) {
                addRule(containerRules, "max-items");
            }

            checkboxes.forEach(function (checkbox) {
                inferRules(checkbox).forEach(function (rule) {
                    addRule(containerRules, rule);
                });
            });

            units.push({
                type: "group",
                kind: "checkboxes",
                controls: checkboxes,
                container: container,
                rules: containerRules,
                minItems: minItems,
                maxItems: maxItems,
            });
        });

        var radiosByName = {};
        controls.forEach(function (control) {
            if (
                control.type !== "radio" ||
                !control.name ||
                isDisabled(control)
            ) {
                return;
            }

            if (!radiosByName[control.name]) {
                radiosByName[control.name] = [];
            }
            radiosByName[control.name].push(control);
        });

        Object.keys(radiosByName).forEach(function (name) {
            var radios = radiosByName[name];
            if (radios.length < 2) {
                return;
            }

            var radioRules = [];
            radios.forEach(function (radio) {
                grouped.push(radio);
                inferRules(radio).forEach(function (rule) {
                    addRule(radioRules, rule);
                });
            });

            units.push({
                type: "group",
                kind: "radios",
                controls: radios,
                container:
                    radios[0].closest("fieldset") || radios[0].parentNode,
                rules: radioRules,
            });
        });

        controls.forEach(function (control) {
            if (isDisabled(control) || grouped.indexOf(control) !== -1) {
                return;
            }

            var rules = inferRules(control);
            var nativeOnly = false;
            if (!rules.length) {
                if (!hasNativeConstraint(control)) {
                    return;
                }
                nativeOnly = true;
            }

            units.push({
                type: "field",
                controls: [control],
                container: null,
                rules: rules,
                nativeOnly: nativeOnly,
            });
        });

        return units;
    }

    function focusUnit(unit) {
        for (var index = 0; index < unit.controls.length; index += 1) {
            var control = unit.controls[index];
            if (!isDisabled(control) && !isHiddenControl(control)) {
                try {
                    control.focus({ preventScroll: true });
                } catch (error) {
                    control.focus();
                }
                return;
            }
        }
    }

    function validateForm(form, options) {
        if (!form || form.tagName !== "FORM") {
            return true;
        }

        var settings = options || {};
        var units = buildUnits(form);
        var firstInvalid = null;
        var hasRules = units.length > 0;

        if (settings.touch !== false && hasRules) {
            form.classList.add("was-validated");
        }

        units.forEach(function (unit) {
            var message = validateUnit(unit);
            var valid = applyUnitState(unit, message);

            if (!valid && !firstInvalid) {
                firstInvalid = unit;
            }

            if (settings.touch) {
                unit.controls.forEach(function (control) {
                    touchedControls.add(control);
                });
            }
        });

        if (firstInvalid && settings.focus !== false) {
            focusUnit(firstInvalid);
        }

        return !firstInvalid;
    }

    function findUnitForControl(form, control) {
        var units = buildUnits(form);

        for (var index = 0; index < units.length; index += 1) {
            if (units[index].controls.indexOf(control) !== -1) {
                return units[index];
            }
        }

        return null;
    }

    function validateControl(control, options) {
        if (!control || !control.form) {
            return true;
        }

        var unit = findUnitForControl(control.form, control);
        if (!unit) {
            return true;
        }

        var settings = options || {};
        var valid = applyUnitState(unit, validateUnit(unit));

        if (settings.touch) {
            touchedControls.add(control);
        }

        return valid;
    }

    function isPrimaryPassword(control) {
        if (!control || control.tagName !== "INPUT") {
            return false;
        }

        if (
            control.hasAttribute("data-password-confirm") ||
            isHiddenControl(control) ||
            isDisabled(control)
        ) {
            return false;
        }

        var type = String(control.type || "").toLowerCase();
        var name = String(control.name || "").toLowerCase();

        /* The type can change when a reveal toggle is used, so identity is
           based on markup/name rather than the current rendered type. */
        return (
            control.hasAttribute("data-password-primary") ||
            control.hasAttribute("data-password-id") ||
            type === "password" ||
            (type === "text" && (name === "password" || name === "new_password"))
        );
    }

    function revalidateConfirmations(form, primary) {
        if (!form || !primary) {
            return;
        }

        var confirmations = toArray(
            form.querySelectorAll(
                "[data-password-id], [data-password-confirm]",
            ),
        ).filter(function (control) {
            var explicitId = trimString(
                control.getAttribute("data-password-id"),
            );
            if (explicitId) {
                return explicitId === primary.id;
            }
            return findPrimaryPassword(form, control) === primary;
        });

        confirmations.forEach(function (confirmation) {
            if (
                trimString(confirmation.value) ||
                touchedControls.has(confirmation)
            ) {
                validateControl(confirmation);
            }
        });
    }

    function resetForm(form) {
        if (!form || form.tagName !== "FORM") {
            return;
        }

        form.classList.remove("was-validated");

        buildUnits(form).forEach(function (unit) {
            hideError(errorOwners.get(errorAnchor(unit)) || null);

            unit.controls.forEach(function (control) {
                touchedControls.delete(control);
                control.classList.remove("is-invalid", "is-valid");
                control.removeAttribute("aria-invalid");
                restoreDescribedBy(control);
            });

            if (unit.container && unit.container.tagName === "FIELDSET") {
                unit.container.classList.remove("is-invalid");
                unit.container.removeAttribute("aria-invalid");
                restoreDescribedBy(unit.container);
            }
        });
    }

    /* Used by page-specific UI that hides/disables a group (for example the
     role panels on the registration form). */
    function resetControl(control) {
        if (!control) {
            return;
        }

        var anchor = controlOwners.get(control);
        if (!anchor) {
            control.classList.remove("is-invalid", "is-valid");
            control.removeAttribute("aria-invalid");
            restoreDescribedBy(control);
            return;
        }

        hideError(errorOwners.get(anchor) || null);

        var controls = anchor.matches && anchor.matches("input, select, textarea")
            ? [anchor]
            : toArray(anchor.querySelectorAll("input, select, textarea"));

        controls.forEach(function (item) {
            touchedControls.delete(item);
            item.classList.remove("is-invalid", "is-valid");
            item.removeAttribute("aria-invalid");
            restoreDescribedBy(item);
        });

        if (anchor.tagName === "FIELDSET") {
            anchor.classList.remove("is-invalid");
            anchor.removeAttribute("aria-invalid");
            restoreDescribedBy(anchor);
        }
    }

    function isIgnoredForm(form) {
        return Boolean(
            form &&
            form.getAttribute &&
            form.getAttribute("data-validation-ignore") === "true",
        );
    }

    /* Native browser bubbles would bypass the shared engine on invalid forms.
     Taking ownership of `novalidate` keeps one consistent error UI, while the
     engine still calls checkValidity() internally for native constraints. */
    function manageForm(form) {
        if (
            !form ||
            form.tagName !== "FORM" ||
            isIgnoredForm(form)
        ) {
            return;
        }

        /* Re-check on every call: a control can gain native validation via
           setCustomValidity() after the form was first managed. */
        if (managedForms.has(form)) {
            if (buildUnits(form).length) {
                form.noValidate = true;
            }
            return;
        }

        managedForms.add(form);

        if (buildUnits(form).length) {
            form.noValidate = true;
        }
    }

    function manageFormsIn(root) {
        if (!root) {
            return;
        }

        /* DOMContentLoaded passes the document node (nodeType 9), not an element. */
        if (root.nodeType === 9) {
            root = root.documentElement || root;
        }

        if (root.nodeType === 1) {
            if (root.tagName === "FORM") {
                manageForm(root);
            }

            if (root.querySelectorAll) {
                toArray(root.querySelectorAll("form")).forEach(manageForm);
            }
        }
    }

    function dispatch(form, name) {
        var event;
        if (typeof CustomEvent === "function") {
            event = new CustomEvent(name, {
                bubbles: false,
                detail: { form: form },
            });
        } else {
            event = document.createEvent("CustomEvent");
            event.initCustomEvent(name, false, false, { form: form });
        }
        form.dispatchEvent(event);
    }

    /* One delegated listener per event type, for current and future forms. */
    document.addEventListener(
        "submit",
        function (event) {
            var form = event.target;
            if (!form || form.tagName !== "FORM" || isIgnoredForm(form)) {
                return;
            }

            if (validateForm(form, { focus: true, touch: true })) {
                dispatch(form, VALID_EVENT);
                return;
            }

            event.preventDefault();
            /* Stop preview/save handlers from reporting success for invalid forms. */
            event.stopPropagation();
            dispatch(form, INVALID_EVENT);
        },
        true,
    );

    function handleFieldEvent(event) {
        var control = event.target;
        if (
            !control ||
            !control.matches ||
            !control.matches("input, select, textarea")
        ) {
            return;
        }

        var form = control.form;
        if (!form || isIgnoredForm(form)) {
            return;
        }

        manageForm(form);

        if (isPrimaryPassword(control)) {
            revalidateConfirmations(form, control);
        }

        var unit = findUnitForControl(form, control);
        if (!unit) {
            /* Constraints can be removed dynamically (for example by
               setCustomValidity("")); clear any state left by an earlier unit. */
            resetControl(control);
            return;
        }

        var eventType = event.type;
        var shouldValidate =
            eventType === "focusout" ||
            touchedControls.has(control) ||
            control.classList.contains("is-invalid") ||
            isCheckable(control) ||
            isFileInput(control);

        if (shouldValidate) {
            validateControl(control, { touch: eventType === "focusout" });
        }
    }

    document.addEventListener("input", handleFieldEvent, true);
    document.addEventListener("change", handleFieldEvent, true);
    document.addEventListener("focusout", handleFieldEvent, true);

    document.addEventListener(
        "reset",
        function (event) {
            var form = event.target;
            if (!form || form.tagName !== "FORM" || isIgnoredForm(form)) {
                return;
            }

            /* Reset handlers run before the browser clears field values. */
            window.setTimeout(function () {
                resetForm(form);
            }, 0);
        },
        true,
    );

    window.IdleMachFormValidation = {
        validateForm: validateForm,
        validateField: validateControl,
        resetForm: resetForm,
        resetField: resetControl,
        VALID_EVENT: VALID_EVENT,
        INVALID_EVENT: INVALID_EVENT,
    };

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", function () {
            manageFormsIn(document);
        });
    } else {
        manageFormsIn(document);
    }

    /* Cover forms rendered after initial page load. */
    if (window.MutationObserver) {
        var formObserver = new window.MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                toArray(mutation.addedNodes).forEach(function (node) {
                    manageFormsIn(node);
                });
            });
        });

        formObserver.observe(document.documentElement || document, {
            childList: true,
            subtree: true,
        });
    }
})();
