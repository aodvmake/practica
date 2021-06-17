<?php
include("../models/empleadoModelo.php");

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
    if ($cantidad>'0' && $cantidad<=$comparacion) {
    $objetos = new modeloactualizar();
    echo $objetos->actualizarnumero($id,$cantidad,$comparacion);   
    }
    else{
    echo "La cantidad no puede ser menor ni mayor a la cantidad";
   }
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
