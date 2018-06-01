<?php 
session_start();
if(isset($_SESSION['nombres'])){
header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">	
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/logo.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script> -->
  <script  src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/estilos.css" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
	<title>Login</title>
	<style>
		h1{
			font-family: 'Slabo 27px', serif;
		}
		body{
			background:url('img/fondo_login.jpg') no-repeat  center center fixed; 
			width: 100%; height: 100vh;
		}
		.contenedor{
			/*border: 1px solid;*/
			height: 100vh;
			padding-top: 15%;

		}

		.cont{
			border: 1px solid;
			padding: 10px;
			-webkit-box-shadow: -1px -2px 20px 10px rgba(0,0,0,1);
			-moz-box-shadow: -1px -2px 20px 10px rgba(0,0,0,1);
			box-shadow: -1px -2px 20px 10px rgba(0,0,0,1);

			border-radius: 32px 32px 32px 32px;
			-moz-border-radius: 32px 32px 32px 32px;
			-webkit-border-radius: 32px 32px 32px 32px;
			border: 0px solid #000000;	
		}

		.flat{
			margin-bottom: 25px;
			/*border:none;*/
			/*border-radius: 0;*/
			/*border-bottom:1px solid #009432;*/
			/*-webkit-transition: all 0.5s;
			transition: all 0.5s;
			background: -webkit-linear-gradient(top,rgba(255,255,255,0) 96%, #009432 4%);
			background: linear-gradient(to botton,rgba(255,255,255,0) 96%, #009432 4%);
			background-position: -500px;
			background-size: 100% 100%;
			background-repeat: no-repeat;*/
		}


		
	</style>
</head>

<body >
	<div class="container contenedor" >
		<div class="row d-flex justify-content-center">
			<div class="col-md-4 cont">
				<form action="" id="formulario" style="padding: 10px;">
					<h1 class="text-center" style="color:#fff;">INGRESO</h1>					
					<div class="form-group">
						<input class="form-control flat" id="usua" type="text" placeholder="usuario*" required="">
					</div>		
					<div class="form-group">
						<input class="form-control flat" id="contra" type="password" placeholder="contraseña*" required="">
					</div>		
					<div class="form-group">
						<button class="btn btn-success btn-block" id="ingresar">Ingresar</button>
					</div>	
					<div id="message"></div>
				</form>
			</div>
		</div>
	</div>

	<script src="js/login.js"></script>
	
</body>
</html>