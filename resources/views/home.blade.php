@extends('layouts.app')

@section('title', 'IdleMach — Turn Idle Capacity Into Opportunity')

@section('content')

{{-- ================= HERO ================= --}}
<section class="section-tight">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="hero-badge mb-4">
                    <span class="dot"></span> 4,200+ idle machine-hours listed this week
                </span>

                <h1 class="display-5 mb-3" style="line-height:1.15;">Turn Idle Capacity Into Opportunity.</h1>

                <p class="fs-5 max-content mb-4">
                    IdleMach connects manufacturing businesses that have unused machine hours with buyers who need
                    capacity right now — CNC, printing, embroidery, injection-molding and laser-cutting, booked in a few clicks.
                </p>

                <div class="d-flex flex-wrap gap-3 mb-4">
                    <a href="{{ url('/browse-machines') }}" class="btn btn-idle-primary btn-lg">Browse Machines</a>
                    <a href="{{ Route::has('register') ? route('register') : '#' }}" class="btn btn-idle-outline btn-lg">List Your Machine</a>
                </div>

                <div class="d-flex flex-wrap gap-4 pt-2">
                    <div>
                        <div class="fs-4 fw-bold display-font">150+</div>
                        <div class="text-muted-custom small">Machines listed</div>
                    </div>
                    <div>
                        <div class="fs-4 fw-bold display-font">12</div>
                        <div class="text-muted-custom small">Cities in Gujarat</div>
                    </div>
                    <div>
                        <div class="fs-4 fw-bold display-font">₹8,000+</div>
                        <div class="text-muted-custom small">Avg. booking value</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="capacity-card">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div>
                            <div class="fw-semibold display-font">This Week's Capacity</div>
                            <div class="text-muted-custom small">Across 5 listed machines</div>
                        </div>
                        <span class="badge-status" style="background:#FFF7ED;color:#EA580C;">Live</span>
                    </div>

                    {{-- Capacity bar chart — reflects the "used vs idle hours" core idea --}}
                    <svg viewBox="0 0 400 230" width="100%" height="220" role="img" aria-label="Chart showing used and idle machine capacity">
                        @php
                        $machines = [
                        ['label' => 'CNC Turn', 'used' => 60, 'idle' => 40],
                        ['label' => 'Laser Cut', 'used' => 45, 'idle' => 55],
                        ['label' => 'Injection', 'used' => 70, 'idle' => 30],
                        ['label' => 'Print', 'used' => 35, 'idle' => 65],
                        ['label' => 'Embroidery', 'used' => 55, 'idle' => 45],
                        ];
                        $barWidth = 46;
                        $gap = 26;
                        $chartHeight = 170;
                        $startX = 20;
                        @endphp

                        @foreach ($machines as $i => $m)
                        @php
                        $x = $startX + $i * ($barWidth + $gap);
                        $usedH = ($m['used'] / 100) * $chartHeight;
                        $idleH = ($m['idle'] / 100) * $chartHeight;
                        $usedY = 190 - $usedH;
                        $idleY = $usedY - $idleH;
                        @endphp
                        <rect x="{{ $x }}" y="{{ $usedY }}" width="{{ $barWidth }}" height="{{ $usedH }}" rx="4" fill="#D9E1EA" />
                        <rect x="{{ $x }}" y="{{ $idleY }}" width="{{ $barWidth }}" height="{{ $idleH }}" rx="4" fill="#F97316" fill-opacity="0.85" />
                        <text x="{{ $x + $barWidth / 2 }}" y="208" text-anchor="middle" font-size="11" fill="#526174" font-family="Inter, sans-serif">{{ $m['label'] }}</text>
                        @endforeach
                    </svg>

                    <div class="capacity-legend">
                        <span><span class="swatch" style="background:#D9E1EA;"></span>Used hours</span>
                        <span><span class="swatch" style="background:#F97316;"></span>Idle hours (available to book)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= CATEGORIES ================= --}}
<section class="section" style="background-color: var(--bg-secondary);">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <h2 class="h1 mb-3">Capacity across every process</h2>
                <p class="fs-5">Whatever your job needs, there's likely a machine sitting idle nearby that can run it today.</p>
            </div>
        </div>

        <div class="row g-4">
            @php
            $categories = [
            ['icon' => 'fa-solid fa-gears', 'color' => '#1677FF', 'name' => 'CNC Machining', 'desc' => 'Turning, milling and precision cutting.'],
            ['icon' => 'fa-solid fa-print', 'color' => '#B87333', 'name' => 'Printing', 'desc' => 'Offset, digital and large-format printing.'],
            ['icon' => 'fa-solid fa-shirt', 'color' => '#F97316', 'name' => 'Embroidery', 'desc' => 'Multi-head embroidery for bulk orders.'],
            ['icon' => 'fa-solid fa-cubes', 'color' => '#1677FF', 'name' => 'Injection Molding', 'desc' => 'Plastic parts, short and long runs.'],
            ['icon' => 'fa-solid fa-bolt', 'color' => '#B87333', 'name' => 'Laser Cutting', 'desc' => 'Sheet metal and acrylic cutting.'],
            ];
            @endphp

            @foreach ($categories as $cat)
            <div class="col-lg-4 col-md-6">
                <div class="category-tile">
                    <div class="category-icon" style="background-color: {{ $cat['color'] }}1A; color: {{ $cat['color'] }};">
                        <i class="{{ $cat['icon'] }}"></i>
                    </div>
                    <h5 class="mb-2">{{ $cat['name'] }}</h5>
                    <p class="mb-0">{{ $cat['desc'] }}</p>
                </div>
            </div>
            @endforeach

            <div class="col-lg-4 col-md-6">
                <div class="category-tile d-flex flex-column justify-content-center align-items-start" style="background-color: var(--blue);">
                    <h5 class="mb-2 text-white">See all machines</h5>
                    <p class="mb-3" style="color: rgba(255,255,255,0.8);">Browse every listing, filtered by type and city.</p>
                    <a href="{{ url('/browse-machines') }}" class="btn btn-idle-outline bg-white">Browse Machines</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= VALUE PROPS ================= --}}
<section class="section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <h3 class="h2 mb-3">If you own a machine</h3>
                <div class="d-flex gap-3 mb-3">
                    <i class="fa-solid fa-circle-check fs-5 mt-1" style="color: var(--blue);"></i>
                    <p class="mb-0">List your idle hours in minutes — no long onboarding.</p>
                </div>
                <div class="d-flex gap-3 mb-3">
                    <i class="fa-solid fa-circle-check fs-5 mt-1" style="color: var(--blue);"></i>
                    <p class="mb-0">Choose which requests to accept — you stay in control.</p>
                </div>
                <div class="d-flex gap-3 mb-4">
                    <i class="fa-solid fa-circle-check fs-5 mt-1" style="color: var(--blue);"></i>
                    <p class="mb-0">Get paid for hours that would otherwise sit unused.</p>
                </div>
                <a href="{{ Route::has('register') ? route('register') : '#' }}" class="btn btn-idle-primary">List Your Machine</a>
            </div>

            <div class="col-lg-6">
                <h3 class="h2 mb-3">If you need capacity</h3>
                <div class="d-flex gap-3 mb-3">
                    <i class="fa-solid fa-circle-check fs-5 mt-1" style="color: var(--orange);"></i>
                    <p class="mb-0">Find verified machines near you by type and rate.</p>
                </div>
                <div class="d-flex gap-3 mb-3">
                    <i class="fa-solid fa-circle-check fs-5 mt-1" style="color: var(--orange);"></i>
                    <p class="mb-0">Check availability and send a booking request directly.</p>
                </div>
                <div class="d-flex gap-3 mb-4">
                    <i class="fa-solid fa-circle-check fs-5 mt-1" style="color: var(--orange);"></i>
                    <p class="mb-0">Skip the wait for your own machine to free up.</p>
                </div>
                <a href="{{ url('/browse-machines') }}" class="btn btn-idle-outline">Browse Machines</a>
            </div>
        </div>
    </div>
</section>

{{-- ================= CTA BAND ================= --}}
<section class="section-tight">
    <div class="container">
        <div class="cta-band text-center">
            <h2 class="h1 text-white mb-3">Ready to put idle hours to work?</h2>
            <p class="fs-5 mb-4 mx-auto" style="max-width: 480px;">Join owners and buyers already turning unused capacity into completed jobs.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ Route::has('register') ? route('register') : '#' }}" class="btn btn-idle-primary btn-lg">Get Started Free</a>
                <a href="{{ url('/how-it-works') }}" class="btn btn-idle-outline btn-lg bg-transparent text-white border-light">See How It Works</a>
            </div>
        </div>
    </div>
</section>

@endsection