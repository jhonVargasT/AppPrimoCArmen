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

//Anular o Activar
/*function actualizarProducto(id, estado) {
    var url = "/actualizarProducto";
    $.ajax({
        type: "PUT",
        url: url,
        data: '$id='+id+'estado='+estado,
        success: function (data) {
            alert(data);
        },
        beforeSend: function () {
            $("#actualizar").prop('disabled', true);
        }
    });
}*/

//Actualizar Stock
function actualizarStockModal(id) {
    var url = "/actualizarStockModal";
    $.ajax({
        type: "GET",
        url: url,
        data: '&id=' + id,
        success: function (data) {
            $("#nombre").val(data[0]);
            $("#stock").val(data[1]);
            $("#idProducto").val(data[2]);
            $('#modal-dialog').modal('show');
        }
    });
}

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
            if (data !== 'sucess') {
                $('#modal-dialog').modal('hide');
                redirect('Productos');
                error();
            } else {
                $('#modal-dialog').modal('hide');
                redirect('Productos');
                ok();
            }
        }
    });
}

function actualizarProducto(id, estado) {
    swal.setDefaults({
        cancelButtonText: "Cancelar"
    });
    swal({
        title: "Estas seguro?",
        text: "Este registro se anulara!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, anular!",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (!isConfirm) return;
        $.ajax({
            url: "/actualizarProducto",
            type: "GET",
            data: {id: id, estado: estado},
            success: function () {
                swal("Done!", "It was succesfully deleted!", "success");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
            }
        });
    });
}