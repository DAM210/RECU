<?php

class Cuenta{

    public function __construct(protected string $numero,protected string $titular,protected float $saldo)
    {
    }

    public function ingreso($cantidad):void {
        $this->saldo+=$cantidad;
    }

    public function reintegro($cantidad):void {
        $this->saldo-=$cantidad;
    }

    public function esPreferencial($cantidad):bool {
        if($this->saldo>$cantidad)
            return true;
        else
            return false;
    }

    public function mostrar():void {
        echo "Número de cuenta: $this->numero</br>Titular de la cuenta: $this->titular</br>Saldo: $this->saldo</br>";
    }

}

?>
