<?php include_once 'includes/templates/header.php';?>

  <section class="seccion contenedor">
      <h2>Registro de Usuarios</h2>
      <form method="POST" action="validar_registro.php" id="registro" class="registro">
          <div id="datos_usuario" class="registro caja clearfix">
            <div class="campo">
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="campo">
                <input type="text" id="apellidoP" name="apellidoP" placeholder="Apellido Paterno" required>
            </div>
            <div class="campo">
                <input type="text" id="apellidoM" name="apellidoM" placeholder="Apellido Materno" required>
            </div>
            <div class="campo-entero">
                <input type="email" id="email" name="email" placeholder="E-mail" required>
            </div>
            <div class="campo-mitad">
                <label for="alumno">Alumno: </label>
                <input type="radio" value="Alumno" name="visitante" id="alumno" required>
            </div>
            <div class="campo-mitad">
                <label for="externo">Externo: </label>
                <input type="radio" value="Externo" name="visitante" id="externo" required>
            </div>
            <div class="campo-completo" id="matricula">
                <input type="number" min="0" id="matriculavalor" name="matricula" placeholder="Matricula">
            </div>
            <div class="campo-completo" id="procedencia">
                <input type="text" id="procedenciavalor" name="procedencia" placeholder="Procedencia">
            </div>
          </div> <!--Final de datos usuario-->

        <?php 
            try{
                require_once('includes/funciones/bd_conexion.php');
                $basicos = " SELECT * FROM `eventos` WHERE `Id_CategoriaEvento`= 1";
                $avanzados = " SELECT * FROM `eventos` WHERE `Id_CategoriaEvento`= 2";
                $lunes = " SELECT * FROM `eventos` WHERE `Id_CategoriaEvento`= 3 AND `Fecha_Inicio`= '2019-07-15' ORDER BY Hora_Inicio ASC";
                $martes = " SELECT * FROM `eventos` WHERE `Fecha_Inicio`= '2019-07-16' ORDER BY Hora_Inicio ASC";
                $miercoles = " SELECT * FROM `eventos` WHERE `Fecha_Inicio`= '2019-07-17' ORDER BY Hora_Inicio ASC";
                $jueves = " SELECT * FROM `eventos` WHERE `Fecha_Inicio`= '2019-07-18' ORDER BY Hora_Inicio ASC";
                $viernes = " SELECT * FROM `eventos` WHERE `Id_CategoriaEvento`= 3 AND `Fecha_Inicio`='2019-07-19' ORDER BY Hora_Inicio ASC";

                $basicos = $conexion->query($basicos);
                $avanzados = $conexion->query($avanzados);
                $lunes = $conexion->query($lunes);
                $martes = $conexion->query($martes);
                $miercoles = $conexion->query($miercoles);
                $jueves = $conexion->query($jueves);
                $viernes = $conexion->query($viernes);


            } catch(\Exception $e){
                echo $e->getMessage();
            }
        ?>

          <div id="eventos" class="eventos clearfix">
                <h3 id="titulo">Elige tus talleres</h3>
                <div class="caja" id="caja">
                    <div id="talleres" class="contenido-dia clearfix">

                        <div class="detalles-evento">
                            <p>Talleres Basicos:</p>
                            <?php while($tallerbasico = $basicos->fetch_assoc()){?>
                            <label><input type="radio" name="basicos" id="<?php echo $tallerbasico['Nombre'];?>" value="<?php echo $tallerbasico['Id_Eventos'];?>"><time><?php echo $tallerbasico['Hora_Inicio'];?> - <?php echo $tallerbasico['Hora_Fin'];?></time> <?php echo $tallerbasico['Nombre'];?></label>
                            <?php }?>
                        </div>

                        <div class="detalles-evento">
                            <p>Talleres Avanzados:</p>
                            <?php while($talleravanzado = $avanzados->fetch_assoc()){?>
                            <label><input type="radio" name="avanzados" id="<?php echo $talleravanzado['Nombre'];?>" value="<?php echo $talleravanzado['Id_Eventos'];?>"><time><?php echo $talleravanzado['Hora_Inicio'];?> - <?php echo $talleravanzado['Hora_Fin'];?></time> <?php echo $talleravanzado['Nombre'];?></label>
                            <?php } ?>
                        </div>
                    </div> <!--#talleres-->
                </div><!--.caja-->

                <h3>Elige tus conferencias</h3>
                <div class="caja">
                    <div id="conferencias" class="contenido-dia clearfix">
                            <div class="detalles-evento clearfix">
                            <p>Lunes:</p>
                            <?php while($lunesc = $lunes->fetch_assoc()){?>
                            <label><input type="checkbox" name="conferencias[]" id="<?php echo $lunesc['Nombre'];?>" value="<?php echo $lunesc['Id_Eventos'];?>"><time><?php echo $lunesc['Hora_Inicio'];?> - <?php echo $lunesc['Hora_Fin'];?></time> <?php echo $lunesc['Nombre'];?></label>
                            <?php } ?>
                            </div>

                            <div class="detalles-evento clearfix">
                            <p>Martes:</p>
                            <?php while($martesc = $martes->fetch_assoc()){?>
                            <label><input type="checkbox" name="conferencias[]" id="<?php echo $martesc['Nombre'];?>" value="<?php echo $martesc['Id_Eventos'];?>"><time><?php echo $martesc['Hora_Inicio'];?> - <?php echo $martesc['Hora_Fin'];?></time> <?php echo $martesc['Nombre'];?></label>
                            <?php } ?>
                            </div>

                            <div class="detalles-evento clearfix">
                            <p>Miercoles:</p>
                            <?php while($miercolesc = $miercoles->fetch_assoc()){?>
                            <label><input type="checkbox" name="conferencias[]" id="<?php echo $miercolesc['Nombre'];?>" value="<?php echo $miercolesc['Id_Eventos'];?>"><time><?php echo $miercolesc['Hora_Inicio'];?> - <?php echo $miercolesc['Hora_Fin'];?></time> <?php echo $miercolesc['Nombre'];?></label>
                            <?php } ?>
                            </div>

                            <div class="detalles-evento clearfix">
                            <p>Jueves:</p>
                            <?php while($juevesc = $jueves->fetch_assoc()){?>
                            <label><input type="checkbox" name="conferencias[]" id="<?php echo $juevesc['Nombre'];?>" value="<?php echo $juevesc['Id_Eventos'];?>"><time><?php echo $juevesc['Hora_Inicio'];?> - <?php echo $miercolesc['Hora_Fin'];?></time> <?php echo $juevesc['Nombre'];?></label>
                            <?php } ?>
                            </div>

                            <div class="detalles-evento clearfix">
                            <p>Viernes:</p>
                            <?php while($viernesc = $viernes->fetch_assoc()){?>
                            <label><input type="checkbox" name="conferencias[]" id="<?php echo $viernesc['Nombre'];?>" value="<?php echo $viernesc['Id_Eventos'];?>"><time><?php echo $viernesc['Hora_Inicio'];?> - <?php echo $viernesc['Hora_Fin'];?></time> <?php echo $viernesc['Nombre'];?></label>
                            <?php } ?>
                            </div>
                    </div> <!--#conferencias-->
                </div><!--.caja-->
            </div> <!--#eventos-->
            <div class="contenedor">
                <input type="submit" id="btnRegistro" class="button" name="submit" value="Registrarse">
            </div>
      </form>
  </section>

  <?php include_once 'includes/templates/footer.php';?>