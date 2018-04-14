<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
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
<!-- ================== END PAGE LEVEL STYLE ================== -->
<script language="JavaScript" type="text/javascript" src="../assets/pedido.js"></script>
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

        <form  action="/" method="POST">
            <div class="row col-sm-12 col-xs-12 col-md-12">
                <div class="form-group row col-sm-4 col-xs-4 col-md-4">
                    <div class="col-md-6 row inline">
                        <label>Opciones de busqueda: </label>
                    </div>
                    <div class="col-sm-6 col-xs-6 col-md-6  inline">
                        <div class="form-check">
                            <input type="checkbox" name="clientecheck" id="clientecheck"/>
                            <label class="form-check-label" for="clientecheck"> Cliente </label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="productocheck" id="productocheck"/>
                            <label class="form-check-label" for="productocheck"> Producto </label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="distritocheck" id="distritocheck"/>
                            <label> Distrito </label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="estadocheck" id="estadocheck"/>
                            <label> Estado </label>
                        </div>

                    </div>
                </div>
                <div class="col-sm-8 col-xs-8 col-md-8 row inline" id="busqueda">
                    <div class="form-group  col-sm-4 col-xs-4 col-md-4" id="Fecha" >
                        <label class=" col-form-label text-md-left">Fecha </label>
                        <input type="text" class="form-control" id="datepicker-autoClose" placeholder="clic aqui">
                    </div>
                </div>
            </div>


            <div class=" row form-group col-sm-12 col-xs-12 col-md-12">
                <div class="col-sm-5 col-xs-5 col-md-5"></div>
                <div class="form-group row col-md-1 col-sm-1">
                    <a href="/prod" data-toggle="ajax" class="btn btn-danger">
                        <i class="fas fa-lg fa-fw m-r-8 fa-eraser "></i>
                        Limpiar campos
                    </a>
                </div>
                <div class="col-md-1 col-sm-1"></div>
                <div class="form-group row col-md-1 col-sm-1">
                    <button type="submit" class="btn btn-success"><i class="fas fa-lg fa-fw m-r-10 fa-search-plus"></i>Buscar
                    </button>
                </div>
            </div>

        </form>
        <div id="data-table-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <div class="col-sm-6">
                    <div class="dataTables_length" id="data-table-fixed-header_length">
                        <label>Show
                            <select name="data-table-fixed-header_length" aria-controls="data-table-fixed-header"
                                    class="form-control input-sm">
                                <option value="20">20
                                </option>
                                <option value="40">40
                                </option>
                                <option value="60">60
                                </option>
                            </select> entries
                        </label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="data-table-fixed-header_filter" class="dataTables_filter">
                        <label>Search:
                            <input type="search" class="form-control input-sm" placeholder=""
                                   aria-controls="data-table-fixed-header">
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="data-table-fixed-header"
                           class="table table-striped table-responsive table-bordered dataTable no-footer dtr-inline"
                           role="grid"
                           aria-describedby="data-table-fixed-header_info">
                        <tbody>
                        <tr class="gradeX odd" role="row">
                            <th>Jhon vargas</th>
                            <th>959025041</th>
                            <th>Ñuxtu-soft, Chachapoyas - jr sociego 450</th>
                            <th>Paquete</th>
                            <th>Galleta oreo</th>
                            <th>20</th>
                            <th> 05/04/2018</th>
                            <th style="text-align: center"><a  href="javascript:;" id="#add-without-image" onclick="cambiarEstado(event)" href="" data-toggle="ajax"><i  style="color: red" class="fas fa-lg fa-fw m-r-10 fa-circle"></i> </a>  </th>
                            <th>s./ 420</th>
                        </tr>
                        <tr class="gradeX odd" role="row">
                            <th>Jhon vargas</th>
                            <th>959025041</th>
                            <th>Ñuxtu-soft, Chachapoyas - jr sociego 450</th>
                            <th>Paquete</th>
                            <th>Galleta oreo</th>
                            <th>20</th>
                            <th> 05/04/2018</th>
                            <th style="text-align: center"><a href="#modal-dialog" class="btn btn-link" data-toggle="modal"> <i style="color: green" class="fas fa-lg fa-fw m-r-10 fa-circle"></i>
                                </a></th>

                            <th>s./ 420</th>
                        </tr>
                        <tr class="gradeX odd" role="row">
                            <th>Jhon vargas</th>
                            <th>959025041</th>
                            <th>Ñuxtu-soft, Chachapoyas - jr sociego 450</th>
                            <th>Paquete</th>
                            <th>Galleta oreo</th>
                            <th>20</th>
                            <th> 05/04/2018</th>
                            <th style="text-align: center"><a href="#modal-dialog" class="btn btn-link" data-toggle="modal"><i style="color: red" class="fas fa-lg fa-fw m-r-10 fa-circle"> </i>
                                </a></th>
                            <th>s./ 420</th>
                        </tr>
                        <tr class="gradeX odd" role="row">
                            <th>Jhon vargas</th>
                            <th>959025041</th>
                            <th>Ñuxtu-soft, Chachapoyas - jr sociego 450</th>
                            <th>Paquete</th>
                            <th>Galleta oreo</th>
                            <th>20</th>
                            <th> 05/04/2018</th>
                            <th style="text-align: center"><a href="#modal-dialog" class="btn btn-link" data-toggle="modal"> <i style="color: orange" class="fas fa-lg fa-fw m-r-10 fa-circle"></i> </a></th>
                            <th>s./ 420</th>
                        </tr>
                        </tbody>
                        <thead>
                        <tr role="row">

                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 100%; min-width: 100px;text-align: center">
                                Cliente
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                style="width: 100%; min-width: 60px;text-align: center">
                                Telefono
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                style="width: 100%; min-width: 300px; text-align: center">
                                Tienda y direccion
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                                style="width: 100%; min-width: 40px;text-align: center">
                                Unidad
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                                style="width: 100%; min-width: 70px;text-align: center">
                                Producto
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                style="width: 100%; min-width: 40px;text-align: center">
                                Cantidad
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                style="width: 100%; min-width: 117px;text-align: center">
                                Fecha de entrega
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                style="width: 100%; min-width: 40px;text-align: center">
                                Estado
                            </th>

                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                style="width: 100%; min-width: 40px;text-align: center">
                                Total
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="data-table-fixed-header_info" role="status" aria-live="polite">
                        Showing 1 to 20 of 57 entries
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="data-table-fixed-header_paginate">
                        <ul class="pagination">
                            <li class="paginate_button previous disabled" id="data-table-fixed-header_previous"><a
                                        href="#" aria-controls="data-table-fixed-header" data-dt-idx="0" tabindex="0">Previous</a>
                            </li>
                            <li class="paginate_button active"><a href="#" aria-controls="data-table-fixed-header"
                                                                  data-dt-idx="1" tabindex="0">1</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="data-table-fixed-header"
                                                            data-dt-idx="2" tabindex="0">2</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="data-table-fixed-header"
                                                            data-dt-idx="3" tabindex="0">3</a></li>
                            <li class="paginate_button next" id="data-table-fixed-header_next"><a href="#"
                                                                                                  aria-controls="data-table-fixed-header"
                                                                                                  data-dt-idx="4"
                                                                                                  tabindex="0">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="  col-sm-12 col-xs-12 col-md-12">
                <dl class=" row dl-horizontal">
                    <div class="  col-sm-2 col-xs-2 col-md-2">
                        <dt class="text-inverse">Leyenda para estado:</dt>
                    </div>
                    <div class="  col-sm-3 col-xs-3 col-md-3">
                        <dd><i style="color: red" class="fas fa-lg fa-fw m-r-10 fa-circle"> </i>Pedido no empaquetado</dd>
                        <dd><i style="color: orange" class="fas fa-lg fa-fw m-r-10 fa-circle"> </i>Empaquetado</dd>
                        <dd><i style="color: yellow" class="fas fa-lg fa-fw m-r-10 fa-circle"> </i>No entregado</dd>
                        <dd><i style="color: green;" class="fas fa-lg fa-fw m-r-10 fa-circle"> </i>Entregado</dd>
                    </div>
                </dl>
            </div>
            <br>
            <br>

        </div>
    </div>
</div>
<!-- end panel -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script>
    App.setPageTitle('Pedidos | ARPEMAR SAC');
    App.restartGlobalFunction();

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
        $.Deferred(function( deferred ){
            $(deferred.resolve);
        })
    ).done(function() {
        Notification.init();
    });
</script>
<!-- ================== END PAGE LEVEL JS ================== -->