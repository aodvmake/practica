<?php 
session_start();
include("bd.php");
//Consultar pieza
class modeloconsultar{
       function consultar($re){
       $cclonn = new call();
       $rrcnx = $cclonn->callbd();
       $mostrar='';
       if ($re!="") {
       $conp=mysqli_query($rrcnx,"SELECT* FROM piezas WHERE nombre LIKE '%".$re."%' AND estatus='1'");
        
        if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
                     $mostrar.='
                <tr>
                 <td>'.$row['nombre'].'</td>
                 <td>'.$row['precio'].'</td>
                 <td><button class="btn btn-primary btneditar" data-bs-toggle="modal" data-bs-target="#editPieza" data-id="'.$row['IDpieza'].'" >Editar</button></td>
                 <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePieza"
                   onclick="square('.$row['IDpieza'].')" value="'.$row['IDpieza'].'">Dar de baja</button></td>
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
       $conp=mysqli_query($rrcnx,"SELECT* FROM piezas WHERE estatus='1' ");
      if(mysqli_num_rows($conp)!=0){ 
        while ($row=mysqli_fetch_array($conp)) {
        $mostrar.=''; 
        $mostrar.='
                <tr>
                 <td>'.$row['nombre'].'</td>
                 <td>'.$row['precio'].'</td>
                 <td><button class="btn btn-primary btneditar" data-bs-toggle="modal" data-bs-target="#editPieza" data-id="'.$row['IDpieza'].'" >Editar</button></td>
                 <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePieza"
                   onclick="square('.$row['IDpieza'].')" value="'.$row['IDpieza'].'">Dar de baja</button></td>
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
 //Guardar pieza
class modeloguardar{
       function guardar($nombre,$precio){
       $lon = new call();
       $cnx = $lon->callbd();
       $fecha_actual = date("Y-m-d");
       mysqli_query($cnx,"INSERT INTO `piezas`(`fecha`, `nombre`, `precio`, `estatus`) VALUES ('$fecha_actual','$nombre','$precio',b'1')");
   echo "Los datos se han guardado con éxito"; 
  }
}
// Dar bajas
class modelobaja{
  function baja($baja){
    $lon = new call();
    $cnx = $lon->callbd();
    mysqli_query($cnx,"UPDATE `piezas` SET estatus= b'0' WHERE IDpieza ='$baja' ");
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
       $conp=mysqli_query($cnx,"SELECT* FROM `piezas` WHERE nombre LIKE '%".$consultbaja."%' AND estatus='0'");
        
        if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
                     $mostrarbajas.='
            <tr>
            <td>'.$row['nombre'].'</td>
            <td><button class="btn btn-success alta" data-id="'.$row['IDpieza'].'" type="submit" name="alta" id="alta">Activar</button></td>
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
       $conp=mysqli_query($cnx,"SELECT* FROM `piezas` WHERE estatus='0' ");
      if(mysqli_num_rows($conp)!=0){ 
        while ($row=mysqli_fetch_array($conp)) {
        $mostrarbajas.=''; 
         $mostrarbajas.='
          <tr>
            <td>'.$row['nombre'].'</td>
            <td><button class="btn btn-success alta" data-id="'.$row['IDpieza'].'" type="submit" name="alta" id="alta" >Activar</button></td>
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
// alta de pieza
class modeloaltapieza{
  function altapieza($altapieza){
      $lon = new call();
      $cnx = $lon->callbd();
      mysqli_query($cnx,"UPDATE piezas SET estatus= b'1' WHERE IDpieza ='$altapieza' "); 
      echo'Los datos se han guardado con éxito';
  }
}
//editar datos  de pieza
class modeloeditar{
  function editar($editar,$nombre,$precio){
    $lon = new call();
    $cnx = $lon->callbd(); 
    mysqli_query($cnx,"UPDATE `piezas` SET `nombre`='$nombre',`precio`='$precio' WHERE IDpieza='$editar' ");
    echo "Los datos se han guardado con éxito"; 
  }
}
//consultar antes de editar 
class modeloconsultareditar{
  function consuleditar($consuleditar){
    $lon = new call();
    $cnx = $lon->callbd(); 
    $queryconsult=mysqli_query($cnx,"SELECT* FROM `piezas` WHERE IDpieza='$consuleditar' ");

    $dataArray = null;
    if (mysqli_num_rows($queryconsult)>0) {
      while($row=mysqli_fetch_array($queryconsult)){
        $dataArray = array(
          "id"=>$row['IDpieza'],
          "nombre"=>$row['nombre'],
          "precio"=>$row['precio']
        );
      }
    }
    echo json_encode($dataArray);
  }
}

?>