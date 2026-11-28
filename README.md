# IdleMach — Frontend Prototype and Laravel Foundation

**Tagline:** Turn Idle Capacity Into Opportunity.

IdleMach is a manufacturing-capacity marketplace concept that connects machine owners who have unused manufacturing hours with buyers who need manufacturing work.

This repository contains the accepted static frontend prototype built using HTML, CSS, JavaScript, Bootstrap 5, and Font Awesome, plus a Laravel 13 application under `IdleMach-Laravel/`.

The frontend demonstrates the public website, marketplace discovery, machine details, authentication interfaces, and role-based dashboard experiences. The Laravel application includes converted Blade views, shared assets, routes, Eloquent models, migrations, authentication controllers/FormRequests, role middleware, ownership policies, factories, and automated tests. Authentication and role-based access are implemented; marketplace business workflows remain incomplete.

> **Important:** This is not yet a live marketplace. Owner and Buyer registration, login, logout, role-based dashboard protection, and owner company creation during registration are implemented and were manually verified with local Laragon/MySQL where noted. Company and Machine CRUD workflows, machine creation/editing persistence, booking workflows, payment workflows, review workflows, real payment gateway integration, file uploads, and notification delivery are not connected. Existing dashboard sample records remain frontend-only.

---

## 1. Project Status

The frontend implementation covers:

- Phase 0.2 — Frontend Workspace Setup
- Phase 1 — Frontend Design Foundation
- Phase 2.1 — Home Page
- Phase 2.2 — Explore Machines
- Phase 2.3 — Machine Details
- Phase 2.4 — How It Works
- Phase 2.5 — About and Contact
- Phase 2.6 — Login and Registration
- Phase 3.1 — Admin Dashboard
- Phase 3.2 — Machine Owner Dashboard
- Phase 3.3 — Buyer Dashboard
- Phase 3.4 — Dashboard Integration and Consistency
- Phase 4 — Frontend Review and Acceptance
- Phase 4.5 — Demo Content Disclosure Cleanup and Frontend Preparation
- Phase 4.6 — Animation and UI Polish Tracking

**Frontend status:** Phase 0.2, Phases 2–4, Phase 4.5, and Phase 4.6 are complete for the accepted static prototype. Phase 1 implementation is complete except for the blocked final brand identity and provisional tokens. Phase 3 frontend implementation is complete for the approved dashboard overviews and shared shell only; separate Admin company/owner and buyer management screens remain undefined and unbuilt. For these reasons, `task.md` records Phase 0, Phase 1, and Phase 3 as partially completed. The Phase 0.1 document-review items are not separately tracked as completed verification steps.

**Laravel status:** Phase 5 — Laravel 13 Application Foundation — is partially complete for the full Laravel foundation, and Phase 5.5 — Authentication, Role Access, Ownership Foundation, and Security Verification — is complete with warnings. The Laravel 13 application includes local MySQL environment settings, shared CSS/JavaScript/assets, Blade layouts and views, GET routes, Eloquent models, and core migrations. Implemented Phase 5.5 components include Auth controllers, `LoginRequest`/`RegisterRequest`, POST routes for registration/login/logout, `EnsureUserHasRole` role middleware, Company/Machine ownership policies, model/factory support, and authentication/ownership/security feature tests. Company and Machine CRUD workflows, machine creation/editing persistence, booking workflows, payment workflows, review workflows, file uploads, and notification delivery are not connected.

**Database status:** Availability is represented by `machine_weekly_schedules`, `machine_availability_exceptions`, and `machine_reserved_periods`; there is no `machine_availabilities` table. Migrations also exist for machine specifications and payment deadline rules. No seed records are registered. No new migrations were introduced during Phase 5.5.

**Testing status:** Automated PHPUnit/SQLite verification: full PHPUnit suite PASS (86 tests, 751 assertions), PHP lint checks passed, and 34 dashboard routes were verified with correct authentication and role middleware. Manual local Laragon/MySQL/browser checks: Owner registration works, owner company creation works during registration, Buyer registration works without creating a company, Owner and Buyer login and dashboard access work, and cross-role dashboard access returned 403 Forbidden. Earlier static-frontend browser checks remain recorded in `task.md`.

The accepted frontend design, layouts, dashboards, sample records, reviews, ratings, machine listings, and existing images are retained. Approved visitor-facing wording in visible public page content has been cleaned up; prototype disclosures remain in page metadata and internal interface notices. Retained records and internal interface feedback remain frontend-only and are not persisted to a backend.

Blade screens outside the implemented authentication/role-access scope still render retained sample records and use frontend-only interactions. Authentication and role-based dashboard access are implemented; Company/Machine CRUD, booking, payment, review, upload, and notification workflows are not connected to live backend services.

**Current next stage:** Address Phase 5.5.5 warnings as needed, then proceed to the next approved implementation phase for marketplace business workflows (Company/Machine CRUD and related owner/admin workflows), while keeping booking, payment, and review workflows out of scope until their phases are implemented.

Refer to the repository's `task.md` for detailed task progress and verification notes.

---

## 2. Technology Stack

### Static frontend

| Technology         | Purpose                                  |
| ------------------ | ---------------------------------------- |
| HTML5              | Page structure and content               |
| CSS3               | Custom styling and responsive layouts    |
| JavaScript         | Frontend interactions and demo behaviour |
| Bootstrap 5.3.3    | Responsive grid and UI components        |
| Font Awesome 6.7.2 | Icons                                    |
| SVG                | Custom industrial illustrations          |

Bootstrap 5.3.3 and Font Awesome 6.7.2 are stored locally in the project. The frontend does not depend on external CDNs for these libraries.

### Laravel application

| Technology             | Purpose                                                         |
| ---------------------- | --------------------------------------------------------------- |
| PHP 8.3+               | Minimum PHP requirement declared in `composer.json`              |
| Laravel framework 13.x | Application framework; `composer.lock` currently pins `v13.42.0` |
| Blade                  | Converted views and role-based layouts                           |
| MySQL                  | Local database configuration; connectivity is not yet verified   |

---

## 3. How to Run Locally

The frontend should be served through a local HTTP server rather than opened directly using `file://`.

### Option 1: PHP development server

Open a terminal in the project root:

```powershell
cd IdleMach-Frontend
php -S localhost:8000
```

Open the following address in your browser:

```text
http://localhost:8000/
```

### Option 2: Python development server

If PHP is unavailable:

```powershell
cd IdleMach-Frontend
python -m http.server 8000
```

Then open:

```text
http://localhost:8000/
```

Any other static HTTP server can also be used.

These commands run the static prototype only. For the Laravel application under `IdleMach-Laravel/`, configure local `.env` values and use `php artisan serve` for local development. Phase 5.5 automated PHPUnit/SQLite tests and manual local Laragon/MySQL checks were completed as recorded in `task.md`; do not treat this as evidence that booking, payment, review, upload, notification, or Company/Machine CRUD workflows are connected. No migration or seed command should be run as part of documentation review.

---

## 4. Available Pages

The table below lists the original static HTML pages in `IdleMach-Frontend/`. It is not the list of Laravel Blade screens.

| Page             | File                   | Purpose                                                                                                    |
| ---------------- | ---------------------- | ---------------------------------------------------------------------------------------------------------- |
| Home             | `index.html`           | Marketplace introduction, hero, discovery preview, owner and buyer sections, and sample listings           |
| Explore Machines | `machines.html`        | Search, filter, sort, and discover sample machine listings                                                 |
| Machine Details  | `machine-details.html` | Machine information, gallery, specifications, capacity, availability, and demo booking form                |
| How It Works     | `how-it-works.html`    | Owner journey, buyer journey, admin role, and nine-stage booking workflow                                  |
| About            | `about.html`           | Marketplace purpose, platform principles, roles, and calls to action                                       |
| Contact          | `contact.html`         | Contact enquiry form with local validation and demo feedback                                               |
| Login            | `login.html`           | Login interface; Laravel application also provides implemented Owner/Buyer authentication routes |
| Register         | `register.html`        | Owner and buyer registration interface; Laravel application implements Owner/Buyer registration with validation |
| Admin Dashboard  | `admin-dashboard.html` | Static admin dashboard prototype; Laravel admin dashboard routes are protected by auth and admin role middleware |
| Owner Dashboard  | `owner-dashboard.html` | Static owner dashboard prototype; Laravel owner dashboard routes are protected by auth and owner role middleware |
| Buyer Dashboard  | `buyer-dashboard.html` | Static buyer dashboard prototype; Laravel buyer dashboard routes are protected by auth and buyer role middleware |
| Styleguide       | `styleguide.html`      | Design tokens, reusable components, and frontend styling reference                                         |

Converted Blade views and role-specific module screens are located under `IdleMach-Laravel/resources/views/`. The static admin dashboard contains management shortcuts and previews; separate UI-only Blade screens exist for Admin users, machines, approvals, bookings, payments, reviews, reports/activity, business rules, and profile. Dedicated company/owner and buyer management screens are not defined. Authentication and role-access routes/controllers are implemented, but most dashboard module screens still render frontend-only sample records and do not read or write business records.

A UI-only `buyer/profile.blade.php` shell exists with local validation feedback; the approved buyer profile field set remains undefined and no account data is read or written.

### Useful local routes

```text
http://localhost:8000/index.html
http://localhost:8000/machines.html
http://localhost:8000/machine-details.html?id=1
http://localhost:8000/machine-details.html?id=2
http://localhost:8000/machine-details.html?id=3
http://localhost:8000/how-it-works.html
http://localhost:8000/about.html
http://localhost:8000/contact.html
http://localhost:8000/login.html
http://localhost:8000/register.html
http://localhost:8000/admin-dashboard.html
http://localhost:8000/owner-dashboard.html
http://localhost:8000/buyer-dashboard.html
http://localhost:8000/styleguide.html
```

---

## 5. Project Folder Structure

The repository contains both the static frontend prototype and the Laravel application. The first tree below shows the static frontend folder structure; the second shows the Laravel application structure.

### Static frontend (`IdleMach-Frontend/`)

```text
IdleMach-Frontend/
│
├── index.html
├── machines.html
├── machine-details.html
├── how-it-works.html
├── about.html
├── contact.html
├── login.html
├── register.html
├── admin-dashboard.html
├── owner-dashboard.html
├── buyer-dashboard.html
├── styleguide.html
│
├── robots.txt
│
├── css/
│   └── style.css
│
├── js/
│   └── script.js
│
├── assets/
│   │
│   ├── icons/
│   │   └── favicon.svg
│   │
│   ├── images/
│   │   ├── hero-workshop.svg
│   │   ├── owner-capacity.svg
│   │   ├── buyer-part.svg
│   │   ├── machine-turning.svg
│   │   ├── machine-milling.svg
│   │   └── machine-fabrication.svg
│   │
│   └── vendor/
│       ├── bootstrap/
│       │   └── Bootstrap 5.3.3 files
│       │
│       └── fontawesome/
│           ├── css/
│           └── webfonts/
│
└── README.md
```

The image filenames above represent the existing illustrations referenced by the homepage. Keep any additional vendor files and assets already present in the repository.

### Laravel application (`IdleMach-Laravel/`)

```text
IdleMach-Laravel/
├── app/
│   ├── Http/
│   ├── Models/
│   └── Providers/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── assets/
│   ├── css/
│   └── js/
├── resources/
│   └── views/
│       ├── admin/
│       ├── buyer/
│       ├── components/
│       ├── layouts/
│       ├── owner/
│       └── public/
├── routes/
├── storage/
├── tests/
├── artisan
├── composer.json
├── composer.lock
└── phpunit.xml
```

Generated dependencies and local environment files are omitted.

---

## 6. Image and Visual Design Guidelines

IdleMach uses an industrial B2B visual direction.

The website should look clean, practical, professional, and trustworthy.

### Existing homepage illustrations

| Image                     | Purpose                                             |
| ------------------------- | --------------------------------------------------- |
| `hero-workshop.svg`       | CNC turning machine with weekly capacity board      |
| `owner-capacity.svg`      | Machine owner capacity planning and weekly schedule |
| `buyer-part.svg`          | Technical drawing and manufacturing capacity search |
| `machine-turning.svg`     | CNC turning machine                                 |
| `machine-milling.svg`     | Vertical machining centre                           |
| `machine-fabrication.svg` | Hydraulic press brake                               |

These SVGs are custom illustrations, not photographs of actual machines.

### Existing image status

The current website images and their references are retained as part of the accepted frontend baseline. Phase 4.5 does not require image replacement, image generation, or image integration. Any future image change must be handled as a separate, explicitly approved requirement.

### Image consistency rules

- Maintain one consistent visual direction across the website.
- Do not mix unrelated illustration styles.
- Avoid random stock photos.
- Do not use distorted machine images or artificial-looking factory scenes.
- Use real machine photography for marketplace listings only when appropriate and available.
- Keep image dimensions and aspect ratios suitable for their page sections.
- Use meaningful alternative text for informative images.
- Do not add decorative images that make the layout unnecessarily crowded.

---

## 7. Design System

The shared design system is maintained in:

```text
css/style.css
```

The main design tokens are defined under `:root`.

### Current provisional colour palette

| Colour       | Value     | Usage                          |
| ------------ | --------- | ------------------------------ |
| Primary Teal | `#0F5C6B` | Main brand and primary actions |
| Dark Teal    | `#0A414C` | Darker interactive states      |
| Soft Teal    | `#E6F2F3` | Soft backgrounds               |
| Accent Amber | `#9A5B0B` | Secondary accents              |
| Navy         | `#10202B` | Headings and dark elements     |
| Background   | `#F5F7F8` | Main page background           |
| White        | `#FFFFFF` | Cards and content surfaces     |

**Note:** The palette, logo mark, and font family remain provisional until formally approved.

### Shared styling components

| Component         | Main classes                                                                           |
| ----------------- | -------------------------------------------------------------------------------------- |
| Layout            | `.container-im`, `.section`                                                            |
| Typography        | `.display-title`, `.page-title`, `.section-title`, `.eyebrow`                          |
| Buttons           | `.btn-im`, `.btn-im-primary`, `.btn-im-secondary`, `.btn-im-outline`, `.btn-im-danger` |
| Forms             | Bootstrap form controls, `.form-required`, `.invalid-feedback`                         |
| Cards             | `.im-card`, `.im-card-header`, `.im-card-body`, `.im-card-footer`                      |
| Status            | `.status-badge`, `.status-available`, `.status-pending`, `.status-rejected`            |
| Feedback          | `.im-alert`, `.empty-state`, `.confirmation-panel`                                     |
| Homepage          | `.home-hero`, `.hero-roles`, `.discovery-panel`, `.journey-panel`, `.cta-band`         |
| Explore           | `.machines-hero`, `.machine-filter-panel`, `.results-toolbar`                          |
| Machine Details   | `.machine-detail-hero`, `.detail-gallery`, `.booking-panel`                            |
| How It Works      | `.hiw-hero`, `.hiw-steps`, `.hiw-rules-panel`                                          |
| About and Contact | `.page-hero`, `.page-hero-panel`, `.purpose-steps`, `.contact-form-panel`              |

Dashboard-specific styles are also maintained in the same shared stylesheet.

---

## 8. Frontend Functionality

The frontend demonstrates the following interactions:

### Public website

- Responsive navigation.
- Active navigation highlighting.
- Sticky header scroll behaviour.
- Homepage machine search and filters.
- Marketplace discovery.
- Machine details rendering from sample records.
- Local form validation.
- Local interface notices and feedback.

### Machine marketplace

- Keyword search.
- Process and location filters.
- Availability and rate filters.
- Sorting.
- Result count updates.
- Empty states.
- Machine details navigation.

### Authentication and role access

- Owner and Buyer registration with server-side validation (`RegisterRequest`) and CSRF protection.
- Owner registration creates the user and company in a database transaction; Buyer registration does not create a company.
- Login with Laravel authentication, session regeneration, remember-me support, and rate limiting (`LoginRequest`/controller).
- Logout invalidates the session and regenerates the CSRF token.
- Role-based dashboard protection through `EnsureUserHasRole` middleware and `auth` + `role:*` route groups.
- Manual local Laragon/MySQL checks confirmed Owner/Buyer registration, owner company creation, Owner/Buyer login and dashboards, and cross-role dashboard access returning 403 Forbidden.

### Admin Dashboard

- Dashboard overview.
- Machine approval and rejection demonstration (frontend sample records).
- Booking audit views (frontend sample records).
- Recent activity.
- Management shortcut previews, not standalone management screens.
- Business rules reference.
- Responsive sidebar navigation.
- Laravel admin dashboard routes are protected by authentication and admin role middleware; business CRUD/approval workflows are not connected.

### Machine Owner Dashboard

- Company profile demonstration (frontend sample records; owner company creation is implemented during registration).
- Machine listing management (not connected to CRUD persistence).
- Add Machine form (not connected to CRUD persistence).
- Capacity calculations.
- Weekly availability matrix.
- Booking request review (frontend-only).
- Booking progress.
- Work completion confirmation.
- Demo earnings ledger.
- Completed booking feedback.

### Buyer Dashboard

- Machine discovery.
- Search and filtering.
- Booking request status tracking (frontend-only).
- Booking details modal.
- Demo payment history.
- Completed work.
- Review eligibility.
- Local review feedback.
- Notifications and demo sign-out.

All items in the Admin, Machine Owner, and Buyer dashboard lists above are UI demonstrations using retained sample records; they are not implemented backend actions. Dashboard records are retained sample data, and dashboard interactions are frontend-only; no records are persisted to a backend. Payment rows, including failed attempts, and earnings figures are retained samples; no payment attempt is created or persisted by the frontend.

---

## 9. Accessibility and Responsive Design

The frontend follows these design practices:

- Responsive layouts for desktop, tablet, and mobile.
- Skip links to main content.
- Keyboard-accessible interactive elements.
- Visible focus indicators.
- Appropriate labels for form fields.
- Accessible status messages.
- Meaningful image alternative text.
- Reduced-motion preference support.
- Consistent spacing and readable typography.
- Mobile navigation and dashboard drawer behaviour.

The frontend review includes responsive checks and static source inspections. Refer to `task.md` for the recorded verification details.

---

## 10. Prototype Limitations

Authentication and role-based access are implemented for the current Phase 5.5 scope, but IdleMach marketplace business workflows remain incomplete.

Implemented in the Laravel application (Phase 5.5):

- Owner and Buyer registration with server-side validation and CSRF protection.
- Owner company creation during owner registration in a database transaction.
- Login, logout, session regeneration/invalidation, remember-me, and rate limiting.
- Role-based dashboard route protection (`auth` + `role:*`) and cross-role access denial.
- Company/Machine ownership policies and ownership foundation tests (authorization foundation; CRUD workflows not implemented).
- Automated PHPUnit/SQLite tests and manual local Laragon/MySQL checks as recorded above.

Not implemented / not connected:

- Company and Machine CRUD workflows.
- Machine creation and editing connected to the database.
- Booking workflows.
- Payment workflows.
- Review workflows.
- Real payment gateway integration.
- File uploads.
- Notification delivery.
- Persistent marketplace/business records beyond the implemented authentication/company-registration foundation.

Existing dashboard sample records remain frontend-only. A successful demo interaction outside the implemented authentication/role-access flows does not mean data has been saved to a database or that a real transaction has occurred.

The refund policy remains unresolved, and no refund workflow is implemented. The approved MVP payment model uses simulated/demo records only: multiple payment attempts may exist for a booking, failed attempts must be retained, and only one successful payment may confirm a booking. No real money is charged. In-app notifications are planned through Laravel Notifications using the database channel, but no notification classes, events, persistence, or notification delivery are implemented.

---

## 11. Development Roadmap

The accepted frontend milestones through Phase 4.6 are in place; `task.md` records Phase 0, Phase 1, and Phase 3 as partially completed because of the specific open items noted above. Phase 5.5 is complete with warnings; marketplace business workflows remain pending.

| Phase   | Description                                                                                          |
| ------- | ---------------------------------------------------------------------------------------------------- |
| Phase 5 | Laravel 13 Application Foundation - partially complete (remaining non-auth foundation verification/items as tracked in `task.md`) |
| Phase 5.5 | Authentication, Role Access, Ownership Foundation, and Security Verification - complete with warnings |
| Phase 6 | Authentication and Role Access - core implementation completed in Phase 5.5; remaining related items tracked in `task.md` |
| Phase 7 | Machine Owner Module - pending (Company/Machine CRUD not connected)                                  |
| Phase 8 | Admin Module and Machine Approval - pending                                                          |
| Phase 9 | Buyer Marketplace - pending                                                                          |
| Phase 10 | Booking Workflow - pending                                                                          |
| Phase 11 | Payment Records and Booking Confirmation - pending                                                  |
| Phase 12 | Work Progress, Completion, and Reviews - pending                                                    |
| Phase 13 | Notifications - pending                                                                             |
| Phase 14 | Security, Testing, and Release Preparation - pending                                                |
| Phase 15 | Optional Future Enhancements - pending                                                              |

For detailed tasks, dependencies, open decisions, and completion criteria, refer to the root-level `task.md`.

---

## 12. Project Documentation

The repository contains additional documentation for product and technical decisions.

| Document           | Purpose                                              |
| ------------------ | ---------------------------------------------------- |
| `prd.md`           | Product requirements and MVP scope                   |
| `Rules.md`         | Mandatory project, coding, and security rules        |
| `architecture.md`  | Technical architecture and application structure     |
| `Design.md`        | UI and visual design guidance                        |
| `memory.md`        | Concise project context                              |
| `task.md`          | Development roadmap, task status, and open decisions |
| `CapacityShare.md` | Original project notes and historical requirements   |

Follow the documented decision hierarchy when requirements conflict. Do not invent missing business rules or silently expand the approved MVP scope.

---

## 13. Important Development Rules

1. Preserve the existing page structure unless a change is required.
2. Reuse shared CSS components wherever possible.
3. Avoid unnecessary duplicate CSS and JavaScript.
4. Do not modify unrelated dashboards when working on a specific page.
5. Keep backend limitations clear and do not present frontend-only interactions as live services.
6. Do not claim that demo interactions perform real backend operations.
7. Do not invent machine specifications, company information, ratings, or testimonials.
8. Keep the existing design consistent across all public pages.
9. Test desktop, tablet, and mobile layouts after UI changes.
10. Follow `Rules.md`, `Design.md`, `architecture.md`, and `prd.md` before implementing new functionality.

---

**IdleMach — Turn Idle Capacity Into Opportunity.**