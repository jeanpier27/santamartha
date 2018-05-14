<option value="0">Seleccione...</option> 
 <?php 
 require_once('conexion.php');
 $categoria=$_POST['categoria'];
$sql3=$conexion->query("SELECT `tb_categoria`.`categoria`, `tb_producto`.* FROM `tb_categoria` INNER JOIN `tb_producto` ON `tb_producto`.`id_categoria` = `tb_categoria`.`id_categoria` where tb_producto.estado='ACTIVO' and tb_producto.id_categoria=".$categoria);
while($sql2=mysqli_fetch_array($sql3)){
?>

<option value="<?php echo $sql2['id_producto']; ?>"><?php echo $sql2['producto']; ?></option>
<?php } ?>