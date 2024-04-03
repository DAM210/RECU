<?php
require_once __DIR__ . 'vendor/autoload.php';
require_once('ServicioCorreo.class.php');
require_once('ProveedorMailtrap.class.php');

if (isset($_GET["enviar"])) {
    $nombre = $_GET["nombre"];
    $correo = $_GET["correo"];
    $mensaje = $_GET["mensaje"];

    if (empty($nombre) || empty($correo) || empty($mensaje)) {  //si alguno de los campos esta vacío
        header('Location: formulario.php?error=1');
        echo "Por favor, rellena todos los campos.";
        exit;
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {  //valida si el correo electrónico es válido
        header('Location: formulario.php?error=2');
        echo "Por favor, introduce un email válido.";
        exit;
    }

    $servicioCorreo = new ServicioCorreo(new ProveedorMailtrap());

    if ($servicioCorreo->enviarCorreo($correo, "Asunto del Correo", $mensaje)) {    //Si se envía el correo con éxito
        header('Location: formulario.php?success=1');
        echo "El email se ha enviado correctamente.";
        exit;
    } else {
        header('Location: formulario.php?error=3');
        echo "Ha ocurrido un error al enviar el email.";
        exit;
    }
}
?>