<?php
// Busqueda automatica //
//error_reporting(0);
include("../models/consulempresa.php");

if(isset($_POST['re'])){
 class datos{
  function save(){
   $re=$_POST['re'];
   $obj=new modeloconsultar();
   echo $obj->consultar($re);
  }
 }
 $variable=new datos();
 echo $variable->save();
}
// Guardar empresa// 

//if (isset($_REQUEST['data'])){
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
 $registro = new modeloguardar();
 $registro->guardar($nombre,$telefono,$email,$ubicacion);	
 }
}

//}


// EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO 
// EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO 
// EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO 
// EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO  EJEMPLO 


//Clase unica para controlador de pantalla
class empresaController{
  //Funciones de la pantalla a ejecutar
  function save(){

  }
  function edit(){

  }
}
//Intanciar clase unica
$obj = new empresaController();
//Obtener variable identificadora para entrar en funcion especifica de la clase unica
$request = $_REQUEST['request'];

//Condicionales para poder entrar a las funciones especificas de la clase unica
if ($request=='save') {
  //Entra a save porque la variable request que viene del js es save (Checa el js)
  echo $obj->save();
}else if($request == 'edit'){
  //Entra a save porque la variable request que viene del js es save (Aqui es solo para ejemplo de la funcion)
  echo $obj->edit();
}
//No cierres la llave de php por seguridad :)