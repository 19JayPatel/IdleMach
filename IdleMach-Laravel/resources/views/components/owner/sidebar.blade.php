      <aside
        class="dashboard-sidebar"
        id="dashboard-sidebar"
        aria-label="Machine owner navigation">
        <div class="dashboard-sidebar-brand">
          <a
            class="dashboard-brand-link"
            href="{{ route('owner.dashboard') }}"
            aria-label="IdleMach machine owner dashboard">
            <img
              src="{{ asset('assets/icons/logo-compact.svg') }}"
              width="105"
              height="32"
              alt="IdleMach" />
          </a>
          <span class="dashboard-role-badge">Owner</span>
          <button
            class="dashboard-sidebar-close"
            type="button"
            data-sidebar-close
            aria-label="Close machine owner navigation">
            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
          </button>
        </div>

        <nav class="dashboard-sidebar-nav" aria-label="Machine owner sections">
          <p class="dashboard-nav-heading">Overview</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link active"
                href="#top"
                aria-current="page">
                <i class="fa-solid fa-gauge-high" aria-hidden="true"></i>
                Dashboard
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">My Business</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <button
                class="dashboard-nav-link"
                type="button"
                data-action="owner-company-profile">
                <i class="fa-solid fa-building" aria-hidden="true"></i>
                Company Profile
              </button>
            </li>
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#my-machines">
                <i class="fa-solid fa-gears" aria-hidden="true"></i>
                My Machines
              </a>
            </li>
            <li class="dashboard-nav-item">
              <button
                class="dashboard-nav-link"
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#modal-add-machine">
                <i class="fa-solid fa-circle-plus" aria-hidden="true"></i>
                Add Machine
              </button>
            </li>
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#machine-availability">
                <i class="fa-solid fa-calendar-days" aria-hidden="true"></i>
                Machine Availability
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">Bookings</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#booking-requests">
                <i class="fa-solid fa-inbox" aria-hidden="true"></i>
                Booking Requests
                <span
                  class="dashboard-nav-badge"
                  id="sidebar-owner-requests-badge">2</span>
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#accepted-bookings">
                <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                Accepted Bookings
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#ongoing-work">
                <i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i>
                Ongoing Work
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#completed-work">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Completed Work
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">Financial</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#earnings">
                <i class="fa-solid fa-indian-rupee-sign" aria-hidden="true"></i>
                Earnings
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#payment-history">
                <i class="fa-solid fa-receipt" aria-hidden="true"></i>
                Payment History
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">Other</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#reviews">
                <i class="fa-solid fa-star" aria-hidden="true"></i>
                Reviews
              </a>
            </li>
            <li class="dashboard-nav-item">
              <button
                class="dashboard-nav-link"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#notifications-offcanvas"
                aria-controls="notifications-offcanvas">
                <i class="fa-regular fa-bell" aria-hidden="true"></i>
                Notifications
              </button>
            </li>
          </ul>
        </nav>

        <div class="dashboard-sidebar-footer">
          <div class="dashboard-user-card">
            <span class="dashboard-user-avatar" aria-hidden="true">PE</span>
            <div class="dashboard-user-info">
              <p class="dashboard-user-name">Patel Engineering</p>
              <p class="dashboard-user-role">Machine Owner</p>
            </div>
          </div>
          <button
            class="dashboard-logout-btn"
            type="button"
            data-action="owner-logout">
            <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
            Sign out
          </button>
        </div>
      </aside>