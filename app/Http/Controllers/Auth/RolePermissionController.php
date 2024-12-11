<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function createRole(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        return response()->json($role);
    }

    public function createPermission(Request $request)
    {
        $permission = Permission::create(['name' => $request->name]);
        return response()->json($permission);
    }

    public function assignRole(Request $request, $userId)
    {
        $user = User::find($userId);
        $user->assignRole($request->role);
        return response()->json($user);
    }

    public function givePermissionToRole(Request $request)
    {
        $role = Role::findByName($request->role);
        $role->givePermissionTo($request->permission);
        return response()->json($role);
    }
}