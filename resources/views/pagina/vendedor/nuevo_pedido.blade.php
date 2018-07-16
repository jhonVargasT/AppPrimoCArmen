<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="../assets/plugins/DataTables/extensions/FixedColumns/css/fixedColumns.bootstrap.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<link href="../assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css"
      rel="stylesheet"/>

<link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"/>
<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet"/>
<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet"/>
<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script src="{{ asset('js/js_ajax/producto.js') }}"></script>
<script src="{{ asset('js/js_ajax/NuevoPedidoAjax.js') }}"></script>

<!-- ================== END PAGE LEVEL STYLE ================== -->

<h1 class="page-header">Nuevo pedido
    <small>Aqui puedo vender los productos</small>
</h1>
<!-- final cabecera -->

<!-- begin panel -->
<div class="panel panel-inverse">

    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                        class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                        class="fa fa-minus"></i></a>

        </div>
        <h4 class="panel-title">Venta</h4>
    </div>

    <div class="panel-body">
        <div class="col-md-12 " align="center">
            <div class="form-group row m-b-15">
                <input id="idtienda" name="idtienda" hidden>
                <input id="idpersona" name="idpersona" hidden>
                <label class="col-form-label col-md-3">DNI :</label>
                <div class="col-md-9">
                    <input id="dni" onkeypress="if(event.keyCode == 13) autoCompletar()" name="dni" type="number"
                           class="form-control m-b-5" placeholder="Ingresa Dni">
                </div>
            </div>
            <div class="form-group row m-b-15">
                <label class="col-form-label col-md-3">Nombres y apellidos</label>
                <div class="col-md-9">
                    <input type="text" class="form-control m-b-5" id="nombresapellidos" name="nombresapellidos"
                           onkeyup="completarNombresApellidos()">
                </div>
            </div>
            <div class="form-group row m-b-15">
                <label class="col-form-label col-md-3">Nombre tienda</label>
                <div class="col-md-9">
                    <input type="text" class="form-control m-b-5" id="nombretienda" name="nombretienda"
                           onkeyup="completarTienda()">
                </div>
            </div>

            <div class="form-group row m-b-15">
                <label class="col-form-label col-md-3">Direccion tienda</label>
                <div class="col-md-9">
                    <select id="direcciones" class=" form-control" onclick="llenarDireccion()">
                        <option>
                            Seleccione
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group row m-b-15">
                <label class="col-form-label col-md-3">Fecha de entrega</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="datepicker-autoClose"
                           onmouseover="activarBotonAnadirProducto()"
                           placeholder="Auto Close Datepicker">
                </div>
            </div>
        </div>

        <div class=".row.row-space-2 .p-2 disabled" align="center">

            <a href="#modal-dialog" class="btn btn-link btn-sm btn-primary disabled " onclick="resetearModal()"
               data-toggle="modal"
               id="anadirproducto">
                <i class="fas fa-lg fa-fw m-r-10 fa-plus-circle "></i>
                Añadir producto
            </a>

        </div>
        <div class="col-md-12" align="right">
            <label class="col-form-label ">Total : S/. 180 </label>
        </div>
        <br>
        <div id="data-table-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-6">
                    <div class="dataTables_length" id="data-table-fixed-header_length">
                        <label>Show
                            <select name="data-table-fixed-header_length" aria-controls="data-table-fixed-header"
                                    class="form-control input-sm">
                                <option value="20">20
                                </option>
                                <option value="40">40
                                </option>
                                <option value="60">60
                                </option>
                            </select> entries
                        </label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="data-table-fixed-header_filter" class="dataTables_filter">
                        <label>Search:
                            <input type="search" class="form-control input-sm" placeholder=""
                                   aria-controls="data-table-fixed-header">
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="data-table-fixed-header"
                           class="table table-striped table-responsive table-bordered dataTable no-footer dtr-inline"
                           role="grid"
                           aria-describedby="data-table-fixed-header_info">
                        <tbody>
                        <tr class="gradeX odd" role="row">
                            <th>Galleta oreo</th>
                            <th>4</th>
                            <th>24
                            </th>
                            <th>220</th>
                            <th>
                                <a href="" style="color: green" TITLE="editar">
                                    <i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>
                                <a href="#" class="btn btn-link" data-toggle="modal" title="cancelar"><i
                                            style="color: red"
                                            class="fas fa-lg fa-fw  fa-times-circle "></i>
                                </a></th>
                        </tr>


                        </tbody>
                        <thead>
                        <tr role="row">

                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 100%;; min-width: 187px;">
                                Producto
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                style="width: 100%;; min-width: 60px;">
                                Nro Paquetes
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                style="width: 100%;; min-width: 100px;">
                                Nro unidades
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                                style="width: 100%;; min-width: 159px;">
                                costo total
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                                style="width: 100%;; min-width: 159px;">
                                Opcion
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="data-table-fixed-header_info" role="status" aria-live="polite">
                        Showing 1 to 20 of 57 entries
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="data-table-fixed-header_paginate">
                        <ul class="pagination">
                            <li class="paginate_button previous disabled" id="data-table-fixed-header_previous"><a
                                        href="#" aria-controls="data-table-fixed-header" data-dt-idx="0" tabindex="0">Previous</a>
                            </li>
                            <li class="paginate_button active"><a href="#" aria-controls="data-table-fixed-header"
                                                                  data-dt-idx="1" tabindex="0">1</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="data-table-fixed-header"
                                                            data-dt-idx="2" tabindex="0">2</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="data-table-fixed-header"
                                                            data-dt-idx="3" tabindex="0">3</a></li>
                            <li class="paginate_button next" id="data-table-fixed-header_next">
                                <a href="#" aria-controls="data-table-fixed-header"
                                   data-dt-idx="4"
                                   tabindex="0">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" align="center">
            <a href="javascript:;" class="btn btn-danger" data-dismiss="modal">
                <i class="fas fa-lg fa-fw m-r-10 fa-times-circle"></i>
                Cancelar</a>
            <button href="javascript:;" class="btn btn-success disabled">
                <i class="fas fa-lg fa-fw m-r-10 fa-paper-plane"> </i>Enviar
            </button>
        </div>
    </div>
</div>
<!---adicionar stock--->
<div class="modal fade" id="modal-dialog">
    <div class="modal-dialog ">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Añadir producto al carrito</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <div class="row form-group row m-b-15">
                    <label class="col-md-5 col-sm-5 col-form-label" for="nombre_producto"> <strong> Nombre producto
                            :</strong></label>
                    <div class="col-md-6 col-sm-6">
                        <input onkeypress="if(event.keyCode == 13) buscarProductoNombre()" id="nombre_producto"
                               type="text" class="form-control m-b-12"
                        />
                    </div>
                </div>
                <div class="bg-orange-lighter">
                    <div class="row form-group row m-b-15 ">
                        <label class=" col-md-12 col-form-label text-center"><h4><u> <strong> Informacion del
                                        producto </strong></u></h4>
                        </label>
                    </div>
                    <div class="row form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label text-right" for="nompro">Nombre producto
                            :</label>
                        <label class="col-md-1 col-sm-1 col-form-label text-left" id="nompro" name="nompro"> </label>
                    </div>
                    <div class="row form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label text-right" for="tippro">Tipo producto :</label>
                        <label class="col-md-1 col-sm-1 col-form-label text-left" id="tippro" name="tippro"></label>
                    </div>
                    <div class="row form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label text-right" for="tippa">Tipo paquete :</label>
                        <label class="col-md-1 col-sm-1 col-form-label text-left" id="tippa" name="tippa"></label>
                    </div>
                    <div class="row form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label text-right" for="capa">Cant unid x paq :</label>
                        <label class="col-md-1 col-sm-1 col-form-label text-left" id="capa" name="capa"></label>
                    </div>
                </div>


                <div class="bg-green-lighter">
                    <div class="row form-group row m-b-15 ">
                        <label class=" col-md-12 col-form-label text-center"><h4><u><strong> Stock del
                                        producto </strong> </u></h4>
                        </label>
                    </div>
                    <div class="row form-group row m-b-15">
                        <label class="col-md-3 col-sm-3 col-form-label text-right">Paquete :</label>
                    </div>
                    <div class="row form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label text-right" for="cantidadpa">Cantidad :</label>
                        <label class="col-md-1 col-sm-1 col-form-label text-left" id="cantidadpa"
                               name="cantidadpa"> </label>
                        <label class="col-md-3 col-sm-3 col-form-label text-left" for="preciopa">Precio c/u :</label>
                        <label class="col-md-1 col-sm-1 col-form-label text-left" id="preciopa"
                               name="preciopa"> </label>
                    </div>
                    <div class="row form-group row m-b-15">
                        <label class="col-md-3 col-sm-3 col-form-label text-right">Unidad :</label>
                    </div>
                    <div class="row form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label text-right" for="cantidadun">Cantidad :</label>
                        <label class="col-md-1 col-sm-1 col-form-label text-left" id="cantidadun"
                               name="cantidadun"> </label>
                        <label class="col-md-3 col-sm-3 col-form-label text-left" for="precioun">Precio c/u :</label>
                        <label class="col-md-1 col-sm-1 col-form-label text-left" id="precioun"
                               name="precioun"> </label>
                    </div>
                    <hr>
                </div>
                <div class="row form-group row m-b-15">
                    <label class="col-md-5 col-sm-5 col-form-label" for="numero_paquetes"> <strong>Numero de
                            packetes </strong></label>
                    <div class="col-md-2 col-sm-2">
                        <input id="numero_paquetes" type="number" class="form-control m-b-5"
                               data-parsley-type="number" onchange="mostrarMonto()" value="0" min="0" readonly/>
                    </div>

                    <label class="col-md-2 col-sm-2 col-form-label text-right" for="totpaque">Total :</label>
                    <label class="col-md-1 col-sm-1 col-form-label text-left" id="totpaque"></label>
                </div>
                <div class="row form-group row m-b-15">
                    <label class="col-md-5 col-sm-5 col-form-label" for="numero_unidades"> <strong>Numero de
                            unidades </strong></label>
                    <div class="col-md-2 col-sm-2">
                        <input id="numero_unidades" type="number" class="form-control m-b-5"
                               data-parsley-type="number" value="0" onchange="mostrarMonto()" min="0" readonly/>
                    </div>
                    <label class="col-md-2 col-sm-2 col-form-label text-right" for="totunu">Total :</label>
                    <label class="col-md-1 col-sm-1 col-form-label text-left" id="totunu"> </label>
                </div>
                <div class="row form-group row m-b-15">
                    <label class="col-md-11 col-sm-11 col-form-label  text-right" for="total"> <strong>Total : </strong></label>
                    <label class="col-md-1 col-sm-1 col-form-label" id="total"></label>
                </div>

            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-lg fa-fw m-r-10 fa-times-circle"></i>
                    Cancelar</a>
                <a href="javascript:;" class="btn btn-success disabled" id="enviar" onmouseover="activarBoton()" onclick="anadirProductoATabla()" data-dismiss="modal">
                    <i class="fas fa-lg fa-fw m-r-10 fa-shopping-cart"> </i>Agregar carrito</a>
            </div>
        </div>
    </div>
</div>
<!-- end panel -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->

<script>
    App.setPageTitle('Vender| ARPEMAR SAC');
    App.restartGlobalFunction();

    $.when(
        $.getScript('../assets/plugins/gritter/js/jquery.gritter.js'),
        $.getScript('../assets/plugins/bootstrap-sweetalert/sweetalert.min.js'),
        $.getScript('../assets/js/demo/ui-modal-notification.demo.min.js'),
        $.Deferred(function (deferred) {
            $(deferred.resolve);
        })
    ).done(function () {
        Notification.init();
    });
    $.getScript('../assets/plugins/bootstrap-daterangepicker/moment.js').done(function () {
        $.when(
            $.getScript('../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'),
            $.getScript('../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js'),
            $.getScript('../assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js'),
            $.Deferred(function (deferred) {
                $(deferred.resolve);
            })
        ).done(function () {
            $.getScript('../assets/js/demo/form-plugins.demo.min.js').done(function () {
                FormPlugins.init();
            });
        });
    });
    $.getScript('../assets/plugins/DataTables/media/js/jquery.dataTables.js').done(function () {
        $.when(
            $.getScript('../assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js'),
            $.getScript('../assets/plugins/DataTables/extensions/FixedColumns/js/dataTables.fixedColumns.min.js'),
            $.getScript('../assets/js/demo/table-manage-fixed-columns.demo.min.js'),
            $.Deferred(function (deferred) {
                $(deferred.resolve);
            })
        ).done(function () {
            TableManageFixedColumns.init();
        });
    });
</script>
<!-- =====