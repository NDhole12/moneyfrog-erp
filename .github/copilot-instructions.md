# Copilot Instructions for moneyfrog_erp

## Project Overview
- This is a Laravel 12 monorepo for a multi-tenant ERP/dashboard system, with multiple UI themes under `Laravel/` (e.g., `modern`, `material`, `minimal`, `saas`).
- The main app code is in `app/`, with standard Laravel structure: `Http/Controllers`, `Models`, `Providers`, etc.
- Views are in `resources/views/`, using Blade templates. Layouts and components are in `layouts/` and `components/` subfolders.
- Static assets are managed via Vite (`vite.config.js`), with build output in `public/build/`.

## Key Workflows
- **Development server:** `npm run dev` (uses Vite for hot reload)
- **Production build:** `npm run build`
- **Clean build assets:** `npm run clean`
- **RTL CSS build:** `npm run build-rtl`
- **PHP server:** `php artisan serve`
- **Run tests:** `php artisan test` or `vendor/bin/phpunit`
- **Composer dependencies:** `composer install` / `composer update`

## Project Conventions & Patterns
- **Routing:**
  - Web routes in `routes/web.php` use a catch-all to `HomeController@index`, which loads Blade views matching the request path.
  - Language switching via `/index/{locale}` handled by `HomeController@lang`.
  - The password reset request form lives at `/forget-password`; the route retains Laravel's `password.request` / `password.email` names for reuse in Blade helpers.
- **Authentication:**
  - Uses Laravel's built-in Auth, but demo sessions may use `demo_user_authenticated` session key.
  - `config('services.demo_login.base_url')` points at `COMMON_API_LINK` (defaults to `http://localhost:3000/`). Grab the demo session cookie with `curl --location "${COMMON_API_LINK}erp_user/login" --header 'Content-Type: application/json' --data-raw '{"email": "saurabh@moneyfrog.in", "password": "helloNeha143"}' --cookie-jar cookies.txt` and reuse `cookies.txt` for protected pages.
- **Views:**
  - Blade templates extend `layouts.master` and use `@component` for breadcrumbs, etc.
  - Sidebar/menu structure is in `layouts/sidebar.blade.php`.
- **Assets:**
  - SCSS entrypoints are in `resources/scss/`, built via Vite.
  - JS/CSS libraries are managed via npm and imported in Blade or via Vite.
- **Localization:**
  - Language files are in `lang/{locale}/translation.php`.
  - Use `@lang('translation.key')` in Blade for translations.
- **Testing:**
  - Feature and unit tests are in `tests/Feature` and `tests/Unit`.
  - Test config in `phpunit.xml`.

## Integration Points
- **Frontend:**
  - Uses Bootstrap 5, various JS libraries (see `package.json`), and custom SCSS.
  - Multiple UI themes in `Laravel/{theme}/` (each may have its own README and assets).
- **Backend:**
  - Laravel 12, with Sanctum for API auth, and standard Laravel service providers.
- **Build tools:**
  - Vite for asset pipeline, configured in `vite.config.js`.

## Examples
- To add a new page: create a Blade file in `resources/views/`, add a route in `web.php` if needed, and link via the sidebar.
- To add a translation: update the appropriate `lang/{locale}/translation.php` file and use `@lang` in Blade.

---

For more details, see `README.md` and theme-specific READMEs under `Laravel/{theme}/`.
