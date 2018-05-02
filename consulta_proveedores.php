<?php 
require_once('conexion.php');
        $mens=$conexion->query('select * from tb_proveedores ');
        $rows=array();
            while($resp=mysqli_fetch_array($mens)){
            		$rows[]=$resp;
                }
            echo json_encode($rows);
?>