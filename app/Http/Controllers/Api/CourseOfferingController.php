<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CourseOffering;
use Illuminate\Http\Request;

class CourseOfferingController extends Controller
{
    public function getCourseOfferings() {
        $courseOfferings = CourseOffering::all();
        if ($courseOfferings) {
            return response()->json($courseOfferings);
        }
    }

    public function getCourseOffering($id) {
        $courseOffering = CourseOffering::find($id);
        if ($courseOffering) {
            return response()->json($courseOffering);
        }
    }

    public function createCourseOffering(Request $request) {
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:users,id',
            'semester' => 'sometimes|required|in:1,2,3,4,5,6,7,8',
            'year' => 'required|integer',
            'shift' => 'sometimes|in:"mañana","tarde",evening',
            'classroom' => 'nullable|string|max:100',
            'modality' => 'sometimes|in:presencial,virtual,hibrido'
        ]);
        $courseOffering = CourseOffering::create($validatedData);
        if ($courseOffering) {
            return response()->json($courseOffering, 201);
        }
    }

    public function updateCourseOffering(Request $request, $id) {
        $courseOffering = CourseOffering::find($id);
        if ($courseOffering) {
            $validatedData = $request->validate([
                'course_id' => 'sometimes|required|exists:courses,id',
                'teacher_id' => 'sometimes|required|exists:users,id',
                'semester' => 'sometimes|required|in:1,2,3,4,5,6,7,8',
                'year' => 'sometimes|required|integer',
                'shift' => 'sometimes|in:"mañana","tarde","noche',
                'classroom' => 'nullable|string|max:100',
                'modality' => 'sometimes|in:presencial,virtual,hibrido',
                'status' => 'sometimes|required|in:active,inactive',
            ]);
            $courseOffering->update($validatedData);
            return response()->json($courseOffering);
        }
    }

    public function disableCourseOffering($id) {
        $courseOffering = CourseOffering::find($id);
        if ($courseOffering) {
            $courseOffering->update(['status' => 'inactive']);
            return response()->json(['message' => 'Oferta de curso borrada exitosamente.']);
        }
    }
}
