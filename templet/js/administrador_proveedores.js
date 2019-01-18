jQuery(function ($) {  
    function urlFr(a){return a.toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-+|-+$/g, "-").replace(/^-+|-+$/g, '')};
    function lista_proveedores(){        
        $.ajax({
            url: location.origin + '/administradorws/proveedores',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
               // let listaPROV = res.proveedores.otFm;
                let url = '';                
                let data = [];                
              /*  listaPROV.forEach(e => {
                    url = '<a href="'+location.origin+'/proveedores/'+e.ID_F+'/'+urlFr(e.nombre)+'" class="btn btn-round btn-sm btn-info"><i class="fa fa-link"></i></a>';       
                    data.push([e.ID_F,e.nombre,url]);
                });*/
                console.log(data);
               /* https://datatables.net/manual/index */
                $('#listaPROV').DataTable( {
                    data: data,
                    columns: [
                        { title: "Id" },
                        { title: "Nombre" },
                        { title: "Telefono" },
                        { title: "Dirección"},
                        { title: "Dia de pedido"} 
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
        lista_proveedores();        
    } );
});