   <?php 
session_start();
include("bd.php");
//Consultar empresas
class modeloconsultarempresas{
 function consultar(){
 	   $lon = new call();
       $cnx = $lon->callbd();
       $mostrar='';
       $conp=mysqli_query($cnx,"SELECT* FROM datosempresa ORDER BY nombre_e ASC ");
       $mostrar.='<option selected disabled >Seleccionar empresa</option>';
        while ($row=mysqli_fetch_array($conp)) { 
         $mostrar.='<option data-id="'.$row['IDempresa'].'">'.$row['nombre_e'].'</option>';
        }
       echo $mostrar;
 }	
}
class modeloconsultarestado{
  function consultarestado($fecha_p,$fecha_f,$empresa){
 	   $lon = new call();
       $cnx = $lon->callbd();
       $mostrar='';
       $suma='0';
       $cons=mysqli_query($cnx,"SELECT piezas.nombre,sole.cantidad,proceso.IDproceso,sole.nocompra,sole.codigo,sole.fecha_c,sole.IDsp,sole.total
           FROM proceso INNER JOIN solicitudpiezas AS sole
           ON proceso.IDsp=sole.IDsp INNER JOIN piezas 
           ON sole.IDpieza=piezas.IDpieza INNER JOIN solicitud
           ON sole.IDsolicitud=solicitud.IDsolicitud INNER JOIN datosempresa
           ON solicitud.IDempresa=datosempresa.IDempresa
           WHERE solicitud.estatus='1' AND proceso.estatus='1' AND sole.estatus='1' AND sole.fecha_c>'$fecha_p' AND sole.fecha_c<'$fecha_f' AND solicitud.IDempresa='$empresa'");

       if(mysqli_num_rows($cons)!=0){
         while ($row=mysqli_fetch_array($cons)){
                  $mostrar.='
                    <tr>
                      <td>'.$row['nombre'].'</td>
                      <td>'.$row['cantidad'].'</td>
                      <td>'.$row['nocompra'].'</td>
                      <td>'.$row['codigo'].'</td>
                      <td>'.$row['total'].'</td>
                    </tr>';
                  $suma=$row['total']+$suma;  
            }
          $mostrar.='<tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
           <td><p class="f-right mt-5">Total es de :$'.$suma.'</p></td>
          </th>';
          }
          else{
            $mostrar.="
            <tr>
            <td>No se encontro ninguna pieza</td>
            </tr>
            "; 
       }
       echo $mostrar;
  }
}