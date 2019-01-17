jQuery(function ($) {  
    function urlFr(a){return a.toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-+|-+$/g, "-").replace(/^-+|-+$/g, '')};
    function lista_sucursales(){        
        $.ajax({
            url: location.origin + '/administradorws/sucursales',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                let listaSU = res.sucursales.otFm;
                let url = '';                
                let data = [];                
              /*  listaSU.forEach(e => {
                    url = '<a href="'+location.origin+'/sucursales/'+e.ID_F+'/'+urlFr(e.nombre)+'" class="btn btn-round btn-sm btn-info"><i class="fa fa-link"></i></a>';       
                    data.push([e.ID_F,e.nombre,url]);
                });*/
                console.log(data);
               /* https://datatables.net/manual/index */
                $('#listaSU').DataTable( {
                    data: data,
                    columns: [
                        { title: "Id" },
                        { title: "Dirección" },
                        { title: "Telefono" },
                        { title: "Responsable"}
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
        lista_sucursales();        
    } );
});