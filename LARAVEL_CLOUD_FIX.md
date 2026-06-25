# Laravel Cloud PHP Runtime Fix

## Issue

Laravel Cloud selected PHP `8.5.7` during build. The locked dependencies in this Akaunting/Laravel 10 foundation are not compatible with PHP 8.5 yet.

Failing packages included:

- `lcobucci/jwt 5.3.0`, supports PHP 8.1, 8.2, 8.3
- `phpoffice/phpspreadsheet 1.30.5`, supports PHP lower than 8.5
- `sabberworm/php-css-parser v8.9.0`, supports up to PHP 8.4

## Fix Applied

The project now pins Composer's platform PHP to `8.4.0` and restricts the application requirement to:

```json
"php": ">=8.1 <8.5"
```

This prevents Laravel Cloud from installing/building the app on PHP 8.5 until the upstream dependency tree officially supports it.

## Recommended Laravel Cloud Build Command

```bash
composer install --no-dev --prefer-dist --optimize-autoloader
npm ci
npm run build
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Local Commands After Pulling This Version

```powershell
cd C:\laragon\www\nairahq
composer install
php artisan optimize:clear
npm ci
npm run build
```

## Do Not Use This Quick Hack

Do not deploy with:

```bash
composer install --ignore-platform-reqs
```

That may allow the build to pass while hiding real runtime incompatibilities. It can create production-only errors in authentication, PDF generation, Excel import/export, and CSS parsing.
