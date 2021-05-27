<?php
include("../models/solicitudModelo.php");

class solicitudController{
  function consultar(){
  	$valor=$_POST['consulta'];
    $objetos=new modelconsultar();
    echo $objetos->consultar($valor);
 }
  function consultarpieza(){
    $valor1=$_POST['conp'];
    $objetos=new modeloconsultarpieza();
    echo $objetos->consulpie($valor1);
 }
 function guardarsolicitud(){
  $empresa=$_POST['empresa'];
  $solicitud=$_POST['solicitud'];
  $pieza=$_POST['pieza'];
  $precio=$_POST['precio'];
  $cantidad=$_POST['cantidad'];
  $codigo=$_POST['codigo'];
  $ncompra=$_POST['ncompra'];
  $fecha_c=$_POST['fecha_c'];
  $fecha_a=$_POST['fecha_a'];
  $total=$cantidad*$precio;
  $fecha_actual = date("Y-m-d");
  $fecha_aviso=date("Y-m-d",strtotime($fecha_c."- 5 days"));
 
  if($fecha_a<$fecha_c && $fecha_aviso>= $fecha_a && $fecha_c>=$fecha_actual && $fecha_a>=$fecha_actual){
    if ($solicitud=='vacio'){
      $objetos=new modelocreacion();
      echo $objetos->crearsol($empresa,$precio,$pieza,$cantidad,$codigo,$ncompra,$fecha_c,$fecha_a,$total);
    }
    else{
       //echo"llego aqui la multiplicacion es de ".$total;
       $objetos=new modeloseguircreacion();
       echo $objetos->seguimiento($solicitud,$empresa,$precio,$pieza,$cantidad,$codigo,$ncompra,$fecha_c,$fecha_a,$total);
    }
  }
  else{
    echo"error";
  }
 }
function borrar(){
  $btnborrar=$_POST['btnborrar'];
  $solicitud=$_POST['solicitud'];
  $objetos=new modeloborrar();
  echo $objetos->funborrar($btnborrar,$solicitud);
 }
 function finalizar(){
  $btnfinalizar=$_POST['finalizar'];
  $objetos=new modelofinalizar();
  echo $objetos->finalizar($btnfinalizar);
 }
}

$request = isset($_POST['request']) ? $_POST['request'] : false;

if ($request=='consulta'){
  $obj = new solicitudController();
  echo $obj->consultar();
}
else if ($request=='conp') {
  $obj = new solicitudController();
  echo $obj->consultarpieza();
}
else if ($request=='save') {
  $obj = new solicitudController();
  echo $obj->guardarsolicitud();
}
else if($request=='btnborrar'){
  $obj = new solicitudController();
  echo $obj->borrar();
}
else if($request=='finalizar'){
  $obj = new solicitudController();
  echo $obj->finalizar();
}
?>