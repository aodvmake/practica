<?php 
session_start();
include("bd.php");
//Guardar en el inventario
class modeloguardar{
       function guardar($nombre,$serial,$marca,$cantidad,$descripcion){
       $lon = new call();
       $cnx = $lon->callbd();
       $iduser=$_SESSION['usuario'];
       mysqli_query($cnx,"INSERT INTO `detalleherramienta`(`IDusuario`, `modelo`, `serial`, `marca`, `cantidad`, `cantidad_retirada`, `descripcion`, `estatus`) VALUES ('$iduser','$nombre','$serial','$marca','$cantidad','$cantidad','$descripcion','1')");
       echo "Los datos se han guardado con éxito";
  }
}
//consultar las herramientas
class modeloconsultar{
	function consultar($re){
     $lon = new call();
     $cnx = $lon->callbd();
     $mostrar="";
     if ($re!="") {  
        $conp=mysqli_query($cnx,"SELECT* FROM detalleherramienta WHERE marca LIKE '%".$re."%' OR modelo LIKE '%".$re."%' AND estatus='1' ORDER BY cantidad_retirada ASC");  
        if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
         
            $mostrar.='
             <tr>
             <td>'.$row['marca'].'</td>
             <td>'.$row['modelo'].'</td>
             <td>'.$row['cantidad'].'</td>
             <td>'.$row['cantidad_retirada'].'</td>
			 <td><button class="btn btn-primary btneditar" data-bs-toggle="modal" data-bs-target="#editHerramienta" data-id="'.$row['IDherramienta'].'">Editar</button></td>
             <td><button class="btn btn-warning btnretirar" data-bs-toggle="modal" data-bs-target="#retirarHerramienta" data-id="'.$row['IDherramienta'].'" onclick="sq('.$row['IDherramienta'].')">Retirar</button></td>
			 <td><button class="btn btn-danger btneliminar" data-bs-toggle="modal" data-bs-target="#deleteHerramienta" data-id="'.$row['IDherramienta'].'" onclick="square('.$row['IDherramienta'].')">Dar de baja</button></td>    
            </tr>';
            }
           }
        else{
         $mostrar.="
          <tr>
          <td style='height:500px;'>No se encontro ninguna herramienta</td>
          </tr>
            ";
        }
       }
     else if ($re==""){
       $conp=mysqli_query($cnx,"SELECT* FROM detalleherramienta WHERE estatus='1' ORDER BY cantidad_retirada ASC ");
      if(mysqli_num_rows($conp)!=0){ 
        while ($row=mysqli_fetch_array($conp)) { 

          $mostrar.='
            <tr>
             <td>'.$row['marca'].'</td>
             <td>'.$row['modelo'].'</td>
             <td>'.$row['cantidad'].'</td>
             <td>'.$row['cantidad_retirada'].'</td>
			 <td><button class="btn btn-primary btneditar" data-bs-toggle="modal" data-bs-target="#editHerramienta" data-id="'.$row['IDherramienta'].'">Editar</button></td>
             <td><button class="btn btn-warning btnretirar" data-bs-toggle="modal" data-bs-target="#retirarHerramienta" data-id="'.$row['IDherramienta'].'" onclick="sq('.$row['IDherramienta'].')">Retirar</button></td>
			 <td><button class="btn btn-danger btneliminar" data-bs-toggle="modal" data-bs-target="#deleteHerramienta" data-id="'.$row['IDherramienta'].'" onclick="square('.$row['IDherramienta'].')">Dar de baja</button></td>    
            </tr>';
        }
       }
       else{
            $mostrar.="
            <tr>
             <td>No se encontro ninguna herramienta</td>
            </tr>
            ";
        }
       }
      echo $mostrar;
    }
}
//Consultar antes de editar
class modeloconsultareditar{
   function consultedit($btneditar){
   	 $lon = new call();
     $cnx = $lon->callbd();
     $cons=mysqli_query($cnx,"SELECT * FROM `detalleherramienta` WHERE IDherramienta='$btneditar'");
     $dataArray = null;
     if (mysqli_num_rows($cons)>0) {
       while($row=mysqli_fetch_array($cons)){
          $dataArray = array(
          "id"=>$row['IDherramienta'],
          "nombre"=>$row['modelo'],
          "serial"=>$row['serial'],
          "marca"=>$row['marca'],
          "cantidad"=>$row['cantidad'],
          "descripcion"=>$row['descripcion']
           );
       }
      } 
     echo json_encode($dataArray);
   }
}
// editar herramienta
class modeloeditar{
	function editarherramienta($editar,$nombre,$serial,$marca,$cantidad,$descripcion){
	 $lon = new call();
     $cnx = $lon->callbd();
     mysqli_query($cnx,"UPDATE `detalleherramienta` SET `modelo`='$nombre',`serial`='$serial',`marca`='$marca',`cantidad`='$cantidad',`descripcion`='$descripcion' WHERE IDherramienta='$editar' ");
     echo "Los datos han sido guardados con éxito";	
	}
}
//Dar de baja
class modelobajatemporal{
	function baja($btneliminar){
     $lon = new call();
     $cnx = $lon->callbd();
     mysqli_query($cnx,"UPDATE `detalleherramienta` SET `estatus`=b'0' WHERE IDherramienta='$btneliminar' ");
     echo "Los datos han sido guardados con éxito";	
	}
}
//Consulta baja
class modeloconsulbaja{
	function consultabaja($consulbaja){
     $lon = new call();
     $cnx = $lon->callbd();
          $mostrar="";
     if ($consulbaja!="") {  
        $conp=mysqli_query($cnx,"SELECT* FROM detalleherramienta WHERE marca LIKE '%".$consulbaja."%' OR modelo LIKE '%".$consulbaja."%' AND estatus='0'");  
        if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
         
           $mostrar.='
             <tr>
              <td>'.$row['marca'].'</td>
              <td>'.$row['modelo'].'</td>
              <td>'.$row['cantidad'].'</td>
			  <td><button class="btn btn-success activar" data-id="'.$row['IDherramienta'].'">Activar</button></td>    
            </tr>';
            }
           }
        else{
         $mostrar.="
          <tr>
          <td style='height:500px;'>No se encontro ninguna herramienta</td>
          </tr>
            ";
        }
       }
     else if ($consulbaja==""){
       $conp=mysqli_query($cnx,"SELECT* FROM detalleherramienta WHERE estatus='0' ");
      if(mysqli_num_rows($conp)!=0){ 
        while ($row=mysqli_fetch_array($conp)) { 

          $mostrar.='
            <tr>
             <td>'.$row['marca'].'</td>
             <td>'.$row['modelo'].'</td>
             <td>'.$row['cantidad'].'</td>
			 <td><button class="btn btn-success activar" data-id="'.$row['IDherramienta'].'">Activar</button></td>    
            </tr>';
        }
       }
       else{
            $mostrar.="
            <tr>
             <td>No se encontro ninguna herramienta</td>
            </tr>
            ";
        }
       }
      echo $mostrar;
	}
}
// Activar la herramienta 
class modeloactivar{
    function activardenuevo($activar){
      $lon = new call();
      $cnx = $lon->callbd();
      mysqli_query($cnx,"UPDATE `detalleherramienta` SET `estatus`=b'1' WHERE IDherramienta='$activar'");
      echo "Los datos han sido guardados con éxito";		
    }
}
//retirar herramienta
class modeloretirar{
	function retira($retirar,$responsable,$cantidad){
	  $lon = new call();
      $cnx = $lon->callbd();
      $fecha_actual = date("Y-m-d");
      $cons=mysqli_query($cnx,"SELECT* FROM `detalleherramienta` WHERE IDherramienta='$retirar'");
      $row=mysqli_fetch_array($cons);
      if($cantidad!='' && $cantidad<=$row['cantidad'] && $cantidad<=$row['cantidad_retirada']){
         mysqli_query($cnx,"INSERT INTO `prestamosherramienta`(`IDherramienta`, `responsable`, `cantidad`, `fecha`, `estatus`) VALUES ('$retirar','$responsable','$cantidad','$fecha_actual',b'1')"); 
         $resta=$row['cantidad_retirada']-$cantidad;
         mysqli_query($cnx,"UPDATE `detalleherramienta` SET cantidad_retirada='$resta' WHERE IDherramienta='$retirar' ");

        echo "Los datos han sido guardados con éxito";	
      }
      else{
      	echo "La cantidad a retirar no puede hacer mayor";
      }
	}
}
//Consulta la lista antes de entregar 
class modeloconsultaentrega{
	function consultaentrega(){
	  $lon = new call();
      $cnx = $lon->callbd();
      $mostrar='';
      $consult=mysqli_query($cnx,"SELECT herramienta.IDherramienta,prestamosherramienta.IDherramienta,herramienta.marca, herramienta.modelo,prestamosherramienta.cantidad,prestamosherramienta.cantidad,prestamosherramienta.fecha,prestamosherramienta.responsable,prestamosherramienta.IDprestamo  
          FROM detalleherramienta as herramienta INNER JOIN prestamosherramienta
          ON herramienta.IDherramienta=prestamosherramienta.IDherramienta
          WHERE prestamosherramienta.estatus=b'1'
          ORDER BY fecha ASC ");
      if(mysqli_num_rows($consult)!=0){ 
        while ($row=mysqli_fetch_array($consult)) { 
          $mostrar.='
              <tr>
                <td>'.$row['marca'].'</td>
                <td>'.$row['modelo'].'</td>
                <td>'.$row['cantidad'].'</td>
                <td>'.$row['responsable'].'</td>
                <td>'.$row['fecha'].'</td>
                <td><button class="btn btn-primary btnregresar" data-id="'.$row['IDprestamo'].'" >Entregar</button></td>
              </tr>';
        }
       }
       else{
            $mostrar.="
            <tr>
             <td>No se encontro ninguna herramienta para entregar</td>
            </tr>
            ";
        }
        echo $mostrar;
	}
}
//Entrega de la herramienta
class modeloregresar{
     function regresarcantidad($btnregresar){
      $lon = new call();
      $cnx = $lon->callbd();
      $con=mysqli_query($cnx,"SELECT* FROM `prestamosherramienta` WHERE IDprestamo='$btnregresar'");
      $row=mysqli_fetch_array($con);
      $idh=$row['IDherramienta'];
      $cons=mysqli_query($cnx,"SELECT * FROM `detalleherramienta` WHERE IDherramienta='$idh'");
      $rows=mysqli_fetch_array($cons);
      $suma=$rows['cantidad_retirada']+$row['cantidad'];
      mysqli_query($cnx,"UPDATE `prestamosherramienta` SET `estatus`=b'0' WHERE IDprestamo='$btnregresar'");
      mysqli_query($cnx,"UPDATE `detalleherramienta` SET `cantidad_retirada`='$suma' WHERE IDherramienta='$idh'");	
      
      echo"Los datos han sido guardados con éxito";
     }
}
