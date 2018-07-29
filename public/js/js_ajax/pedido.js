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
                            '<a href="#" class="btn btn-link" title="click para cambiar estado" onclick="cambiarEstadProducto(' + idpedido + ',' + row.idprod + ',' + row.estado + ')">' +
                            '<i style="color:darkorange;" class="fas fa-lg fa-fw m-r-10 fa-stopwatch"></i> \</a>' +
                            '</th>';
                    }
                    else {
                        if (row.estado === '2') {
                            return '<th">' +
                                '<a href="#" class="btn btn-link" title="click para cambiar estado"  onclick="cambiarEstadProducto(' + idpedido + ',' + row.idprod + ',' + row.estado + ')">' +
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
                                            '<a href="#" class="btn btn-link" title="click para cambiar estado" onclick="cambiarEstadProducto(' + idpedido + ',' + row.idprod + ',' + row.estado + ')">' +
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


function cambiarEstadProducto(idpedido, idpropedi, estadoProd) {
    "use strict";
    var url = "cambiarEstadoProducto/" + idpropedi + "/" + estadoProd;
    $.ajax({
        type: "GET",
        url: url,
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {

        }

    });
    llenarVerProductos(idpedido);
}

function cambiarEstadoPedido(idpedido) {
    "use strict";
    var url = "cambiarEstadoPedido/" + idpedido;
    swal({
        title: 'ALERTA',
        text: "Desea hacer la entrega de este pedido?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, entregar!"
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "GET",
                url: url,
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    if (data === 'success') {
                        pedidoRealizado();
                        redirect();
                    }
                    else {
                        if (data === 'error') {
                            error('por favor revizar los productos preparados para la entrega!');
                            redirect();
                        }
                    }

                }
            });
        }
    })


}

function pedidoRealizado() {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast({
        type: 'success',
        title: 'El pedido se entrego correctamente!'
    })
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

function cerrarModal() {
    redirect();
}

function redirect() {
    $.ajax({
        type: "GET",
        url: "/Pedidos",

        dataType: "html",
        success: function (data) {
            $("#response").html(data);
        }
    });
}

function eliminarPedido(idpedido) {
    swal({
        title: 'Ingrese motivo de eliminacion',
        confirmButtonText: 'Aceptar',
        html:
            '<input id="swal-input1" class="swal2-input">',

        preConfirm: function () {
            return new Promise(function (resolve) {
                resolve(
                    $('#swal-input1').val()
                )
            })
        },
        onOpen: function () {
            $('#swal-input1').focus()
        }
    }).then(function (result) {
        var comentario = JSON.stringify(result);
        var array = JSON.parse(comentario);
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            })
            swalWithBootstrapButtons({
                title: 'Estas seguro?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    var url = '/eliminarPedido/' + idpedido + '/'+array.value;
                    $.ajax({
                        type: "GET",
                        url: url,
                        data: '_token = <?php echo csrf_token() ?>',
                        success: function (data) {
                            if (data === 'success') {

                                swalWithBootstrapButtons(
                                    'Eliminado!',
                                    'Este pedido fue eliminado',
                                    'success'
                                )
                                redirect();
                            }
                            else {
                                if (data === 'error') {
                                    swalWithBootstrapButtons(
                                        'Error!',
                                        'Algo salio mal',
                                        'error'
                                    )
                                    redirect();
                                }
                            }

                        }
                    });


                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'cancelado',
                        'error'
                    )
                }
            })

    }).catch(swal.noop)


}