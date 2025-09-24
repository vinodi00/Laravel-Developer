# Laravel Task Manager – Starter Kit (Breeze + Sanctum + Blade)

This package contains **only the custom code** you need to drop into a fresh Laravel app with **Laravel Breeze (Blade)** and **Sanctum** installed. It gives you:
- Authentication (via Breeze)
- Task CRUD for the logged-in user
- Blade UI (simple, clean, functional)
- Authorization policy to ensure users can **only** access their own tasks

### 1) Create a new Laravel project
```bash
composer create-project laravel/laravel task-manager
cd task-manager
```

### 2) Install Breeze (Blade) and Sanctum
```bash
composer require laravel/breeze --dev
php artisan breeze:install blade

# Install Sanctum
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

### 3) Use SQLite for easiest DB setup
```bash
# Create SQLite database file
mkdir -p database
touch database/database.sqlite

# Update your .env:
# DB_CONNECTION=sqlite
# DB_DATABASE=database/database.sqlite
#
# And comment out / remove the other DB_* lines.
```

### 4) Install frontend assets
```bash
npm install
npm run build
```

### 5) Apply the included files
Download and unzip this starter kit somewhere, then from the **root of your Laravel app** (the folder containing `artisan`), run:
```bash
# Assuming you placed the starter kit folder NEXT to your laravel project folder
# e.g., ../laravel-task-manager-starter/
bash ../laravel-task-manager-starter/apply_files.sh
```

If the script path differs for you, adjust accordingly, or copy files manually from `project_files/` into your Laravel app matching paths.

### 6) Run migrations
```bash
php artisan migrate
```

### 7) Serve the app
```bash
php artisan serve
```

Open http://127.0.0.1:8000

- Register a user (Breeze)
- You will be redirected to **Dashboard**; use the nav to go to **Tasks**
- Create / View / Edit / Delete tasks
- Status supports **pending** or **done**
- Authorization ensures you can only manage **your** tasks

---

## What this kit adds

### Models / Policies
- `App\Models\Task`
- `App\Policies\TaskPolicy` (prevents cross-user access)

### Controller
- `App\Http\Controllers\TaskController`

### Migration
- `database/migrations/2025_09_24_000000_create_tasks_table.php`

### Routes
- `routes/web.php` (includes resource routes for tasks with `auth` middleware)

### Views
- `resources/views/tasks/index.blade.php`
- `resources/views/tasks/create.blade.php`
- `resources/views/tasks/edit.blade.php`

