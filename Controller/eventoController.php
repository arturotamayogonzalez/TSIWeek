<?php
require_once '../Conf/sql.php';

$sql = new BaseDatos;

$funcion         = $_POST["Funcion"];
$id              = $_POST["IdEvento"];
$nombre          = $_POST['NombreEvento'];
$fechaIni        = date("Ymd", strtotime($_POST['fechaIni']));
$fechaFin        = date("Ymd", strtotime($_POST['fechaFin']));
$horaIni         = date("H:i:s", strtotime($_POST['horaIni']));
$horaFin         = date("H:i:s", strtotime($_POST['horaFin']));
$catEvento       = $_POST['CategoriaEvento'];
$catUbicacion    = $_POST['CategoriaUbicacion'];
$catPonente      = $_POST['CategoriaPoniente'];


if ($fechaIni > $fechaFin) {
    echo 'La fecha de inicio no puede ser mayor a la fecha final, y la fecha final no puede ser menor a fecha de inicio';
} elseif ($horaIni > $horaFin) {
    echo 'La hora de inicio no puede ser mayor a la hora final, y la hora final no puede ser menor a hora de inicio';
} elseif ($funcion == "altaEvento") {
    if ($sql->conectar()) {
        //Validación Ubicación reservada
        $query = "SELECT * FROM eventos WHERE Id_Ubicacion = " . $catUbicacion . " AND Fecha_Inicio = '" . $fechaIni . "' AND Hora_Inicio ='" . $horaIni . "'";
        $numDatos = mysqli_num_rows($sql->consulta($query));
        if ($numDatos > 0) {
            echo 'Ya existe un evento en la fecha y hora ingresada para la Ubicación seleccionada.';
        } else {
            //Validación Ponente reservada
            $query = "SELECT * FROM eventos WHERE Id_Poniente = " . $catPonente . " AND Fecha_Inicio = '" . $fechaIni . "' AND Hora_Inicio ='" . $horaIni . "'";
            $numDatos = mysqli_num_rows($sql->consulta($query));
            if ($numDatos > 0) {
                echo 'Ya existe un evento en la fecha y hora ingresada para el Ponente seleccionado.';
            } else {
                $query = "INSERT INTO eventos VALUES(NULL,'" . $nombre . "','" . $fechaIni . "','" . $fechaFin . "','" . $horaIni . "','" . $horaFin . "'," . $catEvento . "," . $catUbicacion . "," . $catPonente . ");";
                $sql->consulta($query);
                if ($sql->get_TablasMod() > 0) {
                    echo 'OK';
                } else {
                    echo 'Ha ocurrido un error al realizar el alta del Evento';
                }
            }
        }
    }
} elseif ($funcion == "modificarEvento") {
    if ($sql->conectar()) {
        //Validación Ubicación reservada
        $query = "SELECT * FROM eventos WHERE Id_Eventos <> " . $id . " AND Id_Ubicacion = " . $catUbicacion . " AND Fecha_Inicio = '" . $fechaIni . "' AND Hora_Inicio ='" . $horaIni . "'";
        $numDatos = mysqli_num_rows($sql->consulta($query));
        if ($numDatos > 0) {
            echo 'Ya existe un evento en la fecha y hora ingresada para la Ubicación seleccionada.';
        } else {
            //Validación Ponente reservada
            $query = "SELECT * FROM eventos WHERE Id_Eventos <> " . $id . " AND Id_Poniente = " . $catPonente . " AND Fecha_Inicio = '" . $fechaIni . "' AND Hora_Inicio ='" . $horaIni . "'";
            $numDatos = mysqli_num_rows($sql->consulta($query));
            if ($numDatos > 0) {
                echo 'Ya existe un evento en la fecha y hora ingresada para el Ponente seleccionado.';
            } else {
                $query = "UPDATE eventos SET Nombre = '" . $nombre . "', Fecha_Inicio = '" . $fechaIni . "', Fecha_Fin = '" . $fechaFin . "', Hora_Inicio = '" . $horaIni . "', Hora_Fin = '" . $horaFin . "', Id_CategoriaEvento = " . $catEvento . ", Id_Ubicacion = " . $catUbicacion . ", Id_Poniente = " . $catPonente . " WHERE Id_Eventos = " . $id . ";";
                $sql->consulta($query);
                if ($sql->get_TablasMod() > 0) {
                    echo 'OK';
                } else {
                    echo 'Ha ocurrido un error al realizar el alta del Evento';
                }
            }
        }
    }
} elseif ($funcion == "eliminarEvento") {
    if ($sql->conectar()) {
        $query = "DELETE FROM eventos WHERE Id_Eventos = " . $id . ";";
        $sql->consulta($query);
        if ($sql->get_TablasMod() > 0) {
            echo 'OK';
        } else {
            echo 'Ha ocurrido un error al eliminar el Ponente';
        }
    }
}
