# Laravel Cloud PHP 8.5 Composer Build Fix

## Issue
The build failed because Laravel Cloud selected PHP 8.5.7, while the current Akaunting/Laravel dependency lock contains packages that do not support PHP 8.5 yet.

Failing packages include:

- `lcobucci/jwt 5.3.0`, supports PHP 8.1, 8.2, or 8.3
- `phpoffice/phpspreadsheet 1.30.5`, supports PHP below 8.5
- `sabberworm/php-css-parser v8.9.0`, supports PHP up to 8.4

## Root Cause
Laravel Cloud defaults new environments to PHP 8.5. The project dependency graph is not ready for PHP 8.5.

## Required Laravel Cloud Setting
Go to:

Laravel Cloud → Project → Environment → General Settings → PHP Version

Set PHP Version to:

```text
PHP 8.3
```

Then redeploy.

## Why PHP 8.3 Instead of PHP 8.4
`lcobucci/jwt 5.3.0` is locked to PHP `~8.1.0 || ~8.2.0 || ~8.3.0`, so PHP 8.4 is still not fully compatible with the current lock file.

## Composer Changes Applied
`composer.json` now contains:

```json
"require": {
  "php": "~8.3.0"
},
"config": {
  "platform": {
    "php": "8.3.0"
  }
}
```

## Correct Build Command

```bash
composer install --no-dev --prefer-dist --optimize-autoloader
npm ci
npm run build
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Do Not Use

```bash
composer install --ignore-platform-reqs
```

That bypasses Composer safety checks and can create production-only runtime failures.

## Future Upgrade Path
Later, upgrade the application dependencies and regenerate `composer.lock` on a supported local PHP version before moving the cloud runtime to PHP 8.4 or PHP 8.5.
