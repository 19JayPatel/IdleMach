<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta
      name="description"
      content="@yield('meta_description', 'IdleMach admin dashboard prototype for monitoring users, machine approvals, bookings, payments, reviews, and platform activity. All records are illustrative demo data and no backend is connected.')"
    >
    <meta name="theme-color" content="#0f5c6b">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin Dashboard — IdleMach')</title>

    <link rel="icon" href="{{ asset('assets/icons/favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script>
      window.IdleMach = window.IdleMach || {};
      window.IdleMach.loginUrl = "{{ route('login') }}";
    </script>

    @stack('styles')
  </head>
  <body id="top">
    <a class="skip-link" href="#main">Skip to main content</a>

    <div class="dashboard-layout" id="admin-dashboard">
      <x-admin.sidebar />
      <div class="dashboard-backdrop" id="dashboard-backdrop"></div>

      <div class="dashboard-main">
        <x-admin.header />
        <main class="dashboard-content" id="main">
          @yield('content')
        </main>
        <x-admin.footer />
      </div>
    </div>

    <!-- ================= Admin logout modal (shared) ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-admin-logout"
      tabindex="-1"
      aria-labelledby="modal-admin-logout-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title h5" id="modal-admin-logout-label">
              Sign out of the admin dashboard?
            </h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Cancel sign out"
            ></button>
          </div>
          <div class="modal-body">
            <p class="mb-0">
              No authentication or session is active. Continuing returns to
              the login interface.
            </p>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn-im btn-im-outline"
              data-bs-dismiss="modal"
            >
              Stay on dashboard
            </button>
            <button
              type="button"
              class="btn-im btn-im-danger"
              id="btn-confirm-logout"
            >
              <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
              Sign out
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= Admin approval / booking demo modals ================= -->
    <div class="modal fade" id="modal-view-machine" tabindex="-1" role="dialog" aria-labelledby="modal-view-machine-label" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title h5" id="modal-view-machine-label">Machine details</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close machine details"></button>
          </div>
          <div class="modal-body">
            <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
              <div>
                <h3 class="h6 mb-1" id="vm-title">Machine</h3>
                <span class="table-cell-id" id="vm-id">—</span>
              </div>
              <span class="status-badge status-pending" id="vm-status-badge"><i class="fa-regular fa-clock" aria-hidden="true"></i> Pending</span>
            </div>
            <dl class="row mb-0">
              <dt class="col-sm-4">Owner</dt><dd class="col-sm-8" id="vm-company">—</dd>
              <dt class="col-sm-4">Machine type</dt><dd class="col-sm-8" id="vm-type">—</dd>
              <dt class="col-sm-4">Hourly rate</dt><dd class="col-sm-8" id="vm-rate">—</dd>
              <dt class="col-sm-4">Capacity</dt><dd class="col-sm-8" id="vm-capacity">—</dd>
              <dt class="col-sm-4">Work envelope</dt><dd class="col-sm-8" id="vm-envelope">—</dd>
              <dt class="col-sm-4">Specifications</dt><dd class="col-sm-8" id="vm-specs">—</dd>
              <dt class="col-sm-4">Materials</dt><dd class="col-sm-8" id="vm-material">—</dd>
              <dt class="col-sm-4">Submitted</dt><dd class="col-sm-8" id="vm-submitted">—</dd>
              <dt class="col-sm-4">Photos</dt><dd class="col-sm-8" id="vm-photos">—</dd>
              <dt class="col-sm-4 mb-0">Verification notes</dt><dd class="col-sm-8 mb-0" id="vm-notes">—</dd>
            </dl>
            <div class="im-alert im-alert-info mt-3 mb-0">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>Sample approval record. Viewing does not change any stored data.</div>
            </div>
          </div>
          <div class="modal-footer"><button type="button" class="btn-im btn-im-outline" data-bs-dismiss="modal">Close</button></div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-approve-machine" tabindex="-1" role="dialog" aria-labelledby="modal-approve-machine-label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header"><h2 class="modal-title h5" id="modal-approve-machine-label">Approve machine</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancel approval"></button></div>
          <div class="modal-body">
            <p class="mb-2">Approve <strong id="approve-machine-name">—</strong> (<span id="approve-machine-id">—</span>) in this frontend demonstration?</p>
            <p class="small text-muted mb-0">No database record is changed. Approval is not activation; the owner still controls activation.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn-im btn-im-outline" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn-im btn-im-primary" id="btn-confirm-approve"><i class="fa-solid fa-check" aria-hidden="true"></i> Approve in demo</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-reject-machine" tabindex="-1" role="dialog" aria-labelledby="modal-reject-machine-label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header"><h2 class="modal-title h5" id="modal-reject-machine-label">Reject machine</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancel rejection"></button></div>
          <div class="modal-body">
            <p class="mb-3">Reject <strong id="reject-machine-name">—</strong> (<span id="reject-machine-id">—</span>) in this frontend demonstration?</p>
            <label class="form-label" for="reject-reason-select">Reason</label>
            <select class="form-select mb-3" id="reject-reason-select">
              <option>Incomplete technical specifications</option>
              <option>Documentation requirements not met</option>
              <option>Image quality unacceptable</option>
              <option>Capacity details cannot be verified</option>
              <option>Other</option>
            </select>
            <label class="form-label" for="reject-notes-field">Notes (optional)</label>
            <textarea class="form-control" id="reject-notes-field" rows="3" placeholder="Demo notes are not stored."></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn-im btn-im-outline" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn-im btn-im-danger" id="btn-confirm-reject"><i class="fa-solid fa-xmark" aria-hidden="true"></i> Reject in demo</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-view-booking" tabindex="-1" role="dialog" aria-labelledby="modal-view-booking-label" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header"><h2 class="modal-title h5" id="modal-view-booking-label">Booking details</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close booking details"></button></div>
          <div class="modal-body">
            <div class="d-flex flex-wrap gap-2 mb-3">
              <span class="table-cell-id" id="vb-id">—</span>
              <span class="status-badge status-pending" id="vb-status-badge"><i class="fa-regular fa-clock" aria-hidden="true"></i> Pending</span>
              <span class="status-badge status-pending" id="vb-pay-badge"><i class="fa-regular fa-clock" aria-hidden="true"></i> Pending</span>
            </div>
            <dl class="row mb-0">
              <dt class="col-sm-4">Machine</dt><dd class="col-sm-8" id="vb-machine">—</dd>
              <dt class="col-sm-4">Buyer</dt><dd class="col-sm-8" id="vb-buyer">—</dd>
              <dt class="col-sm-4">Owner</dt><dd class="col-sm-8" id="vb-owner">—</dd>
              <dt class="col-sm-4">Schedule</dt><dd class="col-sm-8" id="vb-date">—</dd>
              <dt class="col-sm-4">Duration</dt><dd class="col-sm-8" id="vb-hours">—</dd>
              <dt class="col-sm-4">Rate</dt><dd class="col-sm-8" id="vb-rate">—</dd>
              <dt class="col-sm-4">Amount</dt><dd class="col-sm-8" id="vb-total">—</dd>
              <dt class="col-sm-4">Work description</dt><dd class="col-sm-8" id="vb-desc">—</dd>
              <dt class="col-sm-4">Drawing reference</dt><dd class="col-sm-8" id="vb-drawing">—</dd>
              <dt class="col-sm-4 mb-0">Transaction reference</dt><dd class="col-sm-8 mb-0" id="vb-txnid">—</dd>
            </dl>
            <div class="im-alert im-alert-info mt-3 mb-0">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>Sample booking record. No payment or booking is processed here.</div>
            </div>
          </div>
          <div class="modal-footer"><button type="button" class="btn-im btn-im-outline" data-bs-dismiss="modal">Close</button></div>
        </div>
      </div>
    </div>

    <!-- ================= Notifications offcanvas (shared) ================= -->
    <div
      class="offcanvas offcanvas-end"
      tabindex="-1"
      role="dialog"
      id="notifications-offcanvas"
      aria-labelledby="notifications-offcanvas-label"
    >
      <div class="offcanvas-header">
        <div>
          <h2 class="offcanvas-title h5 mb-0" id="notifications-offcanvas-label">
            Notifications
          </h2>
          <p class="small text-muted mb-0">Admin inbox</p>
        </div>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"
          aria-label="Close notifications"
        ></button>
      </div>
      <div class="offcanvas-body p-0">
        <div
          class="d-flex align-items-center justify-content-between gap-2 border-bottom px-3 py-2"
        >
          <span class="small text-muted">Notifications</span>
          <span class="badge text-bg-light border" id="notifications-count-badge"
            >3 unread</span
          >
        </div>

        <div class="notification-item unread">
          <span class="notification-icon activity-icon-warning" aria-hidden="true">
            <i class="fa-solid fa-clipboard-check"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">Machine M-1014 is awaiting approval</p>
            <span class="notification-time">Today, 09:30 AM</span>
          </div>
        </div>

        <div class="notification-item unread">
          <span class="notification-icon activity-icon-success" aria-hidden="true">
            <i class="fa-solid fa-circle-check"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">Booking CS-10027 was confirmed</p>
            <span class="notification-time">Today, 08:20 AM</span>
          </div>
        </div>

        <div class="notification-item unread">
          <span class="notification-icon activity-icon-info" aria-hidden="true">
            <i class="fa-solid fa-credit-card"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">Payment TXN-88219445 succeeded</p>
            <span class="notification-time">Yesterday, 06:10 PM</span>
          </div>
        </div>

        <div class="notification-item">
          <span class="notification-icon activity-icon-primary" aria-hidden="true">
            <i class="fa-solid fa-user-plus"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">New buyer registration</p>
            <span class="notification-time">Yesterday, 02:45 PM</span>
          </div>
        </div>
      </div>
      <div class="border-top p-3">
        <button
          class="btn-im btn-im-outline w-100"
          type="button"
          id="btn-mark-notifications-read"
          aria-label="Mark all notifications as read"
        >
          <i class="fa-solid fa-envelope-open-text" aria-hidden="true"></i>
          Mark all as read
        </button>
        <p class="small text-muted mt-2 mb-0">
          Notifications are not stored or sent.
        </p>
      </div>
    </div>

    @stack('modals')

    <!-- Preview-only toast -->
    <div
      class="preview-toast"
      id="preview-toast"
      role="status"
      aria-live="polite"
      hidden
    >
      <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
      <div class="preview-toast-message" id="preview-toast-message"></div>
      <button
        class="preview-toast-close"
        type="button"
        aria-label="Dismiss preview notice"
      >
        &times;
      </button>
    </div>

    <script
      src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"
      defer
    ></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ asset('js/panels.js') }}" defer></script>

    @stack('scripts')
  </body>
</html>
