<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getStudents() {
        $students = Student::all();
        if ($students) {
            return response()->json($students);
        }
    }

    public function getStudent($id) {
        $student = Student::find($id);
        if ($student) {
            return response()->json($student);
        }
    }

    public function createStudent(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:students',
            'email' => 'required|string|email|max:255|unique:students',
            'dni' => 'required|string|max:20|unique:students',
            'semester' => 'sometimes|required|in:1,2,3,4,5,6,7,8',
            'date_of_birth' => 'required|date',
        ]);
        $student = Student::create($validatedData);
        if ($student) {
            return response()->json($student, 201);
        }
    }

    public function updateStudent(Request $request, $id) {
        $student = Student::find($id);
        if ($student) {
            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'code' => 'sometimes|required|string|max:50|unique:students,code,'.$id,
                'email' => 'sometimes|required|string|email|max:255|unique:students,email,'.$id,
                'dni' => 'sometimes|required|string|max:20|unique:students,dni,'.$id,
                'academic_status' => 'sometimes|required|in:activo,retirado,terminado',
                'status' => 'sometimes|required|in:active,inactive',
                'semester' => 'sometimes|required|in:1,2,3,4,5,6,7,8',
                'date_of_birth' => 'sometimes|required|date',
            ]);
            $student->update($validatedData);
            return response()->json($student);
        }
    }

    public function disableStudent($id) {
        $student = Student::find($id);
        if ($student) {
            $student->update(['status' => 'inactive']);
            return response()->json(['message' => 'Estudiante borrado exitosamente.']);
        }
    }
}
