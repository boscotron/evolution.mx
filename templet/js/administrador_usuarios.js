jQuery(function ($) {  

    function lista_usuarios(){
        $.ajax({
            url: location.origin + '/administradorws/usuarios',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);              
                imprimir_lista(res.usuarios.otFm);
            },
            error: function(res) {
                console.log(res);
            },
            data: {}
        });
    }

    function imprimir_lista(d){
        let html = '';
        console.log(d);
        
        for (let i = 0; i < d.length; i++) {
            const e = d[i];
            html = html + '<li class="list-group-item ver_usuario" data-id="'+e.ID_F+'">'+e.nombre+'</li>';            
        }
        $("#listado_usuario").html('');
        $("#listado_usuario").html(html);
        boton_usuario(d);
    }

    function boton_usuario(d){
        $(".ver_usuario").on('click',function(){
            ver_usuario($(this).data('id'));
        });
    }
    function ver_usuario(d){
        console.log('ver_usuario',d);        
    }

    lista_usuarios();

});