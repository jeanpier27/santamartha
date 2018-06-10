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
	<link href='css/fullcalendar.min.css' rel='stylesheet' />
	<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<script src='js/moment.min.js'></script>	
	<script src='js/fullcalendar.min.js'></script>
	<script src='js/locale-all.js'></script>
  <script>
    $(document).ready(function(){
      $('.nav-item').removeClass('active');
      $('#inicio').addClass('active');
      
    });
  </script>
	<title>Autoservicios Santa Martha</title>
</head>
<body>

	<?php require_once('menu.php'); ?>
	<div style="width: 1px; height: 80px;"></div>
	<div class="container" style="background: #fff; border-radius: 20px;">
		<h1><center>AGENDA</center></h1>
		<div class="mt-2" id="calendar"></div>		
	</div>
	<script>
		 $(document).ready(function() {
    var initialLocaleCode = 'es';
    var fecha="<?php  echo date('Y-m-d'); ?>";

       
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'agendaWeek,agendaDay'
        // right: 'month,agendaWeek,agendaDay,listMonth'
      },
      defaultDate: fecha, //fecha actual
      locale: initialLocaleCode, //idioma en español
      minTime:"08:00:00",
      maxTime:"17:30:00",
      defaultView:'agendaDay', //muestra solo el dia por default
      buttonIcons: false, // show the prev/next text
      weekNumbers: true,
      navLinks: true, // can click day/week names to navigate views
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: [
      		// a();
      		<?php 
      		require_once('conexion.php');
      		$dias=$conexion->query("SELECT `tb_agenda`.*, concat( `tb_clientes`.`nombre`,' ', `tb_clientes`.`apellido`)as nombres FROM `tb_clientes` inner JOIN `tb_agenda` ON `tb_agenda`.`id_clientes` = `tb_clientes`.`id_clientes`");

      		while($resp_dias=mysqli_fetch_array($dias)){

      	?> 
      		{
	         title: 'Cliente: <?php echo $resp_dias['nombres']; ?> Servicio: <?php echo $resp_dias['servicio']; ?>',
	          start: "<?php echo $resp_dias['fecha_inicio']; ?>",
	          end: '<?php echo $resp_dias['fecha_fin']; ?>',
            url: "<?php echo $resp_dias['id_agenda']; ?>",
            color:<?php if($resp_dias['estado']=='ACTIVO'){ ?> '#3498db' <?php }elseif ($resp_dias['estado']=='PAGADO') { ?> '#2ecc71' <?php }elseif ($resp_dias['estado']=='ANULADO') {?> '#e74c3c' <?php } ?>
	        },
      	

        <?php } ?>

      ],
      eventRender: function(event, element) {
          // element.qtip({
          //   content: event.description
          // });
          element.attr('href', 'javascript:void(0);');
          element.click(function() {
            // alert(event.url);
            
            $('#exampleModal').modal("show");
            $('#id_agenda').val(event.url);

          });
        }
    });

    // build the locale selector's options
    // $.each($.fullCalendar.locales, function(localeCode) {
    //   $('#locale-selector').append(
    //     $('<option/>')
    //       .attr('value', localeCode)
    //       .prop('selected', localeCode == initialLocaleCode)
    //       .text(localeCode)
    //   );
    // });

    // when the selected option changes, dynamically change the calendar option
    // $('#locale-selector').on('change', function() {
    //   if (this.value) {
    //     $('#calendar').fullCalendar('option', 'locale', this.value);
    //   }
    // });
  });
	</script>

  <!-- Button trigger modal -->
<!-- <button type="hidden" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->
<!-- <input type="hidden" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agenda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="servicio.php" method="post" id="agenda">
        <input type="hidden" name="idagenda" id="id_agenda">
          
        <div class="form-group">
          <label for="">Empleado</label>
          <select class="form-control" name="empleadi" id="">
            <option value="0">Seleccione...</option>
            <?php 
              $emple=$conexion->query("select * from tb_empleado where estado='ACTIVO'");
              while($resp=mysqli_fetch_array($emple)){
              ?>

                <option value="<?php echo $resp['id_empleado']; ?>"> <?php echo $resp['nombres']; ?></option>
              <?php 

              } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">Valor</label>
          <input type="text" name="valor" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="guard" class="btn btn-primary">Aceptar</button>
      </div>
        </form>
    </div>
  </div>
</div>
</body>
</html>