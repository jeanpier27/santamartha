<?php 
	
$cedula= $_POST['cedula'];
$servicio= $_POST['servicio'];
$fecha= $_POST['fecha'];
$hora= $_POST['hora'];

// $message = strip_tags(htmlspecialchars($_POST['message']));

require_once("./conexion.php");
// echo $message;

$id=$conexion->query("select id_clientes from tb_clientes where cedula_ruc='".$cedula."'");
$resp_id=mysqli_fetch_array($id);

// echo $fecha.' '.$hora.':00:00'.' '.$resp_id[0];
$fecha_fin=$fecha.' '.($hora+1).':00:00';

$resp=$conexion->query("insert into tb_agenda (servicio,id_clientes,fecha_inicio,fecha_fin,estado)values('".$servicio."','".$resp_id[0]."','".$fecha.' '.$hora.':00:00'."','".$fecha_fin."','ACTIVO')");
if($resp){
	echo 'ok';     
}   else{
	echo 'error';   
}


 ?>