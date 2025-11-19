<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseOffering;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalstudents = Student::all()->count();
        $totalcourses = Course::all()->count();
        $totalenrollmentsactive = Enrollment::where('status', 'active')->count();
        $totalusersactive = User::where('status', 'active')
                            ->where('role', 'instructor')
                            ->count();
        $coursesrecents = Course::orderBy('created_at', 'desc')
                        ->take(4)
                        ->get();
        $enrollmentsrecents = Enrollment::with('student')
                        ->latest()
                        ->take(2)
                        ->get();
        $coursesenrollment = CourseOffering::with('course')   // ← aquí está el nombre del curso
                        ->withCount('enrollments')                       // ← aquí está el contador
                        ->orderBy('created_at', 'desc')
                        ->take(5)
                        ->get();
        $courses = CourseOffering::withCount('enrollments')
            ->orderBy('enrollments_count', 'desc')
            ->take(5)
            ->get();
        return view('dashboard.home', compact(
            'totalstudents',
            'totalcourses',
            'totalenrollmentsactive',
            'totalusersactive',
            'coursesrecents',
            'enrollmentsrecents',
            'coursesenrollment',
            'courses'
        ));
    }
}
