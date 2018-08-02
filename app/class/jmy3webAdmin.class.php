<?php
session_start();
class JmyWebSession {
	public function session(){
		$sj=$_SESSION['jmyWebApp'];
		if($sj['t']==""){
			$o=$this->s(["api"=>JMY_API,"url"=>RUTA_ACTUAL]);
			$o2=$this->s(["token"=>$o['out']['session']['token'],"url"=>RUTA_ACTUAL]);
		}else{
			$o2 =$this->s(["token"=>$sj[$sj['t']],"url"=>RUTA_ACTUAL]);
		}
		$sj['t']=($sj['t']!="")?$sj['t']:$o['out']['session']['token'];
		$sj[$sj['t']]=$o2['out']['session'];
		$_SESSION['jmyWebApp']=$sj[$sj['t']];
		return ($o['out']['error']!='')?["o"=>$o,"o2"=>$o2]:$sj[$sj['t']];
	}
	public function fn($d){ //fn(["fn"=>"codigo","token"=>"codigo",])
		$d['url']=RUTA_ACTUAL;
		$o = ($d['fn']!='' && $d['token']!='' )?$this->s($d):["out"=>["error"=>"sin asignar token ó fn (función)","d"=>$d]];
		return $o;
	}
	private function s($s){
		$ch = curl_init();
		$sk = (is_array($s)) ? array_keys($s):false;$se = "";
		for ($i=0; $i <count($sk) ; $i++) { 
			$se=$se.$sk[$i]."=".$s[$sk[$i]]; $se=$se."&";	}
		curl_setopt($ch, CURLOPT_URL,JMY_SERVER);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$se);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$out = json_decode(curl_exec ($ch),1);
		curl_close ($ch);
		return $out;
	}
}
?>