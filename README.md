# NairaHQ

NairaHQ is a modern Laravel accounting platform for small businesses and freelancers, built for Laravel Cloud.

## MVP modules

- Authentication
- Business onboarding
- Customers
- Vendors
- Products and services
- Bank accounts
- Invoices
- Payments
- Expenses
- Profit and loss report
- Nigerian VAT default support

## Stack

- Laravel 12
- PHP 8.4+
- PostgreSQL
- Blade
- Vite
- Plain CSS starter UI
- Database-backed sessions, cache, and queues

## Local setup

```bash
cp .env.example .env
composer install
npm ci
php artisan key:generate
php artisan migrate --seed
npm run build
php artisan serve
```

## Laravel Cloud build command

```bash
composer install --no-dev --prefer-dist --optimize-autoloader
npm ci
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Laravel Cloud deploy command

```bash
php artisan migrate --force
```

## Default seed user

```text
Email: admin@nairahq.com
Password: Password@12345
```

Change this immediately after first login.
