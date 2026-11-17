/* ==========================================================================
   IdleMach — Panel management-screen behaviour
   Scope: Admin list screens that render sample records in static tables.

   This file only adds local filtering, detail dialogs, confirmation dialogs,
   and honest frontend-only feedback. It never calls a server, changes a real
   record, processes a payment, or destroys a session.
   ========================================================================== */
(function () {
  "use strict";

  var toast = document.getElementById("preview-toast");
  var toastMessage = document.getElementById("preview-toast-message");
  var toastTimer = null;
  var toastHideTimer = null;

  function hideToast() {
    if (!toast || toast.hidden) {
      return;
    }

    window.clearTimeout(toastTimer);
    window.clearTimeout(toastHideTimer);

    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
      toast.hidden = true;
      toast.classList.remove("is-hiding");
      return;
    }

    toast.classList.add("is-hiding");
    toastHideTimer = window.setTimeout(function () {
      toast.hidden = true;
      toast.classList.remove("is-hiding");
    }, 150);
  }

  function notify(message) {
    if (!toast || !toastMessage) {
      return;
    }

    window.clearTimeout(toastHideTimer);
    toast.classList.remove("is-hiding");
    toastMessage.textContent = message;
    toast.hidden = false;

    window.clearTimeout(toastTimer);
    toastTimer = window.setTimeout(hideToast, 5200);
  }

  var closeToast = toast && toast.querySelector(".preview-toast-close");
  if (closeToast) {
    closeToast.addEventListener("click", hideToast);
  }

  function normalise(value) {
    return String(value || "").replace(/\s+/g, " ").trim().toLowerCase();
  }

  function modalMarkup(id, titleId, label, bodyId, confirmId) {
    return (
      '<div class="modal fade" id="' + id + '" tabindex="-1" role="dialog" aria-labelledby="' + titleId + '" aria-hidden="true">' +
        '<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">' +
          '<div class="modal-content">' +
            '<div class="modal-header">' +
              '<h2 class="modal-title h5" id="' + titleId + '">' + label + '</h2>' +
              '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' +
            '</div>' +
            '<div class="modal-body" id="' + bodyId + '"></div>' +
            '<div class="modal-footer">' +
              '<button type="button" class="btn-im btn-im-outline" data-bs-dismiss="modal">Cancel</button>' +
              (confirmId
                ? '<button type="button" class="btn-im btn-im-primary" id="' + confirmId + '">Confirm</button>'
                : '') +
            '</div>' +
          '</div>' +
        '</div>' +
      '</div>'
    );
  }

  if (document.querySelector("[data-demo-table]")) {
    document.body.insertAdjacentHTML(
      "beforeend",
      modalMarkup(
        "demo-record-modal",
        "demo-record-modal-title",
        "Record details",
        "demo-record-modal-body",
        null
      ) +
      modalMarkup(
        "demo-confirm-modal",
        "demo-confirm-modal-title",
        "Confirm status change",
        "demo-confirm-modal-body",
        "demo-confirm-action"
      )
    );
  }

  var recordModalElement = document.getElementById("demo-record-modal");
  var recordModal =
    recordModalElement && window.bootstrap
      ? window.bootstrap.Modal.getOrCreateInstance(recordModalElement)
      : null;
  var confirmModalElement = document.getElementById("demo-confirm-modal");
  var confirmModal =
    confirmModalElement && window.bootstrap
      ? window.bootstrap.Modal.getOrCreateInstance(confirmModalElement)
      : null;

  function showRecord(row, headings, isEdit) {
    var body = document.getElementById("demo-record-modal-body");
    var title = document.getElementById("demo-record-modal-title");
    if (!body || !title) {
      return;
    }

    title.textContent = isEdit ? "Edit record (demo)" : "Record details";

    var values = Array.prototype.slice.call(row.cells);
    var html = '<dl class="row mb-0">';

    headings.forEach(function (heading, index) {
      if (normalise(heading.textContent).indexOf("action") !== -1) {
        return;
      }

      html +=
        '<dt class="col-sm-4">' +
        heading.textContent.replace(/&/g, "&amp;").replace(/</g, "&lt;") +
        '</dt><dd class="col-sm-8 mb-2">' +
        (values[index] ? values[index].textContent.replace(/\s+/g, " ").trim() : "—") +
        "</dd>";
    });

    html += "</dl>";
    html +=
      '<div class="im-alert im-alert-info mt-3 mb-0">' +
      '<i class="fa-solid fa-circle-info" aria-hidden="true"></i>' +
      '<div>' +
      (isEdit
        ? "This edit view is a frontend demonstration. No record was changed or saved."
        : "These are read-only sample records. No backend record is connected.") +
      "</div></div>";

    body.innerHTML = html;

    if (recordModal) {
      recordModal.show();
    }
  }

  var statusActions = {
    suspend: {
      status: "Suspended",
      badge: "status-blocked",
      icon: "fa-ban",
      label: "Activate",
      action: "activate",
      buttonClass: "btn-im-primary",
      buttonIcon: "fa-user-check"
    },
    activate: {
      status: "Active",
      badge: "status-active",
      icon: "fa-circle-check",
      label: "Suspend",
      action: "suspend",
      buttonClass: "btn-im-danger",
      buttonIcon: "fa-user-slash"
    },
    flag: {
      status: "Flagged",
      badge: "status-warning",
      icon: "fa-flag",
      label: "Unflag",
      action: "unflag",
      buttonClass: "btn-im-outline",
      buttonIcon: "fa-flag"
    },
    unflag: {
      status: "Published",
      badge: "status-active",
      icon: "fa-circle-check",
      label: "Hide",
      action: "hide",
      buttonClass: "btn-im-danger",
      buttonIcon: "fa-eye-slash"
    },
    approve: {
      status: "Published",
      badge: "status-active",
      icon: "fa-circle-check",
      label: "Hide",
      action: "hide",
      buttonClass: "btn-im-danger",
      buttonIcon: "fa-eye-slash"
    },
    hide: {
      status: "Hidden",
      badge: "status-neutral",
      icon: "fa-eye-slash",
      label: "Restore",
      action: "restore",
      buttonClass: "btn-im-outline",
      buttonIcon: "fa-rotate-left"
    },
    restore: {
      status: "Published",
      badge: "status-active",
      icon: "fa-circle-check",
      label: "Hide",
      action: "hide",
      buttonClass: "btn-im-danger",
      buttonIcon: "fa-eye-slash"
    }
  };

  var moderationButtons = {
    flag: {
      label: "Flag",
      action: "flag",
      buttonClass: "btn-im-outline",
      buttonIcon: "fa-flag"
    },
    unflag: {
      label: "Unflag",
      action: "unflag",
      buttonClass: "btn-im-outline",
      buttonIcon: "fa-flag"
    },
    hide: {
      label: "Hide",
      action: "hide",
      buttonClass: "btn-im-danger",
      buttonIcon: "fa-eye-slash"
    },
    restore: {
      label: "Restore",
      action: "restore",
      buttonClass: "btn-im-outline",
      buttonIcon: "fa-rotate-left"
    }
  };

  var moderationActionsByStatus = {
    published: ["flag", "hide"],
    flagged: ["unflag", "hide"],
    hidden: ["restore"]
  };

  function recordLabel(row) {
    var first = row.cells[0];
    if (!first) {
      return "this record";
    }
    return first.textContent.replace(/\s+/g, " ").trim().slice(0, 80) || "this record";
  }

  function statusCellIndex(headings) {
    for (var index = 0; index < headings.length; index += 1) {
      var text = normalise(headings[index].textContent);
      if (text === "status" || text.indexOf("status") !== -1) {
        return index;
      }
    }
    return -1;
  }

  function isModerationTable(headings) {
    return headings.some(function (heading) {
      return normalise(heading.textContent).indexOf("moderation") !== -1;
    });
  }

  function moderationCellIndex(headings) {
    for (var index = 0; index < headings.length; index += 1) {
      var text = normalise(headings[index].textContent);
      if (text.indexOf("moderation") !== -1 || text.indexOf("action") !== -1) {
        return index;
      }
    }
    return -1;
  }

  function renderModerationActions(row, headings, status) {
    var index = moderationCellIndex(headings);
    var cell = index >= 0 ? row.cells[index] : row.cells[row.cells.length - 1];
    if (!cell) {
      return;
    }

    var container = cell.querySelector(".table-actions") || cell;
    var viewButton = null;

    Array.prototype.slice.call(container.querySelectorAll("button")).forEach(function (button) {
      if (!viewButton && normalise(button.textContent).indexOf("view") !== -1) {
        viewButton = button.cloneNode(true);
      }
    });

    container.innerHTML = "";

    if (viewButton) {
      container.appendChild(viewButton);
    }

    var actions = moderationActionsByStatus[normalise(status)] || [];
    actions.forEach(function (action) {
      var buttonConfig = moderationButtons[action];
      if (!buttonConfig) {
        return;
      }

      var button = document.createElement("button");
      button.type = "button";
      button.className = "btn-im " + buttonConfig.buttonClass + " btn-im-sm";
      button.innerHTML =
        '<i class="fa-solid ' + buttonConfig.buttonIcon + '" aria-hidden="true"></i> ' +
        buttonConfig.label;
      button.dataset.demoAction = buttonConfig.action;
      container.appendChild(button);
    });
  }

  function requestStatusChange(button, row, headings, action, refresh) {
    var config = statusActions[action];
    if (!config) {
      return;
    }

    var body = document.getElementById("demo-confirm-modal-body");
    var title = document.getElementById("demo-confirm-modal-title");
    var confirmButton = document.getElementById("demo-confirm-action");
    if (!body || !title || !confirmButton) {
      return;
    }

    title.textContent = "Confirm " + action + " (frontend demo)";
    body.innerHTML =
      '<p class="mb-2">' +
      'Change the displayed status for <strong>' + recordLabel(row) + '</strong> to ' +
      '<strong>' + config.status + '</strong>?' +
      "</p>" +
      '<p class="small text-muted mb-0">This only updates this page. No record is stored or changed.</p>';

    confirmButton.onclick = function () {
      var cellIndex = statusCellIndex(headings);
      var statusCell = cellIndex >= 0 ? row.cells[cellIndex] : null;

      if (statusCell) {
        statusCell.innerHTML =
          '<span class="status-badge ' + config.badge + '">' +
          '<i class="fa-solid ' + config.icon + '" aria-hidden="true"></i> ' +
          config.status +
          "</span>";
      }

      if (isModerationTable(headings)) {
        renderModerationActions(row, headings, config.status);
      } else {
        button.className = "btn-im btn-im-outline btn-im-sm " + config.buttonClass;
        button.innerHTML =
          '<i class="fa-solid ' + config.buttonIcon + '" aria-hidden="true"></i> ' +
          config.label;
        button.dataset.demoAction = config.action;
      }

      if (confirmModal) {
        confirmModal.hide();
      }

      // Re-apply active search and filters so the changed row reflects its
      // new status immediately.
      if (typeof refresh === "function") {
        refresh();
      }

      notify(
        "Frontend demo: status shown as “" + config.status + "”. No record was changed."
      );
    };

    if (confirmModal) {
      confirmModal.show();
    }
  }

  document.querySelectorAll("[data-demo-table]").forEach(function (card) {
    var form = card.querySelector('form[role="search"]');
    var wrapper = card.querySelector(".table-responsive");
    var table = wrapper && wrapper.querySelector("table.im-table");
    var tbody = table && table.tBodies[0];

    if (!form || !tbody) {
      return;
    }

    var rows = Array.prototype.slice.call(tbody.rows);
    var headings = table.tHead && table.tHead.rows[0]
      ? Array.prototype.slice.call(table.tHead.rows[0].cells)
      : [];
    var fields = Array.prototype.slice.call(
      form.querySelectorAll('input[type="search"], input[type="text"], select')
    );

    var summary = document.createElement("p");
    summary.className = "small text-muted mb-3";
    summary.setAttribute("role", "status");
    summary.setAttribute("aria-live", "polite");
    summary.dataset.demoSummary = "";
    wrapper.parentNode.insertBefore(summary, wrapper);

    var emptyState = document.createElement("div");
    emptyState.className = "empty-state mt-3";
    emptyState.hidden = true;
    emptyState.innerHTML =
      '<div class="empty-state-icon"><i class="fa-solid fa-filter-circle-xmark" aria-hidden="true"></i></div>' +
      "<h3>No records match</h3>" +
      "<p>Adjust the search or filters to see more sample records.</p>";
    wrapper.parentNode.insertBefore(emptyState, wrapper.nextSibling);

    function dateMatches(rowText, range) {
      if (!range) {
        return true;
      }

      var dates = rowText.match(/\d{1,2}\s+[A-Za-z]{3,9}\s+\d{4}/g) || [];
      if (!dates.length) {
        return false;
      }

      var now = new Date();
      var start = new Date(now.getFullYear(), now.getMonth(), now.getDate());

      return dates.some(function (value) {
        var parsed = new Date(value);
        if (isNaN(parsed.getTime())) {
          return false;
        }

        if (range === "today") {
          return parsed >= start && parsed < new Date(start.getTime() + 86400000);
        }

        if (range === "this week") {
          return parsed >= new Date(start.getTime() - 7 * 86400000) && parsed <= start;
        }

        if (range === "this month") {
          return (
            parsed.getFullYear() === now.getFullYear() &&
            parsed.getMonth() === now.getMonth()
          );
        }

        return true;
      });
    }

    function applyFilters() {
      var keyword = "";
      var criteria = [];

      fields.forEach(function (field) {
        var value = field.value ? String(field.value).trim() : "";
        if (!value) {
          return;
        }

        if (field.type === "search" || field.type === "text") {
          keyword += " " + value.toLowerCase();
          return;
        }

        criteria.push(value.toLowerCase());
      });

      var terms = normalise(keyword).split(" ").filter(Boolean);
      var visible = 0;

      rows.forEach(function (row) {
        var text = normalise(row.textContent);
        var cellTexts = Array.prototype.slice.call(row.cells).map(function (cell) {
          return normalise(cell.textContent);
        });
        var matches = terms.every(function (term) {
          return text.indexOf(term) !== -1;
        });

        criteria.forEach(function (value) {
          if (value.indexOf("stars") !== -1) {
            var rating = value.match(/\d+/);
            var score = (rating ? rating[0] : "0") + " / 5";
            if (text.indexOf(score) === -1) {
              matches = false;
            }
            return;
          }

          if (
            value === "today" ||
            value === "this week" ||
            value === "this month"
          ) {
            if (!dateMatches(text, value)) {
              matches = false;
            }
            return;
          }

          // Match filters against whole cell values so "Active" does not also
          // match "Inactive", and "Pending" does not also match "Payment pending".
          if (cellTexts.indexOf(value) === -1) {
            matches = false;
          }
        });

        row.hidden = !matches;
        if (matches) {
          visible += 1;
        }
      });

      summary.textContent =
        visible === rows.length
          ? "Showing all " + rows.length + " sample records."
          : visible === 0
            ? "No records match the current search or filters."
            : "Showing " + visible + " of " + rows.length + " sample records.";

      emptyState.hidden = visible !== 0;
      wrapper.hidden = visible === 0;
    }

    form.addEventListener("submit", function (event) {
      event.preventDefault();
      applyFilters();
    });

    form.addEventListener("reset", function () {
      window.setTimeout(applyFilters, 0);
    });

    fields.forEach(function (field) {
      field.addEventListener("input", applyFilters);
      field.addEventListener("change", applyFilters);
    });

    tbody.addEventListener("click", function (event) {
      var button = event.target.closest("button");
      if (!button || !tbody.contains(button) || button.disabled) {
        return;
      }

      if (button.getAttribute("data-action") || button.closest("[data-action]")) {
        return;
      }

      var row = button.closest("tr");
      if (!row || rows.indexOf(row) === -1) {
        return;
      }

      var label = normalise(button.textContent);
      var action = button.dataset.demoAction;

      if (label.indexOf("view") !== -1) {
        showRecord(row, headings, false);
        return;
      }

      if (label.indexOf("edit") !== -1) {
        showRecord(row, headings, true);
        return;
      }

      if (!action) {
        if (label.indexOf("suspend") !== -1) action = "suspend";
        else if (label.indexOf("activate") !== -1) action = "activate";
        else if (label.indexOf("unflag") !== -1) action = "unflag";
        else if (label.indexOf("flag") !== -1) action = "flag";
        else if (label.indexOf("restore") !== -1) action = "restore";
        else if (label.indexOf("hide") !== -1) action = "hide";
        else if (label.indexOf("approve") !== -1) action = "approve";
      }

      if (action && statusActions[action]) {
        requestStatusChange(button, row, headings, action, applyFilters);
        return;
      }

      notify(
        "“" + button.textContent.trim() + "” is a frontend-only control. No record was changed."
      );
    });

    applyFilters();
  });

  /* Admin profile: local validation and honest feedback. */
  var demoProfileForm = document.querySelector('form[data-demo-profile-form]');
  if (demoProfileForm) {
    var profileFields = Array.prototype.slice.call(
      demoProfileForm.querySelectorAll("input, textarea, select")
    );
    var profileNotice = document.createElement("div");
    profileNotice.className = "im-alert im-alert-success mt-3";
    profileNotice.setAttribute("role", "status");
    profileNotice.tabIndex = -1;
    profileNotice.hidden = true;
    profileNotice.innerHTML =
      '<i class="fa-solid fa-circle-check" aria-hidden="true"></i>' +
      "<div>The profile fields passed local validation. Nothing was saved or stored.</div>";
    demoProfileForm.appendChild(profileNotice);

    function validateProfileField(field) {
      if (!field.willValidate) {
        return true;
      }
      var valid = field.checkValidity();
      field.classList.toggle("is-invalid", !valid);
      field.setAttribute("aria-invalid", valid ? "false" : "true");
      return valid;
    }

    demoProfileForm.addEventListener("submit", function (event) {
      event.preventDefault();
      var firstInvalid = null;

      profileFields.forEach(function (field) {
        if (!validateProfileField(field) && !firstInvalid) {
          firstInvalid = field;
        }
      });

      if (firstInvalid) {
        profileNotice.hidden = true;
        firstInvalid.focus();
        notify("Please correct the highlighted profile fields. Nothing was saved.");
        return;
      }

      profileNotice.hidden = false;
      profileNotice.focus();
      notify("Profile validation passed. This is a frontend demo, so nothing was saved.");
    });

    demoProfileForm.addEventListener("input", function (event) {
      profileNotice.hidden = true;
      if (
        event.target.matches("input, textarea, select") &&
        event.target.classList.contains("is-invalid")
      ) {
        validateProfileField(event.target);
      }
    });

    demoProfileForm.addEventListener("reset", function () {
      window.setTimeout(function () {
        profileFields.forEach(function (field) {
          field.classList.remove("is-invalid");
          field.removeAttribute("aria-invalid");
        });
        profileNotice.hidden = true;
        notify("Profile form reset. No saved details were changed.");
      }, 0);
    });
  }
})();
