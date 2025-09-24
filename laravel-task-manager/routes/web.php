<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // If logged in -> go to the create form
    // If guest -> send to login
    return auth()->check()
        ? redirect()->route('tasks.create')
        : redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    // Optional: if anything hits /dashboard, send to the form too
    Route::redirect('/dashboard', '/tasks/create')->name('dashboard');

    // Tasks CRUD (create uses your _form partial)
    Route::resource('tasks', TaskController::class);
});

require __DIR__.'/auth.php';

