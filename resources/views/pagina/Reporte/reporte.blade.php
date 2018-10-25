<script language="JavaScript" type="text/javascript" src="../assets/reporte.js"></script>
<script src="{{ asset('js/js_ajax/reporte.js') }}"></script>
<script src="{{ asset('js/js_ajax/reporte_vendedor.js') }}"></script>

<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-red">
            <div class="stats-icon"><i class="fa fa-desktop"></i></div>
            <div class="stats-info">
                <h4>TOTAL EN CAJA/MES</h4>
                <p id="cajames">0</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-aqua">
            <div class="stats-icon"><i class="fa fa-desktop"></i></div>
            <div class="stats-info">
                <h4>TOTAL EN CAJA/DIA</h4>
                <p id="cajadia">0</p>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-orange">
            <div class="stats-icon"><i class="fa fa-link"></i></div>
            <div class="stats-info">
                <h4>TOTAL PRODUCTOS VENDIDOS </h4>
                <p id="provendi">
                    0.00
                </p>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
                <h4>TOTAL CLIENTES</h4>
                <p id="cantcliente">0</p>
            </div>

        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-orange-lighter">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
                <h4> PRODUCTO MAS VENDIDO</h4>
                <p id="productoVendido">
                    null
                </p>
            </div>

        </div>
    </div>
    <!-- end col-3 -->
</div>

<h1 class="page-header">Reporte general
    <small>reporte general...</small>
</h1>
<!-- end page-header -->

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
        <h4 class="panel-title">Reporte general</h4>
    </div>
    <div class="panel-body">

        <div id="data-table-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table id="data-table-fixed-header"
                           class="table table-striped table-responsive table-bordered dataTable no-footer dtr-inline"
                           role="grid"
                           aria-describedby="data-table-fixed-header_info">
                        <tbody>
                        </tbody>
                        <thead>
                        <tr role="row">
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 20%; min-width: 100px;text-align: center">nro Boleta
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 20%; min-width: 100px;text-align: center">nro Pedido
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 100%; min-width: 100px;text-align: center">
                                Cliente o razon social
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 100%; min-width: 100px;text-align: center">
                                Dni o Ruc
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                style="width: 100%; min-width: 60px;text-align: center">
                                Telefono
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                style="width: 100%; min-width: 300px; text-align: center">
                                Direccion fiscal
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                style="width: 100%; min-width: 117px;text-align: center">
                                Fecha de boleta
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                style="width: 100%; min-width: 40px;text-align: center">
                                Op. Gravada
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                style="width: 100%; min-width: 40px;text-align: center">
                                Igv
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                style="width: 100%; min-width: 40px;text-align: center">
                                Total
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                style="width: 100%; min-width: 100px;text-align: center">
                                Estado
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                style="width: 100%; min-width: 40px;text-align: center">
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
<script>
    App.setPageTitle('Productos | ARPEMAR SAC');
    App.restartGlobalFunction();
    $(function () {
        $('#data-table-fixed-header').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            select: true,
            rowId: 'id',
            aaSorting: [[0, "desc"]],
            ajax: '/obetenerReporteAdministrador/0/0/0',
            columns: [
                {data: 'nroboleta', name: 'nroboleta'},
                {data: 'idPedido', name: 'idPedido'},
                {data: 'raz', name: 'raz'},
                {data: 'ruc', name: 'ruc'},
                {data: 'nroCelular', name: 'nroCelular'},
                {data: 'direccion', name: 'direccion'},
                {data: 'fechaCreacion', name: 'fechaCreacion'},
                {data: 'costoBruto', name: 'costoBruto'},
                {data: 'impuesto', name: 'impuesto'},
                {data: 'totalPago', name: 'totalPago'},
                {
                    data: function (row) {
                        if (row.entregado === '1') {
                            return '<div class="text-success" >Entregado</div>';
                        }
                        else {
                            return '<div class="text-danger" >No entregado</div>';
                        }
                    }
                },
                {
                    data: function (row) {
                        if (row.entregado === '1') {
                            return '<th">' +
                                '<a href="/factura/' + row.idPedido + '" class="btn btn-link"  title="Imprimir factura electronica" >' +
                                '<i  style="color: green" class=" fas fa-lg fa-fw  fa-print"></i></a>'
                                '</th> ';
                        }
                        else {
                            return '<th>' +
                                '<a href="#modal-dialog" class="btn btn-link" data-toggle="modal" title="Enviar factura" onclick="enviarfactura(' + row.idPedido + ')">' +
                                '<i class="fas fa-lg fa-fw  fa-paper-plane"></i></a>' +
                                '</th> ';
                        }
                    }
                }
            ]
        });
    });
</script>
<!-- end panel -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script>
    App.setPageTitle('Reporte administrador | ARPEMAR SAC');
    App.restartGlobalFunction();
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
    });
</script>
<!-- ================== END PAGE LEVEL JS ================== -->