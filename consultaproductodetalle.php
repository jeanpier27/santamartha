<?php  
require_once('conexion.php');
$id=$_POST['producto'];
$product=$conexion->query("select pvv,cantidad from tb_producto where id_producto=".$id);
while($row=mysqli_fetch_array($product)){
	$data["datos"][]=$row;
}
echo json_encode($data);

?>