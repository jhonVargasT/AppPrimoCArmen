<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*links simples*/
/*index */

Route::get('/', function () {
    return view('index');
});
/*productos*/
Route::get('/ped',function (){
    return view('pagina/producto/pedido');
});
Route::get('/prod',function (){
    return view('pagina/producto/producto');
});
Route::get('/agreprod',function (){
    return view('pagina/producto/agregarproducto');
});
/*cliente*/
Route::get('/repCli',function (){
    return view('pagina/cliente/reportarCliente');
});
Route::get('/agrCli',function (){
    return view('pagina/cliente/agregarCliente');
});

/*personal*/
Route::get('/agrusu',function (){
    return view('pagina/usuario/agregarusuario');
});
Route::get('/repusu',function (){
    return view('pagina/usuario/reportarusuario');
});

