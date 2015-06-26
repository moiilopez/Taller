<?php

include '../Model/Usuario.php';

$objUsuario = new login();

    $objUsuario->username = $_POST["nombre"];
    $objUsuario->contrasena = $_POST["contrasena"];

    session_start();
    
    $_SESSION["autenticar"] = login($objUsuario);

    if($_SESSION["autenticar"] == TRUE)
    {
        header('Location:../View/Index.php');
    }
    else {
        header('Location:../View/Login.php');   
    }