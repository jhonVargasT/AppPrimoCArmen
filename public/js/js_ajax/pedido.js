function llenarVerProductos(idpedido) {
    'use strict';
    var url = 'verproductos/' + idpedido;
    $('#numero_pedido').text(idpedido);
    $('#data-table-fixed-header2').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        processing: true,
        serverSide: true,
        responsive: true,
        bAutoWidth: true,
        destroy: true,
        select: true,
        rowId: 'idPedido',
        columnDefs: [
            {
                "targets": 1,
                "className": "text-center",
            },
            {
                "targets":2,
                "className": "text-center",
            },
            {
                "targets": 3,
                "className": "text-center",
            },

        ],
        ajax: url,
        columns: [

            {
                data: 'nombre', name: 'nombre'
            },

            {
                data: function (row) {
                    if (row.estado === '1') {
                        return '  <a href="#" class="btn btn-link" onchange="canmbiarNumeroProductos(' + idpedido + ',' + row.idprod + ')" > <input type="number" min="0" class="form-control" value="' + row.cantidadPaquetes + '" id="cantpaque'+ row.idprod +'"> </a>';
                    }
                    else {
                        return '<div>' + row.cantidadPaquetes + '</div>'
                    }
                }
            },
            {
                data: function (row) {
                    if (row.estado === '1') {
                        return '  <a href="#" class="btn btn-link" onchange="canmbiarNumeroProductos(' + idpedido + ',' + row.idprod + ')"> <input type="number"  min="0" class="form-control" value="' + row.cantidadUnidades + '" id="cantuni'+ row.idprod +'"> </a>';
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

function canmbiarNumeroProductos(idpedido, idproductopedido) {
    validarEnterosPositivos('cantpaque');
    validarEnterosPositivos('cantuni');
    var cantpaque = $('#cantpaque'+idproductopedido).val();
    var catuni = $('#cantuni'+idproductopedido).val();
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
                    if (data.error === 1) {
                        pedidoRealizado(data.id);
                        redirect();
                    }
                    else {
                        if (data.error === 0) {
                            error('por favor revizar los productos preparados para la entrega!, pedido nro '+data.id);
                            redirect();
                        }
                    }

                }
            });
        }
    })


}

function pedidoRealizado(id) {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast({
        type: 'success',
        title: 'El pedido se entrego correctamente! Pedido nro '+id,
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

function cerrarModal() {
    actualizado();
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

function actualizado() {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast({
        type: 'success',
        title: 'El pedido se ha preparado el pedido correctamente'
    })
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
                var url = '/eliminarPedido/' + idpedido + '/' + array.value;
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

function convertiFecha(dato) {
    var fecha = dato.split('/');
    var res = fecha[2] + '-' + fecha[0] + '-' + fecha[1];
    return res.toString();
}


function cambiarTabla() {
    var val =  $('#estado').val();
    var fechaini = convertiFecha($("#inicio").val());
    var fechafin = convertiFecha($("#final").val());
    $('#data-table-fixed-header').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        processing: true,
       // serverSide: true,
        select: true,
        responsive: true,
        bAutoWidth: true,
        destroy: true,
        rowId: 'idPedido',
        dom: 'lBfrtip',
        buttons: [
            'excel', 'pdf'
        ],
        columnDefs: [
            {
                "targets": 0,
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
            {
                "targets": 6,
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
            {
                "targets": 13,
                "className": "text-center",
            },
        ],
        aaSorting: [[10, "asc"], [8, "asc"], [0, "desc"], [1, "asc"]],
        ajax: '/listarPedidosAdmin/' + val+'/'+fechaini+'/'+fechafin,

        columns: [
            {data: 'idPedido', name: 'idPedido'},
            {data: 'nombreTienda', name: 'nombreTienda'},
            {data: 'nombreCalle', name: 'nombreCalle'},
            {data: 'distrito', name: 'distrito'},
            {data: 'provincia', name: 'provincia'},
            {data: 'nombres', name: 'nombres'},
            {data: 'dni', name: 'dni'},
            {data: 'nroCelular', name: 'nroCelular'},
            {data: 'cantidad', name: 'cantidad'},
            {data: 'fechaEntrega', name: 'fechaEntrega'},
            {data: 'totalPago', name: 'totalPago'},
            {data: 'usuario', name: 'usuario'},
            {
                data: function (row) {
                    if (row.estado === '1') {
                        return '<th ><i style="color: orange" class="fas fa-lg fa-fw fa-circle "></i></th>';
                    }
                    else {
                        if (row.estado === '2') {
                            return '<th><a href="#"  title="Click para entregar producto" onclick="cambiarEstadoPedido(' + row.idPedido + ')"> <i style="color: yellow" class="fas fa-lg fa-fw fa-circle"></i></a></th>';
                        }
                        else {
                            if (row.estado === '3') {
                                return ' <th><i style="color: green" class="fas fa-lg fa-fw fa-circle"></i></th>';
                            }
                            else {
                                if (row.estado === '4') {
                                    return '<th><i style="color: green" class="fas fa-lg  fa-circle"> </i> <i style="color: red" class="fas fa-sm m-r-5 fa-exclamation"> </i></th>';
                                } else {

                                    return '<th><a href="#"  title="Click para entregar producto" onclick="verDetalleEliminacion(' + row.idPedido + ')"><i style="color: red" class="fas fa-lg fa-fw fa-circle"></i></a></th>';
                                }

                            }
                        }
                    }
                }
            },
            {
                data: function (row) {
                    return '<th>' +
                        '<a href="/compilarticket/'+row.idPedido+'" class="btn btn-link"  title="Imprimir nota de venta" >' +
                        '<i  style="color: green" class=" fas fa-lg fa-fw  fa-print"></i></a>' +
                        '<a href="#modal-dialog" class="btn btn-link" data-toggle="modal" title="Ver productos" onclick="llenarVerProductos(' + row.idPedido + ')">' +
                        '<i class="fas fa-lg fa-fw  fa-eye"></i></a>' +
                        '<a href="#" class="btn btn-link " title="Eliminar pedido"  onclick="eliminarPedido(' + row.idPedido + ')">' +
                        '<i  style="color: red" class="fas fa-lg fa-fw  fa-trash "></i></a>' +
                        '</th> ';

                }
            }
        ]

    });

}
function imprimirTicket(idpedido) {
    var url = '/compilarticket/' + idpedido;
    $.ajax({
        type: "GET",
        url: url,
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
        }
    });
}