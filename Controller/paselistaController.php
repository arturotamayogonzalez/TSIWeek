<?php
require_once '../Conf/sql.php';

$sql = new BaseDatos;

$funcion = $_POST["Funcion"];
$id      = $_POST["IdLista"];
$evento  = $_POST["Evento"];


if ($funcion == "Presente") {
  if ($sql->conectar()) {
    $query = "SELECT * FROM asistencia WHERE Email = '" . $id . "' AND Fecha = CURDATE() AND Id_Eventos = " . $evento . "";
    $numDatos = mysqli_num_rows($sql->consulta($query));
    if ($numDatos > 0) {
      $query = "UPDATE asistencia SET Asistencia = 1 WHERE Email = '" . $id . "' AND Fecha = CURDATE() AND Id_Eventos = " . $evento . "";
      $sql->consulta($query);
      if ($sql->get_TablasMod() > 0) {
        echo 'OK';
      } else {
        echo 'Ha ocurrido un error al actualizar el registro de asistencia';
      }
    } else {
      $query = "INSERT INTO asistencia VALUES(NULL, CURDATE(), 1," . $evento . ",'" . $id . "');";
      $sql->consulta($query);
      if ($sql->get_TablasMod() > 0) {
        echo 'OK';
      } else {
        echo 'Ha ocurrido un error al insertar el registro de asistencia';
      }
    }
  }
} elseif ($funcion == "NoPresente") {
  if ($sql->conectar()) {
    $query = "UPDATE asistencia SET Asistencia = 0 WHERE Email = '" . $id . "' AND Fecha = CURDATE() AND Id_Eventos = " . $evento . "";
    $sql->consulta($query);
    if ($sql->get_TablasMod() > 0) {
      echo 'OK';
    } else {
      echo 'Ha ocurrido un error al insertar el registro de asistencia';
    }
  }
}
