<?php 
require_once('conexion.php');
$ruc=$_POST['ruc'];
$nombres=$_POST['nombres'];
$fecha=$_POST['fecha'];
$cargo=$_POST['cargo'];
$sueldo=$_POST['sueldo'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];

$resp=$conexion->query("insert into tb_empleado (cedula,nombres,telefono,direccion,cargo,sueldo,estado,fecha_ing)values('".$ruc."','".$nombres."','".$telefono."','".$direccion."','".$cargo."','".$sueldo."','ACTIVO','".$fecha."')");
if($resp){
	echo 'ok';
}else{
	echo 'error';
}
?>