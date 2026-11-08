# IdleMach — Frontend Prototype

Static frontend workspace for **IdleMach**, a manufacturing-capacity marketplace.
The project currently covers **Phase 0.2 (Frontend Workspace Setup)**, **Phase 1
(Frontend Design Foundation)**, **Phase 2.1 (Home Page)**, **Phase 2.2
(Explore Machines)**, **Phase 2.3 (Machine Details)**, **Phase 2.4
(How It Works)**, **Phase 2.5 (About and Contact)**, **Phase 2.6
(Login and Registration)**, **Phase 3.1 (Admin Dashboard)**, **Phase 3.2
(Machine Owner Dashboard)**, and **Phase 3.3 (Buyer Dashboard)**.

> Tagline: **Turn Idle Capacity Into Opportunity.**

No Laravel, PHP, MySQL, real authentication, live payment gateway, or live
database is connected in this stage. The Login and Registration pages demonstrate
the public authentication interface locally. The Admin Dashboard provides an
administrative monitoring prototype with interactive sample machine approval
and rejection flows, booking audit monitoring, and documented business rule
references. The Machine Owner Dashboard provides an operational workspace
prototype with sample machine listings, capacity calculation
(total/booked/available), a weekly availability matrix, booking request review
with workflow-ordered acceptance, ongoing and completed work tracking with a
physical-completion confirmation, a sample earnings ledger, and completed-booking
buyer feedback. The Buyer Dashboard provides sample machine discovery with
search and filters, booking request tracking across the documented statuses,
a payment history ledger, completed-work tracking, and a compact review summary
with a modal review form restricted to completed, not-yet-reviewed bookings. All
sample records are illustrative and explicitly labelled.

---

## How to run locally

The pages are static, but they should be served over HTTP rather than opened as
`file://` so relative assets and Bootstrap behaviour match a normal environment.

From the project root (`D:\Project`):

```powershell
cd IdleMach-Frontend
php -S localhost:8000
```

Then open:

- <http://localhost:8000/index.html> — public homepage (Phase 2.1)
- <http://localhost:8000/machines.html> — sample capacity discovery (Phase 2.2)
- <http://localhost:8000/machine-details.html?id=1> — sample machine details
  and booking-request UI (Phase 2.3; IDs 1–3)
- <http://localhost:8000/how-it-works.html> — owner and buyer journeys and the
  nine-stage booking workflow (Phase 2.4)
- <http://localhost:8000/about.html> — marketplace purpose, roles, workflow,
  principles, and calls to action (Phase 2.5)
- <http://localhost:8000/contact.html> — prototype contact form and prototype
  boundaries (Phase 2.5)
- <http://localhost:8000/login.html> — login interface demonstration with admin, owner, and buyer dashboard preview links (Phase 2.6)
- <http://localhost:8000/register.html> — registration interface for machine owners and buyers (Phase 2.6)
- <http://localhost:8000/admin-dashboard.html> — platform admin dashboard: demo-labelled metrics, prioritised approvals and bookings, four management shortcuts, and an on-page business rules reference (Phase 3.1)
- <http://localhost:8000/owner-dashboard.html> — machine owner dashboard: machine listings, capacity calculation, weekly availability, booking requests review, ongoing/completed work, earnings, and reviews (Phase 3.2)
- <http://localhost:8000/buyer-dashboard.html> — buyer dashboard: sample capacity discovery, booking request tracking, payment history, completed work, and review eligibility (Phase 3.3)
- <http://localhost:8000/styleguide.html> — design foundation and components

Alternative if PHP is unavailable:

```powershell
cd IdleMach-Frontend
python -m http.server 8000
```

Any other static file server works as well.

---

## Page list (current stage only)

| Page             | Purpose                                                        |
| ---------------- | -------------------------------------------------------------- |
| `index.html`     | Phase 2.1 homepage: marketplace introduction, sample discovery, owner and buyer journeys, sample listings, and footer. |
| `machines.html`  | Phase 2.2 Explore Machines: sample listing search, filters, sorting, result counts, and empty state. |
| `machine-details.html` | Phase 2.3 Machine Details: sample overview, gallery, specifications, owner, pricing, capacity, availability summary, and a frontend-only booking request form rendered from `?id=1`, `?id=2`, or `?id=3`. |
| `how-it-works.html` | Phase 2.4 How It Works: owner journey, buyer journey, nine-stage workflow, business rules, admin review scope, and final calls to action. |
| `about.html`   | Phase 2.5 About: marketplace purpose, Machine Owner/Buyer/Admin roles, nine-stage workflow summary, five principles, and owner/buyer calls to action. |
| `contact.html` | Phase 2.5 Contact: locally validated prototype contact form, enquiry types, prototype-only success feedback, and stated absence of published contact details. |
| `login.html`   | Phase 2.6 Login: local form validation, password toggle, prototype notices, and admin/owner/buyer dashboard preview links. |
| `register.html`| Phase 2.6 Register: role selection (Owner / Buyer), dynamic company fields, validation, and demo feedback. |
| `admin-dashboard.html` | Phase 3.1 Admin Dashboard: responsive sidebar, top navigation, demo-labelled metric overview, prioritised machine approvals (view, approve, reject) and booking audit, recent activity feed, four management shortcuts, and an on-page business rules reference. |
| `owner-dashboard.html` | Phase 3.2 Machine Owner Dashboard: responsive sidebar, company profile view/edit, machine listing management with status toggling, Add Machine form, capacity formula meter, weekly availability matrix, incoming booking requests (view, accept, reject), booking progress tracking, work completion confirmation, sample earnings ledger, and completed booking reviews. |
| `buyer-dashboard.html` | Phase 3.3 Buyer Dashboard: responsive sidebar, top navigation, compact demo-labelled statistics overview, sample machine discovery (search, process, location, availability, rate filters, sorting), booking request tracking with status summaries, booking details modal, payment history ledger, completed-work table, compact review summary with a scrollable review modal limited to completed unreviewed work, notifications, and demo sign-out. |
| `styleguide.html`| Design token and shared-component reference.                   |

The Machine Details page reads one of the same three sample records used by the
homepage and Explore Machines. Invalid or missing IDs show a clear not-found
state with a link back to Explore Machines. The How It Works page explains the
intended product workflow without connecting any account, listing, booking,
payment, upload, or review. The About page uses only confirmed project concepts
and adds no invented company history, team, statistics, testimonials,
certifications, or guarantees. The Contact page validates locally but does not
send or store a message, and it states that official contact details will be
published before launch. Login, Registration, the Admin Dashboard, Machine Owner
Dashboard, and Buyer Dashboard are implemented at this stage. Controls for
management areas that are not built use a prototype modal or an informational
notice instead of pretending the page exists. All marketplace records remain
demonstration data only.

---

## Folder structure

```text
IdleMach-Frontend/
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
├── robots.txt             # allows crawlers for the static prototype
├── css/
│   └── style.css          # all shared styles and design tokens
├── js/
│   └── script.js          # shared interface behaviour
├── assets/
│   ├── icons/
│   │   └── favicon.svg    # provisional temporary mark
│   ├── images/            # original SVG machine illustrations for all pages
│   └── vendor/
│       ├── bootstrap/     # Bootstrap 5.3.3 (CSS + JS bundle)
│       └── fontawesome/   # Font Awesome 6.7.2 (CSS + webfonts)
└── README.md
```

Bootstrap and Font Awesome are vendored locally rather than loaded from a CDN so
the prototype works offline and does not depend on a third party at review time.

---

## Design system

All tokens live at the top of `css/style.css` under `:root`.

| Area        | Class / token                                                        |
| ----------- | -------------------------------------------------------------------- |
| Layout      | `.container-im`, `.section`, Bootstrap grid                          |
| Headings    | `.display-title`, `.page-title`, `.section-title`, `.eyebrow`        |
| Text        | `.lead`, `.hero-lead`, `.text-muted-im`, `.meta-label`, `.num`       |
| Buttons     | `.btn-im` + `-primary`, `-secondary`, `-outline`, `-danger`, `-sm`, `-lg` |
| Forms       | Bootstrap form controls restyled; `.form-required`, `.invalid-feedback` |
| Cards       | `.im-card`, `.im-card-header`, `.im-card-body`, `.im-card-footer`, `.im-card-accent` |
| Machine card| `.machine-card-media`, `.machine-card-title`, `.machine-card-facts`  |
| Status      | `.status-badge` + `.status-available`, `-pending`, `-rejected`, etc. |
| Feedback    | `.im-alert` + colour variants, `.empty-state`, `.confirmation-panel` |
| Homepage    | `.home-hero`, `.hero-roles`, `.discovery-panel`, `.search-chip`, `.process-rail`, `.journey-panel`, `.principle`, `.cta-band` |
| Explore     | `.machines-hero`, `.machines-demo-panel`, `.machine-filter-panel`, `.results-toolbar`, `.sort-control` |
| Details     | `.machine-detail-hero`, `.detail-panel`, `.detail-gallery*`, `.detail-spec-list`, `.availability-note`, `.booking-panel`, `.booking-estimate` |
| Buyer dashboard | `.buyer-stats-grid`, `.buyer-status-grid`, `.buyer-status-filter`, `.buyer-payment-summary`, `.buyer-detail-list`, `.buyer-review-summary`, `.buyer-review-queue`, `.buyer-review-form`, `.buyer-rating-options`, `.table-buyer-bookings`, `.table-buyer-payments`, `.table-buyer-completed` |
| How It Works| `.hiw-hero`, `.hiw-role-list`, `.hiw-steps`, `.hiw-step-number`, `.hiw-aside`, `.hiw-mini-flow`, `.flow-rail`, `.flow-dot`, `.hiw-rules-panel`, `.hiw-admin-panel` |
| About/Contact| `.page-hero`, `.page-hero-panel`, `.purpose-steps`, `.role-columns`, `.contact-form-panel`, `.contact-aside`, `.contact-topic-list` |
| Preview     | `.preview-toast`, `.sg-*` style-guide-only helpers                   |

Status colours always appear with a text label and an icon, so colour is never
the only signal.

### Accessibility notes

- Skip link to main content on every page.
- Visible `:focus-visible` outlines on interactive elements.
- Minimum 44px height for primary buttons and form controls.
- Sticky-header scroll offset handled via `scroll-margin-top`.
- Reduced-motion preference respected.
- Alerts use `role="status"`, `role="note"`, or `role="alert"` as appropriate.

---

## Provisional design decisions

These are **not final brand decisions** and must be reviewed:

1. **Wordmark and mark.** `IdleMach` is set in the chosen UI font; the
   capacity-bar SVG is a temporary placeholder, not an approved logo.
2. **Colour palette.** Teal primary `#0F5C6B`, amber accent `#9A5B0B`, navy
   `#10202B`, and the status colours are proposals.
3. **Font family.** A system font stack (`Segoe UI`, `system-ui`, …) is used to
   avoid an external font dependency. A licensed brand typeface may replace it.
4. **Machine card content.** The homepage preview, Explore Machines page, and
   Machine Details page use the same three clearly labelled sample records
   (Haas CNC Turning Machine, Vertical Machining Centre, and Hydraulic Press
   Brake). Names, locations, rates, and capacities are illustrative only, not
   live listings or quotes. Model, material, and detailed technical fields are
   not provided in the sample data and are shown as unavailable rather than
   invented.
5. **Imagery.** The homepage, Explore Machines page, and Machine Details gallery
   use original SVG illustrations created for this prototype. No machine
   photography, customer logo, testimonial, rating, or certification has been
   approved or added. The illustration files are not presented as photographs of
   specific machines.
6. **Backend behaviour.** Every button and form is a local preview. Nothing is
   submitted, stored, or sent.
7. **Contact details.** No public email address, phone number, office address,
   social account, or business hours have been confirmed. The Contact page says
   they will be published before launch and does not display placeholders.

Update the tokens in one place when the brand direction is approved.

---

## JavaScript behaviour

`js/script.js` provides shared behaviour across the homepage, Explore Machines,
Machine Details, How It Works, About, and Contact pages:

- Sets the current year in the footer.
- Marks the active navigation item for the current page.
- Adds a shadow to the sticky header after scrolling.
- Closes the mobile navigation after a link is chosen.
- Shows a preview-only notice for `[data-preview-action]` controls.
- Runs local validation for the style-guide sample form.
- Filters the three homepage sample listings by keyword, process, and location.
- Applies homepage suggestion chips and process filters, clears filters, and
  announces result counts through a live region.
- Filters the three Explore Machines sample listings by keyword, process,
  location, availability, and rate range.
- Sorts Explore Machines results by recommended order, rate, or machine name,
  updates the visible result count, and shows an empty state when nothing
  matches.
- Resets all Explore Machines filters and returns focus to the keyword field.
- Opens an honest prototype modal for Login and Register controls instead of
  implying that authentication exists. On How It Works, the owner-context
  "List Your Machine" actions open the same modal with an action that links to
  the page's `#for-owners` section. On About, the same modal links to
  `how-it-works.html#for-owners`.
- Renders the matching Machine Details sample record from `?id=1`, `?id=2`, or
  `?id=3`, updates the page title, breadcrumb, overview, specifications, owner,
  pricing, capacity, and availability summary, and shows a not-found state for
  invalid or missing IDs.
- Builds the Machine Details gallery from the record's image list, supports
  thumbnail selection when a record has more than one image, and falls back
  clearly if an image cannot load.
- Validates the booking-request form locally, enforces the sample daily capacity
  as the requested-hours maximum, calculates a sample rate × hours estimate, and
  explains that no request, upload, payment, acceptance, or confirmation occurs.
- Validates the Contact form locally, including required fields, email format,
  and whitespace-only values; focuses the first invalid field, shows field-level
  errors, displays demo-only success feedback after a valid submit, and clears
  all states on reset. It never sends, stores, or delivers a message.
- Initializes the Admin Dashboard with the responsive sidebar/drawer,
  prototype notifications with mark-as-read, sample machine approval,
  rejection, and reset workflows, booking-detail audit modals, dynamic table
  scroll hints, and accessible confirmation modals. Pending Approvals and
  Recent Bookings are prioritised above the demo overview, the four management
  shortcuts show prototype notices, and the business rules reference is an
  on-page anchor rather than a modal.
- Initializes the Machine Owner Dashboard with machine listing management (view,
  edit, and active/inactive toggle), Add Machine modal form validation and a new
  `pending` demo listing, capacity-total recalculation, weekly availability
  matrix, incoming booking requests (view, accept transitioning only to
  `payment_pending`, reject), ongoing work progress updates for paid bookings,
  work completion behind a physical-completion checkbox, an earnings transaction
  ledger, and reviews restricted to completed sample bookings.
- Initializes the Buyer Dashboard with responsive sidebar and drawer behaviour,
  sample machine discovery using the existing three marketplace records
  (keyword, process, location, availability, and rate filters plus sorting,
  result counts, and an empty state), booking request status filters that keep
  `aria-pressed` in sync, a booking-details modal for all eight sample records,
  a compact review summary plus a scrollable review modal restricted to completed
  and not-yet-reviewed sample work, local-only review feedback that updates the
  summary, queue badge, score note, and review actions, notification
  mark-as-read, and a demo sign-out confirmation that returns to the login page.

There is no storage, network request, or backend call. All search interfaces
only filter sample records already present in their page; they do not query a
server. The Machine Details booking form never submits, uploads a file, creates a
database record, or contacts an owner. The Contact form performs local validation
only and never sends, stores, or delivers a message. Dashboard actions only modify
in-memory demonstration UI states.

---

## Scope boundaries

Do not treat this workspace as a working product. The pages are frontend
prototypes only. Still to come in later phases:

- Marketplace search over real approved listings and real booking requests.
- Real user authentication and session management.
- Laravel application, MySQL, authentication, payments, APIs, and backend
  messaging.
