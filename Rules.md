# IdleMach --- Project Rules

**Project:** IdleMach\
**Tagline:** Turn Idle Capacity Into Opportunity\
**Document purpose:** Define the rules that must be followed while
designing, developing, testing, and extending IdleMach.

------------------------------------------------------------------------

## 1. Core Project Identity

1.  IdleMach is a **manufacturing capacity marketplace**.
2.  The platform connects:
    -   **Machine Owners** who have unused manufacturing capacity.
    -   **Buyers** who need manufacturing work but do not own the
        required machines.
    -   **Admins** who manage, approve, and monitor platform activity.
3.  IdleMach is **not** a CNC/VMC machine manufacturer, machine-selling
    website, or general industrial company website.
4.  Keep the main purpose clear throughout the website: help buyers
    discover available manufacturing capacity and help owners earn from
    unused capacity.
5.  Use the official tagline where appropriate: **"Turn Idle Capacity
    Into Opportunity."**
6.  Do not change the business model, role names, workflow, or core
    terminology without an explicit project decision.

## 2. Source-of-Truth Rules

1.  Use the project PRD and Architecture document as the main references
    for requirements and structure.
2.  Use the original `CapacityShare.md` project notes as supporting
    source material where needed.
3.  Do not silently invent features, business rules, user roles, payment
    behaviour, machine specifications, prices, statistics, or platform
    policies.
4.  If a requirement is unclear or conflicting, record it as an **open
    question** and ask for a decision rather than guessing.
5.  Clearly distinguish:
    -   Confirmed project requirements.
    -   Illustrative examples.
    -   Proposed implementation details.
    -   Future or optional features.
6.  Example company names, machine names, rates, dimensions, capacities,
    and technical specifications in project notes are examples only. Do
    not present them as real platform data.
7.  Do not claim that a feature is implemented or tested unless it has
    actually been implemented or tested.

## 3. Technology Rules

### 3.1 Frontend prototype

For the initial frontend-only prototype, use only:

-   HTML5
-   CSS3
-   Vanilla JavaScript
-   Bootstrap 5
-   Font Awesome

Rules:

1.  Do not add React, Vue, Angular, jQuery, Tailwind, or another
    frontend framework unless explicitly approved.
2.  Do not add a backend, database, API, or authentication service
    during the frontend-only prototype stage.
3.  Use realistic sample data only where needed to demonstrate the
    interface. Clearly treat it as demo data.
4.  Keep the prototype easy to convert into Laravel Blade templates
    later.

### 3.2 Laravel implementation

When backend development begins, follow the approved project stack:

-   Laravel
-   PHP
-   MySQL
-   Eloquent ORM
-   Laravel Authentication, Middleware, Validation, Mail, and
    Notifications
-   Blade, HTML, CSS, JavaScript, Bootstrap 5, and Font Awesome

Rules:

1.  Do not introduce optional services or packages unless a requirement
    justifies them and the project owner approves them.
2.  Payment gateways, Redis, queues, cloud storage, WebSockets, maps,
    and similar additions are optional/future integrations unless
    separately approved.
3.  Keep dependencies minimal and use Laravel's built-in features where
    suitable.
4.  Do not mix frontend prototype assumptions with production backend
    behaviour.

## 4. Code Organization Rules

1.  Keep code readable, consistent, and maintainable.
2.  Use meaningful file, folder, variable, function, class, and
    component names.
3.  Avoid unnecessary duplication. Reuse shared layouts, navigation,
    footer sections, form styles, buttons, and common UI components.
4.  Keep the frontend prototype's shared assets in common files:
    -   `css/style.css` for shared styling.
    -   `js/script.js` for shared JavaScript behaviour.
5.  Keep page-specific code small and place reusable rules in shared
    files.
6.  Do not put large amounts of CSS or JavaScript inline in individual
    pages when the code can reasonably live in the shared files.
7.  Do not create multiple competing versions of the same stylesheet or
    script without a clear reason.
8.  Do not rename, move, delete, or overwrite existing project files
    without first checking how they are used.
9.  Follow the existing project structure when continuing an established
    codebase. Do not restructure it just for personal preference.
10. Add comments for non-obvious logic, not for every simple line.

## 5. UI and Visual Design Rules

1.  The interface must look like a credible manufacturing B2B platform:
    professional, practical, clear, and trustworthy.
2.  Avoid generic AI-generated website patterns and visual clutter.
3.  Do not use excessive gradients, glowing effects, oversized rounded
    cards, random decorative shapes, unnecessary animations, or
    repetitive card grids.
4.  Use a consistent design system for colours, typography, spacing,
    borders, shadows, buttons, forms, and status indicators.
5.  Prioritize information hierarchy and readability over decoration.
6.  Use industrial and manufacturing-related imagery that supports the
    page purpose. Do not use unrelated stock images.
7.  Do not stretch, distort, or crop important machine details in
    images.
8.  Keep text concise and use simple, clear language suitable for buyers
    and machine owners.
9.  Avoid fake testimonials, fake customer logos, fake partner names,
    fake reviews, unsupported trust badges, and made-up platform
    statistics.
10. Do not display unsupported claims such as "India's No. 1 platform,"
    "verified machines," or guaranteed earnings unless the project owner
    confirms the claim and its basis.
11. Keep the visual style consistent across public, buyer, owner, and
    admin areas while allowing each role's screens to show the
    information it needs.
12. Do not redesign an existing approved page without checking its
    current design and related pages first.

## 6. Responsive and Accessibility Rules

1.  Every page must work on desktop, tablet, and mobile screen sizes.
2.  Use Bootstrap's responsive grid and utilities appropriately.
3.  Avoid horizontal overflow, clipped content, overlapping controls,
    and unreadable text.
4.  Forms must have visible labels and clear validation messages.
5.  Buttons and links must have meaningful text or accessible names.
6.  Do not use colour alone to communicate status or errors.
7.  Maintain readable contrast and visible keyboard focus states.
8.  Use semantic HTML elements where appropriate.
9.  Add useful alternative text to meaningful images. Decorative images
    should not create unnecessary screen-reader noise.
10. Ensure navigation, forms, dialogs, and interactive controls can be
    used with a keyboard where applicable.

## 7. User Roles and Access Rules

IdleMach has three primary roles:

### 7.1 Admin

-   Manage users, machine owners, and buyers.
-   Review and approve or reject machine listings.
-   Monitor and manage bookings, payments, and reviews.
-   Block or unblock users.
-   View platform reports and activity.

### 7.2 Machine Owner

-   Manage their account and their single company profile.
-   Create and manage their machine listings.
-   Add machine images, specifications, rates, capacity, and
    availability.
-   Receive booking requests and accept or reject them.
-   Manage bookings and update work progress.
-   Mark work as completed where permitted.
-   View relevant earnings and reviews.

### 7.3 Buyer

-   Manage their account and profile.
-   Search and filter available machines.
-   View machine details and availability.
-   Submit booking requests with required work details.
-   Upload relevant drawings or documents.
-   Track bookings and payments.
-   Complete the work confirmation step and review the machine owner after an eligible booking is completed.

Company ownership rules:

-   Each user may own exactly one company.
-   Each company belongs to exactly one user.
-   Enforce the one-to-one relationship in the database with a unique constraint on `companies.user_id`.
-   A company may own multiple machines.

Access rules:

1.  A user must only access actions and data allowed for their role.
2.  Buyers must not access owner or admin functions.
3.  Owners must not manage another owner's machines or bookings.
4.  Admin access must be protected and limited to authorized
    administrators.
5.  Hiding a button in the frontend is not sufficient security. Enforce
    permissions on the backend.
6.  Users must only view or change their own records unless an approved
    admin permission allows otherwise.

## 8. Machine Listing and Approval Rules

Store machine approval and operational condition in two separate fields:

**`approval_status`:** `pending`, `approved`, `rejected`.

**`operational_status`:** `active`, `inactive`, `maintenance`.

Rules:

1.  A newly submitted machine listing must have `approval_status = pending`.
2.  Only an admin may approve or reject a submitted machine listing.
3.  Only machines with `approval_status = approved` may appear in the marketplace.
4.  Approved machines remain visible when inactive or under maintenance, but must be identified as unavailable for booking.
5.  A machine may receive booking requests only when `approval_status = approved` AND `operational_status = active`.
6.  Pending and rejected machines must not appear in the marketplace or receive booking requests.
7.  Inactive and maintenance machines must not accept new booking requests.
8.  Never combine approval and operational condition into one status field or treat them as interchangeable.
9.  Owners may manage only their own machine listings and may update operational status only within authorized rules; owners cannot approve their own listings.
10. Validate required machine information before accepting a listing.
11. Machine specifications must be based on owner-provided information. Do not invent technical capabilities.
12. Machine images and uploaded files must be validated before storage.

## 9. Capacity and Availability Rules

Use the project's capacity calculation:

**Available Capacity = Total Capacity - Booked Capacity**

Availability status terms:

-   `available`
-   `booked`
-   `maintenance`
-   `unavailable`

Rules:

1.  Do not allow a buyer to request capacity that is unavailable.
2.  Prevent overlapping or double bookings for the same machine and time
    period.
3.  Check capacity and availability again on the server when a booking
    is submitted and when it is accepted.
4.  Do not rely only on values displayed in the browser; availability
    can change.
5.  Keep machine availability and booking records consistent.
6.  Do not show maintenance or unavailable time slots as bookable.
7.  The unit and meaning of capacity must be clear (for example, hours
    per day or another explicitly defined unit).
8.  Do not assume an availability schedule or capacity unit where the
    project requirements have not defined it.

## 10. Booking Workflow Rules

Follow the project workflow:

1.  Buyer discovers a machine.
2.  Buyer checks machine details and availability.
3.  Buyer submits a booking request.
4.  Owner accepts or rejects the request.
5.  Payment is made after owner acceptance.
6.  Booking is confirmed after successful payment.
7.  Work progresses and may be marked in progress.
8.  Work is completed.
9.  Buyer can complete the final confirmation/review step as permitted.

Use the booking statuses defined by the project:

-   `pending`
-   `accepted`
-   `rejected`
-   `payment_pending`
-   `confirmed`
-   `in_progress`
-   `completed`
-   `cancelled`

Rules:

1.  Owner acceptance must happen before payment.
2.  A booking is not confirmed until successful payment is recorded.
3.  A rejected booking must not proceed to payment or work.
4.  A booking must not be marked completed before the work is actually
    completed.
5.  Prevent unauthorized users from changing booking status.
6.  Validate booking dates, times, requested hours, quantity, work
    description, and required documents.
7.  Recheck machine availability before accepting a booking to avoid
    conflicts.
8.  Users may only access bookings they are authorized to view.
9.  Cancellation rules and refund conditions must follow an explicitly
    approved policy. Do not invent them.
10. Keep the booking status history and related payment state
    consistent.

## 11. Payment Rules

Use the payment statuses defined by the project:

-   `pending`
-   `successful`
-   `failed`
-   `refunded`

Rules:

1.  The MVP must use demo payment records; real payment gateway integration is deferred to a later phase.
2.  Clearly label the payment flow as a demo/simulation. It must not charge real money or imply that real funds were received.
3.  Do not claim that a demo payment is a real online payment.
4.  Do not mark a booking confirmed when its demo payment is pending or failed; confirmation requires a successful demo payment record.
5.  Record the demo payment outcome and related booking consistently.
6.  Do not store card numbers, CVV values, passwords, or other sensitive payment credentials in the application database.
7.  Keep the payment design sufficiently separated from provider-specific logic so a real gateway can be integrated in a later phase.
8.  Refund behaviour, demo payment deadlines/timeouts, multiple attempts, future platform fees, commissions, taxes, and payout rules remain open decisions. Do not invent them.
9.  Never expose private payment information in public pages or logs.

## 12. Reviews and Notifications

1.  Only completed bookings may receive a review.
2.  Only the buyer associated with a completed booking may review that booking's machine owner.
3.  Owners must not review buyers; reviews are one-way from buyer to owner.
4.  Link each review to its booking and validate that the reviewer is that booking's buyer and the reviewee is its machine owner.
5.  Allow at most one review per booking and enforce this with a unique constraint on `reviews.booking_id`.
6.  Do not create fake reviews or ratings for demonstration.
7.  Notifications must relate to real platform events, such as booking requests, owner decisions, payment updates, or booking progress.
8.  Do not claim email, SMS, or WhatsApp notifications are active unless they are implemented and configured.
9.  Keep notification content clear and do not expose private information to the wrong user.

## 13. Forms, Validation, and File Uploads

1.  Validate all user input on the server.
2.  Use client-side validation only to improve the user experience; it
    is not a replacement for server validation.
3.  Show clear, field-specific error messages.
4.  Preserve valid user input after validation errors where safe.
5.  Validate file type, file size, and file content where possible.
6.  Allow only the file formats required by the approved project rules.
7.  Store uploaded files safely and avoid exposing private documents
    through public URLs.
8.  Do not trust filenames or MIME types supplied by the browser.
9.  Protect upload and delete operations with authentication,
    authorization, and CSRF protection.
10. Do not upload executable files or allow uploaded content to run as
    code.

## 14. Security Rules

For the Laravel implementation:

1.  Use Laravel authentication and authorization features appropriately.
2.  Protect routes with authentication and role/permission middleware.
3.  Use CSRF protection for state-changing web forms.
4.  Use Laravel validation for incoming data.
5.  Use Eloquent ORM or parameterized queries; do not build SQL by
    concatenating untrusted input.
6.  Use Laravel's password hashing facilities. Never store plain-text
    passwords.
7.  Verify ownership before reading, updating, or deleting private
    records.
8.  Protect against mass-assignment issues by defining allowed model
    attributes.
9.  Keep secrets, API keys, and database credentials out of source
    control.
10. Use environment configuration for secrets and environment-specific
    settings.
11. Do not expose stack traces, database details, or sensitive system
    information to users in production.
12. Apply safe session and cookie settings for the deployment
    environment.
13. Restrict access to admin routes and sensitive reports.
14. Do not rely on frontend checks as a security boundary.

## 15. Database and Data Integrity Rules

The planned core entities include:

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

Rules:

1.  Follow the approved database design and relationships.
2.  Use foreign keys and appropriate database constraints to protect
    data integrity.
3.  Use migrations for Laravel schema changes.
4.  Do not make manual schema changes that are absent from migrations.
5.  Use transactions for multi-step operations that must succeed or fail
    together, especially booking and payment state changes.
6.  Do not delete related records in a way that breaks booking, payment,
    or review history.
7.  Use soft deletes only where the approved design requires them.
8.  Keep timestamps and status fields consistent.
9.  Do not assume that illustrative IDs or sample records exist in a
    fresh database.
10. Do not edit production data or run destructive database commands
    without a verified backup and explicit approval.

## 16. Routes and Page Behaviour

1.  Keep route groups separated by role, following the approved route
    structure:
    -   `/admin/*`
    -   `/owner/*`
    -   `/buyer/*`
2.  Public marketplace pages must not expose private owner, buyer, or
    admin information.
3.  Protect private dashboards and actions behind authentication and
    authorization.
4.  Use clear page titles, breadcrumbs, navigation labels, and action
    names.
5.  Every visible button, link, filter, form, and menu item must work as
    labelled.
6.  Do not leave placeholder links such as `href="#"` in completed
    screens.
7.  If a feature is not implemented, show it as unavailable or clearly
    mark it as a prototype placeholder rather than pretending it works.
8.  Keep empty, loading, success, and error states in mind for
    data-driven pages.

## 17. JavaScript and Interaction Rules

1.  Use vanilla JavaScript for the frontend prototype.
2.  Keep JavaScript focused on interface behaviour and user experience.
3.  Avoid unnecessary global variables and duplicate event handlers.
4.  Check that required elements exist before attaching event listeners.
5.  Do not use JavaScript as the only validation or security layer.
6.  Ensure menus, dropdowns, tabs, modals, filters, and form
    interactions work on supported screen sizes.
7.  Avoid unnecessary animations and effects that slow down or distract
    from the task.
8.  Do not add fake interactions that show success without performing
    the represented action.

## 18. Testing and Quality Rules

Before marking a page or feature complete:

1.  Open and inspect the actual page in a browser.
2.  Test the main user journey, not just whether the page loads.
3.  Test desktop, tablet, and mobile layouts.
4.  Test all visible buttons, links, menus, filters, and forms.
5.  Check empty, invalid, loading, success, and error states where
    applicable.
6.  Check the browser console for JavaScript errors.
7.  Check the server and application logs during backend development.
8.  Test role permissions and unauthorized access.
9.  Test booking conflicts, unavailable capacity, and invalid status
    transitions.
10. Check that images, icons, fonts, and other assets load correctly.
11. Do not say "fully working" or "bug-free" without sufficient testing.
12. Report known limitations and incomplete items honestly.

## 19. Development Workflow Rules

Follow this workflow for each new page or feature:

1.  **Understand:** Read the relevant PRD, Architecture, and existing
    code.
2.  **Inspect:** Check the current folder structure, shared assets,
    related pages, and dependencies.
3.  **Plan:** Identify the files to create or modify and the expected
    behaviour.
4.  **Build:** Implement the smallest complete solution that meets the
    requirement.
5.  **Reuse:** Use existing shared components and styles where suitable.
6.  **Preview:** Run the project and inspect the real browser output.
7.  **Test:** Check functionality, responsive layout, and errors.
8.  **Refine:** Fix visual and functional issues before moving on.
9.  **Report:** Summarize changed files, completed behaviour, tests
    performed, and remaining issues.

Additional rules:

-   Do not rewrite an entire file when a small, safe change is enough.
-   Before editing existing code, understand its dependencies and
    current behaviour.
-   Do not remove existing working features to solve an unrelated issue.
-   If a change affects shared CSS, JavaScript, navigation, or layouts,
    check the pages that depend on it.
-   Keep changes focused and explain any important assumptions.

## 20. Git and Project Safety Rules

1.  Use meaningful commit messages that describe the change.
2.  Do not commit `.env`, credentials, API secrets, private uploads, or
    local database files.
3.  Keep generated dependencies and environment-specific files out of
    source control according to the project's ignore rules.
4.  Do not force-push, delete branches, reset shared work, or overwrite
    another contributor's changes without explicit approval.
5.  Check the current branch and working tree before making significant
    changes.
6.  Review the final diff before committing.
7.  Do not claim code has been pushed to GitHub unless the push has
    succeeded.

## 21. Scope Control

### Core MVP scope

Prioritize the features identified for the MVP:

-   Authentication and role-based access.
-   Admin, owner, and buyer areas.
-   Company profile management.
-   Machine listing management.
-   Machine approval.
-   Marketplace search and machine details.
-   Machine availability and capacity.
-   Booking requests and owner decisions.
-   Booking status management.
-   Payment record handling.
-   Work completion.
-   Reviews.
-   Basic notifications and admin monitoring as defined in the approved
    requirements.

### Optional or future scope

Do not treat these as required for the first version unless approved:

-   Real payment gateway integration.
-   Email, SMS, or WhatsApp integrations beyond the approved basic
    notification scope.
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

## 22. Open Decisions --- Do Not Guess

The following details require an explicit product decision if they are
not already defined in the approved PRD:

1.  Capacity units and detailed availability scheduling rules.
2.  Booking cancellation deadlines, penalties, and refund rules.
3.  Demo payment failure/timeout handling and whether multiple demo
    payment attempts are allowed.
4.  Future payment gateway selection, commission, tax, settlement, and
    owner payout rules.
5.  Supported drawing/document file types and upload size limits.
6.  Whether buyer reviews can be edited or removed and how disputes are
    handled.
7.  Exact notification channels and delivery guarantees.
8.  Machine verification requirements and any related badges.
9.  Booking rescheduling rules.
10. Production deployment, hosting, backup, and retention policies.

When one of these decisions affects implementation, ask for
clarification or record the assumption explicitly before proceeding.

------------------------------------------------------------------------

## Final Rule

**Build IdleMach as a reliable manufacturing-capacity marketplace. Keep
the business workflow correct, protect user data, make every interface
clear and usable, reuse the project's approved structure, and never
invent functionality or claim work is complete without testing it.**
