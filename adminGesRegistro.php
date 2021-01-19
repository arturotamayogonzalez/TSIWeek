<?php include_once('_adminHeader.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#F2F2F2;">
    <div class="container-fluid">
        <div class="col-lg-12">
            <!--notification start-->
            <div class="callout callout-tittle ">
                <h1 class="text-center">¡Gestión de Registro!</h1>
                <hr style="border: 2px solid #000000;">
                <h3 class="text-justify">Aprobación de Candidatos</h3>
            </div>
            <br>
            <hr />
            <div class="box-body table-responsive no-padding">
                <table id="tableView" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre Completo</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Matricula</th>
                            <th class="text-center">Institución</th>
                            <th class="text-center">Cursos Registrados</th>
                            <th class="text-center">Autorizado</th>
                            <th class="text-center">Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'Conf/sql.php';

                        $sql = new BaseDatos;
                        if ($sql->conectar()) {
                            $query = "SELECT Email, CONCAT(Nombre_R, ' ', Apellido_P_R, ' ', Apellido_M_R) Nombre, Tipo, Matricula, Institucion, COUNT(Id_Eventos) Registros, EnvioCorreo FROM registro GROUP BY Email,CONCAT(Nombre_R, ' ', Apellido_P_R, ' ', Apellido_M_R), Tipo, Matricula, EnvioCorreo ORDER BY 2 ASC;";
                            $resultado = $sql->consulta($query);
                            while ($fila = mysqli_fetch_row($resultado)) {
                                echo '<tr id=' . $fila[0] . '>';
                                echo '<td>' . $fila[1] . '</td>';
                                echo '<td>' . $fila[0] . '</td>';
                                echo '<td>' . $fila[2] . '</td>';
                                echo '<td class="text-center">' . $fila[3] . '</td>';
                                echo '<td class="text-center">' . $fila[4] . '</td>';
                                echo '<td class="text-center" style="vertical-align:middle">';
                                echo '<div class="row">';
                                echo '<a id="' . $fila[0] . '" class="VerRegistro" href="javascript:;">';
                                echo '<i class="fa fa-eye" style="color:darkblue"></i>';
                                echo '</a>';
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                                echo '<i>' . $fila[5] . '</i>';
                                echo '</div>';
                                echo '</td>';
                                if($fila[6] == 'Enviado')
                                {
                                    echo '<td class="text-center" style="vertical-align:middle"><span id="td_Estatus" class="label label-success">Enviado</span></td>';
                                }else {
                                    echo '<td class="text-center" style="vertical-align:middle"><span id="td_Estatus" class="label label-danger">No Enviado</span></td>';
                                }
                                echo '<td class="text-center" style="vertical-align:middle">';
                                echo '<div class="row">';
                                echo '<a id="' . $fila[0] . '" class="EnviarRegistro" href="javascript:;">';
                                echo '<i class="fa fa-paper-plane" style="color:darkblue"></i>';
                                echo '</a>';
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                                echo '<a id="' . $fila[0] . '" class="EliminarRegistro" href="javascript:;">';
                                echo '<i class="fa fa-trash-o" style="color:red"></i>';
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


<div class="modal fade" id="myModalVerRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title text-center" id="myModalLabel">Detalle de Registro</h2>
            </div>
            <div class="modal-body">
                <div class="box-input" style="max-width: 100%;  margin: 0 auto;">
                    <table class='bottomBorder'>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Curso</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                            </tr>
                        </thead>
                        <tbody id="verRegistroConsultado">
                            
                        </tbody>
                    </table>
                    </body>

                    </html>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('_adminFooter.php'); ?>