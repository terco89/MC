<?php
$serverName = "DESKTOP-QB22C4J\SQLEXPRESS"; //serverName\instanceName, portNumber (default is 1433)
$connectionInfo = array( "Database"=>"MC DONALDS BD", "Uid"=>"sa", "PWD"=>"123", "CharacterSet"=>"UTF-8");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}