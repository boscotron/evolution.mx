
let id = '';


function editar(d=[]) {
    jQuery(function ($) {  

        $.ajax({
            url: location.origin + '/administradorws/proveedores',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                id=res.var.ID;
                
                let campos = res.var.ver.ot[id];
                console.log(campos);
                
                $("#nombre").val(campos.nombre);
                $("#telefono").val(campos.telefono);
                $("#direccion").val(campos.direccion);
                $("#dia_pedido").val(campos.dia_pedido);
            },
            error: function(res) {
                console.log(res);
            },
            data: {
                ID:id,
                nombre:$("#nombre").val(),
                telefono:$("#telefono").val(),
                direccion:$("#direccion").val(),
                dia_pedido:$("#dia_pedido").val(),
            }
        });

    });    
}

jQuery(function ($) {  
    function urlFr(a){return a.toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-+|-+$/g, "-").replace(/^-+|-+$/g, '')};
    function lista_proveedores(){        
        $.ajax({
            url: location.origin + '/administradorws/proveedores',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                //console.log('id',id);
                let listaPROV = res.var.ver.otFm;
                console.log(listaPROV);
                let data = [];
                if(listaPROV!=undefined)
                listaPROV.forEach(element => {
                    data.push([
                        element.ID_F,
                        element.nombre,
                        element.telefono,
                        element.direccion,
                        element.dia_pedido,
                        '<a href="'+location.origin+'/administrador/productos/proveedor/'+element.ID_F+'"> <i class="fa fa-eye"></i> ver </a>',
                        '<button class="btn btn-sm btn-flat ver_proveedor" data-id="'+element.ID_F+'"> <i class="fa fa-eye"></i> editar</botton>'
                    
                        
                        

                    ]);
                });
                console.log(data);
               /* https://datatables.net/manual/index */
                $.when($('#listaPROV').DataTable( {
                    data: data,
                    columns: [
                        { title: "Id" },
                        { title: "Nombre" },
                        { title: "Telefono" },
                        { title: "Dirección"},
                        { title: "Dia de pedido"} ,
                        { title: " "},
                        { title: " Productos"}  
                    ]
                } )).done(function () {
                    console.log('id_proveedor');
                    $(".ver_proveedor").on('click', function () {
                        let id_proveedor = $(this).data('id');
                        console.log('id_proveedor',id_proveedor);
                        limpiar_campos();
                        if(id_proveedor!=undefined && id_proveedor!=''){
                            
                            id= id_proveedor;
                            editar(); 
                        }
                    });
                });        
            },
            error: function(res) {
                console.log(res);
            },
            data: {}
        });
    }

    function limpiar_campos() {
        $("#nombre").val("");
        $("#telefono").val("");
        $("#direccion").val("");
        $("#dia_pedido").val("");
    }

    $(document).ready(function() {
        lista_proveedores();    
        $("#agregarNuevo").on('click', function () {
            id='';
            //console.log('id',id);
            limpiar_campos();
            editar();
        });
        $("#guardar").on('click', function () {
            console.log('hola');
            event.preventDefault();
            editar();
            //console.log('id',id);
        });
    } );
    $( function dia_pedido() {
        $( "#dia_pedido" ).datepicker();
      } );
});