<?php

namespace MiAplicacion\Clases;

use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

class GeneradorPassword
{
    public static function generarPassword(bool $mayuscula, bool $minuscula, bool $numero, bool $simbolo, int $longitud)
    {

        $generator = new ComputerPasswordGenerator();

        $generator
            ->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, $mayuscula)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE, $minuscula)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, $numero)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, $simbolo)
            ->setLength($longitud);


        return $generator->generatePassword();
    }
}
