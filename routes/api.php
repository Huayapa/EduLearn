<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\CourseOfferingController;
use App\Http\Controllers\Api\EnrollmentController;
use App\Http\Controllers\Api\SpecialtyController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'active.user'])->group(function () {
    // LOGOUT API
    Route::post('/logout', [AuthController::class, 'logout']);
    // CRUD USERS
    Route::get('/users', [UserController::class, 'getUsers']);
    Route::get('/user/{id}', [UserController::class, 'getUser']);
    Route::post('/user', [UserController::class, 'createUser']);
    Route::put('/user/{id}', [UserController::class, 'updateUser']);
    Route::delete('/user/{id}', [UserController::class, 'disableUser']);
    // CRUD STUDENTS
    Route::get('/students', [StudentController::class, 'getStudents']);
    Route::get('/student/{id}', [StudentController::class, 'getStudent']);
    Route::post('/student', [StudentController::class, 'createStudent']);
    Route::put('/student/{id}', [StudentController::class, 'updateStudent']);
    Route::delete('/student/{id}', [StudentController::class, 'disableStudent']);
    // CRUD SPECIALTIES
    Route::get('/specialties', [SpecialtyController::class, 'getSpecialties']);
    Route::get('/specialty/{id}', [SpecialtyController::class, 'getSpecialty']);
    Route::post('/specialty', [SpecialtyController::class, 'createSpecialty']);
    Route::put('/specialty/{id}', [SpecialtyController::class, 'updateSpecialty']);
    Route::delete('/specialty/{id}', [SpecialtyController::class, 'deleteSpecialty']);
    // CRUD ENROLLMENTS
    Route::get('/enrollments', [EnrollmentController::class, 'getEnrollments']);
    Route::get('/enrollment/{id}', [EnrollmentController::class, 'getEnrollment']);
    Route::post('/enrollment', [EnrollmentController::class, 'createEnrollment']);
    Route::put('/enrollment/{id}', [EnrollmentController::class, 'updateEnrollment']);
    Route::delete('/enrollment/{id}', [EnrollmentController::class, 'disableEnrollment']);
    // CRUD COURSE OFFERINGS
    Route::get('/course-offerings', [CourseOfferingController::class, 'getCourseOfferings']);
    Route::get('/course-offering/{id}', [CourseOfferingController::class, 'getCourseOffering']);
    Route::post('/course-offering', [CourseOfferingController::class, 'createCourseOffering']);
    Route::put('/course-offering/{id}', [CourseOfferingController::class, 'updateCourseOffering']);
    Route::delete('/course-offering/{id}', [CourseOfferingController::class, 'disableCourseOffering']);
    // CRUD COURSES
    Route::get('/courses', [CourseController::class, 'getCourses']);
    Route::get('/course/{id}', [CourseController::class, 'getCourse']);
    Route::post('/course', [CourseController::class, 'createCourse']);
    Route::put('/course/{id}', [CourseController::class, 'updateCourse']);
    Route::delete('/course/{id}', [CourseController::class, 'disableCourse']);
});

// AUTH API
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
