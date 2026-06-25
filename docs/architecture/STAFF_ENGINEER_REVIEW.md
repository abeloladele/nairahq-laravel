# Staff Engineer Review

## Requirements Analysis

- Scalability
  - Keep accounting records company-scoped and avoid cross-company data leaks.
  - Use queue workers for email, PDF generation, imports, exports, and reminders.
  - Use object storage for receipts, logos, exports, and attachments in production.
  - Add read-optimized reporting tables later if dashboards become slow.

- Maintainability
  - Preserve Akaunting's module-based structure instead of rewriting existing accounting flows.
  - Add custom NairaHQ features through new modules, commands, jobs, events, migrations, and config files.
  - Keep localization changes in language/config files.
  - Keep deployment scripts separate from application logic.

- Security
  - Never enable `APP_DEBUG=true` in production.
  - Rotate `APP_KEY` and database credentials if leaked.
  - Force HTTPS in production through the platform/proxy layer.
  - Use least-privilege database credentials.
  - Keep admin creation/update behind CLI only.
  - Validate uploads and store private documents outside the public path.
  - Add Sentry or Bugsnag DSN before launch.

## Technical Decision

The attached project is already a complete Laravel 10 accounting system. The best engineering decision is to productize it for NairaHQ instead of starting from a blank Laravel app. Rebuilding invoices, bills, roles, reports, and documents from scratch would introduce avoidable bugs and delay launch.

## Alternatives Considered

1. Build a fresh Laravel 12 + Filament app.
   - Pros: cleaner architecture and full control.
   - Cons: months of accounting-domain work, high risk of financial bugs, delayed MVP.

2. Use Akaunting as-is with only branding changes.
   - Pros: fastest start.
   - Cons: not enough product differentiation for the Nigerian SME market.

3. Recommended: use Akaunting as the foundation, then add NairaHQ product modules.
   - Pros: fastest reliable MVP with a path to deeper customization.
   - Cons: must respect upstream architecture and open-source license obligations.
