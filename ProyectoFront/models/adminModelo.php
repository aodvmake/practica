<?php 
session_start();
include("bd.php");
class modeloconsultar{
	function consultar(){
       $lon = new call();
       $cnx = $lon->callbd();
       $mostrar='';
       $fecha_actual = date("Y-m-d");
       $cons=mysqli_query($cnx,"SELECT datosempresa.nombre_e,piezas.nombre, solde.IDsp,sol.IDsolicitud,datosempresa.IDempresa,solde.fecha_c,solde.fecha_a FROM solicitud as sol INNER JOIN solicitudpiezas as solde ON sol.IDsolicitud= solde.IDsolicitud INNER JOIN datosempresa ON sol.IDempresa=datosempresa.IDempresa INNER JOIN piezas ON solde.IDpieza=piezas.IDpieza WHERE sol.estatus='1' ORDER BY fecha_c");
        if(mysqli_num_rows($cons)!=0){
          while ($row=mysqli_fetch_array($cons)){
           if($fecha_actual<$row['fecha_a'] && $fecha_actual<$row['fecha_c']) {
           	   $mostrar.='<div class="card">
							<div class="card-body greenCard">
								<p class="m-0 p-0 text-white">Empresa: '.$row['nombre_e'].' </p>
								<p class="m-0 p-0 text-white">Pieza: '.$row['nombre'].'</p>
								<p class="m-0 p-0 text-white">Fecha compromiso:'.$new=date('d/m/Y', strtotime($row['fecha_c'])).'</p>
							</div>
						   </div>';
           }
           if($fecha_actual >$row['fecha_a'] && $fecha_actual< $row['fecha_c']){
           	  $mostrar.='<div class="card">
							<div class="card-body" style="background:#9AAC08;">
								<p class="m-0 p-0 text-white">Empresa: '.$row['nombre_e'].' </p>
								<p class="m-0 p-0 text-white">Pieza: '.$row['nombre'].'</p>
								<p class="m-0 p-0 text-white">Fecha compromiso:'.$new=date("d/m/Y", strtotime($row['fecha_c'])).'</p>
							</div>
						   </div>';
           }
           if($fecha_actual>$row['fecha_a'] && $fecha_actual>=$row['fecha_c']){
           	 $mostrar.='<div class="card">
							<div class="card-body" style="background:#BB1909;">
								<p class="m-0 p-0 text-white">Empresa: '.$row['nombre_e'].' </p>
								<p class="m-0 p-0 text-white">Pieza: '.$row['nombre'].'</p>
								<p class="m-0 p-0 text-white">Fecha compromiso:'.date("d/m/Y", strtotime($row['fecha_c'])).'</p>
							</div>
						   </div>';
           }
          }
        }
        else{

        }
        echo $mostrar;
	}
}

