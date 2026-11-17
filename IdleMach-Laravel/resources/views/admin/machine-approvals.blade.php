@extends('layouts.admin')

@section('title', 'Machine Approval — IdleMach Admin')

@section('content')
  <div class="dashboard-header">
    <div>
      <p class="eyebrow">Platform administration</p>
      <h1 class="dashboard-title">Machine Approval</h1>
      <p class="dashboard-subtitle">Review machines awaiting approval, inspect owner details, and record approval decisions in the interface.</p>
    </div>
  </div>

  <section class="dashboard-card" aria-labelledby="approvals-heading">
    <div class="dashboard-card-header">
      <h2 class="dashboard-card-title" id="approvals-heading"><i class="fa-solid fa-clipboard-check" aria-hidden="true"></i> Machines awaiting approval</h2>
      <div class="d-flex align-items-center gap-3">
        <span class="text-muted small" id="pending-approvals-count">12 pending review</span>
        <button class="btn-im btn-im-outline btn-im-sm" type="button" id="btn-reset-approvals"><i class="fa-solid fa-rotate-left" aria-hidden="true"></i> Reset demo</button>
      </div>
    </div>
    <div class="dashboard-card-body dashboard-card-body-flush">
      <span class="table-scroll-hint" hidden><i class="fa-solid fa-arrows-left-right" aria-hidden="true"></i> Scroll the table sideways to see all columns.</span>
      <div class="table-responsive" tabindex="0" role="region" aria-label="Pending machine approvals table">
        <table class="im-table">
          <caption class="visually-hidden">Machines awaiting approval with machine and owner details, status, and actions.</caption>
          <thead>
            <tr>
              <th scope="col">Machine information</th>
              <th scope="col">Owner details</th>
              <th scope="col">Category / Location</th>
              <th scope="col">Submitted</th>
              <th scope="col">Approval status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr data-machine-id="M-1014">
              <td>
                <p class="table-cell-title mb-0">ACE Micromatic VMC 850V</p>
                <span class="table-cell-id">M-1014</span>
                <span class="d-block table-cell-subtext">&#8377;1,200/hr &middot; 6 hrs/day</span>
              </td>
              <td>
                <p class="table-cell-title mb-0">Apex Precision Works</p>
                <span class="table-cell-subtext d-block">apex.precision@example.com</span>
                <span class="table-cell-subtext d-block">Ahmedabad, Gujarat</span>
              </td>
              <td>3-Axis VMC<br><span class="table-cell-subtext">Ahmedabad, Gujarat</span></td>
              <td>Today, 09:30 AM</td>
              <td><span class="status-badge status-pending"><i class="fa-regular fa-clock" aria-hidden="true"></i> Pending</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-primary btn-im-sm" type="button"><i class="fa-solid fa-check" aria-hidden="true"></i> Approve</button><button class="btn-im btn-im-danger btn-im-sm" type="button"><i class="fa-solid fa-xmark" aria-hidden="true"></i> Reject</button></div></td>
            </tr>
            <tr data-machine-id="M-1015">
              <td>
                <p class="table-cell-title mb-0">Lokesh Heavy Duty Industrial Lathe 260</p>
                <span class="table-cell-id">M-1015</span>
                <span class="d-block table-cell-subtext">&#8377;650/hr &middot; 8 hrs/day</span>
              </td>
              <td>
                <p class="table-cell-title mb-0">Shree Shakti Engineering</p>
                <span class="table-cell-subtext d-block">contact@shreeshakti.example.com</span>
                <span class="table-cell-subtext d-block">Vadodara, Gujarat</span>
              </td>
              <td>Industrial Lathe<br><span class="table-cell-subtext">Vadodara, Gujarat</span></td>
              <td>Today, 11:15 AM</td>
              <td><span class="status-badge status-pending"><i class="fa-regular fa-clock" aria-hidden="true"></i> Pending</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-primary btn-im-sm" type="button"><i class="fa-solid fa-check" aria-hidden="true"></i> Approve</button><button class="btn-im btn-im-danger btn-im-sm" type="button"><i class="fa-solid fa-xmark" aria-hidden="true"></i> Reject</button></div></td>
            </tr>
            <tr>
              <td>
                <p class="table-cell-title mb-0">Jyoti CNC Turning Center DX-200</p>
                <span class="table-cell-id">M-1016</span>
                <span class="d-block table-cell-subtext">&#8377;950/hr &middot; 5 hrs/day</span>
              </td>
              <td>
                <p class="table-cell-title mb-0">Kiran Toolcraft</p>
                <span class="table-cell-subtext d-block">kiran.toolcraft@example.com</span>
                <span class="table-cell-subtext d-block">Rajkot, Gujarat</span>
              </td>
              <td>CNC Turning Center<br><span class="table-cell-subtext">Rajkot, Gujarat</span></td>
              <td>Yesterday, 04:45 PM</td>
              <td><span class="status-badge status-pending"><i class="fa-regular fa-clock" aria-hidden="true"></i> Pending</span></td>
              <td><div class="table-actions"><button class="btn-im btn-im-outline btn-im-sm" type="button"><i class="fa-solid fa-eye" aria-hidden="true"></i> View</button><button class="btn-im btn-im-primary btn-im-sm" type="button"><i class="fa-solid fa-check" aria-hidden="true"></i> Approve</button><button class="btn-im btn-im-danger btn-im-sm" type="button"><i class="fa-solid fa-xmark" aria-hidden="true"></i> Reject</button></div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="dashboard-card-footer">
      <span>Showing 3 of 12 pending approvals. Approve/Reject controls are frontend interface elements only and do not update records.</span>
    </div>
  </section>
@endsection
