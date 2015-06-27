<!DOCTYPE html>
<?php
  include '../Controller/Autenticar.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Usuarios</title>
	<!-- Bootstrap Styles-->
    <link href="/Taller/View/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="/Taller/View/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="/Taller/View/assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
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
                        <a href="../View/index.php"><i class="fa fa-dashboard"></i> Inicio</a>
                    </li>
                    <li>
                        <a href="../View/RegistroCliente.php"><i class="fa fa-user"></i> Registro de Cliente</a>
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
                        <a href="#"><i class="fa fa-users"></i> Usuarios<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="RegistroUsuario.php">Registro de Usuario</a>
                            </li>
                            <li>
                                <a href="#" class="active-menu">Editar - Eliminar</a>
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
		<div class="row">   
                    <div class="col-md-14">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Clientes
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>ID </th>
                                                <th>Nombre </th>
                                                <th>Usuario </th>
                                                <th>Opciones </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                        foreach ($resultadoUsuario as $usuario):

                                        ?>    
                                            <tr>
                                            <td><?php echo$usuario['Id']?></td>                  
                                            <td><?php echo$usuario['Nombre']?></td>
                                            <td><?php echo$usuario['Username']?></td>
                                            <td> <a href="../Controller/UsuarioController.php?usuarioId=<?php echo$usuario['Id']?>&action=consultar"><button class="btn btn-warning btn-sm">Editar</button></a>
                                                 <a href="../Controller/UsuarioController.php?usuarioId=<?php echo$usuario['Id']; ?>&action=eliminar"><button class="btn btn-danger btn-sm"> Eliminar</button></a></td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div> <!-- /. ROW  -->
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
     <!-- DATA TABLE SCRIPTS -->
     <script src="/Taller/View/assets/js/dataTables/jquery.dataTables.js"></script>
     <script src="/Taller/View/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="/Taller/View/assets/js/custom-scripts.js"></script>
   
</body>
</html>
