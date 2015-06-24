<?php

include '../Dao/ClienteDao.php';

class Cliente{
    
    public $id;
    public $nombre;
    public $telefono;
    public $direccion;
    public $localidad;
    public $fecha;
    public $documento;
    public $descuentos;
    public $activo;
}

function incluirCliente($objCliente) {
    return insertCliente($objCliente);
}

function modificarCliente($objCliente){
    return updateCliente($objCliente);
}

function consultarCliente($objCliente){
    return getCliente($objCliente);
}

function desactivarCliente($objCliente){
    return disableCliente($objCliente);
}

function activarCliente($objCliente){
    return enableCliente($objCliente);
}

function listarDesactivados(){
    return getDesactivados();
}

function buscarCliente($objCliente){
    return searchCliente($objCliente);
}

function buscarTodos($objCliente){
    return searchAll($objCliente);
}