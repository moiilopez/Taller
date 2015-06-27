<?php

include_once '../dao/dao.php';

function insertCliente($objCliente){
    
    $sqlCommand = 'INSERT INTO cliente (nombre,telefono,direccion,localidad,fecha,documento,descuentos)'
            . 'VALUES (:nombre,:telefono,:direccion,:localidad,:fecha,:documento,:descuentos)';
    
    $parameters = array();
    $parameters [':nombre'] = $objCliente->nombre;
    $parameters [':telefono'] = $objCliente->telefono;
    $parameters [':direccion'] = $objCliente->direccion;
    $parameters [':localidad'] = $objCliente->localidad;
    $parameters [':fecha'] = $objCliente->fecha;
    $parameters [':documento'] = $objCliente->documento;
    $parameters [':descuentos'] = $objCliente->descuentos;
    
    return executeCommand($sqlCommand, $parameters);
}

function updateCliente($objCliente){
    $sqlCommand = 'UPDATE cliente '
            . 'SET nombre=:nombre,telefono=:telefono,direccion=:direccion,localidad=:localidad,fecha=:fecha,documento=:documento,descuentos=:descuentos '
            . 'WHERE id=:id';
    
    $parameters = array();
    
    $parameters [':id'] = $objCliente->id;
    $parameters [':nombre'] = $objCliente->nombre;
    $parameters [':telefono'] = $objCliente->telefono;
    $parameters [':direccion'] = $objCliente->direccion;
    $parameters [':localidad'] = $objCliente->localidad;
    $parameters [':fecha'] = $objCliente->fecha;
    $parameters [':documento'] = $objCliente->documento;
    $parameters [':descuentos'] = $objCliente->descuentos;
    
    return executeCommand($sqlCommand, $parameters);
}

function getCliente($objCliente){
    $sqlCommand = 'SELECT id,nombre,telefono,direccion,localidad,fecha,documento,descuentos,activo '
            . 'FROM cliente '
            . 'WHERE id=:id';
    
    $parameters = array();
    
    $parameters [':id'] = $objCliente->id;
    
    return executeQuery($sqlCommand, $parameters);
}

function disableCliente($objCliente){
    $sqlCommand = 'UPDATE cliente '
            . 'SET activo = 0 '
            . 'WHERE id=:id';
    
    $parameters = array();
    
    $parameters [':id'] = $objCliente->id;
    
    return executeCommand($sqlCommand, $parameters);
}

function enableCliente($objCliente){
    $sqlCommand = 'UPDATE cliente '
            . 'SET activo = 1 '
            . 'WHERE id=:id';
    
    $parameters = array();
    
    $parameters [':id'] = $objCliente->id;
    
    return executeCommand($sqlCommand, $parameters);
}

function getDesactivados($objCliente) {
    $sqlCommand = 'SELECT id,nombre,telefono,direccion,localidad,fecha,documento,descuentos '
            . 'FROM cliente '
            . 'WHERE activo = 0';

    return executeQuery($sqlCommand, array());
}

function searchCliente($objCliente){
    $sqlCommand = 'SELECT id,nombre,telefono,direccion,localidad,fecha,documento,activo,descuentos '
            . 'FROM cliente '
            . 'WHERE nombre like "%":nombre"%" && id like "%":id"%" && documento like "%":documento"%" && activo = 1 '
            . 'ORDER BY Nombre';
    
    $parameters = array();
    
    $parameters [':nombre'] = $objCliente->nombre;
    $parameters [':id'] = $objCliente->id;
    $parameters [':documento'] = $objCliente->documento;
    
    return executeQuery($sqlCommand, $parameters);
}

function searchAll($objCliente){
    $sqlCommand = 'SELECT id,nombre,telefono,direccion,localidad,fecha,documento,activo,descuentos '
            . 'FROM cliente '
            . 'WHERE nombre like "%":nombre"%" && id like "%":id"%" && documento like "%":documento"%" '
            . 'ORDER BY Nombre';
    
    $parameters = array();
    
    $parameters [':nombre'] = $objCliente->nombre;
    $parameters [':id'] = $objCliente->id;
    $parameters [':documento'] = $objCliente->documento;
    
    return executeQuery($sqlCommand, $parameters);
}