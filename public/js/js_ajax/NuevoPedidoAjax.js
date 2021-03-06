
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
                $("#tipousuario").val(data.tipusu);
                if (data.tipusu === 2) {
                    $("#tipousu").removeClass('text-purple');
                    $("#tipousu").text('MAYORISTA').addClass('text-success');
                }
                else {
                    $("#tipousu").removeClass('text-success');
                    $("#tipousu").text('MINORISTA').addClass('text-purple');
                }
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
                    $("#tipousuario").val(data.tipusu);
                    if (data.tipusu === 2) {
                        $("#tipousu").removeClass('text-purple');
                        $("#tipousu").text('MAYORISTA').addClass('text-success');
                    }
                    else {
                        $("#tipousu").removeClass('text-success');
                        $("#tipousu").text('MINORISTA').addClass('text-purple');
                    }
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
                    $("#tipousuario").val(data.tipusu);
                    if (data.tipusu === 2) {
                        $("#tipousu").removeClass('text-purple');
                        $("#tipousu").text('MAYORISTA').addClass('text-success');
                    }
                    else {
                        $("#tipousu").removeClass('text-success');
                        $("#tipousu").text('MINORISTA').addClass('text-purple');
                    }
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
    var dni = $("#dni").val();
    var url = "autocompletarproducto/" + idproducto + "/" + dni;
    $.ajax({
        type: "GET",
        url: url,
        cache: false,
        dataType: 'json',
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
            if (data.error === 1) {
                $('#hijos').remove()
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
                buscarPromocion(data.idproducto);
            } else {
                $('#hijos').remove()
                error();
            }
        }
    });
}

function autocompletarProductoPromocion() {
    "use strict";
    var idproducto = $("#nombre_producto").val();
    var dni = $("#dni").val();
    var idpromo = $("#Promocion option:selected").attr("id");
    // var idpromo = $("#Promocion").val();
    var url = "autocompletarproductopromocion/" + idproducto + "/" + dni + "/" + idpromo;
    if (idpromo !== '0') {
        $.ajax({
            type: "GET",
            url: url,
            cache: false,
            dataType: 'json',
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data.error === 1) {

                    $("#totpaque").html('');
                    $("#totunu").html('');
                    $("#total").html('');
                    $("#numero_paquetes").val(0);
                    $("#numero_unidades").val(0);
                    $("#sumtotales").html('');
                    $("#enviar").addClass('disabled');

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
                    // buscarPromocion(data.idproducto);
                } else {


                    $('#hijos').remove()
                    error();
                }
            }
        });
    }
    else {
        $("#totpaque").html('');
        $("#totunu").html('');
        $("#total").html('');
        $("#numero_paquetes").val(0);
        $("#numero_unidades").val(0);
        $("#sumtotales").html('');
        $("#enviar").addClass('disabled');
        buscarProductoNombre();
    }

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
                var totpaque = number_format(cantpaque * preciopaquetes,2);
                var totunidad = number_format(cantunidad * preciounidades,2);
                var total=number_format(parseFloat(parseFloat(totpaque)+parseFloat(totunidad)).toFixed(1),2);
                $("#totpaque").html(totpaque);
                $("#totunu").html(totunidad);
                $("#sumtotales").html(total);

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
    if (cantpaque === '') {
        $("#numero_paquetes").val(0);
    }
    if (cantunidad === '') {
        $("#numero_unidades").val(0);
    }
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
    $('#hijos').remove()

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
    var totalpaque = number_format(parseFloat($("#totpaque").text()).toFixed(1),2);
    var totaluni = number_format(parseFloat($("#totunu").text()).toFixed(1),2);
    var totalpro = number_format(parseFloat($("#sumtotales").text()).toFixed(1),2);
    var idpromo = $("#Promocion option:selected").attr("id");
    if (!$("#Promocion").length) {
        idpromo = 0;
    }
    var producto = {
        id: idproducto,
        nombre: nombreproducto,
        paquete: numeropaquete,
        montopaquete: totalpaque,
        unidades: numerounidades,
        montounidades: totaluni,
        idpromo: idpromo,
        total: totalpro
    };

    for (var i = 0; i < productos.length; i++) {
        if (productos[i]["id"] === producto["id"]) {
            productos[i]["paquete"] = producto["paquete"];
            productos[i]["montopaquete"] = producto["montopaquete"];
            productos[i]["unidades"] = producto["unidades"];
            productos[i]["montounidades"] = producto["montounidades"];
            productos[i]["idpromo"] = producto["idpromo"];
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
    sum=number_format(parseFloat(sum,2).toFixed(1),2);
    igv =number_format((parseFloat(sum) * 0.18),2);
    tot=number_format((sum - igv),2);
    $("#totalproducto").html(tot);
    $("#igv").html(igv);
    $("#total").html(sum);
}



async function pagar() {
    var estado, monto, vueltopago;
    var total = $('#total').text();
    const {value: formValues} = await Swal.fire({
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No, cancelar',
        confirmButtonText: 'Si, enviar',
        imageUrl: '../assets/img/logo/calculadora.png',
        imageWidth: 100,
        imageHeight: 100,
        imageAlt: 'Custom image',
        animation: false,
        showCancelButton: true,
        title: 'CALCULADORA',
        html:
        '<div><label class="swal2-text ">Monto que debe pagar</label> </div>' +
        '<input type="text" id="deuda" value="0" hidden>' +
        '<div><label class="swal2-text text-green">S./ ' + total + '</label> </div>' +
        '<div>' +
        '<input type="checkbox" id="cssCheckbox1"  onclick="quitarPago()">' +
        '<label for="cssCheckbox1" class="swal2-text text-blue">Credito (seleccione solo si va a fiar)</label>' +
        '</div>' +
        '<div id="poner" ><div id="paga">' +
        '<div><label class="swal2-text ">Paga con</label> </div>' +
        '<div><input id="monto" class="swal2-input col-3 number text-center" type="number" onkeyup="validarMonto(' + total + ')"></div>' +
        '<div id="vuelto">' +
        '</div>' +
        '</div></div>',
        focusConfirm: false,
        inputAttributes: {
            maxlength: 10
        },
        preConfirm: () => {
            return [
                $('#monto').val(),
                $('#vueltopago').text(),
                $('#deuda').val(),
            ]
        }
    })
    if (formValues) {
        estado=formValues[2];
        if (!formValues[1]) {
            monto = '0';
            vueltopago = '0';
        }
        else {
            monto = formValues[0];
            vueltopago = formValues[1];
        }

        enviarPedido(monto,vueltopago,estado);
    }
}

function validarMonto() {
    var valor = $('#monto').val();
    var total = $('#total').text()
    if (valor > 0) {
        var resta = valor - total
        if (resta >= 0) {
            $('#deuda').val(0);
            var html2 = '<div><label class="swal2-text text-green">VUELTO</label> </div>' +
                '        <div><label id="vueltopago" class="swal2-text ">' + number_format(parseFloat(parseFloat(resta)).toFixed(1), 2) + '</label> </div>';
            $('#vuelto').html(html2);
        }
        else {
            $('#deuda').val(1);
            var html2 = '<div><label class="swal2-text text-red">DEUDA</label> </div>' +
                '        <div><label id="vueltopago" class="swal2-text text-red">' + number_format(parseFloat(parseFloat(resta)).toFixed(1), 2) + '</label> </div>' +
                '<div><label class="swal2-text text-red">Este monto se agregara a la deuda del cliente</label> </div>';
            $('#vuelto').html(html2)
        }
    }
    else {
        $('#deuda').val(0);
        var html2 = '<div><label class="swal2-text text-red">Verifique el monto</label> </div>';
        $('#vuelto').html(html2);
    }
}

function quitarPago() {
    //var chec=$('#cssCheckbox1').;
    //  console.log(chec);

    if (document.getElementById('cssCheckbox1').checked) {
        $('#deuda').val(1);
        console.log('yes');
        $('#vuelto').remove();
        $('#paga').remove();

    } else {
        $('#deuda').val(0);
        var html = $('#poner').html();
        var html2 = '<div id="paga">' +
            '<div><label class="swal2-text ">Paga con</label> </div>' +
            '<div><input id="monto" class="swal2-input col-3 number text-center" type="number" min="0"' +
            ' onkeyup="validarMonto()" ></div></div>' +
            '<div id="vuelto">' +
            ' </div> ' +
            '</div>';
        html = html + html2;
        $('#poner').html(html);
    }

}

function llenarTabla() {

    $('#data-table-fixed-header').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        responsive: true,
        bAutoWidth: true,
        destroy: true,
        processing: true,
        select: true,
        data: productos,
        aaSorting: [[0, "asc"]],
        columnDefs: [
            {
                "targets": 0,
                "className": "text-center",
            },{
                "targets": 2,
                "className": "text-center",
            },{
                "targets": 3,
                "className": "text-center",
            },
            {
                "targets": 4,
                "className": "text-center",
            },
            {
                "targets": 5,
                "className": "text-center",
            },
            {
                "targets": 6,
                "className": "text-center",
            },
            {
                "targets": 7,
                "className": "text-center",
            },

        ],
        columns: [
            {title: "Codigo", data: ['id']},
            {title: "Nombre producto", data: ['nombre']},
            {title: "Cant paquete", data: ['paquete']},
            {title: "Monto paquete", data: ['montopaquete']},
            {title: "Cant unidades", data: ['unidades']},
            {title: "Monto unidades", data: ['montounidades']},
            {title: "Monto total", data: ['total']},
            {
                data: function (row) {
                    return '<th>\n' +
                        /*'<a href="#modal-dialog" style="color: green" TITLE="Editar"   data-toggle="modal" onclick="editarProducto(event,' + row.nombre + ')">\n' +
                        '<i class="far fa-lg fa-fw m-r-10 fa-edit"> </i></a>\n' +*/
                        '<a href="#" style="color: red" TITLE="Anular" onclick="eliminarProductoTabla(' + row.id + ')" >\n' +
                        '<i class="fas fa-lg fa-fw m-r-10 fa-times"> </i></a>\n' +
                        '</th>';
                }
            }
        ]
    });


}


function eliminarProductoTabla(id) {

    swal.fire({
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
                    /*  alert(productos[i]['id'].toString());*/
                    productos.splice(i, 1);
                }
            }
            llenarTabla();
            modificarTotal();
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
    toast.fire({
        type: 'success',
        title: 'Registro correcto, pedido numero '+data
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
function enviarPedido(monto,vuelto,estado) {
    "use strict";
    var idpersona = $('#idpersona').val();
    var iddireccion = $('#direcciones').find('option:selected').attr('id');
    var fechaentrega = new Date($('#datepicker-autoClose').val());
    var costototal = $('#total').text();
    var tipousuario = $("#tipousuario").val();

    var datosper = {
        persona: idpersona,
        tienda: iddireccion,
        fechaentrega: fechaentrega,
        tipousuario: tipousuario,
        total: costototal,
        monto:monto,
        vuelto:vuelto,
        estado:estado

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
            if (data.error === 0) {
                if(data.url===0){
                    correcto(data.id);
                    redirectadministrador();
                }
                else {
                    correcto(data.id);
                    redirectvendedor();
                }
            }
            else {
                redirect();
                error(data.error);
            }

        }, beforeSend: function () {
            $("#enviarpedido").prop('disabled', true);
        }
    });
}
function redirectvendedor() {
    $.ajax({
        type: "GET",
        url: "/reportevendedor",
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


function buscarPromocion(id) {
    $.ajax({
        type: "GET",
        url: "/listarPromocionProducto/" + id,
        cache: false,
        dataType: 'json',
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {

            if (data.length > 0) {
                $("#direcciones").attr('disabled', false);

                //alert(response); // show [object, Object]

                var html = ' <div class="form-group row " id="hijos"> <div class="col-md-4 col-sm-4 col-form-label" >\n' +
                    '                            <label class=" col-form-label text-left" for="Promocion"> <strong>Promocion\n' +
                    '                                     </strong></label>\n' +
                    '                        </div>\n' +
                    '                        <div class="col-md-7 col-sm-7">\n' +
                    '                            <select id="Promocion" class="form-control" onchange="autocompletarProductoPromocion()" >\n' +
                    '                                <option>\n' +
                    '                                    Seleccione\n' +
                    '                                </option>\n' +
                    '                            </select>\n' +
                    '                        </div></div>';
                $('#promociones').html(html);

                var $select = $('#Promocion');
                //  console.log( data["value"]);
                $select.find('option').remove();
                $select.append('<option id="0">Seleccione </option>');
                for (var i = 0; i < data.length; i++) {
                    $select.append('<option id=' + data[i].id + ' >' + data[i].value + '</option>');
                }
            }
        }
    });
}


function agregarPromocion(promocion) {
    console.log(promocion);


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

function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0)
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

  /*  while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');*/

    return amount_parts.join('.');
}