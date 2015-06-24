<?php

include '../Model/ClassCliente.php';


$action = "";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

if ($action == "registrar"){    
    $objCliente = new Cliente();
    
        $objCliente->nombre = $_POST["nombre"];
        $objCliente->telefono = $_POST["telefono"];
        $objCliente->direccion = $_POST["direccion"];
        $objCliente->localidad = $_POST["localidad"];
        $objCliente->fecha = $_POST["fecha"];
        $objCliente->documento = $_POST["documento"];
        $objCliente->descuentos = $_POST["descuentos"];
    
        $resultadoCliente = incluirCliente($objCliente);

    if ($resultadoCliente == true) {
        
        $msj = 1;
        header('Location:../View/RegistroCliente.php?msj='.$msj);      
    } else {
        $msj = 0;
        header('Location:../View/RegistroCliente.php?msj='.$msj);
    }
}  elseif($action == "editar") {
    $objCliente = new Cliente();
    
        $objCliente->id = $_POST["hiddenId"];
        $objCliente->nombre = $_POST["nombre"];
        $objCliente->telefono = $_POST["telefono"];
        $objCliente->direccion = $_POST["direccion"];
        $objCliente->localidad = $_POST["localidad"];
        $objCliente->fecha = $_POST["fecha"];
        $objCliente->documento = $_POST["documento"];
        $objCliente->descuentos = $_POST["descuentos"];
        
        $resultadoCliente = modificarCliente($objCliente);
        
    if($resultadoCliente == TRUE){
        $msj = 11;
        header('Location:ClienteController.php?clienteId='.$objCliente->id.'&action=consultar&msj='.$msj);
    } else {
        $msj = 10;
        header('Location:ClienteController.php?clienteId='.$objCliente->id.'&action=consultar&msj='.$msj);
    }
}elseif ($action == "consultar") {
    
    $objCliente = new Cliente();
    
        $objCliente->id = $_GET['clienteId'];
        
        $resultadoCliente = consultarCliente($objCliente);
        
    if($resultadoCliente == TRUE){
        include '../View/EditarClientes.php';
    }  else {
        echo'<link rel="stylesheet" type="text/css" href="../view/Css/All.css"/>';
        echo 'Problem';
    }
}elseif ($action == "Desactivar") {
    
    $objCliente = new Cliente();
    
        $objCliente->id = $_GET['clienteId'];

        $resultadoCliente = desactivarCliente($objCliente);
        
    if($resultadoCliente == TRUE){
        $msj = 21;
        header('Location:../view/cliente.php?clienteId='.$objCliente->id.'&msj='.$msj);
    }  else {
        $msj = 20;
        header('Location:../view/cliente.php?clienteId='.$objCliente->id.'&msj='.$msj);
    }
}elseif ($action == "Activar") {
    
    $objCliente = new Cliente();
    
        $objCliente->id = $_GET['clienteId'];

        $resultadoCliente = activarCliente($objCliente);
        
    if($resultadoCliente == TRUE){
        $msj = 31;
        header('Location:../view/cliente.php?clienteId='.$objCliente->id.'&msj='.$msj);
    }  else {
        $msj = 30;
        header('Location:../view/cliente.php?clienteId='.$objCliente->id.'&msj='.$msj);
    }
}elseif ($action == "buscar") {
    
    $objCliente = new Cliente();
    
        $objCliente->nombre = $_POST['nombre'];
        $objCliente->id = $_POST['codigo'];
        $objCliente->documento = $_POST['documento'];
        
        if(isset($_POST['estado'])){
            $objCliente->activo = $_POST['estado'];
        }
            
        if($objCliente->activo == "off"){
            $resultadoCliente = buscarTodos($objCliente);
        }else{
            $resultadoCliente = buscarCliente($objCliente);
        }
            
        
        if($resultadoCliente == TRUE){
                include '../View/ListaClientes.php';
            }else{
                $msj = 40;
                header('Location:../view/BusquedaCliente.php?msj='.$msj);
            }
}
 

if(!empty($clienteId)){

        $objCliente = new Cliente();

            $objCliente->id = $clienteId;

            $resultadoCliente = consultarCliente($objCliente);
            

        
}

function mostrarDesactivados(){
    return listarDesactivados();
}