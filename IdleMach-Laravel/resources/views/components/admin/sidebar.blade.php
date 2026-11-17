      <aside
        class="dashboard-sidebar"
        id="dashboard-sidebar"
        aria-label="Admin navigation">
        <div class="dashboard-sidebar-brand">
          <a
            class="dashboard-brand-link"
            href="{{ route('admin.dashboard') }}"
            aria-label="IdleMach admin dashboard">
            <img
              src="{{ asset('assets/icons/logo-compact.svg') }}"
              width="105"
              height="32"
              alt="IdleMach" />
          </a>
          <span class="dashboard-role-badge">Admin</span>
          <button
            class="dashboard-sidebar-close"
            type="button"
            data-sidebar-close
            aria-label="Close admin navigation">
            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
          </button>
        </div>

        <nav class="dashboard-sidebar-nav" aria-label="Admin sections">
          <p class="dashboard-nav-heading">Overview</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}"
                @if(request()->routeIs('admin.dashboard')) aria-current="page" @endif>
                <i class="fa-solid fa-gauge-high" aria-hidden="true"></i>
                Dashboard
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">Management</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}"
                href="{{ route('admin.users') }}"
                @if(request()->routeIs('admin.users')) aria-current="page" @endif>
                <i class="fa-solid fa-users-gear" aria-hidden="true"></i>
                User Management
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('admin.machines') ? 'active' : '' }}"
                href="{{ route('admin.machines') }}"
                @if(request()->routeIs('admin.machines')) aria-current="page" @endif>
                <i class="fa-solid fa-gears" aria-hidden="true"></i>
                Machine Management
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('admin.machine-approvals') ? 'active' : '' }}"
                href="{{ route('admin.machine-approvals') }}"
                @if(request()->routeIs('admin.machine-approvals')) aria-current="page" @endif>
                <i class="fa-solid fa-clipboard-check" aria-hidden="true"></i>
                Machine Approval
                <span class="dashboard-nav-badge">12</span>
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('admin.bookings') ? 'active' : '' }}"
                href="{{ route('admin.bookings') }}"
                @if(request()->routeIs('admin.bookings')) aria-current="page" @endif>
                <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
                Booking Management
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('admin.payments') ? 'active' : '' }}"
                href="{{ route('admin.payments') }}"
                @if(request()->routeIs('admin.payments')) aria-current="page" @endif>
                <i class="fa-solid fa-credit-card" aria-hidden="true"></i>
                Payment Management
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('admin.reviews') ? 'active' : '' }}"
                href="{{ route('admin.reviews') }}"
                @if(request()->routeIs('admin.reviews')) aria-current="page" @endif>
                <i class="fa-solid fa-star-half-stroke" aria-hidden="true"></i>
                Review Management
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('admin.reports') ? 'active' : '' }}"
                href="{{ route('admin.reports') }}"
                @if(request()->routeIs('admin.reports')) aria-current="page" @endif>
                <i class="fa-solid fa-chart-line" aria-hidden="true"></i>
                Reports and Activity
              </a>
            </li>
          </ul>

          <p class="dashboard-nav-heading">Platform</p>
          <ul class="dashboard-nav-list">
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('admin.business-rules') ? 'active' : '' }}"
                href="{{ route('admin.business-rules') }}"
                @if(request()->routeIs('admin.business-rules')) aria-current="page" @endif>
                <i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
                Business Rules
              </a>
            </li>
            <li class="dashboard-nav-item">
              <a
                class="dashboard-nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}"
                href="{{ route('admin.profile') }}"
                @if(request()->routeIs('admin.profile')) aria-current="page" @endif>
                <i class="fa-solid fa-user-gear" aria-hidden="true"></i>
                Profile Management
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
            data-action="admin-logout">
            <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
            Sign out
          </button>
        </div>
      </aside>