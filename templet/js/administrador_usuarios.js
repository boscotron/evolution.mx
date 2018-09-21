jQuery(function ($) {  
    $("#datos").hide();
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
            //html = html + '<li class="list-group-item ver_usuario" data-id="'+e.ID_F+'">'+e.nombre+'</li>';    
            
            let m = (e.proveedor==='JMYOAUTH')?'Usuario primario':'Usuario secundario';
            let s = (e.proveedor==='JMYOAUTH')?'list-group-item-info':'';
            html = html + '  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start '+s+' ver_usuario" data-id="'+e.ID_F+'" ><div class="d-flex w-100 justify-content-between"><h5 class="mb-1">'+e.nombre+'</h5><small>'+((e.tipo!=undefined)?e.tipo:'usuario')+'</small></div><p class="mb-1">'+m+'</p></small></a>';            
        }
        $("#listado_usuario").html('');
        $("#listado_usuario").html(html);
        //boton_usuario(d);
        $(".ver_usuario").on('click',function(){
            event.preventDefault();
            $("#datos").show(150);
            $("#id_perfil").val($(this).data('id'));
            ver_perfil();
        });
    }

    function boton_usuario(d){
        $(".ver_usuario").on('click',function(){
            ver_usuario($(this).data('id'));
        });
    }
    function ver_usuario(d){
        console.log('ver_usuario',d);   
        
        $("#datos").show(150);
        $("#id_perfil").val(d);
       // ver_perfil();
        
    }
    
    /* PARTE DE PERFIL.js */ 

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
        
        
        guardar.admin=true;
        console.log(guardar);
        if(seguir){
            let id_perfil = $("#id_perfil").val();
            $.ajax({
                url: location.origin + '/perfilws/guardar/'+id_perfil,
                type: 'post',
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    let id = res.perfil.otKey[0];
                    $("#id_perfil").val((id!=undefined)?id:'');
                    history.pushState(null, "", location.origin+"/perfil/editar/"+id);
                    $("#select_lista_perfiles").show(100);
                    $("#boton_historial").show(100);
                    ver_perfil();
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
 
    function cambiar_tipo(d=[]) {
        console.log('cambiar_tipo',d);
        
            let id_perfil = $("#id_perfil").val();
            $.ajax({
                url: location.origin + '/perfilws/guardar/'+id_perfil,
                type: 'post',
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    let id = res.perfil.otKey[0];
                },
                error: function(res) {
                    console.log(res);
                },
                data: {tipo:d.tipo}
            });       
    }
 
    $("#boton_guardar").on('click',function(){
        guardar_perfil();
    });
    function ver_perfil(){
        let id_perfil = $("#id_perfil").val();
        console.log('id_perfil',id_perfil);
        if(id_perfil!=''){
            
            select_lista_perfiles();
            $.ajax({
                url: location.origin + '/perfilws/ver/'+id_perfil,
                type: 'post',
                dataType: 'json',
                success: function(res) {
                    console.log(res);

                    let d = res.perfil;
                    let p = res.perfil.proveedor;
                    console.log(d);
                    console.log(p);
                    if(p==='JMYOAUTH')
                        $("#div_tipo_de_usuario").show(120);
                    else
                        $("#div_tipo_de_usuario").hide(100);
                        
                    $(".cambiar_tipo").removeClass('active');
                    $("#tipo_de_usuario").html('');
                    if(d.tipo!=''){
                    $("#btn_tipo_usuario_"+d.tipo).addClass('active');
                    $("#tipo_de_usuario").html(d.tipo);
                    }
                if(res.perfil.nombre!=undefined)    
                        $("#perfil_nombre").val(res.perfil.nombre);
                        
                },
                error: function(res) {
                    console.log(res);
                },
                data: {}
            });
        }else{
            console.log('agregar perfil');
            $("#select_lista_perfiles").hide();
            $("#boton_historial").hide();
            $('#pizzarra').html('  <div class="icon"> <span class="fa fa-users"> </span>  </div> <h5>Agrega<br>un usuario nuevo</h5>' );
        }
    }
    
    $(".cambiar_tipo").on('click',function(){
        $(".cambiar_tipo").removeClass('active');
        $(this).addClass('active');
        cambiar_tipo({tipo:$(this).data('tipo')});
    });
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
            },
            error: function(res) {
                console.log(res);
            },
            data: {}
        });
    }  $("#select_lista_perfiles").change( function () {
                    let id = $(this).val();
                    console.log(id);
                    $("#id_perfil").val(id);
                    ver_perfil();
                });


    ver_perfil(); 
    /* PARTE DE PERFIL.js */ 




    lista_usuarios();

});