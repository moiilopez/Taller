<?php

include '../Model/Usuario.php';

$action = "";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

if ($action == "login"){
    $objUsuario = new Usuario();

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
 } else if ($action == "registrar"){    
    $objUsuario = new Usuario();
    
        $objUsuario->nombre = $_POST["nombre"];
        $objUsuario->username = $_POST["username"];
        $objUsuario->contrasena = $_POST["contrasena"];
    
        $resultadoUsuario = incluirUsuario($objUsuario);

    if ($resultadoUsuario == true) {
        
        $msj = 1;
        header('Location:../View/RegistroUsuario.php?msj='.$msj);      
    } else {
        $msj = 0;
        header('Location:../View/RegistroUsuario.php?msj='.$msj);
    }
 } else if ($action == "editar"){    
    $objUsuario = new Usuario();

        $objUsuario->id = $_POST["id"];
        $objUsuario->nombre = $_POST["nombre"];
        $objUsuario->username = $_POST["username"];
        $objUsuario->contrasena = $_POST["contrasena"];
        $adminUsername = $_POST["adminUsername"];
        $adminContrasena = $_POST["adminContrasena"];
        
        if($adminUsername == 'taller' && $adminContrasena == '12345'){
            $resultadoUsuario = modificarUsuario($objUsuario);
            
            if($resultadoUsuario == TRUE){
                $msj = 40;
                header('Location:UsuarioController.php?action=consultar&usuarioId='.$objUsuario->id);
            }
            else {
                //header('Location:../View/Login.php');   
            }
        }
 } else if ($action == "consultar"){    
    $objUsuario = new Usuario();
    
        $objUsuario->id = $_GET["usuarioId"];
    
        $resultadoUsuario = consultaUsuario($objUsuario);

    if ($resultadoUsuario == true) {
        
        $msj = 1;
        include '../View/EditarUsuarios.php';
    } 
} else if ($action == "buscar"){    
    $objUsuario = new Usuario();
    
        $objUsuario->nombre = $_POST["nombre"];
        $objUsuario->username = $_POST["username"];
    
        $resultadoUsuario = buscarUsuario($objUsuario);

    if ($resultadoUsuario == true) {
        
        $msj = 1;
        include '../View/ListaUsuarios.php';
    } else {
        $msj = 0;
        header('Location:../View/BusquedaUsuario.php?msj='.$msj);
    }
 }