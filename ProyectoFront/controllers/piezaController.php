<?php
include("../models/piezaModelo.php");

class piezaController{
  function agregar(){
    $nombre= $_POST['nombre'];
    $precio= $_POST['precio'];
    $objetos=new modeloguardar();
    echo $objetos->guardar($nombre,$precio);
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
  function altapieza(){
    $altapieza=$_POST['alta'];
    $objetos = new modeloaltapieza();
    echo $objetos->altapieza($altapieza);
  }
  function editarpieza(){
    $nombre= $_POST['nombre'];
    $precio= $_POST['precio'];
    $editar= $_POST['editar'];
    $objetos= new modeloeditar();
    echo $objetos->editar($editar,$nombre,$precio);
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
  $obj = new piezaController();
  echo $obj->consultar();
}else if($request == 'save'){
  $obj = new piezaController();
  echo $obj->agregar();
}
else if($request=='baja') {
  $obj = new piezaController();
  echo $obj->baja(); 
}
else if($request=='consultabaja'){
  $obj=new piezaController();
  echo $obj->consultarbaja();
}
else if ($request=='alta'){
  $obj=new piezaController();
  echo $obj->altapieza();
}
else if($request=='editarpieza'){
  $obj=new piezaController();
  echo $obj->editarpieza();
}
else if($request=='btneditar'){
  $obj=new piezaController();
  echo $obj->consuleditar();
}