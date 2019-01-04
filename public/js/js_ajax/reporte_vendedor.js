
$(document).ready(function () {
    cajaDiaria();
    comision();
    ventaMensual();
    meta();
});

function cajaDiaria() {
    "use strict";
    var url = "/cajaDiariavendedor";
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
                        $('#cajadia').text('S/.0.00');
                    } else {
                        $('#cajadia').text('S/.' +data.tot);
                    }
                }
                else
                    alert('nohay');

            }

        }
    );
}
function cambiarTabla() {
    var val =  $('#estado').val();
    $('#data-table-fixed-header').DataTable({

        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        processing: true,
        serverSide: true,
        select: true,
        destroy: true,
        rowId: 'idPedido',
        aaSorting: [[5, "desc"], [0, "desc"], [1, "asc"], [8, "asc"]],
        ajax: '/listarPedidos/'+val,
        columns: [
            {data: 'idPedido', name: 'idPedido'},
            {data: 'nombres', name: 'nombres'},
            {data: 'nroCelular', name: 'nroCelular'},
            {data: 'tienda', name: 'tienda'},
            {data: 'cantidad', name: 'cantidad'},
            {data: 'fechaEntrega', name: 'fechaEntrega'},
            {data: 'totalPago', name: 'totalPago'},
            {
                data: function (row) {
                    if (row.estado === '1') {
                        return '<div style="vertical-align: middle;"><i style="color: orange" class="fas fa-lg fa-fw fa-circle "></i></div>';
                    }
                    else {
                        if (row.estado === '2') {
                            return '<div><i style="color: yellow" class="fas fa-lg fa-fw fa-circle"></i></div>';
                        }
                        else {
                            if (row.estado === '3') {
                                return ' <div><i style="color: green" class="fas fa-lg fa-fw fa-circle"></i></div>';
                            }
                            else {
                                if (row.estado === '4') {
                                    return '<div><i style="color: green" class="fas fa-lg  fa-circle"> </i> <i style="color: red" class="fas fa-sm m-r-5 fa-exclamation"> </i></div>';
                                } else {

                                    return '<div><i style="color: red" class="fas fa-lg fa-fw fa-circle"></i></div>';
                                }

                            }
                        }
                    }
                }
            },
            {
                data: function (row) {
                    return '<th">' +
                        '<a href="#modal-dialog" class="btn btn-link" data-toggle="modal"title="Ver productos" onclick="llenarVerProductos(' + row.idPedido + ')">' +
                        '<i class="fas fa-lg fa-fw  fa-eye"></i></a>' +
                        '</th> ';

                }
            }
        ]

    });

}



function llenarVerProductos(idpedido) {
    var url = 'verproductos/' + idpedido;

    'use strict';

    var url = 'verproductos/' + idpedido;
    $('#numero_pedido').text(idpedido);
    $('#data-table-fixed-header2').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        processing: true,
        serverSide: true,
        destroy: true,
        select: true,
        rowId: 'idPedido',
        ajax: url,
        columns: [

            {
                data: 'nombre', name: 'nombre'
            },

            {
                data: function (row) {
                    if (row.estado === '1') {
                        return '  <a href="#" class="btn btn-link" onchange="canmbiarNumeroProductos(' + idpedido + ',' + row.idprod + ')" > <input type="number" min="0" class="form-control" value="' + row.cantidadPaquetes + '" id="cantpaque"> </a>';
                    }
                    else {
                        return '<div>' + row.cantidadPaquetes + '</div>'
                    }
                }
            },
            {
                data: function (row) {
                    if (row.estado === '1') {
                        return '  <a href="#" class="btn btn-link" onchange="canmbiarNumeroProductos(' + idpedido + ',' + row.idprod + ')"> <input type="number"  min="0" class="form-control" value="' + row.cantidadUnidades + '" id="cantuni"> </a>';
                    }
                    else {
                        return '<div>' + row.cantidadUnidades + '</div>'
                    }
                }
            },
            {
                data: function (row) {
                    if (row.estado === '1') {
                        return '<th">' +
                            '<i style="color:darkorange;" class="fas fa-lg fa-fw m-r-10 fa-stopwatch"></i> ' +
                            '</th>';
                    }
                    else {
                        if (row.estado === '2') {
                            return '<th">' +
                                '<i style="color: darkgreen" class="fas fa-lg fa-fw m-r-10 fa-check"></i>' +
                                '</th>';
                        }
                        else {
                            if (row.estado === '3') {
                                return '<th">' +
                                    '<i style="color:darkorange;" class="fas fa-lg fa-fw m-r-10 fa-stopwatch"></i>' +
                                    '</th>';
                            }
                            else {
                                if (row.estado === '4') {
                                    return '<th">' +
                                        '<i style="color: darkgreen" class="fas fa-lg fa-fw m-r-10 fa-check"></i>' +
                                        '</th>';
                                }
                                else {
                                    if (row.estado === '5') {
                                        return '<th">' +
                                            '<i style="color: red" class="fas fa-lg fa-fw m-r-10 fa-times"> </i>' +
                                            '</th>';
                                    } else {
                                        return '<th">' +
                                            '<i style="color: red" class="fas fa-lg fa-fw m-r-10 fa-times"> </i>' +
                                            '</th>';
                                    }
                                }

                            }


                        }
                    }
                }

            }

        ]
    });
}

function meta() {
    "use strict";
    var url = "obtenermeta";
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data.error === 1) {
                    if (data.comi === null) {
                        $('#meta').text('S/. 0.00');
                    } else {
                        $('#meta').text('S/. ' + data.comi);
                    }
                }
                else
                    alert('nohay');

            }

        }
    );
}

function ventaMensual() {
    "use strict";
    var url = "ventamensual";
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data.error === 1) {
                    if (data.comi === null) {
                        $('#ventamensual').text('S/. 0.00');
                    } else {
                        $('#ventamensual').text('S/. ' + data.comi);
                    }
                }
                else
                    alert('nohay');

            }

        }
    );
}
function comision() {
    "use strict";
    var url = "comision";
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data.error === 1) {
                    if (data.comi === null) {
                        $('#comision').text('S/. 0.00');
                    } else {
                        $('#comision').text('S/. ' + data.comi);
                    }
                }
                else
                    alert('nohay');

            }

        }
    );
}
function verDetalleEliminacion(idpedido) {
    var url = '/verEliminacionPedido/' + idpedido;
    $.ajax({
        type: "GET",
        url: url,
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
            if (data.error === 1) {
                swal(
                    'Detalle de eliminacion!',
                    data.razon,
                    'info'
                )
            }
            else {

            }

        }
    });
}


function canmbiarNumeroProductos(idpedido, idproductopedido) {
    validarEnterosPositivos('cantpaque');
    validarEnterosPositivos('cantuni');
    var cantpaque = $('#cantpaque').val();
    var catuni = $('#cantuni').val();
    console.log(cantpaque + ' ' + catuni);
    "use strict";
    var url = "cambiarNumeroProducto/" + idproductopedido + "/" + cantpaque + "/" + catuni;
    $.ajax({
        type: "GET",
        url: url,
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
            if (data.error === 1) {
                ok('cantidad modificada')
                llenarVerProductos(idpedido);
            }
            else {
                error('Stock insuficiente, quedan ' + data.cantpaque + ' paquetes y ' + data.cantuni + ' unidades de ' + data.nombre + ' en stock, por favor actualice el stock!');
                llenarVerProductos(idpedido);
            }
        }

    });

}

function validarEnterosPositivos($id) {
    var num = $('#' + $id).val();
    if (num < 0)
        $('#' + $id).val(Math.abs(num));
    else
        $('#' + $id).val(num);
}

function error(mensaje) {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast({
        type: 'error',
        title: mensaje
    })
}

function ok(mensaje) {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast({
        type: 'success',
        title: mensaje
    })
}
