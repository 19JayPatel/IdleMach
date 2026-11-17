@extends('layouts.buyer')

@section('title', 'Ongoing Work — IdleMach Buyer')

@section('meta_description', 'Ongoing buyer bookings with booking ID, machine image and name, owner details, work start date, expected completion, duration, and clear in-progress status indicators.')

@section('page_title', 'Ongoing Work')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">My bookings</p>
              <h1 class="dashboard-title">Ongoing Work</h1>
              <p class="dashboard-subtitle">
                Bookings that are paid and currently being worked on, with start
                and expected completion dates.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('buyer.completed-bookings') }}">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Completed bookings
              </a>
            </div>
          </div>

          <section class="dashboard-overview" aria-labelledby="ongoing-overview-heading">
            <div class="dashboard-overview-head">
              <h2 class="dashboard-overview-title" id="ongoing-overview-heading">
                Active work overview
              </h2>
            </div>
            <div class="dashboard-stats-grid">
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Active Jobs</p>
                  <span class="stat-card-icon stat-icon-machines">
                    <i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-active-jobs">1</p>
                <p class="stat-card-meta">Work currently in progress</p>
              </div>
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Total Ongoing Hours</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-regular fa-clock" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-ongoing-hours">4</p>
                <p class="stat-card-meta">Booked hours across active work</p>
              </div>
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Ongoing Value</p>
                  <span class="stat-card-icon stat-icon-payments">
                    <i class="fa-solid fa-indian-rupee-sign" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-ongoing-value">&#8377;3,200</p>
                <p class="stat-card-meta">Paid amount for active work</p>
              </div>
            </div>
          </section>

          <section
            class="dashboard-card"
            id="ongoing-work"
            aria-labelledby="ongoing-work-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="ongoing-work-heading">
                <i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i>
                Work in progress
              </h2>
              <div class="dashboard-card-actions">
                <span class="text-muted small">1 active booking</span>
              </div>
            </div>
            <div class="dashboard-card-body dashboard-card-body-flush">
              <span class="table-scroll-hint" hidden>
                <i class="fa-solid fa-arrows-left-right" aria-hidden="true"></i>
                Scroll the table sideways to see all columns.
              </span>
              <div
                class="table-responsive"
                tabindex="0"
                role="region"
                aria-label="Ongoing work table"
              >
                <table class="im-table table-buyer-ongoing">
                  <caption class="visually-hidden">
                    One ongoing booking, BR-3105, for the Haas CNC Turning
                    Machine ST-20. Work started on 08 Nov 2026 with a 4-hour
                    duration, so expected completion is the same day.
                  </caption>
                  <thead>
                    <tr>
                      <th scope="col">Booking ID</th>
                      <th scope="col">Machine</th>
                      <th scope="col">Machine owner</th>
                      <th scope="col">Work start date</th>
                      <th scope="col">Expected completion</th>
                      <th scope="col">Duration</th>
                      <th scope="col">Total amount</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
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
                        <span class="table-cell-id">Paid &middot; work started</span>
                      </td>
                      <td>
                        <div class="machine-name-cell">
                          <img
                            class="machine-thumb"
                            src="{{ asset('assets/images/machine-turning.svg') }}"
                            alt="Illustration of a CNC turning machine."
                            width="48"
                            height="48"
                            loading="lazy"
                          />
                          <div>
                            <p class="table-cell-title mb-0">
                              Haas CNC Turning Machine ST-20
                            </p>
                            <span class="table-cell-subtext d-block">Listing 1</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        Patel Engineering
                        <span class="d-block table-cell-subtext">Rajkot</span>
                      </td>
                      <td>
                        <span class="fw-semibold text-dark">08 Nov 2026</span>
                        <span class="d-block table-cell-subtext">Work start date</span>
                      </td>
                      <td>
                        <span class="fw-semibold text-dark">08 Nov 2026</span>
                        <span class="d-block table-cell-subtext"
                          >Same day &middot; 4-hour job</span
                        >
                      </td>
                      <td>4 hours</td>
                      <td>&#8377;3,200</td>
                      <td>
                        <span class="status-badge status-in-progress">
                          <i
                            class="fa-solid fa-screwdriver-wrench"
                            aria-hidden="true"
                          ></i>
                          In Progress
                        </span>
                        <span class="status-badge status-successful d-block mt-1">
                          <i
                            class="fa-solid fa-circle-check"
                            aria-hidden="true"
                          ></i>
                          Payment successful
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
                          <a
                            class="btn-im btn-im-outline btn-im-sm"
                            href="{{ route('buyer.payments') }}"
                          >
                            <i class="fa-solid fa-receipt" aria-hidden="true"></i>
                            Payment record
                          </a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <p class="small text-muted mt-3 mb-0">
                The existing booking record contains the booking date and
                requested hours, not a live progress percentage. Expected
                completion is shown as the booked work date for this 4-hour
                booking. No completion date has been recorded yet.
              </p>
            </div>
            <div class="dashboard-card-footer">
              <span
                >No live work progress, completion, or payment record is created
                by this page.</span
              >
            </div>
          </section>
@endsection
