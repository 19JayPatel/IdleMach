@extends('layouts.buyer')

@section('title', 'Buyer Dashboard — IdleMach')

@section('meta_description', 'IdleMach buyer dashboard prototype for discovering sample manufacturing capacity, tracking booking requests and payments, and reviewing completed work. All records are illustrative demo data and no backend is connected.')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Buyer workspace</p>
              <h1 class="dashboard-title">Buyer Dashboard</h1>
              <p class="dashboard-subtitle">
                Discover manufacturing capacity, track every booking stage,
                review payment records, and share feedback after completed work.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('machines') }}">
                <i class="fa-solid fa-store" aria-hidden="true"></i>
                View marketplace
              </a>
              <a class="btn-im btn-im-primary" href="#discover">
                <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                Explore machines
              </a>
            </div>
          </div>

          <!-- Booking overview -->
          <section class="dashboard-overview" aria-labelledby="overview-heading">
            <div class="dashboard-overview-head">
              <h2 class="dashboard-overview-title" id="overview-heading">
                Booking overview
              </h2>
            </div>
            <div class="dashboard-stats-grid buyer-stats-grid">
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Total Booking Requests</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-inbox" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-total-requests">8</p>
                <p class="stat-card-meta">
                  All requests
                </p>
              </div>

              <div class="stat-card stat-card-alert">
                <div class="stat-card-head">
                  <p class="stat-card-label">Pending Requests</p>
                  <span class="stat-card-icon stat-icon-approvals">
                    <i class="fa-regular fa-clock" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-pending-requests">1</p>
                <p class="stat-card-meta">
                  Awaiting an owner decision
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Accepted Bookings</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-accepted-bookings">1</p>
                <p class="stat-card-meta">
                  Owner accepted; no payment recorded yet
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Confirmed Bookings</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-calendar-day" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-confirmed-bookings"
                  >1</p
                >
                <p class="stat-card-meta">
                  Confirmed by successful payment
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Ongoing Work</p>
                  <span class="stat-card-icon stat-icon-machines">
                    <i
                      class="fa-solid fa-screwdriver-wrench"
                      aria-hidden="true"
                    ></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-ongoing-work">1</p>
                <p class="stat-card-meta">
                  Paid and currently in progress
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Completed Bookings</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-completed-bookings">2</p>
                <p class="stat-card-meta">
                  Finished and eligible for review
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Successful Payments</p>
                  <span class="stat-card-icon stat-icon-payments">
                    <i
                      class="fa-solid fa-indian-rupee-sign"
                      aria-hidden="true"
                    ></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-successful-payments">
                  &#8377;15,000
                </p>
                <p class="stat-card-meta">
                  Across 4 successful records
                </p>
              </div>
            </div>
          </section>

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

          <!-- Booking requests -->
          <section
            class="dashboard-card"
            id="booking-requests"
            aria-labelledby="booking-requests-heading"
          >
            <div class="dashboard-card-header">
              <h2
                class="dashboard-card-title"
                id="booking-requests-heading"
              >
                <i class="fa-solid fa-inbox" aria-hidden="true"></i>
                My booking requests
              </h2>
              <div class="dashboard-card-actions">
                <span
                  class="text-muted small"
                  id="buyer-bookings-summary"
                  role="status"
                  aria-live="polite"
                  >Showing all 8 bookings.</span
                >
              </div>
            </div>
            <div class="dashboard-card-body">
              <div
                class="buyer-status-grid"
                role="group"
                aria-label="Filter bookings by documented status"
              >
                <button
                  class="buyer-status-filter is-selected"
                  type="button"
                  data-booking-filter="all"
                  aria-pressed="true"
                >
                  <span>All requests</span>
                  <strong>8</strong>
                </button>
                <button
                  class="buyer-status-filter"
                  type="button"
                  data-booking-filter="pending"
                  aria-pressed="false"
                >
                  <span>Pending</span>
                  <strong>1</strong>
                </button>
                <button
                  class="buyer-status-filter"
                  type="button"
                  data-booking-filter="accepted"
                  aria-pressed="false"
                >
                  <span>Accepted</span>
                  <strong>1</strong>
                </button>
                <button
                  class="buyer-status-filter"
                  type="button"
                  data-booking-filter="payment_pending"
                  aria-pressed="false"
                >
                  <span>Payment pending</span>
                  <strong>1</strong>
                </button>
                <button
                  class="buyer-status-filter"
                  type="button"
                  data-booking-filter="confirmed"
                  aria-pressed="false"
                >
                  <span>Confirmed</span>
                  <strong>1</strong>
                </button>
                <button
                  class="buyer-status-filter"
                  type="button"
                  data-booking-filter="in_progress"
                  aria-pressed="false"
                >
                  <span>In progress</span>
                  <strong>1</strong>
                </button>
                <button
                  class="buyer-status-filter"
                  type="button"
                  data-booking-filter="completed"
                  aria-pressed="false"
                >
                  <span>Completed</span>
                  <strong>2</strong>
                </button>
                <button
                  class="buyer-status-filter"
                  type="button"
                  data-booking-filter="rejected"
                  aria-pressed="false"
                >
                  <span>Rejected</span>
                  <strong>1</strong>
                </button>
                <button
                  class="buyer-status-filter"
                  type="button"
                  data-booking-filter="cancelled"
                  aria-pressed="false"
                >
                  <span>Cancelled</span>
                  <strong>0</strong>
                </button>
              </div>

              <span class="table-scroll-hint" hidden>
                <i class="fa-solid fa-arrows-left-right" aria-hidden="true"></i>
                Scroll the table sideways to see all columns.
              </span>
              <div
                class="table-responsive"
                tabindex="0"
                role="region"
                aria-label="Buyer booking requests table"
              >
                <table class="im-table table-buyer-bookings">
                  <caption class="visually-hidden">
                    Eight buyer bookings covering pending, accepted,
                    payment_pending, confirmed, in_progress, completed, and
                    rejected. No cancelled booking is shown because the
                    cancellation policy is not defined.
                  </caption>
                  <colgroup>
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                  </colgroup>
                  <thead>
                    <tr>
                      <th scope="col">Booking ID</th>
                      <th scope="col">Machine</th>
                      <th scope="col">Machine owner</th>
                      <th scope="col">Requested date</th>
                      <th scope="col">Requested hours</th>
                      <th scope="col">Estimated amount</th>
                      <th scope="col">Booking status</th>
                      <th scope="col">Payment status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      data-buyer-booking
                      data-booking-id="BR-3101"
                      data-machine-id="1"
                      data-date="18 Nov 2026"
                      data-hours="4"
                      data-amount="3200"
                      data-status="pending"
                      data-payment="none"
                      data-review="not-eligible"
                    >
                      <td>
                        <p class="table-cell-title mb-0">BR-3101</p>
                        <span class="table-cell-id">Submitted 02 Nov 2026</span>
                      </td>
                      <td>
                        Haas CNC Turning Machine ST-20
                        <span class="d-block table-cell-subtext"
                          >Listing 1</span
                        >
                      </td>
                      <td>
                        Patel Engineering
                        <span class="d-block table-cell-subtext">Rajkot</span>
                      </td>
                      <td>18 Nov 2026</td>
                      <td>4 hours</td>
                      <td>
                        &#8377;3,200
                        <span class="d-block table-cell-subtext"
                          >4 hrs &times; &#8377;800</span
                        >
                      </td>
                      <td>
                        <span class="status-badge status-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Pending
                        </span>
                      </td>
                      <td>
                        <span class="table-cell-subtext">No payment record</span>
                      </td>
                      <td>
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-buyer-view-booking="BR-3101"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View details
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr
                      data-buyer-booking
                      data-booking-id="BR-3102"
                      data-machine-id="3"
                      data-date="20 Nov 2026"
                      data-hours="3"
                      data-amount="2850"
                      data-status="accepted"
                      data-payment="none"
                      data-review="not-eligible"
                    >
                      <td>
                        <p class="table-cell-title mb-0">BR-3102</p>
                        <span class="table-cell-id">Submitted 03 Nov 2026</span>
                      </td>
                      <td>
                        Hydraulic Press Brake
                        <span class="d-block table-cell-subtext"
                          >Listing 3</span
                        >
                      </td>
                      <td>
                        Sample Fabrication Co.
                        <span class="d-block table-cell-subtext">Pune</span>
                      </td>
                      <td>20 Nov 2026</td>
                      <td>3 hours</td>
                      <td>
                        &#8377;2,850
                        <span class="d-block table-cell-subtext"
                          >3 hrs &times; &#8377;950</span
                        >
                      </td>
                      <td>
                        <span class="status-badge status-accepted">
                          <i
                            class="fa-solid fa-circle-check"
                            aria-hidden="true"
                          ></i>
                          Accepted
                        </span>
                      </td>
                      <td>
                        <span class="table-cell-subtext">No payment record</span>
                      </td>
                      <td>
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-buyer-view-booking="BR-3102"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View details
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr
                      data-buyer-booking
                      data-booking-id="BR-3103"
                      data-machine-id="2"
                      data-date="22 Nov 2026"
                      data-hours="6"
                      data-amount="6900"
                      data-status="payment_pending"
                      data-payment="pending"
                      data-review="not-eligible"
                    >
                      <td>
                        <p class="table-cell-title mb-0">BR-3103</p>
                        <span class="table-cell-id">Submitted 04 Nov 2026</span>
                      </td>
                      <td>
                        Vertical Machining Centre
                        <span class="d-block table-cell-subtext"
                          >Listing 2</span
                        >
                      </td>
                      <td>
                        Sample Precision Works
                        <span class="d-block table-cell-subtext"
                          >Coimbatore</span
                        >
                      </td>
                      <td>22 Nov 2026</td>
                      <td>6 hours</td>
                      <td>
                        &#8377;6,900
                        <span class="d-block table-cell-subtext"
                          >6 hrs &times; &#8377;1,150</span
                        >
                      </td>
                      <td>
                        <span class="status-badge status-payment-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Payment Pending
                        </span>
                      </td>
                      <td>
                        <span class="status-badge status-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Pending
                        </span>
                      </td>
                      <td>
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-buyer-view-booking="BR-3103"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View details
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr
                      data-buyer-booking
                      data-booking-id="BR-3104"
                      data-machine-id="2"
                      data-date="24 Nov 2026"
                      data-hours="5"
                      data-amount="5750"
                      data-status="confirmed"
                      data-payment="successful"
                      data-review="not-eligible"
                    >
                      <td>
                        <p class="table-cell-title mb-0">BR-3104</p>
                        <span class="table-cell-id">Submitted 05 Nov 2026</span>
                      </td>
                      <td>
                        Vertical Machining Centre
                        <span class="d-block table-cell-subtext"
                          >Listing 2</span
                        >
                      </td>
                      <td>
                        Sample Precision Works
                        <span class="d-block table-cell-subtext"
                          >Coimbatore</span
                        >
                      </td>
                      <td>24 Nov 2026</td>
                      <td>5 hours</td>
                      <td>
                        &#8377;5,750
                        <span class="d-block table-cell-subtext"
                          >5 hrs &times; &#8377;1,150</span
                        >
                      </td>
                      <td>
                        <span class="status-badge status-confirmed">
                          <i
                            class="fa-solid fa-calendar-check"
                            aria-hidden="true"
                          ></i>
                          Confirmed
                        </span>
                      </td>
                      <td>
                        <span class="status-badge status-successful">
                          <i
                            class="fa-solid fa-circle-check"
                            aria-hidden="true"
                          ></i>
                          Successful
                        </span>
                      </td>
                      <td>
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-buyer-view-booking="BR-3104"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View details
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr
                      data-buyer-booking
                      data-booking-id="BR-3105"
                      data-machine-id="1"
                      data-date="08 Nov 2026"
                      data-hours="4"
                      data-amount="3200"
                      data-status="in_progress"
                      data-payment="successful"
                      data-review="not-eligible"
                    >
                      <td>
                        <p class="table-cell-title mb-0">BR-3105</p>
                        <span class="table-cell-id">Submitted 01 Nov 2026</span>
                      </td>
                      <td>
                        Haas CNC Turning Machine ST-20
                        <span class="d-block table-cell-subtext"
                          >Listing 1</span
                        >
                      </td>
                      <td>
                        Patel Engineering
                        <span class="d-block table-cell-subtext">Rajkot</span>
                      </td>
                      <td>08 Nov 2026</td>
                      <td>4 hours</td>
                      <td>
                        &#8377;3,200
                        <span class="d-block table-cell-subtext"
                          >4 hrs &times; &#8377;800</span
                        >
                      </td>
                      <td>
                        <span class="status-badge status-in-progress">
                          <i
                            class="fa-solid fa-screwdriver-wrench"
                            aria-hidden="true"
                          ></i>
                          In Progress
                        </span>
                      </td>
                      <td>
                        <span class="status-badge status-successful">
                          <i
                            class="fa-solid fa-circle-check"
                            aria-hidden="true"
                          ></i>
                          Successful
                        </span>
                      </td>
                      <td>
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-buyer-view-booking="BR-3105"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View details
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr
                      data-buyer-booking
                      data-booking-id="BR-3106"
                      data-machine-id="3"
                      data-date="02 Nov 2026"
                      data-hours="3"
                      data-amount="2850"
                      data-status="completed"
                      data-payment="successful"
                      data-review="reviewed"
                    >
                      <td>
                        <p class="table-cell-title mb-0">BR-3106</p>
                        <span class="table-cell-id">Submitted 24 Oct 2026</span>
                      </td>
                      <td>
                        Hydraulic Press Brake
                        <span class="d-block table-cell-subtext"
                          >Listing 3</span
                        >
                      </td>
                      <td>
                        Sample Fabrication Co.
                        <span class="d-block table-cell-subtext">Pune</span>
                      </td>
                      <td>02 Nov 2026</td>
                      <td>3 hours</td>
                      <td>
                        &#8377;2,850
                        <span class="d-block table-cell-subtext"
                          >3 hrs &times; &#8377;950</span
                        >
                      </td>
                      <td>
                        <span class="status-badge status-completed">
                          <i
                            class="fa-solid fa-circle-check"
                            aria-hidden="true"
                          ></i>
                          Completed
                        </span>
                      </td>
                      <td>
                        <span class="status-badge status-successful">
                          <i
                            class="fa-solid fa-circle-check"
                            aria-hidden="true"
                          ></i>
                          Successful
                        </span>
                      </td>
                      <td>
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-buyer-view-booking="BR-3106"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View details
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr
                      data-buyer-booking
                      data-booking-id="BR-3107"
                      data-machine-id="1"
                      data-date="27 Oct 2026"
                      data-hours="4"
                      data-amount="3200"
                      data-status="completed"
                      data-payment="successful"
                      data-review="eligible"
                    >
                      <td>
                        <p class="table-cell-title mb-0">BR-3107</p>
                        <span class="table-cell-id">Submitted 18 Oct 2026</span>
                      </td>
                      <td>
                        Haas CNC Turning Machine ST-20
                        <span class="d-block table-cell-subtext"
                          >Listing 1</span
                        >
                      </td>
                      <td>
                        Patel Engineering
                        <span class="d-block table-cell-subtext">Rajkot</span>
                      </td>
                      <td>27 Oct 2026</td>
                      <td>4 hours</td>
                      <td>
                        &#8377;3,200
                        <span class="d-block table-cell-subtext"
                          >4 hrs &times; &#8377;800</span
                        >
                      </td>
                      <td>
                        <span class="status-badge status-completed">
                          <i
                            class="fa-solid fa-circle-check"
                            aria-hidden="true"
                          ></i>
                          Completed
                        </span>
                      </td>
                      <td>
                        <span class="status-badge status-successful">
                          <i
                            class="fa-solid fa-circle-check"
                            aria-hidden="true"
                          ></i>
                          Successful
                        </span>
                      </td>
                      <td>
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-buyer-view-booking="BR-3107"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View details
                          </button>
                          <button
                            class="btn-im btn-im-primary btn-im-sm"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#buyer-review-modal"
                            data-review-open="BR-3107"
                          >
                            <i class="fa-solid fa-star" aria-hidden="true"></i>
                            Review
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr
                      data-buyer-booking
                      data-booking-id="BR-3108"
                      data-machine-id="2"
                      data-date="20 Nov 2026"
                      data-hours="2"
                      data-amount="2300"
                      data-status="rejected"
                      data-payment="none"
                      data-review="not-eligible"
                    >
                      <td>
                        <p class="table-cell-title mb-0">BR-3108</p>
                        <span class="table-cell-id">Submitted 30 Oct 2026</span>
                      </td>
                      <td>
                        Vertical Machining Centre
                        <span class="d-block table-cell-subtext"
                          >Listing 2</span
                        >
                      </td>
                      <td>
                        Sample Precision Works
                        <span class="d-block table-cell-subtext"
                          >Coimbatore</span
                        >
                      </td>
                      <td>20 Nov 2026</td>
                      <td>2 hours</td>
                      <td>
                        &#8377;2,300
                        <span class="d-block table-cell-subtext"
                          >2 hrs &times; &#8377;1,150</span
                        >
                      </td>
                      <td>
                        <span class="status-badge status-rejected">
                          <i
                            class="fa-solid fa-circle-xmark"
                            aria-hidden="true"
                          ></i>
                          Rejected
                        </span>
                      </td>
                      <td>
                        <span class="table-cell-subtext">No payment record</span>
                      </td>
                      <td>
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-buyer-view-booking="BR-3108"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View details
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <p class="small text-muted mt-3 mb-0">
                Status values follow the documented booking set:
                <code>pending</code>, <code>accepted</code>,
                <code>rejected</code>, <code>payment_pending</code>,
                <code>confirmed</code>, <code>in_progress</code>,
                <code>completed</code>, and <code>cancelled</code>. No cancelled
                booking is shown, and no cancel action is offered, because the
                project documents do not define who may cancel at each stage,
                deadlines, or refund rules.
              </p>
            </div>
            <div class="dashboard-card-footer">
              <span
                >No live booking, cancellation, payment, or notification is
                created by this page.</span
              >
            </div>
          </section>

          <!-- Payment history -->
          <section
            class="dashboard-card"
            id="payments"
            aria-labelledby="payments-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="payments-heading">
                <i class="fa-solid fa-receipt" aria-hidden="true"></i>
                Payments and history
              </h2>
              <div class="dashboard-card-actions">
                <span class="text-muted small">6 transaction records</span>
              </div>
            </div>
            <div class="dashboard-card-body">
              <div class="buyer-payment-summary mb-3">
                <div>
                  <span>Successful payments</span>
                  <strong>&#8377;15,000</strong>
                  <span>4 records</span>
                </div>
                <div>
                  <span>Pending payment</span>
                  <strong>&#8377;6,900</strong>
                  <span>1 record &middot; booking not confirmed</span>
                </div>
                <div>
                  <span>Failed attempts</span>
                  <strong>&#8377;6,900</strong>
                  <span>1 attempt &middot; no confirmation</span>
                </div>
              </div>

              <span class="table-scroll-hint" hidden>
                <i class="fa-solid fa-arrows-left-right" aria-hidden="true"></i>
                Scroll the table sideways to see all columns.
              </span>
              <div
                class="table-responsive"
                tabindex="0"
                role="region"
                aria-label="Buyer payment history table"
              >
                <table class="im-table table-buyer-payments">
                  <caption class="visually-hidden">
                    Six payment records: four successful, one pending, and one
                    failed attempt. No refunded record is shown because refund
                    rules are not defined.
                  </caption>
                  <colgroup>
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                  </colgroup>
                  <thead>
                    <tr>
                      <th scope="col">Booking ID</th>
                      <th scope="col">Machine</th>
                      <th scope="col">Payment date</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Payment status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">BR-3103</p>
                        <span class="table-cell-id">PAY-7206</span>
                      </td>
                      <td>Vertical Machining Centre</td>
                      <td>06 Nov 2026</td>
                      <td>&#8377;6,900</td>
                      <td>
                        <span class="status-badge status-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Pending
                        </span>
                        <span class="d-block table-cell-subtext"
                          >Awaiting successful payment</span
                        >
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">BR-3103</p>
                        <span class="table-cell-id">PAY-7205</span>
                      </td>
                      <td>Vertical Machining Centre</td>
                      <td>05 Nov 2026</td>
                      <td>&#8377;6,900</td>
                      <td>
                        <span class="status-badge status-failed">
                          <i
                            class="fa-solid fa-circle-xmark"
                            aria-hidden="true"
                          ></i>
                          Failed
                        </span>
                        <span class="d-block table-cell-subtext"
                          >Attempt only &middot; booking not confirmed</span
                        >
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">BR-3104</p>
                        <span class="table-cell-id">PAY-7204</span>
                      </td>
                      <td>Vertical Machining Centre</td>
                      <td>29 Oct 2026</td>
                      <td>&#8377;5,750</td>
                      <td>
                        <span class="status-badge status-successful">
                          <i
                            class="fa-solid fa-circle-check"
                            aria-hidden="true"
                          ></i>
                          Successful
                        </span>
                        <span class="d-block table-cell-subtext"
                          >Booking confirmed after payment</span
                        >
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">BR-3105</p>
                        <span class="table-cell-id">PAY-7203</span>
                      </td>
                      <td>Haas CNC Turning Machine ST-20</td>
                      <td>06 Nov 2026</td>
                      <td>&#8377;3,200</td>
                      <td>
                        <span class="status-badge status-successful">
                          <i
                            class="fa-solid fa-circle-check"
                            aria-hidden="true"
                          ></i>
                          Successful
                        </span>
                        <span class="d-block table-cell-subtext"
                          >Work in progress</span
                        >
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">BR-3106</p>
                        <span class="table-cell-id">PAY-7202</span>
                      </td>
                      <td>Hydraulic Press Brake</td>
                      <td>28 Oct 2026</td>
                      <td>&#8377;2,850</td>
                      <td>
                        <span class="status-badge status-successful">
                          <i
                            class="fa-solid fa-circle-check"
                            aria-hidden="true"
                          ></i>
                          Successful
                        </span>
                        <span class="d-block table-cell-subtext"
                          >Completed booking</span
                        >
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">BR-3107</p>
                        <span class="table-cell-id">PAY-7201</span>
                      </td>
                      <td>Haas CNC Turning Machine ST-20</td>
                      <td>23 Oct 2026</td>
                      <td>&#8377;3,200</td>
                      <td>
                        <span class="status-badge status-successful">
                          <i
                            class="fa-solid fa-circle-check"
                            aria-hidden="true"
                          ></i>
                          Successful
                        </span>
                        <span class="d-block table-cell-subtext"
                          >Completed booking</span
                        >
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <p class="small text-muted mt-3 mb-0">
                Payment statuses use the documented set:
                <code>pending</code>, <code>successful</code>,
                <code>failed</code>, and <code>refunded</code>. A pending or failed
                payment is never presented as a confirmed booking. Refund rules
                and payment deadlines are not defined in the project documents, so
                no refunded example or deadline is shown.
              </p>
            </div>
            <div class="dashboard-card-footer">
              <span
                >No commission, tax, invoice, payout, or gateway fee figures are
                invented.</span
              >
            </div>
          </section>

          <!-- Completed bookings -->
          <section
            class="dashboard-card"
            id="completed-work"
            aria-labelledby="completed-work-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="completed-work-heading">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Completed bookings
              </h2>
              <div class="dashboard-card-actions">
                <span class="text-muted small">2 completions</span>
              </div>
            </div>
            <div class="dashboard-card-body">
              <span class="table-scroll-hint" hidden>
                <i class="fa-solid fa-arrows-left-right" aria-hidden="true"></i>
                Scroll the table sideways to see all columns.
              </span>
              <div
                class="table-responsive"
                tabindex="0"
                role="region"
                aria-label="Completed bookings table"
              >
                <table class="im-table table-buyer-completed">
                  <caption class="visually-hidden">
                    Two completed bookings. BR-3106 has a review; BR-3107 is
                    completed and awaiting a review.
                  </caption>
                  <colgroup>
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                    <col />
                  </colgroup>
                  <thead>
                    <tr>
                      <th scope="col">Machine</th>
                      <th scope="col">Owner / company</th>
                      <th scope="col">Completion date</th>
                      <th scope="col">Booking amount</th>
                      <th scope="col">Booking status</th>
                      <th scope="col">Review status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr data-buyer-completed="BR-3106">
                      <td>
                        <p class="table-cell-title mb-0">
                          Hydraulic Press Brake
                        </p>
                        <span class="table-cell-id">BR-3106</span>
                      </td>
                      <td>Sample Fabrication Co. &middot; Pune</td>
                      <td>03 Nov 2026</td>
                      <td>&#8377;2,850</td>
                      <td>
                        <span class="status-badge status-completed">
                          <i
                            class="fa-solid fa-circle-check"
                            aria-hidden="true"
                          ></i>
                          Completed
                        </span>
                      </td>
                      <td>
                        <span class="status-badge status-successful">
                          <i class="fa-solid fa-star" aria-hidden="true"></i>
                          Reviewed &middot; 5 stars
                        </span>
                      </td>
                      <td>
                        <a
                          class="btn-im btn-im-outline btn-im-sm"
                          href="#reviews"
                        >
                          <i class="fa-solid fa-star" aria-hidden="true"></i>
                          View review
                        </a>
                      </td>
                    </tr>

                    <tr data-buyer-completed="BR-3107">
                      <td>
                        <p class="table-cell-title mb-0">
                          Haas CNC Turning Machine ST-20
                        </p>
                        <span class="table-cell-id">BR-3107</span>
                      </td>
                      <td>Patel Engineering &middot; Rajkot</td>
                      <td>27 Oct 2026</td>
                      <td>&#8377;3,200</td>
                      <td>
                        <span class="status-badge status-completed">
                          <i
                            class="fa-solid fa-circle-check"
                            aria-hidden="true"
                          ></i>
                          Completed
                        </span>
                      </td>
                      <td>
                        <span
                          class="status-badge status-pending"
                          data-review-status="BR-3107"
                        >
                          <i class="fa-regular fa-star" aria-hidden="true"></i>
                          Awaiting review
                        </span>
                      </td>
                      <td>
                        <button
                          class="btn-im btn-im-primary btn-im-sm"
                          type="button"
                          data-bs-toggle="modal"
                          data-bs-target="#buyer-review-modal"
                          data-review-action="BR-3107"
                          data-review-open="BR-3107"
                        >
                          <i class="fa-solid fa-star" aria-hidden="true"></i>
                          Review now
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <p class="small text-muted mt-3 mb-0">
                Only completed bookings are review-eligible. Pending, rejected,
                accepted, payment-pending, confirmed, in-progress, and cancelled
                bookings must not show a review form or a review action.
              </p>
            </div>
            <div class="dashboard-card-footer">
              <span
                >No live completion or review record is created.</span
              >
              <span class="stat-demo-badge">Completed work</span>
            </div>
          </section>

          <!-- Reviews -->
          <section
            class="dashboard-card"
            id="reviews"
            aria-labelledby="reviews-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="reviews-heading">
                <i class="fa-solid fa-star" aria-hidden="true"></i>
                My reviews
              </h2>
              <div class="dashboard-card-actions">
                <span class="text-muted small" id="buyer-review-summary"
                  >1 submitted &middot; 1 awaiting</span
                >
              </div>
            </div>
            <div class="dashboard-card-body">
              <div class="row g-3 g-lg-4">
                <div class="col-md-7">
                  <article class="review-card mb-3">
                    <div class="review-header">
                      <div>
                        <h3 class="review-buyer-name">
                          Sample Fabrication Co.
                        </h3>
                        <p class="table-cell-subtext mb-0">
                          Hydraulic Press Brake &middot; Booking BR-3106
                        </p>
                      </div>
                      <span
                        class="review-stars"
                        role="img"
                        aria-label="Rated 5 out of 5"
                      >
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <span class="visually-hidden">5 out of 5</span>
                      </span>
                    </div>
                    <p class="review-comment">
                      &ldquo;The bends matched the drawing and the batch was ready
                      on the agreed date. Communication was clear throughout the
                      job.&rdquo;
                    </p>
                    <p class="review-meta mb-0">
                      <span class="status-badge status-completed">
                        <i
                          class="fa-solid fa-circle-check"
                          aria-hidden="true"
                        ></i>
                        Completed booking
                      </span>
                      <span>03 Nov 2026</span>
                    </p>
                  </article>

                  <p class="small text-muted mb-0">
                    One submitted review is shown above. Only completed bookings
                    can be reviewed; BR-3107 is the remaining eligible booking.
                  </p>
                </div>

                <div class="col-md-5">
                  <div class="review-summary buyer-review-summary">
                    <div>
                      <p class="stat-card-label mb-1">Your rating</p>
                      <p class="review-summary-value mb-1">5.0<span>/5</span></p>
                      <span
                        class="review-stars d-block"
                        role="img"
                        aria-label="Submitted rating 5 out of 5"
                      >
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                      </span>
                    </div>
                    <p
                      class="table-cell-subtext mb-0"
                      id="buyer-review-score-note"
                    >
                      Based on the one review shown for completed booking
                      BR-3106.
                    </p>
                    <div class="buyer-review-queue">
                      <span
                        class="status-badge status-pending"
                        id="buyer-review-queue-status"
                      >
                        <i class="fa-regular fa-star" aria-hidden="true"></i>
                        1 awaiting review
                      </span>
                      <p class="small text-muted mt-2 mb-2">
                        Review access is limited to completed bookings. BR-3107
                        is the only eligible booking.
                      </p>
                      <button
                        class="btn-im btn-im-primary btn-im-sm"
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#buyer-review-modal"
                        data-review-open="BR-3107"
                        data-review-summary-cta
                      >
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        Review BR-3107
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Nothing is saved, sent, edited, or deleted.</span
              >
            </div>
          </section>
@endsection

@push('modals')
    <!-- ================= Booking details modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="buyer-booking-details-modal"
      tabindex="-1"
      aria-labelledby="buyer-booking-details-label"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
      >
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">Booking details</p>
              <h2 class="modal-title h5 mb-0" id="buyer-booking-details-label">
                Booking record
              </h2>
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close booking details"
            ></button>
          </div>
          <div class="modal-body">
            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
              <span class="text-muted small"
                >Changes are not saved or sent.</span
              >
            </div>

            <dl class="buyer-detail-list">
              <div>
                <dt>Booking ID</dt>
                <dd id="buyer-detail-id">BR-3101</dd>
              </div>
              <div>
                <dt>Machine</dt>
                <dd id="buyer-detail-machine">Haas CNC Turning Machine ST-20</dd>
              </div>
              <div>
                <dt>Owner / company</dt>
                <dd id="buyer-detail-owner">
                  Patel Engineering &middot; Rajkot
                </dd>
              </div>
              <div>
                <dt>Requested date</dt>
                <dd id="buyer-detail-date">18 Nov 2026</dd>
              </div>
              <div>
                <dt>Requested hours</dt>
                <dd id="buyer-detail-hours">4 hours</dd>
              </div>
              <div>
                <dt>Estimated amount</dt>
                <dd id="buyer-detail-amount">&#8377;3,200</dd>
              </div>
              <div>
                <dt>Booking status</dt>
                <dd id="buyer-detail-status">pending</dd>
              </div>
              <div>
                <dt>Payment status</dt>
                <dd id="buyer-detail-payment">No payment record</dd>
              </div>
            </dl>

            <div class="dashboard-demo-banner mb-0" role="note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>
                <strong>Next step.</strong>
                <span id="buyer-detail-next-step"
                  >Await the machine owner&rsquo;s decision. Payment is not due
                  before acceptance.</span
                >
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <p class="small text-muted mb-0 me-auto">
              No booking, payment, or status record is changed.
            </p>
            <button
              type="button"
              class="btn-im btn-im-outline"
              data-bs-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= Buyer review modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="buyer-review-modal"
      tabindex="-1"
      aria-labelledby="buyer-review-modal-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">Completed booking</p>
              <h2 class="modal-title h5 mb-0" id="buyer-review-modal-label">
                Review completed booking BR-3107
              </h2>
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close review form"
            ></button>
          </div>
          <div class="modal-body">
            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
              <span class="text-muted small"
                >Haas CNC Turning Machine ST-20 &middot; Patel Engineering &middot;
                completed 27 Oct 2026</span
              >
            </div>

            <form
              class="buyer-review-form"
              id="review-form"
              data-review-booking="BR-3107"
            >
              <fieldset class="mb-3">
                <legend class="form-label">Your rating</legend>
                <div class="buyer-rating-options">
                  <label for="buyer-rating-1">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="buyer-rating"
                      id="buyer-rating-1"
                      value="1"
                      required
                    />
                    1
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                    <span class="visually-hidden">star</span>
                  </label>
                  <label for="buyer-rating-2">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="buyer-rating"
                      id="buyer-rating-2"
                      value="2"
                    />
                    2
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                    <span class="visually-hidden">stars</span>
                  </label>
                  <label for="buyer-rating-3">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="buyer-rating"
                      id="buyer-rating-3"
                      value="3"
                    />
                    3
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                    <span class="visually-hidden">stars</span>
                  </label>
                  <label for="buyer-rating-4">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="buyer-rating"
                      id="buyer-rating-4"
                      value="4"
                    />
                    4
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                    <span class="visually-hidden">stars</span>
                  </label>
                  <label for="buyer-rating-5">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="buyer-rating"
                      id="buyer-rating-5"
                      value="5"
                    />
                    5
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                    <span class="visually-hidden">stars</span>
                  </label>
                </div>
              </fieldset>

              <div class="mb-3">
                <label class="form-label" for="buyer-review-comment"
                  >Your review</label
                >
                <textarea
                  class="form-control"
                  id="buyer-review-comment"
                  name="comment"
                  rows="3"
                  maxlength="500"
                  required
                  placeholder="Describe the machine quality, work quality, and timeliness."
                ></textarea>
                <p class="form-text">
                  Maximum 500 characters. The comment is not stored or sent.
                </p>
              </div>

              <p
                class="buyer-review-feedback"
                id="buyer-review-feedback"
                role="status"
                aria-live="polite"
                hidden
              ></p>

              <div class="d-flex flex-wrap align-items-center gap-2">
                <button class="btn-im btn-im-primary" type="submit">
                  <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
                  Submit review
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
                Review storage, editing, removal, and dispute rules are not
                configured. No backend is connected.
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= Buyer logout modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="buyer-logout-modal"
      tabindex="-1"
      aria-labelledby="buyer-logout-modal-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title h5" id="buyer-logout-modal-label">
              Sign out of the buyer dashboard?
            </h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close sign-out confirmation"
            ></button>
          </div>
          <div class="modal-body">
            <p>
              No authentication or session is active. Signing out returns to
              the login interface.
            </p>
            <div class="dashboard-demo-banner mb-0" role="note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>
                No credentials are stored. No server session is created or
                destroyed.
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn-im btn-im-outline"
              data-bs-dismiss="modal"
            >
              Stay on dashboard
            </button>
            <button
              type="button"
              class="btn-im btn-im-danger"
              id="buyer-logout-confirm"
            >
              <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
              Sign out
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= Notifications offcanvas ================= -->
    <div
      class="offcanvas offcanvas-end"
      tabindex="-1"
      role="dialog"
      id="notifications-offcanvas"
      aria-labelledby="notifications-offcanvas-label"
    >
      <div class="offcanvas-header">
        <div>
          <h2 class="offcanvas-title h5 mb-0" id="notifications-offcanvas-label">
            Notifications
          </h2>
          <p class="small text-muted mb-0">Buyer inbox</p>
        </div>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"
          aria-label="Close notifications"
        ></button>
      </div>
      <div class="offcanvas-body p-0">
        <div
          class="d-flex align-items-center justify-content-between gap-2 border-bottom px-3 py-2"
        >
          <span class="small text-muted">Notifications</span>
          <span class="badge text-bg-light border" id="notifications-count-badge"
            >3 unread</span
          >
        </div>

        <div class="notification-item unread">
          <span
            class="notification-icon activity-icon-warning"
            aria-hidden="true"
          >
            <i class="fa-regular fa-clock"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">
              BR-3103 is awaiting payment after owner acceptance
            </p>
            <span class="notification-time">Today, 11:20 AM</span>
          </div>
        </div>

        <div class="notification-item unread">
          <span
            class="notification-icon activity-icon-info"
            aria-hidden="true"
          >
            <i class="fa-solid fa-calendar-check"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">
              Booking BR-3102 was accepted by the machine owner
            </p>
            <span class="notification-time">Yesterday, 04:10 PM</span>
          </div>
        </div>

        <div class="notification-item unread">
          <span
            class="notification-icon activity-icon-success"
            aria-hidden="true"
          >
            <i class="fa-solid fa-star"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">
              BR-3107 is completed and awaiting your review
            </p>
            <span class="notification-time">Yesterday, 09:35 AM</span>
          </div>
        </div>

        <div class="notification-item">
          <span
            class="notification-icon activity-icon-success"
            aria-hidden="true"
          >
            <i class="fa-solid fa-circle-check"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">
              Payment for BR-3105 was successful; work is in progress
            </p>
            <span class="notification-time">06 Nov 2026, 12:05 PM</span>
          </div>
        </div>
      </div>
      <div class="border-top p-3">
        <button
          class="btn-im btn-im-outline w-100"
          type="button"
          id="btn-mark-notifications-read"
          aria-label="Mark all notifications as read"
        >
          <i class="fa-solid fa-envelope-open-text" aria-hidden="true"></i>
          Mark all as read
        </button>
        <p class="small text-muted mt-2 mb-0">
          Notifications are not stored or sent.
        </p>
      </div>
    </div>
@endpush
