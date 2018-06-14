<?php 
$id_agenda = $_POST['id_agenda'];
// echo $cedula;
require_once("./conexion.php");
$fecha=date('Y-m-d');
$resp=$conexion->query("select estado from tb_agenda where fecha_inicio>='".$fecha."' and id_agenda='".$id_agenda."'");
$rowcount=mysqli_num_rows($resp);
$respuesta=mysqli_fetch_array($resp);
if($rowcount>0){
	echo $respuesta[0];
	// echo 'si';     
}   else{
	echo 'no';   
}

 ?>