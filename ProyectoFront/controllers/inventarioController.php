<?php
include("../models/inventarioModelo.php");

class piezaController{
  function agregar(){
    $nombre= $_POST['nombre'];
    $serial= $_POST['serial'];
    $marca= $_POST['marca'];
    $cantidad=$_POST['cantidad'];
    $descripcion=$_POST['descripcion'];
    $objetos=new modeloguardar();
    echo $objetos->guardar($nombre,$serial,$marca,$cantidad,$descripcion);
  }
  function consultar(){
    $re = $_POST['consulta'];
    $objetos=new modeloconsultar();
    echo $objetos->consultar($re);
  }
  function consultareditar(){
    $btneditar=$_POST['btneditar'];
    $objetos=new modeloconsultareditar();
    echo $objetos->consultedit($btneditar);
  }
  function editar(){
    $editar=$_POST['edit'];
    $nombre=$_POST['nombre'];
    $serial=$_POST['serial'];
    $marca=$_POST['marca'];
    $cantidad=$_POST['cantidad'];
    $descripcion=$_POST['descripcion'];
    $objetos=new modeloeditar();
    echo $objetos->editarherramienta($editar,$nombre,$serial,$marca,$cantidad,$descripcion);
  }
  function bajatemporal(){
    $btneliminar=$_POST['btneliminar'];
    $objetos=new modelobajatemporal();
    echo $objetos->baja($btneliminar);
  }
  function consultabaja(){
    $consulbaja=$_POST['consultabaja'];
    $objetos=new modeloconsulbaja();
    echo $objetos->consultabaja($consulbaja);
  }
  function activar(){
    $activar=$_POST['btnactivar'];
    $objetos=new modeloactivar();
    echo $objetos->activardenuevo($activar);
  }
  function retirar(){
    $retirar=$_POST['btnretirar'];
    $responsable=$_POST['responsable'];
    $cantidad=$_POST['cantidad'];
    $objetos=new modeloretirar();
    $objetos->retira($retirar,$responsable,$cantidad);
  }
  function consultaentregar(){
    $objetos=new modeloconsultaentrega();
    $objetos->consultaentrega();
  }
  function regresar(){
    $btnregresar=$_POST['btnregresar'];
    $objetos=new modeloregresar();
    $objetos->regresarcantidad($btnregresar);
  }
}
$request = isset($_POST['request']) ? $_POST['request'] : false;

if ($request=='save'){
  $obj = new piezaController();
  echo $obj->agregar();
}
else if ($request=='consulta') {
  $obj = new piezaController();
  echo $obj->consultar();
}
else if ($request=='btneditar'){
  $obj = new piezaController();
  echo $obj->consultareditar();
}
else if ($request=='editar'){
  $obj=new piezaController();
  echo $obj->editar();
}
else if ($request=='btneliminar'){
   $obj=new piezaController();
   echo $obj->bajatemporal();
}
else if ($request=='consultabaja'){
  $obj=new piezaController();
  echo $obj->consultabaja();
}
else if($request=='btnactivar'){
 $obj=new piezaController();
 echo $obj->activar();
}
else if($request=='btnretirar'){
  $obj= new piezaController();
  echo $obj->retirar();
}
else if ($request=='btnentrega'){
  $obj=new piezaController();
  echo $obj->consultaentregar();
}
else if ($request=='btnregresar'){
  $obj=new piezaController();
  echo $obj->regresar();
}
?>