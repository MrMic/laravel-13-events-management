# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands

```bash
# Initial setup (install deps, generate key, migrate, build assets)
composer setup

# Start dev server (serves on port 8000 by default)
php artisan serve

# Start full dev environment (server + queue + logs + vite)
composer dev

# Run all tests
composer test

# Run a single test file
php artisan test tests/Feature/ExampleTest.php

# Run a single test method
php artisan test --filter=test_method_name

# Format code (Laravel Pint)
./vendor/bin/pint

# Migrate and seed
php artisan migrate --seed

# Reset and reseed
php artisan migrate:fresh --seed
```

## Architecture

Pure API project — no Blade views, no frontend routing. All routes live under `/api` prefix (Laravel 13 convention in `bootstrap/app.php`).

### Data model

```
User  ──< Event  ──< Attendee >── User
```

- `Event` belongs to `User` (creator), has many `Attendee`
- `Attendee` is a join between a `User` and an `Event` (who registered)
- Both `Event` and `Attendee` belong to `User`, but for different roles

### Routing

`routes/api.php` registers two resourceful routes:
- `apiResource("events", EventController)` → standard CRUD on `/api/events`
- `apiResource("events.attendees", AttendeeController)->scoped(["attendee" => "event"])` → nested resource with scoped binding; attendees are always accessed via their parent event (`/api/events/{event}/attendees/{attendee}`)

### Controllers

All controllers live in `app/Http/Controllers/Api/`. Only `EventController@index` and `EventController@show` are implemented; the rest are stubs awaiting implementation.

### Auth

Laravel Sanctum is installed. The `/api/user` route is protected by `auth:sanctum`. Event/attendee endpoints are not yet auth-guarded.

### Database

SQLite (file: `database/database.sqlite`) in local and CI. Tests use in-memory SQLite (configured in `phpunit.xml`). Seeders: `DatabaseSeeder` → `EventSeeder` + `AttendeeSeeder`, creating 1000 users, 200 events, and attendees.

### HTTP client files

`requests.http` + `http-client.env.json` are for Kulala (Neovim HTTP client). Dev base URL: `http://127.0.0.1:8001/api`.

### Changelog

`git-cliff` generates `CHANGELOG.md` from Conventional Commits. A GitHub Action (`.github/workflows/changelog.yml`) runs automatically. Do not edit `CHANGELOG.md` manually.
