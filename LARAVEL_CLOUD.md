# Laravel Cloud Deployment Guide for NairaHQ

NairaHQ v3.0.1 is packaged for Laravel Cloud and avoids the previous Akaunting technical debt.

## Required Laravel Cloud settings

Use PHP 8.4 or newer.

Recommended services:

- PostgreSQL database
- Queue worker using `php artisan queue:work --tries=3 --timeout=90`
- Scheduler using Laravel Cloud scheduler if you enable recurring jobs later

## Build command

Use this build command in Laravel Cloud:

```bash
composer install --no-dev --prefer-dist --optimize-autoloader
npm ci
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Deploy command

Use this deploy command:

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
DB_HOST=your-cloud-db-host
DB_PORT=5432
DB_DATABASE=your-db-name
DB_USERNAME=your-db-user
DB_PASSWORD=your-db-password

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
FILESYSTEM_DISK=local
MAIL_MAILER=log
```

## Important files included

This package includes the framework directories Laravel requires during Composer package discovery:

```text
bootstrap/cache/.gitignore
storage/framework/cache/data/.gitignore
storage/framework/sessions/.gitignore
storage/framework/testing/.gitignore
storage/framework/views/.gitignore
storage/logs/.gitignore
storage/app/private/.gitignore
storage/app/public/.gitignore
```

Laravel Cloud previously failed because `bootstrap/cache` was missing. That is fixed in v3.0.1.

## Local test commands

```bash
cp .env.example .env
composer install
npm ci
php artisan key:generate
php artisan migrate --seed
npm run build
php artisan serve
```
