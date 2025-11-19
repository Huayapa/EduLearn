<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        $statusCourses = Course::STATUSCOURSE;
        return view('dashboard.courses', compact('courses', 'statusCourses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:courses',
            'description' => 'required|string',
            'code' => 'required|string|max:50|unique:courses'
        ]);
        Course::create($validatedData);
        return redirect()
        ->route('courses.index')
        ->with('success', 'Curso creado exitosamente.');
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $course = Course::find($request->id);
        if ($course) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:courses,name,'.$request->id,
                'description' => 'required|string',
                'code' => 'required|string|max:50|unique:courses,code,'.$request->id,
                'status' => 'required|in:active,inactive',
            ]);
            $course->update($validatedData);
            return redirect()
            ->route('courses.index')
            ->with('success', 'Curso actualizado correctamente.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Curso eliminado correctamente.');
    }
}
