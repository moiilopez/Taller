<?php

include '../Dao/UsuarioDao.php';

class login{
    private $id;
    public $username;
    public $contrasena;
    public $email;
}

function login ($objUsuario){
    
    if ($objUsuario->username == "taller" & $objUsuario->contrasena == "12345"){
        return TRUE;
    } else { 
        FALSE;
    }
    
    return autenticar($objUsuario);
}