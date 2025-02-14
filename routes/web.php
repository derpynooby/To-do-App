<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// dahboard route
Route::get('/dashboard', function () {
    return view('dashboard');
});

// project route
route::resource('projects', ProjectController::class);

// task route
route::resource('tasks', TaskController::class);
