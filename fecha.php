 <?php 
        date_default_timezone_set('America/Bogota'); 
        $fecha=date("Y-m-d");
        require_once('conexion.php');
        // $resp_agenda=mysqli_fetch_array($agenda);
        $n_fecha=$fecha;
        ?>
        <?php 
        echo '<option value="no">Seleccione...</option>';
        for($i=0;$i<7;$i++){
          $band=0;
          $agenda=$conexion->query("select fecha_inicio from tb_agenda where date(fecha_inicio)='".$n_fecha."'");
          $rowcount=mysqli_num_rows($agenda);
          if($rowcount<8){
          	echo '<option value="'.$n_fecha.'">'.$n_fecha.'</option>';
       ?>
       
      <?php   
          }                              
          $n_fecha=strtotime ( '+1 day' , strtotime ( $n_fecha ) ) ;
          $n_fecha = date ( 'Y-m-d' , $n_fecha );
          
           
        }

?>