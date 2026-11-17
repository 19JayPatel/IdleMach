@extends('layouts.owner')

@section('title', 'Booking Requests - IdleMach Owner')

@section('meta_description', 'Incoming owner booking requests with buyer, machine, requested dates, amount, status, and existing accept/reject controls.')

@section('page_title', 'Booking Requests')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Bookings</p>
              <h1 class="dashboard-title">Booking Requests</h1>
              <p class="dashboard-subtitle">
                Incoming buyer requests with machine, schedule, material, amount,
                and status. Existing view, accept, and reject controls are
                preserved.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a
                class="btn-im btn-im-outline"
                href="{{ route('owner.accepted-bookings') }}"
              >
                <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                Accepted bookings
              </a>
            </div>
          </div>

          <section class="dashboard-card" aria-labelledby="request-filters-heading">
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="request-filters-heading">
                <i class="fa-solid fa-filter" aria-hidden="true"></i>
                Search and filter
              </h2>
              <span class="text-muted small">Frontend interface only</span>
            </div>
            <div class="dashboard-card-body">
              <div class="row g-3 align-items-end">
                <div class="col-12 col-md-6">
                  <label class="form-label" for="owner-request-search"
                    >Search requests</label
                  >
                  <input
                    class="form-control"
                    id="owner-request-search"
                    type="search"
                    placeholder="Search by booking ID, buyer, machine, or material"
                  />
                </div>
                <div class="col-6 col-md-3">
                  <label class="form-label" for="owner-request-status-filter"
                    >Status</label
                  >
                  <select class="form-select" id="owner-request-status-filter">
                    <option value="">All statuses</option>
                    <option value="pending">Pending</option>
                    <option value="payment pending">Payment pending</option>
                    <option value="rejected">Rejected</option>
                  </select>
                </div>
                <div class="col-6 col-md-3">
                  <button
                    class="btn-im btn-im-outline w-100"
                    type="button"
                    id="owner-request-filter-reset"
                  >
                    <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
                    Reset
                  </button>
                </div>
              </div>
            </div>
          </section>

          <!-- Priority section: incoming booking requests -->
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
                Booking requests
              </h2>
              <div class="dashboard-card-actions">
                <span class="text-muted small" id="owner-pending-requests-count"
                  >2 pending review</span
                >
                <button
                  class="btn-im btn-im-outline btn-im-sm"
                  type="button"
                  id="btn-reset-owner-requests"
                >
                  <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
                  Reset
                </button>
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
                aria-label="Incoming booking requests table"
              >
                <table class="im-table table-requests">
                  <caption class="visually-hidden">
                    Three booking requests. BR-2041 is accepted and
                    awaiting payment; BR-2042 and BR-2043 await an owner
                    decision.
                  </caption>
                  <thead>
                    <tr>
                      <th scope="col">Booking ID</th>
                      <th scope="col">Buyer / company</th>
                      <th scope="col">Machine</th>
                      <th scope="col">Requested date</th>
                      <th scope="col">Start time</th>
                      <th scope="col">Hours</th>
                      <th scope="col">Material / quantity</th>
                      <th scope="col">Work description</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr data-request-id="BR-2041">
                      <td>
                        <p class="table-cell-title mb-0">BR-2041</p>
                        <span class="table-cell-id">Submitted 27 Oct 2026</span>
                      </td>
                      <td>
                        Apex Auto Components
                        <span class="d-block table-cell-subtext"
                          >Rajesh Sharma</span
                        >
                      </td>
                      <td>
                        Haas CNC Turning Machine ST-20
                        <span class="d-block table-cell-subtext">M-1001</span>
                      </td>
                      <td>28 Oct 2026</td>
                      <td>10:00 AM &ndash; 06:00 PM</td>
                      <td>8 hours</td>
                      <td>
                        Mild Steel EN8
                        <span class="d-block table-cell-subtext"
                          >120 pieces</span
                        >
                      </td>
                      <td class="request-desc-cell">
                        CNC turning of precision stepped shafts with keyway
                        slots. Tolerance &plusmn;0.015 mm.
                      </td>
                      <td class="request-status-cell">
                        <span class="status-badge status-payment-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Payment Pending
                        </span>
                      </td>
                      <td class="request-actions-cell">
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-view-request"
                            data-request-id="BR-2041"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <span
                            class="badge bg-info-subtle text-info-emphasis border border-info-subtle px-2 py-1"
                            ><i class="fa-solid fa-check me-1"></i>Accepted
                            &middot; Awaiting Buyer Payment</span
                          >
                        </div>
                      </td>
                    </tr>

                    <tr data-request-id="BR-2042">
                      <td>
                        <p class="table-cell-title mb-0">BR-2042</p>
                        <span class="table-cell-id">Submitted 27 Oct 2026</span>
                      </td>
                      <td>
                        Kavita Hydraulics
                        <span class="d-block table-cell-subtext"
                          >Dharmesh Mehta</span
                        >
                      </td>
                      <td>
                        ACE Micromatic VMC 850V
                        <span class="d-block table-cell-subtext">M-1002</span>
                      </td>
                      <td>28 Oct 2026</td>
                      <td>08:00 AM &ndash; 08:00 PM</td>
                      <td>12 hours</td>
                      <td>
                        Aluminium 6061-T6
                        <span class="d-block table-cell-subtext">30 sets</span>
                      </td>
                      <td class="request-desc-cell">
                        Milling and surface profiling of hydraulic manifold
                        blocks with M12 tapped port holes.
                      </td>
                      <td class="request-status-cell">
                        <span class="status-badge status-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Pending
                        </span>
                      </td>
                      <td class="request-actions-cell">
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-view-request"
                            data-request-id="BR-2042"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <button
                            class="btn-im btn-im-primary btn-im-sm"
                            type="button"
                            data-action="owner-accept-request"
                            data-request-id="BR-2042"
                          >
                            <i class="fa-solid fa-check" aria-hidden="true"></i>
                            Accept
                          </button>
                          <button
                            class="btn-im btn-im-danger btn-im-sm"
                            type="button"
                            data-action="owner-reject-request"
                            data-request-id="BR-2042"
                          >
                            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                            Reject
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr data-request-id="BR-2043">
                      <td>
                        <p class="table-cell-title mb-0">BR-2043</p>
                        <span class="table-cell-id">Submitted 28 Oct 2026</span>
                      </td>
                      <td>
                        Delta Gears &amp; Shafts
                        <span class="d-block table-cell-subtext"
                          >Vijay Chawla</span
                        >
                      </td>
                      <td>
                        Haas VF-2 CNC Vertical Milling
                        <span class="d-block table-cell-subtext">M-1003</span>
                      </td>
                      <td>30 Oct 2026</td>
                      <td>02:00 PM &ndash; 06:00 PM</td>
                      <td>4 hours</td>
                      <td>
                        Cast Steel Grade 2
                        <span class="d-block table-cell-subtext">15 pieces</span>
                      </td>
                      <td class="request-desc-cell">
                        Keyway slotting and bolt pattern face milling on pinion
                        drive blanks.
                      </td>
                      <td class="request-status-cell">
                        <span class="status-badge status-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Pending
                        </span>
                      </td>
                      <td class="request-actions-cell">
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-view-request"
                            data-request-id="BR-2043"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <button
                            class="btn-im btn-im-primary btn-im-sm"
                            type="button"
                            data-action="owner-accept-request"
                            data-request-id="BR-2043"
                          >
                            <i class="fa-solid fa-check" aria-hidden="true"></i>
                            Accept
                          </button>
                          <button
                            class="btn-im btn-im-danger btn-im-sm"
                            type="button"
                            data-action="owner-reject-request"
                            data-request-id="BR-2043"
                          >
                            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                            Reject
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Workflow order: request &rarr; owner acceptance &rarr; buyer
                payment &rarr; confirmed booking. Acceptance sets
                <code>payment_pending</code>, never <code>confirmed</code>.
                BR-2042 exceeds the current available capacity on M-1002 and
                cannot be accepted.</span
              >
            </div>
          </section>

          <!-- Owner workflow reference -->
          <section
            class="dashboard-card dashboard-reference"
            id="owner-rules"
            aria-labelledby="owner-rules-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="owner-rules-heading">
                <i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
                Owner workflow reference
              </h2>
              <span class="stat-demo-badge">Business rules</span>
            </div>
            <div class="dashboard-card-body">
              <ul class="rules-reference-list">
                <li class="rules-reference-item">
                  <i class="fa-solid fa-check" aria-hidden="true"></i>
                  <span>Only approved machines appear in the marketplace.</span>
                </li>
                <li class="rules-reference-item">
                  <i class="fa-solid fa-check" aria-hidden="true"></i>
                  <span>Only active machines can receive booking requests.</span>
                </li>
                <li class="rules-reference-item">
                  <i class="fa-solid fa-check" aria-hidden="true"></i>
                  <span
                    >Available Capacity = Total Capacity &minus; Booked
                    Capacity.</span
                  >
                </li>
                <li class="rules-reference-item">
                  <i class="fa-solid fa-check" aria-hidden="true"></i>
                  <span
                    >Owner acceptance precedes buyer payment; payment precedes
                    booking confirmation.</span
                  >
                </li>
                <li class="rules-reference-item">
                  <i class="fa-solid fa-check" aria-hidden="true"></i>
                  <span
                    >Completion requires successful payment, a confirmed or
                    in-progress booking, and finished work.</span
                  >
                </li>
                <li class="rules-reference-item">
                  <i class="fa-solid fa-check" aria-hidden="true"></i>
                  <span
                    >Reviews are permitted only after a booking is
                    completed.</span
                  >
                </li>
              </ul>
            </div>
            <div class="dashboard-card-footer">
              <span
                >These rules describe the documented IdleMach workflow.</span
              >
              <span class="stat-demo-badge">Reference only</span>
            </div>
          </section>

@push('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var table = document.querySelector(".table-requests");
        if (!table) {
          return;
        }
        var search = document.getElementById("owner-request-search");
        var status = document.getElementById("owner-request-status-filter");
        var reset = document.getElementById("owner-request-filter-reset");

        function applyFilters() {
          var term = (search.value || "").toLowerCase();
          var state = (status.value || "").toLowerCase();
          Array.prototype.forEach.call(
            table.querySelectorAll("tbody tr"),
            function (row) {
              var statusCell = row.querySelector(".request-status-cell");
              var rowStatus = statusCell ? statusCell.textContent.toLowerCase() : "";
              var matchesTerm = !term || row.textContent.toLowerCase().indexOf(term) !== -1;
              var matchesStatus = !state || rowStatus.indexOf(state) !== -1;
              row.hidden = !(matchesTerm && matchesStatus);
            }
          );
        }

        search.addEventListener("input", applyFilters);
        status.addEventListener("change", applyFilters);
        reset.addEventListener("click", function () {
          search.value = "";
          status.value = "";
          applyFilters();
        });
      });
    </script>
@endpush
@endsection
