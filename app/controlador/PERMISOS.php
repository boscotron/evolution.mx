<?php 
function licencia_evolution($d=[]){
    global $jmyWeb;
    global $jmy;
    $s =$jmyWeb->session();
    $jmyWeb ->pre(['p'=>$s,'t'=>'TITULO_ARRAY']);
    if($d['id']!=''){
        $out['tipo'] = $jmy->ver([
            "TABLA"=>TABLA_USUARIOS."_".$s['body']['api_web']['ID_F'],
            "ID"=>$d['id'],
            "COL"=>['tipo'],
            //"SALIDA"=>'ARRAY',
            ]);
            $out['tipo']=$out['tipo']['ot'][$d['id']]['tipo'];
        }else{
                $out['error'] = 'Sin ID';
        }
    return $out;
}

/* licencia_evolution(["id"=>"25"]); */