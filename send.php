<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.imagetours.es';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'envio.imagetours.es';
    $mail->Password   = '3nv10Image_';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('envio.imagetours.es', 'Registro Ranking');
    $mail->addAddress('vteruel@imagetours.es', 'Victor Teruel');

    $mail->isHTML(true);
    $mail->Subject = 'Nuevo registro al ranking';
    $mail->Body    = '
        <h2>Nuevo registro recibido</h2>
        <p><strong>Nombre:</strong> ' . $_POST['nombre'] . '</p>
        <p><strong>Nickname:</strong> ' . $_POST['nickname'] . '</p>
        <p><strong>Agencia:</strong> ' . $_POST['agencia'] . '</p>
        <p><strong>CIF:</strong> ' . $_POST['cif'] . '</p>
        <p><strong>Teléfono:</strong> ' . $_POST['telefono'] . '</p>
        <p><strong>Email:</strong> ' . $_POST['email'] . '</p>
    ';

    $mail->send();
    echo 'Registro enviado correctamente.';
} catch (Exception $e) {
    echo "Error al enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
}
?>
