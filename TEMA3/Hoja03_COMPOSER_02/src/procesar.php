<?php

namespace MiProyecto;
require '../vendor/autoload.php';

use MiProyecto\Clases\ProveedorMailtrap;
use MiProyecto\Clases\ServicioCorreo;

// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"] ?? '';
    $email = $_POST["email"] ?? '';
    $mensaje = $_POST["mensaje"] ?? '';

    // Verificar que los campos no estén vacíos
    if (empty($nombre) || empty($email) || empty($mensaje)) {
        header('Location: ../index.php?error=1');
        exit;
    }

    // Verificar si el correo electrónico es válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../index.php?error=2');
        exit;
    }

    // Instanciar el servicio de correo con el proveedor Mailtrap
    $servicioCorreo = new ServicioCorreo(new ProveedorMailtrap());

    // Enviar el correo electrónico
    if ($servicioCorreo->enviarCorreo($email, 'Mensaje de contacto', $mensaje)) {
        header('Location: ../index.php?success=1');
        exit;
    } else {
        header('Location: ../index.php?error=3');
        exit;
    }
}
