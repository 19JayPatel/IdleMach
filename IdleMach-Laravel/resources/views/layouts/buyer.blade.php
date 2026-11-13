<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta
      name="description"
      content="@yield('meta_description', 'IdleMach buyer dashboard prototype for discovering sample manufacturing capacity, tracking booking requests and payments, and reviewing completed work. All records are illustrative demo data and no backend is connected.')"
    >
    <meta name="theme-color" content="#0f5c6b">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Buyer Dashboard — IdleMach')</title>

    <link rel="icon" href="{{ asset('assets/icons/favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('styles')
  </head>
  <body id="top">
    <a class="skip-link" href="#main">Skip to main content</a>

    <div class="dashboard-layout" id="buyer-dashboard">
      <x-buyer.sidebar />
      <div class="dashboard-backdrop" id="dashboard-backdrop"></div>

      <div class="dashboard-main">
        <x-buyer.header />
        <main class="dashboard-content" id="main">
          @yield('content')
        </main>
        <x-buyer.footer />
      </div>
    </div>

    @stack('modals')

    <!-- Preview-only toast -->
    <div
      class="preview-toast"
      id="preview-toast"
      role="status"
      aria-live="polite"
      hidden
    >
      <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
      <div class="preview-toast-message" id="preview-toast-message"></div>
      <button
        class="preview-toast-close"
        type="button"
        aria-label="Dismiss preview notice"
      >
        &times;
      </button>
    </div>

    <script
      src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"
      defer
    ></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    @stack('scripts')
  </body>
</html>
