<?php

use JasperPHP\JasperPHP as JasperPHP;

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

    Route::get('/creacionCorreo/{id}', 'CorreoController@correoCreacionUsuario');

////////////////////////////////////REPORTE///////////////////////////////////////////////////

    Route::get('/Reportes', 'ReporteController@index');

////////////////////////////////////REPORTE PEDIDOS///////////////////////////////////////////////////

    Route::get('/Pedidos', 'PedidoController@index');

    Route::get('/cambiarEstadoProducto/{idproductopedido}/{estado}', 'PedidoAdministrador@cambiarEstadoProducto');
    Route::get('/cambiarEstadoPedido/{idpedido}', 'PedidoAdministrador@cambiarEstadoPedido');
    Route::get('/eliminarPedido/{idpedido}/{razon}', 'PedidoAdministrador@eliminarPedido');
    Route::get('/verEliminacionPedido/{idpedido}', 'PedidoAdministrador@verRazonEliminacion');
//////////////////////////////////////PRODUCTOS///////////////////////////////////////////////

    Route::get('/Productos', 'ProductoController@index');
    Route::get('/actualizarStockModal', 'ProductoController@actualizarStockModal');
    Route::get('/actualizarStock', 'ProductoController@actualizarStock');
    Route::get('/actualizarProducto', 'ProductoController@actualizarProducto');

    Route::get('/enviarCorreo', 'CorreoController@correoCreacionUsuario');

    Route::prefix('Producto')->group(function () {
        Route::get('/create', 'ProductoController@create');
        Route::post('/store', 'ProductoController@store');
        //Route::get('/{id}', 'ProductoController@show');
        Route::get('/{id}/edit', 'ProductoController@edit');
        Route::put('/{id}', 'ProductoController@update');
        //Route::delete('/{id}', 'ProductoController@destroy');
    });
////////////////////DATOS ADICONALES ////////////////////////////
    Route::get('/agregartipopaquete/{nombre}', 'DatosAdiconalesController@agregarTipoPaquete');
    Route::get('/agregartipoproducto/{nombre}', 'DatosAdiconalesController@agregarTipoProducto');
////////////Eliminar////////////////
    Route::get('/cambiarestadotipoproducto/{id}', 'DatosAdiconalesController@cambiarEstadoTipoProducto');
    Route::get('/cambiarestadotipopaquete/{id}', 'DatosAdiconalesController@cambiarEstadoTipoPaquete');
    ///////Editar///////////////////
    Route::get('/editartipoproducto/{id}/{nombre}', 'DatosAdiconalesController@editarEstadoTipoProducto');
    Route::get('/editartipoproducto/{id}/{nombre}', 'DatosAdiconalesController@editarEstadoTipoPaquete');
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

//////////////DATOS ADICIONALES //////////////////
    Route::get('/datosadicionales', 'DatosAdiconalesController@index');
});
route::get('/cambiarcontra/{password}', 'IndexController@cambiarcontra');

//////////// *********************** VENDEDOR ***************************/////////////////////////

Route::group(['middleware' => 'vendedor'], function () {

    Route::get('/Vendedor', 'VendedorController@index');

/////////// reporte vendedor ///////////////////
    Route::get('/reportevendedor', 'ReporteVendedorController@index');

});

Route::group(['can:administrador,vendedor'], function () {
    Route::get('/cambiarNumeroProducto/{idproductopedido}/{cantpaque}/{cantunidad}', 'PedidoAdministrador@cambiarCantProducto');
//////////////////////////////////////CLIENTES///////////////////////////////////////////////
    Route::get('/session', 'IndexController@session');

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
    Route::get('verproductos/{idproductos}', 'ReporteVendedorController@obtenerPrdocutosPedido');
    Route::get('obtenercomision', 'ReporteVendedorController@obtenerComision');

//////////////////////////////////////DATATABLES///////////////////////////////////////////////

    Route::prefix('datatables')->group(function () {
        Route::get('/listadoCliente', 'PersonaController@listado')->name('datatable.clientes');
        Route::get('/listadoUsuarios', 'UsuarioController@listado')->name('datatable.usuarios');
        Route::get('/listadoProductos', 'ProductoController@listado')->name('datatable.productos');
        Route::get('/listarPedidos', 'ReporteVendedorController@obtenerPedido')->name('datatable.pedidos');
        Route::get('/listarPedidosAdmin', 'PedidoAdministrador@obtenerPedidos')->name('datatable.pedidoAdministrador');
        Route::get('/listarTipoPquete', 'DatosAdiconalesController@listarTipoPquete')->name('datatable.listarTipoPquete');
        Route::get('/listarTipoProducto', 'DatosAdiconalesController@listarTipoProducto')->name('datatable.listarTipoProducto');
    });
});

Route::get('/compilar', function () {
    // Crear el objeto JasperPHP
    $jasper = new JasperPHP;

    // Compilar el reporte para generar .jasper
    $jasper->compile(base_path() . '/vendor/cossou/jasperphp/examples/hello_world.jrxml')->execute();

    //   return view('/Administrador');
});

Route::get('/reporte', function () {
    // Crear el objeto JasperPHP
    $jasper = new JasperPHP;

    // Generar el Reporte
    $jasper->process(
    // Ruta y nombre de archivo de entrada del reporte
        base_path() . '/vendor/cossou/jasperphp/examples/hello_world.jasper',
        false, // Ruta y nombre de archivo de salida del reporte (sin extensión)
        array('pdf', 'rtf'), // Formatos de salida del reporte
        array('php_version' => phpversion()) // Parámetros del reporte
    )->output();

    //  return view('/Administrador');
});

Route::get('/listarPedidosAdmin', 'PedidoAdministrador@obtenerPedidos');