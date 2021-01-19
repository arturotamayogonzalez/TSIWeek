<?php include_once('_adminHeader.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:#F2F2F2;">
    <div>
        <div class="col-lg-12">
            <!--notification start-->

            <div class="callout">
                <h1 class="text-center">¡Gestión de Usuarios!</h1>
                <hr style="border: 2px solid #000000;">
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button type="button" class="btn btn-app btn-default" data-toggle="modal" data-target="#myModalAltaUsuario" style="color:black">
                        <i class="fa fa-upload"></i>
                        <p style="font-size:16px ">Alta</p>
                    </button>
                </div>
            </div>
            <br>
            <hr />
            <div class="box-body table-responsive no-padding">
                <table id="tableView" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellido Paterno</th>
                            <th class="text-center">Apellido Materno</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center">N°Empleado</th>
                            <th class="text-center">Estatus</th>
                            <th class="text-center">Rol</th>
                            <th class="text-center">Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'Conf/sql.php';

                        $sql = new BaseDatos;
                        if ($sql->conectar()) {
                            $query = "SELECT Id_Usuario, Nombre, Apellido_P, Apellido_M, Email, Matricula, Estatus, Rol FROM usuario;";
                            $resultado = $sql->consulta($query);
                            while ($fila = mysqli_fetch_row($resultado)) {
                                echo '<tr id=' . $fila[0] . '>';
                                echo '<td>' . $fila[1] . '</td>';
                                echo '<td>' . $fila[2] . '</td>';
                                echo '<td>' . $fila[3] . '</td>';
                                echo '<td>' . $fila[4] . '</td>';
                                echo '<td class="text-center">' . $fila[5] . '</td>';
                                if ($fila[6] == "A") {
                                    echo '<td class="text-center" style="vertical-align:middle"><span id="td_Estatus" class="label label-success">Activo</span></td>';
                                } else {
                                    echo '<td class="text-center" style="vertical-align:middle"><span id="td_Estatus" class="label label-danger">Inactivo</span></td>';
                                }
                                echo '<td>' . $fila[7] . '</td>';
                                echo '<td class="text-center" style="vertical-align:middle">';
                                echo '<div class="row">';
                                echo '<a id="' . $fila[0] . '" class="PasswordUsuario" href="javascript:;">';
                                echo '<i class="fa fa-key" style="color:yellow"></i>';
                                echo '</a>';
                                echo '&nbsp;&nbsp;';
                                echo '<a id="' . $fila[0] . '" class="ModificarUsuario" href="javascript:;">';
                                echo '<i class="fa fa-edit" style="color:darkblue"></i>';
                                echo '</a>';
                                echo '&nbsp;&nbsp;';
                                echo '<a id="' . $fila[0] . '" class="EliminarUsuario" href="javascript:;">';
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
        </div>
    </div>
</div>

<!-- Modal Alta Usuarios -->
<div class="modal fade" id="myModalAltaUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title text-center" id="myModalLabel">Alta de Usuario</h2>
            </div>
            <div class="modal-body">
                <div class="box-input" style="max-width: 70%;  margin: 0 auto;">
                    <form id="frmAltaUsuario" method="post">
                        <div class="row">
                            <!--hide-->
                            <div class="form-group hide">
                                <input type="text" name="Funcion" class="form-control" id="Funcion" value="altaUsuario" placeholder="alta" required>
                            </div>

                            <!--Nombre del Usuario-->
                            <div class="form-group">
                                <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre del Usuario" required>
                            </div>

                            <!--Nombre del ApellidoP-->
                            <div class="form-group">
                                <input type="text" name="Apellido_P" class="form-control" id="Apellido_P" placeholder="Apellido Paterno del Usuario" required>
                            </div>
                            <!--Nombre del ApellidoM-->
                            <div class="form-group">
                                <input type="text" name="Apellido_M" class="form-control" id="Apellido_M" placeholder="Apellido Materno del Usuario" required>
                            </div>

                            <!--Email-->
                            <div class="form-group">
                                <input type="text" name="Email" class="form-control" id="Email" placeholder="Correo Electronico" required>
                            </div>

                            <!--Matricula-->
                            <div class="form-group">
                                <input type="text" name="Matricula" class="form-control" id="Matricula" placeholder="Matricula del Usuario" required>
                            </div>

                            <!--Rol-->
                            <div class="form-group">
                                <select id="Rol" name="Rol" class="form-control">
                                    <option value="" selected="selected">Seleccionar Rol de Usuario</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Profesor">Profesor</option>
                                </select>
                            </div>

                            <!--Contraseña-->
                            <div class="form-group">
                                <input type="password" name="Contrasena" class="form-control" id="Contrasena" placeholder="Contraseña" required>
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

<!-- Modal Modificar Usuario -->
<div class="modal fade" id="myModalModUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title text-center" id="myModalLabel">Modificación de Usuario</h2>
            </div>
            <div class="modal-body">
                <div class="box-input" style="max-width: 70%;  margin: 0 auto;">
                    <form id="frmModUsuario" name="frmModUsuario" method="post">
                        <div class="row">
                            <!--hide-->
                            <div class="form-group hide">
                                <input type="text" name="mFuncion" class="form-control" id="mFuncion" value="modificarUsuario" placeholder="modificación" required>
                            </div>

                            <div class="form-group hide">
                                <input type="text" name="mIdUsuario" class="form-control" id="mIdUsuario" placeholder="Id USUARIO" required>
                            </div>

                            <!--Nombre del ApellidoP-->
                            <div class="form-group">
                                <input type="text" name="mNombre" class="form-control" id="mNombre" placeholder="Apellido Paterno del Usuario" required>
                            </div>

                            <!--Nombre del ApellidoP-->
                            <div class="form-group">
                                <input type="text" name="mApellido_P" class="form-control" id="mApellido_P" placeholder="Apellido Paterno del Usuario" required>
                            </div>
                            <!--Nombre del ApellidoM-->
                            <div class="form-group">
                                <input type="text" name="mApellido_M" class="form-control" id="mApellido_M" placeholder="Apellido Materno del Usuario" required>
                            </div>

                            <!--Email-->
                            <div class="form-group">
                                <input type="text" name="mEmail" class="form-control" id="mEmail" placeholder="Correo Electronico" required>
                            </div>

                            <!--Matricula-->
                            <div class="form-group hide">
                                <input type="text" name="mMatricula" class="form-control" id="mMatricula" placeholder="Matricula del Usuario" required>
                            </div>

                            <!--Rol-->
                            <div class="form-group">
                                <select id="mRol" name="mRol" class="form-control">
                                    <option value="" selected="selected">Seleccionar Rol de Usuario</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Profesor">Profesor</option>
                                </select>
                            </div>

                            <!--Estatus-->
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

<!-- Modal Modificar Contraseña -->
<div class="modal fade" id="myModalPassUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title text-center" id="myModalLabel">Cambio de Contraseña Usuario</h2>
            </div>
            <div class="modal-body">
                <div class="box-input" style="max-width: 70%;  margin: 0 auto;">
                    <form id="frmPassUsuario" method="post">
                        <div class="row">
                            <!--hide-->
                            <div class="form-group hide">
                                <input type="text" name="passFuncion" class="form-control" id="passFuncion" value="passUsuario" required>
                            </div>

                            <div class="form-group hide">
                                <input type="text" name="passIdUsuario" class="form-control" id="passIdUsuario" required>
                            </div>
                            
                            
                            <!--Contraseña-->
                            <div class="form-group">
                                <input type="password" name="passContrasena1" class="form-control" id="passContrasena1" placeholder="Nueva Contraseña" required><span class="fa fa-eye-slash icon" onclick="mostrarPassword()"></span>
                            </div>

                            <!--Contraseña-->
                            <div class="form-group">
                                <input type="password" name="passContrasena2" class="form-control" id="passContrasena2" placeholder="Repertir Contraseña" required><span class="fa fa-eye-slash icon" onclick="mostrarPassword2()"></span>
                            </div>

                            <div class="form-group has-feedback col-md-6 col-md-offset-3">
                                <br />
                                <input type="submit" class="btn btn-google btn-block text-center" value="Guardar..." />
                            </div>
                        </div>
                    </form>
                    <br />
                    <div>
                        <p id="passResp" style="color:red"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    



<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("passContrasena1");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
    
function mostrarPassword2(){
		var cambio = document.getElementById("passContrasena2");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>

<?php include_once('_adminFooter.php'); ?>