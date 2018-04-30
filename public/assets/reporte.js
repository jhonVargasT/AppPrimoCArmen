$(document).on('change', 'input[type="checkbox"]', function (e) {
    'use strict';
    if (this.id === "clientecheck") {
        if (this.checked) {
            agrhtml('cliente','Cliente');
        }
        else {
            elimhtml('cliente','Cliente');
        }

    }
    if (this.id === "productocheck") {
        if (this.checked) {
            agrhtml('producto','Producto');
        }
        else {
            elimhtml('producto','Producto');
        }

    }
    if (this.id === "distritocheck") {
        if (this.checked) {
            agrhtml('distrito','Distrito');
        }
        else {
            elimhtml('distrito','Distrito');
        }

    }

    if (this.id === "estadocheck") {
        if (this.checked) {
            agrhtml('vendedor','Vendedor');
        }
        else {
            elimhtml('vendedor','Vendedor');
        }
    }
});
function elimhtml(idopc,nombre) {
    'use strict';
    $('#'+nombre+'').remove();

}

function agrhtml(idopc,nombre) {
    'use strict';
    var html = $('#busqueda').html();
   var html2 = ' <div class="form-group  col-md-4" id="'+nombre+'">'+
        '<label class="col-form-label text-md-left"> '+nombre+'</label>'+
        '<input type="text" class="form-control" id="'+idopc+'"> </div>';
    html = html + html2;
    $('#busqueda').html(html);
}

function cambiarEstado(event) {
    'use strict';
    event.preventDefault();

}