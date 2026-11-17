@extends('layouts.admin')

@section('title', 'Reports and Activity — IdleMach Admin')

@section('content')
  <div class="dashboard-header">
    <div>
      <p class="eyebrow">Platform administration</p>
      <h1 class="dashboard-title">Reports and Activity</h1>
      <p class="dashboard-subtitle">Overview of platform performance, summary metrics, visual trends, and recent important activity.</p>
    </div>
  </div>

  <section class="dashboard-overview" aria-labelledby="reports-overview-heading">
    <div class="dashboard-overview-head">
      <h2 class="dashboard-overview-title" id="reports-overview-heading">Summary overview</h2>
    </div>
    <div class="dashboard-stats-grid">
      <div class="stat-card">
        <div class="stat-card-head"><p class="stat-card-label">Total Users</p><span class="stat-card-icon stat-icon-users"><i class="fa-solid fa-users" aria-hidden="true"></i></span></div>
        <p class="stat-card-value">250</p>
        <p class="stat-card-meta">85 owners &middot; 165 buyers</p>
      </div>
      <div class="stat-card">
        <div class="stat-card-head"><p class="stat-card-label">Total Machines</p><span class="stat-card-icon stat-icon-machines"><i class="fa-solid fa-gears" aria-hidden="true"></i></span></div>
        <p class="stat-card-value">180</p>
        <p class="stat-card-meta">12 pending approvals</p>
      </div>
      <div class="stat-card">
        <div class="stat-card-head"><p class="stat-card-label">Total Bookings</p><span class="stat-card-icon stat-icon-bookings"><i class="fa-solid fa-calendar-check" aria-hidden="true"></i></span></div>
        <p class="stat-card-value">430</p>
        <p class="stat-card-meta">390 completed bookings</p>
      </div>
      <div class="stat-card">
        <div class="stat-card-head"><p class="stat-card-label">Revenue Overview</p><span class="stat-card-icon stat-icon-payments"><i class="fa-solid fa-indian-rupee-sign" aria-hidden="true"></i></span></div>
        <p class="stat-card-value">&#8377;5.2L</p>
        <p class="stat-card-meta">418 payment records</p>
      </div>
    </div>
  </section>

  <div class="row g-4">
    <div class="col-lg-6">
      <section class="dashboard-card h-100" aria-labelledby="chart-bookings-heading">
        <div class="dashboard-card-header">
          <h2 class="dashboard-card-title" id="chart-bookings-heading"><i class="fa-solid fa-chart-column" aria-hidden="true"></i> Booking trend (sample)</h2>
        </div>
        <div class="dashboard-card-body">
          <p class="text-muted small mb-3">Monthly booking volume overview based on existing frontend sample data.</p>
          <div class="mb-3">
            <div class="d-flex justify-content-between small mb-1"><span>June</span><span>48</span></div>
            <div class="progress" role="progressbar" aria-label="June bookings" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="height: 10px;"><div class="progress-bar" style="width: 48%; background-color: var(--color-primary);"></div></div>
          </div>
          <div class="mb-3">
            <div class="d-flex justify-content-between small mb-1"><span>July</span><span>62</span></div>
            <div class="progress" role="progressbar" aria-label="July bookings" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="height: 10px;"><div class="progress-bar" style="width: 62%; background-color: var(--color-primary);"></div></div>
          </div>
          <div class="mb-3">
            <div class="d-flex justify-content-between small mb-1"><span>August</span><span>74</span></div>
            <div class="progress" role="progressbar" aria-label="August bookings" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="height: 10px;"><div class="progress-bar" style="width: 74%; background-color: var(--color-primary);"></div></div>
          </div>
          <div>
            <div class="d-flex justify-content-between small mb-1"><span>September</span><span>81</span></div>
            <div class="progress" role="progressbar" aria-label="September bookings" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100" style="height: 10px;"><div class="progress-bar" style="width: 81%; background-color: var(--color-primary);"></div></div>
          </div>
        </div>
      </section>
    </div>

    <div class="col-lg-6">
      <section class="dashboard-card h-100" aria-labelledby="chart-revenue-heading">
        <div class="dashboard-card-header">
          <h2 class="dashboard-card-title" id="chart-revenue-heading"><i class="fa-solid fa-chart-line" aria-hidden="true"></i> Revenue and reviews (sample)</h2>
        </div>
        <div class="dashboard-card-body">
          <p class="text-muted small mb-3">Visual overview using existing frontend presentation values.</p>
          <div class="mb-4">
            <div class="d-flex justify-content-between small mb-1"><span>Revenue target progress</span><span>&#8377;5.2L / &#8377;6.0L</span></div>
            <div class="progress" role="progressbar" aria-label="Revenue progress" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="height: 12px;"><div class="progress-bar bg-success" style="width: 87%;"></div></div>
          </div>
          <div class="mb-4">
            <div class="d-flex justify-content-between small mb-1"><span>Machine approval completion</span><span>168 / 180 reviewed</span></div>
            <div class="progress" role="progressbar" aria-label="Approval completion" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="height: 12px;"><div class="progress-bar" style="width: 93%; background-color: var(--color-info);"></div></div>
          </div>
          <div class="im-alert im-alert-info mb-0">
            <i class="fa-solid fa-star" aria-hidden="true"></i>
            <div>
              <strong>142 reviews</strong> with an average rating of <strong>4.8</strong>. Charts are frontend visual summaries only.
            </div>
          </div>
        </div>
      </section>
    </div>

    <div class="col-12">
      <section class="dashboard-card" aria-labelledby="recent-activity-heading">
        <div class="dashboard-card-header">
          <h2 class="dashboard-card-title" id="recent-activity-heading"><i class="fa-solid fa-clock-rotate-left" aria-hidden="true"></i> Recent activity</h2>
        </div>
        <div class="dashboard-card-body">
          <ol class="activity-feed-list">
            <li class="activity-feed-item"><span class="activity-feed-icon activity-icon-warning" aria-hidden="true"><i class="fa-solid fa-clipboard-check"></i></span><div class="activity-feed-body"><p class="activity-feed-text">Machine <strong>M-1014</strong> (ACE Micromatic VMC 850V) submitted for admin review.</p><p class="activity-feed-meta">Today, 09:30 AM</p></div></li>
            <li class="activity-feed-item"><span class="activity-feed-icon activity-icon-success" aria-hidden="true"><i class="fa-solid fa-circle-check"></i></span><div class="activity-feed-body"><p class="activity-feed-text">Booking <strong>CS-10027</strong> confirmed after successful payment.</p><p class="activity-feed-meta">Today, 08:20 AM</p></div></li>
            <li class="activity-feed-item"><span class="activity-feed-icon activity-icon-info" aria-hidden="true"><i class="fa-solid fa-credit-card"></i></span><div class="activity-feed-body"><p class="activity-feed-text">Payment <strong>TXN-88219445</strong> recorded as successful for booking CS-10026.</p><p class="activity-feed-meta">Yesterday, 06:10 PM</p></div></li>
            <li class="activity-feed-item"><span class="activity-feed-icon activity-icon-primary" aria-hidden="true"><i class="fa-solid fa-user-plus"></i></span><div class="activity-feed-body"><p class="activity-feed-text">New buyer account completed registration.</p><p class="activity-feed-meta">Yesterday, 02:45 PM</p></div></li>
            <li class="activity-feed-item"><span class="activity-feed-icon activity-icon-warning" aria-hidden="true"><i class="fa-solid fa-star"></i></span><div class="activity-feed-body"><p class="activity-feed-text">A 5-star review was added to completed booking <strong>CS-10025</strong>.</p><p class="activity-feed-meta">Yesterday, 11:05 AM</p></div></li>
          </ol>
        </div>
        <div class="dashboard-card-footer"><span>Activity list shown for frontend reporting overview. No live audit log connected.</span></div>
      </section>
    </div>
  </div>
@endsection
