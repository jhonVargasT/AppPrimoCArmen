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
Route::get('/', 'IndexController@index');
//////////////////////////////////INICIO//////////////////////////////////////////////////

Route::group(['middleware' => 'administrador'], function () {
//////////////////////////////////////ADMINISTRADOR///////////////////////////////////////////
    Route::get('/Administrador', 'AdministradorController@index');
});


Route::group(['middleware' => 'vendedor'], function () {

    Route::get('/Vendedor', 'VendedorController@index');

/////////// reporte vendedor ///////////////////


});

Route::group(['can:administrador,vendedor'], function () {
    route::get('/cambiarcontra/{password}', 'IndexController@cambiarcontra');

//////////// *********************** VENDEDOR ***************************/////////////////////////

    route::get('/document/{serie}', 'FacturaController@document');


    Route::get('/creacionCorreo/{id}', 'CorreoController@correoCreacionUsuario');

////////////////////////////////////REPORTE///////////////////////////////////////////////////

    Route::get('/Reportes', 'ReporteController@index');

////////////////////////////////////REPORTE PEDIDOS///////////////////////////////////////////////////


    Route::get('/cambiarEstadoProducto/{idproductopedido}/{estado}', 'PedidoAdministrador@cambiarEstadoProducto');
    Route::get('/cambiarEstadoPedido/{idpedido}', 'PedidoAdministrador@cambiarEstadoPedido');
    Route::get('/eliminarPedido/{idpedido}/{razon}', 'PedidoAdministrador@eliminarPedido');
    Route::get('/verEliminacionPedido/{idpedido}', 'PedidoAdministrador@verRazonEliminacion');
//////////////////////////////////////PRODUCTOS///////////////////////////////////////////////

    Route::get('/Productos', 'ProductoController@index');
    Route::get('/actualizarStockModal', 'ProductoController@actualizarStockModal');
    Route::get('/partirpaquete/{idpro}', 'ProductoController@partirPaquete');
    Route::get('/unirunidadespaquete/{idpro}', 'ProductoController@unirAPaquete');
    Route::get('/actualizarStock', 'ProductoController@actualizarStock');
    Route::get('/actualizarProducto', 'ProductoController@actualizarProducto');

    Route::get('/enviarCorreo', 'CorreoController@correoCreacionUsuario');
    Route::get('/llenartipos', 'DatosAdiconalesController@llenarTipos');
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
    Route::get('/editartipos/{id}/{nombre}/{tipo]', 'DatosAdiconalesController@editarNombreTipo');
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

    Route::get('/obetenerReporteAdministrador/{idcliente}/{fechaini}/{fechafin}', 'ReporteController@reportarBoletas');
    Route::get('/obetnerProductoMasVendido', 'ReporteController@obtenerProductoMasvendido');
    Route::get('/obtenerClientes', 'ReporteController@obtenerNumeroClientes');
    Route::get('/totalProductosVendidos', 'ReporteController@totalProductosVendidos');
    Route::get('/cajaMensual', 'ReporteController@ventasMensuales');
    Route::get('/cajaDiaria', 'ReporteController@ventasDiarias');
    Route::get('/cajaDiariavendedor', 'ReporteVendedorController@ventadiaria');
    Route::get('/cambiarNumeroProducto/{idproductopedido}/{cantpaque}/{cantunidad}', 'PedidoAdministrador@cambiarCantProducto');
//////////////////////////////////////CLIENTES///////////////////////////////////////////////
    Route::get('/session', 'IndexController@session');

    Route::get('/Clientes', 'PersonaController@index');
    Route::get('/deuda', 'DeudaController@index');
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
    /////CHINO ACA ESTA EL TYPEAHEAD/////////////
    /// MIRA EL REPORTE_VENDEDOR, ALLI ESTA EL JAVASCRIPT(CODIGO) Y TIENES QUE IMPORTAR EL SCRIPT QUE DESCARGUE...
    Route::get('/buscarporcliente', 'AutocompleteController@buscarPorCliente');
    Route::get('/buscarportienda', 'AutocompleteController@buscarPorTienda');
    Route::get('/buscarnombre', 'AutocompleteController@buscarNombreProducto');

    //////////////////////////////////////////////////////////////
    ///
    Route::get('autocompletarpedidodni/{dni}', 'NuevoPedidoController@autoCompletarDni');
    Route::get('autocompletarselectdirecciones/{idtienda}', 'NuevoPedidoController@obtenerDirecciones');
    Route::get('autocompletarnombresapellidos/{nombresapellidos}', 'NuevoPedidoController@autocompletarNombresApellidos');
    Route::get('autocompletarnombretienda/{nombretienda}', 'NuevoPedidoController@autoCompletarNombreTiendaTienda');
    Route::get('enviarpedidos/{array}', 'NuevoPedidoController@enviarPedidos');
    Route::get('enviarpedidosTienda/{array}', 'TiendaController@enviarPedidos');
    Route::get('/Pedidos', 'PedidoController@index');
    Route::get('/reportevendedor', 'ReporteVendedorController@index');

//añadir producto al carrito
    Route::get('autocompletarproducto/{idproducto}/{dni}', 'NuevoPedidoController@autocompletarproducto');
    Route::get('autocompletarproductopromocion/{idproducto}/{dni}/{idpromocion}', 'NuevoPedidoController@autocompletarProductoPromocion');
//reporte vendedor
    Route::get('verproductos/{idproductos}', 'ReporteVendedorController@obtenerPrdocutosPedido');
    Route::get('/enviarfactura/{array}', 'FacturaController@enviarFactura');
    Route::get('obtenermeta', 'ReporteVendedorController@meta');
    Route::get('ventamensual', 'ReporteVendedorController@ventaMensual');
    Route::get('comision', 'ReporteVendedorController@comision');

//////////////////////////////////////DATATABLES///////////////////////////////////////////////

    Route::prefix('datatables')->group(function () {
        Route::get('/listadoCliente', 'PersonaController@listado')->name('datatable.clientes');
        Route::get('/listadoUsuarios', 'UsuarioController@listado')->name('datatable.usuarios');
        Route::get('/listadoProductos', 'ProductoController@listado')->name('datatable.productos');
        Route::get('/listafacturas', 'FacturaController@listarFacturas')->name('datatable.facturas');
        Route::get('/listarTipoPquete', 'DatosAdiconalesController@listarTipoPquete')->name('datatable.listarTipoPquete');
        Route::get('/listarTipoProducto', 'DatosAdiconalesController@listarTipoProducto')->name('datatable.listarTipoProducto');
        Route::get('/listarDevoluciones', 'DevolucionController@listarDevoluciones')->name('datatable.listarDevoluciones');
        Route::get('/listarPromociones', 'Promocioncontroller@listar')->name('datatable.promociones');
    });

    Route::get('/listarPedidosAdmin/{val}/{fechaini}/{fechafin}', 'PedidoAdministrador@obtenerPedidos');
    Route::get('/listarPedidos/{val}', 'ReporteVendedorController@obtenerPedido')->name('datatable.pedidos');


    Route::get('/compilarticket/{id}', 'ImpresionesController@notaVenta');
    Route::get('/ticket', 'ImpresionesController@ticketeraDirecta');
    Route::get('/factura/{id}', 'ImpresionesController@facturaEletronica');
    Route::get('/tienda', 'TiendaController@index');

    Route::get('/devolucion', 'DevolucionController@index');
    Route::get('/enviarDevolucion/{nombreProducto}/{cant}/{motivo}', 'DevolucionController@guardarDevolucion');
    Route::get('/eliminardevolucion/{iddevolucion}', 'DevolucionController@eliminarDevolucion');
    Route::get('/devolver/{iddevolucion}', 'DevolucionController@entregarDevolucion');
    Route::get('/promocion', 'Promocioncontroller@index');

    Route::get('/devolucionespd/{id}', 'ImpresionesController@devoluciones');

    Route::prefix('promocion')->group(function () {
        Route::get('/create', 'Promocioncontroller@create');
        Route::post('/store', 'Promocioncontroller@store');
        //Route::get('/{id}', 'PersonaController@show');
        Route::get('/{id}/edit', 'Promocioncontroller@edit');
        Route::put('/{id}', 'Promocioncontroller@update');
        //  Route::delete('/{id}', 'Promocioncontroller@actualizarPromocion');
    });
    Route::get('/eliminarpromocion/{id}', 'Promocioncontroller@actualizarPromocion');
    Route::get('/verpromocionproducto/{id}', 'Promocioncontroller@verPromocionProducto');
    Route::get('/listarproductopromocion/{val}', 'Promocioncontroller@listarProductoPromocion');
    Route::get('/verpromocionproducto/{id}/{estado}/{tipo}/{prod}/{prom}', 'Promocioncontroller@activarDesactivar');
    Route::get('/listarPromocionProducto/{id}', 'NuevoPedidoController@listarPromociones');
    Route::get('/facturas', 'FacturaController@index');
    Route::get('/nuevafactura', 'FacturaController@nuevaFactura');
    Route::get('/buscarfactura/{idpedido}', 'FacturaController@buscarFactura');
    Route::get('/buscarusuario/{idpedido}', 'FacturaController@buscarusuario');
    Route::get('/buscarboletapedido/{idpedido}', 'FacturaController@buscarboletapedido');
    Route::get('/buscarusuario/{idpedido}', 'FacturaController@buscarusuario');

/// Reportes
/// ingresos por cliente
    Route::get('/reporteVendedorIngresos/{vendedor}/{fechaini}/{fechafin}', 'ReporteController@reporteClienteIngresos');
    Route::get('/obtenerVendedores', 'ReporteController@obtenerVendedores');
    Route::get('/reporteProductoIngresos/{producto}/{fechaini}/{fechafin}', 'ReporteController@reporteProductoIngresos');
    Route::get('/reporteProductoRuta/{idvendedor}/{fechaini}/{fechafin}', 'ReporteController@reporteProductoPedido');
    Route::get('/reporteClienteIngresos/{fechaini}/{fechafin}', 'ReporteController@reporteClienteTotal');
});
/*
