<?php
include("../models/editarModelo.php");

class editarController{
  function consultar(){  
    $objetos=new modeloconsultar();
    echo $objetos->funcionconsultar();
  }
  function editar(){
  	$nombre=utf8_decode($_POST['nombre']);
  	$telefono=$_POST['telefono'];
  	$direccion=utf8_decode($_POST['direccion']);
  	$npass=$_POST['contrasena'];
  	if ($npass=='') {
  	$npass='1';	
  	}
  	$objetos=new modeloeditar();
  	echo $objetos->funeditar($nombre,$telefono,$direccion,$npass);
  }
}
$request = isset($_POST['request']) ? $_POST['request'] : false;

if ($request=='consul'){
  $obj = new editarController();
  echo $obj->consultar();
}else if ($request=='actualizar'){
  $obj = new editarController();
  echo $obj->editar();	
}