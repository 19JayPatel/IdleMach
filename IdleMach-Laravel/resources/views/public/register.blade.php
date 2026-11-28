@extends('layouts.public')

@section('title', 'Register — IdleMach')

@section('meta_description', 'Create an IdleMach account as a machine owner or buyer to list idle capacity or find manufacturing capacity.')

@section('content')
<section class="auth-page" aria-labelledby="register-title">
  <div class="container-im">
    <nav class="machine-breadcrumb" aria-label="Breadcrumb">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li aria-current="page">Register</li>
      </ol>
    </nav>

    <div class="auth-split">
      <aside class="auth-brand-panel" aria-label="About the IdleMach marketplace">
        <div class="auth-panel-top">
          <a
            class="auth-panel-brand"
            href="{{ url('/') }}"
            aria-label="IdleMach home">
            <img
              class="brand-mark"
              src="{{ asset('assets/icons/logo-compact.svg') }}"
              width="118"
              height="36"
              alt="IdleMach">
          </a>

          <p class="eyebrow eyebrow-light">Capacity marketplace</p>
          <p class="auth-panel-title">
            Turn idle machine time into productive work.
          </p>
          <p class="auth-panel-copy">
            IdleMach connects machine owners with businesses that need
            manufacturing capacity. List unused machine hours, or find the
            right machine for your next job.
          </p>
        </div>

        <ul class="auth-panel-features">
          <li>
            <span class="auth-panel-icon">
              <i class="fa-solid fa-calendar-days" aria-hidden="true"></i>
            </span>
            <span class="auth-panel-feature-copy">
              <strong>List idle capacity</strong>
              Publish available machine hours and respond to booking
              requests.
            </span>
          </li>
          <li>
            <span class="auth-panel-icon">
              <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
            </span>
            <span class="auth-panel-feature-copy">
              <strong>Find the right machine</strong>
              Search manufacturing capacity by process, location and
              availability.
            </span>
          </li>
          <li>
            <span class="auth-panel-icon">
              <i class="fa-solid fa-clipboard-check" aria-hidden="true"></i>
            </span>
            <span class="auth-panel-feature-copy">
              <strong>Track every request</strong>
              Manage enquiries and bookings from first contact to
              completed work.
            </span>
          </li>
        </ul>

        <p class="auth-panel-foot">
          <i class="fa-solid fa-users" aria-hidden="true"></i>
          One account for machine owners and buyers.
        </p>
      </aside>

      <div class="auth-form-side">
        <div class="auth-card auth-card-register">
          <div class="auth-card-head">
            <p class="eyebrow">Get started</p>
            <h1 class="auth-card-title" id="register-title">Create Your Account</h1>
            <p class="auth-card-subtitle">
              Select your account type and complete the required details.
              All fields marked with an asterisk are required.
            </p>
          </div>

          <form
            class="auth-form"
            id="register-form"
            method="post"
            action="{{ route('register.store') }}"
            aria-labelledby="register-title"
            novalidate>
            @csrf
            <fieldset
              class="auth-role-fieldset"
              id="register-role-fieldset"
              aria-describedby="register-role-help register-role-error"
              data-error-required="Choose an account type.">
              <legend class="form-label form-required">Account Type</legend>
              <p class="form-text" id="register-role-help">
                Choose how you will use IdleMach. This cannot be an Admin
                account.
              </p>

              <div class="auth-role-options">
                <label class="auth-role-option" for="register-role-owner">
                  <input
                    class="form-check-input"
                    id="register-role-owner"
                    name="role"
                    type="radio"
                    value="owner"
                    aria-describedby="register-role-owner-description"
                    @checked(old('role') === 'owner')
                    required>
                  <span class="auth-role-option-body">
                    <span class="auth-role-option-title">
                      <i class="fa-solid fa-user" aria-hidden="true"></i>
                      Machine Owner
                    </span>
                    <span
                      class="auth-role-option-text"
                      id="register-role-owner-description">List machines and unused capacity, then respond to
                      booking requests.</span>
                  </span>
                </label>

                <label class="auth-role-option" for="register-role-buyer">
                  <input
                    class="form-check-input"
                    id="register-role-buyer"
                    name="role"
                    type="radio"
                    value="buyer"
                    aria-describedby="register-role-buyer-description"
                    @checked(old('role') === 'buyer')
                    required>
                  <span class="auth-role-option-body">
                    <span class="auth-role-option-title">
                      <i
                        class="fa-solid fa-magnifying-glass"
                        aria-hidden="true"></i>
                      Buyer
                    </span>
                    <span
                      class="auth-role-option-text"
                      id="register-role-buyer-description">Discover manufacturing capacity and request work
                      from machine owners.</span>
                  </span>
                </label>
              </div>

              <div
                class="auth-field-error"
                id="register-role-error"
                role="alert"
                hidden>
                Select an account type to continue.
              </div>
              @error('role')
                <div class="auth-field-error" role="alert">{{ $message }}</div>
              @enderror
            </fieldset>

            <div class="row g-3">
              <div class="col-md-6">
                <div class="auth-field">
                  <label
                    class="form-label form-required"
                    for="register-full-name">Full Name</label>
                  <div class="auth-input">
                    <i class="fa-solid fa-user auth-input-icon" aria-hidden="true"></i>
                    <input
                      class="form-control @error('full_name') is-invalid @enderror"
                      id="register-full-name"
                      name="full_name"
                      type="text"
                      value="{{ old('full_name') }}"
                      autocomplete="name"
                      placeholder="Your full name"
                      aria-describedby="register-full-name-error"
                      data-error-required="Enter your full name."
                      required>
                  </div>
                  <div
                    class="invalid-feedback"
                    id="register-full-name-error"
                    hidden>
                    Enter your full name.
                  </div>
                  @error('full_name')
                    <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="auth-field">
                  <label
                    class="form-label form-required"
                    for="register-email">Email Address</label>
                  <div class="auth-input">
                    <i class="fa-solid fa-envelope auth-input-icon" aria-hidden="true"></i>
                    <input
                      class="form-control @error('email') is-invalid @enderror"
                      id="register-email"
                      name="email"
                      type="email"
                      value="{{ old('email') }}"
                      autocomplete="email"
                      placeholder="name@company.com"
                      aria-describedby="register-email-error"
                      data-error-required="Enter your email address."
                      data-error-invalid="Enter a valid email address."
                      required>
                  </div>
                  <div
                    class="invalid-feedback"
                    id="register-email-error"
                    hidden>
                    Enter a valid email address.
                  </div>
                  @error('email')
                    <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="auth-field">
                  <label
                    class="form-label form-required"
                    for="register-phone">Mobile Number</label>
                  <div class="auth-input">
                    <i class="fa-solid fa-phone auth-input-icon" aria-hidden="true"></i>
                    <input
                      class="form-control @error('phone') is-invalid @enderror"
                      id="register-phone"
                      name="phone"
                      type="tel"
                      value="{{ old('phone') }}"
                      inputmode="tel"
                      autocomplete="tel"
                      pattern="[0-9+ ]{7,20}"
                      title="Enter 7 to 20 digits. Spaces and the + character are allowed."
                      placeholder="+91 98765 43210"
                      aria-describedby="register-phone-error"
                      data-error-required="Enter your mobile number."
                      data-error-invalid="Enter a valid mobile number."
                      required>
                  </div>
                  <div
                    class="invalid-feedback"
                    id="register-phone-error"
                    hidden>
                    Enter a valid mobile number.
                  </div>
                  @error('phone')
                    <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="auth-field">
                  <label
                    class="form-label form-required"
                    for="register-password">Password</label>
                  <div class="auth-input auth-password">
                    <i class="fa-solid fa-lock auth-input-icon" aria-hidden="true"></i>
                    <input
                      class="form-control @error('password') is-invalid @enderror"
                      id="register-password"
                      name="password"
                      type="password"
                      autocomplete="new-password"
                      placeholder="Create a password"
                      aria-describedby="register-password-error"
                      data-validation="required|strongPassword"
                      data-password-primary
                      data-error-required="Create a password."
                      data-error-strongPassword="Use at least 8 characters with uppercase, lowercase, a number and a special character."
                      required>
                    <button
                      class="auth-password-toggle"
                      type="button"
                      data-password-toggle
                      aria-controls="register-password"
                      aria-label="Show password"
                      aria-pressed="false">
                      <i class="fa-regular fa-eye" aria-hidden="true"></i>
                    </button>
                  </div>
                  <div
                    class="invalid-feedback"
                    id="register-password-error"
                    hidden>
                    Create a password.
                  </div>
                  @error('password')
                    <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="auth-field">
                  <label
                    class="form-label form-required"
                    for="register-confirm-password">Confirm Password</label>
                  <div class="auth-input auth-password">
                    <i class="fa-solid fa-lock auth-input-icon" aria-hidden="true"></i>
                    <input
                      class="form-control @error('confirm_password') is-invalid @enderror"
                      id="register-confirm-password"
                      name="confirm_password"
                      type="password"
                      autocomplete="new-password"
                      placeholder="Re-enter your password"
                      aria-describedby="register-confirm-password-error"
                      data-validation="required|confirmPassword"
                      data-password-confirm
                      data-password-id="register-password"
                      data-error-required="Confirm your password."
                      data-error-mismatch="Passwords do not match."
                      required>
                    <button
                      class="auth-password-toggle"
                      type="button"
                      data-password-toggle
                      aria-controls="register-confirm-password"
                      aria-label="Show password"
                      aria-pressed="false">
                      <i class="fa-regular fa-eye" aria-hidden="true"></i>
                    </button>
                  </div>
                  <div
                    class="invalid-feedback"
                    id="register-confirm-password-error"
                    hidden>
                    Confirm your password.
                  </div>
                  @error('confirm_password')
                    <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <fieldset
              class="auth-role-panel"
              id="register-owner-panel"
              data-role-panel="owner"
              hidden
              disabled>
              <legend>Machine Owner details</legend>
              <p class="auth-panel-note">
                These details identify your company on the marketplace. You
                will complete the rest of your company profile, including
                GST details, description, and logo, after registration.
              </p>

              <div class="row g-3">
                <div class="col-md-6">
                  <div class="auth-field">
                    <label
                      class="form-label form-required"
                      for="register-company">Company Name</label>
                    <div class="auth-input">
                      <i class="fa-solid fa-building auth-input-icon" aria-hidden="true"></i>
                      <input
                        class="form-control @error('company_name') is-invalid @enderror"
                        id="register-company"
                        name="company_name"
                        type="text"
                        value="{{ old('company_name') }}"
                        autocomplete="organization"
                        placeholder="Company or business name"
                        aria-describedby="register-company-error"
                        data-error-required="Enter your company name."
                        required>
                    </div>
                    <div
                      class="invalid-feedback"
                      id="register-company-error"
                      hidden>
                      Enter your company name.
                    </div>
                    @error('company_name')
                      <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="auth-field">
                    <label
                      class="form-label form-required"
                      for="register-city">City</label>
                    <div class="auth-input">
                      <i class="fa-solid fa-location-dot auth-input-icon" aria-hidden="true"></i>
                      <input
                        class="form-control @error('city') is-invalid @enderror"
                        id="register-city"
                        name="city"
                        type="text"
                        value="{{ old('city') }}"
                        autocomplete="address-level2"
                        placeholder="City"
                        aria-describedby="register-city-error"
                        data-error-required="Enter your city."
                        required>
                    </div>
                    <div
                      class="invalid-feedback"
                      id="register-city-error"
                      hidden>
                      Enter your city.
                    </div>
                    @error('city')
                      <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-12">
                  <div class="auth-field">
                    <label
                      class="form-label form-required"
                      for="register-address">Company Address</label>
                    <div class="auth-input">
                      <i class="fa-solid fa-map auth-input-icon" aria-hidden="true"></i>
                      <input
                        class="form-control @error('address') is-invalid @enderror"
                        id="register-address"
                        name="address"
                        type="text"
                        value="{{ old('address') }}"
                        autocomplete="address-line1"
                        placeholder="Street address"
                        aria-describedby="register-address-error"
                        data-error-required="Enter your company address."
                        required>
                    </div>
                    <div
                      class="invalid-feedback"
                      id="register-address-error"
                      hidden>
                      Enter your company address.
                    </div>
                    @error('address')
                      <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
            </fieldset>

            <div
              class="auth-role-panel auth-role-panel-info"
              id="register-buyer-panel"
              data-role-panel="buyer"
              hidden>
              <h3>
                <i
                  class="fa-solid fa-magnifying-glass"
                  aria-hidden="true"></i>
                Buyer account
              </h3>
              <p>
                Buyer registration uses the common details above. No
                company profile is required.
              </p>
              <a class="text-link" href="{{ url('/machines') }}">
                Explore machines
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>

            <div class="auth-terms">
              <div class="form-check">
                <input
                  class="form-check-input"
                  id="register-terms"
                  name="terms"
                  type="checkbox"
                  @checked(old('terms'))
                  aria-describedby="register-terms-error"
                  data-validation="required|terms"
                  data-error-required="Accept the Terms and Conditions to continue."
                  required>
                <label class="form-check-label" for="register-terms">I accept the Terms and Conditions.</label>
              </div>
              <div
                class="invalid-feedback"
                id="register-terms-error"
                hidden>
                Accept the Terms and Conditions to continue.
              </div>
              @error('terms')
                <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
              @enderror
            </div>

            <div class="auth-actions">
              <button
                class="btn-im btn-im-primary auth-submit"
                type="submit">
                <i class="fa-solid fa-user-plus" aria-hidden="true"></i>
                Create Account
              </button>
              <button class="btn-im btn-im-outline" type="reset">
                <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
                Clear Form
              </button>
            </div>
          </form>

          <div class="auth-card-footer">
            <p>
              Already have an account?
              <a href="{{ url('/login') }}">Login</a>
            </p>
            <a class="text-link" href="{{ url('/') }}">
              <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
              Back to homepage
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
