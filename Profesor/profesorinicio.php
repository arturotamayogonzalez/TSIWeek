<?php include_once('_profesorHeader.php'); ?>
<?php require_once '../Conf/sql.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#F2F2F2;">
    <div style="max-width: 90%;  margin: 0 auto;">
        <br />
        <!-- page start-->
        <div class="row">
            <div class="col-md-12">
                <!-- Main content -->
                <section class="content">
                    <div class="callout">
                        <h1 class="text-center">¡BIENVENIDO INSTRUCTOR!</h1>
                        <hr>
                        <h2 class="text-center">Esta sección esta dedica para realizar el pase de lista de los alumnos.</h2>

                    </div>
                    <br />
                    <div class="row">
                        <?php
                        $prof = $_GET["profesor"];
                        //echo $prof . '<br/>';

                        $sql = new BaseDatos;
                        if ($sql->conectar()) {
                            $query  = "SELECT P.Cedula, CONCAT(P.Nombre_P, ' ', P.Apellido_P, ' ', P.Apellido_M) Nombre, E.Id_Eventos, E.Nombre, COUNT(R.Email) Registros FROM poniente P INNER JOIN eventos E ON E.Id_Poniente = P.Id_Poniente INNER JOIN registro R ON R.Id_Eventos = E.Id_Eventos WHERE P.Cedula = '" . $prof . "' GROUP BY P.Cedula,CONCAT(P.Nombre_P, ' ', P.Apellido_P, ' ', P.Apellido_M), E.Id_Eventos, E.Nombre ORDER BY 1 ASC";

                            //echo $query;
                            $resultado = $sql->consulta($query);
                            while ($fila = mysqli_fetch_row($resultado)) {
                                echo '<div class="small-box bg-yellow">';
                                echo '  <div class="inner">';
                                echo '    <h3>' . $fila[4] . '</h3>';
                                echo '    <p>Alumnos Registrados a ' . $fila[3] . '</p>';
                                echo '  </div>';
                                echo '  <div class="icon">';
                                echo '    <i class="ion ion-person-add"></i>';
                                echo '  </div>';
                                echo '  <a href="profesorPaselista.php?evento=' . $fila[2] . '" class="small-box-footer">';
                                echo '    Ir a lista <i class="fa fa-arrow-circle-right"></i>';
                                echo '  </a>';
                                echo '</div>';
                            }
                            $sql->desconectar();
                        } else {
                            echo 'error';
                        }
                        ?>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </div>
</div>
<?php include_once('../_adminFooter.php'); ?>