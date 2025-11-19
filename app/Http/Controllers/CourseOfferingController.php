<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseOffering;
use App\Models\User;
use Illuminate\Http\Request;

class CourseOfferingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courseOfferings = CourseOffering::all();
        $courses = Course::all();
        $teachers = User::where('role', 'instructor')->get();
        $semesters = CourseOffering::SEMESTER;
        $shifts = CourseOffering::SHIFT;
        $modalities = CourseOffering::MODALITY;
        $statusCO = CourseOffering::STATUSCO;
        return view('dashboard.courseoffering', 
        compact('courseOfferings', 'semesters', 'shifts', 'modalities', 'statusCO', 'courses', 'teachers'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:users,id',
            'semester' => 'sometimes|required|in:1,2,3,4,5,6,7,8',
            'year' => 'required|integer',
            'shift' => 'sometimes|in:"mañana","tarde","noche',
            'classroom' => 'nullable|string|max:100',
            'modality' => 'sometimes|in:presencial,virtual,hibrido'
        ]);
        $courseOffering = CourseOffering::create($validatedData);
        if ($courseOffering) {
            return redirect()->route('courseoffering.index')->with('success', 'Asignación de curso creada con éxito.');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseOffering $courseOffering)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:users,id',
            'semester' => 'required|in:1,2,3,4,5,6,7,8',
            'year' => 'required|integer',
            'shift' => 'required|in:mañana,tarde,noche',
            'classroom' => 'nullable|string|max:100',
            'modality' => 'required|in:presencial,virtual,hibrido',
            'status' => 'required|in:active,inactive',
        ]);
        $courseOffering->update($validatedData);
        if ($courseOffering) {
            return redirect()->route('courseoffering.index')->with('success', 'Asignación de curso actualizada con éxito.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseOffering $courseOffering)
    {
        $courseOffering->delete();
        return redirect()->route('courseoffering.index')->with('success', 'Asignación de curso eliminada con éxito.');
    }
}
