<?php 
if($jmyWeb->sesion()){
	$o=["error"=>"datos insuficientes"];
	$p=$jmyWeb->modulos(["modulos_permisos"=>true]);
	$ta=($_POST['tabla']!='')?$_POST['tabla']:['vistaweb'];
	$t=explode('__',$ta);
	$t=(is_array($t))?$ta[0]:'vistaweb';
	if($_POST['pagina']!=''&&$_POST['id']!=''&&$_POST['valor']!='' && ($_SESSION['JMY3WEB'][DOY] || $p['modulos_permisos'][$t]>1)){
		$o=$jmyWeb->guardar(['pagina'=>$_POST['pagina'],'id'=>$_POST['id'],'valor'=>$_POST['valor'],'tabla'=>$ta,'opciones'=>$_POST['opciones']]);
		if($_POST['opciones']['href']!='')
			$o['href']=$jmyWeb->guardar(['pagina'=>$_POST['pagina'],'id'=>$_POST['id'].'_href','valor'=>$_POST['opciones']['href'],'tabla'=>$ta]);
	}elseif($_POST['pagina']!=''&&$_POST['id']!=''&&$_POST['valor']!=''){
		$o=['out'=>'No tienes acceso a escribir en esta sección'];
	}
	$o['POST']=$_POST;
	$o['p']=$p;
	$o['t']=$t;
	$o['ps']=$ps;
}else{
	$o=["error"=>"No hay sesión activa"];
}
echo json_encode($o);
?>