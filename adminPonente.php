<?php include_once('_adminHeader.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#F2F2F2;">
    <div class="container-fluid">
        <div class="col-md-12">
            <!--notification start-->
            <h1 class="text-center">¡Gestión de Ponentes!</h1>
            <hr style="border: 2px solid #000000;">
            <br>
            <div class="row">
                <div class="col-md-2">
                    <button type="button" class="btn btn-app btn-default" data-toggle="modal" data-target="#myModalAltaPonentes" style="color:black">
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
                            <th class="text-center">Fotografía</th>
                            <th class="text-center">Cédula</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellido Paterno</th>
                            <th class="text-center">Apellido Materno</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Tipo de Ponente</th>
                            <th class="text-center">Estatus</th>
                            <th class="text-center">Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Esto se obtiene desde JS-->
                        <?php
                        require_once 'Conf/sql.php';

                        $sql = new BaseDatos;
                        if ($sql->conectar()) {
                            $query = "SELECT * FROM poniente;";
                            $resultado = $sql->consulta($query);
                            while ($fila = mysqli_fetch_row($resultado)) {
                                echo '<tr id=' . $fila[0] . '>';
                                echo '<td><img style="width="120" height="80" class="center-block" src="' . $fila[6] . '"/></td>';
                                echo '<td class="text-center" style="vertical-align:middle">' . $fila[1] . '</td>';
                                echo '<td style="vertical-align:middle">' . $fila[2] . '</td>';
                                echo '<td style="vertical-align:middle">' . $fila[3] . '</td>';
                                echo '<td style="vertical-align:middle">' . $fila[4] . '</td>';
                                echo '<td style="vertical-align:middle">' . $fila[5] . '</td>';
                                echo '<td class="text-center" style="vertical-align:middle">' . $fila[7] . '</td>';
                                if ($fila[8] == "A") {
                                    echo '<td class="text-center" style="vertical-align:middle"><span id="td_Estatus" class="label label-success">Activo</span></td>';
                                } else {
                                    echo '<td class="text-center" style="vertical-align:middle"><span id="td_Estatus" class="label label-danger">Inactivo</span></td>';
                                }
                                echo '<td class="text-center" style="vertical-align:middle">';
                                echo '<div class="row">';
                                echo '<a id="' . $fila[0] . '" class="FotoPonente" href="javascript:;">';
                                echo '<i class="fa fa-camera" style="color:yellow"></i>';
                                echo '</a>';
                                echo '&nbsp;&nbsp;';
                                echo '<a id="' . $fila[0] . '" class="ModificarPonente" href="javascript:;">';
                                echo '<i class="fa fa-edit" style="color:darkblue"></i>';
                                echo '</a>';
                                echo '&nbsp;&nbsp;';
                                echo '<a id="' . $fila[0] . '" class="EliminarPonente" href="javascript:;">';
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
            <!--notification end-->
        </div>
    </div>
</div>

<!-- Modal Alta Ponente -->
<div class="modal fade" id="myModalAltaPonentes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title text-center" id="myModalLabel">Alta de Ponente</h2>
            </div>
            <div class="modal-body">
                <div class="box-input" style="max-width: 70%;  margin: 0 auto;">
                    <form id="frmAltaPonente" method="post" name="frmAltaPonente">
                        <div class="row">
                            <div class="form-group hide">
                                <input type="text" name="Funcion" class="form-control" id="Funcion" value="altaPonente" placeholder="alta" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="Cedula" class="form-control" id="Cedula" placeholder="Cédula" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="Apellido_P" class="form-control" id="Apellido_P" placeholder="Apellido Paterno" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="Apellido_M" class="form-control" id="Apellido_M" placeholder="Apellido Materno" required>
                            </div>

                            <div class="form-group">
                                <textarea type="text" name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripción" required></textarea>
                            </div>

                            <div class="form-group">
                                <select id="Tipo" name="Tipo" class="form-control">
                                    <option value="" selected="selected">Seleccionar Tipo de Ponente</option>
                                    <option value="Conferencista">Conferencista</option>
                                    <option value="Instructor">Instructor</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="filePicker">Fotografía (.jpg):</label><br>
                                <input type="file" id="filePicker" accept=".jpg">
                            </div>

                            <div class="form-group hide">
                                <textarea type="text" id="base64textarea" name="base64textarea" class="form-control" required></textarea>
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

<div class="modal fade" id="myModalModPonente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title text-center" id="myModalLabel">Modificación de Ponente</h2>
            </div>
            <div class="modal-body">
                <div class="box-input" style="max-width: 70%;  margin: 0 auto;">
                    <form id="frmModPonente" method="post" name="frmAltaPonente">
                        <div class="row">
                            <div class="form-group hide">
                                <input type="text" name="mFuncion" class="form-control" id="mFuncion" value="modificarPonente" placeholder="alta" required>
                            </div>

                            <div class="form-group hide">
                                <input type="text" name="mIdPonente" class="form-control" id="mIdPonente" placeholder="IdPonente" required>
                            </div>

                            <div class="form-group hide">
                                <input type="text" name="mCedula" class="form-control" id="mCedula" placeholder="Cédula" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="mNombre" class="form-control" id="mNombre" placeholder="Nombre" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="mApellido_P" class="form-control" id="mApellido_P" placeholder="Apellido Paterno" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="mApellido_M" class="form-control" id="mApellido_M" placeholder="Apellido Materno" required>
                            </div>

                            <div class="form-group">
                                <textarea type="text" name="mDescripcion" class="form-control" id="mDescripcion" placeholder="Descripción" required></textarea>
                            </div>

                            <div class="form-group">
                                <select id="mTipo" name="mTipo" class="form-control">
                                    <option value="" selected="selected">Seleccionar Tipo de Ponente</option>
                                    <option value="Conferencista">Conferencista</option>
                                    <option value="Instructor">Instructor</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select id="mEstatus" name="mEstatus" class="form-control">
                                    <option value="" selected="selected">Seleccionar Estatus</option>
                                    <option value="A">Activo</option>
                                    <option value="B">Inactivo</option>
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

<div class="modal fade" id="myModalFotoPonente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title text-center" id="myModalLabel">Modificar Imagen</h2>
            </div>
            <div class="modal-body">
                <div class="box-input" style="max-width: 70%;  margin: 0 auto;">
                    <form id="frmFotoPonente" method="post">
                        <div class="row">
                            <!--hide-->
                            <div class="form-group hide">
                                <input type="text" name="fotoFuncion" class="form-control" id="fotoFuncion" value="fotoPonente" required>
                            </div>

                            <div class="form-group hide">
                                <input type="text" name="fotoIdPonente" class="form-control" id="fotoIdPonente" required>
                            </div>

                            <div class="form-group">
                                <label for="filePicker">Fotografía (.jpg):</label><br>
                                <input type="file" id="fotofilePicker" accept=".jpg" required>
                            </div>

                            <div class="form-group hide">
                                <textarea type="text" id="fotobase64textarea" name="fotobase64textarea" class="form-control" required></textarea>
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

<script>
    var handleFileSelect = function(evt) {
        document.getElementById("base64textarea").value = "";
        var files = evt.target.files;
        var file = files[0];

        if (files && file) {
            var reader = new FileReader();

            reader.onload = function(readerEvt) {
                var binaryString = readerEvt.target.result;
                document.getElementById("base64textarea").value = "data:image/jpg;base64," + btoa(binaryString);
            };

            reader.readAsBinaryString(file);
        }
    };

    var handleFileSelect = function(evt) {
        document.getElementById("fotobase64textarea").value = "";
        var files = evt.target.files;
        var file = files[0];

        if (files && file) {
            var reader = new FileReader();

            reader.onload = function(readerEvt) {
                var binaryString = readerEvt.target.result;
                document.getElementById("fotobase64textarea").value = "data:image/jpg;base64," + btoa(binaryString);
            };

            reader.readAsBinaryString(file);
        }
    };

    if (window.File && window.FileReader && window.FileList && window.Blob) {
        document.getElementById('filePicker').addEventListener('change', handleFileSelect, false);
    } else {
        alert('The File APIs are not fully supported in this browser.');
    }

    if (window.File && window.FileReader && window.FileList && window.Blob) {
        document.getElementById('fotofilePicker').addEventListener('change', handleFileSelect, false);
    } else {
        alert('The File APIs are not fully supported in this browser.');
    }
</script>

<?php include_once('_adminFooter.php'); ?>