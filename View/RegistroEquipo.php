<!DOCTYPE html>
<?php
  include '../Controller/Autenticar.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de Equipo</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
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
                
                <!-- /.dropdown -->
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
                        <a href="../View/RegistroEquipo.php" class="active-menu"><i class="fa fa-desktop"></i> Registro de Equipo</a>
                    </li>
                    <li>
                        <a href="../View/BusquedaCliente.php"><i class="fa fa-search"></i> Buscar Cliente</a>
                    </li>
                    
                    <li>
                        <a href="../View/BusquedaEquipo.php"><i class="fa fa-search"></i> Buscar Equipo</a>
                    </li>

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
                            Registro de Equipo
                        </h1>
                        <form action="../Controller/EquipoController.php?action=registrar" method="post" role="form">
                                <div class="form-group">
                                    <select name="clienteId" class="form-control">
                                        <option value="cliente">- Seleccionar Cliente -</option>
                                        <?php
                                        include "../controller/equipoController.php";

                                        $clientesId = clienteNombre();

                                        foreach ($clientesId as $pro) {
                                            echo '<option value=' . $pro['id'] . '>' . $pro['nombre'] . '</option>';
                                        }
                                        ?>  
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tipo">Tipo:</label>
                                    <input class="form-control" name="tipo" required>
                                </div>
                                <div class="form-group">
                                    <label for="modelo">Modelo:</label>
                                    <input class="form-control" name="modelo" required>
                                </div>
                                <div class="form-group">
                                    <label for="marca">Marca:</label>
                                    <input class="form-control" name="marca" required>
                                </div>
                                <div class="form-group">
                                    <label for="serial">Numero de Serie:</label>
                                    <input class="form-control" name="serial" required>
                                </div>
                                <div class="form-group">
                                    <label for="problema">Problema:</label>
                                    <input class="form-control" name="problema" required>
                                </div>
                                <div class="form-group">
                                    <label for="fecha">Fecha:</label>
                                    <input class="form-control" name="fecha" value="<?php echo date("Y/m/d");?>" required >
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="reset" class="btn btn-info">Reset</button>
                        </form>
                    </div>
                </div> <!-- /. ROW  -->
             </div><!-- /. PAGE INNER  -->
        </div><!-- /. PAGE WRAPPER  -->
        
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
