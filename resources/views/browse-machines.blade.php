@extends('layouts.app')

@section('title', 'Browse Machines — IdleMach')

@section('content')

<section class="marketplace-page">

    {{-- =========================================================
        MARKETPLACE HEADER
    ========================================================== --}}
    <section class="marketplace-hero">
        <div class="container">

            <span class="section-kicker">
                MANUFACTURING CAPACITY MARKETPLACE
            </span>

            <h1>Browse Machines</h1>

            <p>
                Find available manufacturing capacity across Gujarat.
            </p>

        </div>
    </section>


    {{-- =========================================================
        SEARCH & FILTERS
    ========================================================== --}}
    <section class="marketplace-filter-section">

        <div class="container">

            <form
                method="GET"
                action="{{ url('/browse-machines') }}"
                class="marketplace-filter">

                {{-- SEARCH --}}
                <div class="marketplace-filter-group">

                    <label for="machine-search">
                        Search
                    </label>

                    <input
                        id="machine-search"
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="CNC, laser, embroidery...">

                </div>


                {{-- MACHINE TYPE --}}
                <div class="marketplace-filter-group">

                    <label for="machine-type">
                        Machine Type
                    </label>

                    <select
                        id="machine-type"
                        name="type">
                        <option value="">
                            All types
                        </option>

                        <option
                            value="cnc"
                            @selected(request('type')==='cnc' )>
                            CNC Machining
                        </option>

                        <option
                            value="printing"
                            @selected(request('type')==='printing' )>
                            Printing
                        </option>

                        <option
                            value="embroidery"
                            @selected(request('type')==='embroidery' )>
                            Embroidery
                        </option>

                        <option
                            value="injection"
                            @selected(request('type')==='injection' )>
                            Injection Molding
                        </option>

                        <option
                            value="laser"
                            @selected(request('type')==='laser' )>
                            Laser Cutting
                        </option>
                    </select>

                </div>


                {{-- CITY --}}
                <div class="marketplace-filter-group">

                    <label for="machine-city">
                        City
                    </label>

                    <select
                        id="machine-city"
                        name="city">
                        <option value="">
                            All cities
                        </option>

                        <option
                            value="rajkot"
                            @selected(request('city')==='rajkot' )>
                            Rajkot
                        </option>

                        <option
                            value="ahmedabad"
                            @selected(request('city')==='ahmedabad' )>
                            Ahmedabad
                        </option>

                        <option
                            value="morbi"
                            @selected(request('city')==='morbi' )>
                            Morbi
                        </option>

                        <option
                            value="surat"
                            @selected(request('city')==='surat' )>
                            Surat
                        </option>
                    </select>

                </div>


                {{-- MAX RATE --}}
                <div class="marketplace-filter-group">

                    <label for="max-rate">
                        Max Rate (₹/hr)
                    </label>

                    <input
                        id="max-rate"
                        type="number"
                        name="max_rate"
                        value="{{ request('max_rate') }}"
                        placeholder="1500"
                        min="0">

                </div>


                {{-- SORT --}}
                <div class="marketplace-filter-group marketplace-sort-group">

                    <label for="machine-sort">
                        Sort results
                    </label>

                    <select
                        id="machine-sort"
                        name="sort"
                        aria-label="Sort machine results"
                        onchange="this.form.submit()">
                        <option value="">Recommended</option>
                        <option value="price_asc" @selected(request('sort') === 'price_asc')>Price: Low to High</option>
                        <option value="price_desc" @selected(request('sort') === 'price_desc')>Price: High to Low</option>
                        <option value="rating_desc" @selected(request('sort') === 'rating_desc')>Rating</option>
                        <option value="availability" @selected(request('sort') === 'availability')>Availability</option>
                    </select>

                    <small class="marketplace-sort-hint">
                        <i class="fa-solid fa-check"></i>
                        Applied automatically
                    </small>

                </div>


                {{-- FILTER BUTTON --}}
                <button
                    type="submit"
                    class="marketplace-filter-button">
                    <i class="fa-solid fa-filter"></i>
                    <span>Filter</span>
                </button>

            </form>

        </div>

    </section>


    {{-- =========================================================
        MACHINE DIRECTORY
    ========================================================== --}}
    <section class="marketplace-machines">

        <div class="container">

            @php

            /*
            |--------------------------------------------------------------------------
            | Temporary Static Marketplace Data
            |--------------------------------------------------------------------------
            | Later this can be replaced with controller/database data.
            */

            $machines = $machines ?? [

            [
            'name' => 'Haas CNC Turning Machine',
            'owner' => 'Precision Works',
            'type' => 'CNC Machining',
            'location' => 'Rajkot',
            'rate' => 800,
            'rating' => 4.8,
            'status' => 'Available',
            'capacity' => '18 hours available',
            'image' => 'https://img2.tradewheel.com/uploads/images/products/9/9/journey-fanuc-system-factory-supplies-one-meter-11-single-provided-cnc-machine-5-axis-yil06cnc-machine-china-24-vertical-482-0512930001723030489.jpg',
            ],

            [
            'name' => 'Mimaki Large Format Printer',
            'owner' => 'Apex Industrial Solutions',
            'type' => 'Printing',
            'location' => 'Ahmedabad',
            'rate' => 450,
            'rating' => 4.6,
            'status' => 'Available',
            'capacity' => '24 hours available',
            'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1200&q=80',
            ],

            [
            'name' => 'Tajima 12-Head Embroidery',
            'owner' => 'Synergy Fab & Form',
            'type' => 'Embroidery',
            'location' => 'Morbi',
            'rate' => 350,
            'rating' => 4.9,
            'status' => 'Available',
            'capacity' => '12 hours available',
            'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=1200&q=80',
            ],

            [
            'name' => 'Engel Injection Molder 200T',
            'owner' => 'Vertex Manufacturing',
            'type' => 'Injection Molding',
            'location' => 'Surat',
            'rate' => 1200,
            'rating' => 4.7,
            'status' => 'Booked Today',
            'capacity' => 'Available tomorrow',
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1200&q=80',
            ],

            [
            'name' => 'Trotec Fiber Laser Cutter',
            'owner' => 'Nova Industrial Works',
            'type' => 'Laser Cutting',
            'location' => 'Rajkot',
            'rate' => 600,
            'rating' => 4.5,
            'status' => 'Available',
            'capacity' => '20 hours available',
            'image' => 'https://www.ifrontiers.lk/wp-content/uploads/2025/07/gweike_lf3015E-main.png',
            ],

            [
            'name' => 'Doosan CNC Milling Center',
            'owner' => 'PrimeTech Engineering',
            'type' => 'CNC Machining',
            'location' => 'Ahmedabad',
            'rate' => 950,
            'rating' => 4.8,
            'status' => 'Available',
            'capacity' => '16 hours available',
            'image' => 'https://image.made-in-china.com/2f0j00aFOiAwcCwTRm/Metal-Cutting-CNC-Vertical-Machining-Center-Vmc1160-CNC-Milling-Machine-Price.webp',
            ],

            ];

            @endphp

            @php
                $sort = request('sort');

                if ($sort === 'price_asc') {
                    usort($machines, fn ($a, $b) => $a['rate'] <=> $b['rate']);
                } elseif ($sort === 'price_desc') {
                    usort($machines, fn ($a, $b) => $b['rate'] <=> $a['rate']);
                } elseif ($sort === 'rating_desc') {
                    usort($machines, fn ($a, $b) => $b['rating'] <=> $a['rating']);
                } elseif ($sort === 'availability') {
                    usort($machines, function ($a, $b) {
                        return ($a['status'] === 'Available' ? 0 : 1)
                            <=> ($b['status'] === 'Available' ? 0 : 1);
                    });
                }
            @endphp


            {{-- RESULTS HEADER --}}
            <div class="marketplace-results-header">

                <div>
                    <h2>
                        Available Machine Capacity
                    </h2>

                    <span>
                        Showing all {{ count($machines) }} currently listed machines
                    </span>
                </div>

                <span>
                    Verified manufacturing capacity
                </span>

            </div>


            {{-- MACHINE GRID --}}
            <div class="row g-4">

                @foreach ($machines as $machine)

                <div class="col-lg-4 col-md-6">

                    <article class="marketplace-machine-card">

                        {{-- MACHINE IMAGE --}}
                        <div class="marketplace-machine-image">

                            <img
                                src="{{ $machine['image'] }}"
                                alt="{{ $machine['name'] }}"
                                loading="lazy">

                            <span class="marketplace-machine-category">
                                {{ $machine['type'] }}
                            </span>


                            @if ($machine['status'] === 'Available')

                            <span class="marketplace-machine-status">
                                Available
                            </span>

                            @endif

                        </div>


                        {{-- MACHINE BODY --}}
                        <div class="marketplace-machine-body">

                            <h3>
                                {{ $machine['name'] }}
                            </h3>


                            {{-- OWNER + RATING --}}
                            <div class="marketplace-machine-owner">

                                <i class="fa-solid fa-building"></i>

                                <span>
                                    {{ $machine['owner'] }}
                                </span>

                                <span class="marketplace-machine-owner-rating">
                                    <i
                                        class="fa-solid fa-star"
                                        style="color: var(--orange);"></i>
                                    {{ $machine['rating'] }}
                                </span>

                            </div>


                            {{-- LOCATION --}}
                            <div class="marketplace-machine-location">

                                <i class="fa-solid fa-location-dot"></i>

                                <span>
                                    {{ $machine['location'] }}
                                </span>

                            </div>


                            {{-- CAPACITY --}}
                            <div class="marketplace-machine-capacity">

                                <span>
                                    {{ $machine['capacity'] }}
                                </span>

                                <strong>
                                    {{ $machine['status'] }}
                                </strong>

                            </div>

                            @if ($machine['status'] !== 'Available')
                                <a
                                    href="mailto:?subject={{ rawurlencode('IdleMach availability request: ' . $machine['name']) }}&body={{ rawurlencode('I would like to be notified when ' . $machine['name'] . ' is available.') }}"
                                    class="marketplace-notify-link">
                                    <i class="fa-regular fa-bell"></i>
                                    Notify me when available
                                </a>
                            @endif


                            {{-- FOOTER --}}
                            <div class="marketplace-machine-footer">

                                <div class="marketplace-machine-price">

                                    <small>
                                        Machine rate
                                    </small>

                                    <strong>
                                        ₹{{ number_format($machine['rate']) }}

                                        <span>
                                            / hour
                                        </span>
                                    </strong>

                                </div>


                                <a href="#">
                                    View Details
                                    <i class="fa-solid fa-arrow-right ms-1"></i>
                                </a>

                            </div>

                        </div>

                    </article>

                </div>

                @endforeach

            </div>



        </div>

    </section>

</section>

@endsection