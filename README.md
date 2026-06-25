# NairaHQ v3.0.0

Online accounting software for Nigerian small businesses and freelancers, built as a clean Laravel Cloud-ready repository.

## What is included

- Laravel 12 application structure
- Blade UI with Vite asset build
- Authentication
- Business onboarding
- Customers, vendors, products/services
- Bank accounts
- Invoices, invoice items, payments
- Expenses
- Profit and loss report
- PostgreSQL-ready migrations
- Queue, session and cache database tables
- No Akaunting dependencies
- No Laravel Mix, Vue 2 or Node Sass
- No production Composer scripts that call IDE helpers

## Local setup on Windows / Laragon

```powershell
cd C:\laragon\www
mkdir nairahq
cd nairahq
# copy this repository here
composer install
npm install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run build
php artisan serve
```

Login seed account:

```text
Email: admin@nairahq.test
Password: Password@12345
```

## Laravel Cloud build command

Use PHP 8.3 or PHP 8.4.

```bash
composer install --no-dev --prefer-dist --optimize-autoloader
npm install
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Laravel Cloud deploy command

```bash
php artisan migrate --force
```

## Environment variables

Set these in Laravel Cloud:

```env
APP_NAME=NairaHQ
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app.laravel.cloud
DB_CONNECTION=pgsql
QUEUE_CONNECTION=database
CACHE_STORE=database
SESSION_DRIVER=database
```

## Notes

This is the new clean foundation. It intentionally does not reuse the Akaunting codebase because the previous source had outdated frontend tooling, abandoned packages and production build script problems.
