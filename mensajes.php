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
      $('#mensajes').addClass('active');
      
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
        <center><h1>MENSAJES</h1></center>
        <div class="table-response">
          <table class="table table-hover table-striped table-bordered table-responsive order-table" aling="center" id="tbl_datos">
            <thead>
                <tr  class="info">

                  <!-- <th hidden="">Id_estudiante</th> -->
                  <th>N.-</th>
                  <th>Fecha</th>
                  <th>Nombres</th>
                  <th></th>
                  <!-- <th>Curso</th> 
                  <th>Estado</th>
                  <th>Observacion</th> -->
                  
              </tr>
            </thead>                              

            <tbody>
              <?php 
                require_once('conexion.php');
                if(isset($_GET['id'])){
                  $update=$conexion->query("update tb_mensajes set verificacion=1 where id_mensaje=".$_GET['id']);
                }
                $mens=$conexion->query('select * from tb_mensajes order by fecha desc');
                $i=1;
                while($resp=mysqli_fetch_array($mens)){
               ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $resp['fecha'] ?></td>
                <td><?php echo $resp['nombre'] ?></td>
                <?php 
                  if($resp['verificacion']==0){    
                 ?>
                <td><span class="pull-right"><a href="mensajes.php?id=<?php echo $resp['id_mensaje']; ?>" id="enlace" style="text-decoration: none;"><i class="fa fa-envelope" aria-hidden="true"></i></a></span></td>
                <?php 
                }else{?>
                <td><span class="pull-right"><a href="mensajes.php?id=<?php echo $resp['id_mensaje']; ?>" id="enlace" style="text-decoration: none;"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></a></span></td>
                <?php } ?>
              </tr>
              <?php 
                  $i++;
                }
               ?>
            </tbody>
          </table>
          
        </div>

      </div>

      <div class="col-md-6">
        <?php if(isset($_GET['id'])){ 
          $message=$conexion->query("select * from tb_mensajes where id_mensaje=".$_GET['id']);
          while($resp_message=mysqli_fetch_array($message)){
            $name=$resp_message['nombre'];
            $telefono=$resp_message['telefono'];
            $correos=$resp_message['correo'];
            $mensaj=$resp_message['mensaje'];
          }
          ?>
        <div class="form-group">
          <h5 class="mt-2">NOMBRES:</h5>
          <p><?php echo $name; ?></p>
          <!-- <input type="text" readonly="" value="">           -->
        </div>
        <div class="form-group">
          <h5>TELÉFONO:</h5>
          <p><?php echo $telefono; ?></p>
          <!-- <input type="text" readonly="" value="">           -->
        </div>
        <form  id="respondermsj" action="mensajes.php" method="post">
        <div class="form-group">
          <h5>CORREO:</h5>
          <p><?php echo $correos; ?></p>
          <input type="hidden" name="correo" value="<?php echo $correos; ?>">          
        </div>
        <div class="form-group">
          <h5>MENSAJE:</h5>
          <p><?php echo $mensaj; ?></p>
          <!-- <textarea style="width: 90%;"></textarea>        -->
        </div>
        
        <button class="btn btn-success mb-3" id="responder">Responder</button>
        <?php } ?>

      </div>
      <?php 
      if(isset($_POST['enviarmsj'])){
          require_once('phpmailer/PHPMailerAutoload.php');
          $mensaje=$_POST['respmsj'];
          $correo=$_POST['correo'];
          $mail=new PHPMailer;
          $mail->Host='smtp.gmail.com';
          $mail->SMTPAuth=true;
          $mail->Username="jeancervantesc@gmail.com";
          $mail->Password="271991jpcc01+";
          $mail->SMTPSecure="ssl";
          $mail->Port=465;
          $mail->Subject="Autoservicio Santa Martha";
          $mail->Body="".$mensaje."";
          $mail->SetFrom('jeancervantesc@gmail.com','SM');
          $mail->addAddress($correo);
          if($mail->send()){
            echo("<script>swal({
                title: 'Ok?',
                text: 'Mensaje enviado con exito :)',
                type: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
                allowOutsideClick:false,
              }).then((result) => {
                if (result.value) {
                  location.href = 'mensajes.php';
                }
              })</script>");
          }else{
            echo("<script>swal({
                title: 'Error?',
                text: 'Ah ocurrido un error :( No se envio el mensaje',
                type: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
                allowOutsideClick:false,
              }).then((result) => {
                if (result.value) {
                  location.href = 'mensajes.php';
                }
              })</script>");
          }

        
      }
       ?>
    </div>
	</div>
  <script>
    $(document).ready(function(){

      $('#responder').click(function(e){
        e.preventDefault();
        var a='<textarea class="mt-3 mb-3" required name="respmsj" placeholder="Escribe tu respuesta aqui...." style="width: 100%;" id="respuesta"></textarea><input class="btn btn-success mb-3" type="submit" value="Enviar" name="enviarmsj" > <a href="mensajes.php" class="btn btn-danger mb-3">Cancelar</a></form>'
        $(this).after(a);
        $(this).attr('disabled',true);
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