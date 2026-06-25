Copy-Item .env.nairahq.example .env -Force
composer install
php artisan key:generate
php artisan optimize:clear

Write-Host "Now create your database and run:"
Write-Host 'php artisan install --db-host=127.0.0.1 --db-port=3306 --db-name=nairahq --db-username=root --db-password= --company-name="NairaHQ Demo" --company-email="hello@nairahq.com" --admin-email="admin@nairahq.com" --admin-password="ChangeMe@12345" --locale=en-GB --no-interaction'
