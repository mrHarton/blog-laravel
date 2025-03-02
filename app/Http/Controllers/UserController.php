<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show list of users with their roles
    public function index()
    {
        if (!auth()->user()->can('manage-users')) {
            abort(403, 'Unauthorized action.');
        }

        $users = User::all();
        $roles = Role::all();
        return view('admin.users', compact('users', 'roles'));
    }

    // Assign or change a user's role
    public function assignRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $role = $request->input('role'); // Get role from form input

        // Ensure the role exists before assigning
        if (Role::where('name', $role)->exists()) {
            $user->syncRoles([$role]); // Remove old roles and assign new one
            return back()->with('success', 'Role assigned successfully.');
        }

        return back()->with('error', 'Invalid role selected.');
    }
}
