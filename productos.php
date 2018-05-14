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
      <div class="col-md-6">
        <center><h1>CATEGORIA</h1></center>
        <div class="col">
          <button class="btn btn-success" data-toggle="modal" data-target="#agregar_c" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
        </div>
        <div class="col"></div>
        <div class="modal fade" id="agregar_c" tabindex="-1" role="dialog" aria-labelledby="agregar_cLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="agregar_cLabel">Agregar Categoria</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> -->
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <form action="" id="frm_categoria">
                    
                  <label for="">Categoria</label>
                  <input class="form-control" type="text" name="categoria" id="new_categoria">                  
                </div>
                <div id="message_categoria"></div>
              </div>
              <div class="modal-footer">
                <a href="productos.php" class="btn btn-danger">Cerrar</a>
                <button type="submit" class="btn btn-primary" id="guardar_c">Guardar</button>
              </div>
                  </form>
            </div>
          </div>
        </div>
        <div class="table-response " >
          <table class="table table-hover table-striped table-bordered table-responsive order-table" aling="center" id="tbl_datos">
            <thead>
                <tr  class="info">

                  <!-- <th hidden="">Id_estudiante</th> -->
                  <th>Id</th>
                  <th>Categoria</th>
                  <th></th>
                  
              </tr>
            </thead>                              

            <tbody>
              <?php 
                require_once('conexion.php');
               
                $mens=$conexion->query('select * from tb_categoria ');
                
                while($resp=mysqli_fetch_array($mens)){
               ?>
              <tr>
                <td><?php echo $resp['id_categoria']; ?></td>
                <td><?php echo $resp['categoria'] ?></td>
                <td><span class="pull-right"><a data-toggle="modal" data-target="#editar_c<?php echo $resp['id_categoria']; ?>" href="#editar_c<?php echo $resp['id_categoria']; ?>" style="text-decoration: none;"><i class="fa fa-pencil" aria-hidden="true"></i></a></span></td>
                
              </tr>
              <?php 
                  include('modal_categoria.php');
                }
               ?>
            </tbody>
          </table>
          
        </div>
            
      </div>
      <div class="col-md-6">
        <center><h1>PRODUCTOS</h1></center>
          <div class="col">
            <button class="btn btn-success" data-toggle="modal" data-target="#agregar_p" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
          </div>
          <div class="col"></div>
          <div class="modal fade" id="agregar_p" tabindex="-1" role="dialog" aria-labelledby="agregar_cLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="agregar_cLabel">Agregar Producto</h5>
                  <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> -->
                </div>
                <form action="" enctype="multipart/form-data" id="frm_producto" method="post">  

                <div class="modal-body">
                  <div class="form-group">
                    <label for="">Categoria</label>
                    <select class="form-control" name="catego" id="">
                        <?php 
                          $sql3=$conexion->query("select * from tb_categoria");
                          while($sql2=mysqli_fetch_array($sql3)){
                         ?>
                         
                        <option value="<?php echo $sql2['id_categoria']; ?>"><?php echo $sql2['categoria']; ?></option>
                      <?php } ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="">Producto</label>
                    <input class="form-control" type="text" required="" name="producto">                    
                  </div>
                  <div class="form-group">
                    <label for="">Subir Imagen</label>
                    <input class="form-control" type="file" required="" name="new_imagen">                    
                  </div>
                  <div class="form-group">
                    <label for="">Precio Venta</label>
                    <input class="form-control" type="text" required="" name="precio">                    
                  </div>
                </div>
                <div id="message_producto"></div>
                <div class="modal-footer">
                  <a href="productos.php" class="btn btn-danger">Cerrar</a>
                  <button type="submit" class="btn btn-primary" id="guardar_p">Guardar</button>
                </div>
              </form>
              </div>
            </div>
          </div>
          <div class="table-response " >
            <table class="table table-hover table-striped table-bordered table-responsive order-table" aling="center" id="tbl_datos2">
              <thead>
                  <tr  class="info">

                    <!-- <th hidden="">Id_estudiante</th> -->
                    <th>Id</th>
                    <th>Categoria</th>
                    <th>Producto</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Estado</th>

                    <th></th>
                    
                </tr>
              </thead>                              

              <tbody>
                <?php 
                  require_once('conexion.php');
                 
                  $mens=$conexion->query('SELECT `tb_categoria`.`categoria`, `tb_producto`.* FROM `tb_categoria` INNER JOIN `tb_producto` ON `tb_producto`.`id_categoria` = `tb_categoria`.`id_categoria` ');
                  
                  while($resp=mysqli_fetch_array($mens)){
                 ?>
                <tr>
                  <td><?php echo $resp['id_producto']; ?></td>
                  <td><?php echo $resp['categoria'] ?></td>
                  <td><?php echo $resp['producto'] ?></td>
                  <td><img src="<?php echo $resp['imagen'] ?>"  height="50px" alt=""></td>
                  <td><?php echo '$'.$resp['pvv'] ?></td>
                  <td><?php echo $resp['estado'] ?></td>
                  <td><span class="pull-right"><a data-toggle="modal" data-target="#editar_p<?php echo $resp['id_producto']; ?>" href="#editar_p<?php echo $resp['id_producto']; ?>" style="text-decoration: none;"><i class="fa fa-pencil" aria-hidden="true"></i></a></span></td>
                  
                </tr>
                <?php 
                    include('modal_producto.php');
                  }
                 ?>
              </tbody>
            </table>
            
          </div>
              
        </div>
            
      </div>

      </div>
    </div>
	</div>
  <script src="js/categoria.js"></script>
  <script src="js/productos.js"></script>
  <script>
    $(document).ready(function(){

      // $('#responder').click(function(e){
      //   e.preventDefault();
      //   var a='<form class="mt-3 mb-3"><textarea placeholder="Escribe tu respuesta aqui...." style="width: 100%;" id="respuesta"></textarea><button class="btn btn-success">Enviar</button> <a href="mensajes.php" class="btn btn-danger">Cancelar</a></form>'
      //   $(this).after(a);
      //   $(this).attr('disabled',true);
      // });
      
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

      $('#tbl_datos2').DataTable({
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