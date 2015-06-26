<?php

include_once '../dao/dao.php';

function insertEquipo($objEquipo){
    
    $sqlCommand = 'INSERT INTO equipo (tipo,modelo,marca,serial,problema,fecha,cliente_ID,cliente_Nombre,status)'
            . ' VALUES (:tipo,:modelo,:marca,:serial,:problema,:fecha,:clienteId,:clienteNombre,:status)';
    
    $parameters = array();
    $parameters [':tipo'] = $objEquipo->tipo;
    $parameters [':modelo'] = $objEquipo->modelo;
    $parameters [':marca'] = $objEquipo->marca;
    $parameters [':serial'] = $objEquipo->serial;
    $parameters [':problema'] = $objEquipo->problema;
    $parameters [':fecha'] = $objEquipo->fecha;
    $parameters [':clienteNombre'] = $objEquipo->clienteNombre;
    $parameters [':status'] = $objEquipo->status;
    $parameters [':clienteId'] = $objEquipo->clienteId;
        
    return executeCommand($sqlCommand, $parameters);
}

function updateEquipo($objEquipo){
    $sqlCommand = 'UPDATE equipo SET tipo=:tipo,modelo=:modelo,marca=:marca,problema=:problema,serial=:serial,fecha=:fecha '
            . ' WHERE id=:id';
    
    $parameters = array();
    
    $parameters [':id'] = $objEquipo->id;
    $parameters [':tipo'] = $objEquipo->tipo;
    $parameters [':modelo'] = $objEquipo->modelo;
    $parameters [':marca'] = $objEquipo->marca;
    $parameters [':problema'] = $objEquipo->problema;
    $parameters [':serial'] = $objEquipo->serial;
    $parameters [':fecha'] = $objEquipo->fecha;
    
    return executeCommand($sqlCommand, $parameters);
}

function getEquipo($objEquipo){
    $sqlCommand = 'SELECT id,tipo,modelo,marca,serial,problema,fecha,cliente_ID,cliente_Nombre FROM equipo'
            . ' WHERE id=:id';
    
    $parameters = array();
    
    $parameters [':id'] = $objEquipo->id;
    
    return executeQuery($sqlCommand, $parameters);
}

function equipoBuscar($objEquipo){
    $sqlCommand = 'SELECT id,tipo,modelo,marca,serial,fecha FROM equipo'
            . ' WHERE cliente_ID=:cliente';
    
    $parameters = array();
    
    $parameters [':cliente'] = $objEquipo->cliente;
    
    return executeQuery($sqlCommand, $parameters);
}

function searchEquipo($objEquipo){
    $sqlCommand = 'SELECT id,tipo,modelo,marca,serial,problema,fecha,cliente_ID,cliente_Nombre,activo FROM equipo '
            . ' WHERE id like "%":id"%" && tipo like "%":tipo"%" && modelo like "%":modelo"%" && serial like "%":serial"%" && cliente_Nombre like "%":clienteNombre"%" && activo = 1 ORDER BY tipo';
    
    $parameters = array();
    
    $parameters [':id'] = $objEquipo->id;
    $parameters [':tipo'] = $objEquipo->tipo;
    $parameters [':modelo'] = $objEquipo->modelo;
    $parameters [':serial'] = $objEquipo->serial;
    $parameters [':clienteNombre'] = $objEquipo->clienteNombre;
        
    return executeQuery($sqlCommand, $parameters);
}

function searchTodo($objEquipo){
    $sqlCommand = 'SELECT id,tipo,modelo,marca,serial,problema,fecha,cliente_ID,cliente_Nombre,activo FROM equipo '
            . ' WHERE id like "%":id"%" && tipo like "%":tipo"%" && modelo like "%":modelo"%" && serial like "%":serial"%" && cliente_Nombre like "%":clienteNombre"%" ORDER BY Tipo';
    
    $parameters = array();
    
    $parameters [':id'] = $objEquipo->id;
    $parameters [':tipo'] = $objEquipo->tipo;
    $parameters [':modelo'] = $objEquipo->modelo;
    $parameters [':serial'] = $objEquipo->serial;
    $parameters [':clienteNombre'] = $objEquipo->clienteNombre;
        
    return executeQuery($sqlCommand, $parameters);
}

function searchNombre(){
    $sqlCommand = 'SELECT id,nombre FROM cliente WHERE activo = 1';
    
    return executeQuery($sqlCommand,array());
}

function disableEquipo($objEquipo){
    $sqlCommand = 'UPDATE equipo SET activo = 0 WHERE id=:id';
    
    $parameters = array();
    
    $parameters [':id'] = $objEquipo->id;
    
    return executeCommand($sqlCommand, $parameters);
}

function enableEquipo($objEquipo){
    $sqlCommand = 'UPDATE equipo SET activo = 1 WHERE id=:id';
    
    $parameters = array();
    
    $parameters [':id'] = $objEquipo->id;
    
    return executeCommand($sqlCommand, $parameters);
}

function updatePresupuesto($objEquipo){
    
    $sqlCommand = 'UPDATE presupuesto SET Problem=:problema,InfTecnico=:infTecnico,InfCliente=:infCliente,ValPre=:valPre,Extras=:extras,ValEx=:valEx,Total=:total,Fecha=:fecha,Status=:status '
            . ' WHERE Equipo_Id=:id';
    
    $parameters = array();
    
    $parameters [':problema'] = $objEquipo->problema;
    $parameters [':infTecnico'] = $objEquipo->infTecnico;
    $parameters [':infCliente'] = $objEquipo->infCliente;
    $parameters [':valPre'] = $objEquipo->valPre;
    $parameters [':extras'] = $objEquipo->extras;
    $parameters [':valEx'] = $objEquipo->valEx;
    $parameters [':total'] = $objEquipo->total;
    $parameters [':fecha'] = $objEquipo->fecha;
    $parameters [':status'] = $objEquipo->status;
    $parameters [':id'] = $objEquipo->id;
    
    return executeCommand($sqlCommand, $parameters);
}

function insertPresupuesto($objEquipo){
    
    $sqlCommand = 'INSERT INTO presupuesto (Problem,InfTecnico,InfCliente,ValPre,Extras,ValEx,Total,Fecha,Status,Equipo_Id)'
            . 'VALUES (:problema,:infTecnico,:infCliente,:valPre,:extras,:valEx,:total,:fecha,:status,:id) ';
    
    $parameters = array();
    
    $parameters [':problema'] = $objEquipo->problema;
    $parameters [':infTecnico'] = $objEquipo->infTecnico;
    $parameters [':infCliente'] = $objEquipo->infCliente;
    $parameters [':valPre'] = $objEquipo->valPre;
    $parameters [':extras'] = $objEquipo->extras;
    $parameters [':valEx'] = $objEquipo->valEx;
    $parameters [':total'] = $objEquipo->total;
    $parameters [':fecha'] = $objEquipo->fecha;
    $parameters [':status'] = $objEquipo->status;
    $parameters [':id'] = $objEquipo->id;
    
    return executeCommand($sqlCommand, $parameters);
}

function deliver($objEquipo){
    
    $sqlCommand = 'UPDATE presupuesto SET Status=:status '
            . ' WHERE Equipo_Id=:id';
    
    $parameters = array();
    
    $parameters [':status'] = $objEquipo->status;
    $parameters [':id'] = $objEquipo->id;
    
    return executeCommand($sqlCommand, $parameters);
}

function getAll($objEquipo){
       
    $sqlCommand = 'SELECT equipo.id,tipo,modelo,marca,serial,equipo.fecha,equipo.problema,cliente_ID,cliente_Nombre,activo, presupuesto.*'
                . ' FROM equipo'
                . ' LEFT JOIN presupuesto'
                . ' ON presupuesto.Equipo_Id = equipo.Id'
                . ' WHERE equipo.id=:id';
    
    $parameters = array();
    
    $parameters [':id'] = $objEquipo->id;
    
    return executeQuery($sqlCommand, $parameters);
}

function getReady(){
    
    $sqlCommand = 'SELECT equipo.* '
                . ' FROM equipo'
                . ' LEFT JOIN presupuesto'
                . ' ON presupuesto.Equipo_Id = equipo.Id'
                . ' WHERE status = 3';
    
    return executeQuery($sqlCommand, array());
}

function getConfirmed(){
    
    $sqlCommand = 'SELECT equipo.* '
                . ' FROM equipo'
                . ' LEFT JOIN presupuesto'
                . ' ON presupuesto.Equipo_Id = equipo.Id'
                . ' WHERE status = 2';
    
    return executeQuery($sqlCommand, array());
}

function getBudget(){
    
    $sqlCommand = 'SELECT equipo.*'
                . ' FROM equipo'
                . ' LEFT JOIN presupuesto'
                . ' ON presupuesto.Equipo_Id = equipo.Id'
                . ' WHERE status = 2';
    
    return executeQuery($sqlCommand, array());
}

function getUnrevised(){
    
    $sqlCommand = 'SELECT equipo.*, presupuesto.*, equipo.Fecha'
                . ' FROM equipo'
                . ' LEFT JOIN presupuesto'
                . ' ON presupuesto.Equipo_Id = equipo.Id';
    
    return executeQuery($sqlCommand, array());
}

function getDeliver(){
    
    $sqlCommand = 'SELECT equipo.*'
                . ' FROM equipo'
                . ' LEFT JOIN presupuesto'
                . ' ON presupuesto.Equipo_Id = equipo.Id'
                . ' WHERE status = 5';
    
    return executeQuery($sqlCommand, array());
}

function getHistoric($objEquipo){
    
    $sqlCommand = 'SELECT *'
                . ' FROM presupuesto'
                . ' WHERE equipo_Id = :id';
    
    $parameters = array();
    
    $parameters [':id'] = $objEquipo->id;
    
    return executeQuery($sqlCommand, $parameters);
}