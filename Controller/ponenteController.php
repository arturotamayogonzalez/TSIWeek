<?php
require_once '../Conf/sql.php';

$sql = new BaseDatos;

$funcion    = $_POST["Funcion"];
$id         = $_POST["IdPonente"];
$cedula     = $_POST["Cedula"];
$nombre     = $_POST['Nombre'];
$apellidop  = $_POST['Apellido_P'];
$apellidom  = $_POST['Apellido_M'];
$descrip    = $_POST['Descripcion'];
$tipo       = $_POST['Tipo'];
$imagen     = $_POST['base64textarea'];
$estatus    = $_POST['Estatus'];

if ($funcion == "altaPonente") {
    if ($sql->conectar()) {
        $query = "SELECT * FROM poniente WHERE Cedula = '" . $cedula . "'";
        $numDatos = mysqli_num_rows($sql->consulta($query));
        if ($numDatos > 0) {
            echo 'La cédula que intenta dar de alta esta registrada.';
        } else {
            $query = "INSERT INTO poniente VALUES(NULL,'" . $cedula . "','" . $nombre . "','" . $apellidop . "','" . $apellidom . "','" . $descrip . "','" . $imagen . "','" . $tipo . "','A');";
            $sql->consulta($query);
            if ($sql->get_TablasMod() > 0) {
                echo 'OK';
            } else {
                echo 'Ha ocurrido un error al realizar el alta del Usuario';
            }
        }
    }
} elseif ($funcion == "eliminarPonente") {
    if ($sql->conectar()) {
        $query = "DELETE FROM poniente WHERE Id_Poniente = " . $id . ";";
        $sql->consulta($query);
        if ($sql->get_TablasMod() > 0) {
            echo 'OK';
        } else {
            echo 'Ha ocurrido un error al eliminar el Ponente';
        }
    }
} elseif ($funcion == "modificarPonente") {
    if ($sql->conectar()) {
        $query = "UPDATE poniente SET Cedula = '" . $cedula . "', Nombre_P = '" . $nombre . "', Apellido_P = '" . $apellidop . "', Apellido_M = '" . $apellidom . "', Descripcion = '" . $descrip . "', Tipo_Poniente = '" . $tipo . "', Estatus = '" . $estatus . "' WHERE Id_Poniente = " . $id . "";
        $sql->consulta($query);
        if ($sql->get_TablasMod() > 0) {
            echo 'OK';
        } else {
            echo 'Ha ocurrido un error al actualizar el Ponente';
        }
    }
} elseif ($funcion == "fotoPonente") {
    if ($sql->conectar()) {
        $query = "UPDATE poniente SET Imagen_URL = '" . $imagen . "' WHERE Id_Poniente = " . $id . "";
        $sql->consulta($query);
        if ($sql->get_TablasMod() > 0) {
            echo 'OK';
        } else {
            echo 'Ha ocurrido un error al actualizar la Fotografía del Ponente';
        }
    }
} else {
    echo 'Opción no válida';
}
