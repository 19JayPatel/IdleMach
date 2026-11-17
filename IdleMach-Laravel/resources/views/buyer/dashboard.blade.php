@extends('layouts.buyer')

@section('title', 'Buyer Dashboard — IdleMach')

@section('meta_description', 'IdleMach buyer dashboard overview with booking request statistics, recent activity, and quick access to explore machines, bookings, payments, reviews, notifications, and profile management.')

@section('page_title', 'Dashboard')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Buyer workspace</p>
              <h1 class="dashboard-title">Buyer Dashboard</h1>
              <p class="dashboard-subtitle">
                A quick overview of your booking activity, spending, and the
                screens you use most. Detailed records live on their own pages.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('machines') }}">
                <i class="fa-solid fa-store" aria-hidden="true"></i>
                View marketplace
              </a>
              <a class="btn-im btn-im-primary" href="{{ route('buyer.explore-machines') }}">
                <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                Explore machines
              </a>
            </div>
          </div>

          <!-- Booking overview -->
          <section class="dashboard-overview" aria-labelledby="overview-heading">
            <div class="dashboard-overview-head">
              <h2 class="dashboard-overview-title" id="overview-heading">
                Booking overview
              </h2>
            </div>
            <div class="dashboard-stats-grid buyer-stats-grid">
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Total Booking Requests</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-inbox" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-total-requests">8</p>
                <p class="stat-card-meta">
                  <a href="{{ route('buyer.booking-requests') }}">View all requests</a>
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Accepted Bookings</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-accepted-bookings">1</p>
                <p class="stat-card-meta">
                  <a href="{{ route('buyer.accepted-bookings') }}">Owner accepted bookings</a>
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Ongoing Work</p>
                  <span class="stat-card-icon stat-icon-machines">
                    <i
                      class="fa-solid fa-screwdriver-wrench"
                      aria-hidden="true"
                    ></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-ongoing-work">1</p>
                <p class="stat-card-meta">
                  <a href="{{ route('buyer.ongoing-work') }}">Work currently in progress</a>
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Completed Bookings</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-completed-bookings">2</p>
                <p class="stat-card-meta">
                  <a href="{{ route('buyer.completed-bookings') }}">Finished bookings</a>
                </p>
              </div>

              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Total Amount Spent</p>
                  <span class="stat-card-icon stat-icon-payments">
                    <i
                      class="fa-solid fa-indian-rupee-sign"
                      aria-hidden="true"
                    ></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-total-spent">
                  &#8377;15,000
                </p>
                <p class="stat-card-meta">
                  <a href="{{ route('buyer.payments') }}">Across 4 successful payments</a>
                </p>
              </div>
            </div>
          </section>

          <div class="row g-4">
            <div class="col-lg-7">
              <section
                class="dashboard-card h-100"
                aria-labelledby="recent-activity-heading"
              >
                <div class="dashboard-card-header">
                  <h2 class="dashboard-card-title" id="recent-activity-heading">
                    <i class="fa-solid fa-clock-rotate-left" aria-hidden="true"></i>
                    Recent important activity
                  </h2>
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
                          Booking <strong>BR-3103</strong> is awaiting payment
                          after owner acceptance for
                          <a href="{{ route('buyer.payments') }}">Vertical Machining Centre</a>.
                        </p>
                        <p class="activity-feed-meta">Today, 11:20 AM</p>
                      </div>
                    </li>
                    <li class="activity-feed-item">
                      <span
                        class="activity-feed-icon activity-icon-info"
                        aria-hidden="true"
                        ><i class="fa-solid fa-calendar-check"></i
                      ></span>
                      <div class="activity-feed-body">
                        <p class="activity-feed-text">
                          Booking <strong>BR-3102</strong> for Hydraulic Press
                          Brake was
                          <a href="{{ route('buyer.accepted-bookings') }}"
                            >accepted by the machine owner</a
                          >.
                        </p>
                        <p class="activity-feed-meta">Yesterday, 04:10 PM</p>
                      </div>
                    </li>
                    <li class="activity-feed-item">
                      <span
                        class="activity-feed-icon activity-icon-success"
                        aria-hidden="true"
                        ><i class="fa-solid fa-star"></i
                      ></span>
                      <div class="activity-feed-body">
                        <p class="activity-feed-text">
                          Booking <strong>BR-3107</strong> is completed and
                          <a href="{{ route('buyer.reviews') }}">awaiting your review</a>.
                        </p>
                        <p class="activity-feed-meta">Yesterday, 09:35 AM</p>
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
                          Payment for <strong>BR-3105</strong> was successful;
                          <a href="{{ route('buyer.ongoing-work') }}">work is in progress</a>.
                        </p>
                        <p class="activity-feed-meta">06 Nov 2026, 12:05 PM</p>
                      </div>
                    </li>
                  </ol>
                </div>
                <div class="dashboard-card-footer">
                  <span
                    >Short activity summary only. The full list is available on
                    the Notifications screen.</span
                  >
                </div>
              </section>
            </div>

            <div class="col-lg-5">
              <section
                class="dashboard-card h-100"
                aria-labelledby="quick-access-heading"
              >
                <div class="dashboard-card-header">
                  <h2 class="dashboard-card-title" id="quick-access-heading">
                    <i class="fa-solid fa-table-columns" aria-hidden="true"></i>
                    Quick access
                  </h2>
                </div>
                <div class="dashboard-card-body">
                  <div class="dashboard-shortcuts-grid">
                    <a class="shortcut-tile" href="{{ route('buyer.explore-machines') }}">
                      <span class="shortcut-icon"
                        ><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block">Explore Machines</span>
                        <span class="shortcut-meta d-block">3 listings</span>
                      </span>
                      <i class="fa-solid fa-arrow-right shortcut-arrow" aria-hidden="true"></i>
                    </a>
                    <a class="shortcut-tile" href="{{ route('buyer.booking-requests') }}">
                      <span class="shortcut-icon"
                        ><i class="fa-solid fa-inbox" aria-hidden="true"></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block">Booking Requests</span>
                        <span class="shortcut-meta d-block">8 records &middot; 1 pending</span>
                      </span>
                      <i class="fa-solid fa-arrow-right shortcut-arrow" aria-hidden="true"></i>
                    </a>
                    <a class="shortcut-tile" href="{{ route('buyer.accepted-bookings') }}">
                      <span class="shortcut-icon"
                        ><i class="fa-solid fa-calendar-check" aria-hidden="true"></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block">Accepted Bookings</span>
                        <span class="shortcut-meta d-block">1 accepted &middot; 1 confirmed</span>
                      </span>
                      <i class="fa-solid fa-arrow-right shortcut-arrow" aria-hidden="true"></i>
                    </a>
                    <a class="shortcut-tile" href="{{ route('buyer.ongoing-work') }}">
                      <span class="shortcut-icon"
                        ><i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block">Ongoing Work</span>
                        <span class="shortcut-meta d-block">1 active booking</span>
                      </span>
                      <i class="fa-solid fa-arrow-right shortcut-arrow" aria-hidden="true"></i>
                    </a>
                    <a class="shortcut-tile" href="{{ route('buyer.completed-bookings') }}">
                      <span class="shortcut-icon"
                        ><i class="fa-solid fa-circle-check" aria-hidden="true"></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block">Completed Bookings</span>
                        <span class="shortcut-meta d-block">2 completions</span>
                      </span>
                      <i class="fa-solid fa-arrow-right shortcut-arrow" aria-hidden="true"></i>
                    </a>
                    <a class="shortcut-tile" href="{{ route('buyer.payments') }}">
                      <span class="shortcut-icon"
                        ><i class="fa-solid fa-receipt" aria-hidden="true"></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block">Payments and History</span>
                        <span class="shortcut-meta d-block">6 transactions</span>
                      </span>
                      <i class="fa-solid fa-arrow-right shortcut-arrow" aria-hidden="true"></i>
                    </a>
                    <a class="shortcut-tile" href="{{ route('buyer.reviews') }}">
                      <span class="shortcut-icon"
                        ><i class="fa-solid fa-star" aria-hidden="true"></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block">My Reviews</span>
                        <span class="shortcut-meta d-block">1 submitted &middot; 1 awaiting</span>
                      </span>
                      <i class="fa-solid fa-arrow-right shortcut-arrow" aria-hidden="true"></i>
                    </a>
                    <a class="shortcut-tile" href="{{ route('buyer.notifications') }}">
                      <span class="shortcut-icon"
                        ><i class="fa-regular fa-bell" aria-hidden="true"></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block">Notifications</span>
                        <span class="shortcut-meta d-block">3 unread messages</span>
                      </span>
                      <i class="fa-solid fa-arrow-right shortcut-arrow" aria-hidden="true"></i>
                    </a>
                    <a class="shortcut-tile" href="{{ route('buyer.profile') }}">
                      <span class="shortcut-icon"
                        ><i class="fa-solid fa-user-gear" aria-hidden="true"></i
                      ></span>
                      <span class="shortcut-info">
                        <span class="shortcut-title d-block">Profile Management</span>
                        <span class="shortcut-meta d-block">Personal account details</span>
                      </span>
                      <i class="fa-solid fa-arrow-right shortcut-arrow" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
                <div class="dashboard-card-footer">
                  <span>All records are illustrative demo data.</span>
                </div>
              </section>
            </div>
          </div>
@endsection
