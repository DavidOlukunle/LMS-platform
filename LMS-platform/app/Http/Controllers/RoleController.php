<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Contracts\Permission;
use Illuminate\support\Facades\DB;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
     public function index(){
        $roles = Role::get();
        return view('admin.role-permission.roles.index', compact(['roles']));
    }


    public function create(){
         return view('admin.role-permission.roles.create');
    }


    public function store(Request $request){
        $request->validate([
            'name' =>['required', 'string', 'unique:roles,name']
        ]);

        Role::create([
            'name' => $request->name
        ]);
        return redirect('roles')->with('status', 'role created successfully');
    }


    public function edit(Role $role){
        return view("admin.role-permission.roles.edit", compact(['role']));
    }


    public function update(Request $request, Role $role){
        $request->validate([ 'name' =>['required', 'string', 'unique:roles,name,'. $role->id]

        ]);
         $role->update([
            'name' => $request->name
        ]);
        return redirect('roles')->with('status', 'role updated successfully');
    }

    public function addPermissionToRole($roleId){
        $role = Role::findorfail($roleId);
        $permissions = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')
        ->where('role_has_permissions.role_id', $role->id)
        ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
        ->all();
        return view ('role-permission.roles.add-permission', [
            'role' => $role,
             'permissions' => $permissions,
            'rolePermissions' => $rolePermissions]);
    }

    public function givePermissionToRole(Request $request, $roleId){
        $request->validate([
            'permission' => 'required'
        ]);
        $role = Role::findorfail($roleId);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with("status", 'permission added to role');
    }
    

    public function destroy($roleId){
      $role=  Role::find($roleId);
      $role->delete();
      return redirect("roles")->with('status', 'role deleted successfully');
    }
}
