<?php include_once('_adminHeader.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#F2F2F2;">

    <div class="container-fluid">
        <div class="col-lg-12">
            <!--notification start-->
            <div class="callout callout-default ">
                <h1 class="text-center">¡Notificación de Constancias!</h1>
                <hr style="border: 2px solid #000000;">
            </div>
            <h3> Los siguentes usuarios acreditaron los talleres, favor de aprobar el envio de las constancias.</h3>

            <div class="box-body table-responsive no-padding">
                <table id="tableView" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Taller Registrado</th>
                            <th class="text-center">Nombre Completo</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center">Constancia</th>
                            <th class="text-center">Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'Conf/sql.php';

                        $sql = new BaseDatos;
                        if ($sql->conectar()) {
                            $query = "SELECT E.Id_Eventos, E.Nombre, R.Email, CONCAT(R.Nombre_R, ' ', R.Apellido_P_R, ' ', R.Apellido_M_R) Nombre,  IFNULL(R.EnvioConstancia, 'No enviado') EnvioConstancia FROM registro R INNER JOIN eventos E ON E.Id_Eventos = R.Id_Eventos WHERE R.Tipo = 'Alumno' AND IFNULL(R.EnvioConstancia, 'No enviado') <> 'Enviado' AND E.Id_CategoriaEvento IN (1,2) GROUP BY E.Id_Eventos, E.Nombre, R.Email, CONCAT(R.Nombre_R, ' ', R.Apellido_P_R, ' ', R.Apellido_M_R),  R.EnvioConstancia ORDER BY 2 ASC";
                            $resultado = $sql->consulta($query);
                            while ($fila = mysqli_fetch_row($resultado)) {
                                echo '<tr id=' . $fila[0] . '>';
                                echo '<td>' . $fila[1] . '</td>';
                                echo '<td>' . $fila[3] . '</td>';
                                echo '<td>' . $fila[2] . '</td>';
                                if ($fila[4] == 'Enviado') {
                                    echo '<td class="text-center" style="vertical-align:middle"><span class="label label-success">Enviado</span></td>';
                                } else {
                                    echo '<td class="text-center" style="vertical-align:middle"><span class="label label-danger">No Enviado</span></td>';
                                }
                                echo '<td class="text-center" style="vertical-align:middle">';
                                echo '<div class="row">';
                                echo '<a id="' . $fila[0] . '" class="EnviarConstancia" href="javascript:;">';
                                echo '<i class="fa fa-paper-plane" style="color:darkblue"></i>';
                                echo '</a>';
                                echo '</div>';
                                echo '</td>';
                                echo '</tr>';
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