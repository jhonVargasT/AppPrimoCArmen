<script src="{{ asset('js/js_ajax/reporte_vendedor.js') }}"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<div id="response">
    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="widget widget-stats bg-aqua">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>TOTAL EN CAJA</h4>
                    <p id="cajadia">0</p>
                </div>
            </div>
        </div>
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
                    <p id="comision">
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
                    <select id="estado" name="estado" class=" form-control">
                        <option value="5">Seleccionar</option>
                        <option style="color: green" value="3"> Entregado</option>
                        <option style="color: green" value="4"> Entregadocon observacion</option>
                        <option style="color: rgba(186,184,0,0.78);" value="2"> En Proceso</option>
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
                    <div class="col-sm-12 table-responsive">
                        <table id="data-table-fixed-header"
                               class="table table-striped  table-bordered dataTable no-footer dtr-inline"
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
                            <div class="col-sm-12 table-responsive">
                                <table id="data-table-fixed-header2"
                                       class="table table-striped   table-bordered dataTable no-footer dtr-inline"
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
    App.setPageTitle('Pedidos | ARPEMAR SAC');
    App.restartGlobalFunction();
    $(function () {
        var val = 5;
        $('#data-table-fixed-header').DataTable({

            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            select: true,
            dom: 'lBfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            rowId: 'idPedido',
            responsive: true,
            bAutoWidth: true,
            aaSorting: [[5, "desc"], [0, "desc"], [1, "asc"], [8, "asc"]],
            ajax: '/listarPedidos/' + val,
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


</script>
<!-- ================== END PAGE LEVEL JS ================== -->