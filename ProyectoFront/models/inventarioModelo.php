<?php 
session_start();
include("bd.php");
//Guardar en el inventario
class modeloguardar{
       function guardar($nombre,$serial,$marca,$cantidad,$descripcion){
       $lon = new call();
       $cnx = $lon->callbd();
       $iduser=$_SESSION['usuario'];
       mysqli_query($cnx,"INSERT INTO `detalleherramienta`(`IDusuario`, `modelo`, `serial`, `marca`, `cantidad`, `descripcion`, `estatus`) VALUES ('$iduser','$nombre','$serial','$marca','$cantidad','$descripcion','1')");
       echo "Los datos se han guardado con éxito";
  }
}