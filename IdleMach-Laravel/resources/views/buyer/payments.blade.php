@extends('layouts.buyer')

@section('title', 'Payments and History — IdleMach Buyer')

@section('meta_description', 'Buyer payment and transaction history with transaction ID, booking ID, machine, owner, amount, date, method, and status, plus search, status filters, date filters, and payment summaries.')

@section('page_title', 'Payments and History')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Financial</p>
              <h1 class="dashboard-title">Payments and History</h1>
              <p class="dashboard-subtitle">
                Payment records for your bookings with amounts, dates, statuses,
                and a filterable transaction history. No payment gateway is
                connected.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('buyer.booking-requests') }}">
                <i class="fa-solid fa-inbox" aria-hidden="true"></i>
                Booking requests
              </a>
            </div>
          </div>

          <section class="dashboard-overview" aria-labelledby="payment-summary-heading">
            <div class="dashboard-overview-head">
              <h2 class="dashboard-overview-title" id="payment-summary-heading">
                Payment summary
              </h2>
            </div>
            <div class="dashboard-stats-grid">
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Total Transactions</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-receipt" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-total-transactions">6</p>
                <p class="stat-card-meta">All payment records</p>
              </div>
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Successful Payments</p>
                  <span class="stat-card-icon stat-icon-payments">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-successful-payments">
                  &#8377;15,000
                </p>
                <p class="stat-card-meta">Across 4 successful records</p>
              </div>
              <div class="stat-card stat-card-alert">
                <div class="stat-card-head">
                  <p class="stat-card-label">Pending Payment</p>
                  <span class="stat-card-icon stat-icon-approvals">
                    <i class="fa-regular fa-clock" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-pending-payment">&#8377;6,900</p>
                <p class="stat-card-meta">1 record &middot; booking not confirmed</p>
              </div>
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Failed Attempts</p>
                  <span class="stat-card-icon stat-icon-approvals">
                    <i class="fa-solid fa-circle-xmark" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-failed-payments">&#8377;6,900</p>
                <p class="stat-card-meta">1 attempt &middot; no confirmation</p>
              </div>
            </div>
          </section>

          <section class="dashboard-card" aria-labelledby="payment-filters-heading">
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="payment-filters-heading">
                <i class="fa-solid fa-filter" aria-hidden="true"></i>
                Search and filter
              </h2>
              <span class="text-muted small">Frontend interface only</span>
            </div>
            <div class="dashboard-card-body">
              <div class="row g-3 align-items-end">
                <div class="col-12 col-lg-4">
                  <label class="form-label" for="buyer-payment-search"
                    >Search payments</label
                  >
                  <input
                    class="form-control"
                    id="buyer-payment-search"
                    type="search"
                    placeholder="Search by transaction ID, booking ID, machine, or owner"
                    autocomplete="off"
                  />
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                  <label class="form-label" for="buyer-payment-status-filter"
                    >Status</label
                  >
                  <select class="form-select" id="buyer-payment-status-filter">
                    <option value="">All statuses</option>
                    <option value="pending">Pending</option>
                    <option value="successful">Successful</option>
                    <option value="failed">Failed</option>
                    <option value="refunded">Refunded</option>
                  </select>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                  <label class="form-label" for="buyer-payment-date-from"
                    >From date</label
                  >
                  <input
                    class="form-control"
                    id="buyer-payment-date-from"
                    type="date"
                  />
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                  <label class="form-label" for="buyer-payment-date-to"
                    >To date</label
                  >
                  <input
                    class="form-control"
                    id="buyer-payment-date-to"
                    type="date"
                  />
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                  <button
                    class="btn-im btn-im-outline w-100"
                    type="button"
                    id="buyer-payment-filter-reset"
                  >
                    <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
                    Reset
                  </button>
                </div>
              </div>
            </div>
          </section>

          <section
            class="dashboard-card"
            id="payments"
            aria-labelledby="payments-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="payments-heading">
                <i class="fa-solid fa-receipt" aria-hidden="true"></i>
                Transaction history
              </h2>
              <div class="dashboard-card-actions">
                <span
                  class="text-muted small"
                  id="buyer-payment-results-summary"
                  role="status"
                  aria-live="polite"
                  >Showing all 6 transactions.</span
                >
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
                aria-label="Buyer payment history table"
                id="buyer-payment-table-wrap"
              >
                <table class="im-table table-buyer-payments-full">
                  <caption class="visually-hidden">
                    Six payment records: four successful, one pending, and one
                    failed attempt. No refunded record is shown because refund
                    rules are not defined.
                  </caption>
                  <thead>
                    <tr>
                      <th scope="col">Transaction ID</th>
                      <th scope="col">Booking ID</th>
                      <th scope="col">Machine</th>
                      <th scope="col">Machine owner</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Payment date</th>
                      <th scope="col">Method</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      data-buyer-payment
                      data-payment-id="PAY-7206"
                      data-booking-id="BR-3103"
                      data-status="pending"
                      data-date="2026-11-06"
                      data-search="pay-7206 br-3103 vertical machining centre sample precision works coimbatore pending"
                    >
                      <td>
                        <p class="table-cell-title mb-0">PAY-7206</p>
                        <span class="table-cell-id">Payment record</span>
                      </td>
                      <td>BR-3103</td>
                      <td>Vertical Machining Centre</td>
                      <td>Sample Precision Works</td>
                      <td>&#8377;6,900</td>
                      <td>06 Nov 2026</td>
                      <td><span class="table-cell-subtext">Not recorded</span></td>
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

                    <tr
                      data-buyer-payment
                      data-payment-id="PAY-7205"
                      data-booking-id="BR-3103"
                      data-status="failed"
                      data-date="2026-11-05"
                      data-search="pay-7205 br-3103 vertical machining centre sample precision works coimbatore failed"
                    >
                      <td>
                        <p class="table-cell-title mb-0">PAY-7205</p>
                        <span class="table-cell-id">Payment attempt</span>
                      </td>
                      <td>BR-3103</td>
                      <td>Vertical Machining Centre</td>
                      <td>Sample Precision Works</td>
                      <td>&#8377;6,900</td>
                      <td>05 Nov 2026</td>
                      <td><span class="table-cell-subtext">Not recorded</span></td>
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

                    <tr
                      data-buyer-payment
                      data-payment-id="PAY-7204"
                      data-booking-id="BR-3104"
                      data-status="successful"
                      data-date="2026-10-29"
                      data-search="pay-7204 br-3104 vertical machining centre sample precision works coimbatore successful"
                    >
                      <td>
                        <p class="table-cell-title mb-0">PAY-7204</p>
                        <span class="table-cell-id">Payment record</span>
                      </td>
                      <td>BR-3104</td>
                      <td>Vertical Machining Centre</td>
                      <td>Sample Precision Works</td>
                      <td>&#8377;5,750</td>
                      <td>29 Oct 2026</td>
                      <td><span class="table-cell-subtext">Not recorded</span></td>
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

                    <tr
                      data-buyer-payment
                      data-payment-id="PAY-7203"
                      data-booking-id="BR-3105"
                      data-status="successful"
                      data-date="2026-11-06"
                      data-search="pay-7203 br-3105 haas cnc turning machine st-20 patel engineering rajkot successful"
                    >
                      <td>
                        <p class="table-cell-title mb-0">PAY-7203</p>
                        <span class="table-cell-id">Payment record</span>
                      </td>
                      <td>BR-3105</td>
                      <td>Haas CNC Turning Machine ST-20</td>
                      <td>Patel Engineering</td>
                      <td>&#8377;3,200</td>
                      <td>06 Nov 2026</td>
                      <td><span class="table-cell-subtext">Not recorded</span></td>
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

                    <tr
                      data-buyer-payment
                      data-payment-id="PAY-7202"
                      data-booking-id="BR-3106"
                      data-status="successful"
                      data-date="2026-10-28"
                      data-search="pay-7202 br-3106 hydraulic press brake sample fabrication co pune successful"
                    >
                      <td>
                        <p class="table-cell-title mb-0">PAY-7202</p>
                        <span class="table-cell-id">Payment record</span>
                      </td>
                      <td>BR-3106</td>
                      <td>Hydraulic Press Brake</td>
                      <td>Sample Fabrication Co.</td>
                      <td>&#8377;2,850</td>
                      <td>28 Oct 2026</td>
                      <td><span class="table-cell-subtext">Not recorded</span></td>
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

                    <tr
                      data-buyer-payment
                      data-payment-id="PAY-7201"
                      data-booking-id="BR-3107"
                      data-status="successful"
                      data-date="2026-10-23"
                      data-search="pay-7201 br-3107 haas cnc turning machine st-20 patel engineering rajkot successful"
                    >
                      <td>
                        <p class="table-cell-title mb-0">PAY-7201</p>
                        <span class="table-cell-id">Payment record</span>
                      </td>
                      <td>BR-3107</td>
                      <td>Haas CNC Turning Machine ST-20</td>
                      <td>Patel Engineering</td>
                      <td>&#8377;3,200</td>
                      <td>23 Oct 2026</td>
                      <td><span class="table-cell-subtext">Not recorded</span></td>
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

              <div class="empty-state machines-empty" id="buyer-payments-empty" hidden>
                <div class="empty-state-icon">
                  <i class="fa-solid fa-receipt" aria-hidden="true"></i>
                </div>
                <h3>No transactions match these filters</h3>
                <p>
                  Try a different search term, payment status, or date range.
                  This history only covers the six payment records on this page.
                </p>
                <button
                  class="btn-im btn-im-outline btn-im-sm mt-3"
                  type="button"
                  id="buyer-payments-empty-clear"
                >
                  Clear filters
                </button>
              </div>

              <p class="small text-muted mt-3 mb-0">
                Payment statuses use the documented set:
                <code>pending</code>, <code>successful</code>,
                <code>failed</code>, and <code>refunded</code>. A pending or failed
                payment is never presented as a confirmed booking. Payment
                method is not included in the existing payment records, and
                refund rules are not defined.
              </p>
            </div>
            <div class="dashboard-card-footer">
              <span
                >No commission, tax, invoice, payout, gateway fee, or live payment
                is created by this page.</span
              >
            </div>
          </section>

@push('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var search = document.getElementById("buyer-payment-search");
        var status = document.getElementById("buyer-payment-status-filter");
        var dateFrom = document.getElementById("buyer-payment-date-from");
        var dateTo = document.getElementById("buyer-payment-date-to");
        var reset = document.getElementById("buyer-payment-filter-reset");
        var emptyClear = document.getElementById("buyer-payments-empty-clear");
        var tableWrap = document.getElementById("buyer-payment-table-wrap");
        var empty = document.getElementById("buyer-payments-empty");
        var summary = document.getElementById("buyer-payment-results-summary");
        var rows = Array.prototype.slice.call(
          document.querySelectorAll("[data-buyer-payment]")
        );
        if (!rows.length) {
          return;
        }

        var applyFilters = function () {
          var query = search ? search.value.trim().toLowerCase() : "";
          var selectedStatus = status ? status.value : "";
          var from = dateFrom ? dateFrom.value : "";
          var to = dateTo ? dateTo.value : "";
          var visible = 0;

          rows.forEach(function (row) {
            var haystack = (row.getAttribute("data-search") || "").toLowerCase();
            var rowDate = row.getAttribute("data-date") || "";
            var matches =
              (!query || haystack.indexOf(query) !== -1) &&
              (!selectedStatus ||
                row.getAttribute("data-status") === selectedStatus) &&
              (!from || rowDate >= from) &&
              (!to || rowDate <= to);

            row.hidden = !matches;
            if (matches) {
              visible += 1;
            }
          });

          if (tableWrap) {
            tableWrap.hidden = visible === 0;
          }
          if (empty) {
            empty.hidden = visible !== 0;
          }
          if (summary) {
            summary.textContent =
              visible === rows.length
                ? "Showing all " + rows.length + " transactions."
                : visible === 0
                  ? "No transactions match these filters."
                  : "Showing " + visible + " of " + rows.length + " transactions.";
          }
        };

        var resetFilters = function () {
          if (search) {
            search.value = "";
          }
          if (status) {
            status.value = "";
          }
          if (dateFrom) {
            dateFrom.value = "";
          }
          if (dateTo) {
            dateTo.value = "";
          }
          applyFilters();
          if (search) {
            search.focus();
          }
        };

        [search, status, dateFrom, dateTo].forEach(function (field) {
          if (!field) {
            return;
          }
          field.addEventListener("input", applyFilters);
          field.addEventListener("change", applyFilters);
        });

        if (reset) {
          reset.addEventListener("click", resetFilters);
        }
        if (emptyClear) {
          emptyClear.addEventListener("click", resetFilters);
        }

        applyFilters();
      });
    </script>
@endpush
@endsection
