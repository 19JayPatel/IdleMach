{{-- Shared owner prototype modals and notifications offcanvas. Included by the owner layout so every owner screen keeps the existing interactions. --}}
    <!-- ================= View machine modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-owner-view-machine"
      tabindex="-1"
      aria-labelledby="ovm-title"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
      >
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">Machine details</p>
              <h2 class="modal-title h5 mb-0" id="ovm-title">
                Machine listing
              </h2>
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close machine details"
            ></button>
          </div>
          <div class="modal-body">
            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
              <span class="status-badge status-active" id="ovm-status-badge">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                ACTIVE
              </span>
            </div>

            <dl class="row mb-0">
              <dt class="col-sm-4">Machine ID</dt>
              <dd class="col-sm-8"><span id="ovm-id">M-1001</span></dd>

              <dt class="col-sm-4">Machine type</dt>
              <dd class="col-sm-8" id="ovm-type">CNC Turning</dd>

              <dt class="col-sm-4">Brand / model</dt>
              <dd class="col-sm-8" id="ovm-brand-model">Haas (ST-20)</dd>

              <dt class="col-sm-4">Location</dt>
              <dd class="col-sm-8" id="ovm-location">Rajkot, Gujarat</dd>

              <dt class="col-sm-4">Hourly rate</dt>
              <dd class="col-sm-8" id="ovm-rate">&#8377;800/hr</dd>

              <dt class="col-sm-4">Available capacity</dt>
              <dd class="col-sm-8" id="ovm-capacity">8 hrs/day</dd>

              <dt class="col-sm-4">Work envelope</dt>
              <dd class="col-sm-8" id="ovm-envelope">
                Max Dia: 320 mm &middot; Max Length: 500 mm
              </dd>

              <dt class="col-sm-4">Specifications</dt>
              <dd class="col-sm-8" id="ovm-specs">
                Haas CNC Control &middot; 4,000 RPM &middot; 12-Station Turret
              </dd>

              <dt class="col-sm-4">Materials</dt>
              <dd class="col-sm-8 mb-0" id="ovm-materials">
                Mild Steel, Alloy Steel, Aluminium, Brass
              </dd>
            </dl>

            <div class="dashboard-demo-banner mb-0 mt-3" role="note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>
                Specifications are owner-provided. Only approved machines
                appear in the marketplace, and only active machines can receive
                new requests.
              </div>
            </div>
          </div>
          <div class="modal-footer">
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

    <!-- ================= Edit machine modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-owner-edit-machine"
      tabindex="-1"
      aria-labelledby="modal-owner-edit-machine-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">Listing maintenance</p>
              <h2 class="modal-title h5 mb-0" id="modal-owner-edit-machine-label">
                Edit machine
              </h2>
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close edit machine form"
            ></button>
          </div>
          <div class="modal-body">
            <form id="form-owner-edit-machine">
              <div class="row g-3">
                <div class="col-12">
                  <p class="table-cell-subtext mb-0">
                    Machine ID:
                    <span class="table-cell-id" id="edit-m-id">M-1001</span>
                  </p>
                </div>
                <div class="col-md-7">
                  <label class="form-label" for="edit-m-name">Machine name</label>
                  <input
                    class="form-control"
                    id="edit-m-name"
                    name="machine_name"
                    type="text"
                    required
                  />
                </div>
                <div class="col-md-5">
                  <label class="form-label" for="edit-m-rate"
                    >Hourly rate (&#8377;)</label
                  >
                  <input
                    class="form-control"
                    id="edit-m-rate"
                    name="hourly_rate"
                    type="number"
                    min="1"
                    step="1"
                    required
                  />
                </div>
                <div class="col-md-5">
                  <label class="form-label" for="edit-m-capacity"
                    >Available capacity (hrs/day)</label
                  >
                  <input
                    class="form-control"
                    id="edit-m-capacity"
                    name="available_capacity"
                    type="number"
                    min="0"
                    max="24"
                    step="1"
                    required
                  />
                </div>
                <div class="col-12">
                  <label class="form-label" for="edit-m-specs"
                    >Specifications</label
                  >
                  <textarea
                    class="form-control"
                    id="edit-m-specs"
                    name="specifications"
                    rows="3"
                  ></textarea>
                </div>
                <div class="col-12">
                  <label class="form-label" for="edit-m-image"
                    >Machine image</label
                  >
                  <input
                    class="form-control"
                    id="edit-m-image"
                    name="machine_image"
                    type="file"
                    accept="image/*"
                    disabled
                    aria-describedby="edit-m-image-help"
                  />
                  <p class="form-text" id="edit-m-image-help">
                    File uploads are disabled. Existing project illustrations
                    remain in use.
                  </p>
                </div>
              </div>
              <div class="dashboard-demo-banner mb-0 mt-3" role="note">
                <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                <div>
                  Saving updates only this page&rsquo;s data. Status, approval,
                  and marketplace state are not changed by this form.
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn-im btn-im-outline"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button
              class="btn-im btn-im-primary"
              type="submit"
              form="form-owner-edit-machine"
            >
              <i class="fa-solid fa-floppy-disk" aria-hidden="true"></i>
              Save changes
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= Add machine modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-add-machine"
      tabindex="-1"
      aria-labelledby="modal-add-machine-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">New listing</p>
              <h2 class="modal-title h5 mb-0" id="modal-add-machine-label">
                Add machine for admin review
              </h2>
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close add machine form"
            ></button>
          </div>
          <div class="modal-body">
            <div class="im-alert im-alert-info mb-3" role="note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>
                A new listing starts as <code>pending</code>. Only approved
                machines appear in the marketplace; activation is a separate
                step. Nothing is uploaded or saved to a database.
              </div>
            </div>
            <form id="form-add-machine">
              <div class="row g-3">
                <div class="col-md-7">
                  <label class="form-label form-required" for="add-m-name"
                    >Machine name</label
                  >
                  <input
                    class="form-control"
                    id="add-m-name"
                    name="machine_name"
                    type="text"
                    placeholder="Example: Haas CNC Turning Machine ST-20"
                    required
                  />
                </div>
                <div class="col-md-5">
                  <label class="form-label form-required" for="add-m-type"
                    >Machine type</label
                  >
                  <select class="form-select" id="add-m-type" name="machine_type" required>
                    <option value="" selected disabled>Select machine type</option>
                    <option value="CNC Turning">CNC Turning</option>
                    <option value="3-Axis VMC">3-Axis VMC</option>
                    <option value="CNC Milling">CNC Milling</option>
                    <option value="Industrial Lathe">Industrial Lathe</option>
                    <option value="Fabrication">Fabrication</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="add-m-brand">Brand</label>
                  <input
                    class="form-control"
                    id="add-m-brand"
                    name="brand"
                    type="text"
                    placeholder="Example: Haas"
                  />
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="add-m-model">Model</label>
                  <input
                    class="form-control"
                    id="add-m-model"
                    name="model"
                    type="text"
                    placeholder="Example: ST-20"
                  />
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="add-m-rate"
                    >Hourly rate (&#8377;)</label
                  >
                  <input
                    class="form-control"
                    id="add-m-rate"
                    name="hourly_rate"
                    type="number"
                    min="1"
                    step="1"
                    placeholder="850"
                  />
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="add-m-capacity"
                    >Available capacity (hrs/day)</label
                  >
                  <input
                    class="form-control"
                    id="add-m-capacity"
                    name="available_capacity"
                    type="number"
                    min="0"
                    max="24"
                    step="1"
                    placeholder="4"
                  />
                </div>
                <div class="col-12">
                  <label class="form-label" for="add-m-envelope"
                    >Work envelope</label
                  >
                  <input
                    class="form-control"
                    id="add-m-envelope"
                    name="work_envelope"
                    type="text"
                    placeholder="Max Dia: 320 mm Â· Max Length: 500 mm"
                  />
                </div>
                <div class="col-12">
                  <label class="form-label" for="add-m-specs"
                    >Specifications</label
                  >
                  <textarea
                    class="form-control"
                    id="add-m-specs"
                    name="specifications"
                    rows="2"
                    placeholder="Owner-provided control, spindle, accuracy, and table details."
                  ></textarea>
                </div>
                <div class="col-12">
                  <label class="form-label" for="add-m-materials">Materials</label>
                  <input
                    class="form-control"
                    id="add-m-materials"
                    name="materials"
                    type="text"
                    placeholder="Mild Steel, Aluminium 6061, Brass"
                  />
                </div>
                <div class="col-12">
                  <label class="form-label" for="add-m-image"
                    >Machine image</label
                  >
                  <input
                    class="form-control"
                    id="add-m-image"
                    name="machine_image"
                    type="file"
                    accept="image/*"
                    disabled
                    aria-describedby="add-m-image-help"
                  />
                  <p class="form-text" id="add-m-image-help">
                    File upload is disabled. A project illustration is shown
                    instead.
                  </p>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn-im btn-im-outline"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button
              class="btn-im btn-im-primary"
              type="submit"
              form="form-add-machine"
            >
              <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
              Submit for approval
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= View booking request modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-owner-view-request"
      tabindex="-1"
      aria-labelledby="ovr-title"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
      >
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">Incoming request</p>
              <h2 class="modal-title h5 mb-0" id="ovr-title">
                Booking request <span id="ovr-id">BR-2043</span>
              </h2>
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close request details"
            ></button>
          </div>
          <div class="modal-body">
            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
              <span class="status-badge status-pending" id="ovr-status-badge">
                <i class="fa-regular fa-clock" aria-hidden="true"></i>
                PENDING
              </span>
            </div>

            <dl class="row mb-0">
              <dt class="col-sm-4">Buyer / company</dt>
              <dd class="col-sm-8" id="ovr-buyer">
                Delta Gears &amp; Shafts (Vijay Chawla)
              </dd>

              <dt class="col-sm-4">Machine</dt>
              <dd class="col-sm-8" id="ovr-machine">
                Haas VF-2 CNC Vertical Milling
              </dd>

              <dt class="col-sm-4">Requested date</dt>
              <dd class="col-sm-8" id="ovr-date">
                30 Oct 2026, 02:00 PM &ndash; 06:00 PM
              </dd>

              <dt class="col-sm-4">Requested hours</dt>
              <dd class="col-sm-8" id="ovr-hours">4 hours</dd>

              <dt class="col-sm-4">Rate</dt>
              <dd class="col-sm-8" id="ovr-rate">&#8377;900/hr</dd>

              <dt class="col-sm-4">Expected amount</dt>
              <dd class="col-sm-8" id="ovr-total">&#8377;3,600</dd>

              <dt class="col-sm-4">Material</dt>
              <dd class="col-sm-8" id="ovr-material">Cast Steel Grade 2</dd>

              <dt class="col-sm-4">Quantity</dt>
              <dd class="col-sm-8" id="ovr-quantity">15 pieces</dd>

              <dt class="col-sm-4">Work description</dt>
              <dd class="col-sm-8" id="ovr-desc">
                Keyway slotting and bolt pattern face milling on pinion drive
                blanks.
              </dd>

              <dt class="col-sm-4">Drawing reference</dt>
              <dd class="col-sm-8 mb-0" id="ovr-drawing">
                PinionBlank_FaceMill.dwg (reference)
              </dd>
            </dl>

            <div class="dashboard-demo-banner mb-0 mt-3" role="note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>
                The owner reviews the request before any payment step. Accepting
                moves it to <code>payment_pending</code>; it is confirmed only
                after successful buyer payment. Document files are not
                downloadable.
              </div>
            </div>
          </div>
          <div class="modal-footer">
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

    <!-- ================= Accept request modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-owner-accept-request"
      tabindex="-1"
      aria-labelledby="modal-owner-accept-request-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h2
              class="modal-title h5"
              id="modal-owner-accept-request-label"
            >
              Accept booking request
            </h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close acceptance confirmation"
            ></button>
          </div>
          <div class="modal-body">
            <p>
              Accepting moves request
              <strong id="accept-req-id">BR-2043</strong> to
              <strong>payment_pending</strong>. The buyer is prompted to pay
              next. The booking is confirmed only after successful payment.
            </p>
            <dl class="row mb-0">
              <dt class="col-sm-4">Buyer</dt>
              <dd class="col-sm-8" id="accept-req-buyer">
                Delta Gears &amp; Shafts (Vijay Chawla)
              </dd>
              <dt class="col-sm-4">Machine</dt>
              <dd class="col-sm-8" id="accept-req-machine">
                Haas VF-2 CNC Vertical Milling
              </dd>
              <dt class="col-sm-4">Expected amount</dt>
              <dd class="col-sm-8 mb-0" id="accept-req-total">&#8377;3,600</dd>
            </dl>
            <div class="dashboard-demo-banner mb-0 mt-3" role="note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>
                No payment is collected or recorded here. This action changes
                only the local status and does not modify a database.
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn-im btn-im-outline"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button
              type="button"
              class="btn-im btn-im-primary"
              id="btn-confirm-accept-request"
            >
              <i class="fa-solid fa-check" aria-hidden="true"></i>
              Accept and request payment
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= Reject request modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-owner-reject-request"
      tabindex="-1"
      aria-labelledby="modal-owner-reject-request-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h2
              class="modal-title h5"
              id="modal-owner-reject-request-label"
            >
              Reject booking request
            </h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close rejection form"
            ></button>
          </div>
          <div class="modal-body">
            <p class="mb-3">
              Request <strong id="reject-req-id">BR-2043</strong> from
              <strong id="reject-req-buyer">Delta Gears &amp; Shafts</strong>
              for <strong id="reject-req-machine"
                >Haas VF-2 CNC Vertical Milling</strong
              >
              will be marked rejected. No payment record is created.
            </p>
            <div class="mb-3">
              <label class="form-label" for="reject-req-reason-select"
                >Reason</label
              >
              <select
                class="form-select"
                id="reject-req-reason-select"
                name="rejection_reason"
              >
                <option value="Capacity already booked for another order">
                  Capacity already booked for another order
                </option>
                <option value="Machine scheduled for maintenance">
                  Machine scheduled for maintenance
                </option>
                <option value="Requested material is outside supported range">
                  Requested material is outside supported range
                </option>
                <option value="Requested timeline cannot be met">
                  Requested timeline cannot be met
                </option>
                <option value="Other reason">Other reason</option>
              </select>
            </div>
            <div>
              <label class="form-label" for="reject-req-notes"
                >Notes to buyer (optional)</label
              >
              <textarea
                class="form-control"
                id="reject-req-notes"
                name="rejection_notes"
                rows="3"
                placeholder="This note is not sent."
              ></textarea>
            </div>
            <div class="dashboard-demo-banner mb-0 mt-3" role="note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>
                Rejection is final for this session until the request state is
                reset. No database is modified.
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn-im btn-im-outline"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button
              type="button"
              class="btn-im btn-im-danger"
              id="btn-confirm-reject-request"
            >
              <i class="fa-solid fa-xmark" aria-hidden="true"></i>
              Reject request
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= View booking modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-owner-view-booking"
      tabindex="-1"
      aria-labelledby="ovb-title"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
      >
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">Booking details</p>
              <h2 class="modal-title h5 mb-0" id="ovb-title">
                Booking <span id="ovb-id">CS-10026</span>
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
              <span
                class="status-badge status-in-progress"
                id="ovb-status-badge"
              >
                <i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i>
                IN PROGRESS
              </span>
              <span
                class="status-badge status-successful"
                id="ovb-payment-badge"
              >
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                SUCCESSFUL
              </span>
            </div>

            <dl class="row mb-0">
              <dt class="col-sm-4">Buyer / company</dt>
              <dd class="col-sm-8" id="ovb-buyer">
                Metro Engineering Works (Sunil Rao)
              </dd>

              <dt class="col-sm-4">Machine</dt>
              <dd class="col-sm-8" id="ovb-machine">
                ACE Micromatic VMC 850V (M-1002)
              </dd>

              <dt class="col-sm-4">Schedule</dt>
              <dd class="col-sm-8" id="ovb-date">
                27 Sep 2026, 08:00 AM &ndash; 12:00 AM
              </dd>

              <dt class="col-sm-4">Duration</dt>
              <dd class="col-sm-8" id="ovb-hours">16 hours</dd>

              <dt class="col-sm-4">Rate</dt>
              <dd class="col-sm-8" id="ovb-rate">&#8377;1,200/hr</dd>

              <dt class="col-sm-4">Total</dt>
              <dd class="col-sm-8" id="ovb-total">&#8377;19,200</dd>

              <dt class="col-sm-4">Work progress</dt>
              <dd class="col-sm-8" id="ovb-progress">60% complete</dd>

              <dt class="col-sm-4">Status note</dt>
              <dd class="col-sm-8 mb-0" id="ovb-note">
                VMC milling of aluminium 6061-T6 die plates is in progress. The
                booking covers 20 sets.
              </dd>
            </dl>

            <div class="dashboard-demo-banner mb-0 mt-3" role="note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>
                Booking details are read-only in this view. Progress and
                completion actions are available only from the Ongoing Work
                table and remain local interactions.
              </div>
            </div>
          </div>
          <div class="modal-footer">
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

    <!-- ================= Complete work modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-owner-complete-work"
      tabindex="-1"
      aria-labelledby="modal-owner-complete-work-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title h5" id="modal-owner-complete-work-label">
              Mark work completed
            </h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close completion confirmation"
            ></button>
          </div>
          <div class="modal-body">
            <p>
              Confirm that the physical work for booking
              <strong id="complete-work-id">CS-10026</strong> is finished.
              Completion is allowed only for a paid, confirmed, or in-progress
              booking.
            </p>
            <dl class="row mb-3">
              <dt class="col-sm-4">Machine</dt>
              <dd class="col-sm-8" id="complete-work-machine">
                Haas VF-2 CNC Vertical Milling (M-1003)
              </dd>
              <dt class="col-sm-4">Buyer</dt>
              <dd class="col-sm-8 mb-0" id="complete-work-buyer">
                Kavita Hydraulics (Dharmesh Mehta)
              </dd>
            </dl>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                id="complete-work-confirm"
              />
              <label class="form-check-label" for="complete-work-confirm">
                I confirm that the machining work is physically finished and
                ready for buyer review.
              </label>
            </div>
            <div class="dashboard-demo-banner mb-0 mt-3" role="note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <div>
                Completing this booking marks it review-eligible. It does not
                settle a real payout or update a database.
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn-im btn-im-outline"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button
              type="button"
              class="btn-im btn-im-primary"
              id="btn-confirm-complete-work"
            >
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              Confirm completion
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= Update progress modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-owner-progress"
      tabindex="-1"
      aria-labelledby="modal-owner-progress-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title h5" id="modal-owner-progress-label">
              Update work progress
            </h2>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close progress form"
            ></button>
          </div>
          <div class="modal-body">
            <form id="form-owner-progress">
              <p class="mb-3">
                Booking
                <strong id="progress-booking-id">CS-10026</strong>
                is in progress and paid.
              </p>
              <div class="mb-3">
                <label class="form-label" for="progress-note-input"
                  >Progress note</label
                >
                <textarea
                  class="form-control"
                  id="progress-note-input"
                  name="progress_note"
                  rows="4"
                  placeholder="Example: Facing complete; keyway slotting in progress."
                ></textarea>
              </div>
              <div class="dashboard-demo-banner mb-0" role="note">
                <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                <div>
                  The note is shown only in the notice. It is not sent to the
                  buyer and does not change a stored booking record.
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn-im btn-im-outline"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button
              class="btn-im btn-im-primary"
              type="submit"
              form="form-owner-progress"
            >
              <i class="fa-solid fa-list-check" aria-hidden="true"></i>
              Log progress
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- ================= Company profile modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-owner-company-profile"
      tabindex="-1"
      aria-labelledby="modal-owner-company-profile-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <div>
              <p class="eyebrow mb-1">My business</p>
              <h2
                class="modal-title h5 mb-0"
                id="modal-owner-company-profile-label"
              >
                Company profile
              </h2>
            </div>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close company profile"
            ></button>
          </div>
          <div class="modal-body">
            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
              <span class="status-badge status-approved">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Owner account
              </span>
            </div>
            <form id="form-owner-company-profile">
              <div class="row g-3">
                <div class="col-md-7">
                  <label class="form-label" for="company-name"
                    >Company name</label
                  >
                  <input
                    class="form-control"
                    id="company-name"
                    name="company_name"
                    type="text"
                    value="Patel Engineering"
                  />
                </div>
                <div class="col-md-5">
                  <label class="form-label" for="company-contact"
                    >Contact person</label
                  >
                  <input
                    class="form-control"
                    id="company-contact"
                    name="contact_person"
                    type="text"
                    value="Nilesh Patel"
                  />
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="company-email"
                    >Email</label
                  >
                  <input
                    class="form-control"
                    id="company-email"
                    name="email"
                    type="email"
                    value="owner@example.test"
                    autocomplete="off"
                  />
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="company-phone"
                    >Phone</label
                  >
                  <input
                    class="form-control"
                    id="company-phone"
                    name="phone"
                    type="tel"
                    value="+91 00000 00000"
                    autocomplete="off"
                  />
                </div>
                <div class="col-12">
                  <label class="form-label" for="company-address">Address</label>
                  <input
                    class="form-control"
                    id="company-address"
                    name="address"
                    type="text"
                    value="Plot 42, GIDC Industrial Estate"
                  />
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="company-city">City</label>
                  <input
                    class="form-control"
                    id="company-city"
                    name="city"
                    type="text"
                    value="Rajkot"
                  />
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="company-state">State</label>
                  <input
                    class="form-control"
                    id="company-state"
                    name="state"
                    type="text"
                    value="Gujarat"
                  />
                </div>
                <div class="col-md-4">
                  <label class="form-label" for="company-pincode">Pincode</label>
                  <input
                    class="form-control"
                    id="company-pincode"
                    name="pincode"
                    type="text"
                    value="360004"
                    inputmode="numeric"
                  />
                </div>
                <div class="col-12">
                  <label class="form-label" for="company-description"
                    >Business description</label
                  >
                  <textarea
                    class="form-control"
                    id="company-description"
                    name="description"
                    rows="3"
                  >Precision CNC turning and milling workshop serving industrial buyers with unused daily capacity.</textarea>
                </div>
                <div class="col-12">
                  <label class="form-label" for="company-logo"
                    >Company logo</label
                  >
                  <input
                    class="form-control"
                    id="company-logo"
                    name="company_logo"
                    type="file"
                    accept="image/*"
                    disabled
                    aria-describedby="company-logo-help"
                  />
                  <p class="form-text" id="company-logo-help">
                    File uploads are disabled. No profile information is stored
                    or transmitted.
                  </p>
                </div>
              </div>
              <div class="dashboard-demo-banner mb-0 mt-3" role="note">
                <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                <div>
                  Do not enter real personal, financial, or registration
                  information. Saving changes is local to this page.
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn-im btn-im-outline"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button
              class="btn-im btn-im-primary"
              type="submit"
              form="form-owner-company-profile"
            >
              <i class="fa-solid fa-floppy-disk" aria-hidden="true"></i>
              Save profile
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Real logout endpoint used by the confirmation modal. -->
    <form id="owner-logout-form" method="POST" action="{{ route('logout') }}" class="d-none">
      @csrf
    </form>

    <!-- ================= Owner logout modal ================= -->
    <div
      class="modal fade"
      role="dialog"
      id="modal-owner-logout"
      tabindex="-1"
      aria-labelledby="modal-owner-logout-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title h5" id="modal-owner-logout-label">
              Sign out of the owner dashboard?
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
              form="owner-logout-form"
              class="btn-im btn-im-danger"
              id="btn-confirm-owner-logout"
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
          <p class="small text-muted mb-0">Owner inbox</p>
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
            class="notification-icon activity-icon-info"
            aria-hidden="true"
          >
            <i class="fa-solid fa-inbox"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">
              New booking request BR-2043 from Delta Gears &amp; Shafts
            </p>
            <span class="notification-time">Today, 10:15 AM</span>
          </div>
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
              BR-2041 is awaiting buyer payment
            </p>
            <span class="notification-time">Today, 09:40 AM</span>
          </div>
        </div>

        <div class="notification-item unread">
          <span
            class="notification-icon activity-icon-warning"
            aria-hidden="true"
          >
            <i class="fa-solid fa-clipboard-check"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">
              Machine M-1005 is awaiting admin approval
            </p>
            <span class="notification-time">Yesterday, 04:20 PM</span>
          </div>
        </div>

        <div class="notification-item">
          <span
            class="notification-icon activity-icon-success"
            aria-hidden="true"
          >
            <i class="fa-solid fa-screwdriver-wrench"></i>
          </span>
          <div class="notification-body">
            <p class="notification-title">
              Booking CS-10026 moved to in progress
            </p>
            <span class="notification-time">Today, 08:05 AM</span>
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