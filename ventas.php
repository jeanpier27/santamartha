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
 <!--  <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<link rel="stylesheet" href="css/datepicker.min.css">
<script src="js/datepicker.min.js"></script>
<script src="js/datepicker.es.min.js"></script>
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
        <center><h1>VENTAS</h1></center><br>
        <form action="" id="add_products">
        <div class="form-group">
          <label for="">Factura</label>
          <input type="text" name="factura" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="">Cliente</label>
          <select name="cliente" id="" class="form-control cliente">
            <option value="0">Seleccione...</option>
            <?php 
              require_once('conexion.php'); 
              $prov=$conexion->query("select * from tb_clientes order by apellido");
              while($resp=mysqli_fetch_array($prov)){
            ?>
            <option value="<?php echo $resp['id_clientes']; ?>"><?php echo $resp['apellido'].' '.$resp['nombre']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">Fecha</label>
          <input type="text" name="fecha" id="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
        </div>

        <div class="form-group">
          <label for="">Producto</label>
          <select name="proveedor" id="produc"  class="form-control producto" title="Seleccione...">
            <option value="0" selected="">Seleccione...</option>
            <?php 
              require_once('conexion.php'); 
              $prov=$conexion->query("SELECT `tb_categoria`.`categoria`, `tb_producto`.* FROM `tb_categoria` INNER JOIN `tb_producto` ON `tb_producto`.`id_categoria` = `tb_categoria`.`id_categoria` where tb_producto.cantidad>0 order by producto");
              while($resp=mysqli_fetch_array($prov)){
            ?>
            <option value="<?php echo $resp['id_producto']; ?>"><?php echo $resp['producto']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">Valor</label>
          <input type="text" name="valor" id="valor" class="form-control" readonly="">
        </div>

        <div class="form-group">
          <label for="">Disponible</label>
          <input type="text" name="disponible" id="disponible" class="form-control" readonly="">
        </div>

        <div class="form-group">
          <label for="">Cantidad</label>
          <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" required="">
        </div>


        <div class="form-group">
          <button class="btn btn-info" id="agregar" disabled=""><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
        </div>
        </form>
     
      </div>

      <div class="col-md-6">
        <center><h1>PRODUCTOS</h1></center>
        <form action="" id="guardar_compras">
        <input type="hidden" name="factura_g">
      <input type="hidden" name="fecha_g">
      <input type="hidden" name="cliente_g"> 
      <input type="hidden" name="total_g">  
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
        <h1>Descuento $ <input type="number" class="numero" id="descuento" name="descuento" size="1" min="0" step=".01" value="0" style="width:100px"></h1>
      </div>
      <div class="col-12 d-flex justify-content-end">
        <h1>Iva 12% $ <span id="iva">0.00</span></h1>
      </div>
      <div class="col-12 d-flex justify-content-end">
        <h1>Total $ <span id="total">0.00</span></h1>
      </div>
      <div class="col-12 d-flex justify-content-center mb-3">
        <button class="btn btn-success btn-lg" disabled="" id="guardar_t"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
      </div>
        </form>

      </div>
    </div>
	</div>
   <script src="js/ventas_products.js"></script>
  <script src="js/guardar_ventas.js"></script>
  <script>
    $(document).ready(function(){
      $('#fecha').datepicker({
        language:'es',
        todayHighlight:true,
        format:'yyyy-mm-dd'
      });

      $('.producto').select2();
      $('.cliente').select2();

      $('.producto').change(function(){
        var val=$(this).val();
        if(val!=0){
          $('#agregar').removeAttr('disabled');
           $.post("consultaproductodetalle.php",{producto:val},function(data,status){                               
                // console.log(data);
                // console.log(status);
                var dato=JSON.parse(data);
                var dato=JSON.parse(data);
                // $('#contenedorproducts').html(data);  
                for(var i in dato.datos){
                  $('input[name=valor]').val(dato.datos[i].pvv);
                  $('input[name=disponible]').val(dato.datos[i].cantidad);
                  $('#cantidad').attr('max',dato.datos[i].cantidad);
                }
            });
        }else{
          $('#agregar').attr('disabled',true);
        }
      });

      $('#descuento').keyup(function(){
        var desc=parseFloat($('#descuento').val());
        var iva;
        var total;
        var subt;
        if(desc>0){
          subt=(parseFloat($('#subtotal').text()))-parseFloat(desc);
          iva=(0.12*subt).toFixed(2);
          total=(parseFloat(subt)+parseFloat(iva)).toFixed(2);
          $('#iva').empty();
          $('#iva').append(iva);$('#total').empty();
          $('#total').append(total);
          $('input[name=total_g]').val(total);
        }else{
          desc=0;
          subt=(parseFloat($('#subtotal').text()))-parseFloat(desc);
          iva=(0.12*subt).toFixed(2);
          total=(parseFloat(subt)+parseFloat(iva)).toFixed(2);
          $('#iva').empty();
          $('#iva').append(iva);
          $('#total').empty();
          $('#total').append(total);
          $('input[name=total_g]').val(total);
        }
      });

      $(".numero").keypress(function(e){
                    var key = window.Event ? e.which : e.keyCode 
                    return ((key >= 48 && key <= 57) || (key==8) || (key==0)) 
                });

    });
  </script>
</body>
</html>