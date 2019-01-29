
let id = '';


function editar(d=[]) {
    jQuery(function ($) {  

        $.ajax({
            url: location.origin + '/administradorws/pedidos',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                id=res.var.ID;
                
                let campos = res.var.ver.ot[id];
                console.log(campos);
                
                $("#dia_pedido").val(campos.dia_pedido);
                $("#sucursal").val(campos.sucursal);
                $("#proveedor").val(campos.proveedor);
                $("#productos").val(campos.productos);
                $("#estatus").val(campos.estatus);
            },
            error: function(res) {
                console.log(res);
            },
            data: {
                ID:id,
                dia_pedido:$("#dia_pedido").val(),
                sucursal:$("#sucursal").val(),
               proveedor:$("#proveedor").val(),
                productos:$("#productos").val(),
                estatus:$("#estatus").val(),
            }
        });

    });    
}

jQuery(function ($) {  
    function urlFr(a){return a.toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-+|-+$/g, "-").replace(/^-+|-+$/g, '')};
    function lista_pedidos(){        
        $.ajax({
            url: location.origin + '/administradorws/pedidos',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                //console.log('id',id);
                let lista = res.var.ver.otFm;
                console.log(lista);
                let data = [];
                lista.forEach(element => {
                    data.push([
                        element.ID_F,
                        element.dia_pedido,
                        element.sucursal,
                        element.proveedor,
                        element.productos,
                         element.estatus,
                        '<button class="btn btn-sm btn-flat ver_pedido" data-id="'+element.ID_F+'"> <i class="fa fa-eye"></i> editar</botton>'
                    ]);
                });
                console.log(data);
               /* https://datatables.net/manual/index */
                $.when($('#lista').DataTable( {
                    data: data,
                    columns: [
                        { title: "Id" },
                        { title: "Dia de pedido"} ,
                        { title: "Sucursal" },
                        { title: "Proveedor" },
                        { title: "Productos"},
                        { title: "Estatus"} ,
                        { title: " "} 
                    ]
                } )).done(function () {
                    console.log('id_pedido');
                    $(".ver_pedido").on('click', function () {
                        let id_pedido = $(this).data('id');
                        console.log('id_pedido',id_pedido);
                        limpiar_campos();
                        if(id_pedido!=undefined && id_pedido!=''){
                            
                            id= id_pedido;
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
        $("#dia_pedido").val("");
        $("#sucursal").val("");
        $("#proveedor").val("");
        $("#productos").val("");
        $("#estatus").val("");
    }

    $(document).ready(function() {
        lista_pedidos();    
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
});