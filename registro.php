<?php 

$cedula= $_POST['cedula'];
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$direccion= $_POST['direccion'];
$telefono= $_POST['telefono'];
$email= $_POST['email'];

// $message = strip_tags(htmlspecialchars($_POST['message']));

require_once("./conexion.php");
// echo $message;
$resp=$conexion->query("insert into tb_clientes (cedula_ruc,nombre,apellido,direccion,telefono,correo,estado,observacion)values('".$cedula."','".$nombre."','".$apellido."','".$direccion."','".$telefono."','".$email."','ACTIVO','')");
if($resp){
	echo 'ok';     
}   else{
	echo 'error';   
}

 ?>