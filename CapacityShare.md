# CapacityShare — IdleMach

## Historical Project Flow & Development Reference

> **Project name:** IdleMach  
> **Tagline:** Turn Idle Capacity Into Opportunity.

---

## Document Status and Authority

This document contains the original project concept, proposed workflows, example code, and early development ideas for IdleMach.

It is retained as a historical and supporting reference. Some original examples and decisions have been updated as the project has become more clearly defined.

**Follow this document hierarchy when information conflicts:**

1. Explicitly approved product decisions.
2. `prd.md` — current product requirements and business rules.
3. `Rules.md` — mandatory project, security, and development rules.
4. `architecture.md` — technical architecture.
5. `Design.md` — interface and interaction guidance.
6. `task.md` — development progress.
7. `memory.md` — concise AI/project context.
8. `CapacityShare.md` — historical project flow and examples.

Do not implement an old example from this document if it conflicts with a higher-priority document.

---

# 1. Project Overview

**IdleMach** is a web-based manufacturing-capacity marketplace connecting:

1. **Machine Owners** who have unused machine capacity.
2. **Buyers** who need manufacturing work but may not own the required machine.
3. **Admins** who manage and monitor the platform.

Machine owners can list their machines and provide information about their available capacity. Buyers can discover suitable machines, check availability, and request manufacturing capacity.

The platform supports the process from machine listing to booking, payment recording, work completion, and review.

### Core idea

```text
Machine Owner
      ↓
Lists Machine and Capacity
      ↓
IdleMach Marketplace
      ↓
Buyer Discovers Machine
      ↓
Buyer Sends Booking Request
      ↓
Owner Accepts or Rejects
      ↓
Demo Payment
      ↓
Booking Confirmed
      ↓
Manufacturing Work
      ↓
Work Completed
      ↓
Buyer Reviews Owner
```

---

# 2. Problem Statement

Many small and medium manufacturing businesses have machines that remain unused for some hours or days.

For example:

```text
Machine Capacity = 10 hours/day
Used Capacity    = 6 hours/day
Idle Capacity    = 4 hours/day
```

Those four unused hours represent a possible business opportunity.

At the same time, another company may need the same type of machine but may not own one.

IdleMach aims to connect these businesses.

### Without IdleMach

```text
Owner
  ↓
Idle Machine
  ↓
Unused Capacity
  ↓
Lost Opportunity
```

### With IdleMach

```text
Owner
  ↓
Lists Machine Capacity
  ↓
Buyer Finds Suitable Machine
  ↓
Booking Request
  ↓
Manufacturing Work
  ↓
Business Opportunity
```

---

# 3. Main User Roles

IdleMach has three main roles.

## 3.1 Admin

Admin manages and monitors the platform.

Possible responsibilities:

- Manage users.
- View machine owners and buyers.
- Review machine listings.
- Approve or reject machine listings.
- Monitor bookings.
- Monitor demo payment records.
- Monitor reviews.
- Block or unblock users.
- View reports.
- Monitor platform activity.

Administrative actions must follow the permissions defined in `prd.md` and `Rules.md`.

## 3.2 Machine Owner

A machine owner is a business or person who owns manufacturing machines.

Example:

```text
Company:
Patel Engineering

Machine:
CNC Turning Machine

Location:
Rajkot, Gujarat

Hourly Rate:
₹800

Available Capacity:
4 hours/day
```

Possible owner features:

- Register and log in.
- Create a company profile.
- Add machine listings.
- Upload machine images.
- Add machine specifications.
- Set hourly prices.
- Provide availability information.
- Manage machine operational status according to permitted rules.
- View booking requests.
- Accept or reject booking requests.
- Manage bookings.
- Update work progress.
- Mark work as completed where permitted.
- View booking and demo payment records.
- Receive buyer reviews.

**Company ownership rule:** One user can have only one company. A company can have multiple machines.

## 3.3 Buyer

A buyer is a business or person looking for manufacturing capacity.

Possible buyer features:

- Register and log in.
- Create a profile.
- Search machines.
- Filter machines.
- View machine details.
- Check availability.
- Send booking requests.
- Upload work documents.
- Track bookings.
- Complete the demo payment flow.
- Track work completion.
- Review the machine owner after a completed booking.

---

# 4. Technology Stack

## Backend

```text
Laravel
PHP
MySQL
Eloquent ORM
Laravel Authentication
Laravel Middleware
Laravel Validation
Laravel Mail
Laravel Notifications
```

## Frontend

```text
Blade
HTML
CSS
JavaScript
Bootstrap
Font Awesome
```

## Optional Future Technologies

```text
Real Payment Gateway
Laravel Queue
Redis
Cloud Storage
WebSockets
Maps
```

Do not add every technology at the beginning.

First build the core application using Laravel, MySQL, Blade, Bootstrap, and JavaScript.

Future technologies must be introduced only when they are needed and approved.

---

# 5. Complete Application Flow

```text
                    IdleMach
                         │
          ┌──────────────┼──────────────┐
          │              │              │
        ADMIN           OWNER          BUYER
          │              │              │
          │          Add Machine      Search
          │              │           Machine
          │       Set Availability       │
          │              │          View Details
          │              │               │
          │              └──────┬────────┘
          │                     │
          │              Booking Request
          │                     │
          │              Owner Reviews
          │                /          \
          │           Accept          Reject
          │              │
          │        Demo Payment
          │              │
          │       Booking Confirmed
          │              │
          │       Manufacturing Work
          │              │
          │         Work Completed
          │              │
          └──────── Buyer Review
```

---

# 6. Authentication Flow

The application starts with authentication.

```text
Register
   ↓
Login
   ↓
Identify User Role
   ↓
Redirect to Dashboard
```

Example:

```text
Admin  → Admin Dashboard
Owner  → Owner Dashboard
Buyer  → Buyer Dashboard
```

Authentication and role permissions must be enforced on the server, not only through frontend navigation.

---

# 7. Registration

Example registration information:

```text
Name
Email
Phone
Password
Confirm Password
Role
```

Company information should be managed through the company profile.

Optional future company fields may include:

```text
GST Number
Business Registration Number
Company Logo
Verification Documents
```

These optional fields should not automatically become MVP requirements.

**Important:** One user can own only one company. The database must enforce this with a unique constraint on `companies.user_id`.

---

# 8. Login

Login requires:

```text
Email
Password
```

After successful authentication, redirect the user according to their role.

Example:

```php
if ($user->role === 'admin') {
    return redirect()->route('admin.dashboard');
}

if ($user->role === 'owner') {
    return redirect()->route('owner.dashboard');
}

return redirect()->route('buyer.dashboard');
```

This is an illustrative example. The actual implementation must follow the selected Laravel version and authentication setup.

---

# 9. Role-Based Access Control

Different application areas should be protected using middleware and authorization checks.

Example route areas:

```text
/admin/*
/owner/*
/buyer/*
```

Expected access rules:

```text
Owner cannot access Admin User Management.

Buyer cannot access Owner Machine Management.

Admin can access permitted administrative modules.
```

Always verify ownership before allowing users to view or modify private records.

---

# 10. Example Role Middleware

An illustrative role middleware:

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        string $role
    ): Response {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->role !== $role) {
            abort(403);
        }

        return $next($request);
    }
}
```

Register and configure middleware according to the selected Laravel version.

---

# 11. Owner Dashboard

Possible dashboard information:

```text
Total Machines
Approved Machines
Pending Listings
Available Capacity
Pending Requests
Active Bookings
Completed Bookings
Demo Payment Records
```

Example:

```text
---------------------------------------
OWNER DASHBOARD
---------------------------------------

Total Machines          5

Approved Machines       3

Pending Listings        2

Available Hours       120

Pending Requests        3

Active Bookings         7

Completed Bookings     25
---------------------------------------
```

Dashboard figures must come from actual database records. Do not treat demo payment amounts as real earnings or received funds.

---

# 12. Add Machine

An owner can create a machine listing.

Possible fields:

```text
Machine Name
Machine Type
Brand
Model
Description
Location
Hourly Rate
Machine Specifications
Machine Images
```

Example:

```text
Machine Name:
Haas CNC Turning Machine

Machine Type:
CNC Turning

Brand:
Haas

Model:
ST-20

Location:
Rajkot

Hourly Rate:
₹800/hour
```

The machine listing must be submitted for administrative approval.

---

# 13. Machine Status

Machine approval and machine operational condition are two separate concepts.

They must be stored independently.

## Approval status

```text
pending
approved
rejected
```

This represents the admin's decision about the machine listing.

## Operational status

```text
active
inactive
maintenance
```

This represents whether the machine is currently available for new booking requests.

## Marketplace rules

| Approval status | Operational status | Marketplace visibility | New booking requests |
|---|---|---|---|
| pending | Any | Hidden | Not allowed |
| rejected | Any | Hidden | Not allowed |
| approved | active | Visible | Allowed if capacity is available |
| approved | inactive | Visible as unavailable | Not allowed |
| approved | maintenance | Visible as unavailable | Not allowed |

**Important rules:**

- Admin approval does not automatically activate a machine.
- Only approved machines appear in the marketplace.
- Approved inactive and maintenance machines remain visible.
- Only approved and active machines can receive booking requests.
- Capacity and availability checks are also required before accepting a request.

The exact permissions and allowed transitions for changing operational status must follow the approved product requirements. Do not assume that every role can change every status.

### Historical note

The original project flow used one combined status list and suggested that approval would directly lead to activation. That approach has been superseded by the separate approval and operational status fields above.

---

# 14. Machine Images

A machine can have multiple images.

```text
Machine
   |
   +-- Image 1
   +-- Image 2
   +-- Image 3
   +-- Image 4
```

Images should be stored separately from the main machine record.

Validate file types, sizes, and ownership on the server.

---

# 15. Machine Specifications

Machine specifications may differ by machine type.

Example:

```text
Max Diameter
Max Length
Accuracy
Material Supported
Power
RPM
Work Area
```

Example CNC machine:

```text
Machine Type: CNC
Max Diameter: 250mm
Max Length: 500mm
Accuracy: ±0.01mm
Material: Steel, Aluminium
```

The specification structure should support different machine types without forcing irrelevant fields on every machine.

---

# 16. Machine Marketplace

Buyers can browse machines that have been approved by the admin.

Example:

```text
--------------------------------
Haas CNC Turning Machine

Patel Engineering
Rajkot

₹800/hour

Available Capacity:
4 hours/day

[View Details]
--------------------------------
```

Approved machines remain visible even if their operational status is inactive or maintenance.

For unavailable machines, the interface should clearly show the reason or availability state and disable the booking action.

Pending and rejected machines must not appear in the public marketplace.

---

# 17. Search

Buyers can search by:

```text
Machine Name
Machine Type
Location
Company
```

Example:

```text
Search:
CNC
```

Possible results:

```text
CNC Turning
CNC Milling
CNC Lathe
VMC
```

Search results must follow the marketplace visibility rules.

---

# 18. Filters

Possible filters:

```text
Machine Type
Location
Price Range
Available Date
Available Hours
Material
Process
```

Add filters gradually and verify that they work with the actual availability and booking rules.

---

# 19. Machine Details Page

A machine details page may contain:

```text
Machine Images
Machine Name
Owner / Company
Location
Machine Type
Description
Specifications
Hourly Rate
Operational Status
Available Capacity
Availability
Reviews

[Request Booking]
```

The booking action must be available only when the machine is approved, active, and has sufficient available capacity for the requested time.

---

# 20. Capacity Management

Capacity management is one of the most important parts of IdleMach.

The owner does not only list a machine. The owner lists its available manufacturing capacity.

Example:

```text
Machine Capacity = 10 hours/day
Already Used     = 6 hours
Available        = 4 hours
```

Basic calculation:

```text
Available Capacity
=
Total Capacity - Reserved Capacity
```

The exact capacity unit, scheduling model, reservation timing, and release rules remain subject to the decisions recorded in `prd.md`.

Do not assume that a simple daily-hours calculation is enough for every machine.

---

# 21. Availability

Owners need a way to provide machine availability.

Illustrative example:

```text
Monday
10:00 AM - 6:00 PM

Tuesday
10:00 AM - 6:00 PM

Wednesday
10:00 AM - 6:00 PM
```

Possible calendar states:

```text
Available
Booked
Maintenance
Unavailable
```

These are availability/calendar concepts. They must not be confused with the machine's separate approval and operational status fields.

---

# 22. Calendar

An owner may use a calendar to view machine availability.

Example:

```text
September 2026

21  Available
22  Available
23  Maintenance
24  Available
25  Booked
26  Available
27  Available
```

The calendar should help prevent conflicting bookings.

The final reservation and release rules must follow the approved booking and capacity design.

---

# 23. Buyer Booking Flow

A buyer opens a machine and selects:

```text
Request Booking
```

Possible booking form fields:

```text
Required Date
Start Time
End Time
Required Hours
Work Description
Material
Quantity
Special Requirements
Upload Drawing/Document
```

Validate the requested time against the machine's availability and existing bookings.

---

# 24. Booking Example

Illustrative example:

```text
Machine:
CNC Turning Machine

Date:
25 September 2026

Required Hours:
10

Rate:
₹800/hour
```

Calculation:

```text
10 × ₹800
= ₹8,000
```

The buyer submits a booking request to the owner.

This example is only for explaining the booking calculation. Actual pricing and capacity calculations must follow the final product rules.

---

# 25. Booking Status

Possible booking statuses from the original workflow:

```text
pending
accepted
rejected
payment_pending
confirmed
in_progress
completed
cancelled
```

Illustrative main flow:

```text
Pending
   ↓
Accepted
   ↓
Payment Pending
   ↓
Confirmed
   ↓
In Progress
   ↓
Completed
```

Rejected flow:

```text
Pending
   ↓
Rejected
```

Cancelled flow:

```text
Eligible Booking
   ↓
Cancelled
```

The final allowed transitions, cancellation rules, and capacity reservation behavior must be defined by `prd.md` and the technical architecture.

Do not implement transitions solely because they appear in this historical example.

---

# 26. Owner Booking Request

The owner may receive a request such as:

```text
New Booking Request

Buyer:
ABC Auto Parts

Machine:
CNC Turning Machine

Date:
25 September

Required Hours:
10

Expected Amount:
₹8,000
```

Possible actions:

```text
[Accept]
[Reject]
[View Details]
```

The owner must be authorized to act on the requested machine.

---

# 27. Accept Booking

When an owner accepts an eligible booking request:

```text
Pending
   ↓
Accepted
   ↓
Payment Pending
```

The buyer should be notified.

The booking is not confirmed merely because the owner accepted it.

For the MVP, confirmation requires a successful demo payment record to be saved.

---

# 28. Reject Booking

If the owner rejects a request:

```text
Pending
   ↓
Rejected
```

The owner may provide a reason.

Example:

```text
Machine is already required for another order.
```

The final rejection rules and notification behavior should follow the product requirements.

---

# 29. Payment

## MVP payment approach

The first version uses a simulated/demo payment flow.

It does not charge real money.

The application must not claim that real funds have been received.

The approved MVP sequence is:

```text
Buyer Sends Booking Request
        ↓
Owner Accepts
        ↓
Demo Payment Process
        ↓
Successful Demo Payment Record Saved
        ↓
Booking Confirmed
```

A real gateway such as Razorpay or Stripe is outside the current MVP scope.

It may be considered as a future feature after the core marketplace flow works correctly.

---

# 30. Payment Records

A demo payment record may contain:

```text
Booking ID
Buyer ID
Amount
Payment Method
Demo Transaction Reference
Payment Status
Paid At
Created At
Updated At
```

Possible payment statuses:

```text
pending
successful
failed
```

These records represent simulated payment activity only.

**Important:** Do not treat a demo payment record as proof of a real financial transaction.

The database design must not assume that every booking has exactly one payment attempt. Multiple attempts, failure handling, and timeout behavior remain open decisions.

---

# 31. Booking Confirmation

A booking becomes confirmed only after the successful demo payment record has been saved.

Example:

```text
Booking ID:
IM-10025

Machine:
Haas CNC Turning Machine

Owner:
Patel Engineering

Date:
25 September 2026

Hours:
10

Amount:
₹8,000

Status:
Confirmed
```

This is an illustrative example. The final booking number format and database fields must follow the implementation design.

---

# 32. Manufacturing Work

After confirmation, the booking can move into the work process according to the allowed status transitions.

Illustrative flow:

```text
Confirmed
    ↓
In Progress
    ↓
Manufacturing Work
```

The owner performs the requested work.

The final rules for starting and confirming work completion must be defined in the product requirements.

---

# 33. Complete Booking

After the manufacturing work is completed, the booking can be marked completed by an authorized user according to the approved completion workflow.

Illustrative flow:

```text
In Progress
      ↓
Completed
```

Do not assume that the owner, buyer, or both can independently complete a booking until the completion-confirmation policy has been decided.

---

# 34. Review and Rating

The approved review direction is:

**Buyer reviews the machine owner after a completed booking.**

Rules:

- Only a buyer associated with the booking can submit its review.
- The booking must be completed.
- Only one review is allowed per booking.
- The owner cannot review the buyer.
- The reviewer and reviewee must be validated against the booking and its machine owner.
- The database must enforce a unique constraint on `reviews.booking_id`.

Example:

```text
Overall Rating:
★★★★★

Machine Quality:
★★★★★

Work Quality:
★★★★★

Timeliness:
★★★★☆

Comment:
Good quality work and machine.
```

This is an illustrative review interface. The final review fields should follow `prd.md`.

### Historical note

The original idea included two-way reviews. That has been superseded. The MVP supports buyer-to-owner reviews only.

---

# 35. Notifications

Possible notification events:

```text
New Booking Request
Booking Accepted
Booking Rejected
Demo Payment Successful
Booking Confirmed
Booking Starting
Booking Completed
New Review
```

Laravel database notifications may be used initially.

Additional channels, such as email or WhatsApp, should be considered separately and are not automatically MVP requirements.

---

# 36. Admin Dashboard

Possible admin dashboard information:

```text
Total Users
Machine Owners
Buyers
Total Machines
Pending Listings
Total Bookings
Completed Bookings
Demo Payment Records
```

Example:

```text
----------------------------------------
ADMIN DASHBOARD
----------------------------------------

Total Users             250

Machine Owners           85

Buyers                  165

Machines                180

Pending Machines          12

Total Bookings          430

Completed Bookings      390
----------------------------------------
```

Any revenue or financial reporting must clearly distinguish simulated payment data from actual financial transactions.

---

# 37. Admin User Management

Possible admin actions:

```text
View Users
Search Users
Filter Users
View User Details
Block User
Unblock User
```

Example user statuses:

```text
active
blocked
```

The final permission rules must follow `Rules.md`.

---

# 38. Admin Machine Management

Possible admin actions:

```text
View Machines
View Pending Machines
Approve Machine
Reject Machine
```

Approval flow:

```text
Owner
  ↓
Create Machine
  ↓
Pending
  ↓
Admin Review
  ↓
Approve or Reject
```

Machine approval and operational status are separate.

Do not treat approval as automatic activation.

Approved inactive or maintenance machines remain visible in the marketplace but cannot receive new booking requests.

Any additional admin controls for operational status must follow the approved permissions and transition rules.

---

# 39. Admin Booking Management

Admin may monitor booking records and their statuses:

```text
All Bookings
Pending
Accepted
Confirmed
In Progress
Completed
Cancelled
Rejected
```

Admin should primarily monitor the system rather than manually control every booking.

The final administrative permissions must be defined in the product and security documents.

---

# 40. Admin Reports

Possible future reports:

```text
Total Users
Total Machines
Total Bookings
Demo Payment Activity
Popular Machine Types
Popular Locations
Most Active Owners
Most Requested Machines
```

Reports involving actual revenue, commission, taxes, or payouts require a future real-payment design.

---

# 41. Database Design

The original proposed database structure included:

```text
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

This is a starting point, not a final migration specification.

Use `architecture.md` and `prd.md` for the current database design.

---

# 42. Users Table

Possible fields:

```text
id
name
email
phone
password
role
status
created_at
updated_at
```

Possible roles:

```text
admin
owner
buyer
```

Possible account statuses:

```text
active
blocked
```

Use the final schema and validation rules when implementing migrations.

---

# 43. Companies Table

Possible fields:

```text
id
user_id
company_name
gst_number
phone
email
address
city
state
pincode
description
logo
created_at
updated_at
```

Relationship:

```text
User
  ↓
One Company
```

Approved ownership rule:

```text
One User = One Company
One Company = Many Machines
```

The database must enforce the one-company-per-user rule using a unique constraint on `companies.user_id`.

---

# 44. Machines Table

Possible fields:

```text
id
company_id
name
type
brand
model
description
location
hourly_rate
approval_status
operational_status
created_at
updated_at
```

The machine must have two separate status fields.

Approval status:

```text
pending
approved
rejected
```

Operational status:

```text
active
inactive
maintenance
```

Do not create one combined status column containing all six values.

---

# 45. Machine Images Table

Possible fields:

```text
id
machine_id
image
created_at
updated_at
```

Relationship:

```text
Machine
   ↓
Many Images
```

---

# 46. Machine Availability Table

Possible fields to consider:

```text
id
machine_id
date
start_time
end_time
available_hours
status
created_at
updated_at
```

Possible calendar values:

```text
available
booked
maintenance
unavailable
```

These values describe calendar availability and must not replace the machine's operational status.

The final capacity and scheduling model is still subject to the open decisions in `prd.md`.

---

# 47. Bookings Table

Possible fields:

```text
id
booking_number
machine_id
buyer_id
start_date
end_date
start_time
end_time
required_hours
hourly_rate
total_amount
status
work_description
rejection_reason
created_at
updated_at
```

The final booking schema must support the approved booking workflow and capacity rules.

---

# 48. Booking Documents Table

Possible document purposes:

```text
CAD File
Drawing
PDF
Technical Document
Other Work Documents
```

Possible fields:

```text
id
booking_id
file_name
file_path
file_type
created_at
updated_at
```

Allowed file formats, file-size limits, and storage decisions must be finalized before implementation.

---

# 49. Payments Table

Possible fields:

```text
id
booking_id
buyer_id
amount
payment_method
transaction_id
status
paid_at
created_at
updated_at
```

This is an early conceptual structure.

The MVP supports simulated payment records only.

Do not assume one payment attempt per booking. The final payment relationship must support the approved demo payment behavior and any later decision about multiple attempts.

---

# 50. Reviews Table

Possible fields:

```text
id
booking_id
reviewer_id
reviewee_id
rating
comment
created_at
updated_at
```

Required database rule:

```text
UNIQUE(booking_id)
```

The review must be submitted by the buyer and received by the owner associated with the completed booking.

The database and server-side validation must prevent:

- Reviews for incomplete bookings.
- Reviews by users who are not the booking buyer.
- Reviews for users who are not the booked machine's owner.
- More than one review for the same booking.

---

# 51. Notifications

Laravel notifications can be used for application notifications.

Possible notification information:

```text
id
user_id
type
message
read_at
created_at
updated_at
```

Prefer Laravel's supported notification structure rather than creating a custom notification system without a clear reason.

---

# 52. Main Model Relationships

## User

```text
User hasOne Company
User hasMany Bookings as Buyer
User hasMany Reviews as Reviewer
User hasMany Notifications
```

## Company

```text
Company belongsTo User
Company hasMany Machines
```

## Machine

```text
Machine belongsTo Company
Machine hasMany Images
Machine hasMany Availabilities
Machine hasMany Bookings
```

## Booking

```text
Booking belongsTo Machine
Booking belongsTo Buyer
Booking hasMany Payment Attempts, if supported by the final payment design
Booking hasMany Documents
Booking hasOne Review
```

The payment relationship must match the final payment-attempt design. Do not assume a one-to-one payment relationship until that decision is finalized.

---

# 53. Example Eloquent Relationships

Illustrative examples:

## User Model

```php
public function company()
{
    return $this->hasOne(Company::class);
}

public function bookings()
{
    return $this->hasMany(Booking::class, 'buyer_id');
}

public function reviews()
{
    return $this->hasMany(Review::class, 'reviewer_id');
}
```

## Company Model

```php
public function user()
{
    return $this->belongsTo(User::class);
}

public function machines()
{
    return $this->hasMany(Machine::class);
}
```

## Machine Model

```php
public function company()
{
    return $this->belongsTo(Company::class);
}

public function images()
{
    return $this->hasMany(MachineImage::class);
}

public function availabilities()
{
    return $this->hasMany(MachineAvailability::class);
}

public function bookings()
{
    return $this->hasMany(Booking::class);
}
```

## Booking Model

```php
public function machine()
{
    return $this->belongsTo(Machine::class);
}

public function buyer()
{
    return $this->belongsTo(User::class, 'buyer_id');
}

public function review()
{
    return $this->hasOne(Review::class);
}
```

These examples are starting points. Final relationships must match the actual migrations and architecture.

---

# 54. Controller Structure

Controllers can be separated by role and module.

Illustrative structure:

```text
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

Buyer/
    DashboardController.php
    MachineController.php
    BookingController.php
    PaymentController.php
    ReviewController.php
```

Keep controllers focused and avoid duplicating business logic.

---

# 55. Routes

Routes should be grouped by role.

Illustrative admin route:

```php
use App\Http\Controllers\Admin\DashboardController;

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [
            DashboardController::class,
            'index'
        ])->name('dashboard');
    });
```

Owner:

```php
Route::middleware(['auth', 'role:owner'])
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {

        Route::get('/dashboard', [
            DashboardController::class,
            'index'
        ])->name('dashboard');
    });
```

Buyer:

```php
Route::middleware(['auth', 'role:buyer'])
    ->prefix('buyer')
    ->name('buyer.')
    ->group(function () {

        Route::get('/dashboard', [
            DashboardController::class,
            'index'
        ])->name('dashboard');
    });
```

These are examples, not a complete route specification.

---

# 56. Owner Pages

Possible owner pages:

```text
owner/dashboard

owner/profile

owner/company

owner/machines

owner/machines/create

owner/machines/{id}

owner/machines/{id}/edit

owner/availability

owner/bookings

owner/bookings/{id}

owner/reviews
```

---

# 57. Buyer Pages

Possible buyer pages:

```text
buyer/dashboard

buyer/profile

machines

machines/{id}

buyer/bookings

buyer/bookings/create

buyer/bookings/{id}

buyer/payments

buyer/reviews
```

---

# 58. Admin Pages

Possible admin pages:

```text
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

---

# 59. Resource Routes

Laravel resource routes can be used for CRUD modules.

Example:

```php
Route::resource('machines', MachineController::class);
```

This creates routes such as:

```text
GET       /machines
GET       /machines/create
POST      /machines
GET       /machines/{machine}
GET       /machines/{machine}/edit
PUT/PATCH /machines/{machine}
DELETE    /machines/{machine}
```

Use resource controllers when they make the code cleaner.

Protect all routes with the correct authentication, authorization, and ownership checks.

---

# 60. Validation

Important forms must use Laravel server-side validation.

Example machine validation:

```php
$request->validate([
    'name' => ['required', 'string', 'max:255'],
    'type' => ['required', 'string', 'max:100'],
    'location' => ['required', 'string', 'max:255'],
    'hourly_rate' => ['required', 'numeric', 'min:0'],
    'description' => ['required', 'string'],
]);
```

Illustrative booking validation:

```php
$request->validate([
    'machine_id' => ['required', 'exists:machines,id'],
    'date' => ['required', 'date'],
    'start_time' => ['required'],
    'end_time' => ['required'],
    'required_hours' => ['required', 'numeric', 'min:1'],
    'work_description' => ['required', 'string'],
]);
```

For larger forms, use Laravel Form Request classes.

Example:

```text
app/Http/Requests/

StoreMachineRequest.php
UpdateMachineRequest.php
StoreBookingRequest.php
```

Validation must also check business rules, user permissions, machine status, and available capacity.

---

# 61. Important Business Rules

The following rules are approved or required for the current MVP:

## Machine rules

1. Only approved machines appear in the marketplace.
2. Approval and operational status are separate.
3. Approved inactive and maintenance machines remain visible.
4. Only approved and active machines can receive new booking requests.
5. A buyer cannot request unavailable capacity.

## Booking rules

6. Owner acceptance is required before payment.
7. A booking is confirmed only after a successful demo payment record is saved.
8. The system must prevent conflicting bookings.
9. Users can access only their own permitted booking records.

## Company rules

10. One user can have only one company.
11. One company can have multiple machines.

## Review rules

12. Only completed bookings can receive a review.
13. Only the buyer can review the machine owner.
14. Only one review is allowed per booking.
15. Owners cannot review buyers.

## Payment rules

16. MVP payments are simulated/demo records only.
17. No real payment gateway or real-money charge is part of the MVP.
18. Demo payment records must not be presented as real funds received.

Use `prd.md` and `Rules.md` as the authoritative source for these requirements.

---

# 62. Double Booking Prevention

Example:

```text
Machine availability:
10 AM - 6 PM
```

Buyer A requests:

```text
10 AM - 2 PM
```

Buyer B requests:

```text
12 PM - 4 PM
```

These time ranges overlap.

The system must prevent both bookings from being confirmed for the same capacity.

An illustrative overlap condition is:

```php
$overlapExists = Booking::query()
    ->where('machine_id', $machine->id)
    ->whereIn('status', [
        'accepted',
        'payment_pending',
        'confirmed',
        'in_progress',
    ])
    ->whereDate('start_date', $date)
    ->where(function ($query) use ($startTime, $endTime) {
        $query->where('start_time', '<', $endTime)
            ->where('end_time', '>', $startTime);
    })
    ->exists();

if ($overlapExists) {
    return back()->withErrors([
        'booking' => 'This time slot is already booked.',
    ]);
}
```

This is a conceptual example only.

The final implementation must use the approved booking statuses, capacity reservation rules, date-range model, and transaction/concurrency protections. A basic overlap query alone may not be sufficient to prevent simultaneous requests from creating conflicts.

---

# 63. Database Migration Guidance

Example user role fields:

```php
$table->enum('role', [
    'admin',
    'owner',
    'buyer'
])->default('buyer');

$table->enum('status', [
    'active',
    'blocked'
])->default('active');
```

Example company ownership constraint:

```php
$table->foreignId('user_id')
    ->unique()
    ->constrained()
    ->cascadeOnDelete();
```

Example machine status fields:

```php
$table->enum('approval_status', [
    'pending',
    'approved',
    'rejected',
])->default('pending');

$table->enum('operational_status', [
    'active',
    'inactive',
    'maintenance',
])->default('active');
```

Example review constraint:

```php
$table->foreignId('booking_id')
    ->unique()
    ->constrained()
    ->cascadeOnDelete();
```

These snippets are illustrative. Confirm foreign-key behavior, defaults, database compatibility, and migration order before implementation.

Do not use the old combined machine status migration example.

---

# 64. Laravel Folder Structure

Illustrative structure:

```text
IdleMach/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   ├── Owner/
│   │   │   └── Buyer/
│   │   ├── Middleware/
│   │   └── Requests/
│   │
│   ├── Models/
│   │
│   └── Notifications/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   └── views/
│       ├── layouts/
│       ├── auth/
│       ├── admin/
│       ├── owner/
│       ├── buyer/
│       ├── machines/
│       └── components/
│
├── routes/
│   ├── web.php
│   └── auth.php
│
├── public/
│   ├── css/
│   ├── js/
│   └── images/
│
└── storage/
```

Use Laravel's standard structure and avoid unnecessary custom folders.

---

# 65. Blade Layout

A common layout may be stored at:

```text
resources/views/layouts/app.blade.php
```

Reusable interface components may include:

```text
navbar
sidebar
footer
alerts
buttons
forms
cards
modals
pagination
```

Different dashboards should reuse common components where appropriate without forcing unrelated dashboard layouts to look identical.

---

# 66. Suggested View Structure

Illustrative view structure:

```text
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

buyer/
    dashboard.blade.php
    profile/
    machines/
    bookings/
    payments/
    reviews/

machines/
    index.blade.php
    show.blade.php
```

Adapt the structure to the actual project rather than creating every folder in advance.

---

# 67. Historical Development Phases

The following phases represent the original proposed implementation order. They are a planning reference, not a statement of current project progress.

## Phase 1 — Laravel Setup

```text
Create Laravel project
Configure .env
Configure MySQL
Run migrations
Install/configure authentication
Create User model
Create roles
Create middleware
Create basic layout
```

## Phase 2 — Basic UI

```text
Navbar
Footer
Login
Register
Admin Dashboard
Owner Dashboard
Buyer Dashboard
```

## Phase 3 — Owner Module

```text
Owner Profile
Company Profile
Add Machine
Edit Machine
Delete Machine
Machine Images
Machine Specifications
```

## Phase 4 — Admin Machine Approval

```text
Pending Machine Listings
Approve Listing
Reject Listing
```

Operational status management must be implemented separately and only with the approved permissions.

## Phase 5 — Marketplace

```text
Machine Listing
Machine Details
Search
Filters
```

Marketplace visibility must follow the approved machine status rules.

## Phase 6 — Capacity

```text
Machine Availability
Available Hours
Calendar
Booked Capacity
Maintenance
```

## Phase 7 — Booking

```text
Booking Request
Owner Accept
Owner Reject
Booking Status
Booking Details
Double Booking Prevention
```

## Phase 8 — Demo Payment

```text
Demo Payment Page
Demo Payment Record
Payment Status
Booking Confirmation
```

Do not implement real gateway payments as part of the MVP.

## Phase 9 — Work Completion

```text
Start Work
In Progress
Mark Completed
```

Follow the final completion-confirmation policy.

## Phase 10 — Reviews

```text
Buyer Rating
Buyer Comment
Owner Review
```

Do not implement owner-to-buyer reviews.

## Phase 11 — Notifications

```text
Booking Notifications
Demo Payment Notifications
Completion Notifications
Review Notifications
```

## Phase 12 — Admin Reports

```text
Users Report
Machines Report
Bookings Report
Demo Payment Activity Report
Popular Machine Report
```

---

# 68. MVP Version

The first working version should contain only the essential features.

### Must Have

```text
Authentication

Role-Based Access

Owner

Buyer

Admin

Company Profile

Machine CRUD

Machine Approval

Separate Machine Status Fields

Machine Search

Machine Details

Availability

Booking Request

Owner Accept/Reject

Booking Status

Demo Payment Records

Booking Confirmation

Work Completion

Buyer-to-Owner Reviews
```

Do not begin with advanced AI, chat, maps, mobile applications, or complex payment settlement.

First complete the core marketplace flow.

---

# 69. Future Features

After the core system works, possible future features include:

```text
Real Payment Gateway
Email Notifications
WhatsApp Notifications
Live Chat
Advanced Search
Machine Verification
Company Verification
Document Verification
Favorites
Saved Machines
Advanced Analytics
Invoice Generation
Automatic Commission
Location Map
AI-Based Machine Matching
Demand Prediction
Mobile Application
```

These features are not automatically part of the MVP. They require separate planning and approval.

---

# 70. Recommended Project Flow

The original proposed development order:

```text
Authentication
      ↓
Roles
      ↓
Company Profile
      ↓
Machine CRUD
      ↓
Admin Approval
      ↓
Marketplace
      ↓
Availability
      ↓
Booking
      ↓
Accept/Reject
      ↓
Demo Payment
      ↓
Confirmation
      ↓
Work Completion
      ↓
Review
      ↓
Notifications
      ↓
Reports
      ↓
Advanced Features
```

Follow `task.md` for actual development progress and remaining work.

---

# 71. Complete Real-World Example

## Step 1 — Owner Registration

Patel Engineering registers as an owner.

```text
Role:
Owner
```

## Step 2 — Company Profile

The owner creates one company profile.

```text
Company:
Patel Engineering
```

## Step 3 — Add Machine

Patel Engineering adds:

```text
Haas CNC Turning Machine
```

Rate:

```text
₹800/hour
```

Initial approval status:

```text
pending
```

## Step 4 — Admin Approval

Admin reviews the listing.

```text
pending → approved
```

The listing becomes visible in the marketplace.

Its operational status remains a separate field.

## Step 5 — Buyer Search

ABC Auto Parts searches:

```text
CNC machine
Rajkot
```

## Step 6 — View Machine

ABC finds:

```text
Haas CNC Turning Machine
₹800/hour
```

## Step 7 — Booking Request

ABC requests:

```text
Date:
25 September

Hours:
10
```

The system checks the machine's eligibility and availability.

## Step 8 — Owner Accepts

```text
Pending → Accepted
```

## Step 9 — Demo Payment

The buyer completes the simulated payment process.

Example calculation:

```text
10 × ₹800
= ₹8,000
```

No real money is charged.

## Step 10 — Confirmation

After a successful demo payment record is saved:

```text
Booking Confirmed
```

## Step 11 — Work Starts

```text
Confirmed → In Progress
```

## Step 12 — Work Completes

```text
In Progress → Completed
```

## Step 13 — Buyer Review

ABC reviews Patel Engineering after the completed booking.

Only one review is permitted for that booking.

---

# 72. Core Business Flow

The complete business model can be remembered using:

```text
LIST
 ↓
DISCOVER
 ↓
REQUEST
 ↓
ACCEPT
 ↓
PAY
 ↓
BOOK
 ↓
WORK
 ↓
COMPLETE
 ↓
REVIEW
```

This is the heart of IdleMach.

---

# 73. Success Criteria

The following are illustrative functional success criteria:

```text
✓ User can register
✓ User can log in
✓ Roles work correctly
✓ One user can own only one company
✓ Owner can create a machine listing
✓ Admin can approve or reject a listing
✓ Approval and operational statuses are separate
✓ Approved inactive machines remain visible
✓ Only approved active machines can receive booking requests
✓ Buyer can search for machines
✓ Buyer can view machine details
✓ Buyer can check availability
✓ Buyer can request a booking
✓ Owner can accept or reject a request
✓ System prevents conflicting bookings
✓ Demo payment records can be saved
✓ Booking becomes confirmed after successful demo payment
✓ Work can be completed according to the approved workflow
✓ Buyer can review the owner after completion
✓ Only one review can exist per booking
✓ Admin can monitor the platform
```

Use `prd.md` and `task.md` for the current acceptance criteria and implementation status.

---

# 74. Security Requirements

Basic security should include:

```text
Authentication
Authorization
Role Middleware
CSRF Protection
Server-Side Validation
Password Hashing
File Upload Validation
Ownership Checks
SQL Injection Protection through Eloquent/Query Builder
Secure Session Handling
```

For file uploads, an illustrative Laravel validation rule is:

```php
$request->validate([
    'document' => [
        'required',
        'file',
        'mimes:pdf,jpg,jpeg,png',
        'max:5120',
    ],
]);
```

Never trust frontend validation alone.

Always validate on the server.

---

# 75. Ownership Checks

A buyer should only access their own booking.

Example:

```php
$booking = Booking::where('id', $id)
    ->where('buyer_id', auth()->id())
    ->firstOrFail();
```

For owner actions, verify that the machine belongs to the authenticated owner's company before modifying it.

Also verify that:

- The user has the correct role.
- The booking belongs to the permitted buyer or owner.
- The machine belongs to the correct company.
- The requested status transition is allowed.
- The action follows the current business rules.

These checks prevent users from modifying other users' records.

---

# 76. Seeder and Factory Plan

Factories can be used for testing and demo data.

Possible factories:

```text
UserFactory
CompanyFactory
MachineFactory
MachineAvailabilityFactory
BookingFactory
ReviewFactory
```

Possible seeders:

```text
DatabaseSeeder
User Seeder
Company Seeder
Machine Seeder
Availability Seeder
Booking Seeder
```

Example:

```php
User::factory()->create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
    'role' => 'admin',
]);
```

Use fake data for development only.

Ensure seeded data respects the company ownership, machine status, booking, and review constraints.

---

# 77. Example Artisan Commands

Useful commands:

```bash
php artisan migrate

php artisan migrate:fresh --seed

php artisan make:model Machine -m

php artisan make:controller Owner/MachineController --resource

php artisan make:request StoreMachineRequest

php artisan make:middleware RoleMiddleware

php artisan make:notification BookingCreated

php artisan route:list
```

Check the selected Laravel version's documentation before using version-specific commands or configuration.

---

# 78. Testing Plan

At minimum, test these flows:

```text
Registration
Login
Role Access
Company Ownership
Machine Creation
Machine Approval
Machine Operational Status
Marketplace Visibility
Machine Search
Availability
Booking Request
Booking Accept
Booking Reject
Double Booking
Demo Payment
Booking Confirmation
Booking Completion
Buyer Review
Admin Access
```

Example test scenario:

```text
1. Register as an owner.
2. Create a company profile.
3. Create a machine listing.
4. Login as admin.
5. Approve the machine.
6. Verify the machine appears in the marketplace.
7. Set the machine operational status to active using an authorized action.
8. Login as buyer.
9. Search for the machine.
10. Send a booking request.
11. Login as owner.
12. Accept the request.
13. Login as buyer.
14. Complete the demo payment.
15. Verify the booking is confirmed.
16. Complete the work according to the approved workflow.
17. Submit a buyer-to-owner review.
18. Verify a second review for the same booking is rejected.
```

Also test that inactive and maintenance machines remain visible but cannot receive new booking requests.

---

# 79. Final Architecture

```text
                    IdleMach
                         │
          ┌──────────────┼──────────────┐
          │              │              │
        ADMIN           OWNER          BUYER
          │              │              │
          │         Machine CRUD    Search
          │         Availability    Filter
          │              │          Details
          │              │             │
          │              └──────┬──────┘
          │                     │
          │                 Booking
          │                     │
          │             Accept / Reject
          │                     │
          │                Demo Payment
          │                     │
          │                 Confirmed
          │                     │
          │                    Work
          │                     │
          │                Completed
          │                     │
          └──────────────── Buyer Review
                                │
                            Reports
```

---

# 80. One-Line Project Definition

> **IdleMach is a Laravel-based manufacturing-capacity marketplace that connects businesses with unused machine capacity to businesses looking for manufacturing machines and available working hours.**

---

# 81. Final Development Priority

The original proposed priority:

```text
1. Authentication
2. Role Management
3. Company Profile
4. Owner Module
5. Machine Module
6. Admin Approval
7. Marketplace
8. Availability
9. Booking
10. Demo Payment
11. Work Completion
12. Reviews
13. Notifications
14. Reports
15. Advanced Features
```

Use `task.md` to determine what is already completed and what should be developed next.

---

# 82. Important Development Rule

Do not make the project complicated from the beginning.

First make this flow work:

```text
Owner
 ↓
Create Company
 ↓
Add Machine
 ↓
Set Availability
 ↓
Admin Approves Listing
 ↓
Buyer Finds Machine
 ↓
Buyer Requests Booking
 ↓
Owner Accepts
 ↓
Demo Payment
 ↓
Booking Confirmed
 ↓
Work Completed
 ↓
Buyer Reviews Owner
```

Once this complete flow works correctly, add advanced features one by one.

Always follow the current PRD and project rules when implementing the flow.

---

# 83. Final Project Vision

IdleMach should become a platform where:

```text
Unused Machine Capacity
          ↓
        IdleMach
          ↓
      Available Work
          ↓
       Buyer Finds
          ↓
        Booking
          ↓
    Manufacturing
          ↓
      Opportunity
```

The main goal is simple:

> **Help businesses turn unused machine capacity into productive work while helping other businesses find manufacturing capacity when they need it.**

---

## Final Note

This document preserves the original project concept and development examples.

For current implementation decisions, always use:

- `prd.md` for product requirements and approved business decisions.
- `Rules.md` for mandatory project and security rules.
- `architecture.md` for technical design.
- `Design.md` for UI and interaction guidance.
- `task.md` for current development progress.
- `memory.md` for concise project context.

If an example in this historical document conflicts with those documents, follow the higher-priority source.