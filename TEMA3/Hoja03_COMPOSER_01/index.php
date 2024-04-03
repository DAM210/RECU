<?php

// Incluye el autoloader de Composer para cargar las clases de la librería
require 'vendor/autoload.php';

// Importa la clase ValidadorIBAN del espacio de nombres MiProyecto
use MiProyecto\ValidadorIBAN;

// Códigos IBAN y CCC a validar
$iban = 'ES7106674329167700419029';
$ccc = '1234 5678 43 1234567890';

try {
    // Intenta validar el IBAN utilizando el método validarIBAN de la clase ValidadorIBAN
    if (ValidadorIBAN::validarIBAN($iban)) {
        echo "El IBAN $iban es válido.<br>";
    } else {
        echo "El IBAN $iban no es válido.<br>";
    }
} catch (\InvalidArgumentException $e) {
    // Captura cualquier excepción lanzada durante la validación del IBAN
    echo "Error: " . $e->getMessage() . "<br>";
}

//NO VALIDA BIEN EL CCC
try {
    // Intenta validar el CCC utilizando el método validarCCC de la clase ValidadorIBAN
    if (ValidadorIBAN::validarCCC($ccc)) {
        echo "El CCC $ccc es válido.<br>";
    } else {
        echo "El CCC $ccc no es válido.<br>";
    }
} catch (\InvalidArgumentException $e) {
    // Captura cualquier excepción lanzada durante la validación del CCC
    echo "Error: " . $e->getMessage() . "<br>";
}
