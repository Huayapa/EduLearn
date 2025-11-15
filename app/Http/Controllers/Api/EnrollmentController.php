<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function getEnrollments() {
        $enrollments = Enrollment::all();
        if ($enrollments) {
            return response()->json($enrollments);
        }
    }

    public function getEnrollment($id) {
        $enrollment = Enrollment::find($id);
        if ($enrollment) {
            return response()->json($enrollment);
        }
    }

    public function createEnrollment(Request $request) {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_offering_id' => 'required|exists:course_offerings,id',
        ]);
        $enrollment = Enrollment::create($validatedData);
        if ($enrollment) {
            return response()->json($enrollment, 201);
        }
    }

    public function updateEnrollment(Request $request, $id) {
        $enrollment = Enrollment::find($id);
        if ($enrollment) {
            $validatedData = $request->validate([
                'student_id' => 'sometimes|required|exists:students,id',
                'course_offering_id' => 'sometimes|required|exists:course_offerings,id',
                'status_enrollment' => 'sometimes|required|in:inscrito,completado,retirado',
                'status' => 'sometimes|required|in:active,inactive',
                'final_grade' => 'sometimes|nullable|string',
            ]);
            $enrollment->update($validatedData);
            return response()->json($enrollment);
        }
    }

    public function disableEnrollment($id) {
        $enrollment = Enrollment::find($id);
        if ($enrollment) {
            $enrollment->update(['status' => 'inactive']);
            return response()->json(['message' => 'Inscripción borrada exitosamente.']);
        }
    }
}
