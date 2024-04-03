<?php

class CuentaCorriente extends Cuenta{

    public function __construct(protected string $numero,protected string $titular,protected float $saldo,protected float $cuota_mantenimiento)
    {
        parent::__construct($numero,$titular,$saldo-$cuota_mantenimiento);
    }

    public function reintegro($cantidad):void{
        if($this->saldo>=20)
            parent::reintegro($cantidad);
        else 
            echo "ERROR. No permite reintegros si el saldo es menor de 20";
    }

    public function mostrar():void {
        echo parent::mostrar()."Cuota de mantenimiento: $this->cuota_mantenimiento</br>";
    }
}

?>