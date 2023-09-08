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

</tbody>






</table>