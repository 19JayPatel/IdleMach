@extends('layouts.buyer')

@section('title', 'My Reviews — IdleMach Buyer')

@section('meta_description', 'Buyer reviews with machine image and name, owner, star rating, review message, review date, status, and view and edit review interfaces. Frontend prototype only.')

@section('page_title', 'My Reviews')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Feedback</p>
              <h1 class="dashboard-title">My Reviews</h1>
              <p class="dashboard-subtitle">
                Feedback you have submitted for completed bookings, and the
                completed bookings that are still awaiting a review.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('buyer.completed-bookings') }}">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Completed bookings
              </a>
            </div>
          </div>

          <section class="dashboard-overview" aria-labelledby="review-summary-heading">
            <div class="dashboard-overview-head">
              <h2 class="dashboard-overview-title" id="review-summary-heading">
                Review summary
              </h2>
            </div>
            <div class="dashboard-stats-grid">
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Reviews Submitted</p>
                  <span class="stat-card-icon stat-icon-bookings">
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-submitted-reviews">1</p>
                <p class="stat-card-meta">Completed booking BR-3106</p>
              </div>
              <div class="stat-card stat-card-alert">
                <div class="stat-card-head">
                  <p class="stat-card-label">Awaiting Review</p>
                  <span class="stat-card-icon stat-icon-approvals">
                    <i class="fa-regular fa-star" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-awaiting-reviews">1</p>
                <p class="stat-card-meta">Completed booking BR-3107</p>
              </div>
              <div class="stat-card">
                <div class="stat-card-head">
                  <p class="stat-card-label">Your Rating</p>
                  <span class="stat-card-icon stat-icon-payments">
                    <i class="fa-solid fa-star-half-stroke" aria-hidden="true"></i>
                  </span>
                </div>
                <p class="stat-card-value" id="stat-buyer-review-rating">5.0<span>/5</span></p>
                <p class="stat-card-meta">Based on submitted reviews</p>
              </div>
            </div>
          </section>

          <section
            class="dashboard-card"
            id="reviews"
            aria-labelledby="reviews-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="reviews-heading">
                <i class="fa-solid fa-star" aria-hidden="true"></i>
                My reviews
              </h2>
              <div class="dashboard-card-actions">
                <span class="text-muted small" id="buyer-review-summary"
                  >1 submitted &middot; 1 awaiting</span
                >
              </div>
            </div>
            <div class="dashboard-card-body">
              <div class="row g-3 g-lg-4">
                <div class="col-lg-8">
                  <article class="review-card" id="buyer-submitted-review">
                    <div class="review-header">
                      <div class="d-flex align-items-center gap-3">
                        <img
                          class="machine-thumb"
                          src="{{ asset('assets/images/machine-fabrication.svg') }}"
                          alt="Illustration of a hydraulic press brake bending sheet metal."
                          width="48"
                          height="48"
                          loading="lazy"
                        />
                        <div>
                          <h3 class="review-buyer-name">
                            Sample Fabrication Co.
                          </h3>
                          <p class="table-cell-subtext mb-0">
                            Hydraulic Press Brake &middot; Booking BR-3106
                          </p>
                        </div>
                      </div>
                      <span
                        class="review-stars"
                        id="buyer-review-card-stars"
                        role="img"
                        aria-label="Rated 5 out of 5"
                      >
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <span class="visually-hidden">5 out of 5</span>
                      </span>
                    </div>
                    <p class="review-comment" id="buyer-review-card-comment">
                      &ldquo;The bends matched the drawing and the batch was ready
                      on the agreed date. Communication was clear throughout the
                      job.&rdquo;
                    </p>
                    <p class="review-meta mb-0">
                      <span class="status-badge status-successful">
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        Submitted &middot;
                        <span id="buyer-review-card-score">5.0</span>/5
                      </span>
                      <span class="status-badge status-completed">
                        <i
                          class="fa-solid fa-circle-check"
                          aria-hidden="true"
                        ></i>
                        Completed booking
                      </span>
                      <span>03 Nov 2026</span>
                    </p>
                    <div class="table-actions mt-3">
                      <button
                        class="btn-im btn-im-outline btn-im-sm"
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#buyer-review-view-modal"
                      >
                        <i class="fa-solid fa-eye" aria-hidden="true"></i>
                        View review
                      </button>
                      <button
                        class="btn-im btn-im-outline btn-im-sm"
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#buyer-review-edit-modal"
                      >
                        <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                        Edit review
                      </button>
                    </div>
                  </article>

                  <article
                    class="review-card mb-0"
                    data-buyer-booking
                    data-booking-id="BR-3107"
                    data-machine-id="1"
                    data-date="27 Oct 2026"
                    data-hours="4"
                    data-amount="3200"
                    data-status="completed"
                    data-payment="successful"
                    data-review="eligible"
                    data-buyer-completed="BR-3107"
                  >
                    <div class="review-header">
                      <div class="d-flex align-items-center gap-3">
                        <img
                          class="machine-thumb"
                          src="{{ asset('assets/images/machine-turning.svg') }}"
                          alt="Illustration of a CNC turning machine."
                          width="48"
                          height="48"
                          loading="lazy"
                        />
                        <div>
                          <h3 class="review-buyer-name">Patel Engineering</h3>
                          <p class="table-cell-subtext mb-0">
                            Haas CNC Turning Machine ST-20 &middot; Booking BR-3107
                          </p>
                        </div>
                      </div>
                      <span
                        class="status-badge status-pending"
                        data-review-status="BR-3107"
                      >
                        <i class="fa-regular fa-star" aria-hidden="true"></i>
                        Awaiting review
                      </span>
                    </div>
                    <p class="review-comment mb-3">
                      This completed booking has not been reviewed yet. Reviews
                      are available only for completed bookings.
                    </p>
                    <div class="d-flex flex-wrap align-items-center gap-2">
                      <span class="status-badge status-completed">
                        <i
                          class="fa-solid fa-circle-check"
                          aria-hidden="true"
                        ></i>
                        Completed 27 Oct 2026
                      </span>
                      <button
                        class="btn-im btn-im-primary btn-im-sm"
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#buyer-review-modal"
                        data-review-action="BR-3107"
                        data-review-open="BR-3107"
                      >
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        Review now
                      </button>
                    </div>
                  </article>
                </div>

                <div class="col-lg-4">
                  <div class="review-summary buyer-review-summary">
                    <div>
                      <p class="stat-card-label mb-1">Your rating</p>
                      <p class="review-summary-value mb-1">
                        <span id="buyer-review-average-value">5.0</span
                        ><span>/5</span>
                      </p>
                      <span
                        class="review-stars d-block"
                        role="img"
                        aria-label="Submitted rating 5 out of 5"
                      >
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                      </span>
                    </div>
                    <p
                      class="table-cell-subtext mb-0"
                      id="buyer-review-score-note"
                    >
                      Based on the one review shown for completed booking
                      BR-3106.
                    </p>
                    <div class="buyer-review-queue">
                      <span
                        class="status-badge status-pending"
                        id="buyer-review-queue-status"
                      >
                        <i class="fa-regular fa-star" aria-hidden="true"></i>
                        1 awaiting review
                      </span>
                      <p class="small text-muted mt-2 mb-2">
                        Review access is limited to completed bookings. BR-3107
                        is the only eligible booking.
                      </p>
                      <button
                        class="btn-im btn-im-primary btn-im-sm"
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#buyer-review-modal"
                        data-review-open="BR-3107"
                        data-review-summary-cta
                      >
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        Review BR-3107
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Review edits are preview-only. Nothing is saved, sent, or
                deleted.</span
              >
            </div>
          </section>

@push('modals')
    <!-- ================= View review modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="buyer-review-view-modal"
      tabindex="-1"
      aria-labelledby="buyer-review-view-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">Submitted review</p>
              <h2 class="modal-title h5 mb-0" id="buyer-review-view-label">
                Hydraulic Press Brake
              </h2>
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close review details"
            ></button>
          </div>
          <div class="modal-body">
            <dl class="buyer-detail-list mb-3">
              <div>
                <dt>Machine owner</dt>
                <dd>Sample Fabrication Co. &middot; Pune</dd>
              </div>
              <div>
                <dt>Booking</dt>
                <dd>BR-3106</dd>
              </div>
              <div>
                <dt>Rating</dt>
                <dd>
                  <span id="buyer-view-review-score">5.0</span> out of 5
                </dd>
              </div>
              <div>
                <dt>Review date</dt>
                <dd>03 Nov 2026</dd>
              </div>
              <div>
                <dt>Status</dt>
                <dd>Submitted</dd>
              </div>
            </dl>
            <p class="review-comment mb-0" id="buyer-view-review-comment">
              &ldquo;The bends matched the drawing and the batch was ready on the
              agreed date. Communication was clear throughout the job.&rdquo;
            </p>
          </div>
          <div class="modal-footer">
            <p class="small text-muted mb-0 me-auto">
              Review records are not changed by this preview.
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

    <!-- ================= Edit review modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="buyer-review-edit-modal"
      tabindex="-1"
      aria-labelledby="buyer-review-edit-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">Submitted review</p>
              <h2 class="modal-title h5 mb-0" id="buyer-review-edit-label">
                Edit review for BR-3106
              </h2>
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close edit review form"
            ></button>
          </div>
          <div class="modal-body">
            <form id="buyer-review-edit-form">
              <div class="mb-3">
                <label class="form-label" for="buyer-edit-review-rating"
                  >Star rating</label
                >
                <select class="form-select" id="buyer-edit-review-rating">
                  <option value="5" selected>5 stars</option>
                  <option value="4">4 stars</option>
                  <option value="3">3 stars</option>
                  <option value="2">2 stars</option>
                  <option value="1">1 star</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="buyer-edit-review-comment"
                  >Review message</label
                >
                <textarea
                  class="form-control"
                  id="buyer-edit-review-comment"
                  rows="4"
                  maxlength="500"
                  required
                >The bends matched the drawing and the batch was ready on the agreed date. Communication was clear throughout the job.</textarea
                >
                <p class="form-text">
                  Maximum 500 characters. Changes are not stored or sent.
                </p>
              </div>
              <div
                class="im-alert im-alert-success mb-0"
                id="buyer-edit-review-feedback"
                role="status"
                hidden
              >
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <div>
                  Review updated locally for this preview. No review record was
                  changed.
                </div>
              </div>
              <div class="d-flex flex-wrap align-items-center gap-2 mt-3">
                <button class="btn-im btn-im-primary" type="submit">
                  <i class="fa-solid fa-floppy-disk" aria-hidden="true"></i>
                  Save review
                </button>
                <button
                  type="button"
                  class="btn-im btn-im-outline"
                  data-bs-dismiss="modal"
                >
                  Cancel
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endpush

@push('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var editForm = document.getElementById("buyer-review-edit-form");
        var ratingField = document.getElementById("buyer-edit-review-rating");
        var commentField = document.getElementById("buyer-edit-review-comment");
        var feedback = document.getElementById("buyer-edit-review-feedback");
        if (!editForm || !ratingField || !commentField) {
          return;
        }

        var applyReviewEdit = function () {
          var rating = Number(ratingField.value);
          var comment = commentField.value.trim();
          var quoted = "\u201c" + comment + "\u201d";

          var cardComment = document.getElementById(
            "buyer-review-card-comment"
          );
          if (cardComment) {
            cardComment.textContent = quoted;
          }
          var viewComment = document.getElementById(
            "buyer-view-review-comment"
          );
          if (viewComment) {
            viewComment.textContent = quoted;
          }

          var stars = document.getElementById("buyer-review-card-stars");
          if (stars && rating >= 1 && rating <= 5) {
            var starMarkup = "";
            for (var index = 1; index <= 5; index += 1) {
              starMarkup +=
                '<i class="fa-' +
                (index <= rating ? "solid" : "regular") +
                ' fa-star" aria-hidden="true"></i>';
            }
            starMarkup +=
              '<span class="visually-hidden">' +
              rating +
              " out of 5</span>";
            stars.innerHTML = starMarkup;
            stars.setAttribute("aria-label", "Rated " + rating + " out of 5");
          }

          var score = document.getElementById("buyer-review-card-score");
          if (score) {
            score.textContent = rating.toFixed(1);
          }
          var viewScore = document.getElementById("buyer-view-review-score");
          if (viewScore) {
            viewScore.textContent = rating.toFixed(1);
          }
          var average = document.getElementById("buyer-review-average-value");
          if (average) {
            average.textContent = rating.toFixed(1);
          }

          if (feedback) {
            feedback.hidden = false;
          }
        };

        editForm.addEventListener("submit", function (event) {
          event.preventDefault();
        });
        editForm.addEventListener(window.IdleMachFormValidation.VALID_EVENT, applyReviewEdit);
        editForm.addEventListener(window.IdleMachFormValidation.INVALID_EVENT, function () {
          if (feedback) {
            feedback.hidden = true;
          }
        });
      });
    </script>
@endpush
@endsection
