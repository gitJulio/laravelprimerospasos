<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function(){
    return view('welcome');
});

Route::get('/bienvenida', function () {

    return view('welcome');
});

Route::get('/contacto',function(){
    return 'contactame';
})->name('contacto');

Route::get('/custom',function(){

    $mesj="Hola Custom";
    return view('custom',['msj'=>$mesj, 'edad'=>30]);
});
