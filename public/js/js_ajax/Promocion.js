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
    var url = "promocion/store";
    $.ajax({
        type: "POST",
        url: url,
        data: $("#idFormProducto").serialize(),
        success: function (data) {
            if (data === 'success') {
                redirect('promocion');
                ok();
            } else {
                redirect('promocion');
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
    var id = $('#idPromocion').val();
    var url = "promocion/" + id;
    $.ajax({
        type: "PUT",
        url: url,
        data: $("#idFormPromocion").serialize(),
        success: function (data) {
            if (data === 'success') {
                redirect('promocion');
                ok();
            } else {
                redirect('promocion');
                error();
            }
        },
        beforeSend: function () {
            $("#editar").prop('disabled', true);
        }
    });
}


//Activar y anular producto
function actualizarPromocion(id) {
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
                url: "/eliminarpromocion/"+id,
                type: "GET",
                success: function (data) {
                    if (data === 'success') {
                        redirect('promocion');
                        actualizado();
                    } else {
                        redirect('promocion');
                        error();
                    }
                }
            });
        }
    })
}


