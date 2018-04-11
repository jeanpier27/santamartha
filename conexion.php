<?php
// $conexion = new mysqli("localhost","autoserv_admin","autoserv2017","autoserv_autoserv"); 
$conexion = new mysqli("localhost","root","1234567890","autoserv"); 
       if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	// else{
	// 	echo "ok";
	// }
?>