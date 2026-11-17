@extends('layouts.admin')

@section('title', 'Payment Management — IdleMach Admin')

@section('content')
  <div class="dashboard-header">
    <div>
      <p class="eyebrow">Platform administration</p>
      <h1 class="dashboard-title">Payment Management</h1>
      <p class="dashboard-subtitle">Review payment records, transaction references, amounts, dates, and payment status.</p>
    </div>
  </div>

  <section class="dashboard-card" aria-labelledby="payments-heading" data-demo-table>
    <div class="dashboard-card-header">
      <h2 class="dashboard-card-title" id="payments-heading"><i class="fa-solid fa-credit-card" aria-hidden="true"></i> Payment records</h2>
      <span class="text-muted small">Frontend interface only</span>
    </div>
    <div class="dashboard-card-body">
      <form class="row g-3 align-items-end mb-4" role="search" aria-label="Search and filter payments" onsubmit="event.preventDefault();">
        <div class="col-12 col-md-5">
          <label class="form-label" for="payment-search">Search payments</label>
          <input class="form-control" id="payment-search" type="search" placeholder="Search by transaction ID or booking ID">
        </div>
        <div class="col-6 col-md-3">
          <label class="form-label" for="payment-status-filter">Payment status</label>
          <select class="form-select" id="payment-status-filter">
            <option value="">All statuses</option>
            <option>Pending</option>
            <option>Successful</option>
            <option>Failed</option>
            <option>Refunded</option>
          </select>
        </div>
        <div class="col-6 col-md-2">
          <label class="form-label" for="payment-date-filter">Date range</label>
          <select class="form-select" id="payment-date-filter">
            <option value="">Any time</option>
            <option>Today</option>
            <option>This week</option>
            <option>This month</option>
          </select>
        </div>
        <div class="col-12 col-md-2">
          <div class="d-grid gap-2">
            <button class="btn-im btn-im-primary" type="submit"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i> Search</button>
            <button class="btn-im btn-im-outline" type="reset"><i class="fa-solid fa-rotate-left" aria-hidden="true"></i> Reset</button>
          </div>
        </div>
      </form>

      <span class="table-scroll-hint" hidden><i class="fa-solid fa-arrows-left-right" aria-hidden="true"></i> Scroll the table sideways to see all columns.</span>
      <div class="table-responsive" tabindex="0" role="region" aria-label="Payment records table">
        <table class="im-table">
          <caption class="visually-hidden">Payment records with transaction ID, booking ID, amount, payment date, status, and actions.</caption>
          <thead>
            <tr>
              <th scope="col">Transaction ID</th>
              <th scope="col">Booking ID</th>
              <th scope="col">Amount</th>
              <th scope="col">Payment date</th>
              <th scope="col">Payment status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><span class="table-cell-id">TXN-88219445</span></td>
              <td>CS-10026</td>
              <td>&#8377;19,200</td>
              <td>26 Sep 2026</td>
              <td><span class="status-badge status-successful"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Successful</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button></div></td>
            </tr>
            <tr>
              <td><span class="table-cell-id">TXN-88219446</span></td>
              <td>CS-10027</td>
              <td>&#8377;5,400</td>
              <td>27 Sep 2026</td>
              <td><span class="status-badge status-successful"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Successful</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button></div></td>
            </tr>
            <tr>
              <td><span class="table-cell-id">TXN-88219447</span></td>
              <td>CS-10028</td>
              <td>&#8377;5,200</td>
              <td>28 Sep 2026</td>
              <td><span class="status-badge status-pending"><i class="fa-regular fa-clock" aria-hidden="true"></i> Pending</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button></div></td>
            </tr>
            <tr>
              <td><span class="table-cell-id">TXN-88219401</span></td>
              <td>CS-10025</td>
              <td>&#8377;8,000</td>
              <td>24 Sep 2026</td>
              <td><span class="status-badge status-successful"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Successful</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button></div></td>
            </tr>
            <tr>
              <td><span class="table-cell-id">TXN-88219410</span></td>
              <td>CS-10018</td>
              <td>&#8377;3,600</td>
              <td>20 Sep 2026</td>
              <td><span class="status-badge status-failed"><i class="fa-solid fa-circle-xmark" aria-hidden="true"></i> Failed</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button></div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="dashboard-card-footer">
      <span>Showing 5 sample payment records. Search and filters are frontend interface controls only.</span>
    </div>
  </section>
@endsection
