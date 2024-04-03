<?php
namespace MiAplicacion\Clases;

use MiAplicacion\Interfaces\InterfazGeneradorPassword;
use MiAplicacion\Clases\GeneradorPassword;

class AdaptadorGeneradorPassword implements InterfazGeneradorPassword{

    public function generar(bool $mayuscula, bool $minuscula,bool $numero,bool $simbolo,int $longitud):string{
        return GeneradorPassword::generarPassword($mayuscula,$minuscula,$numero,$simbolo,$longitud);
         
    }

}
?>