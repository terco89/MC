<?php 
$serverName = "DESKTOP-QB22C4J\SQLEXPRESS"; 
$connectionOptions = array(
    "Database" => 'MC DONALDS BD',
    "Uid" => 'sa',              
    "PWD" => '123'                   
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die("Error de conexión: " . sqlsrv_errors());
}

