<?php

namespace MiProyecto\Clases;

use MiProyecto\Interfaces\InterfazProveedorCorreo;
use PHPMailer\PHPMailer\PHPMailer;

class ProveedorMailtrap implements InterfazProveedorCorreo
{
    public function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje): bool
    {
        $mail = new PHPMailer(true);

        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '5f6edb0497f669';
        $mail->Password = '72d322365f6e83';
        $mail->Port = 2525;

        // Configuración del correo
        $mail->setFrom('tu_correo@mailtrap.io', 'Tu Nombre');
        $mail->addAddress($paraQuien);
        $mail->Subject = $asunto;
        $mail->Body = $cuerpoMensaje;

        // Intentar enviar el correo
        try {
            $mail->send();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
