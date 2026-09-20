@extends('layouts.app')

@section('title', 'IdleMach — Industrial Capacity Marketplace')

@section(
'meta_description',
'Find available CNC, VMC, laser cutting and other manufacturing capacity through IdleMach.'
)

@section('content')


{{-- =========================================================
    HERO
========================================================= --}}

<section class="home-hero">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- HERO CONTENT --}}
            <div class="col-lg-6">

                <span class="hero-kicker">
                    <span></span>
                    B2B MANUFACTURING CAPACITY MARKETPLACE
                </span>

                <h1>
                    Turn Idle Capacity
                    Into Opportunity.
                </h1>

                <p class="hero-description">

                    Find available manufacturing machines and working
                    capacity, or list unused machine capacity for
                    productive, revenue-generating shop floor hours.

                </p>

                <div class="hero-buttons">

                    <a
                        href="{{ url('/browse-machines') }}"
                        class="btn btn-primary-idle">
                        Find Machine Capacity

                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                    <a
                        href="{{ url('/register') }}"
                        class="btn btn-secondary-idle">
                        List Your Machine
                    </a>

                </div>

                <div class="hero-trust">

                    <span>
                        <i class="fa-solid fa-circle-check"></i>
                        Direct booking flow
                    </span>

                    <span>
                        Transparent hourly rates
                    </span>

                    <span>
                        Verified machine specs
                    </span>

                </div>

            </div>


            {{-- HERO MACHINE --}}
            <div class="col-lg-6">

                <div class="hero-machine-card">

                    <div class="hero-machine-image">

                        <img
                            src="https://prototool.com/wp-content/uploads/2023/04/Types-of-CNC-machines-1024x576.webp"
                            alt="Industrial CNC manufacturing machines">

                        <div class="machine-live">
                            <span></span>
                            LIVE SHOP FLOOR
                        </div>

                        <span class="machine-capability">
                            5-Axis High Tolerance
                        </span>

                    </div>


                    <div class="machine-info">

                        <div>

                            <small>
                                Verified Tolerance
                            </small>

                            <strong>
                                ± 0.005 mm
                            </strong>

                        </div>

                        <div>

                            <small>
                                Direct Utilization
                            </small>

                            <strong class="blue-text">
                                Zero Markups
                            </strong>

                        </div>

                        <div>

                            <small>
                                Capacity Settlement
                            </small>

                            <strong>
                                Escrow Assured
                            </strong>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    DUAL PARTICIPANT
========================================================= --}}

<section class="dual-section">

    <div class="container">

        <div class="section-heading">

            <span class="section-kicker">
                DUAL-PARTICIPANT INFRASTRUCTURE
            </span>

            <h2>
                Engineered for Both Sides
                of Precision Production
            </h2>

            <p>
                IdleMach connects underutilized shop floors with
                engineering teams looking for dependable production
                capacity without unnecessary intermediaries.
            </p>

        </div>


        <div class="row g-4">


            {{-- MACHINE OWNERS --}}
            <div class="col-lg-6">

                <div class="side-card owner-card">

                    <div class="side-card-header">

                        <div class="side-icon">
                            <i class="fa-solid fa-industry"></i>
                        </div>

                        <span>
                            Machine Owners
                        </span>

                    </div>


                    <h3>
                        Monetize Underutilized Shop Floors
                    </h3>

                    <p>
                        List machines and make unused production
                        capacity available on your terms.
                    </p>


                    <ul>

                        <li>
                            <i class="fa-regular fa-circle-check"></i>

                            List machine specifications, tooling
                            limits and CNC controller details.
                        </li>

                        <li>
                            <i class="fa-regular fa-circle-check"></i>

                            Define exact daily or weekly idle
                            capacity windows.
                        </li>

                        <li>
                            <i class="fa-regular fa-circle-check"></i>

                            Receive direct booking requests with
                            technical drawings and step files.
                        </li>

                        <li>
                            <i class="fa-regular fa-circle-check"></i>

                            Retain full approval control before
                            committing workshop time.
                        </li>

                    </ul>


                    <div class="side-card-footer">

                        <span>
                            Zero listing fees for shops
                        </span>

                        <a href="{{ url('/register') }}">

                            List Your Machine

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>



            {{-- CAPACITY BUYERS --}}
            <div class="col-lg-6">

                <div class="side-card buyer-card">

                    <div class="side-card-header">

                        <div class="side-icon">
                            <i class="fa-solid fa-crosshairs"></i>
                        </div>

                        <span>
                            Capacity Buyers
                        </span>

                    </div>


                    <h3>
                        Access Precision Manufacturing on Demand
                    </h3>

                    <p>
                        Find verified industrial machines and
                        available spindle hours without unnecessary
                        intermediaries.
                    </p>


                    <ul>

                        <li>
                            <i class="fa-regular fa-circle-check"></i>

                            Filter by CNC type, milling, turning,
                            wire EDM or fiber laser.
                        </li>

                        <li>
                            <i class="fa-regular fa-circle-check"></i>

                            View available working hours and
                            machine specifications.
                        </li>

                        <li>
                            <i class="fa-regular fa-circle-check"></i>

                            Submit structured job requests with
                            defined production requirements.
                        </li>

                        <li>
                            <i class="fa-regular fa-circle-check"></i>

                            Keep production planning transparent
                            from request to settlement.
                        </li>

                    </ul>


                    <div class="side-card-footer">

                        <span>
                            Instant specification filtering
                        </span>

                        <a href="{{ url('/browse-machines') }}">

                            Explore Marketplace

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
    WORKFLOW
========================================================= --}}

<section class="workflow-section">

    <div class="container">

        <div class="section-heading centered">

            <span class="section-kicker">
                OPERATIONAL WORKFLOW
            </span>

            <h2>
                How Capacity Sharing Works
            </h2>

            <p>
                A transparent workflow designed around machine
                availability, technical requirements and
                production predictability.
            </p>

        </div>


        @php

        $steps = [

        [
        'number' => '01',
        'icon' => 'fa-solid fa-magnifying-glass',
        'title' => 'Discovery & Listing',
        'text' => 'Owners list verified machine specifications and available production capacity.'
        ],

        [
        'number' => '02',
        'icon' => 'fa-regular fa-clock',
        'title' => 'Capacity & Request',
        'text' => 'Buyers select available hours and submit a structured production request.'
        ],

        [
        'number' => '03',
        'icon' => 'fa-regular fa-square-check',
        'title' => 'Owner Review',
        'text' => 'Machine owners review technical requirements and approve the request.'
        ],

        [
        'number' => '04',
        'icon' => 'fa-solid fa-box',
        'title' => 'Production & Settlement',
        'text' => 'Production is completed against agreed capacity and requirements.'
        ],

        ];

        @endphp


        <div class="workflow-grid">

            @foreach ($steps as $step)

            <div class="workflow-card">

                <div class="workflow-top">

                    <span>
                        {{ $step['number'] }}
                    </span>

                    <i class="{{ $step['icon'] }}"></i>

                </div>


                <h3>
                    {{ $step['title'] }}
                </h3>


                <p>
                    {{ $step['text'] }}
                </p>

            </div>

            @endforeach

        </div>

    </div>

</section>

{{-- =========================================================
    MACHINE DIRECTORY
========================================================= --}}

<section class="machines-section">

    <div class="container">

        <div class="section-heading-row">

            <div>

                <span class="section-kicker">
                    DIRECT ACCESS DIRECTORY
                </span>

                <h2>
                    Available Machine Capacity
                </h2>

                <p>
                    Explore active industrial machines ready for
                    production scheduling.
                </p>

            </div>

            <a
                href="{{ url('/browse-machines') }}"
                class="view-all-link">
                View all in Marketplace
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>


        @php

        $machines = [

        [
        'image' => 'https://img2.tradewheel.com/uploads/images/products/9/9/journey-fanuc-system-factory-supplies-one-meter-11-single-provided-cnc-machine-5-axis-yil06cnc-machine-china-24-vertical-482-0512930001723030489.jpg',
        'category' => 'CNC Milling & Turning',
        'title' => '5-Axis CNC Vertical Machining Center',
        'owner' => 'Precision Works',
        'location' => 'Rajkot, Gujarat',
        'capacity' => '6 hours / day',
        'rate' => '₹1,400',
        ],

        [
        'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1000&q=85',
        'category' => 'CNC Turning',
        'title' => 'Heavy-Duty CNC Turning Machine',
        'owner' => 'Apex Industrial Solutions',
        'location' => 'Pune, Maharashtra',
        'capacity' => '4 hours / day',
        'rate' => '₹800',
        ],

        [
        'image' => 'https://www.ifrontiers.lk/wp-content/uploads/2025/07/gweike_lf3015E-main.png',
        'category' => 'Sheet Metal Cutting',
        'title' => 'High-Speed Fiber Laser Cutting Machine',
        'owner' => 'Synergy Fab & Form',
        'location' => 'Coimbatore, Tamil Nadu',
        'capacity' => '8 hours / day',
        'rate' => '₹1,850',
        ],

        ];

        @endphp


        <div class="row g-4 machine-grid">

            @foreach ($machines as $machine)

            <div class="col-lg-4">

                <article class="machine-card">

                    {{-- IMAGE --}}
                    <div class="machine-photo">

                        <img
                            src="{{ $machine['image'] }}"
                            alt="{{ $machine['title'] }}"
                            loading="lazy">

                        <span>
                            {{ $machine['category'] }}
                        </span>

                    </div>


                    {{-- BODY --}}
                    <div class="machine-body">

                        <h3>
                            {{ $machine['title'] }}
                        </h3>


                        <p class="machine-owner">

                            <i class="fa-regular fa-building"></i>

                            {{ $machine['owner'] }}

                        </p>


                        <p class="machine-location">

                            <i class="fa-solid fa-location-dot"></i>

                            {{ $machine['location'] }}

                        </p>


                        {{-- CAPACITY --}}
                        <div class="capacity-available">

                            <span>

                                <i></i>

                                Available Capacity:

                            </span>

                            <strong>
                                {{ $machine['capacity'] }}
                            </strong>

                        </div>


                        {{-- FOOTER --}}
                        <div class="machine-footer">

                            <div>

                                <small>
                                    Hourly Rate
                                </small>

                                <strong>

                                    {{ $machine['rate'] }}

                                    <small>/ hr</small>

                                </strong>

                            </div>


                            <a href="{{ url('/browse-machines') }}">
                                View Details
                            </a>

                        </div>

                    </div>

                </article>

            </div>

            @endforeach

        </div>

    </div>

</section>


{{-- =========================================================
    WHY IDLEMACH
========================================================= --}}

<section class="why-idlemach-section">

    <div class="container">

        <div class="section-heading centered">

            <span class="section-kicker">
                WHY IDLEMACH
            </span>

            <h2>
                Built for Real Manufacturing Work
            </h2>

            <p>
                IdleMach is designed around how manufacturing
                businesses actually operate — machine capability,
                available hours, technical requirements and
                production demand.
            </p>

        </div>


        @php

        $benefits = [

        [
        'icon' => 'fa-solid fa-crosshairs',
        'color' => 'blue',
        'title' => 'Precision First',
        'text' => 'Discover machines using actual technical specifications instead of generic service listings.'
        ],

        [
        'icon' => 'fa-solid fa-clock',
        'color' => 'orange',
        'title' => 'Visible Capacity',
        'text' => 'See available production hours so you can plan around real machine availability.'
        ],

        [
        'icon' => 'fa-solid fa-shield-halved',
        'color' => 'blue',
        'title' => 'Transparent Process',
        'text' => 'Keep machine details, capacity requests and production requirements clear between both sides.'
        ],

        [
        'icon' => 'fa-solid fa-chart-line',
        'color' => 'orange',
        'title' => 'Better Utilization',
        'text' => 'Help manufacturers find capacity while helping machine owners use otherwise idle hours.'
        ],

        ];

        @endphp


        <div class="row g-4">

            @foreach ($benefits as $benefit)

            <div class="col-lg-3 col-md-6">

                <div class="why-card">

                    <div class="why-icon {{ $benefit['color'] }}">

                        <i class="{{ $benefit['icon'] }}"></i>

                    </div>


                    <h3>
                        {{ $benefit['title'] }}
                    </h3>


                    <p>
                        {{ $benefit['text'] }}
                    </p>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>



{{-- =========================================================
    CTA
========================================================= --}}

<section class="cta-section">

    <div class="container">

        <div class="cta-card">

            <div>

                <span class="section-kicker">
                    GET STARTED
                </span>

                <h2>
                    Ready to optimize your
                    manufacturing capacity?
                </h2>

                <p>
                    Join machine shops and manufacturers connecting
                    unused capacity with real production demand.
                </p>

            </div>


            <div class="cta-actions">

                <a
                    href="{{ url('/browse-machines') }}"
                    class="btn btn-primary-idle">
                    Find Machine Capacity
                </a>

                <a
                    href="{{ url('/register') }}"
                    class="btn btn-secondary-idle">
                    Register as Machine Owner
                </a>

            </div>

        </div>

    </div>

</section>


@endsection