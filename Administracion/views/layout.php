<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="container-fluid" style="padding-left:0;">
    <?php
    session_start();
    //if(!isset($_SESSION["usuario"])) header("Location: login.php");
    ?>
    <div class="row">
    <?php require_once "views/navbar.php";?>
    </div>
    <div class="row">
    <div class="col-2">
    <?php require_once "views/aside.php";?>
    </div>
    <div class="col-10">
    <?php require_once $view.".php"; ?>
    </div>
    </div>
    <!--
    .Debe poder generar un informe de ventas
    .Debe poder tener su propia cuenta
    .Debe poder insertar nuevos empleados, eliminarlos, editar sus datos, subirles de puesto
    .Debe poder adminsitrar los horarios de los empleados
    -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>