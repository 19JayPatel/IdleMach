@extends('layouts.app')

@section('title', 'How It Works — IdleMach')

@section('content')

<section class="section-tight text-center">
    <div class="container">
        <h1 class="display-6 mb-3">How IdleMach Works</h1>
        <p class="fs-5 mx-auto" style="max-width: 560px;">
            One marketplace, two sides of the same problem — idle capacity on one end, unmet demand on the other.
        </p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <div class="row g-5">

            {{-- OWNER FLOW --}}
            <div class="col-lg-6">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="category-icon mb-0" style="background-color: #1677FF1A; color: var(--blue);">
                        <i class="fa-solid fa-industry"></i>
                    </div>
                    <h2 class="h3 mb-0">For Machine Owners</h2>
                </div>
                <p class="mb-4">Turn the hours your machine sits idle into paid work, without giving up control of your schedule.</p>

                <div class="step-row">
                    <div class="step-number">1</div>
                    <div>
                        <h5 class="mb-1">Create your profile & list a machine</h5>
                        <p class="mb-0">Add your company details, machine type, specifications, hourly rate and available hours.</p>
                    </div>
                </div>

                <div class="step-row">
                    <div class="step-number">2</div>
                    <div>
                        <h5 class="mb-1">Get approved by IdleMach</h5>
                        <p class="mb-0">Our team reviews new listings before they go live, so buyers only see verified machines.</p>
                    </div>
                </div>

                <div class="step-row">
                    <div class="step-number">3</div>
                    <div>
                        <h5 class="mb-1">Receive booking requests</h5>
                        <p class="mb-0">Buyers send requests for specific dates and hours. You accept or reject each one.</p>
                    </div>
                </div>

                <div class="step-row">
                    <div class="step-number">4</div>
                    <div>
                        <h5 class="mb-1">Complete the work & get paid</h5>
                        <p class="mb-0">Mark the booking complete once the job is done, and collect payment through the platform.</p>
                    </div>
                </div>

                <div class="step-row">
                    <div class="step-number">5</div>
                    <div>
                        <h5 class="mb-1">Build your reputation</h5>
                        <p class="mb-0">Buyer reviews stack up on your profile, helping you win more bookings over time.</p>
                    </div>
                </div>
            </div>

            {{-- BUYER FLOW --}}
            <div class="col-lg-6">
                <div class="d-flex align-items-center gap-3 mb-2">
                    <div class="category-icon mb-0" style="background-color: #F973161A; color: var(--orange);">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <h2 class="h3 mb-0">For Buyers</h2>
                </div>
                <p class="mb-4">Skip the wait for your own machine to free up — find capacity that's already available.</p>

                <div class="step-row">
                    <div class="step-number">1</div>
                    <div>
                        <h5 class="mb-1">Search by machine type & location</h5>
                        <p class="mb-0">Filter listings by process, city, hourly rate and available dates.</p>
                    </div>
                </div>

                <div class="step-row">
                    <div class="step-number">2</div>
                    <div>
                        <h5 class="mb-1">Review machine details</h5>
                        <p class="mb-0">Check specifications, owner ratings and real-time availability before requesting.</p>
                    </div>
                </div>

                <div class="step-row">
                    <div class="step-number">3</div>
                    <div>
                        <h5 class="mb-1">Send a booking request</h5>
                        <p class="mb-0">Pick your dates and hours, attach any work documents, and send the request.</p>
                    </div>
                </div>

                <div class="step-row">
                    <div class="step-number">4</div>
                    <div>
                        <h5 class="mb-1">Pay once accepted</h5>
                        <p class="mb-0">Once the owner accepts, confirm your booking with payment through the platform.</p>
                    </div>
                </div>

                <div class="step-row">
                    <div class="step-number">5</div>
                    <div>
                        <h5 class="mb-1">Track the job & leave a review</h5>
                        <p class="mb-0">Follow the booking to completion, then rate your experience for other buyers.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ================= CORE FLOW STRIP ================= --}}
<section class="section-tight" style="background-color: var(--bg-secondary);">
    <div class="container">
        <h2 class="h3 text-center mb-5">The core flow, end to end</h2>
        <div class="row g-3 text-center">
            @php
            $flow = ['List', 'Discover', 'Request', 'Accept', 'Pay', 'Work', 'Review'];
            @endphp
            @foreach ($flow as $i => $step)
            <div class="col-6 col-md">
                <div class="fw-bold display-font mb-1" style="color: var(--blue);">{{ $step }}</div>
                @if (!$loop->last)
                <div class="d-none d-md-block text-muted-custom mt-2"><i class="fa-solid fa-arrow-right-long"></i></div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-tight text-center">
    <div class="container">
        <h2 class="h3 mb-3">Ready to see it in action?</h2>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ url('/browse-machines') }}" class="btn btn-idle-primary btn-lg">Browse Machines</a>
            <a href="{{ Route::has('register') ? route('register') : '#' }}" class="btn btn-idle-outline btn-lg">List Your Machine</a>
        </div>
    </div>
</section>

@endsection