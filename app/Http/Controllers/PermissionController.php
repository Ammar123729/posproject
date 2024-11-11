<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        // dd($permissions);
        // return view('role-permission.permission.index', [
        //     'permissions' => $permissions
        // ]);
        return view('role-permission.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('role-permission.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ]
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return redirect('/permissions')->with('status', 'Permission Created Successfulluy');
    }

    public function edit(Permission $permission)
    {
        // return $permission;
        return view('role-permission.permission.edit', [
            'permission' => $permission
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,' . $permission->id
            ]
        ]);


        $permission->update([
            'name' => $request->name
        ]);

        return redirect('/permissions')->with('status', 'Permission Update Successfulluy');
    }


    public function delete($permissionId)
    {
        // Attempt to find the permission by ID
        $permission = Permission::find($permissionId);

        // Check if permission exists
        if ($permission) {
            // Delete the permission
            $permission->delete();

            return redirect('/permissions')->with('success', 'Permission Record Deleted Successfully.');
        } else {
            // If no permission is found, return an error
            return redirect('/permissions')->with('error', 'Permission not found.');
        }
    }
}
