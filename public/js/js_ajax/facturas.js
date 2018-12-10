//Crear Datos

var cabezafactura = [];
var productos = [];
var piefactura = [];

function buscarPedido() {
    var id = $('#idpedido').val();
    var url = "/buscarfactura/" + id;
    $.ajax({
        type: "GET",
        url: url,
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
            if (data.error === 1) {
                cabezafactura = data.cabeza;
                productos = data.productos;
                piefactura = data.impuesto;
                ok('Pedido encontrado');
                $('#fecha').val(data.cabeza[0].fecha);
                $('#vendedor').val(data.cabeza[0].usu);
                $('#dni').val(data.cabeza[0].dni);
                $('#cliente').val(data.cabeza[0].razsoc);
                $('#direccion').val(data.cabeza[0].direccion);
                llenarTabla(data.productos, data.impuesto);
                documento();
            } else {
                error(data.err)
            }
        },
        beforeSend: function () {
            $("#guardar").prop('disabled', true);
        }
    });
}


function llenarTabla(productos, impuestos) {
    html = $("#cuerpotabla").html();
    html = '';
    tablaCentro = ''
    for (var i = 0; i < productos.length; i++) {
        if (parseInt(productos[i].cantidadPaquetes) !== 0) {
            tablaCentro += ' <tr>' +
                ' <td  align="center">' + productos[i].id + '</td>' +
                ' <td>' + productos[i].nombre + ' X ' + productos[i].tipoPaquete + '</td> ' +
                '<td align="center">' + productos[i].cantidadPaquetes + '</td>' +
                '<td align="center">' + productos[i].precioVentapaque + '</td>' +
                '<td align="center">' + productos[i].totpaque + '</td>' +
                '</tr>'
        }
        if (parseFloat(productos[i].DescuentoPaquetes) !== 0) {
            tablaCentro += ' <tr>' +
                '<td align="right" colspan="4">' + productos[i].descpro + '</td>' +
                '<td align="center">-' + productos[i].DescuentoPaquetes + '</td>' +
                '</tr>'
        }
        if (parseInt(productos[i].cantidadUnidades) !== 0) {
            tablaCentro += ' <tr>' +
                ' <td  align="center">' + productos[i].id + '</td>' +
                ' <td>' + productos[i].nombre + ' X UNIDAD </td> ' +
                '<td align="center">' + productos[i].cantidadUnidades + '</td>' +
                '<td align="center">' + productos[i].precioVentaUnidad + '</td>' +
                '<td align="center">' + productos[i].totuni + '</td>' +
                '</tr>'
        }
        if (parseFloat(productos[i].DescuentoUnidades) !== 0) {
            tablaCentro += ' <tr>' +
                '<td align="right" colspan="4">' + productos[i].descpro + '</td>' +
                '<td align="center">-' + productos[i].DescuentoUnidades + '</td>' +
                '</tr>'
        }
    }
    cuerpo =
        '                <tr>\n' +
        '                    <td colspan="4" align="right">OP.GRAVADA :</td>\n' +
        '                    <td  align="center">' + impuestos[0].costoBruto + '</td>\n' +
        '                </tr>\n' +
        '                <tr>\n' +
        '                    <td colspan="4" align="right">I.G.V :</td>\n' +
        '                    <td align="center">' + impuestos[0].impuesto + '</td>\n' +
        '                </tr>\n' +
        '                <tr>\n' +
        '                    <td colspan="4" align="right">DESCUENTO :</td>\n' +
        '                    <td align="center">' + impuestos[0].descuento + '</td>\n' +
        '                </tr>\n' +
        '                <tr>\n' +
        '                    <td colspan="4" align="right">TOTAL :</td>\n' +
        '                    <td align="center">' + impuestos[0].totalPago + '</td>\n' +
        '                </tr>'

    html = html + tablaCentro + cuerpo;
    $('#cuerpotabla').html(html);
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

function actualizado() {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast({
        type: 'success',
        title: 'Datos actualizados'
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
        type: 'Error',
        title: mensaje
    })
}

function enviarFacturaSunat() {
    "use strict";
    var fecha = $('#fecha').val();
    var vendedor = $('#vendedor').val();
    var tipventa = $('#tipventa').val();
    var dni = $('#dni').val();
    var cliente = $('#cliente').val();
    var direccion = $('#direccion').val();
    var moneda = $('#moneda').val();
    var docum = $('#docum').val();
    var serie = $('#serie').val();
    var numero = $('#numero').val();
    var idpedido = $('#idpedido').val();

    var cabezafactura = {
        idpedido: idpedido,
        fecha: fecha,
        vendedor: vendedor,
        tipventa: tipventa,
        dni: dni,
        cliente: cliente,
        direccion: direccion,
        moneda: moneda,
        docum: docum,
        serie: serie,
        numero: numero
    };

    var datos = {cabezafactura: cabezafactura, productos: productos, piefactura: piefactura};
    var arr = JSON.stringify(datos);
    swal({
        title: 'Esta seguro?',
        text: "La factura se remitira a la sunat!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, enviar!"
    }).then(function (result) {
        if (result.value) {

            var url = "/enviarfactura/" + arr;
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                dataType: 'json',
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    if (data.error === 1) {
                        redirect('facturas');
                        ok(data.mensaje);
                    } else {
                        redirect('facturas');
                        error(data.mensaje);
                    }

                }, beforeSend: function () {
                    $("#enviarpedido").prop('disabled', true);
                }
            });
        }
    })

}

function ok(mensaje) {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });
    toast({
        type: 'success',
        title: mensaje
    })
}

function documento() {
    var dni = $("#dni").val();

    if (dni.length === 8) {
        $("#serie").val('B001');
    } else if (dni.length === 11) {
        $("#serie").val('F001')
    }

    $.ajax({
        type: "GET",
        url: '/document',
        cache: false,
        contentType: 'application/json',
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
            $("#numero").val(data);
        }
    });
}

function redirect(ruta) {
    $.ajax({
        type: "GET",
        url: "/" + ruta,
        dataType: "html",
        success: function (data) {
            $("#response").html(data);
        }
    });
}
