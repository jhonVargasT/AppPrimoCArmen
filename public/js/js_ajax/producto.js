$('#guardar').click(function () {
    registrarProducto();
});

$('#actualizar').click(function () {
    actualizarProducto();
});

$('#editar').click(function () {
    editarProducto();
});

$('#adicionar').click(function () {
    actualizarStock();
});

//Crear Datos
function registrarProducto() {
    var url = "Producto/store";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#idFormProducto").serialize(),
        success: function (data) {
            if (data === 'success') {
                redirect('Productos');
                ok();
            } else {
                redirect('Productos');
                error();
            }
        },
        beforeSend: function () {
            $("#guardar").prop('disabled', true);
        }
    });
}

function ok() {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast.fire({
        type: 'success',
        title: 'Datos registrados'
    })
}

function actualizado() {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast.fire({
        type: 'success',
        title: 'Datos actualizados'
    })
}

function error() {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast.fire({
        type: 'error',
        title: 'Error'
    })
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

//Actualizar Datos
function editarProducto() {
    var id = $('#idProducto').val();
    var url = "Producto/" + id;
    $.ajax({
        type: "PUT",
        url: url,
        data: $("#idFormProductoEditar").serialize(),
        success: function (data) {
            if (data === 'success') {
                redirect('Productos');
                ok();
            } else {
                redirect('Productos');
                error();
            }
        },
        beforeSend: function () {
            $("#editar").prop('disabled', true);
        }
    });
}

//Stock modal
function actualizarStockModal(id) {
    var url = "/actualizarStockModal";
    $.ajax({
        type: "GET",
        url: url,
        data: '&id=' + id,
        success: function (data) {
            $('#modal-dialog').modal('show');
            $("#nombrespan").html(data[0]);
            $("#stockspan").html(data[1]);
            $("#idProducto").val(data[2]);
        }
    });
}

//Sumar Stock
function actualizarStock() {
    var url = "/actualizarStock";
    var id = $('#idProducto').val();
    var paquete = $('#paquete').val();
    var unidad = $('#unidad').val();
    $.ajax({
        type: "GET",
        url: url,
        data: '&id=' + id + '&paquete=' + paquete + '&unidad=' + unidad,
        success: function (data) {
            if (data === 'success') {
                redirect('Productos');
                $('.modal-backdrop').remove();
                ok();
            } else if (data !== 'success') {
                redirect('Productos');
                $('.modal-backdrop').remove();
                error();
            }
        }
    });
}

//Activar y anular producto
function actualizarProducto(id, estado) {
    swal.fire({
        title: 'Esta seguro?',
        text: "Este registro se actualizara!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, actualizar!"
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: "/actualizarProducto",
                type: "GET",
                data: {id: id, estado: estado},
                success: function (data) {
                    if (data === 'success') {
                        redirect('Productos');
                        actualizado();
                    } else {
                        redirect('Productos');
                        error();
                    }
                }
            });
        }
    })
}

function validardecimales(id, posiciones = 0) {
    var x1 = $('#' + id).val();
    var arreglo = x1.split(',');
    if (arreglo.length > 1) {
        var x = arreglo[0] + '.' + arreglo[1];
        console.log(x);
        var s = x1.toString()
        var l = s.length
        var decimalLength = s.indexOf('.') + 1

        if (l - decimalLength <= posiciones) {
            return x
        }
        // Parte decimal del número
        var isNeg = x < 0;
        var decimal = x % 1;
        var entera = isNeg ? Math.ceil(x) : Math.floor(x);
        // Parte decimal como número entero
        // Ejemplo: parte decimal = 0.77
        // decimalFormated = 0.77 * (10^posiciones)
        // si posiciones es 2 ==> 0.77 * 100
        // si posiciones es 3 ==> 0.77 * 1000
        var decimalFormated = Math.floor(
            Math.abs(decimal) * Math.pow(10, posiciones)
        );
        // Sustraemos del número original la parte decimal
        // y le sumamos la parte decimal que hemos formateado
        var finalNum = entera +
            ((decimalFormated / Math.pow(10, posiciones)) * (isNeg ? -1 : 1));
        $('#' + id).val(finalNum);
    }
    else {
        $('#' + id).val(x1);
    }

}


function validarEnterosPositivos($id) {
    var num = $('#' + $id).val();
    if (num < 0)
        $('#' + $id).val(Math.abs(num));
    else
        $('#' + $id).val(num);
}


function cargarSelectTipoProducto() {
    "use strict";
    var url = "/llenartipos";
    $.ajax({
        type: "GET",
        url: url,
        cache: false,
        dataType: 'json',
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
            var select = $('#tipoProducto');
            select.find('option').remove();
            for (var i = 0; i < data.tipoproducto.length; i++) {
                select.append('<option id="' + data.tipoproducto[i].nombre + '">' + data.tipoproducto[i].nombre + '</option>');
            }


        }

    });

}


function cargarSelectTipoPaquete() {
    "use strict";
    var url = "/llenartipos";
    $.ajax({
        type: "GET",
        url: url,
        cache: false,
        dataType: 'json',
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
            var select = $('#tipoPaquete');
            select.find('option').remove();
            for (var i = 0; i < data.tipopaquete.length; i++) {
                select.append('<option id="' + data.tipopaquete[i].nombre + '">' + data.tipopaquete[i].nombre + '</option>');
            }


        }

    });


}


function dividirPaquete(id) {
    swal.fire({
        title: 'Esta seguro?',
        text: "Desea partir  1 paquete en unidades?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, partir!"
    }).then(function (result) {
        if (result.value) {
            var url = "/partirpaquete/" + id;
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                dataType: 'json',
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    if (data.error === 0) {
                        redirect('Productos');
                        actualizado();
                    } else {
                        redirect('Productos');
                        error();
                    }
                }
            });
        }
    })


}

function unirunidadespaquete(id) {
    swal.fire({
        title: 'Esta seguro?',
        text: "Desea juntar undades en un paquete?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, juntar!"
    }).then(function (result) {
        if (result.value) {
            var url = "/unirunidadespaquete/" + id;
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                dataType: 'json',
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    if (data.error === 0) {
                        redirect('Productos');
                        actualizado();
                    } else {
                        redirect('Productos');
                        error();
                    }
                }
            });
        }
    })


}