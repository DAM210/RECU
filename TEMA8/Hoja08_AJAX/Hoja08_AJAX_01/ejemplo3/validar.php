<?php

function validarNombre($nombre) {
    return strlen($nombre) > 3;
}

function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validarPasswords($password, $password2) {
    return $password === $password2 && strlen($password) > 5;
}

$nombre = $_POST['nombre'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$password2 = $_POST['password2'] ?? '';

$respuesta = [];

if (!validarNombre($nombre)) {
    //$respuesta['errorNombre'] = utf8_encode("El nombre debe tener más de 3 caracteres.");
    $respuesta['errorNombre'] = mb_convert_encoding("El nombre debe tener más de 3 caracteres.", 'UTF-8', 'auto');
}

if (!validarEmail($email)) {
    //$respuesta['errorEmail'] = utf8_encode("El email no es válido.");
    $respuesta['errorEmail'] = mb_convert_encoding("El email no es válido.", 'UTF-8', 'auto');
}

if (!validarPasswords($password, $password2)) {
    //$respuesta['errorPassword'] = utf8_encode("Las contraseñas deben coincidir y tener más de 5 caracteres.");
    $respuesta['errorPassword'] = mb_convert_encoding("Las contraseñas deben coincidir y tener más de 5 caracteres.", 'UTF-8', 'auto');
}

if (empty($respuesta)) {
    //$respuesta['success'] = "Todo ha ido bien.";
    $respuesta['success'] = mb_convert_encoding("Todo ha ido bien.", 'UTF-8', 'auto');
}

echo json_encode($respuesta);

?>
