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
            if (data === 'sucess') {
                $("#modal-dialog").modal('fade');
                redirect('Productos');
                ok();
            } else {
                $("#modal-dialog").modal('fade');
                redirect('Productos');
                error();
                alert(data);
            }
        }
    });
}

function actualizarProducto(id, estado) {
    swal({
        title: 'Esta seguro?',
        text: "Este registro se actualizara!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, actualizar!",
        showLoaderOnConfirm: true
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: "/actualizarProducto",
                type: "GET",
                data: {id: id, estado: estado},
                success: function (data) {
                    if (data === 'success') {
                        redirect('Productos');
                    } else {
                        redirect('Productos');
                    }
                }
            });
        }
    })
}