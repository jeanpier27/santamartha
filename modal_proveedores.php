<div class="modal fade" id="editar<?php echo $resp['id_proveedores']; ?>" tabindex="-1" role="dialog" aria-labelledby="editar<?php echo $resp['id_proveedores']; ?>Label" data-backdrop="static" data-keyboard="false" aria-hidden="true"> 
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" id="editar_proveed" method="post">
                    <div class="form-group">
                      <label for="">RUC:</label>
                      <input name="id" type="hidden" value="<?php echo $resp['id_proveedores'] ?>">
                      <input name="ruc" class="form-control" type="text" required="" minlength="13" value="<?php echo $resp['cedula_ruc'] ?>" maxlength="13">
                    </div>
                    <div id="message_cedula"></div>
                    <div class="form-group">
                      <label for="">Nombres:</label>
                      <input name="nombres" class="form-control" type="text" required="" value="<?php echo $resp['nombres'] ?>">
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
                      <label for="">Correo:</label>
                      <input name="correo" class="form-control" type="email" value="<?php echo $resp['correo'] ?>" required="">
                    </div>
                    <div id="message_edicion"></div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
    $telefono=$_POST['telefono'];
    $direccion=$_POST['direccion'];
    $correo=$_POST['correo'];

    $resp=$conexion->query("update tb_proveedores set cedula_ruc='".$ruc."', nombres='".$nombres."',telefono='".$telefono."',direccion='".$direccion."',correo='".$correo."' where id_proveedores=".$id);
    if($resp){
      echo("<script>alert('Feriado editado con exito');location.href = 'proveedores.php';</script>");
    }else{
      echo("<script>alert('No se edito feriado')</script>");
    }

  }
?>