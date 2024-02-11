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
}
