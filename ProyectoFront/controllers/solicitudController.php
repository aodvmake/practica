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
}

$request = isset($_POST['request']) ? $_POST['request'] : false;

if ($request=='consulta'){
  $obj = new solicitudController();
  echo $obj->consultar();
}
else if ($request=='conp') {
  $obj = new solicitudController();
  echo$obj->consultarpieza();
}
?>