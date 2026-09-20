@extends('layouts.app')

@section('title', 'Browse Machines — IdleMach')

@section('content')

<section class="section-tight" style="background-color: var(--bg-secondary);">
    <div class="container">
        <h1 class="display-6 mb-2">Browse Machines</h1>
        <p class="fs-5 mb-4">{{ isset($machines) ? $machines->count() : '150+' }} approved machines available across Gujarat.</p>

        {{-- FILTER BAR --}}
        <form method="GET" action="{{ url('/browse-machines') }}" class="filter-bar">
            <div class="row g-3 align-items-end">
                <div class="col-lg-4 col-md-6">
                    <label class="form-label small fw-semibold">Search</label>
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-idle" placeholder="e.g. CNC, embroidery, laser cutting">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="form-label small fw-semibold">Machine Type</label>
                    <select name="type" class="form-select form-select-idle">
                        <option value="">All types</option>
                        <option value="cnc" @selected(request('type')=='cnc' )>CNC Machining</option>
                        <option value="printing" @selected(request('type')=='printing' )>Printing</option>
                        <option value="embroidery" @selected(request('type')=='embroidery' )>Embroidery</option>
                        <option value="injection" @selected(request('type')=='injection' )>Injection Molding</option>
                        <option value="laser" @selected(request('type')=='laser' )>Laser Cutting</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6">
                    <label class="form-label small fw-semibold">City</label>
                    <select name="city" class="form-select form-select-idle">
                        <option value="">All cities</option>
                        <option value="rajkot" @selected(request('city')=='rajkot' )>Rajkot</option>
                        <option value="ahmedabad" @selected(request('city')=='ahmedabad' )>Ahmedabad</option>
                        <option value="morbi" @selected(request('city')=='morbi' )>Morbi</option>
                        <option value="surat" @selected(request('city')=='surat' )>Surat</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6">
                    <label class="form-label small fw-semibold">Max Rate (₹/hr)</label>
                    <input type="number" name="max_rate" value="{{ request('max_rate') }}" class="form-control form-control-idle" placeholder="1500">
                </div>
                <div class="col-lg-1 col-md-12">
                    <button type="submit" class="btn btn-idle-primary w-100"><i class="fa-solid fa-filter"></i></button>
                </div>
            </div>
        </form>
    </div>
</section>

<section class="section">
    <div class="container">

        {{--
            Replace this hardcoded array with real data from your controller, e.g.:
            $machines = Machine::where('status', 'active')->paginate(9);
        --}}
        @php
        $machines = $machines ?? [
        ['name' => 'Haas CNC Turning Machine', 'type' => 'CNC Machining', 'icon' => 'fa-solid fa-gears', 'color' => '#1677FF', 'location' => 'Rajkot', 'rate' => 800, 'rating' => 4.8, 'status' => 'Available'],
        ['name' => 'Mimaki Large Format Printer', 'type' => 'Printing', 'icon' => 'fa-solid fa-print', 'color' => '#B87333', 'location' => 'Ahmedabad', 'rate' => 450, 'rating' => 4.6, 'status' => 'Available'],
        ['name' => 'Tajima 12-Head Embroidery', 'type' => 'Embroidery', 'icon' => 'fa-solid fa-shirt', 'color' => '#F97316', 'location' => 'Morbi', 'rate' => 350, 'rating' => 4.9, 'status' => 'Available'],
        ['name' => 'Engel Injection Molder 200T', 'type' => 'Injection Molding', 'icon' => 'fa-solid fa-cubes', 'color' => '#1677FF', 'location' => 'Surat', 'rate' => 1200, 'rating' => 4.7, 'status' => 'Booked Today'],
        ['name' => 'Trotec Fiber Laser Cutter', 'type' => 'Laser Cutting', 'icon' => 'fa-solid fa-bolt', 'color' => '#B87333', 'location' => 'Rajkot', 'rate' => 600, 'rating' => 4.5, 'status' => 'Available'],
        ['name' => 'Doosan CNC Milling Center', 'type' => 'CNC Machining', 'icon' => 'fa-solid fa-gears', 'color' => '#1677FF', 'location' => 'Ahmedabad', 'rate' => 950, 'rating' => 4.8, 'status' => 'Available'],
        ];
        @endphp

        <div class="row g-4">
            @foreach ($machines as $machine)
            <div class="col-lg-4 col-md-6">
                <div class="machine-card">
                    <div class="machine-card-top" style="background-color: {{ $machine['color'] }};">
                        <i class="{{ $machine['icon'] }}"></i>
                    </div>
                    <div class="machine-card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="text-muted-custom small">{{ $machine['type'] }}</span>
                            @if ($machine['status'] === 'Available')
                            <span class="badge-status" style="background:#EFF6FF; color:#1677FF;">Available</span>
                            @else
                            <span class="badge-status" style="background:var(--bg-secondary); color:var(--text-secondary);">{{ $machine['status'] }}</span>
                            @endif
                        </div>

                        <h5 class="mb-2">{{ $machine['name'] }}</h5>

                        <div class="d-flex align-items-center gap-3 text-muted-custom small mb-3">
                            <span><i class="fa-solid fa-location-dot me-1"></i>{{ $machine['location'] }}</span>
                            <span><i class="fa-solid fa-star me-1" style="color:#F97316;"></i>{{ $machine['rating'] }}</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-2" style="border-top:1px solid var(--border-light);">
                            <div>
                                <span class="machine-price fs-5">₹{{ number_format($machine['rate']) }}</span>
                                <span class="text-muted-custom small">/hour</span>
                            </div>
                            <a href="#" class="btn btn-idle-outline btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination placeholder — swap for {{ $machines->links() }} once using real paginated data --}}
        <nav class="d-flex justify-content-center mt-5">
            <ul class="pagination">
                <li class="page-item disabled"><span class="page-link">Previous</span></li>
                <li class="page-item active"><span class="page-link">1</span></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</section>

@endsection