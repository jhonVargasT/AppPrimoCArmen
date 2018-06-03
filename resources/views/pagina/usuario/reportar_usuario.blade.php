<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="../assets/plugins/DataTables/extensions/FixedColumns/css/fixedColumns.bootstrap.min.css" rel="stylesheet"/>

<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

<script src="{{ asset('js/js_ajax/usuario.js') }}"></script>
<!-- ================== END PAGE LEVEL STYLE ================== -->
<div id="response">
    <h1 class="page-header">Usuarios
        <small>Aqui puedo agregar usuarios, eliminarlos o editarlos...</small>
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
            <h4 class="panel-title">Usuarios</h4>
        </div>

        <div class="panel-body">
            <div class=".row.row-space-2 .p-2">
                <a href="/Usuario/create" data-toggle="ajax" class="btn btn-sm btn-primary">
                    <i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i>
                    Agregar Usuario
                </a>
            </div>
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
                                    style="width: 100%;; min-width: 187px;">
                                    Nombres y apellidos
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%;; min-width: 187px;">
                                    Telefono
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%;; min-width: 187px;">
                                    Correo
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="width: 100%;; min-width: 242px;">
                                    DNI
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 100%;; min-width: 159px;">
                                    Direccion Personal
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 100%;; min-width: 159px;">
                                    Usuario
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 100%;; min-width: 159px;">
                                    Estado
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 100%;; min-width: 159px;">
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
    $(function () {
        $('#data-table-fixed-header').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            select: true,
            rowId: 'id',
            ajax: '{!! route('datatable.usuarios') !!}',
            columns: [
                {data: 'pnombres', name: 'pnombres'},
                {data: 'pnroCelular', name: 'pnroCelular'},
                {data: 'pcorreo', name: 'pcorreo'},
                {data: 'pdni', name: 'pdni'},
                {data: 'pdireccion', name: 'pdireccion'},
                {data: 'uusuario', name: 'uusuario'},
                {
                    data: function (row) {
                        if (row.uestado === '1') {
                            return '<label class="text-success">ACTIVO</label>';
                        }
                        else {
                            return '<label class="text-danger">ANULADO</label>';
                        }
                    }
                },
                {
                    data: function (row) {
                        if (row.uestado === '1') {
                            return '<div align="center">\n' +
                                '<a href="#" style="color: red" TITLE="Anular" onclick="actualizarUsuario(' + row.idUsuario + ',' + row.idPersona + ',0)">\n' +
                                '<i class="fas fa-lg fa-fw m-r-10 fa-times"> </i></a>\n' +
                                '<a href="Usuario/' + row.idUsuario + '/edit" style="color: green" TITLE="Editar" data-toggle="ajax">\n' +
                                '<i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>\n' +
                                '</div>';
                        } else {
                            return '<div align="center">\n' +
                                '<a href="#" style="color: red" TITLE="Activar" onclick="actualizarUsuario(' + row.idUsuario + ',' + row.idPersona + ',1)">\n' +
                                '<i class="fas fa-lg fa-fw m-r-10 fa-plus"> </i></a>\n' +
                                '<a href="Usuario/' + row.idUsuario + '/edit" style="color: green" TITLE="Editar" data-toggle="ajax">\n' +
                                '<i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>\n' +
                                '</div>';
                        }
                    }
                }
            ]
        });
    });
</script>