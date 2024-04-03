<?php
namespace MiAplicacion\Interfaces;

interface InterfazGeneradorPassword{
    public function generar(bool $mayuscula, bool $minuscula,bool $numero,bool $simbolo,int $longitud):string;
}
?>