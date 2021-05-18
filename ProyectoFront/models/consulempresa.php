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
       $conp=mysqli_query($rrcnx,"SELECT* FROM datosempresa WHERE nombre_e LIKE '%".$re."%' AND estatus='1'");
        
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
       }else if ($re==""){
       $conp=mysqli_query($rrcnx,"SELECT* FROM datosempresa WHERE estatus='1' ");
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
   echo "Los datos se han guardado con éxito"; 
  }
}
// Dar bajas
class modelobaja{
  function baja($baja){
    $lon = new call();
    $cnx = $lon->callbd();
    mysqli_query($cnx,"UPDATE datosempresa SET estatus= b'0' WHERE datosempresa.IDempresa ='$baja' ");
    echo "Los datos se han guardado con éxito"; 
  }
}

// Buscar bajas
class modeloconsultabaja{
  function consultbaja($consultbaja){
    $lon = new call();
    $cnx = $lon->callbd(); 
     $mostrarbajas='
      <table class="table table-striped">
        <thead>
          <tr>
           <th>Nombre de la empresa </th>
           <th></th>
          </tr>
        </thead>
       <tbody>';
      if ($consultbaja!="") {
       $conp=mysqli_query($cnx,"SELECT* FROM datosempresa WHERE nombre_e LIKE '%".$consultbaja."%' AND estatus='0'");
        
        if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
                     $mostrarbajas.='
            <tr>
            <td>'.$row['nombre_e'].'</td>
            <td><button class="btn btn-success"  id="altaempresa" onclick="squarebaja('.$row['IDempresa'].')" value="'.$row['IDempresa'].'" >Activar</button></td>
          </tr>';
            }
          }
          else{
            $mostrarbajas.="
            <tr>
            <td style='height:200px;'>No se encontro ninguna empresa</td>
            </tr>
            ";
          }
       }else if ($consultbaja==""){
       $conp=mysqli_query($cnx,"SELECT* FROM datosempresa WHERE estatus='0' ");
      if(mysqli_num_rows($conp)!=0){ 
        while ($row=mysqli_fetch_array($conp)) {
        $mostrarbajas.=''; 
         $mostrarbajas.='
          <tr>
            <td>'.$row['nombre_e'].'</td>
            <td><button class="btn btn-success"  id="altaempresa" onclick="squarebaja('.$row['IDempresa'].')" value="'.$row['IDempresa'].'" >Activar</button></td>
          </tr>'; 
        }
       }
       else{
            $mostrarbajas.="
            <tr>
             <td>No se encontro ninguna empresa</td>
            </tr>
            ";
        }
       }
      $mostrarbajas.='
         </tbody>
        </table>';
      echo $mostrarbajas;
  }
}
// alta de empresa
class modeloaltaempresa{
  function altaempresa($altaempresa){
      $lon = new call();
      $cnx = $lon->callbd();
      mysqli_query($cnx,"UPDATE datosempresa SET estatus= b'1' WHERE datosempresa.IDempresa ='$altaempresa' ");
      echo "Los datos se han guardado con éxito"; 
  }
}
// editar empresa
class modeloeditar{
  function editar($editar,$nombre,$telefono,$email,$ubicacion){
    $lon = new call();
    $cnx = $lon->callbd(); 
    mysqli_query($cnx,"UPDATE `datosempresa` SET `nombre_e`='$nombre',`telefono_e`='$telefono',`correo`='$correo',`ubicacion`='$ubicacion' WHERE IDempresa='$editar' ");
    echo "Los datos se han guardado con éxito"; 
  }
}
