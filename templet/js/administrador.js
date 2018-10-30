jQuery(function ($) {  
    function crear_submenu(d=[],id=''){
        let h = ' <div class="dropdown-menu" id="'+id+'" aria-labelledby="navbarDropdown">';
        d.forEach(e => {
            h=h+((e.nombre!='DIVIDER')?'<a class="dropdown-item '+e.class+'" href="'+e.url+'" '+e.data+'>'+e.nombre+'</a>':'<div class="dropdown-divider"></div>');
        });
        h+h+'</div>';
        return h;
    }
    function crear_menu(d=[]){
        
        let zi = $.session.get('i');
        zi =(zi!=''&&zi!=undefined)? JSON.parse(zi):'';
        
        $.ajax({
            url: location.origin + '/administradorws/modulos/'+zi.u,
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                let mtmp = res.modulos.modulos_key;
                console.log('guardar_modulos',res);
                if(mtmp!="" && mtmp!=undefined){
                    let h = '';
                    let co = 0;
                    mtmp.forEach(e => {
                        const m=res.menu[e];
                        console.log('m',m);
                        if(m!=undefined)
                            h=h+' <li class="nav-item"><a class="nav-link '+((m.submenu!='' && m.submenu!=undefined)?'dropdown-submenu':'')+' '+m.class+'" href="'+m.url+'" data-submenu="nav-menu-'+co+'">'+m.nombre+'</a>'+crear_submenu(m.submenu,'nav-menu-'+co)+'</li>';
                        co++;
                    });
                    $("#nav_administrador").append(h);
                    $(".dropdown-submenu").on('click',function () {
                        event.preventDefault();
                        $("#"+$(this).data('submenu')).toggle(50);
                    });
                    $(".navbar-toggler").on('click',function () {
                        $($(this).data('target')).toggleClass('collapse',50);
                        $(".dropdown-menu").hide();
                    });                  
                }
            },
            error: function(res) {
                console.log(res);
            },
            data:{data:d}
        });
    }
    $(document).ready(function() {
        crear_menu();        
    } );
});