@extends('layouts.public')

@section('title', 'Machine Details — IdleMach')

@section('meta_description', 'View a sample IdleMach machine listing and use the frontend-only booking request interface. Demonstration data only.')

@section('content')
  <noscript>
    <section
      class="section machine-detail-noscript"
      aria-labelledby="detail-noscript-title"
    >
      <div class="container-im">
        <div class="im-alert im-alert-warning" role="note">
          <i
            class="fa-solid fa-triangle-exclamation"
            aria-hidden="true"
          ></i>
          <div>
            <h2 class="h5" id="detail-noscript-title">
              JavaScript is required to show this listing.
            </h2>
            <p class="mb-2">
              The Machine Details page reads the machine ID from the address
              and displays the matching record with JavaScript. No live
              listing or booking system is connected.
            </p>
            <a class="text-link" href="{{ url('/machines') }}"
              >Back to Explore Machines</a
            >
          </div>
        </div>
      </div>
    </section>
  </noscript>

  <div id="machine-detail-view" hidden>
    <!-- Machine overview -->
    <section
      class="machine-detail-hero"
      aria-labelledby="machine-detail-title"
    >
      <div class="container-im">
        <nav class="machine-breadcrumb" aria-label="Breadcrumb">
          <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/machines') }}">Explore Machines</a></li>
            <li aria-current="page">
              <span id="detail-crumb-name">Machine details</span>
            </li>
          </ol>
        </nav>

        <div class="row g-4 g-lg-5 align-items-end">
          <div class="col-lg-8">
            <p class="eyebrow" id="detail-process">
              Manufacturing process
            </p>
            <h1 class="page-title" id="machine-detail-title">
              <span id="detail-name">Machine details</span>
            </h1>

            <p class="detail-owner-line">
              <span
                ><i class="fa-solid fa-building" aria-hidden="true"></i>
                <span id="detail-owner">Owner</span></span
              >
              <span
                ><i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                <span id="detail-location">Location</span></span
              >
            </p>

            <div class="detail-meta">
              <span
                class="status-badge status-available"
                id="detail-status"
                data-detail-status
              >
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Status
              </span>
            </div>

            <div class="detail-hero-actions">
              <a class="btn-im btn-im-primary" href="#booking-panel">
                <i
                  class="fa-solid fa-calendar-check"
                  aria-hidden="true"
                ></i>
                Request this machine
              </a>
              <a class="btn-im btn-im-outline" href="{{ url('/machines') }}">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                Back to Explore Machines
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Listing details and booking request -->
    <section
      class="section machine-detail-section"
      aria-label="Machine listing details and booking request"
    >
      <div class="container-im">
        <div class="row g-4 g-lg-5 detail-layout">
          <div class="col-lg-7">
            <div class="detail-stack">
              <!-- Gallery -->
              <section
                class="im-card detail-panel"
                aria-labelledby="detail-gallery-title"
              >
                <div class="im-card-header">
                  <div>
                    <h2
                      class="detail-panel-title"
                      id="detail-gallery-title"
                    >
                      Machine image gallery
                    </h2>
                    <p class="detail-panel-subtitle">
                      Representative sample photograph
                    </p>
                  </div>
                  <span class="status-badge status-neutral">
                    <i class="fa-solid fa-image" aria-hidden="true"></i>
                    Photograph
                  </span>
                </div>
                <div class="im-card-body">
                  <figure class="detail-gallery">
                    <div class="detail-gallery-main">
                      <img
                        id="detail-gallery-image"
                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
                        width="640"
                        height="400"
                        alt=""
                        decoding="async">
                      <div
                        class="detail-gallery-fallback"
                        id="detail-gallery-fallback"
                        hidden
                      >
                        <i class="fa-solid fa-image" aria-hidden="true"></i>
                        <p>
                          Image unavailable. The rest of this listing is
                          still shown.
                        </p>
                      </div>
                    </div>
                    <div
                      class="detail-gallery-thumbs"
                      id="detail-gallery-thumbs"
                      aria-label="Gallery thumbnails"
                      role="group"
                      hidden
                    ></div>
                    <figcaption id="detail-gallery-caption"></figcaption>
                  </figure>
                  <p
                    class="detail-gallery-note"
                    id="detail-gallery-note"
                  ></p>
                </div>
              </section>

              <!-- Specifications -->
              <section
                class="im-card detail-panel"
                aria-labelledby="detail-specs-title"
              >
                <div class="im-card-header">
                  <div>
                    <h2 class="detail-panel-title" id="detail-specs-title">
                      Specifications
                    </h2>
                    <p class="detail-panel-subtitle">
                      Only values supported by this record
                    </p>
                  </div>
                </div>
                <div class="im-card-body">
                  <dl class="detail-spec-list">
                    <div>
                      <dt>Machine type</dt>
                      <dd id="detail-machine-type">—</dd>
                    </div>
                    <div>
                      <dt>Manufacturing process</dt>
                      <dd id="detail-spec-process">—</dd>
                    </div>
                    <div>
                      <dt>Model</dt>
                      <dd class="detail-unavailable" id="detail-model">
                        —
                      </dd>
                    </div>
                    <div>
                      <dt>Material capabilities</dt>
                      <dd class="detail-unavailable" id="detail-materials">
                        —
                      </dd>
                    </div>
                    <div>
                      <dt>Technical specifications</dt>
                      <dd class="detail-unavailable" id="detail-technical">
                        —
                      </dd>
                    </div>
                    <div>
                      <dt>Available capacity</dt>
                      <dd id="detail-spec-capacity">—</dd>
                    </div>
                  </dl>
                  <p class="detail-note">
                    Model number, material list, and detailed technical data
                    are not available for these machines. Those fields are
                    shown as not provided rather than invented.
                  </p>
                </div>
              </section>

              <!-- Owner information -->
              <section
                class="im-card detail-panel"
                aria-labelledby="detail-owner-title"
              >
                <div class="im-card-header">
                  <div>
                    <h2 class="detail-panel-title" id="detail-owner-title">
                      Owner / company
                    </h2>
                    <p class="detail-panel-subtitle">
                      Public details available in the record
                    </p>
                  </div>
                </div>
                <div class="im-card-body">
                  <div class="detail-owner-card">
                    <span class="detail-owner-icon">
                      <i
                        class="fa-solid fa-building"
                        aria-hidden="true"
                      ></i>
                    </span>
                    <div>
                      <h3 id="detail-owner-name">Owner</h3>
                      <p class="detail-owner-location">
                        <i
                          class="fa-solid fa-location-dot"
                          aria-hidden="true"
                        ></i>
                        <span id="detail-owner-location"
                          >Location</span
                        >
                      </p>
                    </div>
                  </div>
                  <p class="detail-note">
                    Company history, certifications, ratings, verification
                    badges, and private contact information are not included
                    in this record.
                  </p>
                </div>
              </section>

              <!-- Pricing and capacity -->
              <section
                class="im-card detail-panel"
                aria-labelledby="detail-pricing-title"
              >
                <div class="im-card-header">
                  <div>
                    <h2
                      class="detail-panel-title"
                      id="detail-pricing-title"
                    >
                      Pricing and capacity
                    </h2>
                    <p class="detail-panel-subtitle">
                      Values from this listing
                    </p>
                  </div>
                </div>
                <div class="im-card-body">
                  <div class="detail-price-row">
                    <div>
                      <p class="detail-price-label">Hourly rate</p>
                      <p class="detail-price-value">
                        <span id="detail-rate">₹0</span>
                        <span>/ hour</span>
                      </p>
                    </div>
                  </div>

                  <dl class="detail-facts">
                    <div>
                      <dt>Available capacity</dt>
                      <dd id="detail-price-capacity">—</dd>
                    </div>
                    <div>
                      <dt>Total capacity</dt>
                      <dd
                        class="detail-unavailable"
                        id="detail-total-capacity"
                      >
                        —
                      </dd>
                    </div>
                    <div>
                      <dt>Listing status</dt>
                      <dd id="detail-pricing-status">—</dd>
                    </div>
                  </dl>

                  <p class="detail-note">
                    All prices and capacity values are indicative. They are
                    not a quote, and taxes, material costs, and other charges
                    are not included.
                  </p>
                </div>
              </section>

              <!-- Availability -->
              <section
                class="im-card detail-panel"
                aria-labelledby="detail-availability-title"
              >
                <div class="im-card-header">
                  <div>
                    <h2
                      class="detail-panel-title"
                      id="detail-availability-title"
                    >
                      Availability
                    </h2>
                    <p class="detail-panel-subtitle">
                      Capacity summary
                    </p>
                  </div>
                </div>
                <div class="im-card-body">
                  <div class="availability-summary">
                    <p class="availability-status-line">
                      <span
                        class="status-badge status-available"
                        data-detail-status
                      >
                        <i
                          class="fa-solid fa-circle-check"
                          aria-hidden="true"
                        ></i>
                        Status
                      </span>
                      <span id="detail-availability-capacity">—</span>
                    </p>
                    <p
                      class="availability-copy"
                      id="detail-availability-copy"
                    ></p>
                  </div>

                  <div
                    class="im-alert im-alert-info availability-note"
                    role="note"
                  >
                    <i
                      class="fa-solid fa-calendar-days"
                      aria-hidden="true"
                    ></i>
                    <div>
                      <strong
                        >No availability calendar is connected.</strong
                      >
                      Day-by-day time slots are not included here, so this
                      page does not show a schedule. Inactive or unavailable
                      listings would be marked clearly and would not accept
                      booking requests.
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>

          <!-- Booking request panel -->
          <div class="col-lg-5">
            <aside
              class="booking-panel"
              id="booking-panel"
              aria-labelledby="booking-title"
            >
              <div class="booking-panel-head">
                <p class="eyebrow">Booking request</p>
                <h2 class="booking-panel-title" id="booking-title">
                  Request this machine
                </h2>
                <p class="booking-panel-lead">
                  Complete the form to prepare a booking request.
                </p>
              </div>

              <dl
                class="booking-summary"
                aria-label="Listing summary"
              >
                <div>
                  <dt>Hourly rate</dt>
                  <dd id="booking-summary-rate">—</dd>
                </div>
                <div>
                  <dt>Available capacity</dt>
                  <dd id="booking-summary-capacity">—</dd>
                </div>
              </dl>

              <div
                class="im-alert im-alert-warning booking-notice"
                role="note"
              >
                <i
                  class="fa-solid fa-triangle-exclamation"
                  aria-hidden="true"
                ></i>
                <div>
                  <strong>No request will be sent.</strong>
                  This form has no backend connection and does not create a
                  booking, database record, payment, or confirmation.
                </div>
              </div>

              <form
                class="booking-form"
                id="booking-form"
                aria-labelledby="booking-title"
                novalidate
              >
                <div class="row g-3">
                  <div class="col-12">
                    <label
                      class="form-label form-required"
                      for="booking-date"
                      >Preferred date</label
                    >
                    <input
                      class="form-control"
                      id="booking-date"
                      name="preferred_date"
                      type="date"
                      required
                      aria-describedby="booking-date-error">
                    <div class="invalid-feedback" id="booking-date-error">
                      Choose today or a future date.
                    </div>
                  </div>

                  <div class="col-12">
                    <label
                      class="form-label form-required"
                      for="booking-time"
                      >Start time</label
                    >
                    <input
                      class="form-control"
                      id="booking-time"
                      name="start_time"
                      type="time"
                      required
                      aria-describedby="booking-time-help booking-time-error">
                    <div class="form-text" id="booking-time-help">
                      No time slots are defined, so this time is not checked
                      against a schedule.
                    </div>
                    <div class="invalid-feedback" id="booking-time-error">
                      Choose a start time.
                    </div>
                  </div>

                  <div class="col-12">
                    <label
                      class="form-label form-required"
                      for="booking-hours"
                      >Requested hours</label
                    >
                    <input
                      class="form-control"
                      id="booking-hours"
                      name="requested_hours"
                      type="number"
                      min="1"
                      step="1"
                      value="1"
                      required
                      aria-describedby="booking-hours-help booking-hours-error">
                    <div class="form-text" id="booking-hours-help">
                      Capacity limits will appear here.
                    </div>
                    <div class="invalid-feedback" id="booking-hours-error">
                      Enter a number of hours within the available capacity.
                    </div>
                  </div>

                  <div class="col-12">
                    <label
                      class="form-label form-required"
                      for="booking-material"
                      >Material</label
                    >
                    <input
                      class="form-control"
                      id="booking-material"
                      name="material"
                      type="text"
                      required
                      placeholder="e.g. mild steel"
                      aria-describedby="booking-material-error">
                    <div
                      class="invalid-feedback"
                      id="booking-material-error"
                    >
                      Describe the material for this request.
                    </div>
                  </div>

                  <div class="col-12">
                    <label
                      class="form-label form-required"
                      for="booking-quantity"
                      >Quantity</label
                    >
                    <input
                      class="form-control"
                      id="booking-quantity"
                      name="quantity"
                      type="text"
                      required
                      placeholder="e.g. 25 components"
                      aria-describedby="booking-quantity-error">
                    <div
                      class="invalid-feedback"
                      id="booking-quantity-error"
                    >
                      Describe the quantity required.
                    </div>
                  </div>

                  <div class="col-12">
                    <label
                      class="form-label form-required"
                      for="booking-description"
                      >Work description</label
                    >
                    <textarea
                      class="form-control"
                      id="booking-description"
                      name="work_description"
                      rows="3"
                      required
                      placeholder="Describe the operations or finished part needed."
                      aria-describedby="booking-description-error"
                    ></textarea>
                    <div
                      class="invalid-feedback"
                      id="booking-description-error"
                    >
                      Describe the work you need done.
                    </div>
                  </div>

                  <div class="col-12">
                    <label class="form-label" for="booking-requirements"
                      >Special requirements
                      <span class="booking-optional"
                        >(optional)</span
                      ></label
                    >
                    <textarea
                      class="form-control"
                      id="booking-requirements"
                      name="special_requirements"
                      rows="2"
                      placeholder="Add any delivery notes or other requirements."
                    ></textarea>
                  </div>

                  <div class="col-12">
                    <label class="form-label" for="booking-file"
                      >Drawing or document
                      <span class="booking-optional"
                        >(optional)</span
                      ></label
                    >
                    <input
                      class="form-control booking-file"
                      id="booking-file"
                      name="drawing"
                      type="file"
                      aria-describedby="booking-file-help">
                    <div class="form-text" id="booking-file-help">
                      No file is uploaded, read, or stored.
                    </div>
                  </div>
                </div>

                <div class="booking-estimate">
                  <div>
                    <p class="booking-estimate-label">Estimate</p>
                    <p
                      class="booking-estimate-value"
                      id="booking-estimate-value"
                    >
                      ₹0
                    </p>
                  </div>
                  <p class="booking-estimate-note">
                    Rate × requested hours. Not a quote; taxes, materials,
                    and other charges are not included.
                  </p>
                </div>

                <button
                  class="btn-im btn-im-primary booking-submit"
                  type="submit"
                >
                  <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
                  Request booking
                </button>

                <p class="booking-policy">
                  <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                  Only active listings can receive requests. The owner
                  reviews a request first; payment follows acceptance, and a
                  booking is confirmed only after successful payment.
                </p>
              </form>

              <div
                class="im-alert im-alert-info booking-feedback"
                id="booking-feedback"
                role="status"
                tabindex="-1"
                hidden
              >
                <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                <div>
                  <strong>No request was sent.</strong>
                  The form passed local validation, but nothing was sent,
                  saved, stored, or booked. No owner acceptance or payment
                  step has occurred.
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Invalid or missing machine ID -->
  <section
    class="section machine-detail-missing-section"
    id="machine-detail-missing"
    aria-labelledby="machine-detail-missing-title"
    hidden
  >
    <div class="container-im">
      <nav class="machine-breadcrumb" aria-label="Breadcrumb">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('/machines') }}">Explore Machines</a></li>
          <li aria-current="page">Machine not found</li>
        </ol>
      </nav>

      <div class="empty-state detail-missing">
        <div class="empty-state-icon">
          <i
            class="fa-solid fa-triangle-exclamation"
            aria-hidden="true"
          ></i>
        </div>
        <h1 class="page-title" id="machine-detail-missing-title">
          Machine not found
        </h1>
        <p id="machine-detail-missing-text">
          Only three machine records are available.
        </p>
        <div class="detail-missing-actions">
          <a class="btn-im btn-im-primary" href="{{ url('/machines') }}">
            <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
            Back to Explore Machines
          </a>
          <a class="btn-im btn-im-outline" href="{{ url('/') }}"
            >Go to homepage</a
          >
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    document
      .querySelectorAll('[data-nav-match="machines"]')
      .forEach(function (link) {
        link.classList.add("active");
        link.setAttribute("aria-current", "page");
      });
  </script>
@endpush
