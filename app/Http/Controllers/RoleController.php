<?php

namespace App\Http\Controllers;

use App\Models\Permessions;
use App\Models\Role;
use App\Models\Role_permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function show_roles()
    {
        $roles = DB::select('select role_permissions.*, roles.name as role_name, permessions.permessions_name as permessions_name,roles.id as role_id from role_permissions join roles on role_permissions.id_role=roles.id join permessions on permessions.id=role_permissions.id_permissions');
        $uniqueRoles = [];
        foreach ($roles as $role) {
            $roleId = $role->id_role;
            if (!isset($uniqueRoles[$roleId])) {
                $uniqueRoles[$roleId] = (object) $role;
                $uniqueRoles[$roleId]->permissions = [];
            }
            
            $uniqueRoles[$roleId]->permissions[] = $role->permessions_name;
        }
       
        $permessions = Permessions::all();
        return view('Role.index', compact('uniqueRoles', 'permessions'));
    }
    public function add_roles(Request $request){
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array',
        ]);

        $role=new Role();
        $role->name=$request->name;
        $role->save();
        foreach ($request->permissions as $permissionId) {
            $role->belongsToMany(Permessions::class, 'role_permissions', 'id_role', 'id_permissions')->attach($permissionId);
        }
        return redirect('/roles');
    }
   
    public function deleteRole($id){
        $role = Role::find($id);
        $role->delete();
        return redirect('/roles');
    }

    public function editRole($id)
    {
        $role = Role::find($id);
        $role_permessions = DB::select("SELECT role_permissions.*, roles.name AS role_name, permessions.permessions_name AS permission_name, roles.id AS role_id FROM role_permissions JOIN roles ON role_permissions.id_role = roles.id JOIN permessions ON permessions.id = role_permissions.id_permissions WHERE id_role = '$id'");
        $permissions = Permessions::all();
        $roles_id = array_column($role_permessions, 'id_permissions');

        return view('Role.editrole', compact('role', 'permissions', 'role_permessions', 'roles_id'));
    }

    public function update_role(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array',
        ]);

        $role = Role::find($request->id);
        $role->name = $request->name;
        $role->save();
        $role->belongsToMany(Permessions::class, 'role_permissions', 'id_role', 'id_permissions')->detach();
        foreach ($request->permissions as $permissionId) {
            $role->belongsToMany(Permessions::class, 'role_permissions', 'id_role', 'id_permissions')->attach($permissionId);
        }

        return redirect('/roles');
    }

}
