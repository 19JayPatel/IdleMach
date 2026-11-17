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

    @stack('scripts')
  </body>
</html>
