<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('specialty')->get();
        $specialties = Specialty::all();
        $roles = User::ROLES;
        $statusUsers = User::STATUS;
        return view('dashboard.users', compact('users', 'roles', 'statusUsers', 'specialties'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'specialty_id' => 'nullable|exists:specialties,id',
            'role' => 'required|in:admin,instructor'
        ]);
        $user = User::create($validatedData);
        if ($user) {
            return redirect()
            ->route('instructors.index')
            ->with('success', 'Usuario creado exitosamente.');
        }
    }

    public function update(Request $request, User $user)
    {
        $user = User::find($request->id);
        if ($user) {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
                'password' => 'nullable|string|min:8',
                'role' => 'required|in:admin,instructor',
                'specialty_id' => 'nullable|exists:specialties,id',
                'status' => 'required|in:active,inactive',
            ]);
            if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
            } else {
                unset($validatedData['password']);
            }

            $user->update($validatedData);
            return redirect()
            ->route('instructors.index')
            ->with('success', 'Usuario actualizado correctamente.');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()
        ->route('instructors.index')
        ->with('success', 'Usuario eliminado correctamente.');
    }
}
