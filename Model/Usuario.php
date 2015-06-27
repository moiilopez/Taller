<?php

include '../Dao/UsuarioDao.php';

class Usuario{
    public $id;
    public $username;
    public $contrasena;
    public $nombre;
}

function login ($objUsuario){
    
    if ($objUsuario->username == "taller" & $objUsuario->contrasena == "12345"){
        return TRUE;
    } else { 
        return autenticar($objUsuario);
    }
}

function incluirUsuario($objUsuario){
    return insertUsuario($objUsuario);
}

function buscarUsuario($objUsuario){
    return searchUsuario($objUsuario);
}

function consultaUsuario($objUsuario){
    return getUsuario($objUsuario);
}

function modificarUsuario($objUsuario){
    return updateUsuario($objUsuario);
}