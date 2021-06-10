<?php
include("../models/usuariosModelo.php");

class usuariosController{
  function agregar(){
    $nombre=utf8_decode($_POST['nombre']);
    $idpuesto= $_POST['idpuestos'];
    $telefono= $_POST['telefono'];
    $email= $_POST['email'];
    $pass= $_POST['pass'];
    $ubicacion= utf8_decode($_POST['ubicacion']);
    $objetos=new modeloguardar();
    echo $objetos->guardar($nombre,$idpuesto,$telefono,$email,$pass,$ubicacion);
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
  function altausuario(){
    $alta=$_POST['alta'];
    $objetos = new modeloaltausuario();
    echo $objetos->altausuarios($alta);
  }
  function editarusuario(){
    $nombre=utf8_decode($_POST['nombre']);
    $telefono= $_POST['telefono'];
    $editar= $_POST['editar'];
    $email=$_POST['email'];
    $direccion=utf8_decode($_POST['direccion']);
    $pass=$_POST['pass'];
    $objetos= new modeloeditar();
    echo $objetos->editar($editar,$nombre,$telefono,$email,$direccion,$pass);
  }
  function consuleditar(){
    $consuleditar=$_POST['btneditar'];
    $objetos = new modeloconsultareditar();
    echo $objetos->consuleditars($consuleditar);
  }
  function puesto(){
    $objetos = new modelopuesto();
    echo $objetos->consulpuesto();
  }
}


$request = isset($_POST['request']) ? $_POST['request'] : false;
if (isset($_POST['alta'])){
$request="alta"; 
}

if ($request=='consulta'){
  $obj = new usuariosController();
  echo $obj->consultar();
}else if($request == 'save'){
  $obj = new usuariosController();
  echo $obj->agregar();
}
else if($request=='baja') {
  $obj = new usuariosController();
  echo $obj->baja(); 
}
else if($request=='consultabaja'){
  $obj=new usuariosController();
  echo $obj->consultarbaja();
}
else if ($request=='alta'){
  $obj=new usuariosController();
  echo $obj->altausuario();
}
else if($request=='editarusuario'){
  $obj=new usuariosController();
  echo $obj->editarusuario();
}
else if($request=='btneditar'){
  $obj=new usuariosController();
  echo $obj->consuleditar();
}
else if($request=='puesto'){
  $obj=new usuariosController();
  echo $obj->puesto();
}