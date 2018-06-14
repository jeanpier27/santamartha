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

	<?php require_once('menu.php'); require_once('conexion.php');
    if(isset($_POST['guard'])){
      $idagenda=$_POST['idagenda'];
      $id_empleado=$_POST['empleadi'];
      $valor=$_POST['valor'];
      $agenda=$conexion->query("select servicio,id_clientes from tb_agenda where id_agenda=".$idagenda);
      $agend=mysqli_fetch_array($agenda);
      $servici=$agend[0];
      $idclient=$agend[1];
    }
   ?>
<?php if(isset($_POST['guard'])){ echo $servici;  } ?>

	<div style="width: 1px; height: 80px;"></div>
	<div class="container" style="background: #fff; border-radius: 20px;">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <center><h1>Servicio</h1></center><br>
        <form action="servicio.php" method="post" id="add_products">

        <input type="hidden" name="idagendas" value="<?php echo $idagenda; ?>">
        <div class="form-group">
          <label for="">Fecha</label>
          <input type="text" name="fecha" id="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
        </div>
        <div class="form-group">
          <label for="">Cliente</label>
          <select class="form-control" name="id_cliente" id="">
            <option value="0">Seleccione...</option>
            <?php 
              $emple=$conexion->query("select * from tb_clientes order by apellido asc ");
              while($respu=mysqli_fetch_array($emple)){
              ?>

                <option value="<?php echo $respu['id_clientes']; ?>" <?php if(isset($_POST['guard'])){if($respu['id_clientes']==$idclient){ echo 'selected'; } } ?>> <?php echo $respu['apellido'].' '.$respu['nombre']; ?></option>
              <?php 

              } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">Servicio</label>
          <input class="form-control" type="text" name="servicio" value="<?php if(isset($_POST['guard'])){ echo $servici;  } ?>">
        </div>

        <div class="form-group">
          <label for="">Empleado</label>
          <select class="form-control" name="id_empleado" id="">
            <option value="0">Seleccione...</option>
            <?php 
              $emple=$conexion->query("select * from tb_empleado where estado='ACTIVO'");
              while($resp=mysqli_fetch_array($emple)){
              ?>

                <option value="<?php echo $resp['id_empleado']; ?>" <?php if(isset($_POST['guard'])){if($resp['id_empleado']==$id_empleado){ echo 'selected'; } } ?>> <?php echo $resp['nombres']; ?></option>
              <?php 

              } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="">Valor</label>
          <input class="form-control" type="text" name="valor" value="<?php if(isset($_POST['guard'])){ echo $valor;  } ?>">
        </div>

        <div class="form-group d-flex justify-content-center">
          <button name="agregar" type="submit" class="btn btn-success" id="agregar" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
        </div>
        </form>
     
      </div>
      <div class="col-md-2"></div>
      </div>
    </div>
    
	
  <?php 
  if(isset($_POST['agregar'])){
    $idagendas=$_POST['idagendas'];
    $id_cliente=$_POST['id_cliente'];
    $fecha=$_POST['fecha'];
    $id_empleado=$_POST['id_empleado'];
    $servicio=$_POST['servicio'];
    $valor=$_POST['valor'];
    require_once('conexion.php');
    $max_factura=$conexion->query("select max(numero_fact)+1 as num from tb_factura");
    $error=0;
    $idfactu=mysqli_fetch_array($max_factura);
    $numfact=$idfactu[0];
    $conexion->autocommit(false);
    $gastos=$conexion->query(" insert into tb_factura(numero_fact,fecha,id_clientes,total,descuento,iva,estado,observacion)values('".$numfact."','".$fecha."','".$id_cliente."','".$valor."','0','0','ACTIVO','')" );
    $id_fact=$conexion->query("select id_factura from tb_factura where numero_fact=".$numfact);
    $id_factur=mysqli_fetch_array($id_fact);
    $idfact=$id_factur[0];
    if($gastos){
      $serv=$conexion->query("insert into tb_detalle_servicio(id_factura,id_empleado,observacion)values('".$idfact."','".$id_empleado."','".$servicio."')");
      if($serv){
        if($idagendas!=""){
          $upda=$conexion->query("update tb_agenda set estado='PAGADO' where id_agenda=".$idagendas);
          if($upda){

          }else{
            $error=1;
          }
        }

      }else{
        $error=1;
      }
    }else{
      $error=1;
    }
    if($error){
      $conexion->rollback();
       echo("<script>swal({
                title: 'Error?',
                text: 'Ah ocurrido un error :( No se guardo',
                type: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
                allowOutsideClick:false,
              }).then((result) => {
                if (result.value) {
                  location.href = 'dashboard.php';
                }
              })</script>");
      
    }else{
      $conexion->commit();
      echo("<script>swal({title: 'Ok?',text: 'Registro grabado con exito :)',          type: 'success',showCancelButton: true,confirmButtonColor: '#3085d6',  showCancelButton: false,  confirmButtonText: 'Aceptar',allowOutsideClick:false,              }).then((result) => {if (result.value) {         window.open('factura.php?id_fact=".$idfact."', '_blank'); location.href = 'dashboard.php'; }              })</script>");
      
    }
                  // location.href = 'servicio.php';

    
   }
   ?>
  <!--  <script src="js/ventas_products.js"></script>
  <script src="js/guardar_ventas.js"></script> -->
  <script>
    $(document).ready(function(){
      $('#fecha').datepicker({
        language:'es',
        todayHighlight:true,
        format:'yyyy-mm-dd'
      });

      // $('.producto').select2();
      // $('.cliente').select2();

    

      $(".numero").keypress(function(e){
                    var key = window.Event ? e.which : e.keyCode 
                    return ((key >= 48 && key <= 57) || (key==8) || (key==0)) 
                });

    });
  </script>
</body>
</html>