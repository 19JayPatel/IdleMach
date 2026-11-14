<footer class="site-footer">
  <div class="container-im">
    <div class="row g-4">
      <div class="col-lg-4">
        <a
          class="site-brand footer-brand"
          href="{{ url('/') }}"
          aria-label="IdleMach home">
          <img
            class="brand-mark"
            src="{{ asset('assets/icons/logo-horizontal.svg') }}"
            width="200"
            height="63"
            alt="IdleMach">
        </a>
        <p class="footer-tagline">
          A manufacturing-capacity marketplace that helps businesses turn
          unused machine time into productive work.
        </p>
      </div>

      <div class="col-6 col-lg-2">
        <h2 class="footer-heading">Explore</h2>
        <ul class="footer-list">
          <li><a href="{{ url('/machines') }}">Explore Machines</a></li>
          <li><a href="{{ route('home') . '#marketplace-preview' }}">Marketplace preview</a></li>
          <li><a href="{{ route('how-it-works') }}">How It Works</a></li>
        </ul>
      </div>

      <div class="col-6 col-lg-2">
        <h2 class="footer-heading">Participate</h2>
        <ul class="footer-list">
          <li><a href="{{ route('how-it-works') . '#for-owners' }}">For machine owners</a></li>
          <li><a href="{{ route('how-it-works') . '#for-buyers' }}">For buyers</a></li>
          <li><a href="{{ url('/about') }}">About IdleMach</a></li>
        </ul>
      </div>

      <div class="col-lg-4" id="contact">
        <h2 class="footer-heading">Contact</h2>
        <p class="footer-contact-note">
          Official contact details will be published before launch. The
          contact form is not connected to a live messaging system.
        </p>
        <p class="footer-note">
          <a href="{{ url('/contact') }}">Contact IdleMach</a> or read the
          <a href="{{ url('/how-it-works') }}">How It Works</a> guide.
        </p>
      </div>
    </div>

    <div class="footer-bottom">
      <span>&copy; <span data-current-year>{{ date('Y') }}</span> IdleMach</span>
      <span>Turn Idle Capacity Into Opportunity.</span>
      <a href="#top">Back to top</a>
    </div>
  </div>
</footer>