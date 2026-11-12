# IdleMach --- System Architecture

**Document name:** `architecture.md`\
**Product:** IdleMach\
**Tagline:** Turn Idle Capacity Into Opportunity.\
**Architecture type:** Web-based, role-based manufacturing capacity
marketplace\
**Primary source:** `CapacityShare.md` and the project PRD (`prd.md`)\
**Implementation approach:** Accepted static frontend prototype followed by Laravel 13 application development.

------------------------------------------------------------------------

## 1. Purpose

This document describes the proposed structure of the IdleMach
application: its major layers, modules, users, request flows, data
relationships, access boundaries, and deployment stages.

It translates the supplied product requirements into an
implementation-oriented architecture. It does not replace the PRD.
Product behavior and business rules must remain consistent with
`prd.md`.

Where the source documents do not define a technical decision, this
document marks it as **To be decided** instead of treating an assumption
as a confirmed requirement.

## 2. Architecture overview

IdleMach is a web application with three role groups:

-   **Admin:** manages and monitors platform activity.
-   **Machine Owner:** manages company information, machine listings,
    capacity, availability, and booking requests.
-   **Buyer:** discovers machines, checks availability, requests
    bookings, makes payments, tracks work, and submits reviews.

The application connects owners' unused manufacturing capacity with
buyers who need access to manufacturing machines and working hours.

### 2.1 High-level architecture

``` text
                         USERS
             ┌─────────────┼─────────────┐
             │             │             │
           ADMIN          OWNER         BUYER
             │             │             │
             └─────────────┼─────────────┘
                           │
                     WEB INTERFACE
                           │
                  ROUTES / MIDDLEWARE
                           │
                     CONTROLLERS
                           │
                  APPLICATION LOGIC
                           │
                    ELOQUENT MODELS
                           │
                        MYSQL
                           │
          ┌────────────────┼────────────────┐
          │                │                │
       FILES          NOTIFICATIONS      PAYMENTS
   (machine images,    (database;       (payment
   booking documents)   email later)     records/gateway)
```

This is a logical view. The exact hosting topology, queue workers,
storage provider, and payment provider are not specified in the source
documents.

## 3. Architecture principles

1.  **Role separation:** Admin, Owner, and Buyer areas must have
    separate access rules.
2.  **Server-side enforcement:** Permissions, validation, ownership,
    booking conflicts, and business rules must be checked on the server.
3.  **Modular organization:** Keep controllers, views, and routes
    grouped by role and feature.
4.  **Shared presentation:** Reuse common layouts and UI components
    where appropriate.
5.  **Core flow first:** Complete the machine listing, approval,
    discovery, availability, booking, payment record, completion, and
    review flow before adding advanced features.
6.  **No premature complexity:** Do not add optional technologies such
    as Redis, WebSockets, maps, AI, or a mobile app at the start.
7.  **Source fidelity:** Do not invent product behavior, business
    claims, or data fields that are not supported by the project
    requirements.
8.  **Incremental implementation:** Build and review the frontend
    prototype before integrating the Laravel backend.

## 4. Technology architecture

### 4.1 Frontend prototype stage

The initial prototype uses:

-   HTML5
-   CSS3
-   Vanilla JavaScript
-   Bootstrap 5
-   Font Awesome

Suggested structure:

``` text
IdleMach-Frontend/
  index.html
  machines.html
  machine-details.html
  about.html
  contact.html
  login.html
  register.html
  css/
    style.css
  js/
    script.js
  assets/
    images/
    icons/
```

Add role dashboard preview pages only when they are part of the approved
prototype scope.

Frontend prototype limitations:

-   No Laravel backend.
-   No database persistence.
-   No real authentication or role authorization.
-   No real booking creation or payment processing.
-   Forms and interactions may demonstrate the intended experience, but
    must not claim to save or transmit real data unless connected to a
    real service.

Use one shared CSS file and one shared JavaScript file for the
prototype, as requested for the initial frontend project.

### 4.2 Laravel application stage

The approved application stack is:

| Layer | Technology |
|---|---|
| Server-side application | Laravel 13 |
| Programming language | PHP |
| Database | MySQL |
| Presentation | Blade, HTML, CSS, JavaScript |
| UI framework | Bootstrap |
| Icons | Font Awesome |
| Data access | Eloquent ORM |
| Authentication | Laravel authentication approach (to be selected) |
| Authorization | Middleware and policies where appropriate |
| Validation | Laravel Validation |
| Notifications | Laravel Notifications |
| Email | Laravel Mail |

Optional technologies identified for later consideration:

-   Razorpay / Stripe
-   Laravel Queue
-   Redis
-   Cloud Storage
-   WebSockets
-   Maps

Do not introduce optional technologies until a product requirement needs
them.

## 5. Application layers

### 5.1 Presentation layer

Responsible for displaying pages and receiving user input.

Includes:

-   Public website
-   Machine marketplace
-   Machine detail page
-   Login and registration
-   Admin dashboard and screens
-   Owner dashboard and screens
-   Buyer dashboard and screens
-   Forms, tables, filters, alerts, and reusable UI components

Laravel implementation uses Blade views and shared layouts.

### 5.2 Routing and middleware layer

Responsible for mapping URLs to controllers and applying access
restrictions.

Route groups:

-   `/admin/*`
-   `/owner/*`
-   `/buyer/*`

Middleware responsibilities:

-   Confirm the user is authenticated.
-   Confirm the user's role is allowed to access the route.
-   Reject unauthorized access.
-   Keep role-specific modules separated.

The source includes a role middleware concept that compares the
authenticated user's role to the role required by a route. Register
middleware according to the Laravel version used by the project.

### 5.3 Controller layer

Controllers receive requests, call the relevant application/model
operations, and return views or redirects.

Controllers are grouped by role:

``` text
app/Http/Controllers/
  Admin/
    DashboardController.php
    UserController.php
    MachineController.php
    BookingController.php
    ReportController.php
  Owner/
    DashboardController.php
    MachineController.php
    AvailabilityController.php
    BookingController.php
    PaymentController.php
  Buyer/
    DashboardController.php
    MachineController.php
    BookingController.php
    PaymentController.php
    ReviewController.php
```

The source names these controllers as the proposed structure. Additional
controllers may be introduced only when a real module requires them.

### 5.4 Validation layer

Use Laravel validation for all important inputs.

For larger forms, use Form Request classes, such as:

``` text
app/Http/Requests/
  StoreMachineRequest.php
  UpdateMachineRequest.php
  StoreBookingRequest.php
```

Frontend validation is for user experience only. Server-side validation
remains mandatory.

### 5.5 Model and data-access layer

Use Eloquent models and relationships to access MySQL data.

Models implied by the proposed schema include:

-   User
-   Company
-   Machine
-   MachineImage
-   MachineAvailability
-   Booking
-   BookingDocument
-   Payment
-   Review

Laravel database notifications may use Laravel's notification
infrastructure. The exact model/table implementation should follow the
selected Laravel version.

### 5.6 Persistence layer

MySQL stores application records, including users, companies, machines,
images' file references, availability, bookings, booking documents' file
references, payments, reviews, and notifications.

Uploaded files themselves should be stored in the configured file
storage location; the database stores the relevant paths or references.
The specific storage provider is **To be decided**.

## 6. Role-based architecture

### 6.1 Admin area

Proposed route/view areas:

``` text
admin/dashboard
admin/users
admin/users/{id}
admin/machines
admin/machines/pending
admin/bookings
admin/payments
admin/reviews
admin/reports
```

Responsibilities:

-   View dashboard metrics.
-   Search, filter, view, block, and unblock users.
-   Review, approve, reject, activate, deactivate, and delete machine
    listings as permitted.
-   Monitor bookings and payment records.
-   Manage reviews.
-   View reports.

### 6.2 Owner area

Proposed route/view areas:

``` text
owner/dashboard
owner/profile
owner/machines
owner/machines/create
owner/machines/{id}
owner/machines/{id}/edit
owner/availability
owner/bookings
owner/bookings/{id}
owner/reviews
owner/payments
```

Responsibilities:

-   Manage owner and company profile.
-   Create and maintain machine listings.
-   Upload machine images and enter specifications.
-   Set hourly rates and available capacity.
-   Maintain machine availability and calendar.
-   Review booking requests.
-   Accept or reject requests.
-   Manage bookings and mark work completed.
-   View earnings and reviews.

### 6.3 Buyer area

Proposed route/view areas:

``` text
buyer/dashboard
machines
machines/{id}
buyer/bookings
buyer/bookings/create
buyer/bookings/{id}
buyer/payments
buyer/reviews
```

Responsibilities:

-   Manage buyer profile.
-   Search and filter machines.
-   View machine details and availability.
-   Request bookings and upload work documents.
-   Track bookings.
-   Make payments.
-   Cancel bookings where allowed.
-   Mark work completed and submit reviews.

The public marketplace routes and the authenticated buyer routes may
share machine listing/detail views. The final route ownership and guest
access rules should be confirmed during implementation.

## 7. Main module architecture

### 7.1 Authentication and role management

Main responsibilities:

-   Registration
-   Login
-   Authentication
-   Role identification
-   Role-based redirection
-   Role middleware
-   Access denial for unauthorized roles

Role values specified in the source:

-   `admin`
-   `owner`
-   `buyer`

### 7.2 Company management

A user has one company in the proposed relationship model. A company can
have many machines.

Company information includes:

-   Company name
-   GST number
-   Phone
-   Email
-   Address
-   City
-   State
-   Pincode
-   Description
-   Logo

The source proposes one company per user. If multiple company profiles
per user are required later, the relationship must be reconsidered
explicitly.

### 7.3 Machine management

Owner creates and maintains machine listings.

Machine information includes:

-   Name
-   Type
-   Brand
-   Model
-   Description
-   Location
-   Hourly rate
-   Status
-   Specifications
-   Images

A machine belongs to a company and can have many images, availability
records, and bookings.

### 7.4 Machine approval and operational status

Keep listing approval separate from the machine's operational condition. These are two independent database fields:

- **approval_status:** pending, approved, rejected.
- **operational_status:** active, inactive, maintenance.

A newly submitted listing starts with approval_status = pending. Only an admin may approve or reject it. Approval does not automatically change operational_status; do not assume an automatic activation transition.

Marketplace and booking rules:

1. Only machines with approval_status = approved appear in the marketplace.
2. Approved machines remain visible when operational_status is inactive or maintenance; show a clear unavailable state.
3. A machine can receive a new booking request only when approval_status = approved AND operational_status = active.
4. Pending and rejected listings are hidden from the marketplace and cannot receive booking requests.
5. Inactive and maintenance machines remain discoverable but cannot receive new booking requests.
6. Admin approval/rejection and operational status are separate permissions/actions. Owners cannot approve their own listings.

The exact rules for who may change operational_status, and the allowed status transitions, must follow the approved PRD/Rules and be finalized before implementation.

### 7.5 Machine images and documents

Machine images are represented separately from the machine record.

Booking documents may include:

-   CAD files
-   Drawings
-   PDFs
-   Technical documents
-   Other work documents

The database stores file metadata and paths. File storage configuration,
upload limits, and allowed file types must be defined for each use case.

### 7.6 Marketplace and search

Buyer discovery supports search by machine name, machine type, location, and company. Potential filters include machine type, location, price range, available date, available hours, material, and process.

The marketplace query must include every machine whose approval_status is approved, regardless of operational status. Operational status controls the booking action, not marketplace visibility:

- Active: show as available for booking, subject to date/time capacity.
- Inactive: show as unavailable; disable new booking requests.
- Maintenance: show as under maintenance/unavailable; disable new booking requests.

Pending and rejected listings must not be returned in public marketplace results. Never infer availability from approval status alone.

### 7.7 Capacity and availability

Owners define the working hours available for each machine.

Availability record fields proposed in the source:

-   Machine
-   Date
-   Start time
-   End time
-   Available hours
-   Status

Availability states:

-   `available`
-   `booked`
-   `maintenance`
-   `unavailable`

Basic capacity calculation:

``` text
Available Capacity = Total Capacity - Booked Capacity
```

The calendar displays available, booked, maintenance, and unavailable
periods.

### 7.8 Booking management

Booking request contains:

-   Machine
-   Buyer
-   Required date
-   Start time
-   End time
-   Required hours
-   Work description
-   Material
-   Quantity
-   Special requirements
-   Uploaded drawing/document

Owner can view the request and accept or reject it. A rejection reason
may be provided.

Booking statuses:

-   `pending`
-   `accepted`
-   `rejected`
-   `payment_pending`
-   `confirmed`
-   `in_progress`
-   `completed`
-   `cancelled`

Main flow:

``` text
Pending
   |
   v
Accepted
   |
   v
Payment Pending
   |
   v
Confirmed
   |
   v
In Progress
   |
   v
Completed
```

Rejection:

``` text
Pending -> Rejected
```

Cancellation:

``` text
Pending / Confirmed -> Cancelled
```

The exact allowed transitions and cancellation policy are open
decisions.

### 7.9 Double-booking protection

The application must prevent overlapping reservations for the same
machine.

Conceptual overlap rule for a same-day time range:

``` text
Existing start time < Requested end time
AND
Existing end time > Requested start time
```

The source example checks existing bookings in statuses:

-   `accepted`
-   `payment_pending`
-   `confirmed`
-   `in_progress`

The final reservation statuses must be decided consistently with the
payment timeout and capacity-reservation policy.

The conflict check must run on the server. The final implementation
should account for simultaneous requests and use an appropriate database
transaction/locking strategy. Exact concurrency implementation is a
technical decision for the Laravel build stage.

### 7.10 Payment management

Payment follows owner acceptance. The MVP uses simulated/demo payment outcomes only; it must not charge real money or imply that real funds were received.

Flow: Owner accepts booking → Payment pending → Demo payment simulation.

- On success: save a successful demo payment record, then confirm the booking.
- On failure or pending outcome: keep the booking unconfirmed.

A booking becomes confirmed only after a successful demo payment record has been saved and associated with that booking. Clearly label the interface and records as demo/simulation. Keep payment handling separate from provider-specific gateway code so a real gateway can be considered in a later phase. Do not implement a real gateway in the MVP.

Demo failure/timeout handling and whether multiple attempts are allowed remain open decisions.

### 7.11 Work progress and completion

After payment succeeds, booking is confirmed. When the booking date
arrives, work can move to `in_progress`. Owner marks the work as
completed.

The source also allows the buyer to mark work completed. The exact
confirmation sequence between owner and buyer must be decided.

### 7.12 Reviews

After a booking is completed, only the buyer associated with that booking may review the machine owner. Reviews are one-way: owners do not review buyers.

Review fields proposed:

- Booking ID
- Reviewer ID (the booking's buyer)
- Reviewee ID (the machine owner's user)
- Rating
- Comment

Enforce at most one review per booking with a unique constraint on reviews.booking_id. The server must verify that the booking is completed, the authenticated reviewer is the booking buyer, and the reviewee is the owner of the booked machine. Example rating dimensions such as machine quality, work quality, and timeliness remain subject to the approved review design.

### 7.13 Notifications

Notification events:

-   New booking request
-   Booking accepted
-   Booking rejected
-   Payment successful
-   Booking confirmed
-   Booking starting
-   Booking completed
-   New review

Initial direction: Laravel database notifications. Email can be added
later using Laravel Mail. WhatsApp notifications are a future feature.

### 7.14 Reports

Admin reports may include:

-   Total users
-   Total machines
-   Total bookings
-   Total revenue
-   Popular machine types
-   Popular locations
-   Most active owners
-   Most requested machines

## 8. Data architecture

### 8.1 Proposed database tables

``` text
users
companies
machines
machine_images
machine_availabilities
bookings
booking_documents
payments
reviews
notifications
```

### 8.2 Entity relationship overview

User has one Company (unique companies.user_id). Company has many Machines. A Machine has many Images, Availabilities, and Bookings. Each Booking belongs to one Machine and one Buyer (User), and has many Documents and Payment records. A completed Booking may have at most one Review (unique reviews.booking_id); the reviewer is the Buyer and the reviewee is the Machine Owner.

This is a conceptual relationship view, not a complete database ERD. Payment-attempt cardinality must remain aligned with the still-open demo retry decision.

### 8.3 Relationship summary

| Model | Relationship |
|---|---|
| User | Has one Company; has many buyer Bookings; has many authored Reviews; has many Notifications |
| Company | Belongs to User; has many Machines |
| Machine | Belongs to Company; has many Images, Availabilities, and Bookings |
| Booking | Belongs to Machine and Buyer (User); has many Documents and Payment records; has at most one Review |
| Payment | Belongs to Booking |
| Review | Belongs to Booking; reviewer is the Buyer; reviewee is the Machine Owner |

Database constraints:
- Add a unique constraint to companies.user_id to enforce one company per user.
- Add a unique constraint to reviews.booking_id to enforce at most one review per booking.
- Keep payment-attempt cardinality aligned with the still-open demo retry decision; do not assume one payment per booking without resolving that decision.

### 8.4 Key data ownership

-   Company records are linked to their user.
-   Machines are linked to a company.
-   Machine images and availability records are linked to a machine.
-   Bookings are linked to a machine and buyer.
-   Payments and documents are linked to bookings.
-   Reviews identify a booking, reviewer, and reviewee.
-   Notifications belong to the relevant user.

All read and write operations must enforce the appropriate ownership and
role checks.

## 9. Main application request flows

### 9.1 Registration and login

``` text
Visitor
  |
  +--> Register
  |       |
  |       v
  |    Create account with role
  |
  +--> Login
          |
          v
     Authenticate user
          |
          v
       Check role
      /    |     \
   Admin  Owner  Buyer
     |      |      |
 Dashboard Dashboard Dashboard
```

### 9.2 Machine listing and approval

``` text
Owner
  |
  v
Create company profile
  |
  v
Create machine listing
  |
  v
Upload images / add specifications
  |
  v
Set rate and capacity
  |
  v
Submit machine
  |
  v
Pending review
  |
  v
Admin approval decision
  /             \
Approve         Reject
  |
  v
Approved / Active marketplace listing
```

### 9.3 Discovery and booking

``` text
Buyer
  |
  v
Search / Filter machines
  |
  v
View machine details
  |
  v
Check availability
  |
  v
Submit booking request and documents
  |
  v
Owner reviews request
  /             \
Accept           Reject
  |
  v
Payment pending
  |
  v
Successful payment
  |
  v
Booking confirmed
  |
  v
Work in progress
  |
  v
Work completed
  |
  v
Review
```

### 9.4 Admin monitoring

``` text
Admin
  |
  +--> Users
  +--> Machine approvals
  +--> Bookings
  +--> Payments
  +--> Reviews
  +--> Reports
  +--> Platform activity
```

## 10. Route architecture

Routes should be grouped by role, using authentication and role
middleware.

Conceptual structure:

``` php
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Admin routes
    });

Route::middleware(['auth', 'role:owner'])
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {
        // Owner routes
    });

Route::middleware(['auth', 'role:buyer'])
    ->prefix('buyer')
    ->name('buyer.')
    ->group(function () {
        // Buyer routes
    });
```

Public marketplace routes and guest access rules must be defined when
the final route list is prepared.

Use Laravel resource routes for CRUD modules where they make the
implementation clearer. The source includes
`Route::resource('machines', MachineController::class)` as an example.

## 11. View architecture

Suggested Blade view organization:

``` text
resources/views/
  layouts/
    app.blade.php
    admin.blade.php
    owner.blade.php
    buyer.blade.php
  auth/
    login.blade.php
    register.blade.php
  admin/
    dashboard.blade.php
    users/
    machines/
    bookings/
    reports/
  owner/
    dashboard.blade.php
    profile/
    machines/
    availability/
    bookings/
    payments/
  buyer/
    dashboard.blade.php
    machines/
    bookings/
    payments/
    reviews/
  machines/
    index.blade.php
    show.blade.php
  components/
```

Reusable UI elements identified in the source:

-   Navbar
-   Sidebar
-   Footer
-   Alerts
-   Buttons
-   Forms
-   Cards
-   Modals
-   Pagination

Reuse shared components rather than duplicating markup across role
areas.

## 12. File and storage architecture

The source requires machine images to be stored separately from machine
records and booking documents to be stored with metadata.

Logical file groups:

``` text
Machine
  └── Multiple machine image files

Booking
  └── Multiple work document files
      ├── CAD file
      ├── Drawing
      ├── PDF
      └── Technical document
```

The database stores file paths/references and associated metadata. The
actual storage disk, directory naming, file retention, and
public/private access rules are **To be decided**.

Private buyer documents should not be made publicly accessible merely
because a file URL is known. Access must be checked by the application.

## 13. Security architecture

The source requires the following controls:

-   Authentication
-   Authorization
-   Role middleware
-   CSRF protection
-   Server-side validation
-   Password hashing
-   File upload validation
-   Ownership checks
-   SQL injection protection through Eloquent/Query Builder
-   Secure session handling

### 13.1 Role authorization

Every protected route must enforce the expected role on the server.

### 13.2 Record ownership

-   Buyer can access only their own bookings.
-   Owner can modify only machines belonging to their company.
-   Admin can monitor platform records according to admin permissions.

### 13.3 Validation

Validate all important data on the server, including machine details,
hourly rates, booking dates/times, and uploads.

### 13.4 Upload security

Validate file type and size. The source gives an example document rule
allowing PDF, JPG, JPEG, and PNG up to 5 MB. This example should not
automatically be applied to every file category; machine images and CAD
documents may need separate rules.

### 13.5 Booking integrity

The server must check machine status, availability, ownership, booking
overlap, and booking status transitions. The final implementation must
avoid relying on client-side checks alone.

## 14. Error and status handling

The source defines machine, availability, booking, payment, and user
statuses. The application should display understandable status labels to
users while retaining consistent internal status values.

Examples:

-   Machine: Pending, Approved, Rejected, Active, Inactive, Maintenance
-   Availability: Available, Booked, Maintenance, Unavailable
-   Booking: Pending, Accepted, Rejected, Payment Pending, Confirmed, In
    Progress, Completed, Cancelled
-   Payment: Pending, Successful, Failed, Refunded
-   User: Active, Blocked

The source does not specify a complete error catalogue, retry strategy,
audit log design, or status transition matrix. These are to be decided
during detailed implementation.

## 15. Testing architecture

Test the product by module and through complete user journeys.

Minimum test areas:

-   Registration
-   Login
-   Role access
-   Machine creation
-   Machine approval
-   Machine search
-   Availability
-   Booking request
-   Booking acceptance
-   Booking rejection
-   Double booking
-   Payment
-   Booking completion
-   Review
-   Admin access

End-to-end scenario:

1.  Log in as owner.
2.  Create a machine.
3.  Log in as admin.
4.  Approve the machine.
5.  Log in as buyer.
6.  Search for the machine.
7.  Send a booking request.
8.  Log in as owner.
9.  Accept the request.
10. Log in as buyer.
11. Complete payment.
12. Confirm booking.

Also test unauthorized access, attempts to access another user's
records, invalid form data, invalid uploads, unavailable machines, and
overlapping time requests.

## 16. Development and implementation sequence

The project must be developed incrementally.

### Stage A --- Frontend prototype

1.  Confirm the public and role-based page scope.
2.  Establish the visual system and shared components.
3.  Build the public homepage and marketplace pages.
4.  Build machine details and inquiry/booking UI previews.
5.  Build login and registration UI.
6.  Build dashboard previews as required.
7.  Review desktop and mobile layouts.
8.  Verify all frontend interactions.
9.  Approve the prototype before backend integration.

### Stage B --- Laravel foundation

1.  Create Laravel project.
2.  Configure `.env`.
3.  Configure MySQL.
4.  Run migrations.
5.  Configure authentication.
6.  Create User model and roles.
7.  Create role middleware.
8.  Create shared Blade layouts.

### Stage C --- Core marketplace

1.  Owner and company profile.
2.  Machine CRUD.
3.  Machine images and specifications.
4.  Admin machine approval.
5.  Marketplace listing and details.
6.  Search and filters.
7.  Availability and calendar.

### Stage D --- Transaction workflow

1.  Booking request.
2.  Owner accept/reject.
3.  Double-booking protection.
4.  Payment record and confirmation.
5.  Work progress and completion.
6.  Reviews.

### Stage E --- Platform operations

1.  Notifications.
2.  Admin user management.
3.  Booking and payment monitoring.
4.  Reports.
5.  Expanded tests and security review.

### Stage F --- Future enhancements

Consider real payment gateways, email/WhatsApp notifications,
verification, favorites, advanced analytics, invoices, commission, maps,
AI matching, demand prediction, and mobile application only after the
core flow is stable.

## 17. Optional and future architecture extensions

The source identifies these as optional or future technologies/features:

  Technology or feature   Intended later use
  ----------------------- -------------------------------------
  Razorpay / Stripe       Real payment gateway
  Laravel Queue           Background processing
  Redis                   Supporting infrastructure if needed
  Cloud Storage           Uploaded file storage
  WebSockets              Real-time features
  Maps                    Location/map features
  Email                   Additional notifications
  WhatsApp                Future notifications
  Live Chat               Buyer-owner communication
  AI matching             Machine matching
  Demand prediction       Demand insights
  Mobile application      Mobile access

These are not prerequisites for the first working version.

## 18. Architecture decisions still required

The following details remain open and must not be guessed:

1. Authentication starter approach and authentication implementation details.
2. Final public route access for guests and buyers.
3. Who may change a machine's operational status and the allowed transitions.
4. Whether accepted or payment-pending bookings reserve capacity, and for how long.
5. Capacity units and detailed availability scheduling semantics.
6. Booking overlap handling for multi-day bookings, overnight shifts, and concurrent requests.
7. Demo payment failure/timeout handling and whether multiple demo payment attempts are allowed.
8. Future gateway selection, refunds, callbacks, fees, commissions, taxes, and owner settlement.
9. Cancellation rules and refund policy.
10. Whether one booking can cover one machine only or multiple machines.
11. Work completion confirmation by owner, buyer, or both.
12. Review dimensions, edits/removal, and dispute handling.
13. File storage provider, private/public access, retention, and upload rules.
14. Notification delivery timing and email requirements.
15. Exact buyer dashboard and profile requirements.
16. Final database indexes, deletion policies, hosting, backups, logging, monitoring, privacy, and production operations.

## 19. Architecture completion criteria

The architecture is ready to guide implementation when:

-   The three user roles and their access boundaries are clear.
-   The frontend prototype and Laravel application stages are separate.
-   The main application layers and module responsibilities are defined.
-   The proposed database entities and relationships are documented.
-   The machine listing and approval flow is clear.
-   Marketplace search and machine detail responsibilities are clear.
-   Capacity and availability responsibilities are clear.
-   Booking and payment flows are documented.
-   Double-booking prevention is identified as a server-side
    requirement.
-   Work completion and reviews are included.
-   Notifications and admin monitoring are included.
-   Security and ownership checks are documented.
-   The implementation sequence is agreed.
-   Unspecified product and technical decisions are listed rather than
    assumed.

## 20. Final architecture principle

Keep IdleMach modular and straightforward. Build the core marketplace
flow first:

**Owner → Add Machine → Set Availability → Admin Approves → Buyer Finds
Machine → Buyer Requests Booking → Owner Accepts → Payment → Booking
Confirmed → Work Completed → Review**

Make this flow secure and reliable before adding optional technologies
or advanced features.

------------------------------------------------------------------------

## Appendix A --- Source alignment

This architecture is based on the supplied `CapacityShare.md` and the
project PRD. It retains the source's core concepts and proposed
structure:

-   Three roles: Admin, Machine Owner, Buyer
-   Laravel, PHP, MySQL, Blade, Bootstrap, JavaScript, Font Awesome
-   Role-based routes and middleware
-   Role-separated controllers and views
-   User, Company, Machine, MachineImage, MachineAvailability, Booking,
    BookingDocument, Payment, Review, and Notification data
-   Machine approval, marketplace, search, filters, capacity,
    availability, and calendar
-   Booking request, accept/reject, payment, confirmation, work
    completion, and reviews
-   Admin dashboards, management, and reports
-   Validation, ownership checks, security, testing, and phased
    development
-   Optional technologies and future features

**Source fidelity note:** This document organizes the architecture
described by the source. It does not treat illustrative examples as real
data. It does not silently decide requirements that the source leaves
open.
