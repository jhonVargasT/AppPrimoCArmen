<script language="JavaScript" type="text/javascript" src="../assets/reporte.js"></script>
<script src="{{ asset('js/js_ajax/reporte.js') }}"></script>
<script src="{{ asset('js/js_ajax/reporte_vendedor.js') }}"></script>

<div class="row">

<h1 class="page-header">Reporte facturas
    <small>reporte facturas...</small>
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
        <h4 class="panel-title">Reporte facturas</h4>
    </div>
    <div class="panel-body">
        <div class=" row col-sm-12 col-xs-12 col-md-12" align="center">

            <a href="/nuevafactura" data-toggle="ajax" class="btn btn-success"><i
                        class="fas fa-lg fa-fw m-r-10 fa-cart-plus"></i>
                Nueva factura
            </a>
        </div>
        <br>
        <br>

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
                                style="width: 20%; min-width: 100px;text-align: center">Nro
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 20%; min-width: 100px;text-align: center">Dni/Ruc
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 100%; min-width: 100px;text-align: center">
                                Cliente o razon social
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 100%; min-width: 100px;text-align: center">
                                Direcion
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                style="width: 100%; min-width: 60px;text-align: center">
                                Fecha envio
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                style="width: 100%; min-width: 300px; text-align: center">
                                Vendedor
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
            ajax: '{!! route('datatable.facturas') !!}',
            columns: [
                {data: 'nroboleta', name: 'nroboleta'},
                {data: 'dnioruc', name: 'dnioruc'},
                {data: 'clienterazonsocial', name: 'clienterazonsocial'},
                {data: 'direccion', name: 'direccion'},
                {data: 'fechaEntrega', name: 'fechaEntrega'},
                {data: 'vendedor', name: 'vendedor'},
                {data: 'pedidoentreg', name: 'pedidoentreg'},
                {data: 'costoBruto', name: 'costoBruto'},
                {data: 'impuesto', name: 'impuesto'},
                {data: 'totalPago', name: 'totalPago'},
                {data: 'entregado', name: 'entregado'},
                {data: 'entregado', name: 'entregado'}
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