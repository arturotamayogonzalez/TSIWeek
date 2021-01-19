
<?php include_once 'includes/templates/header.php';?>

  <section class="seccion contenedor">     

      <?php if(isset($_POST['submit'])): 
        $nombre = $_POST['nombre'];
        $apellidoP = $_POST['apellidoP'];
        $apellidoM = $_POST['apellidoM'];
        $email = $_POST['email'];
        $visitante = $_POST['visitante'];
        $matricula = $_POST['matricula'];
        $procedencia = $_POST['procedencia'];
        $basicos = $_POST['basicos'];
        $avanzados = $_POST['avanzados'];
        $conferencias = $_POST['conferencias'];

        
        //Eventos
          try{
            require_once('includes/funciones/bd_conexion.php');
            $sql = "INSERT INTO registro (Nombre_R, Apellido_P_R, Apellido_M_R, Email, Tipo, Matricula, Institucion, id_Eventos) VALUES ('$nombre', '$apellidoP', '$apellidoM', '$email', '$visitante', '$matricula', '$procedencia', '$basicos')";
            $conexion->query($sql);

            $sql2 = "INSERT INTO registro (Nombre_R, Apellido_P_R, Apellido_M_R, Email, Tipo, Matricula, Institucion, id_Eventos) VALUES ('$nombre', '$apellidoP', '$apellidoM', '$email', '$visitante', '$matricula', '$procedencia', '$avanzados')";
            $conexion->query($sql2);

            foreach ( $_POST["conferencias"] as $conferencia ) { 
              $sql3 = "INSERT INTO registro (Nombre_R, Apellido_P_R, Apellido_M_R, Email, Tipo, Matricula, Institucion, id_Eventos) VALUES ('$nombre', '$apellidoP', '$apellidoM', '$email', '$visitante', '$matricula', '$procedencia', '$conferencia')";
            $conexion->query($sql3);
            }
            }catch(\Exception $e){
              echo $e->getMessage();
            }
        ?>
      <?php endif; ?>
      <h2>Tu registro fue exitoso</h2>

    </section>

<?php include_once 'includes/templates/footer.php';?>