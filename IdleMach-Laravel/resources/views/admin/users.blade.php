@extends('layouts.admin')

@section('title', 'User Management — IdleMach Admin')

@section('content')
  <div class="dashboard-header">
    <div>
      <p class="eyebrow">Platform administration</p>
      <h1 class="dashboard-title">User Management</h1>
      <p class="dashboard-subtitle">View and manage registered platform users, roles, and account status.</p>
    </div>
  </div>

  <section class="dashboard-card" aria-labelledby="users-heading">
    <div class="dashboard-card-header">
      <h2 class="dashboard-card-title" id="users-heading"><i class="fa-solid fa-users-gear" aria-hidden="true"></i> Users</h2>
      <span class="text-muted small">Frontend interface only</span>
    </div>
    <div class="dashboard-card-body">
      <form class="row g-3 align-items-end mb-4" role="search" aria-label="Search and filter users" onsubmit="event.preventDefault();">
        <div class="col-12 col-md-5">
          <label class="form-label" for="user-search">Search users</label>
          <input class="form-control" id="user-search" type="search" placeholder="Search by name or email">
        </div>
        <div class="col-6 col-md-3">
          <label class="form-label" for="user-role-filter">Role</label>
          <select class="form-select" id="user-role-filter">
            <option value="">All roles</option>
            <option>Admin</option>
            <option>Machine Owner</option>
            <option>Buyer</option>
          </select>
        </div>
        <div class="col-6 col-md-2">
          <label class="form-label" for="user-status-filter">Status</label>
          <select class="form-select" id="user-status-filter">
            <option value="">All statuses</option>
            <option>Active</option>
            <option>Suspended</option>
          </select>
        </div>
        <div class="col-12 col-md-2">
          <button class="btn-im btn-im-primary w-100" type="submit"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i> Search</button>
        </div>
      </form>

      <span class="table-scroll-hint" hidden><i class="fa-solid fa-arrows-left-right" aria-hidden="true"></i> Scroll the table sideways to see all columns.</span>
      <div class="table-responsive" tabindex="0" role="region" aria-label="Users table">
        <table class="im-table">
          <caption class="visually-hidden">Registered users with role, registration date, status, and actions.</caption>
          <thead>
            <tr>
              <th scope="col">User name</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Registration date</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><p class="table-cell-title mb-0">Kirit Patel</p><span class="table-cell-id">USR-1001</span></td>
              <td>kirit.patel@example.com</td>
              <td>Machine Owner</td>
              <td>12 Jan 2026</td>
              <td><span class="status-badge status-active"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Active</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-pen" aria-hidden="true"></i> Edit</button><button class="btn-im btn-im-danger btn-im-sm" type="button"><i class="fa-solid fa-user-slash" aria-hidden="true"></i> Suspend</button></div></td>
            </tr>
            <tr>
              <td><p class="table-cell-title mb-0">Rajesh Sharma</p><span class="table-cell-id">USR-1002</span></td>
              <td>rajesh.sharma@example.com</td>
              <td>Buyer</td>
              <td>28 Jan 2026</td>
              <td><span class="status-badge status-active"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Active</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-pen" aria-hidden="true"></i> Edit</button><button class="btn-im btn-im-danger btn-im-sm" type="button"><i class="fa-solid fa-user-slash" aria-hidden="true"></i> Suspend</button></div></td>
            </tr>
            <tr>
              <td><p class="table-cell-title mb-0">Shree Shakti Engineering</p><span class="table-cell-id">USR-1003</span></td>
              <td>contact@shreeshakti.example.com</td>
              <td>Machine Owner</td>
              <td>05 Feb 2026</td>
              <td><span class="status-badge status-blocked"><i class="fa-solid fa-ban" aria-hidden="true"></i> Suspended</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-pen" aria-hidden="true"></i> Edit</button><button class="btn-im btn-im-primary btn-im-sm" type="button"><i class="fa-solid fa-user-check" aria-hidden="true"></i> Activate</button></div></td>
            </tr>
            <tr>
              <td><p class="table-cell-title mb-0">Metro Engineering Works</p><span class="table-cell-id">USR-1004</span></td>
              <td>metro.engineering@example.com</td>
              <td>Buyer</td>
              <td>18 Feb 2026</td>
              <td><span class="status-badge status-active"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Active</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-pen" aria-hidden="true"></i> Edit</button><button class="btn-im btn-im-danger btn-im-sm" type="button"><i class="fa-solid fa-user-slash" aria-hidden="true"></i> Suspend</button></div></td>
            </tr>
            <tr>
              <td><p class="table-cell-title mb-0">Platform Admin</p><span class="table-cell-id">USR-1000</span></td>
              <td>admin@idlemach.example.com</td>
              <td>Admin</td>
              <td>01 Jan 2026</td>
              <td><span class="status-badge status-active"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Active</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-pen" aria-hidden="true"></i> Edit</button></div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="dashboard-card-footer">
      <span>Showing 5 sample users. Search, filters, and actions are frontend interface controls only.</span>
    </div>
  </section>
@endsection
