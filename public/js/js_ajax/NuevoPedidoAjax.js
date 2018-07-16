//Crear Datos

var productos;

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
            else
                error();
        }

    });
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

/*
function anadirProductoATabla() {
    var idproducto = $("#nombre_producto").val();
    var nombreproducto = $("#nompro").text();
    var numeropaquete = $("#numero_paquetes").val();
    var numerounidades = $("#numero_unidades").val();
    var total = $("#total").text();

    var producto=[idproducto,nombreproducto,numeropaquete,numerounidades,total];
    var productos=[];
     productos.push(producto);
    console.log(productos);
    $("#modal-dialog").modal("hide");
    /*$('#data-table-fixed-header').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        processing: true,
        serverSide: true,
        select: true,
        rowId: 'id',

        columns: [
        {data: 'pnombres', name: 'pnombres'},
        {data: 'pnroCelular', name: 'pnroCelular'},
        {data: 'pcorreo', name: 'pcorreo'},
        {data: 'pdni', name: 'pdni'},
        {data: 'pruc', name: 'pruc'},
        {data: 'pdireccion', name: 'pdireccion'},
        {data: 'tnombreTienda', name: 'tnombreTienda'},
        {data: 'dtnombreCalle', name: 'dtnombreCalle'},
        {
            data: function (row) {
                if (row.pestado === '1') {
                    return '<label class="text-success">ACTIVO</label>';
                }
                else {
                    return '<label class="text-danger">ANULADO</label>';
                }
            }
        },
        {
            data: function (row) {
                if (row.pestado === '1') {
                    return '<div align="center">\n' +
                        '<a href="#" style="color: red" TITLE="Anular" onclick="actualizarCliente(' + row.idPersona + ',' + row.tidTienda + ',' + row.dtidDireccionTienda + ',0)">\n' +
                        '<i class="fas fa-lg fa-fw m-r-10 fa-times"> </i></a>\n' +
                        '<a href="Cliente/' + row.idPersona +'-'+ row.dtidDireccionTienda + '/edit" style="color: green" TITLE="Editar" data-toggle="ajax">\n' +
                        '<i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>\n' +
                        '</div>';
                } else {
                    return '<div align="center">\n' +
                        '<a href="#" style="color: green" TITLE="Activar" onclick="actualizarCliente(' + row.idPersona + ',' + row.tidTienda + ',' + row.dtidDireccionTienda + ',1)">\n' +
                        '<i class="fas fa-lg fa-fw m-r-10 fa-plus"> </i></a>\n' +
                        '<a href="Cliente/' + row.idPersona +'-'+ row.dtidDireccionTienda + '/edit" style="color: green" TITLE="Editar" data-toggle="ajax">\n' +
                        '<i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>\n' +
                        '</div>';
                }
            }
        }
    ]
});

}*/






