<?php
include("../models/editarsolicitudModelo.php");
class editarsolicitudController{
  function consultar(){  
    $objetos=new modeloconsultar();
    echo $objetos->consultar();
  }
  function seleccionar(){
  	$btnseleccionar=$_POST['btnseleccionar'];
    $objetos=new modeloseleccionar();
    echo $objetos->seleccionarsolicitud($btnseleccionar);
  }
  function eliminar(){
  	$btneliminar=$_POST['btneliminar'];
  	$id_solicitud=$_POST['solicitud'];
  	$objetos= new modeloeliminar();
  	echo $objetos->eliminar($btneliminar,$id_solicitud); 
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
       $objetos=new modeloseguircreacion();
       echo $objetos->seguimiento($solicitud,$empresa,$precio,$pieza,$cantidad,$codigo,$ncompra,$fecha_c,$fecha_a,$total);
  }
  else{
    echo"error";
  }
 }
 function consultarpieza(){
    $valor1=$_POST['conp'];
    $objetos=new modeloconsultarpieza();
    echo $objetos->consulpie($valor1);
 }
 function elimiarsol(){
 	$solicitud=$_POST['solicitud'];
 	$objetos= new modeloelimiarsol();
 	echo $objetos->elimiarsolicitud($solicitud);
 } 
 function finalizar(){
 	$solicitud=$_POST['solicitud'];
 	$objetos= new modelofinalizar();
 	echo $objetos->finalizar($solicitud);
 }   
}

$request = isset($_POST['request']) ? $_POST['request'] : false;

if ($request=='consultar'){
  $obj = new editarsolicitudController();
  echo $obj->consultar();
}else if ($request=='btnseleccionar'){
  $obj = new editarsolicitudController();
  echo $obj->seleccionar();
}else if ($request=='btneliminar'){
  $obj = new editarsolicitudController();
  echo $obj->eliminar();	
}
else if ($request=='save') {
  $obj = new editarsolicitudController();
  echo $obj->guardarsolicitud();
}
else if ($request=='conp') {
  $obj = new editarsolicitudController();
  echo $obj->consultarpieza();
}
else if ($request=='elimarsol'){
  $obj= new editarsolicitudController();
  echo $obj->elimiarsol();
}
else if ($request=='finalizar'){
  $obj= new editarsolicitudController();
  echo $obj->finalizar();
}