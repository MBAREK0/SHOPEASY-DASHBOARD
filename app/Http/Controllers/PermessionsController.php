<?php

namespace App\Http\Controllers;

use App\Models\Permessions;
use Illuminate\Http\Request;

class PermessionsController extends Controller
{
    //
    public function show_permessions()
    {
        $permessions = Permessions::all();
        return view('Permessions.index', compact('permessions'));
    }

    public function addPermessions(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $permession = new Permessions();
        $permession->permessions_name = $request->name;
        $permession->save();
        return redirect('/permessions');
    }

    public function deletePermessions($id)
    {
        $permession = Permessions::find($id);
        $permession->delete();
        return redirect('/permessions');
    }

    public function editPermessions($id)
    {
        $permession = Permessions::find($id);
        return view('Permessions.edit', compact('permession'));
    }

    public function updatePermessions(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $permession = Permessions::find($request->id);
        $permession->permessions_name = $request->name;
        $permession->update();

        return redirect('/permessions');
    }
}
