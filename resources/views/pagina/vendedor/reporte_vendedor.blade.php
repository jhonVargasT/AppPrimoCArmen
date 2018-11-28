<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet"/>
<!-- ================== END PAGE LEVEL STYLE ================== -->

<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/jquery-smart-wizard/src/css/smart_wizard.css" rel="stylesheet"/>
<link href="../assets/plugins/parsley/src/parsley.css" rel="stylesheet"/>
<link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet"/>
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet"/>
<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet"/>
<link href="../assets/plugins/ionRangeSlider/css/ion.rangeSlider.css" rel="stylesheet"/>
<link href="../assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css" rel="stylesheet"/>
<link href="../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet"/>
<link href="../assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet"/>
<link href="../assets/plugins/password-indicator/css/password-indicator.css" rel="stylesheet"/>
<link href="../assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet"/>
<link href="../assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet"/>
<link href="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet"/>
<link href="../assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet"/>
<link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"/>
<link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet"/>
<link href="../assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css"
      rel="stylesheet"/>
<link href="../assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css" rel="stylesheet"/>
<link href="../assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet"/>
<link href="../assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet"/>
<link href="../assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet"/>

<script language="JavaScript" type="text/javascript" src="../assets/agregarcliente.js"></script>

<!-- ================== END PAGE LEVEL STYLE ================== -->
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="../assets/plugins/DataTables/extensions/FixedColumns/css/fixedColumns.bootstrap.min.css" rel="stylesheet"/>
<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<!-- ================== END PAGE LEVEL STYLE ================== -->
<script language="JavaScript" type="text/javascript" src="../assets/pedido.js"></script>
<script src="{{ asset('js/js_ajax/reporte_vendedor.js') }}"></script>
<script src="{{ asset('typeahead/bootstrap3-typeahead.js') }}"></script>
<div  id="response">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-money-bill-alt"></i></div>
                <div class="stats-info">
                    <h4>META MENSUAL</h4>
                    <p id="meta">0</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-aqua">
                <div class="stats-icon"><i class="fa fa-shopping-bag "></i></div>
                <div class="stats-info">
                    <h4>VENTA MENSUAL</h4>
                    <p id="ventamensual">0</p>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-orange">
                <div class="stats-icon"><i class="fas fa-lg fa-fw m-r-10 fa-dollar-sign"></i></div>
                <div class="stats-info">
                    <h4>COMISION </h4>
                    <p id="provendi">
                        0.00
                    </p>
                </div>
            </div>
        </div>
    </div>

    <h1 class="page-header">Pedidos
        <small>Aqui puedo administrar pedidos</small>
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
            <h4 class="panel-title">Pedidos</h4>
        </div>

        <div class="panel-body">

            <div class=" row col-sm-12 col-xs-12 col-md-12" align="center">

                <a href="Pedido/nuevopedido" data-toggle="ajax" class="btn btn-success"><i
                            class="fas fa-lg fa-fw m-r-10 fa-cart-plus"></i>
                    nuevo pedido
                </a>
            </div>
            <br>
            <br>
            <div class="form-group row col-sm-12 col-xs-12 col-md-12">
                <label class="col-md-2 col-sm-2 col-form-label">Estado Pedido
                    :</label>
                <div class="col-md-3 col-sm-3">
                    <select id="estado"  name="estado" class=" form-control">
                        <option value="5">Seleccionar</option>
                        <option style="color: green" value="3">  Entregado</option>
                        <option style="color: green" value="4">  Entregadocon observacion  </option>
                        <option style="color: rgba(186,184,0,0.78);"  value="2"> En Proceso</option>
                        <option style="color: darkorange;" value="1"> En espera</option>
                        <option style="color: #ca0000;" value="0"> Cancelado</option>
                    </select>
                </div>
                <a href="#" class="btn btn-default btn-icon btn-circle btn-lg" onclick="cambiarTabla()" title="buscar">
                    <i class="fa fa-search"></i>
                </a>
            </div>
            <br>
            <br>
            <div id="data-table-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="data-table-fixed-header"
                               class="table table-striped  table-responsive table-bordered dataTable no-footer dtr-inline"
                               role="grid"
                               aria-describedby="data-table-fixed-header_info" width="100%">
                            <tbody>
                            </tbody>
                            <thead>
                            <tr role="row">
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%;; min-width: 15px;">
                                    Codigo
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%;; min-width: 400px;">
                                    Cliente
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%;; min-width: 50px;">
                                    Telefono
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="width: 100%;; min-width: 400px;">
                                    Tienda y direccion
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 100%;; min-width: 30px;">
                                    Nr produc
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 100%;; min-width: 100px;">
                                    Fecha de entrega
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 100%;; min-width: 20px;">
                                    Total
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 100%;; min-width: 20px;">
                                    Estado
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 100%;; min-width: 80px;" align="center">
                                    Opciones
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="  col-sm-12 col-xs-12 col-md-12">
                <dl class=" row dl-horizontal">
                    <div class="  col-sm-2 col-xs-2 col-md-2">
                        <dt class="text-inverse">Leyenda para estado:</dt>
                    </div>
                    <div class="  col-sm-3 col-xs-3 col-md-3">
                        <dd><i style="color: green" class="fas fa-lg fa-fw m-r-10 fa-circle"> </i>Entregado</dd>
                        <dd><i style="color: green" class="fas fa-lg  fa-circle"> </i> <i style="color: red"
                                                                                          class="fas fa-sm m-r-5 fa-exclamation"> </i>Entregado
                            con observacion
                        </dd>
                        <dd><i style="color: yellow;" class="fas fa-lg fa-fw m-r-10 fa-circle"> </i>En Proceso</dd>
                        <dd><i style="color: darkorange;" class="fas fa-lg fa-fw m-r-10 fa-circle"> </i>En espera</dd>
                        <dd><i style="color: red;" class="fas fa-lg fa-fw m-r-10 fa-circle"> </i>Cancelado</dd>
                    </div>
                </dl>
            </div>
            <br>
            <br>
        </div>
    </div>
    <!-- end panel -->
    <!-- modal-->
    <div class="modal fade" id="modal-dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detalle del pedido</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="form-inline">
                    <h4><label class="col-md-12 col-sm-12 col-form-label" for="numero_pedido"> <strong>Numero de pedido
                                :
                            </strong></label></h4>
                    <h5><label class="text-left " id="numero_pedido">
                        </label></h5>
                </div>
                <div class="modal-body">
                    <div id="data-table-fixed-header_wrapper"
                         class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="data-table-fixed-header2"
                                       class="table table-striped  table-responsive table-bordered dataTable no-footer dtr-inline"
                                       role="grid"
                                       aria-describedby="data-table-fixed-header_info" width="100%">
                                    <tbody>
                                    </tbody>
                                    <thead>
                                    <tr role="row">
                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan=""
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 100%;; min-width: 100%;">
                                            Nombre producto
                                        </th>

                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 100%;; min-width: 20px;">
                                            Cant paquete
                                        </th>
                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 100%;; min-width: 20px;">
                                            Cant unidad
                                        </th>

                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Browser: activate to sort column ascending"
                                            style="width: 100%;; min-width: 10px;">
                                            Estado
                                        </th>

                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="  col-sm-12 col-xs-12 col-md-12">
                            <dl class=" row dl-horizontal">
                                <div class="  col-sm-6 col-xs-6 col-md-6">
                                    <dt class="text-inverse">Leyenda :</dt>
                                </div>
                                <div class="  col-sm-5 col-xs-5 col-md-5">
                                    <dd><i style="color:darkorange;" class="fas fa-lg fa-fw m-r-10 fa-stopwatch"></i>
                                        </i>En espera
                                    </dd>
                                    <dd><i style="color: darkgreen" class="fas fa-lg fa-fw m-r-10 fa-check">
                                        </i>Listo
                                    </dd>
                                    <dd><i style="color: red" class="fas fa-lg fa-fw m-r-10 fa-times"> </i>Cancelado
                                    </dd>
                                </div>
                            </dl>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-success" data-dismiss="modal">Aceptar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
</div>
<script>

    $(function () {
        $('#data-table-fixed-header').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            select: true,
            rowId: 'idPedido',
            aaSorting: [[5, "desc"], [0, "desc"], [1, "asc"], [8, "asc"]],
            ajax: '{!! route('datatable.pedidos') !!}',
            columns: [
                {data: 'idPedido', name: 'idPedido'},
                {data: 'nombres', name: 'nombres'},
                {data: 'nroCelular', name: 'nroCelular'},
                {data: 'tienda', name: 'tienda'},
                {data: 'cantidad', name: 'cantidad'},
                {data: 'fechaEntrega', name: 'fechaEntrega'},
                {data: 'totalPago', name: 'totalPago'},
                {
                    data: function (row) {
                        if (row.estado === '1') {
                            return '<div style="vertical-align: middle;"><i style="color: orange" class="fas fa-lg fa-fw fa-circle "></i></div>';
                        }
                        else {
                            if (row.estado === '2') {
                                return '<div><i style="color: yellow" class="fas fa-lg fa-fw fa-circle"></i></div>';
                            }
                            else {
                                if (row.estado === '3') {
                                    return ' <div><i style="color: green" class="fas fa-lg fa-fw fa-circle"></i></div>';
                                }
                                else {
                                    if (row.estado === '4') {
                                        return '<div><i style="color: green" class="fas fa-lg  fa-circle"> </i> <i style="color: red" class="fas fa-sm m-r-5 fa-exclamation"> </i></div>';
                                    } else {

                                        return '<div><i style="color: red" class="fas fa-lg fa-fw fa-circle"></i></div>';
                                    }

                                }
                            }
                        }
                    }
                },
                {
                    data: function (row) {
                        return '<th">' +
                            '<a href="#modal-dialog" class="btn btn-link" data-toggle="modal"title="Ver productos" onclick="llenarVerProductos(' + row.idPedido + ')">' +
                            '<i class="fas fa-lg fa-fw  fa-eye"></i></a>' +
                            '</th> ';

                    }
                }
            ]

        });
    });
    App.setPageTitle('Pedidos | ARPEMAR SAC');
    App.restartGlobalFunction();
    /*
        $.when(
            $.getScript('../assets/plugins/highlight/highlight.common.js'),
            $.getScript('../assets/js/demo/render.highlight.js'),
            $.Deferred(function (deferred) {
                $(deferred.resolve);
            })
        ).done(function () {
            Highlight.init();
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
        $.getScript('../assets/plugins/bootstrap-daterangepicker/moment.js').done(function () {
            $.when(
                $.getScript('../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'),
                $.getScript('../assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js'),
                $.getScript('../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js'),
                $.getScript('../assets/plugins/masked-input/masked-input.min.js'),
                $.getScript('../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js'),
                $.getScript('../assets/plugins/password-indicator/js/password-indicator.js'),
                $.getScript('../assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js'),
                $.getScript('../assets/plugins/bootstrap-select/bootstrap-select.min.js'),
                $.getScript('../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js'),
                $.getScript('../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js'),
                $.getScript('../assets/plugins/jquery-tag-it/js/tag-it.min.js'),
                $.getScript('../assets/plugins/bootstrap-daterangepicker/daterangepicker.js'),
                $.getScript('../assets/plugins/select2/dist/js/select2.min.js'),
                $.getScript('../assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js'),
                $.getScript('../assets/plugins/bootstrap-show-password/bootstrap-show-password.js'),
                $.getScript('../assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js'),
                $.getScript('../assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js'),
                $.getScript('../assets/plugins/clipboard/clipboard.min.js'),
                $.Deferred(function (deferred) {
                    $(deferred.resolve);
                })
            ).done(function () {
                $.getScript('../assets/js/demo/form-plugins.demo.min.js').done(function () {
                    FormPlugins.init();
                });
            });
        });
        $.when(
            $.getScript('../assets/plugins/gritter/js/jquery.gritter.js'),
            $.getScript('../assets/plugins/bootstrap-sweetalert/sweetalert.min.js'),
            $.getScript('../assets/js/demo/ui-modal-notification.demo.min.js'),
            $.Deferred(function (deferred) {
                $(deferred.resolve);
            })
        ).done(function () {
            Notification.init();
        });*/
</script>
<!-- ================== END PAGE LEVEL JS ================== -->