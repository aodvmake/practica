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
}
$request = isset($_POST['request']) ? $_POST['request'] : false;

if ($request=='save'){
  $obj = new piezaController();
  echo $obj->agregar();
}

?>