<?php include_once('_profesorHeader.php'); ?>
<?php require_once '../Conf/sql.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#F2F2F2;">

    <div class="container-fluid">
        <div class="col-lg-12">
            <!--notification start-->
            <div class="callout callout-danger ">
                <h1 class="text-center"><i class="fa fa-list"></i>&nbsp;&nbsp;¡PASE DE LISTA!</h1>
            </div>
            <hr />
            <?php echo '<h4><strong>Fecha:</strong> ' . date("d-m-Y") . '</hr4>'; ?>
            <hr />

            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Evento</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Asistencia</th>
                            <th class="text-center">Control</th>
                        </tr>
                    </thead>
                    <tbody id="listaAsistencia">
                        <?php
                        $evento = $_GET["evento"];

                        $sql = new BaseDatos;
                        if ($sql->conectar()) {
                            $query = "SELECT E.Id_Eventos, E.Nombre, R.Email, CONCAT(R.Nombre_R, ' ', R.Apellido_P_R, ' ', R.Apellido_M_R) Registrado, CURDATE(),  
                            IFNULL((SELECT Asistencia FROM asistencia WHERE Id_Eventos = E.Id_Eventos AND Fecha = CURDATE() AND Email = R.Email),0) Asistencia FROM eventos E INNER JOIN registro R ON E.Id_Eventos = R.Id_Eventos WHERE E.Id_Eventos = " . $evento . " AND CURDATE() BETWEEN E.Fecha_Inicio AND E.Fecha_Fin";
                            $resultado = $sql->consulta($query);
                            while ($fila = mysqli_fetch_row($resultado)) {
                                echo '<tr id=' . $fila[2] . '>';
                                echo '<td>' . date("d-m-Y") . '</td>';
                                echo '<td>' . $fila[1] . '</td>';
                                echo '<td>' . $fila[3] . '</td>';
                                if ($fila[5] == 1) {
                                    echo '<td class="text-center" style="vertical-align:middle"><span id="td_Estatus" class="label label-success">Presente</span></td>';
                                    echo '<td class="text-center" style="vertical-align:middle">';
                                    echo '<div class="row">';
                                    echo '<a id="' . $fila[2] . '" class="AsistenciaNoPresente" href="javascript:;">';
                                    echo '<i class="fa fa-times" style="color:red"></i>';
                                    echo '</a>';
                                    echo '</div>';
                                    echo '</tr>';
                                } else {
                                    echo '<td class="text-center" style="vertical-align:middle"><span id="td_Estatus" class="label label-danger">No Presente</span></td>';
                                    echo '<td class="text-center" style="vertical-align:middle">';
                                    echo '<div class="row">';
                                    echo '<a id="' . $fila[2] . '" class="AsistenciaPresente" href="javascript:;">';
                                    echo '<i class="fa fa-check" style="color:green"></i>';
                                    echo '</a>';
                                    echo '</div>';
                                    echo '</tr>';
                                }
                            }
                            $sql->desconectar();
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            </section>
            <!--notification end-->
        </div>
    </div>
</div>

<?php include_once('_adminFooter.php'); ?>