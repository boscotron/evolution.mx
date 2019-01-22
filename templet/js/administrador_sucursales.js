let id = '';


function editar(d=[]) {
    jQuery(function ($) {  

        $.ajax({
            url: location.origin + '/administradorws/sucursales',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                id=res.var.ID;
                
                let campos = res.var.ver.ot[id];
                console.log(campos);
                
                $("#direccion").val(campos.direccion);
                $("#telefono").val(campos.telefono);
                $("#responsable").val(campos.responsable);
            },
            error: function(res) {
                console.log(res);
            },
            data: {
                ID:id,
                direccion:$("#direccion").val(),
                telefono:$("#telefono").val(),
                responsable:$("#responsable").val(),
            }
        });

    });    
}
jQuery(function ($) {  
    function urlFr(a){return a.toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-+|-+$/g, "-").replace(/^-+|-+$/g, '')};
    function lista_sucursales(){        
        $.ajax({
            url: location.origin + '/administradorws/sucursales',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                let lista = res.var.ver.otFm;
                console.log(lista);               
                let data = [];                
                lista.forEach(element => {
                    data.push([
                        element.ID_F,
                        element.direccion,
                        element.telefono,
                        element.responsable,
                        '<button class="btn btn-sm btn-flat ver_sucursal" data-id="'+element.ID_F+'"> <i class="fa fa-eye"></i> editar</botton>'
                    ]);
                });
                console.log(data);
               /* https://datatables.net/manual/index */
                $.when($('#lista').DataTable( {
                    data: data,
                    columns: [
                        { title: "Id" },
                        { title: "Dirección" },
                        { title: "Telefono" },
                        { title: "Responsable"},
                        { title: " "}
                        
                    ]
                } )).done(function () {
                    console.log('id_sucursal');
                    $(".ver_sucursal").on('click', function () {
                        let id_sucursal = $(this).data('id');
                        console.log('id_sucursal',id_sucursal);
                        limpiar_campos();
                        if(id_sucursal!=undefined && id_sucursal!=''){
                            
                            id= id_sucursal;
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
        $("#direccion").val("");
        $("#telefono").val("");
        $("#responsable").val("");
    }

    $(document).ready(function() {
        lista_sucursales();      
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