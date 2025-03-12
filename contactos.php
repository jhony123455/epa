<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = filter_var(trim($_POST["nombre"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensaje = filter_var(trim($_POST["mensaje"]), FILTER_SANITIZE_STRING);

    if (empty($nombre) || empty($email) || empty($mensaje) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, complete todos los campos correctamente.";
        exit;
    }

    // Configuración de Mailtrap
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io'; // Servidor de Mailtrap
        $mail->SMTPAuth = true;
        $mail->Username = '551a3ada4014bf'; // Reemplaza con tu usuario de Mailtrap
        $mail->Password = '18015c1216007b'; // Reemplaza con tu contraseña de Mailtrap
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; 

        // Configuración del correo
        $mail->setFrom('noreply@tu-dominio.com', 'Formulario de Contacto');
        $mail->addAddress('jhonydavidcolombia@gmail.com'); // Destinatario

        $mail->isHTML(false);
        $mail->Subject = "Nuevo mensaje de contacto de $nombre";
        $mail->Body = "Nombre: $nombre\nCorreo: $email\nMensaje:\n$mensaje";

        if ($mail->send()) {
            echo "Mensaje enviado correctamente.";
        } else {
            echo "Error al enviar el mensaje.";
        }
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
} else {
    echo "Acceso no autorizado.";
}
?>

