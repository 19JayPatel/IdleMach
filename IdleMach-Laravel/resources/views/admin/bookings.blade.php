@extends('layouts.admin')

@section('title', 'Booking Management — IdleMach Admin')

@section('content')
  <div class="dashboard-header">
    <div>
      <p class="eyebrow">Platform administration</p>
      <h1 class="dashboard-title">Booking Management</h1>
      <p class="dashboard-subtitle">Monitor booking records, participants, schedules, amounts, and booking status.</p>
    </div>
  </div>

  <section class="dashboard-card" aria-labelledby="bookings-heading">
    <div class="dashboard-card-header">
      <h2 class="dashboard-card-title" id="bookings-heading"><i class="fa-solid fa-calendar-check" aria-hidden="true"></i> Booking records</h2>
      <span class="text-muted small">Frontend interface only</span>
    </div>
    <div class="dashboard-card-body">
      <form class="row g-3 align-items-end mb-4" role="search" aria-label="Search and filter bookings" onsubmit="event.preventDefault();">
        <div class="col-12 col-md-5">
          <label class="form-label" for="booking-search">Search bookings</label>
          <input class="form-control" id="booking-search" type="search" placeholder="Search by booking ID, machine, buyer, or owner">
        </div>
        <div class="col-6 col-md-3">
          <label class="form-label" for="booking-status-filter">Status</label>
          <select class="form-select" id="booking-status-filter">
            <option value="">All statuses</option>
            <option>Pending</option>
            <option>Accepted</option>
            <option>Payment pending</option>
            <option>Confirmed</option>
            <option>In progress</option>
            <option>Completed</option>
            <option>Rejected</option>
            <option>Cancelled</option>
          </select>
        </div>
        <div class="col-6 col-md-2">
          <label class="form-label" for="booking-date-filter">Date range</label>
          <select class="form-select" id="booking-date-filter">
            <option value="">Any time</option>
            <option>Today</option>
            <option>This week</option>
            <option>This month</option>
          </select>
        </div>
        <div class="col-12 col-md-2">
          <button class="btn-im btn-im-primary w-100" type="submit"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i> Search</button>
        </div>
      </form>

      <span class="table-scroll-hint" hidden><i class="fa-solid fa-arrows-left-right" aria-hidden="true"></i> Scroll the table sideways to see all columns.</span>
      <div class="table-responsive" tabindex="0" role="region" aria-label="Booking records table">
        <table class="im-table">
          <caption class="visually-hidden">Booking records with machine, buyer, owner, dates, amount, status, and actions.</caption>
          <thead>
            <tr>
              <th scope="col">Booking ID</th>
              <th scope="col">Machine</th>
              <th scope="col">Buyer</th>
              <th scope="col">Owner</th>
              <th scope="col">Booking dates</th>
              <th scope="col">Amount</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><span class="table-cell-id">CS-10025</span></td>
              <td>Haas CNC Turning Machine ST-20</td>
              <td>Apex Auto Components</td>
              <td>Patel Engineering</td>
              <td>25 Sep 2026</td>
              <td>&#8377;8,000</td>
              <td><span class="status-badge status-completed"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Completed</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button></div></td>
            </tr>
            <tr>
              <td><span class="table-cell-id">CS-10026</span></td>
              <td>ACE Micromatic VMC 850V</td>
              <td>Metro Engineering Works</td>
              <td>Apex Precision Works</td>
              <td>27 Sep 2026</td>
              <td>&#8377;19,200</td>
              <td><span class="status-badge status-in-progress"><i class="fa-solid fa-spinner" aria-hidden="true"></i> In progress</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button></div></td>
            </tr>
            <tr>
              <td><span class="table-cell-id">CS-10027</span></td>
              <td>Haas VF-2 CNC Vertical Milling</td>
              <td>Siddhivinayak Fabricators</td>
              <td>Patel Engineering</td>
              <td>28 Sep 2026</td>
              <td>&#8377;5,400</td>
              <td><span class="status-badge status-confirmed"><i class="fa-solid fa-check" aria-hidden="true"></i> Confirmed</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button></div></td>
            </tr>
            <tr>
              <td><span class="table-cell-id">CS-10028</span></td>
              <td>Lokesh Heavy Duty Industrial Lathe</td>
              <td>Kavita Hydraulics</td>
              <td>Shree Shakti Engineering</td>
              <td>29 Sep 2026</td>
              <td>&#8377;5,200</td>
              <td><span class="status-badge status-payment-pending"><i class="fa-regular fa-clock" aria-hidden="true"></i> Payment pending</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button></div></td>
            </tr>
            <tr>
              <td><span class="table-cell-id">CS-10030</span></td>
              <td>Haas CNC Turning Machine ST-20</td>
              <td>Delta Gears &amp; Shafts</td>
              <td>Patel Engineering</td>
              <td>01 Oct 2026</td>
              <td>&#8377;3,200</td>
              <td><span class="status-badge status-pending"><i class="fa-regular fa-clock" aria-hidden="true"></i> Pending</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button></div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="dashboard-card-footer">
      <span>Showing 5 sample booking records. Search and filters are frontend interface controls only.</span>
    </div>
  </section>
@endsection
