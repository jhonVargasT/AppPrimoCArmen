<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

<!-- end breadcrumb -->
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
        <form class="form-horizontal" data-parsley-validate="true" name="demo-form" novalidate="">
            <div class="row form-group row m-b-15">
                <label class="col-md-2 col-sm-2 col-form-label" for="fullname">Nombre de producto:</label>
                <div class="col-md-4 col-sm-4">
                    <input class="form-control" type="text" id="fullname" name="fullname"
                           data-parsley-required="true">
                </div>
                <label class="col-md-2 col-sm-2 col-form-label" for="email">Tipo de producto :</label>
                <div class="col-md-4 col-sm-4">
                    <select class="form-control" type="text" id="fullname" name="fullname"
                            data-parsley-required="true">
                        <option>Escoja</option>
                    </select>
                </div>
            </div>
            <div class="row form-group row m-b-15">
                <label class="col-md-2 col-sm-2 col-form-label" for="fullname">Cantidad de producto:</label>
                <div class="col-md-4 col-sm-4">
                    <input class="form-control" type="text" id="fullname" name="fullname"
                         data-parsley-required="true"  data-parsley-type="number">
                </div>
                <label class="col-md-2 col-sm-2 col-form-label" for="email">Unidad :</label>
                <div class="col-md-4 col-sm-4">
                    <select class="form-control" type="text" id="fullname" name="fullname"
                            data-parsley-required="true">
                        <option>Escoja</option>
                    </select></div>
            </div>
            <div class="row form-group row m-b-15">
                <label class="col-md-2 col-sm-2 col-form-label" for="email">Fecha de ingreso :</label>
                <div class="col-md-4 col-sm-4">
                    <input type="text" class="form-control" id="datepicker-autoClose" >
                </div>
                <label class="col-md-2 col-sm-2 col-form-label" for="fullname">Precio unitario:</label>
                <div class="input-group col-md-4 col-sm-4 m-b-4">
                    <div class="input-group-prepend"><span class="input-group-text">S/.</span></div>
                    <input type="text" class="form-control" >
                </div>
            </div>
            <div class="form-group row m-b-12">
                <div class="col-md-5 col-sm-5"></div>
                <div class="form-group row col-md-1 col-sm-1">
                    <a href="/prod" data-toggle="ajax" class="btn btn-danger">
                        <i class="fas fa-lg fa-fw m-r-8 fa-times"></i>
                        Cancelar
                    </a>
                </div>
                <div class="col-md-1 col-sm-1"></div>
                <div class="form-group row col-md-1 col-sm-1">
                    <button type="submit" class="btn btn-success"><i class="fas fa-lg fa-fw m-r-10 fa-paper-plane"></i>Enviar
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
<!-- end panel -->
<script>
    App.setPageTitle('Agregar productos | ARPEMAR SAC');
    App.restartGlobalFunction();

    $.getScript('../assets/plugins/bootstrap-daterangepicker/moment.js').done(function() {
        $.when(
            $.getScript('../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'),
            $.getScript('../assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js'),
            $.getScript('../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js'),
            $.getScript('../assets/plugins/masked-input/masked-input.min.js'),
            $.getScript('../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js'),
            $.getScript('../assets/plugins/password-indicator/js/password-indicator.js'),
            $.getScript('../assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js'),
            $.getScript('../assets/plugins/bootstrap-select/bootstrap-select.min.js'),
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
            $.Deferred(function( deferred ){
                $(deferred.resolve);
            })
        ).done(function() {
            $.getScript('../assets/js/demo/form-plugins.demo.min.js').done(function() {
                FormPlugins.init();
            });
        });
    });
</script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->

<!-- ================== END PAGE LEVEL JS ================== -->