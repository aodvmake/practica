<?php 
session_start();
include("bd.php");
//Consultar empresas
class modeloconsultar{
  function consultarpiezas($consulta){
       $lon = new call();
       $cnx = $lon->callbd();
       $mostrar='';
      
       if($consulta!=''){
       $conp=mysqli_query($cnx,"SELECT piezas.nombre,sole.cantidad, proceso.cantidad as reporte,proceso.IDproceso,datosempresa.nombre_e,sole.nocompra,sole.codigo,sole.fecha_c,sole.IDsp
        FROM proceso INNER JOIN solicitudpiezas AS sole
        ON proceso.IDsp=sole.IDsp INNER JOIN piezas 
        ON sole.IDpieza=piezas.IDpieza INNER JOIN solicitud
        ON sole.IDsolicitud=solicitud.IDsolicitud INNER JOIN datosempresa
        ON solicitud.IDempresa=datosempresa.IDempresa
        WHERE piezas.nombre LIKE '%".$consulta."%' AND solicitud.estatus='1' AND proceso.estatus='1'  AND sole.estatus='0'");
       
       if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
                  $mostrar.='
                    <tr>
                      <td>'.$row['nombre_e'].'</td>
                      <td>'.$row['nombre'].'</td>
                      <td>'.$row['nocompra'].'</td>
                      <td>'.$row['codigo'].'</td>
                      <td>'.$row['cantidad'].'</td>
                      <td><progress value="'.$row['reporte'].'" max="'.$row['cantidad'].'"></td>
                      <td><input type="text" readonly class="form-control-plaintext" id="cantidad'.$row['IDsp'].'" value="'.date("d-m-Y", strtotime($row['fecha_c'])).'" oncontextmenu="return false" onkeydown="return false" ></td>
                      <td><button type="button" class="btn btn-success btnpaso" data-id="'.$row['IDsp'].'" ><i class="fa fa-check" aria-hidden="true"></i></button></td>
                      <td><button type="button" class="btn btn-danger btnfallo" data-id="'.$row['IDsp'].'" ><i class="fa fa-times" aria-hidden="true"></i></button></td>
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

       }
       else{
       $conp=mysqli_query($cnx,"SELECT piezas.nombre,sole.cantidad, proceso.cantidad as reporte,proceso.IDproceso,datosempresa.nombre_e,sole.nocompra,sole.codigo,sole.fecha_c,sole.IDsp
        FROM proceso INNER JOIN solicitudpiezas AS sole
        ON proceso.IDsp=sole.IDsp INNER JOIN piezas 
        ON sole.IDpieza=piezas.IDpieza INNER JOIN solicitud
        ON sole.IDsolicitud=solicitud.IDsolicitud INNER JOIN datosempresa
        ON solicitud.IDempresa=datosempresa.IDempresa
        WHERE solicitud.estatus='1' AND proceso.estatus='1' AND sole.estatus='0'");
       
       if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
                  $mostrar.='
                    <tr>
                      <td>'.$row['nombre_e'].'</td>
                      <td>'.$row['nombre'].'</td>
                      <td>'.$row['nocompra'].'</td>
                      <td>'.$row['codigo'].'</td>
                      <td>'.$row['cantidad'].'</td>
                      <td><progress value="'.$row['reporte'].'" max="'.$row['cantidad'].'"></td>
                      <td><input type="text" readonly class="form-control-plaintext" id="cantidad'.$row['IDsp'].'" value="'.date("d-m-Y", strtotime($row['fecha_c'])).'" oncontextmenu="return false" onkeydown="return false" ></td>
                      <td><button type="button" class="btn btn-success btnpaso" data-id="'.$row['IDsp'].'" ><i class="fa fa-check" aria-hidden="true"></i></button></td>
                      <td><button type="button" class="btn btn-danger btnfallo" data-id="'.$row['IDsp'].'" ><i class="fa fa-times" aria-hidden="true"></i></button></td>
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
        }
          echo $mostrar;
    }
  }
//actualizar que cumplio en tiempo y forma   
class modeloactualizar{
   function actualizarnumero($btnpaso){
      $lon = new call();
      $cnx = $lon->callbd();
      mysqli_query($cnx,"UPDATE solicitudpiezas SET estatus=b'1',entrega='Cumplio' WHERE IDsp='$btnpaso'");
      echo "Se cumplio con tiempo y forma";
   }
}
//actualizar que no cumplio en tiempo y forma
class modelofallo{
    function falllo($btnfallo){
    $lon = new call();
    $cnx = $lon->callbd();  
    mysqli_query($cnx,"UPDATE solicitudpiezas SET estatus=b'1',entrega='No Cumplio' WHERE IDsp='$btnfallo'");
    echo "Se entrego pero no se cumplio en tiempo y forma";
    }
}
class modeloconsultarestado{
   function consultarestadopiezas($consultapiezas){
      $lon = new call();
      $cnx = $lon->callbd();
      $mostrar='';
      if($consultapiezas!=''){
       $conp=mysqli_query($cnx,"SELECT piezas.nombre,sole.cantidad, proceso.cantidad as reporte,proceso.IDproceso,datosempresa.nombre_e,sole.nocompra,sole.codigo,sole.fecha_c,sole.IDsp
        FROM proceso INNER JOIN solicitudpiezas AS sole
        ON proceso.IDsp=sole.IDsp INNER JOIN piezas 
        ON sole.IDpieza=piezas.IDpieza INNER JOIN solicitud
        ON sole.IDsolicitud=solicitud.IDsolicitud INNER JOIN datosempresa
        ON solicitud.IDempresa=datosempresa.IDempresa
        WHERE piezas.nombre LIKE '%".$consultapiezas."%' AND solicitud.estatus='1' AND proceso.estatus='0'  AND sole.estatus='0'");
       
       if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
                  $mostrar.='
                    <tr>
                      <td>'.$row['nombre_e'].'</td>
                      <td>'.$row['nombre'].'</td>
                      <td>'.$row['nocompra'].'</td>
                      <td>'.$row['codigo'].'</td>
                      <td>'.$row['cantidad'].'</td>
                      <td><progress value="'.$row['reporte'].'" max="'.$row['cantidad'].'"></td>
                      <td>'.$row['reporte'].'</td>
                      <td>'.date("d-m-Y", strtotime($row['fecha_c'])).'></td>
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

       }
       else{
       $conp=mysqli_query($cnx,"SELECT piezas.nombre,sole.cantidad, proceso.cantidad as reporte,proceso.IDproceso,datosempresa.nombre_e,sole.nocompra,sole.codigo,sole.fecha_c,sole.IDsp
        FROM proceso INNER JOIN solicitudpiezas AS sole
        ON proceso.IDsp=sole.IDsp INNER JOIN piezas 
        ON sole.IDpieza=piezas.IDpieza INNER JOIN solicitud
        ON sole.IDsolicitud=solicitud.IDsolicitud INNER JOIN datosempresa
        ON solicitud.IDempresa=datosempresa.IDempresa
        WHERE solicitud.estatus='1' AND proceso.estatus='0' AND sole.estatus='0'");
       
       if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
                  $mostrar.='
                    <tr>
                      <td>'.$row['nombre_e'].'</td>
                      <td>'.$row['nombre'].'</td>
                      <td>'.$row['nocompra'].'</td>
                      <td>'.$row['codigo'].'</td>
                      <td>'.$row['cantidad'].'</td>
                      <td><progress value="'.$row['reporte'].'" max="'.$row['cantidad'].'"></td>
                      <td>'.$row['reporte'].'</td>
                      <td>'.date("d-m-Y", strtotime($row['fecha_c'])).'</td>
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
        }
          echo $mostrar;

   }
}