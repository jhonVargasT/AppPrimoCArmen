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

<script src="{{ asset('js/js_ajax/usuario.js') }}"></script>

<div id="response">
    <h1 class="page-header">Editar usuairo
        <small>Aqui puedo editar un usuario</small>
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
            <h4 class="panel-title">Editar usuario</h4>
        </div>
        <div class="panel-body">
            <!-- begin wizard-form -->
            <form name="form-wizard" class="form-control-with-bg" id="idFormUsuarioEditar">
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
						Informacion de contacto y comision
					</span>
                            </a>
                        </li>
                        <li class="col-md-3 col-sm-4 col-6">
                            <a href="#step-3">
                                <span class="number">3</span>
                                <span class="info text-ellipsis">
						Cuento de ingreso
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
                                            Informacion personal
                                        </legend>
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Nombres <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="hidden" value="{{$usuario[0]->idUsuario}}" name="idUsuario"
                                                       id="idUsuario"/>
                                                <input type="hidden" value="{{$usuario[0]->idPersona}}"
                                                       name="idPersona"/>
                                                <input type="text" name="nombres" id="nombres"
                                                       data-parsley-group="step-1" data-parsley-required="true"
                                                       class="form-control" value="{{$usuario[0]->pnombres}}"/>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Apellidos <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="apellidos" id="apellidos"
                                                       data-parsley-group="step-1" data-parsley-required="true"
                                                       class="form-control" value="{{$usuario[0]->papellidos}}"/>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row  m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Cumpleaños
                                                <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="datepicker-autoClose"
                                                       placeholder="clic aqui" name="fechaNacimiento"
                                                       value="{{$usuario[0]->pfechaNacimiento}}">
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Dni <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="dni" class="form-control" id="dni"
                                                       data-parsley-group="step-1" data-parsley-required="true"
                                                       value="{{$usuario[0]->pdni}}"/>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Provincia <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="provincia" class="form-control" id="provincia"
                                                       data-parsley-group="step-1" data-parsley-required="true"
                                                       value="{{$usuario[0]->pprovincia}}"/>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Distrito <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="distrito" class="form-control" id="distrito"
                                                       data-parsley-group="step-1" data-parsley-required="true"
                                                       value="{{$usuario[0]->pdistrito}}"/>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Direccion <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="direccion" class="form-control" id="direccion"
                                                       data-parsley-group="step-1" data-parsley-required="true"
                                                       value="{{$usuario[0]->pdireccion}}"/>
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
                                            Informacion de contacto y comision
                                        </legend>
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Numero de celular <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="number" name="nroCelular" data-parsley-group="step-2"
                                                       data-parsley-required="true" data-parsley-type="number"
                                                       class="form-control" id="nroCelular"
                                                       value="{{$usuario[0]->pnroCelular}}"/>
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
                                                       data-parsley-type="email" value="{{$usuario[0]->pcorreo}}"/>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Meta minima<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="number" name="metamini" data-parsley-group="step-2"
                                                       data-parsley-required="true" data-parsley-type="number"
                                                       class="form-control" id="metamini" value="{{$usuario[0]->metaminima}}"/>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-sm-3 col-form-label text-md-right">
                                                porcentaje comision
                                            </label>
                                            <div class="col-md-2 col-sm-2">
                                                <input class="form-control" type="number" id="podesc" name="podesc"
                                                       data-parsley-group="step-2" data-parsley-required="true"
                                                       min="1" max="100" value="{{$usuario[0]->porcentajeDeComision}}">
                                            </div>
                                            <label class="col-md-1 col-sm-1 col-form-label">
                                                %
                                            </label>
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
                                            Selecciona tu ususario y contraseña
                                        </legend>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-sm-3 col-form-label text-md-right" for="tipousuario">Tipo
                                                de usuario
                                                :</label>
                                            <div class="col-md-6 col-sm-6">

                                                <select class="form-control" type="text" id="tipousuario"
                                                        name="tipousuario"
                                                        data-parsley-required="true" data-parsley-group="step-3">
                                                    @if($usuario[0]->tipoUsuario === 1)
                                                        <option selected>Administrador</option>
                                                        <option>Vendedor</option>
                                                    @else
                                                        <option>Administrador</option>
                                                        <option selected>Vendedor</option>
                                                    @endif
                                                </select></div>
                                        </div>
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Usuario<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="usuario" id="usuario" class="form-control"
                                                       data-parsley-group="step-3" data-parsley-required="true"
                                                       data-parsley-type="alphanum" value="{{$usuario[0]->uusuario}}"/>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Contraseña <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="password" name="password" id="password"
                                                       class="form-control" data-parsley-group="step-3"
                                                       data-parsley-required="true" value="{{$usuario[0]->upassword}}"/>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">confirmar contraseña
                                                <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="password" name="password2" id="password2"
                                                       class="form-control" data-parsley-group="step-3"
                                                       data-parsley-required="true" value="{{$usuario[0]->upassword}}"/>
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
                                <h2 class="text-inverse">Edicion finalizado</h2></br>
                                <p>
                                    <button class="btn btn-primary btn-lg" id="editar">Proceder con la edicion
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


<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script>
    App.setPageTitle('Editar usuarios | ARPEMAR SAC');
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
<!-- ================== END PAGE LEVEL JS ================== -->
