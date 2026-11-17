@extends('layouts.buyer')

@section('title', 'Notifications — IdleMach Buyer')

@section('meta_description', 'Buyer notification inbox with notification title, message, date and time, type, and read or unread status. Frontend prototype only.')

@section('page_title', 'Notifications')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Other</p>
              <h1 class="dashboard-title">Notifications</h1>
              <p class="dashboard-subtitle">
                Booking, payment, and review updates for your buyer account,
                with clear read and unread states.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <button
                class="btn-im btn-im-primary"
                type="button"
                id="buyer-notifications-mark-read"
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
                <p class="stat-card-value" id="buyer-notif-total">4</p>
                <p class="stat-card-meta">Buyer inbox</p>
              </div>
              <div class="stat-card stat-card-alert">
                <div class="stat-card-head">
                  <p class="stat-card-label">Unread</p>
                  <span class="stat-card-icon stat-icon-approvals">
                    <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="buyer-notif-unread">3</p>
                <p class="stat-card-meta">Awaiting your attention</p>
              </div>
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Read</p>
                  <span class="stat-card-icon stat-icon-machines">
                    <i class="fa-solid fa-envelope-open" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="buyer-notif-read">1</p>
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
              <div class="notification-item unread" data-buyer-notification>
                <span
                  class="notification-icon activity-icon-warning"
                  aria-hidden="true"
                >
                  <i class="fa-regular fa-clock"></i>
                </span>
                <div class="notification-body">
                  <div class="d-flex flex-wrap justify-content-between gap-2">
                    <p class="notification-title">
                      BR-3103 is awaiting payment after owner acceptance
                    </p>
                    <span class="badge text-bg-light border buyer-notif-status"
                      >Unread</span
                    >
                  </div>
                  <p class="small mb-1">
                    Vertical Machining Centre from Sample Precision Works. The
                    booking is not confirmed until the &#8377;6,900 payment
                    succeeds.
                  </p>
                  <p class="notification-time mb-0">
                    Today, 11:20 AM &middot;
                    <span class="badge bg-light text-dark border">Payment</span>
                  </p>
                </div>
              </div>

              <div class="notification-item unread" data-buyer-notification>
                <span
                  class="notification-icon activity-icon-info"
                  aria-hidden="true"
                >
                  <i class="fa-solid fa-calendar-check"></i>
                </span>
                <div class="notification-body">
                  <div class="d-flex flex-wrap justify-content-between gap-2">
                    <p class="notification-title">
                      Booking BR-3102 was accepted by the machine owner
                    </p>
                    <span class="badge text-bg-light border buyer-notif-status"
                      >Unread</span
                    >
                  </div>
                  <p class="small mb-1">
                    Hydraulic Press Brake from Sample Fabrication Co. is
                    accepted for 20 Nov 2026. Payment follows acceptance and is
                    not yet recorded.
                  </p>
                  <p class="notification-time mb-0">
                    Yesterday, 04:10 PM &middot;
                    <span class="badge bg-light text-dark border">Booking</span>
                  </p>
                </div>
              </div>

              <div class="notification-item unread" data-buyer-notification>
                <span
                  class="notification-icon activity-icon-success"
                  aria-hidden="true"
                >
                  <i class="fa-solid fa-star"></i>
                </span>
                <div class="notification-body">
                  <div class="d-flex flex-wrap justify-content-between gap-2">
                    <p class="notification-title">
                      BR-3107 is completed and awaiting your review
                    </p>
                    <span class="badge text-bg-light border buyer-notif-status"
                      >Unread</span
                    >
                  </div>
                  <p class="small mb-1">
                    Haas CNC Turning Machine ST-20 from Patel Engineering was
                    completed on 27 Oct 2026. Submit feedback from
                    <a href="{{ route('buyer.reviews') }}">My Reviews</a>.
                  </p>
                  <p class="notification-time mb-0">
                    Yesterday, 09:35 AM &middot;
                    <span class="badge bg-light text-dark border">Review</span>
                  </p>
                </div>
              </div>

              <div class="notification-item" data-buyer-notification>
                <span
                  class="notification-icon activity-icon-success"
                  aria-hidden="true"
                >
                  <i class="fa-solid fa-circle-check"></i>
                </span>
                <div class="notification-body">
                  <div class="d-flex flex-wrap justify-content-between gap-2">
                    <p class="notification-title">
                      Payment for BR-3105 was successful; work is in progress
                    </p>
                    <span class="badge text-bg-light border buyer-notif-status"
                      >Read</span
                    >
                  </div>
                  <p class="small mb-1">
                    &#8377;3,200 paid for the Haas CNC Turning Machine ST-20.
                    Patel Engineering has started the 4-hour job.
                  </p>
                  <p class="notification-time mb-0">
                    06 Nov 2026, 12:05 PM &middot;
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
        var button = document.getElementById("buyer-notifications-mark-read");
        if (!button) {
          return;
        }

        button.addEventListener("click", function () {
          var items = document.querySelectorAll("[data-buyer-notification]");
          Array.prototype.forEach.call(items, function (item) {
            item.classList.remove("unread");
            var badge = item.querySelector(".buyer-notif-status");
            if (badge) {
              badge.textContent = "Read";
            }
          });

          var unread = 0;
          Array.prototype.forEach.call(items, function (item) {
            if (item.classList.contains("unread")) {
              unread += 1;
            }
          });

          var unreadStat = document.getElementById("buyer-notif-unread");
          var readStat = document.getElementById("buyer-notif-read");
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
