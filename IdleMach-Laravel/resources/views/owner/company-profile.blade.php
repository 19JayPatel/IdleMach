@extends('layouts.owner')

@section('title', 'Company Profile — IdleMach Owner')

@section('meta_description', 'IdleMach owner company profile with business name, logo, description, address, contact details, GST details, and an edit interface. Frontend prototype only.')

@section('page_title', 'Company Profile')

@section('content')
          <div class="dashboard-header">
            <div>
              <p class="eyebrow">My business</p>
              <h1 class="dashboard-title">Company Profile</h1>
              <p class="dashboard-subtitle">
                Business information shown to buyers on the marketplace. This is
                separate from your personal account details.
              </p>
            </div>
            <div class="dashboard-header-actions">
              <a
                class="btn-im btn-im-outline"
                href="{{ route('owner.profile') }}"
              >
                <i class="fa-solid fa-user-gear" aria-hidden="true"></i>
                Profile Management
              </a>
              <button
                class="btn-im btn-im-primary"
                type="button"
                data-action="owner-company-profile"
              >
                <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                Edit Company Profile
              </button>
            </div>
          </div>

          <div class="row g-4">
            <div class="col-lg-8">
              <section
                class="dashboard-card h-100"
                aria-labelledby="company-details-heading"
              >
                <div class="dashboard-card-header">
                  <h2 class="dashboard-card-title" id="company-details-heading">
                    <i class="fa-solid fa-building" aria-hidden="true"></i>
                    Business information
                  </h2>
                  <span class="status-badge status-approved">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    Approved owner
                  </span>
                </div>
                <div class="dashboard-card-body">
                  <dl class="row gy-3 mb-0">
                    <dt class="col-sm-4 text-muted fw-normal">Company name</dt>
                    <dd class="col-sm-8 fw-semibold mb-0">Patel Engineering</dd>

                    <dt class="col-sm-4 text-muted fw-normal">Contact person</dt>
                    <dd class="col-sm-8 mb-0">Nilesh Patel</dd>

                    <dt class="col-sm-4 text-muted fw-normal">Business description</dt>
                    <dd class="col-sm-8 mb-0">
                      Precision CNC turning and milling workshop serving
                      industrial buyers with unused daily capacity.
                    </dd>

                    <dt class="col-sm-4 text-muted fw-normal">Business address</dt>
                    <dd class="col-sm-8 mb-0">
                      Plot 42, GIDC Industrial Estate,<br />
                      Rajkot, Gujarat &ndash; 360004
                    </dd>

                    <dt class="col-sm-4 text-muted fw-normal">Email</dt>
                    <dd class="col-sm-8 mb-0">owner@example.test</dd>

                    <dt class="col-sm-4 text-muted fw-normal">Phone</dt>
                    <dd class="col-sm-8 mb-0">+91 00000 00000</dd>

                    <dt class="col-sm-4 text-muted fw-normal">GSTIN</dt>
                    <dd class="col-sm-8 mb-0">
                      Not provided in this prototype
                    </dd>
                  </dl>
                </div>
                <div class="dashboard-card-footer">
                  <span
                    >Company details are illustrative sample data. Saving the
                    edit form updates this page locally only.</span
                  >
                </div>
              </section>
            </div>

            <div class="col-lg-4">
              <section
                class="dashboard-card"
                aria-labelledby="company-logo-heading"
              >
                <div class="dashboard-card-header">
                  <h2 class="dashboard-card-title" id="company-logo-heading">
                    <i class="fa-regular fa-image" aria-hidden="true"></i>
                    Company logo
                  </h2>
                </div>
                <div class="dashboard-card-body text-center">
                  <div class="mb-3">
                    <img
                      src="{{ asset('assets/icons/logo-compact.svg') }}"
                      width="150"
                      height="46"
                      alt="Patel Engineering company logo placeholder"
                    />
                  </div>
                  <p class="table-cell-subtext mb-0">
                    Logo uploads are disabled in this prototype. The IdleMach
                    compact logo is shown as a placeholder.
                  </p>
                </div>
              </section>

              <section
                class="dashboard-card"
                aria-labelledby="company-account-heading"
              >
                <div class="dashboard-card-header">
                  <h2 class="dashboard-card-title" id="company-account-heading">
                    <i class="fa-solid fa-id-card" aria-hidden="true"></i>
                    Account details
                  </h2>
                </div>
                <div class="dashboard-card-body">
                  <dl class="row gy-2 mb-0">
                    <dt class="col-6 text-muted fw-normal">Account type</dt>
                    <dd class="col-6 text-end mb-0">Machine Owner</dd>

                    <dt class="col-6 text-muted fw-normal">Company status</dt>
                    <dd class="col-6 text-end mb-0">
                      <span class="status-badge status-approved">
                        <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                        Approved
                      </span>
                    </dd>

                    <dt class="col-6 text-muted fw-normal">GST details</dt>
                    <dd class="col-6 text-end mb-0">Not on file</dd>
                  </dl>
                </div>
                <div class="dashboard-card-footer">
                  <span
                    >GST and registration fields are not part of the existing
                    sample data and are shown as not provided.</span
                  >
                </div>
              </section>
            </div>
          </div>

          <div class="im-alert im-alert-info mb-0" role="note">
            <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
            <div>
              <strong>Company Profile is separate from Profile Management.</strong>
              Company Profile holds business information. Personal account
              details such as your name, email, phone, and password are managed
              on the
              <a href="{{ route('owner.profile') }}">Profile Management</a>
              screen.
            </div>
          </div>
@endsection
