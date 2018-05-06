<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="../assets/plugins/DataTables/extensions/FixedColumns/css/fixedColumns.bootstrap.min.css" rel="stylesheet"/>
<!-- ================== END PAGE LEVEL STYLE ================== -->


<h1 class="page-header">Clientes
    <small>Aqui puedo agregar clientes, eliminarlos o editarlos...</small>
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
        <h4 class="panel-title">Clientes</h4>
    </div>

    <div class="panel-body">
        <div class=".row.row-space-2 .p-2">
            <a href="/create-cliente/create" data-toggle="ajax" class="btn btn-sm btn-primary">
                <i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i>
                Agregar clientes
            </a>
        </div>
        <br>
        <div id="data-table-fixed-header_wrapper" class="  dataTables_wrapper form-inline dt-bootstrap no-footer">
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
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 100%;; min-width: 187px;">
                                Nombres y apellidos
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 100%;; min-width: 187px;">
                                Telefono
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 100%;; min-width: 187px;">
                                Correo
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                style="width: 100%;; min-width: 242px;">
                                DNI
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                style="width: 100%;; min-width: 242px;">
                                RUC
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                                style="width: 100%;; min-width: 159px;">
                                Direccion Personal
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                                style="width: 100%;; min-width: 159px;">
                                Nombre Tienda
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                                style="width: 100%;; min-width: 159px;">
                                Direccion Tienda
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                                style="width: 100%;; min-width: 159px;">
                                Estado
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
            ajax: '{!! route('datatable.clientes') !!}',
            columns: [
                {data: 'pnombres', name: 'pnombres'},
                {data: 'pnroCelular', name: 'pnroCelular'},
                {data: 'pcorreo', name: 'pcorreo'},
                {data: 'pdni', name: 'pdni'},
                {data: 'pruc', name: 'pruc'},
                {data: 'pdireccion', name: 'pdireccion'},
                {data: 'tnombreTienda', name: 'tnombreTienda'},
                {data: 'dtnombreCalle', name: 'dtnombreCalle'},
                {
                    data: function (row) {
                        if (row.pestado === '1') {
                            return '<label class="text-success">ACTIVO</label>';
                        }
                        else if (row.pestado === '0') {
                            return '<label class="text-danger">ANULADO</label>';
                        }
                    }
                }
            ]
        });
    });
</script>

{!! Html::script('sweetalert2//sweetalert2.js') !!}
{!! Html::css('sweetalert2//sweetalert2.js') !!}