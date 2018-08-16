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
      <div class="col">
        <center><h1>Faltas de Empleados</h1></center><br>
        <div class="col">
          <button class="btn btn-success" data-toggle="modal" data-target="#agregar"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
          <div class="col"></div>
          <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="agregarLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nuevo Falta</h5>
                  <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> -->
                </div>
                <div class="modal-body">
                  <form action="" id="proveed">
                      
                    <div class="form-group">
                      <label for="">Empleados:</label>
                      <select class="form-control" name="id_empleado" id="">
                      <?php 
                        require_once('conexion.php');
                        $empleados=$conexion->query("select * from tb_empleado order by nombres");
                        while($res=mysqli_fetch_array($empleados)){                        
                      ?>
                      <option value="<?php echo $res['id_empleado']; ?>"><?php echo $res['nombres']; ?></option>
                      <?php
                        }
                      ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="">Fecha:</label>
                      <input name="fecha" class="form-control" type="date" required="">
                    </div>
                    
                    <div id="message_ingreso"></div>
                  
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                  <a href="faltas.php" class="btn btn-danger">Cerrar</a>
                  <button type="submit" class="btn btn-primary" id="guardar_proveed">Guardar</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="table-response " >
          <table class="table table-hover table-striped" aling="center" id="tbl_datos">
            <thead>
                <tr  class="info">

                  <!-- <th hidden="">Id_estudiante</th> -->
                  <th>Id</th>
                  <th>Cedula</th>
                  <th>Nombres</th>
                  <th>Cargo</th>
                  <th>Faltas</th>
                  <th>Editar</th>
                  <!-- <th>Observacion</th> -->
                  
              </tr>
            </thead>                              

            <tbody>
              <?php 
                
               
                $mens=$conexion->query('SELECT `tb_empleado`.*, `tb_faltas`.* FROM `tb_empleado` inner JOIN `tb_faltas` ON `tb_faltas`.`id_empleado` = `tb_empleado`.`id_empleado` order by nombres,fecha  ');
                
                while($resp=mysqli_fetch_array($mens)){
               ?>
              <tr>
                <td><?php echo $resp['id_empleado']; ?></td>
                <td><?php echo $resp['cedula'] ?></td>
                <td><?php echo $resp['nombres'] ?></td>
                <td><?php echo $resp['cargo'] ?></td>
                <td><?php echo $resp['fecha'] ?></td>
                <td><span class="pull-right"><a data-toggle="modal" data-target="#editar<?php echo $resp['id_empleado']; ?>" href="#editar<?php echo $resp['id_empleado']; ?>" style="text-decoration: none;"><i class="fa fa-pencil" aria-hidden="true"></i></a></span></td>
                
              </tr>
              <?php 
                  include('modal_faltas.php');
                }
               ?>
            </tbody>
          </table>
          
        </div>

      </div>
    </div>
	</div>
  <script>
    $(document).ready(function(){
      
       $(".numero").keypress(function(e){
         
                    var key = window.Event ? e.which : e.keyCode 
                    //console.log(key);
                    return ((key >= 48 && key <= 57) || (key==8) || (key==46)) 
                });


       $('#proveed').submit(function(e){
          e.preventDefault();
          var form=$(this).serialize();
          var boton=$('#guardar_proveed');
          // console.log(form);

          $.ajax({
                      url: "ingreso_faltas.php",
                      type: "POST",
                      data: form,
                      // cache: false,
                      beforeSend: function(){
                        boton.removeClass("btn-primary");
                        boton.addClass("btn-warning");
                        boton.html('Procesando....');
                        boton.attr('disabled',true);
                        
                      },
                      success: function(data) {
                        // Success message
                        // console.log(data);
                        if (data==='error'){

                          $('#message_ingreso').html("<div class='alert alert-warning'>");
                          $('#message_ingreso > .alert-warning').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                          $('#message_ingreso > .alert-warning')
                            .append("<strong>Ah ocurrido un problema :) </strong>");
                          $('#message_ingreso > .alert-warning')
                            .append('</div>');
                          // clear all fields
                          $('#proveed').trigger("reset");
                          // limpiar_msg_cedula();
                        }
                        else{
                          $('#message_ingreso').html("<div class='alert alert-success'>");
                          $('#message_ingreso > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                          $('#message_ingreso > .alert-success').append($("<strong>").text("Agregado con exito :)"));
                          $('#message_ingreso > .alert-success').append('</div>');
                          //clear all fields
                          $('#proveed').trigger("reset");
                          boton.removeClass("btn-warning");
                          boton.addClass("btn-primary");
                          boton.html('Guardar');

                        }
                      },
                      error: function() {
                        // Fail message
                        $('#message_ingreso').html("<div class='alert alert-danger'>");
                        $('#message_ingreso > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                          .append("</button>");
                        $('#message_ingreso > .alert-danger').append($("<strong>").text("Lo sentimos :( ah ocurrido un problema. Intentalo de nuevo!"));
                        $('#message_ingreso > .alert-danger').append('</div>');
                        // limpiar_msg_cedula();
                        //clear all fields
                        $('#proveed').trigger("reset");
                        // $('#contactForm').trigger("reset");
                      },
                      complete: function() {
                        $('#proveed').trigger("reset");
                        // setTimeout(function() {
                        //   $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
                        // }, 1000);
                      }
                });


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