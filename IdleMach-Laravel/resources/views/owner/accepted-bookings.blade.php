@extends('layouts.owner')

@section('title', 'Accepted Bookings - IdleMach Owner')

@section('meta_description', 'Confirmed owner bookings with buyer, machine, schedule, amount, payment, and status.')

@section('page_title', 'Accepted Bookings')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Bookings</p>
              <h1 class="dashboard-title">Accepted Bookings</h1>
              <p class="dashboard-subtitle">
                Confirmed bookings that are paid and waiting for work to start,
                with buyer, machine, schedule, and amount details.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a
                class="btn-im btn-im-outline"
                href="{{ route('owner.booking-requests') }}"
              >
                <i class="fa-solid fa-inbox" aria-hidden="true"></i>
                Booking requests
              </a>
            </div>
          </div>

          <!-- Accepted bookings -->
          <section
            class="dashboard-card"
            id="accepted-bookings"
            aria-labelledby="accepted-bookings-heading"
          >
            <div class="dashboard-card-header">
              <h2
                class="dashboard-card-title"
                id="accepted-bookings-heading"
              >
                <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                Accepted bookings
              </h2>
              <div class="dashboard-card-actions">
                <span class="text-muted small">1 confirmed &middot; awaiting work</span>
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
                aria-label="Accepted bookings table"
              >
                <table class="im-table table-bookings" id="accepted-bookings-table">
                  <caption class="visually-hidden">
                    One accepted and confirmed booking awaiting work.
                  </caption>
                  <thead>
                    <tr>
                      <th scope="col">Booking</th>
                      <th scope="col">Buyer / company</th>
                      <th scope="col">Machine</th>
                      <th scope="col">Schedule</th>
                      <th scope="col">Hours / amount</th>
                      <th scope="col">Payment</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">CS-10027</p>
                        <span class="table-cell-id">Confirmed 28 Sep 2026</span>
                      </td>
                      <td>
                        Siddhivinayak Fabricators
                        <span class="d-block table-cell-subtext"
                          >Amit Verma</span
                        >
                      </td>
                      <td>
                        Haas VF-2 CNC Vertical Milling
                        <span class="d-block table-cell-subtext">M-1003</span>
                      </td>
                      <td>
                        28 Sep 2026
                        <span class="d-block table-cell-subtext"
                          >10:00 AM &ndash; 04:00 PM</span
                        >
                      </td>
                      <td>
                        6 hours
                        <span class="d-block table-cell-subtext"
                          >&#8377;5,400</span
                        >
                      </td>
                      <td>
                        <span class="status-badge status-successful">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Successful
                        </span>
                      </td>
                      <td>
                        <span class="status-badge status-confirmed">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Confirmed
                        </span>
                      </td>
                      <td>
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-view-booking"
                            data-booking-id="CS-10027"
                            data-booking-buyer="Siddhivinayak Fabricators (Amit Verma)"
                            data-booking-machine="Haas VF-2 CNC Vertical Milling (M-1003)"
                            data-booking-date="28 Sep 2026, 10:00 AM â€“ 04:00 PM"
                            data-booking-hours="6 hours"
                            data-booking-rate="â‚¹900/hr"
                            data-booking-total="â‚¹5,400"
                            data-booking-payment="successful"
                            data-booking-status="confirmed"
                            data-booking-progress="Not started"
                            data-booking-note="Payment is successful and the booking is confirmed. Work is scheduled to start on 28 Sep 2026."
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View booking
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
                >BR-2041 remains in Booking Requests with status
                <code>payment_pending</code>. It becomes an accepted booking only
                after successful buyer payment. Payment is never shown before
                owner acceptance.</span
              >
            </div>
          </section>
@endsection
