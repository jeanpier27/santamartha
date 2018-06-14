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
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<link rel="stylesheet" href="css/datepicker.min.css">
<!-- <script src="js/datepicker.min.js"></script>
<script src="js/datepicker.es.min.js"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script>
    $(document).ready(function(){
      $('.nav-item').removeClass('active');
      $('#reportes').addClass('active');
      
    });
  </script>
	<title>Autoservicios Santa Martha</title>
</head>
<body>
  <?php require_once("menu.php"); ?>
  <div style="width: 1px; height: 80px;"></div>
<div class="container"style="background: #fff; border-radius: 20px;">
  <div class="row">
    <div class="col-md-12 ">
      <center><h1>Factura</h1></center>
      <br><br>
      <div class="row">
        <?php 
        // echo ($fecha=date('Y-m-d')); 
        ?>
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <form action="">
            <div class="form-group">
              <center>  <h2>Consulta por fechas</h2></center>
              <!-- <label for="">Consulta por fechas</label> -->
                <input type="text" name="fecha" class="form-control" value="<?php if(isset($_GET['fecha'])){echo $_GET['fecha'];} ?>">
             
            </div>
            <div class="form-group d-flex justify-content-center">
              <input type="submit" value="Consultar" name="consultar" class="btn btn-success">
            </div>
          </form>
        </div>
        <div class="col-md-4"></div>
      </div>
        <table class="table table-hover table-striped " id="tbl_datos">
          <thead>
            <tr>
              <th>Id</th>
              <th>N.-Factura</th>
              <th>Fecha</th>
              <th>Clientes</th>
              <th>PDF</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            require_once('conexion.php');
            if(isset($_GET['fecha'])){
              $fecha=$_GET['fecha'];
              $fecha1=substr($fecha, 0, -13);
              $fecha2=substr($fecha, 13);
              $consul=$conexion->query("SELECT `tb_clientes`.*, `tb_factura`.* FROM `tb_clientes` inner JOIN `tb_factura` ON `tb_factura`.`id_clientes` = `tb_clientes`.`id_clientes` where tb_factura.fecha>='".$fecha1."' and tb_factura.fecha<='".$fecha2."'  order by tb_factura.id_factura desc");
            }else{
              $consul=$conexion->query("SELECT `tb_clientes`.*, `tb_factura`.* FROM `tb_clientes` inner JOIN `tb_factura` ON `tb_factura`.`id_clientes` = `tb_clientes`.`id_clientes` order by tb_factura.id_factura desc");
            }
              while($resp=mysqli_fetch_array($consul)){
             ?>
            <tr>
              <td><?php echo $resp['id_factura']; ?></td>
              <td><?php echo $resp['numero_fact']; ?></td>
              <td><?php echo $resp['fecha']; ?></td>
              <td><?php echo $resp['nombre'].' '.$resp['apellido']; ?></td>
              <td><span class="pull-right"><a data-toggle="modal" data-target="#editar<?php echo $resp['id_factura']; ?>" href="#editar<?php echo $resp['id_factura']; ?>" style="text-decoration: none;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></span></td>
            </tr>
            <?php 
            include('modal_ventas.php');
            }
             ?>
          </tbody>
        </table>
      
    </div>
  </div>
</div>

  <script>
    $(document).ready(function(){
     $('input[name=fecha]').daterangepicker({
                        autoUpdateInput: false,
                        showDropdowns: true,
                        linkedCalendars: false,
                        locale: {
                          cancelLabel: 'Clear',
                          linkedCalendars: false,
                          format: 'YYYY-MM-DD',
                          "separator": " - ",
                          "applyLabel": "Aceptar",
                          "cancelLabel": "Cancelar",
                          "daysOfWeek": ["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
                          "monthNames": ["Enero","Febrero","Marzo","Abril","Mayo",
                          "Junio","Julio","Agosto","Septiembre","Octubre","Noviembre",
                          "Diciembre"]
                      }
                  });

       $('input[name="fecha"]').on('apply.daterangepicker', function(ev, picker) {
                      $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
                  });

        $('input[name="fecha"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });

      $('#tbl_datos').DataTable({
        "language": { 
        "sProcessing":     "Procesando...", 
        "sLengthMenu":     "Mostrar _MENU_ registros", 
        "sZeroRecords":    "No se encontraron resultados", 
        "sEmptyTable":     "Ningún dato disponible en esta tabla", 
        "sInfo":           "Mostrando registros del  _START_  al _END_ de un total de _TOTAL_ registros", 
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros", 
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)", 
        "sInfoPostFix":    "", 
        "sSearch":         "Buscar:", 
        "sUrl":            "", 
        "sInfoThousands":  ",", 
        "sLoadingRecords": "Cargando...", 
        "oPaginate": {

            "sFirst":    "Primero", 
            "sLast":     "Último",
            "sNext":     "Siguiente", 
            "sPrevious": "Anterior"

        },

        "oAria": { 
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente", 
            "sSortDescending": ": Activar para ordenar la columna de manera descendente" 
            } 
        },
      });

    

      $(".numero").keypress(function(e){
                    var key = window.Event ? e.which : e.keyCode 
                    return ((key >= 48 && key <= 57) || (key==8) || (key==0)) 
                });

    });
  </script>
</body>
</html>