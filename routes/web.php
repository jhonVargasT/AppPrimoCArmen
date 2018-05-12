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

//////////////////////////////////INICIO//////////////////////////////////////////////////////

Route::get('/', 'IndexController@index');

Route::get('/Administrador', 'AdministradorController@index');

Route::get('/Vendedor', 'VendedorController@index');

/////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/reporte', function () {
    return view('pagina/Reporte/reporte');
});

Route::get('/vender', function () {
    return view('pagina/vendedor/vender');
});

Route::get('/reporte_vendedor', function () {
    return view('pagina/vendedor/reporte_vendedor');
});
//////////////////////////////////////USUARIOS///////////////////////////////////////////////

Route::post('/log', 'UsuarioController@log');

Route::resource('create-usuario', 'UsuarioController');
Route::prefix('create-usuario')->group(function () {
    Route::get('/create', 'UsuarioController@create');
    Route::post('/store', 'UsuarioController@store');
    Route::get('/{id}/edit', 'UsuarioController@show');
    Route::put('/{id}', 'UsuarioController@edit');
    Route::get('/{id}', 'UsuarioController@update');
    Route::delete('/{id}', 'UsuarioController@destroy');
});

//////////////////////////////////////CLIENTES///////////////////////////////////////////////

Route::resource('create-cliente', 'PersonaController');
Route::prefix('/create-cliente')->group(function () {
    Route::get('/create', 'PersonaController@create');
    Route::post('/store', 'PersonaController@store');
    Route::get('/{id}/edit', 'PersonaController@show');
    Route::put('/{id}', 'PersonaController@edit');
    Route::get('/{id}', 'PersonaController@update');
    Route::delete('/{id}', 'PersonaController@destroy');
});

//////////////////////////////////////DATATABLES///////////////////////////////////////////////

Route::prefix('datatables')->group(function () {
    Route::get('/listadoCliente', 'PersonaController@listado')->name('datatable.clientes');
    Route::get('/listadoUsuarios', 'UsuarioController@listado')->name('datatable.usuarios');
});

//////////////////////////////////////PRODUCTOS///////////////////////////////////////////////

Route::resource('create-producto', 'ProductoController');
Route::prefix('/create-producto')->group(function () {
    Route::get('/create', 'ProductoController@create');
    Route::post('/store', 'ProductoController@store');
    Route::get('/{id}/edit', 'ProductoController@show');
    Route::put('/{id}', 'ProductoController@edit');
    Route::get('/{id}', 'ProductoController@update');
    Route::delete('/{id}', 'ProductoController@destroy');
});