<?php 
session_start();
include("bd.php");
//Consultar todas las solicitudes resagadas
class modeloconsultar{
       function consultar(){
       $lon = new call();
       $cnx = $lon->callbd();
       $mostrar='';
       $cons=mysqli_query($cnx,"SELECT sol.IDsolicitud,sol.fecha_c,datosempresa.nombre_e 
       FROM solicitud AS sol INNER JOIN datosempresa 
       ON sol.IDempresa=datosempresa.IDempresa 
       WHERE sol.estatus='0'");
       if(mysqli_num_rows($cons)!=0){
          while ($row=mysqli_fetch_array($cons)){
          	$mostrar.='
                  <tr>
                    <td>'.$row['nombre_e'].'</td>
                    <td>'.$row['fecha_c'].'</td>
                    <td><button class="btn btn-primary btnseleccionar" data-id="'.$row['IDsolicitud'].'"  >Seleccionar</button></td>
                  </tr>
          	';
          }
       }
       else{
       	 $mostrar.="
          <tr>
          <td>No se encontro ninguna solicitud para editar</td>
          </tr>
            ";
       }
       echo $mostrar;
  }
}
//Selecciona la solicitud resaga
class modeloseleccionar{
    function seleccionarsolicitud($btnseleccionar){
       $lon = new call();
       $cnx = $lon->callbd();
       $mostrar='';
       $cons=mysqli_query($cnx,"SELECT datosempresa.nombre_e,piezas.nombre,solde.cantidad,
       solde.precio,solde.total,solde.codigo,solde.nocompra,solde.IDsp,sol.IDsolicitud,datosempresa.IDempresa
       FROM solicitud as sol INNER JOIN solicitudpiezas as solde
       ON sol.IDsolicitud= solde.IDsolicitud INNER JOIN datosempresa
       ON sol.IDempresa=datosempresa.IDempresa INNER JOIN piezas 
       ON solde.IDpieza=piezas.IDpieza 
       WHERE sol.IDsolicitud='$btnseleccionar'");
       while ($row=mysqli_fetch_array($cons)){
       	$solicitud=$row['IDsolicitud'];
       	$empresa=$row['IDempresa'];
       	$nombre=$row['nombre_e'];
          	$mostrar.='
                  <tr>
                    <td>'.$row['nombre'].'</td>
                    <td>'.$row['precio'].'</td>
                    <td>'.$row['cantidad'].'</td>
                    <td>'.$row['codigo'].'</td>
                    <td>'.$row['total'].'</td>
                    <td>'.$row['nocompra'].'</td>
                    <td><button class="btn btn-danger btneliminar" data-id="'.$row['IDsp'].'"  >Quitar</button></td>
                  </tr>
          	';
          }
     $dataArray = array( 
     "tabla"=>$mostrar,
     "idsol"=>$solicitud,
     "empresa"=>$empresa,
     "nombre"=>$nombre);
     echo json_encode($dataArray);
    }
}
// Elimina la fila pieza 
class modeloeliminar{
    function eliminar($btneliminar,$id_solicitud){
       $lon = new call();
       $cnx = $lon->callbd();
       $mostrar='';
       mysqli_query($cnx,"DELETE FROM solicitudpiezas WHERE IDsp='$btneliminar'");
       mysqli_query($cnx,"DELETE FROM `proceso` WHERE IDsp='$btneliminar'");
       $cons=mysqli_query($cnx,"SELECT datosempresa.nombre_e,piezas.nombre,solde.cantidad,
       solde.precio,solde.total,solde.codigo,solde.nocompra,solde.IDsp,sol.IDsolicitud,datosempresa.IDempresa
       FROM solicitud as sol INNER JOIN solicitudpiezas as solde
       ON sol.IDsolicitud= solde.IDsolicitud INNER JOIN datosempresa
       ON sol.IDempresa=datosempresa.IDempresa INNER JOIN piezas 
       ON solde.IDpieza=piezas.IDpieza 
       WHERE sol.IDsolicitud='$id_solicitud'");
       while ($row=mysqli_fetch_array($cons)){
       	$solicitud=$row['IDsolicitud'];
       	$empresa=$row['IDempresa'];
       	$nombre=$row['nombre_e'];
          	$mostrar.='
                  <tr>
                    <td>'.$row['nombre'].'</td>
                    <td>'.$row['precio'].'</td>
                    <td>'.$row['cantidad'].'</td>
                    <td>'.$row['codigo'].'</td>
                    <td>'.$row['total'].'</td>
                    <td>'.$row['nocompra'].'</td>
                    <td><button class="btn btn-danger btneliminar" data-id="'.$row['IDsp'].'"  >Quitar</button></td>
                  </tr>
          	';
          }
     $dataArray = array( 
     "tabla"=>$mostrar,
     "idsol"=>$solicitud,
     "empresa"=>$empresa,
     "nombre"=>$nombre);
     echo json_encode($dataArray);
    }
}
//agrega una nueva fila 
class modeloseguircreacion{
  function seguimiento($solicitud,$empresa,$precio,$pieza,$cantidad,$codigo,$ncompra,$fecha_c,$fecha_a,$total){
   $lon = new call();
   $cnx = $lon->callbd();
   $iduser=$_SESSION['usuario'];
   $fecha_actual = date("Y-m-d");
   $mostrar='';
   mysqli_query($cnx,"INSERT INTO `solicitudpiezas`(`IDsolicitud`, `IDpieza`, `cantidad`, `precio`, `total`, `codigo`, `nocompra`, `fecha_c`, `fecha_a`, `estatus`) VALUES ('$solicitud','$pieza','$cantidad','$precio','$total','$codigo','$ncompra','$fecha_c','$fecha_a',b'0')");
   $proceso=mysqli_insert_id($cnx);
   mysqli_query($cnx,"INSERT INTO `proceso`(`IDsp`, `cantidad`, `estatus`) VALUES ('$proceso','$cantidad',b'0')"); 
   $cons=mysqli_query($cnx,"SELECT datosempresa.nombre_e,piezas.nombre,solde.cantidad,
    solde.precio,solde.total,solde.codigo,solde.nocompra,solde.IDsp,sol.IDsolicitud,datosempresa.IDempresa
    FROM solicitud as sol INNER JOIN solicitudpiezas as solde
    ON sol.IDsolicitud= solde.IDsolicitud INNER JOIN datosempresa
    ON sol.IDempresa=datosempresa.IDempresa INNER JOIN piezas 
    ON solde.IDpieza=piezas.IDpieza 
    WHERE sol.IDsolicitud='$solicitud'");
    while ($row=mysqli_fetch_array($cons)){
    $solicitud=$row['IDsolicitud'];
    $empresa=$row['IDempresa'];
    $nombre=$row['nombre_e'];
    $mostrar.='
       <tr>
         <td>'.$row['nombre'].'</td>
         <td>'.$row['precio'].'</td>
         <td>'.$row['cantidad'].'</td>
         <td>'.$row['codigo'].'</td>
         <td>'.$row['total'].'</td>
         <td>'.$row['nocompra'].'</td>
         <td><button class="btn btn-danger btneliminar" data-id="'.$row['IDsp'].'"  >Quitar</button></td>
       </tr>
          	';
          }
     $dataArray = array( 
     "tabla"=>$mostrar,
     "idsol"=>$solicitud,
     "empresa"=>$empresa,
     "nombre"=>$nombre);
     echo json_encode($dataArray);
    // echo $mostrar;
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


//Finaliza 

//Elimina por completo todas las solicitudes en concreto  	
