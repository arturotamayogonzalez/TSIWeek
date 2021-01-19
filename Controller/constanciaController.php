<?php
require_once '../Conf/sql.php';

$funcion    = $_POST["Funcion"];
$id         = $_POST["Email"];
$nombre     = $_POST["Nombre"];
$evento     = $_POST["Evento"];
$taller     = $_POST["Taller"];

$sql = new BaseDatos;

if ($funcion == "envioConstancia") {
  if ($sql->conectar()) {
    $query = "SELECT * FROM registro WHERE Email = '" . $id . "' AND EnvioConstancia = 'Enviado' AND Id_Eventos = " . $evento . "";
    $numDatos = mysqli_num_rows($sql->consulta($query));
    if ($numDatos > 0) {
      echo 'Ya ha sido enviado el correo a la cuenta ' . $id;
    } else {
      $to       = "" . $nombre . " <" . $id . ">";
      $subject  = "Registro TSI Week";
      $headers  = "From: Notificación Registro TSI Week <informacion@recorcholis.com.mx>" . "\r\n";
      $headers .= "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      $message  = "
                <html>
                <head>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title></title>
                </head>
                <body>
                  <h1>Particiación TSI Week</h1>
                  <p>Estimado " . $nombre . ", gracias por asistir al taller " . $taller . ". Pulse <a href='http://localhost:8000/constancia.php?evento=" . $evento . "&email=" . $id . "'>aquí</a> para descargar su constancia de acreditación.</p>
                  <br/>
                  
                </body>
                </html>
                ";

      $envioMail = mail($to, $subject, $message, $headers);

      if ($envioMail) {
        $query = "UPDATE registro SET EnvioConstancia = 'Enviado' WHERE Email = '" . $id . "' AND Id_Eventos = " . $evento . ";";
        $sql->consulta($query);
        if ($sql->get_TablasMod() > 0) {
          echo 'OK';
        } else {
          echo 'Ha ocurrido un error al actualizar el Estatus de Envío de Correo en Registro';
        }
      } else {
        $query = "UPDATE registro SET EnvioCorreo = 'No Enviado' WHERE Email = '" . $id . "' AND Id_Eventos = " . $evento . ";";
        $sql->consulta($query);
        if ($sql->get_TablasMod() > 0) {
          echo 'Ha ocurrido un error con el envío de correo.';
        } else {
          echo 'Ha ocurrido un error al actualizar el Estatus de Envío de Correo en Registro';
        }
      }
    }
  }
}
