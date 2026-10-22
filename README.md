# Instance Residency Finder

A Laravel platform for property listings where accounts are not trusted on sign-up. Every
registration starts in a pending state and has to clear an admin approval before it can act, with
roles, a status lifecycle, and a complaints channel for disputes.

## Stack

| Layer | Choice |
|---|---|
| Backend | PHP 7.3 / 8, Laravel 8 (`laravel/framework ^8.40`) |
| Auth | Laravel auth scaffolding + Sanctum personal access tokens |
| Database | MySQL |

## Features

- **Listings** — properties with their own controller and model (`PropertiesController`,
  `app/Models/property.php`).
- **Account vetting** — `AdminApprovalController` moves a user from pending to active; the
  `status` table backs the lifecycle.
- **Roles** — a dedicated `roles` table and `app/Models/role.php`, so approval, listing ownership
  and admin actions can be separated.
- **Complaints** — users can raise a complaint against a listing or account
  (`ComplainsController`, `Complain` model).
- **Home** — public landing and search entry point (`HomeController`).

## Schema

`roles`, `statuses`, `users`, `password_resets`, `failed_jobs`, `properties`, `complains`.

## Running it

```bash
composer install
npm install && npm run dev

cp .env.example .env
# then set GOOGLE_API_KEY=<your key> in .env
php artisan key:generate
php artisan migrate --seed

php artisan serve
```

Secrets come from the environment; `.env` is not committed. The Google Maps key is read from
`GOOGLE_API_KEY` — there is no hard-coded fallback.
