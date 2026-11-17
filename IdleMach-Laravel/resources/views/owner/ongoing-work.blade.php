@extends('layouts.owner')

@section('title', 'Ongoing Work - IdleMach Owner')

@section('meta_description', 'Currently active owner bookings with progress, payment, status, and existing update/complete controls.')

@section('page_title', 'Ongoing Work')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Bookings</p>
              <h1 class="dashboard-title">Ongoing Work</h1>
              <p class="dashboard-subtitle">
                Active bookings currently being machined, including progress,
                schedules, payment status, and completion controls.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a
                class="btn-im btn-im-outline"
                href="{{ route('owner.accepted-bookings') }}"
              >
                <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                Accepted bookings
              </a>
            </div>
          </div>

          <!-- Ongoing work -->
          <section
            class="dashboard-card"
            id="ongoing-work"
            aria-labelledby="ongoing-work-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="ongoing-work-heading">
                <i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i>
                Ongoing work
              </h2>
              <div class="dashboard-card-actions">
                <span class="text-muted small">1 in progress</span>
              </div>
            </div>
            <div class="dashboard-card-body dashboard-card-body-flush">
              <span class="table-scroll-hint" hidden>
                <i class="fa-solid fa-arrows-left-right" aria-hidden="true"></i>
                Scroll the table sideways to see all columns.
              </span>
              <div
                class="table-responsive"
                tabindex="0"
                role="region"
                aria-label="Ongoing work table"
              >
                <table class="im-table table-ongoing" id="ongoing-work-table">
                  <caption class="visually-hidden">
                    One paid booking currently in progress.
                  </caption>
                  <thead>
                    <tr>
                      <th scope="col">Booking</th>
                      <th scope="col">Buyer / company</th>
                      <th scope="col">Machine</th>
                      <th scope="col">Schedule</th>
                      <th scope="col">Progress</th>
                      <th scope="col">Payment</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr data-ongoing-booking-id="CS-10026">
                      <td>
                        <p class="table-cell-title mb-0">CS-10026</p>
                        <span class="table-cell-id">Started 27 Sep 2026, 08:00 AM</span>
                      </td>
                      <td>
                        Metro Engineering Works
                        <span class="d-block table-cell-subtext"
                          >Sunil Rao</span
                        >
                      </td>
                      <td>
                        ACE Micromatic VMC 850V
                        <span class="d-block table-cell-subtext">M-1002</span>
                      </td>
                      <td>
                        27 Sep 2026
                        <span class="d-block table-cell-subtext"
                          >08:00 AM &ndash; 12:00 AM &middot; 16 hours</span
                        >
                      </td>
                      <td>
                        <div class="work-progress">
                          <div
                            class="progress work-progress-bar"
                            role="progressbar"
                            aria-label="Work progress"
                            aria-valuenow="60"
                            aria-valuemin="0"
                            aria-valuemax="100"
                          >
                            <div
                              class="progress-bar"
                              style="width: 60%"
                            ></div>
                          </div>
                          <span class="table-cell-subtext">60% complete</span>
                        </div>
                      </td>
                      <td>
                        <span class="status-badge status-successful">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Successful
                        </span>
                      </td>
                      <td class="booking-status-cell">
                        <span class="status-badge status-in-progress">
                          <i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i>
                          In Progress
                        </span>
                      </td>
                      <td class="booking-actions-cell">
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-view-booking"
                            data-booking-id="CS-10026"
                            data-booking-buyer="Metro Engineering Works (Sunil Rao)"
                            data-booking-machine="ACE Micromatic VMC 850V (M-1002)"
                            data-booking-date="27 Sep 2026, 08:00 AM â€“ 12:00 AM"
                            data-booking-hours="16 hours"
                            data-booking-rate="â‚¹1,200/hr"
                            data-booking-total="â‚¹19,200"
                            data-booking-payment="successful"
                            data-booking-status="in_progress"
                            data-booking-progress="60% complete"
                            data-booking-note="VMC milling of aluminium 6061-T6 die plates is in progress. The booking covers 20 sets."
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-update-progress"
                            data-booking-id="CS-10026"
                          >
                            <i class="fa-solid fa-list-check" aria-hidden="true"></i>
                            Update progress
                          </button>
                          <button
                            class="btn-im btn-im-primary btn-im-sm"
                            type="button"
                            data-action="owner-complete-work"
                            data-booking-id="CS-10026"
                            data-booking-machine="ACE Micromatic VMC 850V (M-1002)"
                            data-booking-buyer="Metro Engineering Works (Sunil Rao)"
                          >
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            Mark completed
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Only a paid, confirmed, or in-progress booking can receive
                progress updates or be marked completed. Completion also requires
                a separate confirmation that the physical work is finished.</span
              >
            </div>
          </section>
@endsection
