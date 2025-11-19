<?php

namespace App\Http\Controllers;

use App\Models\CourseOffering;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::all();
        $students = Student::all();
        $coursesOfferings = CourseOffering::all();
        $statusEnrollments = Enrollment::STATUSENTROLLEMNT;
        $statusE = Enrollment::STATUS;
        return view('dashboard.enrollment', 
        compact('enrollments', 'statusEnrollments', 'statusE', 'students', 'coursesOfferings'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_offering_id' => 'required|exists:course_offerings,id'
        ]);
        Enrollment::create($validatedData);
        return redirect()
        ->route('enrollments.index')
        ->with('success', 'Inscripción creada exitosamente.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        $enrollment = Enrollment::find($request->id);
        if ($enrollment) {
            $validatedData = $request->validate([
                'student_id' => 'required|exists:students,id',
                'course_offering_id' => 'required|exists:course_offerings,id',
                'status_enrollment' => 'required|in:inscrito,completado,retirado',
                'status' => 'required|in:active,inactive',
                'final_grade' => 'nullable|string',
            ]);
            $enrollment->update($validatedData);
            return redirect()
            ->route('enrollments.index')
            ->with('success', 'Inscripción actualizada correctamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()
        ->route('enrollments.index')
        ->with('success', 'Inscripción borrada exitosamente.');
    }
}
