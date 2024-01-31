<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;


class CategoryController extends Controller
{
    //
    public function list_categories(){
        $categories= Category::all();
        return view('category.category', compact('categories'));
    }
    public function create_category(Request $request){
        $request->validate([
            'name' =>'required',
        ]);
    
        $category = new Category();
        $category->name = $request->name;
        $category->save();
    
        return redirect('/')->with('category created successfully'); 
    }

    public function delete_category($id){

        $category= Category::find($id);
        $category->delete();
        return redirect('/')->with('category deleted successfully');
    }

    public function edit_category($id){
        $category= Category::find($id);
        return view('category.editcategory', compact('category'));
    }

    public function update_category(Request $request){
        $request->validate([
            'name' =>'required',
        ]);
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->update();
        return redirect('/')->with('category updated successfully'); 
    }
    
    
}