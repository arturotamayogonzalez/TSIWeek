<section class="seccion contenedor">
      <h2>Invitados</h2>

      <?php
        try{
            require_once('includes/funciones/bd_conexion.php');
            $sql = " SELECT * FROM `poniente` WHERE `Tipo_Poniente` = 'Conferencista'";
            $resultado = $conexion->query($sql);
        } catch(\Exception $e){
            echo $e->getMessage();
        }
      ?>

        <section class="invitados contenedor seccion">
            <ul class="lista-invitados clearfix">
                <?php while($ponentes = $resultado->fetch_assoc()){?>
                    <li>
                        <div class="invitado">
                            <a class="invitado-info" href="#invitado<?php echo $ponentes['Id_Poniente'];?>">
                                <img src="<?php echo $ponentes['Imagen_URL'];?>" alt="imagen invitado">
                                <p><?php echo $ponentes['Nombre_P'] . " " . $ponentes['Apellido_P'];?></p>
                            </a>
                        </div>
                    </li>
                    <div style="display:none;">
                        <div class="invitado-info" id="invitado<?php echo $ponentes['Id_Poniente'];?>">
                            <h2><?php echo $ponentes['Nombre_P'] . " " . $ponentes['Apellido_P'];?></h2> 
                            
                            <p><?php echo $ponentes['Descripcion'];?></p>
                        </div>
                    </div>
                <?php } ?>
             </ul>
        </section>
      

      <?php
        $conexion->close();
      ?>
    </section>