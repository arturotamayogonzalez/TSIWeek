<?php
require_once '../Conf/sql.php';

$sql = new BaseDatos;

$funcion    = $_POST["Funcion"];
$id         = $_POST["IdRegistro"];
$nombre     = $_POST["Nombre"];




if ($funcion == "eliminarRegistro") {
    if ($sql->conectar()) {
        $query = "DELETE FROM registro WHERE Email = '" . $id . "';";
        $sql->consulta($query);
        if ($sql->get_TablasMod() > 0) {
            echo 'OK';
        } else {
            echo 'Ha ocurrido un error al eliminar el Registro';
        }
    }
} elseif ($funcion == "verRegistro") {
    if ($sql->conectar()) {
        $query = "SELECT CONCAT(R.Nombre_R, ' ', R.Apellido_P_R, ' ', R.Apellido_M_R) Nombre, R.Email, E.Nombre, E.Fecha_Inicio, E.Hora_Inicio, E.Hora_Fin, E.Fecha_Fin FROM registro R INNER JOIN eventos E ON E.Id_Eventos = R.Id_Eventos WHERE R.Email = '" . $id . "' ORDER BY E.Fecha_Inicio ASC";
        $resultado = $sql->consulta($query);

        while ($fila = mysqli_fetch_row($resultado)) {
            $tbody .= "<tr>";
            $tbody .= "<td>" . $fila[0] . "</td>";
            $tbody .= "<td>" . $fila[2] . "</td>";
            $tbody .= "<td>" . date("d-m-Y", strtotime($fila[3])) . "</td>";
            $tbody .= "<td>" . date("d-m-Y", strtotime($fila[6])) . "</td>";
            $tbody .= "<td>" . date("h:iA", strtotime($fila[4])) . "</td>";
            $tbody .= "<td>" . date("h:iA", strtotime($fila[5])) . "</td>";
            $tbody .= "</tr>";
        }

        echo $tbody;
    }
} elseif ($funcion == "enviarRegistro") {
    if ($sql->conectar()) {
        $query = "SELECT * FROM registro WHERE Email = '" . $id . "' AND EnvioCorreo = 'Enviado'";
        $numDatos = mysqli_num_rows($sql->consulta($query));
        if ($numDatos > 0) {
            echo 'Ya ha sido enviado el correo a la cuenta ' . $id;
        } else {
            $to       = "" . $nombre . " <" . $id . ">";
            $subject  = "Registro TSI Week";
            $headers  = "From: Notificación Registro TSI Week <informacion@recorcholis.com.mx>" . "\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $query = "SELECT CONCAT(R.Nombre_R, ' ', R.Apellido_P_R, ' ', R.Apellido_M_R) Nombre, R.Email, E.Nombre, E.Fecha_Inicio, E.Hora_Inicio, E.Hora_Fin, E.Fecha_Fin FROM registro R INNER JOIN eventos E ON E.Id_Eventos = R.Id_Eventos WHERE R.Email = '" . $id . "' ORDER BY E.Fecha_Inicio ASC";
            $resultado = $sql->consulta($query);

            while ($fila = mysqli_fetch_row($resultado)) {
                $tbody .= "<tr>";
                $tbody .= "<td>" . $fila[0] . "</td>";
                $tbody .= "<td>" . $fila[2] . "</td>";
                $tbody .= "<td>" . date("d-m-Y", strtotime($fila[3])) . "</td>";
                $tbody .= "<td>" . date("d-m-Y", strtotime($fila[6])) . "</td>";
                $tbody .= "<td>" . date("h:iA", strtotime($fila[4])) . "</td>";
                $tbody .= "<td>" . date("h:iA", strtotime($fila[5])) . "</td>";
                $tbody .= "</tr>";
            }

            $message  = "
                    <html>
                    <head>
                    <meta charset='utf-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title></title>
                    <style>
                      table.bottomBorder { 
                        border-collapse: collapse; 
                      }
                      table.bottomBorder td, 
                      table.bottomBorder th { 
                        border-bottom: 1px solid black; 
                        padding: 10px; 
                        text-align: left;
                      }
                    </style>
                    </head>
                    <body>
                      <h1>Registro TSI Week</h1>
                      <p>Estimado " . $nombre . ", le confirmamos que su registro a los siguientes cursos y/o talleres ha         sido aprobado.</p>
                      <br/>
                      <table class='bottomBorder'>
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Curso</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Hora Inicio</th>
                            <th>Hora Fin</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            " . $tbody . "
                          </tr>
                        </tbody>
                      </table>
                    </body>
                    </html>
                    ";

            $envioMail = mail($to, $subject, $message, $headers);

            if ($envioMail) {
                $query = "UPDATE registro SET EnvioCorreo = 'Enviado' WHERE Email = '" . $id . "';";
                $sql->consulta($query);
                if ($sql->get_TablasMod() > 0) {
                    echo 'OK';
                } else {
                    echo 'Ha ocurrido un error al actualizar el Estatus de Envío de Correo en Registro';
                }
            } else {
                $query = "UPDATE registro SET EnvioCorreo = 'No Enviado' WHERE Email = '" . $id . "';";
                $sql->consulta($query);
                if ($sql->get_TablasMod() > 0) {
                    echo 'Ha ocurrido un error con el envío de correo.';
                } else {
                    echo 'Ha ocurrido un error al actualizar el Estatus de Envío de Correo en Registro';
                }
            }
        }
    }
} else {
    echo 'opción no válida';
}
