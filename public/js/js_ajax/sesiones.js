
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