var deudas = [];

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
      //  serverSide: true,
        destroy: true,
        select: true,
        rowId: 'idPedido',
        ajax: url,
        columns: [

            {
                data: 'nombre', name: 'nombre'
            },

            {
                data: 'cantidadPaquetes', name: 'cantidadPaquetes'
            },
            {
                data: 'cantidadUnidades', name: 'cantidadUnidades'
            },

        ]
    });
}

function agregarPagar(idpedido, monto) {
    if (document.getElementById('check_' + idpedido + '').checked) {
        var deuda = {
            idpedido: idpedido,
            monto: monto
        };
        deudas.push(deuda);
        $("#enviarpedido").removeAttr('disabled');
    }
    else {
        for (var i = 0; i < deudas.length; i++) {
            if (deudas[i]['idpedido'].toString() === idpedido.toString()) {
                deudas.splice(i, 1);
            }
        }
    }
    modificarSaldo();
}

function modificarSaldo() {
    var suma = 0;
    for (var i = 0; i < deudas.length; i++) {
        suma = suma + parseFloat(deudas[i]['monto']);
    }
    suma = number_format(parseFloat(suma, 2).toFixed(1), 2);
    $('#totalpago').text(suma);
    modificarResto();
}

function modificarResto() {
    var pagoto = $('#totalpago').text();
    var totdeu = $('#total_deuda').text();
    var res = number_format(parseFloat(Math.abs(parseFloat(pagoto)) - Math.abs(parseFloat(totdeu)), 2).toFixed(1), 2);

    $('#total_sobrante').text(res);
}


function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0)
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    /*while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');*/

    return amount_parts.join('.');
}

function pagar() {
    var pagoto = $('#totalpago').text();
    var totsob = $('#total_sobrante').text();
    if (parseFloat(totsob) === 0) {
        totsob = $('#total_deuda').text();
    }
    var arr = JSON.stringify(deudas);

    var url = "/enviardeuda/" + arr;
    swal({
        title: 'Esta seguro?',
        text: "Se pagara la deuda por el monto de : S./" + pagoto + ",resta un monto de : S./" + totsob + " !",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Aceptar!"
    }).then(function (result) {
        $.ajax({
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data.error === 0) {
                   correcto();
                   redirect();
                }
                else {
                    redirect();
                    error();
                }

            }
        });


    })
}

function correcto() {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast({
        type: 'success',
        title: 'la deuda se ha pagado correctamete'
    })
}


function error() {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast({
        type: 'error',
        title: 'Hubo un error al pagar la deuda'
    })
}

function redirect() {
    $.ajax({
        type: "GET",
        url: "/deuda",
        dataType: "html",
        success: function (data) {
            $("#response").html(data);
        }
    });
}