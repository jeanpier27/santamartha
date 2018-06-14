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
        <center><h1>Rol de Pago</h1></center><br>
        <form action="" method="post" id="add_products">

        <div class="form-group">
          <label for="">Fecha</label>
          <input type="text" name="fecha" id="fecha" class="form-control" value="" readonly>
        </div>

        <?php 
        // echo date('Y-m-d'); 
        ?>


        <div class="form-group">
          <button name="agregar" type="submit" class="btn btn-info" id="agregar" ><i class="fa fa-files-o" aria-hidden="true"></i> Generar</button>
        </div>
        </form>
     
      </div>

      <div class="col-md-6">
        <center><h1>Consultar Rol de Pago</h1></center><br>
        <form action="rol_pago.php" method="post" id="add_products">

        <div class="form-group">
          <label for="">Fecha</label>
          <input type="text" name="fecha_c" id="fecha_c" class="form-control" value="" readonly>
        </div>


        <div class="form-group">
          <button name="consultar" type="submit" class="btn btn-info" id="agregar" ><i class="fa fa-folder-open-o" aria-hidden="true"></i> Consultar</button>
        </div>
        </form>
     
      </div>
      <!-- <div class="col-12">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/mhHqonzsuoA?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div> -->
      </div>
      <?php 
      require_once('conexion.php');
      if(isset($_POST['fecha'])){
        $fecha=$_POST['fecha'];
        list($anio,$mes) = explode('-', $fecha);
        $empleado=$conexion->query("select * from tb_empleado");
        $iess=9.45;
        $repetid=$conexion->query("select 1 from tb_rol_empleado where anio='".$anio."' and mes='".$mes."'");
        $total_rep=mysqli_fetch_array($repetid);
        if($total_rep[1]!=1){
        while($empl=mysqli_fetch_array($empleado)){
          $total=$empl['sueldo']-($empl['sueldo']*($iess*0.01));
          $insert=$conexion->query("insert into tb_rol_empleado(id_empleado,anio,mes,valor,estado)values('".$empl['id_empleado']."','".$anio."','".$mes."','".$total."','ACTIVO')");            
        }
        }else{
          echo("<script>swal({
              type: 'warning',
              title: 'Ya se encuentra generado el rol del mes seleccionado',
              showConfirmButton: false,
              timer: 2500
              }) </script>");
        }

       ?>
      <div class="row">
        <div class="col-md-12">
          <iframe src="<?php echo 'rol_pdf.php?anio='.$anio.'&mes='.$mes; ?>" width="100%" height="400px"></iframe>
        </div>
      </div>
      <?php 
        }
       ?>

       <?php 
      require_once('conexion.php');
      if(isset($_POST['fecha_c'])){
        $fecha=$_POST['fecha_c'];
        list($anio,$mes) = explode('-', $fecha);
        // $empleado=$conexion->query("select * from tb_empleado");
        // $iess=9.45;
        // $repetid=$conexion->query("select 1 from tb_rol_empleado where anio='".$anio."' and mes='".$mes."'");
        // $total_rep=mysqli_fetch_array($repetid);
        // if($total_rep[1]!=1){
        // while($empl=mysqli_fetch_array($empleado)){
        //   $total=$empl['sueldo']-($empl['sueldo']*($iess*0.01));
        //   $insert=$conexion->query("insert into tb_rol_empleado(id_empleado,anio,mes,valor,estado)values('".$empl['id_empleado']."','".$anio."','".$mes."','".$total."','ACTIVO')");            
        // }
        // }else{
        //   echo("<script>swal({
        //       type: 'warning',
        //       title: 'Ya se encuentra generado el rol del mes seleccionado',
        //       showConfirmButton: false,
        //       timer: 2500
        //       }) </script>");
        // }

       ?>
      <div class="row">
        <div class="col-md-12">
          <iframe src="<?php echo 'rol_pdf.php?anio='.$anio.'&mes='.$mes; ?>" width="100%" height="400px"></iframe>
        </div>
      </div>
      <?php 
        }
       ?>
    </div>
    
  
  <?php 
  if(isset($_POST['agregarrr'])){
    $factura=$_POST['factura'];
    $fecha=$_POST['fecha'];
    $descripcion=$_POST['descripcion'];
    $valor=$_POST['valor'];
    $gastos=$conexion->query(" insert into tb_gastos(factura,fecha,descripcion,valor,estado)values('".$factura."','".$fecha."','".$descripcion."','".$valor."','ACTIVO')" );
    if($gastos){
      echo("<script>swal({
                title: 'Ok?',
                text: 'Registro grabado con exito :)',
                type: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
                allowOutsideClick:false,
              }).then((result) => {
                if (result.value) {
                  location.href = 'gastos.php';
                }
              })</script>");
    }else{
       echo("<script>swal({
                title: 'Error?',
                text: 'Ah ocurrido un error :( No se guardo',
                type: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
                allowOutsideClick:false,
              }).then((result) => {
                if (result.value) {
                  location.href = 'gastos.php';
                }
              })</script>");
    }

    
  }
   ?>
  <!--  <script src="js/ventas_products.js"></script>
  <script src="js/guardar_ventas.js"></script> -->
  <script>
    $(document).ready(function(){
      $('#fecha').datepicker({
        language:'es',
        // todayHighlight:true,
        format:'yyyy-mm',
        minViewMode:1
      });

      $('#fecha_c').datepicker({
        language:'es',
        // todayHighlight:true,
        format:'yyyy-mm',
        minViewMode:1
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