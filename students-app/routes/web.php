<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/dashboard', function () {
    return view('dashboard');
});

// Resource route for StudentController
Route::resource('students', StudentController::class);
