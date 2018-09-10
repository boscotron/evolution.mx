<?php
require(BASE_APP.'class/jmy3webAdmin.class.php');
$out = new JmyWebSession();
//$tkn = $out->session();
$jmyWeb ->pre(['p'=>$_GET,'t'=>'get']);
$enlace_actual = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$_SERVER['PATH_INFO'];
$jmyWeb ->pre(['p'=>$enlace_actual ,'t'=>'get']);


/*
if($tkn['o']['out']['error']!=''){
$jmyWeb ->pre(['p'=>$tkn,'t'=>'Error:']);
}else{
$fn = (!$_SESSION['JMY3WEB'][DOY])? $out->fn(["fn"=>"codigo","token"=>$tkn['token']]):false;
if($fn['out']['error']!='')
	$jmyWeb ->pre(['p'=>$fn,'t'=>'Error:']);
}
if($_GET['peticion']=='salir'){$_SESSION['JMY3WEB'][DOY]=0;}*/
?>
<html>
<head>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" integrity=
	"sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<!--<script src="<?php $jmyWeb->url_inicio(); ?>app/js/jmy/jmyWebCon.js" ></script>	-->
	<style>
		body{
			background-color: #3c5478;
			padding-top:30px;
		}
		.card{
			background-color:#E2F1FF;
			padding:5px; 
		}
	</style>
</head>
<body>
<input type="hidden" id="tiket" value="<?php echo $fn['out']['codigo']['guardar']; ?>">
<input type="hidden" id="web" value="<?php $jmyWeb->url_inicio();?>">
	<div class="row">
		<div class="col-sm-12 col-md-3">
		</div>
		<div class="col-sm-12 col-md-6">
			<div class="card">
				<div class="card-head">
					Acceso a edición web
				</div>
				<div class="card-body">
					<p>
						<a class="btn btn-success"  href="https://comsis.mx/app/entrar/?re=<?php $jmyWeb->url_inicio(); ?>/entrar/&api=e2ad454bea7d919f0fc411a8b885580c&api_web=<?php echo JMY_API; ?>&sep=1" target="_blank" >Entrar</a>
						
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>