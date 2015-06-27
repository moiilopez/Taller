<!DOCTYPE html>
<?php
  include '../Controller/Autenticar.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Orden de Reparacion</title>
	<!-- Bootstrap Styles-->
    <link href="/Taller/View/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="/Taller/View/assets/css/Custom.css" rel="stylesheet" />
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
            $fecha = date("Y/m/d");
            $equipoId = $_GET['equipoId'];
            include '../Controller/EquipoController.php';  
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
                            Orden de Reparacion
                        </h1>
                        
                    </div>
                </div> <!-- /. ROW  -->
                <!-- /. ROW  -->
                <div class="col-md-8">
                    <?php
                    if(isset($_GET['msj'])){
                            $msj = $_GET['msj'];
                            include 'Mensajes.php';
                        }
                    if($resultadoEquipo[0]['Status'] != 5):
                    ?>
                    <form action="../Controller/equipoController.php?action=presupuesto&vacio=<?php echo$vacio?>" method="post" role="form" oninput="total.value=parseInt(valPre.value)+parseInt(valEx.value)">
                                
                                <div class="row">
                                    <label for="problema">Problema:</label><br>
                                    <input type="text" name="problema" class="form-control" id="prob" value="<?php echo $resultadoEquipo[0]['problema']?>">
                                </div><br>
                        
                                <div class="row">
                                    <div id="tecnico">
                                        <label for="informe">Informe Tecnico:</label><br>
                                        <textarea name="infTecnico" rows="8" cols="35" class="form-control"><?php echo $resultadoEquipo[0]['InfTecnico']?></textarea>
                                    </div>
                                    <div id="cliente">
                                        <label for="informe">Informe al Cliente:</label><br>
                                        <textarea name="infCliente" rows="8" cols="35" class="form-control"><?php echo $resultadoEquipo[0]['InfCliente']?></textarea>
                                    </div> 
                                </div><br>
                        
                                <div class="row">
                                    <div class="valPre">
                                        <label for="valor" >Valor:</label>
                                        <input type="text" name="valPre" class="form-control" value="<?php echo $resultadoEquipo[0]['ValPre']?>">
                                    </div>
                                </div><br>
                        
                                <div class="row">
                                    <div id="extras">
                                        <label for="extras">Extras:</label><br>
                                        <textarea name="extras" rows="3" cols="10" class="form-control"><?php echo $resultadoEquipo[0]['Extras']?></textarea>
                                    </div>
                                </div><br>
                        
                                <div class="row">
                                    <div class="valPre">
                                        <label for="valor" class="val">Valor:</label>
                                        <input type="text" name="valEx" class="form-control" value="<?php echo $resultadoEquipo[0]['ValEx']?>">
                                    </div>
                                </div><br>
                                                                                
                                <div class="row">                
                                    <div class="valPre">
                                        <label for="valor" >Valor Total:</label>
                                        <input type="text" name="total" for="valPre valEx" class="form-control" value="<?php echo $resultadoEquipo[0]['Total']?>"></output>
                                    </div> 
                                                                                
                                    <div id="status">
                                        <label for="status">Estado:</label>
                                            <select name="status" class="form-control"> 
                                            <?php
                                            foreach ($estado as $est => $ado){
                                                if($est == $resultadoEquipo[0]['Status']){
                                                    echo '<option value="'.$est.'" selected>'.$ado.'</option>';
                                                }else{
                                                    echo '<option value="'.$est.'">'.$ado.'</option>';
                                                }
                                            }
                                            ?>
                                            </select>
                                    </div>
                                </div>


                                <input type="hidden" name="fecha" value=" <?php echo $fecha;?>">
                                <input type="hidden" name="equipoId" value="<?php echo $resultadoEquipo[0]['id'];?>">
                                
                                <div class="row">
                                    <div id="submit">
                                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                                    </div>
                                </div>
                    
                    </form>
                    <?php
                    endif;
                    if($resultadoEquipo[0]['Status'] == 5 && !isset($_GET['nueva'])):
                    ?>
                    <div class="alert alert-info">
                        <p>Este equipo cuenta con historial de reparacion</p><br>
                        <a href="OrdenReparacion.php?equipoId=<?php echo$resultadoEquipo[0]['id']; ?>&nueva=1"><button class="btn btn-success btn-lg"><i class="fa fa-list-alt"></i> Nueva Orden de Reparacion</button></a>
                        <a href="../Controller/equipoController.php?action=historial&equipoId=<?php echo$resultadoEquipo[0]['id']; ?>"><button class="btn btn-primary btn-lg"><i class="fa fa-table"></i> Ver Historial de Reparacion</button></a>
                    </div>
                    <?php endif;
                    
                    
                    
                    
                    if(isset($_GET['nueva'])):
                    ?>
                    <form action="../Controller/equipoController.php?action=presupuesto&vacio=<?php echo$vacio?>" method="post" role="form" oninput="total.value=parseInt(valPre.value)+parseInt(valEx.value)">
                                
                                <div class="row">
                                    <label for="problema">Problema:</label><br>
                                    <input type="text" name="problema" class="form-control" id="prob">
                                </div><br>
                        
                                <div class="row">
                                    <div id="tecnico">
                                        <label for="informe">Informe Tecnico:</label><br>
                                        <textarea name="infTecnico" rows="8" cols="35" class="form-control"></textarea>
                                    </div>
                                    <div id="cliente">
                                        <label for="informe">Informe al Cliente:</label><br>
                                        <textarea name="infCliente" rows="8" cols="35" class="form-control"></textarea>
                                    </div> 
                                </div><br>
                        
                                <div class="row">
                                    <div class="valPre">
                                        <label for="valor" >Valor:</label>
                                        <input type="text" name="valPre" class="form-control">
                                    </div>
                                </div><br>
                        
                                <div class="row">
                                    <div id="extras">
                                        <label for="extras">Extras:</label><br>
                                        <textarea name="extras" rows="3" cols="10" class="form-control"></textarea>
                                    </div>
                                </div><br>
                        
                                <div class="row">
                                    <div class="valPre">
                                        <label for="valor" class="val">Valor:</label>
                                        <input type="text" name="valEx" class="form-control">
                                    </div>
                                </div><br>
                                                                                
                                <div class="row">                
                                    <div class="valPre">
                                        <label for="valor" >Valor Total:</label>
                                        <input type="text" name="total" for="valPre valEx" class="form-control">
                                    </div> 
                                                                                
                                    <div id="status">
                                        <label for="status">Estado:</label>
                                            <select name="status" class="form-control"> 
                                            <?php
                                            foreach ($estado as $est => $ado){
                                                echo '<option value="'.$est.'">'.$ado.'</option>';
                                            }
                                            ?>
                                            </select>
                                    </div>
                                </div>


                                <input type="hidden" name="fecha" value=" <?php echo $fecha;?>">
                                <input type="hidden" name="equipoId" value="<?php echo $resultadoEquipo[0]['id'];?>">
                                
                                <div class="row">
                                    <div id="submit">
                                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                                    </div>
                                </div>
                    
                    </form>
                    <?php endif;?>
                    
                    
                    
                    
                    
                </div>
                <div class="col-md-4">                                             
                    <div class="col-md-10 col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                Nº de Orden:
                                <strong>
                                    <?php
                                    echo $resultadoEquipo[0]['Id'];
                                    ?>
                                </strong>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-10 col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                Equipo:
                                <strong>
                                    <?php
                                    echo $resultadoEquipo[0]['tipo'].' - ';
                                    echo $resultadoEquipo[0]['marca'].' - ';
                                    echo $resultadoEquipo[0]['modelo'];
                                    ?>
                                </strong>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10 col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                Cliente: 
                                <strong>
                                    <?php
                                    echo $resultadoEquipo[0]['cliente_Nombre'];
                                    ?>
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-4">    
                        <a href="../view/Cliente.php?clienteId=<?php echo$resultadoEquipo[0]['cliente_ID']; ?>"><button class="btn btn-primary btn-lg"><i class="fa fa-user-md"></i> Informacion de Cliente</button></a><br><br>
                        <a href="../view/Equipo.php?equipoId=<?php echo$resultadoEquipo[0]['id']?>"><button class="btn btn-info btn-lg"><i class="fa fa-desktop"></i> Informacion de Equipo</button></a><br><br>
                        
                        <?php if($resultadoEquipo[0]['Status'] != 5 && !isset($_GET['nueva'])): ?>
                                <a href="../Controller/equipoController.php?equipoId=<?php echo $resultadoEquipo[0]['id'] ?>&action=entregar"><button class="btn btn-success btn-lg"><i class="fa fa-arrow-right"></i> Entregar</button></a>
                                <br><br>
                        <?php endif; ?>
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
