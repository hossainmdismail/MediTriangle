<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function index(){
        $permission = Permission::all();
        $role = Role::all();
        $user = AdminModel::all();
        // if (Auth::guard('admin_model')->user()->can('role')) {
        //     // Show the view page
        //     return view('backend.role.role',[
        //         'user' => $user,
        //         'role' => $role,
        //         'permissions' => $permission,
        //     ]);
        // } else {
        //     return abort(404);
        // }
        return view('backend.role.role',[
            'user' => $user,
            'role' => $role,
            'permissions' => $permission,
        ]);

    }
    function permissionStore(Request $request){
        Permission::create([
            'name'       => $request->name,
            'guard_name' => 'admin_model']);
        return back();
    }
    function roleStore(Request $request){
        // $role_exists = Role::where('name', $request->role_name)->count();
        // if($role_exists == 0){

        // }else{

        // }
            $request->validate([
                'role_name'=> 'required|unique:Roles,name',
            ]);
        $role = Role::create([
            'name'       => $request->role_name,
            'guard_name' => 'admin_model',
        ]);
        $role->givePermissionTo($request->permission);
        return back();
    }
    function assignStore(Request $request){
        $user = AdminModel::find($request->user_id);
        $user->assignRole($request->role_id);
        return back();
    }
    function removeRole($user_id){
        $user = AdminModel::find($user_id);
        $user->syncRoles([]);
        $user->syncPermissions([]);
        $user->delete();
        return back();
    }
    function deleteRole($role_id){
        $role = Role::find($role_id);
        $role->syncPermissions([]);
        $role->delete();
        return back();
    }
}
