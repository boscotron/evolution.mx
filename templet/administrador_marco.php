<div col="row">
    <div col="col-md-12">
        <nav>
            <ul>
                <li><a href="<?php $this->url_inicio(); ?>administrador">Dashboard</a></li>
                <li><a href="<?php $this->url_inicio(); ?>administrador/usuarios">Usuarios</a></li>
                <li><a href="<?php $this->url_inicio(); ?>administrador/productos">Productos</a></li>
        </nav>
    </div>
</div>

<div col="row">
    <div col="col-md-12">
        <?php 
        if(file_exists($data['url_marco']))
            include_once($data['url_marco']);
        else
            $this->pre(['p'=>['No se pudo cargar este módulo, consultelo con su administrador',$data['url_marco']],'t'=>'Error']);
        ?>
    </div>
</div>