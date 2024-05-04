$(function(){
    getData();
});

var url="http://localhost/dashboard/apipro2/";

function getData(){
    $("#contenido").empty();
    $.ajax({
        type:"GET",
        url:url,
        dataType:'json',
        success: function(resp){
            var productos =  resp;
            if(productos.length > 0){
                jQuery.each(productos, function(i,prod){
                    var btnEditar='<button class="btn btn-warning"><i class="fa-solid fa-edit"></i></button>';
                    var btnEliminar='<button class="btn bt-danger"><i class="fa-solid fa-trash"></i></button>';
                    $('#contenido').append('<tr><td>'+(i+1)+'</td><td>'+prod.name+'</td><td>'+prod.description+'</td><td>'+prod.prize+'</td><td>'+btnEditar+" "+btnEliminar+'</td></tr>');
                });
            }
        },
        error:function(){
            show_alerta('Error al mostrar los productos','error');
        }        
    });
}

function show_alerta(mensaje,icono,foco){
    if(foco !==""){
        $('#'+foco).trigger("focus");
    }
    show_alerta.fire({
        title:mensaje,
        icon:icono,
        customClass:{confirmButton: 'btn btn-primary', popup:'animated xoomIn'},
        buttonsStyling:false
    });
}