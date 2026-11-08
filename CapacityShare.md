# CapacityShare - Name of website is "IdleMach"

## Laravel Project Flow & Development Documentation

> **Tagline:** Turn Idle Capacity Into Opportunity.

---

## 1. Project Overview

**IdleMach** is a web-based marketplace that connects:

1. **Machine Owners** who have unused machine capacity.
2. **Buyers** who need manufacturing work but may not have the required machine.
3. **Admins** who manage and monitor the platform.

The platform allows machine owners to list their machines and available working hours. Buyers can search available machines, check details, request bookings, make payments, and complete manufacturing work.

### Core Idea

```text
Machine Owner
      ↓
Lists Machine + Available Capacity
      ↓
IdleMach Marketplace
      ↓
Buyer Searches Capacity
      ↓
Buyer Sends Booking Request
      ↓
Owner Accepts / Rejects
      ↓
Payment
      ↓
Booking Confirmed
      ↓
Manufacturing Work
      ↓
Work Completed
      ↓
Review & Rating
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

Those 4 unused hours represent possible business value.

At the same time, another company may need the same type of machine but may not own one.

IdleMach connects these two sides.

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
List Idle Capacity
  ↓
Buyer Finds Machine
  ↓
Booking
  ↓
Work
  ↓
Income
```

---

# 3. Main Users

IdleMach has three main roles.

## 3.1 Admin

Admin manages the entire platform.

Admin can:

- Manage users
- Manage machine owners
- Manage buyers
- Approve machines
- Reject machines
- Manage bookings
- Monitor payments
- Manage reviews
- Block/unblock users
- View reports
- Monitor platform activity

---

## 3.2 Machine Owner

A machine owner is a business/person who owns manufacturing machines.

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

Owner can:

- Register
- Login
- Create company profile
- Add machines
- Upload machine images
- Add machine specifications
- Set hourly price
- Set available capacity
- Manage availability
- View booking requests
- Accept/reject requests
- Manage bookings
- Mark work as completed
- View earnings
- Receive reviews

---

## 3.3 Buyer

A buyer is a business/person looking for manufacturing capacity.

Buyer can:

- Register
- Login
- Create profile
- Search machines
- Filter machines
- View machine details
- Check availability
- Send booking request
- Upload work documents
- Track booking
- Make payment
- Cancel booking where allowed
- Mark work completed
- Give reviews

---

# 4. Laravel Technology Stack

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
Razorpay / Stripe
Laravel Queue
Redis
Cloud Storage
WebSockets
Maps
```

Do not add every technology at the beginning.

First make the core application work correctly with Laravel, MySQL, Blade, Bootstrap, and JavaScript.

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
          │           Payment
          │              │
          │       Booking Confirmed
          │              │
          │       Manufacturing Work
          │              │
          │         Work Completed
          │              │
          └──────────── Review
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

---

# 7. Registration

Registration form:

```text
Name
Email
Phone
Password
Confirm Password
Company Name
City
Address
Role
```

Optional future fields:

```text
GST Number
Business Registration Number
Company Logo
Verification Documents
```

---

# 8. Login

Login requires:

```text
Email
Password
```

After successful authentication, redirect based on the user's role.

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

---

# 9. Role-Based Access Control

Different areas of the application should be protected using middleware.

Example:

```text
/admin/*
/owner/*
/buyer/*
```

Only the correct role can access the corresponding routes.

Example:

```text
Owner cannot access Admin User Management.

Buyer cannot access Owner Machine Management.

Admin can access administrative modules.
```

---

# 10. Example Role Middleware

A simple role middleware can look like:

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

Register the middleware according to the Laravel version/project setup and use it on role-specific routes.

---

# 11. Owner Dashboard

Owner dashboard should show:

```text
Total Machines
Available Capacity
Pending Requests
Active Bookings
Completed Bookings
Total Earnings
```

Example:

```text
---------------------------------------
OWNER DASHBOARD
---------------------------------------

Machines              5

Available Hours       120

Pending Requests       3

Active Bookings        7

Completed Bookings    25

Total Earnings    ₹45,000
---------------------------------------
```

---

# 12. Add Machine

Owner can create a machine listing.

Fields:

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

---

# 13. Machine Status

A machine can have statuses:

```text
pending
approved
rejected
active
inactive
maintenance
```

Recommended flow:

```text
Owner Creates Machine
        ↓
Pending
        ↓
Admin Reviews
      /   \
Approve   Reject
   |
Active
```

Only approved/active machines should appear in the marketplace.

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

Example CNC:

```text
Machine Type: CNC
Max Diameter: 250mm
Max Length: 500mm
Accuracy: ±0.01mm
Material: Steel, Aluminium
```

---

# 16. Machine Marketplace

Buyer sees approved machines.

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

---

# 17. Search

Buyer can search by:

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

Filters should be added gradually.

---

# 19. Machine Details Page

Machine details page should contain:

```text
Machine Images
Machine Name
Owner / Company
Location
Machine Type
Description
Specifications
Hourly Rate
Available Capacity
Availability
Reviews

[Request Booking]
```

---

# 20. Capacity Management

This is one of the most important parts of IdleMach.

The owner does not only list a machine.

The owner lists its **available capacity**.

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
Total Capacity - Booked Capacity
```

---

# 21. Availability

Owner can define machine availability.

Example:

```text
Monday
10:00 AM - 6:00 PM

Tuesday
10:00 AM - 6:00 PM

Wednesday
10:00 AM - 6:00 PM
```

Owner can also mark:

```text
Available
Booked
Maintenance
Unavailable
```

---

# 22. Calendar

Owner should have a calendar.

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

This helps prevent double booking.

---

# 23. Buyer Booking Flow

Buyer opens a machine and clicks:

```text
Request Booking
```

Booking form:

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

---

# 24. Booking Example

Buyer needs:

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

The booking request is sent to the owner.

---

# 25. Booking Status

Recommended booking statuses:

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

Main flow:

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
Pending / Confirmed
       ↓
Cancelled
```

---

# 26. Owner Booking Request

Owner receives:

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

Actions:

```text
[Accept]
[Reject]
[View Details]
```

---

# 27. Accept Booking

When owner accepts:

```text
Pending
   ↓
Accepted
   ↓
Payment Pending
```

Buyer receives a notification.

---

# 28. Reject Booking

If owner rejects:

```text
Pending
   ↓
Rejected
```

The owner can provide a reason.

Example:

```text
Machine is already required for another order.
```

---

# 29. Payment

After owner accepts:

```text
Booking Amount
        ↓
Payment
        ↓
Payment Successful
        ↓
Booking Confirmed
```

Example:

```text
Machine Rate = ₹800/hour
Hours         = 10

Total         = ₹8,000
```

For the first version, a payment record/demo payment flow can be used. A real gateway such as Razorpay can be added later.

---

# 30. Payment Record

Each payment should store:

```text
Booking ID
Buyer ID
Amount
Payment Method
Transaction ID
Payment Status
Paid At
Created At
Updated At
```

Payment statuses:

```text
pending
successful
failed
refunded
```

---

# 31. Booking Confirmation

After successful payment:

```text
Booking Confirmed
```

Example:

```text
Booking ID:
CS-10025

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

---

# 32. Manufacturing Work

Once the booking date arrives:

```text
Confirmed
    ↓
In Progress
    ↓
Manufacturing Work
```

The owner performs the requested work.

---

# 33. Complete Booking

After work is completed:

```text
Mark as Completed
```

Status:

```text
In Progress
      ↓
Completed
```

---

# 34. Review & Rating

After completion, buyer can review the owner.

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

Owner can also review the buyer.

---

# 35. Notifications

Important notifications:

```text
New Booking Request
Booking Accepted
Booking Rejected
Payment Successful
Booking Confirmed
Booking Starting
Booking Completed
New Review
```

Initially, Laravel database notifications can be used.

Email notifications can be added later.

---

# 36. Admin Dashboard

Admin dashboard:

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

Total Revenue         ₹5.2L
----------------------------------------
```

---

# 37. Admin User Management

Admin can:

```text
View Users
Search Users
Filter Users
View User Details
Block User
Unblock User
```

User statuses:

```text
active
blocked
```

---

# 38. Admin Machine Management

Admin can:

```text
View Machines
View Pending Machines
Approve Machine
Reject Machine
Deactivate Machine
Delete Machine
```

Machine approval:

```text
Owner
 ↓
Create Machine
 ↓
Pending
 ↓
Admin Review
 ↓
Approve
 ↓
Marketplace
```

---

# 39. Admin Booking Management

Admin can see:

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

Admin should mainly monitor the system rather than manually control every booking.

---

# 40. Admin Reports

Future reports:

```text
Total Users
Total Machines
Total Bookings
Total Revenue
Popular Machine Types
Popular Locations
Most Active Owners
Most Requested Machines
```

---

# 41. Database Design

Initial database structure:

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

---

# 42. Users Table

Main fields:

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

Role:

```text
admin
owner
buyer
```

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
Company
```

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
status
created_at
updated_at
```

Relationship:

```text
Company
   ↓
Machines
```

One company can have multiple machines.

---

# 45. Machine Images Table

Fields:

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

Fields:

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

Possible status:

```text
available
booked
maintenance
unavailable
```

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

---

# 48. Booking Documents Table

Used for:

```text
CAD File
Drawing
PDF
Technical Document
Other Work Documents
```

Fields:

```text
id
booking_id
file_name
file_path
file_type
created_at
updated_at
```

---

# 49. Payments Table

Fields:

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

---

# 50. Reviews Table

Fields:

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

---

# 51. Notifications

Laravel notifications can be used.

Possible data:

```text
id
user_id
type
message
read_at
created_at
updated_at
```

---

# 52. Main Model Relationships

## User

```text
User hasOne Company
User hasMany Bookings
User hasMany Reviews
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
Booking hasOne Payment
Booking hasMany Documents
Booking hasMany Reviews
```

---

# 53. Example Eloquent Relationships

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

public function payment()
{
    return $this->hasOne(Payment::class);
}
```

---

# 54. Controller Structure

Controllers should be separated by role/module.

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
    PaymentController.php

Buyer/
    DashboardController.php
    MachineController.php
    BookingController.php
    PaymentController.php
    ReviewController.php
```

This keeps the project clean and easy to maintain.

---

# 55. Routes

Routes should be grouped by role.

Example:

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

---

# 56. Owner Pages

Main owner pages:

```text
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

---

# 57. Buyer Pages

Main buyer pages:

```text
buyer/dashboard

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

Main admin pages:

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

For CRUD modules, Laravel resource routes can be used.

Example:

```php
Route::resource('machines', MachineController::class);
```

This gives:

```text
GET       /machines
GET       /machines/create
POST      /machines
GET       /machines/{machine}
GET       /machines/{machine}/edit
PUT/PATCH /machines/{machine}
DELETE    /machines/{machine}
```

Use resource controllers where they make the code cleaner.

---

# 60. Validation

Every important form must use Laravel validation.

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

Booking validation:

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

---

# 61. Important Business Rules

## Rule 1

Only approved machines can appear in the marketplace.

## Rule 2

Only active machines can receive booking requests.

## Rule 3

A buyer cannot book unavailable capacity.

## Rule 4

The system must prevent double booking.

## Rule 5

Owner must accept the booking before payment.

## Rule 6

Booking becomes confirmed after successful payment.

## Rule 7

Only completed bookings can receive a final review.

## Rule 8

Users can only access their own bookings.

## Rule 9

Admin can monitor all records.

---

# 62. Double Booking Prevention

Example:

```text
Machine availability:
10 AM - 6 PM
```

Buyer A books:

```text
10 AM - 2 PM
```

Remaining capacity:

```text
2 PM - 6 PM
```

Buyer B must not be allowed to book:

```text
12 PM - 4 PM
```

because the time overlaps.

A simple overlap check can be implemented before creating/confirming a booking.

Example concept:

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

The exact query should match the final database design.

---

# 63. Database Migrations

Example users role migration:

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

Example machines migration:

```php
Schema::create('machines', function (Blueprint $table) {
    $table->id();

    $table->foreignId('company_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->string('name');
    $table->string('type');
    $table->string('brand')->nullable();
    $table->string('model')->nullable();

    $table->text('description')->nullable();

    $table->string('location');

    $table->decimal('hourly_rate', 10, 2);

    $table->enum('status', [
        'pending',
        'approved',
        'rejected',
        'active',
        'inactive',
        'maintenance',
    ])->default('pending');

    $table->timestamps();
});
```

---

# 64. Laravel Folder Structure

Recommended structure:

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

---

# 65. Blade Layout

Common layout:

```text
resources/views/layouts/app.blade.php
```

Reusable components:

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

Different dashboards should reuse common components where possible.

---

# 66. Suggested View Structure

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

---

# 67. Development Phases

The project should NOT be built all at once.

Build it step by step.

---

## Phase 1 — Laravel Setup

Tasks:

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

---

## Phase 2 — Basic UI

Create:

```text
Navbar
Footer
Login
Register
Admin Dashboard
Owner Dashboard
Buyer Dashboard
```

---

## Phase 3 — Owner Module

Create:

```text
Owner Profile
Company Profile
Add Machine
Edit Machine
Delete Machine
Machine Images
Machine Specifications
```

---

## Phase 4 — Admin Machine Approval

Create:

```text
Pending Machines
Approve
Reject
Activate
Deactivate
```

---

## Phase 5 — Marketplace

Create:

```text
Machine Listing
Machine Details
Search
Filters
```

---

## Phase 6 — Capacity

Create:

```text
Machine Availability
Available Hours
Calendar
Booked Hours
Maintenance
```

---

## Phase 7 — Booking

Create:

```text
Booking Request
Owner Accept
Owner Reject
Booking Status
Booking Details
Double Booking Check
```

---

## Phase 8 — Payment

Create:

```text
Payment Page
Payment Record
Transaction
Payment Status
```

---

## Phase 9 — Work Completion

Create:

```text
Start Work
In Progress
Mark Completed
```

---

## Phase 10 — Reviews

Create:

```text
Rating
Comment
Owner Review
Buyer Review
```

---

## Phase 11 — Notifications

Create:

```text
Booking Notifications
Payment Notifications
Completion Notifications
Review Notifications
```

---

## Phase 12 — Admin Reports

Create:

```text
Users Report
Machines Report
Bookings Report
Revenue Report
Popular Machine Report
```

---

# 68. MVP Version

The first working version should contain only the important features.

### Must Have

```text
Authentication
Roles
Owner
Buyer
Admin

Machine CRUD

Machine Approval

Machine Search

Machine Details

Availability

Booking Request

Accept/Reject

Booking Status

Payment Record

Booking Completion

Reviews
```

Do not start with advanced AI, chat, maps, mobile apps, or complex payment settlement.

First complete the core marketplace flow.

---

# 69. Future Features

After the core system works, we can add:

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

These should be added after the main booking flow is stable.

---

# 70. Recommended Project Flow

The most important development order is:

```text
Authentication
      ↓
Roles
      ↓
Owner Profile
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
Payment
      ↓
Completion
      ↓
Review
      ↓
Notifications
      ↓
Reports
      ↓
Advanced Features
```

---

# 71. Complete Real-World Example

## Step 1 — Owner Registration

Patel Engineering registers as an owner.

```text
Role:
Owner
```

---

## Step 2 — Add Machine

Patel Engineering adds:

```text
Haas CNC Turning Machine
```

Rate:

```text
₹800/hour
```

---

## Step 3 — Admin Approval

Admin reviews the machine.

```text
Pending → Approved
```

---

## Step 4 — Buyer Search

ABC Auto Parts searches:

```text
CNC machine
Rajkot
```

---

## Step 5 — View Machine

ABC finds:

```text
Haas CNC Turning Machine
₹800/hour
```

---

## Step 6 — Booking Request

ABC requests:

```text
Date:
25 September

Hours:
10
```

---

## Step 7 — Owner Accepts

```text
Pending → Accepted
```

---

## Step 8 — Payment

```text
10 × ₹800
= ₹8,000
```

---

## Step 9 — Confirmation

```text
Payment Successful
        ↓
Booking Confirmed
```

---

## Step 10 — Work Starts

```text
Confirmed → In Progress
```

---

## Step 11 — Work Completes

```text
In Progress → Completed
```

---

## Step 12 — Review

ABC gives:

```text
★★★★★
```

and writes a review.

---

# 72. Core Business Flow

The complete business model can be remembered using this:

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

The project will be considered functional when:

```text
✓ User can register
✓ User can login
✓ Roles work correctly
✓ Owner can create machine
✓ Admin can approve machine
✓ Buyer can search machine
✓ Buyer can view machine
✓ Buyer can check availability
✓ Buyer can request booking
✓ Owner can accept/reject
✓ System prevents double booking
✓ Buyer can make/store payment
✓ Booking becomes confirmed
✓ Owner can mark work completed
✓ Buyer can submit review
✓ Admin can monitor the platform
```

---

# 74. Security Requirements

Basic security should include:

```text
Authentication
Authorization
Role Middleware
CSRF Protection
Server-side Validation
Password Hashing
File Upload Validation
Ownership Checks
SQL Injection Protection through Eloquent/Query Builder
Secure Session Handling
```

For file uploads:

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

Never trust only frontend validation.

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

This prevents users from editing another user's records.

---

# 76. Seeder and Factory Plan

Factories can be used for testing/demo data.

Recommended factories:

```text
UserFactory
CompanyFactory
MachineFactory
MachineAvailabilityFactory
BookingFactory
ReviewFactory
```

Recommended seeders:

```text
DatabaseSeeder
Role/User Seeder
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

---

# 78. Testing Plan

At minimum, test these flows:

```text
Registration
Login
Role Access
Machine Creation
Machine Approval
Machine Search
Availability
Booking Request
Booking Accept
Booking Reject
Double Booking
Payment
Booking Completion
Review
Admin Access
```

Example test scenario:

```text
1. Login as owner.
2. Create a machine.
3. Login as admin.
4. Approve machine.
5. Login as buyer.
6. Search machine.
7. Send booking request.
8. Login as owner.
9. Accept request.
10. Login as buyer.
11. Complete payment.
12. Confirm booking.
```

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
          │                  Payment
          │                     │
          │                 Confirmed
          │                     │
          │                  Work
          │                     │
          │                Completed
          │                     │
          └────────────────── Review
                                │
                            Reports
```

---

# 80. One-Line Project Definition

> **IdleMach is a Laravel-based manufacturing capacity marketplace that connects businesses having idle machine capacity with businesses looking for available manufacturing machines and working hours.**

---

# 81. Final Development Priority

```text
1. Authentication
2. Role Management
3. Owner Module
4. Machine Module
5. Admin Approval
6. Marketplace
7. Availability
8. Booking
9. Payment
10. Work Completion
11. Reviews
12. Notifications
13. Reports
14. Advanced Features
```

---

# 82. Important Development Rule

Do not make the project complicated from the beginning.

First make this flow work:

```text
Owner
 ↓
Add Machine
 ↓
Set Availability
 ↓
Admin Approves
 ↓
Buyer Finds Machine
 ↓
Buyer Requests Booking
 ↓
Owner Accepts
 ↓
Payment
 ↓
Booking Confirmed
 ↓
Work Completed
 ↓
Review
```

Once this complete flow works correctly, add advanced features one by one.

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
        Revenue
```

The main goal is simple:

> **Help businesses turn unused machine capacity into productive work while helping other businesses find manufacturing capacity when they need it.**
