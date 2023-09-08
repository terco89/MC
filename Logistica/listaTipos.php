<div class="form-group">
            <label for="message-text" class="col-form-label" >Curso</label>
            <select class="form-select" id="curso" aria-label="Default select example" onchange="actualizar($(this).val())">
                

            <option value="" selected>Seleccione curso</option>

            <?php require_once "include/config.php";


$sql="SELECT * FROM Logistica";
$res=sqlsrv_query($conn,$sql);
if (!$res) {
    die("Error de conexión: " . sqlsrv_errors());
}

while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
  echo "<option value='".$row['id']."'>".$row['nombre']."</option>";


  }

         ?>
</select>
          </div>