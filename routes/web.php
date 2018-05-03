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
Route::get('/admistrador', function () {
    return view('index_administrador');
});

Route::get('/vendedor', function () {
    return view('index_vendedor');
});
/*productos*/
Route::get('/ped',function (){
    return view('pagina/producto/pedido');
});
Route::get('/prod',function (){
    return view('pagina/producto/producto');
});
Route::get('/agreprod',function (){
    return view('pagina/producto/agregar_producto');
});
/*cliente*/
Route::get('/repCli',function (){
    return view('pagina/cliente/reportar_cliente');
});
Route::get('/agrCli',function (){
    return view('pagina/cliente/agregar_cliente');
});

/*personal*/
Route::get('/agrusu',function (){
    return view('pagina/usuario/agregar_usuario');
});
Route::get('/repusu',function (){
    return view('pagina/usuario/reportar_usuario');
});

Route::get('/reporte',function (){
    return view('pagina/Reporte/reporte');
});

Route::get('/vender',function (){
    return view('pagina/vendedor/vender');
});

Route::get('/reporte_vendedor',function (){
    return view('pagina/vendedor/reporte_vendedor');
});

//////////////////////////////////////AGREGAR///////////////////////////////////////////////

Route::prefix('create-cliente')->group(function () {
    Route::get('/', 'ClienteController@index');
    Route::get('/create', 'ClienteController@create');
    Route::post('/store', 'ClienteController@store');
    Route::get('/{id}/edit', 'ClienteController@show');
    Route::put('/{id}', 'ClienteController@edit');
    Route::get('/{id}', 'ClienteController@update');
    Route::delete('/{id}', 'ClienteController@destroy');
});