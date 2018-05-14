<?php 
date_default_timezone_set('America/Bogota');
session_start();
if(!isset($_SESSION['nombres'])){
header('location:cerrar_sesion.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php require_once('meta.php'); ?>
  <script>
    $(document).ready(function(){
      $('.nav-item').removeClass('active');
      $('#configuracion').addClass('active');
      
    });
  </script>
	<title>Autoservicios Santa Martha</title>
</head>
<body>

	<?php require_once('menu.php'); ?>
	<div style="width: 1px; height: 80px;"></div>
	<div class="container" style="background: #fff; border-radius: 20px;">
    <div class="row">      
      <div class="col-12"><center><h1>Promociones</h1></center></div>
      <?php 
        require_once('conexion.php');
        $imga=$conexion->query("select imagen from tb_promocion");
        // $res_img=mysqli_fetch_array($imga);
        while($res_img=mysqli_fetch_array($imga)){
          $a=$a.','.$res_img['imagen'];
        }
        list($b,$promo1,$promo2,$promo3) = explode(',', $a);              
       ?>
      <div class="col-md-4">
        <h1>Promocion 1</h1>
        <div class="form-control">
          <img class="" src="<?php echo $promo1; ?>" height="250px" width="300px" alt="">          
        </div>
        <div class="form-group">
          <input class="form-control" type="file" name="promocion1">
        </div>
        <div class="form-group">
          <button class="btn btn-success">Subir</button>
        </div>
      </div>
      <div class="col-md-4">
        <h1>Promocion 2</h1>
        <div class="form-control">
          <img class="" src="<?php echo $promo2; ?>" height="250px" width="300px" alt="">          
        </div>
        <div class="form-group">
          <input class="form-control" type="file" name="promocion2">
        </div>
        <div class="form-group">
          <button class="btn btn-success">Subir</button>
        </div>
      </div>
      <div class="col-md-4">
        <h1>Promocion 3</h1>
        <div class="form-control">
          <img class="" src="<?php echo $promo3; ?>" height="250px" width="300px" alt="">          
        </div>
        <div class="form-group">
          <input class="form-control" type="file" name="promocion3">
        </div>
        <div class="form-group">
          <button class="btn btn-success">Subir</button>
        </div>
      </div>
    </div>
	</div>
  <script>
    $(document).ready(function(){


    });
  </script>
</body>
</html>