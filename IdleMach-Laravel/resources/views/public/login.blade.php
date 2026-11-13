@extends('layouts.public')

@section('title', 'Login — IdleMach')

@section('meta_description', 'IdleMach login demonstration. This frontend prototype validates the login interface locally but does not authenticate users, create sessions, or store credentials.')

@section('content')
  <section class="auth-page" aria-labelledby="login-title">
    <div class="container-im">
      <nav class="machine-breadcrumb" aria-label="Breadcrumb">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li aria-current="page">Login</li>
        </ol>
      </nav>

      <div class="auth-layout">
        <aside class="auth-context" aria-labelledby="login-context-title">
          <a
            class="auth-brand"
            href="{{ url('/') }}"
            aria-label="IdleMach home"
          >
            <img
              class="brand-mark"
              src="{{ asset('assets/icons/favicon.svg') }}"
              width="36"
              height="36"
              alt=""
            />
            <span>IdleMach</span>
          </a>

          <p class="eyebrow">Account access</p>
          <h1 class="auth-context-title" id="login-context-title">
            Welcome back to IdleMach.
          </h1>
          <p class="auth-context-intro">
            Machine Owners and Buyers will use the same login entry point,
            then continue to the workspace for their role. Admins will use
            separate platform management access.
          </p>

          <ul class="auth-role-summary">
            <li>
              <i class="fa-solid fa-industry" aria-hidden="true"></i>
              <span>
                <strong>Machine Owners</strong> manage listings,
                availability, and incoming booking requests (<a href="owner-dashboard.html" class="auth-inline-link">Owner Dashboard</a>).
              </span>
            </li>
            <li>
              <i
                class="fa-solid fa-magnifying-glass"
                aria-hidden="true"
              ></i>
              <span>
                <strong>Buyers</strong> discover capacity and track their
                booking requests (<a href="buyer-dashboard.html" class="auth-inline-link">Buyer Dashboard</a>).
              </span>
            </li>
            <li>
              <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
              <span>
                <strong>Admins</strong> use separate platform management
                tools (<a href="admin-dashboard.html" class="auth-inline-link">Admin Dashboard</a>).
              </span>
            </li>
          </ul>

        </aside>

        <div class="auth-card">
          <div class="auth-card-head">
            <p class="eyebrow">Login</p>
            <h2 id="login-title">Log in to your account.</h2>
            <p>
              Enter your email address and password below.
            </p>
          </div>

          <div class="im-alert im-alert-info" role="note">
            <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
            <div>
              <strong>Login is not connected.</strong>
              Do not enter a real password.
            </div>
          </div>

          <form
            class="auth-form"
            id="login-form"
            method="post"
            aria-labelledby="login-title"
            novalidate
          >
            <div class="auth-field">
              <label class="form-label form-required" for="login-email"
                >Email Address</label
              >
              <input
                class="form-control"
                id="login-email"
                name="email"
                type="email"
                autocomplete="email"
                placeholder="name@company.com"
                aria-describedby="login-email-error"
                data-error-required="Enter your email address."
                data-error-invalid="Enter a valid email address."
                required
              />
              <div class="invalid-feedback" id="login-email-error" hidden>
                Enter a valid email address.
              </div>
            </div>

            <div class="auth-field">
              <div class="auth-label-row">
                <label class="form-label form-required" for="login-password"
                  >Password</label
                >
                <button
                  class="auth-inline-link"
                  type="button"
                  data-preview-action
                  data-preview-message="Password recovery is not connected. No reset email can be sent."
                >
                  Forgot password?
                </button>
              </div>

              <div class="auth-password">
                <input
                  class="form-control"
                  id="login-password"
                  name="password"
                  type="password"
                  autocomplete="current-password"
                  placeholder="Enter your password"
                  aria-describedby="login-password-error"
                  data-error-required="Enter your password."
                  required
                />
                <button
                  class="auth-password-toggle"
                  type="button"
                  data-password-toggle
                  aria-controls="login-password"
                  aria-label="Show password"
                  aria-pressed="false"
                >
                  <i class="fa-regular fa-eye" aria-hidden="true"></i>
                </button>
              </div>

              <div
                class="invalid-feedback"
                id="login-password-error"
                hidden
              >
                Enter your password.
              </div>
            </div>

            <div class="auth-check">
              <div class="form-check">
                <input
                  class="form-check-input"
                  id="login-remember"
                  name="remember"
                  type="checkbox"
                />
                <label class="form-check-label" for="login-remember"
                  >Remember me on this device</label
                >
              </div>
              <p class="form-text auth-check-note">
                UI control only. No session or saved login is created.
              </p>
            </div>

            <button class="btn-im btn-im-primary auth-submit" type="submit">
              <i
                class="fa-solid fa-right-to-bracket"
                aria-hidden="true"
              ></i>
              Login
            </button>

            <p class="auth-form-note">
              No account is checked and no session is created.
            </p>
          </form>

          <div
            class="im-alert im-alert-success auth-success"
            id="login-success"
            role="status"
            tabindex="-1"
            hidden
          >
            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
            <div>
              <strong>You are not logged in.</strong>
              The form passed local validation, but no credentials were
              checked, no session was created, and nothing was stored.
            </div>
          </div>

          <div class="auth-card-footer">
            <p>
              New to IdleMach?
              <a href="{{ url('/register') }}">Create an account</a>
            </p>
            <a class="text-link" href="{{ url('/') }}">
              <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
              Back to homepage
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
