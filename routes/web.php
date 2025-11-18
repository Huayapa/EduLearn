<?php

use App\Http\Controllers\Api\SpecialtyController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseOfferingController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // DASHBOARD HOME
    Route::get('home', [HomeController::class, 'index'])->name('dashboard.index');
    // CRUD STUDENTS
    Route::get('students', [StudentController::class, 'index'])->name('students.index');
    Route::post('students', [StudentController::class, 'store'])->name('students.store');
    Route::put('students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    // CRUD TEACHERS - USERS AND SPECIALTIES
    Route::get('instructors', [UserController::class, 'index'])->name('instructors.index');
        // USER
        Route::post('instructors', [UserController::class, 'store'])->name('instructors.store');
        Route::put('instructors/{user}', [UserController::class, 'update'])->name('instructors.update');
        Route::delete('instructors/{user}', [UserController::class, 'destroy'])->name('instructors.destroy');
        // SPECIALTIES
        Route::post('specialties', [SpecialtyController::class, 'store'])->name('specialties.store');
        Route::put('specialties/{specialty}', [SpecialtyController::class, 'update'])->name('specialties.update');
        Route::delete('specialties/{specialty}', [SpecialtyController::class, 'destroy'])->name('specialties.destroy');
    // CRUD COURSES
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
    Route::post('courses', [CourseController::class, 'store'])->name('courses.store');
    Route::put('courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
    // CRUD COURSE OFFERINGS
    Route::get('courseoffering', [CourseOfferingController::class, 'index'])->name('courseoffering.index');
    Route::post('courseoffering', [CourseOfferingController::class, 'store'])->name('courseoffering.store');
    Route::put('courseoffering/{courseOffering}', [CourseOfferingController::class, 'update'])->name('courseoffering.update');
    Route::delete('courseoffering/{courseOffering}', [CourseOfferingController::class, 'destroy'])->name('courseoffering.destroy');
    // CRUD ENROLLMENTS
    Route::get('enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::post('enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
    Route::put('enrollments/{enrollment}', [EnrollmentController::class, 'update'])->name('enrollments.update');
    Route::delete('enrollments/{enrollment}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
