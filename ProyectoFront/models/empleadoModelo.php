<?php 
session_start();
include("bd.php");
//Consultar empresas
class modeloconsultar{
  function consultarpiezas(){
       $lon = new call();
       $cnx = $lon->callbd();
       $mostrar='';
       $conp=mysqli_query($cnx,"SELECT piezas.nombre,sole.cantidad, proceso.cantidad as reporte,proceso.IDproceso
       FROM proceso INNER JOIN solicitudpiezas AS sole
       ON proceso.IDsp=sole.IDsp INNER JOIN piezas 
       ON sole.IDpieza=piezas.IDpieza INNER JOIN solicitud
       ON sole.IDsolicitud=solicitud.IDsolicitud
       WHERE solicitud.estatus='1' AND proceso.estatus='0'");
       
       if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
                  $mostrar.='
                    <tr>
                      <td>'.$row['nombre'].'</td>
                      <td><input type="text" readonly class="form-control-plaintext" id="cantidad'.$row['IDproceso'].'" value="'.$row['cantidad'].'" oncontextmenu="return false" onkeydown="return false" ></td>
                      <td><progress value="'.$row['reporte'].'" max="'.$row['cantidad'].'"></td>
                      <td><input type="number" class="form-control" id="caja'.$row['IDproceso'].'"></td>
                      <td><button class="btn btn-primary btn-actualizar" data-id="'.$row['IDproceso'].'">Actualizar</button></td>
                    </tr>';
            }
          }
          else{
            $mostrar.="
            <tr>
            <td>No se encontro ninguna pieza en proceso</td>
            </tr>
            ";
          }
          echo $mostrar;
    }
  }
//actualizar la cantidad   
class modeloactualizar{
   function actualizarnumero($id,$cantidad,$comparacion){
      $lon = new call();
      $cnx = $lon->callbd();
      $cons=mysqli_query($cnx,"SELECT* FROM proceso WHERE IDproceso='$id'");
      $row=mysqli_fetch_array($cons);
      
      $suma=$row['cantidad']+$cantidad;
      if ($suma<$comparacion) {
        mysqli_query($cnx,"UPDATE proceso SET cantidad='$suma' WHERE IDproceso='$id'");
        echo"Los datos han sido guardados con éxito";
       } 
      else if ($suma==$comparacion){
        mysqli_query($cnx,"UPDATE proceso SET cantidad='$suma',estatus=b'1' WHERE IDproceso='$id'");
        echo"Se completo la tarea, esta se quitará de la lista";
       } 
      else if ($suma>$comparacion){
        echo "La cantidad asignada excede coloque el numero correcto";
      }
   }
}