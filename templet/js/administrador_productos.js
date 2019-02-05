
let id = '';


function editar(d=[]) {
    jQuery(function ($) {  

        $.ajax({
            url: location.origin + '/administradorws/productos',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                id=res.var.ID;
                
                let campos = res.var.ver.ot[id];
                console.log(campos);
                
                $("#nombre").val(campos.nombre);
                $("#precio").val(campos.precio);
                $("#proveedor").val(campos.proveedor);
                $("#cantidad").val(campos.cantidad);
                $("#fecha_compra").val(campos.fecha_compra);
                $("#fecha_venta").val(campos.fecha_venta);
            },
            error: function(res) {
                console.log(res);
            },
            data: {
                ID:id,
                nombre:$("#nombre").val(),
                precio:$("#precio").val(),
                proveedor:$("#proveedor").val(),
                cantidad:$("#cantidad").val(),
                fecha_compra:$("#fecha_compra").val(),
                fecha_venta:$("#fecha_venta").val(),
            }
        });

    });    
}

jQuery(function ($) {  
    function urlFr(a){return a.toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-+|-+$/g, "-").replace(/^-+|-+$/g, '')};
    function lista_productos(){        
        $.ajax({
            url: location.origin + '/administradorws/productos',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                let lista = res.var.ver.otFm;
                console.log(lista);               
                let data = [];        
                if(lista!=undefined)        
                lista.forEach(element => {
                    data.push([
                        element.ID_F,
                        element.nombre,
                        element.precio,
                        element.proveedor,
                        element.cantidad,
                        element.fecha_compra,
                        element.fecha_venta,
                        '<button class="btn btn-sm btn-flat ver_producto" data-id="'+element.ID_F+'"> <i class="fa fa-eye"></i> editar</botton>'
                    ]);
                });
                console.log(data);
               /* https://datatables.net/manual/index */
                $.when($('#lista').DataTable( {
                    data: data,
                    columns: [
                        { title: "Id" },
                        { title: "Nombre" },
                        { title: "Precio" },
                        { title: "Proveedor"},
                        { title: "Cantidad"},
                        { title: "Fecha de compra"},
                        { title: "Fecha de venta"},
                        { title: " "} 
                        
                    ]
                } )).done(function () {
                    console.log('id_producto');
                    $(".ver_producto").on('click', function () {
                        let id_producto = $(this).data('id');
                        console.log('id_producto',id_producto);
                        limpiar_campos();
                        if(id_producto!=undefined && id_producto!=''){
                            
                            id= id_producto;
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
        $("#precio").val("");
        $("#proveedor").val("");
        $("#cantidad").val("");
        $("#fecha_compra").val("");
        $("#fecha_venta").val("");
    }
    $(document).ready(function() {
        lista_productos();        
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

    $( function fecha_compra() {
        $( "#fecha_compra" ).datepicker();
      } );
      $( function fecha_venta() {
        $( "#fecha_venta" ).datepicker();
      } );
});