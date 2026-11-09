# IdleMach — Frontend Prototype

IdleMach is a manufacturing-capacity marketplace designed to connect machine owners who have unused manufacturing capacity with buyers who need manufacturing services.

**Tagline:** Turn Idle Capacity Into Opportunity.

This folder contains the static frontend prototype of IdleMach. It is built using HTML, CSS, JavaScript, Bootstrap 5, and Font Awesome.

The frontend is being prepared for a future Laravel, PHP, and MySQL implementation.

---

## 1. Current Project Status

| Area | Current status |
|---|---|
| Public website pages | Implemented |
| Login and Registration UI | Implemented as frontend prototypes |
| Admin Dashboard | Implemented as frontend prototype |
| Machine Owner Dashboard | Implemented as frontend prototype |
| Buyer Dashboard | Implemented as frontend prototype |
| Shared CSS and JavaScript | Implemented |
| Responsive layouts | Reviewed and accepted by the user |
| Existing prototype interactions | Reviewed and accepted by the user |
| Laravel backend | Not connected |
| MySQL database | Not connected |
| Real authentication | Not implemented |
| Live payment gateway | Not connected |
| Real machine listings and bookings | Not connected |
| Demo content cleanup | Planned |
| Approved local image integration | Planned |

**Frontend review confirmation — 9 November 2026**

The user has reviewed all current website pages and confirmed that the design, section-wise content, responsiveness, and existing prototype functionality are satisfactory.

The current design and page structure must be preserved during the next cleanup stage. The upcoming work is focused on removing temporary demonstration content and replacing temporary imagery with approved local images, not redesigning the website.

A static source review was also performed on the project branch. It checked the 12 HTML pages, shared CSS, shared JavaScript, and local page links. Static inspection does not replace a complete live-browser test.

---

## 2. Technology Stack

| Technology | Purpose |
|---|---|
| HTML5 | Page structure |
| CSS3 | Custom styling and responsive layouts |
| JavaScript | Frontend interactions |
| Bootstrap 5.3.3 | Responsive grid and UI utilities |
| Font Awesome 6.7.2 | Icons |
| PHP local development server | Serving static frontend pages during development |

Bootstrap and Font Awesome are stored locally under `assets/vendor/`. This allows the frontend prototype to work without depending on external CDN requests for these libraries.

No frontend framework or backend framework is connected in this stage.

---

## 3. Pages Included

The current frontend contains 12 HTML pages.

| File | Purpose |
|---|---|
| `index.html` | Homepage, marketplace introduction, owner and buyer journeys |
| `machines.html` | Explore Machines, search, filters, sorting, and results |
| `machine-details.html` | Machine information, image gallery, specifications, and booking-request UI |
| `how-it-works.html` | Machine Owner and Buyer journeys and the marketplace workflow |
| `about.html` | Marketplace purpose, roles, workflow, and principles |
| `contact.html` | Contact information layout and frontend-only contact form |
| `login.html` | Login interface and dashboard preview navigation |
| `register.html` | Registration interface for Machine Owners and Buyers |
| `admin-dashboard.html` | Admin overview, approval monitoring, booking monitoring, and business rules |
| `owner-dashboard.html` | Company profile, machine management, capacity, availability, bookings, work, earnings, and reviews |
| `buyer-dashboard.html` | Machine discovery, booking tracking, payments, completed work, and reviews |
| `styleguide.html` | Design tokens and reusable UI component reference |

The public website and three role-based dashboards are part of the same frontend prototype.

---

## 4. How to Run Locally

The pages should be served through a local HTTP server instead of opening them directly using `file://`.

### Option 1: PHP local server

Open a terminal in the project root and run:

```powershell
cd IdleMach-Frontend
php -S localhost:8000
```

Open the following address:

```text
http://localhost:8000/index.html
```

### Option 2: Python local server

If PHP is unavailable:

```powershell
cd IdleMach-Frontend
python -m http.server 8000
```

Then open:

```text
http://localhost:8000/index.html
```

### Important

- Keep the local server running while testing.
- Use the correct relative asset paths.
- Do not use `file://` for final testing.
- The frontend does not require a MySQL database at this stage.

---

## 5. Project Folder Structure

Current frontend structure:

```text
IdleMach/
│
├── IdleMach-Frontend/
│   │
│   ├── index.html
│   ├── machines.html
│   ├── machine-details.html
│   ├── how-it-works.html
│   ├── about.html
│   ├── contact.html
│   ├── login.html
│   ├── register.html
│   ├── admin-dashboard.html
│   ├── owner-dashboard.html
│   ├── buyer-dashboard.html
│   ├── styleguide.html
│   │
│   ├── css/
│   │   └── style.css
│   │
│   ├── js/
│   │   └── script.js
│   │
│   ├── assets/
│   │   ├── icons/
│   │   │   └── favicon.svg
│   │   │
│   │   ├── images/
│   │   │   └── Current prototype illustrations
│   │   │
│   │   └── vendor/
│   │       ├── bootstrap/
│   │       └── fontawesome/
│   │
│   └── README.md
│
├── CapacityShare.md
├── Design.md
├── Rules.md
├── architecture.md
├── memory.md
├── prd.md
└── task.md
```

The `assets/images/` directory currently contains the prototype's existing illustrations. Its contents will be reviewed and reorganized during Phase 4.5 after the approved image collection is provided.

### Planned image organization

The following is the proposed organization for the approved local images. Create only the folders that are actually needed.

```text
assets/
└── images/
    ├── logo/
    ├── hero/
    ├── machines/
    ├── industries/
    ├── about/
    ├── team/
    └── common/
```

Image filenames must be confirmed from the actual files before they are referenced in HTML or CSS.

---

## 6. Design System

The shared design system is defined in:

```text
css/style.css
```

It contains:

- CSS custom properties and design tokens.
- Page containers and section spacing.
- Typography and text styles.
- Buttons and form controls.
- Cards and content panels.
- Status badges.
- Alerts and empty states.
- Public website navigation and footer.
- Dashboard layout and responsive sidebars.
- Table styles and responsive table wrappers.
- Modal and confirmation styles.
- Mobile and tablet responsive rules.

The existing design system and section hierarchy have been accepted as the current design baseline.

**Do not redesign existing pages during the content and image cleanup.**

Any future visual change must be limited to the specific requirement being addressed.

---

## 7. JavaScript Functionality

Shared JavaScript is maintained in:

```text
js/script.js
```

The frontend currently includes prototype interactions such as:

- Active navigation and mobile navigation.
- Sticky header behaviour.
- Homepage search and suggestion filters.
- Explore Machines search, filters, sorting, and empty state.
- Machine Details rendering from the current sample records.
- Machine Details gallery interactions.
- Frontend-only booking request validation.
- Contact form validation.
- Login and Registration form validation.
- Password visibility controls.
- Admin Dashboard prototype approval and rejection actions.
- Machine Owner Dashboard machine and booking interactions.
- Buyer Dashboard discovery, booking, payment, and review preview interactions.
- Dashboard notifications and modal interactions.
- Responsive dashboard sidebar and mobile drawer behaviour.

These interactions are frontend demonstrations. They do not create or update real database records.

During Phase 4.5, existing interactions should be reviewed when their underlying sample data is removed. Do not leave broken buttons or controls that depend on deleted records.

---

## 8. Prototype Limitations

The current frontend is not a live marketplace.

The following features are not connected to a real backend:

1. User registration and authentication.
2. Login sessions and role-based authorization.
3. Company profile persistence.
4. Machine listing creation and management.
5. Real machine image uploads.
6. Database-backed machine availability.
7. Real booking requests and owner acceptance.
8. Real payment processing.
9. Payment confirmation and refunds.
10. Work progress and completion persistence.
11. Real reviews and ratings.
12. Live notifications and messaging.
13. Admin management of real users, machines, and bookings.

The frontend uses local prototype behaviour only.

No button, form, notification, payment, booking, or success message should imply that a real transaction or database update has occurred.

---

## 9. Phase 4.5 — Demo Content and Image Cleanup

The next frontend task is to prepare the existing accepted design for a more realistic project presentation.

### 9.1 Demo and sample content

Review all 12 pages and identify:

- Sample machine listings.
- Dummy company and user information.
- Illustrative prices, locations, and capacities.
- Fake dashboard statistics.
- Sample booking and payment records.
- Sample earnings and reviews.
- Sample notifications and activity records.
- Other temporary demonstration information.

Remove temporary records where they are no longer needed.

Do not invent actual business information to replace them.

### 9.2 Empty states

When actual backend data is unavailable, retain the existing section layout and display meaningful empty states.

Examples:

- No machines available yet.
- No booking requests found.
- No payment records available.
- No completed work yet.
- No reviews received.
- No new notifications.

Empty states should use the existing design system.

### 9.3 Image replacement

- Use the approved images supplied for IdleMach.
- Store images under `assets/images/`.
- Use local relative paths.
- Replace temporary external or illustrative image references where appropriate.
- Preserve image dimensions, cropping, and responsive behaviour.
- Do not reference filenames that do not exist.
- Keep suitable fallback behaviour for unavailable images.

### 9.4 Design preservation

- Keep all existing page sections unless a specific requirement says otherwise.
- Preserve the accepted page layouts.
- Preserve the existing dashboard navigation and structure.
- Avoid unrelated CSS and JavaScript changes.
- Test all affected pages after each controlled change.

### 9.5 Final review

After cleanup:

- Review all 12 pages.
- Check image loading.
- Check empty states.
- Check navigation and internal links.
- Check existing prototype interactions.
- Check desktop, tablet, and mobile layouts.
- Check the browser console and failed asset requests.
- Update this README with the actual final image folder structure and cleanup status.

---

## 10. Development Roadmap

| Phase | Description | Status |
|---|---|---|
| Phase 0 | Project setup and requirement review | Completed |
| Phase 1 | Frontend design foundation | Completed; final brand decisions remain open |
| Phase 2 | Public website prototype | Implemented |
| Phase 3 | Dashboard frontend prototype | Implemented |
| Phase 3.4 | Dashboard integration and consistency testing | Completed |
| Phase 4 | Frontend review and acceptance | User accepted; static source review recorded |
| Phase 4.5 | Demo content cleanup and image integration | Next task |
| Phase 5 | Laravel application foundation | Not started |
| Phase 6 | Authentication and role access | Not started |
| Phase 7 | Machine Owner module | Not started |
| Phase 8 | Admin module and machine approval | Not started |
| Phase 9 | Buyer marketplace | Not started |
| Phase 10 | Booking workflow | Not started |
| Phase 11 | Demo payment records and booking confirmation | Not started |
| Phase 12 | Work progress, completion, and reviews | Not started |
| Phase 13 | Notifications | Not started |

Refer to the root `task.md` for detailed tasks and completion criteria.

---

## 11. Important Development Rules

1. Preserve the accepted frontend design.
2. Do not redesign all pages when only content or images need changing.
3. Do not modify unrelated CSS or JavaScript.
4. Do not invent real business data, users, companies, prices, or statistics.
5. Do not claim prototype actions are connected to a backend.
6. Keep empty states clear and consistent.
7. Use only approved local image assets.
8. Verify actual filenames and paths before using images.
9. Test affected pages after each change.
10. Keep the public website and all three dashboards visually consistent.
11. Follow the approved product rules in `prd.md` and `Rules.md`.
12. Update `task.md` and this README when a development phase is completed.

---

## 12. Next Development Step

**Complete Phase 4.5 — Demo Content Cleanup and Image Integration.**

The current website design and page structure are accepted. The next work should focus on removing temporary sample content, organizing approved images, replacing temporary imagery, and adding meaningful empty states.

Once the cleaned frontend is reviewed and approved, begin Phase 5 and convert the approved frontend into Laravel Blade templates.

**Do not begin backend integration before the frontend cleanup and final review are complete.**
