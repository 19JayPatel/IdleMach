# IdleMach — Frontend Prototype

**Tagline:** Turn Idle Capacity Into Opportunity.

IdleMach is a manufacturing-capacity marketplace concept that connects machine owners who have unused manufacturing hours with buyers who need manufacturing work.

This repository currently contains the static frontend prototype built using HTML, CSS, JavaScript, Bootstrap 5, and Font Awesome.

The frontend demonstrates the public website, marketplace discovery, machine details, authentication interfaces, and role-based dashboard experiences.

> **Important:** This is a frontend prototype, not a live marketplace. Laravel, PHP backend functionality, MySQL, real authentication, live bookings, file uploads, and real payment processing are not connected.

---

## 1. Project Status

The frontend implementation currently covers:

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

**Current next stage:** Phase 4.5 — Demo Content Cleanup and Image Integration.

The frontend has been reviewed and accepted as a prototype. The remaining image cleanup and integration tasks must be completed before moving to the Laravel application foundation.

Refer to the repository's `task.md` for detailed task progress and verification notes.

---

## 2. Technology Stack

| Technology         | Purpose                                  |
| ------------------ | ---------------------------------------- |
| HTML5              | Page structure and content               |
| CSS3               | Custom styling and responsive layouts    |
| JavaScript         | Frontend interactions and demo behaviour |
| Bootstrap 5.3.3    | Responsive grid and UI components        |
| Font Awesome 6.7.2 | Icons                                    |
| SVG                | Custom industrial illustrations          |

Bootstrap and Font Awesome are stored locally in the project. The frontend does not depend on external CDNs for these libraries.

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

---

## 4. Available Pages

| Page             | File                   | Purpose                                                                                                    |
| ---------------- | ---------------------- | ---------------------------------------------------------------------------------------------------------- |
| Home             | `index.html`           | Marketplace introduction, hero, discovery preview, owner and buyer sections, and sample listings           |
| Explore Machines | `machines.html`        | Search, filter, sort, and discover sample machine listings                                                 |
| Machine Details  | `machine-details.html` | Machine information, gallery, specifications, capacity, availability, and demo booking form                |
| How It Works     | `how-it-works.html`    | Owner journey, buyer journey, admin role, and nine-stage booking workflow                                  |
| About            | `about.html`           | Marketplace purpose, platform principles, roles, and calls to action                                       |
| Contact          | `contact.html`         | Contact enquiry form with local validation and demo feedback                                               |
| Login            | `login.html`           | Login interface and dashboard preview links                                                                |
| Register         | `register.html`        | Owner and buyer registration interface                                                                     |
| Admin Dashboard  | `admin-dashboard.html` | Demo machine approvals, booking monitoring, and administrative overview                                    |
| Owner Dashboard  | `owner-dashboard.html` | Company profile, machine management, capacity, availability, booking requests, work, earnings, and reviews |
| Buyer Dashboard  | `buyer-dashboard.html` | Machine discovery, booking tracking, payment history, completed work, and reviews                          |
| Styleguide       | `styleguide.html`      | Design tokens, reusable components, and frontend styling reference                                         |

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

### Planned image integration

The About page may receive an additional industrial manufacturing workspace image.

**Status:** Pending image generation, review, and integration.

The image should:

- Represent a believable manufacturing environment.
- Use realistic industrial equipment and proportions.
- Match the existing website's visual direction.
- Avoid excessive effects and artificial-looking details.
- Work well within the existing responsive layout.

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
- Prototype notices and feedback.

### Machine marketplace

- Keyword search.
- Process and location filters.
- Availability and rate filters.
- Sorting.
- Result count updates.
- Empty states.
- Machine details navigation.

### Authentication interfaces

- Login form validation.
- Password visibility toggle.
- Owner and buyer registration selection.
- Dynamic company fields.
- Prototype-only feedback.

### Admin Dashboard

- Dashboard overview.
- Machine approval and rejection demonstration.
- Booking audit views.
- Recent activity.
- Business rules reference.
- Responsive sidebar navigation.

### Machine Owner Dashboard

- Company profile demonstration.
- Machine listing management.
- Add Machine form.
- Capacity calculations.
- Weekly availability matrix.
- Booking request review.
- Booking progress.
- Work completion confirmation.
- Demo earnings ledger.
- Completed booking feedback.

### Buyer Dashboard

- Machine discovery.
- Search and filtering.
- Booking request status tracking.
- Booking details modal.
- Demo payment history.
- Completed work.
- Review eligibility.
- Local review feedback.
- Notifications and demo sign-out.

All dashboard records and interactions are illustrative.

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

The following features are not connected to a backend:

- Real user registration and login.
- Authentication and session management.
- MySQL database operations.
- Real machine listing creation.
- Actual image uploads.
- Live marketplace search.
- Real booking requests.
- Owner acceptance stored on a server.
- Real payment gateway integration.
- Actual payment collection or refunds.
- Email and SMS notifications.
- Real-time messaging.
- Persistent user-generated reviews.

The prototype uses sample data and local interface behaviour only.

A successful demo interaction does not mean that data has been saved to a database or that a real transaction has occurred.

---

## 11. Development Roadmap

The next development stages are planned as follows:

| Phase     | Description                                   |
| --------- | --------------------------------------------- |
| Phase 4.5 | Demo Content Cleanup and Image Integration    |
| Phase 5   | Laravel Application Foundation                |
| Phase 6   | Authentication and Role Access                |
| Phase 7   | Machine Owner Module                          |
| Phase 8   | Admin Module and Machine Approval             |
| Phase 9   | Buyer Marketplace                             |
| Phase 10  | Booking Workflow                              |
| Phase 11  | Demo Payment Records and Booking Confirmation |
| Phase 12  | Work Progress, Completion, and Reviews        |
| Phase 13  | Notifications                                 |
| Phase 14  | Security, Testing, and Release Preparation    |
| Phase 15  | Optional Future Enhancements                  |

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
5. Keep all prototype behaviour clearly labelled.
6. Do not claim that demo interactions perform real backend operations.
7. Do not invent machine specifications, company information, ratings, or testimonials.
8. Keep the existing design consistent across all public pages.
9. Test desktop, tablet, and mobile layouts after UI changes.
10. Follow `Rules.md`, `Design.md`, `architecture.md`, and `prd.md` before implementing new functionality.

---

**IdleMach — Turn Idle Capacity Into Opportunity.**
