function activarDesactivarProductoPromocion(id,estado,tipo,prod,prom) {

     swal.fire({
         title: 'Esta seguro?',
         text: "Este registro se actualizara!",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: "Si, actualizar!"
     }).then(function (result) {
        if (result.value) {
             $.ajax({
                 url: '/verpromocionproducto/'+id+'/'+estado+'/'+tipo+'/'+prod+'/'+prom,
                 type: "GET",
                 success: function (data) {
                     if (data.error === 1) {
                     actualizado();
                       redirect(data.id);
                     } else {
                         error();
                         redirect(data.id);
                     }
                 }
             });
         }
     })
}

function redirect(id) {
    $.ajax({
        type: "GET",
        url: "/verpromocionproducto/"+id,
        dataType: "html",
        success: function (data) {
            $("#response").html(data);
        }
    });
}


function actualizado() {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast.fire({
        type: 'success',
        title: 'Datos actualizados'
    })
}

function error() {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    toast.fire({
        type: 'error',
        title: 'Error'
    })
}