@extends('layouts.owner')

@section('title', 'My Machines - IdleMach Owner')

@section('meta_description', 'Owner machine listings with images, categories, location, rental rate, availability status, listing status, and existing view/edit controls.')

@section('page_title', 'My Machines')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">My business</p>
              <h1 class="dashboard-title">My Machines</h1>
              <p class="dashboard-subtitle">
                Every machine listing with its image, category, location, rental
                rate, availability, and listing status. Existing view and edit
                controls are preserved.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a
                class="btn-im btn-im-primary"
                href="{{ route('owner.add-machine') }}"
              >
                <i class="fa-solid fa-circle-plus" aria-hidden="true"></i>
                Add machine
              </a>
            </div>
          </div>

          <section class="dashboard-card" aria-labelledby="machine-filters-heading">
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="machine-filters-heading">
                <i class="fa-solid fa-filter" aria-hidden="true"></i>
                Search and filter
              </h2>
              <span class="text-muted small">Frontend interface only</span>
            </div>
            <div class="dashboard-card-body">
              <div class="row g-3 align-items-end">
                <div class="col-12 col-md-6">
                  <label class="form-label" for="owner-machine-search"
                    >Search machines</label
                  >
                  <input
                    class="form-control"
                    id="owner-machine-search"
                    type="search"
                    placeholder="Search by machine name, ID, type, or location"
                  />
                </div>
                <div class="col-6 col-md-3">
                  <label class="form-label" for="owner-machine-status-filter"
                    >Status</label
                  >
                  <select class="form-select" id="owner-machine-status-filter">
                    <option value="">All statuses</option>
                    <option value="active">Active</option>
                    <option value="maintenance">Maintenance</option>
                    <option value="pending">Pending approval</option>
                  </select>
                </div>
                <div class="col-6 col-md-3">
                  <button
                    class="btn-im btn-im-outline w-100"
                    type="button"
                    id="owner-machine-filter-reset"
                  >
                    <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
                    Reset
                  </button>
                </div>
              </div>
            </div>
          </section>

          <!-- My machines -->
          <section
            class="dashboard-card"
            id="my-machines"
            aria-labelledby="my-machines-heading"
          >
            <div class="dashboard-card-header">
              <h2 class="dashboard-card-title" id="my-machines-heading">
                <i class="fa-solid fa-gears" aria-hidden="true"></i>
                My machines
              </h2>
              <div class="dashboard-card-actions">
                <span class="text-muted small">5 listings</span>
                <button
                  class="btn-im btn-im-primary btn-im-sm"
                  type="button"
                  data-bs-toggle="modal"
                  data-bs-target="#modal-add-machine"
                >
                  <i class="fa-solid fa-circle-plus" aria-hidden="true"></i>
                  Add machine
                </button>
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
                aria-label="Owner machine listings table"
              >
                <table class="im-table table-machines" id="my-machines-table">
                  <caption class="visually-hidden">
                    Five machine listings, with type, process, location, rate,
                    available capacity, listing status, and actions.
                  </caption>
                  <thead>
                    <tr>
                      <th scope="col">Machine</th>
                      <th scope="col">Type / process</th>
                      <th scope="col">Location</th>
                      <th scope="col">Rate / capacity</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr data-owner-machine-id="M-1001">
                      <td>
                        <div class="machine-name-cell">
                          <img
                            class="machine-thumb"
                            src="{{ asset('assets/images/machine-turning.svg') }}"
                            alt="Illustration of a CNC turning machine."
                            width="48"
                            height="48"
                            loading="lazy"
                          />
                          <div>
                            <p class="table-cell-title mb-0">
                              Haas CNC Turning Machine ST-20
                            </p>
                            <span class="table-cell-subtext d-block"
                              >Haas (ST-20)</span
                            >
                            <span class="table-cell-id">ID: M-1001</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="badge bg-light text-dark border mb-1"
                          >CNC Turning</span
                        >
                        <span class="table-cell-subtext d-block"
                          >Process: Turning</span
                        >
                      </td>
                      <td>Rajkot, Gujarat</td>
                      <td>
                        <div
                          class="fw-semibold text-dark machine-rate-text"
                        >
                          &#8377;800/hr
                        </div>
                        <div class="table-cell-subtext machine-capacity-text">
                          8 hrs/day available
                        </div>
                      </td>
                      <td class="machine-status-cell">
                        <span class="status-badge status-active">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Active
                        </span>
                      </td>
                      <td class="machine-actions-cell">
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-view-machine"
                            data-machine-id="M-1001"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-edit-machine"
                            data-machine-id="M-1001"
                          >
                            <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                            Edit
                          </button>
                          <a
                            class="btn-im btn-im-outline btn-im-sm"
                            href="{{ route('owner.availability') }}"
                          >
                            <i class="fa-solid fa-calendar-days" aria-hidden="true"></i>
                            Availability
                          </a>
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-toggle-active"
                            data-machine-id="M-1001"
                          >
                            <i class="fa-solid fa-pause" aria-hidden="true"></i>
                            <span>Deactivate</span>
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr data-owner-machine-id="M-1002">
                      <td>
                        <div class="machine-name-cell">
                          <img
                            class="machine-thumb"
                            src="{{ asset('assets/images/machine-milling.svg') }}"
                            alt="Illustration of a vertical machining centre."
                            width="48"
                            height="48"
                            loading="lazy"
                          />
                          <div>
                            <p class="table-cell-title mb-0">
                              ACE Micromatic VMC 850V
                            </p>
                            <span class="table-cell-subtext d-block"
                              >ACE Micromatic (VMC-850V)</span
                            >
                            <span class="table-cell-id">ID: M-1002</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="badge bg-light text-dark border mb-1"
                          >3-Axis VMC</span
                        >
                        <span class="table-cell-subtext d-block"
                          >Process: Milling</span
                        >
                      </td>
                      <td>Rajkot, Gujarat</td>
                      <td>
                        <div
                          class="fw-semibold text-dark machine-rate-text"
                        >
                          &#8377;1,200/hr
                        </div>
                        <div class="table-cell-subtext machine-capacity-text">
                          0 hrs/day available
                        </div>
                      </td>
                      <td class="machine-status-cell">
                        <span class="status-badge status-active">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Active
                        </span>
                      </td>
                      <td class="machine-actions-cell">
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-view-machine"
                            data-machine-id="M-1002"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-edit-machine"
                            data-machine-id="M-1002"
                          >
                            <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                            Edit
                          </button>
                          <a
                            class="btn-im btn-im-outline btn-im-sm"
                            href="{{ route('owner.availability') }}"
                          >
                            <i class="fa-solid fa-calendar-days" aria-hidden="true"></i>
                            Availability
                          </a>
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-toggle-active"
                            data-machine-id="M-1002"
                          >
                            <i class="fa-solid fa-pause" aria-hidden="true"></i>
                            <span>Deactivate</span>
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr data-owner-machine-id="M-1003">
                      <td>
                        <div class="machine-name-cell">
                          <img
                            class="machine-thumb"
                            src="{{ asset('assets/images/machine-milling.svg') }}"
                            alt="Illustration of a CNC milling machine."
                            width="48"
                            height="48"
                            loading="lazy"
                          />
                          <div>
                            <p class="table-cell-title mb-0">
                              Haas VF-2 CNC Vertical Milling
                            </p>
                            <span class="table-cell-subtext d-block"
                              >Haas (VF-2)</span
                            >
                            <span class="table-cell-id">ID: M-1003</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="badge bg-light text-dark border mb-1"
                          >CNC Milling</span
                        >
                        <span class="table-cell-subtext d-block"
                          >Process: Vertical milling</span
                        >
                      </td>
                      <td>Rajkot, Gujarat</td>
                      <td>
                        <div
                          class="fw-semibold text-dark machine-rate-text"
                        >
                          &#8377;900/hr
                        </div>
                        <div class="table-cell-subtext machine-capacity-text">
                          6 hrs/day available
                        </div>
                      </td>
                      <td class="machine-status-cell">
                        <span class="status-badge status-active">
                          <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                          Active
                        </span>
                      </td>
                      <td class="machine-actions-cell">
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-view-machine"
                            data-machine-id="M-1003"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-edit-machine"
                            data-machine-id="M-1003"
                          >
                            <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                            Edit
                          </button>
                          <a
                            class="btn-im btn-im-outline btn-im-sm"
                            href="{{ route('owner.availability') }}"
                          >
                            <i class="fa-solid fa-calendar-days" aria-hidden="true"></i>
                            Availability
                          </a>
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-toggle-active"
                            data-machine-id="M-1003"
                          >
                            <i class="fa-solid fa-pause" aria-hidden="true"></i>
                            <span>Deactivate</span>
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr data-owner-machine-id="M-1004">
                      <td>
                        <div class="machine-name-cell">
                          <img
                            class="machine-thumb"
                            src="{{ asset('assets/images/machine-fabrication.svg') }}"
                            alt="Illustration of a heavy industrial machine."
                            width="48"
                            height="48"
                            loading="lazy"
                          />
                          <div>
                            <p class="table-cell-title mb-0">
                              Lokesh Heavy Duty Industrial Lathe 260
                            </p>
                            <span class="table-cell-subtext d-block"
                              >Lokesh Machines (260 Heavy)</span
                            >
                            <span class="table-cell-id">ID: M-1004</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="badge bg-light text-dark border mb-1"
                          >Industrial Lathe</span
                        >
                        <span class="table-cell-subtext d-block"
                          >Process: Turning</span
                        >
                      </td>
                      <td>Rajkot, Gujarat</td>
                      <td>
                        <div
                          class="fw-semibold text-dark machine-rate-text"
                        >
                          &#8377;650/hr
                        </div>
                        <div class="table-cell-subtext machine-capacity-text">
                          0 hrs/day &middot; maintenance
                        </div>
                      </td>
                      <td class="machine-status-cell">
                        <span class="status-badge status-maintenance">
                          <i class="fa-solid fa-wrench" aria-hidden="true"></i>
                          Maintenance
                        </span>
                      </td>
                      <td class="machine-actions-cell">
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-view-machine"
                            data-machine-id="M-1004"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-edit-machine"
                            data-machine-id="M-1004"
                          >
                            <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                            Edit
                          </button>
                          <a
                            class="btn-im btn-im-outline btn-im-sm"
                            href="{{ route('owner.availability') }}"
                          >
                            <i class="fa-solid fa-calendar-days" aria-hidden="true"></i>
                            Availability
                          </a>
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-toggle-active"
                            data-machine-id="M-1004"
                            title="Maintenance period is active"
                          >
                            <i class="fa-solid fa-wrench" aria-hidden="true"></i>
                            <span>Maintenance</span>
                          </button>
                        </div>
                      </td>
                    </tr>

                    <tr data-owner-machine-id="M-1005">
                      <td>
                        <div class="machine-name-cell">
                          <img
                            class="machine-thumb"
                            src="{{ asset('assets/images/machine-turning.svg') }}"
                            alt="Illustration of a CNC turning centre."
                            width="48"
                            height="48"
                            loading="lazy"
                          />
                          <div>
                            <p class="table-cell-title mb-0">
                              Jyoti CNC Turning Center DX-200
                            </p>
                            <span class="table-cell-subtext d-block"
                              >Jyoti CNC (DX-200)</span
                            >
                            <span class="table-cell-id">ID: M-1005</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="badge bg-light text-dark border mb-1"
                          >CNC Turning</span
                        >
                        <span class="table-cell-subtext d-block"
                          >Process: Turning</span
                        >
                      </td>
                      <td>Rajkot, Gujarat</td>
                      <td>
                        <div
                          class="fw-semibold text-dark machine-rate-text"
                        >
                          &#8377;950/hr
                        </div>
                        <div class="table-cell-subtext machine-capacity-text">
                          5 hrs/day &middot; awaiting review
                        </div>
                      </td>
                      <td class="machine-status-cell">
                        <span class="status-badge status-pending">
                          <i class="fa-regular fa-clock" aria-hidden="true"></i>
                          Pending Approval
                        </span>
                      </td>
                      <td class="machine-actions-cell">
                        <div class="table-actions">
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-view-machine"
                            data-machine-id="M-1005"
                          >
                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                            View
                          </button>
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            data-action="owner-edit-machine"
                            data-machine-id="M-1005"
                          >
                            <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                            Edit
                          </button>
                          <a
                            class="btn-im btn-im-outline btn-im-sm"
                            href="{{ route('owner.availability') }}"
                          >
                            <i class="fa-solid fa-calendar-days" aria-hidden="true"></i>
                            Availability
                          </a>
                          <button
                            class="btn-im btn-im-outline btn-im-sm"
                            type="button"
                            disabled
                            title="Awaiting admin approval"
                          >
                            <i class="fa-solid fa-lock" aria-hidden="true"></i>
                            <span>Pending</span>
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="dashboard-card-footer dashboard-card-footer-stack">
              <span
                >Status terms are preserved exactly: <code>pending</code>,
                <code>approved</code>, <code>rejected</code>, <code>active</code>,
                <code>inactive</code>, <code>maintenance</code>. Only approved
                machines appear in the marketplace, and only active machines can
                receive requests.</span
              >
            </div>
          </section>

@push('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var table = document.getElementById("my-machines-table");
        if (!table) {
          return;
        }
        var search = document.getElementById("owner-machine-search");
        var status = document.getElementById("owner-machine-status-filter");
        var reset = document.getElementById("owner-machine-filter-reset");

        function applyFilters() {
          var term = (search.value || "").toLowerCase();
          var state = (status.value || "").toLowerCase();
          Array.prototype.forEach.call(
            table.querySelectorAll("tbody tr"),
            function (row) {
              var statusCell = row.querySelector(".machine-status-cell");
              var rowStatus = statusCell ? statusCell.textContent.toLowerCase() : "";
              var matchesTerm = !term || row.textContent.toLowerCase().indexOf(term) !== -1;
              var matchesStatus = !state || rowStatus.indexOf(state) !== -1;
              row.hidden = !(matchesTerm && matchesStatus);
            }
          );
        }

        search.addEventListener("input", applyFilters);
        status.addEventListener("change", applyFilters);
        reset.addEventListener("click", function () {
          search.value = "";
          status.value = "";
          applyFilters();
        });
      });
    </script>
@endpush
@endsection
