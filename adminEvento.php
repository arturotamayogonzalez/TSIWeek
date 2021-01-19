<?php include_once('_adminHeader.php'); ?>
<?php require_once 'Conf/sql.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#F2F2F2;">
    <div class="container-fluid">
        <div class="col-md-12">
            <!--notification start-->
            <div class="callout callout-default ">
                <h1 class="text-center">¡Gestión de Eventos!</h1>
                <hr style="border: 2px solid #000000;">
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <button type="button" class="btn btn-app btn-default" data-toggle="modal" data-target="#myModalAltaEventos" style="color:black">
                        <i class="fa fa-upload"></i>
                        <p style="font-size:16px ">Alta</p>
                    </button>
                </div>
            </div>
            <hr />
            <div class="box-body table-responsive no-padding">
                <table id="tableView" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Fecha Inicio</th>
                            <th class="text-center">Fecha Fin</th>
                            <th class="text-center">Hora Inicio</th>
                            <th class="text-center">Hora Fin</th>
                            <th class="text-center">Evento</th>
                            <th class="text-center">Ubicacion</th>
                            <th class="text-center">Ponente</th>
                            <th class="text-center">Controles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = new BaseDatos;
                        if ($sql->conectar()) {
                            $query = "SELECT E.Id_Eventos, E.Nombre, E.Fecha_Inicio, E.Hora_Inicio, E.Fecha_Fin, E.Hora_Fin, C.Tipo_Evento, U.Nombre_U, CONCAT_WS(' ', P.Nombre_P, P.Apellido_P, P.Apellido_M) Ponente FROM eventos E INNER JOIN categoria_evento C ON E.Id_CategoriaEvento = C.ID_CategoriaEvento INNER JOIN ubicacion U ON U.Id_Ubicacion = E.Id_Ubicacion INNER JOIN poniente P ON P.Id_Poniente = E.Id_Poniente";
                            $resultado = $sql->consulta($query);
                            while ($fila = mysqli_fetch_row($resultado)) {
                                echo '<tr id=' . $fila[0] . '>';
                                echo '<td>' . $fila[1] . '</td>';
                                echo '<td>' . date("d-m-Y", strtotime($fila[2])) . '</td>';
                                echo '<td>' . date("d-m-Y", strtotime($fila[4])) . '</td>';
                                echo '<td>' . date("h:i A", strtotime($fila[3])) . '</td>';
                                echo '<td>' . date("h:i A", strtotime($fila[5])) . '</td>';
                                echo '<td>' . $fila[6] . '</td>';
                                echo '<td>' . $fila[7] . '</td>';
                                echo '<td>' . $fila[8] . '</td>';
                                echo '<td class="text-center" style="vertical-align:middle">';
                                echo '<div class="row">';
                                echo '<a id="' . $fila[0] . '" class="ModificarEvento" href="javascript:;">';
                                echo '<i class="fa fa-edit" style="color:darkblue"></i>';
                                echo '</a>';
                                echo '&nbsp;&nbsp;';
                                echo '<a id="' . $fila[0] . '" class="EliminarEvento" href="javascript:;">';
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
        </div>
    </div>
</div>

<div class="modal fade" id="myModalAltaEventos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title text-center" id="myModalLabel">Alta de Evento</h2>
            </div>
            <div class="modal-body">
                <div class="box-input" style="max-width: 70%;  margin: 0 auto;">
                    <form id="frmAltaEvento" method="post">
                        <div class="row">
                            <!--hide-->
                            <div class="form-group hide">
                                <input type="text" name="Funcion" class="form-control" id="Funcion" value="altaEvento" placeholder="alta" required>
                            </div>

                            <!--Nombre del Evento-->
                            <div class="form-group">
                                <input type="text" name="NombreEvento" class="form-control" id="NombreEvento" placeholder="Nombre del Evento" required>
                            </div>

                            <!--Fecha y hora de inicio-->
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <!--Data Picker-->
                                <div class="form-group">
                                    <label>Fecha y hora de inicio:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker" id="fechaIni" name="fechaIni">
                                    </div>
                                </div>

                                <!--Time Picker-->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" id="horaIni" name="horaIni">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Fecha y hora de fin-->
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <!--Data Picker-->
                                <div class="form-group">
                                    <label>Fecha y hora de fin:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker" id="fechaFin" name="fechaFin">
                                    </div>
                                </div>

                                <!--Time Picker-->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" id="horaFin" name="horaFin" value="">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Categoria del evento-->
                            <div class="form-group">
                                <select id="CategoriaEvento" name="CategoriaEvento" class="form-control">
                                    <option value="" selected="selected">Seleccionar la Categoria del Evento</option>
                                    <?php
                                    $sql = new BaseDatos;
                                    if ($sql->conectar()) {
                                        $query = "SELECT * FROM categoria_evento";
                                        $resultado = $sql->consulta($query);
                                        while ($fila = mysqli_fetch_row($resultado)) {
                                            echo '<option value=' . $fila[0] . '>' . $fila[1] . '</option>';
                                        }
                                        $sql->desconectar();
                                    }
                                    ?>
                                </select>
                            </div>

                            <!--Seleccionar Ubicación del evento-->
                            <div class="form-group">
                                <select id="CategoriaUbicacion" name="CategoriaUbicacion" class="form-control">
                                    <option value="" selected="selected">Seleccionar la Ubicación del Evento</option>
                                    <?php
                                    $sql = new BaseDatos;
                                    if ($sql->conectar()) {
                                        $query = "SELECT * FROM ubicacion";
                                        $resultado = $sql->consulta($query);
                                        while ($fila = mysqli_fetch_row($resultado)) {
                                            echo '<option value=' . $fila[0] . '>' . $fila[1] . '</option>';
                                        }
                                        $sql->desconectar();
                                    }
                                    ?>
                                </select>
                            </div>

                            <!--Categoria Poniente-->
                            <div class="form-group">
                                <select id="CategoriaPoniente" name="CategoriaPoniente" class="form-control">
                                    <option value="" selected="selected">Seleccionar un Ponente</option>
                                    <?php
                                    $sql = new BaseDatos;
                                    if ($sql->conectar()) {
                                        $query = "SELECT Id_Poniente, CONCAT_WS(' ', Nombre_P, Apellido_P, Apellido_M) FROM poniente ORDER BY 2";
                                        $resultado = $sql->consulta($query);
                                        while ($fila = mysqli_fetch_row($resultado)) {
                                            echo '<option value=' . $fila[0] . '>' . $fila[1] . '</option>';
                                        }
                                        $sql->desconectar();
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group has-feedback col-md-6 col-md-offset-3">
                                <br />
                                <input type="submit" class="btn btn-google btn-block text-center" value="Guardar..." />
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalModEventos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title text-center" id="myModalLabel">Modificación de Evento</h2>
            </div>
            <div class="modal-body">
                <div class="box-input" style="max-width: 70%;  margin: 0 auto;">
                    <form id="frmModEvento" method="post">
                        <div class="row">
                            <!--hide-->
                            <div class="form-group hide">
                                <input type="text" name="mFuncion" class="form-control" id="mFuncion" value="modificarEvento" required>
                            </div>

                            <div class="form-group hide">
                                <input type="text" name="mIdEvento" class="form-control" id="mIdEvento" value="modificarEvento" required>
                            </div>

                            <!--Nombre del Evento-->
                            <div class="form-group">
                                <input type="text" name="mNombreEvento" class="form-control" id="mNombreEvento" placeholder="Nombre del Evento" required>
                            </div>

                            <!--Fecha y hora de inicio-->
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <!--Data Picker-->
                                <div class="form-group">
                                    <label>Fecha y hora de inicio:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker" id="mfechaIni" name="mfechaIni">
                                    </div>
                                </div>

                                <!--Time Picker-->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" id="mhoraIni" name="mhoraIni">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Fecha y hora de fin-->
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <!--Data Picker-->
                                <div class="form-group">
                                    <label>Fecha y hora de fin:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker" id="mfechaFin" name="mfechaFin">
                                    </div>
                                </div>

                                <!--Time Picker-->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" id="mhoraFin" name="mhoraFin" value="">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Categoria del evento-->
                            <div class="form-group">
                                <select id="mCategoriaEvento" name="mCategoriaEvento" class="form-control">
                                    <option value="" selected="selected">Seleccionar la Categoria del Evento</option>
                                    <?php
                                    $sql = new BaseDatos;
                                    if ($sql->conectar()) {
                                        $query = "SELECT * FROM categoria_evento";
                                        $resultado = $sql->consulta($query);
                                        while ($fila = mysqli_fetch_row($resultado)) {
                                            echo '<option value=' . $fila[0] . '>' . $fila[1] . '</option>';
                                        }
                                        $sql->desconectar();
                                    }
                                    ?>
                                </select>
                            </div>

                            <!--Seleccionar Ubicación del evento-->
                            <div class="form-group">
                                <select id="mCategoriaUbicacion" name="mCategoriaUbicacion" class="form-control">
                                    <option value="" selected="selected">Seleccionar la Ubicación del Evento</option>
                                    <?php
                                    $sql = new BaseDatos;
                                    if ($sql->conectar()) {
                                        $query = "SELECT * FROM ubicacion";
                                        $resultado = $sql->consulta($query);
                                        while ($fila = mysqli_fetch_row($resultado)) {
                                            echo '<option value=' . $fila[0] . '>' . $fila[1] . '</option>';
                                        }
                                        $sql->desconectar();
                                    }
                                    ?>
                                </select>
                            </div>

                            <!--Categoria Poniente-->
                            <div class="form-group">
                                <select id="mCategoriaPoniente" name="mCategoriaPoniente" class="form-control">
                                    <option value="" selected="selected">Seleccionar un Poniente</option>
                                    <?php
                                    $sql = new BaseDatos;
                                    if ($sql->conectar()) {
                                        $query = "SELECT Id_Poniente, CONCAT_WS(' ', Nombre_P, Apellido_P, Apellido_M) FROM poniente ORDER BY 2";
                                        $resultado = $sql->consulta($query);
                                        while ($fila = mysqli_fetch_row($resultado)) {
                                            echo '<option value=' . $fila[0] . '>' . $fila[1] . '</option>';
                                        }
                                        $sql->desconectar();
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group has-feedback col-md-6 col-md-offset-3">
                                <br />
                                <input type="submit" class="btn btn-google btn-block text-center" value="Guardar..." />
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('_adminFooter.php'); ?>