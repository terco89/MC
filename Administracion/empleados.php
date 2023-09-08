<?php
session_start();
if(!isset($_SESSION['usuario'])) header("Location: login.php");
require_once "includes/config.php";

if(isset($_POST["pid"]) && isset($_POST["pnom"]) && isset($_POST["pcar"]) && isset($_POST["pdni"]) && isset($_POST["psal"])){
    $sql = "UPDATE empleados SET nombre_completo = '".$_POST["pnom"]."', dni = ".$_POST["pdni"].", salario = ".$_POST["psal"].", id_rol = ".$_POST["pcar"]." WHERE id = ".$_POST["pid"];
    $query = sqlsrv_query($conn, $sql);
    if($query){
        echo "exito";
    }
    else{
        echo sqlsrv_errors();
    }
}

if(isset($_POST["pid"])){
    $sql = "DELETE FROM empleados WHERE id = ".$_POST["pid"];
    $query = sqlsrv_query($conn, $sql);
    if($query){
        echo "exito";
    }
    else{
        echo sqlsrv_errors();
    }
}

$sql = "SELECT empleados.id as id,nombre_completo,dni,salario,rol,id_rol FROM empleados INNER JOIN roles ON empleados.id_rol = roles.id";
$query = sqlsrv_query($conn, $sql);

$empleados = array();

while( $row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC) ) {
    $empleados[] = $row;
}

$view = "empleados";
require_once "views/layout.php";