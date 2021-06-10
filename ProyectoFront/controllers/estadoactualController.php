<?php
include("../models/estadoactualModelo.php");

class empleadoController{
  function consultar(){
    $consulta=$_POST['consulta'];
    $objetos=new modeloconsultar();
    echo $objetos->consultarpiezas($consulta);
  }
  function actualizar(){
    $cantidad=$_POST['caja'];
    $id=$_POST['btnactualizar'];
    $comparacion=$_POST['cantidad'];
    $objetos = new modeloactualizar();
    echo $objetos->actualizarnumero($id,$cantidad,$comparacion);
  }
}


$request = isset($_POST['request']) ? $_POST['request'] : false;

if ($request=='consulta'){
  $obj = new empleadoController();
  echo $obj->consultar();
}else if ($request=='btnactualizar'){
  $obj = new empleadoController();
  echo $obj->actualizar();
}
