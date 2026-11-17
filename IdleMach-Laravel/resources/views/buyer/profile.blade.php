@extends('layouts.buyer')

@section('title', 'Profile Management — IdleMach Buyer')

@section('meta_description', 'IdleMach buyer profile management with profile image placeholder, full name, email, phone, account information, and password management interface. Frontend prototype only.')

@section('page_title', 'Profile Management')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Other</p>
              <h1 class="dashboard-title">Profile Management</h1>
              <p class="dashboard-subtitle">
                Your personal buyer account details, separate from the machines
                you book and the bookings on your account.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a
                class="btn-im btn-im-outline"
                href="{{ route('buyer.booking-requests') }}"
              >
                <i class="fa-solid fa-inbox" aria-hidden="true"></i>
                My bookings
              </a>
            </div>
          </div>

          <div class="row g-4">
            <div class="col-lg-4">
              <section
                class="dashboard-card h-100"
                aria-labelledby="buyer-profile-card-heading"
              >
                <div class="dashboard-card-header">
                  <h2
                    class="dashboard-card-title"
                    id="buyer-profile-card-heading"
                  >
                    <i class="fa-solid fa-user-gear" aria-hidden="true"></i>
                    Buyer account
                  </h2>
                </div>
                <div class="dashboard-card-body text-center">
                  <span
                    class="dashboard-user-avatar mx-auto mb-3"
                    style="width: 72px; height: 72px; font-size: 1.25rem"
                    aria-hidden="true"
                    >AA</span
                  >
                  <h3 class="h5 mb-1">Rajesh Sharma</h3>
                  <p class="table-cell-subtext mb-2">Buyer</p>
                  <span class="status-badge status-active">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    Active account
                  </span>
                  <dl class="row gy-2 mt-4 mb-0 text-start">
                    <dt class="col-5 text-muted fw-normal">Email</dt>
                    <dd class="col-7 mb-0">rajesh.sharma@example.com</dd>

                    <dt class="col-5 text-muted fw-normal">Phone</dt>
                    <dd class="col-7 mb-0">Not provided</dd>

                    <dt class="col-5 text-muted fw-normal">Company</dt>
                    <dd class="col-7 mb-0">Apex Auto Components</dd>
                  </dl>
                </div>
                <div class="dashboard-card-footer">
                  <span
                    >Profile image upload and password changes are disabled in
                    this frontend prototype.</span
                  >
                </div>
              </section>
            </div>

            <div class="col-lg-8">
              <section
                class="dashboard-card"
                aria-labelledby="personal-info-heading"
              >
                <div class="dashboard-card-header">
                  <h2 class="dashboard-card-title" id="personal-info-heading">
                    <i class="fa-solid fa-address-card" aria-hidden="true"></i>
                    Personal information
                  </h2>
                </div>
                <div class="dashboard-card-body">
                  <form id="buyer-profile-form">
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label form-required" for="buyer-profile-full-name"
                          >Full name</label
                        >
                        <input
                          class="form-control"
                          id="buyer-profile-full-name"
                          name="full_name"
                          type="text"
                          value="Rajesh Sharma"
                          required
                        />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label form-required" for="buyer-profile-email"
                          >Email address</label
                        >
                        <input
                          class="form-control"
                          id="buyer-profile-email"
                          name="email"
                          type="email"
                          value="rajesh.sharma@example.com"
                          autocomplete="off"
                          required
                        />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="buyer-profile-phone"
                          >Phone number</label
                        >
                        <input
                          class="form-control"
                          id="buyer-profile-phone"
                          name="phone"
                          type="tel"
                          value=""
                          placeholder="Not provided"
                          autocomplete="off"
                        />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="buyer-profile-image"
                          >Profile image</label
                        >
                        <input
                          class="form-control"
                          id="buyer-profile-image"
                          name="profile_image"
                          type="file"
                          accept="image/*"
                          disabled
                          aria-describedby="buyer-profile-image-help"
                        />
                        <p class="form-text" id="buyer-profile-image-help">
                          Image uploads are disabled in this prototype.
                        </p>
                      </div>
                    </div>
                    <div
                      class="im-alert im-alert-success mt-3 mb-0"
                      id="buyer-profile-feedback"
                      role="status"
                      hidden
                    >
                      <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                      <div>
                        Personal details updated locally for this preview. No
                        account record was changed.
                      </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-3">
                      <button class="btn-im btn-im-primary" type="submit">
                        <i class="fa-solid fa-floppy-disk" aria-hidden="true"></i>
                        Save changes
                      </button>
                    </div>
                  </form>
                </div>
              </section>

              <section
                class="dashboard-card"
                aria-labelledby="password-heading"
              >
                <div class="dashboard-card-header">
                  <h2 class="dashboard-card-title" id="password-heading">
                    <i class="fa-solid fa-lock" aria-hidden="true"></i>
                    Password management
                  </h2>
                  <span class="stat-demo-badge">Prototype only</span>
                </div>
                <div class="dashboard-card-body">
                  <form id="buyer-password-form">
                    <div class="row g-3">
                      <div class="col-12">
                        <label class="form-label" for="buyer-profile-current-password"
                          >Current password</label
                        >
                        <input
                          class="form-control"
                          id="buyer-profile-current-password"
                          name="current_password"
                          type="password"
                          autocomplete="off"
                        />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label form-required" for="buyer-profile-new-password"
                          >New password</label
                        >
                        <input
                          class="form-control"
                          id="buyer-profile-new-password"
                          name="new_password"
                          type="password"
                          minlength="8"
                          autocomplete="new-password"
                          required
                        />
                      </div>
                      <div class="col-md-6">
                        <label
                          class="form-label form-required"
                          for="buyer-profile-confirm-password"
                          >Confirm new password</label
                        >
                        <input
                          class="form-control"
                          id="buyer-profile-confirm-password"
                          name="confirm_password"
                          type="password"
                          minlength="8"
                          autocomplete="new-password"
                          required
                        />
                      </div>
                    </div>
                    <div
                      class="im-alert im-alert-danger mt-3 mb-0"
                      id="buyer-password-mismatch"
                      role="alert"
                      hidden
                    >
                      <i class="fa-solid fa-circle-xmark" aria-hidden="true"></i>
                      <div>New password and confirmation do not match.</div>
                    </div>
                    <div
                      class="im-alert im-alert-success mt-3 mb-0"
                      id="buyer-password-feedback"
                      role="status"
                      hidden
                    >
                      <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                      <div>
                        Password update validated locally. No credentials were
                        stored or transmitted.
                      </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-3">
                      <button class="btn-im btn-im-primary" type="submit">
                        <i class="fa-solid fa-key" aria-hidden="true"></i>
                        Update password
                      </button>
                    </div>
                  </form>
                </div>
              </section>

              <section
                class="dashboard-card mb-0"
                aria-labelledby="account-info-heading"
              >
                <div class="dashboard-card-header">
                  <h2 class="dashboard-card-title" id="account-info-heading">
                    <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
                    Account information
                  </h2>
                </div>
                <div class="dashboard-card-body">
                  <dl class="row gy-2 mb-0">
                    <dt class="col-sm-4 text-muted fw-normal">Account type</dt>
                    <dd class="col-sm-8 mb-0">Buyer</dd>

                    <dt class="col-sm-4 text-muted fw-normal">Account status</dt>
                    <dd class="col-sm-8 mb-0">
                      <span class="status-badge status-active">
                        <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                        Active
                      </span>
                    </dd>

                    <dt class="col-sm-4 text-muted fw-normal">Company</dt>
                    <dd class="col-sm-8 mb-0">Apex Auto Components</dd>

                    <dt class="col-sm-4 text-muted fw-normal">Registered on</dt>
                    <dd class="col-sm-8 mb-0">28 Jan 2026</dd>

                    <dt class="col-sm-4 text-muted fw-normal">Last sign-in</dt>
                    <dd class="col-sm-8 mb-0">
                      Not tracked in this prototype
                    </dd>
                  </dl>
                </div>
                <div class="dashboard-card-footer">
                  <span
                    >Profile Management = your personal buyer account
                    information. Bookings, payments, and reviews stay on their own
                    screens.</span
                  >
                </div>
              </section>
            </div>
          </div>

@push('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var profileForm = document.getElementById("buyer-profile-form");
        var profileFeedback = document.getElementById("buyer-profile-feedback");
        if (profileForm && profileFeedback) {
          profileForm.addEventListener("submit", function (event) {
            event.preventDefault();
            if (!profileForm.checkValidity()) {
              profileForm.classList.add("was-validated");
              return;
            }
            profileFeedback.hidden = false;
          });
        }

        var passwordForm = document.getElementById("buyer-password-form");
        var passwordFeedback = document.getElementById("buyer-password-feedback");
        var passwordMismatch = document.getElementById("buyer-password-mismatch");
        if (!passwordForm || !passwordFeedback || !passwordMismatch) {
          return;
        }

        passwordForm.addEventListener("submit", function (event) {
          event.preventDefault();
          passwordFeedback.hidden = true;
          passwordMismatch.hidden = true;

          if (!passwordForm.checkValidity()) {
            passwordForm.classList.add("was-validated");
            return;
          }

          var newPassword = document.getElementById(
            "buyer-profile-new-password"
          );
          var confirmPassword = document.getElementById(
            "buyer-profile-confirm-password"
          );
          if (!newPassword || !confirmPassword) {
            return;
          }

          if (newPassword.value !== confirmPassword.value) {
            passwordMismatch.hidden = false;
            return;
          }

          passwordFeedback.hidden = false;
          passwordForm.reset();
        });
      });
    </script>
@endpush
@endsection
