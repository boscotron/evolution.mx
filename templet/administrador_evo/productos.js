function lista(d=[]) {
    jQuery(function ($) {    
        $.ajax({
            url: location.origin+"/administradorws/productos",
            type:"post",
            dataType:"json",
            data:{ola:"que hace :) 2 post"},
            success:function(respuesta){
                console.log('respuesta',respuesta);
                

            },error:function (e) {
               // console.log(e);
                
            }

        });
        
    });
}


jQuery(function($){
    $(document).ready(function () {
        lista();
    });
});