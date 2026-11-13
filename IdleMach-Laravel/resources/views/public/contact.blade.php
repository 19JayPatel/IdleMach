@extends('layouts.public')

@section('title', 'Contact IdleMach — IdleMach')

@section('meta_description', 'Contact IdleMach about the manufacturing-capacity marketplace. This frontend prototype includes a contact form that validates locally but does not send or store messages.')

@section('content')
  <section class="page-hero" aria-labelledby="contact-title">
    <div class="container-im">
      <nav class="machine-breadcrumb" aria-label="Breadcrumb">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li aria-current="page">Contact</li>
        </ol>
      </nav>

      <div class="row g-4 g-lg-5 align-items-start">
        <div class="col-lg-7">
          <p class="eyebrow">Contact IdleMach</p>
          <h1 class="page-title" id="contact-title">Let's Connect.</h1>
          <p class="lead page-hero-intro">
            Use this page for project or platform-related enquiries. You can
            ask about the marketplace or the owner and buyer journey. The
            form below validates locally but does not deliver a message.
          </p>

          <p class="page-hero-note">
            <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
            <span
              >This contact form is not connected to a live messaging
              system. Official contact details are not published yet.</span
            >
          </p>
        </div>

        <div class="col-lg-5">
          <aside
            class="page-hero-panel"
            aria-labelledby="contact-panel-title"
          >
            <h2 id="contact-panel-title">What this page covers</h2>
            <ul class="contact-topic-list">
              <li>
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>General questions about IdleMach</span>
              </li>
              <li>
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Machine owner and listing enquiries</span>
              </li>
              <li>
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Buyer and capacity enquiries</span>
              </li>
              <li>
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Technical feedback on the platform</span>
              </li>
            </ul>
            <p class="page-panel-note">
              <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
              <span
                >No public email address, phone number, office address,
                social media account, or business hours are confirmed in the
                project documents.</span
              >
            </p>
          </aside>
        </div>
      </div>
    </div>
  </section>

  <section
    class="section contact-section"
    aria-labelledby="contact-form-title"
  >
    <div class="container-im">
      <div class="row g-4 g-lg-5 align-items-start">
        <div class="col-lg-7">
          <div class="contact-form-panel">
            <p class="eyebrow">Send an enquiry</p>
            <h2 class="section-title" id="contact-form-title">
              Tell us what you need.
            </h2>
            <p class="contact-form-intro">
              Complete the fields below to prepare your enquiry. All fields
              are required.
            </p>

            <form
              class="contact-form"
              id="contact-form"
              aria-labelledby="contact-form-title"
              novalidate
            >
              <div class="row g-3">
                <div class="col-md-6">
                  <label
                    class="form-label form-required"
                    for="contact-name"
                    >Full Name</label
                  >
                  <input
                    class="form-control"
                    id="contact-name"
                    name="full_name"
                    type="text"
                    autocomplete="name"
                    placeholder="Your full name"
                    aria-describedby="contact-name-error"
                    required>
                  <div class="invalid-feedback" id="contact-name-error">
                    Enter your full name.
                  </div>
                </div>

                <div class="col-md-6">
                  <label
                    class="form-label form-required"
                    for="contact-email"
                    >Email Address</label
                  >
                  <input
                    class="form-control"
                    id="contact-email"
                    name="email"
                    type="email"
                    autocomplete="email"
                    placeholder="name@company.com"
                    aria-describedby="contact-email-error"
                    required>
                  <div class="invalid-feedback" id="contact-email-error">
                    Enter a valid email address.
                  </div>
                </div>

                <div class="col-md-6">
                  <label
                    class="form-label form-required"
                    for="contact-subject"
                    >Subject</label
                  >
                  <input
                    class="form-control"
                    id="contact-subject"
                    name="subject"
                    type="text"
                    placeholder="Short summary of your enquiry"
                    aria-describedby="contact-subject-error"
                    required>
                  <div class="invalid-feedback" id="contact-subject-error">
                    Enter a subject for your enquiry.
                  </div>
                </div>

                <div class="col-md-6">
                  <label
                    class="form-label form-required"
                    for="contact-enquiry-type"
                    >Enquiry Type</label
                  >
                  <select
                    class="form-select"
                    id="contact-enquiry-type"
                    name="enquiry_type"
                    aria-describedby="contact-enquiry-type-error"
                    required
                  >
                    <option value="">Select an enquiry type</option>
                    <option value="general">General Enquiry</option>
                    <option value="machine-owner">
                      Machine Owner Enquiry
                    </option>
                    <option value="buyer">Buyer Enquiry</option>
                    <option value="technical">Technical Support</option>
                    <option value="other">Other</option>
                  </select>
                  <div
                    class="invalid-feedback"
                    id="contact-enquiry-type-error"
                  >
                    Select an enquiry type.
                  </div>
                </div>

                <div class="col-12">
                  <label
                    class="form-label form-required"
                    for="contact-message"
                    >Message</label
                  >
                  <textarea
                    class="form-control"
                    id="contact-message"
                    name="message"
                    rows="6"
                    placeholder="Describe your question or enquiry"
                    aria-describedby="contact-message-help contact-message-error"
                    required
                  ></textarea>
                  <div class="form-text" id="contact-message-help">
                    Do not include confidential or sensitive information.
                  </div>
                  <div class="invalid-feedback" id="contact-message-error">
                    Enter your message.
                  </div>
                </div>
              </div>

              <div class="form-actions">
                <button class="btn-im btn-im-primary" type="submit">
                  <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
                  Submit Enquiry
                </button>
                <button class="btn-im btn-im-outline" type="reset">
                  <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
                  Clear Form
                </button>
              </div>

              <p class="form-note">
                Nothing is sent, stored, delivered, or answered.
              </p>
            </form>

            <div
              class="im-alert im-alert-success contact-form-success"
              id="contact-form-success"
              role="status"
              tabindex="-1"
              hidden
            >
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <div>
                <strong>Your message was not sent.</strong>
                The form passed local validation, but it is not connected to
                a live messaging system. Nothing was delivered or stored.
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <aside
            class="contact-aside"
            aria-label="Contact details and form limits"
          >
            <div class="contact-aside-panel contact-aside-primary">
              <p class="eyebrow">Contact information</p>
              <h2>Official details are not published yet.</h2>
              <p>
                No public email address, phone number, office address,
                social media account, or business hours are confirmed in the
                project documents.
              </p>
              <p>
                Official contact details will be published on this page
                before the platform launches.
              </p>
              <p class="contact-aside-note">
                <i class="fa-solid fa-lock" aria-hidden="true"></i>
                <span
                  >Do not enter confidential, financial, or personal
                  information into this form.</span
                >
              </p>
            </div>

            <div class="contact-aside-panel">
              <h3>What this form does</h3>
              <ul class="check-list">
                <li>
                  <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  <span>No message is sent, stored, or delivered.</span>
                </li>
                <li>
                  <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  <span>No automated reply is generated.</span>
                </li>
                <li>
                  <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                  <span
                    >No account, listing, booking, or payment is
                    changed.</span
                  >
                </li>
              </ul>

              <div class="contact-aside-links">
                <a class="text-link" href="{{ url('/how-it-works') }}">
                  How IdleMach works
                  <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
                <a class="text-link" href="{{ url('/machines') }}">
                  Explore machines
                  <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>
@endsection
