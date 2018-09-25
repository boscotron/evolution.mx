<?php

if($_GET['peticion']=='salir'){$jmyWeb->session_activa([],1);}
$token = explode("/",$_GET['peticion']);
$token = $jmyWeb->session_activa($token);
if($token['permiso']!='' && $_GET['peticion']=='instalar') 
	$jmyWeb->guardar_session(["instalar"=>true]);
if($token['permiso']!='') 
	$jmyWeb->guardar_session();
if($token['permiso']!='' && $_SESSION['re_login']!=''){?>
	<script type="text/javascript">
	<!--
	window.location = <?php echo $_SESSION['re_login']; ?>
	//-->
	</script>
<?php unset($_SESSION['re_login']); }else{
	if($_GET['peticion']=='token'){$jmyWeb ->pre(['p'=>$token,'t'=>'TOKEN']);}
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
							<?php 
							if($token['permiso']==''){?>
							<a class="btn btn-success"  href="https://comsis.mx/app/entrar/?re=<?php $jmyWeb->url_inicio(); ?>entrar/&api=e2ad454bea7d919f0fc411a8b885580c&api_web=<?php echo JMY_API; ?>&sep=1" >Entrar</a>
							<?php }else{ ?>
								<a class="btn btn-info"  href="<?php $jmyWeb->url_inicio(); ?>">Editar página</a>
								<a class="btn btn-danger"  href="<?php $jmyWeb->url_inicio(); ?>/entrar/salir">Salir</a>
							<?php } ?>
							
						</p>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
<?php } ?>