# IdleMach --- Product Requirements Document (PRD)

**Document name:** `prd.md`\
**Product name:** IdleMach\
**Previous working name:** CapacityShare\
**Tagline:** Turn Idle Capacity Into Opportunity.\
**Document basis:** The uploaded `CapacityShare.md` (82 numbered
sections plus project overview; 83 sections in total).\
**Product type:** Web-based manufacturing capacity marketplace\
**Initial implementation direction:** Frontend prototype first; Laravel 13 application afterwards.

**Approved backend framework:** Laravel 13.

**Backend database:** MySQL.

**Presentation layer:** Laravel Blade with HTML, CSS, JavaScript, Bootstrap, and Font Awesome.

The Laravel application will integrate the accepted frontend without an unapproved redesign or removal of existing approved content.

------------------------------------------------------------------------

## 1. Document purpose

This Product Requirements Document (PRD) describes the purpose, users,
features, workflows, business rules, data requirements, security
expectations, technical direction, development phases, and success
criteria for IdleMach.

It consolidates the supplied project documentation into a
product-focused specification. The supplied document is the primary
source for the requirements below. Where a detail is not defined in that
document, it is marked as **To be decided** rather than invented.

## 2. Product overview

IdleMach is a web-based marketplace that connects:

1.  **Machine Owners** who have unused machine capacity.
2.  **Buyers** who need manufacturing work but may not own the required
    machine.
3.  **Admins** who manage and monitor the platform.

Machine owners can list machines and their available working hours.
Buyers can discover machines, view details, check availability, request
bookings, make payments, and complete manufacturing work. Admins oversee
users, machine approvals, bookings, payments, reviews, and platform
activity.

### 2.1 Core value proposition

Many small and medium manufacturing businesses have machines that remain
unused for some hours or days. For example:

-   Total machine capacity: 10 hours per day
-   Used capacity: 6 hours per day
-   Idle capacity: 4 hours per day

Those four unused hours represent a possible business opportunity. At
the same time, another business may need access to that type of machine
but may not own one.

IdleMach connects available machine capacity with businesses that need
it.

### 2.2 Product vision

Help businesses turn unused machine capacity into productive work while
helping other businesses find manufacturing capacity when they need it.

### 2.3 One-line product definition

IdleMach is a Laravel-based manufacturing capacity marketplace that
connects businesses having idle machine capacity with businesses looking
for available manufacturing machines and working hours.

## 3. Problem statement

### 3.1 Current problem without IdleMach

A machine owner may have unused machine time. That unused capacity can
become a lost business opportunity.

**Owner → Idle machine → Unused capacity → Lost opportunity**

### 3.2 Proposed solution with IdleMach

The owner lists idle capacity. A buyer discovers the machine, requests a
booking, and proceeds through acceptance, payment, manufacturing work,
completion, and review.

**Owner → List idle capacity → Buyer finds machine → Booking → Work →
Income**

### 3.3 Problems the product addresses

-   Machine owners need a way to make unused machine capacity available
    to other businesses.
-   Buyers need to find suitable manufacturing machines and available
    working hours without owning those machines.
-   Both sides need a clear process for machine discovery, availability,
    booking requests, acceptance or rejection, payment, work completion,
    and reviews.
-   The platform needs administrative controls to review machine
    listings and monitor activity.

## 4. Goals and objectives

### 4.1 Product goals

-   Connect machine owners and buyers through a manufacturing capacity
    marketplace.
-   Let owners publish machine details, rates, and available capacity.
-   Let buyers search and filter approved machines.
-   Support booking requests and owner acceptance or rejection.
-   Record payment status and booking progress.
-   Prevent conflicting bookings for the same machine and time.
-   Support work completion and post-completion reviews.
-   Give admins tools to monitor users, machines, bookings, payments,
    reviews, and reports.

### 4.2 Initial delivery goal

The first immediate delivery is a complete frontend prototype that can
be run locally and reviewed visually before backend integration. The
later application implementation will use Laravel, PHP, MySQL, and
Blade.

### 4.3 Out of scope for the initial MVP

The source document identifies the following as future or optional
features, not requirements for the first core release:

-   Advanced AI or AI-based machine matching
-   Demand prediction
-   Mobile application
-   Live chat
-   Maps and location-map features
-   WhatsApp notifications
-   Advanced analytics
-   Automatic commission and payment settlement
-   Complex payment gateway integration
-   WebSockets and real-time features
-   Redis and advanced queue infrastructure

These may be considered after the core marketplace flow is stable.

## 5. Users and roles

IdleMach has three main roles. Access must be separated by role.

### 5.1 Admin

Admin manages and monitors the platform.

Admin capabilities:

-   View and manage users.
-   Manage machine owners.
-   Manage buyers.
-   Approve or reject machine listings.
-   Manage or monitor bookings.
-   Monitor payments.
-   Manage reviews.
-   Block and unblock users.
-   View reports.
-   Monitor platform activity.

The admin primarily monitors the system rather than manually controlling
every booking.

### 5.2 Machine Owner

A machine owner is a person or business that owns manufacturing machines
and has capacity available for other businesses.

Example from the source:

-   Company: Patel Engineering
-   Machine: CNC Turning Machine
-   Location: Rajkot, Gujarat
-   Hourly rate: ₹800
-   Available capacity: 4 hours per day

Owner capabilities:

-   Register and log in.
-   Create and manage a company profile.
-   Add machines.
-   Upload multiple machine images.
-   Add machine specifications.
-   Set hourly prices.
-   Set available capacity.
-   Manage machine availability.
-   View booking requests.
-   Accept or reject booking requests.
-   Manage bookings.
-   Mark work as completed.
-   View earnings.
-   Receive reviews.

### 5.3 Buyer

A buyer is a person or business that needs manufacturing capacity.

Buyer capabilities:

-   Register and log in.
-   Create and manage a profile.
-   Search and filter machines.
-   View machine details.
-   Check machine availability.
-   Send booking requests.
-   Upload work documents.
-   Track bookings.
-   Make payments.
-   Cancel bookings where cancellation is allowed.
-   Mark work as completed.
-   Give reviews.

### 5.4 Role access boundaries

-   Admin can access administrative modules.
-   Owner cannot access admin user management.
-   Buyer cannot access owner machine management.
-   Users must only access their own bookings and permitted records.
-   Owners must only manage machines belonging to their own company.

## 6. Product scope and modules

The application is organized into the following modules:

1.  Public website and machine marketplace
2.  Authentication and registration
3.  Role-based access control
4.  User profile and company profile
5.  Owner dashboard
6.  Machine listing and management
7.  Machine images and specifications
8.  Machine approval and administration
9.  Marketplace search and filters
10. Machine detail page
11. Capacity and availability management
12. Availability calendar
13. Booking request and management
14. Booking documents
15. Payment records and payment status
16. Manufacturing work progress and completion
17. Reviews and ratings
18. Notifications
19. Admin dashboard and user management
20. Admin booking and payment monitoring
21. Reports and analytics
22. Security, validation, and ownership checks

## 7. Core end-to-end business workflow

The main business flow is:

1.  Owner registers.
2.  Owner creates a company profile.
3.  Owner adds a machine and its information.
4.  Owner defines its hourly rate and available capacity.
5.  Machine is submitted for admin review.
6.  Admin approves or rejects the machine.
7.  A machine with `approval_status = approved` is shown in the marketplace. It can receive booking requests only when `operational_status = active`.
8.  Buyer searches for a machine.
9.  Buyer opens the machine details and checks availability.
10. Buyer sends a booking request with work requirements.
11. Owner reviews the request and accepts or rejects it.
12. If accepted, the buyer proceeds to payment.
13. Successful payment confirms the booking.
14. Manufacturing work takes place.
15. Owner marks work as completed.
16. Buyer can submit a review and rating.

The heart of IdleMach is:

**LIST → DISCOVER → REQUEST → ACCEPT → PAY → BOOK → WORK → COMPLETE →
REVIEW**

## 8. Authentication and registration requirements

### 8.1 Authentication flow

The application starts with registration or login.

**Register → Login → Identify user role → Redirect to role dashboard**

After successful login:

-   Admin → Admin Dashboard
-   Owner → Owner Dashboard
-   Buyer → Buyer Dashboard

### 8.2 Registration fields

The source document specifies these registration fields:

-   Name
-   Email
-   Phone
-   Password
-   Confirm password
-   Company name
-   City
-   Address
-   Role

Optional future fields:

-   GST number
-   Business registration number
-   Company logo
-   Verification documents

### 8.3 Login fields

-   Email
-   Password

### 8.4 Role-based authorization

Protect role-specific application areas with middleware and grouped
routes.

Route areas:

-   `/admin/*`
-   `/owner/*`
-   `/buyer/*`

Only the appropriate role may access its corresponding area.
Unauthenticated users must be redirected to login. Unauthorized role
access must be rejected.

The source includes a simple role middleware example that checks
authentication and compares the authenticated user's role with the
required role. The exact middleware registration method must match the
Laravel version used by the project.

## 9. Public website and marketplace requirements

### 9.1 Marketplace purpose

The marketplace lets buyers discover all machine listings with `approval_status = approved`. A listing remains visible when its operational status is `inactive` or `maintenance`, but it is not bookable in those states.

### 9.2 Machine listing information

A marketplace listing should present, where available:

-   Machine name
-   Owner or company
-   Location
-   Machine type
-   Hourly rate
-   Available capacity
-   A relevant machine image
-   Link to view machine details

Example listing from the source:

-   Haas CNC Turning Machine
-   Patel Engineering
-   Rajkot
-   ₹800 per hour
-   Available capacity: 4 hours per day
-   View Details action

### 9.3 Search

Buyers can search by:

-   Machine name
-   Machine type
-   Location
-   Company

Example search term: `CNC`.

Possible machine type results listed in the source:

-   CNC Turning
-   CNC Milling
-   CNC Lathe
-   VMC

### 9.4 Filters

Possible filters:

-   Machine type
-   Location
-   Price range
-   Available date
-   Available hours
-   Material
-   Process

The source recommends adding filters gradually.

### 9.5 Machine details page

The machine details page should contain:

-   Machine images
-   Machine name
-   Owner or company
-   Location
-   Machine type
-   Description
-   Specifications
-   Hourly rate
-   Available capacity
-   Availability
-   Reviews
-   Request Booking action

Only machines with `approval_status = approved` are displayed in the marketplace. A machine is eligible to receive a booking request only when `approval_status = approved` and `operational_status = active`.

## 10. Owner requirements

### 10.1 Owner dashboard

The owner dashboard should show:

-   Total machines
-   Available capacity
-   Pending requests
-   Active bookings
-   Completed bookings
-   Total earnings

The source gives this illustrative dashboard data:

-   Machines: 5
-   Available hours: 120
-   Pending requests: 3
-   Active bookings: 7
-   Completed bookings: 25
-   Total earnings: ₹45,000

These are example values only, not actual platform targets or claims.

### 10.2 Company profile

Owners can create a company profile. Proposed company fields in the
source:

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

Each user can own exactly one company, and each company belongs to exactly one user. Enforce this one-to-one relationship with a unique constraint on `companies.user_id`. A company can have multiple machines.

### 10.3 Add and manage machines

Owner machine form fields:

-   Machine name
-   Machine type
-   Brand
-   Model
-   Description
-   Location
-   Hourly rate
-   Machine specifications
-   Machine images

Example:

-   Machine name: Haas CNC Turning Machine
-   Machine type: CNC Turning
-   Brand: Haas
-   Model: ST-20
-   Location: Rajkot
-   Hourly rate: ₹800/hour

Owners can create, view, edit, and delete their machine listings,
subject to the platform's status and business rules.

### 10.4 Machine status

Machine approval and operational condition are separate concepts and must be stored in separate fields.

**Approval field: `approval_status`**

-   `pending`
-   `approved`
-   `rejected`

**Operational field: `operational_status`**

-   `active`
-   `inactive`
-   `maintenance`

Approval is controlled by the admin. Operational status describes whether the approved machine is currently available to accept new booking requests.

Approval flow:

**Owner creates machine → `approval_status = pending` → Admin reviews → `approved` or `rejected`**

Visibility and booking eligibility:

-   Only machines with `approval_status = approved` are visible in the public marketplace.
-   Approved machines remain visible when their `operational_status` is `inactive` or `maintenance`, but must be clearly shown as unavailable for booking.
-   A machine can receive a booking request only when `approval_status = approved` and `operational_status = active`.
-   Pending and rejected machines are not visible and cannot receive booking requests.

Do not combine these fields into one status column or treat approval and operational status as interchangeable.

### 10.5 Machine images

A machine can have multiple images. Images must be stored separately
from the main machine record.

Example:

-   Machine
    -   Image 1
    -   Image 2
    -   Image 3
    -   Image 4

### 10.6 Machine specifications

Specifications can differ by machine type. Examples listed in the
source:

-   Maximum diameter
-   Maximum length
-   Accuracy
-   Supported material
-   Power
-   RPM
-   Work area

Example CNC specification:

-   Machine type: CNC
-   Maximum diameter: 250 mm
-   Maximum length: 500 mm
-   Accuracy: ±0.01 mm
-   Material: Steel, Aluminium

These are example values only and must not be presented as a company's
real specifications unless supplied by that company.

### 10.7 Capacity management

Capacity is a central IdleMach feature. The owner does not only list a
machine; the owner lists its available capacity.

Example:

-   Machine capacity: 10 hours per day
-   Already used: 6 hours
-   Available: 4 hours

Basic calculation:

**Available Capacity = Total Capacity − Booked Capacity**

The application must make capacity understandable to owners and buyers.

### 10.8 Availability management

Owners can define machine availability by day and time.

Example schedule:

-   Monday: 10:00 AM--6:00 PM
-   Tuesday: 10:00 AM--6:00 PM
-   Wednesday: 10:00 AM--6:00 PM

Availability states listed in the source:

-   Available
-   Booked
-   Maintenance
-   Unavailable

### 10.9 Availability calendar

Owners should have a calendar showing machine availability.

The source gives an illustrative September 2026 calendar:

-   21: Available
-   22: Available
-   23: Maintenance
-   24: Available
-   25: Booked
-   26: Available
-   27: Available

The calendar must help prevent double booking.

## 11. Buyer requirements

### 11.1 Buyer dashboard and profile

Buyers can register, log in, create a profile, and access their booking
and payment information. The source does not specify exact buyer
dashboard metrics or a complete buyer profile field list; these are **To
be decided** during detailed UI planning.

### 11.2 Search and discovery

Buyers can search and filter marketplace machines using the criteria in
Section 9.

### 11.3 Machine details and availability

Buyers can inspect machine images, owner/company information, location,
machine type, description, specifications, hourly rate, available
capacity, availability, and reviews.

### 11.4 Booking request form

The booking form fields specified in the source are:

-   Required date
-   Start time
-   End time
-   Required hours
-   Work description
-   Material
-   Quantity
-   Special requirements
-   Drawing/document upload

### 11.5 Booking example and amount calculation

Example from the source:

-   Machine: CNC Turning Machine
-   Date: 25 September 2026
-   Required hours: 10
-   Rate: ₹800/hour

Calculation:

**10 × ₹800 = ₹8,000**

The amount shown should be based on the applicable hourly rate and
requested hours. Any taxes, fees, deposits, discounts, or commission are
not specified in the source and remain **To be decided**.

### 11.6 Booking tracking and cancellation

Buyers can track booking progress and cancel bookings where allowed. The
source does not define the complete cancellation policy, refund rules,
or cancellation time limits. These must be decided before production
payment and cancellation handling.

### 11.7 Work completion and review

The owner marks the work as completed, after which the buyer may submit a review of the machine owner. Only the buyer can review the owner; owners cannot review buyers. Reviews are available only for completed bookings. The exact interaction between owner marking completion and buyer confirmation is **To be decided**.

## 12. Booking requirements

### 12.1 Booking request

A buyer opens a machine and selects **Request Booking**. The buyer
submits the required date, start and end time, required hours, work
description, material, quantity, special requirements, and any relevant
drawing or document.

### 12.2 Owner booking request view

The owner receives a booking request showing information such as:

-   Buyer name
-   Machine
-   Date
-   Required hours
-   Expected amount

Example from the source:

-   Buyer: ABC Auto Parts
-   Machine: CNC Turning Machine
-   Date: 25 September
-   Required hours: 10
-   Expected amount: ₹8,000

Owner actions:

-   Accept
-   Reject
-   View Details

### 12.3 Booking statuses

Statuses specified in the source:

-   `pending`
-   `accepted`
-   `rejected`
-   `payment_pending`
-   `confirmed`
-   `in_progress`
-   `completed`
-   `cancelled`

Main flow:

**Pending → Accepted → Payment Pending → Confirmed → In Progress →
Completed**

Rejection flow:

**Pending → Rejected**

Cancellation flow in the source:

**Pending / Confirmed → Cancelled**

The source does not define every allowed status transition, who can
cancel at each stage, or the handling of failed/expired payments. These
details must be specified before implementation.

### 12.4 Accept booking

When the owner accepts a request:

**Pending → Accepted → Payment Pending**

The buyer receives a notification.

### 12.5 Reject booking

When the owner rejects a request:

**Pending → Rejected**

The owner can provide a reason. Example: "Machine is already required
for another order."

### 12.6 Booking confirmation

After successful payment, the booking becomes confirmed.

Illustrative confirmation details from the source:

-   Booking ID: CS-10025
-   Machine: Haas CNC Turning Machine
-   Owner: Patel Engineering
-   Date: 25 September 2026
-   Hours: 10
-   Amount: ₹8,000
-   Status: Confirmed

The `CS-` booking-number example is retained from the source even though
the product name is IdleMach. The final booking-number prefix should be
confirmed during implementation.

### 12.7 Manufacturing work and completion

Once the booking date arrives:

**Confirmed → In Progress → Manufacturing Work → Completed**

The owner performs the requested work and can mark the booking as
completed.

### 12.8 Double-booking prevention

The system must prevent overlapping bookings for the same machine.

Example:

-   Machine availability: 10:00 AM--6:00 PM
-   Buyer A books: 10:00 AM--2:00 PM
-   Remaining time: 2:00 PM--6:00 PM
-   Buyer B requests: 12:00 PM--4:00 PM

Buyer B's request must not be allowed to overlap with Buyer A's reserved
time.

The source provides this overlap concept:

A conflict exists when an existing booking starts before the requested
end time and ends after the requested start time, for the same machine
and date. The example checks booking statuses including `accepted`,
`payment_pending`, `confirmed`, and `in_progress`.

The exact implementation must also handle date ranges, transaction
safety, concurrent requests, time zones, and the final set of statuses
that reserve capacity. These details are not fully defined in the source
and must be finalized during backend design.

## 13. Payment requirements

### 13.1 Payment flow

After the owner accepts a booking:

**Booking Amount → Payment → Payment Successful → Booking Confirmed**

The MVP must use demo payment records only. The demo flow records a simulated payment outcome and must clearly identify it as a demo; it must not charge real money or imply that real funds were received. Real payment gateway integration is deferred to a later phase.

### 13.2 Payment example

-   Machine rate: ₹800/hour
-   Hours: 10
-   Total: ₹8,000

### 13.3 Payment record fields

Each payment should store:

-   Booking ID
-   Buyer ID
-   Amount
-   Payment method
-   Transaction ID
-   Payment status
-   Paid at
-   Created at
-   Updated at

### 13.4 Payment statuses

-   `pending`
-   `successful`
-   `failed`
-   `refunded`

### 13.5 Payment gateway direction

Real payment gateway integration is out of scope for the MVP and may be considered in a later phase. Gateway selection, settlement, commission, refund handling, and payment-provider compliance remain future decisions.

## 14. Reviews and ratings

After a booking is completed, the buyer may submit one review of the machine owner. Owners cannot review buyers. A review must be linked to its completed booking, and duplicate reviews for the same booking must be prevented.

Example review dimensions:

-   Overall rating
-   Machine quality
-   Work quality
-   Timeliness
-   Comment

Example comment: "Good quality work and machine."

The source does not specify whether the review dimensions are separate
database fields or part of one overall rating form. The database
proposal includes a single `rating` and `comment` per review record.
Final review structure must be confirmed during implementation.

Only completed bookings should receive a final review.

## 15. Notifications

Important notification events listed in the source:

-   New booking request
-   Booking accepted
-   Booking rejected
-   Payment successful
-   Booking confirmed
-   Booking starting
-   Booking completed
-   New review

Initially, Laravel database notifications can be used. Email
notifications can be added later.

The source also lists Laravel Mail and Laravel Notifications in the
backend technology direction. WhatsApp notifications are a future
feature.

## 16. Admin requirements

### 16.1 Admin dashboard

The admin dashboard should show:

-   Total users
-   Machine owners
-   Buyers
-   Machines
-   Pending machines
-   Total bookings
-   Completed bookings
-   Total revenue

Illustrative figures in the source:

-   Total users: 250
-   Machine owners: 85
-   Buyers: 165
-   Machines: 180
-   Pending machines: 12
-   Total bookings: 430
-   Completed bookings: 390
-   Total revenue: ₹5.2L

These are sample dashboard figures only, not real platform data or
targets.

### 16.2 User management

Admin can:

-   View users
-   Search users
-   Filter users
-   View user details
-   Block users
-   Unblock users

User statuses:

-   `active`
-   `blocked`

### 16.3 Machine management

Admin can:

-   View machines
-   View pending machines
-   Approve machines
-   Reject machines
-   Deactivate machines
-   Delete machines

Approval flow:

**Owner → Create Machine → Pending → Admin Review → Approve →
Marketplace**

### 16.4 Booking management

Admin can view all bookings and filter or monitor these statuses:

-   Pending
-   Accepted
-   Confirmed
-   In Progress
-   Completed
-   Cancelled
-   Rejected

The source says admin should mainly monitor the system rather than
manually control every booking.

### 16.5 Payment and review management

Admin can monitor payments and manage reviews.

### 16.6 Reports

Future reports listed in the source:

-   Total users
-   Total machines
-   Total bookings
-   Total revenue
-   Popular machine types
-   Popular locations
-   Most active owners
-   Most requested machines

## 17. Data and database requirements

The source proposes the following initial database tables:

-   `users`
-   `companies`
-   `machines`
-   `machine_images`
-   `machine_availabilities`
-   `bookings`
-   `booking_documents`
-   `payments`
-   `reviews`
-   `notifications`

### 17.1 Users table

Proposed fields:

-   `id`
-   `name`
-   `email`
-   `phone`
-   `password`
-   `role`
-   `status`
-   `created_at`
-   `updated_at`

Roles:

-   `admin`
-   `owner`
-   `buyer`

User status:

-   `active`
-   `blocked`

### 17.2 Companies table

Proposed fields:

-   `id`
-   `user_id`
-   `company_name`
-   `gst_number`
-   `phone`
-   `email`
-   `address`
-   `city`
-   `state`
-   `pincode`
-   `description`
-   `logo`
-   `created_at`
-   `updated_at`

Relationship: User has exactly one Company; Company belongs to exactly one User. Enforce one company per user with a unique constraint on `companies.user_id`. One company can have multiple machines.

### 17.3 Machines table

Proposed fields:

-   `id`
-   `company_id`
-   `name`
-   `type`
-   `brand`
-   `model`
-   `description`
-   `location`
-   `hourly_rate`
-   `approval_status` (`pending`, `approved`, `rejected`)
-   `operational_status` (`active`, `inactive`, `maintenance`)
-   `created_at`
-   `updated_at`

Relationship: Machine belongs to Company. Company has many Machines.

### 17.4 Machine images table

Proposed fields:

-   `id`
-   `machine_id`
-   `image`
-   `created_at`
-   `updated_at`

Relationship: Machine has many Images.

### 17.5 Machine availability table

Proposed fields:

-   `id`
-   `machine_id`
-   `date`
-   `start_time`
-   `end_time`
-   `available_hours`
-   `status`
-   `created_at`
-   `updated_at`

Possible statuses:

-   `available`
-   `booked`
-   `maintenance`
-   `unavailable`

Relationship: Machine has many Availabilities.

### 17.6 Bookings table

Proposed fields:

-   `id`
-   `booking_number`
-   `machine_id`
-   `buyer_id`
-   `start_date`
-   `end_date`
-   `start_time`
-   `end_time`
-   `required_hours`
-   `hourly_rate`
-   `total_amount`
-   `status`
-   `work_description`
-   `rejection_reason`
-   `created_at`
-   `updated_at`

Relationships: Booking belongs to Machine and Buyer.

### 17.7 Booking documents table

Used for:

-   CAD files
-   Drawings
-   PDFs
-   Technical documents
-   Other work documents

Proposed fields:

-   `id`
-   `booking_id`
-   `file_name`
-   `file_path`
-   `file_type`
-   `created_at`
-   `updated_at`

Relationship: Booking has many Documents.

### 17.8 Payments table

Proposed fields:

-   `id`
-   `booking_id`
-   `buyer_id`
-   `amount`
-   `payment_method`
-   `transaction_id`
-   `status`
-   `paid_at`
-   `created_at`
-   `updated_at`

Relationship: Booking has one Payment in the example model. Whether
multiple payment attempts or partial payments are needed is **To be
decided**.

### 17.9 Reviews table

Proposed fields:

-   `id`
-   `booking_id`
-   `reviewer_id`
-   `reviewee_id`
-   `rating`
-   `comment`
-   `created_at`
-   `updated_at`

Relationship: Booking has one buyer-submitted Review. Enforce at most one review per booking with a unique constraint on `reviews.booking_id`. The reviewer must be the buyer for that booking, and the reviewee must be its machine owner.

### 17.10 Notifications

The source identifies Laravel database notifications and gives possible
data:

-   ID
-   User ID
-   Type
-   Message
-   Read at
-   Created at
-   Updated at

The actual Laravel notification table schema should follow the Laravel
version and notification implementation used.

## 18. Model relationships

The source proposes these Eloquent relationships.

### User

-   User has one Company.
-   User has many Bookings.
-   User has many Reviews.
-   User has many Notifications.

The example booking relationship uses `buyer_id` as the foreign key.

### Company

-   Company belongs to User.
-   Company has many Machines.

### Machine

-   Machine belongs to Company.
-   Machine has many Images.
-   Machine has many Availabilities.
-   Machine has many Bookings.

### Booking

-   Booking belongs to Machine.
-   Booking belongs to Buyer.
-   Booking has one Payment.
-   Booking has many Documents.
-   Booking has many Reviews.

## 19. Application architecture and code organization

### 19.1 Backend technology

The source specifies:

-   Laravel
-   PHP
-   MySQL
-   Eloquent ORM
-   Laravel Authentication
-   Laravel Middleware
-   Laravel Validation
-   Laravel Mail
-   Laravel Notifications

### 19.2 Frontend technology

The source specifies:

-   Blade
-   HTML
-   CSS
-   JavaScript
-   Bootstrap
-   Font Awesome

### 19.3 Optional future technologies

-   Razorpay / Stripe
-   Laravel Queue
-   Redis
-   Cloud Storage
-   WebSockets
-   Maps

Do not add every optional technology at the beginning. First make the
core application work with Laravel, MySQL, Blade, Bootstrap, and
JavaScript.

### 19.4 Controller structure

Controllers should be separated by role and module.

Proposed structure:

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

### 19.5 Route structure

Routes should be grouped by role using middleware, URL prefixes, and
route-name prefixes.

-   Admin prefix: `/admin`, route names: `admin.*`
-   Owner prefix: `/owner`, route names: `owner.*`
-   Buyer prefix: `/buyer`, route names: `buyer.*`

The source provides an example route for each role and a resource-route
example for CRUD modules.

### 19.6 Owner pages

-   `owner/dashboard`
-   `owner/profile`
-   `owner/machines`
-   `owner/machines/create`
-   `owner/machines/{id}`
-   `owner/machines/{id}/edit`
-   `owner/availability`
-   `owner/bookings`
-   `owner/bookings/{id}`
-   `owner/reviews`
-   `owner/payments`

### 19.7 Buyer pages

-   `buyer/dashboard`
-   `machines`
-   `machines/{id}`
-   `buyer/bookings`
-   `buyer/bookings/create`
-   `buyer/bookings/{id}`
-   `buyer/payments`
-   `buyer/reviews`

### 19.8 Admin pages

-   `admin/dashboard`
-   `admin/users`
-   `admin/users/{id}`
-   `admin/machines`
-   `admin/machines/pending`
-   `admin/bookings`
-   `admin/payments`
-   `admin/reviews`
-   `admin/reports`

### 19.9 Blade layouts and reusable components

Common layout:

-   `resources/views/layouts/app.blade.php`

The source lists reusable components:

-   Navbar
-   Sidebar
-   Footer
-   Alerts
-   Buttons
-   Forms
-   Cards
-   Modals
-   Pagination

Suggested layout files:

-   `app.blade.php`
-   `admin.blade.php`
-   `owner.blade.php`
-   `buyer.blade.php`

Suggested view folders:

``` text
resources/views/
  layouts/
  auth/
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
```

## 20. Validation requirements

Every important form must use server-side Laravel validation. Frontend
validation may improve usability but must not replace server-side
validation.

The source provides example machine validation for:

-   Required machine name
-   String type
-   Maximum lengths
-   Required location
-   Numeric hourly rate
-   Non-negative rate
-   Description

The source provides example booking validation for:

-   Existing machine ID
-   Required date
-   Required start time
-   Required end time
-   Required hours, numeric and at least 1
-   Required work description

For larger forms, use Laravel Form Request classes. Suggested examples:

-   `StoreMachineRequest.php`
-   `UpdateMachineRequest.php`
-   `StoreBookingRequest.php`

The exact rules for date/time ordering, availability, file size/type,
quantity, and business-specific machine specifications must be finalized
during implementation.

## 21. Core business rules

The following rules are explicitly stated in the source:

1.  Only approved machines can appear in the marketplace.
2.  Only active machines can receive booking requests.
3.  A buyer cannot book unavailable capacity.
4.  The system must prevent double booking.
5.  The owner must accept the booking before payment.
6.  A booking becomes confirmed after successful payment.
7.  Only completed bookings can receive a final review.
8.  Users can only access their own bookings.
9.  Admin can monitor all records.

These rules must be enforced on the server, not only in the user
interface.

## 22. Security requirements

The source requires:

-   Authentication
-   Authorization
-   Role middleware
-   CSRF protection
-   Server-side validation
-   Password hashing
-   File upload validation
-   Ownership checks
-   SQL injection protection through Eloquent or Query Builder
-   Secure session handling

### 22.1 File upload validation

The source provides an example validation rule for a required document
upload, allowing PDF, JPG, JPEG, and PNG files with a maximum size of 5
MB.

The allowed file types and size limits for machine images, CAD drawings,
and other work documents should be decided for each upload use case.

### 22.2 Ownership checks

A buyer should only access their own booking. The source provides an
example query that scopes a booking by both its ID and the authenticated
buyer ID.

For owner actions, verify that the machine belongs to the authenticated
owner's company before modifying it.

Never rely only on hiding buttons in the frontend to enforce access
restrictions.

## 23. Development phases

The source says the project should not be built all at once. Build it in
phases.

### Phase 1 --- Laravel setup

-   Create Laravel project.
-   Configure `.env`.
-   Configure MySQL.
-   Run migrations.
-   Install/configure authentication.
-   Create User model.
-   Create roles.
-   Create middleware.
-   Create basic layout.

### Phase 2 --- Basic UI

Create:

-   Navbar
-   Footer
-   Login
-   Register
-   Admin dashboard
-   Owner dashboard
-   Buyer dashboard

### Phase 3 --- Owner module

Create:

-   Owner profile
-   Company profile
-   Add machine
-   Edit machine
-   Delete machine
-   Machine images
-   Machine specifications

### Phase 4 --- Admin machine approval

Create:

-   Pending machines
-   Approve
-   Reject
-   Activate
-   Deactivate

### Phase 5 --- Marketplace

Create:

-   Machine listing
-   Machine details
-   Search
-   Filters

### Phase 6 --- Capacity

Create:

-   Machine availability
-   Available hours
-   Calendar
-   Booked hours
-   Maintenance

### Phase 7 --- Booking

Create:

-   Booking request
-   Owner accept
-   Owner reject
-   Booking status
-   Booking details
-   Double-booking check

### Phase 8 --- Payment

Create:

-   Payment page
-   Payment record
-   Transaction
-   Payment status

### Phase 9 --- Work completion

Create:

-   Start work
-   In progress
-   Mark completed

### Phase 10 --- Reviews

Create:

-   Rating
-   Comment
-   Owner review
-   Buyer review

### Phase 11 --- Notifications

Create:

-   Booking notifications
-   Payment notifications
-   Completion notifications
-   Review notifications

### Phase 12 --- Admin reports

Create:

-   Users report
-   Machines report
-   Bookings report
-   Revenue report
-   Popular machine report

## 24. MVP requirements

The first working version should focus on the core marketplace flow.

### Must-have MVP features

-   Authentication
-   Roles
-   Owner module
-   Buyer module
-   Admin module
-   Machine CRUD
-   Machine approval
-   Machine search
-   Machine details
-   Availability
-   Booking request
-   Accept/reject
-   Booking status
-   Payment record
-   Booking completion
-   Reviews

Do not start the MVP with advanced AI, chat, maps, mobile apps, or
complex payment settlement. First complete the core marketplace flow.

## 25. Future features

After the core system works, possible future features are:

-   Real payment gateway
-   Email notifications
-   WhatsApp notifications
-   Live chat
-   Advanced search
-   Machine verification
-   Company verification
-   Document verification
-   Favorites
-   Saved machines
-   Advanced analytics
-   Invoice generation
-   Automatic commission
-   Location map
-   AI-based machine matching
-   Demand prediction
-   Mobile application

These features should be added after the main booking flow is stable.

## 26. Example real-world user journey

The source gives this end-to-end example:

1.  Patel Engineering registers as an owner.
2.  Patel Engineering adds a Haas CNC Turning Machine.
3.  The machine has an example rate of ₹800/hour.
4.  Admin reviews and approves the machine.
5.  ABC Auto Parts searches for a CNC machine in Rajkot.
6.  ABC finds the Haas CNC Turning Machine at ₹800/hour.
7.  ABC requests 10 hours on 25 September.
8.  The owner accepts the request.
9.  ABC pays ₹8,000 (10 × ₹800).
10. Payment succeeds and the booking is confirmed.
11. Work moves from Confirmed to In Progress.
12. Work is completed.
13. ABC submits a five-star review.

All names, dates, machine details, and amounts in this journey are
illustrative examples from the source, not verified real-world data.

## 27. Success criteria and acceptance checks

The source lists these functional success criteria:

-   User can register.
-   User can log in.
-   Roles work correctly.
-   Owner can create a machine.
-   Admin can approve a machine.
-   Buyer can search for a machine.
-   Buyer can view a machine.
-   Buyer can check availability.
-   Buyer can request a booking.
-   Owner can accept or reject.
-   System prevents double booking.
-   Buyer can make/store payment.
-   Booking becomes confirmed.
-   Owner can mark work completed.
-   Buyer can submit a review.
-   Admin can monitor the platform.

### 27.1 Minimum testing plan

At minimum, test:

-   Registration
-   Login
-   Role access
-   Machine creation
-   Machine approval
-   Machine search
-   Availability
-   Booking request
-   Booking accept
-   Booking reject
-   Double booking
-   Payment
-   Booking completion
-   Review
-   Admin access

### 27.2 Example end-to-end test scenario

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

## 28. Frontend prototype requirements

The immediate project activity is to build and review the frontend
before Laravel integration.

### 28.1 Allowed frontend stack for the prototype

-   HTML5
-   CSS3
-   Vanilla JavaScript
-   Bootstrap 5
-   Font Awesome

The original application stack also includes Blade once the Laravel
stage begins.

### 28.2 Frontend prototype structure

Use a common, maintainable project structure. Keep one shared CSS file
and one shared JavaScript file for the frontend prototype.

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

Add owner, buyer, and admin dashboard preview pages only as required by
the approved frontend sitemap. Do not create unnecessary pages before
agreeing on the prototype scope.

### 28.3 Frontend behavior

-   Navigation links must work.
-   Buttons must perform their stated frontend action.
-   Forms must validate fields and show understandable feedback.
-   Search and filters should work as frontend demonstrations where
    included.
-   Booking interactions may be demonstrated in the prototype, but must
    not be represented as real saved bookings.
-   Payment screens must be clearly identified as demonstrations until a
    real payment backend is connected.
-   No frontend-only form should claim to send, store, or process real
    data without a connected service.

### 28.4 Visual and content direction

The supplied source defines the product, users, features, and technology
but does **not** specify a final color palette, font family, detailed
brand identity, or approved page-by-page visual design. Those design
decisions must be documented separately and should be made for the
IdleMach manufacturing marketplace rather than copied from a generic CNC
manufacturer website.

All website text should clearly explain the marketplace to machine
owners and buyers. Do not invent company credentials, certifications,
customer testimonials, machine specifications, or platform statistics.

## 29. Laravel folder structure

The source recommends the following broad Laravel organization:

``` text
IdleMach/
  app/
    Http/
      Controllers/
        Admin/
        Owner/
        Buyer/
      Middleware/
      Requests/
    Models/
    Notifications/
  database/
    factories/
    migrations/
    seeders/
  resources/
    views/
      layouts/
      auth/
      admin/
      owner/
      buyer/
      machines/
      components/
  routes/
    web.php
    auth.php
  public/
    css/
    js/
    images/
  storage/
```

The exact Laravel skeleton may include additional framework folders and
files. Do not remove Laravel's standard structure to match this
abbreviated outline.

## 30. Artisan commands referenced by the source

The source lists these useful commands:

``` bash
php artisan migrate
php artisan migrate:fresh --seed
php artisan make:model Machine -m
php artisan make:controller Owner/MachineController --resource
php artisan make:request StoreMachineRequest
php artisan make:middleware RoleMiddleware
php artisan make:notification BookingCreated
php artisan route:list
```

`migrate:fresh` drops existing tables before recreating them. Use it
only in a development environment when data loss is acceptable.

## 31. Seeder and factory plan

Factories listed in the source:

-   `UserFactory`
-   `CompanyFactory`
-   `MachineFactory`
-   `MachineAvailabilityFactory`
-   `BookingFactory`
-   `ReviewFactory`

Seeders listed in the source:

-   `DatabaseSeeder`
-   Role/User Seeder
-   Company Seeder
-   Machine Seeder
-   Availability Seeder
-   Booking Seeder

Use fake data for development only. The source gives an example admin
seeder identity of `Admin User` with `admin@example.com`; this is sample
data, not a production account or credential.

## 32. Items requiring a product decision

The source does not fully define the following. They should be resolved
before the relevant implementation begins:

1.  Final company/platform ownership details, public contact
    information, and brand assets.
2.  Exact machine categories and the full specification fields for each
    category.
3.  Whether `approved` automatically becomes `active`, or whether these
    are separate admin-controlled states.
4.  Exact rules for how much capacity is reserved at each booking
    status.
5.  Whether owner acceptance temporarily reserves capacity while payment
    is pending, and how long that reservation lasts.
6.  Payment timeout, failed-payment retry, refund, and cancellation
    behavior.
7.  Cancellation permissions, time limits, and refund policy.
8.  Whether one booking can contain multiple machines or only one
    machine.
9.  Whether bookings can span multiple dates and how overnight shifts
    are handled.
10. Whether the buyer, owner, or both must confirm work completion.
11. Whether reviews are one-way or two-way for every completed booking,
    and how duplicate reviews are prevented.
12. Whether a payment can have multiple attempts or partial payments.
13. Taxes, platform fees, commissions, deposits, and invoice
    requirements.
14. Exact upload limits and allowed formats for machine photos, CAD
    files, and technical documents.
15. Buyer dashboard metrics and detailed buyer profile fields.
16. Booking number format (the source example uses `CS-10025`).
17. Whether location search is city-only or uses maps/geolocation.
18. Whether machine owner or company verification is required for the
    MVP.
19. The final public website sitemap and which role dashboards need
    prototype screens.
20. Production hosting, backups, privacy policy, terms, and
    data-retention requirements.

These are open decisions, not assumed requirements.

## 33. Product priorities

### Priority 1 --- Core marketplace

-   Authentication and roles
-   Owner/company profile
-   Machine CRUD
-   Machine approval
-   Machine marketplace
-   Search and filters
-   Machine details
-   Capacity and availability
-   Booking request
-   Accept/reject
-   Double-booking prevention
-   Payment record and confirmation
-   Work completion
-   Reviews

### Priority 2 --- Platform operations

-   Notifications
-   User administration
-   Booking monitoring
-   Payment monitoring
-   Admin reports
-   Factories and seeders
-   Expanded test coverage

### Priority 3 --- Future enhancements

-   Real payment gateway
-   Email and WhatsApp notifications
-   Live chat
-   Verification workflows
-   Favorites and saved machines
-   Advanced analytics
-   Invoices and commission automation
-   Maps
-   AI matching and demand prediction
-   Mobile app

## 34. Final product principle

Do not make the project complicated from the beginning.

First make this flow work correctly:

**Owner → Add Machine → Set Availability → Admin Approves → Buyer Finds
Machine → Buyer Requests Booking → Owner Accepts → Payment → Booking
Confirmed → Work Completed → Review**

Once this complete flow works correctly, add advanced features one by
one.

------------------------------------------------------------------------

## Appendix A --- Source coverage checklist

This PRD incorporates the material from the supplied `CapacityShare.md`
across its full 83-section structure:

-   Project overview, name, tagline, problem statement, and core idea
-   Main roles and role capabilities
-   Technology stack and optional technologies
-   Complete application and authentication flows
-   Registration, login, and role middleware
-   Owner dashboard and machine creation
-   Machine statuses, images, and specifications
-   Marketplace, search, filters, and details
-   Capacity, availability, and calendar
-   Buyer booking form and amount example
-   Booking statuses, acceptance, rejection, confirmation, work, and
    completion
-   Payment flow, payment fields, and payment statuses
-   Reviews and notifications
-   Admin dashboard, user management, machine management, bookings, and
    reports
-   Database tables, fields, and relationships
-   Eloquent relationship examples and controller structure
-   Route groups, owner/buyer/admin pages, and resource routes
-   Validation and Form Request guidance
-   Business rules and double-booking example
-   Migration examples and Laravel folder structure
-   Blade layouts and view structure
-   All 12 development phases
-   MVP scope and future features
-   End-to-end example, success criteria, and security requirements
-   Ownership checks, factories, seeders, Artisan commands, and testing
    plan
-   Final architecture, project definition, development priorities, and
    final project vision

**Source fidelity note:** This PRD reorganizes and consolidates the
supplied project document. Example people, companies, dates, amounts,
machine specifications, dashboard figures, and code fragments are
illustrative examples from that source. Open questions are explicitly
identified rather than silently filled in. The PRD does not claim that
the source specified details it did not contain.
