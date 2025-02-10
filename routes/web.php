<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UniversityApiController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Resource route for StudentController
Route::resource('students', StudentController::class);

// Resource route for UniversityController
Route::resource('universities', UniversityController::class);

Route::get('api', [UniversityApiController::class, 'fetchUniversities']);
