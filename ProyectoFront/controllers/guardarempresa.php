<?php
include("../models/consulempresa.php");

class datoss{
 function saves(){
  $request = $_REQUEST["request"];
  if ($request == 'data') {
	$nombre= $_POST['nombre'];
	$telefono= $_POST['telefono'];
	$email= $_POST['email'];
	$ubicacion= $_POST['ubicacion'];
	
	$obj=new modeloguardar();
	echo $obj->guardar($nombre,$telefono,$email,$ubicacion);
   }
 }
 function enviar($nombre,$telefono,$email,$ubicacion){
 $registro= new modeloguardar();
 $registro->guardar($nombre,$telefono,$email,$ubicacion);	
 }
}
$variable=new datoss();
echo $variable->saves();
?>