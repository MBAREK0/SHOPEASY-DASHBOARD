<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyvalidateController extends Controller
{
    protected $data ;
    public function __construct($data){
        $this->data=is_array($data) ? $data : $data->toArray();
    }
    public function myValidate($roles=[]) {
        $data = $this->data;
       
        foreach ($roles as $key => $role) {
            if (array_key_exists($key, $data)) {
               
                $value = $data[$key];
       
                if ($role === 'required') {
                  if($value === null || $value ==="" ){
                    
                   return ['faild' => $key.' row is required.'];
                   
                  }else{

                    continue;
                  }
                }else{
                     continue;
                }
            }
        }
          return 'secces' ;
    }
}
