<?php
require_once '../Conf/sql.php';

$sql = new BaseDatos;

$funcion    = $_POST["Funcion"];
$id         = $_POST["IdUsuario"];
$nombre     = $_POST['Nombre'];
$apellidop  = $_POST['Apellido_P'];
$apellidom  = $_POST['Apellido_M'];
$email      = $_POST['Email'];
$matricula  = $_POST['Matricula'];
$rol        = $_POST['Rol'];
$contrasena = $_POST['Contrasena'];
$estatus    = $_POST['Estatus'];



if ($funcion == "altaUsuario") {
    if ($sql->conectar()) {
        $query = "SELECT * FROM usuario WHERE matricula = '" . $matricula . "'";
        $numDatos = mysqli_num_rows($sql->consulta($query));
        if ($numDatos > 0) {
            echo 'La matrícula que intenta dar de alta para el usuario ya existe.';
        } else {

            $query = "INSERT INTO usuario VALUES(NULL,'" . $nombre . "','" . $apellidop . "','" . $apellidom . "','" . $email . "','" . $matricula . "','A','" . $rol . "','" . $contrasena . "');";
            $sql->consulta($query);
            if ($sql->get_TablasMod() > 0) {
                echo 'OK';
            } else {
                echo 'Ha ocurrido un error al realizar el alta del Usuario';
            }
        }
    }
} elseif ($funcion == "passUsuario") {
    if ($sql->conectar()) {
        $query = "UPDATE usuario SET Contrasena = '" . $contrasena . "' WHERE Id_Usuario = " . $id . ";";
        $sql->consulta($query);
        if ($sql->get_TablasMod() > 0) {
            echo 'OK';
        } else {
            echo 'Ha ocurrido un error al actualizar la contraseña del Usuario';
        }
    }
} elseif ($funcion == "modificarUsuario") {
    if ($sql->conectar()) {
        $query = "UPDATE usuario SET Nombre = '" . $nombre . "', Apellido_P = '" . $apellidop . "', Apellido_M = '" . $apellidom . "', Email = '" . $email . "', Matricula = '" . $matricula . "', Estatus = '" . $estatus . "', Rol = '" . $rol . "' WHERE Id_Usuario = " . $id . ";";
        $sql->consulta($query);
        if ($sql->get_TablasMod() > 0) {
            echo 'OK';
        } else {
            echo 'Ha ocurrido un error al actualizar el Usuario';
        }
    }
} elseif ($funcion == "eliminarUsuario") {
    if ($sql->conectar()) {
        $query = "DELETE FROM usuario WHERE Id_Usuario = " . $id . ";";
        $sql->consulta($query);
        if ($sql->get_TablasMod() > 0) {
            echo 'OK';
        } else {
            echo 'Ha ocurrido un error al eliminar el Usuario';
        }
    }
} else {
    echo 'opción no válida';
}
