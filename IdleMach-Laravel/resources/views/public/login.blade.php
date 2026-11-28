@extends('layouts.public')

@section('title', 'Login — IdleMach')

@section('meta_description', 'Log in to IdleMach to access your workspace, manage bookings and continue your capacity searches.')

@section('content')
<section class="auth-page" aria-labelledby="login-title">
  <div class="container-im">
    <nav class="machine-breadcrumb" aria-label="Breadcrumb">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li aria-current="page">Login</li>
      </ol>
    </nav>

    <div class="auth-center">
      <div class="auth-card auth-card-login">
        <div class="auth-card-head auth-card-head-center">
          <a
            class="auth-brand"
            href="{{ url('/') }}"
            aria-label="IdleMach home">
            <img
              class="brand-mark"
              src="{{ asset('assets/icons/logo-compact.svg') }}"
              width="118"
              height="36"
              alt="IdleMach" />
          </a>

          <h1 class="auth-card-title" id="login-title">Welcome Back</h1>
          <p class="auth-card-subtitle">
            Log in to access your IdleMach workspace, manage bookings and
            continue your capacity searches.
          </p>
        </div>

        <form
          class="auth-form"
          id="login-form"
          method="post"
          action="{{ route('login.store') }}"
          aria-labelledby="login-title"
          novalidate>
          @csrf
          <div class="auth-field">
            <label class="form-label form-required" for="login-email">Email Address</label>
            <div class="auth-input">
              <i class="fa-solid fa-envelope auth-input-icon" aria-hidden="true"></i>
              <input
                class="form-control @error('email') is-invalid @enderror"
                id="login-email"
                name="email"
                type="email"
                value="{{ old('email') }}"
                autocomplete="email"
                placeholder="name@company.com"
                aria-describedby="login-email-error"
                data-error-required="Enter your email address."
                data-error-invalid="Enter a valid email address."
                required />
            </div>
            <div class="invalid-feedback" id="login-email-error" hidden>
              Enter a valid email address.
            </div>
            @error('email')
              <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
            @enderror
          </div>

          <div class="auth-field">
            <div class="auth-label-row">
              <label class="form-label form-required" for="login-password">Password</label>
              <button
                class="auth-inline-link"
                type="button"
                data-preview-action
                data-preview-message="If the email address matches an account, password reset instructions will be sent shortly.">
                Forgot password?
              </button>
            </div>

            <div class="auth-input auth-password">
              <i class="fa-solid fa-lock auth-input-icon" aria-hidden="true"></i>
              <input
                class="form-control @error('password') is-invalid @enderror"
                id="login-password"
                name="password"
                type="password"
                autocomplete="current-password"
                placeholder="Enter your password"
                aria-describedby="login-password-error"
                data-error-required="Enter your password."
                required />
              <button
                class="auth-password-toggle"
                type="button"
                data-password-toggle
                aria-controls="login-password"
                aria-label="Show password"
                aria-pressed="false">
                <i class="fa-regular fa-eye" aria-hidden="true"></i>
              </button>
            </div>

            <div
              class="invalid-feedback"
              id="login-password-error"
              hidden>
              Enter your password.
            </div>
            @error('password')
              <div class="invalid-feedback d-block" role="alert">{{ $message }}</div>
            @enderror
          </div>

          <div class="auth-check">
            <div class="form-check">
              <input
                class="form-check-input"
                id="login-remember"
                name="remember"
                type="checkbox"
                @checked(old('remember')) />
              <label class="form-check-label" for="login-remember">Remember me on this device</label>
            </div>
          </div>

          <button class="btn-im btn-im-primary auth-submit" type="submit">
            <i
              class="fa-solid fa-right-to-bracket"
              aria-hidden="true"></i>
            Login
          </button>
        </form>

        <div class="auth-card-footer auth-card-footer-center">
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
