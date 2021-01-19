
<?php include_once 'includes/templates/header.php';?>

  <section class="seccion contenedor">
    <h2>3a. Semana de Tecnologías y Sistemas de Información</h2>
    <p>Aprende, actualízate, descrube y déjate asombrar por el mundo de la tecnología</p>
  </section>

  <section class="programa">

    <div class="contenedor-video">
      <video autoplay loop poster="img/bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogv">
      </video>
    </div> <!--Contenedor Video-->

    <div class="contenido-programa"> <!-- Apertura de contenido-programa -->
    <div class="contenedor"> <!-- Apertura de contenedor -->
      <div class="programa-evento"> <!-- Apertura de programa-evento -->
        <h2>Programa del Evento</h2>
 
        <?php //Imprimir los programas del evento con php en el menu de Programa del Evento
        try {
          require_once('includes/funciones/bd_conexion.php'); //Conectamos a la base de datos
          $sql = " SELECT * FROM categoria_evento WHERE ID_CategoriaEvento = 1 OR ID_CategoriaEvento = 2 OR ID_CategoriaEvento = 3;"; //Realizamos la consulta en la tabla de nuestra base de datos en donde tenemos guardamos nuestros eventos
          $resultado = $conexion->query($sql); //Funcion de PHP para hacer consultas, realizamos nuestra consulta y guardamos el dato en resultado.
        } catch (\Exception $e) {
          echo $e->getMessage(); //Para atrapar el mensaje de error
        }
        ?>
 
        <nav class="menu-programa">
          <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { //funcion para imprimir resultados, siempre que se trabaje con ella hay que ponerla dentro de un while para imprimir varios elementos, va a rrecorer el arreglo. Cambie en la base de datos conferencias por conferencia y seminario por seminarios por que me estaban dando error al ser llamadas?>
          <?php $categoria = $cat['Tipo_Evento']; ?>
          <a href="#<?php echo strtolower($categoria) ?>"><i class="fas <?php echo $cat['Icono_Evento']; ?>" aria-hidden="true"></i> <?php echo $categoria //Recordan que se activan y desactivan las clases con jQuery y CSS ?></a>
        <?php } ?>
        </nav>
 
        <?php
        try {
          require_once('includes/funciones/bd_conexion.php'); //Realizamos una multiconsulta seleccionando los elementos de categorias por su id y asignandole un limite de 2, luego utilizamos un do while con multi_query para poder imprimirlos ya que sino se imprime uno id.
          $sql = " SELECT Id_Eventos, Nombre, Fecha_Inicio, Hora_Inicio, Tipo_Evento, Icono_Evento, Nombre_P, Apellido_P ";
          $sql .= " FROM eventos";
          $sql .= " INNER JOIN categoria_evento ";
          $sql .= " ON eventos.Id_CategoriaEvento = categoria_evento.ID_CategoriaEvento ";
          $sql .= " INNER JOIN poniente ";
          $sql .= " ON eventos.Id_Poniente = poniente.Id_Poniente ";
          $sql .= " AND eventos.Id_CategoriaEvento = 1 ";
          $sql .= " ORDER BY Id_Eventos LIMIT 2;";
          $sql .= " SELECT Id_Eventos, Nombre, Fecha_Inicio, Hora_Inicio, Tipo_Evento, Icono_Evento, Nombre_P, Apellido_P ";
          $sql .= " FROM eventos";
          $sql .= " INNER JOIN categoria_evento ";
          $sql .= " ON eventos.Id_CategoriaEvento = categoria_evento.ID_CategoriaEvento ";
          $sql .= " INNER JOIN poniente ";
          $sql .= " ON eventos.Id_Poniente = poniente.Id_Poniente ";
          $sql .= " AND eventos.Id_CategoriaEvento = 2 ";
          $sql .= " ORDER BY Id_Eventos LIMIT 2;";
          $sql .= " SELECT Id_Eventos, Nombre, Fecha_Inicio, Hora_Inicio, Tipo_Evento, Icono_Evento, Nombre_P, Apellido_P ";
          $sql .= " FROM eventos";
          $sql .= " INNER JOIN categoria_evento ";
          $sql .= " ON eventos.Id_CategoriaEvento = categoria_evento.ID_CategoriaEvento ";
          $sql .= " INNER JOIN poniente ";
          $sql .= " ON eventos.Id_Poniente = poniente.Id_Poniente ";
          $sql .= " AND eventos.Id_CategoriaEvento = 3 ";
          $sql .= " ORDER BY Id_Eventos LIMIT 2;";
        } catch (\Exception $e) {
          echo $e->getMessage(); //Para atrapar el mensaje de error
        }
        ?>
 
        <?php $conexion->multi_query($sql); //Para realizar consulta multiquery?>
 
        <?php
        do {
          $resultado = $conexion->store_result();
          //$row = $resultado->fetch_all(MYSQLI_ASSOC); ?>
 
          <?php $i = 0; ?>
          <?php while($evento = $resultado->fetch_assoc() ): ?>
          <?php
            if($i % 2 == 0) { ?>
          <div id="<?php echo strtolower($evento['Tipo_Evento']) ?>" class="info-curso ocultar clearfix"> <!-- Apertura de talleres -->
          <?php } ?>
            <div class="detalle-evento"> <!-- Apertura de detalle-evento -->
              <h3><?php echo html_entity_decode($evento['Nombre']) ?></h3>
              <p><i class="far fa-clock"></i> <?php echo $evento['Hora_Inicio'];?></p>
              <p><i class="far fa-calendar-alt"></i> <?php echo $evento['Fecha_Inicio'];?></p>
              <p><i class="fas fa-user"></i> <?php echo $evento['Nombre_P'] . " " . $evento['Apellido_P'] ;?></p>
            </div> <!-- Cierre de detalle-evento -->
 
 
            <?php if($i % 2 == 1): ?>
              <a href="calendario.php" class="button float-right">Ver todos</a>
          </div> <!-- Cierre de talleres -->
        <?php endif; ?>
          <?php $i++; ?>
        <?php endwhile; ?>
        <?php $resultado->free(); ?>
      <?php } while ($conexion->more_results() && $conexion->next_result());?>
      </div> <!-- Cierre de programa-evento -->
    </div> <!-- Cierre de contenedor -->
  </div> <!-- Cierre de contenido-programa -->
</section> <!-- Cierre de Sección programa (Padre de todo el contenedor)-->

<h2>Resumen</h2>
  <div class="contador parallax">
    <div class="contenedor">
      <ul class="resumen-evento clearfix">
        <li><p class="numero"></p> Invitados</li>
        <li><p class="numero"></p> Talleres</li>
        <li><p class="numero"></p> Dias</li>
        <li><p class="numero"></p> Conferencias</li>
      </ul>
    </div>
  </div>

  <?php include_once 'includes/templates/invitados.php';?>

  <h2>Ubicación</h2>
  <div id="mapa" class="mapa"></div>

  <section class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">
      <div class="testimonial">
        <blockquote>
          <p>La mejor oportunidad para que los estudiantes se empapen de toda la información que ofrece el evento. Personalmente dejo que mis alumnos aprovechen la semana de la licenciatura para que enriquezcan sus conocimientos.</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial1.jpg" alt="Testimonial">
            <cite>Christian Lemaître León<span>Profesor</span></cite>
          </footer>
        </blockquote>
      </div> <!--Testimonial-->
      <div class="testimonial">
        <blockquote>
          <p>El evento que cada año espero con asias, ojalá se hicieran más semanas cómo esta. Los talleres, las conferencias y la convivencia son cosas que se han tomado muy enserio la coordinación para este evento. ¡La mejor semana! </p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial2.jpg" alt="Testimonial">
            <cite>Javier Erazo<span>Alumno</span></cite>
          </footer>
        </blockquote>
      </div> <!--Testimonial-->
      <div class="testimonial">
        <blockquote>
          <p>La mejor semana de la licenciatura, sin duda alguna abre mi panorama para mantenerme informado y actualizado acerca de lo que sucede en el contexto de mi licenciatura. Es la experiencia de la que nunca me arrepentire</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial3.jpg" alt="Testimonial">
            <cite>Christopher Ramirez<span>Alumno</span></cite>
          </footer>
        </blockquote>
      </div> <!--Testimonial-->
    </div>
  </section>

  <div class="newsletter parallax">
    <div class="contenido contenedor">
      <p>Regístrate y vive la experiencia</p>
      <h3>tsiweek</h3>
      <a href="registro.php" class="button transparent">Registro</a>
    </div>
  </div>

  <section class="seccion">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva contenedor">
      <ul class="clearfix">
        <li><p id="dias" class="numero">0</p> Días</li>
        <li><p id="horas" class="numero">0</p> Horas</li>
        <li><p id="minutos" class="numero">0</p> Minutos</li>
        <li><p id="segundos" class="numero">0</p> Segundos</li>
      </ul>
    </div>
  </section>

  <?php include_once 'includes/templates/footer.php';?>