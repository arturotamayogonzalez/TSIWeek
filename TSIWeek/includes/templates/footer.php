
  <footer class="site-footer">
    <div class="contenedor clearfix">
      <div class="footer-informacion">
        <h3>Comite <span>Organizador</span></h3>
        <p>Dr. Carlos Roberto Jaimez Gonzalez</p>
        <p>Dr. Francisco de Asís López Fuentes</p>
        <p>Mtra. Gabriela Ramirez de la Rosa</p>
        <p>Dr. Carlos Rodríguez Lucatero</p>
        <p>Bejamín Carrera Carrera</p>
        <p>Francisco Javier Erazo Palacios</p>
        <p>Ángeles López Flores</p>
        <p>Erika Sarai Rosas Quezada</p>
        <p>Tonantzin Angélica Siorub Palomero</p>
      </div>
      <div class="ultimos-tweets">
        <h3>Ultimos <span>tweets</span></h3>
        <a class="twitter-timeline" data-lang="es" data-width="500" data-height="240" data-theme="dark" href="https://twitter.com/TSIUAMC">Tweets Liked by @TSIUAMC</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
      <div class="menu">
        <h3>Redes <span>sociales</span></h3>
        <nav class="redes-sociales">
          <a href="https://www.facebook.com/Licenciatura-en-Tecnolog%C3%ADas-y-Sistemas-de-Informaci%C3%B3n-UAM-Cuajimalpa-271221536242/"><i class="fab fa-facebook-f"></i></a>
          <a href="https://twitter.com/TSIUAMC"><i class="fab fa-twitter"></i></a>
          <a href="https://www.youtube.com/channel/UCfSv7JphGxXQkrcq87vjvbQ"><i class="fab fa-youtube"></i></a>
          <a href="https://www.instagram.com/uamdccd/"><i class="fab fa-instagram"></i></a>
        </nav>
      </div>
    </div>
    <p class="copyright">Todos los derechos reservados TSI WEEK 2019.</p>
  </footer>

  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.js"></script>
  <script src="js/jquery.countdown.js"></script>
  <script src="js/jquery.lettering.js"></script>
  <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if($pagina == 'invitados' || $pagina == 'index'){
        echo '<script src="js/jquery.colorbox-min.js"></script>';
        echo '<script src="js/jquery.waypoints.min.js"></script>';
    }else if($pagina == 'galeria'){
        echo '<script src="js/lightbox.js"></script>';
    }
  ?>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>