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
    $("#idFormCliente").submit(function (e) {
        e.preventDefault();
        var url = "create-cliente/store";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#idFormCliente").serialize(),
            success: function (data) {
                alert(data);
                window.location.href = "create-cliente";
            },
            beforeSend: function () {

                $("#guardar").prop('disabled', true);
            }
        });
    });
}

//Actualizar Datos
function editarCliente() {
    var id = $("#idCliente").val();
    $("#idFormCliente").submit(function (e) {
        e.preventDefault();
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
    });
}

//Anular o Activar
function actualizarCliente() {
    var id = $("#idCliente").val();
    $("#idFormCliente").submit(function (e) {
        e.preventDefault();
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
    });
}
