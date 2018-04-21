<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
	date_default_timezone_set('America/Bogota');
	session_start();
	if(!isset($_SESSION['nombres'])){
		header('location:cerrar_sesion.php');
	}

	 ?>
	<meta charset="UTF-8">
	<link href='css/fullcalendar.min.css' rel='stylesheet' />
	<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<script src='js/moment.min.js'></script>
	<script src='js/jquery.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>
	<script src='js/locale-all.js'></script>
	<title>Autoservicios Santa Martha</title>
	<?php require_once('meta.php'); ?>
</head>
<body>
	<!-- <div class="container-fluid">
		<div class="row">
			<div class="barra-lateral col-12 col-sm-auto">
				<div class="logo">
					<h2 style="color:#fed136; font-family: 'Kaushan Script', cursive;">Santa Martha</h2>
				</div>				
				<nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
					<a href="#"><i class="fa fa-home" aria-hidden="true"></i><span>Inicio</span></a>					
					<a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i><span>Compras</span></a>
					<a href="#"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span>Ventas</span></a>
					<a href="#"><i class="fa fa-user-o" aria-hidden="true"></i><span>Usuarios</span></a>
					<a href="#"><i class="fa fa fa-folder-open-o" aria-hidden="true"></i><span>Reportes</span></a>
					<a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span>Configuracion</span></a>
				</nav>
			</div>
		</div>
	</div> -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	    <a class="navbar-brand" href="#" style="color:#fed136; font-family: 'Kaushan Script', cursive;">Santa Martha</a>
	    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	      <li class="nav-item active">
	        <a class="nav-link" href="#"><i class="fa fa-home" aria-hidden="true"></i><span class="ml-1">Inicio</span><span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i><span class="ml-1">Compras</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span class="ml-1">Ventas</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#"><i class="fa fa fa-folder-open-o" aria-hidden="true"></i><span class="ml-1">Reportes</span></a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="fa fa-cogs" aria-hidden="true"></i><span class="ml-1">Configuración</span>
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	      </li>
	    </ul>
	    <!-- <form class="form-inline my-2 my-lg-0"> -->
	      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
	      <h6 class="mr-2" style="color:#fed136;">Bienvenido: <?php echo $_SESSION['nombres']; ?></h6>
	      <button class="btn btn-outline-danger my-2 my-sm-0" data-toggle="modal" data-target="#salir">Salir</button>
	    <!-- </form> -->
	    <!-- modal salir -->
	    <div class="modal fade" id="salir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Sistema Santa Martha</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <h1>Esta seguro de salir del sistema?</h1>
		      </div>
		      <div class="modal-footer">
		        <!-- <button type="button" class="btn btn-danger">Salir</button> -->
		        <a href="cerrar_sesion.php" class="btn btn-outline-info">Aceptar</a>
		        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
		      </div>
		    </div>
		  </div>
		</div>
	  </div>
	</nav>
	<div class="container mt-5" style="background: #fff">
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