<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        // dd($permissions);
        // return view('role-permission.permission.index', [
        //     'permissions' => $permissions
        // ]);
        return view('role-permission.role.index', compact('roles'));
    }

    public function create()
    {
        return view('role-permission.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect('/roles')->with('status', 'Role Created Successfulluy');
    }

    public function edit(Role $role)
    {
        // return $permission;
        return view('role-permission.role.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,' . $role->id
            ]
        ]);


        $role->update([
            'name' => $request->name
        ]);

        return redirect('/roles')->with('status', 'Role Update Successfulluy');
    }


    public function delete($roleId)
    {
        // Attempt to find the permission by ID
        $role = Role::find($roleId);

        // Check if permission exists
        if ($role) {
            // Delete the permission
            $role->delete();

            return redirect('/roles')->with('success', 'Role Record Deleted Successfully.');
        } else {
            // If no permission is found, return an error
            return redirect('/roles')->with('error', 'Role not found.');
        }
    }

    public function addPermissionToRole($roleId)
    {
        $role = Role::findOrFail($roleId);
        $permissions = Permission::get();

        $rolepermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('role-permission.role.add-permissions', [
            'role' => $role,
            'permissions' => $permissions,
            'rolepermissions' => $rolepermissions
        ]);
    }

    public function givePermissionToRole(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('status', 'Permission Added');
    }
}
