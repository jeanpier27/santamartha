<?php 
require_once('conexion.php');
$ruc=$_POST['ruc'];
$rucs=$conexion->query("select 1 from tb_empleado where cedula='".$ruc."'");
$a=mysqli_fetch_array($rucs);
if($a[0]==1){
	echo 'error';
}else{
	echo 'ok';
}

?>