<?php

namespace App\Http\Controllers\Authurization;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::select('id', 'role', 'permissions')->get();
        return view('admin.roles.index', compact('roles'));
    }


    public function create()
    {
        return view('admin.roles.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'role' => ['required', 'string'],
            'permissions' => ['required', 'array', 'min:1'],
        ]);

        Role::create([
            'role' => $request->role,
            'permissions' => json_encode($request->permissions),
        ]);
        return redirect()->route('roles.index')->with('success', 'Role created successfully');


    }


    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'role' => 'required|string|max:255',
            'permissions' => 'array',
        ]);

        $role = Role::findOrFail($id);
        $role->role = $request->role;
        $role->permissions = json_encode($request->permissions);
        $role->save();
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }



    public function destroy(string $id)
    {
        $role = Role::with(['admins', 'users'])->findOrFail($id);
        if ($role->admins->count() > 0 || $role->users->count() > 0) {
            return redirect()->back()->with('error', 'Cannot delete role: It is assigned to admins or users.');
        }
    
        $role->delete();
    
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');

}
}
