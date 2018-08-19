<script language="JavaScript" type="text/javascript" src="../assets/reporte.js"></script>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-red">
            <div class="stats-icon"><i class="fa fa-desktop"></i></div>
            <div class="stats-info">
                <h4>TOTAL INGRESOS MENSUALES</h4>
                <p>3,291,922</p>
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
                <p>589</p>
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
                <p>150</p>
            </div>

        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-lg-3 col-md-6">
        <div class="widget widget-stats bg-grey-darker">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
                <h4> PRODUCTO MAS VENDIDO</h4>
                <p>GALLETAS OREO</p>
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
        <form action="/" method="POST">
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
                            <label> Vendedor </label>
                        </div>

                    </div>
                </div>
                <div class="col-sm-8 col-xs-8 col-md-8 row inline" id="busqueda">
                    <div class="form-group  col-sm-4 col-xs-4 col-md-4" id="Fecha1">
                        <label class=" col-form-label text-md-left">Fecha inicio </label>
                        <input type="text" class="form-control" id="datepicker-autoClose" placeholder="clic aqui">
                    </div>
                    <div class="form-group  col-sm-4 col-xs-4 col-md-4" id="Fecha2">
                        <label class=" col-form-label text-md-left">Fecha fin</label>
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
                <div class="col-md-3 col-sm-3"></div>

            </div>
            <div class="col-sm-12" align="right">
                    <h5>Total ingresos: S./ 250  </h5>
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
                            <th> 0025</th>
                            <th>Jhon vargas</th>
                            <th>959025041</th>
                            <th> 10729787928</th>
                            <th> 72978792</th>
                            <th>Ñuxtu-soft, Chachapoyas - jr sociego 450</th>

                            <th> 05/04/2018</th>

                            <th>s./ 420</th>
                        </tr>
                        <tr class="gradeX odd" role="row">
                            <th> 0025</th>
                            <th>Jhon vargas</th>
                            <th>959025041</th>
                            <th> 10729787928</th>
                            <th> 72978792</th>
                            <th>Ñuxtu-soft, Chachapoyas - jr sociego 450</th>

                            <th> 05/04/2018</th>


                            <th>s./ 420</th>
                        </tr>
                        <tr class="gradeX odd" role="row">
                            <th> 0025</th>
                            <th>Jhon vargas</th>
                            <th>959025041</th>
                            <th> 10729787928</th>
                            <th> 72978792</th>
                            <th>Ñuxtu-soft, Chachapoyas - jr sociego 450</th>

                            <th> 05/04/2018</th>
                            <th>s./ 420</th>
                        </tr>
                        <tr class="gradeX odd" role="row">
                            <th> 0025</th>
                            <th>Jhon vargas</th>
                            <th>959025041</th>
                            <th> 10729787928</th>
                            <th> 72978792</th>
                            <th>Ñuxtu-soft, Chachapoyas - jr sociego 450</th>

                            <th> 05/04/2018</th>
                            <th>s./ 420</th>
                        </tr>
                        </tbody>
                        <thead>
                        <tr role="row">
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                            rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                            style="width: 20%; min-width: 100px;text-align: center">boleta</th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 100%; min-width: 100px;text-align: center">
                                Cliente
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                            rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                            style="width: 100%; min-width: 100px;text-align: center">
                                Ruc
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 100%; min-width: 100px;text-align: center">
                                Dni
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
                                rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                style="width: 100%; min-width: 117px;text-align: center">
                                Fecha de entrega
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

            <br>
            <br>

        </div>
    </div>
</div>
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
        $.Deferred(function( deferred ){
            $(deferred.resolve);
        })
    ).done(function() {
        Notification.init();
    });
</script>
<!-- ================== END PAGE LEVEL JS ================== -->