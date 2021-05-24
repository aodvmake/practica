<?php
session_start();
include("bd.php");
//Consultar empresa
class modelconsultar{
       function consultar($valor){
       $lon = new call();
       $cnx = $lon->callbd();
       $mostrar='';
       $conp=mysqli_query($cnx,"SELECT* FROM datosempresa WHERE estatus='1' ORDER BY nombre_e ASC ");
       $mostrar.='<option selected disabled >Seleccionar empresa</option>';
        while ($row=mysqli_fetch_array($conp)) { 
         $mostrar.='<option value="'.$row['IDempresa'].'">'.$row['nombre_e'].'</option>';
        }
       echo $mostrar;
    }
  }
 class modeloconsultarpieza{
  function consulpie($valor1){
       $lon = new call();
       $cnx = $lon->callbd();
       $mostrar='';
       $conp=mysqli_query($cnx,"SELECT* FROM piezas WHERE estatus='1' ORDER BY nombre ASC ");
       $mostrar.='<option selected disabled >Seleccionar empresa</option>';
        while ($row=mysqli_fetch_array($conp)) { 
         $mostrar.='<option value="'.$row['IDpieza'].'">'.$row['nombre'].'</option>';
        }
       echo $mostrar;
  }
 } 
?>