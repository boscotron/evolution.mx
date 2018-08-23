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
        document.getElementById("#marca_guardar").disabled = false;
    });
    $('.marca_abrir').on('click', function(){
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
        for (let i = 0; i < lista.length; i++) {
            const element = lista[i];
            $("#botones_marcas").append( '<a data-filter=".tab_'+element.ID_F+'" href="#" class="btn-eff3  active-sort jmy_web_div" data-page="productos" id="'+element.ID_F+'" data-editor="no">'+element.nombre_marca+' </a>' );
        }
        }
        lista_marcas();
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