@extends('layouts.owner')

@section('title', 'Owner Dashboard — IdleMach')

@section('meta_description', 'IdleMach machine owner dashboard overview with key booking, machine, work, and earnings figures, short recent activity, and quick links. Frontend prototype only.')

@section('page_title', 'Dashboard')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Machine owner workspace</p>
              <h1 class="dashboard-title">Owner Dashboard</h1>
              <p class="dashboard-subtitle">
                Key performance figures for your machines and bookings, with
                quick access to every management screen.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('machines') }}">
                <i class="fa-solid fa-store" aria-hidden="true"></i>
                View marketplace
              </a>
              <a class="btn-im btn-im-primary" href="{{ route('owner.add-machine') }}">
                <i class="fa-solid fa-circle-plus" aria-hidden="true"></i>
                Add machine
              </a>
            </div>
          </div>

          <!-- Important overview figures only -->
          <section class="dashboard-overview" aria-labelledby="overview-heading">
            <div class="dashboard-overview-head">
              <h2 class="dashboard-overview-title" id="overview-heading">
                Business overview
              </h2>
            </div>
            <div class="dashboard-stats-grid">
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Total Machines</p>
                  <span class="stat-card-icon stat-icon-machines">
                    <i class="fa-solid fa-gears" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-owner-total-machines">5</p>
                <p class="stat-card-meta">Includes one pending listing</p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Available Machines</p>
                  <span class="stat-card-icon stat-icon-machines">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-owner-active-machines">3</p>
                <p class="stat-card-meta">Active and eligible for requests</p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Available Capacity</p>
                  <span class="stat-card-icon stat-icon-approvals">
                    <i class="fa-solid fa-clock" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-owner-available-capacity">
                  14 hrs/day
                </p>
                <p class="stat-card-meta">Across active machines</p>
              </div>

              <div class="stat-card stat-card-alert">
                <div class="stat-card-head">
                  <p class="stat-card-label">Pending Booking Requests</p>
                  <span class="stat-card-icon stat-icon-approvals">
                    <i class="fa-solid fa-inbox" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-owner-pending-requests">2</p>
                <p class="stat-card-meta">Awaiting an owner decision</p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Accepted Bookings</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-owner-accepted-bookings">1</p>
                <p class="stat-card-meta">Confirmed and awaiting work</p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Ongoing Work</p>
                  <span class="stat-card-icon stat-icon-machines">
                    <i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-owner-ongoing-work">1</p>
                <p class="stat-card-meta">Paid and in progress</p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Completed Work</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-owner-completed-bookings">25</p>
                <p class="stat-card-meta">Historical total</p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Total Earnings</p>
                  <span class="stat-card-icon stat-icon-payments">
                    <i class="fa-solid fa-indian-rupee-sign" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value">&#8377;1,84,600</p>
                <p class="stat-card-meta">All-time total</p>
              </div>
            </div>
          </section>

          <div class="row g-4">
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
                    Recent important activity
                  </h2>
                  <a
                    class="btn-im btn-im-outline btn-im-sm"
                    href="{{ route('owner.notifications') }}"
                    >View notifications</a
                  >
                </div>
                <div class="dashboard-card-body">
                  <ol class="activity-feed-list">
                    <li class="activity-feed-item">
                      <span
                        class="activity-feed-icon activity-icon-info"
                        aria-hidden="true"
                        ><i class="fa-solid fa-inbox"></i
                      ></span>
                      <div class="activity-feed-body">
                        <p class="activity-feed-text">
                          New booking request
                          <strong>BR-2043</strong> from Delta Gears &amp; Shafts
                          for
                          <a href="{{ route('owner.booking-requests') }}"
                            >Haas VF-2 CNC Vertical Milling</a
                          >.
                        </p>
                        <p class="activity-feed-meta">Today, 10:15 AM</p>
                      </div>
                    </li>
                    <li class="activity-feed-item">
                      <span
                        class="activity-feed-icon activity-icon-warning"
                        aria-hidden="true"
                        ><i class="fa-regular fa-clock"></i
                      ></span>
                      <div class="activity-feed-body">
                        <p class="activity-feed-text">
                          Request <strong>BR-2041</strong> from Apex Auto
                          Components is awaiting buyer payment of
                          <strong>&#8377;6,400</strong>.
                        </p>
                        <p class="activity-feed-meta">Today, 09:40 AM</p>
                      </div>
                    </li>
                    <li class="activity-feed-item">
                      <span
                        class="activity-feed-icon activity-icon-success"
                        aria-hidden="true"
                        ><i class="fa-solid fa-screwdriver-wrench"></i
                      ></span>
                      <div class="activity-feed-body">
                        <p class="activity-feed-text">
                          Booking <strong>CS-10026</strong> for Metro
                          Engineering Works reached
                          <a href="{{ route('owner.ongoing-work') }}"
                            >60% work progress</a
                          >.
                        </p>
                        <p class="activity-feed-meta">Today, 08:05 AM</p>
                      </div>
                    </li>
                    <li class="activity-feed-item">
                      <span
                        class="activity-feed-icon activity-icon-warning"
                        aria-hidden="true"
                        ><i class="fa-solid fa-clipboard-check"></i
                      ></span>
                      <div class="activity-feed-body">
                        <p class="activity-feed-text">
                          Machine <strong>M-1005</strong> (Jyoti CNC Turning
                          Center DX-200) is awaiting admin approval.
                        </p>
                        <p class="activity-feed-meta">Yesterday, 04:20 PM</p>
                      </div>
                    </li>
                  </ol>
                </div>
                <div class="dashboard-card-footer">
                  <span
                    >Short activity summary only. Full notification history is
                    available on the Notifications screen.</span
                  >
                </div>
              </section>
            </div>

            <div class="col-lg-5">
              <section class="dashboard-card h-100" aria-labelledby="quick-access-heading">
                <div class="dashboard-card-header">
                  <h2 class="dashboard-card-title" id="quick-access-heading">
                    <i class="fa-solid fa-table-columns" aria-hidden="true"></i>
                    Quick access
                  </h2>
                </div>
                <div class="dashboard-card-body">
                  <div class="dashboard-shortcuts-grid">
                    <a class="shortcut-tile" href="{{ route('owner.machines') }}">
                      <span class="shortcut-icon"
                        ><i class="fa-solid fa-gears" aria-hidden="true"></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block">My Machines</span>
                        <span class="shortcut-meta d-block">5 listings</span>
                      </span>
                      <i
                        class="fa-solid fa-arrow-right shortcut-arrow"
                        aria-hidden="true"
                      ></i>
                    </a>
                    <a
                      class="shortcut-tile"
                      href="{{ route('owner.booking-requests') }}"
                    >
                      <span class="shortcut-icon"
                        ><i class="fa-solid fa-inbox" aria-hidden="true"></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block"
                          >Booking Requests</span
                        >
                        <span class="shortcut-meta d-block">2 pending</span>
                      </span>
                      <i
                        class="fa-solid fa-arrow-right shortcut-arrow"
                        aria-hidden="true"
                      ></i>
                    </a>
                    <a
                      class="shortcut-tile"
                      href="{{ route('owner.availability') }}"
                    >
                      <span class="shortcut-icon"
                        ><i
                          class="fa-solid fa-calendar-days"
                          aria-hidden="true"
                        ></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block"
                          >Machine Availability</span
                        >
                        <span class="shortcut-meta d-block"
                          >14 hrs/day available</span
                        >
                      </span>
                      <i
                        class="fa-solid fa-arrow-right shortcut-arrow"
                        aria-hidden="true"
                      ></i>
                    </a>
                    <a
                      class="shortcut-tile"
                      href="{{ route('owner.ongoing-work') }}"
                    >
                      <span class="shortcut-icon"
                        ><i
                          class="fa-solid fa-screwdriver-wrench"
                          aria-hidden="true"
                        ></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block">Ongoing Work</span>
                        <span class="shortcut-meta d-block">1 in progress</span>
                      </span>
                      <i
                        class="fa-solid fa-arrow-right shortcut-arrow"
                        aria-hidden="true"
                      ></i>
                    </a>
                    <a class="shortcut-tile" href="{{ route('owner.earnings') }}">
                      <span class="shortcut-icon"
                        ><i
                          class="fa-solid fa-indian-rupee-sign"
                          aria-hidden="true"
                        ></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block">Earnings</span>
                        <span class="shortcut-meta d-block"
                          >&#8377;1,84,600 all-time</span
                        >
                      </span>
                      <i
                        class="fa-solid fa-arrow-right shortcut-arrow"
                        aria-hidden="true"
                      ></i>
                    </a>
                    <a class="shortcut-tile" href="{{ route('owner.reviews') }}">
                      <span class="shortcut-icon"
                        ><i class="fa-solid fa-star" aria-hidden="true"></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block">Reviews</span>
                        <span class="shortcut-meta d-block"
                          >4.7 average rating</span
                        >
                      </span>
                      <i
                        class="fa-solid fa-arrow-right shortcut-arrow"
                        aria-hidden="true"
                      ></i>
                    </a>
                  </div>
                </div>
                <div class="dashboard-card-footer">
                  <span
                    >Detailed management screens are available from the sidebar
                    and these quick links.</span
                  >
                </div>
              </section>
            </div>
          </div>
@endsection
