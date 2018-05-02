<div class="modal fade" id="editar_p<?php echo $resp['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="editar_p<?php echo $resp['id_producto']; ?>Label" data-backdrop="static" data-keyboard="false" aria-hidden="true"> 
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" id="editar_proveed" method="post">
                    <div class="form-group">
                      <label for="">Categoria</label>
                      <input name="id" type="hidden" value="<?php echo $resp['id_producto'] ?>">
                      <input name="categoria" class="form-control" type="text" required="" value="<?php echo $resp['categoria'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Producto</label>
                      <input name="producto" class="form-control" type="text" required="" value="<?php echo $resp['producto'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Imagen</label>
                      <input class="form-control" type="file" value="<?php echo $resp['imagen'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Precio</label>
                      <input name="precio" class="form-control" type="text" required="" value="<?php echo $resp['pvv'] ?>">
                    </div>
                    
                    <div id="message_edicion"></div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <!-- <a href="proveedores.php" class="btn btn-danger">Cerrar</a> -->
                  <button type="submit" class="btn btn-primary" id="edit_provee" name="editar_p">Editar</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
<?php 
  if(isset($_POST['editar_p'])){
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