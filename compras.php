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
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
  <script>
    $(document).ready(function(){
      $('.nav-item').removeClass('active');
      $('#herramientas').addClass('active');
      
    });
  </script>
	<title>Autoservicios Santa Martha</title>
</head>
<body>

	<?php require_once('menu.php'); ?>
	<div style="width: 1px; height: 80px;"></div>
	<div class="container" style="background: #fff; border-radius: 20px;">
    <div class="row">
      <div class="col-md-6">
        <center><h1>COMPRAS</h1></center><br>
        <div class="form-group">
          <label for="">Factura</label>
          <input type="text" name="factura" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Proveedor</label>
          <select name="proveedor" id="" class="form-control">
            <option value="0">Seleccione...</option>
            <?php 
              require_once('conexion.php'); 
              $prov=$conexion->query("select * from tb_proveedores");
              while($resp=mysqli_fetch_array($prov)){
            ?>
            <option value="<?php echo $resp['id_proveedores']; ?>"><?php echo $resp['nombres']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">Fecha</label>
          <input type="text" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>">
        </div>

        <div class="form-group">
          <label for="">Producto</label>
          <input type="text" name="producto" class="form-control" >
        </div>

        <div class="form-group">
          <label for="">Valor</label>
          <input type="text" name="valor" class="form-control" >
        </div>

        <div class="form-group">
          <label for="">Cantidad</label>
          <input type="text" name="valor" class="form-control" >
        </div>

        <div class="form-group">
          <button class="btn btn-success">Agregar</button>
        </div>
     
      </div>

      <div class="col-md-6">
        <center><h1>PRODUCTOS</h1></center>

      </div>
      <div class="col d-flex justify-content-end">
        <h1>Total $ <span id="total">0.00</span></h1>
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