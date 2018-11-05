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
                if (data.error === 0) {
                    $("#dni").val(data.dni);
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
                if (data.error === 0) {
                    $("#dni").val(data.dni);
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
                $("#id_producto").val(data.idproducto);
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
                $("#sumtotales").html(totunidad + totpaque);

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
    var idproducto = $("#id_producto").val();
    var nombreproducto = $("#nompro").text();
    var numeropaquete = $("#numero_paquetes").val();
    var numerounidades = $("#numero_unidades").val();
    var totalpro = $("#sumtotales").text();

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
    var igv = 0;
    var tot = 0;
    for (var i = 0; i < productos.length; i++) {
        sum = sum + parseFloat(productos[i]["total"]);
    }
    $("#totalproducto").html(sum);
    igv = (sum * 0.18);
    $("#igv").html(igv);
    tot = sum + igv;
    $("#total").html(tot);
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

function correcto(data) {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast({
        type: 'success',
        title: 'Registro correcto, pedido numero ' + data
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

//reparar esta mierda
function enviarPedido() {
    "use strict";
    var idpersona = $('#idpersona').val();
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

    var url = "enviarpedidosTienda/" + arr;
    $.ajax({
        type: "GET",
        url: url,
        cache: false,
        dataType: 'json',
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
            if (data.error === 0) {
                correcto(data.id);
                agreimpirmir(data.id);

            }
            else {
                //   redirect();
                error(data.error);
            }

        }, beforeSend: function () {
            $("#enviarpedido").prop('disabled', true);
        }
    });
}

function agreimpirmir(id) {
    'use strict';

    $('#opc').remove();
    var html = '  <a href="/compilarticket/'+id+'" class="btn btn-primary"  title="Imprimir nota de venta" onclick="redirectvendedor()">' +
        '<i  class=" fas fa-lg fa-fw  fa-print"></i> Imprimir nota</a>';
    $('#impirmir').html(html);
}

function print(id) {
    $.ajax({
        type: "GET",
        url: "/compilarticket/1",
        dataType: "html",
        success: function () {
            window.location = url;
        }
    });
}

function redirectvendedor() {
    $.ajax({
        type: "GET",
        url: "/tienda",
        dataType: "html",
        success: function (data) {
            $("#response").html(data);
        }
    });
}

function redirectadministrador() {
    $.ajax({
        type: "GET",
        url: "/Pedidos",
        dataType: "html",
        success: function (data) {
            $("#response").html(data);
        }
    });
}

//autocompletado

//ID DEL INPUT
$('#txt_usuario').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    },
    {
        name: 'data',
        displayKey: 'name',
        source: function (query, process) {
            $.ajax({
                url: "/autocomplete/filtrarUsuario",//RUTA
                type: 'GET',
                data: 'query=' + query,
                dataType: 'JSON',
                async: 'false',
                success: function (data) {
                    bondObjs = {};
                    bondNames = [];
                    $.each(data, function (i, item) {
                        bondNames.push({id: item.id, name: item.name, codigo: item.codigo});
                        bondObjs[item.id] = item.id;
                        bondObjs[item.name] = item.name;
                        bondObjs[item.codigo] = item.codigo;
                    });
                    process(bondNames);
                }
            });
        }
    }).on('typeahead:selected', function (even, datum) {
    $("#txt_usuario_id").val(bondObjs[datum.id]);//IMPRIMIR EL ID DEL RESULTADO SELECCIONADO EN UN INPUT
});

