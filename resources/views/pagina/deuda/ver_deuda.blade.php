<script src="{{ asset('js/js_ajax/ver_deuda.js') }}"></script>
<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script src="{{ asset('typeahead/bootstrap3-typeahead.js') }}"></script>
<div id="response">
    <div class="row">
        <h1 class="page-header">Lista de deudas
            <small>Aqui se puede visualizar las deudas del cliente</small>
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
                    <h4 class="panel-title">lista deudas

                    </h4>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body">
                    <div class="form-group row m-b-15">
                        <span class="col-sm-1 col-form-label">Id persona</span>
                        <div class="col-sm-3">
                            <label class="col-sm-12 col-form-label">{{$persona[0]->idPersona}}</label>
                        </div>
                        <span class="col-sm-1 col-form-label">Nombre</span>
                        <div class="col-sm-3">
                            <label class="col-sm-12 col-form-label">{{$persona[0]->nombres}}</label>
                        </div>
                        <span class="col-sm-1 col-form-label">Apellidos</span>
                        <div class="col-sm-3">
                            <label class="col-sm-12 col-form-label">{{$persona[0]->apellidos}}</label>
                        </div>
                        <span class="col-sm-1 col-form-label">DNI o RUC</span>
                        <div class="col-sm-3">
                            <label class="col-sm-12 col-form-label">{{$persona[0]->dni}}</label>
                        </div>
                        <span class="col-sm-1 col-form-label">Numero celular</span>
                        <div class="col-sm-3">
                            <label class="col-sm-12 col-form-label">{{$persona[0]->nroCelular}}</label>
                        </div>
                        <span class="col-sm-1 col-form-label">Correo</span>
                        <div class="col-sm-3">
                            <label class="col-sm-12 col-form-label">{{$persona[0]->correo}}</label>
                        </div>
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
                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 30%; min-width: 100%;text-align: center">Opciones
                                        </th>
                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 10%; min-width: 10%;text-align: center">Seleccionar
                                        </th>
                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 100%; min-width:100px;text-align: center">Id Pedido
                                        </th>

                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 100%; min-width: 100%;text-align: center">Fecha de Compra
                                        </th>
                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 100%; min-width: 100%;text-align: center">Fecha de entrega
                                        </th>

                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 100%; min-width: 100%;text-align: center">monto total
                                        </th>
                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 200px; min-width: 200px;text-align: center">Pagado
                                        </th>
                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 80px; min-width: 80px;text-align: center">Saldo
                                        </th>


                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th colspan="6"></th>
                                        <th class="text-amber" valign="top">Total Deuda:</th>
                                        <th>
                                            <label class=" col-form-label" id="total_deuda"></label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="6"></th>
                                        <th class="text-green" valign="top">Total pagara:</th>
                                        <th>
                                           <label class=" col-form-label" id="totalpago">0.00</label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="6"></th>
                                        <th class="text-red" valign="top">Total sobrante:</th>
                                        <th>
                                            <label class=" col-form-label" id="total_sobrante">0.00</label>
                                        </th>
                                    </tr>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                <div class="col-md-12" align="center" id="opc">
                    <a href="/deuda" class="btn btn-danger" data-toggle="ajax">
                        <i class="fas fa-lg fa-fw m-r-10 fa-times-circle"></i>
                        Cancelar</a>
                    <button href="javascript:;" class="btn btn-success " onclick="pagar()" id="enviarpedido" disabled>
                        <i class="fas fa-lg fa-fw m-r-10 fa-paper-plane"> </i>pagar
                    </button>
                </div>
                <br>

                <br>
            </div>
            <!-- end panel-body -->

        </div>
        <!-- end panel -->

    </div>
    <!-- end col-6 -->
    <div class="modal fade" id="modal-dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detalle del pedido</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="form-inline">
                    <h4><label class="col-md-12 col-sm-12 col-form-label" for="numero_pedido"> <strong>Numero de pedido
                                :
                            </strong></label></h4>
                    <h5><label class="text-left " id="numero_pedido">
                        </label></h5>
                </div>
                <div class="modal-body">
                    <div id="data-table-fixed-header_wrapper"
                         class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="data-table-fixed-header2"
                                       class="table table-striped  table-responsive table-bordered dataTable no-footer dtr-inline"
                                       role="grid"
                                       aria-describedby="data-table-fixed-header_info" width="100%">
                                    <tbody>
                                    </tbody>
                                    <thead>
                                    <tr role="row">
                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 100%;; min-width: 100%;">
                                            Nombre producto
                                        </th>

                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 100%;; min-width: 20px;">
                                            Cant paquete
                                        </th>
                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="width: 100%;; min-width: 20px;">
                                            Cant unidad
                                        </th>

                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-success" data-dismiss="modal"
                       onclick="cerrarModal()">Aceptar</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!---------------Inicio modal------------->
<!-------------Fin modal--------------->
<script>
    App.setPageTitle('Deudas | ARPEMAR SAC');
    App.restartGlobalFunction();
    $(function () {
        var tot=number_format(parseFloat('{{$persona[0]->tot}}', 2).toFixed(1), 2);

        $('#total_deuda').text(tot);

      $('#data-table-fixed-header').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
         //  serverSide: true,
            select: true,
            rowId: 'id',
            aaSorting: [[0, "desc"]],
            dom: 'lBfrtip',
            responsive: true,
            bAutoWidth: true,
            buttons: [
                'excel', 'pdf'
            ],
            ajax: '/listarDedudasPersona/{{$persona[0]->idPersona}}',
            columns: [
                {
                    data: function (row) {
                        return '<th>' +
                            '<a href="#modal-dialog" class="btn btn-link" data-toggle="modal" title="Ver productos" onclick="llenarVerProductos(' + row.idPedido + ')">' +
                            '<i class="fas fa-lg fa-fw  fa-eye text-green"></i></a>' +
                            '</th> ';

                    }
                },
                {
                    data: function (row) {
                        return '<div align="center" >' +
                            '<input  type="checkbox" name="check_' + row.idPedido + '" id="check_' + row.idPedido + '" onclick="agregarPagar(' + row.idPedido + ',' + row.saldo + ')">' +
                            '</div> ';

                    }
                },
                {data: 'idPedido', name: 'idPedido'},
                {data: 'fechaCreacion', name: 'fechaCreacion'},
                {data: 'fechaEntrega', name: 'fechaEntrega'},
                {
                    data: function (row) {
                        return '<div align="center" >' +
                            ''+number_format(parseFloat(row.montototal, 2).toFixed(1), 2)+'' +
                            '</div> ';

                    }
                },
                {
                    data: function (row) {
                        return '<div align="center" >' +
                            ''+number_format(parseFloat(row.pago, 2).toFixed(1), 2)+'' +
                            '</div> ';

                    }
                },
                {
                    data: function (row) {
                        return '<div align="center" >' +
                            ''+number_format(parseFloat(row.saldo, 2).toFixed(1), 2)+'' +
                            '</div> ';

                    }
                },


            ]
        });

    });


</script>