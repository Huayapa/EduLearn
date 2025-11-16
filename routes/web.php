<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        return view('dashboard.home');
    })->name('dashboard');
    Route::get('/courseoffering', function () {
        return view('dashboard.courseoffering');
    })->name('courseoffering');
    Route::get('/enrollments', function () {
        return view('dashboard.enrollment');
    })->name('enrollments');
    Route::get('/students', function () {
        return view('dashboard.students');
    })->name('students');
    Route::get('/courses', function () {
        return view('dashboard.courses');
    })->name('courses');
    Route::get('/instructors', function () {
        return view('dashboard.users');
    })->name('instructors');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
