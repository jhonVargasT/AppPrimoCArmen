$('#guardar').click(function () {
    registrarCliente();
});

$('#editar').click(function () {
    editarCliente();
});

$('#actualizar').click(function () {
    actualizarCliente();
});

//Crear Datos
function registrarCliente() {
    var url = "Cliente/store";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#idFormCliente").serialize(),
        success: function (data) {
            if (data === 'success') {
                redirect('Clientes');
                ok();
            } else {
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
        title: 'Registrado Correctamente'
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
        title: 'Registro no Registrado'
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
function editarCliente() {
    var id = $("#idPersona").val();
    var url = "Cliente/" + id;
    $.ajax({
        type: "PUT",
        url: url,
        data: $("#idFormClienteEditar").serialize(),
        success: function (data) {
            if (data === 'success') {
                redirect('Clientes');
                ok();
            } else {
                redirect('Clientes');
                error();
            }
        },
        beforeSend: function () {
            $("#editar").prop('disabled', true);
        }
    });
}

//Activar y anular producto
function actualizarCliente(idp, idt, iddt, estado) {
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
                url: "/actualizarCliente",
                type: "GET",
                data: {idp: idp, idt: idt, iddt: iddt, estado: estado},
                success: function (data) {
                    if (data === 'success') {
                        redirect('Clientes');
                        actualizado();
                    } else {
                        redirect('Clientes');
                        error();
                    }
                }
            });
        }
    })
}

function agregardireccion(event) {
    "use strict";
    event.preventDefault();
    var html, html2, value, value2;
    var valores = [];
    var click = document.getElementById("val1").value;
    var cont = 0;
    for (var i = 0; i < click; i++) {
        cont++;
        value = document.getElementById("dtnombreCalle" + cont).value;
        value2 = document.getElementById("dtdistrito" + cont).value;
        value2 = document.getElementById("dtprovincia" + cont).value;
        valores.push([value, value2]);
    }
    click++;
    html = $('#dir').html();
    html2 = ' <div class="form-group row m-b-10">' +
        '<label class="col-md-3 col-form-label text-md-right">Distrito ' + click + '<span class="text-danger">*</span></label>' +
        '<div class="col-md-6"> <input type="text" id="dtdistrito' + click + '" name="dtdistrito' + click + '" class="form-control" data-parsley-group="step-3" data-parsley-required="true"' +
        'data-parsley-type="alphanum"/> </div> </div>' +
        ' <div class="form-group row m-b-10">' +
        '<label class="col-md-3 col-form-label text-md-right">Provincia ' + click + '<span class="text-danger">*</span></label>' +
        '<div class="col-md-6"> <input type="text" id="dtprovincia' + click + '" name="dtprovincia' + click + '" class="form-control" data-parsley-group="step-3" data-parsley-required="true"' +
        'data-parsley-type="alphanum"/> </div> </div>' +
        '<div class="form-group row m-b-10" >' +
        '<label class="col-md-3 col-form-label text-md-right">Direccion ' + click + ' <span class="text-danger">*</span></label>' +
        '<div class="col-md-6"> <input type="text" id="dtnombreCalle' + click + '" name="dtnombreCalle' + click + '" class="form-control"' +
        'data-parsley-group="step-3" data-parsley-required="true"/> </div> ';
    html = html + html2;
    $('#dir').html(html);
    document.getElementById("val1").value = click;
    cont = 0;
    for (i = 0; i < valores.length; i++) {
        cont++;
        document.getElementById("dtdistrito" + cont).value = valores[i][2];
        document.getElementById("dtdistrito" + cont).value = valores[i][1];
        document.getElementById("dtnombreCalle" + cont).value = valores[i][0];
    }
}
