$(document).ready(function () {
    productoMasVendido();
    cantclientes();
    cantProductos();
    cajaDiaria();
    cajaMensual();
});


function productoMasVendido() {
    "use strict";
    var url = "/obetnerProductoMasVendido";
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data.error === 1) {
                    if (data.nomb === null) {
                        $('#productoVendido').text('no hay ventas');
                    } else {
                        $('#productoVendido').text(data.nomb);
                    }
                }
                else
                    alert('nohay');

            }

        }
    );
}


function cantclientes() {
    "use strict";
    var url = "/obtenerClientes";
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data.error === 1) {
                    if (data.cant === null) {
                        $('#cantcliente').text('no hay ventas');
                    } else {
                        $('#cantcliente').text(data.cant);
                    }
                }
                else
                    alert('nohay');

            }

        }
    );
}


function cantProductos() {
    "use strict";
    var url = "/totalProductosVendidos";
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data.error === 1) {
                    if (data.cant === null) {
                        $('#provendi').text(0.00);
                    } else {
                        $('#provendi').text(data.cant);
                    }
                }
                else
                    alert('nohay');

            }

        }
    );
}


function cajaDiaria() {
    "use strict";
    var url = "/cajaDiaria";
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data.error === 1) {
                    if (data.tot === null) {
                        $('#cajadia').text(0.00);
                    } else {
                        $('#cajadia').text(data.tot);
                    }
                }
                else
                    alert('nohay');

            }

        }
    );
}


function cajaMensual() {
    "use strict";
    var url = "/cajaMensual";
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data.error === 1) {
                    if (data.tot === null) {
                        $('#cajames').text(0.00);
                    } else {
                        $('#cajames').text(data.tot);
                    }
                }
                else
                    alert('nohay');

            }

        }
    );
}