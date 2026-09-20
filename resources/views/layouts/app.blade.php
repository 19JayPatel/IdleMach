<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'IdleMach — Turn Idle Capacity Into Opportunity')
    </title>

    <meta
        name="description"
        content="@yield('meta_description', 'IdleMach connects manufacturing businesses with available industrial machine capacity.')">

    {{-- =====================================================
        FAVICON
    ====================================================== --}}

    <link
        rel="icon"
        type="image/x-icon"
        href="{{ asset('images/logo/favicon.svg') }}">

    <link
        rel="icon"
        type="image/svg+xml"
        href="{{ asset('images/logo/logo-icon.svg') }}">


    {{-- =====================================================
        GOOGLE FONTS
    ====================================================== --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet">


    {{-- =====================================================
        BOOTSTRAP
    ====================================================== --}}

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        rel="stylesheet">


    {{-- =====================================================
        FONT AWESOME
    ====================================================== --}}

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        rel="stylesheet">


    {{-- =====================================================
        IDLEMACH CSS
    ====================================================== --}}

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}">

    @stack('styles')

</head>


<body>


    {{-- =========================================================
    NAVBAR
========================================================= --}}

    <header>

        <nav class="navbar navbar-expand-lg navbar-idle sticky-top">

            <div class="container">

                {{-- LOGO --}}
                <a
                    href="{{ url('/') }}"
                    class="navbar-brand idle-logo"
                    aria-label="IdleMach Home">

                    <img
                        src="{{ asset('images/logo/png/logo-horizontal.png') }}"
                        alt="IdleMach">

                </a>


                {{-- MOBILE TOGGLE --}}
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#idleNavigation"
                    aria-controls="idleNavigation"
                    aria-expanded="false"
                    aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

                </button>


                {{-- NAVIGATION --}}
                <div
                    class="collapse navbar-collapse"
                    id="idleNavigation">

                    <ul class="navbar-nav mx-auto">

                        <li class="nav-item">

                            <a
                                href="{{ url('/') }}"
                                class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                                Home
                            </a>

                        </li>


                        <li class="nav-item">

                            <a
                                href="{{ url('/how-it-works') }}"
                                class="nav-link {{ request()->is('how-it-works') ? 'active' : '' }}">
                                How It Works
                            </a>

                        </li>


                        <li class="nav-item">

                            <a
                                href="{{ url('/browse-machines') }}"
                                class="nav-link {{ request()->is('browse-machines') ? 'active' : '' }}">
                                Marketplace
                            </a>

                        </li>


                        <li class="nav-item">

                            <a
                                href="{{ url('/about') }}"
                                class="nav-link {{ request()->is('about') ? 'active' : '' }}">
                                About
                            </a>

                        </li>


                        <li class="nav-item">

                            <a
                                href="{{ url('/contact') }}"
                                class="nav-link {{ request()->is('contact') ? 'active' : '' }}">
                                Contact Us
                            </a>

                        </li>

                    </ul>


                    {{-- AUTH ACTIONS --}}
                    <div class="navbar-actions">

                        <a
                            href="{{ url('/login') }}"
                            class="nav-login">
                            Login
                        </a>


                        <a
                            href="{{ url('/register') }}"
                            class="btn btn-nav-register">
                            Register
                        </a>

                    </div>

                </div>

            </div>

        </nav>

    </header>


    {{-- =========================================================
    PAGE CONTENT
========================================================= --}}

    <main>

        @yield('content')

    </main>


    {{-- =========================================================
    FOOTER
========================================================= --}}

    <footer class="footer-idle">

        <div class="container">

            <div class="row gy-5">


                {{-- BRAND --}}
                <div class="col-lg-5">

                    <a
                        href="{{ url('/') }}"
                        class="footer-logo">

                        <img
                            src="{{ asset('images/logo/png/logo-horizontal-reverse.png') }}"
                            alt="IdleMach">

                    </a>


                    <p class="footer-description">

                        Turn idle machine capacity into productive
                        manufacturing opportunities.

                        IdleMach connects machine owners with businesses
                        looking for reliable production capacity.

                    </p>


                    <div class="footer-status">

                        <span></span>

                        Engineered capacity marketplace

                    </div>


                    <div class="footer-social">

                        <a href="#" aria-label="LinkedIn">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>

                        <a href="#" aria-label="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>

                        <a href="#" aria-label="Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>

                    </div>

                </div>


                {{-- PLATFORM --}}
                <div class="col-6 col-lg-2">

                    <h6>
                        Platform
                    </h6>

                    <ul>

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
                            <a href="{{ url('/about') }}">
                                About
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/contact') }}">
                                Contact Us
                            </a>
                        </li>

                    </ul>

                </div>


                {{-- ACCOUNT --}}
                <div class="col-6 col-lg-2">

                    <h6>
                        Account
                    </h6>

                    <ul>

                        <li>
                            <a href="{{ url('/login') }}">
                                Login
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/register') }}">
                                Register
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Privacy Policy
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Terms of Service
                            </a>
                        </li>

                    </ul>

                </div>


                {{-- CONTACT --}}
                <div class="col-lg-3">

                    <h6>
                        Contact
                    </h6>

                    <div class="footer-contact">

                        <div>

                            <i class="fa-regular fa-envelope"></i>

                            <span>
                                support@idlemach.com
                            </span>

                        </div>


                        <div>

                            <i class="fa-solid fa-location-dot"></i>

                            <span>
                                Gujarat, India
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- FOOTER BOTTOM --}}
            <div class="footer-bottom">

                <span>
                    © {{ date('Y') }} IdleMach. All rights reserved.
                </span>

                <span>
                    Turn Idle Capacity Into Opportunity.
                </span>

            </div>

        </div>

    </footer>


    {{-- =========================================================
    BOOTSTRAP JS
========================================================= --}}

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js">
    </script>

    @stack('scripts')

</body>

</html>