# IdleMach --- Design Guide

**Project:** IdleMach\
**Tagline:** Turn Idle Capacity Into Opportunity\
**Document purpose:** Define the visual and interaction direction for
the IdleMach frontend prototype and later Laravel interface.

> **Design status:** This document establishes a practical design
> direction and reusable UI rules. The source project requirements do
> not define a final brand identity, exact colour values, font family,
> or approved page-by-page designs. Treat visual tokens and layouts
> below as design recommendations until they are reviewed and approved.

------------------------------------------------------------------------

## 1. Product and Design Context

IdleMach is a manufacturing-capacity marketplace. It helps:

-   **Machine Owners** list unused machine capacity and receive work
    requests.
-   **Buyers** discover suitable machines and request manufacturing
    time.
-   **Admins** review listings and monitor users, bookings, payments,
    and platform activity.

The interface must communicate this marketplace model clearly. It must
not look like a website for a CNC/VMC machine manufacturer or a
machine-selling store.

### Main design goals

1.  Make the marketplace purpose clear within the first screen.
2.  Help buyers find relevant machines and understand their
    availability.
3.  Make it easy for owners to list machines and manage requests.
4.  Give admins clear, information-focused management screens.
5.  Build trust through clarity, consistent behaviour, and accurate
    information---not unsupported marketing claims.
6.  Keep the interface usable on desktop, tablet, and mobile.
7.  Make the frontend prototype straightforward to convert into Laravel
    Blade templates.

## 2. Visual Direction

### Recommended visual character

Use a **professional industrial B2B marketplace** style:

-   Clean and structured.
-   Modern but not flashy.
-   Confident, practical, and trustworthy.
-   Focused on machine information, capacity, availability, and booking
    actions.
-   Spacious enough to make technical information easy to scan.

### Avoid

-   Generic AI-generated landing-page patterns.
-   Excessive gradients, glow effects, and decorative blobs.
-   Too many rounded cards or repeated card grids.
-   Oversized headings that push useful information below the fold.
-   Random animations and distracting motion.
-   Unrelated lifestyle or generic office stock photos.
-   Fake testimonials, customer logos, ratings, certifications, or
    statistics.
-   Visual elements that suggest IdleMach manufactures or sells
    machines.

## 3. Brand and Colour System

The project source does not establish approved HEX/RGB values. Use
semantic colour tokens and confirm exact values before treating them as
final brand colours.

### Suggested colour roles

  -----------------------------------------------------------------------
  Token                               Intended use
  ----------------------------------- -----------------------------------
  `--color-primary`                   Main brand actions, active
                                      navigation, key links

  `--color-primary-dark`              Hover states, strong emphasis, dark
                                      brand surfaces

  `--color-primary-soft`              Subtle selected states and
                                      supporting backgrounds

  `--color-accent`                    Important secondary actions and
                                      limited highlights

  `--color-navy`                      Dark headings, footer, sidebar, or
                                      strong text surfaces

  `--color-background`                Main page background

  `--color-surface`                   Cards, forms, menus, and panels

  `--color-text`                      Main body text

  `--color-muted`                     Supporting text, hints, metadata

  `--color-border`                    Dividers, outlines, input borders

  `--color-success`                   Successful actions and completed
                                      states

  `--color-warning`                   Pending or attention-needed states

  `--color-danger`                    Errors, rejection, destructive
                                      actions

  `--color-info`                      Neutral information and guidance
  -----------------------------------------------------------------------

### Colour usage rules

1.  Use the primary colour consistently for the main action hierarchy.
2.  Use the accent colour sparingly; it should not compete with primary
    actions.
3.  Keep body text and important labels high contrast against their
    backgrounds.
4.  Use neutral backgrounds for most content areas.
5.  Do not communicate status by colour alone. Pair colour with a text
    label and, where useful, an icon.
6.  Keep status colours consistent across public pages, dashboards,
    tables, and booking details.
7.  Do not add arbitrary colours to individual pages.

### Status colour mapping

| Status meaning | Suggested treatment |
|---|---|
| Available / active / successful / completed | Success |
| Pending / awaiting action / payment pending | Warning |
| Rejected / failed / blocked / cancelled | Danger or neutral-danger |
| Informational update | Info |
| Inactive / unavailable / maintenance | Neutral or warning, according to context |

Machine approval and operational condition are separate status dimensions. Show both where users need to understand a listing's state; never use one badge or one combined status value to hide that distinction. Always pair colour with readable status text.

## 4. Typography

The source does not specify a required font family. Use a readable
sans-serif font stack and keep the typography system simple.

### Typography hierarchy

  Text role             Design guidance
  --------------------- --------------------------------------------
  Main page heading     Clear, prominent, short
  Section heading       Distinct but smaller than the page heading
  Card or panel title   Medium emphasis
  Body text             Comfortable line height and readable size
  Labels                Clear and compact
  Metadata              Smaller, muted, but still readable
  Buttons               Short action wording with clear emphasis

### Typography rules

1.  Use no more than two font families unless a clear need is approved.
2.  Use a consistent scale for headings, body text, labels, and
    metadata.
3.  Avoid very thin font weights for important information.
4.  Do not use all-caps for long headings or paragraphs.
5.  Keep line lengths comfortable, especially for descriptions and help
    text.
6.  Use tabular numerals where helpful for prices, capacities, dates,
    and totals.

## 5. Layout and Spacing

### General layout

1.  Use a consistent content container and alignment system.
2.  Keep page sections visually separated with spacing, subtle borders,
    or background changes.
3.  Align headings, filters, tables, and content panels to a clear grid.
4.  Avoid placing too many unrelated items in one row.
5.  Keep primary actions easy to locate.
6.  Use consistent page padding across related screens.

### Spacing system

Use a repeatable spacing scale rather than arbitrary values. A practical
starting scale is:

-   `4px` --- tiny icon/text spacing.
-   `8px` --- compact spacing.
-   `12px` --- small component spacing.
-   `16px` --- standard component spacing.
-   `24px` --- section and panel spacing.
-   `32px` --- larger section spacing.
-   `48px` --- major page section spacing.
-   `64px` --- large landing-page section spacing.

These are recommended starting values, not fixed requirements. Adjust
where the layout needs it, while keeping the system consistent.

### Containers and grids

-   Use Bootstrap 5 containers and responsive grid utilities.
-   Avoid fixed widths that cause horizontal scrolling.
-   Use a consistent maximum content width for long pages.
-   Keep forms and detail panels narrower than full-width data tables
    where appropriate.
-   On small screens, stack columns in a logical reading order.

## 6. Shared Components

Build reusable components so the same patterns behave and look alike
throughout the site.

### 6.1 Navigation bar

Public navigation should help visitors understand the platform and reach
the main pages.

Recommended public navigation items, subject to the approved sitemap:

-   Home
-   Explore Machines
-   How It Works
-   About
-   Contact
-   Login
-   Register / Get Started

Rules:

1.  Keep navigation labels short and understandable.
2.  Make the active page clear.
3.  Use one visually clear primary call to action.
4.  Provide a usable mobile navigation menu.
5.  Do not show dashboard links to visitors who are not authenticated.
6.  Do not add navigation items for pages that do not exist.

### 6.2 Dashboard sidebar

Use role-specific navigation for Admin, Owner, and Buyer areas.

Rules:

-   Group related items.
-   Highlight the current section.
-   Use consistent icon placement and labels.
-   Keep the sidebar usable on smaller screens, where it may become a
    drawer or compact menu.
-   Do not show links the current role cannot access.

### 6.3 Buttons

Define consistent button styles:

-   Primary: main action on the page.
-   Secondary: supporting action.
-   Outline or subtle: low-priority action.
-   Danger: destructive or irreversible action.

Rules:

1.  Use action labels such as "Add Machine", "Send Request", "Accept
    Booking", and "Save Changes".
2.  Avoid vague labels such as "Click Here".
3.  Make disabled states visually clear.
4.  Provide hover, focus, active, and disabled states.
5.  Do not make multiple buttons look equally important when one action
    is the main action.

### 6.4 Forms and inputs

Use consistent labels, input heights, spacing, borders, and validation
messages.

Rules:

-   Put labels above inputs unless a clear alternative is needed.
-   Mark required fields clearly.
-   Use helpful placeholders only as examples; do not use placeholders
    instead of labels.
-   Group related fields into logical sections.
-   Explain accepted file formats and size limits when those limits are
    defined.
-   Show errors near the relevant field.
-   Preserve entered values after validation errors where safe.
-   Make focus and disabled states clear.

### 6.5 Cards and panels

Use cards only when they help group related information.

A machine card may show, when available:

- Machine image.
- Machine name and type.
- Location.
- Key specifications.
- Rate.
- Operational availability summary.
- Link to machine details.

Marketplace visibility is controlled only by approval_status: show all approved listings, including machines that are inactive or under maintenance. Show the operational state clearly on the card and details page. An inactive or maintenance machine remains discoverable but must not show an enabled new-booking action.

Do not show pending or rejected listings in public marketplace results. Do not invent missing specifications, prices, availability, or ratings. If a field is unknown, omit it or label it appropriately.

### 6.6 Tables

Use tables for admin and dashboard data where comparison across rows is
useful.

Rules:

-   Use clear column headings.
-   Keep row actions consistent.
-   Use status labels, not colour alone.
-   Provide empty states.
-   On mobile, use a responsive table pattern or an alternative stacked
    layout.
-   Avoid showing too many low-value columns by default.

### 6.7 Alerts, badges, and modals

-   Alerts should explain what happened and what the user can do next.
-   Badges should communicate real status or category information.
-   Modals should be used for short, focused tasks or confirmations.
-   Destructive actions should require clear confirmation.
-   Do not use modals for long forms that would be easier on a dedicated
    page.

## 7. Public Website Pages

The exact sitemap must be confirmed. The following pages are identified
in the project requirements or suggested frontend prototype structure.

### 7.1 Home page

The home page should explain the marketplace, not present IdleMach as a
machine manufacturer.

Recommended content order:

1.  **Header:** Brand, public navigation, login, and primary
    registration action.
2.  **Hero:** A clear headline explaining unused manufacturing capacity,
    a short supporting paragraph, and a relevant call to action.
3.  **Marketplace discovery:** A search or browse entry point for
    machines, if included in the approved prototype scope.
4.  **How it works:** Explain the owner and buyer journeys in simple
    steps.
5.  **Marketplace highlights:** Show the kinds of machine information
    users can discover, using clearly marked sample data if real data is
    unavailable.
6.  **Owner participation section:** Explain how owners can list unused
    capacity.
7.  **Buyer participation section:** Explain how buyers can find
    manufacturing capacity.
8.  **Trust and clarity section:** Explain the approval and booking
    process only to the extent it is implemented and confirmed.
9.  **Footer:** Relevant navigation and contact information.

Home page rules:

-   State the value proposition quickly.
-   Make both user groups visible: owners and buyers.
-   Avoid fake platform metrics, testimonials, partner logos, or claims.
-   Use real, relevant manufacturing imagery or clearly identified
    placeholders.
-   Do not add sections only to make the page longer.

### 7.2 Explore Machines page

Purpose: help buyers discover machines that may suit their manufacturing
needs.

Recommended interface elements:

-   Page heading and short explanation.
-   Search field.
-   Relevant filters, based on available data.
-   Machine result count, if supported by actual data.
-   Machine result cards or a clear list.
-   Empty state when no machines match.
-   Pagination or load-more behaviour if needed.

Potential filters include machine type, location, rate, and availability
only where the corresponding data and filter behaviour exist.

### 7.3 Machine Details page

Recommended content hierarchy:

1. Machine name and operational availability label.
2. Machine image gallery.
3. Owner/company information that is approved for display.
4. Machine type and technical specifications.
5. Location.
6. Rate and capacity information.
7. Availability summary or calendar.
8. Booking/request action state.
9. Relevant supporting information.

Rules:

- Keep the booking action easy to find when the machine is eligible.
- Do not show private owner information.
- Do not invent machine specifications or capacity.
- Display approval state only where appropriate for the current role; never expose pending/rejected listings publicly.
- An approved and active machine may show a booking action, subject to date/time capacity checks.
- An approved but inactive machine remains visible with an "Unavailable" state and a disabled booking action.
- An approved machine under maintenance remains visible with an "Under maintenance" state and a disabled booking action.
- Pending and rejected machines must not appear on public marketplace pages.
- A visible machine is not automatically bookable; the booking action must also check operational status and availability.
- Do not allow a frontend prototype to imply that a booking has been saved to a real database.

### 7.4 How It Works page

Explain the two marketplace journeys separately.

**For Machine Owners:**

1.  Register.
2.  Create company profile.
3.  Add machine details and capacity.
4.  Submit listing for review.
5.  Manage booking requests.
6.  Complete accepted work.

**For Buyers:**

1.  Register.
2.  Explore machines.
3.  Check details and availability.
4.  Send a booking request.
5.  Pay after owner acceptance.
6.  Track and complete the work.

Keep the wording aligned with the actual workflow. Do not imply payment
or booking confirmation happens earlier than it does.

### 7.5 About and Contact pages

-   Explain the platform's purpose in plain language.
-   Do not invent company history, office addresses, phone numbers, team
    members, or credentials.
-   Use only confirmed contact details.
-   Clearly identify prototype-only contact forms if they are not
    connected to a backend.

### 7.6 Login and Registration pages

-   Keep forms focused and easy to scan.
-   Make the account role choice clear if the registration flow requires
    it.
-   Use clear validation and error states.
-   Do not imply that an account was created unless the prototype or
    backend actually completes that action.
-   Do not expose passwords or sensitive form values in the interface.

## 8. Role-Based Dashboard Design

Dashboards should prioritize the tasks and information relevant to each
role. Avoid making every dashboard look like the same generic admin
template.

### 8.1 Owner dashboard

Potential dashboard sections, based on the documented owner
capabilities:

-   Overview of machine listings.
-   Machine status and approval information.
-   Available capacity and availability.
-   Incoming booking requests.
-   Current and past bookings.
-   Relevant payment/earnings information.
-   Reviews.

Prioritize incoming requests and machine availability because they
support the owner's main tasks.

### 8.2 Buyer dashboard

Potential dashboard sections, based on documented buyer capabilities:

-   Booking overview.
-   Pending requests.
-   Accepted or confirmed bookings.
-   Work in progress.
-   Completed bookings.
-   Payment records.
-   Reviews and relevant notifications.

Make booking status and the next required action easy to understand.

### 8.3 Admin dashboard

Potential dashboard sections, based on documented admin capabilities:

-   User and company management.
-   Pending machine approvals.
-   Machine listing management.
-   Booking monitoring.
-   Payment monitoring.
-   Reviews.
-   Reports and platform activity.

Use clear tables, filters, status labels, and action confirmations. Do
not invent analytics metrics or chart data.

## 9. Booking and Status UI

Use the project's defined statuses consistently.

### Machine status fields

**Approval status (approval_status):**
- pending
- approved
- rejected

**Operational status (operational_status):**
- active
- inactive
- maintenance

These are independent fields, not one combined status list.

### Availability statuses

-   `available`
-   `booked`
-   `maintenance`
-   `unavailable`

### Booking statuses

-   `pending`
-   `accepted`
-   `rejected`
-   `payment_pending`
-   `confirmed`
-   `in_progress`
-   `completed`
-   `cancelled`

### Payment statuses

-   `pending`
-   `successful`
-   `failed`
-   `refunded`

Design rules:

1. Display understandable labels to users; internal status values may remain in code and database.
2. Keep the same status meaning and visual treatment across all pages.
3. Show the next action only to the role allowed to perform it.
4. Use a timeline or step indicator only when it helps users understand progress.
5. Do not imply a booking is confirmed before a successful demo payment record is saved in the MVP.
6. Do not imply payment is available before owner acceptance; clearly label the MVP payment flow as a demo/simulation with no real charge.
7. Marketplace results include all approved machines, even when inactive or under maintenance.
8. Only approved AND active machines may display an enabled new-booking action; date/time capacity must still be checked.
9. Approved inactive machines display "Unavailable"; approved machines under maintenance display "Under maintenance"; both have disabled booking actions.
10. Pending and rejected machines are hidden from public marketplace pages.
11. Keep approval and operational labels distinct where both are shown.
12. Make rejected, failed, cancelled, and unavailable states clear without relying on colour alone.

## 10. Responsive Behaviour

Use a mobile-first approach with Bootstrap 5 responsive utilities.

### Desktop

-   Use the available width for structured content.
-   Keep navigation and dashboards easy to scan.
-   Use multi-column layouts when they improve comparison.

### Tablet

-   Reduce columns where necessary.
-   Keep filters and actions accessible.
-   Prevent dashboard sidebars from squeezing the main content.

### Mobile

-   Stack content into a clear vertical order.
-   Use full-width primary actions where useful.
-   Make forms comfortable to complete.
-   Keep machine images and important details readable.
-   Convert wide tables to a mobile-friendly presentation.
-   Ensure navigation and dashboard menus are easy to open and close.
-   Avoid horizontal scrolling except where a genuinely wide data view
    requires a controlled scroll area.

Test actual pages at multiple viewport widths. Do not assume a page is
responsive just because it uses Bootstrap.

## 11. Interaction and Motion

1.  Use interaction to provide feedback, not decoration.
2.  Keep animations short and subtle.
3.  Respect reduced-motion preferences where animations are used.
4.  Provide visible hover, focus, active, disabled, loading, success,
    and error states where relevant.
5.  Buttons and links must perform the action their labels promise.
6.  Search and filters in the frontend prototype should demonstrate real
    client-side behaviour when included.
7.  Clearly label demo-only booking and payment behaviour.
8.  Never show a false success message for an action that was not
    completed.

## 12. Icons and Images

### Icons

-   Use Font Awesome, as specified by the project frontend stack.
-   Keep icon style, size, and alignment consistent.
-   Use icons to support text, not replace important labels.
-   Avoid decorative icons that add no meaning.
-   Ensure icon-only controls have accessible names or labels.

### Images

-   Prefer relevant machine, workshop, and manufacturing images.
-   Use images that support the specific content.
-   Maintain consistent image aspect ratios within repeated components.
-   Use suitable object-fit behaviour without hiding important machine
    details.
-   Provide meaningful alternative text for informative images.
-   If final assets are unavailable, use clearly identified placeholders
    rather than pretending they are actual IdleMach listings.

## 13. Accessibility and Usability

1.  Use semantic HTML.
2.  Associate form labels with their inputs.
3.  Maintain sufficient text/background contrast.
4.  Keep keyboard focus visible.
5.  Ensure interactive controls are keyboard accessible.
6.  Use descriptive link and button text.
7.  Do not rely on colour alone for status or validation.
8.  Use helpful error messages and instructions.
9.  Keep headings in a logical order.
10. Avoid tiny text and tightly packed controls.
11. Give users feedback after actions.
12. Test the main flows with keyboard navigation.

## 14. Frontend Implementation Rules

For the initial prototype, use only:

-   HTML5
-   CSS3
-   Vanilla JavaScript
-   Bootstrap 5
-   Font Awesome

Recommended structure from the project requirements:

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

Rules:

1.  Keep shared styles in `css/style.css`.
2.  Keep shared interactions in `js/script.js`.
3.  Reuse shared navigation, footer, buttons, forms, and other common
    patterns.
4.  Keep page-specific markup clear and manageable.
5.  Do not add another frontend framework without approval.
6.  Do not add backend or database behaviour to the frontend-only stage.
7.  Keep the markup and asset structure suitable for later Blade
    integration.
8.  Add dashboard preview pages only when they are part of the agreed
    prototype sitemap.

## 15. Design Tokens and CSS Naming

Use CSS custom properties for shared design values. Example structure:

``` css
:root {
  /* Brand colours: replace with approved final values */
  --color-primary: ...;
  --color-primary-dark: ...;
  --color-primary-soft: ...;
  --color-accent: ...;
  --color-navy: ...;

  /* Surfaces and text */
  --color-background: ...;
  --color-surface: ...;
  --color-text: ...;
  --color-muted: ...;
  --color-border: ...;

  /* Status colours */
  --color-success: ...;
  --color-warning: ...;
  --color-danger: ...;
  --color-info: ...;

  /* Layout */
  --container-max-width: ...;
  --radius-control: ...;
  --radius-card: ...;
  --shadow-card: ...;
}
```

The ellipses are placeholders, not valid final CSS values. Set approved
values before using this as a production stylesheet.

Naming rules:

-   Prefer clear names such as `.site-header`, `.hero-section`,
    `.machine-card`, `.status-badge`, `.dashboard-sidebar`, and
    `.form-field`.
-   Avoid unclear names such as `.box1`, `.blue-text2`, or
    `.new-card-final`.
-   Keep selectors reasonably specific.
-   Avoid excessive `!important`.
-   Do not duplicate the same design rule across multiple files.

## 16. Design Review Checklist

Before approving a page, check the following.

### Product clarity

-   [ ] Does the page clearly support the IdleMach marketplace?
-   [ ] Is it clear whether the page is for an owner, buyer, or admin?
-   [ ] Does the page avoid presenting IdleMach as a machine
    manufacturer?

### Visual quality

-   [ ] Is the visual hierarchy clear?
-   [ ] Are spacing, colours, typography, and components consistent?
-   [ ] Does the page avoid generic AI-looking patterns and unnecessary
    decoration?
-   [ ] Are images relevant and correctly displayed?
-   [ ] Are important actions easy to find?

### Usability

-   [ ] Are navigation links and controls functional?
-   [ ] Are forms labelled and understandable?
-   [ ] Are loading, empty, error, and success states handled where
    relevant?
-   [ ] Are status labels clear?
-   [ ] Is the content easy to scan?

### Responsive and accessible design

-   [ ] Does the page work on desktop, tablet, and mobile?
-   [ ] Is there unwanted horizontal overflow?
-   [ ] Can the page be used with a keyboard?
-   [ ] Is text contrast sufficient?
-   [ ] Are icons and images accessible where required?

### Accuracy

-   [ ] Are all displayed specifications and figures supported by actual
    data?
-   [ ] Are sample records clearly treated as demo data?
-   [ ] Are booking and payment demonstrations labelled honestly?
-   [ ] Are there any fake testimonials, metrics, credentials, or
    claims?

## 17. Design Decisions Still to Confirm

The following are not fully defined by the supplied product requirements
and should be approved separately:

1.  Final brand logo and wordmark.
2.  Exact primary, dark, soft, accent, and navy colour values.
3.  Final font family and typography scale.
4.  Final public website sitemap and page order.
5.  Final homepage copy, imagery, and section order.
6.  Whether dashboard pages are included in the first frontend
    prototype.
7.  Final machine card fields and marketplace filter set.
8.  Final dashboard metrics and chart requirements, if any.
9.  Exact responsive sidebar and navigation behaviour.
10. Final component sizes, corner radii, shadows, and detailed spacing
    tokens.

Do not silently treat proposed design recommendations as approved
product decisions.

------------------------------------------------------------------------

## Final Design Principle

**Every design choice should make IdleMach easier to understand and use.
Prioritize clear manufacturing information, honest marketplace
workflows, consistent components, and responsive usability over
decoration.**
