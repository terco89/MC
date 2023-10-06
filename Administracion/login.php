<?php
session_start();
if(isset($_SESSION['usuario'])) header("Location: index.php");
if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
    require_once "includes/config.php";
    $sql = "SELECT Empleados.id AS id,nombre_completo,password FROM acceso INNER JOIN empleados ON acceso.id_empleado = empleados.id WHERE nombre_completo = '".$_POST["usuario"]."' AND password = HashBytes('MD5','".$_POST["contraseña"]."')";
    $query = sqlsrv_query($conn,$sql);
    
    if($query){
        $_SESSION['usuario'] = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
        header("Location: index.php");
    }
        else{
            print_r(sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC));
            //print_r(sqlsrv_errors());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-image: url(img/fondo_login.jpg);">
    <div style="text-align:center; margin-top:15%; height:60%; border:1px solid; width:60%; margin-left:20%; background-color:orange">
        <h1>Iniciar sesión</h1>
        <form action="" method="POST">
        <p>Usuario</p>
        <input type="text" name="usuario">
        <br>
        <p>Contraseña</p>
        <input type="password" name= "contraseña">
        <br>
        <br>
        <br>
        <button type="submit" style="background-color:red; width:120px; height:40px; cursor: pointer;">Iniciar</button>
        <br>
        <br>
        <br>
        </form>
    </div>
</body>
</html>