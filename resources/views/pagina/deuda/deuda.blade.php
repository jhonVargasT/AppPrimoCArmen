<style>
    table.dataTable.dataTable_width_auto {
        width: auto;
    }
</style>
<script src="{{ asset('js/js_ajax/devolucion.js') }}"></script>
<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script src="{{ asset('typeahead/bootstrap3-typeahead.js') }}"></script>
<div id="response">
    <div class="row">
        <h1 class="page-header">Deudas
            <small>Aqui se registra las deudas de los clientes</small>
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
                    <h4 class="panel-title">Deudas

                    </h4>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body">

                    <br>
                    <div id="data-table-fixed-header_wrapper"
                         class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class=" row">
                            <div class="col-sm-12 table-responsive  ">
                                <table id="data-table-fixed-header"
                                       class="display dataTable_width_auto table table-striped  table-bordered dataTable no-footer dtr-inline"
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
                                            style="min-width: 10%;text-align: center"
                                        >Id cliente
                                        </th>
                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="   min-width: 50%;text-align: center"
                                        >Nombre cliente
                                        </th>

                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="min-width: 20%;text-align: center"
                                        >Nro documento
                                        </th>


                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="min-width: 10%;text-align: center"
                                        >Deuda acumulada
                                        </th>
                                        <th class="text-nowrap sorting" tabindex="0"
                                            aria-controls="data-table-fixed-header"
                                            rowspan="1" colspan="1"
                                            aria-label="Rendering engine: activate to sort column ascending"
                                            style="min-width:10%;text-align: center"
                                        >Opciones
                                        </th>

                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <br>
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
    App.setPageTitle('Deudas | ARPEMAR SAC');
    App.restartGlobalFunction();
    $(function () {
        var table = $('#data-table-fixed-header').DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
              //   serverSide: true,
            select: true,
            rowId: 'id',
            aaSorting: [[0, "desc"]],
            dom: 'lBfrtip',
            responsive: true,
            bAutoWidth: true,
            buttons: [
                'excel', 'pdf'
            ],
            columnDefs: [

                {
                    "targets": 0,
                    "className": "text-center",
                },
                {
                    "targets": 2,
                    "className": "text-center",
                },
                {
                    "targets": 3,
                    "className": "text-center",
                },
                {
                    "targets": 4,
                    "className": "text-center",
                },
            ],
            ajax: '{!! route('datatable.deudas') !!}',
            columns: [
                {data: 'idPersona', name: 'idPersona'},
                {data: 'nom', name: 'nom'},
                {data: 'dni', name: 'dni'},
                {data: 'tot', name: 'tot'},
                {
                    data: function (row) {

                        return '<tr >\n' +
                            '<a   data-toggle="ajax" href="/verdeuda/' + row.idPersona + '" class="btn btn-link"  title="Ver deudas" >' +
                            '<i class="fas fa-lg fa-fw  fa-eye text-success"></i></a>' +
                            '</tr>';

                    }
                }


            ]
        });

        $('#data-table-fixed-header tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $('#button').click(function () {
            table.row('.selected').remove().draw(false);
        });
    });


</script>