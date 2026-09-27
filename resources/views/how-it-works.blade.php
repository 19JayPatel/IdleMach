@extends('layouts.app')

@section('title', 'How It Works — IdleMach')

@section('content')

{{-- =========================================================
     PAGE HERO
     ========================================================= --}}

<section class="how-hero">
    <div class="container">
        <div class="how-hero-inner text-center">
            <span class="section-kicker">HOW IDLEMACH WORKS</span>

            <h1>How IdleMach Works</h1>

            <p>
                One marketplace, two sides of the same problem —
                idle capacity on one end, unmet demand on the other.
            </p>
        </div>
    </div>
</section>


{{-- =========================================================
     OWNER / BUYER FLOWS
     ========================================================= --}}

<section class="how-flows-section">
    <div class="container">

        <div class="section-heading centered">
            <span class="section-kicker">ONE PLATFORM. TWO WORKFLOWS.</span>

            <h2>
                Simple for machine owners.<br>
                Straightforward for buyers.
            </h2>

            <p>
                IdleMach connects available manufacturing capacity
                with businesses that need reliable production access.
            </p>
        </div>


        <div class="row g-4">

            {{-- MACHINE OWNER --}}
            <div class="col-lg-6">

                <div class="how-flow-card owner-flow">

                    <div class="how-flow-header">

                        <div class="how-flow-icon">
                            <i class="fa-solid fa-industry"></i>
                        </div>

                        <div>
                            <span class="how-flow-label">
                                MACHINE OWNERS
                            </span>

                            <h2>Turn idle hours into productive work</h2>
                        </div>

                    </div>

                    <p class="how-flow-description">
                        List your available machine capacity, control your
                        schedule and receive production requests from
                        businesses looking for the right equipment.
                    </p>


                    <div class="how-step-list">

                        <div class="how-step">
                            <div class="how-step-number">01</div>

                            <div class="how-step-content">
                                <h3>Create your profile & list a machine</h3>

                                <p>
                                    Add your company details, machine type,
                                    specifications, hourly rate and available hours.
                                </p>
                            </div>
                        </div>


                        <div class="how-step">
                            <div class="how-step-number">02</div>

                            <div class="how-step-content">
                                <h3>Get approved by IdleMach</h3>

                                <p>
                                    New listings are reviewed before going live,
                                    helping buyers discover verified machine capacity.
                                </p>
                            </div>
                        </div>


                        <div class="how-step">
                            <div class="how-step-number">03</div>

                            <div class="how-step-content">
                                <h3>Receive production requests</h3>

                                <p>
                                    Buyers can request specific dates, machine
                                    hours and production requirements.
                                </p>
                            </div>
                        </div>


                        <div class="how-step">
                            <div class="how-step-number">04</div>

                            <div class="how-step-content">
                                <h3>Complete the accepted work</h3>

                                <p>
                                    Complete the accepted production work according to the agreed requirements. Payment is handled according to the agreed payment terms for the work.
                                </p>
                            </div>
                        </div>


                        <div class="how-step">
                            <div class="how-step-number">05</div>

                            <div class="how-step-content">
                                <h3>Build your reputation</h3>

                                <p>
                                    Buyer feedback helps establish your profile
                                    and build trust for future production requests.
                                </p>
                            </div>
                        </div>

                    </div>


                    <div class="how-flow-footer">
                        <span>
                            <i class="fa-solid fa-clock"></i>
                            You control your available capacity
                        </span>

                        <a href="{{ url('/register') }}">
                            List Your Machine
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>

                </div>

            </div>


            {{-- BUYER --}}
            <div class="col-lg-6">

                <div class="how-flow-card buyer-flow">

                    <div class="how-flow-header">

                        <div class="how-flow-icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>

                        <div>
                            <span class="how-flow-label">
                                CAPACITY BUYERS
                            </span>

                            <h2>Find the right machine when you need it</h2>
                        </div>

                    </div>

                    <p class="how-flow-description">
                        Discover available manufacturing machines, compare
                        specifications and request capacity without waiting
                        for your own equipment to become available.
                    </p>


                    <div class="how-step-list">

                        <div class="how-step">
                            <div class="how-step-number">01</div>

                            <div class="how-step-content">
                                <h3>Search by machine type & location</h3>

                                <p>
                                    Filter available machines by process,
                                    location, hourly rate and availability.
                                </p>
                            </div>
                        </div>


                        <div class="how-step">
                            <div class="how-step-number">02</div>

                            <div class="how-step-content">
                                <h3>Review machine details</h3>

                                <p>
                                    Check machine specifications, owner details,
                                    available hours and production requirements.
                                </p>
                            </div>
                        </div>


                        <div class="how-step">
                            <div class="how-step-number">03</div>

                            <div class="how-step-content">
                                <h3>Send a production request</h3>

                                <p>
                                    Select your required dates and hours and
                                    provide the information needed for the job.
                                </p>
                            </div>
                        </div>


                        <div class="how-step">
                            <div class="how-step-number">04</div>

                            <div class="how-step-content">
                                <h3>Confirm booking & payment terms</h3>

                                <p>
                                    Once the machine owner accepts, review the agreed rate, schedule and payment terms before confirming the booking.
                                </p>
                            </div>
                        </div>


                        <div class="how-step">
                            <div class="how-step-number">05</div>

                            <div class="how-step-content">
                                <h3>Complete the job & review</h3>

                                <p>
                                    Follow the production process through completion
                                    and share your experience afterward.
                                </p>
                            </div>
                        </div>

                    </div>


                    <div class="how-flow-footer">
                        <span>
                            <i class="fa-solid fa-magnifying-glass"></i>
                            Discover available capacity
                        </span>

                        <a href="{{ url('/browse-machines') }}">
                            Browse Machines
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>


{{-- =========================================================
     CORE FLOW
     ========================================================= --}}

<section class="core-flow-section">

    <div class="container">

        <div class="section-heading centered">
            <span class="section-kicker">END-TO-END PROCESS</span>

            <h2>The core flow, end to end</h2>

            <p>
                From discovering available capacity to completing
                production, IdleMach keeps the process structured.
            </p>
        </div>


        <div class="core-flow">

            <div class="core-flow-item">
                <span>01</span>
                <strong>List</strong>
                <small>Make capacity visible</small>
            </div>

            <div class="core-flow-arrow">
                <i class="fa-solid fa-arrow-right"></i>
            </div>

            <div class="core-flow-item">
                <span>02</span>
                <strong>Discover</strong>
                <small>Find the right machine</small>
            </div>

            <div class="core-flow-arrow">
                <i class="fa-solid fa-arrow-right"></i>
            </div>

            <div class="core-flow-item">
                <span>03</span>
                <strong>Request</strong>
                <small>Submit requirements</small>
            </div>

            <div class="core-flow-arrow">
                <i class="fa-solid fa-arrow-right"></i>
            </div>

            <div class="core-flow-item">
                <span>04</span>
                <strong>Accept</strong>
                <small>Confirm the work</small>
            </div>

            <div class="core-flow-arrow">
                <i class="fa-solid fa-arrow-right"></i>
            </div>

            <div class="core-flow-item">
                <span>05</span>
                <strong>Pay</strong>
                <small>Confirm payment terms</small>
            </div>

            <div class="core-flow-arrow">
                <i class="fa-solid fa-arrow-right"></i>
            </div>

            <div class="core-flow-item">
                <span>06</span>
                <strong>Work</strong>
                <small>Complete the job</small>
            </div>

            <div class="core-flow-arrow">
                <i class="fa-solid fa-arrow-right"></i>
            </div>

            <div class="core-flow-item">
                <span>07</span>
                <strong>Review</strong>
                <small>Build trust</small>
            </div>

        </div>

        <p class="core-flow-note">
            Payment timing and payment protection should follow the final platform payment workflow; the current page does not assume escrow.
        </p>

    </div>

</section>


{{-- =========================================================
     CTA
     ========================================================= --}}

<section class="cta-section">

    <div class="container">

        <div class="cta-card">

            <div>
                <span class="section-kicker">GET STARTED</span>

                <h2>Ready to put IdleMach to work?</h2>

                <p>
                    Discover available manufacturing capacity or list
                    your unused machine hours for productive work.
                </p>
            </div>

            <div class="cta-actions">

                <a href="{{ url('/browse-machines') }}"
                    class="btn btn-primary-idle">
                    Browse Machines
                </a>

                <a href="{{ url('/register') }}"
                    class="btn btn-secondary-idle">
                    List Your Machine
                </a>

            </div>

        </div>

    </div>

</section>

@endsection