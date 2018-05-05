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

Route::get('/', 'IndexController@index');

Route::get('/Administrador', 'AdministradorController@index');

Route::get('/vendedor', function () {
    return view('index_vendedor');
});

/*productos*/
Route::get('/ped', function () {
    return view('pagina/producto/pedido');
});
Route::get('/prod', function () {
    return view('pagina/producto/producto');
});
Route::get('/agreprod', function () {
    return view('pagina/producto/agregar_producto');
});

/*personal*/
Route::get('/agrusu', function () {
    return view('pagina/usuario/agregar_usuario');
});
Route::get('/repusu', function () {
    return view('pagina/usuario/reportar_usuario');
});

Route::get('/reporte', function () {
    return view('pagina/Reporte/reporte');
});

Route::get('/vender', function () {
    return view('pagina/vendedor/vender');
});

Route::get('/reporte_vendedor', function () {
    return view('pagina/vendedor/reporte_vendedor');
});

//////////////////////////////////////CLIENTE///////////////////////////////////////////////

Route::resource('create-cliente', 'PersonaController');
Route::prefix('/create-cliente')->group(function () {
    Route::get('/create', 'PersonaController@create');
    Route::post('/store', 'PersonaController@store');
    Route::get('/{id}/edit', 'PersonaController@show');
    Route::put('/{id}', 'PersonaController@edit');
    Route::get('/{id}', 'PersonaController@update');
    Route::delete('/{id}', 'PersonaController@destroy');
});

Route::prefix('datatables')->group(function () {
    Route::get('/listadoCliente', 'PersonaController@listado')->name('datatable.clientes');
});