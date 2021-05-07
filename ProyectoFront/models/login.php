<?php 
session_start();
include("bd.php");
class modeloguardar{
       function guardar($email,$pass){
       $cclonn = new call();
       $rrcnx = $cclonn->callbd();
     //Inserta en las tablas necesarias 
      $conp=mysqli_query($rrcnx,"SELECT US.IDusuario,US.email,US.pass,puesto.nombre FROM usuario AS US INNER JOIN puesto 
      ON US.IDpuesto=puesto.IDpuesto WHERE US.email='$email' AND US.pass='$pass' ");
      $rows="";

      if ($row=mysqli_fetch_array($conp)){
          $rows=$row['nombre'];
          $_SESSION["email"]=$row['email'];
          $_SESSION['tipo']=$row['nombre'];
          }

         switch ($rows) {
            case 'Cliente': echo "Cliente";
         		break;
         	  case 'Administrador': echo "Administrador";
				    break;
			      case 'King': echo "King";
            break;
            case '': echo "Vacio";
            break;
            }
      }
    }
?>