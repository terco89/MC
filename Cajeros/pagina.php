<?php
$serverName="DESKTOP-QB22C4J\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "MC DONALDS BD","CharacterSet"=>"UTF-8"
);

// Establece la conexión.
$conn = sqlsrv_connect($serverName, $connectionOptions);

if($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Conexión exitosa";
}


$query = "SELECT nombre, descripcion FROM Menus";
$result = sqlsrv_query($conn, $query);

if($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

    





?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Productos</title>
    <link rel="stylesheet" href="principal.css">
</head>
<body>
    <div class="menu">
        <h2>Menú de Productos</h2>
        <ol  class="productos">
             <li>
                       <?php while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                       ?> 
                <div class="producto">
                    <h3><?php  echo $row['nombre'];?></h3>
                    <p><?php echo $row['descripcion'];?></p>
                    <div class="cantidad">
                        <button class="restar">-</button>
                        <span class="cantidad-numero">0</span>
                        <button class="agregar">+</button>
                    </div>
                    <button class="agregar-al-pedido">Agregar</button>
                </div>
                <?php }

sqlsrv_free_stmt($result);
                ?>
            </li>
        
        </ol>
    </div>
    <div class="pedido">
        <h2>Tu Pedido</h2>
        
        <ul class="items-pedido"></ul>
        <botton class="guardar">guardar</botton>
        <button class="vaciar-pedido">Vaciar Pedido</button>
    </div>
    <script src="pag.js"></script>
</body>
</html>