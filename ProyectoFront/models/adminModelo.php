<?php 
session_start();
include("bd.php");
class modeloconsultar{
	function consultar(){
       $lon = new call();
       $cnx = $lon->callbd();
       $mostrar='';
       $fecha_actual = date("Y-m-d");
       $cons=mysqli_query($cnx,"SELECT * FROM `solicitudpiezas` ORDER BY fecha_c");
        if(mysqli_num_rows($cons)!=0){
          while ($row=mysqli_fetch_array($cons)){
           if($fecha_actual<$row['fecha_a'] && $fecha_actual<$row['fecha_c']) {
           	   $mostrar.='<div class="p-1" style="background:#57D256"><p class="lead font-weight-bold">'.$row['fecha_a'].' '.$row['fecha_c'].'</p></div>';
           }
           if($fecha_actual >$row['fecha_a'] && $fecha_actual< $row['fecha_c']){
           	   $mostrar.='<div class="p-1" style="background:#C6DF25"><p class="lead font-weight-bold">'.$row['fecha_a'].' '.$row['fecha_c'].'</p></div>';
           }
           if($fecha_actual>$row['fecha_a'] && $fecha_actual>=$row['fecha_c']){
           	   $mostrar.='<div class="p-1" style="background:#DF3625"><p class="lead font-weight-bold">'.$row['fecha_a'].' '.$row['fecha_c'].'</p></div>';
           }
          }
        }
        else{

        }
        echo $mostrar;
	}
}
