<?php 
session_start();
include("bd.php");
//Consultar datos personales
class modeloconsultar{
       function funcionconsultar(){
       $lon = new call();
       $cnx = $lon->callbd();
       $correo=$_SESSION["email"];
      
       $cons=mysqli_query($cnx,"SELECT dg.nombre,dg.telefono,dg.direccion,usuario.pass 
       FROM usuario INNER JOIN datosgenerales AS dg
       ON usuario.IDusuario=dg.IDusuario
       WHERE correo='$correo'");
        
        while ($row=mysqli_fetch_array($cons)){

            $dataArray = array( 
              "nombre"=>utf8_encode($row['nombre']),
              "telefono"=>$row['telefono'],
              "direccion"=>utf8_encode($row['direccion']),
              "pass"=>$row['pass']);
          }
       echo json_encode($dataArray);
    }
  }
 //Guardar cambios

class modeloeditar{
    function funeditar($nombre,$telefono,$direccion,$npass){
      $lon = new call();
      $cnx = $lon->callbd();
      $correo=$_SESSION["email"];
      
      mysqli_query($cnx,"UPDATE `datosgenerales` SET nombre='$nombre',telefono='$telefono',direccion='$direccion' WHERE correo='$correo'");
      
      if ($npass!='1') {
      mysqli_query($cnx,"UPDATE `usuario` SET pass='$npass' WHERE email='$correo'");
      }
    
      echo "Los datos se han guardado";
    }  
}