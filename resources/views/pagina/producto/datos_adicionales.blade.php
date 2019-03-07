<script src="{{ asset('js/js_ajax/DatosAdicionales.js') }}"></script>
<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<div id="response">
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-lg-6">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i
                                    class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                           data-click="panel-reload"><i
                                    class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title">Tipo producto
                        <small>Son los tipos de producto que apareceran al agregar un producto</small>
                    </h4>

                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body">
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-3">Nombre tipo producto</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control m-b-5" placeholder="Escriba nuevo tipo"
                                   id="tipoproducto">
                        </div>
                        <a href="javascript:;" class="btn btn-large btn-icon  btn-success" title="Agregar"
                           onclick="agregarTipoProducto()"><i
                                    class="fa fa-plus-circle"></i></a>
                    </div>
                    <div id="data-table-fixed-header_wrapper"
                         class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table id="data-table-fixed-header1"
                                       class="table table-striped  table-bordered dataTable no-footer dtr-inline"
                                       role="grid"
                                       aria-describedby="data-table-fixed-header_info" width="100%">
                                    <tbody>
                                    </tbody>
                                    <thead>
                                    <tr role="row">

                                        <th class="text-nowrap sorting text-center" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending"
                                            style="width: 10%;; min-width: 20px;">
                                            Codigo
                                        </th>

                                        <th class="text-nowrap sorting text-center" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending"
                                            style="width: 100%;; min-width: 160px;">
                                            Nombre
                                        </th>
                                        <th class="text-nowrap sorting text-center" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending"
                                            style="width: 60%;; min-width: 60px;">
                                            Estado
                                        </th>
                                        <th class="text-nowrap sorting text-center" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending"
                                            style="width: 100%;; min-width: 40px;">
                                            Opciones
                                        </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end panel-body -->

            </div>
            <!-- end panel -->

        </div>
        <!-- end col-6 -->
        <!-- begin col-6 -->
        <div class="col-lg-6">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-2">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i
                                    class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                           data-click="panel-reload"><i
                                    class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title">Tipo caja
                        <small>Son los tipos de paquete que apareceran al agregar un producto</small>
                    </h4>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body p-t-10">
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-3">Nombre tipo caja</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control m-b-5" placeholder="Escriba nuevo tipo paquete"
                                   id="tipopaquete">
                        </div>
                        <a href="javascript:;" class="btn btn-large btn-icon  btn-success" title="Agregar"
                           onclick="agregarTipoPaquete()"><i
                                    class="fa fa-plus-circle"></i></a>
                    </div>

                   <div class="col-sm-12 table-responsive">
                    <table id="data-table-fixed-header2"
                           class="table table-striped  table-bordered dataTable no-footer dtr-inline"
                           role="grid"
                           aria-describedby="data-table-fixed-header_info" width="100%">
                        <tbody>
                        </tbody>
                        <thead>
                        <tr role="row">

                            <th class="text-nowrap sorting text-center" tabindex="0"
                                aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending"
                                style="width: 10%;; min-width: 20px;">
                                Codigo
                            </th>

                            <th class="text-nowrap sorting text-center" tabindex="0"
                                aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending"
                                style="width: 100%;; min-width: 140px;">
                                Nombre
                            </th>
                            <th class="text-nowrap sorting text-center" tabindex="0"
                                aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending"
                                style="width: 100%;; min-width: 60px;">
                                Estado
                            </th>
                            <th class="text-nowrap sorting text-center" tabindex="0"
                                aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending"
                                style="width: 30%;; min-width: 60px;">
                                Opciones
                            </th>
                        </tr>
                        </thead>
                    </table>
                   </div>
                </div>
                <!-- end panel-body -->

            </div>
            <!-- end panel -->

        </div>
        <!-- end col-6 -->
    </div>
</div>
<!---------------Inicio modal------------->
<!-------------Fin modal--------------->
<script>
    App.setPageTitle('Datos adicionales | ARPEMAR SAC');
    App.restartGlobalFunction();
    $(function () {
        $('#data-table-fixed-header2').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            select: true,
            rowId: 'idTipoPaquete',
            responsive: true,
            bAutoWidth: true,
            dom: 'lBfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            ajax: '{!! route('datatable.listarTipoPquete') !!}',
            columns: [
                {data: 'idTipoPaquete', name: 'idTipoPaquete'},
                {data: 'nombre', name: 'nombre'},
                {
                    data: function (row) {
                        if (row.estado === '1') {
                            return '<label class="text-success">ACTIVO</label>';
                        }
                        else {
                            return '<label class="text-danger">ANULADO</label>';
                        }
                    }
                }, {
                    data: function (row) {
                        if (row.estado === '1') {
                            return '<div align="center">\n' +
                                //    '<a href="#"  style="color: green" TITLE="Editar" data-toggle="ajax">\n' +
                                //    '<i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>\n' +
                                '<a href="#" style="color: red" TITLE="Anular" onclick="cambEstadoTipoPaque(' + row.idTipoPaquete + ')">\n' +
                                '<i class="fas fa-lg fa-fw m-r-10 fa-trash"> </i></a>\n' +

                                '</div>';
                        } else {
                            return '<div align="center">\n' +
                                //     '<a href="#" style="color: green" TITLE="Editar" data-toggle="ajax">\n' +
                                //    '<i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>\n' +
                                '<a href="#" style="color: green" TITLE="Activar" onclick="cambEstadoTipoPaque(' + row.idTipoPaquete + ')">\n' +
                                '<i class="fas fa-lg fa-fw m-r-10 fa-check"> </i></a>\n' +
                                '</div>';
                        }
                    }
                }
            ]
        });
    });
    $(function () {
        $('#data-table-fixed-header1').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            responsive: true,
            bAutoWidth: true,
            select: true,
            rowId: 'idTipoProducto',
            dom: 'lBfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            ajax: '{!! route('datatable.listarTipoProducto') !!}',
            columns: [
                {data: 'idTipoProducto', name: 'idTipoProducto'},
                {data: 'nombre', name: 'nombre'},
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
                           //     '<a href="Cliente/' + row.idPersona + '-' + row.dtidDireccionTienda + '/edit" style="color: green" TITLE="Editar" data-toggle="ajax">\n' +
                         //       '<i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>\n' +
                                '<a href="#" style="color: red" TITLE="Anular" onclick="cambEstadoTipoProd(' + row.idTipoProducto + ')">\n' +
                                '<i class="fas fa-lg fa-fw m-r-10 fa-trash"> </i></a>\n' +

                                '</div>';
                        } else {
                            return '<div align="center">\n' +
                            //    '<a href="Cliente/' + row.idPersona + '-' + row.dtidDireccionTienda + '/edit" style="color: green" TITLE="Editar" data-toggle="ajax">\n' +
                             //   '<i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>\n' +
                                '<a href="#" style="color: green" TITLE="Activar" onclick="cambEstadoTipoProd(' + row.idTipoProducto + ')">\n' +
                                '<i class="fas fa-lg fa-fw m-r-10 fa-check"> </i></a>\n' +
                                '</div>';
                        }
                    }
                }
            ]
        });
    });
</script>