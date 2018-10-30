<?php

$menu =  [
    "administrador"=>[
        "nombre"=>"Administrador",
        "url"=>"#",
        "class"=>"",
        "submenu"=>[
            [
                "nombre"=>"Dashboard",
                "url"=>$jmyWeb->url_inicio(['return'=>true])."administrador",       
                "class"=>"",         
            ],[
                "nombre"=>"Usuarios",
                "url"=>$jmyWeb->url_inicio(['return'=>true])."administrador/usuarios",       
                "class"=>"",         
            ],[
                "nombre"=>"DIVIDER"
        ]]
    ],
    "citas"=>[
        "nombre"=>"Citas",
        "url"=>$jmyWeb->url_inicio(['return'=>true])."administrador/citas",       
        "class"=>"",
    ],
    "productos"=>[
        "nombre"=>"Productos",
        "url"=>$jmyWeb->url_inicio(['return'=>true])."administrador/productos",
        "class"=>"",
    ]
];


$modulos =  [
    "citas"=>[
        "nombre"=>"Citas",
        "url_marco"=>"administrador_evo/lista.php",
        "controlador"=>"app/controlador/admin_mdeamor/casas.php",    
    ],
    "perfil-empleado"=>[
        "nombre"=>"Perfil empleado",
        "url_marco"=>"error404.php", 
        "controlador"=>"app/controlador/administrador_evo/perfil-empleado.php",
    ]
];