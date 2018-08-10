<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/parsley/src/parsley.css" rel="stylesheet"/>
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

<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

<script src="{{ asset('js/js_ajax/producto.js') }}"></script>

<!-- ================== END PAGE LEVEL STYLE ================== -->
<!-- end breadcrumb -->
<div id="response">
    <!-- begin page-header -->
    <h1 class="page-header">Agregar producto
        <small>Aqui puedo agregar un producto</small>
    </h1>
    <!-- final cabecera -->
    <!-- begin panel -->
    <div class="panel panel-inverse" data-sortable-id="form-validation-1">
        <div class=" panel-heading ui-sortable-handle">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                            class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                            class="fa fa-minus"></i></a>
            </div>
            <h4 class="panel-title">Agregar producto</h4>
        </div>
        <div class="panel-body">
            <br>
            <br>
            <br>
            <form method="POST" name="form-wizard" class="form-control-with-bg" id="idFormProducto">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- begin wizard -->
                <div id="wizard">
                    <!-- begin wizard-step -->
                    <ul>
                        <li class="col-md-3 col-sm-3 col-3">
                            <a href="#step-1">
                                <span class="number">1</span>
                                <span class="info text-ellipsis">
						Informacion de producto
					</span>
                            </a>
                        </li>
                        <li class="col-md-3 col-sm-3 col-3">
                            <a href="#step-2">
                                <span class="number">2</span>
                                <span class="info text-ellipsis">
						Informacion por paquete
					</span>
                            </a>
                        </li>
                        <li class="col-md-3 col-sm-3 col-3">
                            <a href="#step-3">
                                <span class="number">3</span>
                                <span class="info text-ellipsis">
						Informacion por unidad
					</span>
                            </a>
                        </li>
                        <li class="col-md-3 col-sm-3 col-3">
                            <a href="#step-4">
                                <span class="number">4</span>
                                <span class="info text-ellipsis">
						Registro completo
					</span>
                            </a>
                        </li>
                    </ul>
                    <!-- end wizard-step -->
                    <!-- begin wizard-content -->
                    <div>
                        <!-- begin step-1 -->
                        <div id="step-1">
                            <!-- begin fieldset -->
                            <fieldset>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-8 -->
                                    <div class="col-md-8 offset-md-2">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">
                                            Informacion
                                            de producto
                                        </legend>
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-2 col-sm-2 col-form-label">Nombre de
                                                producto:</label>
                                            <div class="col-md-4 col-sm-4">
                                                <input class="form-control" type="text" id="nombre" name="nombre"
                                                       data-parsley-group="step-1" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">

                                            <label class="col-md-2 col-sm-2 col-form-label">Tipo de producto
                                                :</label>
                                            <div class="col-md-4 col-sm-4">
                                                <select class="form-control" type="text" id="tipoProducto"
                                                        name="tipoProducto" data-parsley-group="step-1"
                                                        data-parsley-required="true">
                                                    <option selected disabled>Escoja..</option>
                                                    <option>Caramelos</option>
                                                    <option>Galleta</option>
                                                    <option>Gaseosa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                    </div>
                                    <!-- end col-8 -->
                                </div>
                                <!-- end row -->
                            </fieldset>
                            <!-- end fieldset -->
                        </div>
                        <!-- end step-1 -->
                        <!-- begin step-2 -->
                        <div id="step-2">
                            <!-- begin fieldset -->
                            <fieldset>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-8 -->
                                    <div class="col-md-8 offset-md-2">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">
                                            Informacion
                                            de paquete
                                        </legend>
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-2 col-sm-2 col-form-label" for="email">Tipo de paquete
                                                :</label>
                                            <div class="col-md-4 col-sm-4">
                                                <select class="form-control" type="text" id="tipoPaquete"
                                                        name="tipoPaquete"
                                                        data-parsley-required="true" data-parsley-group="step-2">
                                                    <option selected disabled>Escoja..</option>
                                                    <option>Caja</option>
                                                    <option>Paquete</option>
                                                    <option>Tira</option>
                                                    <option>Bolsas</option>
                                                </select></div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-2 col-sm-2 col-form-label">Cantidad de
                                                unidades por paquete:</label>
                                            <div class="col-md-4 col-sm-4">
                                                <input class="form-control" type="number" id="cantidadProductosPaquete"
                                                       name="cantidadProductosPaquete" data-parsley-required="true"
                                                       data-parsley-type="number" data-parsley-group="step-2" min="0"
                                                       onchange="validarEnterosPositivos('cantidadProductosPaquete')">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-2 col-sm-2 col-form-label">Cantidad de
                                                paquetes:</label>
                                            <div class="col-md-4 col-sm-4">
                                                <input class="form-control" type="number" id="cantidadPaquete"
                                                       name="cantidadPaquete" data-parsley-required="true"
                                                       data-parsley-type="number" data-parsley-group="step-2" min="0"
                                                       onchange="validarEnterosPositivos('cantidadPaquete')">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-2 col-sm-2 col-form-label" for="precioCompra">Precio
                                                compra
                                                por
                                                paquete:</label>
                                            <div class="input-group col-md-4 col-sm-4 mb-4">
                                                <div class="input-group-prepend"><span
                                                            class="input-group-text">S/.</span>
                                                </div>
                                                <input type="text" class="form-control" name="precioCompra"
                                                       id="precioCompra" data-parsley-group="step-2"
                                                       onchange="validardecimales('precioCompra',2)">
                                            </div>

                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-2 col-sm-2 col-form-label" for="precioVenta">Precio
                                                venta
                                                por
                                                paquete:</label>
                                            <div class="input-group col-md-4 col-sm-4 mb-4">
                                                <div class="input-group-prepend"><span
                                                            class="input-group-text">S/.</span>
                                                </div>
                                                <input type="text" class="form-control" name="precioVenta"
                                                       id="precioVenta" data-parsley-group="step-2"
                                                       onchange="validardecimales('precioVenta',2);validarEnterosPositivos('precioVenta')">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-2 col-sm-2 col-form-label" for="comisionVenta">Comision
                                                de
                                                venta
                                                para vendedor</label>
                                            <div class="input-group col-md-4 col-sm-4 mb-4">
                                                <div class="input-group-prepend"><span
                                                            class="input-group-text">S/.</span>
                                                </div>
                                                <input type="text" class="form-control" name="comisionVenta"
                                                       id="comisionVenta" data-parsley-group="step-2"
                                                       onchange="validardecimales('comisionVenta',2);validarEnterosPositivos('comisionVenta')">
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                    </div>
                                    <!-- end col-8 -->
                                </div>
                                <!-- end row -->
                            </fieldset>
                            <!-- end fieldset -->
                        </div>
                        <!-- end step-2 -->
                        <!-- begin step-3 -->
                        <div id="step-3">
                            <!-- begin fieldset -->
                            <fieldset>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-8 -->
                                    <div class="col-md-8 offset-md-2">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">
                                            Informacion
                                            por unidad
                                        </legend>
                                        <div class="row form-group row m-b-15">
                                            <label class="col-md-2 col-sm-2 col-form-label" for="email">Cantidad stock
                                                por
                                                unidad</label>
                                            <div class="col-md-4 col-sm-4">
                                                <input class="form-control" type="number" id="cantidadStockUnidad"
                                                       name="cantidadStockUnidad" data-parsley-group="step-3"
                                                       data-parsley-type="number"
                                                       onchange="validarEnterosPositivos('cantidadStockUnidad')">
                                            </div>
                                        </div>
                                        <div class="row form-group row m-b-15">
                                            <label class="col-md-2 col-sm-2 col-form-label" for="precioCompraUnidad">Precio
                                                compra:</label>
                                            <div class="input-group col-md-4 col-sm-4 m-b-4">
                                                <div class="input-group-prepend"><span
                                                            class="input-group-text">S/.</span>
                                                </div>
                                                <input type="text" class="form-control" id="precioCompraUnidad"
                                                       name="precioCompraUnidad" data-parsley-group="step-3"
                                                       onchange="validardecimales('precioCompraUnidad',2);validarEnterosPositivos('precioCompraUnidad')""
                                                >
                                            </div>
                                        </div>
                                        <div class="row form-group row m-b-15">
                                            <label class="col-md-2 col-sm-2 col-form-label" for="precioVentaUnidad">Precio
                                                venta:</label>
                                            <div class="input-group col-md-4 col-sm-4 m-b-4">
                                                <div class="input-group-prepend"><span
                                                            class="input-group-text">S/.</span>
                                                </div>
                                                <input type="text" class="form-control" name="precioVentaUnidad"
                                                       id="precioVentaUnidad" data-parsley-group="step-3"
                                                       onchange="validardecimales('precioVentaUnidad',2);validarEnterosPositivos('precioVentaUnidad')"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-8 -->
                                </div>
                                <!-- end row -->
                            </fieldset>
                            <!-- end fieldset -->
                        </div>
                        <!-- end step-3 -->
                        <!-- begin step-4 -->
                        <div id="step-4">
                            <div class="jumbotron m-b-0 text-center">
                                <h2 class="text-inverse">Registro finalizado</h2></br>
                                <p>
                                    <button class="btn btn-primary btn-lg" id="guardar">Proceder con el registro
                                    </button>
                                </p>
                            </div>
                        </div>
                        <!-- end step-4 -->
                    </div>
                    <!-- end wizard-content -->
                </div>
                <!-- end wizard -->
            </form>
        </div>
    </div>
</div>
<!-- end panel -->
<script>
    App.setPageTitle('Agregar productos | ARPEMAR SAC');
    App.restartGlobalFunction();
    $.when(
        $.getScript('../assets/plugins/parsley/dist/parsley.js'),
        $.getScript('../assets/plugins/jquery-smart-wizard/src/js/jquery.smartWizard.js'),
        $.getScript('../assets/js/demo/form-wizards-validation.demo.min.js'),
        $.Deferred(function (deferred) {
            $(deferred.resolve);
        })
    ).done(function () {
        FormWizardValidation.init();
    });
    $.getScript('../assets/plugins/bootstrap-daterangepicker/moment.js').done(function () {
        $.when(
            $.getScript('../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'),
            $.getScript('../assets/plugins/jquery-tag-it/js/tag-it.min.js'),
            $.getScript('../assets/plugins/bootstrap-daterangepicker/daterangepicker.js'),
            $.getScript('../assets/plugins/select2/dist/js/select2.min.js'),
            $.getScript('../assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js'),
            $.getScript('../assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js'),
            $.getScript('../assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js'),
            $.getScript('../assets/plugins/clipboard/clipboard.min.js'),
            <!---->
            $.getScript('../assets/plugins/parsley/dist/parsley.js'),
            $.getScript('../assets/plugins/highlight/highlight.common.js'),
            $.getScript('../assets/js/demo/render.highlight.js'),
            $.Deferred(function (deferred) {
                $(deferred.resolve);
            })
        ).done(function () {
            $.getScript('../assets/js/demo/form-plugins.demo.min.js').done(function () {
                FormPlugins.init();
            });
        });
    });
</script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->

<!-- ================== END PAGE LEVEL JS ================== -->
