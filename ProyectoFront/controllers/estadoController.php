<?php
include("../models/estadoModelo.php");

class estadoController{
 function consultaempresa(){
    $objetos=new modeloconsultarempresas();
    echo $objetos->consultar();
 }
 function consultarem(){
 	$empresa=$_POST['empresa'];
    $fecha_p=$_POST['fecha_p'];
    $fecha_f=$_POST['fecha_f'];
    //if($fecha_p<$fecha_f) {
	   $objetos=new modeloconsultarestado();
       echo $objetos->consultarestado($fecha_p,$fecha_f,$empresa);
   // }
   // else{
    //   echo "La fecha principal tiene que ser menor a la fecha final";
   // }
 }
}
$request = isset($_POST['request']) ? $_POST['request'] : false;

if ($request=='btncons'){
  $obj = new estadoController();
  echo $obj->consultarem();
}
elseif ($request=='conp') {
  $obj = new estadoController();
  echo $obj->consultaempresa();
}