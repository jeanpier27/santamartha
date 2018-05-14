<?php 
$categoria=$_POST['categoria'];
require_once('conexion.php');
$producto=$_POST['producto'];

if(!isset($_POST['producto'])){
$sql=$conexion->query("SELECT `tb_categoria`.`categoria`, `tb_producto`.* FROM `tb_categoria` INNER JOIN `tb_producto` ON `tb_producto`.`id_categoria` = `tb_categoria`.`id_categoria` where tb_producto.estado='ACTIVO' and tb_producto.id_categoria=".$categoria);
}else{
  $sql=$conexion->query("SELECT `tb_categoria`.`categoria`, `tb_producto`.* FROM `tb_categoria` INNER JOIN `tb_producto` ON `tb_producto`.`id_categoria` = `tb_categoria`.`id_categoria` where tb_producto.estado='ACTIVO' and tb_producto.id_producto=".$producto);
}
while($res_sql=mysqli_fetch_array($sql)){


 ?>

 <div class="col-md-6 portfolio-item portfolio-item">
             <img class="img-fluid" src="<?php echo $res_sql['imagen']; ?>" alt="">
       
            <div class="portfolio-caption">
              <h4><?php echo $res_sql['producto']; ?></h4>
              <p class="text-muted">$<?php echo $res_sql['pvv']; ?></p>
            </div>
 </div>

 <?php 
}


  
  ?>