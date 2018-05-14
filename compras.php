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
  <!-- Latest compiled and minified CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- <script src="js/select2_locale_es.js"></script> -->
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
        <form action="" id="add_products">
          
        <div class="form-group">
          <label for="">Factura</label>
          <input type="text" name="factura" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="">Proveedor</label>
          <select name="proveedor" id="" class="form-control prov" >
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
          <input type="text" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
        </div>

        <div class="form-group">
          <label for="">Producto</label>
          <select name="proveedor" id="produc"  class="form-control producto" title="Seleccione...">
            <option value="0" selected="">Seleccione...</option>
            <?php 
              require_once('conexion.php'); 
              $prov=$conexion->query("SELECT `tb_categoria`.`categoria`, `tb_producto`.* FROM `tb_categoria` INNER JOIN `tb_producto` ON `tb_producto`.`id_categoria` = `tb_categoria`.`id_categoria`");
              while($resp=mysqli_fetch_array($prov)){
            ?>
            <option value="<?php echo $resp['id_producto']; ?>"><?php echo $resp['producto']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">Valor</label>
          <input type="text" name="valor" id="valor" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="">Cantidad</label>
          <input type="text" name="cantidad" id="cantidad" class="form-control" required="">
        </div>

        <div class="form-group">
          <button class="btn btn-info" id="agregar" disabled=""><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
        </div>
        </form>
     
      </div>
      
      <div class="col-md-6">
        <center><h1>PRODUCTOS</h1></center>
      <form action="" id="guardar_compras">         
        <table class="table table-hover table-striped table-bordered table-responsive order-table" id="tbl_products">
          <thead>
            <tr>
              <th width="50">N.-</th>
            
              <th width="250">Producto</th>
           
              <th>Valor</th>
            
              <th>Cantidad</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="body_products">
            
          </tbody>
        </table>

      </div>
      <div class="col-12 d-flex justify-content-end">
        <h1>Subtotal $ <span id="subtotal">0.00</span></h1>
      </div>
      <div class="col-12 d-flex justify-content-end">
        <h1>Iva 12% $ <span id="iva">0.00</span></h1>
      </div>
      <div class="col-12 d-flex justify-content-end">
        <h1>Total $ <span id="total">0.00</span></h1>
      </div>
      <div class="col-12 d-flex justify-content-center mb-3">
        <button class="btn btn-success btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
      </div>

      </form>
      </div>
    </div>
	</div>
  <script src="js/compras_products.js"></script>
  <script>
    $(document).ready(function(){
      $('.producto').select2();
      $('.prov').select2();

      $('.producto').change(function(){
        var val=$(this).val();
        if(val!=0){
          $('#agregar').removeAttr('disabled');
        }else{
          $('#agregar').attr('disabled',true);
        }
      });
    });
  </script>
</body>
</html>