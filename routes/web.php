<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// dahboard route
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// project route
route::resource('projects', ProjectController::class);

// task route
route::resource('tasks', TaskController::class);
