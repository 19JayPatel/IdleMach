<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'IdleMach — Turn Idle Capacity Into Opportunity')
    </title>

    <meta name="description"
        content="@yield('meta_description', 'IdleMach connects manufacturing businesses with unused machine capacity and buyers who need production capacity.')">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        rel="stylesheet">

    <!-- IdleMach CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body>

    {{-- =========================================================
        NAVBAR
    ========================================================== --}}

    <nav class="navbar navbar-expand-lg navbar-idle sticky-top">

        <div class="container">

            {{-- Brand --}}
            <a class="navbar-brand" href="{{ url('/') }}" aria-label="IdleMach Home">

                <span class="brand-mark">
                    <i class="fa-solid fa-gears"></i>
                </span>

                <span class="navbar-brand-group">

                    <span>IdleMach</span>

                    <span class="navbar-tagline">
                        Turn idle capacity into opportunity.
                    </span>

                </span>

            </a>


            {{-- Mobile Menu Button --}}
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#idleNav"
                aria-controls="idleNav"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>


            {{-- Navigation --}}
            <div class="collapse navbar-collapse" id="idleNav">

                <ul class="navbar-nav mx-auto align-items-lg-center">

                    {{-- Home --}}
                    <li class="nav-item">

                        <a
                            class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ url('/') }}">

                            Home

                        </a>

                    </li>


                    {{-- How It Works --}}
                    <li class="nav-item">

                        <a
                            class="nav-link {{ request()->is('how-it-works') ? 'active' : '' }}"
                            href="{{ url('/how-it-works') }}">

                            How It Works

                        </a>

                    </li>


                    {{-- Marketplace --}}
                    <li class="nav-item">

                        <a
                            class="nav-link {{ request()->is('browse-machines') ? 'active' : '' }}"
                            href="{{ url('/browse-machines') }}">

                            Marketplace

                        </a>

                    </li>


                    {{-- Machine Details --}}
                    <li class="nav-item">

                        <a
                            class="nav-link {{ request()->is('machine-details') ? 'active' : '' }}"
                            href="{{ url('/machine-details') }}">

                            Machine Details

                        </a>

                    </li>


                    {{-- About --}}
                    <li class="nav-item">

                        <a
                            class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                            href="{{ url('/about') }}">

                            About

                        </a>

                    </li>

                </ul>


                {{-- Right Side --}}
                <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">

                    {{-- Login --}}
                    <a
                        href="{{ Route::has('login') ? route('login') : '#' }}"
                        class="btn btn-idle-ghost">

                        Login

                    </a>


                    {{-- Register --}}
                    <a
                        href="{{ Route::has('register') ? route('register') : '#' }}"
                        class="btn btn-idle-primary">

                        Register

                    </a>


                    {{-- User Icon --}}
                    <a
                        href="{{ Route::has('login') ? route('login') : '#' }}"
                        class="avatar-icon"
                        aria-label="Account">

                        <i class="fa-regular fa-user"></i>

                    </a>

                </div>

            </div>

        </div>

    </nav>



    {{-- =========================================================
        PAGE CONTENT
    ========================================================== --}}

    <main>

        @yield('content')

    </main>



    {{-- =========================================================
        FOOTER
    ========================================================== --}}

    <footer class="footer-idle">

        <div class="container">

            <div class="row g-5">


                {{-- Brand / About --}}
                <div class="col-lg-5">

                    <a
                        class="navbar-brand text-white mb-3 d-inline-flex"
                        href="{{ url('/') }}">

                        <span class="brand-mark">

                            <i class="fa-solid fa-gears"></i>

                        </span>

                        <span class="navbar-brand-group">

                            <span>IdleMach</span>

                            <span
                                class="navbar-tagline"
                                style="color: var(--footer-muted);">

                                Turn idle capacity into opportunity.

                            </span>

                        </span>

                    </a>


                    <p class="mb-3" style="max-width: 390px;">

                        Connecting machine owners with manufacturers
                        who need precision production capacity,
                        transparent rates, and dependable shop-floor access.

                    </p>


                    {{-- Verification --}}
                    <span class="footer-verify-badge">

                        <span class="dot"></span>

                        Engineered capacity marketplace

                    </span>


                    {{-- Social --}}
                    <div class="footer-social mt-4">

                        <a
                            href="#"
                            aria-label="LinkedIn">

                            <i class="fa-brands fa-linkedin-in"></i>

                        </a>


                        <a
                            href="#"
                            aria-label="Instagram">

                            <i class="fa-brands fa-instagram"></i>

                        </a>


                        <a
                            href="#"
                            aria-label="Facebook">

                            <i class="fa-brands fa-facebook-f"></i>

                        </a>

                    </div>

                </div>



                {{-- Platform --}}
                <div class="col-6 col-lg-2">

                    <h6>Platform</h6>

                    <ul class="list-unstyled d-flex flex-column gap-2">

                        <li>
                            <a href="{{ url('/') }}">
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/how-it-works') }}">
                                How It Works
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/browse-machines') }}">
                                Marketplace
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/machine-details') }}">
                                Machine Details
                            </a>
                        </li>

                    </ul>

                </div>



                {{-- Company --}}
                <div class="col-6 col-lg-2">

                    <h6>Company</h6>

                    <ul class="list-unstyled d-flex flex-column gap-2">

                        <li>
                            <a href="{{ url('/about') }}">
                                About
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/contact') }}">
                                Contact
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/faq') }}">
                                FAQ
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Privacy
                            </a>
                        </li>

                    </ul>

                </div>



                {{-- Contact --}}
                <div class="col-lg-3">

                    <h6>Get in touch</h6>

                    <ul class="list-unstyled d-flex flex-column gap-3">

                        <li>

                            <i class="fa-regular fa-envelope me-2"></i>

                            support@idlemach.com

                        </li>


                        <li>

                            <i class="fa-solid fa-location-dot me-2"></i>

                            Rajkot, Gujarat, India

                        </li>

                    </ul>

                </div>

            </div>



            {{-- Footer Bottom --}}
            <div
                class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">

                <span>

                    &copy; {{ date('Y') }} IdleMach.
                    All rights reserved.

                </span>


                <div class="d-flex gap-3">

                    <a href="#">
                        Privacy Policy
                    </a>

                    <a href="#">
                        Terms of Service
                    </a>

                </div>

            </div>

        </div>

    </footer>



    <!-- Bootstrap JS -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js">
    </script>

    @stack('scripts')

</body>

</html>