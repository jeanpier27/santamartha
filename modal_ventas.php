<div class="modal fade bd-example-modal-lg" id="editar<?php echo $resp['id_factura']; ?>" tabindex="-1" role="dialog" aria-labelledby="editar<?php echo $resp['id_factura']; ?>Label" data-backdrop="static" data-keyboard="false" aria-hidden="true"> 
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  
                </div>
                <div class="modal-body">
                  <iframe src="<?php echo 'factura.php?id_fact='.$resp['id_factura'].''; ?>" width="100%" height="600px" allowfullscreen ></iframe>
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  <!-- <a href="proveedores.php" class="btn btn-danger">Cerrar</a> -->
                 <!--  <button type="submit" class="btn btn-primary" id="edit_provee" name="editar">Editar</button> -->
                </div>
              </div>
            </div>
          </div>
        <!-- </div> -->
<?php 
  if(isset($_POST['editar'])){
    $id=$_POST['id'];
    $ruc=$_POST['ruc'];
    $nombres=$_POST['nombres'];
    $telefono=$_POST['telefono'];
    $direccion=$_POST['direccion'];
    $correo=$_POST['correo'];

    $resp=$conexion->query("update tb_proveedores set cedula_ruc='".$ruc."', nombres='".$nombres."',telefono='".$telefono."',direccion='".$direccion."',correo='".$correo."' where id_proveedores=".$id);
    if($resp){
      echo("<script>swal({
                title: 'Ok?',
                text: 'Proveedor editado con exito :)',
                type: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
                allowOutsideClick:false,
              }).then((result) => {
                if (result.value) {
                  location.href = 'proveedores.php';
                }
              })</script>");
    }else{
      echo("<script>swal({
                title: 'Error?',
                text: 'Ah ocurrido un error :( No se edito',
                type: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
                allowOutsideClick:false,
              }).then((result) => {
                if (result.value) {
                  location.href = 'proveedores.php';
                }
              })</script>");
    }

  }
?>