$(document).ready(function () {
    comision();
});

function llenarVerProductos(idpedido) {
    'use strict';
    var url = 'verproductos/' + idpedido;
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
        columns: [{
            data: 'nombre', name: 'nombre'
        },
            {data: 'cantidadUnidades', name: 'cantidadUnidades'},
            {data: 'cantidadPaquetes', name: 'cantidadPaquetes'},
            {
                data: function (row) {
                    if (row.estado === '1') {
                        return '<th">' +
                            '<a href="#" class="btn btn-link" title="click para cambiar estado" >' +
                            '<i style="color:darkorange;" class="fas fa-lg fa-fw m-r-10 fa-stopwatch"></i> \</a>' +
                            '</th>';
                    }
                    else {
                        if (row.estado === '2') {
                            return '<th">' +
                                '<a href="#" class="btn btn-link" title="click para cambiar estado"  >' +
                                '<i style="color: darkgreen" class="fas fa-lg fa-fw m-r-10 fa-check"></i></a>' +
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
                                            '<a href="#" class="btn btn-link" title="click para cambiar estado">' +
                                            '<i style="color: red" class="fas fa-lg fa-fw m-r-10 fa-times"> </i></a>' +
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

function comision() {
    "use strict";
    var url = "obtenercomision";
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