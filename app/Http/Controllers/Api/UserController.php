<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers() {
        $users = User::all();
        if ($users) {
            return response()->json($users);
        }
    }

    public function getUser($id) {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        }
    }

    public function createUser(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'specialty_id' => 'nullable|exists:specialties,id',
            'role' => 'required|in:admin,instructor',
        ]);
        $user = User::create($validatedData);
        if ($user) {
            return response()->json($user, 201);
        }
    }

    public function updateUser(Request $request, $id) {
        $user = User::find($id);
        if ($user) {
            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|string|email|max:255|unique:users,email,'.$id,
                'password' => 'sometimes|required|string|min:8',
                'role' => 'sometimes|required|in:admin,instructor',
                'specialty_id' => 'nullable|exists:specialties,id',
                'status' => 'sometimes|required|in:active,inactive',
            ]);
            $user->update($validatedData);
            return response()->json($user);
        }
    }

    public function disableUser($id) {
        $user = User::find($id);
        if ($user) {
            $user->update(['status' => 'inactive']);
            return response()->json(['message' => 'Usuario borrado exitosamente.']);
        }
    }
}
