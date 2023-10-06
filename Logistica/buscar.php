<?php 

//Recogemos la cadena
$busqueda=$_POST['cadena'];
//Esto se pega en la div #mostrar
//Mostrar los resultados aquí

if (isset($_POST['cadena'])){
    $sql="SELECT Logistica.*,Proveedores.proveedor  FROM Logistica INNER JOIN Proveedores ON Logistica.id_proveedor=Proveedores.id WHERE nombre LIKE '%$busqueda%' ORDER BY Proveedores.proveedor ASC";
}
else{
 
    $sql="SELECT Logistica.*,Proveedores.proveedor  FROM Logistica INNER JOIN Proveedores ON Logistica.id_proveedor=Proveedores.id";
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar Producto
</button><a style="margin-left: 30px;" class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Proveedores</a>

<button style="margin-left: 30px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal12">
Eliminar Proveedores
</button>



<table class="table table-hover table-sm">
<thead>
    <tr class="bg-success">
<th scope="col"> Id</th>
<th scope="col"> Nombre</th>
<th scope="col">Unidades</th>
<th scope="col">proveedor</th>
<th scope="col">Modificar</th>
    </tr>
</thead>





<tbody>
    <?php 
    require_once"include/config.php";

   

$res= sqlsrv_query($conn , $sql);
if (!$res) {
    die('Error de Consulta: ' . sqlsrv_errors($conn));
}
while ($dou = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) {
    $datos=    $datos=$dou['id']."||".$dou['nombre']."||".$dou['unidad']."||".$dou['proveedor'];
  

?>

<tr>
    <th scope="row"> <?php echo $dou['id'] ;?></th>
    <td > <?php echo $dou['nombre']; ?></td>
<td><?php echo $dou['unidad']; ?></td>
<td><?php echo $dou['proveedor']; ?></td>
<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificar" onclick="datosEditar('<?php echo $datos ?>')" >Modificar</button>
 

    <button type="button" class="btn btn-primary" data-toggle="modal"  onclick="eliminarTipo('<?php echo $dou['id'] ?>')">Eliminar</button></td>
    
</tr>
<?php
}
?>


    

<!-- Modal -->
<div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div  class="modal-content modal-xl">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Proveedores</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>   <div class="modal-footer">
    

      </div>
      <div  class="modal-body">
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
            <label for="message-text" class="col-form-label" >Proveedores</label>
            <select id="proveedor" class="form-select" aria-label="Default select example">
  <option selected>Elimine</option>
  <?php foreach ($dou1 as $dou2) { ?>
            <option value="<?php echo $dou2['id']; ?>"><?php echo $dou2['proveedor']; ?></option>
            <?php } ?>
</select>
          </div>
          <button type="button" class="btn btn-primary " onclick="eliminarproveedor('2')">Eliminar</button>
      </div>
      </div>

    </div>
  </div>
</div>
</tbody>



</table>