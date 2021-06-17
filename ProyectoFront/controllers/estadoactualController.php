<?php
include("../models/estadoactualModelo.php");

class estadoactualController{
  function consultar(){
    $consulta=$_POST['consulta'];
    $objetos=new modeloconsultar();
    echo $objetos->consultarpiezas($consulta);
  }
  function actualizar(){
    $boxtime=date("Y-m-d",strtotime($_POST['boxtime']));
    $btnpaso=$_POST['btnpaso'];
    $newDate = date("Y-m-d");
    
    if($boxtime>=$newDate){
    $objetos = new modeloactualizar();
    echo $objetos->actualizarnumero($btnpaso);

    }
    else{
      echo"No se cumplio en tiempo y forma, coloque la otra opción"; 
    }
  }
 function fallo(){
    
    $boxtime=date("Y-m-d",strtotime($_POST['boxtime']));
    $btnfallo=$_POST['btnfallo'];
    $newDate = date("Y-m-d");

    if($boxtime<$newDate){

    $objetos = new modelofallo();
    echo $objetos->falllo($btnfallo);
    }
    else{
      echo"Se encuentra todavia en tiempo y en forma eliga la otra opción"; 
    }
 }
 function consultarestado(){
  $consultapiezas=$_POST['consultapiezas'];
  $objetos=new modeloconsultarestado();
  echo $objetos->consultarestadopiezas($consultapiezas);
 }
}


$request = isset($_POST['request']) ? $_POST['request'] : false;

if ($request=='consulta'){
  $obj = new estadoactualController();
  echo $obj->consultar();
}else if ($request=='btnpaso'){
  $obj = new estadoactualController();
  echo $obj->actualizar();
}else if ($request=='btnfallo'){
  $obj = new estadoactualController();
  echo $obj->fallo();
}else if ($request=='consultapiezas'){
  $obj = new estadoactualController();
  echo $obj->consultarestado();
}
