


<form action="" >
<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="modificar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" id="txtIdTipo">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre</label>
            <input type="text" class="form-control" name="nombrem" id="txtTipoM">
          </div>
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Unidad</label>
            <input type="text" class="form-control" name="unidadM" id="unidadM">
          </div>
            <?php
            require_once "include/config.php";
          $sql= "SELECT * FROM Proveedores ORDER BY proveedor ASC";
$res= sqlsrv_query($conn , $sql);
if (!$res) {
  die("Error de conexión: " . sqlsrv_errors());
}
$dou = array();

while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
  $dou1[] = $row;
}


  ?>
    
    <div class="form-group">
            <label for="message-text" class="col-form-label" >Curso</label>
            <select id="cursoM" class="form-select" aria-label="Default select example">
  <option selected>Seleccione nuevo curso</option>
  <?php foreach ($dou1 as $dou2) { ?>
            <option value="<?php echo $dou2['id']; ?>"><?php echo $dou2['proveedor']; ?></option>
            <?php } ?>
</select>
          </div>

      </div>
      <div class="modal-footer">
      <div class="d-grid gap-2">
            <button class="btn btn-dark"  onclick="modificarTipo()" >Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>
</div>
</form>

<form action="">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="txtTipo">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label" >unidad</label>
            <input type="text" class="form-control" name="unidad" id="unidad">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label" >Curso</label>
            <select class="form-select" id="curso1" aria-label="Default select example">
           <?php foreach ($dou1 as $dou2) { ?>
            <option value="<?php echo $dou2['id']; ?>"><?php echo $dou2['proveedor']; ?></option>
            <?php } ?>
</select>
          </div>
      
      <div class="modal-footer">
      <div class="d-grid gap-2">
            <button class="btn btn-dark" onclick="guardarTipo()">Enviar Datos</button>
        </div>
      </div>
    </div>
  </div>
</div>
</form>


