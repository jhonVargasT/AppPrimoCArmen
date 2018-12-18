function obtenerSession() {
    "use strict";
    var url = "session";
    $.ajax({
        type: "GET",
        url: url,
        data: '_token = <?php echo csrf_token() ?>',
        success: function (data) {
            $("#usuario").text(data.nombape);
        }

    });
}

function cambiarContrasenia() {
    var paswword1 = $('#password').val();
    var paswword2 = $('#password2').val();
    var texto = $("#aviso");
    if (paswword1 === paswword2) {
        "use strict";

        var paswword = $('#password').val();
        var url = "/cambiarcontra/" + paswword;
        $.ajax({
            type: "GET",
            url: url,
            data: '_token = <?php echo csrf_token() ?>',
            success: function (data) {
                if (data === 'success')
                    ok('contraseña actualizada!');
                else
                    error('No se actualizo la contraseña');
                resetearModal();
                $("#error").remove();
            }

        });
    }
    else {
        error('No se actualizo la contraseña');
        $("#error").remove();
    }

}

function compararContrasenias() {
    var paswword1 = $('#password').val();
    var paswword2 = $('#password2').val();
    var texto = $("#aviso");
    console.log(paswword2 + ' ' + paswword1);
    if (paswword1 === paswword2) {
        $("#enviar").removeClass('disabled');
        $("#error").remove();
        $("#aviso").append(' <label class=\"col-md-12 col-form-label text-md-center\" style=\"color: green\" id="error">Las contraseñas coinciden</label>');
    }
    else {
        $("#enviar").addClass('disabled');
        $("#error").remove();
        $("#aviso").append(' <label class="col-md-12 col-form-label text-md-center" style="color: red" id="error">Las contraseñas no coinciden</label>');
    }
}

function error(mensaje) {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast({
        type: 'error',
        title: mensaje
    })
}

function ok(mensaje) {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast({
        type: 'success',
        title: mensaje
    })
}

function resetearModal() {
    $("#password").val('');
    $("#password2").val('');
    $("#aviso").text('');

}