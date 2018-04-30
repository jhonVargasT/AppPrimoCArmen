<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="../assets/plugins/DataTables/extensions/FixedColumns/css/fixedColumns.bootstrap.min.css" rel="stylesheet"/>
<!-- ================== END PAGE LEVEL STYLE ================== -->


<h1 class="page-header">Clientes
    <small>Aqui puedo agregar clientes, eliminarlos o editarlos...</small>
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
        <h4 class="panel-title">Clientes</h4>
    </div>

    <div class="panel-body">
        <div class=".row.row-space-2 .p-2">
            <a href="/agrCli" data-toggle="ajax" class="btn btn-sm btn-primary">
                <i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i>
                Agregar clientes
            </a>
        </div>
        <br>
        <div id="data-table-fixed-header_wrapper" class="  dataTables_wrapper form-inline dt-bootstrap no-footer">
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
                            <th>Vargas Trauco, Jhon Anllinson</th>
                            <th>72978792</th>
                            <th>Vargas Trauco, Jhon Anllinson</th>
                            <th>72978792</th>
                            <th>10729787928</th>
                            <th>jr.sociego 450 Chachapoyas Amazonas</th>
                            <th>ÑuxtuSoft</th>
                            <th>Ate-jr.sociego 450 Chachapoyas Amazonas</th>
                            <th>
                                <div align="center">
                                    <a href="" style="color: red" TITLE="editar">
                                        <i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>
                                    <a href=" " style="color: green" title="Eliminar">
                                        <i class="fas fa-lg fa-fw m-r-10 fa-trash-alt"></i>
                                    </a>
                                </div>
                            </th>
                        </tr>
                        <tr class="gradeX odd" role="row">
                            <th>Maslucan Ramirez, Elizabeth</th>
                            <th>959025041</th>
                            <th>jhonvargast@gmail.com</th>
                            <th>559578987</th>
                            <th>105595789878</th>
                            <th>jr.las lomas 350 Lima-Lima</th>
                            <th>Bodega Doñita</th>
                            <th>Miraflores - jr.las lomas 350</th>
                            <th>
                                <div align="center">
                                    <a href="" style="color: red" TITLE="editar">
                                        <i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>
                                    <a href=" " style="color: green" title="Eliminar">
                                        <i class="fas fa-lg fa-fw m-r-10 fa-trash-alt"></i>
                                    </a>
                                </div>

                            </th>
                        </tr>

                        </tbody>
                        <thead>
                            <tr role="row">

                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 100%;; min-width: 187px;">
                                Nombres y apellidos
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 100%;; min-width: 187px;">
                                Telefono
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending"
                                style="width: 100%;; min-width: 187px;">
                                correo
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                style="width: 100%;; min-width: 242px;">
                                Dni
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                style="width: 100%;; min-width: 220px;">
                                Ruc
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                                style="width: 100%;; min-width: 159px;">
                                Direccion personal
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                                style="width: 100%;; min-width: 159px;">Nombre tienda
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                style="width: 100%;; min-width: 117px;">
                                Direccion tienda
                            </th>
                            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                style="width: 100%;; min-width: 117px;">
                                Opciones
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
        </div>
    </div>
</div>
<!-- end panel -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script>
    App.setPageTitle('Productos | ARPEMAR SAC');
    App.restartGlobalFunction();
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
</script>
<!-- ================== END PAGE LEVEL JS ================== -->