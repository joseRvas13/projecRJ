<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController; 
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/termino', function(){
    return 'termino de redireccion en pantalla ';
})->name('terminost');

Route::get('/hola', function() {

    $sun=8;
    $plus=7;


    $suma = $sun + $plus;

    return $suma;
})->name('operacion');

Route::get('/user/{nombre}', function($nombre){
    return 'Mi nombre ' .$nombre;
})->name('minombre');

Route::get('/suma/{suma}', function($suma){

    $a=4;

    return 'la suma es ' .$suma + $a;
});

Route::get('/operacion/{a?}', function($a=5){
    
    $c=7;

    return $a + $c; 
});

Route::get('/post/{post}/coment/{coment}', function ($postId, $comentId){
    return $postId + $comentId;
});

Route::get('/usuario/{nombreusuario}', function($usuario){
    return $usuario;
})-> where('nombreusuario','[A-Za-z]+');

Route::get('/mayor/{mayorci}', function($siesMayor){
    return $siesMayor;
})-> where('mayorci', '[0-9]+');    

Route::get('/numeros/{numero1}/letras/{letras1}', function($num1, $let2){
    return $num1 . $let2;
})->where(['numero1' => '[0-9]+', 'letras1' => '[a-z]+']);


#redirecciones con laravel ( redirect )

Route::redirect('/publicaciones', '/articulos', 302);

Route::get('/articulos', function() {
    return 'estoy en la redireccion de articulos';
});


////////// nombres de las rutas

Route::get('/rutaNombre', function(){
    return 'el_nombre';
})->name('unaruta');



///generate ruta 

Route::get('/redirigir', function(){
    return redirect()->route('terminost');
});

Route::get('/verificar', function(){
    
     if(Request::route()->named('verify')){
         return "ok";
    }else{
        return "no es la ruta ";
    }
})->name('verify');

//se muestran los metodos de la clase admin controller Y se puede hacer un grupo de rutas 

// el siguiente codigo comentado es de otra manera de hacer un grupo

/*Route::namespace('admin')->group(function(){
});*/

//


Route::group(['namespace' => 'Admin'], function(){

    Route::get('/micontroller1',[AdminController::class, 'index1']); 
    Route::get('/micontroller2',[AdminController::class, 'index2']); 
    Route::get('/micontroller3',[AdminController::class, 'index3']); 

});



Route::prefix('seccion')->group(function() {

    Route::get('/primera', function(){
        return 'primera';

    });

    Route::get('/segunda', function(){
        return 'segunda';

    });

    Route::get('/tercera', function(){
        return 'tercera';

    });


});

Route::get('/apellido/{apellidos}',[UserController::class, 'showapellido']);

Route::get('/suma/{num?}', [UserController::class, 'suma'])->where('num', '[0-9]+');

Route::get('/generar/{generate}', [UserController::class, 'extracto']);

