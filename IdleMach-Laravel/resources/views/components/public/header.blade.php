<header class="site-header">
  <nav class="navbar navbar-expand-lg" aria-label="Primary navigation">
    <div class="container-im">
      <a class="site-brand" href="{{ url('/') }}" aria-label="IdleMach home">
        <img
          class="brand-mark"
          src="{{ asset('assets/icons/logo-compact.svg') }}"
          width="118"
          height="36"
          alt="IdleMach">
      </a>

      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#siteNav"
        aria-controls="siteNav"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="siteNav">
        <ul class="navbar-nav site-nav ms-auto align-items-lg-center">
          <li class="nav-item">
            <a
              class="nav-link"
              href="{{ url('/') }}"
              data-nav-match="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="{{ url('/machines') }}"
              data-nav-match="machines">Explore Machines</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="{{ url('/how-it-works') }}"
              data-nav-match="how-it-works">How It Works</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="{{ url('/about') }}"
              data-nav-match="about">About</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="{{ url('/contact') }}"
              data-nav-match="contact">Contact</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              href="{{ url('/login') }}"
              data-nav-match="login">Login</a>
          </li>
          <li class="nav-item nav-cta">
            <a
              class="btn-im btn-im-primary btn-im-sm"
              href="{{ url('/register') }}"
              data-nav-match="register">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>