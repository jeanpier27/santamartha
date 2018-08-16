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
                      <label for="">Empleado:</label>
                      <input name="id_faltas" type="hidden" value="<?php echo $resp['id_faltas'] ?>">
                      <select class="form-control" name="" id="" disable>
                      <?php 
                        require_once('conexion.php');
                        $empleados=$conexion->query("select * from tb_empleado order by nombres");
                        while($res=mysqli_fetch_array($empleados)){                        
                      ?>
                      <option value="<?php echo $res['id_empleado']; ?>" <?php if($res['id_empleado']==$resp['id_empleado']){echo 'selected';} ?>><?php echo $res['nombres']; ?></option>
                      <?php
                        }
                      ?>
                      </select>
                    </div>
                    <div id="message_cedula"></div>
                    <div class="form-group">
                      <label for="">Fecha:</label>
                      <input name="fecha" class="form-control" type="date" required="" value="<?php echo $resp['fecha'] ?>">
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
    $id=$_POST['id_faltas'];
    $fecha=$_POST['fecha'];

    $resp=$conexion->query("update tb_faltas set fecha='".$fecha."' where id_faltas=".$id);
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
                  location.href = 'faltas.php';
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
                  location.href = 'faltas.php';
                }
              })</script>");
    }

  }
?>