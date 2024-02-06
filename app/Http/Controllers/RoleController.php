<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function show_roles(){
        $roles=Role::all();
        return view('Role.index',compact('roles'));
    }

    public function add_roles(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $role=new Role();
        $role->name=$request->name;
        $role->save();
        return redirect('/roles');
    }

    public function deleteRole($id){
        $role = Role::find($id);
        $role->delete();
        return redirect('/roles');
    }

    public function editRole($id){
        $role = Role::find($id);
        return view('Role.editrole',compact('role'));
    }

    public function update_role(Request $request){
        $request->validate([
            'name'=>'required',
        ]);
        $role = Role::find($request->id);
        $role->name = $request->name;
        $role->update();

        return redirect('/roles');

    }
}
