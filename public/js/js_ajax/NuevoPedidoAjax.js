
//Crear Datos
function autoCompletar() {
    "use strict";
    var dni=$("#dni").val();
    var url = "autocompletarpedidodni/"+dni;
   $.ajax({
        type: "GET",
        url: url,
        data:'_token = <?php echo csrf_token() ?>',
       success:function(data){
            if(data.error===0) {
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

function llenarOption() {
    "use strict";
    var idtienda=$("#idtienda").val();
    var url = "autocompletarselectdirecciones/"+idtienda;
    $.ajax({
        type: "GET",
        url: url,
        cache:false,
        dataType:'json',
        data:'_token = <?php echo csrf_token() ?>',
        success:function(data){
            $("#direcciones").attr('disabled', false);

            //alert(response); // show [object, Object]

            var $select = $('#direcciones');

            $select.find('option').remove();
            for (var i=0;i<data.length;i++){
                $select.append('<option id='+ data[i].key+'>'+ data[i].value+'</option>');
            }

        }

    });
}
