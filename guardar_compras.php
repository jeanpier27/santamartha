<?php  
require_once('conexion.php');
$number=count($_POST['id']);
$id=$_POST['id'];
$factura=$_POST['factura_g'];
$proveedor=$_POST['proveedor_g'];
$fecha=$_POST['fecha_g'];
$total=$_POST['total_g'];
$valor=$_POST['valor'];
$cantidad=$_POST['cantidad'];
$comp=$conexion->query("select 1 from tb_compras where id_proveedores='".$proveedor."' and numero_fact='".$factura."' ");
$resp=mysqli_fetch_array($comp);
if($resp[0]!=1){

if($number>=1){
$error=0;
$conexion->autocommit(false);
$compras=$conexion->query("insert into tb_compras (id_proveedores,numero_fact,fecha_compra,total,observacion,iva)values('".$proveedor."','".$factura."','".$fecha."','".$total."','','12')");
if($compras){
	$ids=$conexion->query("select id_compras from tb_compras where id_proveedores='".$proveedor."' and numero_fact='".$factura."' and fecha_compra='".$fecha."'");
	$id_c=mysqli_fetch_array($ids);
	for($i=0;$i<$number;$i++){
		$detalle_c=$conexion->query("insert into tb_detalle_compras(id_compras,id_producto,cantidad,valor_c)values('".$id_c[0]."','".$id[$i]."','".$cantidad[$i]."','".$valor[$i]."')");
		if($detalle_c){
			$update=$conexion->query("update tb_producto set cantidad=cantidad+".$cantidad[$i]." where id_producto=".$id[$i]);
			if($update){
				// echo 'ok';
			}else{
				$error=1;
				// echo 'error';
			}
		}else{
			// echo 'error2';
			$error=1;
		}
		
	}
}else{
	// echo 'error1';
	$error=1;
}

if($error){
	$conexion->rollback();
	echo 'error';
}else{
	$conexion->commit();
	echo 'ok';
}
}
}else{
	echo 'rep';
}

?>