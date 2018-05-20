$('#guardar').click(function () {
    registrarProducto();
});

$('#editar').click(function () {
    editarProducto();
});

$('#actualizar').click(function () {
    actualizarProducto();
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
    var id = $("#idFormProducto").val();
    var url = "Producto/" + id;
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
function actualizarProducto() {
    var id = $("#idProducto").val();
    var url = "Producto/" + id;
    $.ajax({
        type: "PUT",
        url: url,
        data: $("#idFormProdcuto").serialize(),
        success: function (data) {
            alert(data);
        },
        beforeSend: function () {
            $("#actualizar").prop('disabled', true);
        }
    });
}

//Actualizar Stock
function actualizarStockModal(id) {
    var url = "/actualizarStockModal";
    $.ajax({
        type: "GET",
        url: url,
        data: '&id='+id,
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
        data: '&id='+id+'&paquete='+paquete+'&unidad='+unidad,
        success: function (data) {
            if(data !== 'sucess'){
                $('#modal-dialog').modal('hide');
                error();
            }else{
                $('#modal-dialog').modal('hide');
                ok();
            }
        }
    });
}

function cerrarModal() {
    $('#nombre').val('');
    $('#stock').val('');
    $('#paquete').val('');
    $('#unidad').val('');
    $('#modal-dialog').modal('hide');
}