<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/jquery-smart-wizard/src/css/smart_wizard.css" rel="stylesheet" />
<link href="../assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

<h1 class="page-header">Agregar usuairo
    <small>Aqui puedo agregar un usuario</small>
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
        <h4 class="panel-title">Agregar usuario</h4>
    </div>
    <div class="panel-body">
        <!-- begin wizard-form -->
        <form action="/" method="POST" name="form-wizard" class="form-control-with-bg">
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
                                    <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Informacion personal</legend>
                                    <!-- begin form-group -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 col-form-label text-md-right">Nombres <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" name="firstname" data-parsley-group="step-1" data-parsley-required="true" class="form-control" />
                                        </div>
                                    </div>
                                    <!-- end form-group -->
                                    <!-- begin form-group -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 col-form-label text-md-right">Apellidos <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" name="lastname"  data-parsley-group="step-1" data-parsley-required="true" class="form-control" />
                                        </div>
                                    </div>
                                    <!-- end form-group -->
                                    <!-- begin form-group -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 col-form-label text-md-right">Cumpleaños<span class="text-danger">&nbsp;</span></label>
                                        <div class="col-md-6">
                                            <div class="row row-space-6">
                                                <div class="col-4">
                                                    <select class="form-control" name="year">
                                                        <option>-- Year --</option>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <select class="form-control" name="month">
                                                        <option>-- Month --</option>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <select class="form-control" name="day">
                                                        <option>-- Day --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end form-group -->
                                    <!-- begin form-group -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 col-form-label text-md-right">Dni <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" name="ic"  class="form-control" data-parsley-group="step-1" data-parsley-required="true" />
                                        </div>
                                    </div>
                                    <!-- end form-group -->
                                    <!-- begin form-group -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 col-form-label text-md-right">Direccion</label>
                                        <div class="col-md-9">
                                            <input type="text" name="address1"  class="form-control m-b-10" />
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
                                    <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Informacion de contacto</legend>
                                    <!-- begin form-group -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 col-form-label text-md-right">Numero de celular <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="number" name="phone"  data-parsley-group="step-2" data-parsley-required="true" data-parsley-type="number" class="form-control" />
                                        </div>
                                    </div>
                                    <!-- end form-group -->
                                    <!-- begin form-group -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 col-form-label text-md-right">Email <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="email" name="email"  class="form-control" data-parsley-group="step-2" data-parsley-required="true" data-parsley-type="email" />
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
                                    <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Selecciona tu ususario y contraseña</legend>
                                    <!-- begin form-group -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 col-form-label text-md-right">Usuario<span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" name="username"  class="form-control" data-parsley-group="step-3" data-parsley-required="true" data-parsley-type="alphanum" />
                                        </div>
                                    </div>
                                    <!-- end form-group -->
                                    <!-- begin form-group -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 col-form-label text-md-right">Contraseña <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="password" name="password"  class="form-control" data-parsley-group="step-3" data-parsley-required="true" />
                                        </div>
                                    </div>
                                    <!-- end form-group -->
                                    <!-- begin form-group -->
                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 col-form-label text-md-right">confirmar contraseña <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="password" name="password2"  class="form-control" data-parsley-group="step-3" data-parsley-required="true" />
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
                            <p><a href="#" class="btn btn-primary btn-lg">Proceder con el registro</a></p>
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



<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script>
    App.setPageTitle('Color Admin | Wizards + Validation');
    App.restartGlobalFunction();

    $.when(
        $.getScript('../assets/plugins/parsley/dist/parsley.js'),
        $.getScript('../assets/plugins/jquery-smart-wizard/src/js/jquery.smartWizard.js'),
        $.getScript('../assets/js/demo/form-wizards-validation.demo.min.js'),
        $.Deferred(function( deferred ){
            $(deferred.resolve);
        })
    ).done(function() {
        FormWizardValidation.init();
    });
</script>
<!-- ================== END PAGE LEVEL JS ================== -->
