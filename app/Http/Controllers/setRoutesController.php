<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Permessions;
class setRoutesController extends Controller
{

  public function set(){
    $routes = [];
        
         $permissionsCount = Permessions::count();
       
         if($permissionsCount > 0){
           echo 'the Permessions is Already exist if you want to update them use [php artisan updateRoutes]';
           return 0;
         };

      foreach (Route::getRoutes() as $route) {
          if($route->getName() === null || $route->getName() === '' || strpos($route->getName(), '.') || $route->getName() === 'resetwithemail')continue;
          $routes[] = [
              'uri' => $route->uri(),
              'name' => $route->getName(),
              // 'middleware' => $route->middleware(),
          ];}
         

      foreach ($routes as $route) {
            Permessions::create([
                'permessions_name' => $route['name'],
                'route' => $route['uri'],
            ]);
        }

        echo 'Routes created successfully.';
  }
  
  public function updateRoutes()
{
    $routes = [];

    // Extract routes
    foreach (Route::getRoutes() as $route) {
        if ($route->getName() === null || $route->getName() === '' || strpos($route->getName(), '.')) continue;
        $routes[] = [
            'name' => $route->getName(),
            'uri' => $route->uri(),
        ];
    }
   
    // Update permissions for each route
    foreach ($routes as $route) {
        Permessions::where('permessions_name', $route['name'])->update([
            'route' => $route['uri'],
        ]);
    }
    echo 'Routes updated successfully.';
}

}





