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
	          end: '<?php echo $resp_dias['fecha_fin']; ?>'
	        },
      	

        <?php } ?>

        // {
        //   title: 'All Day Event',
        //   start: '2018-03-01'
        // },
        // {
        //   title: 'Long Event',
        //   start: '2018-03-07',
        //   end: '2018-03-10'
        // },
        // {
        //   id: 999,
        //   title: 'Repeating Event',
        //   start: '2018-03-09T16:00:00'
        // },
        // {
        //   id: 999,
        //   title: 'Repeating Event',
        //   start: '2018-03-16T16:00:00'
        // },
        // {
        //   title: 'Conference',
        //   start: '2018-03-11',
        //   end: '2018-03-13'
        // },
        // {
        //   title: 'Meeting',
        //   start: '2018-04-19 09:30:00',
        //   end: '2018-04-19 18:30:00'
        // },
        // {
        //   title: 'Lunch',
        //   start: '2018-03-12T12:00:00'
        // },
        // {
        //   title: 'Meeting',
        //   start: '2018-03-12T14:30:00'
        // },
        // {
        //   title: 'Happy Hour',
        //   start: '2018-03-12T17:30:00'
        // },
        // {
        //   title: 'Dinner',
        //   start: '2018-03-12T20:00:00'
        // },
        // {
        //   title: 'Birthday Party',
        //   start: '2018-03-13T07:00:00'
        // },
        // {
        //   title: 'Click for Google',
        //   url: 'http://google.com/',
        //   start: '2018-03-28'
        // }
      ]
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
</body>
</html>