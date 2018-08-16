<?php 
require_once('conexion.php');
$fecha=$_POST['fecha'];
$id_empleado=$_POST['id_empleado'];
echo $fecha.'-'.$id_empleado;
$resp=$conexion->query("insert into tb_faltas (id_empleado,fecha)values('".$id_empleado."','".$fecha."') ");
if($resp){
	echo 'ok';
}else{
	echo 'error';
}
?>