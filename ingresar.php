<?php
// session_start();
$usuario=$_POST['usuario'];
$clave=$_POST['contra'];
	require_once("conexion.php"); 

	$sql=mysqli_query($conexion,"SELECT * from tb_usuarios where usuario='".$usuario."' and estado='ACTIVO'");
	 $rowcount=mysqli_num_rows($sql);
	 if($rowcount==1){
	 	while($consulta=mysqli_fetch_array($sql)){
	 		if($clave==$consulta['password']){
	 			session_start();
	 			$_SESSION['nombres'] = $consulta['nombres'];
	 			$_SESSION['cargo'] = $consulta['cargo'];
	 			$_SESSION['usuario'] = $consulta['usuario'];
	 			echo 'ok';
	 		}else{
	 			echo 'error';	
	 		}
	 	}
	 }else{
	 	echo 'error';
	 }
	

?>
