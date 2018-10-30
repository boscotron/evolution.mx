<div col="row">
    <div col="col-md-12" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Panel JMY</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" id="nav_administrador">
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