@extends('layouts.admin')

@section('title', 'Machine Management — IdleMach Admin')

@section('content')
  <div class="dashboard-header">
    <div>
      <p class="eyebrow">Platform administration</p>
      <h1 class="dashboard-title">Machine Management</h1>
      <p class="dashboard-subtitle">Review machine listings, owners, categories, locations, and current listing status.</p>
    </div>
  </div>

  <section class="dashboard-card" aria-labelledby="machines-heading">
    <div class="dashboard-card-header">
      <h2 class="dashboard-card-title" id="machines-heading"><i class="fa-solid fa-gears" aria-hidden="true"></i> Machine listings</h2>
      <span class="text-muted small">Frontend interface only</span>
    </div>
    <div class="dashboard-card-body">
      <form class="row g-3 align-items-end mb-4" role="search" aria-label="Search and filter machines" onsubmit="event.preventDefault();">
        <div class="col-12 col-md-4">
          <label class="form-label" for="machine-search">Search machines</label>
          <input class="form-control" id="machine-search" type="search" placeholder="Search by machine name or owner">
        </div>
        <div class="col-6 col-md-3">
          <label class="form-label" for="machine-category-filter">Category</label>
          <select class="form-select" id="machine-category-filter">
            <option value="">All categories</option>
            <option>CNC Turning</option>
            <option>VMC / Milling</option>
            <option>Lathe</option>
            <option>Fabrication</option>
          </select>
        </div>
        <div class="col-6 col-md-3">
          <label class="form-label" for="machine-status-filter">Status</label>
          <select class="form-select" id="machine-status-filter">
            <option value="">All statuses</option>
            <option>Approved</option>
            <option>Pending</option>
            <option>Rejected</option>
            <option>Active</option>
            <option>Inactive</option>
            <option>Maintenance</option>
          </select>
        </div>
        <div class="col-12 col-md-2">
          <button class="btn-im btn-im-primary w-100" type="submit"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i> Search</button>
        </div>
      </form>

      <span class="table-scroll-hint" hidden><i class="fa-solid fa-arrows-left-right" aria-hidden="true"></i> Scroll the table sideways to see all columns.</span>
      <div class="table-responsive" tabindex="0" role="region" aria-label="Machine listings table">
        <table class="im-table">
          <caption class="visually-hidden">Machine listings with owner, category, location, status, and actions.</caption>
          <thead>
            <tr>
              <th scope="col">Machine name</th>
              <th scope="col">Owner</th>
              <th scope="col">Category</th>
              <th scope="col">Location</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><p class="table-cell-title mb-0">Haas CNC Turning Machine ST-20</p><span class="table-cell-id">M-1001</span></td>
              <td>Patel Engineering</td>
              <td>CNC Turning</td>
              <td>Rajkot, Gujarat</td>
              <td><span class="status-badge status-active"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Active</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-pen" aria-hidden="true"></i> Edit</button></div></td>
            </tr>
            <tr>
              <td><p class="table-cell-title mb-0">ACE Micromatic VMC 850V</p><span class="table-cell-id">M-1014</span></td>
              <td>Apex Precision Works</td>
              <td>VMC / Milling</td>
              <td>Ahmedabad, Gujarat</td>
              <td><span class="status-badge status-pending"><i class="fa-regular fa-clock" aria-hidden="true"></i> Pending</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-pen" aria-hidden="true"></i> Edit</button></div></td>
            </tr>
            <tr>
              <td><p class="table-cell-title mb-0">Lokesh Heavy Duty Industrial Lathe 260</p><span class="table-cell-id">M-1015</span></td>
              <td>Shree Shakti Engineering</td>
              <td>Lathe</td>
              <td>Vadodara, Gujarat</td>
              <td><span class="status-badge status-pending"><i class="fa-regular fa-clock" aria-hidden="true"></i> Pending</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-pen" aria-hidden="true"></i> Edit</button></div></td>
            </tr>
            <tr>
              <td><p class="table-cell-title mb-0">Hydraulic Press Brake</p><span class="table-cell-id">M-1008</span></td>
              <td>Sample Fabrication Co.</td>
              <td>Fabrication</td>
              <td>Pune, Maharashtra</td>
              <td><span class="status-badge status-approved"><i class="fa-solid fa-check" aria-hidden="true"></i> Approved</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-pen" aria-hidden="true"></i> Edit</button></div></td>
            </tr>
            <tr>
              <td><p class="table-cell-title mb-0">Jyoti CNC Turning Center DX-200</p><span class="table-cell-id">M-1016</span></td>
              <td>Kiran Toolcraft</td>
              <td>CNC Turning</td>
              <td>Rajkot, Gujarat</td>
              <td><span class="status-badge status-maintenance"><i class="fa-solid fa-wrench" aria-hidden="true"></i> Maintenance</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-pen" aria-hidden="true"></i> Edit</button></div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="dashboard-card-footer">
      <span>Showing 5 sample listings. Search, filters, and actions are frontend interface controls only.</span>
    </div>
  </section>
@endsection
