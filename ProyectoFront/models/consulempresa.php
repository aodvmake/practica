<?php 
session_start();
include("bd.php");
//Consultar empresas
class modeloconsultar{
       function consultar($re){
       $cclonn = new call();
       $rrcnx = $cclonn->callbd();
       $mostrar='
       <table class="table table-striped">
          <thead>
           <tr>
            <th>Nombre de la empresa</th>
            <th></th>
            <th></th>
           </tr>
         </thead>
         <tbody>';

       if ($re!="") {
       $conp=mysqli_query($rrcnx,"SELECT* FROM datosempresa WHERE nombre_e LIKE '%".$re."%' OR nombre_e LIKE '%".$re."%' ");
        
        if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
                     $mostrar.='
            <tr>
            <td>'.$row['nombre_e'].'</td>
            <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editEmpresa"  id="editar" onclick="square('.$row['IDempresa'].')" value="'.$row['IDempresa'].'" >Editar</button></td>
            <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteEmpresa"
             onclick="square('.$row['IDempresa'].')" value="'.$row['IDempresa'].'">Dar de baja</button></td>
          </tr>';
            }
          }
          else{
            $mostrar.="
            <tr>
            <td style='height:500px;'>No se encontro ninguna empresa</td>
            </tr>
            ";
          }
       }
      if ($re==""){
       $conp=mysqli_query($rrcnx,"SELECT* FROM datosempresa");
      if(mysqli_num_rows($conp)!=0){ 
        while ($row=mysqli_fetch_array($conp)) {
        $mostrar.=''; 
         $mostrar.='
          <tr>
            <td>'.$row['nombre_e'].'</td>
            <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editEmpresa"  id="editar" onclick="square('.$row['IDempresa'].')"  value="'.$row['IDempresa'].'" >Editar</button></td>
            <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteEmpresa"
             onclick="square('.$row['IDempresa'].')" value="'.$row['IDempresa'].'">Dar de baja</button></td>
          </tr>'; 
        }
       }
       else{
            $mostrar.="
            <tr>
             <td>No se encontro ninguna empresa</td>
            </tr>
            ";
        }
       }
      $mostrar.='
         </tbody>
        </table>';
      echo $mostrar;
    }
  }
 //Guardar empresa
class modeloguardar{
       function guardar($nombre,$telefono,$email,$ubicacion){
       $lon = new call();
       $cnx = $lon->callbd();
       mysqli_query($cnx," INSERT INTO `datosempresa`(`nombre_e`, `telefono_e`, `correo`, `ubicacion`, `estatus`) VALUES ('$nombre','$telefono','$email','$ubicacion','1')");
   echo "Los datos se han guardado con exito"; 
  }
}
?>
