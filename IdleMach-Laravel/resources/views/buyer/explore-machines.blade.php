@extends('layouts.buyer')

@section('title', 'Explore Machines — IdleMach Buyer')

@section('meta_description', 'Explore manufacturing capacity with the existing machine listings, images, descriptions, owner details, ratings, search, filters, sorting, view details, and request booking interface. Frontend prototype only.')

@section('page_title', 'Explore Machines')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Discover</p>
              <h1 class="dashboard-title">Explore Machines</h1>
              <p class="dashboard-subtitle">
                Browse the same three sample listings used on the public
                marketplace. Search, filter, and sort the existing records, then
                open a listing or start a booking request.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('machines') }}">
                <i class="fa-solid fa-store" aria-hidden="true"></i>
                View marketplace
              </a>
            </div>
          </div>

          <!-- Discovery -->
          <section id="discover" aria-labelledby="discover-heading">
            <div class="dashboard-overview-head">
              <h2 class="dashboard-overview-title" id="discover-heading">
                Discover manufacturing capacity
              </h2>
            </div>

            <div class="machine-filter-panel mb-4">
              <div class="machine-filter-head">
                <div>
                  <h3
                    class="dashboard-overview-title"
                    id="machine-filters-heading"
                  >
                    Search machines
                  </h3>
                  <p class="machine-filter-lead">
                    Search and filter the same three listings used on the
                    public marketplace. Results update locally as you type or
                    change a filter.
                  </p>
                </div>
                <button
                  class="btn-im btn-im-outline btn-im-sm"
                  type="button"
                  id="machines-reset-filters"
                >
                  <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
                  Clear all filters
                </button>
              </div>

              <form
                id="machines-search-form"
                role="search"
                aria-label="Search machine listings"
                aria-describedby="machine-filter-note"
              >
                <div class="row g-3">
                  <div class="col-12">
                    <label class="form-label" for="machine-keyword"
                      >Machine, process, or owner</label
                    >
                    <div class="search-input">
                      <i
                        class="fa-solid fa-magnifying-glass"
                        aria-hidden="true"
                      ></i>
                      <input
                        class="form-control"
                        id="machine-keyword"
                        name="keyword"
                        type="search"
                        placeholder="e.g. CNC turning, Patel Engineering, Rajkot"
                        autocomplete="off"
                      />
                    </div>
                  </div>

                  <div class="col-6 col-md-3">
                    <label class="form-label" for="filter-process">Process</label>
                    <select
                      class="form-select"
                      id="filter-process"
                      name="process"
                    >
                      <option value="">All processes</option>
                      <option value="turning">CNC turning</option>
                      <option value="milling">CNC milling</option>
                      <option value="fabrication">Fabrication</option>
                    </select>
                  </div>

                  <div class="col-6 col-md-3">
                    <label class="form-label" for="filter-location"
                      >Location</label
                    >
                    <select
                      class="form-select"
                      id="filter-location"
                      name="location"
                    >
                      <option value="">All locations</option>
                      <option value="rajkot">Rajkot</option>
                      <option value="coimbatore">Coimbatore</option>
                      <option value="pune">Pune</option>
                    </select>
                  </div>

                  <div class="col-6 col-md-3">
                    <label class="form-label" for="filter-availability"
                      >Availability</label
                    >
                    <select
                      class="form-select"
                      id="filter-availability"
                      name="availability"
                    >
                      <option value="">Any availability</option>
                      <option value="available">Available</option>
                      <option value="limited">Limited availability</option>
                    </select>
                  </div>

                  <div class="col-6 col-md-3">
                    <label class="form-label" for="filter-rate"
                      >Hourly rate</label
                    >
                    <select class="form-select" id="filter-rate" name="rate">
                      <option value="">Any hourly rate</option>
                      <option value="up-to-900">Up to &#8377;900 / hour</option>
                      <option value="901-1000">
                        &#8377;901 &ndash; &#8377;1,000 / hour
                      </option>
                      <option value="above-1000">
                        &#8377;1,001 / hour and above
                      </option>
                    </select>
                  </div>
                </div>

                <div class="buyer-filter-actions">
                  <button class="btn-im btn-im-primary" type="submit">
                    <i
                      class="fa-solid fa-magnifying-glass"
                      aria-hidden="true"
                    ></i>
                    Search listings
                  </button>
                  <p class="search-note mb-0" id="machine-filter-note">
                    Filters only the 3 listings on this page. No live marketplace
                    query is made.
                  </p>
                </div>
              </form>
            </div>

            <div class="results-toolbar">
              <div>
                <h3
                  class="results-heading"
                  id="machine-results-heading"
                  tabindex="-1"
                >
                  Machine recommendations
                </h3>
                <p
                  class="results-summary"
                  id="machines-results-summary"
                  role="status"
                  aria-live="polite"
                >
                  Showing all 3 listings.
                </p>
              </div>

              <div class="sort-control">
                <label class="form-label" for="machine-sort">Sort by</label>
                <select class="form-select" id="machine-sort">
                  <option value="recommended">Recommended order</option>
                  <option value="rate-asc">Hourly rate: low to high</option>
                  <option value="rate-desc">Hourly rate: high to low</option>
                  <option value="name-asc">Machine name: A to Z</option>
                </select>
              </div>
            </div>

            <div class="row g-4" id="machine-results">
              <div
                class="col-sm-6 col-md-4"
                data-machine-listing
                data-name="haas cnc turning machine st-20"
                data-process="turning"
                data-location="rajkot"
                data-availability="available"
                data-rate="800"
                data-search="haas cnc turning machine st-20 lathe cnc turning turning patel engineering rajkot"
              >
                <article class="im-card machine-card h-100">
                  <div class="machine-card-media-img">
                    <img
                      src="{{ asset('assets/images/machine-turning.svg') }}"
                      width="640"
                      height="400"
                      alt="Illustration of a CNC turning machine."
                      loading="lazy"
                      decoding="async"
                    />
                  </div>
                  <div class="im-card-body">
                    <h4 class="machine-card-title">Haas CNC Turning Machine ST-20</h4>
                    <p class="machine-card-owner">
                      <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                      Patel Engineering &middot; Rajkot
                    </p>

                    <dl class="machine-card-facts">
                      <div>
                        <dt>Process</dt>
                        <dd>CNC turning</dd>
                      </div>
                      <div>
                        <dt>Hourly rate</dt>
                        <dd>&#8377;800 / hour</dd>
                      </div>
                      <div>
                        <dt>Available capacity</dt>
                        <dd>8 hours/day</dd>
                      </div>
                    </dl>

                    <p class="small text-muted mb-0">
                      <i class="fa-regular fa-star" aria-hidden="true"></i>
                      No buyer reviews yet
                    </p>
                    <button
                      class="btn-im btn-im-primary btn-im-sm w-100 mt-3"
                      type="button"
                      data-buyer-request-booking
                      data-machine-name="Haas CNC Turning Machine ST-20"
                    >
                      <i class="fa-solid fa-calendar-plus" aria-hidden="true"></i>
                      Request booking
                    </button>
                  </div>
                  <div class="im-card-footer">
                    <span class="status-badge status-available">
                      <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                      Available
                    </span>
                    <a
                      class="btn-im btn-im-outline btn-im-sm"
                      href="{{ route('machine-details') }}?id=1"
                    >
                      <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                      View details<span class="visually-hidden">
                        for Haas CNC Turning Machine ST-20</span
                      >
                    </a>
                  </div>
                </article>
              </div>

              <div
                class="col-sm-6 col-md-4"
                data-machine-listing
                data-name="vertical machining centre"
                data-process="milling"
                data-location="coimbatore"
                data-availability="available"
                data-rate="1150"
                data-search="vertical machining centre vmc cnc milling machine cnc milling milling sample precision works coimbatore"
              >
                <article class="im-card machine-card h-100">
                  <div class="machine-card-media-img">
                    <img
                      src="{{ asset('assets/images/machine-milling.svg') }}"
                      width="640"
                      height="400"
                      alt="Illustration of a vertical machining centre."
                      loading="lazy"
                      decoding="async"
                    />
                  </div>
                  <div class="im-card-body">
                    <h4 class="machine-card-title">Vertical Machining Centre</h4>
                    <p class="machine-card-owner">
                      <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                      Sample Precision Works &middot; Coimbatore
                    </p>

                    <dl class="machine-card-facts">
                      <div>
                        <dt>Process</dt>
                        <dd>CNC milling</dd>
                      </div>
                      <div>
                        <dt>Hourly rate</dt>
                        <dd>&#8377;1,150 / hour</dd>
                      </div>
                      <div>
                        <dt>Available capacity</dt>
                        <dd>6 hours/day</dd>
                      </div>
                    </dl>

                    <p class="small text-muted mb-0">
                      <i class="fa-regular fa-star" aria-hidden="true"></i>
                      No buyer reviews yet
                    </p>
                    <button
                      class="btn-im btn-im-primary btn-im-sm w-100 mt-3"
                      type="button"
                      data-buyer-request-booking
                      data-machine-name="Vertical Machining Centre"
                    >
                      <i class="fa-solid fa-calendar-plus" aria-hidden="true"></i>
                      Request booking
                    </button>
                  </div>
                  <div class="im-card-footer">
                    <span class="status-badge status-available">
                      <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                      Available
                    </span>
                    <a
                      class="btn-im btn-im-outline btn-im-sm"
                      href="{{ route('machine-details') }}?id=2"
                    >
                      <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                      View details<span class="visually-hidden">
                        for Vertical Machining Centre</span
                      >
                    </a>
                  </div>
                </article>
              </div>

              <div
                class="col-sm-6 col-md-4"
                data-machine-listing
                data-name="hydraulic press brake"
                data-process="fabrication"
                data-location="pune"
                data-availability="limited"
                data-rate="950"
                data-search="hydraulic press brake sheet metal fabrication fabrication sample fabrication co pune"
              >
                <article class="im-card machine-card h-100">
                  <div class="machine-card-media-img">
                    <img
                      src="{{ asset('assets/images/machine-fabrication.svg') }}"
                      width="640"
                      height="400"
                      alt="Illustration of a hydraulic press brake bending sheet metal."
                      loading="lazy"
                      decoding="async"
                    />
                  </div>
                  <div class="im-card-body">
                    <h4 class="machine-card-title">Hydraulic Press Brake</h4>
                    <p class="machine-card-owner">
                      <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                      Sample Fabrication Co. &middot; Pune
                    </p>

                    <dl class="machine-card-facts">
                      <div>
                        <dt>Process</dt>
                        <dd>Fabrication</dd>
                      </div>
                      <div>
                        <dt>Hourly rate</dt>
                        <dd>&#8377;950 / hour</dd>
                      </div>
                      <div>
                        <dt>Available capacity</dt>
                        <dd>3 hours/day</dd>
                      </div>
                    </dl>

                    <p class="mb-0 d-flex flex-wrap align-items-center gap-2">
                      <span
                        class="review-stars"
                        role="img"
                        aria-label="Your rating: 5 out of 5"
                      >
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                      </span>
                      <span class="small text-muted">Your review &middot; 5.0</span>
                    </p>
                    <button
                      class="btn-im btn-im-primary btn-im-sm w-100 mt-3"
                      type="button"
                      data-buyer-request-booking
                      data-machine-name="Hydraulic Press Brake"
                    >
                      <i class="fa-solid fa-calendar-plus" aria-hidden="true"></i>
                      Request booking
                    </button>
                  </div>
                  <div class="im-card-footer">
                    <span class="status-badge status-warning">
                      <i class="fa-solid fa-clock" aria-hidden="true"></i>
                      Limited availability
                    </span>
                    <a
                      class="btn-im btn-im-outline btn-im-sm"
                      href="{{ route('machine-details') }}?id=3"
                    >
                      <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                      View details<span class="visually-hidden">
                        for Hydraulic Press Brake</span
                      >
                    </a>
                  </div>
                </article>
              </div>
            </div>

            <div class="empty-state machines-empty" id="machines-empty" hidden>
              <div class="empty-state-icon">
                <i class="fa-solid fa-filter-circle-xmark" aria-hidden="true"></i>
              </div>
              <h3>No listings match these filters</h3>
              <p>
                Try a different keyword, process, location, availability, or rate
                range. This search only covers the three listings on this page.
              </p>
              <button
                class="btn-im btn-im-outline btn-im-sm mt-3"
                type="button"
                id="machines-empty-clear"
              >
                Clear all filters
              </button>
            </div>
          </section>

@push('modals')
    <!-- ================= Request booking modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="buyer-request-booking-modal"
      tabindex="-1"
      aria-labelledby="buyer-request-booking-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">Request booking</p>
              <h2 class="modal-title h5 mb-0" id="buyer-request-booking-label">
                Request <span id="buyer-request-machine">this machine</span>
              </h2>
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close booking request form"
            ></button>
          </div>
          <div class="modal-body">
            <form id="buyer-request-booking-form">
              <div class="row g-3">
                <div class="col-sm-6">
                  <label class="form-label form-required" for="buyer-request-date"
                    >Preferred date</label
                  >
                  <input
                    class="form-control"
                    id="buyer-request-date"
                    name="requested_date"
                    type="date"
                    required
                  />
                </div>
                <div class="col-sm-6">
                  <label class="form-label form-required" for="buyer-request-hours"
                    >Required hours</label
                  >
                  <input
                    class="form-control"
                    id="buyer-request-hours"
                    name="hours"
                    type="number"
                    min="1"
                    max="24"
                    step="1"
                    required
                  />
                </div>
                <div class="col-12">
                  <label class="form-label" for="buyer-request-notes"
                    >Work notes</label
                  >
                  <textarea
                    class="form-control"
                    id="buyer-request-notes"
                    name="notes"
                    rows="3"
                    maxlength="300"
                    placeholder="Describe the parts, material, and tolerances."
                  ></textarea>
                </div>
              </div>

              <div
                class="im-alert im-alert-success mt-3 mb-0"
                id="buyer-request-feedback"
                role="status"
                hidden
              >
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <div>
                  Preview only. This booking request was not created, sent, or
                  stored, and no machine availability was checked.
                </div>
              </div>

              <div class="d-flex flex-wrap align-items-center gap-2 mt-3">
                <button class="btn-im btn-im-primary" type="submit">
                  <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
                  Send request preview
                </button>
                <button
                  type="button"
                  class="btn-im btn-im-outline"
                  data-bs-dismiss="modal"
                >
                  Cancel
                </button>
              </div>
              <p class="small text-muted mt-2 mb-0">
                Requests are not processed and no booking record is created.
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
@endpush

@push('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var modalElement = document.getElementById("buyer-request-booking-modal");
        var form = document.getElementById("buyer-request-booking-form");
        var machineLabel = document.getElementById("buyer-request-machine");
        var feedback = document.getElementById("buyer-request-feedback");
        if (!modalElement || !form || !window.bootstrap) {
          return;
        }

        var modal = new window.bootstrap.Modal(modalElement);

        document.querySelectorAll("[data-buyer-request-booking]").forEach(function (button) {
          button.addEventListener("click", function () {
            if (machineLabel) {
              machineLabel.textContent =
                button.getAttribute("data-machine-name") || "this machine";
            }
            form.classList.remove("was-validated");
            if (feedback) {
              feedback.hidden = true;
            }
            modal.show();
          });
        });

        form.addEventListener("submit", function (event) {
          event.preventDefault();
          if (!form.checkValidity()) {
            form.classList.add("was-validated");
            return;
          }

          if (feedback) {
            feedback.hidden = false;
          }
          form.classList.remove("was-validated");
          form.reset();
        });
      });
    </script>
@endpush
@endsection
