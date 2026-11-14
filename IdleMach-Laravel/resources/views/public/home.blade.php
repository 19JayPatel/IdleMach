@extends('layouts.public')

@section('title', 'IdleMach — Turn Idle Capacity Into Opportunity')

@section('content')
  <!-- Hero -->
  <section class="home-hero" aria-labelledby="hero-title">
    <div class="container-im">
      <div class="row g-4 g-lg-5 align-items-center">
        <div class="col-lg-6">
          <p class="eyebrow">Manufacturing capacity marketplace</p>
          <h1 class="display-title home-display-title" id="hero-title">
            Turn Idle Capacity Into Opportunity.
          </h1>
          <p class="hero-lead">
            IdleMach connects machine owners with unused manufacturing hours
            to buyers who need work done. Owners list capacity, buyers
            request it, and admins review and monitor platform activity.
          </p>

          <div class="hero-actions">
            <a class="btn-im btn-im-primary btn-im-lg" href="#discovery">
              Find manufacturing capacity
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
            <a class="btn-im btn-im-outline btn-im-lg" href="#for-owners"
              >List idle capacity</a
            >
          </div>

          <ul class="hero-roles" aria-label="Who IdleMach connects">
            <li>
              <i class="fa-solid fa-industry" aria-hidden="true"></i>
              <span><strong>Machine owners</strong> with unused hours</span>
            </li>
            <li>
              <i
                class="fa-solid fa-magnifying-glass"
                aria-hidden="true"
              ></i>
              <span><strong>Buyers</strong> who need capacity</span>
            </li>
            <li>
              <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
              <span><strong>Admins</strong> who review and monitor</span>
            </li>
          </ul>
        </div>

        <div class="col-lg-6">
          <figure class="hero-visual">
            <img
              src="{{ asset('assets/images/HomePage/hero-section_2.jpg') }}"
              width="880"
              height="720"
              alt="Workshop photograph of a CNC machining shop floor."
              decoding="async">
            <figcaption>
              <span class="status-badge status-neutral">
                <i class="fa-solid fa-pen-ruler" aria-hidden="true"></i>
                Workshop photograph
              </span>
              <span
                >Idle hours become available capacity. The owner decides
                what to list.</span
              >
            </figcaption>
          </figure>
        </div>
      </div>
    </div>
  </section>

  <!-- Machine discovery -->
  <section
    class="section discovery-section"
    id="discovery"
    aria-labelledby="discovery-title"
  >
    <div class="container-im">
      <div class="discovery-panel">
        <div class="row g-4 g-lg-5">
          <div class="col-lg-5">
            <p class="eyebrow">Machine discovery</p>
            <h2 class="section-title" id="discovery-title">
              Start with the capacity you need.
            </h2>
            <p class="lead mb-3">
              Search the marketplace by machine, process, or location here,
              or open Explore Machines to filter the listings in one place.
            </p>
            <a class="text-link" href="{{ url('/machines') }}">
              Open Explore Machines
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>

          <div class="col-lg-7">
            <form
              class="capacity-search"
              id="capacity-search-form"
              role="search"
              aria-label="Search manufacturing capacity"
            >
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label" for="capacity-keyword"
                    >Machine, process, or owner</label
                  >
                  <div class="search-input">
                    <i
                      class="fa-solid fa-magnifying-glass"
                      aria-hidden="true"
                    ></i>
                    <input
                      class="form-control"
                      id="capacity-keyword"
                      name="keyword"
                      type="search"
                      placeholder="e.g. CNC turning, VMC, Rajkot"
                      autocomplete="off">
                  </div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label" for="capacity-process"
                    >Process</label
                  >
                  <select
                    class="form-select"
                    id="capacity-process"
                    name="process"
                  >
                    <option value="">All processes</option>
                    <option value="turning">CNC turning</option>
                    <option value="milling">CNC milling</option>
                    <option value="fabrication">Fabrication</option>
                  </select>
                </div>

                <div class="col-sm-6">
                  <label class="form-label" for="capacity-location"
                    >Location</label
                  >
                  <select
                    class="form-select"
                    id="capacity-location"
                    name="location"
                  >
                    <option value="">All locations</option>
                    <option value="rajkot">Rajkot</option>
                    <option value="coimbatore">Coimbatore</option>
                    <option value="pune">Pune</option>
                  </select>
                </div>
              </div>

              <div class="search-actions">
                <button class="btn-im btn-im-primary" type="submit">
                  <i
                    class="fa-solid fa-magnifying-glass"
                    aria-hidden="true"
                  ></i>
                  Search capacity
                </button>
                <button class="btn-im btn-im-outline" type="reset">
                  Clear
                </button>
                <p class="search-note mb-0" id="search-note">
                  Filters the listings on this page.
                </p>
              </div>

              <div
                class="search-suggestions"
                role="group"
                aria-label="Example searches"
              >
                <span class="meta-label mb-0">Try</span>
                <button
                  class="search-chip"
                  type="button"
                  data-search-suggestion="CNC turning"
                >
                  CNC turning
                </button>
                <button
                  class="search-chip"
                  type="button"
                  data-search-suggestion="VMC"
                >
                  VMC
                </button>
                <button
                  class="search-chip"
                  type="button"
                  data-search-suggestion="Rajkot"
                >
                  Rajkot
                </button>
                <button
                  class="search-chip"
                  type="button"
                  data-search-suggestion="Fabrication"
                >
                  Fabrication
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- How it works -->
  <section
    class="section how-section"
    id="how-it-works"
    aria-labelledby="how-title"
  >
    <div class="container-im">
      <div class="section-header">
        <p class="eyebrow">How it works</p>
        <h2 class="section-title" id="how-title">
          Two sides of the same booking.
        </h2>
        <p class="lead">
          Owners keep control of their machines. Buyers see the capacity
          before they request it. Every booking follows the same clear
          sequence.
        </p>
      </div>

      <ol class="process-rail" aria-label="Core booking sequence">
        <li><span class="process-number">01</span>List capacity</li>
        <li><span class="process-number">02</span>Request work</li>
        <li><span class="process-number">03</span>Accept and pay</li>
        <li><span class="process-number">04</span>Complete and review</li>
      </ol>

      <div class="row g-4 g-lg-5">
        <div class="col-lg-6" id="owner-journey">
          <div class="journey-panel journey-panel-owner">
            <div class="journey-head">
              <span class="journey-role">
                <i class="fa-solid fa-industry" aria-hidden="true"></i>
                For machine owners
              </span>
              <h3>List the hours you are not using.</h3>
              <p>
                Add the machine and set the availability that suits your
                schedule. You review every request before a booking moves
                forward.
              </p>
            </div>

            <ol class="journey-steps">
              <li>
                <span class="journey-number">01</span>
                <div>
                  <h4>Add the machine</h4>
                  <p>
                    Capture the machine, process, location, rate, and
                    available hours.
                  </p>
                </div>
              </li>
              <li>
                <span class="journey-number">02</span>
                <div>
                  <h4>Review requests</h4>
                  <p>
                    Approve the work that fits your capacity and schedule.
                  </p>
                </div>
              </li>
              <li>
                <span class="journey-number">03</span>
                <div>
                  <h4>Confirm after payment</h4>
                  <p>
                    Payment is requested after you accept, and the booking
                    is confirmed after it succeeds.
                  </p>
                </div>
              </li>
              <li>
                <span class="journey-number">04</span>
                <div>
                  <h4>Complete the work</h4>
                  <p>
                    Finish the job, close the booking, and review the
                    completed work.
                  </p>
                </div>
              </li>
            </ol>

            <a class="text-link" href="#for-owners">
              Read the owner overview
              <i class="fa-solid fa-arrow-down" aria-hidden="true"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-6" id="buyer-journey">
          <div class="journey-panel journey-panel-buyer">
            <div class="journey-head">
              <span class="journey-role">
                <i
                  class="fa-solid fa-magnifying-glass"
                  aria-hidden="true"
                ></i>
                For buyers
              </span>
              <h3>Find capacity for the work you need.</h3>
              <p>
                Search for a suitable machine, send the work details, and
                know exactly where the request stands.
              </p>
            </div>

            <ol class="journey-steps">
              <li>
                <span class="journey-number">01</span>
                <div>
                  <h4>Discover capacity</h4>
                  <p>
                    Search by machine, process, location, rate, and
                    availability.
                  </p>
                </div>
              </li>
              <li>
                <span class="journey-number">02</span>
                <div>
                  <h4>Send a request</h4>
                  <p>
                    Share the quantity, material, timing, and work details.
                  </p>
                </div>
              </li>
              <li>
                <span class="journey-number">03</span>
                <div>
                  <h4>Pay after acceptance</h4>
                  <p>
                    The owner accepts first. Payment is requested only after
                    that decision.
                  </p>
                </div>
              </li>
              <li>
                <span class="journey-number">04</span>
                <div>
                  <h4>Book and track</h4>
                  <p>
                    The booking is confirmed after successful payment, with
                    the work tracked to completion.
                  </p>
                </div>
              </li>
            </ol>

            <a class="text-link" href="#for-buyers">
              Read the buyer overview
              <i class="fa-solid fa-arrow-down" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="im-alert im-alert-info mt-4" role="note">
        <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
        <div>
          <strong>Intended workflow.</strong>
          Owner acceptance comes before payment, and a booking is confirmed
          only after payment succeeds. Accounts, payments, and bookings are
          not connected.
        </div>
      </div>
    </div>
  </section>

  <!-- For machine owners -->
  <section
    class="section split-section owner-section"
    id="for-owners"
    aria-labelledby="owners-title"
  >
    <div class="container-im">
      <div class="row g-4 g-lg-5 align-items-center">
        <div class="col-lg-5">
          <figure class="split-media">
            <img
              src="{{ asset('assets/images/owner-capacity.jpg') }}"
              width="720"
              height="560"
              alt="Machine operator standing beside a CNC machine in an organised manufacturing workshop."
              loading="lazy"
              decoding="async">
            <figcaption>
              <span class="status-badge status-neutral">
                <i class="fa-solid fa-pen-ruler" aria-hidden="true"></i>
                Photograph
              </span>
              <span>Availability is set by the machine owner.</span>
            </figcaption>
          </figure>
        </div>

        <div class="col-lg-7">
          <p class="eyebrow">For machine owners</p>
          <h2 class="section-title" id="owners-title">
            Turn quiet hours into booked work.
          </h2>
          <p class="lead">
            If a machine is idle for part of the week, list those hours. You
            set the availability and rate, review every request, and decide
            which work to accept.
          </p>

          <ul class="check-list feature-list">
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span
                >List machine details, process, location, rate, and
                available hours.</span
              >
            </li>
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span
                >Decide when the machine is available and which requests
                fit.</span
              >
            </li>
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span
                >Accept a request before payment is requested from the
                buyer.</span
              >
            </li>
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span
                >Track confirmed work through to completion and
                review.</span
              >
            </li>
          </ul>

          <div class="section-actions">
            <a class="btn-im btn-im-primary" href="#owner-journey">
              See the owner journey
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
            <a
              class="btn-im btn-im-outline"
              href="{{ url('/register') }}?role=owner"
            >
              Register as a Machine Owner
            </a>
          </div>

          <p class="section-footnote">
            <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
            Account registration and listing management are not connected.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- For buyers -->
  <section
    class="section split-section buyer-section"
    id="for-buyers"
    aria-labelledby="buyers-title"
  >
    <div class="container-im">
      <div class="row g-4 g-lg-5 align-items-center">
        <div class="col-lg-7">
          <p class="eyebrow">For buyers</p>
          <h2 class="section-title" id="buyers-title">
            Find the capacity to finish the job.
          </h2>
          <p class="lead">
            Search approved machine listings by process, location, and
            availability. Send the work details, then pay only after the
            owner accepts.
          </p>

          <ul class="check-list feature-list">
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span
                >Search by machine type, process, owner, or location.</span
              >
            </li>
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span
                >Compare rate, available capacity, and availability before
                requesting.</span
              >
            </li>
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span
                >Send a request with quantity, material, tolerance, and
                timing.</span
              >
            </li>
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span
                >Pay after acceptance and track the booking to
                completion.</span
              >
            </li>
          </ul>

          <div class="section-actions">
            <a class="btn-im btn-im-primary" href="#discovery">
              Search capacity
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
            <a class="btn-im btn-im-outline" href="#buyer-journey"
              >See the buyer journey</a
            >
          </div>

          <p class="section-footnote">
            <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
            Booking requests and payments are not connected.
          </p>
        </div>

        <div class="col-lg-5">
          <figure class="split-media">
            <img
              src="{{ asset('assets/images/buyer-part.jpg') }}"
              width="720"
              height="560"
              alt="Manufacturing engineer inspecting a precision-machined component beside a technical drawing in a workshop."
              loading="lazy"
              decoding="async">
            <figcaption>
              <span class="status-badge status-neutral">
                <i class="fa-solid fa-pen-ruler" aria-hidden="true"></i>
                Photograph
              </span>
              <span
                >Buyers describe the work, then compare available
                capacity.</span
              >
            </figcaption>
          </figure>
        </div>
      </div>
    </div>
  </section>

  <!-- Marketplace preview -->
  <section
    class="section marketplace-section"
    id="marketplace-preview"
    aria-labelledby="preview-title"
  >
    <div class="container-im">
      <div class="preview-header">
        <div class="section-header">
          <p class="eyebrow">Marketplace preview</p>
          <h2 class="section-title" id="preview-title" tabindex="-1">
            What a capacity listing will look like.
          </h2>
        </div>
      </div>

      <div class="preview-toolbar">
        <div
          class="filter-chips"
          role="group"
          aria-label="Filter listings by process"
        >
          <button
            class="filter-chip is-active"
            type="button"
            data-process-filter=""
            aria-pressed="true"
          >
            All listings
          </button>
          <button
            class="filter-chip"
            type="button"
            data-process-filter="turning"
            aria-pressed="false"
          >
            CNC turning
          </button>
          <button
            class="filter-chip"
            type="button"
            data-process-filter="milling"
            aria-pressed="false"
          >
            CNC milling
          </button>
          <button
            class="filter-chip"
            type="button"
            data-process-filter="fabrication"
            aria-pressed="false"
          >
            Fabrication
          </button>
        </div>
        <p
          class="results-summary"
          id="results-summary"
          role="status"
          aria-live="polite"
        >
          Showing all 3 listings.
        </p>
      </div>

      <div class="row g-4" id="sample-listings">
        <div
          class="col-md-6 col-lg-4"
          data-listing
          data-process="turning"
          data-location="rajkot"
          data-search="haas cnc turning machine st-20 lathe patel engineering rajkot cnc turning turning"
        >
          <article class="im-card machine-card h-100">
            <div class="machine-card-media-img">
              <img
                src="{{ asset('assets/images/machine_7.jpg') }}"
                width="640"
                height="400"
                alt="Representative photograph of a modern CNC turning machine."
                loading="lazy"
                decoding="async">
            </div>
            <div class="im-card-body">
              <h3 class="machine-card-title">Haas CNC Turning Machine ST-20</h3>
              <p class="machine-card-owner">Patel Engineering · Rajkot</p>

              <dl class="machine-card-facts">
                <div>
                  <dt>Process</dt>
                  <dd>CNC turning</dd>
                </div>
                <div>
                  <dt>Rate</dt>
                  <dd>₹800 / hour</dd>
                </div>
                <div>
                  <dt>Capacity</dt>
                  <dd>8 hours/day</dd>
                </div>
              </dl>

            </div>
            <div class="im-card-footer">
              <span class="status-badge status-available">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Available
              </span>
              <a
                class="btn-im btn-im-outline btn-im-sm"
                href="{{ url('/machine-details') }}?id=1"
              >
                View details<span class="visually-hidden">
                  for Haas CNC Turning Machine ST-20</span
                >
              </a>
            </div>
          </article>
        </div>

        <div
          class="col-md-6 col-lg-4"
          data-listing
          data-process="milling"
          data-location="coimbatore"
          data-search="vertical machining centre vmc cnc milling machine sample precision works coimbatore cnc milling milling"
        >
          <article class="im-card machine-card h-100">
            <div class="machine-card-media-img">
              <img
                src="{{ asset('assets/images/machine_8.jpg') }}"
                width="640"
                height="400"
                alt="Representative photograph of a vertical machining centre."
                loading="lazy"
                decoding="async">
            </div>
            <div class="im-card-body">
              <h3 class="machine-card-title">Vertical Machining Centre</h3>
              <p class="machine-card-owner">
                Sample Precision Works · Coimbatore
              </p>

              <dl class="machine-card-facts">
                <div>
                  <dt>Process</dt>
                  <dd>CNC milling</dd>
                </div>
                <div>
                  <dt>Rate</dt>
                  <dd>₹1,150 / hour</dd>
                </div>
                <div>
                  <dt>Capacity</dt>
                  <dd>6 hours/day</dd>
                </div>
              </dl>

            </div>
            <div class="im-card-footer">
              <span class="status-badge status-available">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Available
              </span>
              <a
                class="btn-im btn-im-outline btn-im-sm"
                href="{{ url('/machine-details') }}?id=2"
              >
                View details<span class="visually-hidden">
                  for Vertical Machining Centre</span
                >
              </a>
            </div>
          </article>
        </div>

        <div
          class="col-md-6 col-lg-4"
          data-listing
          data-process="fabrication"
          data-location="pune"
          data-search="hydraulic press brake sample fabrication co pune sheet metal fabrication fabrication"
        >
          <article class="im-card machine-card h-100">
            <div class="machine-card-media-img">
              <img
                src="{{ asset('assets/images/machine_2.jpg') }}"
                width="640"
                height="400"
                alt="Representative photograph of an industrial hydraulic press brake."
                loading="lazy"
                decoding="async">
            </div>
            <div class="im-card-body">
              <h3 class="machine-card-title">Hydraulic Press Brake</h3>
              <p class="machine-card-owner">
                Sample Fabrication Co. · Pune
              </p>

              <dl class="machine-card-facts">
                <div>
                  <dt>Process</dt>
                  <dd>Fabrication</dd>
                </div>
                <div>
                  <dt>Rate</dt>
                  <dd>₹950 / hour</dd>
                </div>
                <div>
                  <dt>Capacity</dt>
                  <dd>3 hours/day</dd>
                </div>
              </dl>

            </div>
            <div class="im-card-footer">
              <span class="status-badge status-warning">
                <i class="fa-solid fa-clock" aria-hidden="true"></i>
                Limited availability
              </span>
              <a
                class="btn-im btn-im-outline btn-im-sm"
                href="{{ url('/machine-details') }}?id=3"
              >
                View details<span class="visually-hidden">
                  for Hydraulic Press Brake</span
                >
              </a>
            </div>
          </article>
        </div>
      </div>

      <div class="empty-state" id="listing-empty" hidden>
        <div class="empty-state-icon">
          <i class="fa-solid fa-filter-circle-xmark" aria-hidden="true"></i>
        </div>
        <h3>No listings match this search</h3>
        <p>
          Try a different process, location, or keyword. This search only
          covers the three listings on this page.
        </p>
        <button
          class="btn-im btn-im-outline btn-im-sm mt-3"
          type="button"
          id="empty-clear-filters"
        >
          Clear filters
        </button>
      </div>

    </div>
  </section>

  <!-- About and platform clarity -->
  <section
    class="section about-section"
    id="about"
    aria-labelledby="about-title"
  >
    <div class="container-im">
      <div class="row g-4 g-lg-5">
        <div class="col-lg-5">
          <p class="eyebrow">About IdleMach</p>
          <h2 class="section-title" id="about-title">
            A marketplace for capacity — not a machine seller.
          </h2>
          <p class="lead">
            IdleMach does not manufacture or sell machines. It connects
            businesses that already own them with businesses that need
            manufacturing work done.
          </p>
          <p class="text-muted-im">
            Machine owners set their availability and review requests.
            Buyers compare capacity before they commit. Admins review
            listings and monitor platform activity.
          </p>
        </div>

        <div class="col-lg-7">
          <div class="principle-list">
            <div class="principle">
              <span class="feature-icon">
                <i class="fa-solid fa-handshake" aria-hidden="true"></i>
              </span>
              <div>
                <h3>Owners stay in control</h3>
                <p>
                  Each request is reviewed before a booking moves forward.
                </p>
              </div>
            </div>
            <div class="principle">
              <span class="feature-icon">
                <i class="fa-solid fa-list-check" aria-hidden="true"></i>
              </span>
              <div>
                <h3>Listings carry the details that matter</h3>
                <p>
                  Machine, process, owner, location, rate, and capacity are
                  visible before a request is sent.
                </p>
              </div>
            </div>
            <div class="principle">
              <span class="feature-icon">
                <i class="fa-solid fa-route" aria-hidden="true"></i>
              </span>
              <div>
                <h3>The sequence is explicit</h3>
                <p>
                  Owner acceptance comes before payment; booking
                  confirmation follows successful payment.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Final call to action -->
  <section class="cta-band" aria-labelledby="cta-title">
    <div class="container-im">
      <div class="cta-inner">
        <div class="cta-copy">
          <p class="eyebrow eyebrow-light">
            Turn Idle Capacity Into Opportunity.
          </p>
          <h2 id="cta-title">
            Put unused hours to work — or find the capacity to finish the
            job.
          </h2>
          <p>
            Choose the path that matches what you need. The marketplace is
            designed to keep both sides clear at every step.
          </p>
        </div>

        <div class="cta-paths">
          <div class="cta-path">
            <span class="cta-path-label">
              <i class="fa-solid fa-industry" aria-hidden="true"></i>
              Machine owners
            </span>
            <a class="btn-im btn-im-light" href="#for-owners">
              List idle capacity
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
          <div class="cta-path">
            <span class="cta-path-label">
              <i
                class="fa-solid fa-magnifying-glass"
                aria-hidden="true"
              ></i>
              Buyers
            </span>
            <a class="btn-im btn-im-light-outline" href="#discovery">
              Find capacity
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
