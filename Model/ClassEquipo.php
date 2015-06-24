<?php

include '../Dao/EquipoDao.php';

class Equipo{
    public $id;
    public $tipo;
    public $modelo;
    public $marca;
    public $serial;
    public $problema;
    public $fecha;
    public $activo;
    public $clienteId;
    public $clienteNombre;
    public $equipoId;
    public $infTecnico;
    public $infCliente;
    public $valPre;
    public $extras;
    public $valEx;
    public $total;
    public $status;
}

function incluirEquipo($objEquipo) {
    return insertEquipo($objEquipo);
}

function modificarEquipo($objEquipo){
    return updateEquipo($objEquipo);
}

function  arrayEquipo($objEquipo){
    return getEquipo($objEquipo);
}

function consultarEquipo($objEquipo){
    return equipoBuscar($objEquipo);
}

function buscarEquipo($objEquipo){
    return searchEquipo($objEquipo);
}

function buscarTodo($objEquipo){
    return searchTodo($objEquipo);
}

function clienteNombre(){
    return searchNombre();
}

function desactivarEquipo($objEquipo){
    return disableEquipo($objEquipo);
}

function activarEquipo($objEquipo){
    return enableEquipo($objEquipo);
}

function actualizarPresupuesto($objEquipo){
    return updatePresupuesto($objEquipo);
}

function incluirPresupuesto($objEquipo){
    return insertPresupuesto($objEquipo);
}

function arrayTodo($objEquipo){
    return getAll($objEquipo);
}

function buscarProntos(){
    return getReady();
}

function buscarConfirmados(){
    return getConfirmed();
}

function buscarNorevisados(){
    return getUnrevised();
}

function buscarEntregados(){
    return getDeliver();
}