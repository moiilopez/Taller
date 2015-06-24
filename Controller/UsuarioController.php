<?php

include '../Model/Usuario.php';

$usuario = $_POST["nombre"];
$contrasena = $_POST["contrasena"];

session_start();
$_SESSION["autenticar"] = autenticar($usuario,$contrasena);

if($_SESSION["autenticar"] == TRUE)
{
       header('Location:../View/Index.php');
}
else {
    header('Location:../View/Login.php');   
    }