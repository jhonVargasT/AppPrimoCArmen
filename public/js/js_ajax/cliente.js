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
    var url = "create-cliente/store";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#idFormCliente").serialize(),
        success: function (data) {
            if (data === 'success') {
                redirect('create-cliente');
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
function editarCliente() {
    var id = $("#idCliente").val();
    var url = "create-cliente/" + id;
    $.ajax({
        type: "PUT",
        url: url,
        data: $("#idFormCliente").serialize(),
        success: function (data) {
            alert(data);
        },
        beforeSend: function () {
            $("#editar").prop('disabled', true);
        }
    });
}

//Anular o Activar
function actualizarCliente() {
    var id = $("#idCliente").val();
    var url = "create-cliente/" + id;
    $.ajax({
        type: "PUT",
        url: url,
        data: $("#idFormCliente").serialize(),
        success: function (data) {
            alert(data);
        },
        beforeSend: function () {
            $("#actualizar").prop('disabled', true);
        }
    });
}