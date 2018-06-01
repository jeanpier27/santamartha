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
        <center><h1>Proveedores</h1></center><br>
        <div class="col">
          <button class="btn btn-success" data-toggle="modal" data-target="#agregar"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
          <div class="col"></div>
          <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="agregarLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nuevo Empleado</h5>
                  <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> -->
                </div>
                <div class="modal-body">
                  <form action="" id="proveed">
                    <div class="form-group">
                      <label for="">Cedula:</label>
                      <input name="ruc" class="form-control numero" type="text" required="" minlength="10" maxlength="10">
                    </div>
                    <div id="message_cedula"></div>
                    <div class="form-group">
                      <label for="">Nombres:</label>
                      <input name="nombres" class="form-control" type="text" required="">
                    </div>
                    <div class="form-group">
                      <label for="">Cargo:</label>
                      <input name="cargo" class="form-control" type="text" required="">
                    </div>
                    <div class="form-group">
                      <label for="">Sueldo:</label>
                      <input name="sueldo" class="form-control" type="text" required="">
                    </div>
                    <div class="form-group">
                      <label for="">Telefono:</label>
                      <input name="telefono" class="form-control numero" type="text" required="" maxlength="10">
                    </div>
                    <div class="form-group">
                      <label for="">Direccion:</label>
                      <input name="direccion" class="form-control" type="text" required="">
                    </div>
                    <div id="message_ingreso"></div>
                  
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                  <a href="empleado.php" class="btn btn-danger">Cerrar</a>
                  <button type="submit" class="btn btn-primary" disabled id="guardar_proveed">Guardar</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="table-response " >
          <table class="table table-hover table-striped table-bordered table-responsive order-table" aling="center" id="tbl_datos">
            <thead>
                <tr  class="info">

                  <!-- <th hidden="">Id_estudiante</th> -->
                  <th>Id</th>
                  <th>Cedula</th>
                  <th>Nombres</th>
                  <th>Cargo</th>
                  <th>Sueldo</th>
                  <th>Telefono</th>
                  <th>Direccion</th> 
                  <th>Editar</th>
                  <!-- <th>Observacion</th> -->
                  
              </tr>
            </thead>                              

            <tbody>
              <?php 
                require_once('conexion.php');
               
                $mens=$conexion->query('select * from tb_empleado ');
                
                while($resp=mysqli_fetch_array($mens)){
               ?>
              <tr>
                <td><?php echo $resp['id_empleado']; ?></td>
                <td><?php echo $resp['cedula'] ?></td>
                <td><?php echo $resp['nombres'] ?></td>
                <td><?php echo $resp['cargo'] ?></td>
                <td><?php echo $resp['sueldo'] ?></td>
                <td><?php echo $resp['telefono'] ?></td>
                <td><?php echo $resp['direccion'] ?></td>
                <td><span class="pull-right"><a data-toggle="modal" data-target="#editar<?php echo $resp['id_empleado']; ?>" href="#editar<?php echo $resp['id_empleado']; ?>" style="text-decoration: none;"><i class="fa fa-pencil" aria-hidden="true"></i></a></span></td>
                
              </tr>
              <?php 
                  include('modal_empleado.php');
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
                    return ((key >= 48 && key <= 57) || (key==8) || (key==0)) 
                });


       $('#proveed').submit(function(e){
          e.preventDefault();
          var form=$(this).serialize();
          var boton=$('#guardar_proveed');
          // console.log(form);

          $.ajax({
                      url: "ingreso_empleado.php",
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
                        console.log(data);
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


      $('input[name=ruc]').focusout(function(){
        var ruc=$(this).val();
          function limpiar_msg_cedula(){
            setTimeout(function() {
                $('#message_cedula').html("");                      
                }, 5000);
          }

        if(ruc.length==10){
          
        
        $.ajax({
                      url: "emple.php",
                      type: "POST",
                      data: {
                        ruc: ruc
                      },
                      // cache: false,
                      beforeSend: function(){
                        
                      },
                      success: function(data) {
                        // Success message
                        console.log(data);
                        if (data==='error'){

                          $('#message_cedula').html("<div class='alert alert-warning'>");
                          $('#message_cedula > .alert-warning').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                          $('#message_cedula > .alert-warning')
                            .append("<strong>Ya se encuentra registrado el empleado :) </strong>");
                          $('#message_cedula > .alert-warning')
                            .append('</div>');
                          // clear all fields
                          // $('#registro').trigger("reset");
                          limpiar_msg_cedula();
                        }
                        else{
                          $('#message_cedula').html("<div class='alert alert-success'>");
                          $('#message_cedula > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                          $('#message_cedula > .alert-success').append($("<strong>").text("Ok :)"));
                          $('#message_cedula > .alert-success').append('</div>');
                          //clear all fields
                          limpiar_msg_cedula();
                          $('#guardar_proveed').removeAttr("disabled"); 
                        }
                      },
                      error: function() {
                        // Fail message
                        $('#message_cedula').html("<div class='alert alert-danger'>");
                        $('#message_cedula > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                          .append("</button>");
                        $('#message_cedula > .alert-danger').append($("<strong>").text("Lo sentimos :( ah ocurrido un problema. Intentalo de nuevo!"));
                        $('#message_cedula > .alert-danger').append('</div>');
                        limpiar_msg_cedula();
                        //clear all fields
                        // $('#contactForm').trigger("reset");
                      },
                      complete: function() {
                        // setTimeout(function() {
                        //   $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
                        // }, 1000);
                      }
                });
            }else{
              $('#message_cedula').html("<div class='alert alert-danger'>");
                        $('#message_cedula > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                          .append("</button>");
                        $('#message_cedula > .alert-danger').append($("<strong>").text("Error :( La cedula debe contener 10 números!"));
                        $('#message_cedula > .alert-danger').append('</div>');
                        limpiar_msg_cedula();
            }
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