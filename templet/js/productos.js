jQuery(function ($) { 
    console.log('js productos');
    $('.editor_ventana').hide();
    $('.cel_formulario').hide();

    $('#marcas_ventana').hide();

    $('#editor_cerrar').on('click', function(){
        event.preventDefault();
        $('.editor_ventana').hide(500);
    });
    $('.editor_abrir').on('click', function(){
        event.preventDefault();
        $('.editor_ventana').show(200);
        

 
    });

    $('#marca_cerrar').on('click', function(){
        event.preventDefault();
        $('#id_marca').val('');
        $('#nombre_marca').val('');
        $('#marcas_ventana').hide(500);       
    });
    $('.marca_abrir').on('click', function(event){
        console.log('marca_abrir');
        event.preventDefault();
        $('#marcas_ventana').show(200);
        document.getElementById("#marca_guardar").disabled = false;

    });
    $('#marca_guardar').on('click', function(){
        event.preventDefault();
        let data = {
            id:$("#id_marca").val(),
            nombre:$("#nombre_marca").val(),
            foto:'',
            peticion:'marcas',
            accion:'marca'
        };
        ws(data);
        document.getElementById("#marca_guardar").disabled = true;
        $('#marcas_ventana').show(200);
    });

    

    function marca(d){
        console.log(d);
        let v = d.out.id;
        console.log(v);
        
        $('#id_marca').val(v);
        lista_marcas();
    }

    function lista_marcas(){
        ws({
            id:$("#id_marca").val(),
            nombre:$("#nombre_marca").val(),
            foto:'',
            peticion:'marcas-lista',
            accion:'listar_marcas'
        });
    }
    function listar_marcas(d){
        console.log(d);
        let lista = d.out.ver.otFm;
        let modoEditor = $("#modoEditor").val();
        $("#botones_marcas").html('');
        for (let i = 0; i < lista.length; i++) {
            const element = lista[i];
            let boton_editar = (modoEditor) ? '<i class="fa fa-edit editar_marca" data-idmarca="'+element.ID_F+'"></i>':'';
            $("#botones_marcas").append( '<a data-filter=".tab_'+element.ID_F+'" href="#" class="btn-eff3  active-sort jmy_web_div" data-page="productos" id="'+element.ID_F+'" data-editor="no">'+element.nombre_marca+' '+boton_editar+'</a>' );
            

        }
        editar_marca();
    }
    lista_marcas();
    
    
    function editar_marca(){

        $(".editar_marca").on('click',function(){
            $('#marcas_ventana').show(200);
            let id_marca = $(this).data("idmarca");
            console.log('ID MARCA',id_marca);
            
           marca_ver({
                    id:id_marca
                });

            
        });
        
    }



    function marca_ver(d){ // producto_ver({id:5})
        return ws({ id:d.id, peticion:'marcas', accion:'marca_ver_accion' });
    }

    function marca_ver_accion(d){ // producto_ver({id:5})
        const resultado = d.out.ver.ot[d.out.ver.otKey[0]];
        const id =d.out.ver.otKey[0];
        console.log("resultado",resultado);
        console.log("id",id);
        $("#id_marca").val(id);
        $("#nombre_marca").val(resultado.nombre_marca);
        //return ws({ id:d.id, peticion:'marcas' });
    }

    function producto_ver(d){ // producto_ver({id:5})
        return ws({ id:d.id });
    }

    function producto_nuevo(d){ // producto_nuevo({id_marca:5,nombre:"Nombre de"})
        return ws({ id_marca:d.id_marca,
                    nombre:d.nombre });
    }
    function producto_lista(d){ // producto_nuevo({id_marca:5,nombre:"Nombre de"})
        return ws({ id_marca:d.id_marca });
    }

    function producto_agregar(d){ 
        /* producto_nuevo({
                id_producto:5, // requerido
                nombre:"Nombre de", // requerido
                codigo:"loque sea" // opcional 
            }); */
        return ws(d);
    }




    function ws(d){
        console.log(d);
        $.ajax({
            url: location.origin + '/wsproductos/'+d.peticion,
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                switch (d.accion) {
                    case 'marca': marca(res); break;                
                    case 'listar_marcas': listar_marcas(res); break;                
                    case 'marca_ver_accion': marca_ver_accion(res); break;                
                    default: break;
                }
            },
            error: function(res) {
                console.log(res);
            },
            data: d
        });
    }

 });