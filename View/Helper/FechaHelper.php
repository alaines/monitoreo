<?php
class FechaHelper extends AppHelper{
    
    function meses($param) {
        $meses = ['01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio', '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre'];
        $result = $meses[$param];
        return $result;
    }
	
    function fechaNormal($fec){
        if($fec !=""){
            return $this->output(h(date('d/m/Y',strtotime($fec))));
        }
    }


    function ucname($string) {
        $string = ucwords(strtolower($string));

        foreach (array('-', '\'') as $delimiter) {
          if (strpos($string, $delimiter)!==false) {
            $string =implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
          }
        }
        return $string;
    }

    function fcname($string) {
    $string =ucfirst(strtolower($string));

    foreach (array('-', '\'') as $delimiter) {
      if (strpos($string, $delimiter)!==false) {
        $string =implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
      }
    }
    return $string;
}

function is_dia_valido($fecha){ 

    $weekday = date("w", strtotime($fecha)); 
     
    if($weekday == 0 || $weekday == 6){ 
        return false; 
    }else{ 
        $feriados  = array( 
                            '01-01', 
                            '24-03', 
                            '25-03',
                            '24-06',
                            '29-06',
                            '28-07',
                            '29-07',
                            '30-08',
                            '10-10',
                            '08-12', 
                          ); 
         
        $fecha = explode("-", $fecha); 
        $fecha = $fecha[2]."-".$fecha[1]; // deberia devolver DIA-MES  
         
        if(in_array($fecha, $feriados)){ 
            return false; 
        } 
        else{ 
            return true; 
        } 
    } 
} 
	
	function fechaActual(){
		$dia = date('j'); // devuelve el día del mes
		if (strlen($dia)==1){
			$dia = '0'.$dia;
		}
		$mes = date('m'); // devuelve el número del mes
		$ano = date('Y'); // devuelve el año
		$fecha = $dia."/".$mes."/".$ano;
		return $fecha;
	}
        
        function edad($fec){
            if($fec != null){
                $fecha1 = new DateTime(date('Y-m-j'));
                $fecha2 = new DateTime($fec);
                $fecha = $fecha1->diff($fecha2);
                return $fecha->y." AÑOS";
            } else {
                return "";
            }
        }


        
function DiasHabiles($fecha_inicial,$fecha_final)
{
    $newArray = array();
list($dia,$mes,$year) = explode("-",$fecha_inicial);
$ini = mktime(0, 0, 0, $mes , $dia, $year);
list($diaf,$mesf,$yearf) = explode("-",$fecha_final);
$fin = mktime(0, 0, 0, $mesf , $diaf, $yearf);
 
$r = 1;
while($ini != $fin)
{
$ini = mktime(0, 0, 0, $mes , $dia+$r, $year);
$newArray[].=$ini;
$r++;
}
return $newArray;
}
 
 
 
//2.- Una función que evalué el arreglo de fechas obtenido, que contenga los feriados nacionales que correspondan (restando) y que reste los sábados y domingos. 
 
function Evalua($arreglo)
{
$feriados        = array(
'1-1',  //  Año Nuevo (irrenunciable)  
'24-03',  //  Viernes Santo (feriado religioso)  
'25-03',  //  Sábado Santo (feriado religioso)  
'1-05',  //  Día Nacional del Trabajo (irrenunciable)  
'21-05',  //  Día de las Glorias Navales  
'29-06',  //  San Pedro y San Pablo (feriado religioso)  
'16-07',  //  Virgen del Carmen (feriado religioso)  
'15-08',  //  Asunción de la Virgen (feriado religioso)  
'18-09',  //  Día de la Independencia (irrenunciable)  
'19-09',  //  Día de las Glorias del Ejército  
'12-10',  //  Aniversario del Descubrimiento de América  
'31-10',  //  Día Nacional de las Iglesias Evangélicas y Protestantes (feriado religioso)  
'1-11',  //  Día de Todos los Santos (feriado religioso)  
'8-12',  //  Inmaculada Concepción de la Virgen (feriado religioso)  
'13-12',  //  elecciones presidencial y parlamentarias (puede que se traslade al domingo 13)  
'25-12',  //  Natividad del Señor (feriado religioso) (irrenunciable)  
);
 $dia=0;
$j= count($arreglo);
 
for($i=0;$i<=$j;$i++)
{
$dia = $arreglo[$i];
 
        $fecha = getdate($dia);
            $feriado = $fecha['mday']."-".$fecha['mon'];
                    if($fecha["wday"]==0 or $fecha["wday"]==6)
                    {
                        $dia_ ++;
                    }
                        elseif(in_array($feriado,$feriados))
                        {
                            $dia_++;
                        }
}
$rlt = $j - $dia_;
return $rlt;
}
}