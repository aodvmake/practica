<?php
error_reporting(0);
include("../models/consulempresa.php");

class datos{
 function save(){
  $re=$_POST['re'];
  $obj=new modeloconsultar();
  echo $obj->consultar($re);
 }
}
$variable=new datos();
echo $variable->save();

?>