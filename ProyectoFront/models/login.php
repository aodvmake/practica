<?php 
session_start();
include("bd.php");
class modeloguardar{
       function guardar($email,$pass){
       $cclonn = new call();
       $rrcnx = $cclonn->callbd();
     //Selecciona las tablas necesarias 
      $conp=mysqli_query($rrcnx,"SELECT us.IDusuario,us.email,us.IDpuesto,dg.nombre as trabajador ,p.IDpuesto,p.nombre FROM datosgenerales AS dg INNER JOIN usuario AS us ON dg.IDusuario=us.IDusuario INNER JOIN puesto AS p ON us.IDpuesto=p.IDpuesto 
        WHERE us.email='$email' AND us.pass='$pass' ");
        $rows="";

      if ($row=mysqli_fetch_array($conp)){
          $rows=$row['nombre'];
          $_SESSION["email"]=$row['email'];
          $_SESSION['tipo']=$row['nombre'];
          $_SESSION['usuario']=$row['IDusuario'];
          $_SESSION['trabajador']=$row['trabajador'];
          }

         switch ($rows) {
            case 'Almacenista': echo "Almacenista";
         		break;
            case 'Empleado': echo "Empleado";
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