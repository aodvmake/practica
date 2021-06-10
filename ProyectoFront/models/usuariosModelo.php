<?php 
session_start();
include("bd.php");
//Consultar pieza
class modeloconsultar{
       function consultar($re){
       $lon = new call();
       $cnx = $lon->callbd();
       $mostrar='';
       if ($re!="") {
       $conp=mysqli_query($cnx,"SELECT datosgenerales.nombre,puesto.nombre as puesto,usuario.IDusuario 
          FROM datosgenerales INNER JOIN usuario 
          ON datosgenerales.IDusuario=usuario.IDusuario INNER JOIN puesto
          ON usuario.IDpuesto=puesto.IDpuesto
          WHERE datosgenerales.nombre LIKE '%".$re."%' AND usuario.estatus='1' AND puesto.nombre<>'King' ");
        
        if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
                     $mostrar.='
                <tr>
                 <td>'.utf8_encode($row['nombre']).'</td>
                 <td>'.$row['puesto'].'</td>
                 <td><button class="btn btn-primary btneditar" data-bs-toggle="modal" data-bs-target="#editPieza" data-id="'.$row['IDusuario'].'" >Editar</button></td>
                 <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePieza"
                   onclick="square('.$row['IDusuario'].')" value="'.$row['IDusuario'].'">Dar de baja</button></td>
                </tr>';
            }
          }
          else{
            $mostrar.="
            <tr>
            <td style='height:500px;'>No se encontro ninguna usuario</td>
            </tr>
            ";
          }
       }else if ($re==""){
       $conp=mysqli_query($cnx,"SELECT datosgenerales.nombre,puesto.nombre as puesto,usuario.IDusuario 
          FROM datosgenerales INNER JOIN usuario 
          ON datosgenerales.IDusuario=usuario.IDusuario INNER JOIN puesto
          ON usuario.IDpuesto=puesto.IDpuesto
          WHERE usuario.estatus='1' AND puesto.nombre<>'King' ");

      if(mysqli_num_rows($conp)!=0){ 
        while ($row=mysqli_fetch_array($conp)) {
        $mostrar.=''; 
        $mostrar.='
                <tr>
                 <td>'. utf8_encode($row['nombre']).'</td>
                 <td>'.$row['puesto'].'</td>
                 <td><button class="btn btn-primary btneditar" data-bs-toggle="modal" data-bs-target="#editPieza" data-id="'.$row['IDusuario'].'" >Editar</button></td>
                 <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePieza"
                   onclick="square('.$row['IDusuario'].')" value="'.$row['IDusuario'].'">Dar de baja</button></td>
                </tr>';
        }
       }
       else{
            $mostrar.="
            <tr>
             <td>No se encontro ninguna usuario</td>
            </tr>
            ";
        }
       }
      echo $mostrar;
    }
  }
 //Guardar usuario
class modeloguardar{
       function guardar($nombre,$idpuesto,$telefono,$email,$pass,$ubicacion){
       $lon = new call();
       $cnx = $lon->callbd();

       mysqli_query($cnx,"INSERT INTO `datosgenerales`(`nombre`, `telefono`, `correo`, `direccion`) VALUES ('$nombre','$telefono','$email','$ubicacion')");
       mysqli_query($cnx,"INSERT INTO `usuario`(`email`,`pass`,`estatus`,`IDpuesto`) VALUES ('$email','$pass',b'1','$idpuesto')");
       echo "Los datos se han guardado con éxito"; 
  }
}
// Dar bajas
class modelobaja{
  function baja($baja){
    $lon = new call();
    $cnx = $lon->callbd();
    mysqli_query($cnx,"UPDATE usuario SET estatus=b'0' WHERE IDusuario='$baja' ");
    echo "Los datos se han guardado con éxito"; 
  }
}

// Buscar bajas
class modeloconsultabaja{
  function consultbaja($consultbaja){
       $lon = new call();
       $cnx = $lon->callbd();
       $mostrar='';
       if ($consultbaja!="") {
       $conp=mysqli_query($cnx,"SELECT datosgenerales.nombre,puesto.nombre as puesto,usuario.IDusuario 
          FROM datosgenerales INNER JOIN usuario 
          ON datosgenerales.IDusuario=usuario.IDusuario INNER JOIN puesto
          ON usuario.IDpuesto=puesto.IDpuesto
          WHERE datosgenerales.nombre LIKE '%".$consultbaja."%' AND usuario.estatus='0' AND puesto.nombre<>'King' ");
        
        if(mysqli_num_rows($conp)!=0){
          while ($row=mysqli_fetch_array($conp)){
                     $mostrar.='
                <tr>
                 <td>'.utf8_encode($row['nombre']).'</td>
                 <td>'.$row['puesto'].'</td>
                 <td><button class="btn btn-success alta" data-id="'.$row['IDusuario'].'" type="submit" name="alta" id="alta">Activar</button></td>
                </tr>';
            }
          }
          else{
            $mostrar.="
            <tr>
            <td style='height:500px;'>No se encontro ninguna usuario</td>
            </tr>
            ";
          }
       }else if ($consultbaja==""){
       $conp=mysqli_query($cnx,"SELECT datosgenerales.nombre,puesto.nombre as puesto,usuario.IDusuario 
          FROM datosgenerales INNER JOIN usuario 
          ON datosgenerales.IDusuario=usuario.IDusuario INNER JOIN puesto
          ON usuario.IDpuesto=puesto.IDpuesto
          WHERE usuario.estatus='0' AND puesto.nombre<>'King' ");

      if(mysqli_num_rows($conp)!=0){ 
        while ($row=mysqli_fetch_array($conp)) {
        $mostrar.=''; 
        $mostrar.='
                <tr>
                 <td>'. utf8_encode($row['nombre']).'</td>
                 <td>'.$row['puesto'].'</td>
                 <td><button class="btn btn-success alta" data-id="'.$row['IDusuario'].'" type="submit" name="alta" id="alta">Activar</button></td>
                </tr>';
        }
       }
       else{
            $mostrar.="
            <tr>
             <td>No se encontro ninguna usuario</td>
            </tr>
            ";
        }
       }
      echo $mostrar;
  }
}
// alta de pieza
class modeloaltausuario{
  function altausuarios($alta){
      $lon = new call();
      $cnx = $lon->callbd();
      mysqli_query($cnx,"UPDATE usuario SET estatus=b'1' WHERE IDusuario='$alta'  "); 
      echo'Los datos se han guardado con éxito';
  }
}
//editar datos  de pieza
class modeloeditar{
  function editar($editar,$nombre,$telefono,$email,$direccion,$pass){
    $lon = new call();
    $cnx = $lon->callbd(); 

    mysqli_query($cnx,"UPDATE datosgenerales SET nombre='$nombre',telefono='$telefono',correo='$email',direccion='$direccion' WHERE IDusuario='$editar'");
    mysqli_query($cnx,"UPDATE usuario SET email='$email',pass='$pass' WHERE IDusuario='$editar'");
    echo "Los datos se han guardado con éxito"; 
  }
}
//consultar antes de editar 
class modeloconsultareditar{
  function consuleditars($consuleditar){
    $lon = new call();
    $cnx = $lon->callbd(); 
    $queryconsult=mysqli_query($cnx,"SELECT da.nombre,puesto.nombre as puesto,usuario.IDusuario,da.telefono,da.correo,da.direccion,usuario.pass
      FROM datosgenerales as da INNER JOIN usuario 
      ON da.IDusuario=usuario.IDusuario INNER JOIN puesto
      ON usuario.IDpuesto=puesto.IDpuesto
      WHERE usuario.IDusuario='$consuleditar'");

    $dataArray = null;
    if (mysqli_num_rows($queryconsult)>0) {
      while($row=mysqli_fetch_array($queryconsult)){
        $dataArray = array(
          "id"=>$row['IDusuario'],
          "nombre"=>utf8_encode($row['nombre']),
          "telefono"=>$row['telefono'],
          "correo"=>$row['correo'],
          "direccion"=>utf8_encode($row['direccion']),
          "pass"=>$row['pass']
        );
      }
    }
    echo json_encode($dataArray);
  }
}
class modelopuesto{
   function consulpuesto(){
    $lon = new call();
    $cnx = $lon->callbd();
    $mostrar='';
    $cons=mysqli_query($cnx,"SELECT* FROM puesto WHERE nombre<>'King'");
    $mostrar.='<option selected disabled >Seleccionar pieza</option>';
    while ($row=mysqli_fetch_array($cons)) { 
         $mostrar.='<option value="'.$row['nombre'].'" data-id="'.$row['IDpuesto'].'">'.$row['nombre'].'</option>';
        }
    echo $mostrar; 
   }
}
?>