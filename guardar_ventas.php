<?php  
require_once('conexion.php');
$number=count($_POST['id']);
$id=$_POST['id'];
$factura=$_POST['factura_g'];
$cliente=$_POST['cliente_g'];
$fecha=$_POST['fecha_g'];
$total=$_POST['total_g'];
$valor=$_POST['valor'];
$descuento=$_POST['descuento'];
$cantidad=$_POST['cantidad'];
$comp=$conexion->query("select 1 from tb_factura where  numero_fact='".$factura."' ");
$resp=mysqli_fetch_array($comp);
if($resp[0]!=1){

if($number>=1){
$error=0;
$conexion->autocommit(false);
$compras=$conexion->query("insert into tb_factura (numero_fact,fecha,id_clientes,total,descuento,iva,estado,observacion)values('".$factura."','".$fecha."','".$cliente."','".$total."','".$descuento."','12','ACTIVO','')");
if($compras){
	$ids=$conexion->query("select id_factura from tb_factura where numero_fact='".$factura."'");
	$id_f=mysqli_fetch_array($ids);
	for($i=0;$i<$number;$i++){
		$detalle_c=$conexion->query("insert into tb_detalle_ventas(id_factura,id_producto,cantidad,observacion)values('".$id_f[0]."','".$id[$i]."','".$cantidad[$i]."','ACTIVO')");
		if($detalle_c){
			$update=$conexion->query("update tb_producto set cantidad=cantidad-".$cantidad[$i]." where id_producto=".$id[$i]);
			if($update){
				// echo 'ok';
			}else{
				$error=1;
				echo 'error';
			}
		}else{
			echo 'error2';
			$error=1;
		}
		
	}
}else{
	echo 'error1';
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