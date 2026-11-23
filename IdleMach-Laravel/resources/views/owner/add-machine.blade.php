@extends('layouts.owner')

@section('title', 'Add Machine — IdleMach Owner')

@section('meta_description', 'IdleMach owner add machine form with machine details, category, description, location, rental price, specifications, availability, and image placeholders. Frontend prototype only.')

@section('page_title', 'Add Machine')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">My business</p>
              <h1 class="dashboard-title">Add Machine</h1>
              <p class="dashboard-subtitle">
                Create a new machine listing for admin review. New listings start
                as pending and appear in the marketplace only after approval.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a class="btn-im btn-im-outline" href="{{ route('owner.machines') }}">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                Back to My Machines
              </a>
            </div>
          </div>

          <div class="im-alert im-alert-info" role="note">
            <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
            <div>
              This form is a frontend prototype. Nothing is uploaded, stored, or
              submitted to a database, and no real image files are accepted.
            </div>
          </div>

          <section class="dashboard-card" aria-labelledby="add-machine-heading">
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="add-machine-heading">
                <i class="fa-solid fa-circle-plus" aria-hidden="true"></i>
                New machine listing
              </h2>
              <span class="stat-demo-badge">Pending approval</span>
            </div>
            <div class="dashboard-card-body">
              <form id="owner-add-machine-form">
                <p class="eyebrow mb-2">Basic information</p>
                <div class="row g-3">
                  <div class="col-md-7">
                    <label class="form-label form-required" for="page-add-name"
                      >Machine name</label
                    >
                    <input
                      class="form-control"
                      id="page-add-name"
                      name="machine_name"
                      type="text"
                      placeholder="Example: Haas CNC Turning Machine ST-20"
                      aria-describedby="page-add-name-error"
                      data-error-required="Please enter a machine name."
                      required
                    />
                    <div class="invalid-feedback" id="page-add-name-error">
                      Please enter a machine name.
                    </div>
                  </div>
                  <div class="col-md-5">
                    <label class="form-label form-required" for="page-add-type"
                      >Machine category</label
                    >
                    <select
                      class="form-select"
                      id="page-add-type"
                      name="machine_type"
                      aria-describedby="page-add-type-error"
                      data-error-required="Please select a machine category."
                      required
                    >
                      <option value="" selected disabled>Select category</option>
                      <option value="CNC Turning">CNC Turning</option>
                      <option value="3-Axis VMC">3-Axis VMC</option>
                      <option value="CNC Milling">CNC Milling</option>
                      <option value="Industrial Lathe">Industrial Lathe</option>
                      <option value="Fabrication">Fabrication</option>
                      <option value="Other">Other</option>
                    </select>
                    <div class="invalid-feedback" id="page-add-type-error">
                      Please select a machine category.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="page-add-brand">Brand</label>
                    <input
                      class="form-control"
                      id="page-add-brand"
                      name="brand"
                      type="text"
                      placeholder="Example: Haas"
                    />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="page-add-model">Model</label>
                    <input
                      class="form-control"
                      id="page-add-model"
                      name="model"
                      type="text"
                      placeholder="Example: ST-20"
                    />
                  </div>
                  <div class="col-12">
                    <label class="form-label" for="page-add-description"
                      >Description</label
                    >
                    <textarea
                      class="form-control"
                      id="page-add-description"
                      name="description"
                      rows="3"
                      placeholder="Describe the machine, the work it performs, and the materials it handles."
                    ></textarea>
                  </div>
                </div>

                <hr class="my-4" />

                <p class="eyebrow mb-2">Location and pricing</p>
                <div class="row g-3">
                  <div class="col-md-5">
                    <label class="form-label form-required" for="page-add-city"
                      >City</label
                    >
                    <input
                      class="form-control"
                      id="page-add-city"
                      name="city"
                      type="text"
                      value="Rajkot"
                      aria-describedby="page-add-city-error"
                      data-error-required="Please enter the machine location."
                      required
                    />
                    <div class="invalid-feedback" id="page-add-city-error">
                      Please enter the machine location.
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label" for="page-add-state">State</label>
                    <input
                      class="form-control"
                      id="page-add-state"
                      name="state"
                      type="text"
                      value="Gujarat"
                    />
                  </div>
                  <div class="col-md-4">
                    <label class="form-label form-required" for="page-add-rate"
                      >Rental price (&#8377;/hr)</label
                    >
                    <input
                      class="form-control"
                      id="page-add-rate"
                      name="hourly_rate"
                      type="number"
                      min="1"
                      step="1"
                      placeholder="850"
                      aria-describedby="page-add-rate-error"
                      data-error-required="Please enter an hourly rental price."
                      data-error-min="Please enter an hourly rental price."
                      required
                    />
                    <div class="invalid-feedback" id="page-add-rate-error">
                      Please enter an hourly rental price.
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label" for="page-add-capacity"
                      >Daily capacity (hrs)</label
                    >
                    <input
                      class="form-control"
                      id="page-add-capacity"
                      name="available_capacity"
                      type="number"
                      min="0"
                      max="24"
                      step="1"
                      placeholder="4"
                    />
                  </div>
                  <div class="col-md-8">
                    <label class="form-label" for="page-add-location-note"
                      >Location note</label
                    >
                    <input
                      class="form-control"
                      id="page-add-location-note"
                      name="location_note"
                      type="text"
                      placeholder="Example: GIDC Industrial Estate, Unit 4"
                    />
                  </div>
                </div>

                <hr class="my-4" />

                <p class="eyebrow mb-2">Machine specifications</p>
                <div class="row g-3">
                  <div class="col-12">
                    <label class="form-label" for="page-add-envelope"
                      >Work envelope</label
                    >
                    <input
                      class="form-control"
                      id="page-add-envelope"
                      name="work_envelope"
                      type="text"
                      placeholder="Max Dia: 320 mm &middot; Max Length: 500 mm"
                    />
                  </div>
                  <div class="col-12">
                    <label class="form-label" for="page-add-specs"
                      >Specifications</label
                    >
                    <textarea
                      class="form-control"
                      id="page-add-specs"
                      name="specifications"
                      rows="2"
                      placeholder="Control, spindle speed, accuracy, table size, and tooling details."
                    ></textarea>
                  </div>
                  <div class="col-12">
                    <label class="form-label" for="page-add-materials"
                      >Materials</label
                    >
                    <input
                      class="form-control"
                      id="page-add-materials"
                      name="materials"
                      type="text"
                      placeholder="Mild Steel, Aluminium 6061, Brass"
                    />
                  </div>
                </div>

                <hr class="my-4" />

                <p class="eyebrow mb-2">Availability details</p>
                <div class="row g-3">
                  <div class="col-12">
                    <span class="form-label d-block">Available days</span>
                    <div class="d-flex flex-wrap gap-3">
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          id="page-add-day-mon"
                          type="checkbox"
                          checked
                        />
                        <label class="form-check-label" for="page-add-day-mon"
                          >Mon</label
                        >
                      </div>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          id="page-add-day-tue"
                          type="checkbox"
                          checked
                        />
                        <label class="form-check-label" for="page-add-day-tue"
                          >Tue</label
                        >
                      </div>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          id="page-add-day-wed"
                          type="checkbox"
                          checked
                        />
                        <label class="form-check-label" for="page-add-day-wed"
                          >Wed</label
                        >
                      </div>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          id="page-add-day-thu"
                          type="checkbox"
                          checked
                        />
                        <label class="form-check-label" for="page-add-day-thu"
                          >Thu</label
                        >
                      </div>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          id="page-add-day-fri"
                          type="checkbox"
                          checked
                        />
                        <label class="form-check-label" for="page-add-day-fri"
                          >Fri</label
                        >
                      </div>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          id="page-add-day-sat"
                          type="checkbox"
                          checked
                        />
                        <label class="form-check-label" for="page-add-day-sat"
                          >Sat</label
                        >
                      </div>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          id="page-add-day-sun"
                          type="checkbox"
                        />
                        <label class="form-check-label" for="page-add-day-sun"
                          >Sun</label
                        >
                      </div>
                    </div>
                  </div>
                  <div class="col-6 col-md-3">
                    <label class="form-label" for="page-add-hours-from"
                      >Working hours from</label
                    >
                    <input
                      class="form-control"
                      id="page-add-hours-from"
                      type="time"
                      value="09:00"
                    />
                  </div>
                  <div class="col-6 col-md-3">
                    <label class="form-label" for="page-add-hours-to"
                      >Working hours to</label
                    >
                    <input
                      class="form-control"
                      id="page-add-hours-to"
                      type="time"
                      value="18:00"
                    />
                  </div>
                </div>

                <hr class="my-4" />

                <p class="eyebrow mb-2">Machine images</p>
                <div class="row g-3 align-items-start">
                  <div class="col-md-6">
                    <label class="form-label" for="page-add-image"
                      >Upload machine image</label
                    >
                    <input
                      class="form-control"
                      id="page-add-image"
                      type="file"
                      accept="image/*"
                      disabled
                      aria-describedby="page-add-image-help"
                    />
                    <p class="form-text" id="page-add-image-help">
                      File upload is disabled in this prototype. A project
                      illustration is used instead.
                    </p>
                  </div>
                  <div class="col-md-6">
                    <span class="form-label d-block">Illustration placeholders</span>
                    <div class="d-flex flex-wrap gap-2">
                      <img
                        class="machine-thumb"
                        src="{{ asset('assets/images/machine-turning.svg') }}"
                        alt="CNC turning machine illustration"
                        width="64"
                        height="64"
                      />
                      <img
                        class="machine-thumb"
                        src="{{ asset('assets/images/machine-milling.svg') }}"
                        alt="CNC milling machine illustration"
                        width="64"
                        height="64"
                      />
                      <img
                        class="machine-thumb"
                        src="{{ asset('assets/images/machine-fabrication.svg') }}"
                        alt="Fabrication machine illustration"
                        width="64"
                        height="64"
                      />
                    </div>
                  </div>
                </div>

                <div
                  class="im-alert im-alert-success mt-4 mb-0"
                  id="owner-add-machine-feedback"
                  role="status"
                  hidden
                >
                  <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  <div>
                    New machine prepared locally with status
                    <code>pending</code>. No listing was uploaded or saved. The
                    marketplace shows only approved machines.
                  </div>
                </div>

                <div class="d-flex flex-wrap gap-2 mt-4">
                  <button class="btn-im btn-im-primary" type="submit">
                    <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
                    Submit for approval
                  </button>
                  <a class="btn-im btn-im-outline" href="{{ route('owner.machines') }}">
                    Cancel
                  </a>
                </div>
              </form>
            </div>
            <div class="dashboard-card-footer">
              <span
                >Status terms: <code>pending</code>, <code>approved</code>,
                <code>rejected</code>, <code>active</code>,
                <code>inactive</code>, <code>maintenance</code>. Activation is a
                separate step after approval.</span
              >
            </div>
          </section>

@push('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("owner-add-machine-form");
        var feedback = document.getElementById("owner-add-machine-feedback");
        if (!form || !feedback) {
          return;
        }
        form.addEventListener("submit", function (event) {
          event.preventDefault();
        });

        form.addEventListener(window.IdleMachFormValidation.VALID_EVENT, function () {
          feedback.hidden = false;
          feedback.scrollIntoView({ behavior: "smooth", block: "nearest" });
        });

        form.addEventListener(window.IdleMachFormValidation.INVALID_EVENT, function () {
          feedback.hidden = true;
        });
      });
    </script>
@endpush
@endsection
