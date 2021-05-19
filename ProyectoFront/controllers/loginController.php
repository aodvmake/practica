<?php
include("../models/login.php");

class datos{
	function save(){
		$email = $_POST["email"];
		$pass = $_POST["pass"];

		$obj=new modeloguardar();
		echo $obj->guardar($email,$pass);
	}
	function enviar($email,$pass){
		$registro= new modeloguardar();
		$registro->guardar($email,$pass);
	}
}

$request = $_REQUEST["request"];
if ($request == 'data') {
	$variable=new datos();
	echo $variable->save();
}

?>