<?php 
$categoria= $_POST['categoria'];

// $message = strip_tags(htmlspecialchars($_POST['message']));

require_once("./conexion.php");
// echo $message;
$resp=$conexion->query("insert into tb_categoria (categoria) values ('".$categoria."')");
if($resp){
	echo 'ok';     
}   else{
	echo 'error';   
}

 ?>