<?php

if($msj == 1): 
    ?>
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert">x</button>
        <p>Registro realizado con exito</p>
    </div>
<?php elseif($msj == 0):?>
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert">x</button>
        <p>Error en el registro</p>
    </div>    
    <?php elseif($msj == 2):?>
    <div class="alert alert-warning">
        <button class="close" data-dismiss="alert">x</button>
        <p>Cliente no seleccionado</p>
    </div>
    <?php endif;  
    
    if($msj == 11): 
    ?>
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert">x</button>
        <p>Registro actualizado con exito</p>
    </div>
    <?php elseif($msj == 10):?>
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert">x</button>
        <p>Error al actualizar el registro</p>
    </div>    
    <?php endif;
    
    if($msj == 21): 
    ?>
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert">x</button>
        <p>Registro desctivado con exito</p>
    </div>
    <?php elseif($msj == 20):?>
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert">x</button>
        <p>Error al dasactivar el registro</p>
    </div>    
   
<?php endif;
    if($msj == 31): 
    ?>
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert">x</button>
        <p>Registro activado con exito</p>
    </div>
    <?php elseif($msj == 30):?>
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert">x</button>
        <p>Error al activar el registro</p>
    </div>    
    <?php endif;
    
    if($msj == 40): 
    ?>
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert">x</button>
        <p>Su busqueda no coincide con ningin regitro</p>
    </div>
    <?php endif;