<?php include_once('_adminHeader.php'); ?>
<?php require_once 'Conf/sql.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#F2F2F2;">
    <div class="container-fluid">
        <div class="col-lg-12">
            <!--notification start-->
            <div class="callout callout-deafult ">
                <h1 class="text-center">¡Gestión de Categoria de Eventos!</h1>
                <hr style="border: 2px solid #000000;">
            </div>
            <br>
            <div class="row">
                <div class="col-md-2 col-md-offset-1 col-xs-4">
                    <button type="button" class="btn btn-app btn-default" data-toggle="modal" data-target="#myModalAltaCEventos" style="color:black">
                        <i class="fa fa-calendar"></i>
                        <p style="font-size:16px ">Alta</p>
                    </button>
                </div>

                <div class="col-md-10 col-xs-8">

                </div>
            </div>
            <hr />
            <div class="box-body table-responsive no-padding">
                <table id="tableView" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Tipo de Evento</th>
                            <th class="text-center">Icono del Evento</th>
                            <th class="text-center">Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = new BaseDatos;
                        if ($sql->conectar()) {
                            $query = "SELECT * FROM categoria_evento";
                            $resultado = $sql->consulta($query);
                            while ($fila = mysqli_fetch_row($resultado)) {
                                echo '<tr id=' . $fila[0] . '>';
                                echo '<td>' . $fila[1] . '</td>';
                                echo '<td><i class="fa ' . $fila[2] . '"></i> ' . $fila[2] . '</td>';
                                echo '<td class="text-center" style="vertical-align:middle">';
                                echo '<div class="row">';
                                echo '<a id="' . $fila[0] . '" class="EliminarCatEvento" href="javascript:;">';
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

<!-- Modal Alta Evento -->
<div class="modal fade" id="myModalAltaCEventos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title text-center" id="myModalLabel">Alta de Categoria de Evento</h2>
            </div>
            <div class="modal-body">
                <div class="box-input" style="max-width: 70%;  margin: 0 auto;">
                    <form method="post" id="frmAltaCEventos" name="frmAltaCEventos">
                        <div class="row">
                            <div class="form-group hide">
                                <input type="text" name="Funcion" class="form-control" id="Funcion" value="altaCEventos" required>
                            </div>

                            <!--Nombre del Evento-->
                            <div class="form-group">
                                <input type="text" name="TipoEvento" class="form-control" id="TipoEvento" placeholder="Tipo de Evento" required>
                            </div>

                            <!--Categoria del evento-->
                            <div class="form-group">
                                <select id="CategoriaEvento" name="CategoriaEvento" class="form-control">
                                    <option value="null" selected="selected">Seleccionar Icono del Evento</option>
                                    <option value="fa-code">fa-code</option>
                                    <option value="fa-comment">fa-comment</option>
                                    <option value="fa-university">fa-university</option>
                                    <option value="fa-users fa-laptop">fa-users</option>
                                    <option value="fa-laptop">fa-laptop</option>
                                </select>
                            </div>

                            <div class="form-group">

                                <p style="font-size:16px "><i class="fa fa-code"></i> fa-code</p>
                                <p style="font-size:16px "><i class="fa fa-comment"></i> fa-comment</p>
                                <p style="font-size:16px "><i class="fa fa-users fa-laptop"></i> fa-university</p>
                                <p style="font-size:16px "><i class="fa fa-users"></i> fa-users</p>
                                <p style="font-size:16px "><i class="fa fa-laptop"></i> fa-laptop</p>
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