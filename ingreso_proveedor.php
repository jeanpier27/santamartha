<?php 
require_once('conexion.php');
$ruc=$_POST['ruc'];
$nombres=$_POST['nombres'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$correo=$_POST['correo'];

$resp=$conexion->query("insert into tb_proveedores (cedula_ruc,nombres,telefono,direccion,correo)values('".$ruc."','".$nombres."','".$telefono."','".$direccion."','".$correo."')");
if($resp){
	echo 'ok';
}else{
	echo 'error';
}
?>