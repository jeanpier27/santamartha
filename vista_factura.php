<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
	<?php 
  // require_once('meta.php');
   require_once('conexion.php');?>
   <style type="text/css">
     .centrar{
      display: flex;
      justify-content: center;
     }
   </style>
</head>
<body>
  <div class="row">
    <div class="container">
      <div class="centrar" >
        <img src="img/logo_transparente.png" alt="" style="height: 100px;width: 100px; ">     
      </div>
      <div class="col d-flex justify-content-start">
        <h1>FACTURA N.-</h1>
        
      </div>
      <br>
      <div class="centrar">
            
        <h1>AUTOSERVICIO SANTA MARTHA</h1>
      
      </div>
      <br><br>
      <!-- <div class="row">         -->
        <div class="row" style="border: 1px solid; border-radius: 5px;">
          <div class="col-md-12">
            <h3>Datos de Cliente</h3>
            
          </div>
          <div class="col-md-6">
            <strong>Cedula:</strong>hbsdkjfhbr  <br>
            <strong>Nombres:</strong>  <br>
            <strong>Fecha:</strong> <br>
          </div>
          <div class="col-md-6">
            <strong>Telefono:</strong>hbsdkjfhbr  <br>
            <strong>Direccion:</strong>  <br>
          </div>
        </div>
<br>
        <div class="row" style="border: 1px solid; border-radius: 5px;" >
          <div class="col-md-2"></div>
          <div class="table-response col-md-8">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>N.-</th>
                  <th>Descripcion</th>
                  <th>Cantidad</th>
                  <th>Valor Unitario</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>aceite</td>
                  <td>4</td>
                  <td>$3</td>
                </tr>
              </tbody>
            </table>
            
          </div>
          <div class="col-md-2"></div>
        </div>

        <br>
        <div class="row">
          <div class="col-md-7"></div>
          <div class="col-md-5 d-flex flex-column ">
            <h1>Subtotal:$</h1>
            <h1>Descuento:%</h1>
            <h1>Iva 12%</h1>
            <h1>Total:$</h1>
          </div>
        </div>
      <?php 
        $fact=$conexion->query("select * from tb_factura");
        while($row=mysqli_fetch_array($fact)){
            echo($row['id_factura']);
        }
       ?>
      
    </div>
  </div>
</body>
</html>