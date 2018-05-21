<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="../assets/plugins/DataTables/extensions/FixedColumns/css/fixedColumns.bootstrap.min.css" rel="stylesheet"/>
<!-- ================== END PAGE LEVEL STYLE ================== -->

<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

<script src="{{ asset('js/js_ajax/producto.js') }}"></script>

<div id="response">
    <h1 class="page-header">Productos
        <small>Aqui puedo agregar productos, eliminarlos o editarlos...</small>
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
            <h4 class="panel-title">Producto</h4>
        </div>

        <div class="panel-body">
            <div class=".row.row-space-2 .p-2">
                <a href="/Producto/create" data-toggle="ajax" class="btn btn-sm btn-primary">
                    <i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i>
                    Agregar producto
                </a>
            </div>
            <br>
            <div id="data-table-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="data-table-fixed-header"
                               class="table table-striped table-responsive table-bordered dataTable no-footer dtr-inline"
                               role="grid"
                               aria-describedby="data-table-fixed-header_info" width="100%">
                            <tbody>
                            </tbody>
                            <thead>
                            <tr role="row">
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%;; min-width: 187px;">
                                    Nombre
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="width: 100%;; min-width: 60px;">
                                    Tipo
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                    style="width: 100%;; min-width: 100px;">
                                    Stock
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 100%;; min-width: 159px;">
                                    Unidad
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                    style="width: 100%;; min-width: 117px;">
                                    Precio Compra
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                    style="width: 100%;; min-width: 117px;">
                                    Precio unidad
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                    style="width: 100%;; min-width: 117px;">
                                    Fecha Ingreso
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 100%;; min-width: 159px;">
                                    Estado
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                    style="width: 100%;; min-width: 100px;">
                                    Opciones
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end panel -->
    <!-- modal inicio -->
    <div class="modal fade" id="modal-dialog">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Adicionar stock</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row form-group row m-b-15">
                        <input type="hidden" id="idProducto">
                        <label class="col-md-2 col-sm-2 col-form-label" for="fullname">Nombre producto:</label>
                        <div class="col-md-4 col-sm-4">
                            <br>
                            <span id="nombrespan">
                        </span>
                        </div>
                        <label class="col-md-2 col-sm-2 col-form-label" for="fullname">Stock actual:</label>
                        <div class="col-md-4 col-sm-4">
                            <br>
                            <span id="stockspan">
                        </span>
                        </div>
                    </div>
                    <div class="row form-group row m-b-15">
                        <label class="col-md-2 col-sm-2 col-form-label" for="fullname">Stock paquete adicional :</label>
                        <div class="col-md-4 col-sm-4">
                            <br>
                            <input type="number" data-parsley-type="number" placeholder="0" id="paquete"/>
                        </div>
                        <label class="col-md-2 col-sm-2 col-form-label" for="fullname">Stock unidad adicional :</label>
                        <div class="col-md-4 col-sm-4">
                            <br>
                            <input type="number" data-parsley-type="number" placeholder="0" id="unidad"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success" id="adicionar">Adicionar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal fin -->
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script>
    /*App.setPageTitle('Productos | ARPEMAR SAC');
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
    $.getScript('../assets/plugins/DataTables/media/js/jquery.dataTables.js').done(function() {
        $.when(
            $.getScript('../assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js'),
            $.getScript('../assets/plugins/DataTables/extensions/FixedColumns/js/dataTables.fixedColumns.min.js'),
            $.getScript('../assets/js/demo/table-manage-fixed-columns.demo.min.js'),
            $.Deferred(function( deferred ){
                $(deferred.resolve);
            })
        ).done(function() {
            TableManageFixedColumns.init();
        });
    });*/
</script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
    $(function () {
        $('#data-table-fixed-header').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            select: true,
            rowId: 'id',
            ajax: '{!! route('datatable.productos') !!}',
            columns: [
                {data: 'nombre', name: 'nombre'},
                {data: 'tipoProducto', name: 'tipoProducto'},
                {
                    data: function (row) {
                        if (((row.cantidadPaquete * row.cantidadProductosPaquete) + parseInt(row.cantidadStockUnidad)) > 50)
                            return '<i style="color:green " class="fas fa-lg fa-fw m-r-10 fa-circle"></i>' +
                                ((row.cantidadPaquete * row.cantidadProductosPaquete) + parseInt(row.cantidadStockUnidad)) +
                                '<button class="btn btn-link" onclick="actualizarStockModal(' + row.idProducto + ')"><i\n' +
                                'class="fas fa-lg fa-fw m-r-10 fa-plus "></i></button>';
                        else if (((row.cantidadPaquete * row.cantidadProductosPaquete) + parseInt(row.cantidadStockUnidad)) < 50 && ((row.cantidadPaquete * row.cantidadProductosPaquete) + parseInt(row.cantidadStockUnidad)) > 10) {
                            return '<i style="color:yellow " class="fas fa-lg fa-fw m-r-10 fa-circle"></i>' +
                                ((row.cantidadPaquete * row.cantidadProductosPaquete) + parseInt(row.cantidadStockUnidad)) +
                                '<button class="btn btn-link" onclick="actualizarStockModal(' + row.idProducto + ')"><i\n' +
                                'class="fas fa-lg fa-fw m-r-10 fa-plus "></i></button>';
                        }
                        else if (((row.cantidadPaquete * row.cantidadProductosPaquete) + parseInt(row.cantidadStockUnidad)) < 10) {
                            return '<i style="color:red " class="fas fa-lg fa-fw m-r-10 fa-circle"></i>' +
                                ((row.cantidadPaquete * row.cantidadProductosPaquete) + parseInt(row.cantidadStockUnidad)) +
                                '<button class="btn btn-link" onclick="actualizarStockModal(' + row.idProducto + ')"><i\n' +
                                'class="fas fa-lg fa-fw m-r-10 fa-plus "></i></button>';
                        }
                    }
                },
                {
                    data: function (row) {
                        return row.tipoPaquete;
                    }
                },
                {data: 'precioCompra', name: 'precioCompra'},
                {data: 'precioCompraUnidad', name: 'precioCompraUnidad'},
                {data: 'fechaCreacion', name: 'fechaCreacion'},
                {
                    data: function (row) {
                        if (row.estado === '1') {
                            return '<label class="text-success">ACTIVO</label>';
                        }
                        else {
                            return '<label class="text-danger">ANULADO</label>';
                        }
                    }
                },
                {
                    data: function (row) {
                        if (row.estado === '1') {
                            return '<div align="center">\n' +
                                '<a href="#" style="color: red" TITLE="Anular" onclick="actualizarProducto(' + row.idProducto + ',0)">\n' +
                                '<i class="fas fa-lg fa-fw m-r-10 fa-times"> </i></a>\n' +
                                '<a href="Producto/' + row.idProducto + '/edit" style="color: green" TITLE="Editar" data-toggle="ajax">\n' +
                                '<i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>\n' +
                                '</div>';
                        } else {
                            return '<div align="center">\n' +
                                '<a href="#" style="color: red" TITLE="Activar" onclick="actualizarProducto(' + row.idProducto + ',1)">\n' +
                                '<i class="fas fa-lg fa-fw m-r-10 fa-plus"> </i></a>\n' +
                                '<a href="Producto/' + row.idProducto + '/edit" style="color: green" TITLE="Editar" data-toggle="ajax">\n' +
                                '<i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>\n' +
                                '</div>';
                        }
                    }
                }
            ]
        });
    });
</script>