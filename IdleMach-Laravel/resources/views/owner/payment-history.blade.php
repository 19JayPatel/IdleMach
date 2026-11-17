@extends('layouts.owner')

@section('title', 'Payment History - IdleMach Owner')

@section('meta_description', 'Owner payment and transaction records with booking, amount, method, date, and payment status.')

@section('page_title', 'Payment History')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Financial</p>
              <h1 class="dashboard-title">Payment History</h1>
              <p class="dashboard-subtitle">
                Transaction records with booking, machine, amount, payment
                method, date, and payment status.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('owner.earnings') }}">
                <i
                  class="fa-solid fa-indian-rupee-sign"
                  aria-hidden="true"
                ></i>
                Earnings overview
              </a>
            </div>
          </div>

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
                <div class="col-12 col-md-6">
                  <label class="form-label" for="owner-payment-search"
                    >Search payments</label
                  >
                  <input
                    class="form-control"
                    id="owner-payment-search"
                    type="search"
                    placeholder="Search by transaction ID, booking ID, or buyer"
                  />
                </div>
                <div class="col-6 col-md-3">
                  <label class="form-label" for="owner-payment-status-filter"
                    >Status</label
                  >
                  <select class="form-select" id="owner-payment-status-filter">
                    <option value="">All statuses</option>
                    <option value="pending">Pending</option>
                    <option value="successful">Successful</option>
                    <option value="failed">Failed</option>
                    <option value="refunded">Refunded</option>
                  </select>
                </div>
                <div class="col-6 col-md-3">
                  <button
                    class="btn-im btn-im-outline w-100"
                    type="button"
                    id="owner-payment-filter-reset"
                  >
                    <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
                    Reset
                  </button>
                </div>
              </div>
            </div>
          </section>

          <!-- Payment history -->
          <section
            class="dashboard-card"
            id="payment-history"
            aria-labelledby="payment-history-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="payment-history-heading">
                <i class="fa-solid fa-receipt" aria-hidden="true"></i>
                Payment history
              </h2>
              <div class="dashboard-card-actions">
                <span class="text-muted small">Recent payment ledger</span>
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
                aria-label="Payment history table"
              >
                <table class="im-table table-payments" id="payment-history-table">
                  <caption class="visually-hidden">
                    Seven payment records using pending, successful, failed, and
                    refunded statuses.
                  </caption>
                  <thead>
                    <tr>
                      <th scope="col">Payment ID</th>
                      <th scope="col">Booking / request</th>
                      <th scope="col">Buyer / company</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Method</th>
                      <th scope="col">Date</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">TXN-88219502</p>
                        <span class="table-cell-id">Payment record</span>
                      </td>
                      <td>BR-2041</td>
                      <td>Apex Auto Components</td>
                      <td>&#8377;6,400</td>
                      <td>UPI</td>
                      <td>28 Oct 2026</td>
                      <td>
                        <span class="status-badge status-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Pending
                        </span>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">TXN-88219445</p>
                        <span class="table-cell-id">Payment record</span>
                      </td>
                      <td>CS-10026</td>
                      <td>Metro Engineering Works</td>
                      <td>&#8377;19,200</td>
                      <td>UPI</td>
                      <td>26 Sep 2026</td>
                      <td>
                        <span class="status-badge status-successful">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Successful
                        </span>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">TXN-88219390</p>
                        <span class="table-cell-id">Payment record</span>
                      </td>
                      <td>CS-10027</td>
                      <td>Siddhivinayak Fabricators</td>
                      <td>&#8377;5,400</td>
                      <td>Card</td>
                      <td>27 Sep 2026</td>
                      <td>
                        <span class="status-badge status-successful">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Successful
                        </span>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">TXN-88219412</p>
                        <span class="table-cell-id">Payment record</span>
                      </td>
                      <td>CS-10024</td>
                      <td>Delta Gears &amp; Shafts</td>
                      <td>&#8377;10,800</td>
                      <td>Net Banking</td>
                      <td>20 Oct 2026</td>
                      <td>
                        <span class="status-badge status-successful">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Successful
                        </span>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">TXN-88219321</p>
                        <span class="table-cell-id">Payment record</span>
                      </td>
                      <td>CS-10022</td>
                      <td>Shree Shakti Engineering</td>
                      <td>&#8377;6,400</td>
                      <td>UPI</td>
                      <td>18 Oct 2026</td>
                      <td>
                        <span class="status-badge status-successful">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Successful
                        </span>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">TXN-88219112</p>
                        <span class="table-cell-id">Payment record</span>
                      </td>
                      <td>CS-10019</td>
                      <td>Kiran Toolcraft</td>
                      <td>&#8377;4,800</td>
                      <td>Card</td>
                      <td>12 Oct 2026</td>
                      <td>
                        <span class="status-badge status-failed">
                          <i class="fa-solid fa-circle-xmark" aria-hidden="true"></i>
                          Failed
                        </span>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">TXN-88218990</p>
                        <span class="table-cell-id">Payment record</span>
                      </td>
                      <td>CS-10017</td>
                      <td>Apex Auto Components</td>
                      <td>&#8377;3,600</td>
                      <td>UPI</td>
                      <td>08 Oct 2026</td>
                      <td>
                        <span class="status-badge status-refunded">
                          <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
                          Refunded
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Four successful records total &#8377;41,800. One pending record
                is &#8377;6,400. Failed (&#8377;4,800) and refunded
                (&#8377;3,600) records are excluded from successful totals.</span
              >
            </div>
          </section>

@push('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var table = document.getElementById("payment-history-table");
        if (!table) {
          return;
        }
        var search = document.getElementById("owner-payment-search");
        var status = document.getElementById("owner-payment-status-filter");
        var reset = document.getElementById("owner-payment-filter-reset");

        function applyFilters() {
          var term = (search.value || "").toLowerCase();
          var state = (status.value || "").toLowerCase();
          Array.prototype.forEach.call(
            table.querySelectorAll("tbody tr"),
            function (row) {
              var matchesTerm = !term || row.textContent.toLowerCase().indexOf(term) !== -1;
              var matchesStatus = !state || row.textContent.toLowerCase().indexOf(state) !== -1;
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
