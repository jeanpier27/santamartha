<?php 
require_once('conexion.php');
$ruc=$_POST['ruc'];
$rucs=$conexion->query("select 1 from tb_proveedores where cedula_ruc='".$ruc."'");
$a=mysqli_fetch_array($rucs);
if($a[0]==1){
	echo 'error';
}else{
	echo 'ok';
}

?>