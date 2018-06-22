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
