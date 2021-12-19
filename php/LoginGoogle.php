<?php
session_start();
$_SESSION["correo"] = $_POST['correo'];
$_SESSION["imagen"] = $_POST['imagen'];
$_SESSION["nombre"] = $_POST['nonbre'];
$_SESSION["tipo"] = 'alu';
?>