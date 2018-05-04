
$("#idForm").submit(function (e){
    e.preventDefault();
    var url = "create-cliente";//route
    $.ajax({
        type: "POST",//metodo envio
        url: url,
        data: $("#idForm").serialize(),//enviar el formulario completo
        success: function (data) {
            //redireccionar a pagina
        }
    });
});