@extends('layouts.public')

@section('title', 'How It Works — IdleMach')

@section('meta_description', 'See how IdleMach connects machine owners with unused manufacturing capacity to buyers: listing review, discovery, booking requests, owner acceptance, payment, work completion, and reviews.')

@section('content')
  <!-- Page introduction -->
  <section class="hiw-hero" aria-labelledby="hiw-title">
    <div class="container-im">
      <nav class="machine-breadcrumb" aria-label="Breadcrumb">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li aria-current="page">How It Works</li>
        </ol>
      </nav>

      <div class="row g-4 g-lg-5 align-items-start">
        <div class="col-lg-7">
          <p class="eyebrow">How IdleMach works</p>
          <h1 class="page-title" id="hiw-title">How IdleMach Works</h1>
          <p class="lead hiw-intro">
            IdleMach is a manufacturing-capacity marketplace. Machine owners
            list the hours their machines are not using. Buyers find a
            suitable machine and request the work. The owner decides first,
            payment follows acceptance, and a booking is confirmed only
            after payment succeeds.
          </p>

          <p class="hiw-tagline">
            <i class="fa-solid fa-arrow-trend-up" aria-hidden="true"></i>
            Turn Idle Capacity Into Opportunity.
          </p>

          <div class="hero-actions hiw-hero-actions">
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

          <p class="hiw-prototype-note">
            <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
            <span
              >This page explains the intended workflow. Accounts, listings,
              bookings, payments, and reviews are not connected.</span
            >
          </p>
        </div>

        <div class="col-lg-5">
          <aside
            class="hiw-hero-panel"
            aria-labelledby="hiw-roles-title"
          >
            <h2 id="hiw-roles-title">Two journeys, one clear sequence</h2>
            <ul class="hiw-role-list">
              <li>
                <span class="hiw-role-icon">
                  <i class="fa-solid fa-industry" aria-hidden="true"></i>
                </span>
                <div>
                  <h3>Machine owners</h3>
                  <p>
                    List unused machine hours, set the rate and availability,
                    and decide which booking requests to accept.
                  </p>
                </div>
              </li>
              <li>
                <span class="hiw-role-icon">
                  <i
                    class="fa-solid fa-magnifying-glass"
                    aria-hidden="true"
                  ></i>
                </span>
                <div>
                  <h3>Buyers</h3>
                  <p>
                    Discover suitable capacity, check the listing and
                    availability, and send the work details.
                  </p>
                </div>
              </li>
              <li>
                <span class="hiw-role-icon">
                  <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
                </span>
                <div>
                  <h3>Admins</h3>
                  <p>
                    Review machine listings and monitor platform activity
                    according to their permissions.
                  </p>
                </div>
              </li>
            </ul>
            <p class="hiw-panel-note">
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span
                >Only approved listings appear in Explore Machines, and only
                active machines can receive booking requests.</span
              >
            </p>
          </aside>
        </div>
      </div>
    </div>
  </section>

  <!-- Machine owner journey -->
  <section
    class="section hiw-owner-section"
    id="for-owners"
    aria-labelledby="owner-journey-title"
  >
    <div class="container-im">
      <div class="section-header">
        <p class="eyebrow">For machine owners</p>
        <h2 class="section-title" id="owner-journey-title">
          Six steps from idle hours to completed work.
        </h2>
        <p class="lead">
          Owners keep control of what is listed, which requests are
          accepted, and when the work is marked complete.
        </p>
      </div>

      <div class="row g-4 g-lg-5">
        <div class="col-lg-7">
          <ol class="hiw-steps">
            <li>
              <span class="hiw-step-number">01</span>
              <div class="hiw-step-body">
                <h3>Create an Account</h3>
                <p>Register as a Machine Owner.</p>
              </div>
            </li>
            <li>
              <span class="hiw-step-number">02</span>
              <div class="hiw-step-body">
                <h3>Set Up Your Company</h3>
                <p>
                  Add the company profile information that will appear beside
                  your machine listings.
                </p>
              </div>
            </li>
            <li>
              <span class="hiw-step-number">03</span>
              <div class="hiw-step-body">
                <h3>List Your Machine</h3>
                <p>
                  Add machine details, images, specifications, the hourly
                  rate, available capacity, and availability.
                </p>
              </div>
            </li>
            <li>
              <span class="hiw-step-number">04</span>
              <div class="hiw-step-body">
                <h3>Get Your Listing Reviewed</h3>
                <p>
                  An admin reviews the machine listing before it can appear
                  in the marketplace. Only approved and active machines can
                  receive booking requests.
                </p>
              </div>
            </li>
            <li>
              <span class="hiw-step-number">05</span>
              <div class="hiw-step-body">
                <h3>Manage Booking Requests</h3>
                <p>
                  Review incoming requests, recheck availability, and accept
                  or reject each request.
                </p>
              </div>
            </li>
            <li>
              <span class="hiw-step-number">06</span>
              <div class="hiw-step-body">
                <h3>Complete the Work</h3>
                <p>
                  Manage the accepted work and mark it completed when the job
                  is finished.
                </p>
              </div>
            </li>
          </ol>
        </div>

        <div class="col-lg-5">
          <aside class="hiw-aside" aria-labelledby="owner-control-title">
            <p class="eyebrow">Owner control</p>
            <h3 id="owner-control-title">
              You decide what is listed and accepted.
            </h3>
            <ul class="check-list hiw-side-list">
              <li>
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Machine details, images, and specifications</span>
              </li>
              <li>
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Hourly rate and available machine hours</span>
              </li>
              <li>
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Which booking requests to accept</span>
              </li>
              <li>
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Work progress through to completion</span>
              </li>
            </ul>
            <p class="hiw-aside-note">
              Availability must be checked before a request is accepted. A
              listing also needs admin approval before it can appear in the
              marketplace.
            </p>
            <a
              class="btn-im btn-im-primary"
              href="{{ url('/register') }}?role=owner"
            >
              List Your Machine
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </aside>
        </div>
      </div>
    </div>
  </section>

  <!-- Buyer journey -->
  <section
    class="section hiw-buyer-section"
    id="for-buyers"
    aria-labelledby="buyer-journey-title"
  >
    <div class="container-im">
      <div class="section-header">
        <p class="eyebrow">For buyers</p>
        <h2 class="section-title" id="buyer-journey-title">
          Eight steps from discovery to review.
        </h2>
        <p class="lead">
          Buyers see the machine, rate, capacity, and availability before
          sending a request. Payment only follows owner acceptance.
        </p>
      </div>

      <div class="row g-4 g-lg-5">
        <div class="col-lg-7">
          <ol class="hiw-steps hiw-steps-buyer">
            <li>
              <span class="hiw-step-number">01</span>
              <div class="hiw-step-body">
                <h3>Create an Account</h3>
                <p>Register as a Buyer.</p>
              </div>
            </li>
            <li>
              <span class="hiw-step-number">02</span>
              <div class="hiw-step-body">
                <h3>Discover Machines</h3>
                <p>
                  Search and filter the marketplace for manufacturing
                  capacity that suits the work.
                </p>
              </div>
            </li>
            <li>
              <span class="hiw-step-number">03</span>
              <div class="hiw-step-body">
                <h3>Check Machine Details</h3>
                <p>
                  Review the process, specifications, rate, capacity, and
                  availability before sending a request.
                </p>
              </div>
            </li>
            <li>
              <span class="hiw-step-number">04</span>
              <div class="hiw-step-body">
                <h3>Send a Booking Request</h3>
                <p>
                  Provide the preferred date, requested hours, quantity,
                  material, work description, special requirements, and any
                  drawing or document.
                </p>
              </div>
            </li>
            <li>
              <span class="hiw-step-number">05</span>
              <div class="hiw-step-body">
                <h3>Wait for Owner Acceptance</h3>
                <p>
                  The Machine Owner reviews the request and accepts or
                  rejects it. A rejected request does not proceed to payment
                  or work.
                </p>
              </div>
            </li>
            <li>
              <span class="hiw-step-number">06</span>
              <div class="hiw-step-body">
                <h3>Complete Payment</h3>
                <p>
                  If the request is accepted, payment takes place next. The
                  booking is confirmed only after successful payment.
                </p>
              </div>
            </li>
            <li>
              <span class="hiw-step-number">07</span>
              <div class="hiw-step-body">
                <h3>Track Your Work</h3>
                <p>
                  Follow the booking as the work moves from confirmed to in
                  progress and then completed.
                </p>
              </div>
            </li>
            <li>
              <span class="hiw-step-number">08</span>
              <div class="hiw-step-body">
                <h3>Complete and Review</h3>
                <p>
                  When the work is complete, finish the booking process and
                  submit a review if the completed booking is eligible.
                </p>
              </div>
            </li>
          </ol>
        </div>

        <div class="col-lg-5">
          <aside class="hiw-aside" aria-labelledby="buyer-timing-title">
            <p class="eyebrow">Payment timing</p>
            <h3 id="buyer-timing-title">
              Acceptance comes first. Confirmation comes after payment.
            </h3>
            <ol class="hiw-mini-flow">
              <li>
                <span>01</span>
                <span>Owner accepts the request</span>
              </li>
              <li>
                <span>02</span>
                <span>Buyer completes payment</span>
              </li>
              <li>
                <span>03</span>
                <span>Booking is confirmed</span>
              </li>
            </ol>
            <p class="hiw-aside-note">
              A rejected request does not move to payment or work. A booking
              is never shown as confirmed before successful payment.
            </p>
            <a class="btn-im btn-im-secondary" href="{{ url('/machines') }}">
              Explore Machines
              <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
            </a>
          </aside>
        </div>
      </div>
    </div>
  </section>

  <!-- Booking workflow -->
  <section
    class="section hiw-workflow-section"
    aria-labelledby="workflow-title"
  >
    <div class="container-im">
      <div class="section-header">
        <p class="eyebrow">Booking workflow</p>
        <h2 class="section-title" id="workflow-title">
          From listing to review, in nine stages.
        </h2>
        <p class="lead">
          This is the intended sequence for every booking. It keeps
          availability, owner approval, payment, and completion in the
          correct order.
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

      <div class="hiw-rules-panel">
        <div class="hiw-rules-head">
          <h3>Four rules that do not change</h3>
          <p>
            These rules protect both sides of the booking and keep the
            workflow consistent.
          </p>
        </div>

        <ul class="hiw-rules">
          <li class="hiw-rule">
            <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
            <div>
              <h4>Check availability first</h4>
              <p>
                Buyers check machine availability before sending a request,
                and the owner rechecks it before accepting.
              </p>
            </div>
          </li>
          <li class="hiw-rule">
            <i class="fa-solid fa-user-check" aria-hidden="true"></i>
            <div>
              <h4>Accept before pay</h4>
              <p>
                The Machine Owner accepts or rejects the request before any
                payment step begins.
              </p>
            </div>
          </li>
          <li class="hiw-rule">
            <i class="fa-solid fa-credit-card" aria-hidden="true"></i>
            <div>
              <h4>Pay before confirmation</h4>
              <p>
                A booking is confirmed only after successful payment is
                recorded. Pending or failed payment does not confirm it.
              </p>
            </div>
          </li>
          <li class="hiw-rule">
            <i class="fa-solid fa-star" aria-hidden="true"></i>
            <div>
              <h4>Review after completion</h4>
              <p>
                Only completed bookings are eligible for the final review
                step.
              </p>
            </div>
          </li>
        </ul>

        <p class="hiw-rules-note">
          <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
          <span
            >Only approved machines appear in the marketplace, and only
            active machines can receive booking requests.</span
          >
        </p>
      </div>
    </div>
  </section>

  <!-- Trust and process clarity -->
  <section
    class="section hiw-trust-section"
    aria-labelledby="trust-title"
  >
    <div class="container-im">
      <div class="row g-4 g-lg-5 align-items-start">
        <div class="col-lg-6">
          <p class="eyebrow">Trust and process clarity</p>
          <h2 class="section-title" id="trust-title">
            What admin review does — and does not do.
          </h2>
          <p class="lead">
            Submitted machine listings are reviewed by an admin before they
            can appear in the marketplace. Admins also monitor bookings,
            payments, and reviews according to their permissions.
          </p>
          <p>
            Admin review is a listing and platform check. It is not a
            certification or an inspection of machine condition, and it does
            not display verification badges or performance claims.
          </p>
          <p>
            Owners manage only their own machines and related records.
            Buyers can access only their own booking records.
          </p>
          <a class="text-link" href="{{ url('/machines') }}">
            See the marketplace
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </a>
        </div>

        <div class="col-lg-6">
          <aside class="hiw-admin-panel" aria-labelledby="admin-role-title">
            <h3 id="admin-role-title">What admin review covers</h3>
            <ul class="hiw-admin-list">
              <li>
                <span class="feature-icon">
                  <i
                    class="fa-solid fa-clipboard-check"
                    aria-hidden="true"
                  ></i>
                </span>
                <div>
                  <h4>Machine listings</h4>
                  <p>
                    Check submitted machine information before a listing is
                    approved.
                  </p>
                </div>
              </li>
              <li>
                <span class="feature-icon">
                  <i class="fa-solid fa-chart-line" aria-hidden="true"></i>
                </span>
                <div>
                  <h4>Platform activity</h4>
                  <p>
                    Monitor bookings, payments, and reviews as platform
                    records progress.
                  </p>
                </div>
              </li>
              <li>
                <span class="feature-icon">
                  <i class="fa-solid fa-users-gear" aria-hidden="true"></i>
                </span>
                <div>
                  <h4>Role boundaries</h4>
                  <p>
                    Keep owner, buyer, and admin access within the
                    documented permissions.
                  </p>
                </div>
              </li>
            </ul>
            <p class="hiw-panel-note hiw-panel-note-light">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <span
                >No certification, inspection guarantee, or performance
                rating is implied by an approved listing.</span
              >
            </p>
          </aside>
        </div>
      </div>
    </div>
  </section>

  <!-- Final call to action -->
  <section class="cta-band" aria-labelledby="hiw-cta-title">
    <div class="container-im">
      <div class="cta-inner">
        <div class="cta-copy">
          <p class="eyebrow eyebrow-light">Choose your next step</p>
          <h2 id="hiw-cta-title">
            Put idle capacity to work — or find the capacity you need.
          </h2>
          <p>
            Owners can follow the listing journey. Buyers can explore the
            marketplace and see how a request is prepared.
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
