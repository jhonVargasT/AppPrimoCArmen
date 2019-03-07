function agregarTipoPaquete() {
    "use strict";
    var nombpaquete = $('#tipopaquete').val();
    var url = "/agregartipopaquete/" + nombpaquete;
    swal({
        title: 'ALERTA',
        text: "Desea agregar un nuevo tipo de paquete?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, agregar!"
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "GET",
                url: url,
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    if (data === 'success') {
                        ok();
                        redirect('datosadicionales');

                    }
                    else {
                        if (data === 'error') {
                            error();
                            redirect('datosadicionales');
                        }
                    }

                }
            });
        }
    })
}

function agregarTipoProducto() {
    "use strict";
    var nombprodu = $('#tipoproducto').val();
    var url = "/agregartipoproducto/" + nombprodu;
    swal({
        title: 'ALERTA',
        text: "Desea agregar un nuevo tipo de producto?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, agregar!"
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "GET",
                url: url,
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    if (data === 'success') {
                        ok();
                        redirect('datosadicionales');
                    }
                    else {
                        if (data === 'error') {
                            error();
                            redirect('datosadicionales');
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
        url: "/Pedidos",
        dataType: "html",
        success: function (data) {
            $("#response").html(data);
        }
    });
}


function cambEstadoTipoProd(idtipoprodu) {
    "use strict";
    swal({
        title: 'ALERTA',
        text: "Desea cambiar de estado?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, cambiar!"
    }).then(function (result) {
        if (result.value) {
            var url = '/cambiarestadotipoproducto/' + idtipoprodu;
            $.ajax({
                type: "GET",
                url: url,
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    if (data === 'success') {
                        actualizado();
                        redirect('datosadicionales');
                    }
                    else {
                        if (data === 'error') {
                            error();
                            redirect('datosadicionales');
                        }
                    }

                }
            });
        }
    })


}

function cambEstadoTipoPaque(idtipopaque) {
    "use strict";
    swal({
        title: 'ALERTA',
        text: "Desea cambiar de estado?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, cambiar!"
    }).then(function (result) {
        if (result.value) {
            var url = '/cambiarestadotipopaquete/' + idtipopaque;


            $.ajax({
                type: "GET",
                url: url,
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    if (data === 'success') {
                        actualizado();
                        redirect('datosadicionales');
                    }
                    else {
                        if (data === 'error') {
                            error();
                            redirect('datosadicionales');
                        }
                    }

                }
            });

        }
    })


}

function cambiarNombre(id, nombre, tip) {
    "use strict";
    swal({
        title: 'ALERTA',
        text: "Desea camvbiar de estado?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si, cambiar!"
    }).then(function (result) {
        if (result.value) {
            var url = '/editartipos/' + id + '/' + nombre + '/' + tip;
            $.ajax({
                type: "GET",
                url: url,
                data: '_token = <?php echo csrf_token() ?>',
                success: function (data) {
                    if (data === 'success') {
                        ok();
                        redirect('datosadicionales');
                    }
                    else {
                        if (data === 'error') {
                            error();
                            redirect('datosadicionales');
                        }
                    }

                }
            });

        }
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