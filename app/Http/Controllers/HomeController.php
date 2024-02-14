<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
       public function index(Request $request){
     
             $data = $request->search;
             
             $products =$products = Product::where('name', 'like', '%' . $data . '%')->paginate(2);
            //   dd($products);
             return view('index',compact('products'));
    }


}

    