@extends('layouts.admin')

@section('title', 'Business Rules — IdleMach Admin')

@section('content')
  <div class="dashboard-header">
    <div>
      <p class="eyebrow">Platform administration</p>
      <h1 class="dashboard-title">Business Rules</h1>
      <p class="dashboard-subtitle">Reference interface for marketplace booking, cancellation, machine listing, and platform policy rules.</p>
    </div>
  </div>

  <div class="row g-4">
    <div class="col-lg-6">
      <section class="dashboard-card h-100" aria-labelledby="booking-rules-heading">
        <div class="dashboard-card-header">
          <h2 class="dashboard-card-title" id="booking-rules-heading"><i class="fa-solid fa-calendar-check" aria-hidden="true"></i> Booking rules</h2>
        </div>
        <div class="dashboard-card-body">
          <ul class="rules-reference-list rules-reference-list-single mb-0">
            <li class="rules-reference-item"><i class="fa-solid fa-check" aria-hidden="true"></i><span>Only <strong>active</strong> machines can receive new booking requests.</span></li>
            <li class="rules-reference-item"><i class="fa-solid fa-check" aria-hidden="true"></i><span>Machine-owner <strong>acceptance happens before payment</strong>.</span></li>
            <li class="rules-reference-item"><i class="fa-solid fa-check" aria-hidden="true"></i><span>Accepted bookings move to <strong>payment pending</strong> until payment is completed.</span></li>
            <li class="rules-reference-item"><i class="fa-solid fa-check" aria-hidden="true"></i><span>Booking <strong>confirmation requires successful payment</strong>.</span></li>
            <li class="rules-reference-item"><i class="fa-solid fa-check" aria-hidden="true"></i><span>A review is allowed only for a <strong>completed</strong> booking, once.</span></li>
          </ul>
        </div>
      </section>
    </div>

    <div class="col-lg-6">
      <section class="dashboard-card h-100" aria-labelledby="cancellation-rules-heading">
        <div class="dashboard-card-header">
          <h2 class="dashboard-card-title" id="cancellation-rules-heading"><i class="fa-solid fa-ban" aria-hidden="true"></i> Cancellation rules</h2>
        </div>
        <div class="dashboard-card-body">
          <ul class="rules-reference-list rules-reference-list-single mb-0">
            <li class="rules-reference-item"><i class="fa-solid fa-circle-info" aria-hidden="true"></i><span>Cancellation eligibility depends on the current booking stage and platform policy.</span></li>
            <li class="rules-reference-item"><i class="fa-solid fa-circle-info" aria-hidden="true"></i><span>Paid bookings may require refund review according to defined policy terms.</span></li>
            <li class="rules-reference-item"><i class="fa-solid fa-circle-info" aria-hidden="true"></i><span>Cancelled bookings should clearly record status, reason, and applicable refund outcome.</span></li>
            <li class="rules-reference-item"><i class="fa-solid fa-circle-info" aria-hidden="true"></i><span>This screen presents policy sections for admin reference only (frontend-only interface).</span></li>
          </ul>
        </div>
      </section>
    </div>

    <div class="col-lg-6">
      <section class="dashboard-card h-100" aria-labelledby="listing-rules-heading">
        <div class="dashboard-card-header">
          <h2 class="dashboard-card-title" id="listing-rules-heading"><i class="fa-solid fa-gears" aria-hidden="true"></i> Machine listing rules</h2>
        </div>
        <div class="dashboard-card-body">
          <ul class="rules-reference-list rules-reference-list-single mb-0">
            <li class="rules-reference-item"><i class="fa-solid fa-check" aria-hidden="true"></i><span>Only <strong>approved</strong> machines appear in the public marketplace.</span></li>
            <li class="rules-reference-item"><i class="fa-solid fa-check" aria-hidden="true"></i><span><strong>Approval is not activation</strong>; owners control activation after approval.</span></li>
            <li class="rules-reference-item"><i class="fa-solid fa-check" aria-hidden="true"></i><span>Listings must include accurate machine details, location, capacity, and rate information.</span></li>
            <li class="rules-reference-item"><i class="fa-solid fa-check" aria-hidden="true"></i><span>Machines in maintenance or inactive states should not accept booking requests.</span></li>
          </ul>
        </div>
      </section>
    </div>

    <div class="col-lg-6">
      <section class="dashboard-card h-100" aria-labelledby="platform-policies-heading">
        <div class="dashboard-card-header">
          <h2 class="dashboard-card-title" id="platform-policies-heading"><i class="fa-solid fa-scale-balanced" aria-hidden="true"></i> Platform policies</h2>
        </div>
        <div class="dashboard-card-body">
          <ul class="rules-reference-list rules-reference-list-single mb-0">
            <li class="rules-reference-item"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i><span>Admins monitor platform records and approvals; operational workflows follow documented role responsibilities.</span></li>
            <li class="rules-reference-item"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i><span>User accounts, listings, bookings, payments, and reviews must comply with platform terms and conduct standards.</span></li>
            <li class="rules-reference-item"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i><span>Disputes, refunds, and policy exceptions should follow the platform’s defined resolution process.</span></li>
            <li class="rules-reference-item"><i class="fa-solid fa-shield-halved" aria-hidden="true"></i><span>This interface displays policy sections only and does not store or enforce rule changes.</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
@endsection
