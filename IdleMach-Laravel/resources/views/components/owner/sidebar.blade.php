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
                class="dashboard-nav-link {{ request()->routeIs('owner.dashboard') ? 'active' : '' }}"
                href="{{ route('owner.dashboard') }}"
                @if(request()->routeIs('owner.dashboard')) aria-current="page" @endif>
                <i class="fa-solid fa-gauge-high" aria-hidden="true"></i>
                Dashboard
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">My Business</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('owner.company-profile') ? 'active' : '' }}"
                href="{{ route('owner.company-profile') }}"
                @if(request()->routeIs('owner.company-profile')) aria-current="page" @endif>
                <i class="fa-solid fa-building" aria-hidden="true"></i>
                Company Profile
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('owner.machines') ? 'active' : '' }}"
                href="{{ route('owner.machines') }}"
                @if(request()->routeIs('owner.machines')) aria-current="page" @endif>
                <i class="fa-solid fa-gears" aria-hidden="true"></i>
                My Machines
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('owner.add-machine') ? 'active' : '' }}"
                href="{{ route('owner.add-machine') }}"
                @if(request()->routeIs('owner.add-machine')) aria-current="page" @endif>
                <i class="fa-solid fa-circle-plus" aria-hidden="true"></i>
                Add Machine
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('owner.availability') ? 'active' : '' }}"
                href="{{ route('owner.availability') }}"
                @if(request()->routeIs('owner.availability')) aria-current="page" @endif>
                <i class="fa-solid fa-calendar-days" aria-hidden="true"></i>
                Machine Availability
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">Bookings</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('owner.booking-requests') ? 'active' : '' }}"
                href="{{ route('owner.booking-requests') }}"
                @if(request()->routeIs('owner.booking-requests')) aria-current="page" @endif>
                <i class="fa-solid fa-inbox" aria-hidden="true"></i>
                Booking Requests
                <span
                  class="dashboard-nav-badge"
                  id="sidebar-owner-requests-badge">2</span>
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('owner.accepted-bookings') ? 'active' : '' }}"
                href="{{ route('owner.accepted-bookings') }}"
                @if(request()->routeIs('owner.accepted-bookings')) aria-current="page" @endif>
                <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                Accepted Bookings
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('owner.ongoing-work') ? 'active' : '' }}"
                href="{{ route('owner.ongoing-work') }}"
                @if(request()->routeIs('owner.ongoing-work')) aria-current="page" @endif>
                <i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i>
                Ongoing Work
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('owner.completed-work') ? 'active' : '' }}"
                href="{{ route('owner.completed-work') }}"
                @if(request()->routeIs('owner.completed-work')) aria-current="page" @endif>
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Completed Work
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">Financial</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('owner.earnings') ? 'active' : '' }}"
                href="{{ route('owner.earnings') }}"
                @if(request()->routeIs('owner.earnings')) aria-current="page" @endif>
                <i class="fa-solid fa-indian-rupee-sign" aria-hidden="true"></i>
                Earnings
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('owner.payment-history') ? 'active' : '' }}"
                href="{{ route('owner.payment-history') }}"
                @if(request()->routeIs('owner.payment-history')) aria-current="page" @endif>
                <i class="fa-solid fa-receipt" aria-hidden="true"></i>
                Payment History
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">Other</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('owner.reviews') ? 'active' : '' }}"
                href="{{ route('owner.reviews') }}"
                @if(request()->routeIs('owner.reviews')) aria-current="page" @endif>
                <i class="fa-solid fa-star" aria-hidden="true"></i>
                Reviews
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('owner.notifications') ? 'active' : '' }}"
                href="{{ route('owner.notifications') }}"
                @if(request()->routeIs('owner.notifications')) aria-current="page" @endif>
                <i class="fa-regular fa-bell" aria-hidden="true"></i>
                Notifications
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('owner.profile') ? 'active' : '' }}"
                href="{{ route('owner.profile') }}"
                @if(request()->routeIs('owner.profile')) aria-current="page" @endif>
                <i class="fa-solid fa-user-gear" aria-hidden="true"></i>
                Profile Management
              </a>
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
