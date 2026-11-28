    <!-- ================= Booking details modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="buyer-booking-details-modal"
      tabindex="-1"
      aria-labelledby="buyer-booking-details-label"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
      >
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">Booking details</p>
              <h2 class="modal-title h5 mb-0" id="buyer-booking-details-label">
                Booking record
              </h2>
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close booking details"
            ></button>
          </div>
          <div class="modal-body">
            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
              <span class="text-muted small"
                >Changes are not saved or sent.</span
              >
            </div>

            <dl class="buyer-detail-list">
              <div>
                <dt>Booking ID</dt>
                <dd id="buyer-detail-id">BR-3101</dd>
              </div>
              <div>
                <dt>Machine</dt>
                <dd id="buyer-detail-machine">Haas CNC Turning Machine ST-20</dd>
              </div>
              <div>
                <dt>Owner / company</dt>
                <dd id="buyer-detail-owner">
                  Patel Engineering &middot; Rajkot
                </dd>
              </div>
              <div>
                <dt>Requested date</dt>
                <dd id="buyer-detail-date">18 Nov 2026</dd>
              </div>
              <div>
                <dt>Requested hours</dt>
                <dd id="buyer-detail-hours">4 hours</dd>
              </div>
              <div>
                <dt>Estimated amount</dt>
                <dd id="buyer-detail-amount">&#8377;3,200</dd>
              </div>
              <div>
                <dt>Booking status</dt>
                <dd id="buyer-detail-status">pending</dd>
              </div>
              <div>
                <dt>Payment status</dt>
                <dd id="buyer-detail-payment">No payment record</dd>
              </div>
            </dl>

            <div class="dashboard-demo-banner mb-0" role="note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>
                <strong>Next step.</strong>
                <span id="buyer-detail-next-step"
                  >Await the machine owner&rsquo;s decision. Payment is not due
                  before acceptance.</span
                >
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <p class="small text-muted mb-0 me-auto">
              No booking, payment, or status record is changed.
            </p>
            <button
              type="button"
              class="btn-im btn-im-outline"
              data-bs-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= Buyer review modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="buyer-review-modal"
      tabindex="-1"
      aria-labelledby="buyer-review-modal-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">Completed booking</p>
              <h2 class="modal-title h5 mb-0" id="buyer-review-modal-label">
                Review completed booking BR-3107
              </h2>
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close review form"
            ></button>
          </div>
          <div class="modal-body">
            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
              <span class="text-muted small"
                >Haas CNC Turning Machine ST-20 &middot; Patel Engineering &middot;
                completed 27 Oct 2026</span
              >
            </div>

            <form
              class="buyer-review-form"
              id="review-form"
              data-review-booking="BR-3107"
            >
              <fieldset class="mb-3">
                <legend class="form-label">Your rating</legend>
                <div class="buyer-rating-options">
                  <label for="buyer-rating-1">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="buyer-rating"
                      id="buyer-rating-1"
                      value="1"
                      required
                    />
                    1
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                    <span class="visually-hidden">star</span>
                  </label>
                  <label for="buyer-rating-2">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="buyer-rating"
                      id="buyer-rating-2"
                      value="2"
                    />
                    2
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                    <span class="visually-hidden">stars</span>
                  </label>
                  <label for="buyer-rating-3">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="buyer-rating"
                      id="buyer-rating-3"
                      value="3"
                    />
                    3
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                    <span class="visually-hidden">stars</span>
                  </label>
                  <label for="buyer-rating-4">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="buyer-rating"
                      id="buyer-rating-4"
                      value="4"
                    />
                    4
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                    <span class="visually-hidden">stars</span>
                  </label>
                  <label for="buyer-rating-5">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="buyer-rating"
                      id="buyer-rating-5"
                      value="5"
                    />
                    5
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                    <span class="visually-hidden">stars</span>
                  </label>
                </div>
              </fieldset>

              <div class="mb-3">
                <label class="form-label" for="buyer-review-comment"
                  >Your review</label
                >
                <textarea
                  class="form-control"
                  id="buyer-review-comment"
                  name="comment"
                  rows="3"
                  maxlength="500"
                  required
                  placeholder="Describe the machine quality, work quality, and timeliness."
                ></textarea>
                <p class="form-text">
                  Maximum 500 characters. The comment is not stored or sent.
                </p>
              </div>

              <p
                class="buyer-review-feedback"
                id="buyer-review-feedback"
                role="status"
                aria-live="polite"
                hidden
              ></p>

              <div class="d-flex flex-wrap align-items-center gap-2">
                <button class="btn-im btn-im-primary" type="submit">
                  <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
                  Submit review
                </button>
                <button
                  type="button"
                  class="btn-im btn-im-outline"
                  data-bs-dismiss="modal"
                >
                  Cancel
                </button>
              </div>
              <p class="small text-muted mt-2 mb-0">
                Review storage, editing, removal, and dispute rules are not
                configured. No backend is connected.
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Real logout endpoint used by the confirmation modal. -->
    <form id="buyer-logout-form" method="POST" action="{{ route('logout') }}" class="d-none">
      @csrf
    </form>

    <!-- ================= Buyer logout modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="buyer-logout-modal"
      tabindex="-1"
      aria-labelledby="buyer-logout-modal-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title h5" id="buyer-logout-modal-label">
              Sign out of the buyer dashboard?
            </h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close sign-out confirmation"
            ></button>
          </div>
          <div class="modal-body">
            <p>
              No authentication or session is active. Signing out returns to
              the login interface.
            </p>
            <div class="dashboard-demo-banner mb-0" role="note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>
                No credentials are stored. No server session is created or
                destroyed.
              </div>
            </div>
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
              type="submit"
              form="buyer-logout-form"
              class="btn-im btn-im-danger"
              id="buyer-logout-confirm"
            >
              <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
              Sign out
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= Notifications offcanvas ================= -->
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
          <p class="small text-muted mb-0">Buyer inbox</p>
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
          <span
            class="notification-icon activity-icon-warning"
            aria-hidden="true"
          >
            <i class="fa-regular fa-clock"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">
              BR-3103 is awaiting payment after owner acceptance
            </p>
            <span class="notification-time">Today, 11:20 AM</span>
          </div>
        </div>

        <div class="notification-item unread">
          <span
            class="notification-icon activity-icon-info"
            aria-hidden="true"
          >
            <i class="fa-solid fa-calendar-check"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">
              Booking BR-3102 was accepted by the machine owner
            </p>
            <span class="notification-time">Yesterday, 04:10 PM</span>
          </div>
        </div>

        <div class="notification-item unread">
          <span
            class="notification-icon activity-icon-success"
            aria-hidden="true"
          >
            <i class="fa-solid fa-star"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">
              BR-3107 is completed and awaiting your review
            </p>
            <span class="notification-time">Yesterday, 09:35 AM</span>
          </div>
        </div>

        <div class="notification-item">
          <span
            class="notification-icon activity-icon-success"
            aria-hidden="true"
          >
            <i class="fa-solid fa-circle-check"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">
              Payment for BR-3105 was successful; work is in progress
            </p>
            <span class="notification-time">06 Nov 2026, 12:05 PM</span>
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
