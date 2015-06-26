<?php

include '../Model/ClassEquipo.php';

$action = "";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

if($action == "registrar"){
    $objEquipo = new Equipo();
    
        $objEquipo->tipo = $_POST["tipo"];
        $objEquipo->modelo = $_POST["modelo"];
        $objEquipo->marca = $_POST["marca"];
        $objEquipo->serial = $_POST["serial"];
        $objEquipo->problema = $_POST["serial"];
        $objEquipo->fecha = $_POST["fecha"];
        
        $objEquipo->clienteId = $_POST["clienteId"];
        
        $nombre = clienteNombre();
        $name = 0;
        foreach ($nombre as $nom){
            if($nom['id'] == $objEquipo->clienteId){
                $name = $nom['nombre'];
            }
        }
        $objEquipo->clienteNombre = $name;
        
        if($objEquipo->clienteId != "cliente"){

            $resultado = incluirEquipo($objEquipo);

            if ($resultado == true) {
                
                $msj = 1;
                header('Location:../View/RegistroEquipo.php?msj='.$msj);
            } else {
                $msj = 0;
                header('Location:../View/RegistroEquipo.php?msj='.$msj);
            }
        }  else {
            $msj = 2;
            header('Location:../View/RegistroEquipo.php?msj='.$msj);
        }
}elseif ($action == "editar") {
    $objEquipo = new Equipo();
    
        $objEquipo->id = $_POST["hiddenId"];
        $objEquipo->tipo = $_POST["tipo"];
        $objEquipo->modelo = $_POST["modelo"];
        $objEquipo->marca = $_POST["marca"];
        $objEquipo->problema = $_POST["problema"];
        $objEquipo->serial = $_POST["serial"];
        $objEquipo->fecha = $_POST["fecha"];
        
        $resultadoEquipo = modificarEquipo($objEquipo);
        
    if($resultadoEquipo == TRUE){
        $msj = 11;
        header('Location:EquipoController.php?equipoId='.$objEquipo->id.'&action=consultar&msj='.$msj);
    }  else {
        $msj = 10;
        header('Location:EquipoController.php?equipoId='.$objEquipo->id.'&action=consultar&msj='.$msj);
    }
}elseif ($action == "consultar") {
    
    $objEquipo = new Equipo();
    
        $objEquipo->id = $_GET['equipoId'];
        
        $resultadoEquipo = arrayEquipo($objEquipo);
        
    if($resultadoEquipo == TRUE){
        include '../View/EditarEquipos.php';
    }  else {
        echo'<link rel="stylesheet" type="text/css" href="../view/Css/All.css"/>';
        echo 'Problem';
    }
}elseif ($action == "Desactivar") {
    
    $objEquipo = new Equipo();
    
        $objEquipo->id = $_GET['equipoId'];

        $resultadoEquipo = desactivarEquipo($objEquipo);
        
    if($resultadoEquipo == TRUE){
        $msj = 21;
        header('Location:../view/equipo.php?equipoId='.$objEquipo->id.'&msj='.$msj);
    }  else {
        $msj = 20;
        header('Location:../view/equipo.php?equipoId='.$objEquipo->id.'&msj='.$msj);
    }
}elseif ($action == "Activar") {
    
    $objEquipo = new Equipo();
    
        $objEquipo->id = $_GET['equipoId'];

        $resultadoEquipo = activarEquipo($objEquipo);
        
    if($resultadoEquipo == TRUE){
        $msj = 31;
        header('Location:../view/equipo.php?equipoId='.$objEquipo->id.'&msj='.$msj);
    }  else {
        $msj = 30;
        header('Location:../view/equipo.php?equipoId='.$objEquipo->id.'&msj='.$msj);
    }
}elseif ($action == "buscar") {
    
    $objEquipo = new Equipo();
    
        $objEquipo->id = $_POST['id'];
        $objEquipo->tipo = $_POST['tipo'];
        $objEquipo->modelo = $_POST['modelo'];
        $objEquipo->serial = $_POST['serial'];
        $objEquipo->clienteNombre = $_POST['cliente'];
        
        if(isset($_POST['estado'])){
            $objEquipo->activo = $_POST['estado'];
        }
            
        if($objEquipo->activo == "off"){
            $resultadoEquipo = buscarTodo($objEquipo);
        }else{
            $resultadoEquipo = buscarEquipo($objEquipo);
        }
            
        
        if($resultadoEquipo == TRUE){
                include '../View/ListaEquipos.php';
            }else{
                $msj = 40;
                header('Location:../view/BusquedaEquipo.php?msj='.$msj);
            }
}elseif($action == "presupuesto"){
    
    $objEquipo = new Equipo();
    
        $objEquipo->problema = $_POST["problema"];
        $objEquipo->infTecnico = $_POST["infTecnico"];
        $objEquipo->infCliente = $_POST["infCliente"];
        $objEquipo->valPre = $_POST["valPre"];
        $objEquipo->extras = $_POST["extras"];
        $objEquipo->valEx = $_POST["valEx"];
        $objEquipo->total = $_POST["total"];
        $objEquipo->fecha = $_POST["fecha"];
        $objEquipo->id = $_POST["equipoId"];
        $objEquipo->status = $_POST["status"];
        
        $vacio = $_GET["vacio"];

        if($vacio == 0){
            $resultadoEquipo = actualizarPresupuesto($objEquipo);
            
        }  else {
            $resultadoEquipo = incluirPresupuesto($objEquipo);
        }
            
    if($resultadoEquipo == TRUE){
        $msj = 11;
        header ('Location:../view/OrdenReparacion.php?equipoId='.$objEquipo->id.'&msj='.$msj);
    }  else {
        $msj = 10;
        header ('Location:../view/OrdenReparacion.php?equipoId='.$objEquipo->id.'&msj='.$msj);
    }
}elseif($action == "entregar"){
    
    $objEquipo = new Equipo();
    
        $objEquipo->id = $_GET["equipoId"];
        $objEquipo->status = 5;

        $resultadoEquipo = actualizarPresupuesto($objEquipo);
            
    if($resultadoEquipo == TRUE){
        header ('Location:../view/OrdenReparacion.php?equipoId='.$objEquipo->id);
    }  else {
        $msj = 50;
        header ('Location:../view/OrdenReparacion.php?equipoId='.$objEquipo->id.'&msj='.$msj);
    }
}elseif($action == "pronto"){
    
    $resultadoEquipo = buscarProntos();
                    
    if($resultadoEquipo == TRUE){
        include '../View/ListaProntos.php';
    }  else {
        echo 'Error';
    }
}elseif($action == "confirmado"){
    
    $resultadoEquipo = buscarConfirmados();
           
    if($resultadoEquipo == TRUE){
        include '../View/ListaConfirmados.php';
    }  else {
        $msj = 30;
        header('Location:../view/ListaConfirmados.php');
    }
}elseif($action == "presupuestar"){
    
    $resultadoEquipo = buscarNopresupuestados();
           
    if($resultadoEquipo == TRUE){
        include '../View/ListaPresupuestar.php';
    }  else {
        $msj = 30;
        header('Location:../view/ListaPresupuestar.php');
    }
}elseif($action == "revisar"){
    
    $resultadoEquipo = buscarNorevisados();

    if($resultadoEquipo == TRUE){
        include '../View/ListaNoRevisados.php';
    }  else {
        $msj = 30;
        header('Location:../view/ListaNoRevisados.php');
    }
}elseif($action == "historial"){
    
    $objEquipo = new Equipo();
    
        $objEquipo->id = $_GET["equipoId"];
    
    $resultadoEquipo = buscarHistorial($objEquipo);

    if($resultadoEquipo == TRUE){
        include '../View/HistorialReparacion.php';
    }  else {
        $msj = 30;
        header('Location:../view/ListaNoRevisados.php');
    }
}

if(!empty($clienteId)){

        $objEquipo = new Equipo();

            $objEquipo->cliente = $clienteId;

            $resultadoEquipo = consultarEquipo($objEquipo);
        
}

if(!empty($equipoId)){

        $objEquipo = new Equipo();

            $objEquipo->id = $equipoId;
            
            $resultadoEquipo = arrayTodo($objEquipo);
            
            
            
        //si es true es xq nunca tuvo una orden registrada
        if(empty($resultadoEquipo[0]['InfTecnico']) && empty($resultadoEquipo[0]['InfCliente']) && 
                empty($resultadoEquipo[0]['ValPre']) && empty($resultadoEquipo[0]['Extras']) &&
                empty($resultadoEquipo[0]['ValEx']) && empty($resultadoEquipo[0]['Total'])){
                $vacio = 1;
            }  else {
                $vacio = 0;
            }
                                                 
            $estado = [
                0 => "Sin revisar",
                1 => "Revisado",
                2 => "Presupuestado",
                3 => "Confirmado",
                4 => "Pronto",
                5 => "Entregado",
            ];
}

if (isset($entregado) && $entregado == 1){
    $resultadoEquipo = buscarEntregados();
    
    if($resultadoEquipo == FALSE){
        $msj = 30;
    }
    
}