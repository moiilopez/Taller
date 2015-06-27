<?php

include_once '../dao/dao.php';

function autenticar($objUsuario){
    
    $sqlCommand = 'SELECT * '
            . 'FROM usuario '
            . 'WHERE username = :username && contrasena = :contrasena ';
    
    $parameters = array();
    
    $parameters [':username'] = $objUsuario->username;
    $parameters [':contrasena'] = $objUsuario->contrasena;
    
    return executeQuery($sqlCommand, $parameters);
}

function insertUsuario($objUsuario){
    
    $sqlCommand = 'INSERT INTO usuario (Nombre,Username,Contrasena) '
            . 'VALUES (:nombre,:username,:contrasena)';
    
    $parameters = array();
    
    $parameters [':nombre'] = $objUsuario->nombre;
    $parameters [':username'] = $objUsuario->username;
    $parameters [':contrasena'] = $objUsuario->contrasena;
    
    return executeCommand($sqlCommand, $parameters);  
}

function searchUsuario($objUsuario){
    
    $sqlCommand = 'SELECT Id,Nombre,Username '
            . 'FROM usuario '
            . 'WHERE Nombre like "%":nombre"%" && Username like "%":username"%" '
            . 'ORDER BY Nombre';
    
    $parameters = array();
    
    $parameters [':nombre'] = $objUsuario->nombre;
    $parameters [':username'] = $objUsuario->username;
    
    return executeQuery($sqlCommand, $parameters);  
}

function getUsuario($objUsuario){
    
    $sqlCommand = 'SELECT * '
            . 'FROM usuario '
            . 'WHERE Id = :id ';
    
    $parameters = array();
    
    $parameters [':id'] = $objUsuario->id;
    
    
    return executeQuery($sqlCommand, $parameters);  
}

function updateUsuario($objUsuario){
    
    $sqlCommand = 'UPDATE usuario '
            . 'SET Nombre=:nombre,Username=:username,Contrasena=:contrasena '
            . 'WHERE Id = :id ';
    
    $parameters = array();
    
    $parameters [':id'] = $objUsuario->id;
    $parameters [':nombre'] = $objUsuario->nombre;
    $parameters [':username'] = $objUsuario->username;
    $parameters [':contrasena'] = $objUsuario->contrasena;
    
    
    return executeCommand($sqlCommand, $parameters);  
}