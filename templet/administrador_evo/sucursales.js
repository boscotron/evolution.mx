function lista(d=[]) {
    jQuery(function ($) {    
        $.ajax({
            url: location.origin+"/administradorws/sucursales",
            type:"post",
            dataType:"json",
            data:{ola:"que hace :) 2 post"},
            success:function(respuesta){
                console.log(res);
                let listaSU = res.sucursales.otFm;
                let url = '';                
                let data = [];                
                listaSU.forEach(e => {
                    url = '<a href="'+location.origin+'/sucursales/'+e.ID_F+'/'+urlFr(e.nombre)+'" class="btn btn-round btn-sm btn-info"><i class="fa fa-link"></i></a>';       
                    data.push([e.ID_F,e.nombre,url]);
                });
                console.log(data);
               /* https://datatables.net/manual/index */
                $('#listaSU').DataTable( {
                    data: data,
                    columns: [
                        { title: "Id" },
                        { title: "Dirección" },
                        { title: "Telefono" },
                        { title: "Responsable"},
                        
                    ]
                } );        
                

            },error:function (e) {
               // console.log(e);
                
            }

        });
        
    });
}


jQuery(function($){
    $(document).ready(function () {
        listaSU();
    });
});