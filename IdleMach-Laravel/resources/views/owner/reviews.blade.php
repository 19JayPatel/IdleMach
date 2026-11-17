@extends('layouts.owner')

@section('title', 'Reviews - IdleMach Owner')

@section('meta_description', 'Buyer reviews and ratings for completed owner bookings, with average rating summary.')

@section('page_title', 'Reviews')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Other</p>
              <h1 class="dashboard-title">Reviews</h1>
              <p class="dashboard-subtitle">
                Buyer feedback and star ratings for completed bookings, with an
                average rating summary.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a
                class="btn-im btn-im-outline"
                href="{{ route('owner.completed-work') }}"
              >
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Completed work
              </a>
            </div>
          </div>

          <!-- Reviews -->
          <section
            class="dashboard-card"
            id="reviews"
            aria-labelledby="reviews-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="reviews-heading">
                <i class="fa-solid fa-star" aria-hidden="true"></i>
                Reviews received
              </h2>
              <div class="dashboard-card-actions">
                <span class="text-muted small">3 reviews</span>
              </div>
            </div>
            <div class="dashboard-card-body">
              <div class="row g-4">
                <div class="col-lg-8">
                  <article class="review-card">
                    <div class="review-header">
                      <div>
                        <h3 class="review-buyer-name">Delta Gears &amp; Shafts</h3>
                        <p class="table-cell-subtext mb-0">
                          ACE Micromatic VMC 850V &middot; Booking CS-10024
                        </p>
                      </div>
                      <span
                        class="review-stars"
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
                    <p class="review-comment">
                      &ldquo;Manifold blocks met the drawing tolerances and the
                      surface finish was consistent. Communication during the run
                      was clear.&rdquo;
                    </p>
                    <p class="review-meta mb-0">
                      <span class="status-badge status-completed">
                        <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                        Completed booking
                      </span>
                      <span>21 Oct 2026</span>
                    </p>
                  </article>

                  <article class="review-card">
                    <div class="review-header">
                      <div>
                        <h3 class="review-buyer-name">
                          Shree Shakti Engineering
                        </h3>
                        <p class="table-cell-subtext mb-0">
                          Haas CNC Turning Machine ST-20 &middot; Booking
                          CS-10022
                        </p>
                      </div>
                      <span
                        class="review-stars"
                        role="img"
                        aria-label="Rated 4 out of 5"
                      >
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-solid fa-star" aria-hidden="true"></i>
                        <i class="fa-regular fa-star" aria-hidden="true"></i>
                        <span class="visually-hidden">4 out of 5</span>
                      </span>
                    </div>
                    <p class="review-comment">
                      &ldquo;Turning quality was good and the batch was ready on
                      schedule. Packaging could be improved for longer transit,
                      but the machined parts were accurate.&rdquo;
                    </p>
                    <p class="review-meta mb-0">
                      <span class="status-badge status-completed">
                        <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                        Completed booking
                      </span>
                      <span>19 Oct 2026</span>
                    </p>
                  </article>

                  <article class="review-card mb-0">
                    <div class="review-header">
                      <div>
                        <h3 class="review-buyer-name">Apex Auto Components</h3>
                        <p class="table-cell-subtext mb-0">
                          Haas VF-2 CNC Vertical Milling &middot; Booking
                          CS-10018
                        </p>
                      </div>
                      <span
                        class="review-stars"
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
                    <p class="review-comment">
                      &ldquo;Keyway slots and bolt patterns were completed to
                      specification. The owner shared a clear completion update
                      before handover.&rdquo;
                    </p>
                    <p class="review-meta mb-0">
                      <span class="status-badge status-completed">
                        <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                        Completed booking
                      </span>
                      <span>14 Oct 2026</span>
                    </p>
                  </article>
                </div>

                <div class="col-lg-4">
                  <div class="review-summary">
                    <p class="stat-card-label mb-1">Average rating</p>
                    <p class="review-summary-value mb-1">
                      4.7<span>/5</span>
                    </p>
                    <span
                      class="review-stars d-block mb-2"
                      role="img"
                      aria-label="Average rating 4.7 out of 5"
                    >
                      <i class="fa-solid fa-star" aria-hidden="true"></i>
                      <i class="fa-solid fa-star" aria-hidden="true"></i>
                      <i class="fa-solid fa-star" aria-hidden="true"></i>
                      <i class="fa-solid fa-star" aria-hidden="true"></i>
                      <i class="fa-solid fa-star-half-stroke" aria-hidden="true"></i>
                    </span>
                    <p class="table-cell-subtext mb-3">
                      Based on the three reviews shown for completed bookings
                      CS-10024, CS-10022, and CS-10018.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Reviews are associated only with completed bookings.
                Incomplete, rejected, cancelled, or unpaid bookings are not
                review-eligible.</span
              >
            </div>
          </section>
@endsection
