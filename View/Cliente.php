<!DOCTYPE html>
<?php
  include '../Controller/Autenticar.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cliente</title>
	<!-- Bootstrap Styles-->
    <link href="/Taller/View/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="/Taller/View/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="/Taller/View/assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="index.html">Taller 2.1</a>
            </div>

            <?php
            $clienteId = $_GET['clienteId'];
            include '../Controller/ClienteController.php';
            include '../Controller/EquipoController.php';
            foreach ($resultadoCliente as $resultado ){
                if($resultado['activo'] == 1){
                    $activo = "Activo";
                    $cambiar = "Desactivar";
                }  else {
                    $activo = "Desactivado";
                    $cambiar = "Activar";
                }
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
                        <a class="active-menu"><i class="fa fa-desktop"></i><?php echo $resultadoCliente[0]['nombre'];?></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
		
                <div class="row">    
                    <div class="col-md-12">
                        <h1 class="page-header">
                            <i class="fa fa-desktop"></i>
                            Informacion de Cliente
                        </h1> 
                        
                    </div>
                </div> <!-- /. ROW  -->
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
                                    Nombre
                                </div>
                                <div class="panel-body">
                                    <?php
                                        echo $resultadoCliente[0]['nombre'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Telefono
                                </div>
                                <div class="panel-body">
                                    <?php
                                        echo $resultadoCliente[0]['telefono'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Localidad
                                </div>
                                <div class="panel-body">
                                    <?php
                                        echo $resultadoCliente[0]['localidad'];
                                    ?>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-6 col-sm-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Direccion
                                </div>
                                <div class="panel-body">
                                    <?php
                                        echo $resultadoCliente[0]['direccion'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Documento
                                </div>
                                <div class="panel-body">
                                    <?php
                                        echo $resultadoCliente[0]['documento'];
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
                                        echo $resultadoCliente[0]['fecha'];
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
                                        echo $activo;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Descuentos
                                </div>
                                <div class="panel-body">
                                    <?php
                                        echo $resultadoCliente[0]['descuentos'] . ' %';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-14">
                        <a href="../controller/clienteController.php?clienteId=<?php echo$resultadoCliente[0]['id']; ?>&action=consultar"><button class="btn btn-warning btn-lg"><i class="fa fa-pencil"></i> Editar</button></a>
                        <br><br>
                        <a href="../controller/clienteController.php?clienteId=<?php echo$resultadoCliente[0]['id']; ?>&action=<?php echo$cambiar?>"><button class="btn btn-danger btn-lg"><i class="fa fa-warning"></i> <?php echo$cambiar?></button></a>
                        <br><br><br><br>
                    </div>
                    
                    <div class="col-md-14">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de Equipos
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Tipo</th>
                                                <th>Modelo</th>
                                                <th>Marca</th>
                                                <th>Serial</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($resultadoEquipo as $equipo):?>
                                            <tr>
                                                <td><a href="../view/Equipo.php?equipoId=<?php echo$equipo['id']?>"><button class="btn btn-primary btn-sm"><?php echo$equipo['id']?></button></a></td>                  
                                                <td><?php echo$equipo['tipo']?></td>
                                                <td><?php echo$equipo['modelo']?></td>
                                                <td><?php echo$equipo['marca']?></td>
                                                <td><?php echo$equipo['serial']?></td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="/Taller/View/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="/Taller/View/assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    
   
</body>
</html>
