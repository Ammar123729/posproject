<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('role-permission.user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $roles = Role::all();
        return view('role-permission.user.create', [
            'roles' => $roles
        ]);
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255|unique:users,email',
    //         'password' => 'required|string|min:8|max:20',
    //         'roles' => 'required|array',
    //         'date' => 'required',
    //         'phone' => 'required',
    //         'store_name' => 'required',
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'date' => $request->date,
    //         'phone' => $request->phone,
    //         'store_name' => $request->store_name,


    //     ]);

    //     $user->syncRoles($request->roles);

    //     return redirect('/users')->with('status', 'User Created Successfully with Role');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required|array',
            'date' => 'required',
            'phone' => 'required',
            'store_name' => 'required',
        ]);

        // Create the user without the 'role' field
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date' => $request->date,
            'phone' => $request->phone,
            'role' => 'user',
            'store_name' => $request->store_name,
        ]);

        // Sync roles with the selected roles
        $user->syncRoles($request->roles);

        return redirect('/users')->with('status', 'User Created Successfully with Role');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        return view('role-permission.user.edit', [
            'user' =>  $user,
            'roles' =>   $roles,
            'userRoles' =>   $userRoles
        ]);
    }

    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required|array',

        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
        ];
        if (!empty($request->password)) {
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);

        // Sync roles with the selected roles
        $user->syncRoles($request->roles);

        return redirect('/users')->with('status', 'User Updated Successfully with Role');
    }

    public function delete($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect('/users')->with('status', 'User Deleted Successfully with Role');
    }
}
