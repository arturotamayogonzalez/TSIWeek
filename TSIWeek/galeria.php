<?php include_once 'includes/templates/header.php';?>
      <h2>Galeria de fotos</h2>

      <?php
        try{
            require_once('includes/funciones/bd_conexion.php');
            $sql = " SELECT * FROM `galeria` ";
            $consulta = $conexion->query($sql);
        } catch(\Exception $e){
            echo $e->getMessage();
        }
      ?>

      <section class="contenedor seccion">
        <div class="galeria">
        <center>
          <?php while($fotos = $consulta->fetch_assoc()){?>
            <a href="img/galeria/<?php echo $fotos['Imagen_URL'];?>" data-lightbox="galeria">
            <img src="img/galeria/thumbs/<?php echo $fotos['Imagen_URL'];?>">
            </a>
          <?php } ?> 
          </center>
          </div>
      </section>

      <?php
        $conexion->close();
      ?>

  <?php include_once 'includes/templates/footer.php';?>
