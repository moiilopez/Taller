<?php

include_once '../dao/dao.php';

function autenticar($objUsuario){
    
    $sqlCommand = 'SELECT * FROM usuario WHERE username = :username && contrasena = :contrasena ';
    
    $parameters = array();
    
    $parameters [':username'] = $objUsuario->username;
    $parameters [':contrasena'] = $objUsuario->contrasena;
    $parameters [':email'] = $objUsuario->email;
    
    return executeQuery($sqlCommand, $parameters);
    
}
