<div class="modal fade" id="editar_p<?php echo $resp['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="editar_p<?php echo $resp['id_producto']; ?>Label" data-backdrop="static" data-keyboard="false" aria-hidden="true"> 
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>                  
                <form action="" enctype="multipart/form-data" id="editar_proveed" method="post">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="">Categoria</label>
                      <input name="id" type="hidden" value="<?php echo $resp['id_producto'] ?>">
                      <select class="form-control" name="categoria" id="">
                        <?php 
                          $sql=$conexion->query("select * from tb_categoria");
                          while($sql1=mysqli_fetch_array($sql)){
                         ?>
                         
                        <option value="<?php echo $sql1['id_categoria']; ?>" <?php if($sql1['id_categoria']==$resp['id_categoria']){echo "selected";} ?>><?php echo $sql1['categoria']; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Producto</label>
                      <input name="producto" class="form-control" type="text" required="" value="<?php echo $resp['producto'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Imagen</label>
                      <input class="form-control" type="file" name="imagen" >
                    </div>
                    <div class="form-group">
                      <label for="">Precio</label>
                      <input name="precio" class="form-control" type="text" required="" value="<?php echo $resp['pvv'] ?>">
                    </div>
                    
                    <div id="message_edicion"></div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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
    if($_FILES['imagen']['name']==""){
       $id=$_POST['id'];
      $categoria=$_POST['categoria'];
      $producto=$_POST['producto'];
      // $subir=$_FILES['imagen']['name'];
      // $imagen_url='img_products/'.$_FILES['imagen']['tmp_name'];
      $precio=$_POST['precio'];

      $resp=$conexion->query("update tb_producto set id_categoria='".$categoria."', producto='".$producto."',pvv='".$precio."' where id_producto=".$id);
      if($resp){
        // move_uploaded_file($subir, $imagen_url);
        echo("<script>alert('Producto editado con exito');location.href = 'productos.php';</script>");
      }else{
        echo("<script>alert('No se edito producto')</script>");
      }
    }else{
      $id=$_POST['id'];
      $categoria=$_POST['categoria'];
      $producto=$_POST['producto'];
      $subir=$_FILES['imagen']['tmp_name'];
      $imagen_url='img_products/'.$_FILES['imagen']['name'];
      $precio=$_POST['precio'];

      $resp=$conexion->query("update tb_producto set id_categoria='".$categoria."', producto='".$producto."',imagen='".$imagen_url."',pvv='".$precio."' where id_producto=".$id);
      if($resp){
        move_uploaded_file($subir, $imagen_url);
        echo("<script>alert('Producto editado con exito');location.href = 'productos.php';</script>");
      }else{
        echo("<script>alert('No se edito producto')</script>");
      }

    }

  }
?>