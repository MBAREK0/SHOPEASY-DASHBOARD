<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;


class CategoryController extends Controller
{
    //
    public function list_categories()
    {
        $categories = Category::all();
        return view('category.category', compact('categories'));
    }
    public function create_category(Request $request)
    {

      $check= new MyvalidateController($request);

       $result= $check->myValidate([
            'name' => 'required',
        ]);
     
        if($result !== 'secces'){
           return  back()->withErrors($result); 
           
        }
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect('/')->with('success', 'Category created successfully');
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/')->with('success', 'Category deleted successfully');
    }

    public function update_category(Request $request)
    {
                $check= new MyvalidateController($request);

     $result=$check->myValidate([
            'name' => 'required',
        ]);
        if($result !== 'secces'){
    return  back()->withErrors($result); 
    }

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->update();

        return redirect('/')->with('success', 'Category updated successfully');
    }
}
