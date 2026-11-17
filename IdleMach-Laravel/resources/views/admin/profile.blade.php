@extends('layouts.admin')

@section('title', 'Profile Management — IdleMach Admin')

@section('content')
  <div class="dashboard-header">
    <div>
      <p class="eyebrow">Platform administration</p>
      <h1 class="dashboard-title">Profile Management</h1>
      <p class="dashboard-subtitle">View and update your admin profile information using the existing admin interface design.</p>
    </div>
  </div>

  <div class="row g-4">
    <div class="col-lg-4">
      <section class="dashboard-card h-100" aria-labelledby="profile-summary-heading">
        <div class="dashboard-card-header">
          <h2 class="dashboard-card-title" id="profile-summary-heading"><i class="fa-solid fa-user-shield" aria-hidden="true"></i> Profile summary</h2>
        </div>
        <div class="dashboard-card-body">
          <div class="d-flex align-items-center gap-3 mb-4">
            <span class="dashboard-user-avatar" aria-hidden="true" style="width:56px;height:56px;font-size:1.1rem;">AD</span>
            <div>
              <p class="mb-1 fw-semibold">Platform Admin</p>
              <p class="mb-0 text-muted small">Platform Administrator</p>
            </div>
          </div>
          <dl class="row mb-0">
            <dt class="col-5">Admin ID</dt>
            <dd class="col-7">USR-1000</dd>
            <dt class="col-5">Role</dt>
            <dd class="col-7">Admin</dd>
            <dt class="col-5">Status</dt>
            <dd class="col-7"><span class="status-badge status-active"><i class="fa-solid fa-circle-check" aria-hidden="true"></i> Active</span></dd>
            <dt class="col-5">Joined</dt>
            <dd class="col-7 mb-0">01 Jan 2026</dd>
          </dl>
        </div>
      </section>
    </div>

    <div class="col-lg-8">
      <section class="dashboard-card h-100" aria-labelledby="profile-edit-heading">
        <div class="dashboard-card-header">
          <h2 class="dashboard-card-title" id="profile-edit-heading"><i class="fa-solid fa-user-pen" aria-hidden="true"></i> Edit profile</h2>
          <span class="text-muted small">Frontend interface only</span>
        </div>
        <div class="dashboard-card-body">
          <form class="row g-3" data-demo-profile-form>
            <div class="col-md-6">
              <label class="form-label" for="admin-name">Full name</label>
              <input class="form-control" id="admin-name" type="text" value="Platform Admin">
            </div>
            <div class="col-md-6">
              <label class="form-label" for="admin-email">Email address</label>
              <input class="form-control" id="admin-email" type="email" value="admin@idlemach.example.com">
            </div>
            <div class="col-md-6">
              <label class="form-label" for="admin-phone">Phone number</label>
              <input class="form-control" id="admin-phone" type="text" value="+91 98765 00001">
            </div>
            <div class="col-md-6">
              <label class="form-label" for="admin-role">Role</label>
              <input class="form-control" id="admin-role" type="text" value="Platform Administrator" readonly>
            </div>
            <div class="col-12">
              <label class="form-label" for="admin-bio">Profile note</label>
              <textarea class="form-control" id="admin-bio" rows="4">Responsible for monitoring users, machine approvals, bookings, payments, reviews, and platform activity.</textarea>
            </div>
            <div class="col-12">
              <div class="im-alert im-alert-info mb-0">
                <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                <div>This is a frontend-only profile interface. Saving changes does not update real records.</div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-actions mt-2">
                <button class="btn-im btn-im-primary" type="submit"><i class="fa-solid fa-floppy-disk" aria-hidden="true"></i> Save changes</button>
                <button class="btn-im btn-im-outline" type="reset"><i class="fa-solid fa-rotate-left" aria-hidden="true"></i> Reset</button>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
  </div>
@endsection
