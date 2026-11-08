# Vendor assets

Third-party libraries are stored locally so the prototype runs offline and does
not depend on a CDN during review.

| Folder         | Library            | Version | Files                          |
| -------------- | ------------------ | ------- | ------------------------------ |
| `bootstrap/`   | Bootstrap          | 5.3.3   | `bootstrap.min.css`, `bootstrap.bundle.min.js` |
| `fontawesome/` | Font Awesome Free  | 6.7.2   | `css/all.min.css`, `webfonts/*` |

## Rules

- Do not edit files inside `assets/vendor/`.
- Do not add React, Vue, Angular, jQuery, Tailwind, or another UI framework.
  The approved stack is HTML5, CSS3, vanilla JavaScript, Bootstrap 5, and Font
  Awesome.
- If a version is upgraded, download the full matching set (CSS, JS bundle, and
  webfonts) and re-test both pages in a browser.
- Font Awesome CSS expects its webfonts at `../webfonts/`, which matches this
  folder layout.
