<?php
session_start();
class JMY3WEB extends JMY3MySQL{
  public $print;
  public $printSec;
  private $out;
  private $tabla;
  private $modoEdicion;

  public function __construct(){
  	global $tabla;
  	$tabla = "vistaweb";
  	global $modoEdicion;
  	$modoEdicion=($_SESSION['JMY3WEB'][DOY])?ture:MODO_DESAROLLADOR;
	 //$_SESSION['JMY3WEB']['add_js']=[];

  	parent::db([$tabla]); // Verificamos que exista la tabla, de nos er así el sistema la crea
  }
  	public function modoEditor(){ global $modoEdicion; return $modoEdicion; }
	public function url_actual($d=[]){ if($d['return']){ return substr(RUTA_ACTUAL, 0, -1).$_SERVER['REQUEST_URI']; }else{echo substr(RUTA_ACTUAL, 0, -1).$_SERVER['REQUEST_URI'];} }
	public function url_templet($d=[]){ if($d['return']){ return RUTA_ACTUAL.BASE_TEMPLET; }else{echo RUTA_ACTUAL.BASE_TEMPLET;} }
	public function url_app($d=[]){ if($d['return']){ return RUTA_ACTUAL.BASE_APP; }else{echo RUTA_ACTUAL.BASE_TEMPLET;} }
	public function url_inicio($d=[]){ if($d['return']){ return RUTA_ACTUAL; }else{echo RUTA_ACTUAL;}  }
  
  	public function archivos($d=[]){ 
  		/* 
  		archivos([	'ruta'=>'carpeta/',
  					'height'=>'',
  					'width'=>'',
  					'permisos'=>[ 	//'des_del_file'=>true, // Desactivar eleiminar archivos
									//'des_regresar'=>true,
									//'des_cre_folder'=>true,
									//'des_del_folder'=>true,
									//'des_upload'=>true,
									//'des_rename_files'=>true,
									//'des_rename_folders'=>true,
									//'des_duplicate'=>true,
									//'des_breadcrumb'=>true,
  		]);

  		*/
  		 
  		$carpetas = explode('/', $d['ruta']);
		$key=md5(json_encode($datos));
		/* RUTINA PARA CREAR FICHEROS EN CASO DE NO EXISTIR */
		for($i=0;$i< count($carpetas);$i++){		
			$fichero = '';
			for($u=0;$u<=$i ;$u++){		
				$fichero .= $carpetas[$u];
				if($u>=0 && $u<$i ){$fichero .= '/';}
			}
			if (!file_exists(BASE_ARCHIVO.$fichero)) { // CREAR FICHERO
				if (mkdir(BASE_ARCHIVO.$fichero, 0755, true))
					chmod(BASE_ARCHIVO.$fichero, 0755);
			}
		}	
		/* PERMISOS DE ARCHIVOS */
		if(count($datos['permisos'])>0){
			$perKey = array_keys($datos['permisos']);
			for($i=0;$i<count($perKey) ;$i++){
				$_SESSION[$this->token_variable('archivos'.$key)][$this->token_variable($perKey[$i])]=$datos['permisos'][$perKey[$i]];
			}
			if(is_array($datos['bloquer_archivos']))
				$_SESSION[$this->token_variable('archivos'.$key)][$this->token_variable('bloquer_archivos')]=$datos['bloquer_archivos'];
		}
		$d['height']=($d['height']!='')?$d['height']:"100%";
		$out = '<iframe width="'.$d['width'].'" height="'.$d['height'].'" style="'.$d['style'].'" frameborder="0" allowtransparency="true"
                src="'.RUTA_ACTUAL.'app/vendor/filemanager/dialog.php?type=2&editor=mce_0&lang=eng&key='.$key.'&fldr='.urlencode($fichero).'&jmy_url='.$datos['bread'].'"></iframe>';
        return $out;
  	}
	public function estadisticas(){
		$g['tabla'] = "estadisticas";
	//	$g['db'] = $this->db([$g['tabla']]);		
		$g['url'] = $this->url_actual(['return'=>true]);		 
		$g['ver'] = $this->ver([	
						"TABLA"=>$g['tabla'],
						"COL"=>["url"],
						"V"=>[$g['url']], 
					]);					
		$g['key'] = ($g['ver']['otKey'][0]!='')?$g['ver']['otKey'][0]:"";		
		
		if($g['key']!=''){
			$g['ver2'] = $this->ver([	"TABLA"=>$g['tabla'], 
						"ID_F"=>$g['key'], 
					]);
		}		
		$g['visitas']=($g['ver2']['ot'][$g['key']]['visitas']!='')?$g['ver2']['ot'][$g['key']]['visitas']+1:1;		
		//$g['gu'] = 
		parent::guardar([	"TABLA"=>$g['tabla'],
							"ID_F"=>$g['key'],
							"A_D"=>TRUE, 
							"GUARDAR"=>["url"=>$g['url'],
										"visitas"=>$g['visitas']
										],
							]);
		$g['varGlobalMes'] = 'global_'.date('mY');
		$g['varGlobal'] = 'global';
		$g['verGlobal'] = $this->ver([	"TABLA"=>$g['tabla'], 
										"ID_F"=>[$g['varGlobalMes'],$g['varGlobal']], 
					]);						
		$g['visitasMes']=($g['verGlobal']['ot'][$g['varGlobalMes']]['visitas']!='')?$g['verGlobal']['ot'][$g['varGlobalMes']]['visitas']+1:1;
		$g['visitasTotal']=($g['verGlobal']['ot'][$g['varGlobal']]['visitas']!='')?$g['verGlobal']['ot'][$g['varGlobal']]['visitas']+1:1;
		//$g['guGloMe'] = 
		parent::guardar([	"TABLA"=>$g['tabla'],
							"ID_F"=>$g['varGlobalMes'],
							"A_D"=>TRUE, 
							"GUARDAR"=>["visitas"=>$g['visitasMes']
							]]);
		//$g['guGlo'] = 
		parent::guardar([	"TABLA"=>$g['tabla'],
							"ID_F"=>$g['varGlobal'],
							"A_D"=>TRUE, 
							"GUARDAR"=>["visitas"=>$g['visitasTotal']
						]]);		
		return $g;
	}
  	public function token_variable($d=''){ 
		return  md5($_SESSION['session']['TOKEN'].$d.date('d'));						
	}
	public function cargar($d=[],$variable='print',$o=['error'=>'datos insuficientes']){ 
		/* cargar(["pagina"=>"blog","id"=>"titulo_nota"]); // id opcional */
		global  $print;global  $printSec;global $tabla;
		if($d['pagina']!=''){
			$t=($d['tabla']!='')?$d['tabla']:$tabla;
		  	$o = parent::ver([ "TABLA"=>$t, "ID_F"=>$d['pagina'] ]);
		  	$o['PETICION']=$d;
		  	if($d['secundario']!=''){
		  		if(!is_array($printSec)){$printSec=[];}
		  		$printSec[$d['secundario']]=$o['ot'][$d['pagina']];
		  	}else{
		  		$print =$o['ot'][$d['pagina']];
		  	}
		} 
		return $o;
	}

	public function pnt($d,$ph="Texto texto texto",$op=[]){ 
		global $print; global $printSec; 
		if($op['secundario']!=''){
			$o=($printSec[$op['secundario']][$d]!='')?$printSec[$op['secundario']][$d]:$ph;
		}else{
			$o=($print[$d]!='')?$print[$d]:$ph;
		}
		if(!$op['return'])
			echo $o;			
		else
			return $o;
	}

	public function guardar($d=[],$r=["Datos de solicitud insuficientes o no se tienen los permisos de usuario"]){
		global $tabla;
		$s=$this->modulos(["modulos_permisos"=>1]);
		$ta=($d['tabla']!='')?$d['tabla']:$tabla;
		$t=explode('__',$ta);
		if($d['id']!=''&&$d['pagina']!=''&&$d['valor']!='' &&$s['modulos_permisos'][$t[0]]>1){
			$t=["TABLA"=>$ta, 
			"ID_F"=>$d['pagina'],
			"A_D"=>TRUE, 
			"GUARDAR"=>[$d['id']=>$d['valor']]	];
			$r=parent::guardar($t);
		} 
		return [$t,$r,$ta,$s,"real"=>[ $d['id'],$d['pagina'],$d['valor'],$s['modulos_permisos'],$t[0],$ta,$d['tabla'] ]];
			  //0 , 1 , 2  , 3
	}

	public function pre($d=[]){
		$o=$d['p'];$t=($d['t']!="")?"<h5>".$d['t']."</h5>":"";
		echo"$t<pre>";print_r($o);echo"</pre>";
	}
	public function cargar_vista($d=[]){	
		global $print;
		global $modoEdicion;
		$data = $d["data"];
		if($modoEdicion){			
			$this->cargar_js(['url'=>BASE_APP.'js/ckeditor/ckeditor.js']);
			$this->cargar_js(['url'=>BASE_APP.'js/ckeditor/adapters/jquery.js']); 
			$this->cargar_js(['url'=>'https://code.jquery.com/ui/1.12.1/jquery-ui.js']);
			$this->cargar_js(['url'=>BASE_APP.'js/jmy/jmyWeb.js']);
		}
		if(file_exists(BASE_TEMPLET.TEMPLET_HEADER)){
			if(file_exists(BASE_APP.'controlador/'.TEMPLET_HEADER))
				include(BASE_APP.'controlador/'.TEMPLET_HEADER); 
			//$this ->pre(['p'=>BASE_TEMPLET.'controlador/'.TEMPLET_HEADER,'t'=>'TITULO_ARRAY']);	
			$this -> cargar([ 	"pagina"=>PAGE_HEADER,
						 		"tabla"=>"vistaweb", 
						 		"secundario"=>PAGE_HEADER, 
							]);
			include(BASE_TEMPLET.TEMPLET_HEADER); 
		}	
		if(file_exists(BASE_TEMPLET.$d['url'])){
			$this->estadisticas();	
			include(BASE_TEMPLET.$d['url']);
		}else{
			if(file_exists(BASE_TEMPLET.'error404.php'))
				include(BASE_TEMPLET.'error404.php');
			else
				echo "error 404, no se encontro ".$d['url']; 
		}	
		if(file_exists(BASE_TEMPLET.TEMPLET_FOOTER)){
			$this -> cargar([  "pagina"=>PAGE_FOOTER,
							 	"tabla"=>"vistaweb", 
							 	"secundario"=>PAGE_FOOTER, 
							]);
			include(BASE_TEMPLET.TEMPLET_FOOTER);
		}
	}

	public function cargar_js($d=[]){	
		if(!is_array($_SESSION['JMY3WEB']['add_js']))
			$_SESSION['JMY3WEB']['add_js']=[];
		if($d['url']!="" && !in_array($d['url'],$_SESSION['JMY3WEB']['add_js']))
			$_SESSION['JMY3WEB']['add_js'][]=$d['url'];
		if($d['unico'])
			$_SESSION['JMY3WEB']['cargar_js_borrar'][]=$d['url'];
	}
	public function llamar_js($d=[],$tmp = ''){	
		if(is_array($_SESSION['JMY3WEB']['add_js'])){
			$key = array_keys($_SESSION['JMY3WEB']['add_js']);
			for($i=0;$i<count($key) ;$i++){
				if($_SESSION['JMY3WEB']['add_js'][$i]!=''){
					$u=$_SESSION['JMY3WEB']['add_js'][$key[$i]];
					$u=(strpos($u,'http')===0)?$u:RUTA_ACTUAL.$u;
					$tmp.='<script src="'.$u.'"></script>'; 
				}
				if(in_array($_SESSION['JMY3WEB']['add_js'][$i],$_SESSION['JMY3WEB']['cargar_js_borrar']))
					unset($_SESSION['JMY3WEB']['add_js'][$i]);
			}
			unset($_SESSION['JMY3WEB']['add_js']);
			echo $tmp;
		}
	}

	public function cargar_css($d=[]){	
		if(!is_array($_SESSION['JMY3WEB']['add_c']))
			$_SESSION['JMY3WEB']['add_c']=[];
		if($d['url']!="" && !in_array($d['url'],$_SESSION['JMY3WEB']['add_c']))
			$_SESSION['JMY3WEB']['add_c'][]=$d['url'];
		if($d['unico'])
			$_SESSION['JMY3WEB']['cargar_c_borrar'][]=$d['url'];
	}
	public function llamar_css($d=[],$tmp = ''){	
		if(is_array($_SESSION['JMY3WEB']['add_c'])){
			$key = array_keys($_SESSION['JMY3WEB']['add_c']);
			for($i=0;$i<count($key) ;$i++){
				if($_SESSION['JMY3WEB']['add_c'][$i]!=''){
					$u=$_SESSION['JMY3WEB']['add_c'][$key[$i]];
					$u=(strpos($u,'http')===0)?$u:RUTA_ACTUAL.$u;
					$tmp.='<link rel="stylesheet" href="'.$u.'">'; 
				}
				if(in_array($_SESSION['JMY3WEB']['add_c'][$i],$_SESSION['JMY3WEB']['cargar_c_borrar']))
					unset($_SESSION['JMY3WEB']['add_c'][$i]);
			}
			unset($_SESSION['JMY3WEB']['add_c']);
			echo $tmp;
		}
	}
	public function cargar_meta($d=[]){	
		if(!is_array($_SESSION['JMY3WEB']['add_m']))
			$_SESSION['JMY3WEB']['add_m']=[];
		if($d['url']!="" && !in_array($d['meta'],$_SESSION['JMY3WEB']['add_m']))
			$_SESSION['JMY3WEB']['add_m'][]=$d['url'];
		if($d['unico'])
			$_SESSION['JMY3WEB']['cargar_m_borrar'][]=$d['url'];
	}
	public function llamar_meta($d=[],$tmp = ''){	
		if(is_array($_SESSION['JMY3WEB']['add_m'])){
			$key = array_keys($_SESSION['JMY3WEB']['add_m']);
			for($i=0;$i<count($key) ;$i++){
				if($_SESSION['JMY3WEB']['add_m'][$i]!=''){
					$tmp.=$_SESSION['JMY3WEB']['add_m'][$key[$i]]; 
				}
				if(in_array($_SESSION['JMY3WEB']['add_m'][$i],$_SESSION['JMY3WEB']['cargar_m_borrar']))
					unset($_SESSION['JMY3WEB']['add_m'][$i]);
			}
			unset($_SESSION['JMY3WEB']['add_m']);
			echo $tmp;
		}
	}

	public function s2($d){
		return ($d['url']!='')?file_get_contents($d['url'], false, stream_context_create([
			'http'=>[
			'method'  =>'POST',
			'header'  =>'Content-type: application/json',
			'content' =>json_encode($d)
		]])):['error' =>'No url'];
	}
	private function se_a_jmy($d=[],$logout=0){ 
		if($logout){$_SESSION=[];setcookie('SE','',time()-42000,'/');setcookie(session_name(),'',time()-42000,'/'); session_destroy();}else{if($d[0]!=''&&$d[1]!=''){$d['id']=$d[0];$d['token']=$d[1];unset($d[0]);unset($d[1]);$d['api']="e2ad454bea7d919f0fc411a8b885580c";$d['api_web']=JMY_API;$d['datos_device']=true;$d['apis'][$d['api']]=["nombre"=>"JmyWeb","version"=>"1.0"];$d['url']='https://comsis.mx/api/auth/v1/token';setcookie('SE',json_encode($d),time()+30*24*60*60);$o=(is_array($_SESSION['jmysa']))?$_SESSION['jmysa']:json_decode($this->s2($d),1);$_SESSION['jmysa']=(is_array($_SESSION['jmysa']))?$o:["user"=>$o['out']['userData'],"devices"=>$o['out']['devices'],"body"=>$o['out']['jmyapi']['body'],"permiso"=>$o['out']['jmyapi']['body']['permisos_api']['PERMISOS']];		
		}else{if($_SESSION['jmysa']['permiso']=='' && $_COOKIE['SE']!='')$_SESSION['jmysa']= json_decode($this->s2(json_encode($_COOKIE['SE'],1)),1);}$_SESSION['JMY3WEB'][DOY]=($_SESSION['jmysa']['permiso']>2)?1:0; unset($o);switch($d['return']){
			case'permisos_api':$o=$_SESSION['jmysa']['body']['permisos_api']['PERMISOS'];break;
			case'db':$o=$_SESSION['jmysa']['body']['api_web']['ID_F'];break;
			case'user_id':$o=$_SESSION['jmysa']['user']['user_id'];break;
			default:$o=$_SESSION['jmysa'];break;}return$o;}}	

	public function modulos($d=[]){	
		$o=$this->se_a_jmy($d);
		$i=($d['id']!='')?$d['id']:$o['user']['user_id'];
		$p=$this->ver([
			"TABLA"=>TABLA_USUARIOS.'_'.$o['body']['api_web']['ID_F'], 
			"ID"=>$i,
			"COL"=>['modulos'], 
		]);
		if($d['modulos_permisos']){
			$t=($p['ot'][$i]['modulos']!='')?json_decode($p['ot'][$i]['modulos'],1):[];
			$p['ot'][$i]['modulos']=[];
			foreach ($t as $key => $value) {
				$p['ot'][$i]['modulos'][$value['modulo']]=$value['permiso'];
			}
		}
		return [
			"i"=>$i,
			"modulos"=>$o['body']['api_web']['json']['modulos'],
			"modulos_niveles"=>$o['body']['api_web']['json']['modulos_niveles'],
			"modulos_label"=>$o['body']['api_web']['json']['modulos_label'],
			"modulos_permisos"=>($p['ot'][$i]['modulos']!='' && !$d['modulos_permisos'])?json_decode($p['ot'][$i]['modulos'],1):$p['ot'][$i]['modulos']
		];
	}
	public function sesion($d=null,$o=0){return $this->se_a_jmy($d,$o);} 
	public function session($d=null,$o=0){return $this->se_a_jmy($d,$o);} 
	public function guardar_session($d=null){
		$s=$this->session($d);
		$f=(is_array($d))?array_keys($d):[];
		if(is_array($s)){
			if(in_array('instalar',$f))
				$this->pre(['p'=>parent::db([$ta]),'t'=>'Instalar Info']);
			$r=parent::guardar([
				"TABLA"=>TABLA_USUARIOS.'_'.$s['body']['api_web']['ID_F'], 
				"ID_F"=>$s['user']['user_id'],
				"A_D"=>TRUE, 
				"GUARDAR"=>[
					"perfil"=>$s['user'],
					"proveedor"=>'JMYOAUTH',
					"email"=>$s['user']['email'],
					"nombre"=>$s['user']['name'],
					"foto_perfil"=>$s['devices']['json']['url_foto'],
				]
			]);
		}
	}
	public function quitarAcentos($d){
		return str_replace(['À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','Ā','ā','Ă','ă','Ą','ą','Ć','ć','Ĉ','ĉ','Ċ','ċ','Č','č','Ď','ď','Đ','đ','Ē','ē','Ĕ','ĕ','Ė','ė','Ę','ę','Ě','ě','Ĝ','ĝ','Ğ','ğ','Ġ','ġ','Ģ','ģ','Ĥ','ĥ','Ħ','ħ','Ĩ','ĩ','Ī','ī','Ĭ','ĭ','Į','į','İ','ı','Ĳ','ĳ','Ĵ','ĵ','Ķ','ķ','Ĺ','ĺ','Ļ','ļ','Ľ','ľ','Ŀ','ŀ','Ł','ł','Ń','ń','Ņ','ņ','Ň','ň','ŉ','Ō','ō','Ŏ','ŏ','Ő','ő','Œ','œ','Ŕ','ŕ','Ŗ','ŗ','Ř','ř','Ś','ś','Ŝ','ŝ','Ş','ş','Š','š','Ţ','ţ','Ť','ť','Ŧ','ŧ','Ũ','ũ','Ū','ū','Ŭ','ŭ','Ů','ů','Ű','ű','Ų','ų','Ŵ','ŵ','Ŷ','ŷ','Ÿ','Ź','ź','Ż','ż','Ž','ž','ſ','ƒ','Ơ','ơ','Ư','ư','Ǎ','ǎ','Ǐ','ǐ','Ǒ','ǒ','Ǔ','ǔ','Ǖ','ǖ','Ǘ','ǘ','Ǚ','ǚ','Ǜ','ǜ','Ǻ','ǻ','Ǽ','ǽ','Ǿ','ǿ'],['A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','L','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o'],$d);
	}
	public function URLFriendly($u,$s='-'){
		$u=$this->quitarAcentos($u);
		$u=preg_replace(['/[^a-zA-Z0-9 \'-]/','/[ -\']+/','/^-|-$/'],['', $s, ''],$u);
		$u=preg_replace('/-inc$/i','',$u);
		return strtolower($u);
	}
	public function redireccionar($url){
		echo '<script type="text/javascript">
		<!--
		window.location = "'.$url.'"
		//-->
		</script>';
	}
} 