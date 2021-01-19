<?php
//$to = "destinatario@email.com, destinatario2@email.com, destinatario3@email.com";
//$to       = "Heriberto de Jesús <ddh180792@gmail.com>";
$to       = "Daniel de Jesús de Jesús <dragneel.960229@gmail.com>";
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
              <p>Estimado DanielLe confirmamos que su registro a los siguientes cursos o talleres ha sido aprobado.</p>
              <hr/>
              <table class='bottomBorder'>
                <thead>
                  <tr>
                    <th>Curso</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Curso 1</td>
                    <td>17/07/2019</td>
                    <td>12:00:00 Hrs.</td>
                  </tr>
                </tbody>
              </table>
            </body>
            </html>
            ";

mail($to, $subject, $message, $headers);
