<?php 
session_start();
include("bd.php");
class modeloguardar{
       function guardar($re){
       $cclonn = new call();
       $rrcnx = $cclonn->callbd();
       $conp='';
       $row='';
       $rows='';
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
       $conp=mysqli_query($rrcnx,"SELECT* FROM datosempresa WHERE nombre_e LIKE '%".$re."%'");
        while ($row=mysqli_fetch_array($conp)){
                     $mostrar.='
            <tr>
            <td>'.$row['nombre'].'</td>
            <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editEmpresa" onclick="square('.$row['IDempresa'].')" id="editar" value="'.$row['IDempresa'].'" >Editar</button></td>
            <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteEmpresa">Dar de baja</button></td>
          </tr>';
            }
       }
       else{
       $conp=mysqli_query($rrcnx,"SELECT* FROM datosempresa");
       while ($row=mysqli_fetch_array($conp)) {
       $mostrar.=''; 
         $mostrar.='
          <tr>
            <td>'.$row['nombre_e'].'</td>
            <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editEmpresa" onclick="square('.$row['IDempresa'].')" id="editar" value="'.$row['IDempresa'].'" >Editar</button></td>
            <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteEmpresa">Dar de baja</button></td>
          </tr>'; 
        }
       }
      $mostrar.='
         </tbody>
        </table>';
      echo $mostrar;
    }
  }
?>