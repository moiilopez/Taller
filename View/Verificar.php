<!DOCTYPE html>
<?php
  include '../Controller/Autenticar.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Usuario</title>
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
                        <a href="#"><i class="fa fa-users"></i> Usuarios<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="RegistroUsuario.php">Registro de Usuario</a>
                            </li>
                            <li>
                                <a href="#" class="active-menu">Editar</a>
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
                    <div class="col-md-2"></div>    
                    <div class="col-md-6">
                        
                        <?php 
                        if(isset($_GET['msj'])){
                            $msj = $_GET['msj'];
                            include 'Mensajes.php';
                        };?>
                        
                        <h1 class="page-header">
                            Ingrese el usuario y la contraseña de administrador
                        </h1>
                        <form action="../Controller/UsuarioController.php?action=editar" method="post" role="form">
                                
                                <div class="form-group">
                                    <label for="adminUsername">Usuario:</label>
                                    <input class="form-control" name="adminUsername" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="adminContrasena">Contraseña:</label>
                                    <input class="form-control" name="adminContrasena" type="password">
                                </div>
                                <input name="id" type="hidden" value="<?php echo $_POST['hiddenId'] ?>">
                                <input name="nombre" type="hidden" value="<?php echo $_POST['nombre'] ?>">
                                <input name="username" type="hidden" value="<?php echo $_POST['username'] ?>">
                                <input name="contrasena" type="hidden" value="<?php echo $_POST['contrasena'] ?>">
                                
                                <button type="submit" class="btn btn-primary">Verificar</button>
                                

                        </form>
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
      <!-- Custom Js -->
    <script src="/Taller/View/assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
