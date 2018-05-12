
$('#ingresar').click(function () {
       //registrar();
});

function registrar() {

    var url='create-usuario/log';
    $.ajax({
        type: "POST",
        url: url,
        data: $("#index ").serialize(),
        success: function (data) {
            if (data === 'success') {
                //ingresado('create-cliente');
                alert(data);
            } else {
                //no_ingresado('create-cliente');
                alert(data);
            }
        },
        beforeSend: function () {
            $("#ingresar").prop('disabled', true);
        }
    });
}