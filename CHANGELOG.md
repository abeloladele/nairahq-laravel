# Changelog

## NairaHQ v3.0.1 - Laravel Cloud deployment hardening

- Added required `bootstrap/cache` directory with Git-tracked placeholder.
- Added required `storage/framework/*`, `storage/logs`, and `storage/app/*` runtime directories.
- Added a committed `package-lock.json` for predictable frontend builds.
- Added Laravel configuration files for app, auth, database, cache, sessions, queues, filesystems, logging, mail, services, and NairaHQ defaults.
- Removed unnecessary Vue Vite plugin dependency from the frontend build.
- Fixed bank account route model binding parameter naming.
- Updated Laravel Cloud deployment documentation.

## NairaHQ v3.0.0 - Clean Laravel Cloud accounting foundation

- Built a clean Laravel 12 accounting MVP without Akaunting dependencies.
- Added businesses, customers, vendors, products, invoices, payments, expenses, bank accounts, and reports.
- Added Vite build pipeline and PostgreSQL-ready environment configuration.
