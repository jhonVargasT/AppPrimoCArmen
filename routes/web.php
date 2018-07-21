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

Auth::routes();

//////////////////////////////////INICIO//////////////////////////////////////////////////

Route::group(['middleware' => 'administrador'], function () {
    //////////////////////////////////////ADMINISTRADOR///////////////////////////////////////////

    Route::get('/Administrador', 'AdministradorController@index');

////////////////////////////////////REPORTE///////////////////////////////////////////////////

    Route::get('/Reportes', 'ReporteController@index');

////////////////////////////////////REPORTE///////////////////////////////////////////////////

    Route::get('/Pedidos', 'PedidoController@index');

//////////////////////////////////////PRODUCTOS///////////////////////////////////////////////

    Route::get('/Productos', 'ProductoController@index');
    Route::get('/actualizarStockModal', 'ProductoController@actualizarStockModal');
    Route::get('/actualizarStock', 'ProductoController@actualizarStock');
    Route::get('/actualizarProducto', 'ProductoController@actualizarProducto');

    Route::prefix('Producto')->group(function () {
        Route::get('/create', 'ProductoController@create');
        Route::post('/store', 'ProductoController@store');
        //Route::get('/{id}', 'ProductoController@show');
        Route::get('/{id}/edit', 'ProductoController@edit');
        Route::put('/{id}', 'ProductoController@update');
        //Route::delete('/{id}', 'ProductoController@destroy');
    });

//////////////////////////////////////CLIENTES///////////////////////////////////////////////

    Route::get('/Clientes', 'PersonaController@index');
    Route::get('/actualizarCliente', 'PersonaController@actualizarCliente');

    Route::prefix('Cliente')->group(function () {
        Route::get('/create', 'PersonaController@create');
        Route::post('/store', 'PersonaController@store');
        //Route::get('/{id}', 'PersonaController@show');
        Route::get('/{id}/edit', 'PersonaController@edit');
        Route::put('/{id}', 'PersonaController@update');
        //Route::delete('/{id}', 'PersonaController@destroy');
    });

//////////////////////////////////////USUARIOS///////////////////////////////////////////////

    Route::get('Usuarios', 'UsuarioController@index');
    Route::get('/actualizarUsuario', 'UsuarioController@actualizarUsuario');

    Route::prefix('Usuario')->group(function () {
        Route::get('/create', 'UsuarioController@create');
        Route::post('/store', 'UsuarioController@store');
        //Route::get('/{id}', 'UsuarioController@show');
        Route::get('/{id}/edit', 'UsuarioController@edit');
        Route::put('/{id}', 'UsuarioController@update');
        //Route::delete('/{id}', 'UsuarioController@destroy');
    });
});
//////////////////////////////////////DATATABLES///////////////////////////////////////////////

Route::prefix('datatables')->group(function () {
    Route::get('/listadoCliente', 'PersonaController@listado')->name('datatable.clientes');
    Route::get('/listadoUsuarios', 'UsuarioController@listado')->name('datatable.usuarios');
    Route::get('/listadoProductos', 'ProductoController@listado')->name('datatable.productos');
    Route::get('/listarPedidos', 'ReporteVendedorController@obtenerPedido')->name('datatable.pedidos');
});

//////////// *********************** VENDEDOR ***************************/////////////////////////

Route::group(['middleware' => 'vendedor'], function () {

    Route::get('/Vendedor', 'VendedorController@index');

/////////// reporte vendedor ///////////////////
    Route::get('/reportevendedor', 'ReporteVendedorController@index');

////// nuevo pedido //////////////
    Route::prefix('Pedido')->group(function () {
        Route::get('/nuevopedido', 'NuevoPedidoController@index');
    });

    Route::get('autocompletarpedidodni/{dni}', 'NuevoPedidoController@autoCompletarDni');
    Route::get('autocompletarselectdirecciones/{idtienda}', 'NuevoPedidoController@obtenerDirecciones');
    Route::get('autocompletarnombresapellidos/{nombresapellidos}', 'NuevoPedidoController@autocompletarNombresApellidos');
    Route::get('autocompletarnombretienda/{nombretienda}', 'NuevoPedidoController@autoCompletarNombreTiendaTienda');
    Route::get('enviarpedidos/{array}', 'NuevoPedidoController@enviarPedidos');
    //añadir producto al carrito
    Route::get('autocompletarproducto/{idproducto}', 'NuevoPedidoController@autocompletarproducto');
    //reporte vendedor

    //////////////////////////////////////CLIENTES///////////////////////////////////////////////

    Route::get('/Clientes', 'PersonaController@index');
    Route::get('/actualizarCliente', 'PersonaController@actualizarCliente');

    Route::prefix('Cliente')->group(function () {
        Route::get('/create', 'PersonaController@create');
        Route::post('/store', 'PersonaController@store');
        //Route::get('/{id}', 'PersonaController@show');
        Route::get('/{id}/edit', 'PersonaController@edit');
        Route::put('/{id}', 'PersonaController@update');
        //Route::delete('/{id}', 'PersonaController@destroy');
    });


});
