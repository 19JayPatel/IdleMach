@extends('layouts.owner')

@section('title', 'Notifications — IdleMach Owner')

@section('meta_description', 'IdleMach owner notification inbox with booking, payment, approval, and work update notifications, including read and unread states. Frontend prototype only.')

@section('page_title', 'Notifications')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Other</p>
              <h1 class="dashboard-title">Notifications</h1>
              <p class="dashboard-subtitle">
                Booking requests, payment reminders, approval updates, and work
                progress messages for your owner account.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <button
                class="btn-im btn-im-primary"
                type="button"
                id="owner-notifications-mark-read"
              >
                <i class="fa-solid fa-envelope-open-text" aria-hidden="true"></i>
                Mark all as read
              </button>
            </div>
          </div>

          <section class="dashboard-overview" aria-labelledby="notification-summary-heading">
            <div class="dashboard-overview-head">
              <h2
                class="dashboard-overview-title"
                id="notification-summary-heading"
              >
                Notification summary
              </h2>
            </div>
            <div class="dashboard-stats-grid">
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Total Notifications</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-regular fa-bell" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="owner-notif-total">4</p>
                <p class="stat-card-meta">Owner inbox</p>
              </div>
              <div class="stat-card stat-card-alert">
                <div class="stat-card-head">
                  <p class="stat-card-label">Unread</p>
                  <span class="stat-card-icon stat-icon-approvals">
                    <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="owner-notif-unread">3</p>
                <p class="stat-card-meta">Awaiting your attention</p>
              </div>
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Read</p>
                  <span class="stat-card-icon stat-icon-machines">
                    <i class="fa-solid fa-envelope-open" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="owner-notif-read">1</p>
                <p class="stat-card-meta">Already reviewed</p>
              </div>
            </div>
          </section>

          <section class="dashboard-card" aria-labelledby="notifications-list-heading">
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="notifications-list-heading">
                <i class="fa-regular fa-bell" aria-hidden="true"></i>
                All notifications
              </h2>
              <span class="text-muted small">Newest first</span>
            </div>
            <div class="dashboard-card-body p-0">
              <div class="notification-item unread" data-owner-notification>
                <span
                  class="notification-icon activity-icon-info"
                  aria-hidden="true"
                >
                  <i class="fa-solid fa-inbox"></i>
                </span>
                <div class="notification-body">
                  <div class="d-flex flex-wrap justify-content-between gap-2">
                    <p class="notification-title">
                      New booking request BR-2043 from Delta Gears &amp; Shafts
                    </p>
                    <span class="badge text-bg-light border owner-notif-status"
                      >Unread</span
                    >
                  </div>
                  <p class="small mb-1">
                    Keyway slotting and bolt pattern face milling requested for
                    Haas VF-2 CNC Vertical Milling (M-1003) on 30 Oct 2026,
                    02:00 PM &ndash; 06:00 PM.
                  </p>
                  <p class="notification-time mb-0">
                    Today, 10:15 AM &middot;
                    <span class="badge bg-light text-dark border"
                      >Booking request</span
                    >
                  </p>
                </div>
              </div>

              <div class="notification-item unread" data-owner-notification>
                <span
                  class="notification-icon activity-icon-warning"
                  aria-hidden="true"
                >
                  <i class="fa-regular fa-clock"></i>
                </span>
                <div class="notification-body">
                  <div class="d-flex flex-wrap justify-content-between gap-2">
                    <p class="notification-title">
                      BR-2041 is awaiting buyer payment
                    </p>
                    <span class="badge text-bg-light border owner-notif-status"
                      >Unread</span
                    >
                  </div>
                  <p class="small mb-1">
                    Apex Auto Components must complete the &#8377;6,400 payment
                    before booking confirmation. The booking is not confirmed
                    yet.
                  </p>
                  <p class="notification-time mb-0">
                    Today, 09:40 AM &middot;
                    <span class="badge bg-light text-dark border">Payment</span>
                  </p>
                </div>
              </div>

              <div class="notification-item unread" data-owner-notification>
                <span
                  class="notification-icon activity-icon-warning"
                  aria-hidden="true"
                >
                  <i class="fa-solid fa-clipboard-check"></i>
                </span>
                <div class="notification-body">
                  <div class="d-flex flex-wrap justify-content-between gap-2">
                    <p class="notification-title">
                      Machine M-1005 is awaiting admin approval
                    </p>
                    <span class="badge text-bg-light border owner-notif-status"
                      >Unread</span
                    >
                  </div>
                  <p class="small mb-1">
                    Jyoti CNC Turning Center DX-200 remains in
                    <code>pending</code> status. Only approved machines appear in
                    the marketplace.
                  </p>
                  <p class="notification-time mb-0">
                    Yesterday, 04:20 PM &middot;
                    <span class="badge bg-light text-dark border">Approval</span>
                  </p>
                </div>
              </div>

              <div class="notification-item" data-owner-notification>
                <span
                  class="notification-icon activity-icon-success"
                  aria-hidden="true"
                >
                  <i class="fa-solid fa-screwdriver-wrench"></i>
                </span>
                <div class="notification-body">
                  <div class="d-flex flex-wrap justify-content-between gap-2">
                    <p class="notification-title">
                      Booking CS-10026 moved to in progress
                    </p>
                    <span class="badge text-bg-light border owner-notif-status"
                      >Read</span
                    >
                  </div>
                  <p class="small mb-1">
                    Metro Engineering Works booking for ACE Micromatic VMC 850V
                    (M-1002) is in progress at 60% completion.
                  </p>
                  <p class="notification-time mb-0">
                    Today, 08:05 AM &middot;
                    <span class="badge bg-light text-dark border"
                      >Work update</span
                    >
                  </p>
                </div>
              </div>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Notifications are sample content. They are not stored, sent, or
                connected to real notification delivery.</span
              >
            </div>
          </section>

@push('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var button = document.getElementById("owner-notifications-mark-read");
        if (!button) {
          return;
        }
        button.addEventListener("click", function () {
          var items = document.querySelectorAll("[data-owner-notification]");
          var unread = 0;
          Array.prototype.forEach.call(items, function (item) {
            item.classList.remove("unread");
            var badge = item.querySelector(".owner-notif-status");
            if (badge) {
              badge.textContent = "Read";
            }
          });
          Array.prototype.forEach.call(items, function (item) {
            if (item.classList.contains("unread")) {
              unread += 1;
            }
          });

          var unreadStat = document.getElementById("owner-notif-unread");
          var readStat = document.getElementById("owner-notif-read");
          if (unreadStat) {
            unreadStat.textContent = unread;
          }
          if (readStat) {
            readStat.textContent = items.length - unread;
          }

          var offcanvasBadge = document.getElementById("notifications-count-badge");
          if (offcanvasBadge) {
            offcanvasBadge.textContent = "0 unread";
          }
          var dot = document.querySelector(".topbar-badge-dot");
          if (dot) {
            dot.style.display = "none";
          }
          button.disabled = true;
        });
      });
    </script>
@endpush
@endsection
