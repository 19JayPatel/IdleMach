        <header class="dashboard-topbar">
          <div class="dashboard-topbar-left">
            <button
              class="dashboard-sidebar-toggle"
              type="button"
              data-sidebar-toggle
              aria-controls="dashboard-sidebar"
              aria-expanded="false"
              aria-label="Open buyer navigation"
            >
              <i class="fa-solid fa-bars" aria-hidden="true"></i>
            </button>

            <nav class="dashboard-breadcrumb" aria-label="Breadcrumb">
              <span class="dashboard-breadcrumb-item">
                <a href="{{ route('buyer.dashboard') }}">Buyer</a>
                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
              </span>
              <span class="dashboard-breadcrumb-item" aria-current="page"
                >Dashboard</span
              >
            </nav>
          </div>

          <div class="dashboard-topbar-right">
            <a
              class="btn-im btn-im-outline btn-im-sm d-none d-lg-inline-flex"
              href="#discover"
            >
              <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
              Explore machines
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
                <span class="topbar-avatar-small" aria-hidden="true">AA</span>
                <span class="d-none d-md-inline">Apex Auto Components</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <span class="dropdown-header d-block">Buyer account</span>
                </li>
                <li>
                  <span class="dropdown-item-text small text-muted"
                    >Apex Auto Components &middot; Buyer</span
                  >
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="#discover">
                    <i
                      class="fa-solid fa-magnifying-glass me-2"
                      aria-hidden="true"
                    ></i>
                    Explore machines
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#booking-requests">
                    <i class="fa-solid fa-inbox me-2" aria-hidden="true"></i>
                    My bookings
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#payments">
                    <i class="fa-solid fa-receipt me-2" aria-hidden="true"></i>
                    Payments and history
                  </a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <button
                    class="dropdown-item text-danger"
                    type="button"
                    data-action="buyer-logout"
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
