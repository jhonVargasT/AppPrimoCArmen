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

    toast({
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

    toast({
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
    toast({
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
    swal({
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