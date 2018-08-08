
var productos = [];

/*$(document).ready(function () {
    llenarTabla();
});*/

function autoCompletar() {
    "use strict";
    var dni = $("#dni").val();
    var url = "autocompletarpedidodni/" + dni;
    $.ajax({
        type: "GET",
        url: url,
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
            if (data.error === 0) {
                $("#nombresapellidos").val(data.nombre);
                $("#nombretienda").val(data.tienda);
                $("#idtienda").val(data.idtienda);
                $("#idpersona").val(data.idpersona);
            }
            else {
                error('Usuario no esta registrado!');
                limpiarDatos();
            }
        }

    });
}

function limpiarDatos() {
    $("#nombresapellidos").val('');
    $("#nombretienda").val('');
    $("#idtienda").val('');
    $("#idpersona").val('');
}

function completarTienda() {
    "use strict";
    var nombretienda = $("#nombretienda").val();
    var url = "autocompletarnombretienda/" + nombretienda;
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {

            }
        }
    );
}


function completarNombresApellidos() {
    "use strict";
    var nombresapellidos = $("#nombresapellidos").val();
    var url = "autocompletarnombresapellidos/" + nombresapellidos;
    $.ajax(
        {
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                $('#nombresapellidos').typeahead({
                    source: function (data, process) {
                        return $.get('/typeahead', {query: query}, function (data) {
                            return process(data.options);
                        });
                    }
                });
            }

        }
    );
}

function llenarDireccion() {
    "use strict";
    var idtienda = $("#idtienda").val();
    var url = "autocompletarselectdirecciones/" + idtienda;
    $.ajax({
        type: "GET",
        url: url,
        cache: false,
        dataType: 'json',
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
            $("#direcciones").attr('disabled', false);

            //alert(response); // show [object, Object]

            var $select = $('#direcciones');

            $select.find('option').remove();
            for (var i = 0; i < data.length; i++) {
                $select.append('<option id=' + data[i].key + '>' + data[i].value + '</option>');
            }

        }

    });
}

function buscarProductoNombre() {
    "use strict";
    var idproducto = $("#nombre_producto").val();
    var url = "autocompletarproducto/" + idproducto;
    $.ajax({
        type: "GET",
        url: url,
        cache: false,
        dataType: 'json',
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
            if (data.error === 1) {
                $("#nompro").html(data.nombre);
                $("#tippro").html(data.tipoproducto);
                $("#tippa").html(data.tipopaquete);
                $("#capa").html(data.cantpaquuni);

                $("#cantidadpa").html(data.cantidadpaq);
                $("#preciopa").html(data.precioventapaq);
                $("#cantidadun").html(data.cantidaduni);
                $("#precioun").html(data.precioventauni);
                $("#numero_paquetes").attr('max', data.cantidadpaq);
                $("#numero_unidades").attr('max', data.cantidaduni);
                $("#numero_paquetes").removeAttr('readOnly');
                $("#numero_unidades").removeAttr('readOnly');
            } else {
                error();
            }
        }
    });
}

function mostrarMonto() {
    "use strict";
    var preciopaquetes = $("#preciopa").text();
    var preciounidades = $("#precioun").text();
    var cantpaque = $("#numero_paquetes").val();
    var cantunidad = $("#numero_unidades").val();
    var cantstockpaque = parseInt($("#cantidadpa").text());
    var cantstockunidad = parseInt($("#cantidadun").text());

    if (cantpaque > cantstockpaque) {
        $("#numero_paquetes").val(cantstockpaque);
        mostrarMonto();
    }
    else {
        if (cantunidad > cantstockunidad) {
            $("#numero_unidades").val(cantstockunidad);
            mostrarMonto();
        }
        else {
            if (cantpaque >= 0 && cantunidad >= 0) {
                var totpaque = cantpaque * preciopaquetes;
                var totunidad = cantunidad * preciounidades;
                $("#totpaque").html(totpaque);
                $("#totunu").html(totunidad);
                $("#total").html(totunidad + totpaque);

            }
            else {
                $("#numero_paquetes").val(Math.abs(cantpaque));
                $("#numero_unidades").val(Math.abs(cantunidad));
                mostrarMonto();
            }
        }
    }
    activarBoton();
}

function activarBoton() {
    "use strict";
    var cantpaque = $("#numero_paquetes").val();
    var cantunidad = $("#numero_unidades").val();
    if (cantpaque === 0 && cantunidad === 0) {
        $("#enviar").addClass('disabled');
    }
    else {
        $("#enviar").removeClass('disabled');
    }

}

function resetearModal() {

    $("#nompro").html('');
    $("#tippro").html('');
    $("#tippa").html('');
    $("#capa").html('');
    $("#cantidadpa").html('');
    $("#preciopa").html('');
    $("#cantidadun").html('');
    $("#precioun").html('');
    $("#totpaque").html('');
    $("#totunu").html('');
    $("#total").html('');
    $("#numero_paquetes").val(0);
    $("#numero_unidades").val(0);
    $("#nombre_producto").val('');
    $("#enviar").addClass('disabled');

}

function activarBotonAnadirProducto() {
    var nombap = $("#nombresapellidos").val();
    var nombti = $("#nombretienda").val();
    var dni = $("#dni").val();
    var dire = $("#direcciones").val();
    var fech = $("#datepicker-autoClose").val();
    if (nombap === "" || nombti === "" || dni === "" || dire === "Seleccione" || fech === "") {
        $("#anadirproducto").addClass('disabled');
    }

    else {
        $("#anadirproducto").removeClass('disabled');
    }
}


function anadirProductoATabla() {
    var res = false;
    var idproducto = $("#nombre_producto").val();
    var nombreproducto = $("#nompro").text();
    var numeropaquete = $("#numero_paquetes").val();
    var numerounidades = $("#numero_unidades").val();
    var totalpro = $("#total").text();

    var producto = {
        id: idproducto,
        nombre: nombreproducto,
        paquete: numeropaquete,
        unidades: numerounidades,
        total: totalpro
    };

    for (var i = 0; i < productos.length; i++) {
        if (productos[i]["id"] === producto["id"]) {
            productos[i]["paquete"] = producto["paquete"];
            productos[i]["unidades"] = producto["unidades"];
            productos[i]["total"] = producto["total"];
            res = true;
        }
    }
    if (res === false) {
        productos.push(producto);
    }

    llenarTabla();
    modificarTotal();
}

function modificarTotal() {
    var sum = 0;
    for (var i = 0; i < productos.length; i++) {
        sum = sum + parseInt(productos[i]["total"]);
    }
    $("#totalproducto").html(sum);
}

function llenarTabla() {

    $('#data-table-fixed-header').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        destroy: true,
        processing: true,
        select: true,
        data: productos,
        columns: [
            {title: "Codigo", data: ['id']},
            {title: "Nombre producto", data: ['nombre']},
            {title: "Cant paquete", data: ['paquete']},
            {title: "cant unidade", data: ['unidades']},
            {title: "Monto total", data: ['total']},
            {
                data: function (row) {
                    return '<div align="center">\n' +
                        '<a href="#modal-dialog" style="color: green" TITLE="Editar"   data-toggle="modal" onclick="editarProducto(event,' + row.id + ')">\n' +
                        '<i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>\n' +
                        '<a href="#" style="color: red" TITLE="Anular" onclick="eliminarProductoTabla(' + row.id + ')" >\n' +
                        '<i class="fas fa-lg fa-fw m-r-10 fa-times"> </i></a>\n' +
                        '</div>';
                }
            }
        ]
    });


}

function eliminarProductoTabla(id) {
    swal({
        title: 'Esta seguro?',
        text: "Este registro se eliminara!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Eliminar!"
    }).then(function (result) {
        if (result.value) {
            var posicion;
            for (var i = 0; i < productos.length; i++) {
                if (productos[i]['id'].toString() === id.toString()) {
                    productos.splice(0, 1);
                }
            }
            llenarTabla();
        }
    })

}

function dataDuplicada() {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast({
        type: 'error',
        title: 'No puede elegir el mismo producto dos veces'
    })
}

function editarProducto(event, id) {
    event.preventDefault();
    resetearModal();
    var res = false;
    for (var i = 0; i < productos.length; i++) {
        if (productos[i]['id'].toString() === id.toString()) {
            $('#nombre_producto').val(productos[i]['id']);
            $('#numero_paquetes').val(productos[i]['paquete']);
            $('#numero_unidades').val(productos[i]['unidades']);
            res = true;
        }
    }
    if (res) {
        buscarProductoNombre();
        mostrarMonto();
    }
}

function enviarPedido() {
    "use strict";
    var idpersona = $('#idtienda').val();
    var iddireccion = $('#direcciones').find('option:selected').attr('id');
    var fechaentrega = new Date($('#datepicker-autoClose').val());
    var costototal = $('#totalproducto').text();
    var datosper = {
        persona: idpersona,
        tienda: iddireccion,
        fechaentrega: fechaentrega,
        total: costototal
    };

    var datos = {persona: datosper, productos: productos};
    var arr = JSON.stringify(datos);

    var url = "enviarpedidos/" + arr;
    $.ajax({
        type: "GET",
        url: url,
        cache: false,
        dataType: 'json',
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
            if (data.error === 1) {
                redirect(data.url);
                gogogo();
            }
            else {
                redirect(data.url);
                error(data.error);
            }

        }, beforeSend: function () {
            $("#enviarpedido").prop('disabled', true);
        }
    });
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



