@extends('layouts.buyer')

@section('title', 'Booking Requests — IdleMach Buyer')

@section('meta_description', 'Buyer booking requests with booking ID, machine image and name, owner, requested dates, duration, amount, request date, status, view details, and a preview cancel request interface.')

@section('page_title', 'Booking Requests')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">My bookings</p>
              <h1 class="dashboard-title">Booking Requests</h1>
              <p class="dashboard-subtitle">
                Every booking request you have submitted, with its machine,
                owner, requested date, duration, amount, and current status.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('buyer.accepted-bookings') }}">
                <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                Accepted bookings
              </a>
            </div>
          </div>

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
                    rejected. Cancellation is available as a frontend preview
                    for selected active requests.
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
                      <td>18 Nov 2026</td>
                      <td>4 hours</td>
                      <td>
                        &#8377;3,200
                        <span class="d-block table-cell-subtext"
                          >4 hrs &times; &#8377;800</span
                        >
                      </td>
                      <td class="buyer-booking-status-cell">
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
                          <button
                            class="btn-im btn-im-danger btn-im-sm"
                            type="button"
                            data-buyer-cancel="BR-3101"
                          >
                            <i class="fa-solid fa-ban" aria-hidden="true"></i>
                            Cancel request
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
                      <td>
                        &#8377;2,850
                        <span class="d-block table-cell-subtext"
                          >3 hrs &times; &#8377;950</span
                        >
                      </td>
                      <td class="buyer-booking-status-cell">
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
                          <button
                            class="btn-im btn-im-danger btn-im-sm"
                            type="button"
                            data-buyer-cancel="BR-3102"
                          >
                            <i class="fa-solid fa-ban" aria-hidden="true"></i>
                            Cancel request
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
                      <td class="buyer-booking-status-cell">
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
                          <button
                            class="btn-im btn-im-danger btn-im-sm"
                            type="button"
                            data-buyer-cancel="BR-3103"
                          >
                            <i class="fa-solid fa-ban" aria-hidden="true"></i>
                            Cancel request
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
                      <td class="buyer-booking-status-cell">
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
                      <td>08 Nov 2026</td>
                      <td>4 hours</td>
                      <td>
                        &#8377;3,200
                        <span class="d-block table-cell-subtext"
                          >4 hrs &times; &#8377;800</span
                        >
                      </td>
                      <td class="buyer-booking-status-cell">
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
                      <td>3 hours</td>
                      <td>
                        &#8377;2,850
                        <span class="d-block table-cell-subtext"
                          >3 hrs &times; &#8377;950</span
                        >
                      </td>
                      <td class="buyer-booking-status-cell">
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
                      <td>4 hours</td>
                      <td>
                        &#8377;3,200
                        <span class="d-block table-cell-subtext"
                          >4 hrs &times; &#8377;800</span
                        >
                      </td>
                      <td class="buyer-booking-status-cell">
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
                      <td class="buyer-booking-status-cell">
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
                <code>completed</code>, and <code>cancelled</code>. Cancel
                request is a frontend preview for selected active requests only.
                Cancellation deadlines, permitted stages, and refund rules are
                not configured.
              </p>
            </div>
            <div class="dashboard-card-footer">
              <span
                >No live booking, cancellation, payment, or notification is
                created by this page.</span
              >
            </div>
          </section>

@push('modals')
    <!-- ================= Cancel request modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="buyer-cancel-request-modal"
      tabindex="-1"
      aria-labelledby="buyer-cancel-request-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">Cancel request</p>
              <h2 class="modal-title h5 mb-0" id="buyer-cancel-request-label">
                Cancel booking request
                <span id="buyer-cancel-booking-id">BR-3101</span>?
              </h2>
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close cancel request confirmation"
            ></button>
          </div>
          <div class="modal-body">
            <p class="mb-2">
              This is a frontend preview. The booking request status changes on
              this page only; no owner notification is sent and no booking
              record is changed.
            </p>
            <div class="dashboard-demo-banner mb-0" role="note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>
                Cancellation deadlines and refund rules are not defined in the
                project documents.
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn-im btn-im-outline"
              data-bs-dismiss="modal"
            >
              Keep request
            </button>
            <button
              type="button"
              class="btn-im btn-im-danger"
              id="buyer-cancel-confirm"
            >
              <i class="fa-solid fa-ban" aria-hidden="true"></i>
              Cancel request
            </button>
          </div>
        </div>
      </div>
    </div>
@endpush

@push('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var modalElement = document.getElementById("buyer-cancel-request-modal");
        var confirmButton = document.getElementById("buyer-cancel-confirm");
        var bookingLabel = document.getElementById("buyer-cancel-booking-id");
        if (!modalElement || !confirmButton || !window.bootstrap) {
          return;
        }

        var modal = new window.bootstrap.Modal(modalElement);
        var pendingId = null;

        var showNotice = function (message) {
          var toast = document.getElementById("preview-toast");
          var toastMessage = document.getElementById("preview-toast-message");
          if (!toast || !toastMessage) {
            return;
          }
          toastMessage.textContent = message;
          toast.hidden = false;
          window.setTimeout(function () {
            toast.hidden = true;
          }, 5200);
        };

        var refreshStatusCounts = function () {
          var rows = document.querySelectorAll(
            "#booking-requests [data-buyer-booking]"
          );
          var filters = document.querySelectorAll(
            "#booking-requests [data-booking-filter]"
          );

          filters.forEach(function (filter) {
            var status = filter.getAttribute("data-booking-filter");
            var count = 0;
            rows.forEach(function (row) {
              if (status === "all" || row.getAttribute("data-status") === status) {
                count += 1;
              }
            });
            var badge = filter.querySelector("strong");
            if (badge) {
              badge.textContent = String(count);
            }
          });
        };

        document.querySelectorAll("[data-buyer-cancel]").forEach(function (button) {
          button.addEventListener("click", function () {
            pendingId = button.getAttribute("data-buyer-cancel");
            if (bookingLabel) {
              bookingLabel.textContent = pendingId;
            }
            modal.show();
          });
        });

        confirmButton.addEventListener("click", function () {
          if (!pendingId) {
            return;
          }

          var row = document.querySelector(
            '#booking-requests [data-buyer-booking][data-booking-id="' +
              pendingId +
              '"]'
          );
          if (!row) {
            return;
          }

          row.setAttribute("data-status", "cancelled");
          var statusCell = row.querySelector(".buyer-booking-status-cell");
          if (statusCell) {
            statusCell.innerHTML =
              '<span class="status-badge status-cancelled">' +
              '<i class="fa-solid fa-circle-xmark" aria-hidden="true"></i> Cancelled</span>';
          }

          var cancelButton = row.querySelector("[data-buyer-cancel]");
          if (cancelButton) {
            cancelButton.remove();
          }

          refreshStatusCounts();

          var selectedFilter = document.querySelector(
            "#booking-requests [data-booking-filter].is-selected"
          );
          if (selectedFilter) {
            selectedFilter.click();
          }

          modal.hide();
          showNotice(
            "Booking request " +
              pendingId +
              " is shown as cancelled on this page only. No record was changed."
          );
          pendingId = null;
        });
      });
    </script>
@endpush
@endsection
