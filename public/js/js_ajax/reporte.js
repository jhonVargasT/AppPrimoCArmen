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
    boton = $("#boton").html();
    boton = '';
    $('#data').html(html);
    $("#boton").html(boton);
    $('#nombreproductodiv').attr('hidden', true);
    $('#vendedordiv').attr('hidden', true);
    switch (dato) {
        case '1':
            boton = '<div class="col-xs-1 col-sm-1 col-lg-1">\n' +
                '                    <label class="col-form-label">Buscar</label>\n' +
                '                    <a href="javascript:;" class="btn btn-large btn-icon  btn-success" title="buscar"\n' +
                '                       onclick="productoIngresos()"><i\n' +
                '                                class="fa fa-search-plus"></i></a>\n' +
                '                </div>';
            $('#boton').html(boton);
            $('#data').html(htmlProductoIngresos());
            break;
        case '2':
            boton = '<div class="col-xs-1 col-sm-1 col-lg-1">\n' +
                '                    <label class="col-form-label">Buscar</label>\n' +
                '                    <a href="javascript:;" class="btn btn-large btn-icon  btn-success" title="buscar"\n' +
                '                       onclick="vendedorIngresos()"><i\n' +
                '                                class="fa fa-search-plus"></i></a>\n' +
                '                </div>';
            $('#boton').html(boton);
            $('#data').html(htmlVendedorIngresos());
            break;
        case '3':
            boton = '<div class="col-xs-1 col-sm-1 col-lg-1">\n' +
                '                    <label class="col-form-label">Buscar</label>\n' +
                '                    <a href="javascript:;" class="btn btn-large btn-icon  btn-success" title="buscar"\n' +
                '                       onclick="vendedorPtoductosRuta()"><i\n' +
                '                                class="fa fa-search-plus"></i></a>\n' +
                '                </div>';
            $('#boton').html(boton);
            $('#data').html(htmlProductoRuta());
            break;
        case '4':
            boton = '<div class="col-xs-1 col-sm-1 col-lg-1">\n' +
                '                    <label class="col-form-label">Buscar</label>\n' +
                '                    <a href="javascript:;" class="btn btn-large btn-icon  btn-success" title="buscar"\n' +
                '                       onclick="clienteTotal()"><i\n' +
                '                                class="fa fa-search-plus"></i></a>\n' +
                '                </div>';
            $('#boton').html(boton);
            $('#data').html(htmlClienteIngresos());
            break;
    }
}

function htmlVendedorIngresos() {
    $('#vendedordiv').removeAttr('hidden');
    var html = '   <div id="data-table-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">\n' +
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
    $('#nombreproductodiv').removeAttr('hidden');
    var html =
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


function htmlProductoRuta() {
    $('#vendedordiv').removeAttr('hidden');
    var html = '     <div id="data-table-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">\n' +
        '                <div class="row">\n' +
        '                    <div class="col-sm-12">\n' +
        '                        <table id="data-table-fixed-header"\n' +
        '                               class="table table-striped table-responsive table-bordered dataTable no-footer dtr-inline"\n' +
        '                               role="grid"\n' +
        '                               aria-describedby="data-table-fixed-header_info"  style="width: 100%; min-width: 100%">\n' +
        '                            <tbody>\n' +
        '                            </tbody>\n' +
        '                            <thead>\n' +
        '                            <tr role="row">\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 200px;text-align: center">Usuario\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width:  100%;text-align: center">Nombre producto\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width:  100%;text-align: center">\n' +
        '                                    Cant paquetes\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width:  100%;text-align: center">\n' +
        '                                    Can unidades\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width:  120px;text-align: center">\n' +
        '                                    Fecha Entrega\n' +
        '                                </th>\n' +
        '                            </tr>\n' +
        '                            </thead>\n' +
        '                        </table>\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '            </div>'
    return html;
}

function htmlClienteIngresos() {
    var html = '  <div id="data-table-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">\n' +
        '                <div class="row">\n' +
        '                    <div class="col-sm-12">\n' +
        '                        <table id="data-table-fixed-header"\n' +
        '                               class="table table-striped table-responsive table-bordered dataTable no-footer dtr-inline"\n' +
        '                               role="grid"\n' +
        '                               aria-describedby="data-table-fixed-header_info"  style="width: 100%;">\n' +
        '                            <tbody>\n' +
        '                            </tbody>\n' +
        '                            <thead>\n' +
        '                            <tr role="row">\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 20%; min-width: 152px;text-align: center">Id Cliente\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 400px;text-align: center">Nombre Cliente\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 100px;text-align: center">\n' +
        '                                    Monto invertido\n' +
        '                                </th>\n' +
        '                                <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-fixed-header"\n' +
        '                                    rowspan="1" colspan="1"\n' +
        '                                    aria-label="Rendering engine: activate to sort column ascending"\n' +
        '                                    style="width: 100%; min-width: 200px;text-align: center">\n' +
        '                                    Fecha\n' +
        '                                </th>\n' +
        '                            </tr>\n' +
        '                            </thead>\n' +
        '                        </table>\n' +
        '                    </div>\n' +
        '                </div>\n' +
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
    if (id)
        id = $("#nombre_producto").val();
    else
        id = 0;
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


function vendedorPtoductosRuta() {

    "use strict";
    var id = $('#vendedores').find('option:selected').attr('id');
    var fechaini = convertiFecha($("#inicio").val());
    var fechafin = convertiFecha($("#final").val());
    var url = "/reporteProductoRuta/" + id + "/" + fechaini + "/" + fechafin;
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
            {data: 'usu', name: 'usu'},
            {data: 'nombre', name: 'nombre'},
            {data: 'paque', name: 'paque'},
            {data: 'uni', name: 'uni'},
            {data: 'fechaPedido', name: 'fechaPedido'},
        ]

    });
}


function clienteTotal() {

    "use strict";
    var fechaini = convertiFecha($("#inicio").val());
    var fechafin = convertiFecha($("#final").val());
    var url = '/reporteClienteIngresos/' + fechaini + '/' + fechafin;
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
            {data: 'idPersona', name: 'idPersona'},
            {data: 'nomb', name: 'nomb'},
            {data: 'tot', name: 'tot'},
            {data: 'fec', name: 'fec'},

        ]

    });
}
