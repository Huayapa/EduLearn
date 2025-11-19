<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $statusStudents = Student::ACADEMIC_STATUS;
        $statusS = Student::STATUS;
        return view('dashboard.students', compact('students', 'statusStudents', 'statusS'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:students',
            'email' => 'required|string|email|max:255|unique:students',
            'dni' => 'required|string|max:20|unique:students',
            'semester' => 'sometimes|required|in:1,2,3,4,5,6,7,8',
            'date_of_birth' => 'required|date',
        ]);
        Student::create($validatedData);
        return redirect()
        ->route('students.index')
        ->with('success', 'Estudiante creado exitosamente.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:students,code,' . $student->id,
            'email' => 'required|string|email|max:255|unique:students,email,' . $student->id,
            'dni' => 'required|string|max:20|unique:students,dni,' . $student->id,
            'academic_status' => 'required|in:activo,retirado,terminado',
            'status' => 'required|in:active,inactive',
            'semester' => 'required|string|max:10',
            'date_of_birth' => 'required|date',
        ]);
        $student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Estudiante eliminado correctamente.');
    }
}
