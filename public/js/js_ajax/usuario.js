$('#guardar').click(function () {
    registrarUsuario();
});

$('#editar').click(function () {
    editarUsuario();
});

//Crear Datos
function registrarUsuario() {
    var url = "Usuario/store";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#idFormUsuario").serialize(),
        success: function (data) {
            if (data === 'success') {
                redirect('Usuarios');
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
function editarUsuario() {
    var id = $("#idUsuario").val();
    var url = "Usuario/" + id;
    $.ajax({
        type: "PUT",
        url: url,
        data: $("#idFormUsuarioEditar").serialize(),
        success: function (data) {
            if (data === 'success') {
                redirect('Usuarios');
                ok();
            } else {
                redirect('Usuarios');
                error();
            }
        },
        beforeSend: function () {
            $("#editar").prop('disabled', true);
        }
    });
}

//Anular o Activar
function actualizarUsuario(idu, idp, estado) {
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
                url: "/actualizarUsuario",
                type: "GET",
                data: {id: idu, idp: idp, estado: estado},
                success: function (data) {
                    if (data === 'success') {
                        redirect('Usuarios');
                        actualizado();
                    } else {
                        redirect('Usuarios');
                        error();
                    }
                }
            });
        }
    })
}