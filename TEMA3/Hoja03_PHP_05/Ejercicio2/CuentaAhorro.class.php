<?php

class CuentaAhorro extends Cuenta{

    public function __construct(protected string $numero,protected string $titular,protected float $saldo,protected float $comision_apertura,protected float $intereses)
    {
        parent::__construct($numero,$titular,$saldo-$comision_apertura);
    }

    public function aplicaInteres():void {

        $this->saldo+=$this->saldo*($this->intereses/100);

    }

    public function mostrar():void {
        parent::mostrar();
        echo "Comisión de apertura: $this->comision_apertura</br>Intereses: $this->intereses</br>";
    }
}

?>