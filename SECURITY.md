# Security Notes

- Keep `APP_DEBUG=false` in production.
- Use Laravel Cloud-managed PostgreSQL credentials.
- Rotate `APP_KEY` only before production data exists, unless encrypted data migration is planned.
- Use HTTPS only in production.
- Do not run `composer install --ignore-platform-reqs` in production.
- Add payment provider keys only through Laravel Cloud environment variables.
