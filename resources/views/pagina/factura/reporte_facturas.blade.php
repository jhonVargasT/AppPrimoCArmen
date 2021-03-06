<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script src="{{ asset('js/js_ajax/cliente.js') }}"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<!-- ================== END PAGE LEVEL STYLE ================== -->

<div id="response">
    <h1 class="page-header">Factura/Boleta
        <small>Aqui puedo agregar Facturas o boletas</small>
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
            <h4 class="panel-title">Reporte facturas/boletas</h4>
        </div>
        <div class="panel-body">
            <div class=" row col-sm-12 col-xs-12 col-md-12" align="center">

                <a href="/nuevafactura" data-toggle="ajax" class="btn btn-success"><i
                            class="fas fa-lg fa-fw m-r-10 fa-clipboard"></i>
                    Nueva factura/boleta
                </a>
            </div>
            <br>
            <div id="data-table-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div id="data-table-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table id="data-table-fixed-header"
                                   class="table table-striped  table-bordered dataTable no-footer dtr-inline"
                                   role="grid"
                                   aria-describedby="data-table-fixed-header_info" width="100%">
                                <tbody>
                                </tbody>
                                <thead>
                                <tr role="row">
                                    <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                        rowspan="1" colspan="1"
                                        aria-label="Rendering engine: activate to sort column ascending"
                                        style="width: 100%; min-width: 10px;text-align: center">Nro pedido
                                    </th>
                                    <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                        rowspan="1" colspan="1"
                                        aria-label="Rendering engine: activate to sort column ascending"
                                        style="width: 20%; min-width: 20px;text-align: center">Nro documento
                                    </th>
                                    <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                        rowspan="1" colspan="1"
                                        aria-label="Rendering engine: activate to sort column ascending"
                                        style="width: 20%; min-width: 20px;text-align: center">Dni/Ruc
                                    </th>
                                    <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                        rowspan="1" colspan="1"
                                        aria-label="Rendering engine: activate to sort column ascending"
                                        style="width: 100%; min-width: 100px;text-align: center">
                                        Cliente o razon social
                                    </th>
                                    <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                        rowspan="1" colspan="1"
                                        aria-label="Rendering engine: activate to sort column ascending"
                                        style="width: 100%; min-width: 150px;text-align: center">
                                        Direcion
                                    </th>
                                    <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                                        style="width: 100%; min-width: 60px;text-align: center">
                                        Fecha envio
                                    </th>
                                    <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                        rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 100%; min-width: 100px; text-align: center">
                                        Vendedor
                                    </th>
                                    <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                        rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 100%; min-width: 117px;text-align: center">
                                        Fecha de boleta
                                    </th>
                                    <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                        rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 100%; min-width: 40px;text-align: center">
                                        Op. Gravada
                                    </th>
                                    <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                        rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 100%; min-width: 40px;text-align: center">
                                        Igv
                                    </th>
                                    <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                        rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 100%; min-width: 40px;text-align: center">
                                        Total
                                    </th>
                                    <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                        rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 100%; min-width: 40px;text-align: center">
                                        Tipo Doc
                                    </th>
                                    <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"
                                        rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending"
                                        style="width: 100%; min-width: 40px;text-align: center">
                                        Opciones
                                    </th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end panel -->
<script>
    App.setPageTitle('Facturas | ARPEMAR SAC');
    App.restartGlobalFunction();
    $(function () {
        $('#data-table-fixed-header').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
            dom: 'lBfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            //   serverSide: true,
            select: true,
            responsive: true,
            bAutoWidth: true,
            rowId: 'id',
            columnDefs: [
                {
                    "targets": 0,
                    "className": "text-center",
                },
                {
                    "targets": 1,
                    "className": "text-center",
                },
                {
                    "targets": 2,
                    "className": "text-center",
                },
                {
                    "targets": 5,
                    "className": "text-center",
                },
                {
                    "targets": 7,
                    "className": "text-center",
                },
                {
                    "targets": 8,
                    "className": "text-center",
                },
                {
                    "targets": 9,
                    "className": "text-center",
                },
                {
                    "targets": 10,
                    "className": "text-center",
                },
                {
                    "targets": 11,
                    "className": "text-center",
                },
                {
                    "targets": 12,
                    "className": "text-center",
                },
            ],
            aaSorting: [[0, "desc"]],
            ajax: '{!! route('datatable.facturas') !!}',

            columns: [
                {data: 'idPedido', name: 'idPedido'},
                {data: 'nroboleta', name: 'nroboleta'},
                {data: 'dnioruc', name: 'dnioruc'},
                {data: 'clienterazonsocial', name: 'clienterazonsocial'},
                {data: 'direccion', name: 'direccion'},
                {data: 'fechaEntrega', name: 'fechaEntrega'},
                {data: 'vendedor', name: 'vendedor'},
                {data: 'pedidoentreg', name: 'pedidoentreg'},
                {data: 'costoBruto', name: 'costoBruto'},
                {data: 'impuesto', name: 'impuesto'},
                {data: 'totalPago', name: 'totalPago'},
                {data: 'documento', name: 'documento'},
                {
                    data: function (row) {
                        if (row.entregado === '1') {
                            return '<th">' +
                                '<a href="/factura/' + row.idPedido + '" class="btn btn-link"  title="Imprimir factura electronica" >' +
                                '<i  style="color: green" class=" fas fa-lg fa-fw  fa-print"></i></a>'
                            '</th> ';
                        }
                    }
                }
            ]
        });
    });
</script>



