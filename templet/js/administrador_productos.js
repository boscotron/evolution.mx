jQuery(function ($) {  

    function lista_productos(){
        
        $.ajax({
            url: location.origin + '/administradorws/productos',
            type: 'post',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                let lista = res.productos.otFm;

                
                let data = [];
                
                lista.forEach(e => {
                    let foto=(e.foto_producto!=undefined && e.foto_producto!='')?e.foto_producto:'http://local.evolution.mx/templet/images/portfolio-images/portfolio-img1.jpg';
                    foto = '<img src="'+foto+'" width="30" >';
                    data.push([e.ID_F,e.nombre,foto]);
                });
                console.log(data);
               /* https://datatables.net/manual/index */
                $('#tabla_productos').DataTable( {
                    data: data,
                    columns: [
                        { title: "Id" },
                        { title: "Nombre" },
                        { title: "Foto" }
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


