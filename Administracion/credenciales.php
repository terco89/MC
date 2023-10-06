<?php
session_start();
if (!isset($_SESSION['usuario']))
    header("Location: login.php");
require_once "includes/config.php";

$may = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
$min = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
$esp = array('!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+','¡','?','¿','\'','"','¨','\\','~','.',',',';',':','`','{','}','[',']','´','°','|','¬');
$num = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

$d = 2;

function cumple($contra, $may, $min, $esp, $num)
{
    $o = 0;
    for ($i = 0; $i < count($may); $i++) {
        if (count(explode($may[$i], $contra)) > 1) {
            $o++;
            break;
        }
    }
    for ($i = 0; $i < count($min); $i++) {
        if (count(explode($min[$i], $contra)) > 1) {
            $o++;
            break;
        }
    }
    for ($i = 0; $i < count($esp); $i++) {
        if (count(explode($esp[$i], $contra)) > 1) {
            $o++;
            break;
        }
    }
    for ($i = 0; $i < count($num); $i++) {
        if (count(explode($num[$i], $contra)) > 1) {
            $o++;
            break;
        }
    }
    if ($o == 4) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST["id"]) && isset($_POST["actual"]) && isset($_POST["nueva"])) {
    $_POST["id"] = intval($_POST["id"]);
        $sql = "SELECT id_empleado FROM Acceso WHERE password = HASHBYTES('md5','" . $_POST["actual"] . "')";
        $query = sqlsrv_query($conn, $sql);
        $arr1 = sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC);
        $sql1 = "SELECT id FROM Empleados WHERE id = " . $_POST['id'];
        $query1 = sqlsrv_query($conn, $sql1);
        $arr2 = sqlsrv_fetch_array($query1,SQLSRV_FETCH_ASSOC);
        if (count($arr1) == 1 && count($arr2) == 1 && cumple($_POST["nueva"], $may, $min, $esp, $num) && strlen($_POST["nueva"]) >= 8 && strlen($_POST["nueva"]) <= 64) {
            $sql = "UPDATE Acceso SET id_empleado = " . $_POST['id'] . ", password = HASHBYTES('md5','" . $_POST['nueva'] . "')";
            $query = sqlsrv_query($conn, $sql);
            if ($query) {
                echo "exito";
            } else {
                echo sqlsrv_errors();
            }
        }
}
else{
$sql = "SELECT id,nombre_completo FROM Empleados";
$query = sqlsrv_query($conn, $sql);
$ventas = array();
while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
    $ventas[] = $row;
}
$view = "credenciales";
require_once "views/layout.php";
}