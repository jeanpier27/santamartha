<div class="modal fade " id="anular<?php echo $resp['id_factura']; ?>" tabindex="-1" role="dialog" aria-labelledby="anular<?php echo $resp['id_factura']; ?>Label" data-backdrop="static" data-keyboard="false" aria-hidden="true"> 
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <!-- <div class="modal-header">

                </div> -->
                <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $resp['id_factura']; ?>">
                <div class="modal-body">
                  <h1>Esta seguro de anular la Factura N.-<?php echo $resp['numero_fact']; ?></h1>
                  
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  <input type="submit" name="anular" value="Aceptar" class="btn btn-success">
                  <!-- <a href="proveedores.php" class="btn btn-danger">Cerrar</a> -->
                 <!--  <button type="submit" class="btn btn-primary" id="edit_provee" name="editar">Editar</button> -->
                </div>
                </form>
              </div>
            </div>
          </div>
        <!-- </div> -->
<?php 
  if(isset($_POST['anular'])){
    $id=$_POST['id'];

    $resp=$conexion->query("update tb_factura set estado='ANULADO' where id_factura=".$id);
    if($resp){
      echo("<script>swal({
                title: 'Ok?',
                text: 'Factura anulada con exito :)',
                type: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
                allowOutsideClick:false,
              }).then((result) => {
                if (result.value) {
                  location.href = 'reporte_ventas.php';
                }
              })</script>");
      exit();
    }else{
      echo("<script>swal({
                title: 'Error?',
                text: 'Ah ocurrido un error :( No se anulo factura',
                type: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
                allowOutsideClick:false,
              }).then((result) => {
                if (result.value) {
                  location.href = 'reporte_ventas.php';
                }
              })</script>");
      exit();
    }

  }
?>