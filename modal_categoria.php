<div class="modal fade" id="editar_c<?php echo $resp['id_categoria']; ?>" tabindex="-1" role="dialog" aria-labelledby="editar_c<?php echo $resp['id_categoria']; ?>Label" data-backdrop="static" data-keyboard="false" aria-hidden="true"> 
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
                      <input name="id" type="hidden" value="<?php echo $resp['id_categoria'] ?>">
                      <input name="categoria" class="form-control" type="text" required="" " value="<?php echo $resp['categoria'] ?>">
                    </div>
                    
                    <div id="message_edicion"></div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  <!-- <a href="proveedores.php" class="btn btn-danger">Cerrar</a> -->
                  <button type="submit" class="btn btn-primary" id="edit_provee" name="editar_c">Editar</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
<?php 
  if(isset($_POST['editar_c'])){
    $id=$_POST['id'];
    $ruc=$_POST['categoria'];

    $resp=$conexion->query("update tb_categoria set categoria='".$ruc."' where id_categoria=".$id);
    if($resp){
      echo("<script>alert('Categoria editada con exito');location.href = 'productos.php';</script>");
    }else{
      echo("<script>alert('No se edito categoria')</script>");
    }

  }
?>