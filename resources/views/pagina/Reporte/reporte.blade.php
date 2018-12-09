<script language="JavaScript" type="text/javascript" src="../assets/reporte.js"></script>
<script src="{{ asset('js/js_ajax/reporte.js') }}"></script>
<script src="{{ asset('typeahead/bootstrap3-typeahead.js') }}"></script>
<link href="https://code.jquery.com/jquery-3.3.1.js" rel="stylesheet"/>

<link href="plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">


<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

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
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-lg-4">
                <label class="col-form-label text-md-right"> Tipo de reporte
                    :</label>

                <select id="tiporeporte" name="tiporeporte" class=" form-control"
                >
                    <option id="1" selected>PRODUCTOS VENDIDOS</option>
                    <option id="2">GANANCIA POR VENDEDOR</option>
                    <option id="3">PRODUCTOS PEDIDOS POR RUTA</option>
                    <option id="4">MONTO VENIDO POR CLIENTE</option>
                </select>
            </div>
            <div class="col-xs-1 col-sm-1 col-lg-1">
                <label class="col-form-label">Cambiar</label>
                <a href="javascript:;" class="btn btn-large btn-icon  btn-success" title="Cambiar reporte"
                   onclick="cambiarTabla()"><i
                            class="fa fa-check-circle"></i></a>
            </div>
        </div>
        <br>
        <br>
        <div id="data">


            <div class="row form-group">
                <div class="col-xs-4 col-sm-4 col-lg-4">
                    <label class=" col-form-label" for="nombre_producto"> <strong> Nombre producto
                        </strong></label>
                    <input type="text" class="form-control m-b-12 typeahead" id="id_producto"
                           name="id_producto" hidden
                    >
                    <input type="text" class="form-control m-b-12 typeahead" id="nombre_producto"
                           name="nombre_producto"
                    >
                    <script>
                        $('#nombre_producto').typeahead({
                            name: 'data',
                            displayKey: 'name',
                            source: function (query, process) {
                                $.ajax({
                                    url: "/buscarnombre",
                                    type: 'GET',
                                    data: 'query=' + query,
                                    dataType: 'JSON',
                                    async: 'false',
                                    success: function (data) {
                                        bondObjs = {};
                                        bondNames = [];
                                        $.each(data, function (i, item) {
                                            bondNames.push({id: item.idProducto, name: item.nombre});
                                            bondObjs[item.id] = item.idProducto;
                                            bondObjs[item.name] = item.nombre;
                                        });

                                        process(bondNames);
                                    }
                                });
                            }
                        }).on('typeahead:selected', function (even, datum) {
                            $("#id_producto").val(bondObjs[datum.id]);//IMPRIMIR EL ID DEL RESULTADO SELECCIONADO EN UN INPUT
                        });
                    </script>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4">
                    <label class="col-form-label">fecha</label>
                    <div class="input-group input-daterange">
                        <input type="text" class="form-control" name="inicio" id="inicio"
                               placeholder="Fecha inicio">
                        <span class="input-group-addon">a</span>
                        <input type="text" class="form-control" name="final" id="final" placeholder="Fecha fin">
                    </div>
                </div>
                <div class="col-xs-1 col-sm-1 col-lg-1">
                    <label class="col-form-label">Buscar</label>
                    <a href="javascript:;" class="btn btn-large btn-icon  btn-success" title="buscar"
                       onclick="productoIngresos()"><i
                                class="fa fa-search-plus"></i></a>
                </div>
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
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 20%; min-width: 100px;text-align: center">Id producto
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%; min-width: 300px;text-align: center">Nombre
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%; min-width: 100px;text-align: center">
                                    Cantidad paquete vendidas
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%; min-width: 100px;text-align: center">
                                    Monto recaudado paquete
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="width: 100%; min-width: 60px;text-align: center">
                                    Cantidad unidades vendidas
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                    style="width: 100%; min-width: 100px; text-align: center">
                                    Monto recaudado unidades
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                    style="width: 100%; min-width: 100px; text-align: center">
                                    Fecha
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

</div>
<script>
    App.setPageTitle('Productos | ARPEMAR SAC');
    App.restartGlobalFunction();
    /* $(function () {
         var id = 0;
         var fechaini =0;
         var fechafin = 0;
         var url = "/reporteVendedorIngresos/" + id + "/" + fechaini + "/" + fechafin;
         $('#data-table-fixed-header').DataTable({
             language: {
                 "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
             },
             processing: true,
             serverSide: true,
             select: true,
             destroy: true,
             rowId: 'id',
             aaSorting: [[0, "desc"]],
             ajax: url,
             columns: [
                 {data: 'idUsuario', name: 'idUsuario'},
                 {data: 'vendedor', name: 'vendedor'},
                 {data: 'total', name: 'total'},
                 {data: 'opgv', name: 'opgv'},
                 {data: 'gastoprod', name: 'gastoprod'},
                 {data: 'ganancia', name: 'ganancia'},
                 {data: 'fecha', name: 'fecha'},
                 {data: 'lugar', name: 'lugar'},
             ]
         });
     });*/
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