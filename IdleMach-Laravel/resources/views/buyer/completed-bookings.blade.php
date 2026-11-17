@extends('layouts.buyer')

@section('title', 'Completed Bookings — IdleMach Buyer')

@section('meta_description', 'Completed buyer bookings with booking ID, machine image and name, owner, work start date, completion date, total amount, completion status, view details, and review access.')

@section('page_title', 'Completed Bookings')

@push('styles')
    <style>
      /* The shared completed-bookings table style was built for seven
         columns. This screen shows nine required columns, so give each one an
         explicit width and keep the table scrolling inside its responsive
         wrapper instead of squeezing the status badges and action buttons. */
      #completed-work .table-buyer-completed {
        min-width: 1500px;
      }

      #completed-work .table-buyer-completed col:nth-child(1) {
        width: 160px;
      }

      #completed-work .table-buyer-completed col:nth-child(2) {
        width: 280px;
      }

      #completed-work .table-buyer-completed col:nth-child(3) {
        width: 160px;
      }

      #completed-work .table-buyer-completed col:nth-child(4) {
        width: 130px;
      }

      #completed-work .table-buyer-completed col:nth-child(5) {
        width: 140px;
      }

      #completed-work .table-buyer-completed col:nth-child(6) {
        width: 120px;
      }

      #completed-work .table-buyer-completed col:nth-child(7) {
        width: 150px;
      }

      #completed-work .table-buyer-completed col:nth-child(8) {
        width: 160px;
      }

      #completed-work .table-buyer-completed col:nth-child(9) {
        width: 200px;
      }

      /* The action column carries two buttons; let them stack inside the cell
         rather than spilling over the column edge. */
      #completed-work .table-buyer-completed .table-actions {
        flex-wrap: wrap;
        justify-content: flex-start;
      }
    </style>
@endpush

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">My bookings</p>
              <h1 class="dashboard-title">Completed Bookings</h1>
              <p class="dashboard-subtitle">
                Finished bookings with completion dates, amounts, and review
                status. Only completed bookings are eligible for a review.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('buyer.reviews') }}">
                <i class="fa-solid fa-star" aria-hidden="true"></i>
                My reviews
              </a>
            </div>
          </div>

          <section class="dashboard-overview" aria-labelledby="completed-overview-heading">
            <div class="dashboard-overview-head">
              <h2 class="dashboard-overview-title" id="completed-overview-heading">
                Completion overview
              </h2>
            </div>
            <div class="dashboard-stats-grid">
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Completed Bookings</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-completed-count">2</p>
                <p class="stat-card-meta">Finished work records</p>
              </div>
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Reviews Submitted</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-reviews-submitted">1</p>
                <p class="stat-card-meta">Feedback already submitted</p>
              </div>
              <div class="stat-card stat-card-alert">
                <div class="stat-card-head">
                  <p class="stat-card-label">Awaiting Review</p>
                  <span class="stat-card-icon stat-icon-approvals">
                    <i class="fa-regular fa-star" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-reviews-awaiting">1</p>
                <p class="stat-card-meta">BR-3107 is review-eligible</p>
              </div>
            </div>
          </section>

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
            <div class="dashboard-card-body dashboard-card-body-flush">
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
                    <col />
                    <col />
                  </colgroup>
                  <thead>
                    <tr>
                      <th scope="col">Booking ID</th>
                      <th scope="col">Machine</th>
                      <th scope="col">Machine owner</th>
                      <th scope="col">Work start date</th>
                      <th scope="col">Completion date</th>
                      <th scope="col">Total amount</th>
                      <th scope="col">Completion status</th>
                      <th scope="col">Review status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
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
                      data-buyer-completed="BR-3106"
                    >
                      <td>
                        <p class="table-cell-title mb-0">BR-3106</p>
                        <span class="table-cell-id">Completed booking</span>
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
                      <td>02 Nov 2026</td>
                      <td>
                        <span class="fw-semibold text-dark">03 Nov 2026</span>
                      </td>
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
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-buyer-view-booking="BR-3106"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View details
                          </button>
                          <a
                            class="btn-im btn-im-outline btn-im-sm"
                            href="{{ route('buyer.reviews') }}"
                          >
                            <i class="fa-solid fa-star" aria-hidden="true"></i>
                            View review
                          </a>
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
                      data-buyer-completed="BR-3107"
                    >
                      <td>
                        <p class="table-cell-title mb-0">BR-3107</p>
                        <span class="table-cell-id">Completed booking</span>
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
                      <td>27 Oct 2026</td>
                      <td>
                        <span class="fw-semibold text-dark">27 Oct 2026</span>
                      </td>
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
                            data-review-action="BR-3107"
                            data-review-open="BR-3107"
                          >
                            <i class="fa-solid fa-star" aria-hidden="true"></i>
                            Review now
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <p class="small text-muted mt-3 mb-0">
                Only completed bookings are review-eligible. Pending, rejected,
                accepted, payment-pending, confirmed, in-progress, and cancelled
                bookings do not show a review form or a review action.
              </p>
            </div>
            <div class="dashboard-card-footer">
              <span>No live completion or review record is created.</span>
              <span class="stat-demo-badge">Completed work</span>
            </div>
          </section>
@endsection
