      <aside
        class="dashboard-sidebar"
        id="dashboard-sidebar"
        aria-label="Buyer navigation"
      >
        <div class="dashboard-sidebar-brand">
          <a
            class="dashboard-brand-link"
            href="{{ route('buyer.dashboard') }}"
            aria-label="IdleMach buyer dashboard"
          >
            <img
              src="{{ asset('assets/icons/favicon.svg') }}"
              width="30"
              height="30"
              alt=""
            />
            <span>IdleMach</span>
          </a>
          <span class="dashboard-role-badge">Buyer</span>
          <button
            class="dashboard-sidebar-close"
            type="button"
            data-sidebar-close
            aria-label="Close buyer navigation"
          >
            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
          </button>
        </div>

        <nav class="dashboard-sidebar-nav" aria-label="Buyer sections">
          <p class="dashboard-nav-heading">Overview</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link active"
                href="#top"
                aria-current="page"
              >
                <i class="fa-solid fa-gauge-high" aria-hidden="true"></i>
                Dashboard
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">Discover</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#discover">
                <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                Explore Machines
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">My Bookings</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#booking-requests">
                <i class="fa-solid fa-inbox" aria-hidden="true"></i>
                Booking Requests
                <span
                  class="dashboard-nav-badge"
                  id="sidebar-buyer-requests-badge"
                  aria-label="1 pending request"
                  >1</span
                >
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link"
                href="#booking-requests"
                data-booking-filter-link="accepted"
              >
                <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                Accepted Bookings
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link"
                href="#booking-requests"
                data-booking-filter-link="in_progress"
              >
                <i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i>
                Ongoing Work
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#completed-work">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Completed Bookings
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">Financial</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#payments">
                <i class="fa-solid fa-receipt" aria-hidden="true"></i>
                Payments and History
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">Feedback</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#reviews">
                <i class="fa-solid fa-star" aria-hidden="true"></i>
                My Reviews
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">Other</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <button
                class="dashboard-nav-link"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#notifications-offcanvas"
                aria-controls="notifications-offcanvas"
              >
                <i class="fa-regular fa-bell" aria-hidden="true"></i>
                Notifications
              </button>
            </li>
          </ul>
        </nav>

        <div class="dashboard-sidebar-footer">
          <div class="dashboard-user-card">
            <span class="dashboard-user-avatar" aria-hidden="true">AA</span>
            <div class="dashboard-user-info">
              <p class="dashboard-user-name">Apex Auto Components</p>
              <p class="dashboard-user-role">Buyer</p>
            </div>
          </div>
          <button
            class="dashboard-logout-btn"
            type="button"
            data-action="buyer-logout"
          >
            <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
            Sign out
          </button>
        </div>
      </aside>
