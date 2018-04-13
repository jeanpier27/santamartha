<?php 
$cedula = 			$_POST['cedula'];
// echo $cedula;
require_once("./conexion.php");
$resp=$conexion->query("select concat(nombre, ' ', apellido) as nombres from tb_clientes where cedula_ruc='".$cedula."'");
$rowcount=mysqli_num_rows($resp);
$respu=mysqli_fetch_array($resp);
if($rowcount>0){
	echo $respu[0];     
}   else{
	echo 'no';   
}

 ?>