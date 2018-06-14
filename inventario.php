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
      <div class="col">
        <center><h1>Inventario</h1></center><br>
        <div class="row mb-3">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          
        <div class="table-response " >
          <table class="table table-hover table-striped table-bordered table-responsive order-table" aling="center" id="tbl_datos">
            <thead>
                <tr  class="info">

                  <!-- <th hidden="">Id_estudiante</th> -->
                  <th>Id</th>
                  <th>Categoria</th>
                  <th>Producto</th>
                  <th>Stock</th>
                  <!-- <th>Observacion</th> -->
                  
              </tr>
            </thead>                              

            <tbody>
              <?php 
                require_once('conexion.php');
               
                $mens=$conexion->query('SELECT `tb_categoria`.*, `tb_producto`.* FROM `tb_categoria` inner JOIN `tb_producto` ON `tb_producto`.`id_categoria` = `tb_categoria`.`id_categoria`');
                
                while($resp=mysqli_fetch_array($mens)){
               ?>

              <tr class="<?php if($resp['cantidad']==0){echo 'table-danger';} ?>">
                <td><?php echo $resp['id_producto']; ?></td>
                <td><?php echo $resp['categoria'] ?></td>
                <td width="30%"><?php echo $resp['producto'] ?></td>
                <td><?php echo $resp['cantidad'] ?></td>
                
                
              </tr>
              <?php 
                  include('modal_proveedores.php');
                }
               ?>
            </tbody>
          </table>
          
        </div>

      </div>
      <div class="col-md-2"></div>
      </div>
    </div>
	</div>
  <script>
    $(document).ready(function(){
       $(".numero").keypress(function(e){
                    var key = window.Event ? e.which : e.keyCode 
                    return ((key >= 48 && key <= 57) || (key==8) || (key==0)) 
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
    });
  </script>
</body>
</html>