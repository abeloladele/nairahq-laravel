# Local Setup on Windows with Laragon

Open PowerShell in your project folder:

```powershell
cd C:\laragon\www\nairahq
composer install
copy .env.nairahq.example .env
php artisan key:generate
```

Create the database in Laragon or HeidiSQL:

```sql
CREATE DATABASE nairahq CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Update `.env`:

```env
DB_DATABASE=nairahq
DB_USERNAME=root
DB_PASSWORD=
APP_URL=http://nairahq.test
```

Install the app by CLI:

```powershell
php artisan install --db-host=127.0.0.1 --db-port=3306 --db-name=nairahq --db-username=root --db-password= --company-name="NairaHQ Demo" --company-email="hello@nairahq.com" --admin-email="admin@nairahq.com" --admin-password="ChangeMe@12345" --locale=en-GB --no-interaction
php artisan storage:link
php artisan optimize:clear
```

Run locally:

```powershell
php artisan serve
```

Open:

```text
http://127.0.0.1:8000/auth/login
```

Create or reset an admin user:

```powershell
php artisan nairahq:ensure-admin --name="Abel Oladele" --email="abeloladehle@gmail.com" --password="Oladele@1234"
```
