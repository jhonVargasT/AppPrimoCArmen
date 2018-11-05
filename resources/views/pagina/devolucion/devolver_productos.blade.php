<script src="{{ asset('js/js_ajax/devolucion.js') }}"></script>
<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script src="{{ asset('typeahead/bootstrap3-typeahead.js') }}"></script>
<div id="response">
    <div class="row">
        <h1 class="page-header">Devolucion
            <small>Aqui se registra las devoluciones hechas por los clientes</small>
        </h1>
        <!-- begin col-6 -->
        <div class="col-lg-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                           data-click="panel-expand"><i
                                    class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                           data-click="panel-reload"><i
                                    class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                           data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title">Devolucion

                    </h4>

                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body">
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-1">Nombre producto</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control m-b-5" placeholder="Escriba nombre producto"
                                   id="nombreproducto">
                            <script>
                                $('#nombreproducto').typeahead({
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
                        <label class="col-form-label col-md-2">Cantidad de unidades</label>
                        <div class="col-md-1">
                            <input type="number" class="form-control m-b-5" placeholder="nro unidades" min="1"
                                   id="cantuni">
                        </div>
                        <label class="col-form-label col-md-1">Motivo devolucion</label>
                        <div class="col-md-4">
                            <textarea id="motivo" class="form-control" rows="4"></textarea>
                        </div>
                        <a href="javascript:;" class="btn btn-large btn-icon  btn-success" title="Agregar devolucion"
                           onclick="agregarDevolucion()"><i
                                    class="fa fa-plus-circle"></i></a>
                    </div>
                    <br>
                    <div id="data-table-fixed-header_wrapper"
                         class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="data-table-fixed-header"
                                       class="table table-striped table-responsive table-bordered dataTable no-footer dtr-inline"
                                       role="grid"
                                       aria-describedby="data-table-fixed-header_info" width="100%">
                                    <tbody>
                                    </tbody>
                                    <thead>
                                    <tr role="row">

                                        <th class="text-nowrap sorting text-center" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending"
                                            style="width: 10%;; min-width: 20px;">
                                            Codigo
                                        </th>

                                        <th class="text-nowrap sorting text-center" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending"
                                            style="width: 100%;; min-width: 160px;">
                                            Nombre producto
                                        </th>
                                        <th class="text-nowrap sorting text-center" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending"
                                            style="width: 60%;; min-width: 60px;">
                                            Cant unidades
                                        </th>
                                        <th class="text-nowrap sorting text-center" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending"
                                            style="width: 100%;; min-width: 300px;">
                                            Motivo
                                        </th>
                                        <th class="text-nowrap sorting text-center" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending"
                                            style="width: 100%;; min-width: 40px;">
                                            Fecha devolucion
                                        </th>
                                        <th class="text-nowrap sorting text-center" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending"
                                            style="width: 100%;; min-width: 40px;">
                                            Estado
                                        </th>
                                        <th class="text-nowrap sorting text-center" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending"
                                            style="width: 100%;; min-width: 140px;">
                                            Opciones
                                        </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end panel-body -->

            </div>
            <!-- end panel -->

        </div>
        <!-- end col-6 -->

    </div>
</div>
<!---------------Inicio modal------------->
<!-------------Fin modal--------------->
<script>
    App.setPageTitle('Devoluciones | ARPEMAR SAC');
    App.restartGlobalFunction();
    $(function () {
        $('#data-table-fixed-header').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            select: true,
            rowId: 'id',
            aaSorting: [[0, "desc"]],
            ajax: '{!! route('datatable.listarDevoluciones') !!}',
            columns: [
                {data: 'iddevolucion', name: 'iddevolucion'},
                {data: 'nombre', name: 'nombre'},
                {data: 'cantidadUnidades', name: 'cantidadUnidades'},
                {data: 'motivo', name: 'motivo'},
                {data: 'fechaCreacion', name: 'fechaCreacion'},
                {
                    data: function (row) {
                        if (row.devuelto === '1') {
                            return '<label class="text-success">Devuelto</label>';
                        }
                        else {
                            return '<label class="text-danger">No devuelto</label>';
                        }
                    }
                },
                {
                    data: function (row) {
                        if (row.estado === '1') {
                            if (row.devuelto === '1') {
                                return '<div align="center">\n' +
                                    '<a href="#" style="color: blue" TITLE="Click para cangear producto" onclick="cambiar(' + row.iddevolucion + ',0)">\n' +
                                    '<i class="fas fa-lg fa-fw m-r-10 fa-exchange-alt "> </i></a>\n' +
                                    '<a href="#" style="color: red" TITLE="Eliminar" onclick="eliminar(' + row.iddevolucion + ',0)">\n' +
                                    '<i class="fas fa-lg fa-fw  fa-trash "> </i></a>\n' +
                                    '<a href="/devolucionespd/' + row.iddevolucion + '" class="btn btn-link"  title="Imprimir nota devolucion" >' +
                                    '<i  style="color: green" class=" fas fa-lg fa-fw  fa-print"></i></a>' +
                                    '</div>';
                            }
                            else {
                                return '<div align="center">\n' +
                                    '<a href="#" style="color: blue" TITLE="Click para cangear producto" onclick="cambiar(' + row.iddevolucion + ',0)">\n' +
                                    '<i class="fas fa-lg fa-fw m-r-10 fa-exchange-alt "> </i></a>\n' +
                                    '<a href="#" style="color: red" TITLE="Eliminar" onclick="eliminar(' + row.iddevolucion + ',0)">\n' +
                                    '<i class="fas fa-lg fa-fw  fa-trash "> </i></a>\n' +
                                    '</div>';
                            }

                        } else {
                            return '<div align="center">\n' +
                                '<a href="#" style="color: blue" TITLE="Click para cangear producto" onclick="cambiar(' + row.iddevolucion + ',0)">\n' +
                                '<i class="fas fa-lg fa-fw m-r-10 fa-exchange-alt"> </i></a>\n' +
                                '<a href="#" style="color: green" TITLE="Activar" onclick="eliminar(' + row.iddevolucion + ',1)">\n' +
                                '<i class="fas fa-lg fa-fw m-r-10 fa-check"> </i></a>\n' +
                                '</div>';
                        }
                    }
                }

            ]
        });
    });


</script>