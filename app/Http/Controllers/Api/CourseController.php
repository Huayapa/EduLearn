<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function getCourses() {
        $courses = Course::all();
        if ($courses) {
            return response()->json($courses);
        }
    }

    public function getCourse($id) {
        $course = Course::find($id);
        if ($course) {
            return response()->json($course);
        }
    }

    public function createCourse(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:courses',
            'description' => 'nullable|string',
            'code' => 'required|string|max:50|unique:courses',
        ]);
        $course = Course::create($validatedData);
        if ($course) {
            return response()->json($course, 201);
        }
    }

    public function updateCourse(Request $request, $id) {
        $course = Course::find($id);
        if ($course) {
            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|max:255|unique:courses,name,'.$id,
                'description' => 'nullable|string',
                'code' => 'sometimes|required|string|max:50|unique:courses,code,'.$id,
                'status' => 'sometimes|required|in:active,inactive',
            ]);
            $course->update($validatedData);
            return response()->json($course);
        }
    }

    public function disableCourse($id) {
        $course = Course::find($id);
        if ($course) {
            $course->update(['status' => 'inactive']);
            return response()->json(['message' => 'Curso borrado exitosamente.']);
        }
    }
}
