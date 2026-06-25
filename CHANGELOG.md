# Changelog

## NairaHQ v3.0.0 - 2026-06-25

### Added
- Rebuilt project as a clean Laravel Cloud-ready repository.
- Added authentication, business onboarding and business-scoped accounting records.
- Added customers, vendors, products, bank accounts, invoices, payments and expenses.
- Added dashboard KPIs and profit/loss report.
- Added PostgreSQL-ready migrations and seed data.
- Added Vite build script for Laravel Cloud.

### Removed
- Removed Akaunting dependency path.
- Removed Laravel Mix-era frontend assumptions.
- Removed development-only Composer scripts from production lifecycle.

### Security
- Added business ownership policy.
- Added business selection middleware.
- Added hashed passwords and production-safe environment defaults.
