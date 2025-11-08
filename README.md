# Laravel Employee Management System


This is a Employee Management System for Laravel 11.


## Requirements
- PHP 8.2+
- Composer
- MySQL / SQLite / Postgres


## Installation (quick)
1. `git clone emp_sys`
2. `composer install`
3. Copy `.env.example` to `.env` and configure DB
4. `php artisan key:generate`
5. (Optional) set `QUEUE_CONNECTION=database` in `.env` and run `php artisan queue:table` & `php artisan migrate`.
6. Run migrations and seeders:


```bash
php artisan migrate --seed