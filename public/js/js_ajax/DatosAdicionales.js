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

                    }
                    else {
                        if (data === 'error') {

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

                    }
                    else {
                        if (data === 'error') {

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

                    }
                    else {
                        if (data === 'error') {

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
        text: "Desea camvbiar de estado?",
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

                    }
                    else {
                        if (data === 'error') {

                        }
                    }

                }
            });

        }
    })


}

function redirect() {

}