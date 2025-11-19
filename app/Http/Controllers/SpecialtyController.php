<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index()
    {
        return redirect()->route('instructors.index');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:specialties',
            'description' => 'nullable|string',
        ]);
        Specialty::create($validatedData);
        return redirect()
        ->route('instructors.index')
        ->with('success', 'Especialidad creada exitosamente.');
    }

    public function update(Request $request, Specialty $specialty)
    {
        $specialty = Specialty::find($request->id);
        if ($specialty) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:specialties,name,'.$request->id,
                'description' => 'nullable|string',
            ]);
            $specialty->update($validatedData);
            return redirect()
            ->route('instructors.index')
            ->with('success', 'Especialidad actualizada correctamente.');
        }
    }

    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
            return redirect()
            ->route('instructors.index')
            ->with('success', 'Especialidad eliminada correctamente.');
    }
}
