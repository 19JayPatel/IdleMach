@extends('layouts.buyer')

@section('title', 'Accepted Bookings — IdleMach Buyer')

@section('meta_description', 'Accepted and confirmed buyer bookings with booking ID, machine image and name, owner, booking dates, duration, total amount, booking status, and view details.')

@section('page_title', 'Accepted Bookings')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">My bookings</p>
              <h1 class="dashboard-title">Accepted Bookings</h1>
              <p class="dashboard-subtitle">
                Booking requests accepted by the machine owner, plus confirmed
                bookings where payment has succeeded.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('buyer.booking-requests') }}">
                <i class="fa-solid fa-inbox" aria-hidden="true"></i>
                All booking requests
              </a>
            </div>
          </div>

          <section class="dashboard-overview" aria-labelledby="accepted-overview-heading">
            <div class="dashboard-overview-head">
              <h2 class="dashboard-overview-title" id="accepted-overview-heading">
                Accepted overview
              </h2>
            </div>
            <div class="dashboard-stats-grid">
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Accepted Requests</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-accepted-count">1</p>
                <p class="stat-card-meta">Owner accepted &middot; no payment recorded</p>
              </div>
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Confirmed Bookings</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-confirmed-count">1</p>
                <p class="stat-card-meta">Confirmed by successful payment</p>
              </div>
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Combined Booking Value</p>
                  <span class="stat-card-icon stat-icon-payments">
                    <i class="fa-solid fa-indian-rupee-sign" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-accepted-value">&#8377;8,600</p>
                <p class="stat-card-meta">Accepted and confirmed records</p>
              </div>
            </div>
          </section>

          <section
            class="dashboard-card"
            id="accepted-bookings"
            aria-labelledby="accepted-bookings-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="accepted-bookings-heading">
                <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                Accepted and confirmed bookings
              </h2>
              <div class="dashboard-card-actions">
                <span class="text-muted small">2 records</span>
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
                aria-label="Accepted bookings table"
              >
                <table class="im-table table-buyer-accepted">
                  <caption class="visually-hidden">
                    Two accepted-stage bookings: BR-3102 is accepted and awaiting
                    payment; BR-3104 is confirmed after successful payment.
                  </caption>
                  <thead>
                    <tr>
                      <th scope="col">Booking ID</th>
                      <th scope="col">Machine</th>
                      <th scope="col">Machine owner</th>
                      <th scope="col">Booking date</th>
                      <th scope="col">Duration</th>
                      <th scope="col">Total amount</th>
                      <th scope="col">Booking status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
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
                        <span class="table-cell-id">Accepted booking</span>
                      </td>
                      <td>
                        <div class="machine-name-cell">
                          <img
                            class="machine-thumb"
                            src="{{ asset('assets/images/machine-fabrication.svg') }}"
                            alt="Illustration of a hydraulic press brake bending sheet metal."
                            width="48"
                            height="48"
                            loading="lazy"
                          />
                          <div>
                            <p class="table-cell-title mb-0">Hydraulic Press Brake</p>
                            <span class="table-cell-subtext d-block">Listing 3</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        Sample Fabrication Co.
                        <span class="d-block table-cell-subtext">Pune</span>
                      </td>
                      <td>20 Nov 2026</td>
                      <td>3 hours</td>
                      <td>&#8377;2,850</td>
                      <td>
                        <span class="status-badge status-accepted">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Accepted
                        </span>
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
                          <a
                            class="btn-im btn-im-outline btn-im-sm"
                            href="{{ route('buyer.payments') }}"
                          >
                            <i class="fa-solid fa-receipt" aria-hidden="true"></i>
                            Payment status
                          </a>
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
                        <span class="table-cell-id">Confirmed booking</span>
                      </td>
                      <td>
                        <div class="machine-name-cell">
                          <img
                            class="machine-thumb"
                            src="{{ asset('assets/images/machine-milling.svg') }}"
                            alt="Illustration of a vertical machining centre."
                            width="48"
                            height="48"
                            loading="lazy"
                          />
                          <div>
                            <p class="table-cell-title mb-0">
                              Vertical Machining Centre
                            </p>
                            <span class="table-cell-subtext d-block">Listing 2</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        Sample Precision Works
                        <span class="d-block table-cell-subtext">Coimbatore</span>
                      </td>
                      <td>24 Nov 2026</td>
                      <td>5 hours</td>
                      <td>&#8377;5,750</td>
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
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-buyer-view-booking="BR-3104"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View details
                          </button>
                          <a
                            class="btn-im btn-im-outline btn-im-sm"
                            href="{{ route('buyer.payments') }}"
                          >
                            <i class="fa-solid fa-receipt" aria-hidden="true"></i>
                            View payment
                          </a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <p class="small text-muted mt-3 mb-0">
                An accepted request is not confirmed until payment succeeds.
                BR-3102 is accepted with no payment record; BR-3104 is confirmed
                by a successful payment. Work has not started on either booking.
              </p>
            </div>
            <div class="dashboard-card-footer">
              <span>No live booking status is changed by this page.</span>
            </div>
          </section>
@endsection
