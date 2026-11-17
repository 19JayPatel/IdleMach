@php
  $ownerPageTitle = match (true) {
      request()->routeIs('owner.dashboard') => 'Dashboard',
      request()->routeIs('owner.company-profile') => 'Company Profile',
      request()->routeIs('owner.machines') => 'My Machines',
      request()->routeIs('owner.add-machine') => 'Add Machine',
      request()->routeIs('owner.availability') => 'Machine Availability',
      request()->routeIs('owner.booking-requests') => 'Booking Requests',
      request()->routeIs('owner.accepted-bookings') => 'Accepted Bookings',
      request()->routeIs('owner.ongoing-work') => 'Ongoing Work',
      request()->routeIs('owner.completed-work') => 'Completed Work',
      request()->routeIs('owner.earnings') => 'Earnings',
      request()->routeIs('owner.payment-history') => 'Payment History',
      request()->routeIs('owner.reviews') => 'Reviews',
      request()->routeIs('owner.notifications') => 'Notifications',
      request()->routeIs('owner.profile') => 'Profile Management',
      default => trim($__env->yieldContent('page_title')) ?: 'Dashboard',
  };
@endphp
        <header class="dashboard-topbar">
          <div class="dashboard-topbar-left">
            <button
              class="dashboard-sidebar-toggle"
              type="button"
              data-sidebar-toggle
              aria-controls="dashboard-sidebar"
              aria-expanded="false"
              aria-label="Open machine owner navigation"
            >
              <i class="fa-solid fa-bars" aria-hidden="true"></i>
            </button>

            <nav class="dashboard-breadcrumb" aria-label="Breadcrumb">
              <span class="dashboard-breadcrumb-item">
                <a href="{{ route('owner.dashboard') }}">Owner</a>
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
              </span>
              <span class="dashboard-breadcrumb-item" aria-current="page"
                >{{ $ownerPageTitle }}</span
              >
            </nav>
          </div>

          <div class="dashboard-topbar-right">
            <a
              class="btn-im btn-im-outline btn-im-sm d-none d-lg-inline-flex"
              href="{{ route('machines') }}"
            >
              <i class="fa-solid fa-store" aria-hidden="true"></i>
              View marketplace
            </a>

            <button
              class="topbar-btn"
              type="button"
              data-bs-toggle="offcanvas"
              data-bs-target="#notifications-offcanvas"
              aria-controls="notifications-offcanvas"
              aria-label="Open notifications (3 unread)"
            >
              <i class="fa-regular fa-bell" aria-hidden="true"></i>
              <span class="topbar-badge-dot" aria-hidden="true"></span>
            </button>

            <div class="dropdown">
              <button
                class="topbar-profile-toggle dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <span class="topbar-avatar-small" aria-hidden="true">PE</span>
                <span class="d-none d-md-inline">Patel Engineering</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <span class="dropdown-header d-block">Owner account</span>
                </li>
                <li>
                  <span class="dropdown-item-text small text-muted"
                    >Patel Engineering · Machine Owner</span
                  >
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a
                    class="dropdown-item"
                    href="{{ route('owner.company-profile') }}"
                  >
                    <i class="fa-solid fa-building me-2" aria-hidden="true"></i>
                    Company profile
                  </a>
                </li>
                <li>
                  <a
                    class="dropdown-item"
                    href="{{ route('owner.add-machine') }}"
                  >
                    <i class="fa-solid fa-circle-plus me-2" aria-hidden="true"></i>
                    Add machine
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('owner.profile') }}">
                    <i class="fa-solid fa-user-gear me-2" aria-hidden="true"></i>
                    Profile management
                  </a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <button
                    class="dropdown-item text-danger"
                    type="button"
                    data-action="owner-logout"
                  >
                    <i
                      class="fa-solid fa-right-from-bracket me-2"
                      aria-hidden="true"
                    ></i>
                    Sign out
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </header>
