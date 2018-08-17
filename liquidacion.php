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
        <center><h1>Liquidaciones</h1></center><br>
        <div class="col">
          <button class="btn btn-success" data-toggle="modal" data-target="#agregar"><i class="fa fa-plus" aria-hidden="true"></i> Nueva Liquidación</button>
          <div class="col"></div>
          <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="agregarLabel"  aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nuevo Liquidación</h5>
                  <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> -->
                </div>
                <div class="modal-body">
                  <form action="" id="proveed" method="post">
                  <div class="form-group">
                    <label for="">Empleados</label>
                    <select name="id_empleado" id="" class="form-control cliente">
                        <option value="0">Seleccione...</option>
                        <?php 
                        require_once('conexion.php'); 
                        $prov=$conexion->query("select * from tb_empleado where estado='ACTIVO' order by nombres");
                        while($resp=mysqli_fetch_array($prov)){
                        ?>
                        <option value="<?php echo $resp['id_empleado']; ?>"><?php echo $resp['nombres'] ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="">Fecha de Salida:</label>
                      <input name="fecha" class="form-control" type="date" required="">
                    </div>
                    <div class="form-group">
                      <label for="">Decimo Tercera Remuneración:</label>
                      <input name="decimo_tercera" class="form-control numero" type="text" required="">
                    </div>                    
                    <div class="form-group">
                      <label for="">Decimo Cuarta Remuneración:</label>
                      <input name="decimo_cuarta" class="form-control numero" type="text" required="">
                    </div>
                    <div class="form-group">
                      <label for="">Vacaciones:</label>
                      <input name="vacaciones" class="form-control numero" type="text" required="">
                    </div>
                    <div id="message_ingreso"></div>
                  
                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                  <a href="liquidacion.php" class="btn btn-danger">Cerrar</a>
                  <button type="submit" class="btn btn-primary" id="guardar_proveed" name="guardar">Guardar</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php 
        if(isset($_POST['guardar'])){
            $id_empleado=$_POST['id_empleado'];
            $fecha=$_POST['fecha'];
            $decimo_tercera=$_POST['decimo_tercera'];
            $decimo_cuarta=$_POST['decimo_cuarta'];
            $vacaciones=$_POST['vacaciones'];

            $resp=$conexion->query("insert into tb_liquidacion (id_empleado,fecha,decimo_tercero,decimo_cuarto,vacaciones)values('".$id_empleado."','".$fecha."','".$decimo_tercera."','".$decimo_cuarta."','".$vacaciones."')");
            if($resp){
                $update=$conexion->query("update tb_empleado set estado='INACTIVO' where id_empleado=".$id_empleado);
                if($update){
                    echo("<script>swal({
                        title: 'Ok?',
                        text: 'Liquidacion generada con exito :)',
                        type: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        // cancelButtonColor: '#d33',
                        showCancelButton: false,
                        confirmButtonText: 'Aceptar',
                        allowOutsideClick:false,
                      }).then((result) => {
                        if (result.value) {
                          
                        }
                      })</script>");
                    }else{
                        echo("<script>swal({
                            title: 'Error? update',
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
                            location.href = 'liquidacion.php';
                            }
                        })</script>");
                    } 
                }else{
                    echo("<script>swal({
                        title: 'Error? insert',
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
                        location.href = 'liquidacion.php';
                        }
                    })</script>");
                    }
            
        ?>
        <div class="row">
            <div class="col-md-12">
                <iframe src="<?php echo 'liquidacion_pdf.php?id='.$id_empleado.'&fecha='.$fecha ?>" width="100%" height="400px"></iframe>
            </div>
        </div>
        <?php 
            }
        ?>
        <div class="table-response " >
          <table class="table table-hover table-striped" aling="center" id="tbl_datos">
            <thead>
                <tr  class="info">

                  <!-- <th hidden="">Id_estudiante</th> -->
                  <th>Id</th>
                  <th>Cedula</th>
                  <th>Nombres</th>
                  <th>Fecha De Ingreso</th>
                  <th>Fecha De Salida</th>
                  <th>Cargo</th>
                  <th>Decimo Tercera</th>
                  <th>Decimo Cuarta</th>
                  <th>Vacaciones</th> 
                  <th>Total</th> 
                  <th>Descargar</th>
                  <!-- <th>Observacion</th> -->
                  
              </tr>
            </thead>                              

            <tbody>
              <?php 
                require_once('conexion.php');
               
                $mens=$conexion->query("SELECT `tb_empleado`.*, `tb_liquidacion`.* FROM `tb_empleado` inner JOIN `tb_liquidacion` ON `tb_liquidacion`.`id_empleado` = `tb_empleado`.`id_empleado` ");
                
                while($resp=mysqli_fetch_array($mens)){
               ?>
              <tr>
                <td><?php echo $resp['id_empleado']; ?></td>
                <td><?php echo $resp['cedula'] ?></td>
                <td><?php echo $resp['nombres'] ?></td>
                <td><?php echo $resp['fecha_ing'] ?></td>
                <td><?php echo $resp['fecha'] ?></td>
                <td><?php echo $resp['cargo'] ?></td>
                <td><?php echo $resp['decimo_tercero'] ?></td>
                <td><?php echo $resp['decimo_cuarto'] ?></td>
                <td><?php echo $resp['vacaciones'] ?></td>
                <td><?php echo ($resp['decimo_tercero']+$resp['decimo_cuarto']+$resp['vacaciones']); ?></td>
                <td><a target="_blank" href="liquidacion_pdf.php?id=<?php echo $resp['id_empleado'] ?>&fecha=<?php echo $resp['fecha'] ?> " style="text-decoration: none;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                
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
                    //console.log(key);
                    return ((key >= 48 && key <= 57) || (key==8) || (key==46)) 
                });


       $('#proveede8').submit(function(e){
          e.preventDefault();
          var form=$(this).serialize();
          var boton=$('#guardar_proveed');
          // console.log(form);

          $.ajax({
                      url: "ingreso_liquidacion.php",
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