<?php

namespace MiProyecto;

require 'vendor/autoload.php'; // Incluye el autoloader de Composer para cargar las clases de la librería

use Brick\Math\BigInteger;

class ValidadorIBAN
{
    /**
     * Valida un código IBAN.
     *
     * @param string $iban El código IBAN a validar.
     * @return bool true si el IBAN es válido, false en caso contrario.
     * @throws \InvalidArgumentException Si el IBAN no cumple con el formato requerido.
     */
    public static function validarIBAN(string $iban): bool
    {
        // Eliminar espacios en blanco y convertir todas las letras a mayúsculas
        $iban = strtoupper(str_replace(' ', '', $iban));

        // Verificar si el IBAN tiene el formato correcto (longitud de 24 caracteres y comienza con "ES")
        if (strlen($iban) != 24 || substr($iban, 0, 2) != "ES") {
            throw new \InvalidArgumentException('El IBAN debe tener 24 caracteres y comenzar con "ES"');
        }

        // Reemplazar las letras por números y realizar la operación de módulo 97
        $ibanNumerico = substr($iban, 4) . substr($iban, 0, 4);
        $ibanNumerico = str_replace(
            array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'),
            array('10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35'),
            $ibanNumerico
        );
        if (BigInteger::of($ibanNumerico)->mod('97')->isEqualTo('1')) {
            return true; // IBAN válido
        } else {
            return false; // IBAN inválido
        }
    }

    /**
     * Valida un código CCC (Código de Cuenta Cliente).
     *
     * @param string $codigoCCC El código CCC a validar.
     * @return bool true si el CCC es válido, false en caso contrario.
     * @throws \InvalidArgumentException Si el CCC no cumple con el formato requerido.
     */
    public static function validarCCC(string $ccc): bool
    {
        // Eliminar espacios en blanco y comprobar longitud
        $ccc = str_replace(' ', '', $ccc);
        if (strlen($ccc) != 20) {
            throw new \InvalidArgumentException('El CCC debe tener 20 caracteres');
        }

        // Definir el arreglo de pesos
        $pesos = [1, 2, 4, 8, 5, 10, 9, 7, 3, 6];

        // Calcular el primer dígito de control
        $suma = 0;
        for ($i = 0; $i < 10; $i++) {
            $suma += $ccc[$i] * $pesos[$i];
        }
        $digitoControl1 = 11 - ($suma % 11);
        if ($digitoControl1 == 11) {
            $digitoControl1 = 0;
        } elseif ($digitoControl1 == 10) {
            $digitoControl1 = 1;
        }

        // Calcular el segundo dígito de control
        $suma = 0;
        for ($i = 10; $i < 20; $i++) {
            $suma += $ccc[$i] * $pesos[$i - 10];
        }
        $digitoControl2 = 11 - ($suma % 11);
        if ($digitoControl2 == 11) {
            $digitoControl2 = 0;
        } elseif ($digitoControl2 == 10) {
            $digitoControl2 = 1;
        }

        // Obtener los dígitos de control proporcionados
        $digitoControlProporcionado1 = (int)substr($ccc, 8, 1);
        $digitoControlProporcionado2 = (int)substr($ccc, 9, 1);

        // Verificar los dígitos de control
        if ($digitoControl1 == $digitoControlProporcionado1 && $digitoControl2 == $digitoControlProporcionado2) {
            return true;
        } else {
            return false;
        }
    }


}
