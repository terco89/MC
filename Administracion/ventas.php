<?php
session_start();
if(!isset($_SESSION['usuario'])) header("Location: login.php");

$view = "ventas";
require_once "views/layout.php";