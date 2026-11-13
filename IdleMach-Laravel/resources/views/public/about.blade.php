@extends('layouts.public')

@section('title', 'About IdleMach — IdleMach')

@section('meta_description', 'Learn how IdleMach connects machine owners with unused manufacturing capacity to buyers who need manufacturing work, and how the marketplace workflow is structured.')

@section('content')
  <section class="page-hero" aria-labelledby="about-title">
    <div class="container-im">
      <nav class="machine-breadcrumb" aria-label="Breadcrumb">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li aria-current="page">About</li>
        </ol>
      </nav>

      <div class="row g-4 g-lg-5 align-items-start">
        <div class="col-lg-7">
          <p class="eyebrow">About IdleMach</p>
          <h1 class="page-title" id="about-title">
            A Marketplace for Manufacturing Capacity.
          </h1>
          <p class="lead page-hero-intro">
            IdleMach connects machine owners who have unused manufacturing
            capacity with buyers who need manufacturing work done. Owners
            list available machine hours; buyers discover suitable capacity
            and request work through one structured booking workflow.
          </p>

          <p class="page-tagline">
            <i class="fa-solid fa-arrow-trend-up" aria-hidden="true"></i>
            Turn Idle Capacity Into Opportunity.
          </p>

          <div class="hero-actions page-hero-actions">
            <a class="btn-im btn-im-primary btn-im-lg" href="{{ url('/machines') }}">
              Explore Machines
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
            <a
              class="btn-im btn-im-outline btn-im-lg"
              href="{{ url('/register') }}?role=owner"
            >
              List Your Machine
            </a>
          </div>

          <p class="page-hero-note">
            <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
            <span
              >Accounts, live listings, bookings, payments, and reviews are
              not connected.</span
            >
          </p>
        </div>

        <div class="col-lg-5">
          <aside class="page-hero-panel" aria-labelledby="about-panel-title">
            <h2 id="about-panel-title">Marketplace, not machine seller.</h2>
            <ul class="check-list page-hero-list">
              <li>
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>IdleMach does not manufacture or sell machines.</span>
              </li>
              <li>
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span
                  >Listings describe existing manufacturing capacity and its
                  availability.</span
                >
              </li>
              <li>
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span
                  >Machine owners decide which booking requests to
                  accept.</span
                >
              </li>
            </ul>
            <p class="page-panel-note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <span
                >The platform is designed around the documented order of
                listing, request, owner acceptance, payment, work, and
                review.</span
              >
            </p>
          </aside>
        </div>
      </div>
    </div>
  </section>

  <section
    class="section about-purpose-section"
    id="purpose"
    aria-labelledby="purpose-title"
  >
    <div class="container-im">
      <div class="row g-4 g-lg-5">
        <div class="col-lg-5">
          <p class="eyebrow">Our purpose</p>
          <h2 class="section-title" id="purpose-title">
            Unused machine hours are still capacity.
          </h2>
          <p class="lead">
            Manufacturing machines can have hours that are not producing
            work. IdleMach gives owners a way to present that capacity and
            gives buyers a way to find it.
          </p>
          <p class="text-muted-im">
            A listing records the machine, process, owner, location, rate,
            capacity, and availability. Buyers can compare this information
            before requesting work instead of starting from an informal
            search.
          </p>
        </div>

        <div class="col-lg-7">
          <ol class="purpose-steps">
            <li>
              <span class="purpose-number">01</span>
              <div>
                <h3>Capacity goes unused</h3>
                <p>
                  Machines may have available hours that are not currently
                  producing work.
                </p>
              </div>
            </li>
            <li>
              <span class="purpose-number">02</span>
              <div>
                <h3>Owners list the opportunity</h3>
                <p>
                  Owners add machine details, images, specifications, rates,
                  capacity, and availability.
                </p>
              </div>
            </li>
            <li>
              <span class="purpose-number">03</span>
              <div>
                <h3>Buyers search for fit</h3>
                <p>
                  Buyers compare process, specifications, location, rate, and
                  availability for the work they need.
                </p>
              </div>
            </li>
            <li>
              <span class="purpose-number">04</span>
              <div>
                <h3>Both sides follow one workflow</h3>
                <p>
                  A request moves through owner acceptance, payment, work,
                  completion, and review in the documented order.
                </p>
              </div>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section
    class="section about-roles-section"
    id="who-uses-idlemach"
    aria-labelledby="roles-title"
  >
    <div class="container-im">
      <div class="section-header">
        <p class="eyebrow">Who uses IdleMach</p>
        <h2 class="section-title" id="roles-title">
          Three roles, one marketplace.
        </h2>
        <p class="lead">
          Each role has a clear part in the workflow, from listing capacity
          to reviewing platform activity.
        </p>
      </div>

      <div class="role-columns">
        <article class="role-column">
          <div class="role-head">
            <span class="feature-icon">
              <i class="fa-solid fa-industry" aria-hidden="true"></i>
            </span>
            <div>
              <h3>Machine Owners</h3>
              <p>Businesses with existing machines and available hours.</p>
            </div>
          </div>
          <ul class="check-list">
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span>List unused manufacturing capacity.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span>Manage machine details and availability.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span>Receive and respond to booking requests.</span>
            </li>
          </ul>
        </article>

        <article class="role-column">
          <div class="role-head">
            <span class="feature-icon">
              <i
                class="fa-solid fa-magnifying-glass"
                aria-hidden="true"
              ></i>
            </span>
            <div>
              <h3>Buyers</h3>
              <p>Businesses that need manufacturing work done.</p>
            </div>
          </div>
          <ul class="check-list">
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span>Discover manufacturing machines.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span>Compare relevant specifications and availability.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span>Request manufacturing work.</span>
            </li>
          </ul>
        </article>

        <article class="role-column">
          <div class="role-head">
            <span class="feature-icon">
              <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
            </span>
            <div>
              <h3>Admins</h3>
              <p>Platform operators who review and monitor activity.</p>
            </div>
          </div>
          <ul class="check-list">
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span>Review machine listings.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span>Manage users.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span>Monitor bookings, payments, and platform activity.</span>
            </li>
          </ul>
        </article>
      </div>

      <p class="section-footnote">
        <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
        <span
          >Admin review is a listing and platform check. It is not a
          certification or an inspection of machine condition.</span
        >
      </p>
    </div>
  </section>

  <section
    class="section about-workflow-section"
    aria-labelledby="about-workflow-title"
  >
    <div class="container-im">
      <div class="section-header">
        <p class="eyebrow">How the marketplace works</p>
        <h2 class="section-title" id="about-workflow-title">
          A clear sequence from listing to review.
        </h2>
        <p class="lead">
          Every booking follows the same documented path. Availability is
          checked before a request, the owner decides before payment, and
          successful payment confirms the booking.
        </p>
      </div>

      <ol class="flow-rail" aria-label="Booking workflow stages">
        <li>
          <span class="flow-dot">01</span>
          <span class="flow-label">List</span>
        </li>
        <li>
          <span class="flow-dot">02</span>
          <span class="flow-label">Discover</span>
        </li>
        <li>
          <span class="flow-dot">03</span>
          <span class="flow-label">Request</span>
        </li>
        <li>
          <span class="flow-dot">04</span>
          <span class="flow-label">Accept</span>
        </li>
        <li>
          <span class="flow-dot">05</span>
          <span class="flow-label">Pay</span>
        </li>
        <li>
          <span class="flow-dot">06</span>
          <span class="flow-label">Book</span>
        </li>
        <li>
          <span class="flow-dot">07</span>
          <span class="flow-label">Work</span>
        </li>
        <li>
          <span class="flow-dot">08</span>
          <span class="flow-label">Complete</span>
        </li>
        <li>
          <span class="flow-dot">09</span>
          <span class="flow-label">Review</span>
        </li>
      </ol>

      <p class="about-workflow-link">
        <a class="text-link" href="{{ url('/how-it-works') }}">
          Read the full How It Works page
          <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
        </a>
      </p>
    </div>
  </section>

  <section
    class="section about-principles-section"
    id="principles"
    aria-labelledby="principles-title"
  >
    <div class="container-im">
      <div class="row g-4 g-lg-5">
        <div class="col-lg-5">
          <p class="eyebrow">Our principles</p>
          <h2 class="section-title" id="principles-title">
            A practical approach to marketplace clarity.
          </h2>
          <p class="lead">
            These are intended platform behaviours based on the documented
            workflow. They are not certifications or performance
            guarantees.
          </p>
        </div>

        <div class="col-lg-7">
          <div class="principle-list">
            <div class="principle">
              <span class="feature-icon">
                <i class="fa-solid fa-list-check" aria-hidden="true"></i>
              </span>
              <div>
                <h3>Clear machine information</h3>
                <p>
                  Listings are structured to show the machine, process,
                  owner, location, rate, capacity, and availability before a
                  request is sent.
                </p>
              </div>
            </div>
            <div class="principle">
              <span class="feature-icon">
                <i
                  class="fa-solid fa-calendar-check"
                  aria-hidden="true"
                ></i>
              </span>
              <div>
                <h3>Availability awareness</h3>
                <p>
                  Buyers check availability before requesting capacity, and
                  owners recheck it before accepting a request.
                </p>
              </div>
            </div>
            <div class="principle">
              <span class="feature-icon">
                <i class="fa-solid fa-handshake" aria-hidden="true"></i>
              </span>
              <div>
                <h3>Owner-controlled booking decisions</h3>
                <p>
                  Owners decide which booking requests to accept. No request
                  moves to payment without that decision.
                </p>
              </div>
            </div>
            <div class="principle">
              <span class="feature-icon">
                <i class="fa-solid fa-route" aria-hidden="true"></i>
              </span>
              <div>
                <h3>Structured booking workflow</h3>
                <p>
                  Request, acceptance, payment, confirmation, work,
                  completion, and review stay in the documented order.
                </p>
              </div>
            </div>
            <div class="principle">
              <span class="feature-icon">
                <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
              </span>
              <div>
                <h3>Responsible platform administration</h3>
                <p>
                  Admins review listings and monitor platform activity
                  according to their permissions.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="cta-band" aria-labelledby="about-cta-title">
    <div class="container-im">
      <div class="cta-inner">
        <div class="cta-copy">
          <p class="eyebrow eyebrow-light">Choose your next step</p>
          <h2 id="about-cta-title">
            Put idle capacity to work — or find the capacity you need.
          </h2>
          <p>
            Explore the marketplace as a buyer, or see how a machine owner
            would list unused capacity.
          </p>
        </div>

        <div class="cta-paths">
          <div class="cta-path">
            <span class="cta-path-label">
              <i class="fa-solid fa-industry" aria-hidden="true"></i>
              Machine owners
            </span>
            <a
              class="btn-im btn-im-light"
              href="{{ url('/register') }}?role=owner"
            >
              List Your Machine
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
            <a
              class="btn-im btn-im-light-outline"
              href="{{ url('/machines') }}"
            >
              Explore Machines
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
