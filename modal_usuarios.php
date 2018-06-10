<div class="modal fade" id="editar<?php echo $resp['id_usuarios']; ?>" tabindex="-1" role="dialog" aria-labelledby="editar<?php echo $resp['id_usuarios']; ?>Label" data-backdrop="static" data-keyboard="false" aria-hidden="true"> 
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" id="editar_proveed" method="post">
                    <input name="id" type="hidden" value="<?php echo $resp['id_usuarios']; ?>" >
                    <!-- <div id="message_cedula"></div> -->
                    <!-- <div class="form-group">
                      <label for="">Nombres:</label>
                      <input name="nombres" class="form-control" type="text" required="" value="<?php echo $resp['nombress'] ?>">
                    </div> -->
                    <!-- <div class="form-group">
                      <label for="">Cargo:</label>
                      <input name="cargo" class="form-control" type="text" value="<?php echo $resp['cargos'] ?>" required="">
                    </div> -->
                    <div class="form-group">
                      <label for="">Usuario:</label>
                      <input name="usuario" class="form-control" type="text" value="<?php echo $resp['usuario'] ?>" required="">
                    </div>
                    <div class="form-group">
                      <label for="">Contraseña:</label>
                      <input name="contra" class="form-control numero" type="password" required="" value="<?php echo $resp['password'] ?>" maxlength="10">
                    </div>
                    <div class="form-group">
                      <label for="">Acceso:</label>
                      <select class="form-control" name="acceso" id="">
                        <option value="ADMINISTRADOR" <?php if($resp['acceso']=='ADMINISTRADOR'){ echo ('selected');} ?> >ADMINISTRADOR</option>
                        <option value="EMPLEADO" <?php if($resp['acceso']=='EMPLEADO'){ echo ('selected');} ?> >EMPLEADO</option>
                      </select>
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
    $usuario=$_POST['usuario'];
    $contra=$_POST['contra'];
    $acceso=$_POST['acceso'];
    $estado=$_POST['estado'];

    $resp=$conexion->query("update tb_usuarios set usuario='".$usuario."', password='".$contra."',acceso='".$acceso."',estado='".$estado."' where id_usuarios=".$id);
    if($resp){
      echo("<script>swal({
                title: 'Ok?',
                text: 'Usuario editado con exito :)',
                type: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
                allowOutsideClick:false,
              }).then((result) => {
                if (result.value) {
                  location.href = 'usuarios.php';
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
                  location.href = 'usuarios.php';
                }
              })</script>");
    }

  }
?>