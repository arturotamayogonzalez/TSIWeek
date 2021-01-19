<?php
require_once '../Conf/sql.php';

$sql = new BaseDatos;

$funcion         = $_POST["Funcion"];
$id              = $_POST["IdCatEvento"];
$tipo            = $_POST["TipoEvento"];
$categoria       = $_POST["CategoriaEvento"];


if ($funcion == "eliminarCatEvento") {
    if ($sql->conectar()) {
        $query = "DELETE FROM categoria_evento WHERE Id_CategoriaEvento = " . $id . ";";
        $sql->consulta($query);
        if ($sql->get_TablasMod() > 0) {
            echo 'OK';
        } else {
            echo 'Ha ocurrido un error al eliminar el Categoria Evento';
        }
    }
} elseif ($funcion == "altaCEventos") {
    if ($sql->conectar()) {
        $query = "INSERT INTO categoria_evento VALUES (NULL, '" . $tipo . "','" . $categoria . "');";
        $sql->consulta($query);
        if ($sql->get_TablasMod() > 0) {
            echo 'OK';
        } else {
            echo 'Ha ocurrido un error con el alta de la Categoria Evento';
        }
    }
}
