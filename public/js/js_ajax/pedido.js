
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
                        return '<dd ><i style="color:darkorange;" class="fas fa-lg fa-fw m-r-10 fa-stopwatch"></i> </dd>';
                    }
                    else {
                        if (row.estado === '2') {
                            return ' <dd><i style="color: darkgreen" class="fas fa-lg fa-fw m-r-10 fa-check"> </i> </dd>';
                        }
                        else {
                            return '<dd><i style="color: red" class="fas fa-lg fa-fw m-r-10 fa-times"> </i> </dd>';
                        }
                    }
                }
            }

        ]

    });
}
