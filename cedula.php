<?php 
$cedula = 			$_POST['cedula'];
// echo $cedula;
require_once("./conexion.php");
$resp=$conexion->query("select cedula_ruc from tb_clientes where cedula_ruc='".$cedula."'");
$rowcount=mysqli_num_rows($resp);
if($rowcount>0){
	echo 'no';     
}   else{
	echo 'ok';   
}

 ?>