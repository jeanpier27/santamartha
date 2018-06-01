<div class="modal fade" id="editar<?php echo $resp['id_empleado']; ?>" tabindex="-1" role="dialog" aria-labelledby="editar<?php echo $resp['id_empleado']; ?>Label" data-backdrop="static" data-keyboard="false" aria-hidden="true"> 
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Empleado</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" id="editar_proveed" method="post">
                    <div class="form-group">
                      <label for="">Cedula:</label>
                      <input name="id" type="hidden" value="<?php echo $resp['id_empleado'] ?>">
                      <input name="ruc" class="form-control" type="text" required="" minlength="13" value="<?php echo $resp['cedula'] ?>" maxlength="13">
                    </div>
                    <div id="message_cedula"></div>
                    <div class="form-group">
                      <label for="">Nombres:</label>
                      <input name="nombres" class="form-control" type="text" required="" value="<?php echo $resp['nombres'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Cargo:</label>
                      <input name="cargo" class="form-control" type="text" value="<?php echo $resp['cargo'] ?>" required="">
                    </div>
                    <div class="form-group">
                      <label for="">Sueldo:</label>
                      <input name="sueldo" class="form-control" type="text" value="<?php echo $resp['sueldo'] ?>" required="">
                    </div>
                    <div class="form-group">
                      <label for="">Telefono:</label>
                      <input name="telefono" class="form-control numero" type="text" required="" value="<?php echo $resp['telefono'] ?>" maxlength="10">
                    </div>
                    <div class="form-group">
                      <label for="">Direccion:</label>
                      <input name="direccion" class="form-control" type="text" value="<?php echo $resp['direccion'] ?>" required="">
                    </div>
                    <div class="form-group">
                      <label for="">Estado:</label>
                      <select class="form-control" name="estado" id="">
                        <option value="ACTIVO" <?php if($resp['estado']=='ACTIVO'){ echo ('selected');} ?> >ACTIVO</option>
                        <option value="INACTIVO" <?php if($resp['estado']=='INACTIVO'){ echo ('selected');} ?> >INACTIVO</option>
                      </select>
                    </div>
                    <div id="message_edicion"></div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  <!-- <a href="proveedores.php" class="btn btn-danger">Cerrar</a> -->
                  <button type="submit" class="btn btn-primary" id="edit_provee" name="editar">Editar</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
<?php 
  if(isset($_POST['editar'])){
    $id=$_POST['id'];
    $ruc=$_POST['ruc'];
    $nombres=$_POST['nombres'];
    $cargo=$_POST['cargo'];
    $sueldo=$_POST['sueldo'];
    $telefono=$_POST['telefono'];
    $direccion=$_POST['direccion'];
    $estado=$_POST['estado'];

    $resp=$conexion->query("update tb_empleado set cedula='".$ruc."', nombres='".$nombres."',telefono='".$telefono."',direccion='".$direccion."',cargo='".$cargo."',sueldo='".$sueldo."',estado='".$estado."' where id_empleado=".$id);
    if($resp){
      echo("<script>swal({
                title: 'Ok?',
                text: 'Empleado editado con exito :)',
                type: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
                allowOutsideClick:false,
              }).then((result) => {
                if (result.value) {
                  location.href = 'empleado.php';
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
                  location.href = 'empleado.php';
                }
              })</script>");
    }

  }
?>