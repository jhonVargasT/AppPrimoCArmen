$('#guardar').click(function () {
    registrarUsuario();
});

$('#editar').click(function () {
    editarUsuario();
});

$('#actualizar').click(function () {
    actualizarUsuario();
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
    var id = $("#idCliente").val();
    var url = "Usuario/" + id;
    $.ajax({
        type: "PUT",
        url: url,
        data: $("#idFormUsuario").serialize(),
        success: function (data) {
            alert(data);
        },
        beforeSend: function () {
            $("#editar").prop('disabled', true);
        }
    });
}

//Anular o Activar
function actualizarUsuario() {
    var id = $("#idCliente").val();
    var url = "Usuario/" + id;
    $.ajax({
        type: "PUT",
        url: url,
        data: $("#idFormUsuario").serialize(),
        success: function (data) {
            alert(data);
        },
        beforeSend: function () {
            $("#actualizar").prop('disabled', true);
        }
    });
}