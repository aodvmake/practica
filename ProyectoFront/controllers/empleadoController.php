<?php
include("../models/empleadoModelo.php");

class empleadoController{
  function consultar(){
    $objetos=new modeloconsultar();
    echo $objetos->consultarpiezas();
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
