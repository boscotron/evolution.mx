console.log('hola');

jQuery(function($){

    function cargarCarousel(carousel){
        $('.'+carousel).carouFredSel({
            responsive: true,
            auto: false,
            width: '100%',
            height: 'variable',
            prev: '.pricing.prev-arrow',
            next: '.pricing.next-arrow',
            scroll: 1,				
            items: {
            width: $(this).find('.column').width(),
            height: 'variable',
            visible: {
                min: 1,
                max: 2
            }
            }				
        });
    }

    
    
    function serviciosws(){
        let carousel = 'dt-sc-pricing-carousel';
        $.ajax({
            url: location.origin + '/iniciows/servicios/',
            type: 'post',	
            dataType: 'json',
            success: function(res) {
                console.log(res);
                let salto_columnas=10;
                $('.'+carousel).html('');
                let columnas=Math.round(2+(salto_columnas/res.length));
                let html = '';
                console.log(columnas);
                let count = 0;
                let filas=Math.round(res.length/columnas);
                console.log(filas);
                
                for (let i = 0; i < columnas; i++) {
                    html = html + '<div class="column dt-sc-one-half"><ul class="menu-card check">';
                    for (let o = 0; o < filas; o++) {
                        const resultado = res[count];
                        count++;
                        console.log(resultado);
                        if(resultado!=undefined)
                            html = html + '<li><div class="jmy_web_div" data-page="'+resultado.ID_F+'" data-tabla="catalogos" id="nombre__'+i+o+'" data-editor="no">'+resultado.nombre+'</div><span><div class="jmy_web_div" data-page="'+resultado.ID_F+'" data-tabla="catalogos" id="precio__'+i+o+'" data-editor="no">'+((resultado.precio!=undefined)?resultado.precio:'$75')+'</div></span></li>';

                    }
                    html = html + '</ul></div>';
                }
                $('.caroufredsel_wrapper').css('height',(filas*51));
                $('.'+carousel).html(html);
                jmy_web_div_click();
                console.log(html);
                
                cargarCarousel(carousel);

            },
            error: function(res) {
                console.log(res);
            },
            data: {}
        });
    }


   
    
    $(document).ready(function(){
        serviciosws();
    });
});