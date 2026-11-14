@extends('layouts.public')

@section('title', 'Explore Machines — IdleMach')

@section('meta_description', 'Explore sample manufacturing capacity listings on IdleMach by machine name, process, owner, location, availability, and hourly rate.')

@section('content')
  <!-- Page introduction -->
  <section class="machines-hero" aria-labelledby="machines-title">
    <div class="container-im">
      <nav class="machine-breadcrumb" aria-label="Breadcrumb">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li aria-current="page">Explore Machines</li>
        </ol>
      </nav>

      <div class="row g-4 g-lg-5 align-items-end">
        <div class="col-lg-8">
          <p class="eyebrow">Marketplace discovery</p>
          <h1 class="page-title" id="machines-title">
            Explore Manufacturing Capacity
          </h1>
          <p class="lead machines-intro">
            Compare machine listings by machine, process, owner, location,
            availability, and hourly rate.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Search, filters, and results -->
  <section
    class="section machines-section"
    aria-labelledby="machine-filters-title"
  >
    <div class="container-im">
      <noscript>
        <div
          class="im-alert im-alert-warning machines-noscript"
          role="note"
        >
          <i
            class="fa-solid fa-triangle-exclamation"
            aria-hidden="true"
          ></i>
          <div>
            <strong>JavaScript is required to filter listings.</strong>
            All three listings are shown below without filtering.
          </div>
        </div>
      </noscript>

      <div class="machine-filter-panel">
        <div class="machine-filter-head">
          <div>
            <h2 class="section-title" id="machine-filters-title">
              Search and filter listings
            </h2>
            <p class="machine-filter-lead">
              All fields are optional. Results update as you search or
              change a filter.
            </p>
          </div>
          <button
            class="btn-im btn-im-outline btn-im-sm"
            type="button"
            id="machines-reset-filters"
          >
            <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
            Clear all filters
          </button>
        </div>

        <form
          id="machines-search-form"
          role="search"
          aria-label="Search machine listings"
          aria-describedby="machine-filter-note"
        >
          <div class="row g-3">
            <div class="col-12">
              <label class="form-label" for="machine-keyword"
                >Machine, process, or owner</label
              >
              <div class="search-input">
                <i
                  class="fa-solid fa-magnifying-glass"
                  aria-hidden="true"
                ></i>
                <input
                  class="form-control"
                  id="machine-keyword"
                  name="keyword"
                  type="search"
                  placeholder="e.g. CNC turning, Patel Engineering, Rajkot"
                  autocomplete="off">
              </div>
            </div>

            <div class="col-sm-6 col-lg-3">
              <label class="form-label" for="filter-process">Process</label>
              <select
                class="form-select"
                id="filter-process"
                name="process"
              >
                <option value="">All processes</option>
                <option value="turning">CNC turning</option>
                <option value="milling">CNC milling</option>
                <option value="fabrication">Fabrication</option>
              </select>
            </div>

            <div class="col-sm-6 col-lg-3">
              <label class="form-label" for="filter-location"
                >Location</label
              >
              <select
                class="form-select"
                id="filter-location"
                name="location"
              >
                <option value="">All locations</option>
                <option value="rajkot">Rajkot</option>
                <option value="coimbatore">Coimbatore</option>
                <option value="pune">Pune</option>
              </select>
            </div>

            <div class="col-sm-6 col-lg-3">
              <label class="form-label" for="filter-availability"
                >Availability</label
              >
              <select
                class="form-select"
                id="filter-availability"
                name="availability"
              >
                <option value="">Any availability</option>
                <option value="available">Available</option>
                <option value="limited">Limited availability</option>
              </select>
            </div>

            <div class="col-sm-6 col-lg-3">
              <label class="form-label" for="filter-rate"
                >Hourly rate</label
              >
              <select class="form-select" id="filter-rate" name="rate">
                <option value="">Any hourly rate</option>
                <option value="up-to-900">Up to ₹900 / hour</option>
                <option value="901-1000">₹901 – ₹1,000 / hour</option>
                <option value="above-1000">₹1,001 / hour and above</option>
              </select>
            </div>
          </div>

          <div class="machine-filter-actions">
            <button class="btn-im btn-im-primary" type="submit">
              <i
                class="fa-solid fa-magnifying-glass"
                aria-hidden="true"
              ></i>
              Search listings
            </button>
            <p class="search-note mb-0" id="machine-filter-note">
              Filters only the 3 listings on this page.
            </p>
          </div>
        </form>
      </div>

      <div class="results-toolbar">
        <div>
          <h2
            class="results-heading"
            id="machine-results-heading"
            tabindex="-1"
          >
            Machine listings
          </h2>
          <p
            class="results-summary"
            id="machines-results-summary"
            role="status"
            aria-live="polite"
          >
            Showing all 3 listings.
          </p>
        </div>

        <div class="sort-control">
          <label class="form-label" for="machine-sort">Sort by</label>
          <select class="form-select" id="machine-sort">
            <option value="recommended">Recommended order</option>
            <option value="rate-asc">Hourly rate: low to high</option>
            <option value="rate-desc">Hourly rate: high to low</option>
            <option value="name-asc">Machine name: A to Z</option>
          </select>
        </div>
      </div>

      <div class="row g-4" id="machine-results">
        <div
          class="col-md-6 col-lg-4"
          data-machine-listing
          data-name="haas cnc turning machine st-20"
          data-process="turning"
          data-location="rajkot"
          data-availability="available"
          data-rate="800"
          data-search="haas cnc turning machine st-20 lathe cnc turning turning patel engineering rajkot"
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
              <p class="machine-card-owner">
                <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                Patel Engineering · Rajkot
              </p>

              <dl class="machine-card-facts">
                <div>
                  <dt>Process</dt>
                  <dd>CNC turning</dd>
                </div>
                <div>
                  <dt>Hourly rate</dt>
                  <dd>₹800 / hour</dd>
                </div>
                <div>
                  <dt>Available capacity</dt>
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
                <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                View details<span class="visually-hidden">
                  for Haas CNC Turning Machine ST-20</span
                >
              </a>
            </div>
          </article>
        </div>

        <div
          class="col-md-6 col-lg-4"
          data-machine-listing
          data-name="vertical machining centre"
          data-process="milling"
          data-location="coimbatore"
          data-availability="available"
          data-rate="1150"
          data-search="vertical machining centre vmc cnc milling machine cnc milling milling sample precision works coimbatore"
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
                <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                Sample Precision Works · Coimbatore
              </p>

              <dl class="machine-card-facts">
                <div>
                  <dt>Process</dt>
                  <dd>CNC milling</dd>
                </div>
                <div>
                  <dt>Hourly rate</dt>
                  <dd>₹1,150 / hour</dd>
                </div>
                <div>
                  <dt>Available capacity</dt>
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
                <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                View details<span class="visually-hidden">
                  for Vertical Machining Centre</span
                >
              </a>
            </div>
          </article>
        </div>

        <div
          class="col-md-6 col-lg-4"
          data-machine-listing
          data-name="hydraulic press brake"
          data-process="fabrication"
          data-location="pune"
          data-availability="limited"
          data-rate="950"
          data-search="hydraulic press brake sheet metal fabrication fabrication sample fabrication co pune"
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
                <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                Sample Fabrication Co. · Pune
              </p>

              <dl class="machine-card-facts">
                <div>
                  <dt>Process</dt>
                  <dd>Fabrication</dd>
                </div>
                <div>
                  <dt>Hourly rate</dt>
                  <dd>₹950 / hour</dd>
                </div>
                <div>
                  <dt>Available capacity</dt>
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
                <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                View details<span class="visually-hidden">
                  for Hydraulic Press Brake</span
                >
              </a>
            </div>
          </article>
        </div>
      </div>

      <div class="empty-state machines-empty" id="machines-empty" hidden>
        <div class="empty-state-icon">
          <i class="fa-solid fa-filter-circle-xmark" aria-hidden="true"></i>
        </div>
        <h3>No listings match these filters</h3>
        <p>
          Try a different keyword, process, location, availability, or rate
          range. This search only covers the three listings on this page.
        </p>
        <button
          class="btn-im btn-im-outline btn-im-sm mt-3"
          type="button"
          id="machines-empty-clear"
        >
          Clear all filters
        </button>
      </div>

    </div>
  </section>
@endsection
