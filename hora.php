<?php 
	require_once('conexion.php');
	date_default_timezone_set('America/Bogota'); 
	$fecha=$_POST['fecha'];
	for($i=9;$i<=16;$i++){
		$agenda=$conexion->query("select hour(fecha_inicio)as hora from tb_agenda where date(fecha_inicio)='".$fecha."'");
		$band=0;
		while($resp=mysqli_fetch_array($agenda)){

				// echo $resp['hora'].' '.$i;
			if($resp['hora']==$i){
				$band=1;
			}
		}
		if($band==0){
			if($i<12){
				echo '<option value="'.$i.'">'.$i.':00 AM</option>';
			}else{
				echo '<option value="'.$i.'">'.$i.':00 PM</option>';
			}
			
		}


	}


 ?>