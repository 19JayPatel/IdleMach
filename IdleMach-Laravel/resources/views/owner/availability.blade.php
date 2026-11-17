@extends('layouts.owner')

@section('title', 'Machine Availability - IdleMach Owner')

@section('meta_description', 'Owner machine capacity and weekly availability overview with per-machine booked and available hours.')

@section('page_title', 'Machine Availability')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">My business</p>
              <h1 class="dashboard-title">Machine Availability</h1>
              <p class="dashboard-subtitle">
                Review booked and available capacity per machine, manage
                availability windows, and inspect the weekly schedule.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('owner.machines') }}">
                <i class="fa-solid fa-gears" aria-hidden="true"></i>
                My machines
              </a>
            </div>
          </div>

          <section
            class="dashboard-card"
            aria-labelledby="availability-controls-heading"
          >
            <div class="dashboard-card-header">
              <h2
                class="dashboard-card-title"
                id="availability-controls-heading"
              >
                <i class="fa-solid fa-sliders" aria-hidden="true"></i>
                Availability controls
              </h2>
              <span class="text-muted small">Frontend interface only</span>
            </div>
            <div class="dashboard-card-body">
              <form class="row g-3" id="owner-availability-form">
                <div class="col-12 col-md-6">
                  <label class="form-label" for="owner-availability-machine"
                    >Machine</label
                  >
                  <select class="form-select" id="owner-availability-machine">
                    <option selected>
                      Haas CNC Turning Machine ST-20 (M-1001)
                    </option>
                    <option>ACE Micromatic VMC 850V (M-1002)</option>
                    <option>Haas VF-2 CNC Vertical Milling (M-1003)</option>
                    <option>
                      Lokesh Heavy Duty Industrial Lathe 260 (M-1004)
                    </option>
                    <option>Jyoti CNC Turning Center DX-200 (M-1005)</option>
                  </select>
                </div>
                <div class="col-6 col-md-3">
                  <label class="form-label" for="owner-availability-status"
                    >Availability status</label
                  >
                  <select class="form-select" id="owner-availability-status">
                    <option selected>Active</option>
                    <option>Inactive</option>
                    <option>Maintenance</option>
                  </select>
                </div>
                <div class="col-6 col-md-3">
                  <label class="form-label" for="owner-availability-capacity"
                    >Daily capacity (hrs)</label
                  >
                  <input
                    class="form-control"
                    id="owner-availability-capacity"
                    type="number"
                    min="0"
                    max="24"
                    step="1"
                    value="10"
                  />
                </div>
                <div class="col-6 col-md-3">
                  <label class="form-label" for="owner-availability-from"
                    >Available from</label
                  >
                  <input
                    class="form-control"
                    id="owner-availability-from"
                    type="date"
                    value="2026-10-27"
                  />
                </div>
                <div class="col-6 col-md-3">
                  <label class="form-label" for="owner-availability-to"
                    >Available to</label
                  >
                  <input
                    class="form-control"
                    id="owner-availability-to"
                    type="date"
                    value="2026-11-30"
                  />
                </div>
                <div class="col-6 col-md-3">
                  <label class="form-label" for="owner-unavailable-from"
                    >Unavailable from</label
                  >
                  <input
                    class="form-control"
                    id="owner-unavailable-from"
                    type="date"
                  />
                </div>
                <div class="col-6 col-md-3">
                  <label class="form-label" for="owner-unavailable-to"
                    >Unavailable to</label
                  >
                  <input
                    class="form-control"
                    id="owner-unavailable-to"
                    type="date"
                  />
                </div>
                <div class="col-12">
                  <label class="form-label" for="owner-availability-notes"
                    >Availability notes</label
                  >
                  <textarea
                    class="form-control"
                    id="owner-availability-notes"
                    rows="2"
                    placeholder="Example: maintenance window, shift pattern, or holiday closure."
                  ></textarea>
                </div>
                <div class="col-12 d-flex flex-wrap gap-2">
                  <button class="btn-im btn-im-primary" type="submit">
                    <i class="fa-solid fa-floppy-disk" aria-hidden="true"></i>
                    Save availability
                  </button>
                  <button class="btn-im btn-im-outline" type="reset">
                    <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
                    Reset form
                  </button>
                </div>
              </form>
              <div
                class="im-alert im-alert-success mt-3 mb-0"
                id="owner-availability-feedback"
                role="status"
                hidden
              >
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <div>
                  Availability updated locally for this preview. No calendar,
                  booking, or database record was changed.
                </div>
              </div>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Only approved and active machines can receive new booking
                requests. Maintenance and inactive machines remain
                blocked.</span
              >
            </div>
          </section>

          <!-- Priority section: machine availability -->
          <section
            class="dashboard-card"
            id="machine-availability"
            aria-labelledby="machine-availability-heading"
          >
            <div class="dashboard-card-header">
              <h2
                class="dashboard-card-title"
                id="machine-availability-heading"
              >
                <i class="fa-solid fa-calendar-days" aria-hidden="true"></i>
                Machine availability and capacity
              </h2>
              <div class="dashboard-card-actions">
              </div>
            </div>
            <div class="dashboard-card-body">
              <div class="row g-4 align-items-start">
                <div class="col-lg-8">
                  <div class="capacity-grid">
                    <div class="capacity-card">
                      <div class="capacity-card-head">
                        <div>
                          <p class="capacity-card-title">
                            Haas CNC Turning Machine ST-20
                          </p>
                          <p class="capacity-card-sub">
                            M-1001 &middot; CNC Turning &middot; Active
                          </p>
                        </div>
                        <span class="status-badge status-active">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Active
                        </span>
                      </div>
                      <div
                        class="capacity-visual-bar"
                        role="img"
                        aria-label="2 of 10 daily hours booked, 8 hours available"
                      >
                        <span
                          class="capacity-segment segment-booked"
                          style="width: 20%"
                        ></span>
                        <span
                          class="capacity-segment segment-available"
                          style="width: 80%"
                        ></span>
                      </div>
                      <div class="capacity-legend">
                        <span class="capacity-legend-item">
                          <span
                            class="capacity-legend-dot segment-booked"
                            aria-hidden="true"
                          ></span>
                          Booked 2 hrs
                        </span>
                        <span class="capacity-legend-item">
                          <span
                            class="capacity-legend-dot segment-available"
                            aria-hidden="true"
                          ></span>
                          Available 8 hrs
                        </span>
                      </div>
                      <div class="capacity-value-row">
                        <div class="capacity-value">
                          <span>Total capacity</span>
                          <strong>10 hrs/day</strong>
                        </div>
                        <div class="capacity-value">
                          <span>Booked capacity</span>
                          <strong>2 hrs/day</strong>
                        </div>
                        <div class="capacity-value">
                          <span>Available capacity</span>
                          <strong>8 hrs/day</strong>
                        </div>
                      </div>
                    </div>

                    <div class="capacity-card">
                      <div class="capacity-card-head">
                        <div>
                          <p class="capacity-card-title">
                            ACE Micromatic VMC 850V
                          </p>
                          <p class="capacity-card-sub">
                            M-1002 &middot; 3-Axis VMC &middot; Active, fully
                            booked
                          </p>
                        </div>
                        <span class="status-badge status-active">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Active
                        </span>
                      </div>
                      <div
                        class="capacity-visual-bar"
                        role="img"
                        aria-label="All 12 daily hours booked, 0 hours available"
                      >
                        <span
                          class="capacity-segment segment-booked"
                          style="width: 100%"
                        ></span>
                      </div>
                      <div class="capacity-legend">
                        <span class="capacity-legend-item">
                          <span
                            class="capacity-legend-dot segment-booked"
                            aria-hidden="true"
                          ></span>
                          Booked 12 hrs
                        </span>
                        <span class="capacity-legend-item">
                          <span
                            class="capacity-legend-dot segment-available"
                            aria-hidden="true"
                          ></span>
                          Available 0 hrs
                        </span>
                      </div>
                      <div class="capacity-value-row">
                        <div class="capacity-value">
                          <span>Total capacity</span>
                          <strong>12 hrs/day</strong>
                        </div>
                        <div class="capacity-value">
                          <span>Booked capacity</span>
                          <strong>12 hrs/day</strong>
                        </div>
                        <div class="capacity-value">
                          <span>Available capacity</span>
                          <strong>0 hrs/day</strong>
                        </div>
                      </div>
                    </div>

                    <div class="capacity-card">
                      <div class="capacity-card-head">
                        <div>
                          <p class="capacity-card-title">
                            Haas VF-2 CNC Vertical Milling
                          </p>
                          <p class="capacity-card-sub">
                            M-1003 &middot; CNC Milling &middot; Active
                          </p>
                        </div>
                        <span class="status-badge status-active">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Active
                        </span>
                      </div>
                      <div
                        class="capacity-visual-bar"
                        role="img"
                        aria-label="2 of 8 daily hours booked, 6 hours available"
                      >
                        <span
                          class="capacity-segment segment-booked"
                          style="width: 25%"
                        ></span>
                        <span
                          class="capacity-segment segment-available"
                          style="width: 75%"
                        ></span>
                      </div>
                      <div class="capacity-legend">
                        <span class="capacity-legend-item">
                          <span
                            class="capacity-legend-dot segment-booked"
                            aria-hidden="true"
                          ></span>
                          Booked 2 hrs
                        </span>
                        <span class="capacity-legend-item">
                          <span
                            class="capacity-legend-dot segment-available"
                            aria-hidden="true"
                          ></span>
                          Available 6 hrs
                        </span>
                      </div>
                      <div class="capacity-value-row">
                        <div class="capacity-value">
                          <span>Total capacity</span>
                          <strong>8 hrs/day</strong>
                        </div>
                        <div class="capacity-value">
                          <span>Booked capacity</span>
                          <strong>2 hrs/day</strong>
                        </div>
                        <div class="capacity-value">
                          <span>Available capacity</span>
                          <strong>6 hrs/day</strong>
                        </div>
                      </div>
                    </div>

                    <div class="capacity-card capacity-card-muted">
                      <div class="capacity-card-head">
                        <div>
                          <p class="capacity-card-title">
                            Lokesh Heavy Duty Industrial Lathe 260
                          </p>
                          <p class="capacity-card-sub">
                            M-1004 &middot; Industrial Lathe &middot;
                            Maintenance
                          </p>
                        </div>
                        <span class="status-badge status-maintenance">
                          <i class="fa-solid fa-wrench" aria-hidden="true"></i>
                          Maintenance
                        </span>
                      </div>
                      <div
                        class="capacity-visual-bar"
                        role="img"
                        aria-label="8 daily hours unavailable for maintenance"
                      >
                        <span
                          class="capacity-segment segment-maintenance"
                          style="width: 100%"
                        ></span>
                      </div>
                      <div class="capacity-legend">
                        <span class="capacity-legend-item">
                          <span
                            class="capacity-legend-dot segment-maintenance"
                            aria-hidden="true"
                          ></span>
                          Maintenance 8 hrs
                        </span>
                        <span class="capacity-legend-item">
                          <span
                            class="capacity-legend-dot segment-available"
                            aria-hidden="true"
                          ></span>
                          Available 0 hrs
                        </span>
                      </div>
                      <p class="capacity-unavailable-note">
                        <i class="fa-solid fa-wrench me-1" aria-hidden="true"></i>
                        Unavailable 27&ndash;29 Oct 2026. Excluded from active
                        capacity totals; cannot receive new requests.
                      </p>
                    </div>
                  </div>

                  <div class="im-alert im-alert-info mt-4" role="note">
                    <i class="fa-solid fa-calculator" aria-hidden="true"></i>
                    <div>
                      <strong>Capacity formula:</strong>
                      Available Capacity = Total Capacity &minus; Booked
                      Capacity. The three active lines show 30 hrs/day
                      total, 16 hrs/day booked, and 14 hrs/day available. The
                      maintenance line is excluded from these totals.
                    </div>
                  </div>
                </div>

                <div class="col-lg-4">
                  <figure class="owner-capacity-figure-wrap mb-0">
                    <img
                      class="owner-capacity-figure"
                      src="{{ asset('assets/images/owner-capacity.svg') }}"
                      alt="Illustration of an owner capacity plan with weekly working hours."
                      width="720"
                      height="560"
                      loading="lazy"
                    />
                  </figure>
                </div>
              </div>

              <div class="dashboard-availability-week mt-4">
                <div class="dashboard-overview-head">
                  <h3 class="dashboard-overview-title" id="weekly-availability-heading">
                    Weekly availability &mdash; Haas CNC Turning Machine ST-20
                  </h3>
                </div>
                <span class="table-scroll-hint" hidden>
                  <i class="fa-solid fa-arrows-left-right" aria-hidden="true"></i>
                  Scroll the table sideways to see all columns.
                </span>
                <div
                  class="table-responsive"
                  tabindex="0"
                  role="region"
                  aria-labelledby="weekly-availability-heading"
                >
                  <table class="im-table availability-week-table">
                    <caption class="visually-hidden">
                      Weekly availability for machine M-1001.
                    </caption>
                    <thead>
                      <tr>
                        <th scope="col">Day</th>
                        <th scope="col">Working window</th>
                        <th scope="col">Booked window</th>
                        <th scope="col">Availability state</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Monday</td>
                        <td>09:00 AM &ndash; 06:00 PM</td>
                        <td>No booking</td>
                        <td>
                          <span class="status-badge status-available">
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            Available
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td>Tuesday</td>
                        <td>09:00 AM &ndash; 06:00 PM</td>
                        <td>No booking</td>
                        <td>
                          <span class="status-badge status-available">
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            Available
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td>Wednesday</td>
                        <td>09:00 AM &ndash; 06:00 PM</td>
                        <td>10:00 AM &ndash; 12:00 PM (2 hrs)</td>
                        <td>
                          <span class="status-badge status-booked">
                            <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                            Partially booked
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td>Thursday</td>
                        <td>09:00 AM &ndash; 06:00 PM</td>
                        <td>No booking</td>
                        <td>
                          <span class="status-badge status-available">
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            Available
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td>Friday</td>
                        <td>09:00 AM &ndash; 06:00 PM</td>
                        <td>No booking</td>
                        <td>
                          <span class="status-badge status-available">
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            Available
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td>Saturday</td>
                        <td>09:00 AM &ndash; 02:00 PM</td>
                        <td>Maintenance window</td>
                        <td>
                          <span class="status-badge status-maintenance">
                            <i class="fa-solid fa-wrench" aria-hidden="true"></i>
                            Maintenance
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td>Sunday</td>
                        <td>Closed</td>
                        <td>Unavailable</td>
                        <td>
                          <span class="status-badge status-unavailable">
                            <i class="fa-solid fa-circle-minus" aria-hidden="true"></i>
                            Unavailable
                          </span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <p class="preview-footnote mt-2 mb-0">
                  Editing capacity does not create a live calendar or reserve
                  hours.
                </p>
              </div>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Only approved and active machines can receive new booking
                requests. Maintenance, inactive, pending, and rejected listings
                remain blocked.</span
              >
            </div>
          </section>

          <section
            class="dashboard-card"
            id="availability-schedule"
            aria-labelledby="availability-schedule-heading"
          >
            <div class="dashboard-card-header">
              <h2
                class="dashboard-card-title"
                id="availability-schedule-heading"
              >
                <i class="fa-solid fa-calendar-days" aria-hidden="true"></i>
                Schedule preview &mdash; Haas CNC Turning Machine ST-20
              </h2>
              <span class="stat-demo-badge">Sample week</span>
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
                aria-label="Machine availability schedule"
              >
                <table class="im-table availability-week-table">
                  <caption class="visually-hidden">
                    Daily availability schedule for machine M-1001.
                  </caption>
                  <thead>
                    <tr>
                      <th scope="col">Date</th>
                      <th scope="col">Day</th>
                      <th scope="col">Working window</th>
                      <th scope="col">Availability state</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>27 Oct 2026</td>
                      <td>Tuesday</td>
                      <td>09:00 AM &ndash; 06:00 PM</td>
                      <td>
                        <span class="status-badge status-available">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Available
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>28 Oct 2026</td>
                      <td>Wednesday</td>
                      <td>09:00 AM &ndash; 06:00 PM</td>
                      <td>
                        <span class="status-badge status-booked">
                          <i
                            class="fa-solid fa-calendar-check"
                            aria-hidden="true"
                          ></i>
                          Partially booked
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>29 Oct 2026</td>
                      <td>Thursday</td>
                      <td>09:00 AM &ndash; 06:00 PM</td>
                      <td>
                        <span class="status-badge status-available">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Available
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>30 Oct 2026</td>
                      <td>Friday</td>
                      <td>09:00 AM &ndash; 06:00 PM</td>
                      <td>
                        <span class="status-badge status-available">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Available
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>31 Oct 2026</td>
                      <td>Saturday</td>
                      <td>09:00 AM &ndash; 02:00 PM</td>
                      <td>
                        <span class="status-badge status-maintenance">
                          <i class="fa-solid fa-wrench" aria-hidden="true"></i>
                          Maintenance
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>01 Nov 2026</td>
                      <td>Sunday</td>
                      <td>Closed</td>
                      <td>
                        <span class="status-badge status-unavailable">
                          <i
                            class="fa-solid fa-circle-minus"
                            aria-hidden="true"
                          ></i>
                          Unavailable
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>02 Nov 2026</td>
                      <td>Monday</td>
                      <td>09:00 AM &ndash; 06:00 PM</td>
                      <td>
                        <span class="status-badge status-available">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Available
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Schedule preview complements the weekly availability table.
                Editing controls are frontend-only and do not create a live
                calendar or reserve hours.</span
              >
            </div>
          </section>

@push('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("owner-availability-form");
        var feedback = document.getElementById("owner-availability-feedback");
        if (!form || !feedback) {
          return;
        }
        form.addEventListener("submit", function (event) {
          event.preventDefault();
          feedback.hidden = false;
        });
        form.addEventListener("reset", function () {
          feedback.hidden = true;
        });
      });
    </script>
@endpush
@endsection
