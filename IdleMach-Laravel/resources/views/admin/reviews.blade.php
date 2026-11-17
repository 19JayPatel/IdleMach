@extends('layouts.admin')

@section('title', 'Review Management — IdleMach Admin')

@section('content')
  <div class="dashboard-header">
    <div>
      <p class="eyebrow">Platform administration</p>
      <h1 class="dashboard-title">Review Management</h1>
      <p class="dashboard-subtitle">Review submitted machine ratings and feedback, and use moderation interface controls where needed.</p>
    </div>
  </div>

  <section class="dashboard-card" aria-labelledby="reviews-heading" data-demo-table>
    <div class="dashboard-card-header">
      <h2 class="dashboard-card-title" id="reviews-heading"><i class="fa-solid fa-star-half-stroke" aria-hidden="true"></i> Machine reviews</h2>
      <span class="text-muted small">Frontend interface only</span>
    </div>
    <div class="dashboard-card-body">
      <form class="row g-3 align-items-end mb-4" role="search" aria-label="Search and filter reviews" onsubmit="event.preventDefault();">
        <div class="col-12 col-md-5">
          <label class="form-label" for="review-search">Search reviews</label>
          <input class="form-control" id="review-search" type="search" placeholder="Search by reviewer or machine">
        </div>
        <div class="col-6 col-md-3">
          <label class="form-label" for="review-rating-filter">Rating</label>
          <select class="form-select" id="review-rating-filter">
            <option value="">All ratings</option>
            <option>5 stars</option>
            <option>4 stars</option>
            <option>3 stars</option>
            <option>2 stars</option>
            <option>1 star</option>
          </select>
        </div>
        <div class="col-6 col-md-2">
          <label class="form-label" for="review-status-filter">Status</label>
          <select class="form-select" id="review-status-filter">
            <option value="">All statuses</option>
            <option>Published</option>
            <option>Flagged</option>
            <option>Hidden</option>
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
      <div class="table-responsive" tabindex="0" role="region" aria-label="Reviews table">
        <table class="im-table">
          <caption class="visually-hidden">Submitted machine reviews with reviewer, machine, rating, date, status, and moderation actions.</caption>
          <thead>
            <tr>
              <th scope="col">Reviewer</th>
              <th scope="col">Machine</th>
              <th scope="col">Rating</th>
              <th scope="col">Review date</th>
              <th scope="col">Status</th>
              <th scope="col">Moderation actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><p class="table-cell-title mb-0">Apex Auto Components</p><span class="table-cell-id">Rajesh Sharma</span></td>
              <td>Haas CNC Turning Machine ST-20</td>
              <td><span class="status-badge status-approved"><i class="fa-solid fa-star" aria-hidden="true"></i> 5 / 5</span></td>
              <td>26 Sep 2026</td>
              <td><span class="status-badge status-active"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Published</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-flag" aria-hidden="true"></i> Flag</button><button class="btn-im btn-im-danger btn-im-sm" type="button"><i class="fa-solid fa-eye-slash" aria-hidden="true"></i> Hide</button></div></td>
            </tr>
            <tr>
              <td><p class="table-cell-title mb-0">Metro Engineering Works</p><span class="table-cell-id">Priya Nair</span></td>
              <td>ACE Micromatic VMC 850V</td>
              <td><span class="status-badge status-approved"><i class="fa-solid fa-star" aria-hidden="true"></i> 4 / 5</span></td>
              <td>20 Sep 2026</td>
              <td><span class="status-badge status-active"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Published</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-flag" aria-hidden="true"></i> Flag</button><button class="btn-im btn-im-danger btn-im-sm" type="button"><i class="fa-solid fa-eye-slash" aria-hidden="true"></i> Hide</button></div></td>
            </tr>
            <tr>
              <td><p class="table-cell-title mb-0">Kavita Hydraulics</p><span class="table-cell-id">Dharmesh Mehta</span></td>
              <td>Haas VF-2 CNC Vertical Milling</td>
              <td><span class="status-badge status-warning"><i class="fa-solid fa-star" aria-hidden="true"></i> 3 / 5</span></td>
              <td>18 Sep 2026</td>
              <td><span class="status-badge status-warning"><i class="fa-solid fa-flag" aria-hidden="true"></i> Flagged</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-primary btn-im-sm" type="button"><i class="fa-solid fa-check" aria-hidden="true"></i> Approve</button><button class="btn-im btn-im-danger btn-im-sm" type="button"><i class="fa-solid fa-eye-slash" aria-hidden="true"></i> Hide</button></div></td>
            </tr>
            <tr>
              <td><p class="table-cell-title mb-0">Siddhivinayak Fabricators</p><span class="table-cell-id">Nitin Patel</span></td>
              <td>Lokesh Heavy Duty Industrial Lathe 260</td>
              <td><span class="status-badge status-approved"><i class="fa-solid fa-star" aria-hidden="true"></i> 5 / 5</span></td>
              <td>14 Sep 2026</td>
              <td><span class="status-badge status-neutral"><i class="fa-solid fa-eye-slash" aria-hidden="true"></i> Hidden</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-primary btn-im-sm" type="button"><i class="fa-solid fa-rotate-left" aria-hidden="true"></i> Restore</button></div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="dashboard-card-footer">
      <span>Showing 4 sample reviews. Moderation actions are frontend interface controls only.</span>
    </div>
  </section>
@endsection
