<?php
  include '../Controller/Autenticar.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Equipo</title>
        <link rel="stylesheet" type="text/css" href="../view/Css/Equipo.css"/>
    </head>
    <body>
        <?php
            $equipoId = $_GET['equipoId'];
            include '../Controller/EquipoController.php';  
            $fecha = date("Y/m/d");
            if(empty($resultadoEquipo[0]['InfTecnico'])){
                $vacio = 1;
            }  else {
                $vacio = 0;
            }
        ?>
        <div id="todo">
           
            <div id="presupuesto">
                <?php echo'<form action="../Controller/equipoController.php?action=presupuesto&vacio='.$vacio.'" method="post" 
                      oninput="total.value=parseInt(valPre.value)+parseInt(valEx.value)">'?>
                    <br>
                    <div id="problema">
                        <label for="problema">Problema:</label><br>
                            <input type="text" name="problema" id="prob" value="<?php echo $resultadoEquipo[0]['problema']?>"><br><br>
                    </div>
                    <div id="tecnico">
                        <label for="informe">Informe Tecnico:</label><br>
                            <textarea name="infTecnico" rows="5" cols="35" id="tecnico"><?php echo $resultadoEquipo[0]['InfTecnico']?></textarea>
                    </div>
                    <div id="cliente">
                        <label for="informe">Informe al Cliente:</label><br>
                            <textarea name="infCliente" rows="5" cols="35" id="cliente"><?php echo $resultadoEquipo[0]['InfCliente']?></textarea>
                    </div>        
                    <div class="valor">
                        <label for="valor" class="val">Valor:</label>
                            <input type="text" name="valPre" value="<?php echo $resultadoEquipo[0]['ValPre']?>">
                    </div>
                    <div id="extras">
                        <label for="extras">Extras:</label><br>
                            <input type="text" name="extras" id="prob" value="<?php echo $resultadoEquipo[0]['Extras']?>">
                    </div>
                    <div class="valor">
                        <label for="valor" class="val">Valor:</label>
                            <input type="text" name="valEx" value="<?php echo $resultadoEquipo[0]['ValEx']?>">
                    </div>
                    <div id="total">
                        <label for="valor" id="tot">Valor Total:</label>
                        <input type="text" name="total" for="valPre valEx" value="<?php echo $resultadoEquipo[0]['Total']?>"></output>
                    </div> 
                    <div id="status">
                        <label for="status">Estado:</label>
                            <select name="status">
                            <?php
                            $estado = [
                                    0 => "Sin revisar",
                                    1 => "Presupuestado",
                                    2 => "Confirmado",
                                    3 => "Pronto",
                                    4 => "Entregado",
                            ];

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
                    
                    
                        <input type="hidden" name="fecha" value=" <?php echo $fecha;?>">
                        <input type="hidden" name="equipoId" value="<?php echo $resultadoEquipo[0]['id'];?>">
                    <div id="guardar">
                        <input type="submit" value="Guardar">
                    </div>        
                </form>
            </div>
            <div id="izquierda">
                
                <div class="dato">
                    <p class="titulo">Equipo:</p>
                        <p class="informacion">
                            <?php
                                echo $resultadoEquipo[0]['tipo'];
                            ?>
                        </p>
                </div>
            
                <div class="dato">
                    <p class="titulo">Modelo:</p>
                        <p class="informacion">
                            <?php
                                echo $resultadoEquipo[0]['modelo'];
                            ?>
                        </p>
                </div>        
                        
                <div class="dato">        
                    <p class="titulo">Marca:</p>
                        <p class="informacion">
                            <?php
                                echo $resultadoEquipo[0]['marca'];
                            ?>
                        </p>
                </div>        
                        
                <div class="dato">        
                    <p class="titulo">Cliente:</p>
                        <p class="informacion">
                            <?php
                                echo $resultadoEquipo[0]['cliente_Nombre'];
                            ?>
                        </p>
                </div>
                        
                <div class="dato">        
                    <p class="titulo">Numero de Serie:</p>
                        <p class="informacion">
                            <?php
                                echo $resultadoEquipo[0]['serial'];
                            ?>
                        </p>
                </div>

                <div class="dato">        
                    <p class="titulo">Fecha de Ingreso:</p>
                        <p class="informacion">
                            <?php
                                 echo $resultadoEquipo[0]['fecha'];
                            ?>
                        </p>
                </div>
            </div>
            
            <?php echo'<a href="../Controller/EquipoController.php?equipoId='.$resultadoEquipo[0]['id'].'&action=consultar">';?>
                <div id="editar">
                    <h1>Editar</h1>
                </div>
            </a>
            
            <?php echo'<a href="../Controller/EquipoController.php?id='.$resultadoEquipo[0]['id'].'&action=desactivar">';?>
                <div id="desactivar">
                    <h1>Desactivar</h1>
                </div>
            </a>
            
            
                
            </div>
        </div>
        
        

    </body>
</html>