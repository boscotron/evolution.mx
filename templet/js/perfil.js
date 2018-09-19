jQuery(function ($) {  
    console.log('ola k ase');




    function guardar_perfil() {
        // AQUI VAN LAS REGLAS DE INGRESO
        let guardar = {
            nombre:$("#perfil_nombre").val(),
            telefono:$("#perfil_telefono").val(), // Filtrar por teléfono
        };
        
        let seguir = true;
        let error = '';

        /* caso por caso */
        if(guardar.telefono.length <= 10){
            seguir = true;            
        }else{
            seguir = false;
            error = error + " El teléfono no es válido ";
        }
        
        

        console.log(guardar);
        if(seguir){
            let id_perfil = $("#id_perfil").val();
            $.ajax({
                url: location.origin + '/perfilws/guardar/'+id_perfil,
                type: 'post',
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                },
                error: function(res) {
                    console.log(res);
                },
                data: guardar
            });
        }else{
            alert('datos incorrctos : '+error);
        }
    }
 
    $("#boton_guardar").on('click',function(){
        guardar_perfil();
    });
    function ver_perfil(){
        let id_perfil = $("#id_perfil").val();
        console.log(id_perfil);
        
        $.ajax({
            url: location.origin + '/perfilws/ver/'+id_perfil,
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
               if(res.perfil.nombre!=undefined)    
                    $("#perfil_nombre").val(res.perfil.nombre);
            },
            error: function(res) {
                console.log(res);
            },
            data: {}
        });
    }
    function select_lista_perfiles(){
        let id_perfil = $("#id_perfil").val();
        console.log(id_perfil);
        
        $.ajax({
            url: location.origin + '/perfilws/lista_perfiles/',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                
                let lista = res.perfil.otFm;
                console.log(lista);
                let h = '<option selected>Selecciona...</option>';
                lista.forEach(e => {
                    h = h + '<option  value="'+e.ID_F+'">'+e.nombre+'</option>';
                });
                $("#select_lista_perfiles").html(h);

                $("#select_lista_perfiles").change( function () {
                    let id = $(this).val();
                    console.log(id);
                    $("#id_perfil").val(id);
                    ver_perfil();
                });

            },
            error: function(res) {
                console.log(res);
            },
            data: {}
        });
    }
    select_lista_perfiles();
    ver_perfil();
});