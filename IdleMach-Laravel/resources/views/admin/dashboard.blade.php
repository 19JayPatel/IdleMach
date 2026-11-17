@extends('layouts.admin')

@section('title', 'Admin Dashboard — IdleMach')

@section('meta_description', 'IdleMach admin dashboard overview showing key platform metrics and recent important activity. Frontend prototype only.')

@section('content')
  <div class="dashboard-header">
    <div>
      <p class="eyebrow">Platform administration</p>
      <h1 class="dashboard-title">Admin Dashboard</h1>
      <p class="dashboard-subtitle">
        Overview of key platform metrics and recent important activity across users, machines, approvals, bookings, and payments.
      </p>
    </div>
    <div class="dashboard-header-actions">
      <a class="btn-im btn-im-outline" href="{{ route('admin.machine-approvals') }}">
        <i class="fa-solid fa-clipboard-check" aria-hidden="true"></i>
        Review approvals
      </a>
      <a class="btn-im btn-im-primary" href="{{ route('admin.reports') }}">
        <i class="fa-solid fa-chart-line" aria-hidden="true"></i>
        View reports
      </a>
    </div>
  </div>

  <section class="dashboard-overview" aria-labelledby="overview-heading">
    <div class="dashboard-overview-head">
      <h2 class="dashboard-overview-title" id="overview-heading">Key platform overview</h2>
    </div>
    <div class="dashboard-stats-grid">
      <div class="stat-card">
        <div class="stat-card-head">
          <p class="stat-card-label">Total Users</p>
          <span class="stat-card-icon stat-icon-users"><i class="fa-solid fa-users" aria-hidden="true"></i></span>
        </div>
        <p class="stat-card-value">250</p>
        <p class="stat-card-meta">All registered platform accounts</p>
      </div>

      <div class="stat-card">
        <div class="stat-card-head">
          <p class="stat-card-label">Total Machine Owners</p>
          <span class="stat-card-icon stat-icon-users"><i class="fa-solid fa-industry" aria-hidden="true"></i></span>
        </div>
        <p class="stat-card-value">85</p>
        <p class="stat-card-meta">Owner accounts</p>
      </div>

      <div class="stat-card">
        <div class="stat-card-head">
          <p class="stat-card-label">Total Buyers</p>
          <span class="stat-card-icon stat-icon-users"><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i></span>
        </div>
        <p class="stat-card-value">165</p>
        <p class="stat-card-meta">Buyer accounts</p>
      </div>

      <div class="stat-card">
        <div class="stat-card-head">
          <p class="stat-card-label">Total Machines</p>
          <span class="stat-card-icon stat-icon-machines"><i class="fa-solid fa-gears" aria-hidden="true"></i></span>
        </div>
        <p class="stat-card-value">180</p>
        <p class="stat-card-meta">All machine listings</p>
      </div>

      <div class="stat-card stat-card-alert">
        <div class="stat-card-head">
          <p class="stat-card-label">Pending Machine Approvals</p>
          <span class="stat-card-icon stat-icon-approvals"><i class="fa-solid fa-clipboard-check" aria-hidden="true"></i></span>
        </div>
        <p class="stat-card-value" id="stat-pending-approvals">12</p>
        <p class="stat-card-meta">Listings awaiting admin review</p>
      </div>

      <div class="stat-card">
        <div class="stat-card-head">
          <p class="stat-card-label">Total Bookings</p>
          <span class="stat-card-icon stat-icon-bookings"><i class="fa-solid fa-calendar-check" aria-hidden="true"></i></span>
        </div>
        <p class="stat-card-value">430</p>
        <p class="stat-card-meta">Platform booking records</p>
      </div>

      <div class="stat-card">
        <div class="stat-card-head">
          <p class="stat-card-label">Revenue Overview</p>
          <span class="stat-card-icon stat-icon-payments"><i class="fa-solid fa-indian-rupee-sign" aria-hidden="true"></i></span>
        </div>
        <p class="stat-card-value">&#8377;5.2L</p>
        <p class="stat-card-meta">Successful payment revenue (overview)</p>
      </div>
    </div>
  </section>

  <div class="row g-4">
    <div class="col-lg-7">
      <section class="dashboard-card h-100" id="recent-activity" aria-labelledby="recent-activity-heading">
        <div class="dashboard-card-header">
          <h2 class="dashboard-card-title" id="recent-activity-heading">
            <i class="fa-solid fa-clock-rotate-left" aria-hidden="true"></i>
            Recent important activity
          </h2>
          <a class="btn-im btn-im-outline btn-im-sm" href="{{ route('admin.reports') }}">View all</a>
        </div>
        <div class="dashboard-card-body">
          <ol class="activity-feed-list">
            <li class="activity-feed-item">
              <span class="activity-feed-icon activity-icon-warning" aria-hidden="true"><i class="fa-solid fa-clipboard-check"></i></span>
              <div class="activity-feed-body">
                <p class="activity-feed-text">Machine <strong>M-1014</strong> (ACE Micromatic VMC 850V) submitted for approval review.</p>
                <p class="activity-feed-meta">Today, 09:30 AM</p>
              </div>
            </li>
            <li class="activity-feed-item">
              <span class="activity-feed-icon activity-icon-success" aria-hidden="true"><i class="fa-solid fa-circle-check"></i></span>
              <div class="activity-feed-body">
                <p class="activity-feed-text">Booking <strong>CS-10027</strong> confirmed after successful payment.</p>
                <p class="activity-feed-meta">Today, 08:20 AM</p>
              </div>
            </li>
            <li class="activity-feed-item">
              <span class="activity-feed-icon activity-icon-info" aria-hidden="true"><i class="fa-solid fa-credit-card"></i></span>
              <div class="activity-feed-body">
                <p class="activity-feed-text">Payment <strong>TXN-88219445</strong> recorded as successful for booking CS-10026.</p>
                <p class="activity-feed-meta">Yesterday, 06:10 PM</p>
              </div>
            </li>
            <li class="activity-feed-item">
              <span class="activity-feed-icon activity-icon-primary" aria-hidden="true"><i class="fa-solid fa-user-plus"></i></span>
              <div class="activity-feed-body">
                <p class="activity-feed-text">New buyer account registered on the platform.</p>
                <p class="activity-feed-meta">Yesterday, 02:45 PM</p>
              </div>
            </li>
          </ol>
        </div>
        <div class="dashboard-card-footer">
          <span>Short overview only. Detailed activity is available in Reports and Activity.</span>
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
            <a class="shortcut-tile" href="{{ route('admin.machine-approvals') }}">
              <span class="shortcut-icon"><i class="fa-solid fa-clipboard-check" aria-hidden="true"></i></span>
              <span class="shortcut-info">
                <span class="shortcut-title d-block">Machine Approval</span>
                <span class="shortcut-meta d-block">12 pending</span>
              </span>
              <i class="fa-solid fa-arrow-right shortcut-arrow" aria-hidden="true"></i>
            </a>
            <a class="shortcut-tile" href="{{ route('admin.users') }}">
              <span class="shortcut-icon"><i class="fa-solid fa-users-gear" aria-hidden="true"></i></span>
              <span class="shortcut-info">
                <span class="shortcut-title d-block">User Management</span>
                <span class="shortcut-meta d-block">Accounts &amp; roles</span>
              </span>
              <i class="fa-solid fa-arrow-right shortcut-arrow" aria-hidden="true"></i>
            </a>
            <a class="shortcut-tile" href="{{ route('admin.bookings') }}">
              <span class="shortcut-icon"><i class="fa-solid fa-calendar-check" aria-hidden="true"></i></span>
              <span class="shortcut-info">
                <span class="shortcut-title d-block">Booking Management</span>
                <span class="shortcut-meta d-block">Booking records</span>
              </span>
              <i class="fa-solid fa-arrow-right shortcut-arrow" aria-hidden="true"></i>
            </a>
            <a class="shortcut-tile" href="{{ route('admin.payments') }}">
              <span class="shortcut-icon"><i class="fa-solid fa-credit-card" aria-hidden="true"></i></span>
              <span class="shortcut-info">
                <span class="shortcut-title d-block">Payment Management</span>
                <span class="shortcut-meta d-block">Transactions</span>
              </span>
              <i class="fa-solid fa-arrow-right shortcut-arrow" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="dashboard-card-footer">
          <span>Detailed management screens are available from the sidebar and quick access links.</span>
        </div>
      </section>
    </div>
  </div>
@endsection
