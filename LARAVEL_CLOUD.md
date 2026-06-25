# Laravel Cloud Deployment

1. Push this repository to GitHub.
2. Create a new Laravel Cloud application from the GitHub repository.
3. Select PHP 8.3 or PHP 8.4.
4. Add a PostgreSQL database.
5. Set the environment variables from `.env.example`.
6. Use the build command:

```bash
composer install --no-dev --prefer-dist --optimize-autoloader
npm install
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

7. Use the deploy command:

```bash
php artisan migrate --force
```

8. Open `/up` to confirm the app health route.
