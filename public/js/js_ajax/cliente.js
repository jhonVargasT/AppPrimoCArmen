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
                //ingresado('create-cliente');
                alert(data);
            } else {
                //no_ingresado('create-cliente');
                alert(data);
            }
        },
        beforeSend: function () {
            $("#guardar").prop('disabled', true);
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

function no_ingresado(url) {
    window.location.href = url;
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: true,
        timer: 3000
    });

    toast({
        type: 'error',
        title: 'Registrado Insatisfactoriamente'
    });
}

function ingresado(url) {
    window.location.href = url;
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: true,
        timer: 3000
    });

    toast({
        type: 'success',
        title: 'Registrado Satisfactoriamente'
    });
}
