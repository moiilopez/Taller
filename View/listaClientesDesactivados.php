<?php
  include '../controller/autenticar.php';
?>
    
<html>
    <head>
        <meta charset="UTF-8">
        <title>Clientes</title>
    </head>
    <body>
        <?php
        include "../controller/clienteController.php";
        $desactivados = mostrarDesactivados();
        
        ?>

        <div id="table_admin" class="span7">

            <h3>Clientes</h3>

            <table  border="1" >
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre </th>
                        <th>Direccion </th>
                        <th>Telefono </th>
                        <th>Localidad </th>
                        <th>Fecha</th>
                        <th>R.U.T./C.I.</th>
                        <th>Descuentos</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <?php

                foreach ($desactivados as $desact) {
                    
                    echo'<tbody>';
                    echo'<tr>';
                    echo'<td>'. $desact['id'] . '</td>';                  
                    echo'<td> <a href=../view/cliente.php?clienteId='.$desact['id'].'>' . $desact['nombre'] . '</td>';
                    echo'<td>' . $desact['direccion'] . '</td>';
                    echo'<td>' . $desact['telefono'] . '</td>';
                    echo'<td>' . $desact['localidad'] . '</td>';
                    echo'<td>' . $desact['fecha'] . '</td>';
                    echo'<td>' . $desact['documento'] . '</td>';
                    echo'<td>' . $desact['descuentos'] . '</td>';
                    echo'<td> <a href=../controller/clienteController.php?clienteId='.$desact['id'].'&action=consultar> Editar </a></td>';
                    echo'</tr>';
                    echo'</tbody>';
                    
                }
                ?>
            </table>
        </div>
        <?php
            echo "<br>";
            echo '<a href="../view/registroEquipo.php" style="text-decoration:none"> <input type="button" value="Registrar Equipo"> </a>';
        ?>
    </body>
</html>
