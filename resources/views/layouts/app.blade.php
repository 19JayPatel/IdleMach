<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IdleMach — Turn Idle Capacity Into Opportunity')</title>
    <meta name="description" content="IdleMach connects manufacturing businesses with idle machine capacity to buyers who need it — book verified machine hours near you.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-idle sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <span class="brand-mark"><i class="fa-solid fa-gear"></i></span>
                IdleMach
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#idleNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="idleNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('how-it-works') ? 'active' : '' }}" href="{{ url('/how-it-works') }}">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('browse-machines') ? 'active' : '' }}" href="{{ url('/browse-machines') }}">Browse Machines</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">
                    <a href="{{ Route::has('login') ? route('login') : '#' }}" class="btn btn-idle-ghost">Log in</a>
                    <a href="{{ Route::has('register') ? route('register') : '#' }}" class="btn btn-idle-primary">List Your Machine</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer-idle">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a class="navbar-brand text-white mb-3 d-inline-flex" href="{{ url('/') }}">
                        <span class="brand-mark"><i class="fa-solid fa-gear"></i></span>
                        IdleMach
                    </a>
                    <p class="mb-3" style="max-width: 320px;">Turn Idle Capacity Into Opportunity. A marketplace connecting manufacturing capacity with the businesses that need it.</p>
                    <div class="footer-social">
                        <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-6">
                    <h6>Platform</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/how-it-works') }}">How It Works</a></li>
                        <li><a href="{{ url('/browse-machines') }}">Browse Machines</a></li>
                        <li><a href="#">About</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-6">
                    <h6>For Businesses</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2">
                        <li><a href="#">List a Machine</a></li>
                        <li><a href="#">Owner Dashboard</a></li>
                        <li><a href="#">Request Capacity</a></li>
                        <li><a href="#">Pricing</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6>Contact</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2">
                        <li><i class="fa-regular fa-envelope me-2"></i>support@idlemach.com</li>
                        <li><i class="fa-solid fa-location-dot me-2"></i>Rajkot, Gujarat, India</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <span>&copy; {{ date('Y') }} IdleMach. All rights reserved.</span>
                <div class="d-flex gap-3">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>