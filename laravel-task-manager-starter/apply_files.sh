#!/usr/bin/env bash
set -euo pipefail

# This script should be run from INSIDE your Laravel app root (where artisan lives).
# Example usage from the Laravel app directory:
#   bash ../laravel-task-manager-starter/apply_files.sh

STARTER_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_FILES="$STARTER_DIR/project_files"

echo "Copying files from: $PROJECT_FILES"
echo "To Laravel app at:  $(pwd)"
echo

# Models, Controllers, Policies
mkdir -p app/Models app/Http/Controllers app/Policies app/Providers
cp -v "$PROJECT_FILES/app/Models/Task.php" app/Models/Task.php
cp -v "$PROJECT_FILES/app/Http/Controllers/TaskController.php" app/Http/Controllers/TaskController.php
cp -v "$PROJECT_FILES/app/Policies/TaskPolicy.php" app/Policies/TaskPolicy.php
cp -v "$PROJECT_FILES/app/Providers/AuthServiceProvider.php" app/Providers/AuthServiceProvider.php

# Routes
mkdir -p routes
cp -v "$PROJECT_FILES/routes/web.php" routes/web.php

# Migration
mkdir -p database/migrations
cp -v "$PROJECT_FILES/database/migrations/2025_09_24_000000_create_tasks_table.php" database/migrations/2025_09_24_000000_create_tasks_table.php

# Views
mkdir -p resources/views/tasks
cp -v "$PROJECT_FILES/resources/views/tasks/index.blade.php" resources/views/tasks/index.blade.php
cp -v "$PROJECT_FILES/resources/views/tasks/create.blade.php" resources/views/tasks/create.blade.php
cp -v "$PROJECT_FILES/resources/views/tasks/edit.blade.php" resources/views/tasks/edit.blade.php

echo
echo "✅ Files copied. Next steps:"
echo "1) php artisan migrate"
echo "2) php artisan serve"

chmod +x ../laravel-task-manager-starter/laravel-task-manager-starter/apply_files.sh
bash ../laravel-task-manager-starter/laravel-task-manager-starter/apply_files.sh