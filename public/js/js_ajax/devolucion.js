function agregarDevolucion() {
    "use strict";
    var nombreproducto = $('#nombreproducto').val();
    var cantuni = $('#cantuni').val();
    var motivo = $('#motivo').val();
    var url = "/enviarDevolucion/" + nombreproducto + '/' + cantuni + '/' + motivo;
    swal({
        title: 'ALERTA',
        text: "Desea agregar una devolucion?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, agregar!"
    }).then(function (result) {
        if (result.value) {
            //  alert('aqui');
            $.ajax({
                type: "GET",
                url: url,
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    if (data === 'success') {
                        ok();
                        redirect();

                    }
                    else {
                        if (data === 'error') {
                            error();
                            redirect();
                        }
                    }

                }
            });
        }
    })
}

function redirect() {
    $.ajax({
        type: "GET",
        url: "/devolucion",
        dataType: "html",
        success: function (data) {
            $("#response").html(data);
        }
    });
}
function eliminar(id) {
    swal({
        title: 'Esta seguro?',
        text: "Este registro se cambiara de estado!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, cambiar!"
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: "/eliminardevolucion/"+id,
                type: "GET",
                success: function (data) {
                    if (data === 'success') {
                        ok();
                        redirect();
                    } else {
                        error();
                        redirect();
                    }
                }
            });
        }
    })
}
function cambiar(id) {
    swal({
        title: 'Desea hacer el cambio de producto al cliente?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, cambiar!"
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: "/devolver/"+id,
                type: "GET",
                success: function (data) {
                    if (data === 'success') {
                        ok();
                        redirect();
                    } else {
                        error();
                        redirect();
                    }
                }
            });
        }
    })
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
    toast({
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
    toast({
        type: 'error',
        title: 'Error'
    })
}