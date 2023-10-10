<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreCompleto = $_POST['nombreCompleto'];
    $correoElectronico = $_POST['correoElectronico'];
    $telefono = $_POST['telefono'];
    $consulta = $_POST['consulta'];

    // Configura la dirección de correo a la que deseas recibir los datos
    $destinatario = 'lorenzotomasf@gmail.com';

    // Asunto del correo
    $asunto = 'Nuevo formulario de contacto';

    // Contenido del correo
    $mensaje = "Nombre completo: $nombreCompleto\n";
    $mensaje .= "Correo electrónico: $correoElectronico\n";
    $mensaje .= "Teléfono: $telefono\n";
    $mensaje .= "Consulta:\n$consulta";

    // Configura la función mail() para utilizar Gmail SMTP
    $smtpHost = 'smtp.gmail.com';
    $smtpPort = 587;
    $smtpUsername = 'tucorreo@gmail.com';  // Cambia a tu correo de Gmail
    $smtpPassword = 'tucontraseñadeapp';  // Cambia a tu contraseña de Gmail o clave de aplicación

    // Configura el encabezado del correo para usar SMTP
    $headers = "From: $smtpUsername\r\n";
    $headers .= "Reply-To: $correoElectronico\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Envía el correo electrónico utilizando SMTP
    if (mail($destinatario, $asunto, $mensaje, $headers, "-f$smtpUsername")) {
        // Redirige al usuario a una página de confirmación
        header('Location: confirmation.html');
    } else {
        echo 'Error al enviar el correo. Por favor, inténtalo de nuevo más tarde.';
    }
} else {
    // Si no es una solicitud POST, redirige a la página del formulario
    header('Location: contact.html');
}
?>
