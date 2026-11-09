# IdleMach --- Project Memory

**Project name:** IdleMach\
**Tagline:** Turn Idle Capacity Into Opportunity\
**Document purpose:** A compact, persistent context file for future
AI-assisted work on IdleMach. Read this file before starting a new task
so the project context, terminology, scope, and important rules remain
consistent.

> **Important:** This file is a project context summary. It does not
> replace the detailed PRD, Architecture, Rules, Design, or Task Plan
> documents. If details differ, check the relevant detailed document and
> ask for clarification when the source material is unclear.

------------------------------------------------------------------------

## 1. Project Overview

IdleMach is a **manufacturing capacity marketplace**. It connects
businesses that have unused manufacturing machine capacity with buyers
who need manufacturing work but do not own the required machines.

The platform has three primary roles:

1.  **Machine Owner** --- lists machines and unused capacity, manages
    availability, and responds to booking requests.
2.  **Buyer** --- discovers suitable machines, checks availability,
    requests manufacturing work, and follows the booking.
3.  **Admin** --- manages users, reviews machine listings, and monitors
    bookings, payments, reviews, and platform activity.

IdleMach is **not**: - A CNC/VMC machine manufacturer website. - A
machine-selling or machine-rental equipment store by default. - A
generic industrial company website.

The main value is connecting unused manufacturing capacity with buyers
who need it.

## 2. Core Marketplace Journey

Keep this workflow consistent across requirements, UI, code, and
explanations:

**LIST → DISCOVER → REQUEST → ACCEPT → PAY → BOOK → WORK → COMPLETE →
REVIEW**

Expanded journey:

1.  Machine Owner registers.
2.  Owner creates a company profile.
3.  Owner lists a machine with images, specifications, rate, capacity,
    and availability.
4.  The listing is submitted for admin review.
5.  Admin approves or rejects the listing.
6.  Buyer searches and filters eligible machines.
7.  Buyer views machine details and availability.
8.  Buyer submits a booking request with the required work information.
9.  Owner accepts or rejects the request.
10. Payment takes place after owner acceptance.
11. Booking becomes confirmed after successful payment is recorded.
12. Work progresses and may be marked in progress.
13. Work is completed.
14. Eligible users can submit a review after completion.

**Critical order:** Owner acceptance happens before payment. Successful
payment is required before the booking is confirmed.

## 3. Technology Stack

### Initial frontend prototype

Use only:

-   HTML5
-   CSS3
-   Vanilla JavaScript
-   Bootstrap 5
-   Font Awesome

Prototype rules:

-   No backend, database, API, or real authentication during this stage.
-   Use sample data only to demonstrate the interface; treat it as demo
    data.
-   Use a common stylesheet: `css/style.css`.
-   Use a common JavaScript file: `js/script.js`.
-   Keep the structure suitable for later conversion into Laravel Blade
    templates.
-   Do not introduce React, Vue, Angular, jQuery, Tailwind, or other
    frameworks unless explicitly approved.

### Backend implementation

Approved project stack:

-   Laravel
-   PHP
-   MySQL
-   Eloquent ORM
-   Laravel Authentication
-   Middleware and authorization
-   Laravel Validation
-   Laravel Mail and Notifications
-   Blade
-   HTML, CSS, JavaScript, Bootstrap 5, Font Awesome

Optional/future technologies include payment gateways, queues, Redis,
cloud storage, WebSockets, maps, and mobile applications. Do not add
them to the MVP without approval.

## 4. Main Functional Areas

### Public website

The public site may include the following pages, subject to the approved
prototype sitemap:

-   Home
-   Explore Machines
-   Machine Details
-   How It Works
-   About
-   Contact
-   Login
-   Registration

The homepage must quickly explain IdleMach's marketplace purpose and
make both Machine Owner and Buyer journeys clear.

### Machine Owner area

-   Dashboard overview.
-   Company profile management.
-   Machine listing CRUD.
-   Machine image management.
-   Machine specifications.
-   Machine rates and capacity.
-   Availability/calendar management.
-   Incoming booking requests.
-   Accept/reject booking requests.
-   Booking and work progress management.
-   Relevant earnings/payment information.
-   Reviews.

### Buyer area

-   Dashboard overview.
-   Profile management.
-   Machine search and filters.
-   Machine details and availability.
-   Booking request form.
-   Work description and special requirements.
-   Drawing/document upload.
-   Booking list and status tracking.
-   Payment status.
-   Completion and review steps.
-   Notifications.

### Admin area

-   Dashboard overview.
-   User management.
-   Owner/company management.
-   Buyer management.
-   Machine listing management.
-   Machine approval/rejection.
-   Booking monitoring.
-   Payment monitoring.
-   Review management.
-   Block/unblock users.
-   Reports and platform activity.

Only implement pages and features within the agreed scope. Do not assume
every proposed dashboard page must be included in the first frontend
prototype.

## 5. Important Status Values

Preserve these exact internal values. Machine approval and operational condition are two separate database fields.

### Machine approval: `approval_status`

- `pending`
- `approved`
- `rejected`

### Machine operational condition: `operational_status`

- `active`
- `inactive`
- `maintenance`

Rules:
- New machine listings start with `approval_status = pending`.
- Only admins approve or reject listings.
- Only approved machines appear in the marketplace.
- Approved machines remain visible when inactive or under maintenance, but are unavailable for new booking requests.
- A machine can receive a new booking request only when it is both approved and active, and the requested capacity/time is available.
- Approval does not automatically change operational status. Who may change operational status and the allowed transitions remain to be decided.
- Never combine these two fields or treat their values as interchangeable.

### Availability statuses

- `available`
- `booked`
- `maintenance`
- `unavailable`

### Booking statuses

- `pending`
- `accepted`
- `rejected`
- `payment_pending`
- `confirmed`
- `in_progress`
- `completed`
- `cancelled`

### Payment statuses

- `pending`
- `successful`
- `failed`
- `refunded`

MVP payments are simulated/demo records only; no real money is charged. A booking is confirmed only after a successful demo payment record is saved.

### User statuses

- `active`
- `blocked`

Display clear user-friendly labels in the UI, but preserve the defined internal values.

## 6. Key Business Rules

1. Only machines with `approval_status = approved` appear in the marketplace, including inactive and maintenance listings.
2. Only machines with `approval_status = approved` AND `operational_status = active` can receive new booking requests.
3. Buyers cannot request unavailable capacity; check availability and capacity on the server.
4. Prevent overlapping and double bookings.
5. Owner acceptance must happen before payment.
6. The MVP payment flow is a clearly labelled demo/simulation. It must not charge real money or imply that real funds were received.
7. A booking is confirmed only after a successful demo payment record is saved; pending or failed demo payments do not confirm bookings.
8. Rejected bookings must not proceed to payment or work.
9. Only completed bookings are eligible for a review.
10. Only the buyer associated with a completed booking may review the machine owner; owners cannot review buyers.
11. Allow at most one review per booking and enforce it with a unique constraint on `reviews.booking_id`.
12. Each user owns exactly one company; each company belongs to one user. Enforce this with a unique constraint on `companies.user_id`. A company may have many machines.
13. Users can access only records they are authorized to view or change.
14. Admin can monitor platform records according to admin permissions.
15. Owners can manage only their own machines and related records.
16. Buyers can access only their own private booking records.
17. Keep booking, payment, and availability data consistent.

Capacity calculation:

**Available Capacity = Total Capacity - Booked Capacity**

The capacity unit and detailed availability scheduling rules must be explicitly defined. Do not assume them.

## 7. Booking Request Information

The booking request may include:

-   Machine
-   Date and time
-   Requested hours
-   Work description
-   Material
-   Quantity
-   Special requirements
-   Drawing or document upload

Validate all submitted information on the server during backend
implementation. The exact required fields, supported file types, and
file-size limits must follow the approved requirements.

## 8. Planned Database Entities

The planned core tables/entities are:

- `users`
- `companies`
- `machines`
- `machine_images`
- `machine_availabilities`
- `bookings`
- `booking_documents`
- `payments`
- `reviews`
- `notifications`

Approved relationships and constraints:

- User has one Company; enforce one-to-one ownership with a unique constraint on `companies.user_id`.
- Company belongs to User and has many Machines.
- Machine belongs to Company and has many Images, Availabilities, and Bookings.
- Booking belongs to one Machine and one Buyer (User).
- Booking has many Documents and associated Payment records. Whether multiple demo payment attempts are allowed remains an open decision; do not assume the final payment-attempt cardinality yet.
- Booking has at most one Review; enforce a unique constraint on `reviews.booking_id`.
- The Review reviewer must be the booking's Buyer, and the reviewee must be the owner of the booked Machine.

Treat the detailed Architecture document and approved database design as authoritative before implementing schema changes.

## 9. Route and View Organization

The proposed role route groups are:

-   `/admin/*`
-   `/owner/*`
-   `/buyer/*`

Protect routes using authentication and role/permission checks. Hiding a
link or button in the frontend is not security; enforce authorization on
the backend.

Suggested frontend prototype structure:

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

The exact page list may be adjusted when the prototype sitemap is
approved.

## 10. Design Direction

Design IdleMach as a professional industrial B2B marketplace:

-   Clean, structured, modern, and practical.
-   Clear hierarchy and readable manufacturing information.
-   Consistent colours, typography, spacing, components, and status
    styles.
-   Relevant manufacturing and machine imagery.
-   Responsive layouts for desktop, tablet, and mobile.
-   Simple language for both owners and buyers.

Avoid:

-   Generic AI-generated website patterns.
-   Excessive gradients, glow effects, decorative blobs, and animations.
-   Repetitive card grids and unnecessary rounded containers.
-   Fake testimonials, fake customer logos, fake reviews, and invented
    statistics.
-   Unsupported claims, certifications, or trust badges.
-   Unrelated stock imagery.
-   Presenting IdleMach as a machine manufacturer.

**Brand identity is not fully finalized:** exact logo, colour values,
font family, typography scale, and detailed design tokens require
confirmation. Refer to `Design.md` for the recommended design system and
open decisions.

## 11. Security and Quality Expectations

For Laravel implementation:

-   Use Laravel authentication and authorization features.
-   Protect routes with middleware.
-   Validate input on the server.
-   Use CSRF protection.
-   Use Laravel password hashing.
-   Use Eloquent ORM or parameterized queries.
-   Verify record ownership before read/update/delete operations.
-   Validate file uploads and store private documents safely.
-   Keep secrets and credentials out of source control.
-   Use database constraints and transactions where required.
-   Do not expose private data, stack traces, or credentials.

For all stages:

-   Inspect existing files before editing.
-   Reuse shared components and styles.
-   Avoid unnecessary rewrites or restructuring.
-   Test pages in an actual browser.
-   Check desktop, tablet, and mobile.
-   Test visible controls and forms.
-   Check browser console and application logs.
-   Report incomplete work and known limitations honestly.
-   Never claim a feature works unless it has been implemented and
    tested.

## 12. MVP Scope

Prioritize the core marketplace:

1.  Authentication and role-based access.
2.  Admin, Owner, and Buyer areas.
3.  Company profile management.
4.  Machine listing management.
5.  Machine approval.
6.  Marketplace search and machine details.
7.  Machine availability and capacity.
8.  Booking requests and owner decisions.
9.  Booking status management.
10. Payment record handling.
11. Work completion.
12. Reviews.
13. Basic notifications and admin monitoring as defined in the approved
    requirements.

Do not let future enhancements delay the core workflow.

## 13. Future/Optional Features

These are not automatically part of the first MVP:

-   Real payment gateway integration.
-   Email/SMS/WhatsApp integrations beyond the approved notification
    scope.
-   Live chat.
-   Advanced search and matching.
-   Favorites.
-   Advanced analytics.
-   Invoice generation.
-   Platform commission and payout automation.
-   Maps and location-based discovery.
-   AI matching or demand prediction.
-   Mobile application.
-   Redis, queues, WebSockets, and cloud storage integrations.

## 14. Open Decisions --- Never Guess

Ask for clarification or record an explicit assumption before implementing features that depend on these decisions:

1. Who may change a machine's `operational_status` and which transitions between `active`, `inactive`, and `maintenance` are allowed.
2. Capacity units and detailed availability scheduling rules.
3. Booking cancellation and rescheduling rules.
4. Refund policy and payment deadlines.
5. Demo payment failure/timeout handling and whether multiple demo payment attempts are allowed.
6. Future payment gateway, commission, tax, and owner payout rules.
7. Supported drawing/document file formats and upload size limits.
8. Review editing/removal and dispute rules.
9. Notification channels and delivery expectations.
10. Machine verification requirements and badges.
11. Hosting, deployment, backup, and data-retention policies.
12. Final brand identity and exact design tokens.
13. Final public sitemap and any remaining dashboard/profile page scope.

Do not reopen decisions that are already approved in the PRD and Rules. In particular, the separate machine status fields, approved-machine marketplace visibility, one-company-per-user relationship, demo-only MVP payments, and buyer-only reviews of owners are settled decisions.

## 15. Project Document References

Use these project documents together:

  -----------------------------------------------------------------------
  Document                            Purpose
  ----------------------------------- -----------------------------------
  `prd.md`                            Product requirements, scope,
                                      actors, user journeys, and business
                                      needs

  `architecture.md`                   Application structure, layers,
                                      modules, data model, routes, and
                                      implementation approach

  `Rules.md`                          Mandatory project, coding,
                                      security, workflow, and scope rules

  `Design.md`                         Visual direction, UI components,
                                      page layouts, responsive design,
                                      and design checklist

  `task.md`                           Phased development checklist,
                                      milestones, blockers, and
                                      Definition of Done

  `CapacityShare.md`                  Original project notes and
                                      supporting source material
  -----------------------------------------------------------------------

If a detailed document is unavailable in the current workspace, ask the
user to provide it rather than pretending to have read it.

## 16. Instructions for Future AI Assistants

Before starting any IdleMach task:

1.  Read this `memory.md`.
2.  Read the relevant detailed project document(s).
3.  Inspect the existing project files and current implementation before
    proposing edits.
4.  Identify whether the task belongs to the frontend prototype or
    Laravel implementation stage.
5.  Follow the documented technology stack and project rules.
6.  Preserve the marketplace business model and role terminology.
7.  Do not invent requirements, data, machine specifications, prices,
    testimonials, or policies.
8.  If a decision is missing, ask one clear question or document the
    open decision.
9.  Make focused changes and preserve existing working features.
10. Test the actual result before saying the task is complete.
11. When finishing, report files changed, what works, what was tested,
    and what remains.

### Communication style

-   Explain technical work in simple, direct English.
-   Give practical, step-by-step instructions when needed.
-   Provide complete code when requested, with correct file paths.
-   Explain where code belongs and what it changes.
-   Be honest about uncertainty, limitations, and untested behaviour.
-   Avoid unnecessary complexity and overengineering.

------------------------------------------------------------------------

## One-Sentence Project Memory

**IdleMach is a prototype-first Laravel manufacturing-capacity marketplace: approved machines are discoverable, only approved + active machines are bookable, demo payment success confirms an owner-accepted booking, and only the buyer may review the owner after completion.**
