<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', fn() => redirect()->route('tasks.index'));
Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class)->names('tasks');
});
require __DIR__.'/auth.php';

