<?php
if(isset($_POST['email'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_to = "dragneel.960229@gmail.com";
$email_subject = "Contacto desde el sitio web TSIWEEK";
        $nombre = $_POST['nombre'];
        $apellidoP = $_POST['apellidoP'];
        $apellidoM = $_POST['apellidoM'];
        $email = $_POST['email'];
        $visitante = $_POST['visitante'];
        $matricula = $_POST['matricula'];
        $procedencia = $_POST['procedencia'];
        
        //Eventos
        $conferencias = $_POST['conferencias'];

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['nombre']) ||
!isset($_POST['apellidoP']) ||
!isset($_POST['apellidoM']) ||
!isset($_POST['email']) ||
!isset($_POST['visitante']) ||
!isset($_POST['matricula']) ||
!isset($_POST['procedencia']) ||
!isset($_POST['conferencias'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $_POST['nombre'] . "\n";
$email_message .= "Apellido Paterno: " . $_POST['apellidoP'] . "\n";
$email_message .= "Apellido Materno: " . $_POST['apellidoM'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Visitante: " . $_POST['visitante'] . "\n";
$email_message .= "Matricula: " . $_POST['matricula'] . "\n";
$email_message .= "Procedencia: " . $_POST['procedencia'] . "\n";
$email_message .= "Conferencias: " . $_POST['procedencia'] . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

echo "¡El formulario se ha enviado con éxito!";
}
?>