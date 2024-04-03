<?php

class Monedero
{

    private $dinero;
    public static $numero_monederos = 0;

    public function __construct($dinero)
    {

        $this->dinero = $dinero;
        self::$numero_monederos++;
    }

    public function __destruct()
    {
        self::$numero_monederos--;
    }

    /*public function getNMonederos(){
        return self::$numero_monederos;
    }*/

    public function meterDinero($valor)
    {

        $this->dinero += $valor;
    }

    public function sacarDinero($valor)
    {

        if ($this->dinero > 0 && $this->dinero > $valor)
            $this->dinero -= $valor;
        else
            $this->dinero = 0;
    }

    public function __toString():string
    {

        return "Dinero actual: $this->dinero";
    }
}
