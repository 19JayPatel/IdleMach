@extends('layouts.admin')

@section('title', 'Admin Dashboard — IdleMach')

@section('meta_description', 'IdleMach admin dashboard prototype for monitoring users, machine approvals, bookings, payments, reviews, and platform activity. All records are illustrative demo data and no backend is connected.')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Platform administration</p>
              <h1 class="dashboard-title">Admin Dashboard</h1>
              <p class="dashboard-subtitle">
                Monitor users, listings, approvals, bookings, payments,
                reviews, and platform activity.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('machines') }}">
                <i class="fa-solid fa-store" aria-hidden="true"></i>
                View marketplace
              </a>
              <a class="btn-im btn-im-primary" href="#pending-approvals">
                <i class="fa-solid fa-clipboard-check" aria-hidden="true"></i>
                Review approvals
              </a>
            </div>
          </div>

          <!-- Priority sections: approvals and bookings appear before the overview metrics. -->

          <!-- Pending machine approvals -->
          <section
            class="dashboard-card"
            id="pending-approvals"
            aria-labelledby="pending-approvals-heading"
          >
            <div class="dashboard-card-header">
              <h2
                class="dashboard-card-title"
                id="pending-approvals-heading"
              >
                <i class="fa-solid fa-clipboard-check" aria-hidden="true"></i>
                Pending machine approvals
              </h2>
              <div class="dashboard-card-actions">
                <span class="text-muted small" id="pending-approvals-count"
                  >12 pending review</span
                >
                <button
                  class="btn-im btn-im-outline btn-im-sm"
                  type="button"
                  id="btn-reset-approvals"
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
                aria-label="Pending machine approvals table"
              >
                <table class="im-table table-approvals">
                  <caption class="visually-hidden">
                    Three machine listings awaiting admin review.
                  </caption>
                  <thead>
                    <tr>
                      <th scope="col">Machine</th>
                      <th scope="col">Company</th>
                      <th scope="col">Type</th>
                      <th scope="col">Rate / Capacity</th>
                      <th scope="col">Submitted</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr data-machine-id="M-1014">
                      <td>
                        <p class="table-cell-title mb-0">
                          ACE Micromatic VMC 850V
                        </p>
                        <span class="table-cell-id">M-1014</span>
                      </td>
                      <td>Apex Precision Works, Ahmedabad</td>
                      <td>3-Axis Vertical Machining Center (VMC)</td>
                      <td>
                        &#8377;1,200/hr
                        <span class="d-block table-cell-subtext"
                          >6 hrs/day</span
                        >
                      </td>
                      <td>Today, 09:30 AM</td>
                      <td class="machine-status-cell">
                        <span class="status-badge status-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Pending
                        </span>
                      </td>
                      <td class="machine-actions-cell">
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="view-machine"
                            data-machine-id="M-1014"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <button
                            class="btn-im btn-im-primary btn-im-sm"
                            type="button"
                            data-action="approve-machine"
                            data-machine-id="M-1014"
                          >
                            <i class="fa-solid fa-check" aria-hidden="true"></i>
                            Approve
                          </button>
                          <button
                            class="btn-im btn-im-danger btn-im-sm"
                            type="button"
                            data-action="reject-machine"
                            data-machine-id="M-1014"
                          >
                            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                            Reject
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr data-machine-id="M-1015">
                      <td>
                        <p class="table-cell-title mb-0">
                          Lokesh Heavy Duty Industrial Lathe 260
                        </p>
                        <span class="table-cell-id">M-1015</span>
                      </td>
                      <td>Shree Shakti Engineering, Vadodara</td>
                      <td>Industrial Conventional Lathe</td>
                      <td>
                        &#8377;650/hr
                        <span class="d-block table-cell-subtext"
                          >8 hrs/day</span
                        >
                      </td>
                      <td>Today, 11:15 AM</td>
                      <td class="machine-status-cell">
                        <span class="status-badge status-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Pending
                        </span>
                      </td>
                      <td class="machine-actions-cell">
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="view-machine"
                            data-machine-id="M-1015"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <button
                            class="btn-im btn-im-primary btn-im-sm"
                            type="button"
                            data-action="approve-machine"
                            data-machine-id="M-1015"
                          >
                            <i class="fa-solid fa-check" aria-hidden="true"></i>
                            Approve
                          </button>
                          <button
                            class="btn-im btn-im-danger btn-im-sm"
                            type="button"
                            data-action="reject-machine"
                            data-machine-id="M-1015"
                          >
                            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                            Reject
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr data-machine-id="M-1016">
                      <td>
                        <p class="table-cell-title mb-0">
                          Jyoti CNC Turning Center DX-200
                        </p>
                        <span class="table-cell-id">M-1016</span>
                      </td>
                      <td>Kiran Toolcraft, Rajkot</td>
                      <td>CNC Turning Center</td>
                      <td>
                        &#8377;950/hr
                        <span class="d-block table-cell-subtext"
                          >5 hrs/day</span
                        >
                      </td>
                      <td>Yesterday, 04:45 PM</td>
                      <td class="machine-status-cell">
                        <span class="status-badge status-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Pending
                        </span>
                      </td>
                      <td class="machine-actions-cell">
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="view-machine"
                            data-machine-id="M-1016"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <button
                            class="btn-im btn-im-primary btn-im-sm"
                            type="button"
                            data-action="approve-machine"
                            data-machine-id="M-1016"
                          >
                            <i class="fa-solid fa-check" aria-hidden="true"></i>
                            Approve
                          </button>
                          <button
                            class="btn-im btn-im-danger btn-im-sm"
                            type="button"
                            data-action="reject-machine"
                            data-machine-id="M-1016"
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
                >Showing 3 of 12 pending approvals. Only approved
                listings can reach the marketplace; activation is a separate
                owner action.</span
              >
            </div>
          </section>

          <!-- Recent bookings -->
          <section
            class="dashboard-card"
            id="recent-bookings"
            aria-labelledby="recent-bookings-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="recent-bookings-heading">
                <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                Recent bookings
              </h2>
              <div class="dashboard-card-actions">
                <button
                  class="btn-im btn-im-outline btn-im-sm"
                  type="button"
                  data-management-preview="Booking management"
                >
                  <i class="fa-solid fa-list-check" aria-hidden="true"></i>
                  Booking management
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
                aria-label="Recent bookings table"
              >
                <table class="im-table table-bookings">
                  <caption class="visually-hidden">
                    Six bookings across the documented booking and payment
                    statuses.
                  </caption>
                  <thead>
                    <tr>
                      <th scope="col">Booking</th>
                      <th scope="col">Machine</th>
                      <th scope="col">Buyer</th>
                      <th scope="col">Scheduled</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Booking status</th>
                      <th scope="col">Payment</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr data-booking-id="CS-10025">
                      <td><span class="table-cell-id">CS-10025</span></td>
                      <td>Haas CNC Turning Machine ST-20</td>
                      <td>Apex Auto Components</td>
                      <td>25 Sep 2026</td>
                      <td>&#8377;8,000</td>
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
                        <button
                          class="btn-im btn-im-outline btn-im-sm"
                          type="button"
                          data-action="view-booking"
                          data-booking-id="CS-10025"
                        >
                          <i class="fa-solid fa-eye" aria-hidden="true"></i>
                          View
                        </button>
                      </td>
                    </tr>

                    <tr data-booking-id="CS-10026">
                      <td><span class="table-cell-id">CS-10026</span></td>
                      <td>ACE Micromatic VMC 850V</td>
                      <td>Metro Engineering Works</td>
                      <td>27 Sep 2026</td>
                      <td>&#8377;19,200</td>
                      <td>
                        <span class="status-badge status-in-progress">
                          <i class="fa-solid fa-spinner" aria-hidden="true"></i>
                          In progress
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
                        <button
                          class="btn-im btn-im-outline btn-im-sm"
                          type="button"
                          data-action="view-booking"
                          data-booking-id="CS-10026"
                        >
                          <i class="fa-solid fa-eye" aria-hidden="true"></i>
                          View
                        </button>
                      </td>
                    </tr>

                    <tr data-booking-id="CS-10027">
                      <td><span class="table-cell-id">CS-10027</span></td>
                      <td>Haas VF-2 CNC Vertical Milling</td>
                      <td>Siddhivinayak Fabricators</td>
                      <td>28 Sep 2026</td>
                      <td>&#8377;5,400</td>
                      <td>
                        <span class="status-badge status-confirmed">
                          <i class="fa-solid fa-check" aria-hidden="true"></i>
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
                        <button
                          class="btn-im btn-im-outline btn-im-sm"
                          type="button"
                          data-action="view-booking"
                          data-booking-id="CS-10027"
                        >
                          <i class="fa-solid fa-eye" aria-hidden="true"></i>
                          View
                        </button>
                      </td>
                    </tr>

                    <tr data-booking-id="CS-10028">
                      <td><span class="table-cell-id">CS-10028</span></td>
                      <td>Lokesh Heavy Duty Industrial Lathe</td>
                      <td>Kavita Hydraulics</td>
                      <td>29 Sep 2026</td>
                      <td>&#8377;5,200</td>
                      <td>
                        <span class="status-badge status-payment-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Payment pending
                        </span>
                      </td>
                      <td>
                        <span class="status-badge status-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Pending
                        </span>
                      </td>
                      <td>
                        <button
                          class="btn-im btn-im-outline btn-im-sm"
                          type="button"
                          data-action="view-booking"
                          data-booking-id="CS-10028"
                        >
                          <i class="fa-solid fa-eye" aria-hidden="true"></i>
                          View
                        </button>
                      </td>
                    </tr>

                    <tr data-booking-id="CS-10029">
                      <td><span class="table-cell-id">CS-10029</span></td>
                      <td>Jyoti CNC Turning Center DX-200</td>
                      <td>Bhavani Forgings</td>
                      <td>30 Sep 2026</td>
                      <td>&#8377;11,400</td>
                      <td>
                        <span class="status-badge status-accepted">
                          <i class="fa-solid fa-check" aria-hidden="true"></i>
                          Accepted
                        </span>
                      </td>
                      <td>
                        <span class="status-badge status-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Pending
                        </span>
                      </td>
                      <td>
                        <button
                          class="btn-im btn-im-outline btn-im-sm"
                          type="button"
                          data-action="view-booking"
                          data-booking-id="CS-10029"
                        >
                          <i class="fa-solid fa-eye" aria-hidden="true"></i>
                          View
                        </button>
                      </td>
                    </tr>

                    <tr data-booking-id="CS-10030">
                      <td><span class="table-cell-id">CS-10030</span></td>
                      <td>Haas CNC Turning Machine ST-20</td>
                      <td>Delta Gears &amp; Shafts</td>
                      <td>01 Oct 2026</td>
                      <td>&#8377;3,200</td>
                      <td>
                        <span class="status-badge status-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Pending
                        </span>
                      </td>
                      <td>
                        <span class="status-badge status-neutral">
                          <i class="fa-solid fa-minus" aria-hidden="true"></i>
                          No record
                        </span>
                      </td>
                      <td>
                        <button
                          class="btn-im btn-im-outline btn-im-sm"
                          type="button"
                          data-action="view-booking"
                          data-booking-id="CS-10030"
                        >
                          <i class="fa-solid fa-eye" aria-hidden="true"></i>
                          View
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Owner acceptance precedes payment. A booking stays
                &ldquo;payment pending&rdquo; until payment succeeds and is
                only then confirmed.</span
              >
            </div>
          </section>

          <!-- Overview metrics -->
          <section class="dashboard-overview" aria-labelledby="overview-heading">
            <div class="dashboard-overview-head">
              <h2 class="dashboard-overview-title" id="overview-heading">
                Platform overview
              </h2>
            </div>
            <div class="dashboard-stats-grid">
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Total Users</p>
                  <span class="stat-card-icon stat-icon-users">
                    <i class="fa-solid fa-users" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value">250</p>
                <p class="stat-card-meta">
                  85 owners &middot; 165 buyers
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Machine Owners</p>
                  <span class="stat-card-icon stat-icon-users">
                    <i class="fa-solid fa-industry" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value">85</p>
                <p class="stat-card-meta">
                  Owner accounts
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Buyers</p>
                  <span class="stat-card-icon stat-icon-users">
                    <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value">165</p>
                <p class="stat-card-meta">
                  Buyer accounts
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Machine Listings</p>
                  <span class="stat-card-icon stat-icon-machines">
                    <i class="fa-solid fa-gears" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value">180</p>
                <p class="stat-card-meta">
                  Includes 12 pending reviews
                </p>
              </div>

              <div class="stat-card stat-card-alert">
                <div class="stat-card-head">
                  <p class="stat-card-label">Pending Approvals</p>
                  <span class="stat-card-icon stat-icon-approvals">
                    <i
                      class="fa-solid fa-clipboard-check"
                      aria-hidden="true"
                    ></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-pending-approvals">12</p>
                <p class="stat-card-meta">
                  Machines awaiting admin review
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Total Bookings</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value">430</p>
                <p class="stat-card-meta">
                  390 completed
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Payment Records</p>
                  <span class="stat-card-icon stat-icon-payments">
                    <i class="fa-solid fa-credit-card" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value">418</p>
                <p class="stat-card-meta">
                  &#8377;5.2L revenue
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Reviews</p>
                  <span class="stat-card-icon stat-icon-reviews">
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value">142</p>
                <p class="stat-card-meta">
                  4.8 average
                </p>
              </div>
            </div>
          </section>

          <div class="row g-4">
            <!-- Recent activity -->
            <div class="col-lg-7">
              <section
                class="dashboard-card h-100"
                id="recent-activity"
                aria-labelledby="recent-activity-heading"
              >
                <div class="dashboard-card-header">
                  <h2
                    class="dashboard-card-title"
                    id="recent-activity-heading"
                  >
                    <i class="fa-solid fa-clock-rotate-left" aria-hidden="true"></i>
                    Recent activity
                  </h2>
                </div>
                <div class="dashboard-card-body">
                  <ol class="activity-feed-list">
                    <li class="activity-feed-item">
                      <span
                        class="activity-feed-icon activity-icon-warning"
                        aria-hidden="true"
                      >
                        <i class="fa-solid fa-clipboard-check"></i>
                      </span>
                      <div class="activity-feed-body">
                        <p class="activity-feed-text">
                          Machine <strong>M-1014</strong> (ACE Micromatic VMC
                          850V) was submitted for admin review.
                        </p>
                        <p class="activity-feed-meta">
                          Today, 09:30 AM
                        </p>
                      </div>
                    </li>
                    <li class="activity-feed-item">
                      <span
                        class="activity-feed-icon activity-icon-success"
                        aria-hidden="true"
                      >
                        <i class="fa-solid fa-circle-check"></i>
                      </span>
                      <div class="activity-feed-body">
                        <p class="activity-feed-text">
                          Booking <strong>CS-10027</strong> was confirmed after
                          a successful payment.
                        </p>
                        <p class="activity-feed-meta">
                          Today, 08:20 AM
                        </p>
                      </div>
                    </li>
                    <li class="activity-feed-item">
                      <span
                        class="activity-feed-icon activity-icon-info"
                        aria-hidden="true"
                      >
                        <i class="fa-solid fa-credit-card"></i>
                      </span>
                      <div class="activity-feed-body">
                        <p class="activity-feed-text">
                          Payment <strong>TXN-88219445</strong> was recorded as
                          successful for booking CS-10026.
                        </p>
                        <p class="activity-feed-meta">
                          Yesterday, 06:10 PM
                        </p>
                      </div>
                    </li>
                    <li class="activity-feed-item">
                      <span
                        class="activity-feed-icon activity-icon-primary"
                        aria-hidden="true"
                      >
                        <i class="fa-solid fa-user-plus"></i>
                      </span>
                      <div class="activity-feed-body">
                        <p class="activity-feed-text">
                          A new buyer account completed registration;
                          admin review is not required for buyers.
                        </p>
                        <p class="activity-feed-meta">
                          Yesterday, 02:45 PM
                        </p>
                      </div>
                    </li>
                    <li class="activity-feed-item">
                      <span
                        class="activity-feed-icon activity-icon-warning"
                        aria-hidden="true"
                      >
                        <i class="fa-solid fa-star"></i>
                      </span>
                      <div class="activity-feed-body">
                        <p class="activity-feed-text">
                          A 5-star review was added to completed booking
                          <strong>CS-10025</strong>.
                        </p>
                        <p class="activity-feed-meta">
                          Yesterday, 11:05 AM
                        </p>
                      </div>
                    </li>
                  </ol>
                </div>
                <div class="dashboard-card-footer">
                  <span
                    >No live audit log is connected.</span
                  >
                  <button
                    class="btn-im btn-im-outline btn-im-sm"
                    type="button"
                    data-management-preview="Reports and activity"
                  >
                    Reports preview
                  </button>
                </div>
              </section>
            </div>

            <!-- Management shortcuts -->
            <div class="col-lg-5">
              <section
                class="dashboard-card h-100"
                id="management-shortcuts"
                aria-labelledby="management-shortcuts-heading"
              >
                <div class="dashboard-card-header">
                  <h2
                    class="dashboard-card-title"
                    id="management-shortcuts-heading"
                  >
                    <i class="fa-solid fa-table-columns" aria-hidden="true"></i>
                    Platform management
                  </h2>
                </div>
                <div class="dashboard-card-body">
                  <div class="dashboard-shortcuts-grid">
                    <button
                      class="shortcut-tile"
                      type="button"
                      data-management-preview="User management"
                    >
                      <span class="shortcut-icon">
                        <i class="fa-solid fa-users-gear" aria-hidden="true"></i>
                      </span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block"
                          >User Management</span
                        >
                        <span class="shortcut-meta d-block"
                          >Accounts</span
                        >
                      </span>
                      <i
                        class="fa-solid fa-arrow-right shortcut-arrow"
                        aria-hidden="true"
                      ></i>
                    </button>

                    <button
                      class="shortcut-tile"
                      type="button"
                      data-management-preview="Machine management"
                    >
                      <span class="shortcut-icon">
                        <i class="fa-solid fa-gears" aria-hidden="true"></i>
                      </span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block"
                          >Machine Management</span
                        >
                        <span class="shortcut-meta d-block"
                          >Listings</span
                        >
                      </span>
                      <i
                        class="fa-solid fa-arrow-right shortcut-arrow"
                        aria-hidden="true"
                      ></i>
                    </button>

                    <button
                      class="shortcut-tile"
                      type="button"
                      data-management-preview="Payment management"
                    >
                      <span class="shortcut-icon">
                        <i class="fa-solid fa-credit-card" aria-hidden="true"></i>
                      </span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block"
                          >Payment Management</span
                        >
                        <span class="shortcut-meta d-block"
                          >Payment records</span
                        >
                      </span>
                      <i
                        class="fa-solid fa-arrow-right shortcut-arrow"
                        aria-hidden="true"
                      ></i>
                    </button>

                    <button
                      class="shortcut-tile"
                      type="button"
                      data-management-preview="Review management"
                    >
                      <span class="shortcut-icon">
                        <i
                          class="fa-solid fa-star-half-stroke"
                          aria-hidden="true"
                        ></i>
                      </span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block"
                          >Review Management</span
                        >
                        <span class="shortcut-meta d-block"
                          >Reviews</span
                        >
                      </span>
                      <i
                        class="fa-solid fa-arrow-right shortcut-arrow"
                        aria-hidden="true"
                      ></i>
                    </button>
                  </div>
                </div>
                <div class="dashboard-card-footer">
                  <span
                    >Booking monitoring and reports are available in the
                    sections above. Detailed management screens will be added
                    later.</span
                  >
                </div>
              </section>
            </div>
          </div>

          <!-- Business rules reference -->
          <section
            class="dashboard-card dashboard-reference"
            id="business-rules-reference"
            aria-labelledby="business-rules-reference-heading"
          >
            <div class="dashboard-card-header">
              <h2
                class="dashboard-card-title"
                id="business-rules-reference-heading"
              >
                <i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
                Business rules reference
              </h2>
              <span class="stat-demo-badge">Reference</span>
            </div>
            <div class="dashboard-card-body">
              <p class="dashboard-reference-intro">
                <strong>Admin monitoring only.</strong> Approval is not
                activation, owner acceptance must precede payment, and a
                booking is not confirmed until payment succeeds. These rules
                and statuses are preserved from the project documentation and
                are not enforced against live data.
              </p>

              <div class="row g-4">
                <div class="col-lg-6">
                  <h3 class="dashboard-reference-subtitle">Platform rules</h3>
                  <ul class="rules-reference-list rules-reference-list-single">
                    <li class="rules-reference-item">
                      <i class="fa-solid fa-check" aria-hidden="true"></i>
                      <span
                        >Only <strong>approved</strong> machines appear in the
                        marketplace.</span
                      >
                    </li>
                    <li class="rules-reference-item">
                      <i class="fa-solid fa-check" aria-hidden="true"></i>
                      <span
                        >Only <strong>active</strong> machines can receive
                        booking requests.</span
                      >
                    </li>
                    <li class="rules-reference-item">
                      <i class="fa-solid fa-check" aria-hidden="true"></i>
                      <span
                        >Machine-owner <strong>acceptance happens before
                        payment</strong>.</span
                      >
                    </li>
                    <li class="rules-reference-item">
                      <i class="fa-solid fa-check" aria-hidden="true"></i>
                      <span
                        >Booking <strong>confirmation requires successful
                        payment</strong>.</span
                      >
                    </li>
                    <li class="rules-reference-item">
                      <i class="fa-solid fa-check" aria-hidden="true"></i>
                      <span
                        >A review is allowed only for a
                        <strong>completed</strong> booking, once.</span
                      >
                    </li>
                    <li class="rules-reference-item">
                      <i class="fa-solid fa-check" aria-hidden="true"></i>
                      <span
                        >The admin monitors platform records and does not change
                        workflow states.</span
                      >
                    </li>
                  </ul>
                </div>

                <div class="col-lg-6">
                  <h3 class="dashboard-reference-subtitle">
                    Status reference
                  </h3>

                  <div class="status-reference-group">
                    <h4 class="status-reference-label">Machine statuses</h4>
                    <div class="d-flex flex-wrap gap-2">
                      <span class="status-badge status-pending">pending</span>
                      <span class="status-badge status-approved">approved</span>
                      <span class="status-badge status-rejected">rejected</span>
                      <span class="status-badge status-active">active</span>
                      <span class="status-badge status-inactive">inactive</span>
                      <span class="status-badge status-maintenance"
                        >maintenance</span
                      >
                    </div>
                  </div>

                  <div class="status-reference-group">
                    <h4 class="status-reference-label">Booking statuses</h4>
                    <div class="d-flex flex-wrap gap-2">
                      <span class="status-badge status-pending">pending</span>
                      <span class="status-badge status-accepted">accepted</span>
                      <span class="status-badge status-rejected">rejected</span>
                      <span class="status-badge status-payment-pending"
                        >payment_pending</span
                      >
                      <span class="status-badge status-confirmed"
                        >confirmed</span
                      >
                      <span class="status-badge status-in-progress"
                        >in_progress</span
                      >
                      <span class="status-badge status-completed"
                        >completed</span
                      >
                      <span class="status-badge status-cancelled"
                        >cancelled</span
                      >
                    </div>
                  </div>

                  <div class="status-reference-group">
                    <h4 class="status-reference-label">Payment statuses</h4>
                    <div class="d-flex flex-wrap gap-2">
                      <span class="status-badge status-pending">pending</span>
                      <span class="status-badge status-successful"
                        >successful</span
                      >
                      <span class="status-badge status-failed">failed</span>
                      <span class="status-badge status-refunded">refunded</span>
                    </div>
                  </div>

                  <div class="status-reference-group mb-0">
                    <h4 class="status-reference-label">User statuses</h4>
                    <div class="d-flex flex-wrap gap-2">
                      <span class="status-badge status-active">active</span>
                      <span class="status-badge status-blocked">blocked</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Reference only. No live record is approved, rejected,
                activated, blocked, or paid from this page.</span
              >
              <a class="btn-im btn-im-outline btn-im-sm" href="#top">
                <i class="fa-solid fa-arrow-up" aria-hidden="true"></i>
                Back to top
              </a>
            </div>
          </section>
@endsection

@push('modals')
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
          <p class="small text-muted mb-0">Admin inbox</p>
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
            <i class="fa-solid fa-clipboard-check"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">
              Machine M-1014 is awaiting approval
            </p>
            <span class="notification-time">Today, 09:30 AM</span>
          </div>
        </div>

        <div class="notification-item unread">
          <span
            class="notification-icon activity-icon-success"
            aria-hidden="true"
          >
            <i class="fa-solid fa-circle-check"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">
              Booking CS-10027 was confirmed
            </p>
            <span class="notification-time">Today, 08:20 AM</span>
          </div>
        </div>

        <div class="notification-item unread">
          <span class="notification-icon activity-icon-info" aria-hidden="true">
            <i class="fa-solid fa-credit-card"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">
              Payment TXN-88219445 succeeded
            </p>
            <span class="notification-time">Yesterday, 06:10 PM</span>
          </div>
        </div>

        <div class="notification-item">
          <span
            class="notification-icon activity-icon-primary"
            aria-hidden="true"
          >
            <i class="fa-solid fa-user-plus"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">New buyer registration</p>
            <span class="notification-time">Yesterday, 02:45 PM</span>
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

    <!-- ================= View machine modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-view-machine"
      tabindex="-1"
      aria-labelledby="vm-title"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
      >
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">Machine review</p>
              <h2 class="modal-title h5 mb-0" id="vm-title">
                Machine listing
              </h2>
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close machine details"
            ></button>
          </div>
          <div class="modal-body">
            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
              <span
                class="status-badge status-pending"
                id="vm-status-badge"
              >
                <i class="fa-regular fa-clock" aria-hidden="true"></i>
                Pending
              </span>
            </div>

            <dl class="row mb-0">
              <dt class="col-sm-4">Machine ID</dt>
              <dd class="col-sm-8"><span id="vm-id">M-1014</span></dd>

              <dt class="col-sm-4">Company</dt>
              <dd class="col-sm-8" id="vm-company">
                Apex Precision Works, Ahmedabad
              </dd>

              <dt class="col-sm-4">Machine type</dt>
              <dd class="col-sm-8" id="vm-type">
                3-Axis Vertical Machining Center (VMC)
              </dd>

              <dt class="col-sm-4">Hourly rate</dt>
              <dd class="col-sm-8" id="vm-rate">&#8377;1,200/hr</dd>

              <dt class="col-sm-4">Daily capacity</dt>
              <dd class="col-sm-8" id="vm-capacity">6 hrs/day</dd>

              <dt class="col-sm-4">Work envelope</dt>
              <dd class="col-sm-8" id="vm-envelope">
                X: 850 mm, Y: 500 mm, Z: 500 mm
              </dd>

              <dt class="col-sm-4">Specifications</dt>
              <dd class="col-sm-8" id="vm-specs">
                Spindle: 8,000 RPM &middot; Accuracy: &plusmn;0.005 mm
              </dd>

              <dt class="col-sm-4">Materials</dt>
              <dd class="col-sm-8" id="vm-material">
                Steel, Stainless Steel, Aluminium, Brass
              </dd>

              <dt class="col-sm-4">Submitted</dt>
              <dd class="col-sm-8" id="vm-submitted">Today, 09:30 AM</dd>

              <dt class="col-sm-4">Photos</dt>
              <dd class="col-sm-8" id="vm-photos">4 photos provided</dd>

              <dt class="col-sm-4">Verification notes</dt>
              <dd class="col-sm-8 mb-0" id="vm-notes">
                GST and company registration verified.
              </dd>
            </dl>

          </div>
          <div class="modal-footer">
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

    <!-- ================= Approve machine modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-approve-machine"
      tabindex="-1"
      aria-labelledby="modal-approve-machine-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title h5" id="modal-approve-machine-label">
              Approve machine listing
            </h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close approval confirmation"
            ></button>
          </div>
          <div class="modal-body">
            <p>
              Mark <strong id="approve-machine-name">machine</strong>
              (<span id="approve-machine-id">M-1014</span>) as approved?
            </p>
            <p class="small text-muted mb-0">
              Approval makes a listing eligible for the marketplace. It does
              not activate the machine for booking requests; that is a separate
              owner-controlled status.
            </p>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn-im btn-im-outline"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button
              type="button"
              class="btn-im btn-im-primary"
              id="btn-confirm-approve"
            >
              <i class="fa-solid fa-check" aria-hidden="true"></i>
              Confirm approval
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= Reject machine modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-reject-machine"
      tabindex="-1"
      aria-labelledby="modal-reject-machine-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title h5" id="modal-reject-machine-label">
              Reject machine listing
            </h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close rejection form"
            ></button>
          </div>
          <div class="modal-body">
            <p>
              Reject <strong id="reject-machine-name">machine</strong>
              (<span id="reject-machine-id">M-1014</span>) from the approval
              queue?
            </p>

            <div class="mb-3">
              <label class="form-label" for="reject-reason-select"
                >Reason</label
              >
              <select class="form-select" id="reject-reason-select">
                <option>Incomplete technical specifications</option>
                <option>Documentation requirements not met</option>
                <option>Machine photos unclear or missing</option>
                <option>Duplicate or invalid listing</option>
                <option>Other</option>
              </select>
            </div>

            <div class="mb-0">
              <label class="form-label" for="reject-notes-field"
                >Admin notes <span class="text-muted">(optional)</span></label
              >
              <textarea
                class="form-control"
                id="reject-notes-field"
                rows="3"
                placeholder="Note for the owner"
              ></textarea>
            </div>

          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn-im btn-im-outline"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button
              type="button"
              class="btn-im btn-im-danger"
              id="btn-confirm-reject"
            >
              <i class="fa-solid fa-xmark" aria-hidden="true"></i>
              Confirm rejection
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= View booking modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-view-booking"
      tabindex="-1"
      aria-labelledby="vb-modal-title"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
      >
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">Booking audit</p>
              <h2 class="modal-title h5 mb-0" id="vb-modal-title">
                Booking <span id="vb-id">CS-10025</span>
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
              <span
                class="status-badge status-completed"
                id="vb-status-badge"
              >
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Completed
              </span>
              <span
                class="status-badge status-successful"
                id="vb-pay-badge"
              >
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Successful
              </span>
            </div>

            <dl class="row mb-0">
              <dt class="col-sm-4">Machine</dt>
              <dd class="col-sm-8" id="vb-machine">
                Haas CNC Turning Machine ST-20
              </dd>

              <dt class="col-sm-4">Buyer</dt>
              <dd class="col-sm-8" id="vb-buyer">
                Apex Auto Components (Rajesh Sharma)
              </dd>

              <dt class="col-sm-4">Machine owner</dt>
              <dd class="col-sm-8" id="vb-owner">
                Patel Engineering (Kirit Patel, Rajkot)
              </dd>

              <dt class="col-sm-4">Scheduled</dt>
              <dd class="col-sm-8" id="vb-date">
                25 Sep 2026 (10:00 AM &ndash; 08:00 PM)
              </dd>

              <dt class="col-sm-4">Duration</dt>
              <dd class="col-sm-8" id="vb-hours">10 hours</dd>

              <dt class="col-sm-4">Rate</dt>
              <dd class="col-sm-8" id="vb-rate">&#8377;800/hr</dd>

              <dt class="col-sm-4">Total</dt>
              <dd class="col-sm-8" id="vb-total">&#8377;8,000</dd>

              <dt class="col-sm-4">Work description</dt>
              <dd class="col-sm-8" id="vb-desc">
                Turned shafts (mild steel EN8), 150 pieces.
              </dd>

              <dt class="col-sm-4">Drawing reference</dt>
              <dd class="col-sm-8" id="vb-drawing">
                Shaft_Drawing_RevB.pdf (reference)
              </dd>

              <dt class="col-sm-4">Transaction reference</dt>
              <dd class="col-sm-8 mb-0" id="vb-txnid">TXN-88219401</dd>
            </dl>

            <div class="dashboard-demo-banner mb-0 mt-3" role="note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>
                The admin monitors bookings and payments but does not change
                booking workflow states. Payment success is required before a
                booking is confirmed.
              </div>
            </div>
          </div>
          <div class="modal-footer">
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

    <!-- ================= Admin logout modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-admin-logout"
      tabindex="-1"
      aria-labelledby="modal-admin-logout-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title h5" id="modal-admin-logout-label">
              Sign out of the admin dashboard?
            </h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Cancel sign out"
            ></button>
          </div>
          <div class="modal-body">
            <p class="mb-0">
              No authentication or session is active. Continuing returns to
              the login interface.
            </p>
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
              id="btn-confirm-logout"
            >
              <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
              Sign out
            </button>
          </div>
        </div>
      </div>
    </div>
@endpush
