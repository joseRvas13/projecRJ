<?php

//creacion del controlador

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller{

    //INDEX

    public function index(){
        return views('welcome');
    }

    //suma

    public function suma($num = 0)
    {   
        
        return $num + 80;
    }

    
    // el metodo se llama showname

    public function showapellido($apellidos){

        return view('example',['apellidos' => $apellidos]);
    }

    public function extracto($generate){
        return view('vista',['generate' => $generate]);
    }

}