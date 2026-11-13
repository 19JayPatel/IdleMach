      <aside
        class="dashboard-sidebar"
        id="dashboard-sidebar"
        aria-label="Admin navigation"
      >
        <div class="dashboard-sidebar-brand">
          <a
            class="dashboard-brand-link"
            href="{{ route('admin.dashboard') }}"
            aria-label="IdleMach admin dashboard"
          >
            <img
              src="{{ asset('assets/icons/favicon.svg') }}"
              width="30"
              height="30"
              alt=""
            />
            <span>IdleMach</span>
          </a>
          <span class="dashboard-role-badge">Admin</span>
          <button
            class="dashboard-sidebar-close"
            type="button"
            data-sidebar-close
            aria-label="Close admin navigation"
          >
            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
          </button>
        </div>

        <nav class="dashboard-sidebar-nav" aria-label="Admin sections">
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

          <p class="dashboard-nav-heading">Management</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <button
                class="dashboard-nav-link"
                type="button"
                data-management-preview="User management"
              >
                <i class="fa-solid fa-users-gear" aria-hidden="true"></i>
                User Management
              </button>
            </li>
            <li class="dashboard-nav-item">
              <button
                class="dashboard-nav-link"
                type="button"
                data-management-preview="Machine management"
              >
                <i class="fa-solid fa-gears" aria-hidden="true"></i>
                Machine Management
              </button>
            </li>
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#pending-approvals">
                <i class="fa-solid fa-clipboard-check" aria-hidden="true"></i>
                Machine Approvals
                <span class="dashboard-nav-badge" id="sidebar-pending-badge"
                  >12</span
                >
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#recent-bookings">
                <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                Booking Management
              </a>
            </li>
            <li class="dashboard-nav-item">
              <button
                class="dashboard-nav-link"
                type="button"
                data-management-preview="Payment management"
              >
                <i class="fa-solid fa-credit-card" aria-hidden="true"></i>
                Payment Management
              </button>
            </li>
            <li class="dashboard-nav-item">
              <button
                class="dashboard-nav-link"
                type="button"
                data-management-preview="Review management"
              >
                <i class="fa-solid fa-star-half-stroke" aria-hidden="true"></i>
                Review Management
              </button>
            </li>
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#recent-activity">
                <i class="fa-solid fa-chart-line" aria-hidden="true"></i>
                Reports and Activity
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">Reference</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="#business-rules-reference">
                <i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
                Business Rules
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a class="dashboard-nav-link" href="{{ route('machines') }}">
                <i class="fa-solid fa-store" aria-hidden="true"></i>
                Public Marketplace
              </a>
            </li>
          </ul>
        </nav>

        <div class="dashboard-sidebar-footer">
          <div class="dashboard-user-card">
            <span class="dashboard-user-avatar" aria-hidden="true">AD</span>
            <div class="dashboard-user-info">
              <p class="dashboard-user-name">Admin</p>
              <p class="dashboard-user-role">Platform Administrator</p>
            </div>
          </div>
          <button
            class="dashboard-logout-btn"
            type="button"
            data-action="admin-logout"
          >
            <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
            Sign out
          </button>
        </div>
      </aside>
