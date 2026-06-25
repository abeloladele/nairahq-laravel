# Laravel Cloud Deployment Checklist

## Build Commands

```bash
composer install --no-dev --prefer-dist --optimize-autoloader
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## First Deploy Environment Variables

```env
APP_NAME="NairaHQ"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
APP_INSTALLED=false
APP_LOCALE=en-GB
APP_TIMEZONE=Africa/Lagos
LOG_CHANNEL=stack
CACHE_DRIVER=file
QUEUE_CONNECTION=database
SESSION_DRIVER=file
FILESYSTEM_DISK=local
FIREWALL_ENABLED=true
MODEL_CACHE_ENABLED=true
```

Set database variables from Laravel Cloud:

```env
DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=your-db-name
DB_USERNAME=your-db-user
DB_PASSWORD=your-db-password
```

## First Production Install

Run this once from Laravel Cloud shell:

```bash
php artisan key:generate --force
php artisan install --db-host="$DB_HOST" --db-port="$DB_PORT" --db-name="$DB_DATABASE" --db-username="$DB_USERNAME" --db-password="$DB_PASSWORD" --company-name="NairaHQ" --company-email="hello@nairahq.com" --admin-email="admin@nairahq.com" --admin-password="ChangeMe@12345" --locale=en-GB --no-interaction
php artisan storage:link
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

After install, set:

```env
APP_INSTALLED=true
APP_DEBUG=false
```

## Diagnose 500 Errors

```bash
php artisan about
php artisan route:list
php artisan optimize:clear
tail -n 200 storage/logs/laravel.log
```

If no Laravel log appears, check Laravel Cloud application logs. A 500 before Laravel writes logs is usually caused by missing PHP extensions, bad environment variables, missing APP_KEY, file permissions, failed Composer install, or a web server entrypoint issue.
