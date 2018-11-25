<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="../assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="../assets/plugins/DataTables/extensions/FixedColumns/css/fixedColumns.bootstrap.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<link href="../assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css"
      rel="stylesheet"/>

<link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"/>
<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet"/>
<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet"/>
<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script src="{{ asset('typeahead/bootstrap3-typeahead.js') }}"></script>
<script src="{{ asset('js/js_ajax/producto.js') }}"></script>
<script src="{{ asset('js/js_ajax/tienda.js') }}"></script>


<!-- ================== END PAGE LEVEL STYLE ================== -->


<!---------->
<div id="response">
    <h1 class="page-header">Tienda
        <small>Aqui puedo vender los productos en la tienda</small>
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
            <h4 class="panel-title">Tienda</h4>
        </div>

        <div class="panel-body">
            <div class="col-md-12 " align="center">
                <div class="form-group row m-b-15">
                    <input id="idtienda" name="idtienda" hidden>
                    <input id="idpersona" name="idpersona" hidden>
                    <input id="tipousuario" name="tipousuario" hidden>
                    <label class="col-form-label col-md-3 text-left">DNI :</label>
                    <div class="col-md-9">
                        <input id="dni" onkeypress="if(event.keyCode == 13) autoCompletar()" name="dni" type="number"
                               class="form-control m-b-5" placeholder="Ingresa Dni">
                    </div>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-form-label col-md-3 text-left">Nombres y apellidos</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control m-b-5 typeahead" id="nombresapellidos"
                               name="nombresapellidos" onkeypress="if(event.keyCode == 13) completarNombresApellidos()"
                        >
                        <script>
                            $('#nombresapellidos').typeahead({
                                name: 'data',
                                displayKey: 'name',
                                source: function (query, process) {
                                    $.ajax({
                                        url: "/buscarporcliente",
                                        type: 'GET',
                                        data: 'query=' + query,
                                        dataType: 'JSON',
                                        async: 'false',
                                        success: function (data) {
                                            bondObjs = {};
                                            bondNames = [];
                                            $.each(data, function (i, item) {
                                                bondNames.push({id: item.idPersona, name: item.nombres});
                                                bondObjs[item.id] = item.idPersona;
                                                bondObjs[item.name] = item.nombres;
                                            });
                                            process(bondNames);
                                        }
                                    });
                                }
                            }).on('typeahead:selected', function (even, datum) {
                                $("#nombresapellidos").val(bondObjs[datum.id]);//IMPRIMIR EL ID DEL RESULTADO SELECCIONADO EN UN INPUT
                            });
                        </script>
                    </div>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-form-label col-md-3 text-left">Nombre tienda</label>
                    <div class="col-md-9">

                        <input type="text" class="form-control m-b-5 typeahead" id="nombretienda" name="nombretienda"
                               onkeypress="if(event.keyCode == 13) completarTienda()"
                        >
                        <script>
                            $('#nombretienda').typeahead({
                                name: 'data',
                                displayKey: 'name',
                                source: function (query, process) {
                                    $.ajax({
                                        url: "/buscarportienda",
                                        type: 'GET',
                                        data: 'query=' + query,
                                        dataType: 'JSON',
                                        async: 'false',
                                        success: function (data) {
                                            bondObjs = {};
                                            bondNames = [];
                                            $.each(data, function (i, item) {
                                                bondNames.push({id: item.idPersona, name: item.nombreTienda});
                                                bondObjs[item.id] = item.idPersona;
                                                bondObjs[item.name] = item.nombreTienda;
                                            });
                                            process(bondNames);
                                        }
                                    });
                                }
                            }).on('typeahead:selected', function (even, datum) {
                                $("#nombretienda").val(bondObjs[datum.id]);//IMPRIMIR EL ID DEL RESULTADO SELECCIONADO EN UN INPUT
                            });
                        </script>
                    </div>
                </div>

                <div class="form-group row m-b-15">
                    <label class="col-form-label col-md-3 text-left">Direccion tienda</label>
                    <div class="col-md-9">
                        <select id="direcciones" class=" form-control" onmouseover="llenarDireccion();activarBotonAnadirProducto()">
                            <option>
                                Seleccione
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-form-label col-md-3 text-left">Tipo usuario</label>
                    <div class="col-md-9 text-left">
                        <label class="col-form-label " id="tipousu"></label>
                    </div>
                </div>

            </div>

            <div class=".row.row-space-2 .p-2 disabled" align="center">

                <a href="#modal-dialog" class="btn btn-link btn-sm btn-primary disabled " onclick="resetearModal()"
                   data-toggle="modal"
                   id="anadirproducto">
                    <i class="fas fa-lg fa-fw m-r-10 fa-plus-circle "></i>
                    Añadir producto
                </a>

            </div>

            <br>

            <div id="data-table-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="data-table-fixed-header"
                               class="table table-striped  table-responsive table-bordered dataTable no-footer dtr-inline"
                               role="grid"
                               aria-describedby="data-table-fixed-header_info" width="100%">
                            <tbody>
                            </tbody>
                            <thead>
                            <tr role="row">
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="min-width: 30px;">
                                    Codigo
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%;; min-width: 187px;">
                                    Nombre producto
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%;; min-width: 30px;">
                                    Cant caja
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%;; min-width: 30px;">
                                    Total paquete
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%;; min-width: 30px;">
                                    cant unidad
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1"
                                    aria-label="Rendering engine: activate to sort column ascending"
                                    style="width: 100%;; min-width: 30px;">
                                    Total unidades
                                </th>
                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="width: 100%;; min-width: 30px;">
                                    Monto total
                                </th>
                                <th class="text-nowrap sorting align-items-center" tabindex="0"
                                    aria-controls="data-table-fixed-header"
                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                    style="width: 100%;; min-width: 80px; ">
                                    Opciones
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12" align="right">
                <label class="col-form-label ">Op gravadas: S/. <label class="col-form-label "
                                                                       id="totalproducto">0.00 </label> </label>
            </div>
            <div class="col-md-12" align="right">
                <label class="col-form-label ">I.G.V : S/. <label class="col-form-label "
                                                                  id="igv">0.00 </label> </label>
            </div>
            <div class="col-md-12" align="right">
                <label class="col-form-label "> total : S/. <label class="col-form-label "
                                                                   id="total">0.00 </label> </label>
            </div>
            <div class="col-md-12" align="center" id="opc">
                <a href="/reportevendedor" class="btn btn-danger" data-toggle="ajax">
                    <i class="fas fa-lg fa-fw m-r-10 fa-times-circle"></i>
                    Cancelar</a>
                <button href="javascript:;" class="btn btn-success " onclick="enviarPedido()" id="enviarpedido">
                    <i class="fas fa-lg fa-fw m-r-10 fa-paper-plane"> </i>Enviar
                </button>
            </div>
            <br>
            <div class="col-md-12" align="center" id="impirmir">

            </div>

        </div>
    </div>
    <!---adicionar stock--->
    <div class="modal fade" id="modal-dialog">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Añadir producto al carrito</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <div class="row form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="nombre_producto"> <strong> Nombre producto
                                </strong></label>
                        <div class="col-md-7 col-sm-7">
                            <input type="text" class="form-control m-b-12 typeahead" id="id_producto"
                                   name="id_producto" hidden
                            >
                            <input type="text" class="form-control m-b-12 typeahead" id="nombre_producto"
                                   onkeypress="if(event.keyCode == 13) buscarProductoNombre()"
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
                    </div>
                    <div id="promociones">

                    </div>
                    <div class="row form-group m-b-15 ">
                        <div class="col-md-4 col-sm-4 col-form-label">
                            <label class=col-form-label" for="numero_paquetes"> <strong>Numero de
                                    cajas  </strong></label>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input id="numero_paquetes" type="number" class="form-control m-b-1 "
                                   data-parsley-type="number" onchange="mostrarMonto()" value="0" min="0" readonly/>
                        </div>
                        <label class="col-form-label text-left" for="totpaque">Total :</label>
                        <label class="col-form-label text-left" id="totpaque"></label><label
                                class="col-form-label text-left">S./</label>
                    </div>
                    <div class="row form-group  m-b-15">
                        <div class="col-md-4 col-sm-4 col-form-label">
                            <label class="col-form-label" for="numero_unidades"> <strong>Numero de
                                    unidades  </strong></label>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input id="numero_unidades" type="number" class="form-control m-b-5"
                                   data-parsley-type="number" value="0" onchange="mostrarMonto()" min="0" readonly/>
                        </div>
                        <label class="col-form-label text-left" for="totunu">Total :</label>
                        <label class="col-form-label text-left" id="totunu"> </label><label
                                class="col-form-label text-left">S./</label>
                    </div>
                    <div class="row form-group row m-b-15">
                        <div class="col-md-4 col-sm-4 col-form-label">
                            <label class=" col-form-label text-left" for="sumtotales"> <strong>Sum
                                    totales
                                     </strong></label>
                        </div>
                        <label class="col-form-label text-right" id="sumtotales"></label><label
                                class="col-form-label text-left">S./</label>
                    </div>

                    <div class="bg-orange-lighter">
                        <div class="row form-group row m-b-15 ">
                            <label class="col-md-12 col-form-label text-center"><h4><u> <strong> Informacion del
                                            producto </strong></u></h4>
                            </label>
                        </div>

                        <div class="row form-group row m-b-15">
                            <label class="col-form-label text-right" for="nompro">&nbsp;&nbsp;&nbsp;Nombre producto
                                :</label>
                            <label class="col-form-label text-left" id="nompro"
                                   name="nompro"> </label>
                        </div>
                        <div class="row form-group row m-b-15">
                            <label class="col-form-label text-right" for="tippro">&nbsp;&nbsp;&nbsp;Tipo producto
                                :</label>
                            <label class="col-form-label text-left" id="tippro" name="tippro"></label>
                        </div>
                        <div class="row form-group row m-b-15">
                            <label class="col-form-label text-right" for="tippa">&nbsp;&nbsp;&nbsp;Tipo caja
                                :</label>
                            <label class="col-form-label text-left" id="tippa" name="tippa"></label>
                        </div>
                        <div class="row form-group row m-b-15">
                            <label class="col-form-label text-right" for="capa">&nbsp;&nbsp;&nbsp;Cant unid x caja
                                :</label>
                            <label class=" col-form-label text-left" id="capa" name="capa"></label>
                        </div>
                    </div>


                    <div class="bg-green-lighter">
                        <div class="row form-group row m-b-15 ">
                            <label class="col-md-12 col-form-label text-center"><h4><u><strong> Stock del
                                            producto </strong> </u></h4>
                            </label>
                        </div>
                        <div class="row form-group row m-b-15">
                            <label class="col-form-label text-left">&nbsp;&nbsp;&nbsp;Caja :</label>
                        </div>
                        <div class="row form-group row m-b-15">
                            <label class="col-form-label text-right" for="cantidadpa">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cantidad
                                :</label>
                            <label class="col-form-label text-left" id="cantidadpa"
                                   name="cantidadpa"> </label>
                            <label class="col-form-label text-left" for="preciopa">Precio c/u
                                :</label>
                            <label class=" col-form-label text-left" id="preciopa"
                                   name="preciopa"> </label>
                        </div>
                        <div class="row form-group row m-b-15">
                            <label class="col-form-label text-right">&nbsp;&nbsp;&nbsp;Unidad :</label>
                        </div>
                        <div class="row form-group row m-b-15">
                            <label class="col-form-label text-right" for="cantidadun">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cantidad
                                :</label>
                            <label class="col-form-label text-left" id="cantidadun"
                                   name="cantidadun"> </label>
                            <label class="col-form-label text-left" for="precioun">Precio c/u
                                :</label>
                            <label class="col-form-label text-left" id="precioun"
                                   name="precioun"> </label>
                        </div>
                        <hr>
                    </div>


                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-lg fa-fw m-r-10 fa-times-circle"></i>
                        Cancelar</a>
                    <a href="javascript:;" class="btn btn-success disabled" id="enviar" onmouseover="activarBoton()"
                       onclick="anadirProductoATabla()" data-dismiss="modal">
                        <i class="fas fa-lg fa-fw m-r-10 fa-shopping-cart"> </i>Agregar carrito</a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end panel -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->

<script>
    App.setPageTitle('Vender| ARPEMAR SAC');
    App.restartGlobalFunction();

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
    $.getScript('../assets/plugins/bootstrap-daterangepicker/moment.js').done(function () {
        $.when(
            $.getScript('../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'),
            $.getScript('../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js'),
            $.getScript('../assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js'),
            $.Deferred(function (deferred) {
                $(deferred.resolve);
            })
        ).done(function () {
            $.getScript('../assets/js/demo/form-plugins.demo.min.js').done(function () {
                FormPlugins.init();
            });
        });
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
</script>
<!-- =====