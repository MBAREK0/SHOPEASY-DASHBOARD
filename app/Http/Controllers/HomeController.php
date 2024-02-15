<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
       public function index(Request $request){
        //   
             $keyword = $request->search;
            
             $categories = category::all();
            
                        $products = DB::select('SELECT products.*, categories.name AS category_name 
                        FROM products 
                        JOIN categories ON products.id_categorie = categories.id 
                        WHERE products.name LIKE ?', ['%' . $keyword . '%']);
          
             return view('index',compact('products','categories'));
    }
          public function filter(Request $request){
        //   
             $keyword = $request->search;
            
             $categories = category::all();
            
             if($request->categories !=='categories' || $request->categories !==null){
                        $products = DB::select("SELECT products.*, categories.name AS category_name 
                        FROM products 
                        JOIN categories ON products.id_categorie = categories.id 
                        WHERE products.name LIKE '%".$keyword."%' 
                        AND products.id_categorie = ?", [$request->categories]);

             } if($request->categories ==='categories'){
                        $products = DB::select('SELECT products.*, categories.name AS category_name 
                        FROM products 
                        JOIN categories ON products.id_categorie = categories.id 
                        WHERE products.name LIKE ?', ['%' . $keyword . '%']);




            }
          
             return view('index',compact('products','categories'));
    }
}

    