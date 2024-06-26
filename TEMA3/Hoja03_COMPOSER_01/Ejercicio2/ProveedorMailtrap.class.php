<?php
require 'vendor/autoload.php'; // Carga la librería PHPMailer
require_once('InterfazProveedorCorreo.interface.php');
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ProveedorMailtrap implements InterfazProveedorCorreo {
    public function enviarCorreo(string $destino, string $asunto, string $mensaje): bool {
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP de Mailtrap
            $mail->isSMTP();    //Indica que utilizará SMTP para enviar el correo
            $mail->Host = 'sandbox.smtp.mailtrap.io';   //Establece la dirección del servidor SMTP de Mailtrap
            $mail->SMTPAuth = true;     //Habilitar la autenticación SMTP
            $mail->Username = '5f6edb0497f669'; //Usuario de Mailtrap
            $mail->Password = '72d322365f6e83'; //Contraseña de Mailtrap
            $mail->Port = 2525; // El puerto puede variar 25 o 465 o 587 o 2525

            // Configuración del mensaje
            $mail->setFrom('lferrerasf01@educantabria.es', 'Lucia');    //Correo y nombre del remitente
            $mail->addAddress($destino);     //Correo y nombre del destinatario
            $mail->isHTML(true);    //Indica que el mensaje es HTML
            $mail->Subject = $asunto;   //Establece el asunto del correo, que se pasa como argumento al método enviarCorreo
            $mail->Body = $mensaje;   //Define el contenido del mensaje, que también se pasa como argumento al método enviarCorreo

            // Envío del correo
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
