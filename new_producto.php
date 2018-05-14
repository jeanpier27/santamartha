<?php 
$categoria= $_POST['catego'];
$producto= $_POST['producto'];
$precio= $_POST['precio'];
$subir=$_FILES['new_imagen']['tmp_name'];
$imagen_url='img_products/'.$_FILES['new_imagen']['name'];

// $message = strip_tags(htmlspecialchars($_POST['message']));
// echo $subir.$categoria.$producto.$precio.$imagen_url;

require_once("./conexion.php");
// echo $message;
$resp=$conexion->query("insert into tb_producto (id_categoria,producto,imagen,pvv,cantidad,estado) values ('".$categoria."','".$producto."','".$imagen_url."','".$precio."','0','ACTIVO')");
if($resp){
	move_uploaded_file($subir, $imagen_url);
	echo 'ok';     
}   else{
	echo 'error';   
}

 ?>