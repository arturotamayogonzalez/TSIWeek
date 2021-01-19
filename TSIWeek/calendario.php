<?php include_once 'includes/templates/header.php';?>

  <section class="seccion contenedor">
      <h2>Calendario</h2>

      <div class="calendario">
        <?php
        try{
            require_once('includes/funciones/bd_conexion.php');
            $lunes = "SELECT Id_Eventos, Nombre, Fecha_Inicio, Hora_Inicio, Hora_Fin, Tipo_Evento, Nombre_U, Icono_Evento, Nombre_P, Apellido_P FROM eventos INNER JOIN categoria_evento ON eventos.Id_CategoriaEvento = categoria_evento.ID_CategoriaEvento INNER JOIN poniente ON eventos.Id_Poniente = poniente.Id_Poniente INNER JOIN ubicacion ON eventos.Id_Ubicacion = ubicacion.Id_Ubicacion WHERE Fecha_Inicio = '2019-07-15' ORDER BY Hora_Inicio ASC";

            $martes = "SELECT Id_Eventos, Nombre, Fecha_Inicio, Hora_Inicio, Hora_Fin, Tipo_Evento, Nombre_U, Icono_Evento, Nombre_P, Apellido_P FROM eventos INNER JOIN categoria_evento ON eventos.Id_CategoriaEvento = categoria_evento.ID_CategoriaEvento INNER JOIN poniente ON eventos.Id_Poniente = poniente.Id_Poniente INNER JOIN ubicacion ON eventos.Id_Ubicacion = ubicacion.Id_Ubicacion WHERE Fecha_Inicio = '2019-07-16' ORDER BY Hora_Inicio ASC";

            $miercoles = "SELECT Id_Eventos, Nombre, Fecha_Inicio, Hora_Inicio, Hora_Fin, Tipo_Evento, Nombre_U, Icono_Evento, Nombre_P, Apellido_P FROM eventos INNER JOIN categoria_evento ON eventos.Id_CategoriaEvento = categoria_evento.ID_CategoriaEvento INNER JOIN poniente ON eventos.Id_Poniente = poniente.Id_Poniente INNER JOIN ubicacion ON eventos.Id_Ubicacion = ubicacion.Id_Ubicacion WHERE Fecha_Inicio = '2019-07-17' ORDER BY Hora_Inicio ASC";

            $jueves = "SELECT Id_Eventos, Nombre, Fecha_Inicio, Hora_Inicio, Hora_Fin, Tipo_Evento, Nombre_U, Icono_Evento, Nombre_P, Apellido_P FROM eventos INNER JOIN categoria_evento ON eventos.Id_CategoriaEvento = categoria_evento.ID_CategoriaEvento INNER JOIN poniente ON eventos.Id_Poniente = poniente.Id_Poniente INNER JOIN ubicacion ON eventos.Id_Ubicacion = ubicacion.Id_Ubicacion WHERE Fecha_Inicio = '2019-07-18' ORDER BY Hora_Inicio ASC";

            $viernes = "SELECT Id_Eventos, Nombre, Fecha_Inicio, Hora_Inicio, Hora_Fin, Tipo_Evento, Nombre_U, Icono_Evento, Nombre_P, Apellido_P FROM eventos INNER JOIN categoria_evento ON eventos.Id_CategoriaEvento = categoria_evento.ID_CategoriaEvento INNER JOIN poniente ON eventos.Id_Poniente = poniente.Id_Poniente INNER JOIN ubicacion ON eventos.Id_Ubicacion = ubicacion.Id_Ubicacion WHERE Fecha_Inicio = '2019-07-19' ORDER BY Hora_Inicio ASC";
            

            $lunes = $conexion->query($lunes);
            $martes = $conexion->query($martes);
            $miercoles = $conexion->query($miercoles);
            $jueves = $conexion->query($jueves);
            $viernes = $conexion->query($viernes);

        } catch(\Exception $e){
            echo $e->getMessage();
        }
      ?>

        <h3 class="titulo-lunes"><i class="fa fa-calendar"></i> Lunes 15 de Julio de 2019</h3>
        <div class="lunes">
            <?php while($lunesc = $lunes->fetch_assoc()){?>
                <div class="dia">
                    <p class="titulo"><?php echo $lunesc['Nombre']; ?></p>
                    <p class="hora">
                        <i class="fa fa-clock" aria-hidden="true"></i>
                        <?php echo $lunesc['Hora_Inicio'] . " a " . $lunesc['Hora_Fin'];?>
                    </p>
                    <p class="lugar">
                        <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                        <?php echo $lunesc['Nombre_U'];?>
                    </p>
                    <p>
                        <i class="fas <?php echo $lunesc['Icono_Evento']; ?>" aria-hidden="true"></i>
                        <?php echo $lunesc['Tipo_Evento'];?></p>
                    <p> 
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php echo $lunesc['Nombre_P'] . " " . $lunesc['Apellido_P'] ; ?></p>
                    </p>
                </div>
            <?php } ?>
        </div>

        <h3 class="titulo-martes"><i class="fa fa-calendar"></i> Martes 16 de Julio de 2019</h3>
        <div class="martes">
            <?php while($martesc = $martes->fetch_assoc()){?>
                <div class="dia">
                    <p class="titulo"><?php echo $martesc['Nombre']; ?></p>
                    <p class="hora">
                        <i class="fa fa-clock" aria-hidden="true"></i>
                        <?php echo $martesc['Hora_Inicio'] . " a " . $martesc['Hora_Fin'];?>
                    </p>
                    <p class="lugar">
                        <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                        <?php echo $martesc['Nombre_U'];?>
                    </p>
                    <p>
                        <i class="fas <?php echo $martesc['Icono_Evento']; ?>" aria-hidden="true"></i>
                        <?php echo $martesc['Tipo_Evento'];?></p>
                    <p> 
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php echo $martesc['Nombre_P'] . " " . $martesc['Apellido_P'] ; ?></p>
                    </p>
                </div>
            <?php } ?>
        </div>

        <h3 class="titulo-miercoles"><i class="fa fa-calendar"></i> Miercoles 17 de Julio de 2019</h3>
        <div class="miercoles">
            <?php while($miercolesc = $miercoles->fetch_assoc()){?>
                <div class="dia">
                    <p class="titulo"><?php echo $miercolesc['Nombre']; ?></p>
                    <p class="hora">
                        <i class="fa fa-clock" aria-hidden="true"></i>
                        <?php echo $miercolesc['Hora_Inicio'] . " a " . $miercolesc['Hora_Fin'];?>
                    </p>
                    <p class="lugar">
                        <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                        <?php echo $miercolesc['Nombre_U'];?>
                    </p>
                    <p>
                        <i class="fas <?php echo $miercolesc['Icono_Evento']; ?>" aria-hidden="true"></i>
                        <?php echo $miercolesc['Tipo_Evento'];?></p>
                    <p> 
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php echo $miercolesc['Nombre_P'] . " " . $miercolesc['Apellido_P'] ; ?></p>
                    </p>
                </div>
            <?php } ?>
        </div>

        <h3 class="titulo-jueves"><i class="fa fa-calendar"></i> Jueves 18 de Julio de 2019</h3>
        <div class="jueves">
            <?php while($juevesc = $jueves->fetch_assoc()){?>
                <div class="dia">
                    <p class="titulo"><?php echo $juevesc['Nombre']; ?></p>
                    <p class="hora">
                        <i class="fa fa-clock" aria-hidden="true"></i>
                        <?php echo $juevesc['Hora_Inicio'] . " a " . $juevesc['Hora_Fin'];?>
                    </p>
                    <p class="lugar">
                        <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                        <?php echo $juevesc['Nombre_U'];?>
                    </p>
                    <p>
                        <i class="fas <?php echo $juevesc['Icono_Evento']; ?>" aria-hidden="true"></i>
                        <?php echo $juevesc['Tipo_Evento'];?></p>
                    <p> 
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php echo $juevesc['Nombre_P'] . " " . $juevesc['Apellido_P'] ; ?></p>
                    </p>
                </div>
            <?php } ?>
        </div>

        <h3 class="titulo-viernes"><i class="fa fa-calendar"></i> Viernes 19 de Julio de 2019</h3>
        <div class="viernes">
            <?php while($viernesc = $viernes->fetch_assoc()){?>
                <div class="dia">
                    <p class="titulo"><?php echo $viernesc['Nombre']; ?></p>
                    <p class="hora">
                        <i class="fa fa-clock" aria-hidden="true"></i>
                        <?php echo $viernesc['Hora_Inicio'] . " a " . $viernesc['Hora_Fin'];?>
                    </p>
                    <p class="lugar">
                        <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                        <?php echo $viernesc['Nombre_U'];?>
                    </p>
                    <p>
                        <i class="fas <?php echo $viernesc['Icono_Evento']; ?>" aria-hidden="true"></i>
                        <?php echo $viernesc['Tipo_Evento'];?></p>
                    <p> 
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php echo $viernesc['Nombre_P'] . " " . $viernesc['Apellido_P'] ; ?></p>
                    </p>
                </div>
            <?php } ?>
        </div>
      </div>


      <?php
        $conexion->close();
      ?>

    </section>


  <?php include_once 'includes/templates/footer.php';?>
