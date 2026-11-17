@extends('layouts.owner')

@section('title', 'Profile Management — IdleMach Owner')

@section('meta_description', 'IdleMach owner profile management with personal account details, profile image placeholder, account information, and password management interface. Frontend prototype only.')

@section('page_title', 'Profile Management')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">Other</p>
              <h1 class="dashboard-title">Profile Management</h1>
              <p class="dashboard-subtitle">
                Your personal owner account details, separate from the company
                profile shown to buyers.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a
                class="btn-im btn-im-outline"
                href="{{ route('owner.company-profile') }}"
              >
                <i class="fa-solid fa-building" aria-hidden="true"></i>
                Company Profile
              </a>
            </div>
          </div>

          <div class="row g-4">
            <div class="col-lg-4">
              <section
                class="dashboard-card h-100"
                aria-labelledby="owner-profile-card-heading"
              >
                <div class="dashboard-card-header">
                  <h2
                    class="dashboard-card-title"
                    id="owner-profile-card-heading"
                  >
                    <i class="fa-solid fa-user-gear" aria-hidden="true"></i>
                    Owner account
                  </h2>
                </div>
                <div class="dashboard-card-body text-center">
                  <span
                    class="dashboard-user-avatar mx-auto mb-3"
                    style="width: 72px; height: 72px; font-size: 1.25rem"
                    aria-hidden="true"
                    >PE</span
                  >
                  <h3 class="h5 mb-1">Nilesh Patel</h3>
                  <p class="table-cell-subtext mb-2">Machine Owner</p>
                  <span class="status-badge status-approved">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    Active account
                  </span>
                  <dl class="row gy-2 mt-4 mb-0 text-start">
                    <dt class="col-5 text-muted fw-normal">Email</dt>
                    <dd class="col-7 mb-0">owner@example.test</dd>

                    <dt class="col-5 text-muted fw-normal">Phone</dt>
                    <dd class="col-7 mb-0">+91 00000 00000</dd>

                    <dt class="col-5 text-muted fw-normal">Company</dt>
                    <dd class="col-7 mb-0">Patel Engineering</dd>
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
                  <form id="owner-profile-form">
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label form-required" for="profile-full-name"
                          >Full name</label
                        >
                        <input
                          class="form-control"
                          id="profile-full-name"
                          name="full_name"
                          type="text"
                          value="Nilesh Patel"
                          required
                        />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label form-required" for="profile-email"
                          >Email address</label
                        >
                        <input
                          class="form-control"
                          id="profile-email"
                          name="email"
                          type="email"
                          value="owner@example.test"
                          autocomplete="off"
                          required
                        />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="profile-phone"
                          >Phone number</label
                        >
                        <input
                          class="form-control"
                          id="profile-phone"
                          name="phone"
                          type="tel"
                          value="+91 00000 00000"
                          autocomplete="off"
                        />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="profile-image"
                          >Profile image</label
                        >
                        <input
                          class="form-control"
                          id="profile-image"
                          name="profile_image"
                          type="file"
                          accept="image/*"
                          disabled
                          aria-describedby="profile-image-help"
                        />
                        <p class="form-text" id="profile-image-help">
                          Image uploads are disabled in this prototype.
                        </p>
                      </div>
                    </div>
                    <div
                      class="im-alert im-alert-success mt-3 mb-0"
                      id="owner-profile-feedback"
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
                  <form id="owner-password-form">
                    <div class="row g-3">
                      <div class="col-12">
                        <label class="form-label" for="profile-current-password"
                          >Current password</label
                        >
                        <input
                          class="form-control"
                          id="profile-current-password"
                          name="current_password"
                          type="password"
                          autocomplete="off"
                        />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label form-required" for="profile-new-password"
                          >New password</label
                        >
                        <input
                          class="form-control"
                          id="profile-new-password"
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
                          for="profile-confirm-password"
                          >Confirm new password</label
                        >
                        <input
                          class="form-control"
                          id="profile-confirm-password"
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
                      id="owner-password-mismatch"
                      role="alert"
                      hidden
                    >
                      <i class="fa-solid fa-circle-xmark" aria-hidden="true"></i>
                      <div>New password and confirmation do not match.</div>
                    </div>
                    <div
                      class="im-alert im-alert-success mt-3 mb-0"
                      id="owner-password-feedback"
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
                    <dd class="col-sm-8 mb-0">Machine Owner</dd>

                    <dt class="col-sm-4 text-muted fw-normal">Account status</dt>
                    <dd class="col-sm-8 mb-0">
                      <span class="status-badge status-approved">
                        <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                        Approved
                      </span>
                    </dd>

                    <dt class="col-sm-4 text-muted fw-normal">Company profile</dt>
                    <dd class="col-sm-8 mb-0">
                      <a href="{{ route('owner.company-profile') }}"
                        >Patel Engineering</a
                      >
                    </dd>

                    <dt class="col-sm-4 text-muted fw-normal">Last sign-in</dt>
                    <dd class="col-sm-8 mb-0">
                      Not tracked in this prototype
                    </dd>
                  </dl>
                </div>
                <div class="dashboard-card-footer">
                  <span
                    >Company Profile = business information. Profile Management
                    = owner's personal account information.</span
                  >
                </div>
              </section>
            </div>
          </div>

@push('scripts')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var profileForm = document.getElementById("owner-profile-form");
        var profileFeedback = document.getElementById("owner-profile-feedback");
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

        var passwordForm = document.getElementById("owner-password-form");
        var passwordFeedback = document.getElementById("owner-password-feedback");
        var passwordMismatch = document.getElementById("owner-password-mismatch");
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

          var newPassword = document.getElementById("profile-new-password");
          var confirmPassword = document.getElementById(
            "profile-confirm-password"
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
