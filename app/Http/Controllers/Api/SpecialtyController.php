<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function getSpecialties() {
        $specialties = Specialty::all();
        if ($specialties) {
            return response()->json($specialties);
        }
    }

    public function getSpecialty($id) {
        $specialty = Specialty::find($id);
        if ($specialty) {
            return response()->json($specialty);
        }
    }

    public function createSpecialty(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:specialties',
            'description' => 'nullable|string',
        ]);
        $specialty = Specialty::create($validatedData);
        if ($specialty) {
            return response()->json($specialty, 201);
        }
    }

    public function updateSpecialty(Request $request, $id) {
        $specialty = Specialty::find($id);
        if ($specialty) {
            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|max:255|unique:specialties,name,'.$id,
                'description' => 'nullable|string',
            ]);
            $specialty->update($validatedData);
            return response()->json($specialty);
        }
    }

    public function deleteSpecialty($id) {
        $specialty = Specialty::find($id);
        if ($specialty) {
            $specialty->delete();
            return response()->json(['message' => 'Especialidad borrada exitosamente.']);
        }
    }
}
