@extends('layouts.owner')

@section('title', 'Earnings - IdleMach Owner')

@section('meta_description', 'Owner earnings overview with total, recent successful and pending totals, and ledger notes.')

@section('page_title', 'Earnings')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Financial</p>
              <h1 class="dashboard-title">Earnings</h1>
              <p class="dashboard-subtitle">
                Earnings overview, monthly and weekly summaries, and recent
                successful payment activity.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a
                class="btn-im btn-im-outline"
                href="{{ route('owner.payment-history') }}"
              >
                <i class="fa-solid fa-receipt" aria-hidden="true"></i>
                Payment history
              </a>
            </div>
          </div>

          <!-- Earnings overview -->
          <section
            class="dashboard-card"
            id="earnings"
            aria-labelledby="earnings-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="earnings-heading">
                <i class="fa-solid fa-indian-rupee-sign" aria-hidden="true"></i>
                Earnings overview
              </h2>
              <div class="dashboard-card-actions">
              </div>
            </div>
            <div class="dashboard-card-body">
              <div class="dashboard-stats-grid owner-earnings-grid mb-0">
                <div class="stat-card">
                  <div class="stat-card-head">
                    <p class="stat-card-label">Total Earnings</p>
                    <span class="stat-card-icon stat-icon-payments">
                      <i
                        class="fa-solid fa-indian-rupee-sign"
                        aria-hidden="true"
                      ></i>
                    </span>
                  </div>
                  <p class="stat-card-value">&#8377;1,84,600</p>
                  <p class="stat-card-meta">
                    All-time total
                  </p>
                </div>

                <div class="stat-card">
                  <div class="stat-card-head">
                    <p class="stat-card-label">Successful Payments</p>
                    <span class="stat-card-icon stat-icon-bookings">
                      <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p class="stat-card-value">&#8377;41,800</p>
                  <p class="stat-card-meta">
                    Four recent records
                  </p>
                </div>

                <div class="stat-card stat-card-alert">
                  <div class="stat-card-head">
                    <p class="stat-card-label">Pending Payments</p>
                    <span class="stat-card-icon stat-icon-approvals">
                      <i class="fa-regular fa-clock" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p class="stat-card-value">&#8377;6,400</p>
                  <p class="stat-card-meta">
                    One recent record
                  </p>
                </div>
              </div>

              <div class="im-alert im-alert-info mt-4 mb-0" role="note">
                <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                <div>
                  <strong>Ledger note.</strong> Summary totals are all-time
                  figures. The payment history below shows recent records.
                  Commission, tax, withdrawal, and invoice calculations are not
                  represented because they are not defined by the project
                  documents.
                </div>
              </div>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Failed and refunded payments are excluded from successful
                totals.</span
              >
            </div>
          </section>

          <div class="row g-4">
            <div class="col-lg-7">
              <section
                class="dashboard-card h-100"
                aria-labelledby="monthly-earnings-heading"
              >
                <div class="dashboard-card-header">
                  <h2
                    class="dashboard-card-title"
                    id="monthly-earnings-heading"
                  >
                    <i class="fa-solid fa-chart-column" aria-hidden="true"></i>
                    Monthly earnings
                  </h2>
                  <span class="stat-demo-badge">Recent payment records</span>
                </div>
                <div class="dashboard-card-body">
                  <div class="mb-4">
                    <div class="d-flex justify-content-between small mb-1">
                      <span class="fw-semibold">September 2026</span>
                      <span class="fw-semibold">&#8377;24,600</span>
                    </div>
                    <div
                      class="progress"
                      role="progressbar"
                      aria-label="September 2026 earnings"
                      aria-valuenow="24600"
                      aria-valuemin="0"
                      aria-valuemax="41800"
                      style="height: 12px"
                    >
                      <div class="progress-bar" style="width: 59%"></div>
                    </div>
                  </div>
                  <div class="mb-0">
                    <div class="d-flex justify-content-between small mb-1">
                      <span class="fw-semibold">October 2026</span>
                      <span class="fw-semibold">&#8377;17,200</span>
                    </div>
                    <div
                      class="progress"
                      role="progressbar"
                      aria-label="October 2026 earnings"
                      aria-valuenow="17200"
                      aria-valuemin="0"
                      aria-valuemax="41800"
                      style="height: 12px"
                    >
                      <div class="progress-bar" style="width: 41%"></div>
                    </div>
                  </div>
                  <div class="im-alert im-alert-info mt-4 mb-0" role="note">
                    <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                    <div>
                      <strong>Monthly summary.</strong> September
                      (&#8377;24,600) and October (&#8377;17,200) are derived
                      from the four recent successful payment records
                      (TXN-88219445, TXN-88219390, TXN-88219412, and
                      TXN-88219321). Earlier months are not represented in this
                      prototype.
                    </div>
                  </div>
                </div>
                <div class="dashboard-card-footer">
                  <span
                    >Successful payments only. Failed and refunded payments are
                    excluded.</span
                  >
                </div>
              </section>
            </div>

            <div class="col-lg-5">
              <section
                class="dashboard-card h-100"
                aria-labelledby="weekly-earnings-heading"
              >
                <div class="dashboard-card-header">
                  <h2
                    class="dashboard-card-title"
                    id="weekly-earnings-heading"
                  >
                    <i class="fa-solid fa-calendar-week" aria-hidden="true"></i>
                    Weekly earnings
                  </h2>
                </div>
                <div class="dashboard-card-body">
                  <p class="stat-card-label mb-1">
                    Last 7 days (18&ndash;24 Oct 2026)
                  </p>
                  <p class="stat-card-value mb-1">&#8377;17,200</p>
                  <p class="table-cell-subtext mb-3">
                    Two successful payments: CS-10024 (&#8377;10,800) and
                    CS-10022 (&#8377;6,400).
                  </p>
                  <div class="d-flex justify-content-between border-top pt-3">
                    <span class="text-muted small">Pending payment</span>
                    <span class="fw-semibold">&#8377;6,400</span>
                  </div>
                  <div class="d-flex justify-content-between mt-2">
                    <span class="text-muted small">All-time earnings</span>
                    <span class="fw-semibold">&#8377;1,84,600</span>
                  </div>
                </div>
                <div class="dashboard-card-footer">
                  <span
                    >Weekly figure is a presentation summary of the recent
                    payment ledger, not a live calculation.</span
                  >
                </div>
              </section>
            </div>
          </div>

          <section
            class="dashboard-card"
            id="recent-earnings"
            aria-labelledby="recent-earnings-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="recent-earnings-heading">
                <i class="fa-solid fa-clock-rotate-left" aria-hidden="true"></i>
                Recent earning activity
              </h2>
              <a
                class="btn-im btn-im-outline btn-im-sm"
                href="{{ route('owner.payment-history') }}"
                >View all payments</a
              >
            </div>
            <div class="dashboard-card-body">
              <ol class="activity-feed-list">
                <li class="activity-feed-item">
                  <span
                    class="activity-feed-icon activity-icon-warning"
                    aria-hidden="true"
                    ><i class="fa-regular fa-clock"></i
                  ></span>
                  <div class="activity-feed-body">
                    <p class="activity-feed-text">
                      Payment <strong>TXN-88219502</strong> for request BR-2041
                      from Apex Auto Components is
                      <strong>&#8377;6,400</strong> and still pending.
                    </p>
                    <p class="activity-feed-meta">28 Oct 2026 &middot; UPI</p>
                  </div>
                </li>
                <li class="activity-feed-item">
                  <span
                    class="activity-feed-icon activity-icon-success"
                    aria-hidden="true"
                    ><i class="fa-solid fa-circle-check"></i
                  ></span>
                  <div class="activity-feed-body">
                    <p class="activity-feed-text">
                      Payment <strong>TXN-88219412</strong> for booking CS-10024
                      from Delta Gears &amp; Shafts was successful:
                      <strong>&#8377;10,800</strong>.
                    </p>
                    <p class="activity-feed-meta">20 Oct 2026 &middot; Net Banking</p>
                  </div>
                </li>
                <li class="activity-feed-item">
                  <span
                    class="activity-feed-icon activity-icon-success"
                    aria-hidden="true"
                    ><i class="fa-solid fa-circle-check"></i
                  ></span>
                  <div class="activity-feed-body">
                    <p class="activity-feed-text">
                      Payment <strong>TXN-88219321</strong> for booking CS-10022
                      from Shree Shakti Engineering was successful:
                      <strong>&#8377;6,400</strong>.
                    </p>
                    <p class="activity-feed-meta">18 Oct 2026 &middot; UPI</p>
                  </div>
                </li>
                <li class="activity-feed-item">
                  <span
                    class="activity-feed-icon activity-icon-success"
                    aria-hidden="true"
                    ><i class="fa-solid fa-circle-check"></i
                  ></span>
                  <div class="activity-feed-body">
                    <p class="activity-feed-text">
                      Payment <strong>TXN-88219390</strong> for booking CS-10027
                      from Siddhivinayak Fabricators was successful:
                      <strong>&#8377;5,400</strong>.
                    </p>
                    <p class="activity-feed-meta">27 Sep 2026 &middot; Card</p>
                  </div>
                </li>
                <li class="activity-feed-item">
                  <span
                    class="activity-feed-icon activity-icon-success"
                    aria-hidden="true"
                    ><i class="fa-solid fa-circle-check"></i
                  ></span>
                  <div class="activity-feed-body">
                    <p class="activity-feed-text">
                      Payment <strong>TXN-88219445</strong> for booking CS-10026
                      from Metro Engineering Works was successful:
                      <strong>&#8377;19,200</strong>.
                    </p>
                    <p class="activity-feed-meta">26 Sep 2026 &middot; UPI</p>
                  </div>
                </li>
              </ol>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Four successful records total &#8377;41,800. One pending
                record is &#8377;6,400. The full ledger is available on Payment
                History.</span
              >
            </div>
          </section>
@endsection
