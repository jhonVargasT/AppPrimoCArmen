
///agre
$("#usuarioLog").submit(function (e){
    e.preventDefault();
    var url = "create-usuario";//route
    $.ajax({
        type: "POST",//metodo envio
        url: url,
        data: $("#usuarioLog").serialize(),//enviar el formulario completo
        success: function (data) {
            //redireccionar a pagina
        }
    });
});