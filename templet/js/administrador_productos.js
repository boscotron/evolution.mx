jQuery(function ($) {  
    function urlFr(a){return a.toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-+|-+$/g, "-").replace(/^-+|-+$/g, '')};
    function lista_productos(){        
        $.ajax({
            url: location.origin + '/administradorws/productos',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                let lista = res.productos.otFm;
                let url = '';                
                let data = [];                
                lista.forEach(e => {
                    url = '<a href="'+location.origin+'/productos/'+e.ID_F+'/'+urlFr(e.nombre)+'" class="btn btn-round btn-sm btn-info"><i class="fa fa-link"></i></a>';       
                    data.push([e.ID_F,e.nombre,url]);
                });
                console.log(data);
               /* https://datatables.net/manual/index */
                $('#lista').DataTable( {
                    data: data,
                    columns: [
                        { title: "Id" },
                        { title: "Nombre" },
                        { title: "Precio" },
                        { title: "Proveedor"},
                        { title: "Cantidad"},
                        { title: "Fecha de compra"},
                        { title: "Fecha de venta"},
                        { title: "Editar" }
                    ]
                } );        
            },
            error: function(res) {
                console.log(res);
            },
            data: {}
        });
    }
    $(document).ready(function() {
        lista_productos();        
    } );
});