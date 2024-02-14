<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show_users()
    {   
        $roles=Role::all();
        $users = DB::select("SELECT users.*, roles.name as role_name 
        FROM users 
        LEFT JOIN roles ON roles.id = users.id_role
        WHERE roles.id IS NOT NULL OR users.id_role IS NULL
        ");
        return view('Users.index', compact('users','roles'));
    }

    public function addUsers(Request $request)
    {
    $check= new MyvalidateController($request);
     $result=$check->myValidate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);
        if($result !== 'secces'){
          return  back()->withErrors($result); 
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->id_role = $request->role_id;
        $user->save();
        return redirect('/users');
    }

    public function deleteUsers($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }

    public function editUsers($id)
    {
        $roles=Role::all();
        $user = User::find($id);
        return view('Users.edit', compact('user','roles'));
    }

    public function updateUsers(Request $request)
    {
     $check= new MyvalidateController($request);
     $result=$check->myValidate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);
       if($result !== 'secces'){
         return  back()->withErrors($result); 
        } 
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->id_role = $request->role_id;
        $user->update();

        return redirect('/users');
    }
}
