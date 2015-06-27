<!DOCTYPE html>
<?php
  include '../Controller/Autenticar.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Equipo</title>
	<!-- Bootstrap Styles-->
    <link href="/Taller/View/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="/Taller/View/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="/Taller/View/assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Taller 2.1</a>
            </div>

            <?php
            $equipoId = $_GET['equipoId'];
            include '../Controller/EquipoController.php';  
            $fecha = date("Y/m/d");

            if ($resultadoEquipo[0]['activo'] == 1){
                $activo = "activo";
                $cambiar = "Desactivar";
            }else{
                $activo = "inactivo";
                $cambiar = "Activar";
            }
            ?>
            
            
            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a>
                    </li>
                    <li>
                        <a href="../View/RegistroCliente.php" ><i class="fa fa-user"></i> Registro de Cliente</a>
                    </li>
					<li>
                        <a href="../View/RegistroEquipo.php"><i class="fa fa-desktop"></i> Registro de Equipo</a>
                    </li>
                    <li>
                        <a href="../View/BusquedaCliente.php"><i class="fa fa-search"></i> Buscar Cliente</a>
                    </li>
                    
                    <li>
                        <a href="../View/BusquedaEquipo.php"><i class="fa fa-search"></i> Buscar Equipo</a>
                    </li>
                    <li>
                        <a class="active-menu"><i class="fa fa-desktop"></i><?php echo $resultadoEquipo[0]['tipo'].' - '.$resultadoEquipo[0]['marca'];?></a>
                    </li>

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
		
                <div class="row">
                    <!--<div class="col-md-2"></div>-->    
                    <div class="col-md-12">
                        <h1 class="page-header">
                            <i class="fa fa-desktop"></i>
                            Informacion de Equipo
                        </h1>
                        
                    </div>
                </div> <!-- /. ROW  -->
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <?php 
                    if(isset($_GET['msj'])){
                        $msj = $_GET['msj'];
                        include 'Mensajes.php';
                    };
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Equipo
                                </div>
                                <div class="panel-body">
                                    <?php
                                        echo $resultadoEquipo[0]['tipo'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Modelo
                                </div>
                                <div class="panel-body">
                                    <?php
                                        echo $resultadoEquipo[0]['modelo'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Marca
                                </div>
                                <div class="panel-body">
                                    <?php
                                        echo $resultadoEquipo[0]['marca'];
                                    ?>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-6 col-sm-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Cliente
                                </div>
                                <div class="panel-body">
                                    <?php
                                        echo $resultadoEquipo[0]['cliente_Nombre'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Numero de Serie
                                </div>
                                <div class="panel-body">
                                    <?php
                                        echo $resultadoEquipo[0]['serial'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Fecha
                                </div>
                                <div class="panel-body">
                                    <?php
                                        echo $resultadoEquipo[0]['fecha'];
                                    ?>
                                </div>
                            </div>
                        </div>     
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Estado
                                </div>
                                <div class="panel-body">
                                    <?php
                                        foreach ($estado as $est => $ado){
                                            if($est == $resultadoEquipo[0]['Status']){
                                                echo $ado;
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Problema
                                </div>
                                <div class="panel-body">
                                    <?php
                                        echo $resultadoEquipo[0]['problema'];
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="col-md-4">
                        <a href="../controller/equipoController.php?equipoId=<?php echo$resultadoEquipo[0]['id']; ?>&action=consultar"><button class="btn btn-warning btn-lg"><i class="fa fa-pencil"></i> Editar</button></a>
                        <br><br>
                        <a href="../controller/equipoController.php?equipoId=<?php echo$resultadoEquipo[0]['id']; ?>&action=<?php echo$cambiar?>"><button class="btn btn-danger btn-lg"><i class="fa fa-warning"></i> <?php echo$cambiar?></button></a>
                        <br><br>
                        <a href="OrdenReparacion.php?equipoId=<?php echo$resultadoEquipo[0]['id']; ?>"><button class="btn btn-success btn-lg"><i class="fa fa-list-alt"></i> Orden de Reparacion</button></a>
                        <br><br>
                        <a href="../view/Cliente.php?clienteId=<?php echo$resultadoEquipo[0]['cliente_ID']; ?>"><button class="btn btn-primary btn-lg"><i class="fa fa-user-md"></i> Informacion de Cliente</button></a>
                        

                    </div>
                </div>
             </div><!-- /. PAGE INNER  -->
        </div><!-- /. PAGE WRAPPER  -->
        
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="/Taller/View/assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="/Taller/View/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="/Taller/View/assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="/Taller/View/assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
