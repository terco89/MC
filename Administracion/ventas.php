<?php
session_start();
if(!isset($_SESSION['usuario'])) header("Location: login.php");
require_once "includes/config.php";
$sql = "SELECT venta,fecha FROM Ventas WHERE fecha LIKE '".date('Y-m')."%'";
$query = sqlsrv_query($conn,$sql);
$ventas = array();
while( $row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC) ) {
    $row["fecha"] = json_encode($row["fecha"]);
    $row["fecha"] = json_decode($row["fecha"],true);
    $ventas[] = $row;
}
for($i = 0; $i < count($ventas); $i++){
    for($j = 0; $j < count($ventas)-1; $j++){
        if(intval(str_split($ventas[$j+1]["fecha"]["date"],2)[4]) > intval(str_split($ventas[$j]["fecha"]["date"],2)[4])){
            $temp = $ventas[$j];
            $ventas[$j] = $ventas[$j+1];
            $ventas[$j+1] = $temp;
        }
    }
}
$view = "ventas";
require_once "views/layout.php";