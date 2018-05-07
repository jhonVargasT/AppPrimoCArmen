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

<script src="{{ asset('js/js_ajax/cliente.js') }}"></script>
<!-- ================== END PAGE LEVEL STYLE ================== -->
<div id="response">

    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Agregar cliente
        <small>Aqui puedo agregar un cliente</small>
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
            <h4 class="panel-title">Agregar cliente</h4>
        </div>
        <div class="panel-body">
            <!-- begin wizard-form -->
            <form method="POST" name="form-wizard" class="form-control-with-bg" id="idFormCliente">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- begin wizard -->
                <div id="wizard">
                    <!-- begin wizard-step -->
                    <ul>
                        <li class="col-md-3 col-sm-4 col-6">
                            <a href="#step-1">
                                <span class="number">1</span>
                                <span class="info text-ellipsis">
						Informacion personal
					</span>
                            </a>
                        </li>
                        <li class="col-md-3 col-sm-4 col-6">
                            <a href="#step-2">
                                <span class="number">2</span>
                                <span class="info text-ellipsis">
						Informacion de contacto
					</span>
                            </a>
                        </li>
                        <li class="col-md-3 col-sm-4 col-6">
                            <a href="#step-3">
                                <span class="number">3</span>
                                <span class="info text-ellipsis">
						Informacion de tienda
					</span>
                            </a>
                        </li>
                        <li class="col-md-3 col-sm-4 col-6">
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
                                            personal
                                        </legend>
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Nombres <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="nombres" id="nombres"
                                                       data-parsley-group="step-1"
                                                       data-parsley-required="true" class="form-control"/>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Apellidos <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="apellidos" id="apellidos"
                                                       data-parsley-group="step-1"
                                                       data-parsley-required="true" class="form-control"/>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row  m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Cumpleaños
                                                <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="datepicker-autoClose"
                                                       placeholder="clic aqui" name="fechaNacimiento">
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Dni <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="dni" class="form-control" id="dni"
                                                       data-parsley-group="step-1" data-parsley-required="true"/>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Provincia <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="provincia" class="form-control" id="provincia"
                                                       data-parsley-group="step-1" data-parsley-required="true"/>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Distrito <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="distrito" class="form-control" id="distrito"
                                                       data-parsley-group="step-1" data-parsley-required="true"/>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Direccion <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="direccion" class="form-control" id="direccion"
                                                       data-parsley-group="step-1" data-parsley-required="true"/>
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
                                    <div class="col-md-8 md-offset-2">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">
                                            Informacion
                                            de contacto
                                        </legend>
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Numero de celular <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="number" name="nroCelular" data-parsley-group="step-2"
                                                       data-parsley-required="true" data-parsley-type="number"
                                                       class="form-control" id="nroCelular"/>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Email <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="email" name="correo" class="form-control" id="correo"
                                                       data-parsley-group="step-2" data-parsley-required="true"
                                                       data-parsley-type="email"/>
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
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Ingresa
                                            informacion de tienda
                                        </legend>

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Nombre de tienda<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="tnombreTienda" class="form-control"
                                                       data-parsley-group="step-3" data-parsley-required="true"
                                                       data-parsley-type="alphanum" id="nombreTienda"/>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">R.U.C<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="ruc" class="form-control" id="ruc"
                                                       data-parsley-group="step-3" data-parsley-required="true"
                                                       data-parsley-type="alphanum"/>
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Numero de telefono<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="number" name="ttelefono" class="form-control"
                                                       data-parsley-group="step-3" data-parsley-required="true"
                                                       data-parsley-type="alphanum"/>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div id="dir">
                                            <div class="form-group row m-b-10">
                                                <label class="col-md-3 col-form-label text-md-right">Distrito<span
                                                            class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="text" id="dtdistrito" class="form-control"
                                                           name="dtdistrito"
                                                           data-parsley-group="step-3" data-parsley-required="true"
                                                           data-parsley-type="alphanum"/>
                                                </div>
                                            </div>
                                            <div class="form-group row m-b-10">
                                                <label class="col-md-3 col-form-label text-md-right">Provincia<span
                                                            class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="text" id="dtprovincia" class="form-control"
                                                           name="dtprovincia"
                                                           data-parsley-group="step-3" data-parsley-required="true"
                                                           data-parsley-type="alphanum"/>
                                                </div>
                                            </div>
                                            <div class="form-group row m-b-10">

                                                <label class="col-md-3 col-form-label text-md-right">Direccion
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" id="dtnombreCalle" class="form-control"
                                                           name="dtnombreCalle"
                                                           data-parsley-group="step-3" data-parsley-required="true"/>
                                                </div>
                                            </div>
                                            <div class="form-group row m-b-10">
                                                <label style="color: #0a8cbd"
                                                       class="col-md-3 col-form-label text-md-right">
                                                    <a onclick="return agregardireccion(event);" class="btn btn-link"
                                                       data-toggle="modal">
                                                        <i class="fas fa-lg fa-fw m-r-10 fa-plus "></i>
                                                        Agregar direccion
                                                    </a> <span class="text-danger">*</span></label>
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
            <!-- end wizard-form -->
        </div>
    </div>
</div>
<!-- end panel -->
<script>
    App.setPageTitle('Agregar cliente | ARPEMAR SAC');
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

</script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<!-- ================== END PAGE LEVEL JS ================== -->