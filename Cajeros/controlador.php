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
$elementos = explode("/&",$_POST["nose"]);
$nombres = array();
$cantidades = array();
$precio = 0;
$detalle = "";
for($i = 0; $i < $elementos;$i++){
    $nombres[] = explode(":",$elementos[$i])[0];
    $cantidades[] = explode(":",$elementos[$i])[1];
    $precio += 7000*$cantidades[count($cantidades)-1];
    $detalle .= $elementos[$i] ." - ";
}

$sql = "INSERT INTO Pedidos(detalle,precio) VALUES($detalle,$precio)";
$query = sqlsrv_query($conn,$sql);
header("Location: pagina.php");