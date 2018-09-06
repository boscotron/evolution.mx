<?php
require(BASE_APP.'class/jmy3webAdmin.class.php');
$out = new JmyWebSession();
$tkn = $out->session();
$jmyWeb ->pre(['p'=>$tkn,'t'=>'tkn']);
if($tkn['o']['out']['error']!=''){
$jmyWeb ->pre(['p'=>$tkn,'t'=>'Error:']);
}else{
$fn = (!$_SESSION['JMY3WEB'][DOY])? $out->fn(["fn"=>"codigo","token"=>$tkn['token']]):false;
if($fn['out']['error']!='')
	$jmyWeb ->pre(['p'=>$fn,'t'=>'Error:']);
}
if($_GET['peticion']=='salir'){$_SESSION['JMY3WEB'][DOY]=0;}
?>
<html>
<head>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" integrity=
	"sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="<?php $jmyWeb->url_inicio(); ?>app/js/jmy/jmyWebCon.js" ></script>	
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
						<a class="btn btn-success"  href="https://comsis.mx/app/comsisAdmin/" target="_blank" >Abrir panel</a>
						<button class="btn btn-info hidden"  id="refrescar" >Refrescar</button>
					</p>
					<p>
					 <?php echo ($fn['out']['error']!='')?$fn['out']['error'] : 'Registra este código en tu panel para poder editar esta web'; ?>
					<h2 style="color:indigo"> <?php echo $fn['out']['codigo']['codigo']; ?></h2>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>