


function agregardireccion(event) {
    "use strict";
    event.preventDefault();
    var html, html2,value,value2;
    var valores=[];
    var click=document.getElementById("val1").value;
    var cont=0;
    for(var i=0;i<click;i++)
    {
        cont++;
        value= document.getElementById("dir"+cont).value;
        value2= document.getElementById("dist"+cont).value;
        valores.push([value,value2]);
    }
    click++;
    html = $('#dir').html();
    html2 = ' <div class="form-group row m-b-10">'+
        '<label class="col-md-3 col-form-label text-md-right">Distrito '+click+'<span class="text-danger">*</span></label>'+
        '<div class="col-md-6"> <input type="text" id="dist'+click+'" class="form-control" data-parsley-group="step-3" data-parsley-required="true"'+
        'data-parsley-type="alphanum"/> </div> </div>' +
        '<div class="form-group row m-b-10" >' +
        '<label class="col-md-3 col-form-label text-md-right">DireccionController '+click+' <span class="text-danger">*</span></label>' +
        '<div class="col-md-6"> <input type="text" id="dir'+click+'" class="form-control"' +
        'data-parsley-group="step-3" data-parsley-required="true"/> </div> ';
    html = html + html2;
    $('#dir').html(html);
   document.getElementById("val1").value=click;
  cont=0;
    for( i=0;i<valores.length;i++)
    {
        cont++;
        document.getElementById("dist"+cont).value=valores[i][1];
        document.getElementById("dir"+cont).value=valores[i][0];
    }
}
