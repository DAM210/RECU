<?php
require 'vendor/autoload.php';
require_once('ServicioCorreo.class.php');
require_once('ProveedorMailtrap.class.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $mensaje = $_POST["mensaje"];

    if (empty($nombre) || empty($correo) || empty($mensaje)) {  //si alguno de los campos esta vacío
        header('Location: index.php?error=1');
        exit;
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {  //valida si el correo electrónico es válido
        header('Location: index.php?error=2');
        exit;
    }

    $servicioCorreo = new ServicioCorreo(new ProveedorMailtrap());

    if ($servicioCorreo->enviarCorreo($correo, "Asunto del Correo", $mensaje)) {    //Si se envía el correo con éxito
        header('Location: index.php?success=1');
        exit;
    } else {
        header('Location: index.php?error=3');
        exit;
    }
}
?>