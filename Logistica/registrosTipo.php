<?php require_once"include/config.php";

$op=$_POST['operacion'];
switch($op){
    case 1://ingresar
        $sql=$_POST['sql'];
        echo sqlsrv_query($conn,$sql);
        break;
        case 2://modificar
            $sql=$_POST['sql'];
            echo sqlsrv_query($conn,$sql);
            break;
            case 3://eliminar
                $sql=$_POST['sql'];
                echo sqlsrv_query($conn,$sql);
                break;
}

?>