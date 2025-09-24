# Laravel Task Manager (Laravel 11 + Breeze + Sanctum)

## Requirements
- PHP 8.2+
- Composer
- Node.js 20+
- SQLite (default)

## Setup
```bash
git clone <your-repo-url>
cd laravel-task-manager
cp .env.example .env
# Set DB_CONNECTION=sqlite and create the DB file
mkdir -p database && touch database/database.sqlite

composer install
php artisan key:generate
php artisan migrate
npm install
npm run build

php artisan serve
