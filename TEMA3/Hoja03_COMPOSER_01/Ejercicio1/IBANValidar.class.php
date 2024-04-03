<?php
require 'vendor/autoload.php'; // Carga la librería brick/math
use Brick\Math\BigInteger;

class IBANValidar
{
    /**
     * Esta función toma un código IBAN como entrada, lo normaliza a mayúsculas y verifica si cumple 
     * con el formato español. Luego, realice el cálculo de los dígitos de control y compare 
     * si son correctos.
     */
    /*public static function validaIBAN($iban){
        $iban = strtoupper($iban);

        if (preg_match('/^ES[0-9]{22}$/', $iban) !== 1) {
            return false; // Formato no válido
        }

        $digitos = substr($iban, 4) . '1414' . substr($iban, 2, 2);
        $bigInteger = BigInteger::of($digitos); // Crear un número grande a partir de una cadena
        $R = $bigInteger->mod(BigInteger::of(97)); // Cálculo del módulo

        $controlDigitos = 98 - $R->toInt();

        if ($controlDigitos < 10) {
            $controlDigitos = '0' . $controlDigitos;
        } else {
            $controlDigitos = (string) $controlDigitos;
        }

        return substr($iban, 2, 2) === $controlDigitos;
    }*/

    public static function validaIBAN($iban)
    {
        $iban = strtoupper($iban);

        if (preg_match('/^ES[0-9]{22}$/', $iban) !== 1) {
            return false; // Formato no válido
        }

        $digitosCCC = substr($iban, 4, 20); // Extrae los 20 dígitos correspondientes al CCC
        $controlCCC = self::calcularCCC($digitosCCC); // Calcula los dígitos de control del CCC

        return substr($iban, 2, 2) === $controlCCC;
    }


/**
 * Esta función toma el CCC (Código de Cuenta Cliente), 
 * que consta de entidad, oficina y número de cuenta, y calcula los dígitos de control 
 * según las reglas específicas de España.
 */
    public static function calcularCCC($ccc){
        $entidad = substr($ccc, 0, 4);
        $cuenta = substr($ccc, 8);

        $pesos = [1, 2, 4, 8, 5, 10, 9, 7, 3, 6];

        // Calcula el primer dígito de control
    
        $suma = 0;
            
        
        for ($i = 0; $i < 4; $i++) {
            $suma += $entidad[$i] * $pesos[$i];
        }
        $d1 = 11 - ($suma % 11);
        $d1 = ($d1 === 10) ? 1 : ($d1 === 11 ? 0 : $d1);

        // Calcula el segundo dígito de control
        $suma = 0;
        for ($i = 0; $i < 10; $i++) {
            $suma += $cuenta[$i] * $pesos[$i];
        }
    
    
        $d2 = 11 - ($suma % 11);
        $d2 = ($d2 === 10) ? 1 : ($d2 === 11 ? 0 : $d2);

        return $d1 . $d2;
    }

}