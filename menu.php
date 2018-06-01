	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	    <a class="navbar-brand" href="dashboard.php" style="color:#fed136; font-family: 'Kaushan Script', cursive;">Santa Martha</a>
	    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	      <li class="nav-item" id="inicio">
	        <a class="nav-link" href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i><span class="ml-1">Inicio</span><span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item dropdown" id="herramientas">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="fa fa-wrench" aria-hidden="true"></i><span class="ml-1">Herramientas</span>
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="compras.php"><i class="fa fa-cart-plus" aria-hidden="true"></i><span class="ml-1">Compras</span></a>
	          <a class="dropdown-item" href="gastos.php"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i><span class="ml-1">Gastos</span></a>
	          <a class="dropdown-item" href="ventas.php"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span class="ml-1">Ventas</span></a>
	          <a class="dropdown-item" href="rol_pago.php"><i class="fa fa-users" aria-hidden="true"></i><span class="ml-1">Roles de Pago</span></a>
	        </div>
	      </li>
	      <li class="nav-item dropdown" id="reportes">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="fa fa-folder-open-o" aria-hidden="true"></i><span class="ml-1">Reportes</span>
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="graficos.php"><i class="fa fa-line-chart" aria-hidden="true"></i><span class="ml-1">Graficas</span></a>
	          <!-- <a class="dropdown-item" href="#"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span class="ml-1">Ventas</span></a> -->	          
	        </div>
	      </li>
	      <!-- <li class="nav-item" id="reportes">
	        <a class="nav-link" href="#"><i class="fa fa fa-folder-open-o" aria-hidden="true"></i><span class="ml-1">Reportes</span></a>
	      </li> -->
	      <li class="nav-item" id="mensajes">
	        <a class="nav-link" href="mensajes.php"><i class="fa fa-envelope" aria-hidden="true"></i><span class="ml-1">Mensajes</span></a>
	      </li>
	      <li class="nav-item dropdown" id="configuracion">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="fa fa-cogs" aria-hidden="true"></i><span class="ml-1">Configuración</span>
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="empleado.php"><i class="fa fa-wrench" aria-hidden="true"></i><span class="ml-1">Empleado</span></a>
	          <a class="dropdown-item" href="productos.php"><i class="fa fa-wrench" aria-hidden="true"></i><span class="ml-1">Productos</span></a>
	          <a class="dropdown-item" href="promociones.php"><i class="fa fa-wrench" aria-hidden="true"></i><span class="ml-1">Promociones</span></a>
	          <a class="dropdown-item" href="proveedores.php"><i class="fa fa-wrench" aria-hidden="true"></i><span class="ml-1">Proveedores</span></a>
	        </div>
	      </li>
	    </ul>
	    <!-- <form class="form-inline my-2 my-lg-0"> -->
	      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
	      <h6 class="mr-2" style="color:#fed136;">Bienvenido: <?php echo $_SESSION['nombres']; ?></h6>
	      <button class="btn btn-outline-danger my-2 my-sm-0" data-toggle="modal" data-target="#salir">Salir</button>
	    <!-- </form> -->
	  </div>
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
	</nav>