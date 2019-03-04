<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="../assets/plugins/DataTables/extensions/FixedColumns/css/fixedColumns.bootstrap.min.css" rel="stylesheet"/>

<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

<script src="{{ asset('js/js_ajax/productopromocion.js') }}"></script>
<!-- ================== END PAGE LEVEL STYLE ================== -->
<div id="response">
    <h1 class="page-header">Productos promociones
        <small>Aqui puedo visualizar los productos activos para cada promocion...
        </small>
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
            <h4 class="panel-title">Promocion</h4>
        </div>

        <div class="panel-body">

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
                                    style="width: 100%;; min-width: 20px;  ">
                                    Id
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%;; min-width: 100px;">
                                    Nombre producto
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%;; min-width: 100px;">
                                    Fecha agregado
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="width: 100%;; min-width: 40px;">
                                    Activo caja
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="width: 100%;; min-width: 40px;">
                                    Activo unidad
                                </th>


                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 100%;; min-width: 130px;">
                                    Precio caja mayorista
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 100%;; min-width: 130px;">
                                    Precio caja minorista
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 100%;; min-width: 130px;">
                                    Precio unidad
                                </th>

                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end panel -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script>
    /*App.setPageTitle('Productos | ARPEMAR SAC');
    App.restartGlobalFunction();
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
    });*/
</script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    App.setPageTitle('Producto promocion | ARPEMAR SAC');
    App.restartGlobalFunction();
    $(function () {
        $('#data-table-fixed-header').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
          //  serverSide: true,
            select: true,
            rowId: 'id',
            dom: 'lBfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            ajax: '/listarproductopromocion/{{$id}}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'nombre', name: 'nombre'},
                {data: 'fechaCreacion', name: 'fechaCreacion'},
                {
                    data: function (row) {
                        if (row.activoCaja === '1') {
                            return '<div class="form-check">\n' +
                                '<input class="form-check-input is-valid" id="validCheckbox" type="checkbox" value="" onclick="activarDesactivarProductoPromocion('+row.id+','+row.activoCaja+',1,'+row.idProducto+','+row.idpromo+')" checked>\n' +
                                '<label class="form-check-label" for="validCheckbox">Activo</label>\n' +
                                '</div>';
                        }
                        else {
                            return '<div class="form-check">\n' +
                                '<input class="form-check-input is-invalid" id="invalidCheckbox" type="checkbox" value="" onclick="activarDesactivarProductoPromocion('+row.id+','+row.activoCaja+',1,'+row.idProducto+','+row.idpromo+')" >\n' +
                                '<label class="form-check-label" for="invalidCheckbox">Inactivo</label>\n' +
                                '</div>';
                        }
                    }
                },
                {
                    data: function (row) {
                        if (row.activoUnidad === '1') {
                            return '<div class="form-check">\n' +
                                '<input class="form-check-input is-valid" id="validCheckbox" type="checkbox" value="" onclick="activarDesactivarProductoPromocion('+row.id+','+row.activoUnidad+',0,'+row.idProducto+','+row.idpromo+')" checked>\n' +
                                '<label class="form-check-label" for="validCheckbox" >Activo</label>\n' +
                                '</div>';
                        }
                        else {
                            return '<div class="form-check">\n' +
                                '<input class="form-check-input is-invalid" id="invalidCheckbox" type="checkbox" onclick="activarDesactivarProductoPromocion('+row.id+','+row.activoUnidad+',0,'+row.idProducto+','+row.idpromo+')" value="">\n' +
                                '<label class="form-check-label" for="invalidCheckbox">Inactivo</label>\n' +
                                '</div>';
                        }
                    }
                },
                {data: 'montomayo', name: 'montomayo'},
                {data: 'montomino', name: 'montomino'},
                {data: 'montouni', name: 'montouni'},
            ]
        });
    });
</script>