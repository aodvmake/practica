<?php 
session_start();
include("bd.php");
//Consultar empresas
class modeloconsultar{
       function consultar($re){
       $cclonn = new call();
       $rrcnx = $cclonn->callbd();
       $mostrar='';
       if ($re!="") {
       $conp=mysqli_query($rrcnx,"SELECT* FROM datosempresa WHERE nombre_e LIKE '%".$re."%' AND estatus='1'");
        
        if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
                     $mostrar.='
          <tr>
            <td>'.$row['nombre_e'].'</td>
            <td><button class="btn btn-primary btneditar" data-bs-toggle="modal" data-bs-target="#editEmpresa" data-id="'.$row['IDempresa'].'" >Editar</button></td>
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
            <td><button class="btn btn-primary btneditar" data-bs-toggle="modal" data-bs-target="#editEmpresa" data-id="'.$row['IDempresa'].'" >Editar</button></td>
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
     $mostrarbajas='';
      if ($consultbaja!="") {
       $conp=mysqli_query($cnx,"SELECT* FROM datosempresa WHERE nombre_e LIKE '%".$consultbaja."%' AND estatus='0'");
        
        if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
                     $mostrarbajas.='
            <tr>
            <td>'.$row['nombre_e'].'</td>
            <td><button class="btn btn-success" value="'.$row['IDempresa'].'" type="submit" name="alta" id="alta">Activar</button></td>
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
            <td><button class="btn btn-success altaempresa" value="'.$row['IDempresa'].'" type="submit" name="alta" id="alta" >Activar</button></td>
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
      echo $mostrarbajas;
  }
}
// alta de empresa
class modeloaltaempresa{
  function altaempresa($altaempresa){
      $lon = new call();
      $cnx = $lon->callbd();
      mysqli_query($cnx,"UPDATE datosempresa SET estatus= b'1' WHERE datosempresa.IDempresa ='$altaempresa' "); 
      echo'<script type="text/javascript">
      alert("Los datos se han guardado con éxito");
      window.location.href="../views/admin/homeAdminEmpresa.php ";
      </script>';
  }
}
//editar datos empresa
class modeloeditar{
  function editar($editar,$nombre,$telefono,$email,$ubicacion){
    $lon = new call();
    $cnx = $lon->callbd(); 
    mysqli_query($cnx,"UPDATE `datosempresa` SET `nombre_e`='$nombre',`telefono_e`='$telefono',`correo`='$correo',`ubicacion`='$ubicacion' WHERE IDempresa='$editar' ");
  }
}
//consultar antes de editar 
class modeloconsultareditar{
  function consuleditar($consuleditar){
    $lon = new call();
    $cnx = $lon->callbd(); 
    $queryconsult=mysqli_query($cnx,"SELECT `IDempresa`, `nombre_e`, `telefono_e`, `correo`, `ubicacion` FROM `datosempresa` WHERE IDempresa='$consuleditar' ");

    $dataArray = null;
    if (mysqli_num_rows($queryconsult)>0) {
      while($row=mysqli_fetch_array($queryconsult)){
        $dataArray = array(
          "id"=>$row['IDempresa'],
          "nombre"=>$row['nombre_e'],
          "telefono"=>$row['telefono_e'],
          "correo"=>$row['correo'],
          "ubicacion"=>$row['ubicacion']
        );
      }
    }
    echo json_encode($dataArray);
  }
}

?>