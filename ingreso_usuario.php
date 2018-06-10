<?php 
require_once('conexion.php');
$usuario=$_POST['usuario'];
$contra=$_POST['contra'];
$acceso=$_POST['acceso'];

$resp=$conexion->query("insert into tb_usuarios (usuario,password,acceso,estado)values('".$usuario."','".$contra."','".$acceso."','ACTIVO')");
if($resp){
	echo 'ok';
}else{
	echo 'error';
}
?>