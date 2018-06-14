<?php 
require_once('conexion.php');
$usuario=$_POST['usuario'];
$contra=$_POST['contra'];
$acceso=$_POST['acceso'];

$resp=$conexion->query("insert into tb_usuarios (nombres,usuario,password,acceso,estado)values('".$usuario."','".$usuario."','".$contra."','".$acceso."','ACTIVO')");
if($resp){
	echo 'ok';
}else{
	echo 'error';
}
?>