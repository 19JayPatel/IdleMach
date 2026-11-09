# IdleMach --- Development Task Plan

**Project:** IdleMach\
**Tagline:** Turn Idle Capacity Into Opportunity\
**Purpose:** Provide an actionable task breakdown for planning and
building IdleMach.

------------------------------------------------------------------------

## How to Use This File

-   Work through tasks in the order shown unless a dependency requires a
    different order.
-   Mark a task complete only after implementation and the relevant
    checks are finished.
-   Keep unresolved product decisions in the **Open Decisions** section;
    do not guess.
-   The initial milestone is a frontend-only prototype using HTML, CSS,
    vanilla JavaScript, Bootstrap 5, and Font Awesome.
-   Laravel, PHP, and MySQL implementation follows after the frontend
    prototype is reviewed.

### Task status convention

Use these labels when tracking progress:

-   `[ ]` Not started
-   `[x]` Completed and checked
-   `[!]` Blocked or waiting for a decision

This document is a task plan, not evidence that any task has already
been completed.

------------------------------------------------------------------------

# Phase 0 --- Project Setup and Requirement Review

## 0.1 Review the project documents

-   [ ] Read `prd.md` and understand the product goals and MVP scope.
-   [ ] Read `architecture.md` and understand the proposed application
    structure.
-   [ ] Read `Rules.md` and follow the coding, security, workflow, and
    scope rules.
-   [ ] Read `Design.md` and follow the approved design direction.
-   [ ] Review the original `CapacityShare.md` notes when a requirement
    needs clarification.
-   [ ] List unresolved product and design decisions before implementing
    dependent features.
-   [ ] Confirm the first prototype sitemap and which pages are in
    scope.

## 0.2 Prepare the frontend workspace

-   [x] Create or inspect the project folder.
-   [x] Establish the agreed HTML page structure.
-   [x] Create the shared `css/style.css` file.
-   [x] Create the shared `js/script.js` file.
-   [x] Create the required `assets/images/` folder.
-   [x] Add Bootstrap 5 and Font Awesome using the project's chosen
    inclusion method.
-   [x] Confirm all pages can load the shared CSS and JavaScript files.
-   [x] Run the project locally and verify that the starting page opens.

**Exit check:** The frontend workspace runs locally, shared assets load,
and the agreed page list is documented.

> **Workspace note:** The frontend is in `IdleMach-Frontend/`. Bootstrap
> 5.3.3 and Font Awesome 6.7.2 are stored locally under `assets/vendor/`
> so the prototype works offline. The current page list (`index.html` and
> `styleguide.html`) is documented in `IdleMach-Frontend/README.md`.
> Later product pages remain out of scope for this phase.

------------------------------------------------------------------------

# Phase 1 --- Frontend Design Foundation

## 1.1 Establish shared design tokens

-   [!] Confirm the brand logo/wordmark direction.
-   [!] Confirm the final colour palette.
-   [!] Confirm the font family and typography scale.
-   [x] Define CSS custom properties for colours, spacing, borders,
    radii, and shadows.
-   [x] Define consistent page containers and section spacing.
-   [x] Define reusable heading, body text, muted text, and metadata
    styles.

> **Provisional tokens:** A temporary capacity-bar mark, palette, and
> system font stack are implemented in `css/style.css` and documented in
> `README.md`. They must not be treated as final brand decisions.

## 1.2 Build shared UI components

-   [x] Create the public website header.
-   [x] Create the responsive mobile navigation.
-   [x] Create the public website footer.
-   [x] Create primary, secondary, outline, and danger button styles.
-   [x] Create consistent form fields and validation message styles.
-   [x] Create status badge styles for machine, availability, booking,
    and payment states.
-   [x] Create reusable card and content panel styles.
-   [x] Create alert, empty-state, and confirmation styles.
-   [ ] Create dashboard navigation/sidebar styling if dashboard pages
    are in the prototype scope.

> **Dashboard note:** Dashboard pages are not in Phase 1 scope, so this
> item is not applicable yet and no sidebar has been built. Dashboard
> scope is tracked in Open Decisions; dashboards belong to Phase 3.

## 1.3 Check the design foundation

-   [x] Verify shared components look consistent across pages.
-   [x] Verify keyboard focus states.
-   [x] Verify text contrast and readable font sizes.
-   [x] Verify shared components work on desktop, tablet, and mobile.
-   [x] Remove unused or duplicate CSS rules.

**Exit check:** Shared styles and components are consistent and ready to
be reused by individual pages.

> **Checked in browser:** Both pages were tested at 320, 390, 768, 1024,
> 1440, and 1920 CSS px. The mobile menu, preview toast, form validation,
> reset, active navigation, sticky-header shadow, and skip link were
> exercised. Lighthouse reported 100 for accessibility, best practices,
> and SEO on both pages. No console errors or horizontal overflow were
> found.

------------------------------------------------------------------------

# Phase 2 --- Public Website Prototype

## 2.1 Home page

-   [x] Build the public header and navigation.
-   [x] Create a hero section that explains IdleMach as a
    manufacturing-capacity marketplace.
-   [x] Include the tagline: "Turn Idle Capacity Into Opportunity."
-   [x] Make the Machine Owner and Buyer journeys clear.
-   [x] Add the approved marketplace discovery entry point, if included
    in the prototype scope.
-   [x] Add a simple "How It Works" section.
-   [x] Add an owner-focused section explaining the purpose of listing
    unused capacity.
-   [x] Add a buyer-focused section explaining how to discover
    manufacturing capacity.
-   [x] Add relevant manufacturing imagery or clearly identified
    placeholders.
-   [x] Add the public footer.
-   [x] Check the page at desktop, tablet, and mobile widths.

> **Checked in browser:** `index.html` was tested at 320, 360, 390, 414,
> 576, 768, 820, 991, 992, 1024, 1180, 1440, and 1920 CSS px. The mobile
> menu, sample search (keyword, process, location, suggestion chips,
> reset, and empty state), login prototype modal, preview notice, anchor
> targets, scroll offsets, image loading, and focus handling were
> exercised. Lighthouse reported 100 for accessibility, best practices,
> and SEO; the W3C validator reported no errors. No console errors or
> horizontal overflow were found.
>
> Marketplace records are labelled sample/demo data. At the time of this
> Phase 2.1 check, Explore Machines, Machine Details, Login, and
> Registration remained later phases. Explore Machines was completed in
> Phase 2.2 below; the others remain later phases.

## 2.2 Explore Machines page

-   [x] Build the page heading and short introduction.
-   [x] Build the machine search interface.
-   [x] Add only the filters supported by the agreed sample data and
    requirements.
-   [x] Create reusable machine result cards or list rows.
-   [x] Display available machine information without inventing missing
    specifications.
-   [x] Add working client-side search/filter behaviour for the
    prototype.
-   [x] Add a no-results empty state.
-   [x] Pagination/load-more was not required for the three sample
    records; no control was added.
-   [x] Provide a working Machine Details link for each sample record.
-   [x] Test the layout on desktop, tablet, and mobile.

> **Checked in browser:** `machines.html` was tested at 320, 360, 390,
> 414, 576, 768, 820, 991, 992, 1024, 1180, 1440, and 1920 CSS px. The
> mobile menu, keyword search (machine, process, owner, and location),
> each process/location/availability/rate filter, combined filters,
> sorting, reset, empty state, live result counts, Machine Details links,
> login prototype modal, active navigation, links, images, and
> icons were exercised. All network requests returned 200. No console
> errors or horizontal overflow were found. Lighthouse reported 100 for
> accessibility, best practices, and SEO; the W3C validator reported no
> messages for `index.html` or `machines.html`.
>
> The three records remain clearly labelled sample/demo data. Homepage
> "Explore Machines" links point to the new page, and its existing
> sample search was rechecked. Phase 2.3 has since replaced the
> provisional Machine Details notice with working details links; see the
> verification note below.

## 2.3 Machine Details page

-   [x] Display machine name and relevant listing information.
-   [x] Build the machine image gallery.
-   [x] Display machine type and available technical specifications.
-   [x] Display owner/company information that is appropriate for public
    viewing.
-   [x] Display location and rate when sample data provides them.
-   [x] Display capacity and availability information when defined.
-   [x] Add a booking-request call to action for the prototype.
-   [x] Make inactive or unavailable states clear.
-   [x] Check image sizing, gallery behaviour, and responsive layout.

> **Checked in browser:** `machine-details.html` was opened with sample
> IDs 1, 2, and 3. The matching name, process, owner, location, status,
> rate, and daily capacity appeared for each record; model, material, and
> detailed technical fields remained clearly marked as not provided.
> Invalid ID `99` and a missing `id` both showed the not-found state and
> links back to Explore Machines.
>
> The gallery loaded the correct illustration for all three records. The
> image fallback was tested by forcing a failed image source and displayed
> its unavailable message. Each current sample record has only one image,
> so the implemented thumbnail selector stays hidden and that limitation
> is stated on the page.
>
> Booking validation was tested with empty fields, a requested 9 hours
> against the 4-hour sample capacity, and a valid 4-hour request. Required
> fields were highlighted, focus moved to the first invalid field, the
> capacity limit blocked an excessive request, the estimate updated to
> rate × hours, and a valid submit showed only a demo/no-submission notice.
> No request, file upload, storage, payment, acceptance, or confirmation
> occurred; no network submission was made.
>
> The page was tested at 320, 375, 576, 768, 992, 1280, and 1920 CSS px.
> The booking panel sits below the listing content on tablet/mobile and
> beside it from 992 px. Images, Font Awesome icons, links, the mobile
> navigation, and all assets loaded without console errors or horizontal
> overflow. The homepage and Explore Machines search/filter behaviour were
> rechecked and their sample cards now link to the correct details IDs.
> Lighthouse reported 100 for accessibility, best practices, and SEO on
> the valid details page, the not-found state, `machines.html`, and
> `index.html`. The W3C validator reported no errors or warnings for
> `machine-details.html`, `index.html`, and `machines.html`.

## 2.4 How It Works page

-   [x] Explain the Machine Owner journey.
-   [x] Explain the Buyer journey.
-   [x] Preserve the documented sequence: listing/discovery, request,
    owner decision, payment, booking, work, completion, and review.
-   [x] Make clear that owner acceptance happens before payment.
-   [x] Make clear that successful payment is required before booking
    confirmation.
-   [x] Check that the page uses simple, consistent language.

> **Checked in browser:** `how-it-works.html` was opened from the shared
> navigation and tested at 320, 375, 576, 768, 992, 1280, 1440, and
> 1920 CSS px. The page shows all six Machine Owner steps and all eight
> Buyer steps, plus the nine-stage workflow:
> LIST → DISCOVER → REQUEST → ACCEPT → PAY → BOOK → WORK → COMPLETE →
> REVIEW. The page states that availability is checked before a request,
> the owner accepts before payment, successful payment confirms the
> booking, and only completed bookings are eligible for review. Admin
> review is described as a listing/platform check, not a certification or
> inspection.
>
> The hero and final "Explore Machines" actions, navigation links, and
> footer links point to `machines.html`. All three "List Your Machine"
> actions open the existing prototype auth modal with the owner context;
> its action reads "See how listing works" and points to `#for-owners` on
> the same page. No account, listing, booking, payment, upload, or review
> is created or submitted.
>
> Layouts stack correctly: the hero panel and journey side panels move
> below the timelines below 992 px, the workflow grid changes from nine
> columns at 992 px and above to three columns at 576–991 px and two
> columns below 576 px, and the rules grid becomes one column below
> 768 px. No horizontal overflow, console errors, failed requests, broken
> hash links, duplicate IDs, or missing icons/assets were found.
> Lighthouse reported 100 for accessibility, best practices, and SEO.
> The W3C validator reported no messages for `how-it-works.html`.
>
> The shared How It Works links in `index.html`, `machines.html`, and
> `machine-details.html` now point to the new page, and their footer phase
> labels read Phase 2.4. Those three pages were reopened and their active
> navigation, links, existing interactions, and console output were
> rechecked. The W3C validator also reported no messages for all three.
> `styleguide.html` was inspected for shared patterns but not changed.

## 2.5 About and Contact pages

-   [x] Build the About page using only confirmed project information.
-   [x] Build the Contact page.
-   [x] Use only confirmed contact details.
-   [x] Clearly label any contact form that is only a frontend
    demonstration.
-   [x] Check both pages on mobile.

> **Checked in browser:** `about.html` presents the marketplace purpose,
> the three documented roles (Machine Owners, Buyers, and Admins), the
> nine-stage workflow (LIST → DISCOVER → REQUEST → ACCEPT → PAY → BOOK →
> WORK → COMPLETE → REVIEW), five stated principles, and separate owner
> and buyer calls to action. The workflow links to `how-it-works.html`.
> The page uses only documented product concepts; no company history,
> team members, testimonials, statistics, certifications, or guarantees
> were added.
>
> `contact.html` contains Full Name, Email Address, Subject, Enquiry
> Type, and Message fields. Enquiry Type offers General Enquiry, Machine
> Owner Enquiry, Buyer Enquiry, Technical Support, and Other. Required
> fields, email format, and whitespace-only values are validated locally;
> invalid fields receive `.is-invalid`, `aria-invalid="true"`, and focus
> moves to the first invalid field. A valid submit shows a demo-only
> success message and toast, never a delivery or storage claim. Reset
> clears all field states and feedback. The form displays the exact
> notice: “This contact form is a prototype and is not connected to a
> live messaging system.”
>
> No official email address, phone number, office address, social media
> account, or business hours were confirmed, so none were displayed.
> Both pages state that official contact details will be published
> before launch.
>
> Navigation, footer About/Contact links, active states, and Phase 2.5
> footer labels were updated across `index.html`, `machines.html`,
> `machine-details.html`, `how-it-works.html`, `about.html`, and
> `contact.html`. The owner-context “List Your Machine” modal on About
> now targets `how-it-works.html#for-owners`; the homepage and How It
> Works page keep their same-page `#for-owners` target.
>
> Both new pages were tested at 320, 375, 576, 768, 992, 1280, 1440, and
> 1920 CSS px. The role columns stack below 992 px, the contact form and
> aside stack on narrower screens, and the mobile navigation expands
> correctly. No horizontal overflow, console errors, failed requests,
> missing icons, or broken internal links were found across the six
> public pages. Lighthouse reported 100 for accessibility, best
> practices, and SEO on both new pages. The W3C validator reported no
> messages for all six pages.

## 2.6 Login and Registration pages

-   [x] Build the Login page UI.
-   [x] Build the Registration page UI.
-   [x] Include role selection if it is part of the agreed registration
    flow.
-   [x] Add client-side form validation for user experience.
-   [x] Show clear field-level error messages.
-   [x] Add password visibility control if included in the design.
-   [x] Clearly label prototype-only behaviour.
-   [x] Do not claim an account is created or authenticated without a
    real backend.

> **Checked in browser:** `login.html` contains the IdleMach logo, a
> welcome heading, a short role description, Email Address and Password
> fields, a show/hide password control, a Remember Me checkbox, a
> forgot-password prototype notice, a Login button, a registration link,
> and a homepage link. Required and email-format validation run locally;
> errors appear beside the field, the first invalid field receives focus,
> and the Remember Me checkbox remains optional. A valid submit shows only
> a demo success message and toast. Forgot password shows a notice that
> recovery is not connected. Entered values are not stored anywhere.
>
> `register.html` offers only Machine Owner and Buyer role cards. Admin is
> not a public registration option; the page states that Admin accounts
> are managed separately. Common fields are Full Name, Email Address,
> Mobile Number, Password, Confirm Password, and the Terms and Conditions
> checkbox. Choosing Machine Owner reveals Company Name, City, and Company
> Address and notes that the remaining company profile is completed after
> registration. Choosing Buyer shows an informational panel instead of
> company fields. The page does not invent mandatory company-profile
> requirements.
>
> Validation covers required values, email format, the mobile number
> pattern, password confirmation matching, role selection, and the terms
> checkbox. Whitespace-only values are rejected, role and field errors are
> announced with visible text and `aria-invalid`, the first invalid field
> receives focus, and changing a role or editing a field clears the
> relevant error. Password visibility toggles update their label, icon, and
> `aria-pressed` state. Clear Form resets values, role selection, role
> panels, password visibility, errors, and success feedback. The form
> never navigates away, sends a request, or writes to `localStorage` or
> `sessionStorage`. `?role=owner` and `?role=buyer` preselect a role; any
> other value is ignored.
>
> Navigation on all six existing public pages now links Login to
> `login.html` and Register to `register.html`, with active states and
> Phase 2.6 footer labels. Owner calls to action on the homepage, About,
> and How It Works pages link to `register.html?role=owner`. The old
> `#authModal` markup, JavaScript, and CSS were removed, as were the unused
> `.nav-link-button` styles; no page still exposes `data-auth-action`
> controls.
>
> Both new pages were tested at 320, 375, 576, 768, 992, 1280, 1440, and
> 1920 CSS px. The context panel and form card stack below 992 px, role
> cards become one column below 576 px, the register actions stack below
> 576 px, and the mobile navigation opens, closes, and navigates correctly.
> No horizontal overflow, console errors, failed requests, missing icons,
> or broken links were found. The six existing pages were reopened and
> their active navigation, auth links, owner calls to action, console
> output, and network requests were rechecked. Lighthouse reported 100 for
> accessibility, best practices, and SEO on `login.html`, `register.html`,
> and all six existing pages. The W3C validator reported no errors on any
> of the eight pages; `login.html` and `register.html` each returned one
> informational note about `h1` usage.

**Exit check:** Every agreed public page is present, visually
consistent, responsive, and its prototype interactions work as
described.

------------------------------------------------------------------------

# Phase 3 --- Dashboard Frontend Prototype

> Build these screens if they are included in the approved frontend
> prototype scope. They are interface prototypes only until connected to
> Laravel and MySQL.

## 3.1 Shared dashboard structure

-   [x] Create a shared dashboard layout.
-   [x] Create role-specific navigation for Admin, Owner, and Buyer.
-   [x] Add a page title and breadcrumb pattern.
-   [x] Add a responsive sidebar or mobile drawer.
-   [x] Create consistent dashboard tables, filters, cards, and status
    indicators.
-   [x] Add empty states and action confirmation patterns.

> **Phase 3.1 implementation note:** The shared dashboard layout foundation
> is implemented in `admin-dashboard.html` with reusable styles in
> `css/style.css` (`.dashboard-layout`, `.dashboard-sidebar`,
> `.dashboard-topbar`, `.stat-card`, `.im-table`, `.dashboard-card`,
> `.activity-feed-list`, `.dashboard-shortcuts-grid`, and the responsive
> mobile drawer rules) and shared interactive behaviours in `js/script.js`.
> The admin navigation, responsive drawer, breadcrumb, stat cards, tables,
> activity feed, modals, and prototype notifications are browser-tested.
> Later role-specific dashboards can reuse the same layout, card, table,
> status-badge, and drawer primitives.

## 3.2 Machine Owner screens

-   [x] Owner dashboard overview.
-   [x] Company profile view/edit screen.
-   [x] Machine listing list.
-   [x] Add machine form.
-   [x] Edit machine form.
-   [x] Machine image management UI.
-   [x] Machine specifications UI.
-   [x] Machine rate and capacity UI.
-   [x] Machine availability/calendar UI.
-   [x] Incoming booking requests screen.
-   [x] Booking details screen.
-   [x] Booking status/progress screen.
-   [x] Relevant earnings/payment summary UI.
-   [x] Reviews screen.

> **Owner dashboard verified in browser (2026-11-08):** Checked at 320, 375,
> 576, 768, 992, 1024, and 1440 px using sized same-origin iframes. No page-level
> horizontal overflow at any width; wide request, machine, booking, payment, and
> weekly availability tables scroll inside their own wrappers. At widths below
> 992 px the sidebar becomes a drawer, the toggle appears, and the backdrop,
> `aria-expanded`, body scroll lock, close button, and navigation links all
> behave correctly. The drawer transition was verified with transitions disabled
> because background iframes can throttle CSS transitions. W3C validation reports
> 0 errors, Lighthouse reports 100 for Accessibility, Best Practices, and SEO,
> the browser console is clean, and `node --check js/script.js` passes. Admin and
> public pages were rechecked with no console errors or layout regressions.
>
> - Nine overview cards show 5 total machines, 3 active, 1 pending approval,
>   14 hrs/day available capacity, 2 pending requests, 1 accepted booking,
>   1 ongoing job, 25 completed bookings, and ₹1,84,600 illustrative earnings.
> - The three active sample lines show 30 hrs/day total, 16 booked, and 14
>   available. M-1004 (maintenance) and M-1005 (pending) are excluded from the
>   active-capacity totals. Editing M-1001 to 6 hrs/day recalculated the available
>   total from 14 to 12; deactivating it reduced the total to 6 and the active
>   count to 2; reactivating restored both.
> - BR-2041 is accepted and awaiting payment; BR-2042 and BR-2043 await an owner
>   decision. Accepting BR-2042 is blocked because M-1002 has 0 available hours.
>   Accepting BR-2043 sets `payment_pending`, reduces pending requests to 1, and
>   leaves the accepted-booking count at 1. Rejecting BR-2042 sets `rejected`
>   without creating a payment record. Reset restores the initial sample states.
> - Adding a machine creates a sixth row with status `pending`, increments Pending
>   Approvals to 2, and does not add to available capacity. Machine status words
>   are split into two fields: `approval_status` (`pending`, `approved`,
>   `rejected`) and `operational_status` (`active`, `inactive`,
>   `maintenance`). All approved machines are marketplace-visible, including
>   inactive and maintenance listings; only approved + active machines can
>   receive new booking requests.
> - Completion was tested on paid, in-progress CS-10026. Confirming without the
>   physical-work checkbox is blocked and leaves counts unchanged; with the
>   checkbox the status becomes `completed`, Ongoing Work falls from 1 to 0,
>   Completed Work rises from 25 to 26, and the row becomes review-eligible.
>   Progress notes update the local preview only.
> - The payment ledger shows 7 records: 4 successful sample payments totalling
>   ₹30,800, 1 pending ₹6,400, 1 failed ₹4,800, and 1 refunded ₹3,600. Failed and
>   refunded amounts are excluded from successful totals. No commission, tax,
>   withdrawal, or invoice figures are invented.
> - The three sample reviews belong only to completed bookings CS-10024,
>   CS-10022, and CS-10018 and are labelled as demonstration feedback. Sample
>   notifications go from 3 unread to 0 with mark-as-read. Company profile save
>   and owner sign-out show local preview notices only.
>
> All owner actions remain local prototype interactions and do not modify live
> data, create bookings, process payments, upload files, or send notifications.
> Settings is omitted because the documented owner routes and capabilities do not
> define an owner settings screen.

## 3.3 Buyer screens

-   [x] Buyer dashboard overview.
-   [ ] Buyer profile view/edit screen.
-   [x] Booking request form (existing Machine Details form linked from recommendations).
-   [x] Drawing/document upload UI (existing Machine Details form).
-   [x] Booking list.
-   [x] Booking details and status screen.
-   [x] Payment status screen.
-   [x] Completed booking screen.
-   [x] Review form and review history UI.
-   [x] Relevant notification list.

> **Buyer dashboard prototype verified in browser (2026-11-08):**
> `buyer-dashboard.html` uses the shared Admin/Owner dashboard shell and the
> existing three sample marketplace records. Search, process, location,
> availability, and hourly-rate filters, sorting, result counts, the empty state,
> filter reset, and the Machine Details links (`?id=1`, `?id=2`, `?id=3`) were
> exercised successfully. Eight clearly labelled sample bookings cover `pending`
> (BR-3101), `accepted` (BR-3102), `payment_pending` (BR-3103), `confirmed`
> (BR-3104), `in_progress` (BR-3105), completed and reviewed (BR-3106),
> completed and unreviewed (BR-3107), and `rejected` (BR-3108). No cancelled
> sample booking and no cancel control are shown because the documented
> cancellation and refund policy remains unresolved.
>
> The payment ledger contains four successful records totalling ₹15,000, one
> pending payment of ₹6,900, and one failed attempt of ₹6,900. Pending and failed
> payments are not presented as confirmed bookings, and the rejected request has
> no payment record. No refunded record is shown because refund rules are not
> defined. The review form accepts only completed, not-yet-reviewed sample work
> (BR-3107); empty submissions, ineligible bookings, and duplicate submissions
> cannot produce review feedback, and a successful demo submission changes only
> local preview state in the request and completed-work tables. BR-3106 displays
> a sample submitted 5-star review. The booking-details modal was checked for all
> eight records and shows status-specific next-step guidance.
>
> Status filters update the visible rows, live summary, and `aria-pressed`
> state; the cancelled summary correctly reports zero. Notification mark-as-read
> and the demo sign-out confirmation (returning to `login.html`) were tested.
> Layouts were checked at 320, 375, 576, 768, 992, 1024, and 1440 px, with
> additional short-height checks. No page-level horizontal overflow occurred;
> the sidebar is a desktop rail from 992 px upward, becomes a working drawer
> below 992 px, and its navigation scrolls when the viewport is short. Wide
> tables scroll inside their own wrappers, show hints only when scrollable, and
> respond to keyboard arrow scrolling. Admin Dashboard, Machine Owner Dashboard,
> Explore Machines, Machine Details (IDs 1–3), and Login pages loaded with no
> console errors or failed requests after the change, and `node --check
> js/script.js` passes. The Buyer preview link on `login.html` resolves to the new
> page. Buyer profile editing remains open because the PRD does not define buyer
> profile fields; Saved Machines and buyer Profile Settings are omitted because
> the project documents do not define them.
>
> **Buyer dashboard refinement verified in browser (2026-11-08):**
> The existing hierarchy was tightened without changing the design system. The
> seven overview cards use a balanced 2/3/4-column grid at 320–575, 576–767, and
> 768+ px, with icons hidden only below 360 px; the discovery panel is more
> compact and shows two machine cards from 576 px and three from 768 px. The three
> tables use fixed column widths and reduced padding: booking rows are 88 px
> (BR-3107 is 102 px because its two actions wrap), payment rows are 70–90 px,
> and completed rows are 66–87 px. Long header labels wrap inside their fixed
> columns instead of overlapping neighbouring headers. Page height at a 912 px
> viewport fell from 7437 px to 5164 px.
>
> The review form now lives in a scrollable modal opened only from the eligible
> completed booking (BR-3107), reached from the request row, the completed-work
> row, or the compact review-summary call to action. Verified at 320, 360, 375,
> 576, 768, 900, 991, 992, 1024, 1200, 1440, and 1920 px with no page-level
> horizontal overflow and no stat-card, table-cell, or action-cell overflow.
> The modal fits after its entrance transition at 320×480, 320×568, 375×667, and
> 768×600, scrolls its body internally when needed, traps focus, restores focus
> to the trigger, and closes via Escape, Cancel, the header close button, and an
> outside click. Empty submission remains blocked by native validation; a valid
> demo submission updates the review summary, queue status, score note, and both
> BR-3107 review actions without closing the modal.
>
> Final checks reconfirmed all eight status filters and badge labels, four
> successful payments totalling ₹15,000, pending ₹6,900, failed ₹6,900, no
> refunded record, and exactly one unreviewed completion (BR-3107). BR-3106
> remains reviewed with no action. Sidebar drawer (toggle, backdrop, close
> button, Escape), notification mark-as-read, logout cancel/confirm returning to
> `login.html`, and regression loads of Admin Dashboard, Machine Owner Dashboard,
> Explore Machines, Machine Details (IDs 1–3), and Login all passed with no
> console errors. `node --check js/script.js` passes.

## Admin dashboard and management screens

-   [x] Admin dashboard overview.
-   [ ] User management screen.
-   [ ] Company/owner management screen.
-   [ ] Buyer management screen.
-   [ ] Machine listing management screen.
-   [ ] Pending machine approval screen.
-   [ ] Machine review/detail screen.
-   [ ] Booking management/monitoring screen.
-   [ ] Payment monitoring screen.
-   [ ] Review management screen.
-   [ ] Reports/activity screen.
-   [ ] Block/unblock user confirmation UI.

> **Checked in browser:** `admin-dashboard.html` was verified against all
> documented status values, business rules, and administrative monitoring
> requirements after the 2026-11-08 refinement. The page includes:
>
> 1. **Sidebar navigation:** IdleMach logo, admin role badge, dashboard overview
>    link (active), pending machine approvals queue (with live count badge),
>    management entries for User, Machine, Booking, Payment, and Review,
>    reports and activity, business rules reference (now an on-page anchor to
>    `#business-rules-reference`), public marketplace link, and admin profile
>    card with demo sign-out. Settings is omitted because it is not documented
>    as an Admin section.
> 2. **Top navigation:** Responsive sidebar toggle, breadcrumb, prototype
>    notification center (offcanvas drawer with unread counter and mark-as-read
>    action), public marketplace quick link, and administrator profile dropdown.
> 3. **Priority order:** Pending Machine Approvals and Recent Bookings appear
>    first, followed by the Platform overview statistics, then Recent Activity
>    and Management Shortcuts, and finally the Business Rules Reference. The
>    former governance banner was removed; its summary is now the reference
>    introduction.
> 4. **Pending machine approvals queue:** Interactive table showing 3 sample
>    listings (`M-1014`, `M-1015`, `M-1016`) awaiting review with specifications,
>    work envelopes, hourly rates, and daily capacities. Each row carries a
>    compact “Demo” tag beside its ID. Working prototype actions:
>    - *View listing:* modal displaying full machine specs, envelope, tooling,
>      material, photos count, and verification notes.
>    - *Approve:* confirmation modal that updates local row status to approved,
>      updates badge, disables buttons, decrements pending counters, and shows
>      demo feedback. Approved listings become marketplace-visible regardless
>      of operational status; only approved + active listings can receive new
>      booking requests.
>    - *Reject:* rejection modal capturing structured reason and optional admin
>      notes, updating local row status to rejected, decrementing pending
>      counters, and showing demo feedback toast.
>    - *Reset demo:* header action restoring all rows to pending review and
>      counter to 12.
> 5. **Recent bookings monitoring:** Second priority section. Audit table
>    displaying 6 representative bookings across documented statuses (`pending`,
>    `accepted`, `payment_pending`, `confirmed`, `in_progress`, `completed`)
>    with "View Details" modal showing full work description, rate, amount, and
>    drawing attachment reference. Each row (CS-10025–CS-10030) carries a
>    compact “Demo” tag.
> 6. **Platform overview:** Eight labelled sample stat cards for Total Users
>    (250; 85 owners, 165 buyers), Machine Owners (85), Buyers (165), Machine
>    Listings (180), Pending Approvals (12 awaiting review), Total Bookings (430;
>    390 completed), Payment Records (418; ₹5.2L illustrative revenue), and
>    Reviews (142; 4.8 average). The section has a visible “Platform overview”
>    heading and “Illustrative demo data” badge; each card carries a “Demo value”
>    badge, and the pending count updates with the demo approval actions.
> 7. **Recent activity feed:** Illustrative audit stream of platform actions
>    across user registrations, machine submissions, completions, and payments.
>    The card is labelled “Sample activity” and every item uses a “Sample record”
>    meta label.
> 8. **Platform management shortcuts:** Responsive grid reduced from six tiles
>    to four useful shortcuts: User, Machine, Payment, and Review Management.
>    Metadata reads “Sample accounts”, “Sample listings”, “Sample payment
>    records”, and “Sample reviews”. Tiles without a built page show an explicit
>    prototype preview notice rather than linking to a missing screen.
> 9. **Business rules reference section:** The former modal
>    (`#modal-business-rules`) was removed. A full-width
>    `#business-rules-reference` section at the bottom of the page preserves the
>    exact marketplace rules (marketplace eligibility, request eligibility, owner
>    acceptance order, payment requirement, review eligibility, admin
>    governance), all documented machine, booking, payment, and user statuses,
>    and a “Back to top” link.
> 10. **Illustrative demo labeling:** A page-level prototype banner, “Demo
>     value” stat badges, “Sample records” table footers, per-row “Demo” tags,
>     sample activity metadata, and “Demo record” modal labels make clear that
>     no figure or record is live platform data. Actions and footers explicitly
>     state that no database or live record is modified.
>
> Browser verification covered the reordered sections, reference anchor,
> approve/reject/reset flows, pending counters, booking-detail status badges
> (including `payment_pending` and `in_progress`), notification mark-as-read,
> management preview notices, and table scroll hints. Layouts were checked at
> 1440, 1200, 1000, 992, 991, 900, 768, 576, 375, and 320 px with no page-level
> horizontal overflow. The sidebar remains a 240 px desktop rail from 992 px
> upward and becomes a drawer below 992 px; the drawer opens to translateX(0)
> with a backdrop and closes by button, backdrop, Escape, or navigation link. Tables scroll inside their
> wrappers at 900 px and below (hint visible), while the approvals table fits
> without scrolling at 1440 px (hint hidden). Status badges are vertically
> centred in table cells (0 px offset). Small text was raised for readability:
> table subtext 14 px, activity/shortcut/status text 13 px, demo tags 12 px.
> The W3C validator reported 0 errors (only informational trailing-slash notes),
> Lighthouse scored 100 for accessibility, best practices, and SEO, all 10
> workspace HTML pages loaded with 0 console errors, failed requests, or 4xx/5xx
> responses, and `node --check js/script.js` passes. The remaining detailed
> management sub-screens are outside the Phase 3.4 integration scope and remain
> pending for Phase 8. The Machine Owner and
> Buyer dashboards are implemented in Phases 3.2 and 3.3, and their preview links
> on `login.html` now resolve.

**Phase 3 exit check:** Agreed dashboard screens share a consistent design, show
the correct role-specific actions, and work responsively.

## 3.4 Dashboard integration, responsive improvements, and consistency testing

-   [x] Standardize the shared dashboard shell while preserving each role's
    own navigation and actions.
-   [x] Verify responsive layouts and table usability at 1440, 1280, 1024,
    768, and 375 CSS px.
-   [x] Check drawer open/close, backdrop, navigation closure, dropdowns,
    table filters, modals, and demo action feedback.
-   [x] Reconcile repeated machine, booking, payment, capacity, and review
    sample data without changing documented business rules.
-   [x] Check internal navigation across public pages and all three dashboards.
-   [x] Check accessible form labels, button names, focus handling, and mobile
    touch targets.
-   [x] Regression-test public pages and check page-wide horizontal overflow.

> **Verified in the integrated browser:** Admin, Machine Owner, and Buyer
> dashboards were exercised at 1440, 1280, 1024, 768, and 375 px. Their
> desktop sidebar is 240 px; below 992 px it becomes a slide-in drawer with a
> backdrop and close button. Toggle, close button, backdrop, Escape, and
> navigation-link closure passed; focus moves to the drawer close control and
> restores correctly. Role-specific navigation remains distinct. Each dashboard
> profile dropdown opened, and the admin/owner detail modals and buyer status
> filter worked. Owner acceptance changed a valid request to `payment_pending`;
> an over-capacity request remained blocked. Admin rejection and owner acceptance
> both showed explicit demo feedback.
>
> The three dashboard layouts and the other nine project HTML pages were checked
> at all five widths (60 page/viewport checks) with no page-wide horizontal
> overflow. Wide tables remain in their own scroll wrappers, retain native
> scrollbars, and respond to keyboard arrow scrolling. Dashboard menu, close,
> navigation, and logout controls meet the 44 px mobile target; all audited form
> controls have labels and all buttons have accessible names. Notification
> “mark all as read” buttons were given explicit accessible names.
>
> Internal links and fragment targets across all 12 HTML pages resolve, no page
> has duplicate IDs, dashboard pages contain no links to another role's
> dashboard, and the integrated page-load check reported no console errors.
> Repeated `CS-10026` and `CS-10027` booking details agree between Admin and
> Owner. The Owner's four visible successful payments total ₹41,800, matching
> its summary; pending, failed, and refunded records remain separate. Its sample
> capacity is consistent: 30 total − 16 booked = 14 available hrs/day, matching
> the displayed summary. The shared ST-20 listing is consistently shown at
> ₹800/hr and 8 available hrs/day. Only one Buyer sample booking is review
> eligible, and it is completed (BR-3107).
>
> Workflow review confirmed the existing approved/active eligibility, capacity
> checks, owner acceptance-before-payment state, payment-required booking
> confirmation, documented status progression, and completed-only review
> eligibility. Admin pages remain illustrative monitoring views. Authentication,
> authorization, payment processing, and persistence are not connected in this
> frontend prototype; remaining Admin management sub-screens are still pending
> and were not started in this phase.

------------------------------------------------------------------------

# Phase 4 --- Frontend Review and Acceptance

## 4.1 User review and interaction acceptance

- [x] Review all 12 HTML pages.
- [x] Confirm that the existing website design and section-wise content are acceptable.
- [x] User confirms that the current prototype functionality is working as expected.
- [x] User confirms that all current pages are responsive.
- [x] Confirm that the existing public pages and Admin, Machine Owner, and Buyer dashboards are included in the review.

> **User review confirmation (2026-11-09):** The user reviewed all current website pages and confirmed that the design, section-wise content, responsiveness, and existing prototype functionality are satisfactory. The current layout and visual direction should be preserved during the upcoming content and image cleanup. This is user-reported acceptance, not a claim that every interaction has been independently retested in a live browser during this review.

## 4.2 Static source review

- [x] Inspect all 12 HTML pages.
- [x] Check for duplicate actual HTML `id` attributes.
- [x] Check local page links and fragment targets.
- [x] Check for empty placeholder links such as `href="#"` and `javascript:`.
- [x] Inspect shared CSS responsive breakpoints.
- [x] Inspect shared JavaScript for browser storage and network calls.
- [x] Record the limitations of static source inspection.

> **Static source review (2026-11-09):** The 12 HTML pages, shared `css/style.css`, shared `js/script.js`, and frontend README were inspected on branch `docs/stage-1-prd-rules`. No duplicate actual HTML IDs, broken local fragment targets, or empty placeholder links were found in the reviewed HTML. Responsive CSS rules include common desktop, tablet, and mobile breakpoints. The shared JavaScript review found no `localStorage`, `sessionStorage`, or `fetch()` calls.
>
> This was a source-level review, not a fresh live-browser test. It does not independently certify every visual state, every interaction, or every local asset path. The user has separately confirmed that the current pages are responsive and their functionality works.

## 4.3 Frontend acceptance status

- [x] Existing page structure and section hierarchy accepted by the user.
- [x] Existing visual design accepted by the user.
- [x] Existing responsive behaviour accepted by the user.
- [x] Existing prototype functionality accepted by the user.
- [ ] Complete the upcoming demo-content and image cleanup.
- [ ] Recheck all pages after content and image changes.
- [ ] Record the final frontend cleanup results.

**Phase 4 status:** The current frontend design and prototype are accepted as the baseline. Do not redesign or restructure the website without a separate requirement. The next task is controlled content and image cleanup.

------------------------------------------------------------------------

# Phase 4.5 --- Demo Content Cleanup and Image Integration

> **Purpose:** Prepare the accepted frontend prototype for the next development stage by removing temporary demonstration content and replacing the current illustrative imagery with approved local images. Preserve the existing design, layout, sections, and working prototype interactions unless a specific change is required.

## 4.5.1 Content and sample-data audit

- [ ] Review all 12 HTML pages and identify demo, sample, dummy, and illustrative content.
- [ ] Identify sample machine names, company names, user details, locations, prices, and capacities.
- [ ] Identify sample dashboard statistics, booking records, payment records, earnings, reviews, and notifications.
- [ ] Identify sample activity-feed entries and illustrative management records.
- [ ] Identify demo-only success messages and prototype notices.
- [ ] Separate actual product explanations and approved business rules from temporary sample records.
- [ ] Prepare a page-wise list of content to remove, retain, or replace.
- [ ] Do not invent real users, companies, machine listings, prices, ratings, transactions, or business statistics.

## 4.5.2 Demo and sample content cleanup

- [ ] Remove temporary sample machine records from the homepage and Explore Machines page.
- [ ] Remove temporary sample machine records from the Machine Details page.
- [ ] Remove illustrative user, company, and machine records from dashboard views where they are no longer required.
- [ ] Remove sample booking, payment, earnings, review, notification, and activity records.
- [ ] Remove fake statistics and totals that could be mistaken for actual platform data.
- [ ] Remove sample names, locations, rates, capacities, and other invented business information.
- [ ] Retain approved product explanations, section headings, workflow descriptions, and business rules.
- [ ] Use clear empty states where real backend data is not available.
- [ ] Keep prototype-only notices wherever a form or action is still not connected to a backend.
- [ ] Do not imply that login, registration, booking, payment, file upload, messaging, or notifications are connected to a live service.
- [ ] Do not remove required UI sections simply because their future backend data is not available.

## 4.5.3 Local image folder preparation

- [ ] Prepare the approved image collection inside `IdleMach-Frontend/assets/images/`.
- [ ] Organize images into meaningful folders such as `logo/`, `hero/`, `machines/`, `industries/`, `about/`, `team/`, and `common/`, as applicable.
- [ ] Confirm the actual image filenames and extensions before referencing them.
- [ ] Prefer descriptive, consistent, lowercase filenames.
- [ ] Use only images supplied or approved for the project.
- [ ] Do not invent image filenames or reference files that do not exist.
- [ ] Remove old illustrative or external placeholder image references after replacement images are confirmed.
- [ ] Use local relative image paths that work from the relevant HTML pages.
- [ ] Add meaningful alternative text to informative images and empty alternative text to decorative images.
- [ ] Preserve appropriate image aspect ratios, cropping, and responsive behaviour.
- [ ] Provide a graceful fallback for missing or failed images where appropriate.

## 4.5.4 Page-wise image integration

- [ ] Home page: replace temporary hero and section imagery.
- [ ] Explore Machines: replace temporary machine-card imagery.
- [ ] Machine Details: replace temporary gallery and machine imagery.
- [ ] How It Works: review and replace illustrations where approved images are available.
- [ ] About: use approved company or industry imagery only.
- [ ] Contact: retain only imagery that supports the existing design.
- [ ] Login and Registration: preserve the accepted layout; replace imagery only where applicable.
- [ ] Admin Dashboard: remove temporary record imagery and use only approved interface assets.
- [ ] Machine Owner Dashboard: remove temporary record imagery and use only approved interface assets.
- [ ] Buyer Dashboard: remove temporary record imagery and use only approved interface assets.
- [ ] Styleguide: update image examples if the shared image assets change.

## 4.5.5 Empty states and prototype boundaries

- [ ] Add a clear empty state when no real machine listings are available.
- [ ] Add suitable empty states for bookings, payments, reviews, notifications, and activity sections.
- [ ] Keep empty states consistent with the existing design system.
- [ ] Do not display fabricated statistics to fill empty dashboard cards.
- [ ] Do not show successful payment or booking confirmation without a real backend.
- [ ] Keep existing frontend-only behaviour clearly identified as a prototype.
- [ ] Do not create fake backend functionality or pretend that data is saved.

## 4.5.6 Design preservation and regression checks

- [ ] Preserve the existing page layouts and section order.
- [ ] Preserve the existing shared CSS design system and responsive navigation.
- [ ] Do not redesign the Admin, Machine Owner, or Buyer dashboards.
- [ ] Do not modify unrelated JavaScript or CSS behaviour.
- [ ] Check image loading and image dimensions on all relevant pages.
- [ ] Check desktop, tablet, and mobile layouts after changes.
- [ ] Check navigation, buttons, forms, filters, modals, and empty states.
- [ ] Check browser console errors and failed asset requests.
- [ ] Check for broken links, missing images, horizontal overflow, and layout regressions.
- [ ] Update the frontend README after the cleanup is completed.

**Phase 4.5 exit check:** Temporary demo content and illustrative imagery have been reviewed and cleaned up, approved local images are integrated, empty states are meaningful, and the accepted website design remains intact.

------------------------------------------------------------------------

# Phase 5 --- Laravel Application Foundation

> Start this phase only after Phase 4.5 is completed and the cleaned frontend is reviewed.

## 5.1 Laravel setup

- [ ] Create or prepare the Laravel application.
- [ ] Configure the local development environment.
- [ ] Configure the MySQL connection through environment settings.
- [ ] Confirm the application can connect to the database.
- [ ] Set up the project's source control and ignore rules.
- [ ] Confirm the Laravel version to use before implementation.

## 5.2 Application structure

- [ ] Create the agreed Blade layout structure.
- [ ] Create shared header, footer, and navigation partials.
- [ ] Organize public, admin, owner, and buyer views.
- [ ] Move approved shared CSS and JavaScript into the Laravel asset structure.
- [ ] Convert the cleaned and approved prototype pages into Blade templates.
- [ ] Integrate approved local images into the Laravel asset structure.
- [ ] Verify that converted pages preserve the approved frontend design.

## 5.3 Database and migrations

Create and verify migrations for the planned core entities:

- [ ] `users`
- [ ] `companies`
- [ ] `machines`
- [ ] `machine_images`
- [ ] `machine_availabilities`
- [ ] `bookings`
- [ ] `booking_documents`
- [ ] `payments`
- [ ] `reviews`
- [ ] `notifications`

Additional tasks:

- [ ] Define foreign keys and relationships from the approved data model.
- [ ] Add required indexes and constraints.
- [ ] Define allowed status values and validation rules.
- [ ] Run migrations on a clean development database.
- [ ] Verify relationships and referential integrity.
- [ ] Use seed data only when it is intentionally required for development and clearly identified as test data.

**Exit check:** Laravel runs, MySQL is connected, migrations succeed on a clean database, and shared Blade layouts render the approved frontend.

------------------------------------------------------------------------

# Definition of Done

A task may be marked `[x]` only when all applicable conditions are met:

1. The implementation matches the approved requirement.
2. The correct role can access the feature and unauthorized roles cannot.
3. Input and state changes are validated appropriately.
4. The page or feature works in the browser.
5. The layout is checked on desktop, tablet, and mobile where applicable.
6. Relevant errors and empty states are handled.
7. No known blocking console or application errors remain.
8. Related pages and shared components have been checked for regressions.
9. Any limitations or unimplemented parts are documented.

------------------------------------------------------------------------

## Final Project Rule

**Complete the core IdleMach marketplace journey first: owners list capacity, admins review listings, buyers discover machines and request work, owners respond, successful payment confirms the booking, work is completed, and eligible users leave reviews. Keep each phase tested before moving to the next.**

------------------------------------------------------------------------

# Phase 6 --- Authentication and Role Access

-   [ ] Implement user registration.
-   [ ] Implement login and logout.
-   [ ] Use secure password hashing.
-   [ ] Implement the approved role assignment process.
-   [ ] Protect authenticated routes.
-   [ ] Add role-based middleware or equivalent authorization.
-   [ ] Redirect users to the correct role area after login.
-   [ ] Prevent buyers from accessing owner/admin routes.
-   [ ] Prevent owners from accessing another owner's private records.
-   [ ] Restrict admin routes to authorized administrators.
-   [ ] Implement profile management.
-   [ ] Test unauthenticated and unauthorized access.

**Exit check:** Registration, login, logout, and role-based route
protection work correctly.

------------------------------------------------------------------------

# Phase 7 --- Machine Owner Module

## 7.1 Company profile

-   [ ] Allow an owner to create a company profile.
-   [ ] Allow an owner to view and update their company profile.
-   [ ] Validate company information.
-   [ ] Enforce ownership checks.

## 7.2 Machine management

-   [ ] Allow an owner to create a machine listing.
-   [ ] Validate required machine information.
-   [ ] Allow an owner to update their own listing.
-   [ ] Allow an owner to manage their own listing images.
-   [ ] Store machine specifications provided by the owner.
-   [ ] Store rate and capacity information.
-   [ ] Implement the approved listing submission process.
-   [ ] Allow owners to view listing status.
-   [ ] Prevent owners from editing another owner's machine.

## 7.3 Availability management

-   [ ] Implement the approved availability data structure.
-   [ ] Allow owners to manage availability where permitted.
-   [ ] Display available, booked, maintenance, and unavailable periods.
-   [ ] Calculate available capacity using the documented rule.
-   [ ] Prevent unavailable capacity from being offered.
-   [ ] Test overlapping time and capacity conflicts.

**Exit check:** Owners can manage their company, machines, and
availability within their permissions.

------------------------------------------------------------------------

# Phase 8 --- Admin Module and Machine Approval

-   [ ] Build the admin dashboard.
-   [ ] Implement user listing and management.
-   [ ] Implement owner/company management.
-   [ ] Implement buyer management.
-   [ ] Implement machine listing review.
-   [ ] Implement machine approval.
-   [ ] Implement machine rejection.
-   [ ] Display listing status to the owner.
-   [ ] Ensure all approved machines appear in the marketplace, including
    inactive and maintenance listings.
-   [ ] Ensure only approved + active machines can receive new booking
    requests.
-   [ ] Implement block/unblock actions with authorization.
-   [ ] Implement booking, payment, and review monitoring.
-   [ ] Implement reports/activity views based on defined data.
-   [ ] Test admin permissions and status transitions.

**Open dependency:** Approval and operational status are separate. The
permission rules and allowed transitions for changing
`operational_status` (`active`, `inactive`, `maintenance`) still
need to be decided. Approval alone does not automatically activate a
machine.

**Exit check:** Admin actions are protected, recorded consistently, and
reflected in the appropriate owner and marketplace views.

------------------------------------------------------------------------

# Phase 9 --- Buyer Marketplace

-   [ ] Build the machine marketplace using database records.
-   [ ] Show every approved machine in the marketplace, including listings
    whose operational status is inactive or maintenance.
-   [ ] Clearly label approved inactive/maintenance machines as unavailable
    and disable their new-booking action.
-   [ ] Allow new booking requests only for machines that are both approved
    and active, subject to date/time capacity checks.
-   [ ] Implement machine search.
-   [ ] Implement the approved machine filters.
-   [ ] Implement machine detail pages.
-   [ ] Display machine images and specifications.
-   [ ] Display owner/company information permitted for public viewing.
-   [ ] Display rate and capacity information.
-   [ ] Display availability accurately.
-   [ ] Prevent booking requests for inactive or unavailable machines.
-   [ ] Add suitable empty and no-results states.
-   [ ] Test search and filter behaviour against database records.

**Exit check:** Buyers can discover eligible machines and view accurate
machine and availability information.

------------------------------------------------------------------------

# Phase 10 --- Booking Workflow

-   [ ] Build the buyer booking request form.
-   [ ] Capture the required booking date and time.
-   [ ] Capture requested hours and quantity where required.
-   [ ] Capture work description and special requirements.
-   [ ] Support the approved drawing/document upload process.
-   [ ] Validate booking input on the server.
-   [ ] Verify machine availability and capacity on the server.
-   [ ] Prevent overlapping or double bookings.
-   [ ] Create a booking with `pending` status.
-   [ ] Show incoming requests to the correct machine owner.
-   [ ] Allow the owner to accept a request.
-   [ ] Allow the owner to reject a request.
-   [ ] Prevent unauthorized booking status changes.
-   [ ] Update the booking state consistently after owner action.
-   [ ] Test invalid dates, unavailable capacity, and concurrent booking
    attempts.

**Exit check:** Buyers can submit requests and owners can accept/reject
them without violating availability or access rules.

------------------------------------------------------------------------

# Phase 11 --- Payment Records and Booking Confirmation

-   [ ] Implement the approved initial payment-record approach.
-   [ ] Link each payment record to the correct booking.
-   [ ] Support the defined payment statuses.
-   [ ] Allow payment to proceed only after owner acceptance.
-   [ ] Record successful or failed payment results appropriately.
-   [ ] Confirm a booking only after successful payment is recorded.
-   [ ] Ensure failed or pending payment does not confirm a booking.
-   [ ] Protect payment information.
-   [ ] Test payment and booking status consistency.

**Scope note:** The MVP uses demo/simulated payment outcomes only. It
must not charge real money or imply that real funds were received. A
booking is confirmed only after a successful demo payment record is
saved. Real Razorpay/Stripe integration is deferred to a later phase;
demo failure/timeout handling and multiple attempts remain open.

**Exit check:** Payment records and booking confirmation follow the
approved sequence and remain consistent.

------------------------------------------------------------------------

# Phase 12 --- Work Progress, Completion, and Reviews

-   [ ] Allow authorized users to view booking progress.
-   [ ] Implement the approved transition to `in_progress`.
-   [ ] Allow the permitted completion action.
-   [ ] Mark work completed only when the work is actually completed.
-   [ ] Allow only the buyer associated with a completed booking to review
    the machine owner.
-   [ ] Validate that the reviewer is the booking buyer and the reviewee is
    the booked machine's owner.
-   [ ] Enforce at most one review per booking with a unique
    `reviews.booking_id` constraint.
-   [ ] Prevent owners from reviewing buyers.
-   [ ] Display reviews in the appropriate owner/machine views.
-   [ ] Test the full booking-to-completion journey.

**Exit check:** Work status and review eligibility follow the documented
business rules.

------------------------------------------------------------------------

# Phase 13 --- Notifications

-   [ ] Implement the required in-app notification records.
-   [ ] Notify the relevant owner when a booking request is received.
-   [ ] Notify the buyer when the owner accepts or rejects a request.
-   [ ] Notify the relevant user about payment and booking updates.
-   [ ] Notify users about relevant work progress or completion events.
-   [ ] Protect notification visibility by user ownership.
-   [ ] Test that notifications are generated only for the correct
    events.

Email, SMS, and WhatsApp delivery must be treated as separate
integrations unless explicitly included in the approved scope.

------------------------------------------------------------------------

# Phase 14 --- Security, Testing, and Release Preparation

## 14.1 Security checks

-   [ ] Verify authentication and role authorization.
-   [ ] Verify ownership checks for private records.
-   [ ] Verify CSRF protection for state-changing forms.
-   [ ] Verify server-side validation.
-   [ ] Verify safe file upload validation and storage.
-   [ ] Verify password hashing.
-   [ ] Verify secrets are not committed to source control.
-   [ ] Verify database queries use Eloquent or parameterized queries.
-   [ ] Verify sensitive information is not exposed in public views or
    logs.
-   [ ] Verify unauthorized users cannot change machine, booking,
    payment, or review records.

## 14.2 Functional testing

-   [ ] Test owner registration and company profile setup.
-   [ ] Test machine listing submission and approval.
-   [ ] Test marketplace discovery and machine details.
-   [ ] Test machine availability and capacity.
-   [ ] Test booking request and owner decision.
-   [ ] Test payment status and booking confirmation.
-   [ ] Test work progress and completion.
-   [ ] Test review eligibility.
-   [ ] Test admin management and monitoring.
-   [ ] Test blocked-user behaviour.
-   [ ] Test invalid and unauthorized actions.

## 14.3 UI and browser testing

-   [ ] Inspect all agreed pages in a browser.
-   [ ] Test desktop, tablet, and mobile layouts.
-   [ ] Check all buttons, links, forms, filters, and menus.
-   [ ] Check image, icon, and asset loading.
-   [ ] Check empty, loading, success, and error states.
-   [ ] Check browser console and application logs.
-   [ ] Fix visible layout and interaction defects.

## 14.4 Release preparation

-   [ ] Confirm production environment configuration.
-   [ ] Confirm database backup and restore procedure.
-   [ ] Confirm storage and upload configuration.
-   [ ] Confirm error handling and logging.
-   [ ] Confirm that secrets and debug settings are safe for production.
-   [ ] Document setup and run instructions.
-   [ ] Document known limitations and deferred features.
-   [ ] Review the final changes before release.

**Exit check:** The core user journeys are tested, access controls are
verified, and known limitations are documented.

------------------------------------------------------------------------

# Phase 15 --- Optional Future Enhancements

These items are not part of the first MVP unless separately approved:

-   [ ] Real payment gateway integration.
-   [ ] Email, SMS, or WhatsApp integrations.
-   [ ] Live chat.
-   [ ] Advanced search and matching.
-   [ ] Favorites.
-   [ ] Advanced analytics.
-   [ ] Invoice generation.
-   [ ] Platform commission and payout automation.
-   [ ] Maps and location-based discovery.
-   [ ] AI-based machine matching.
-   [ ] Demand prediction.
-   [ ] Mobile application.
-   [ ] Redis, queues, WebSockets, or cloud storage integrations.

Do not start these tasks before the core MVP workflow is stable and the
required product decisions are approved.

------------------------------------------------------------------------

# Open Decisions and Blockers

Record decisions here before implementing features that depend on them.

-   [ ] Define who may change machine `operational_status` and the
    allowed transitions between `active`, `inactive`, and
    `maintenance`.
-   [ ] Confirm capacity units and detailed availability scheduling
    rules.
-   [ ] Define booking cancellation, rescheduling, and refund policies.
-   [ ] Define demo payment failure/timeout handling and whether multiple
    demo payment attempts are allowed.
-   [ ] Select a future real payment gateway only when that phase is
    approved; define related deadlines, fees, taxes, and owner payouts.
-   [ ] Confirm supported drawing/document file types and upload limits.
-   [ ] Define review editing/removal and dispute rules.
-   [ ] Confirm notification channels and delivery expectations.
-   [ ] Define machine verification requirements and badges, if any.
-   [ ] Confirm hosting, deployment, backup, and data-retention
    policies.
-   [!] Confirm final brand identity and design tokens. *(Frontend uses
    clearly documented provisional values pending approval.)*
-   [!] Confirm the final prototype sitemap and dashboard page scope.
    *(Public pages and the three dashboard overview prototypes are
    implemented; remaining Admin management sub-screens and Buyer profile
    fields are not defined/implemented and remain outside the completed
    dashboard overview scope.)*

> **Phase 0.2 / Phase 1 blockers:** The logo/wordmark, final palette, and
> brand font require approval. The current temporary values are isolated
> at the top of `css/style.css` and listed in
> `IdleMach-Frontend/README.md`.

------------------------------------------------------------------------

# Definition of Done

A task may be marked `[x]` only when all applicable conditions are met:

1.  The implementation matches the approved requirement.
2.  The correct role can access the feature and unauthorized roles
    cannot.
3.  Input and state changes are validated appropriately.
4.  The page or feature works in the browser.
5.  The layout is checked on desktop, tablet, and mobile where
    applicable.
6.  Relevant errors and empty states are handled.
7.  No known blocking console or application errors remain.
8.  Related pages and shared components have been checked for
    regressions.
9.  Any limitations or unimplemented parts are documented.

------------------------------------------------------------------------

## Final Project Rule

**Complete the core IdleMach marketplace journey first: owners list
capacity, admins review listings, buyers discover machines and request
work, owners respond, successful payment confirms the booking, work is
completed, and eligible users leave reviews. Keep each phase tested
before moving to the next.**
