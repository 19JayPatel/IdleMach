@extends('layouts.owner')

@section('title', 'Completed Work - IdleMach Owner')

@section('meta_description', 'Completed owner bookings with buyer, machine, completion date, amount, payment, and status.')

@section('page_title', 'Completed Work')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Bookings</p>
              <h1 class="dashboard-title">Completed Work</h1>
              <p class="dashboard-subtitle">
                Finished bookings and their payment records. Completed work is
                the only source of eligible buyer reviews.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('owner.reviews') }}">
                <i class="fa-solid fa-star" aria-hidden="true"></i>
                View reviews
              </a>
            </div>
          </div>

          <!-- Completed work -->
          <section
            class="dashboard-card"
            id="completed-work"
            aria-labelledby="completed-work-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="completed-work-heading">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Completed work
              </h2>
              <div class="dashboard-card-actions">
                <span class="text-muted small">3 recent of 25 completions</span>
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
                aria-label="Completed work table"
              >
                <table class="im-table table-completed" id="completed-work-table">
                  <caption class="visually-hidden">
                    Three recent completed bookings. Only completed
                    bookings are eligible for buyer reviews.
                  </caption>
                  <thead>
                    <tr>
                      <th scope="col">Booking</th>
                      <th scope="col">Buyer / company</th>
                      <th scope="col">Machine</th>
                      <th scope="col">Completed</th>
                      <th scope="col">Hours / amount</th>
                      <th scope="col">Payment</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">CS-10024</p>
                        <span class="table-cell-id">Completed 21 Oct 2026</span>
                      </td>
                      <td>
                        Delta Gears &amp; Shafts
                        <span class="d-block table-cell-subtext"
                          >Vijay Chawla</span
                        >
                      </td>
                      <td>
                        ACE Micromatic VMC 850V
                        <span class="d-block table-cell-subtext">M-1002</span>
                      </td>
                      <td>21 Oct 2026</td>
                      <td>
                        9 hours
                        <span class="d-block table-cell-subtext"
                          >&#8377;10,800</span
                        >
                      </td>
                      <td>
                        <span class="status-badge status-successful">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Successful
                        </span>
                      </td>
                      <td>
                        <span class="status-badge status-completed">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Completed
                        </span>
                      </td>
                      <td>
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-view-booking"
                            data-booking-id="CS-10024"
                            data-booking-buyer="Delta Gears &amp; Shafts (Vijay Chawla)"
                            data-booking-machine="ACE Micromatic VMC 850V (M-1002)"
                            data-booking-date="20 Oct 2026, 09:00 AM â€“ 06:00 PM"
                            data-booking-hours="9 hours"
                            data-booking-rate="â‚¹1,200/hr"
                            data-booking-total="â‚¹10,800"
                            data-booking-payment="successful"
                            data-booking-status="completed"
                            data-booking-progress="100% complete"
                            data-booking-note="Work completed and accepted by the buyer. A review is available in the Reviews section."
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <a
                            class="btn-im btn-im-outline btn-im-sm"
                            href="{{ route('owner.reviews') }}"
                          >
                            <i class="fa-solid fa-star" aria-hidden="true"></i>
                            Review
                          </a>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">CS-10022</p>
                        <span class="table-cell-id">Completed 19 Oct 2026</span>
                      </td>
                      <td>
                        Shree Shakti Engineering
                        <span class="d-block table-cell-subtext"
                          >Mehul Joshi</span
                        >
                      </td>
                      <td>
                        Haas CNC Turning Machine ST-20
                        <span class="d-block table-cell-subtext">M-1001</span>
                      </td>
                      <td>19 Oct 2026</td>
                      <td>
                        8 hours
                        <span class="d-block table-cell-subtext"
                          >&#8377;6,400</span
                        >
                      </td>
                      <td>
                        <span class="status-badge status-successful">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Successful
                        </span>
                      </td>
                      <td>
                        <span class="status-badge status-completed">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Completed
                        </span>
                      </td>
                      <td>
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-view-booking"
                            data-booking-id="CS-10022"
                            data-booking-buyer="Shree Shakti Engineering (Mehul Joshi)"
                            data-booking-machine="Haas CNC Turning Machine ST-20 (M-1001)"
                            data-booking-date="18 Oct 2026, 09:00 AM â€“ 05:00 PM"
                            data-booking-hours="8 hours"
                            data-booking-rate="â‚¹800/hr"
                            data-booking-total="â‚¹6,400"
                            data-booking-payment="successful"
                            data-booking-status="completed"
                            data-booking-progress="100% complete"
                            data-booking-note="Work completed and accepted by the buyer. A review is available in the Reviews section."
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <a
                            class="btn-im btn-im-outline btn-im-sm"
                            href="{{ route('owner.reviews') }}"
                          >
                            <i class="fa-solid fa-star" aria-hidden="true"></i>
                            Review
                          </a>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <p class="table-cell-title mb-0">CS-10018</p>
                        <span class="table-cell-id">Completed 14 Oct 2026</span>
                      </td>
                      <td>
                        Apex Auto Components
                        <span class="d-block table-cell-subtext"
                          >Rajesh Sharma</span
                        >
                      </td>
                      <td>
                        Haas VF-2 CNC Vertical Milling
                        <span class="d-block table-cell-subtext">M-1003</span>
                      </td>
                      <td>14 Oct 2026</td>
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
                        <span class="status-badge status-completed">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Completed
                        </span>
                      </td>
                      <td>
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-view-booking"
                            data-booking-id="CS-10018"
                            data-booking-buyer="Apex Auto Components (Rajesh Sharma)"
                            data-booking-machine="Haas VF-2 CNC Vertical Milling (M-1003)"
                            data-booking-date="13 Oct 2026, 10:00 AM â€“ 04:00 PM"
                            data-booking-hours="6 hours"
                            data-booking-rate="â‚¹900/hr"
                            data-booking-total="â‚¹5,400"
                            data-booking-payment="successful"
                            data-booking-status="completed"
                            data-booking-progress="100% complete"
                            data-booking-note="Work completed and accepted by the buyer. A review is available in the Reviews section."
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <a
                            class="btn-im btn-im-outline btn-im-sm"
                            href="{{ route('owner.reviews') }}"
                          >
                            <i class="fa-solid fa-star" aria-hidden="true"></i>
                            Review
                          </a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Completed work is the only source of eligible buyer reviews.
                Historical total is 25 completions; three recent records
                are shown.</span
              >
            </div>
          </section>
@endsection
