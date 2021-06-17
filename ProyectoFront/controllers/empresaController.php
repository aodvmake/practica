<?php
include("../models/empresaModelo.php");

class empresaController{
  function agregar(){
    $nombre=utf8_decode($_POST['nombre']);
    $telefono= $_POST['telefono'];
    $email= $_POST['email'];
    $ubicacion=utf8_decode($_POST['ubicacion']);
  
    $objetos=new modeloguardar();
    echo $objetos->guardar($nombre,$telefono,$email,$ubicacion);
  }

  function consultar(){
    $re = $_POST['consulta'];
    $objetos=new modeloconsultar();
    echo $objetos->consultar($re);
  }
  function baja(){
    $baja=$_POST['baja'];
    $objetos=new modelobaja();
    echo $objetos->baja($baja);
  }
  function consultarbaja(){
    $consultbaja=$_POST['consultabaja'];
    $objetos=new modeloconsultabaja();
    echo $objetos->consultbaja($consultbaja);
  }
  function altaempresa(){
    $altaempresa=$_POST['alta'];
    $objetos = new modeloaltaempresa();
    echo $objetos->altaempresa($altaempresa);
  }
  function editarempresa(){
    $nombre=utf8_decode($_POST['nombre']);
    $telefono= $_POST['telefono'];
    $email= $_POST['email'];
    $ubicacion=utf8_decode($_POST['ubicacion']);
    $editar=$_POST['editar'];
    $objetos= new modeloeditar();
    echo $objetos->editar($editar,$nombre,$telefono,$email,$ubicacion);
  }
  function consuleditar(){
    $consuleditar=$_POST['btneditar'];
    $objetos = new modeloconsultareditar();
    echo $objetos->consuleditar($consuleditar);
  }
}


$request = isset($_POST['request']) ? $_POST['request'] : false;
if (isset($_POST['alta'])){
$request="alta"; 
}

if ($request=='consulta'){
  $obj = new empresaController();
  echo $obj->consultar();
}else if($request == 'save'){
  $obj = new empresaController();
  echo $obj->agregar();
}
else if($request=='baja') {
  $obj = new empresaController();
  echo $obj->baja(); 
}
else if($request=='consultabaja'){
  $obj=new empresaController();
  echo $obj->consultarbaja();
}
else if ($request=='alta'){
  $obj=new empresaController();
  echo $obj->altaempresa();
}
else if($request=='editarempresa'){
  $obj=new empresaController();
  echo $obj->editarempresa();
}
else if($request=='btneditar'){
  $obj=new empresaController();
  echo $obj->consuleditar();
}