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
//Consulta las piezas
 class modeloconsultarpieza{
  function consulpie($valor1){
       $lon = new call();
       $cnx = $lon->callbd();
       $mostrar='';
       $conp=mysqli_query($cnx,"SELECT* FROM piezas WHERE estatus='1' ORDER BY nombre ASC ");
       $mostrar.='<option selected disabled >Seleccionar pieza</option>';
        while ($row=mysqli_fetch_array($conp)) { 
         $mostrar.='<option value="'.$row['precio'].'" data-id="'.$row['IDpieza'].'">'.$row['nombre'].'</option>';
        }
       echo $mostrar;
  }
 } 
//Crea la solicitud por primera vez 
class modelocreacion{
  function crearsol($empresa,$precio,$pieza,$cantidad,$codigo,$ncompra,$fecha_c,$fecha_a,$total){
   $lon = new call();
   $cnx = $lon->callbd();
   $iduser=$_SESSION['usuario'];
   $fecha_actual = date("Y-m-d");
   
   mysqli_query($cnx,"INSERT INTO `solicitud`( `IDempresa`, `IDusuario`, `fecha_c`, `estatus`) VALUES ('$empresa','$iduser','$fecha_actual',b'0')");
   $last=mysqli_insert_id($cnx);
    mysqli_query($cnx,"INSERT INTO `solicitudpiezas`(`IDsolicitud`, `IDpieza`, `cantidad`, `precio`, `total`, `codigo`, `nocompra`, `fecha_c`, `fecha_a`, `estatus`) VALUES ('$last','$pieza','$cantidad','$precio','$total','$codigo','$ncompra','$fecha_c','$fecha_a',b'0')");
   $proceso=mysqli_insert_id($cnx);
   mysqli_query($cnx,"INSERT INTO `proceso`(`IDsp`, `cantidad`, `estatus`) VALUES ('$proceso','0',b'0')");  
   $cons=mysqli_query($cnx,"SELECT sp.IDsp,sp.IDsolicitud,piezas.IDpieza,piezas.nombre,sp.IDpieza,sp.precio,sp.cantidad,sp.codigo,sp.total,sp.nocompra FROM solicitudpiezas as sp INNER JOIN 
     piezas ON piezas.IDpieza = SP.IDpieza WHERE sp.IDsolicitud='$last' ORDER  BY IDsp DESC ");
     $mostrar='';
     while ($row=mysqli_fetch_array($cons)) {
      $mostrar.='
        <tr>
          <td>'.$row['nombre'].'</td>
          <td>'.$row['precio'].'</td>
          <td>'.$row['cantidad'].'</td>
          <td>'.$row['codigo'].'</td>
          <td>'.$row['total'].'</td>
          <td>'.$row['nocompra'].'</td>
          <td><button class="btn btn-danger btnborrar" data-id="'.$row['IDsp'].'">Quitar</button></td>
        </tr>
      ';
     }
     $dataArray = array( 
      "tabla"=>$mostrar,
      "idsol"=>$last);
     echo json_encode($dataArray); 
 }
}
class modeloseguircreacion{
  function seguimiento($solicitud,$empresa,$precio,$pieza,$cantidad,$codigo,$ncompra,$fecha_c,$fecha_a,$total){
   $lon = new call();
   $cnx = $lon->callbd();
   $iduser=$_SESSION['usuario'];
   $fecha_actual = date("Y-m-d");
   
   mysqli_query($cnx,"INSERT INTO `solicitudpiezas`(`IDsolicitud`, `IDpieza`, `cantidad`, `precio`, `total`, `codigo`, `nocompra`, `fecha_c`, `fecha_a`, `estatus`) VALUES ('$solicitud','$pieza','$cantidad','$precio','$total','$codigo','$ncompra','$fecha_c','$fecha_a',b'0')");
   $proceso=mysqli_insert_id($cnx);
   mysqli_query($cnx,"INSERT INTO `proceso`(`IDsp`, `cantidad`, `estatus`) VALUES ('$proceso','0',b'0')"); 
    $cons=mysqli_query($cnx,"SELECT sp.IDsp,sp.IDsolicitud,piezas.IDpieza,piezas.nombre,sp.IDpieza,sp.precio,sp.cantidad,sp.codigo,sp.total,sp.nocompra FROM solicitudpiezas as sp INNER JOIN 
     piezas ON piezas.IDpieza = SP.IDpieza WHERE sp.IDsolicitud='$solicitud' ORDER  BY IDsp DESC ");
     $mostrar='';
     while ($row=mysqli_fetch_array($cons)) {
      $mostrar.='
        <tr>
          <td>'.$row['nombre'].'</td>
          <td>'.$row['precio'].'</td>
          <td>'.$row['cantidad'].'</td>
          <td>'.$row['codigo'].'</td>
          <td>'.$row['total'].'</td>
          <td>'.$row['nocompra'].'</td>
          <td><button class="btn btn-danger btnborrar" data-id="'.$row['IDsp'].'">Quitar</button></td>
        </tr>
      ';
     }
     $dataArray = array( 
      "tabla"=>$mostrar,
      "idsol"=>$solicitud);
     echo json_encode($dataArray); 
  }
}
//borra los datos de los detalles
class modeloborrar{
  function funborrar($btnborrar,$solicitud){
   $lon = new call();
   $cnx = $lon->callbd();
   mysqli_query($cnx,"DELETE FROM `solicitudpiezas` WHERE IDsp='$btnborrar' ");
   mysqli_query($cnx,"DELETE FROM `proceso` WHERE IDsp='$btnborrar' ");
   $cons=mysqli_query($cnx,"SELECT sp.IDsp,sp.IDsolicitud,piezas.IDpieza,piezas.nombre,sp.IDpieza,sp.precio,sp.cantidad,sp.codigo,sp.total,sp.nocompra FROM solicitudpiezas as sp INNER JOIN 
     piezas ON piezas.IDpieza = SP.IDpieza WHERE sp.IDsolicitud='$solicitud' ORDER  BY IDsp DESC ");
     $mostrar='';
     while ($row=mysqli_fetch_array($cons)) {
      $mostrar.='
        <tr>
          <td>'.$row['nombre'].'</td>
          <td>'.$row['precio'].'</td>
          <td>'.$row['cantidad'].'</td>
          <td>'.$row['codigo'].'</td>
          <td>'.$row['total'].'</td>
          <td>'.$row['nocompra'].'</td>
          <td><button class="btn btn-danger btnborrar" data-id="'.$row['IDsp'].'">Quitar</button></td>
        </tr>
      ';
     }
     $dataArray = array( 
      "tabla"=>$mostrar,
      "idsol"=>$solicitud);
     echo json_encode($dataArray);
  }
}
//finaliza el proceso de solicitud
class modelofinalizar{
  function finalizar($btnfinalizar){
   $lon = new call();
   $cnx = $lon->callbd();
   mysqli_query($cnx,"UPDATE `solicitud` SET estatus=b'1' WHERE IDsolicitud='$btnfinalizar'");
   echo "Se finalizo el proceso";
  }
}
?>