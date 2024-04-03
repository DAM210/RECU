<?php

class Empleado{

    public function __construct(protected float $sueldo)
    {
    }

    public function getSueldo():float{
        return $this->sueldo;
    }
}

?>