<?php

trait Laboral{
    private string $codigo;
    private float $salario;

    public function setCodigo($codigo){
        $this->codigo=$codigo;
    }

    public function setSalario($salario){
        $this->salario=$salario;
    }

    public function actualizarInfoL($codigo,$salario){
        $this->setCodigo($codigo);
        $this->setSalario($salario);
    }
}

?>