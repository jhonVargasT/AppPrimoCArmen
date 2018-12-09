$(document).ready(function () {
    productoMasVendido();
    cantclientes();

    cajaDiaria();
    cajaMensual();
});


function productoMasVendido() {
    "use strict";
    var url = "/obetnerProductoMasVendido";
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data.error === 1) {
                    if (data.nomb === null) {
                        $('#productoVendido').text('no hay ventas');
                    } else {
                        $('#productoVendido').text(data.nomb);
                    }
                }
                else
                    alert('nohay');

            }

        }
    );
}


function cantclientes() {
    "use strict";
    var url = "/obtenerClientes";
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data.error === 1) {
                    if (data.cant === null) {
                        $('#cantcliente').text('no hay ventas');
                    } else {
                        $('#cantcliente').text(data.cant);
                    }
                }
                else
                    alert('nohay');

            }

        }
    );
}

function cajaDiaria() {
    "use strict";
    var url = "/cajaDiaria";
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data.error === 1) {
                    if (data.tot === null) {
                        $('#cajadia').text(0.00);
                    } else {
                        $('#cajadia').text(data.tot);
                    }
                }
                else
                    alert('nohay');

            }

        }
    );
}


function cajaMensual() {
    "use strict";
    var url = "/cajaMensual";
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data.error === 1) {
                    if (data.tot === null) {
                        $('#cajames').text(0.00);
                    } else {
                        $('#cajames').text(data.tot);
                    }
                }
                else
                    alert('nohay');

            }

        }
    );
}

function convertiFecha(dato) {
    var fecha = dato.split('/');
    var res = fecha[2] + '-' + fecha[0] + '-' + fecha[1];
    return res.toString();
}

function llenarVendedores() {
    "use strict";
    var url = "/obtenerVendedores";
    $.ajax({
        type: "GET",
        url: url,
        cache: false,
        dataType: 'json',
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
            var select = $('#vendedores');
            select.find('option').remove();
            select.append('<option id="0">Seleccionar</option>');
            for (var i = 0; i < data.usuario.length; i++) {
                select.append('<option id="' + data.usuario[i].idUsuario + '">' + data.usuario[i].papellidos + ', ' + data.usuario[i].pnombres + '</option>');
            }


        }

    });
}

function cambiarTabla() {
    var dato = $('#tiporeporte').find('option:selected').attr('id');
    console.log(dato);
    html = $("#data").html();
    html = '';
    switch (dato) {
        case '1':
            $('#data').html(html);
            $('#data').html(htmlProductoIngresos());
            break;
        case '2':
            $('#data').html(htmlVendedorIngresos());
            break;
        case '3':
            $('#data').html(html);
            break;
        case '4':
            $('#data').html(html);
            break;
    }
}

function htmlVendedorIngresos() {
    var html = ' <div class="row form-group">\n' +
        '                <div class="col-xs-4 col-sm-4 col-lg-4">\n' +
        '                    <label class="col-form-label">Vendedor</label>\n' +
        '                    <select id="vendedores" name="vendedores" class=" form-control"\n' +
        '                            onmouseover="llenarVendedores()">\n' +
        '                        <option id="0">Seleccionar</option>\n' +
        '                    </select>\n' +
        '\n' +
        '                </div>\n' +
        '                <div class="col-xs-4 col-sm-4 col-lg-4">\n' +
        '                    <label class="col-form-label">fecha</label>\n' +
        '                    <div class="input-group input-daterange">\n' +
        '                        <input type="text" class="form-control" name="inicio" id="inicio"\n' +
        '                               placeholder="Fecha inicio">\n' +
        '                        <span class="input-group-addon">a</span>\n' +
        '                        <input type="text" class="form-control" name="final" id="final" placeholder="Fecha fin">\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '                <div class="col-xs-1 col-sm-1 col-lg-1">\n' +
        '                    <label class="col-form-label">Buscar</label>\n' +
        '                    <a href="javascript:;" class="btn btn-large btn-icon  btn-success" title="buscar"\n' +
        '                       onclick="vendedorIngresos()"><i\n' +
        '                                class="fa fa-search-plus"></i></a>\n' +
        '                </div>\n' +
        '\n' +
        '            </div>\n' +
        '            <br>\n' +
        '            <br>\n' +
        '            <div id="data-table-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">\n' +
        '                <div class="row">\n' +
        '                    <div class="col-sm-12">\n' +
        '                        <table id="data-table-fixed-header"\n' +
        '                               class="table table-striped table-responsive table-bordered dataTable no-footer dtr-inline"\n' +
        '                               role="grid"\n' +
        '                               aria-describedby="data-table-fixed-header_info">\n' +
        '                            <tbody>\n' +
        '                            </tbody>\n' +
        '                            <thead>\n' +
        '                            <tr role="row">\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 20%; min-width: 100px;text-align: center">Id vendedor\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 300px;text-align: center">Vendedor\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 100px;text-align: center">\n' +
        '                                    Total\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 100px;text-align: center">\n' +
        '                                    Op Gravada\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 60px;text-align: center">\n' +
        '                                    Gasto Producto\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Platform(s): activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 100px; text-align: center">\n' +
        '                                    Ganancias\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Platform(s): activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 100px; text-align: center">\n' +
        '                                    Fecha\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Platform(s): activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 100px; text-align: center">\n' +
        '                                    Lugar\n' +
        '                                </th>\n' +
        '                            </tr>\n' +
        '                            </thead>\n' +
        '                        </table>\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '\n' +
        '            </div>';
    return html;

}

function htmlProductoIngresos() {
    var html = '<div class="row form-group">\n' +
        '                <div class="col-xs-6 col-sm-6 col-lg-6">\n' +
        '                        <label class="col-md-4 col-sm-4 col-form-label" for="nombre_producto"> <strong> Nombre producto\n' +
        '                            </strong></label>\n' +
        '                        <div class="col-md-7 col-sm-7">\n' +
        '                            <input type="text" class="form-control m-b-12 typeahead" id="id_producto"\n' +
        '                                   name="id_producto" hidden\n' +
        '                            >\n' +
        '                            <input type="text" class="form-control m-b-12 typeahead" id="nombre_producto"\n' +
        '                                   onkeypress="if(event.keyCode == 13) buscarProductoNombre()"\n' +
        '                                   name="nombre_producto"\n' +
        '                            >\n' +
        '                            <script>\n' +
        '                                $(\'#nombre_producto\').typeahead({\n' +
        '                                    name: \'data\',\n' +
        '                                    displayKey: \'name\',\n' +
        '                                    source: function (query, process) {\n' +
        '                                        $.ajax({\n' +
        '                                            url: "/buscarnombre",\n' +
        '                                            type: \'GET\',\n' +
        '                                            data: \'query=\' + query,\n' +
        '                                            dataType: \'JSON\',\n' +
        '                                            async: \'false\',\n' +
        '                                            success: function (data) {\n' +
        '                                                bondObjs = {};\n' +
        '                                                bondNames = [];\n' +
        '                                                $.each(data, function (i, item) {\n' +
        '                                                    bondNames.push({id: item.idProducto, name: item.nombre});\n' +
        '                                                    bondObjs[item.id] = item.idProducto;\n' +
        '                                                    bondObjs[item.name] = item.nombre;\n' +
        '                                                });\n' +
        '                                                process(bondNames);\n' +
        '                                            }\n' +
        '                                        });\n' +
        '                                    }\n' +
        '                                }).on(\'typeahead:selected\', function (even, datum) {\n' +
        '                                    $("#id_producto").val(bondObjs[datum.id]);//IMPRIMIR EL ID DEL RESULTADO SELECCIONADO EN UN INPUT\n' +
        '                                });\n' +
        '                            </script>\n' +
        '\n' +
        '                        </div>\n' +
        '\n' +
        '\n' +
        '                </div>\n' +
        '                <div class="col-xs-4 col-sm-4 col-lg-4">\n' +
        '                    <label class="col-form-label">fecha</label>\n' +
        '                    <div class="input-group input-daterange">\n' +
        '                        <input type="text" class="form-control" name="inicio" id="inicio"\n' +
        '                               placeholder="Fecha inicio">\n' +
        '                        <span class="input-group-addon">a</span>\n' +
        '                        <input type="text" class="form-control" name="final" id="final" placeholder="Fecha fin">\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '                <div class="col-xs-1 col-sm-1 col-lg-1">\n' +
        '                    <label class="col-form-label">Buscar</label>\n' +
        '                    <a href="javascript:;" class="btn btn-large btn-icon  btn-success" title="buscar"\n' +
        '                       onclick="productoIngresos()"><i\n' +
        '                                class="fa fa-search-plus"></i></a>\n' +
        '                </div>\n' +
        '\n' +
        '            </div>\n' +
        '            <br>\n' +
        '            <br>\n' +
        '            <div id="data-table-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">\n' +
        '                <div class="row">\n' +
        '                    <div class="col-sm-12">\n' +
        '                        <table id="data-table-fixed-header"\n' +
        '                               class="table table-striped table-responsive table-bordered dataTable no-footer dtr-inline"\n' +
        '                               role="grid"\n' +
        '                               aria-describedby="data-table-fixed-header_info">\n' +
        '                            <tbody>\n' +
        '                            </tbody>\n' +
        '                            <thead>\n' +
        '                            <tr role="row">\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 20%; min-width: 100px;text-align: center">Id producto\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 300px;text-align: center">Nombre\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 100px;text-align: center">\n' +
        '                                    Cantidad paquete vendidas\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 100px;text-align: center">\n' +
        '                                    Monto recaudado paquete\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 60px;text-align: center">\n' +
        '                                    Cantidad unidades vendidas\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Platform(s): activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 100px; text-align: center">\n' +
        '                                    Monto recaudado unidades\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Platform(s): activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 100px; text-align: center">\n' +
        '                                    Fecha\n' +
        '                                </th>\n' +
        '                            </tr>\n' +
        '                            </thead>\n' +
        '                        </table>\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '\n' +
        '            </div>'
    return html;
}

function vendedorIngresos() {

    "use strict";
    var id = $('#vendedores').find('option:selected').attr('id');
    var fechaini = convertiFecha($("#inicio").val());
    var fechafin = convertiFecha($("#final").val());
    var url = "/reporteVendedorIngresos/" + id + "/" + fechaini + "/" + fechafin;
    var sum = 0;
    $('#data-table-fixed-header').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        processing: true,
        serverSide: true,
        select: true,
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'print'
        ],
        rowId: 'idUsuario',
        aaSorting: [[0, "desc"]],
        ajax: url,
        columns: [
            {data: 'idUsuario', name: 'idUsuario'},
            {data: 'vendedor', name: 'vendedor'},
            {data: 'total', name: 'total'},
            {data: 'opgv', name: 'opgv'},
            {data: 'gastoprod', name: 'gastoprod'},
            {data: 'ganancia', name: 'ganancia'},
            {data: 'fecha', name: 'fecha'},
            {data: 'lugar', name: 'lugar'},
        ]

    });
}

function productoIngresos() {

    "use strict";
    var id = $("#nombre_producto").val();
    var fechaini = convertiFecha($("#inicio").val());
    var fechafin = convertiFecha($("#final").val());
    var url = "/reporteProductoIngresos/" + id + "/" + fechaini + "/" + fechafin;
    var sum = 0;
    $('#data-table-fixed-header').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        processing: true,
        serverSide: true,
        select: true,
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'print'
        ],
        rowId: 'idUsuario',
        aaSorting: [[0, "desc"]],
        ajax: url,
        columns: [
            {data: 'idProducto', name: 'idProducto'},
            {data: 'nombre', name: 'nombre'},
            {data: 'cantpa', name: 'cantpa'},
            {data: 'montpaque', name: 'montpaque'},
            {data: 'cantuni', name: 'cantuni'},
            {data: 'monuni', name: 'monuni'},
            {data: 'fecha', name: 'fecha'},
        ]

    });
}