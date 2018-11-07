<?php 
if($jmyWeb->sesion()){
	$o=["error"=>"datos insuficientes"];
	$p=$jmyWeb->modulos();
	$ps=0;
	for($i=0; $i < count($p['modulos_permisos']); $i++){
		if(!$ps)
			$ps=( $p['modulos_permisos'][$i]['permiso']>=1)?true:false;
	}
	if($_POST['pagina']!=''&&$_POST['id']!=''&&$_POST['valor']!='' && ($_SESSION['JMY3WEB'][DOY] || $ps)){
		$o=$jmyWeb->guardar(['pagina'=>$_POST['pagina'],'id'=>$_POST['id'],'valor'=>$_POST['valor'],'tabla'=>($_POST['tabla']!='')?$_POST['tabla']:'vistaweb','opciones'=>$_POST['opciones']]);
		if($_POST['opciones']['href']!='')
			$o['href']=$jmyWeb->guardar(['pagina'=>$_POST['pagina'],'id'=>$_POST['id'].'_href','valor'=>$_POST['opciones']['href'],'tabla'=>$_POST['tabla']]);
	}elseif($_POST['pagina']!=''&&$_POST['id']!=''&&$_POST['valor']!=''){
		$o=['out'=>'No tienes acceso a escribir en esta sección'];
	}
	$o['POST']=$_POST;
	$o['p']=$p;
	$o['ps']=$ps;
}else{
	$o=["error"=>"No hay sesión activa"];
}
echo json_encode($o);
?>