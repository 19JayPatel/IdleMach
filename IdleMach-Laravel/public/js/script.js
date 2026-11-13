/* ==========================================================================
   IdleMach — Shared frontend behaviour
   Phase 0.2 + Phase 1 + Phase 2.1 homepage + Phase 2.2 Explore Machines +
   Phase 2.3 Machine Details + Phase 2.4 How It Works + Phase 2.5 About and
   Contact + Phase 2.6 Login and Registration + Phase 3.1 Admin Dashboard.
   Interface behaviour only; no backend, authentication, marketplace data,
   storage, upload, messaging, booking, approval, or payment.
   ========================================================================== */
(function () {
  "use strict";

  /* Current year in the footer. */
  document.querySelectorAll("[data-current-year]").forEach(function (element) {
    element.textContent = String(new Date().getFullYear());
  });

  /* Mark the active public navigation item for the current page. */
  var currentPage = window.location.pathname.split("/").pop() || "index.html";
  document.querySelectorAll("[data-nav-match]").forEach(function (link) {
    if (link.getAttribute("data-nav-match") === currentPage) {
      link.classList.add("active");
      link.setAttribute("aria-current", "page");
    }
  });

  /* Add a subtle shadow to the sticky header after scrolling. */
  var header = document.querySelector(".site-header");
  if (header) {
    var updateHeader = function () {
      header.classList.toggle("is-scrolled", window.scrollY > 6);
    };

    updateHeader();
    window.addEventListener("scroll", updateHeader, { passive: true });
  }

  /* Close the mobile navigation after a link is followed. */
  var nav = document.getElementById("siteNav");
  if (nav && window.bootstrap && window.bootstrap.Collapse) {
    nav.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        if (!nav.classList.contains("show")) {
          return;
        }

        window.bootstrap.Collapse.getOrCreateInstance(nav, { toggle: false }).hide();
      });
    });
  }

  /* ------------------------------------------------------------------------
     Preview feedback toast
     Used by the design-foundation page so sample controls can be honest about
     their demonstration-only behaviour.
     ------------------------------------------------------------------------ */
  var toast = document.getElementById("preview-toast");
  var toastMessage = document.getElementById("preview-toast-message");
  var toastTimer = null;
  var toastHideTimer = null;

  var prefersReducedMotion = function () {
    return window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  };

  var finishToastHide = function () {
    if (!toast) {
      return;
    }

    toast.hidden = true;
    toast.classList.remove("is-hiding");
    toastHideTimer = null;
  };

  function hideToast() {
    if (!toast || toast.hidden) {
      return;
    }

    if (toastTimer) {
      window.clearTimeout(toastTimer);
      toastTimer = null;
    }

    if (toastHideTimer) {
      window.clearTimeout(toastHideTimer);
      toastHideTimer = null;
    }

    if (prefersReducedMotion()) {
      finishToastHide();
      return;
    }

    toast.classList.add("is-hiding");
    toastHideTimer = window.setTimeout(finishToastHide, 150);
  }

  function showPreviewNotice(message) {
    if (!toast || !toastMessage) {
      return;
    }

    if (toastHideTimer) {
      window.clearTimeout(toastHideTimer);
      toastHideTimer = null;
    }

    toast.classList.remove("is-hiding");
    toastMessage.textContent = message;
    toast.hidden = false;

    if (toastTimer) {
      window.clearTimeout(toastTimer);
    }

    toastTimer = window.setTimeout(hideToast, 5200);
  }

  if (toast) {
    var toastClose = toast.querySelector(".preview-toast-close");
    if (toastClose) {
      toastClose.addEventListener("click", hideToast);
    }
  }

  document.querySelectorAll("[data-preview-action]").forEach(function (control) {
    control.addEventListener("click", function (event) {
      if (control.tagName === "A") {
        event.preventDefault();
      }

      var label = control.getAttribute("data-preview-action") || control.textContent.trim();
      var customMessage = control.getAttribute("data-preview-message");
      showPreviewNotice(
        customMessage || 'Preview only: “' + label + '” was selected. No data was sent or saved.'
      );
    });
  });

  /* ------------------------------------------------------------------------
     Homepage sample marketplace search
     This filters the three clearly labelled demo records on the page. It does
     not query a server or imply that live marketplace data exists.
     ------------------------------------------------------------------------ */
  var searchForm = document.getElementById("capacity-search-form");

  if (searchForm) {
    var keywordField = document.getElementById("capacity-keyword");
    var processField = document.getElementById("capacity-process");
    var locationField = document.getElementById("capacity-location");
    var listingItems = Array.prototype.slice.call(document.querySelectorAll("[data-listing]"));
    var resultsSummary = document.getElementById("results-summary");
    var listingEmpty = document.getElementById("listing-empty");
    var previewSection = document.getElementById("marketplace-preview");
    var previewHeading = document.getElementById("preview-title");
    var processChips = Array.prototype.slice.call(document.querySelectorAll("[data-process-filter]"));

    var getFilters = function () {
      return {
        keyword: keywordField ? keywordField.value.trim().toLowerCase() : "",
        process: processField ? processField.value : "",
        location: locationField ? locationField.value : ""
      };
    };

    var updateProcessChips = function (activeProcess) {
      processChips.forEach(function (chip) {
        var isActive = (chip.getAttribute("data-process-filter") || "") === activeProcess;
        chip.classList.toggle("is-active", isActive);
        chip.setAttribute("aria-pressed", isActive ? "true" : "false");
      });
    };

    var focusPreviewHeading = function () {
      if (!previewHeading) {
        return;
      }

      try {
        previewHeading.focus({ preventScroll: true });
      } catch (error) {
        previewHeading.focus();
      }
    };

    var applyFilters = function (options) {
      var settings = options || {};
      var filters = getFilters();
      var visibleCount = 0;

      listingItems.forEach(function (item) {
        var haystack = (item.getAttribute("data-search") || "").toLowerCase();
        var matches = true;

        if (filters.process && item.getAttribute("data-process") !== filters.process) {
          matches = false;
        }

        if (filters.location && item.getAttribute("data-location") !== filters.location) {
          matches = false;
        }

        if (filters.keyword && haystack.indexOf(filters.keyword) === -1) {
          matches = false;
        }

        item.hidden = !matches;

        if (matches) {
          visibleCount += 1;
        }
      });

      if (listingEmpty) {
        listingEmpty.hidden = visibleCount !== 0;
      }

      if (resultsSummary) {
        if (visibleCount === listingItems.length) {
          resultsSummary.textContent = "Showing all " + listingItems.length + " listings.";
        } else if (visibleCount === 0) {
          resultsSummary.textContent = "No listings match this search.";
        } else {
          resultsSummary.textContent =
            "Showing " + visibleCount + " of " + listingItems.length + " listings.";
        }
      }

      updateProcessChips(filters.process);

      if (settings.scrollToResults && previewSection) {
        var behavior = window.matchMedia("(prefers-reduced-motion: reduce)").matches ? "auto" : "smooth";
        previewSection.scrollIntoView({ behavior: behavior, block: "start" });
        focusPreviewHeading();
      }
    };

    searchForm.addEventListener("submit", function (event) {
      event.preventDefault();
      applyFilters({ scrollToResults: true });
    });

    searchForm.addEventListener("reset", function () {
      window.setTimeout(function () {
        applyFilters();
      }, 0);
    });

    processChips.forEach(function (chip) {
      chip.addEventListener("click", function () {
        if (processField) {
          processField.value = chip.getAttribute("data-process-filter") || "";
        }
        applyFilters();
      });
    });

    document.querySelectorAll("[data-search-suggestion]").forEach(function (button) {
      button.addEventListener("click", function () {
        if (keywordField) {
          keywordField.value = button.getAttribute("data-search-suggestion") || "";
        }
        applyFilters({ scrollToResults: true });
      });
    });

    var clearSampleFilters = function () {
      searchForm.reset();
      window.setTimeout(function () {
        applyFilters();
      }, 0);
    };

    var emptyClearButton = document.getElementById("empty-clear-filters");
    if (emptyClearButton) {
      emptyClearButton.addEventListener("click", clearSampleFilters);
    }
  }

  /* ------------------------------------------------------------------------
     Explore Machines sample search, filters, and sorting
     This only filters and orders the three clearly labelled sample records in
     machines.html. It never queries a server or implies live marketplace data.
     ------------------------------------------------------------------------ */
  var machineSearchForm = document.getElementById("machines-search-form");

  if (machineSearchForm) {
    var machineKeyword = document.getElementById("machine-keyword");
    var machineProcess = document.getElementById("filter-process");
    var machineLocation = document.getElementById("filter-location");
    var machineAvailability = document.getElementById("filter-availability");
    var machineRate = document.getElementById("filter-rate");
    var machineSort = document.getElementById("machine-sort");
    var machineResults = document.getElementById("machine-results");
    var machineItems = Array.prototype.slice.call(document.querySelectorAll("[data-machine-listing]"));
    var machineSummary = document.getElementById("machines-results-summary");
    var machineEmpty = document.getElementById("machines-empty");
    var machineResultsHeading = document.getElementById("machine-results-heading");

    var getMachineFilters = function () {
      return {
        keyword: machineKeyword ? machineKeyword.value.trim().toLowerCase() : "",
        process: machineProcess ? machineProcess.value : "",
        location: machineLocation ? machineLocation.value : "",
        availability: machineAvailability ? machineAvailability.value : "",
        rate: machineRate ? machineRate.value : ""
      };
    };

    var matchesRateRange = function (rate, range) {
      if (!range) {
        return true;
      }

      if (range === "up-to-900") {
        return rate <= 900;
      }

      if (range === "901-1000") {
        return rate > 900 && rate <= 1000;
      }

      if (range === "above-1000") {
        return rate > 1000;
      }

      return true;
    };

    var sortMachineItems = function (mode) {
      var ordered = machineItems.slice();

      if (mode === "rate-asc") {
        ordered.sort(function (a, b) {
          return Number(a.getAttribute("data-rate")) - Number(b.getAttribute("data-rate"));
        });
      } else if (mode === "rate-desc") {
        ordered.sort(function (a, b) {
          return Number(b.getAttribute("data-rate")) - Number(a.getAttribute("data-rate"));
        });
      } else if (mode === "name-asc") {
        ordered.sort(function (a, b) {
          return a.getAttribute("data-name").localeCompare(b.getAttribute("data-name"));
        });
      }

      ordered.forEach(function (item) {
        machineResults.appendChild(item);
      });
    };

    var applyMachineFilters = function (options) {
      var settings = options || {};
      var filters = getMachineFilters();
      var keywordTerms = filters.keyword ? filters.keyword.split(/\s+/).filter(Boolean) : [];
      var visibleCount = 0;

      machineItems.forEach(function (item) {
        var haystack = (item.getAttribute("data-search") || "").toLowerCase();
        var matches = true;

        if (filters.process && item.getAttribute("data-process") !== filters.process) {
          matches = false;
        }

        if (filters.location && item.getAttribute("data-location") !== filters.location) {
          matches = false;
        }

        if (filters.availability && item.getAttribute("data-availability") !== filters.availability) {
          matches = false;
        }

        if (!matchesRateRange(Number(item.getAttribute("data-rate")), filters.rate)) {
          matches = false;
        }

        if (keywordTerms.length) {
          var keywordMatches = keywordTerms.every(function (term) {
            return haystack.indexOf(term) !== -1;
          });

          if (!keywordMatches) {
            matches = false;
          }
        }

        item.hidden = !matches;

        if (matches) {
          visibleCount += 1;
        }
      });

      sortMachineItems(machineSort ? machineSort.value : "recommended");

      if (machineResults) {
        machineResults.hidden = visibleCount === 0;
      }

      if (machineEmpty) {
        machineEmpty.hidden = visibleCount !== 0;
      }

      if (machineSummary) {
        if (visibleCount === machineItems.length) {
          machineSummary.textContent = "Showing all " + machineItems.length + " listings.";
        } else if (visibleCount === 0) {
          machineSummary.textContent = "No listings match these filters.";
        } else {
          machineSummary.textContent =
            "Showing " + visibleCount + " of " + machineItems.length + " listings.";
        }
      }

      if (settings.focusResults && machineResultsHeading) {
        var behavior = window.matchMedia("(prefers-reduced-motion: reduce)").matches ? "auto" : "smooth";
        machineResultsHeading.scrollIntoView({ behavior: behavior, block: "start" });

        try {
          machineResultsHeading.focus({ preventScroll: true });
        } catch (error) {
          machineResultsHeading.focus();
        }
      }
    };

    var resetMachineFilters = function () {
      machineSearchForm.reset();

      if (machineSort) {
        machineSort.value = "recommended";
      }

      applyMachineFilters();

      if (machineKeyword) {
        machineKeyword.focus();
      }
    };

    machineSearchForm.addEventListener("submit", function (event) {
      event.preventDefault();
      applyMachineFilters({ focusResults: true });
    });

    if (machineKeyword) {
      machineKeyword.addEventListener("input", function () {
        applyMachineFilters();
      });
    }

    [machineProcess, machineLocation, machineAvailability, machineRate].forEach(function (field) {
      if (field) {
        field.addEventListener("change", function () {
          applyMachineFilters();
        });
      }
    });

    if (machineSort) {
      machineSort.addEventListener("change", function () {
        applyMachineFilters();
      });
    }

    var resetMachineFiltersButton = document.getElementById("machines-reset-filters");
    if (resetMachineFiltersButton) {
      resetMachineFiltersButton.addEventListener("click", resetMachineFilters);
    }

    var emptyMachineFiltersButton = document.getElementById("machines-empty-clear");
    if (emptyMachineFiltersButton) {
      emptyMachineFiltersButton.addEventListener("click", resetMachineFilters);
    }
  }

  /* ------------------------------------------------------------------------
     Machine Details page (Phase 2.3)
     The same three records shown in the marketplace are rendered from the URL
     ID. Nothing is fetched from a server, saved, uploaded, or booked.
     ------------------------------------------------------------------------ */
  var machineDetailView = document.getElementById("machine-detail-view");

  if (machineDetailView) {
    var machineDataset = {
      "1": {
        name: "Haas CNC Turning Machine ST-20",
        process: "CNC turning",
        machineType: "CNC turning machine",
        owner: "Patel Engineering",
        location: "Rajkot",
        status: "Available",
        statusKey: "available",
        statusIcon: "fa-circle-check",
        rate: 800,
        capacityHours: 8,
        availabilityNote:
          "This listing has 8 hours per day available. No day-by-day time slots are included.",
        images: [
          {
            src: "assets/images/machine-turning.svg",
            alt: "Illustration of a CNC turning machine.",
            caption: "Original illustration - not a photograph of a specific machine."
          }
        ]
      },
      "2": {
        name: "Vertical Machining Centre",
        process: "CNC milling",
        machineType: "Vertical machining centre",
        owner: "Sample Precision Works",
        location: "Coimbatore",
        status: "Available",
        statusKey: "available",
        statusIcon: "fa-circle-check",
        rate: 1150,
        capacityHours: 6,
        availabilityNote:
          "This listing has 6 hours per day available. No day-by-day time slots are included.",
        images: [
          {
            src: "assets/images/machine-milling.svg",
            alt: "Illustration of a vertical machining centre.",
            caption: "Original illustration - not a photograph of a specific machine."
          }
        ]
      },
      "3": {
        name: "Hydraulic Press Brake",
        process: "Fabrication",
        machineType: "Hydraulic press brake",
        owner: "Sample Fabrication Co.",
        location: "Pune",
        status: "Limited availability",
        statusKey: "warning",
        statusIcon: "fa-clock",
        rate: 950,
        capacityHours: 3,
        availabilityNote:
          "This listing is marked limited availability and has 3 hours per day available. No specific dates or time slots are included.",
        images: [
          {
            src: "assets/images/machine-fabrication.svg",
            alt: "Illustration of a hydraulic press brake bending sheet metal.",
            caption: "Original illustration - not a photograph of a specific machine."
          }
        ]
      }
    };

    var notProvided = "Not provided in this record.";
    var requestedMachineId = new URLSearchParams(window.location.search).get("id");
    var machineId =
      requestedMachineId && /^\d+$/.test(requestedMachineId)
        ? String(Number(requestedMachineId))
        : requestedMachineId;
    var currentMachine = machineId && Object.prototype.hasOwnProperty.call(machineDataset, machineId)
      ? machineDataset[machineId]
      : null;

    var detailMissing = document.getElementById("machine-detail-missing");
    var detailMissingTitle = document.getElementById("machine-detail-missing-title");
    var detailMissingText = document.getElementById("machine-detail-missing-text");
    var pageDescription = document.querySelector('meta[name="description"]');

    var setDetailText = function (id, value) {
      var element = document.getElementById(id);

      if (element) {
        element.textContent = value;
      }
    };

    var formatRupees = function (value) {
      return "₹" + new Intl.NumberFormat("en-IN", { maximumFractionDigits: 0 }).format(value);
    };

    var renderStatusBadges = function (machine) {
      document.querySelectorAll("[data-detail-status]").forEach(function (badge) {
        badge.className = "status-badge status-" + machine.statusKey;
        badge.textContent = "";

        var icon = document.createElement("i");
        icon.className = "fa-solid " + machine.statusIcon;
        icon.setAttribute("aria-hidden", "true");

        badge.appendChild(icon);
        badge.appendChild(document.createTextNode(machine.status));
      });
    };

    if (!currentMachine) {
      machineDetailView.hidden = true;

      if (detailMissing) {
        detailMissing.hidden = false;
      }

      document.title = "Machine not found — IdleMach";

      if (pageDescription) {
        pageDescription.setAttribute(
          "content",
          "The requested machine is not available on IdleMach."
        );
      }

      if (detailMissingTitle) {
        detailMissingTitle.textContent = requestedMachineId
          ? "That machine could not be found"
          : "No machine was selected";
      }

      if (detailMissingText) {
        detailMissingText.textContent = requestedMachineId
          ? "The machine ID \"" + requestedMachineId + "\" is not available. Only three machines (IDs 1 to 3) are available."
          : "This page needs a machine ID, such as machine-details.html?id=1. Only machines 1 to 3 are available.";
      }
    } else {
      document.title = currentMachine.name + " — Machine Details — IdleMach";

      if (pageDescription) {
        pageDescription.setAttribute(
          "content",
          "IdleMach listing for " + currentMachine.name + " from " + currentMachine.owner +
            " in " + currentMachine.location + ". Not a live listing or booking."
        );
      }

      setDetailText("detail-crumb-name", currentMachine.name);
      setDetailText("detail-name", currentMachine.name);
      setDetailText("detail-process", currentMachine.process);
      setDetailText("detail-owner", currentMachine.owner);
      setDetailText("detail-location", currentMachine.location);
      setDetailText("detail-machine-type", currentMachine.machineType);
      setDetailText("detail-spec-process", currentMachine.process);
      setDetailText("detail-model", notProvided);
      setDetailText("detail-materials", notProvided);
      setDetailText("detail-technical", notProvided);
      setDetailText("detail-spec-capacity", currentMachine.capacityHours + " hours/day");
      setDetailText("detail-owner-name", currentMachine.owner);
      setDetailText("detail-owner-location", currentMachine.location);
      setDetailText("detail-rate", formatRupees(currentMachine.rate));
      setDetailText("detail-price-capacity", currentMachine.capacityHours + " hours/day");
      setDetailText("detail-total-capacity", notProvided);
      setDetailText("detail-pricing-status", currentMachine.status);
      setDetailText("detail-availability-capacity", currentMachine.capacityHours + " hours/day listed as available");
      setDetailText("detail-availability-copy", currentMachine.availabilityNote);
      setDetailText("booking-summary-rate", formatRupees(currentMachine.rate) + " / hour");
      setDetailText("booking-summary-capacity", currentMachine.capacityHours + " hours/day");

      renderStatusBadges(currentMachine);

      /* Gallery: the markup supports multiple images, while each current sample
         record provides one original illustration. */
      var galleryImage = document.getElementById("detail-gallery-image");
      var galleryFallback = document.getElementById("detail-gallery-fallback");
      var galleryThumbs = document.getElementById("detail-gallery-thumbs");
      var galleryCaption = document.getElementById("detail-gallery-caption");
      var galleryNote = document.getElementById("detail-gallery-note");
      var galleryImages = currentMachine.images || [];
      var currentGalleryIndex = 0;

      var showGalleryImage = function (index) {
        var image = galleryImages[index];

        if (!galleryImage || !image) {
          if (galleryFallback) {
            galleryFallback.hidden = false;
          }

          if (galleryImage) {
            galleryImage.hidden = true;
          }

          return;
        }

        currentGalleryIndex = index;
        galleryImage.hidden = false;

        if (galleryFallback) {
          galleryFallback.hidden = true;
        }

        galleryImage.src = image.src;
        galleryImage.alt = image.alt;

        if (galleryCaption) {
          galleryCaption.textContent = image.caption;
        }

        if (galleryThumbs) {
          galleryThumbs.querySelectorAll("button").forEach(function (button, buttonIndex) {
            button.setAttribute("aria-pressed", buttonIndex === index ? "true" : "false");
          });
        }
      };

      if (galleryImage && galleryFallback) {
        galleryImage.addEventListener("error", function () {
          galleryImage.hidden = true;
          galleryFallback.hidden = false;
        });
      }

      if (galleryImages.length) {
        showGalleryImage(0);
      } else if (galleryFallback && galleryImage) {
        galleryImage.hidden = true;
        galleryFallback.hidden = false;
      }

      if (galleryThumbs) {
        galleryThumbs.hidden = galleryImages.length < 2;

        if (galleryImages.length > 1) {
          galleryImages.forEach(function (image, index) {
            var thumb = document.createElement("button");
            thumb.type = "button";
            thumb.className = "detail-gallery-thumb";
            thumb.setAttribute("aria-pressed", index === currentGalleryIndex ? "true" : "false");
            thumb.setAttribute("aria-label", "Show image " + (index + 1) + " of " + galleryImages.length + ": " + image.alt);

            var thumbImage = document.createElement("img");
            thumbImage.src = image.src;
            thumbImage.alt = "";
            thumbImage.width = 88;
            thumbImage.height = 55;

            thumb.appendChild(thumbImage);
            thumb.addEventListener("click", function () {
              showGalleryImage(index);
            });
            galleryThumbs.appendChild(thumb);
          });
        }
      }

      if (galleryNote) {
        if (galleryImages.length === 1) {
          galleryNote.textContent =
            "Only one image is included in this record. The thumbnail selector appears when a listing provides more than one image.";
        } else if (galleryImages.length > 1) {
          galleryNote.textContent =
            "Select a thumbnail to change the main image. All images are original illustrations.";
        } else {
          galleryNote.textContent = "No image is available for this record.";
        }
      }

      /* Booking request interface: local validation only. */
      var bookingForm = document.getElementById("booking-form");
      var bookingDate = document.getElementById("booking-date");
      var bookingTime = document.getElementById("booking-time");
      var bookingHours = document.getElementById("booking-hours");
      var bookingHoursHelp = document.getElementById("booking-hours-help");
      var bookingMaterial = document.getElementById("booking-material");
      var bookingQuantity = document.getElementById("booking-quantity");
      var bookingDescription = document.getElementById("booking-description");
      var bookingEstimate = document.getElementById("booking-estimate-value");
      var bookingFeedback = document.getElementById("booking-feedback");
      var bookingFields = [
        bookingDate,
        bookingTime,
        bookingHours,
        bookingMaterial,
        bookingQuantity,
        bookingDescription
      ];

      var getTodayIso = function () {
        var today = new Date();
        return (
          today.getFullYear() + "-" +
          String(today.getMonth() + 1).padStart(2, "0") + "-" +
          String(today.getDate()).padStart(2, "0")
        );
      };

      var todayIso = getTodayIso();

      if (bookingDate) {
        bookingDate.min = todayIso;
      }

      if (bookingHours) {
        bookingHours.max = String(currentMachine.capacityHours);
      }

      if (bookingHoursHelp) {
        bookingHoursHelp.textContent =
          "This record has " + currentMachine.capacityHours +
          " hours/day as available. Enter 1 to " + currentMachine.capacityHours + " hours.";
      }

      var updateDateValidity = function () {
        if (!bookingDate) {
          return;
        }

        bookingDate.setCustomValidity(
          bookingDate.value && bookingDate.value < todayIso
            ? "Choose today or a future date."
            : ""
        );
      };

      var updateHoursValidity = function () {
        if (!bookingHours) {
          return;
        }

        var hours = bookingHours.value === "" ? NaN : Number(bookingHours.value);
        var message = "";

        if (bookingHours.value === "") {
          message = "Enter the number of hours you need.";
        } else if (!isFinite(hours) || hours < 1) {
          message = "Requested hours must be at least 1.";
        } else if (hours > currentMachine.capacityHours) {
          message =
            "This listing has only " + currentMachine.capacityHours +
            " hours/day available.";
        } else if (Math.floor(hours) !== hours) {
          message = "Use whole hours.";
        }

        bookingHours.setCustomValidity(message);
      };

      var updateEstimate = function () {
        if (!bookingEstimate || !bookingHours) {
          return;
        }

        var hours = bookingHours.value === "" ? NaN : Number(bookingHours.value);

        if (!isFinite(hours) || hours < 1) {
          bookingEstimate.textContent = "—";
          return;
        }

        bookingEstimate.textContent = formatRupees(currentMachine.rate * hours);
      };

      var validateBookingField = function (field) {
        if (!field || !field.willValidate) {
          return true;
        }

        var isValid = field.checkValidity();
        field.classList.toggle("is-invalid", !isValid);
        field.setAttribute("aria-invalid", isValid ? "false" : "true");
        return isValid;
      };

      var onBookingFieldChange = function (event) {
        var field = event.target;

        if (!field.matches || !field.matches("input, select, textarea")) {
          return;
        }

        if (field === bookingDate) {
          updateDateValidity();
        }

        if (field === bookingHours) {
          updateHoursValidity();
          updateEstimate();
        }

        if (field.classList.contains("is-invalid")) {
          validateBookingField(field);
        }

        if (bookingFeedback && !bookingFeedback.hidden) {
          bookingFeedback.hidden = true;
        }
      };

      if (bookingForm) {
        bookingForm.addEventListener("submit", function (event) {
          event.preventDefault();

          updateDateValidity();
          updateHoursValidity();

          var firstInvalid = null;

          bookingFields.forEach(function (field) {
            var isValid = validateBookingField(field);

            if (!isValid && !firstInvalid) {
              firstInvalid = field;
            }
          });

          if (firstInvalid) {
            if (bookingFeedback) {
              bookingFeedback.hidden = true;
            }

            firstInvalid.focus();
            showPreviewNotice("Please correct the highlighted fields. Nothing was sent or saved.");
            return;
          }

          if (bookingFeedback) {
            bookingFeedback.hidden = false;
            bookingFeedback.focus();
          }

          showPreviewNotice(
            "The booking form passed local validation. Nothing was sent, stored, or booked."
          );
        });

        bookingForm.addEventListener("input", onBookingFieldChange);
        bookingForm.addEventListener("change", onBookingFieldChange);
      }

      updateDateValidity();
      updateHoursValidity();
      updateEstimate();
      machineDetailView.hidden = false;
    }
  }

  /* ------------------------------------------------------------------------
     Login and registration pages (Phase 2.6)
     Password visibility, role switching, and local form validation only.
     No authentication, account creation, session, password recovery, or
     storage is connected to these interfaces.
     ------------------------------------------------------------------------ */
  var setPasswordVisibility = function (toggle, show) {
    var targetId = toggle.getAttribute("aria-controls");
    var input = targetId ? document.getElementById(targetId) : null;

    if (!input) {
      return;
    }

    input.type = show ? "text" : "password";
    toggle.setAttribute("aria-pressed", show ? "true" : "false");
    toggle.setAttribute("aria-label", show ? "Hide password" : "Show password");

    var icon = toggle.querySelector("i");
    if (icon) {
      icon.classList.toggle("fa-eye", !show);
      icon.classList.toggle("fa-eye-slash", show);
    }
  };

  document.querySelectorAll("[data-password-toggle]").forEach(function (toggle) {
    toggle.addEventListener("click", function () {
      var targetId = toggle.getAttribute("aria-controls");
      var input = targetId ? document.getElementById(targetId) : null;

      if (input) {
        setPasswordVisibility(toggle, input.type === "password");
      }
    });
  });

  var resetPasswordToggles = function (root) {
    root.querySelectorAll("[data-password-toggle]").forEach(function (toggle) {
      setPasswordVisibility(toggle, false);
    });
  };

  var getAuthError = function (field) {
    return field && field.id ? document.getElementById(field.id + "-error") : null;
  };

  var setAuthFieldError = function (field, message) {
    var error = getAuthError(field);

    field.classList.add("is-invalid");
    field.setAttribute("aria-invalid", "true");

    if (error) {
      if (message) {
        error.textContent = message;
      }
      error.hidden = false;
    }
  };

  var clearAuthFieldError = function (field) {
    field.classList.remove("is-invalid");
    field.removeAttribute("aria-invalid");

    var error = getAuthError(field);
    if (error) {
      error.hidden = true;
    }
  };

  var getAuthErrorMessage = function (field, key, fallback) {
    return field.getAttribute("data-error-" + key) || fallback;
  };

  var validateAuthField = function (field) {
    if (!field || !field.willValidate || field.name === "role") {
      return true;
    }

    var value = field.value ? field.value.trim() : "";
    var requiredMessage = getAuthErrorMessage(
      field,
      "required",
      "Complete this required field."
    );
    var invalidMessage = getAuthErrorMessage(
      field,
      "invalid",
      "Enter a valid value."
    );
    var errorMessage = "";

    if (field.type === "checkbox") {
      if (field.required && !field.checked) {
        errorMessage = requiredMessage;
      }
    } else if (!value && field.required) {
      errorMessage = requiredMessage;
    } else if (!field.checkValidity()) {
      errorMessage = invalidMessage;
    }

    if (errorMessage) {
      setAuthFieldError(field, errorMessage);
      return false;
    }

    clearAuthFieldError(field);
    return true;
  };

  var validateAuthConfirmation = function (form) {
    var confirmField = form.querySelector("[data-password-confirm]");
    if (!confirmField || confirmField.disabled) {
      return true;
    }

    var passwordField = form.querySelector("[data-password-primary]");
    var requiredMessage = getAuthErrorMessage(
      confirmField,
      "required",
      "Confirm your password."
    );
    var mismatchMessage = getAuthErrorMessage(
      confirmField,
      "mismatch",
      "Passwords do not match."
    );

    if (!confirmField.value) {
      setAuthFieldError(confirmField, requiredMessage);
      return false;
    }

    if (passwordField && confirmField.value !== passwordField.value) {
      setAuthFieldError(confirmField, mismatchMessage);
      return false;
    }

    clearAuthFieldError(confirmField);
    return true;
  };

  var hideAuthSuccess = function (success) {
    if (success) {
      success.hidden = true;
    }
  };

  var setupAuthForm = function (form, successId, options) {
    var success = document.getElementById(successId);
    var fields = form.querySelectorAll("input, select, textarea");
    var roleFieldset = options && options.roleFieldset ? options.roleFieldset : null;
    var roleError = roleFieldset
      ? roleFieldset.querySelector(".auth-field-error")
      : null;
    var roleInputs = roleFieldset
      ? roleFieldset.querySelectorAll('input[name="role"]')
      : [];
    var rolePanels = form.querySelectorAll("[data-role-panel]");

    var clearRoleError = function () {
      if (!roleFieldset) {
        return;
      }

      roleFieldset.classList.remove("is-invalid");
      roleFieldset.removeAttribute("aria-invalid");

      roleInputs.forEach(function (input) {
        input.classList.remove("is-invalid");
        input.removeAttribute("aria-invalid");
      });

      if (roleError) {
        roleError.hidden = true;
      }
    };

    var updateRolePanels = function (role) {
      rolePanels.forEach(function (panel) {
        var isActive = panel.getAttribute("data-role-panel") === role;

        panel.hidden = !isActive;

        if (panel.tagName === "FIELDSET") {
          panel.disabled = !isActive;
        }

        if (!isActive) {
          panel
            .querySelectorAll("input, select, textarea")
            .forEach(clearAuthFieldError);
        }
      });

      clearRoleError();
    };

    var validateRole = function () {
      if (!roleFieldset) {
        return true;
      }

      var selected = roleFieldset.querySelector('input[name="role"]:checked');

      if (selected) {
        clearRoleError();
        return true;
      }

      roleFieldset.classList.add("is-invalid");
      roleFieldset.setAttribute("aria-invalid", "true");

      roleInputs.forEach(function (input) {
        input.classList.add("is-invalid");
        input.setAttribute("aria-invalid", "true");
      });

      if (roleError) {
        roleError.hidden = false;
      }

      return false;
    };

    if (roleFieldset) {
      if (options && options.requestedRole) {
        var requestedInput = roleFieldset.querySelector(
          'input[name="role"][value="' + options.requestedRole + '"]'
        );

        if (requestedInput) {
          requestedInput.checked = true;
        }
      }

      var selectedRole = roleFieldset.querySelector('input[name="role"]:checked');
      updateRolePanels(selectedRole ? selectedRole.value : null);

      roleFieldset.addEventListener("change", function (event) {
        if (!event.target.matches('input[name="role"]')) {
          return;
        }

        updateRolePanels(event.target.value);
        hideAuthSuccess(success);
      });
    }

    var handleAuthFieldChange = function (event) {
      var field = event.target;

      if (!field.matches("input, select, textarea") || field.name === "role") {
        return;
      }

      hideAuthSuccess(success);

      if (field.matches("[data-password-primary]")) {
        var confirmField = form.querySelector("[data-password-confirm]");

        if (confirmField && confirmField.classList.contains("is-invalid")) {
          validateAuthConfirmation(form);
        }
      }

      if (field.classList.contains("is-invalid")) {
        if (field.matches("[data-password-confirm]")) {
          validateAuthConfirmation(form);
        } else {
          validateAuthField(field);
        }
      }
    };

    form.addEventListener("input", handleAuthFieldChange);
    form.addEventListener("change", handleAuthFieldChange);

    form.addEventListener("submit", function (event) {
      event.preventDefault();
      hideAuthSuccess(success);

      var firstInvalid = null;

      if (roleFieldset && !validateRole()) {
        firstInvalid = roleFieldset.querySelector('input[name="role"]');
      }

      fields.forEach(function (field) {
        if (field.name === "role") {
          return;
        }

        var isValid = field.matches("[data-password-confirm]")
          ? validateAuthConfirmation(form)
          : validateAuthField(field);

        if (!isValid && !firstInvalid) {
          firstInvalid = field;
        }
      });

      if (firstInvalid) {
        firstInvalid.focus();
        showPreviewNotice(
          "Please correct the highlighted fields. Nothing was submitted or saved."
        );
        return;
      }

      if (success) {
        success.hidden = false;
        success.focus();
      }

      showPreviewNotice(options.successMessage);
    });

    form.addEventListener("reset", function () {
      window.setTimeout(function () {
        fields.forEach(clearAuthFieldError);
        hideAuthSuccess(success);

        updateRolePanels(null);
        resetPasswordToggles(form);
        hideToast();
      }, 0);
    });
  };

  var loginForm = document.getElementById("login-form");
  if (loginForm) {
    setupAuthForm(loginForm, "login-success", {
      successMessage:
        "The login form passed local validation. No account was checked and no session was created."
    });
  }

  var registerForm = document.getElementById("register-form");
  if (registerForm) {
    var registerRoleFieldset = document.getElementById("register-role-fieldset");
    var requestedRole = new window.URLSearchParams(window.location.search).get(
      "role"
    );

    if (requestedRole !== "owner" && requestedRole !== "buyer") {
      requestedRole = null;
    }

    setupAuthForm(registerForm, "register-success", {
      roleFieldset: registerRoleFieldset,
      requestedRole: requestedRole,
      successMessage:
        "The registration form passed local validation. No account was created and nothing was stored or sent."
    });
  }

  /* ------------------------------------------------------------------------
     Contact page form
     Local validation only. The prototype form is not connected to a live
     messaging system, so nothing is submitted, stored, or delivered.
     ------------------------------------------------------------------------ */
  var contactForm = document.getElementById("contact-form");
  if (contactForm) {
    var contactSuccess = document.getElementById("contact-form-success");
    var contactFields = contactForm.querySelectorAll("input, select, textarea");

    var setContactFieldState = function (field) {
      var hasValue = field.value.trim() !== "";
      var isValid = hasValue && field.checkValidity();

      field.classList.toggle("is-invalid", !isValid);
      field.setAttribute("aria-invalid", isValid ? "false" : "true");
      return isValid;
    };

    var clearContactFieldState = function (field) {
      field.classList.remove("is-invalid");
      field.removeAttribute("aria-invalid");
    };

    contactForm.addEventListener("submit", function (event) {
      event.preventDefault();

      var firstInvalid = null;

      contactFields.forEach(function (field) {
        var isValid = setContactFieldState(field);
        if (!isValid && !firstInvalid) {
          firstInvalid = field;
        }
      });

      if (firstInvalid) {
        if (contactSuccess) {
          contactSuccess.hidden = true;
        }

        firstInvalid.focus();
        showPreviewNotice(
          "Please correct the highlighted fields. Nothing was sent or stored."
        );
        return;
      }

      if (contactSuccess) {
        contactSuccess.hidden = false;
        contactSuccess.focus();
      }

      showPreviewNotice(
        "The form passed local validation, but no message was sent or stored."
      );
    });

    contactForm.addEventListener("input", function (event) {
      if (event.target.matches("input, select, textarea")) {
        if (contactSuccess && !contactSuccess.hidden) {
          contactSuccess.hidden = true;
        }

        if (event.target.classList.contains("is-invalid")) {
          setContactFieldState(event.target);
        }
      }
    });

    contactForm.addEventListener("change", function (event) {
      if (
        event.target.matches("input, select, textarea") &&
        event.target.classList.contains("is-invalid")
      ) {
        setContactFieldState(event.target);
      }
    });

    contactForm.addEventListener("reset", function () {
      window.setTimeout(function () {
        contactFields.forEach(clearContactFieldState);
        if (contactSuccess) {
          contactSuccess.hidden = true;
        }
        hideToast();
      }, 0);
    });
  }

  /* ------------------------------------------------------------------------
     Design-foundation form validation demo
     This validates locally for interface testing. It does not submit, store,
     or transmit anything.
     ------------------------------------------------------------------------ */
  var demoForm = document.getElementById("styleguide-form");
  if (demoForm) {
    var demoSuccess = document.getElementById("demo-form-success");
    var demoFields = demoForm.querySelectorAll("input, select, textarea");

    var setFieldState = function (field) {
      if (!field.willValidate) {
        return true;
      }

      var isValid = field.checkValidity();
      field.classList.toggle("is-invalid", !isValid);
      field.setAttribute("aria-invalid", isValid ? "false" : "true");
      return isValid;
    };

    var clearFieldState = function (field) {
      field.classList.remove("is-invalid");
      field.removeAttribute("aria-invalid");
    };

    demoForm.addEventListener("submit", function (event) {
      event.preventDefault();

      var firstInvalid = null;

      demoFields.forEach(function (field) {
        var isValid = setFieldState(field);
        if (!isValid && !firstInvalid) {
          firstInvalid = field;
        }
      });

      if (firstInvalid) {
        if (demoSuccess) {
          demoSuccess.hidden = true;
        }

        firstInvalid.focus();
        showPreviewNotice("Please correct the highlighted fields. Nothing was sent or saved.");
        return;
      }

      if (demoSuccess) {
        demoSuccess.hidden = false;
        demoSuccess.focus();
      }

      showPreviewNotice("Validation passed. This is a preview form, so nothing was sent or saved.");
    });

    demoForm.addEventListener("input", function (event) {
      if (event.target.matches("input, select, textarea") && event.target.classList.contains("is-invalid")) {
        setFieldState(event.target);
      }
    });

    demoForm.addEventListener("change", function (event) {
      if (event.target.matches("input, select, textarea") && event.target.classList.contains("is-invalid")) {
        setFieldState(event.target);
      }
    });

    demoForm.addEventListener("reset", function () {
      window.setTimeout(function () {
        demoFields.forEach(clearFieldState);
        if (demoSuccess) {
          demoSuccess.hidden = true;
        }
      }, 0);
    });
  }

  /* ------------------------------------------------------------------------
     Admin Dashboard Prototype (Phase 3.1)
     Sidebar toggle, sample approval actions, demo booking details, and prototype
     feedback. No database or real backend is connected.
     ------------------------------------------------------------------------ */
  var dashboard = document.querySelector(".dashboard-layout");
  if (dashboard) {
    /* Wide dashboard tables scroll inside their own wrapper. The hint and
       keyboard arrow support are shared by all three role dashboards. */
    var dashboardTableHints = dashboard.querySelectorAll(".table-scroll-hint");
    var dashboardTableWrappers = dashboard.querySelectorAll(".table-responsive");
    var updateDashboardTableHints = function () {
      dashboardTableHints.forEach(function (hint) {
        var tableWrapper = hint.nextElementSibling;
        var isScrollable =
          tableWrapper &&
          tableWrapper.classList.contains("table-responsive") &&
          tableWrapper.scrollWidth > tableWrapper.clientWidth;
        hint.hidden = !isScrollable;
        if (
          tableWrapper &&
          tableWrapper.classList.contains("table-responsive")
        ) {
          tableWrapper.tabIndex = isScrollable ? 0 : -1;
        }
      });
    };

    dashboardTableWrappers.forEach(function (tableWrapper) {
      tableWrapper.addEventListener("keydown", function (event) {
        if (tableWrapper.scrollWidth <= tableWrapper.clientWidth) {
          return;
        }

        if (event.key === "ArrowRight" || event.key === "ArrowLeft") {
          event.preventDefault();
          tableWrapper.scrollLeft +=
            (event.key === "ArrowRight" ? 1 : -1) *
            Math.max(80, tableWrapper.clientWidth * 0.8);
        }
      });
    });

    updateDashboardTableHints();
    window.addEventListener("load", updateDashboardTableHints);
    window.addEventListener("resize", updateDashboardTableHints);

    // Sidebar responsive toggle
    var sidebar = document.getElementById("dashboard-sidebar");
    var backdrop = document.getElementById("dashboard-backdrop");
    var dashboardMain = dashboard.querySelector(".dashboard-main");
    var toggleBtns = document.querySelectorAll("[data-sidebar-toggle]");
    var closeBtn = document.querySelector("[data-sidebar-close]");
    var isMobileSidebar = function () {
      return window.matchMedia("(max-width: 991.98px)").matches;
    };

    /* Keep the off-canvas drawer out of the tab order and accessibility tree
       while it is closed, and make the page behind it inert while it is open. */
    var syncSidebarAccessibility = function () {
      if (sidebar) {
        if (isMobileSidebar() && !sidebar.classList.contains("is-open")) {
          sidebar.setAttribute("inert", "");
        } else {
          sidebar.removeAttribute("inert");
        }
      }
      if (dashboardMain) {
        if (isMobileSidebar() && sidebar && sidebar.classList.contains("is-open")) {
          dashboardMain.setAttribute("inert", "");
        } else {
          dashboardMain.removeAttribute("inert");
        }
      }
    };

    var openSidebar = function () {
      if (sidebar) {
        sidebar.classList.add("is-open");
      }
      if (backdrop) {
        backdrop.classList.add("is-open");
      }
      toggleBtns.forEach(function (btn) {
        btn.setAttribute("aria-expanded", "true");
      });
      document.body.style.overflow = "hidden";
      syncSidebarAccessibility();
      if (closeBtn) {
        closeBtn.focus();
      }
    };

    var closeSidebar = function (restoreFocus) {
      var wasOpen = sidebar && sidebar.classList.contains("is-open");
      if (!wasOpen) {
        syncSidebarAccessibility();
        return;
      }
      if (sidebar) {
        sidebar.classList.remove("is-open");
      }
      if (backdrop) {
        backdrop.classList.remove("is-open");
      }
      toggleBtns.forEach(function (btn) {
        btn.setAttribute("aria-expanded", "false");
      });
      document.body.style.overflow = "";
      syncSidebarAccessibility();
      if (restoreFocus && isMobileSidebar() && toggleBtns[0]) {
        toggleBtns[0].focus();
      }
    };

    toggleBtns.forEach(function (btn) {
      btn.addEventListener("click", function () {
        var isOpen = sidebar && sidebar.classList.contains("is-open");
        if (isOpen) {
          closeSidebar(true);
        } else {
          openSidebar();
        }
      });
    });

    if (closeBtn) {
      closeBtn.addEventListener("click", function () {
        closeSidebar(true);
      });
    }

    if (backdrop) {
      backdrop.addEventListener("click", function () {
        closeSidebar(true);
      });
    }

    if (sidebar) {
      sidebar
        .querySelectorAll(
          "a, [data-bs-toggle='modal'], [data-bs-toggle='offcanvas'], [data-management-preview], [data-action]"
        )
        .forEach(function (link) {
          link.addEventListener("click", function () {
            closeSidebar(false);
          });
        });
    }

    syncSidebarAccessibility();

    window.addEventListener("resize", function () {
      if (!isMobileSidebar()) {
        closeSidebar(false);
      }
      syncSidebarAccessibility();
    });

    window.addEventListener("keydown", function (event) {
      if (event.key === "Escape" && sidebar && sidebar.classList.contains("is-open")) {
        closeSidebar(true);
      }
    });

    if (dashboard.id === "buyer-dashboard") {
      var buyerBookingRows = Array.prototype.slice.call(
        dashboard.querySelectorAll("[data-buyer-booking]")
      );
      var buyerStatusFilters = dashboard.querySelectorAll("[data-booking-filter]");
      var buyerBookingSummary = document.getElementById("buyer-bookings-summary");
      var buyerMachineDetails = {
        "1": {
          name: "Haas CNC Turning Machine ST-20",
          owner: "Patel Engineering · Rajkot"
        },
        "2": {
          name: "Vertical Machining Centre",
          owner: "Sample Precision Works · Coimbatore"
        },
        "3": {
          name: "Hydraulic Press Brake",
          owner: "Sample Fabrication Co. · Pune"
        }
      };

      var setBuyerBookingFilter = function (status) {
        var visibleCount = 0;
        buyerBookingRows.forEach(function (row) {
          var isVisible = status === "all" || row.getAttribute("data-status") === status;
          row.hidden = !isVisible;
          if (isVisible) {
            visibleCount += 1;
          }
        });

        buyerStatusFilters.forEach(function (filter) {
          var isSelected =
            filter.getAttribute("data-booking-filter") === status;
          filter.classList.toggle("is-selected", isSelected);
          filter.setAttribute("aria-pressed", isSelected ? "true" : "false");
        });

        if (buyerBookingSummary) {
          buyerBookingSummary.textContent =
            status === "all"
              ? "Showing all " + visibleCount + " bookings."
              : visibleCount === 0
                ? "No bookings currently have status “" + status + "”."
                : "Showing " + visibleCount + " booking" +
                  (visibleCount === 1 ? "" : "s") + " with status “" + status + "”.";
        }
      };

      buyerStatusFilters.forEach(function (filter) {
        filter.addEventListener("click", function () {
          setBuyerBookingFilter(filter.getAttribute("data-booking-filter"));
        });
      });

      dashboard.querySelectorAll("[data-booking-filter-link]").forEach(function (link) {
        link.addEventListener("click", function () {
          setBuyerBookingFilter(link.getAttribute("data-booking-filter-link"));
        });
      });

      var buyerBookingModalElement = document.getElementById(
        "buyer-booking-details-modal"
      );
      var buyerBookingModal =
        buyerBookingModalElement && window.bootstrap
          ? new window.bootstrap.Modal(buyerBookingModalElement)
          : null;

      dashboard.querySelectorAll("[data-buyer-view-booking]").forEach(function (button) {
        button.addEventListener("click", function () {
          var bookingId = button.getAttribute("data-buyer-view-booking");
          var row = dashboard.querySelector(
            '[data-buyer-booking][data-booking-id="' + bookingId + '"]'
          );
          var machine = row && buyerMachineDetails[row.getAttribute("data-machine-id")];

          if (!row || !machine) {
            showPreviewNotice("This booking detail is unavailable.");
            return;
          }

          var setBuyerDetail = function (id, value) {
            var element = document.getElementById(id);
            if (element) {
              element.textContent = value;
            }
          };

          var amount = Number(row.getAttribute("data-amount"));
          var hours = row.getAttribute("data-hours");
          var bookingStatus = row.getAttribute("data-status");
          var paymentStatus = row.getAttribute("data-payment");
          setBuyerDetail("buyer-detail-id", bookingId);
          setBuyerDetail("buyer-detail-machine", machine.name);
          setBuyerDetail("buyer-detail-owner", machine.owner);
          setBuyerDetail("buyer-detail-date", row.getAttribute("data-date"));
          setBuyerDetail("buyer-detail-hours", hours + (hours === "1" ? " hour" : " hours"));
          setBuyerDetail(
            "buyer-detail-amount",
            "₹" + new Intl.NumberFormat("en-IN").format(amount)
          );
          setBuyerDetail("buyer-detail-status", bookingStatus);
          setBuyerDetail(
            "buyer-detail-payment",
            paymentStatus === "none" ? "No payment record" : paymentStatus
          );

          var nextStepMessages = {
            pending: "Await the machine owner’s decision. Payment is not due before acceptance.",
            accepted: "The owner accepted this request. Payment follows acceptance; it is not confirmed until payment succeeds.",
            payment_pending: "Owner acceptance is recorded, but payment is pending. This booking is not confirmed.",
            confirmed: "Payment succeeded and the booking is confirmed. Work has not yet started.",
            in_progress: "Payment succeeded and the owner has marked this booking in progress.",
            completed: "Work is complete. A review is allowed only if this booking has not already been reviewed.",
            rejected: "This request was rejected. No payment record was created.",
            cancelled: "Cancellation policy and permitted transitions are not configured."
          };
          var nextStep = document.getElementById("buyer-detail-next-step");
          if (nextStep) {
            nextStep.textContent = nextStepMessages[bookingStatus] ||
              "No live booking action is available.";
          }

          if (buyerBookingModal) {
            buyerBookingModal.show();
          }
        });
      });

      var buyerReviewForm = document.getElementById("review-form");
      if (buyerReviewForm) {
        buyerReviewForm.addEventListener("submit", function (event) {
          event.preventDefault();
          var reviewBookingId = buyerReviewForm.getAttribute("data-review-booking");
          var reviewBooking = dashboard.querySelector(
            '[data-buyer-booking][data-booking-id="' + reviewBookingId + '"]'
          );
          var rating = buyerReviewForm.querySelector(
            'input[name="buyer-rating"]:checked'
          );
          var comment = document.getElementById("buyer-review-comment");
          var feedback = document.getElementById("buyer-review-feedback");

          if (
            !reviewBooking ||
            reviewBooking.getAttribute("data-status") !== "completed" ||
            reviewBooking.getAttribute("data-review") !== "eligible"
          ) {
            showPreviewNotice(
              "Only a completed, not-yet-reviewed booking can receive a review."
            );
            return;
          }

          if (!rating || !comment || !comment.value.trim()) {
            buyerReviewForm.reportValidity();
            return;
          }

          reviewBooking.setAttribute("data-review", "preview-submitted");
          var requestRow = dashboard.querySelector(
            '[data-buyer-booking][data-booking-id="' + reviewBookingId + '"]'
          );
          var reviewLink =
            requestRow && requestRow.querySelector("[data-review-open]");
          if (reviewLink) {
            var reviewNote = document.createElement("span");
            reviewNote.className = "table-cell-subtext";
            reviewNote.textContent = "Review submitted";
            reviewLink.replaceWith(reviewNote);
          }

          var completedRow = dashboard.querySelector(
            '[data-buyer-completed="' + reviewBookingId + '"]'
          );
          var completedReviewStatus =
            completedRow && completedRow.querySelector("[data-review-status]");
          if (completedReviewStatus) {
            completedReviewStatus.className = "status-badge status-successful";
            completedReviewStatus.innerHTML =
              '<i class="fa-solid fa-star" aria-hidden="true"></i> Reviewed';
          }

          var completedReviewAction =
            completedRow && completedRow.querySelector("[data-review-action]");
          if (completedReviewAction) {
            var completedNote = document.createElement("span");
            completedNote.className = "table-cell-subtext";
            completedNote.textContent = "Submitted";
            completedReviewAction.replaceWith(completedNote);
          }

          var reviewSummary = document.getElementById("buyer-review-summary");
          if (reviewSummary) {
            reviewSummary.textContent = "2 submitted · 0 awaiting";
          }

          var reviewQueueStatus = document.getElementById(
            "buyer-review-queue-status"
          );
          if (reviewQueueStatus) {
            reviewQueueStatus.className = "status-badge status-successful";
            reviewQueueStatus.innerHTML =
              '<i class="fa-solid fa-circle-check" aria-hidden="true"></i> Review submitted';
          }

          var reviewScoreNote = document.getElementById("buyer-review-score-note");
          if (reviewScoreNote) {
            reviewScoreNote.textContent =
              "Based on the two submitted reviews for this buyer.";
          }

          var reviewSummaryCta = dashboard.querySelector(
            "[data-review-summary-cta]"
          );
          if (reviewSummaryCta) {
            reviewSummaryCta.disabled = true;
            reviewSummaryCta.innerHTML =
              '<i class="fa-solid fa-circle-check" aria-hidden="true"></i> Review submitted';
          }

          buyerReviewForm.querySelectorAll("input, textarea, button").forEach(function (field) {
            field.disabled = true;
          });
          if (feedback) {
            feedback.hidden = false;
            feedback.textContent =
              "Your " + rating.value + "-star review is shown as submitted for " +
              reviewBookingId + " on this page. Nothing was stored or sent.";
          }
        });
      }

      var buyerLogoutModalElement = document.getElementById("buyer-logout-modal");
      var buyerLogoutModal =
        buyerLogoutModalElement && window.bootstrap
          ? new window.bootstrap.Modal(buyerLogoutModalElement)
          : null;
      document.querySelectorAll("[data-action='buyer-logout']").forEach(function (button) {
        button.addEventListener("click", function () {
          if (buyerLogoutModal) {
            buyerLogoutModal.show();
          }
        });
      });

      var buyerLogoutConfirm = document.getElementById("buyer-logout-confirm");
      if (buyerLogoutConfirm) {
        buyerLogoutConfirm.addEventListener("click", function () {
          if (buyerLogoutModal) {
            buyerLogoutModal.hide();
          }
          window.location.href = "login.html";
        });
      }
    }

    // Sample Machine Approvals Data Store (Prototype Demo)
    var sampleMachines = {
      "M-1014": {
        id: "M-1014",
        name: "ACE Micromatic VMC 850V",
        company: "Apex Precision Works, Ahmedabad",
        type: "3-Axis Vertical Machining Center (VMC)",
        rate: "₹1,200/hr",
        capacity: "6 hrs/day",
        envelope: "X: 850 mm, Y: 500 mm, Z: 500 mm",
        specs: "Spindle: 8,000 RPM · Accuracy: ±0.005 mm · Tool Capacity: 24 ATC · Table Size: 1000 × 500 mm",
        material: "Steel, Stainless Steel, Aluminium, Brass",
        submitted: "Today, 09:30 AM",
        status: "pending",
        photos: "4 photos provided",
        verificationNotes: "GST and company registration verified. Owner capacity schedule submitted."
      },
      "M-1015": {
        id: "M-1015",
        name: "Lokesh Heavy Duty Industrial Lathe 260",
        company: "Shree Shakti Engineering, Vadodara",
        type: "Industrial Conventional Lathe",
        rate: "₹650/hr",
        capacity: "8 hrs/day",
        envelope: "Max Diameter: 520 mm, Max Length: 1500 mm",
        specs: "Spindle Bore: 80 mm · Motor: 7.5 HP · Speed Range: 16 to 1200 RPM",
        material: "Mild Steel, Alloy Steel, Cast Iron",
        submitted: "Today, 11:15 AM",
        status: "pending",
        photos: "3 photos provided",
        verificationNotes: "Workshop address confirmed. Tooling specifications provided."
      },
      "M-1016": {
        id: "M-1016",
        name: "Jyoti CNC Turning Center DX-200",
        company: "Kiran Toolcraft, Rajkot",
        type: "CNC Turning Center",
        rate: "₹950/hr",
        capacity: "5 hrs/day",
        envelope: "Max Turning Dia: 320 mm, Max Length: 600 mm",
        specs: "Spindle Speed: 4,000 RPM · Chuck Size: 200 mm · 8 Station Turret",
        material: "Steel, Aluminium, Copper Alloys",
        submitted: "Yesterday, 04:45 PM",
        status: "pending",
        photos: "5 photos provided",
        verificationNotes: "Past batch calibration certificates attached."
      }
    };

    // Pending count state
    var pendingCount = 12;
    var updatePendingDisplays = function () {
      var badgeSidebar = document.getElementById("sidebar-pending-badge");
      var statPending = document.getElementById("stat-pending-approvals");
      var countLabel = document.getElementById("pending-approvals-count");

      if (badgeSidebar) {
        badgeSidebar.textContent = pendingCount;
      }
      if (statPending) {
        statPending.textContent = pendingCount;
      }
      if (countLabel) {
        countLabel.textContent = pendingCount + " pending review";
      }
    };

    // View Machine Details Modal
    var viewMachineModalEl = document.getElementById("modal-view-machine");
    var viewMachineModal = viewMachineModalEl && window.bootstrap ? new window.bootstrap.Modal(viewMachineModalEl) : null;

    document.querySelectorAll("[data-action='view-machine']").forEach(function (btn) {
      btn.addEventListener("click", function () {
        var machineId = btn.getAttribute("data-machine-id");
        var m = sampleMachines[machineId];
        if (!m) return;

        document.getElementById("vm-title").textContent = m.name;
        document.getElementById("vm-id").textContent = m.id;
        document.getElementById("vm-company").textContent = m.company;
        document.getElementById("vm-type").textContent = m.type;
        document.getElementById("vm-rate").textContent = m.rate;
        document.getElementById("vm-capacity").textContent = m.capacity;
        document.getElementById("vm-envelope").textContent = m.envelope;
        document.getElementById("vm-specs").textContent = m.specs;
        document.getElementById("vm-material").textContent = m.material;
        document.getElementById("vm-submitted").textContent = m.submitted;
        document.getElementById("vm-photos").textContent = m.photos;
        document.getElementById("vm-notes").textContent = m.verificationNotes;

        var statusBadge = document.getElementById("vm-status-badge");
        if (statusBadge) {
          statusBadge.className = "status-badge status-" + m.status;
          var iconClass = m.status === "approved" ? "fa-circle-check" : (m.status === "rejected" ? "fa-circle-xmark" : "fa-clock");
          statusBadge.innerHTML = '<i class="fa-solid ' + iconClass + '" aria-hidden="true"></i> ' + m.status.charAt(0).toUpperCase() + m.status.slice(1);
        }

        if (viewMachineModal) {
          viewMachineModal.show();
        }
      });
    });

    // Approve Machine Modal & Action
    var currentActionMachineId = null;
    var approveMachineModalEl = document.getElementById("modal-approve-machine");
    var approveMachineModal = approveMachineModalEl && window.bootstrap ? new window.bootstrap.Modal(approveMachineModalEl) : null;

    document.querySelectorAll("[data-action='approve-machine']").forEach(function (btn) {
      btn.addEventListener("click", function () {
        currentActionMachineId = btn.getAttribute("data-machine-id");
        var m = sampleMachines[currentActionMachineId];
        if (!m) return;

        var nameEl = document.getElementById("approve-machine-name");
        var idEl = document.getElementById("approve-machine-id");
        if (nameEl) nameEl.textContent = m.name;
        if (idEl) idEl.textContent = m.id;

        if (approveMachineModal) {
          approveMachineModal.show();
        }
      });
    });

    var confirmApproveBtn = document.getElementById("btn-confirm-approve");
    if (confirmApproveBtn) {
      confirmApproveBtn.addEventListener("click", function () {
        if (!currentActionMachineId) return;

        var m = sampleMachines[currentActionMachineId];
        if (m) {
          m.status = "approved";
        }

        var row = document.querySelector("tr[data-machine-id='" + currentActionMachineId + "']");
        if (row) {
          var badgeCell = row.querySelector(".machine-status-cell");
          if (badgeCell) {
            badgeCell.innerHTML = '<span class="status-badge status-approved"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Approved</span>';
          }

          var actionsCell = row.querySelector(".machine-actions-cell");
          if (actionsCell) {
            actionsCell.innerHTML = '<button class="btn-im btn-im-outline btn-im-sm" type="button" data-action="view-machine" data-machine-id="' + currentActionMachineId + '"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button> <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1"><i class="fa-solid fa-check me-1"></i>Approved</span>';
            // Re-bind view action for this button
            var newViewBtn = actionsCell.querySelector("[data-action='view-machine']");
            if (newViewBtn) {
              newViewBtn.addEventListener("click", function () {
                var vm = sampleMachines[currentActionMachineId];
                if (!vm) return;
                document.getElementById("vm-title").textContent = vm.name;
                document.getElementById("vm-id").textContent = vm.id;
                document.getElementById("vm-company").textContent = vm.company;
                document.getElementById("vm-type").textContent = vm.type;
                document.getElementById("vm-rate").textContent = vm.rate;
                document.getElementById("vm-capacity").textContent = vm.capacity;
                document.getElementById("vm-envelope").textContent = vm.envelope;
                document.getElementById("vm-specs").textContent = vm.specs;
                document.getElementById("vm-material").textContent = vm.material;
                document.getElementById("vm-submitted").textContent = vm.submitted;
                document.getElementById("vm-photos").textContent = vm.photos;
                document.getElementById("vm-notes").textContent = vm.verificationNotes;
                var statusBadge = document.getElementById("vm-status-badge");
                if (statusBadge) {
                  statusBadge.className = "status-badge status-approved";
                  statusBadge.innerHTML = '<i class="fa-solid fa-circle-check" aria-hidden="true"></i> Approved';
                }
                if (viewMachineModal) viewMachineModal.show();
              });
            }
          }
        }

        if (pendingCount > 0) {
          pendingCount--;
          updatePendingDisplays();
        }

        if (approveMachineModal) {
          approveMachineModal.hide();
        }

        showPreviewNotice("Machine " + currentActionMachineId + " marked approved locally. In production, listing appears in marketplace after owner activation. No database modified.");
        currentActionMachineId = null;
      });
    }

    // Reject Machine Modal & Action
    var rejectMachineModalEl = document.getElementById("modal-reject-machine");
    var rejectMachineModal = rejectMachineModalEl && window.bootstrap ? new window.bootstrap.Modal(rejectMachineModalEl) : null;

    document.querySelectorAll("[data-action='reject-machine']").forEach(function (btn) {
      btn.addEventListener("click", function () {
        currentActionMachineId = btn.getAttribute("data-machine-id");
        var m = sampleMachines[currentActionMachineId];
        if (!m) return;

        var nameEl = document.getElementById("reject-machine-name");
        var idEl = document.getElementById("reject-machine-id");
        if (nameEl) nameEl.textContent = m.name;
        if (idEl) idEl.textContent = m.id;

        var reasonSelect = document.getElementById("reject-reason-select");
        if (reasonSelect) reasonSelect.value = "Incomplete technical specifications";

        var notesField = document.getElementById("reject-notes-field");
        if (notesField) notesField.value = "";

        if (rejectMachineModal) {
          rejectMachineModal.show();
        }
      });
    });

    var confirmRejectBtn = document.getElementById("btn-confirm-reject");
    if (confirmRejectBtn) {
      confirmRejectBtn.addEventListener("click", function () {
        if (!currentActionMachineId) return;

        var m = sampleMachines[currentActionMachineId];
        if (m) {
          m.status = "rejected";
        }

        var reasonSelect = document.getElementById("reject-reason-select");
        var reason = reasonSelect ? reasonSelect.value : "Documentation requirements not met";

        var row = document.querySelector("tr[data-machine-id='" + currentActionMachineId + "']");
        if (row) {
          var badgeCell = row.querySelector(".machine-status-cell");
          if (badgeCell) {
            badgeCell.innerHTML = '<span class="status-badge status-rejected"><i class="fa-solid fa-circle-xmark" aria-hidden="true"></i> Rejected</span>';
          }

          var actionsCell = row.querySelector(".machine-actions-cell");
          if (actionsCell) {
            actionsCell.innerHTML = '<button class="btn-im btn-im-outline btn-im-sm" type="button" data-action="view-machine" data-machine-id="' + currentActionMachineId + '"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button> <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1"><i class="fa-solid fa-xmark me-1"></i>Rejected</span>';
            var newViewBtn = actionsCell.querySelector("[data-action='view-machine']");
            if (newViewBtn) {
              newViewBtn.addEventListener("click", function () {
                var vm = sampleMachines[currentActionMachineId];
                if (!vm) return;
                document.getElementById("vm-title").textContent = vm.name;
                document.getElementById("vm-id").textContent = vm.id;
                document.getElementById("vm-company").textContent = vm.company;
                document.getElementById("vm-type").textContent = vm.type;
                document.getElementById("vm-rate").textContent = vm.rate;
                document.getElementById("vm-capacity").textContent = vm.capacity;
                document.getElementById("vm-envelope").textContent = vm.envelope;
                document.getElementById("vm-specs").textContent = vm.specs;
                document.getElementById("vm-material").textContent = vm.material;
                document.getElementById("vm-submitted").textContent = vm.submitted;
                document.getElementById("vm-photos").textContent = vm.photos;
                document.getElementById("vm-notes").textContent = vm.verificationNotes;
                var statusBadge = document.getElementById("vm-status-badge");
                if (statusBadge) {
                  statusBadge.className = "status-badge status-rejected";
                  statusBadge.innerHTML = '<i class="fa-solid fa-circle-xmark" aria-hidden="true"></i> Rejected';
                }
                if (viewMachineModal) viewMachineModal.show();
              });
            }
          }
        }

        if (pendingCount > 0) {
          pendingCount--;
          updatePendingDisplays();
        }

        if (rejectMachineModal) {
          rejectMachineModal.hide();
        }

        showPreviewNotice("Machine " + currentActionMachineId + " marked rejected locally (" + reason + "). No database modified.");
        currentActionMachineId = null;
      });
    }

    // Reset Approvals Demo Button
    var resetApprovalsBtn = document.getElementById("btn-reset-approvals");
    if (resetApprovalsBtn) {
      resetApprovalsBtn.addEventListener("click", function () {
        pendingCount = 12;
        updatePendingDisplays();

        // Reset memory
        Object.keys(sampleMachines).forEach(function (id) {
          sampleMachines[id].status = "pending";
          var row = document.querySelector("tr[data-machine-id='" + id + "']");
          if (row) {
            var badgeCell = row.querySelector(".machine-status-cell");
            if (badgeCell) {
              badgeCell.innerHTML = '<span class="status-badge status-pending"><i class="fa-regular fa-clock" aria-hidden="true"></i> Pending</span>';
            }
            var actionsCell = row.querySelector(".machine-actions-cell");
            if (actionsCell) {
              actionsCell.innerHTML = '<button class="btn-im btn-im-outline btn-im-sm" type="button" data-action="view-machine" data-machine-id="' + id + '"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button> <button class="btn-im btn-im-primary btn-im-sm" type="button" data-action="approve-machine" data-machine-id="' + id + '"><i class="fa-solid fa-check" aria-hidden="true"></i> Approve</button> <button class="btn-im btn-im-danger btn-im-sm" type="button" data-action="reject-machine" data-machine-id="' + id + '"><i class="fa-solid fa-xmark" aria-hidden="true"></i> Reject</button>';
            }
          }
        });

        // Re-attach listeners to reset buttons
        setupMachineActions();
        showPreviewNotice("Approvals reset: machine rows restored to pending review status. No database modified.");
      });
    }

    function setupMachineActions() {
      document.querySelectorAll("[data-action='view-machine']").forEach(function (btn) {
        btn.onclick = function () {
          var machineId = btn.getAttribute("data-machine-id");
          var m = sampleMachines[machineId];
          if (!m) return;
          document.getElementById("vm-title").textContent = m.name;
          document.getElementById("vm-id").textContent = m.id;
          document.getElementById("vm-company").textContent = m.company;
          document.getElementById("vm-type").textContent = m.type;
          document.getElementById("vm-rate").textContent = m.rate;
          document.getElementById("vm-capacity").textContent = m.capacity;
          document.getElementById("vm-envelope").textContent = m.envelope;
          document.getElementById("vm-specs").textContent = m.specs;
          document.getElementById("vm-material").textContent = m.material;
          document.getElementById("vm-submitted").textContent = m.submitted;
          document.getElementById("vm-photos").textContent = m.photos;
          document.getElementById("vm-notes").textContent = m.verificationNotes;
          var statusBadge = document.getElementById("vm-status-badge");
          if (statusBadge) {
            statusBadge.className = "status-badge status-" + m.status;
            var iconClass = m.status === "approved" ? "fa-circle-check" : (m.status === "rejected" ? "fa-circle-xmark" : "fa-clock");
            statusBadge.innerHTML = '<i class="fa-solid ' + iconClass + '" aria-hidden="true"></i> ' + m.status.charAt(0).toUpperCase() + m.status.slice(1);
          }
          if (viewMachineModal) viewMachineModal.show();
        };
      });

      document.querySelectorAll("[data-action='approve-machine']").forEach(function (btn) {
        btn.onclick = function () {
          currentActionMachineId = btn.getAttribute("data-machine-id");
          var m = sampleMachines[currentActionMachineId];
          if (!m) return;
          var nameEl = document.getElementById("approve-machine-name");
          var idEl = document.getElementById("approve-machine-id");
          if (nameEl) nameEl.textContent = m.name;
          if (idEl) idEl.textContent = m.id;
          if (approveMachineModal) approveMachineModal.show();
        };
      });

      document.querySelectorAll("[data-action='reject-machine']").forEach(function (btn) {
        btn.onclick = function () {
          currentActionMachineId = btn.getAttribute("data-machine-id");
          var m = sampleMachines[currentActionMachineId];
          if (!m) return;
          var nameEl = document.getElementById("reject-machine-name");
          var idEl = document.getElementById("reject-machine-id");
          if (nameEl) nameEl.textContent = m.name;
          if (idEl) idEl.textContent = m.id;
          if (rejectMachineModal) rejectMachineModal.show();
        };
      });
    }

    // Booking Details Modal
    var sampleBookings = {
      "CS-10025": {
        id: "CS-10025",
        machine: "Haas CNC Turning Machine ST-20",
        buyer: "Apex Auto Components (Rajesh Sharma)",
        owner: "Patel Engineering (Kirit Patel, Rajkot)",
        date: "25 Sep 2026 (10:00 AM – 08:00 PM)",
        hours: "10 hours",
        rate: "₹800/hr",
        total: "₹8,000",
        workDesc: "Turned shafts (mild steel EN8), 150 pieces, precision tolerance ±0.02 mm.",
        drawing: "Shaft_Drawing_RevB.pdf (Drawing attached)",
        status: "completed",
        paymentStatus: "successful",
        txnId: "TXN-88219401"
      },
      "CS-10026": {
        id: "CS-10026",
        machine: "ACE Micromatic VMC 850V",
        buyer: "Metro Engineering Works (Sunil Rao)",
        owner: "Patel Engineering (Rajkot)",
        date: "27 Sep 2026 (08:00 AM – 12:00 AM)",
        hours: "16 hours (2 shifts)",
        rate: "₹1,200/hr",
        total: "₹19,200",
        workDesc: "VMC milling of die plates, aluminium 6061-T6, 20 sets.",
        drawing: "DiePlate_Master_3D.step",
        status: "in_progress",
        paymentStatus: "successful",
        txnId: "TXN-88219445"
      },
      "CS-10027": {
        id: "CS-10027",
        machine: "Haas VF-2 CNC Vertical Milling",
        buyer: "Siddhivinayak Fabricators (Amit Verma)",
        owner: "Patel Engineering (Rajkot)",
        date: "28 Sep 2026 (10:00 AM – 04:00 PM)",
        hours: "6 hours",
        rate: "₹900/hr",
        total: "₹5,400",
        workDesc: "Pocket milling and slotting on fixture baseplates.",
        drawing: "FixtureBase_Drawing.pdf",
        status: "confirmed",
        paymentStatus: "successful",
        txnId: "TXN-88219390"
      },
      "CS-10028": {
        id: "CS-10028",
        machine: "Lokesh Heavy Duty Industrial Lathe",
        buyer: "Kavita Hydraulics (Dharmesh Mehta)",
        owner: "Shree Shakti Engineering (Vadodara)",
        date: "29 Sep 2026 (09:00 AM – 05:00 PM)",
        hours: "8 hours",
        rate: "₹650/hr",
        total: "₹5,200",
        workDesc: "Rough turning of hydraulic cylinder sleeves, 12 pieces.",
        drawing: "Hydraulic_Sleeve_Spec.pdf",
        status: "payment_pending",
        paymentStatus: "pending",
        txnId: "Pending checkout by buyer"
      },
      "CS-10029": {
        id: "CS-10029",
        machine: "Jyoti CNC Turning Center DX-200",
        buyer: "Bhavani Forgings (Nitin Joshi)",
        owner: "Kiran Toolcraft (Rajkot)",
        date: "30 Sep 2026 (08:00 AM – 08:00 PM)",
        hours: "12 hours",
        rate: "₹950/hr",
        total: "₹11,400",
        workDesc: "Forging flange facing and ID boring.",
        drawing: "Flange_Boring_Drawing.dwg",
        status: "accepted",
        paymentStatus: "pending",
        txnId: "Awaiting invoice generation"
      },
      "CS-10030": {
        id: "CS-10030",
        machine: "Haas CNC Turning Machine ST-20",
        buyer: "Delta Gears & Shafts (Vijay Chawla)",
        owner: "Patel Engineering (Rajkot)",
        date: "01 Oct 2026 (02:00 PM – 06:00 PM)",
        hours: "4 hours",
        rate: "₹800/hr",
        total: "₹3,200",
        workDesc: "Test batch machining of small pinion blanks.",
        drawing: "PinionBlank_Test.pdf",
        status: "pending",
        paymentStatus: "pending",
        txnId: "Request not yet accepted"
      }
    };

    var viewBookingModalEl = document.getElementById("modal-view-booking");
    var viewBookingModal = viewBookingModalEl && window.bootstrap ? new window.bootstrap.Modal(viewBookingModalEl) : null;

    document.querySelectorAll("[data-action='view-booking']").forEach(function (btn) {
      btn.addEventListener("click", function () {
        var bookingId = btn.getAttribute("data-booking-id");
        var b = sampleBookings[bookingId];
        if (!b) return;

        document.getElementById("vb-id").textContent = b.id;
        document.getElementById("vb-machine").textContent = b.machine;
        document.getElementById("vb-buyer").textContent = b.buyer;
        document.getElementById("vb-owner").textContent = b.owner;
        document.getElementById("vb-date").textContent = b.date;
        document.getElementById("vb-hours").textContent = b.hours;
        document.getElementById("vb-rate").textContent = b.rate;
        document.getElementById("vb-total").textContent = b.total;
        document.getElementById("vb-desc").textContent = b.workDesc;
        document.getElementById("vb-drawing").textContent = b.drawing;
        document.getElementById("vb-txnid").textContent = b.txnId;

        var statusBadge = document.getElementById("vb-status-badge");
        if (statusBadge) {
          statusBadge.className = "status-badge status-" + b.status.replace(/_/g, "-");
          var statusIcon = b.status === "completed" ? "fa-circle-check" : (b.status === "in_progress" ? "fa-spinner" : (b.status === "confirmed" ? "fa-check" : "fa-clock"));
          statusBadge.innerHTML = '<i class="fa-solid ' + statusIcon + '" aria-hidden="true"></i> ' + b.status.replace(/_/g, " ").toUpperCase();
        }

        var payBadge = document.getElementById("vb-pay-badge");
        if (payBadge) {
          payBadge.className = "status-badge status-" + b.paymentStatus;
          payBadge.innerHTML = '<i class="fa-solid ' + (b.paymentStatus === "successful" ? "fa-circle-check" : "fa-clock") + '" aria-hidden="true"></i> ' + b.paymentStatus.toUpperCase();
        }

        if (viewBookingModal) {
          viewBookingModal.show();
        }
      });
    });

    // Prototype Management Module Buttons
    document.querySelectorAll("[data-management-preview]").forEach(function (btn) {
      btn.addEventListener("click", function () {
        var name = btn.getAttribute("data-management-preview") || "Management module";
        showPreviewNotice("Screens for " + name + " are not included yet. The admin dashboard currently provides top-level monitoring.");
      });
    });

    // Prototype Notifications Offcanvas / Clear All
    var markReadBtn = document.getElementById("btn-mark-notifications-read");
    if (markReadBtn) {
      markReadBtn.addEventListener("click", function () {
        document.querySelectorAll(".notification-item.unread").forEach(function (item) {
          item.classList.remove("unread");
        });
        var dot = document.querySelector(".topbar-badge-dot");
        if (dot) {
          dot.style.display = "none";
        }
        var countBadge = document.getElementById("notifications-count-badge");
        if (countBadge) {
          countBadge.textContent = "0 unread";
        }
        var notificationTrigger = document.querySelector(
          '.dashboard-topbar [data-bs-target="#notifications-offcanvas"]'
        );
        if (notificationTrigger) {
          notificationTrigger.setAttribute("aria-label", "Open notifications");
        }
        showPreviewNotice("Notifications marked as read for this session.");
      });
    }

    // Admin Logout Prototype Modal
    var logoutModalEl = document.getElementById("modal-admin-logout");
    var logoutModal = logoutModalEl && window.bootstrap ? new window.bootstrap.Modal(logoutModalEl) : null;

    document.querySelectorAll("[data-action='admin-logout']").forEach(function (btn) {
      btn.addEventListener("click", function () {
        if (logoutModal) {
          logoutModal.show();
        }
      });
    });

    var confirmLogoutBtn = document.getElementById("btn-confirm-logout");
    if (confirmLogoutBtn) {
      confirmLogoutBtn.addEventListener("click", function () {
        if (logoutModal) {
          logoutModal.hide();
        }
        showPreviewNotice("Simulating admin sign-out. Returning to login interface...");
        window.setTimeout(function () {
          window.location.href = "login.html";
        }, 800);
      });
    }
  }

  /* ------------------------------------------------------------------------
     Machine Owner Dashboard Prototype (Phase 3.2)
     Machine listings, capacity availability, booking requests acceptance/rejection,
     work progress tracking, completion, and earnings monitoring.
     No real backend or database is connected.
     ------------------------------------------------------------------------ */
  var ownerDashboard = document.getElementById("owner-dashboard");
  if (ownerDashboard) {
    function escapeOwnerHtml(value) {
      return String(value).replace(/[&<>"']/g, function (character) {
        return {
          "&": "&amp;",
          "<": "&lt;",
          ">": "&gt;",
          '"': "&quot;",
          "'": "&#39;"
        }[character];
      });
    }

    // Owner Machine Dataset (Sample Demo Data)
    var ownerMachines = {
      "M-1001": {
        id: "M-1001",
        name: "Haas CNC Turning Machine ST-20",
        type: "CNC Turning",
        brand: "Haas",
        model: "ST-20",
        location: "Rajkot, Gujarat",
        rate: "₹800/hr",
        capacity: "8 hrs/day",
        envelope: "Max Dia: 320 mm · Max Length: 500 mm",
        specs: "Haas CNC Control · 4,000 RPM · 12-Station Turret · Accuracy ±0.01 mm",
        materials: "Mild Steel, Alloy Steel, Aluminium, Brass",
        approved: true,
        status: "active"
      },
      "M-1002": {
        id: "M-1002",
        name: "ACE Micromatic VMC 850V",
        type: "3-Axis VMC",
        brand: "ACE Micromatic",
        model: "VMC-850V",
        location: "Rajkot, Gujarat",
        rate: "₹1,200/hr",
        capacity: "0 hrs/day",
        envelope: "X: 850 mm, Y: 500 mm, Z: 500 mm",
        specs: "Fanuc 0i-MF · 8,000 RPM · 24 ATC · Table 1000 × 500 mm · Accuracy ±0.005 mm",
        materials: "Steel, Stainless Steel, Aluminium 6061/7075",
        approved: true,
        status: "active"
      },
      "M-1003": {
        id: "M-1003",
        name: "Haas VF-2 CNC Vertical Milling",
        type: "CNC Milling",
        brand: "Haas",
        model: "VF-2",
        location: "Rajkot, Gujarat",
        rate: "₹900/hr",
        capacity: "6 hrs/day",
        envelope: "X: 762 mm, Y: 406 mm, Z: 508 mm",
        specs: "Haas Control · 7,500 RPM · 20-Pocket Carousel · Table 914 × 356 mm",
        materials: "Alloy Steel, Cast Iron, Copper",
        approved: true,
        status: "active"
      },
      "M-1004": {
        id: "M-1004",
        name: "Lokesh Heavy Duty Industrial Lathe 260",
        type: "Industrial Lathe",
        brand: "Lokesh Machines",
        model: "260 Heavy",
        location: "Rajkot, Gujarat",
        rate: "₹650/hr",
        capacity: "0 hrs/day (Maintenance)",
        envelope: "Max Turning Dia: 520 mm · Length: 1500 mm",
        specs: "Spindle Bore: 80 mm · 7.5 HP Motor · Lead Screw Accuracy Grade A",
        materials: "Mild Steel, Cast Iron, Forgings",
        approved: true,
        status: "maintenance"
      },
      "M-1005": {
        id: "M-1005",
        name: "Jyoti CNC Turning Center DX-200",
        type: "CNC Turning",
        brand: "Jyoti CNC",
        model: "DX-200",
        location: "Rajkot, Gujarat",
        rate: "₹950/hr",
        capacity: "5 hrs/day (Awaiting Review)",
        envelope: "Max Dia: 320 mm · Length: 600 mm",
        specs: "Siemens 828D · 4,000 RPM · 8 Station Turret · 200 mm Chuck",
        materials: "Aluminium, Steel, Brass",
        approved: false,
        status: "pending"
      }
    };

    // View Machine Modal
    var ownerViewMachineModalEl = document.getElementById("modal-owner-view-machine");
    var ownerViewMachineModal = ownerViewMachineModalEl && window.bootstrap ? new window.bootstrap.Modal(ownerViewMachineModalEl) : null;

    function bindOwnerMachineViewButtons() {
      document.querySelectorAll("[data-action='owner-view-machine']").forEach(function (btn) {
        btn.onclick = function () {
          var id = btn.getAttribute("data-machine-id");
          var m = ownerMachines[id];
          if (!m) return;

          document.getElementById("ovm-id").textContent = m.id;
          document.getElementById("ovm-title").textContent = m.name;
          document.getElementById("ovm-type").textContent = m.type;
          document.getElementById("ovm-brand-model").textContent = m.brand + " (" + m.model + ")";
          document.getElementById("ovm-location").textContent = m.location;
          document.getElementById("ovm-rate").textContent = m.rate;
          document.getElementById("ovm-capacity").textContent = m.capacity;
          document.getElementById("ovm-envelope").textContent = m.envelope;
          document.getElementById("ovm-specs").textContent = m.specs;
          document.getElementById("ovm-materials").textContent = m.materials;

          var badge = document.getElementById("ovm-status-badge");
          if (badge) {
            badge.className = "status-badge status-" + m.status;
            var icon = m.status === "active" ? "fa-circle-check" : (m.status === "pending" ? "fa-clock" : (m.status === "maintenance" ? "fa-wrench" : "fa-circle-pause"));
            badge.innerHTML = '<i class="fa-solid ' + icon + '" aria-hidden="true"></i> ' + m.status.toUpperCase();
          }

          if (ownerViewMachineModal) {
            ownerViewMachineModal.show();
          }
        };
      });
    }
    bindOwnerMachineViewButtons();

    // Edit Machine Modal
    var ownerEditMachineModalEl = document.getElementById("modal-owner-edit-machine");
    var ownerEditMachineModal = ownerEditMachineModalEl && window.bootstrap ? new window.bootstrap.Modal(ownerEditMachineModalEl) : null;
    var currentEditingMachineId = null;

    function bindOwnerMachineEditButtons() {
      document.querySelectorAll("[data-action='owner-edit-machine']").forEach(function (btn) {
        btn.onclick = function () {
          var id = btn.getAttribute("data-machine-id");
          var m = ownerMachines[id];
          if (!m) return;
          currentEditingMachineId = id;

          document.getElementById("edit-m-id").textContent = m.id;
          document.getElementById("edit-m-name").value = m.name;
          document.getElementById("edit-m-rate").value = m.rate.replace(/[^0-9]/g, "");
          document.getElementById("edit-m-capacity").value = m.capacity.replace(/[^0-9]/g, "") || "4";
          document.getElementById("edit-m-specs").value = m.specs;

          if (ownerEditMachineModal) {
            ownerEditMachineModal.show();
          }
        };
      });
    }
    bindOwnerMachineEditButtons();

    var formEditMachine = document.getElementById("form-owner-edit-machine");
    if (formEditMachine) {
      formEditMachine.addEventListener("submit", function (e) {
        e.preventDefault();
        if (!currentEditingMachineId) return;

        var m = ownerMachines[currentEditingMachineId];
        if (m) {
          m.name = document.getElementById("edit-m-name").value.trim() || m.name;
          var newRate = document.getElementById("edit-m-rate").value.trim();
          if (newRate) m.rate = "₹" + newRate + "/hr";
          var newCap = document.getElementById("edit-m-capacity").value.trim();
          if (newCap) m.capacity = newCap + " hrs/day";
          m.specs = document.getElementById("edit-m-specs").value.trim() || m.specs;

          var row = document.querySelector("tr[data-owner-machine-id='" + currentEditingMachineId + "']");
          if (row) {
            var titleEl = row.querySelector(".table-cell-title");
            if (titleEl) titleEl.textContent = m.name;
            var rateEl = row.querySelector(".machine-rate-text");
            if (rateEl) rateEl.textContent = m.rate;
            var capEl = row.querySelector(".machine-capacity-text");
            if (capEl) capEl.textContent = m.capacity;
          }
        }

        if (ownerEditMachineModal) {
          ownerEditMachineModal.hide();
        }

        updateOwnerAvailableCapacity();
        showPreviewNotice("Machine " + currentEditingMachineId + " details updated locally. No database modified.");
        currentEditingMachineId = null;
      });
    }

    // Toggle Active / Deactivate Machine
    var activeMachinesCount = 3;

    function updateOwnerAvailableCapacity() {
      var totalAvailable = 0;
      Object.keys(ownerMachines).forEach(function (id) {
        var machine = ownerMachines[id];
        if (machine.approved && machine.status === "active") {
          totalAvailable += Number((machine.capacity.match(/\d+/) || ["0"])[0]);
        }
      });
      var stat = document.getElementById("stat-owner-available-capacity");
      if (stat) {
        stat.textContent = totalAvailable + " hrs/day";
      }
    }

    function bindOwnerMachineToggleButtons() {
      document.querySelectorAll("[data-action='owner-toggle-active']").forEach(function (btn) {
        btn.onclick = function () {
          var id = btn.getAttribute("data-machine-id");
          var m = ownerMachines[id];
          if (!m) return;

          if (m.status === "pending") {
            showPreviewNotice("Cannot activate listing: Machine " + id + " is awaiting admin review. Only approved machines can be activated for marketplace bookings.");
            return;
          }

          if (m.status === "rejected" || !m.approved) {
            showPreviewNotice("Cannot activate listing: Machine " + id + " has not been approved. Rejected listings cannot receive booking requests.");
            return;
          }

          if (m.status === "approved") {
            showPreviewNotice("Machine " + id + " is approved but not active. Its activation transition is not configured, so it cannot receive booking requests.");
            return;
          }

          if (m.status === "maintenance") {
            showPreviewNotice("Machine " + id + " is scheduled under maintenance. Update maintenance calendar to resume active bookings.");
            return;
          }

          var row = document.querySelector("tr[data-owner-machine-id='" + id + "']");
          var statActive = document.getElementById("stat-owner-active-machines");

          if (m.status === "active") {
            m.status = "inactive";
            if (row) {
              var badgeCell = row.querySelector(".machine-status-cell");
              if (badgeCell) {
                badgeCell.innerHTML = '<span class="status-badge status-inactive"><i class="fa-solid fa-circle-pause me-1" aria-hidden="true"></i> Inactive</span>';
              }
              btn.innerHTML = '<i class="fa-solid fa-play me-1" aria-hidden="true"></i><span>Activate</span>';
              btn.classList.remove("btn-im-outline");
              btn.classList.add("btn-im-secondary");
            }
            if (activeMachinesCount > 0) activeMachinesCount--;
            if (statActive) statActive.textContent = activeMachinesCount;
            showPreviewNotice("Machine " + id + " deactivated locally. It will not receive new booking requests. No database modified.");
          } else if (m.status === "inactive") {
            m.status = "active";
            if (row) {
              var badgeCell = row.querySelector(".machine-status-cell");
              if (badgeCell) {
                badgeCell.innerHTML = '<span class="status-badge status-active"><i class="fa-solid fa-circle-check me-1" aria-hidden="true"></i> Active</span>';
              }
              btn.innerHTML = '<i class="fa-solid fa-pause me-1" aria-hidden="true"></i><span>Deactivate</span>';
              btn.classList.remove("btn-im-secondary");
              btn.classList.add("btn-im-outline");
            }
            activeMachinesCount++;
            if (statActive) statActive.textContent = activeMachinesCount;
            showPreviewNotice("Machine " + id + " activated locally. Open for marketplace booking requests. No database modified.");
          }

          updateOwnerAvailableCapacity();
        };
      });
    }
    bindOwnerMachineToggleButtons();

    // Add Machine Modal & Form Handling
    var addMachineModalEl = document.getElementById("modal-add-machine");
    var addMachineModal = addMachineModalEl && window.bootstrap ? new window.bootstrap.Modal(addMachineModalEl) : null;
    var formAddMachine = document.getElementById("form-add-machine");
    var totalMachinesCount = 5;
    var pendingApprovalsCount = 1;

    if (formAddMachine) {
      formAddMachine.addEventListener("submit", function (e) {
        e.preventDefault();

        var name = document.getElementById("add-m-name").value.trim();
        var type = document.getElementById("add-m-type").value;
        var brand = document.getElementById("add-m-brand").value.trim() || "Custom";
        var model = document.getElementById("add-m-model").value.trim() || "Standard";
        var rate = document.getElementById("add-m-rate").value.trim() || "850";
        var capacity = document.getElementById("add-m-capacity").value.trim() || "4";
        var envelope = document.getElementById("add-m-envelope").value.trim() || "Standard workshop envelope";
        var specs = document.getElementById("add-m-specs").value.trim() || "Standard precision specifications provided.";
        var materials = document.getElementById("add-m-materials").value.trim() || "Mild Steel, Aluminium";

        if (!name) {
          showPreviewNotice("Please enter a machine name.");
          return;
        }

        var newId = "M-100" + (totalMachinesCount + 1);
        ownerMachines[newId] = {
          id: newId,
          name: name,
          type: type,
          brand: brand,
          model: model,
          location: "Rajkot, Gujarat",
          rate: "₹" + rate + "/hr",
          capacity: capacity + " hrs/day",
          envelope: envelope,
          specs: specs,
          materials: materials,
          approved: false,
          status: "pending"
        };

        // Add new row to table
        var tbody = document.querySelector("#my-machines-table tbody");
        if (tbody) {
          var tr = document.createElement("tr");
          tr.setAttribute("data-owner-machine-id", newId);
          var safeName = escapeOwnerHtml(name);
          var safeType = escapeOwnerHtml(type);
          var safeBrand = escapeOwnerHtml(brand);
          var safeModel = escapeOwnerHtml(model);
          var safeRate = escapeOwnerHtml(rate);
          var safeCapacity = escapeOwnerHtml(capacity);

          tr.innerHTML = '<td><div class="machine-name-cell">' +
            '<img class="machine-thumb" src="assets/images/machine-turning.svg" alt="Machine illustration." width="48" height="48" loading="lazy" />' +
            '<div><p class="table-cell-title mb-0">' + safeName + '</p>' +
            '<span class="table-cell-subtext d-block">' + safeBrand + ' (' + safeModel + ')</span>' +
            '<span class="table-cell-id">ID: ' + newId + ' &middot; Just added</span>' +
            '</div></div></td>' +
            '<td><span class="badge bg-light text-dark border mb-1">' + safeType + '</span><span class="table-cell-subtext d-block">Process: ' + safeType + '</span></td>' +
            '<td>Rajkot, Gujarat</td>' +
            '<td><div class="fw-semibold text-dark machine-rate-text">&#8377;' + safeRate + '/hr</div><div class="table-cell-subtext machine-capacity-text">' + safeCapacity + ' hrs/day</div></td>' +
            '<td class="machine-status-cell"><span class="status-badge status-pending"><i class="fa-regular fa-clock me-1" aria-hidden="true"></i> Pending Approval</span></td>' +
            '<td class="machine-actions-cell"><div class="table-actions">' +
            '<button class="btn-im btn-im-outline btn-im-sm" type="button" data-action="owner-view-machine" data-machine-id="' + newId + '"><i class="fa-solid fa-eye me-1" aria-hidden="true"></i><span>View</span></button> ' +
            '<button class="btn-im btn-im-outline btn-im-sm" type="button" data-action="owner-edit-machine" data-machine-id="' + newId + '"><i class="fa-solid fa-pen-to-square me-1" aria-hidden="true"></i><span>Edit</span></button> ' +
            '<button class="btn-im btn-im-outline btn-im-sm" type="button" disabled title="Awaiting admin approval"><i class="fa-solid fa-lock me-1" aria-hidden="true"></i><span>Pending</span></button>' +
            '</div></td>';
          tbody.appendChild(tr);
        }

        totalMachinesCount++;
        pendingApprovalsCount++;

        var statTotal = document.getElementById("stat-owner-total-machines");
        if (statTotal) statTotal.textContent = totalMachinesCount;
        var statPending = document.getElementById("stat-owner-pending-approvals");
        if (statPending) statPending.textContent = pendingApprovalsCount;

        updateOwnerAvailableCapacity();

        formAddMachine.reset();
        if (addMachineModal) {
          addMachineModal.hide();
        }

        // Rebind buttons
        bindOwnerMachineViewButtons();
        bindOwnerMachineEditButtons();
        bindOwnerMachineToggleButtons();

        showPreviewNotice("Machine " + newId + " (" + name + ") submitted for admin approval with status 'pending'. Only approved machines appear in marketplace. No database modified.");
      });
    }

    // Sample Booking Requests Store (Phase 3.2 Owner)
    var sampleOwnerRequests = {
      "BR-2041": {
        id: "BR-2041",
        buyer: "Apex Auto Components (Rajesh Sharma)",
        machine: "Haas CNC Turning Machine ST-20",
        machineId: "M-1001",
        date: "28 Oct 2026, 10:00 AM – 06:00 PM",
        hours: "8 hours",
        requestedHours: 8,
        rate: "₹800/hr",
        total: "₹6,400",
        material: "Mild Steel EN8",
        quantity: "120 pieces",
        workDesc: "CNC turning of precision stepped shafts with keyway slots. Tight tolerance ±0.015 mm as per attached CAD drawing.",
        drawing: "Shaft_Component_Rev3.pdf",
        status: "payment_pending"
      },
      "BR-2042": {
        id: "BR-2042",
        buyer: "Kavita Hydraulics (Dharmesh Mehta)",
        machine: "ACE Micromatic VMC 850V",
        machineId: "M-1002",
        date: "28 Oct 2026, 08:00 AM – 08:00 PM",
        hours: "12 hours (2 shifts)",
        requestedHours: 12,
        rate: "₹1,200/hr",
        total: "₹14,400",
        material: "Aluminium 6061-T6",
        quantity: "30 sets",
        workDesc: "Milling and surface profiling of hydraulic manifold blocks with M12 tapped port holes.",
        drawing: "Manifold_Block_3D.step",
        status: "pending"
      },
      "BR-2043": {
        id: "BR-2043",
        buyer: "Delta Gears & Shafts (Vijay Chawla)",
        machine: "Haas VF-2 CNC Vertical Milling",
        machineId: "M-1003",
        date: "30 Oct 2026, 02:00 PM – 06:00 PM",
        hours: "4 hours",
        requestedHours: 4,
        rate: "₹900/hr",
        total: "₹3,600",
        material: "Cast Steel Grade 2",
        quantity: "15 pieces",
        workDesc: "Keyway slotting and bolt pattern face milling on pinion drive blanks.",
        drawing: "PinionBlank_FaceMill.dwg",
        status: "pending"
      }
    };

    var pendingRequestsCount = 2;
    var acceptedBookingsCount = 1;

    function canReceiveBookingRequest(request) {
      var machine = request && ownerMachines[request.machineId];
      if (!machine || !machine.approved || machine.status !== "active") {
        return false;
      }

      var availableHours = Number((machine.capacity.match(/\d+/) || ["0"])[0]);
      return request.requestedHours <= availableHours;
    }

    function showBookingRequestEligibilityNotice(request) {
      var machine = request && ownerMachines[request.machineId];
      if (machine && (!machine.approved || machine.status !== "active")) {
        showPreviewNotice("This request cannot be accepted because the machine is not both approved and active. Reactivate it only if it was previously approved.");
        return;
      }

      var availableHours = machine ? Number((machine.capacity.match(/\d+/) || ["0"])[0]) : 0;
      showPreviewNotice(
        "This request needs " + request.requestedHours + " hours, but only " +
        availableHours + " hours are currently available on this machine."
      );
    }

    function updateOwnerRequestCounters() {
      var statPending = document.getElementById("stat-owner-pending-requests");
      var badgePending = document.getElementById("sidebar-owner-requests-badge");
      var reqCountHeader = document.getElementById("owner-pending-requests-count");

      if (statPending) statPending.textContent = pendingRequestsCount;
      if (badgePending) badgePending.textContent = pendingRequestsCount;
      if (reqCountHeader) reqCountHeader.textContent = pendingRequestsCount + " pending review";

      var statAccepted = document.getElementById("stat-owner-accepted-bookings");
      if (statAccepted) statAccepted.textContent = acceptedBookingsCount;
    }

    // View Request Details Modal
    var ownerViewRequestModalEl = document.getElementById("modal-owner-view-request");
    var ownerViewRequestModal = ownerViewRequestModalEl && window.bootstrap ? new window.bootstrap.Modal(ownerViewRequestModalEl) : null;

    function bindOwnerRequestViewButtons() {
      document.querySelectorAll("[data-action='owner-view-request']").forEach(function (btn) {
        btn.onclick = function () {
          var id = btn.getAttribute("data-request-id");
          var r = sampleOwnerRequests[id];
          if (!r) return;

          document.getElementById("ovr-id").textContent = r.id;
          document.getElementById("ovr-buyer").textContent = r.buyer;
          document.getElementById("ovr-machine").textContent = r.machine;
          document.getElementById("ovr-date").textContent = r.date;
          document.getElementById("ovr-hours").textContent = r.hours;
          document.getElementById("ovr-rate").textContent = r.rate;
          document.getElementById("ovr-total").textContent = r.total;
          document.getElementById("ovr-material").textContent = r.material;
          document.getElementById("ovr-quantity").textContent = r.quantity;
          document.getElementById("ovr-desc").textContent = r.workDesc;
          document.getElementById("ovr-drawing").textContent = r.drawing;

          var badge = document.getElementById("ovr-status-badge");
          if (badge) {
            badge.className = "status-badge status-" + r.status;
            badge.innerHTML = '<i class="fa-regular fa-clock me-1" aria-hidden="true"></i> ' + r.status.toUpperCase();
          }

          if (ownerViewRequestModal) {
            ownerViewRequestModal.show();
          }
        };
      });
    }
    bindOwnerRequestViewButtons();

    // View Booking Modal (accepted, ongoing, and completed sample records)
    var ownerViewBookingModalEl = document.getElementById("modal-owner-view-booking");
    var ownerViewBookingModal = ownerViewBookingModalEl && window.bootstrap ? new window.bootstrap.Modal(ownerViewBookingModalEl) : null;

    function bindOwnerBookingViewButtons() {
      document.querySelectorAll("[data-action='owner-view-booking']").forEach(function (btn) {
        btn.onclick = function () {
          var id = btn.getAttribute("data-booking-id");
          if (!id) return;

          document.getElementById("ovb-id").textContent = id;
          document.getElementById("ovb-buyer").textContent = btn.getAttribute("data-booking-buyer") || "Buyer";
          document.getElementById("ovb-machine").textContent = btn.getAttribute("data-booking-machine") || "Machine";
          document.getElementById("ovb-date").textContent = btn.getAttribute("data-booking-date") || "Schedule";
          document.getElementById("ovb-hours").textContent = btn.getAttribute("data-booking-hours") || "Duration";
          document.getElementById("ovb-rate").textContent = btn.getAttribute("data-booking-rate") || "Rate";
          document.getElementById("ovb-total").textContent = btn.getAttribute("data-booking-total") || "Amount";
          document.getElementById("ovb-progress").textContent = btn.getAttribute("data-booking-progress") || "Not started";
          document.getElementById("ovb-note").textContent = btn.getAttribute("data-booking-note") || "Booking note.";

          var status = btn.getAttribute("data-booking-status") || "confirmed";
          var statusClass = status.replace(/_/g, "-");
          var statusLabel = status.replace(/_/g, " ");
          var statusBadge = document.getElementById("ovb-status-badge");
          if (statusBadge) {
            var statusIcon = status === "completed" ? "fa-circle-check" : (status === "in_progress" ? "fa-screwdriver-wrench" : "fa-calendar-check");
            statusBadge.className = "status-badge status-" + statusClass;
            statusBadge.innerHTML = '<i class="fa-solid ' + statusIcon + '" aria-hidden="true"></i> ' + statusLabel.toUpperCase();
          }

          var payment = btn.getAttribute("data-booking-payment") || "pending";
          var paymentBadge = document.getElementById("ovb-payment-badge");
          if (paymentBadge) {
            var paymentIcon = payment === "successful" ? "fa-circle-check" : (payment === "failed" ? "fa-circle-xmark" : "fa-regular fa-clock");
            paymentBadge.className = "status-badge status-" + payment;
            paymentBadge.innerHTML = '<i class="fa-solid ' + paymentIcon + '" aria-hidden="true"></i> ' + payment.toUpperCase();
          }

          if (ownerViewBookingModal) {
            ownerViewBookingModal.show();
          }
        };
      });
    }
    bindOwnerBookingViewButtons();

    // Accept Booking Request Modal & Action
    var ownerAcceptRequestModalEl = document.getElementById("modal-owner-accept-request");
    var ownerAcceptRequestModal = ownerAcceptRequestModalEl && window.bootstrap ? new window.bootstrap.Modal(ownerAcceptRequestModalEl) : null;
    var currentActionRequestId = null;

    function bindOwnerRequestAcceptButtons() {
      document.querySelectorAll("[data-action='owner-accept-request']").forEach(function (btn) {
        btn.onclick = function () {
          currentActionRequestId = btn.getAttribute("data-request-id");
          var r = sampleOwnerRequests[currentActionRequestId];
          if (!r || r.status !== "pending") {
            showPreviewNotice("Only pending requests can be accepted.");
            currentActionRequestId = null;
            return;
          }
          if (!canReceiveBookingRequest(r)) {
            showBookingRequestEligibilityNotice(r);
            currentActionRequestId = null;
            return;
          }

          document.getElementById("accept-req-id").textContent = r.id;
          document.getElementById("accept-req-buyer").textContent = r.buyer;
          document.getElementById("accept-req-machine").textContent = r.machine;
          document.getElementById("accept-req-total").textContent = r.total;

          if (ownerAcceptRequestModal) {
            ownerAcceptRequestModal.show();
          }
        };
      });
    }
    bindOwnerRequestAcceptButtons();

    var btnConfirmAccept = document.getElementById("btn-confirm-accept-request");
    if (btnConfirmAccept) {
      btnConfirmAccept.addEventListener("click", function () {
        if (!currentActionRequestId) return;
        var r = sampleOwnerRequests[currentActionRequestId];
        if (!r || r.status !== "pending") {
          if (ownerAcceptRequestModal) ownerAcceptRequestModal.hide();
          showPreviewNotice("Only pending requests can be accepted.");
          currentActionRequestId = null;
          return;
        }
        if (!canReceiveBookingRequest(r)) {
          if (ownerAcceptRequestModal) ownerAcceptRequestModal.hide();
          showBookingRequestEligibilityNotice(r);
          currentActionRequestId = null;
          return;
        }
        r.status = "payment_pending";

        var row = document.querySelector("tr[data-request-id='" + currentActionRequestId + "']");
        if (row) {
          var badgeCell = row.querySelector(".request-status-cell");
          if (badgeCell) {
            badgeCell.innerHTML = '<span class="status-badge status-payment-pending"><i class="fa-regular fa-clock me-1" aria-hidden="true"></i> Payment Pending</span>';
          }

          var actionCell = row.querySelector(".request-actions-cell");
          if (actionCell) {
            actionCell.innerHTML = '<button class="btn-im btn-im-outline btn-im-sm" type="button" data-action="owner-view-request" data-request-id="' + currentActionRequestId + '"><i class="fa-solid fa-eye me-1" aria-hidden="true"></i><span>View</span></button> <span class="badge bg-info-subtle text-info-emphasis border border-info-subtle px-2 py-1"><i class="fa-solid fa-check me-1"></i>Accepted (Awaiting Buyer Payment)</span>';
            var newViewBtn = actionCell.querySelector("[data-action='owner-view-request']");
            if (newViewBtn) {
              newViewBtn.onclick = function () {
                var vr = sampleOwnerRequests[currentActionRequestId];
                if (!vr) return;
                document.getElementById("ovr-id").textContent = vr.id;
                document.getElementById("ovr-buyer").textContent = vr.buyer;
                document.getElementById("ovr-machine").textContent = vr.machine;
                document.getElementById("ovr-date").textContent = vr.date;
                document.getElementById("ovr-hours").textContent = vr.hours;
                document.getElementById("ovr-rate").textContent = vr.rate;
                document.getElementById("ovr-total").textContent = vr.total;
                document.getElementById("ovr-material").textContent = vr.material;
                document.getElementById("ovr-quantity").textContent = vr.quantity;
                document.getElementById("ovr-desc").textContent = vr.workDesc;
                document.getElementById("ovr-drawing").textContent = vr.drawing;
                if (ownerViewRequestModal) ownerViewRequestModal.show();
              };
            }
          }
        }

        bindOwnerRequestViewButtons();

        if (pendingRequestsCount > 0) pendingRequestsCount--;
        updateOwnerRequestCounters();

        if (ownerAcceptRequestModal) {
          ownerAcceptRequestModal.hide();
        }

        showPreviewNotice("Request " + currentActionRequestId + " accepted locally. Status set to 'payment_pending'. Buyer notified to complete payment. Booking confirmed upon payment. No database modified.");
        currentActionRequestId = null;
      });
    }

    // Reject Booking Request Modal & Action
    var ownerRejectRequestModalEl = document.getElementById("modal-owner-reject-request");
    var ownerRejectRequestModal = ownerRejectRequestModalEl && window.bootstrap ? new window.bootstrap.Modal(ownerRejectRequestModalEl) : null;

    function bindOwnerRequestRejectButtons() {
      document.querySelectorAll("[data-action='owner-reject-request']").forEach(function (btn) {
        btn.onclick = function () {
          currentActionRequestId = btn.getAttribute("data-request-id");
          var r = sampleOwnerRequests[currentActionRequestId];
          if (!r) return;

          document.getElementById("reject-req-id").textContent = r.id;
          document.getElementById("reject-req-buyer").textContent = r.buyer;
          document.getElementById("reject-req-machine").textContent = r.machine;

          var selectReason = document.getElementById("reject-req-reason-select");
          if (selectReason) selectReason.value = "Capacity already booked for another order";

          var notes = document.getElementById("reject-req-notes");
          if (notes) notes.value = "";

          if (ownerRejectRequestModal) {
            ownerRejectRequestModal.show();
          }
        };
      });
    }
    bindOwnerRequestRejectButtons();

    var btnConfirmReject = document.getElementById("btn-confirm-reject-request");
    if (btnConfirmReject) {
      btnConfirmReject.addEventListener("click", function () {
        if (!currentActionRequestId) return;
        var r = sampleOwnerRequests[currentActionRequestId];
        if (!r || r.status !== "pending") {
          if (ownerRejectRequestModal) ownerRejectRequestModal.hide();
          showPreviewNotice("Only pending requests can be rejected.");
          currentActionRequestId = null;
          return;
        }
        r.status = "rejected";

        var reasonSelect = document.getElementById("reject-req-reason-select");
        var reason = reasonSelect ? reasonSelect.value : "Capacity conflict";

        var row = document.querySelector("tr[data-request-id='" + currentActionRequestId + "']");
        if (row) {
          var badgeCell = row.querySelector(".request-status-cell");
          if (badgeCell) {
            badgeCell.innerHTML = '<span class="status-badge status-rejected"><i class="fa-solid fa-circle-xmark me-1" aria-hidden="true"></i> Rejected</span>';
          }

          var actionCell = row.querySelector(".request-actions-cell");
          if (actionCell) {
            actionCell.innerHTML = '<button class="btn-im btn-im-outline btn-im-sm" type="button" data-action="owner-view-request" data-request-id="' + currentActionRequestId + '"><i class="fa-solid fa-eye me-1" aria-hidden="true"></i><span>View</span></button> <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1"><i class="fa-solid fa-xmark me-1"></i>Rejected</span>';
          }
        }

        bindOwnerRequestViewButtons();

        if (pendingRequestsCount > 0) pendingRequestsCount--;
        updateOwnerRequestCounters();

        if (ownerRejectRequestModal) {
          ownerRejectRequestModal.hide();
        }

        showPreviewNotice("Request " + currentActionRequestId + " marked rejected locally (" + reason + "). No database modified.");
        currentActionRequestId = null;
      });
    }

    // Reset Owner Requests Demo
    var btnResetOwnerRequests = document.getElementById("btn-reset-owner-requests");
    if (btnResetOwnerRequests) {
      btnResetOwnerRequests.addEventListener("click", function () {
        pendingRequestsCount = 2;
        acceptedBookingsCount = 1;
        updateOwnerRequestCounters();

        Object.keys(sampleOwnerRequests).forEach(function (id) {
          var isAccepted = id === "BR-2041";
          sampleOwnerRequests[id].status = isAccepted ? "payment_pending" : "pending";
          var row = document.querySelector("tr[data-request-id='" + id + "']");
          if (row) {
            var badgeCell = row.querySelector(".request-status-cell");
            if (badgeCell) {
              badgeCell.innerHTML = isAccepted
                ? '<span class="status-badge status-payment-pending"><i class="fa-regular fa-clock me-1" aria-hidden="true"></i> Payment Pending</span>'
                : '<span class="status-badge status-pending"><i class="fa-regular fa-clock me-1" aria-hidden="true"></i> Pending</span>';
            }
            var actionCell = row.querySelector(".request-actions-cell");
            if (actionCell) {
              actionCell.innerHTML = '<button class="btn-im btn-im-outline btn-im-sm" type="button" data-action="owner-view-request" data-request-id="' + id + '"><i class="fa-solid fa-eye me-1" aria-hidden="true"></i><span>View</span></button> ' +
                (isAccepted
                  ? '<span class="badge bg-info-subtle text-info-emphasis border border-info-subtle px-2 py-1">Accepted · Awaiting Buyer Payment</span>'
                  : '<button class="btn-im btn-im-primary btn-im-sm" type="button" data-action="owner-accept-request" data-request-id="' + id + '"><i class="fa-solid fa-check me-1" aria-hidden="true"></i><span>Accept</span></button> ' +
                    '<button class="btn-im btn-im-danger btn-im-sm" type="button" data-action="owner-reject-request" data-request-id="' + id + '"><i class="fa-solid fa-xmark me-1" aria-hidden="true"></i><span>Reject</span></button>');
            }
          }
        });

        bindOwnerRequestViewButtons();
        bindOwnerRequestAcceptButtons();
        bindOwnerRequestRejectButtons();

        showPreviewNotice("Request states reset: BR-2041 remains accepted awaiting payment, and two requests await an owner decision. No database modified.");
      });
    }

    // Ongoing Work Management & Completion
    var ownerBookings = {
      "CS-10026": { status: "in_progress", paymentStatus: "successful" }
    };
    var ongoingWorkCount = 1;
    var completedWorkCount = 25;

    var ownerCompleteWorkModalEl = document.getElementById("modal-owner-complete-work");
    var ownerCompleteWorkModal = ownerCompleteWorkModalEl && window.bootstrap ? new window.bootstrap.Modal(ownerCompleteWorkModalEl) : null;
    var currentCompletingBookingId = null;

    function bindOwnerCompleteWorkButtons() {
      document.querySelectorAll("[data-action='owner-complete-work']").forEach(function (btn) {
        btn.onclick = function () {
          currentCompletingBookingId = btn.getAttribute("data-booking-id");
          var booking = ownerBookings[currentCompletingBookingId];
          if (!booking || booking.paymentStatus !== "successful" ||
              (booking.status !== "confirmed" && booking.status !== "in_progress")) {
            showPreviewNotice("Only confirmed or in-progress bookings with successful payment can be marked completed.");
            currentCompletingBookingId = null;
            return;
          }
          var machineName = btn.getAttribute("data-booking-machine") || "Machine Job";
          var buyerName = btn.getAttribute("data-booking-buyer") || "Buyer";

          document.getElementById("complete-work-id").textContent = currentCompletingBookingId;
          document.getElementById("complete-work-machine").textContent = machineName;
          document.getElementById("complete-work-buyer").textContent = buyerName;

          var completeConfirm = document.getElementById("complete-work-confirm");
          if (completeConfirm) {
            completeConfirm.checked = false;
          }

          if (ownerCompleteWorkModal) {
            ownerCompleteWorkModal.show();
          }
        };
      });
    }
    bindOwnerCompleteWorkButtons();

    var btnConfirmCompleteWork = document.getElementById("btn-confirm-complete-work");
    if (btnConfirmCompleteWork) {
      btnConfirmCompleteWork.addEventListener("click", function () {
        if (!currentCompletingBookingId) return;

        var completeConfirm = document.getElementById("complete-work-confirm");
        if (!completeConfirm || !completeConfirm.checked) {
          showPreviewNotice("Confirm that the physical work is finished before marking this booking completed.");
          return;
        }

        var booking = ownerBookings[currentCompletingBookingId];
        if (!booking || booking.paymentStatus !== "successful" ||
            (booking.status !== "confirmed" && booking.status !== "in_progress")) {
          if (ownerCompleteWorkModal) ownerCompleteWorkModal.hide();
          showPreviewNotice("Only confirmed or in-progress bookings with successful payment can be marked completed.");
          currentCompletingBookingId = null;
          return;
        }

        var row = document.querySelector("tr[data-ongoing-booking-id='" + currentCompletingBookingId + "']");
        if (row) {
          var badgeCell = row.querySelector(".booking-status-cell");
          if (badgeCell) {
            badgeCell.innerHTML = '<span class="status-badge status-completed"><i class="fa-solid fa-circle-check me-1" aria-hidden="true"></i> Completed</span>';
          }
          var actionCell = row.querySelector(".booking-actions-cell");
          if (actionCell) {
            actionCell.innerHTML = '<span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1"><i class="fa-solid fa-check-double me-1"></i>Completed · Review Eligible</span>';
          }
        }
        booking.status = "completed";

        if (ongoingWorkCount > 0) ongoingWorkCount--;
        completedWorkCount++;

        var statOngoing = document.getElementById("stat-owner-ongoing-work");
        if (statOngoing) statOngoing.textContent = ongoingWorkCount;
        var statCompleted = document.getElementById("stat-owner-completed-bookings");
        if (statCompleted) statCompleted.textContent = completedWorkCount;

        if (ownerCompleteWorkModal) {
          ownerCompleteWorkModal.hide();
        }

        showPreviewNotice("Booking " + currentCompletingBookingId + " marked as completed locally. Work finished. Job is now eligible for buyer review and payout settlement. No database modified.");
        currentCompletingBookingId = null;
      });
    }

    // Update Progress Modal
    var ownerProgressModalEl = document.getElementById("modal-owner-progress");
    var ownerProgressModal = ownerProgressModalEl && window.bootstrap ? new window.bootstrap.Modal(ownerProgressModalEl) : null;
    var currentProgressBookingId = null;

    document.querySelectorAll("[data-action='owner-update-progress']").forEach(function (btn) {
      btn.onclick = function () {
        currentProgressBookingId = btn.getAttribute("data-booking-id");
        var booking = ownerBookings[currentProgressBookingId];
        if (!booking || booking.paymentStatus !== "successful" ||
            (booking.status !== "confirmed" && booking.status !== "in_progress")) {
          showPreviewNotice("Progress can only be updated for confirmed or in-progress bookings with successful payment.");
          currentProgressBookingId = null;
          return;
        }
        document.getElementById("progress-booking-id").textContent = currentProgressBookingId;
        if (ownerProgressModal) {
          ownerProgressModal.show();
        }
      };
    });

    var formProgress = document.getElementById("form-owner-progress");
    if (formProgress) {
      formProgress.addEventListener("submit", function (e) {
        e.preventDefault();
        var note = document.getElementById("progress-note-input").value.trim() || "Work progressing on schedule";
        if (ownerProgressModal) {
          ownerProgressModal.hide();
        }
        showPreviewNotice("Progress logged for " + currentProgressBookingId + ": '" + note + "'. No database modified.");
        currentProgressBookingId = null;
      });
    }

    // Company Profile Modal
    var companyProfileModalEl = document.getElementById("modal-owner-company-profile");
    var companyProfileModal = companyProfileModalEl && window.bootstrap ? new window.bootstrap.Modal(companyProfileModalEl) : null;

    document.querySelectorAll("[data-action='owner-company-profile']").forEach(function (btn) {
      btn.onclick = function () {
        if (companyProfileModal) {
          companyProfileModal.show();
        }
      };
    });

    var formProfile = document.getElementById("form-owner-company-profile");
    if (formProfile) {
      formProfile.addEventListener("submit", function (e) {
        e.preventDefault();
        if (companyProfileModal) {
          companyProfileModal.hide();
        }
        showPreviewNotice("Company profile updated locally for Patel Engineering. No database modified.");
      });
    }

    // Owner Logout Simulation
    var ownerLogoutModalEl = document.getElementById("modal-owner-logout");
    var ownerLogoutModal = ownerLogoutModalEl && window.bootstrap ? new window.bootstrap.Modal(ownerLogoutModalEl) : null;

    document.querySelectorAll("[data-action='owner-logout']").forEach(function (btn) {
      btn.onclick = function () {
        if (ownerLogoutModal) {
          ownerLogoutModal.show();
        }
      };
    });

    var btnConfirmOwnerLogout = document.getElementById("btn-confirm-owner-logout");
    if (btnConfirmOwnerLogout) {
      btnConfirmOwnerLogout.onclick = function () {
        if (ownerLogoutModal) {
          ownerLogoutModal.hide();
        }
        showPreviewNotice("Simulating machine owner sign-out. Returning to login interface...");
        window.setTimeout(function () {
          window.location.href = "login.html";
        }, 800);
      };
    }
  }

  /* ------------------------------------------------------------------------
     Phase 6 – shared motion
     A single IntersectionObserver reveals suitable section-level blocks once.
     Content is never hidden until the observer exists, and nothing is hidden
     at all when the visitor prefers reduced motion or the API is unavailable.
     ------------------------------------------------------------------------ */
  try {
    (function initIdleMachMotion() {
      var reduceQuery = window.matchMedia("(prefers-reduced-motion: reduce)");

      if (!("IntersectionObserver" in window) || reduceQuery.matches) {
        return;
      }

      var revealSelectors = [
        ".section-header",
        ".discovery-panel",
        ".machine-filter-panel",
        ".machine-card",
        ".journey-panel",
        ".split-media",
        ".role-column",
        ".principle",
        ".hiw-rules-panel",
        ".hiw-admin-panel",
        ".cta-inner",
        ".detail-stack > .im-card",
        ".booking-panel",
        ".contact-form-panel",
        ".contact-aside-panel",
        ".auth-context",
        ".auth-card",
        ".review-card",
        ".capacity-card",
        ".dashboard-overview",
        ".dashboard-card",
        ".dashboard-modules-grid"
      ];

      var candidates = [];

      revealSelectors.forEach(function (selector) {
        document.querySelectorAll(selector).forEach(function (element) {
          if (element.getClientRects().length === 0) {
            return;
          }

          if (candidates.indexOf(element) === -1) {
            candidates.push(element);
          }
        });
      });

      /* Keep only the outermost target so a parent and its child are never
         revealed independently. */
      var targets = candidates.filter(function (element) {
        return !candidates.some(function (other) {
          return other !== element && other.contains(element);
        });
      });

      if (!targets.length) {
        return;
      }

      var clearReveal = function (element) {
        element.classList.remove("im-reveal", "is-revealed");
        element.style.removeProperty("--im-reveal-delay");
      };

      var observer = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (entry) {
            if (!entry.isIntersecting) {
              return;
            }

            var element = entry.target;
            element.classList.add("is-revealed");
            observer.unobserve(element);

            /* Drop the temporary classes once the reveal has finished so the
               element returns to its own styles (and its own hover
               transitions) with no residual transform. */
            var delay =
              parseFloat(element.style.getPropertyValue("--im-reveal-delay")) ||
              0;
            window.setTimeout(function () {
              clearReveal(element);
            }, 480 + delay);
          });
        },
        { rootMargin: "0px", threshold: 0.08 }
      );

      var revealAll = function () {
        targets.forEach(function (element) {
          clearReveal(element);
        });
        observer.disconnect();
      };

      var viewportHeight =
        window.innerHeight || document.documentElement.clientHeight;

      targets.forEach(function (element) {
        var rect = element.getBoundingClientRect();

        /* Anything already in view is left completely untouched to avoid a
           visible flash on first paint. */
        if (rect.top < viewportHeight) {
          return;
        }

        var parent = element.parentElement;
        var position = parent
          ? Array.prototype.indexOf.call(parent.children, element)
          : 0;
        var delay = position > 0 ? Math.min(position, 4) * 35 : 0;

        element.style.setProperty("--im-reveal-delay", delay + "ms");
        element.classList.add("im-reveal");
        observer.observe(element);
      });

      var onMotionPreferenceChange = function (event) {
        if (event.matches) {
          revealAll();
        }
      };

      if (typeof reduceQuery.addEventListener === "function") {
        reduceQuery.addEventListener("change", onMotionPreferenceChange);
      } else if (typeof reduceQuery.addListener === "function") {
        reduceQuery.addListener(onMotionPreferenceChange);
      }
    })();
  } catch (error) {
    /* Fail safe: if anything above fails, show every element immediately. */
    document.querySelectorAll(".im-reveal").forEach(function (element) {
      element.classList.remove("im-reveal", "is-revealed");
      element.style.removeProperty("--im-reveal-delay");
    });
  }
})();
