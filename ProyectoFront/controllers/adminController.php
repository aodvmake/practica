<?php
include("../models/adminModelo.php");

class adminController{
  function consultar(){
    $objetos=new modeloconsultar();
    echo $objetos->consultar();
  }
}

$request = isset($_POST['request']) ? $_POST['request'] : false;

if ($request=='consulta'){
  $obj = new adminController();
  echo $obj->consultar();
}