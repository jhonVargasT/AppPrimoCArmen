<!DOCTYPE HTML>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>Arpemar S.A.C</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>

    <link href="{{asset('assets/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/plugins/animate/animate.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/default/style.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/default/style-responsive.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/default/theme/default.css')}}" rel="stylesheet" id="theme"/>
    <!-- ================== END BASE CSS STYLE ================== -->
    <link rel="shortcut icon" href="{{asset('/assets/img/logo/icono-arper.jpg')}}">
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{asset('assets/plugins/jquery-jvectormap/jquery-jvectormap.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet"/>
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{asset('assets/plugins/pace/pace.min.js')}}"></script>
    <script src="{{ asset('js/js_ajax/sesiones.js') }}"></script>

    <!-- ================== END BASE JS ================== -->

</head>
<body>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<!-- begin #page-loader -->
<div id="page-loader" class="fade show"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar-default">
        <!-- begin navbar-header -->
        <div class="navbar-header">
            <a class="navbar-brand"><img  src="../assets/img/logo/icono-arper.jpg" width="40px" height="40px"> <b>ARPEMAR</b> SAC </a>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- end navbar-header -->

        <!-- begin header-nav -->
        <ul class="navbar-nav navbar-right">

            <li class="dropdown navbar-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                   ADMINISTRADOR :
                    <img src="{{asset('assets/img/user/user-13.jpg')}}" alt=""/>
                    <span class="d-none d-md-inline" id="usuario"></span> <b class="caret"></b>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#modal-dialog-contra" class="dropdown-item"
                       data-toggle="modal">
                        Cambiar contraseña
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="dropdown-item">Salir</button>
                    </form>
                </div>
            </li>
        </ul>
        <!-- end header navigation right -->
    </div>
    <!-- end #header -->

    <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- begin sidebar user -->
            <!-- begin sidebar nav -->
            <ul class="nav">
                <li class="nav-header"><b>OPCIONES</b></li>
                <li class="has-sub">
                    <a href="/Reportes" data-toggle="ajax">
                        <i class="fas fa-lg fa-fw m-r-10 fa-chart-pie text-red"></i>
                        <span>Reporte</span>
                    </a>
                </li>
                <li class="has-sub">
                    <a href="/facturas" data-toggle="ajax">
                        <i class="fas fa-lg fa-fw m-r-10 fa-calculator text-blue"></i>
                        <span>Facturas/Boletas</span>
                    </a>
                </li>

                <li class="has-sub">
                    <a href="/tienda" data-toggle="ajax">

                        <i class="fas fa-lg fa-fw m-r-10 fa-shopping-basket text-yellow"></i>
                        <span>Tienda</span>
                    </a>
                </li>
                <li class="has-sub">
                    <a href="/Pedidos" data-toggle="ajax">

                        <i class="fas fa-lg fa-fw m-r-10 fa-clipboard text-purple"></i>
                        <span>Pedidos</span>
                    </a>
                </li>
                <li class="has-sub">
                    <a href="/deuda" data-toggle="ajax">
                        <i class="fas fa-lg fa-fw m-r-10 fa-edit text-orange"></i>
                        <span>Deudas</span>
                    </a>
                </li>
                <li class="has-sub">
                    <a href="/devolucion" data-toggle="ajax">

                        <i class="fas fa-lg fa-fw m-r-10 fa-history text-aqua"></i>
                        <span>Devolucion</span>
                    </a>
                </li>

                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret"></b>
                        <i class="fas fa-lg fa-fw m-r-10 fa-database "></i>
                        <span>Administrar datos</span>
                    </a>
                    <ul class="sub-menu">
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret"></b>
                                Menu producto
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/Productos" data-toggle="ajax">
                                        <i class="fas fa-lg fa-fw m-r-10 fa-cubes"></i>
                                        Productos</a>
                                </li>
                                <li>
                                    <a href="/promocion" data-toggle="ajax">
                                        <i class="fas fa-lg fa-fw m-r-10 fa-money-bill-alt"></i>
                                        Promociones </a>
                                </li>
                                <li><a href="/datosadicionales" data-toggle="ajax">
                                        <i class="fas fa-lg fa-fw m-r-10 fa-print"></i>Datos adicionales</a></li>

                            </ul>
                        </li>
                        <li><a href="/Clientes" data-toggle="ajax">
                                <i class="fas fa-lg fa-fw m-r-10 fa-users"></i>Clientes</a></li>
                        <li><a href="/Usuarios" data-toggle="ajax">
                                <i class="fas fa-lg fa-fw m-r-10 fa-user-secret"></i>Usuarios</a></li>
                    </ul>

                </li>


                <!-- begin sidebar minify button -->
                <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                                class="fa fa-angle-double-left"></i></a></li>
                <!-- end sidebar minify button -->
            </ul>
            <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->

    <!-- begin #content -->
    <div id="content" class="content"></div>
    <!-- end #content -->


    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
                class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->
<div class="modal fade" id="modal-dialog-contra">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar contraseña</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">


                <!-- begin form-group -->
                <div class="form-group row m-b-10">
                    <label class="col-md-3 col-form-label text-md-right" for="password">Nueva contraseña <span
                                class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input type="password" name="password" id="password"
                               class="form-control"
                        />
                    </div>
                </div>
                <!-- end form-group -->
                <!-- begin form-group -->
                <div class="form-group row m-b-10">
                    <label class="col-md-3 col-form-label text-md-right" for="password2">Confirmar contraseña
                        <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input type="password" name="password2" id="password2"
                               class="form-control" onmouseover="compararContrasenias()"/>
                    </div>
                </div>
                <div class="form-group row m-b-10" id="aviso">

                </div>
            </div>
            <div class="modal-footer text-center">
                <a href="javascript:;" class="btn btn-danger" data-dismiss="modal" onclick="resetearModal()">
                    <i class="fas fa-lg fa-fw m-r-10 fa-times-circle"></i>
                    Cancelar</a>
                <a href="javascript:;" class="btn btn-success " id="enviar"
                   data-dismiss="modal" onclick="cambiarContrasenia();" onmouseover="compararContrasenias();">
                    <i class="fas fa-lg fa-fw m-r-10 fa-check-circle"> </i>Cambiar</a>
            </div>
        </div>
    </div>
</div>
<!-- ================== BEGIN BASE JS ================== -->
<script src="{{asset('assets/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/plugins/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('assets/js/theme/default.min.js')}}"></script>
<script src="{{asset('assets/js/apps.js')}}"></script>

<!-- ================== END BASE JS ================== -->

<script>
    $.getScript('../assets/plugins/DataTables/media/js/jquery.dataTables.js').done(function () {
        $.when(
            $.getScript('../assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js'),
            $.getScript('../assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js'),
            $.getScript('../assets/js/demo/table-manage-responsive.demo.min.js'),
            $.Deferred(function (deferred) {
                $(deferred.resolve);
            })
        ).done(function () {
            TableManageResponsive.init();
        });
    });
    $(document).ready(function () {
        App.init({
            ajaxMode: true,
            ajaxDefaultUrl: '/Reportes',
            ajaxType: 'get',
            ajaxDataType: 'html'
        });
        obtenerSession();
    });

</script>
</body>
</html>
