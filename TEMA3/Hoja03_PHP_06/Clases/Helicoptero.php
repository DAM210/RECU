<?php

namespace HOJA6\Clases;

use HOJA6\Clases\ElementoVolador;

class Helicoptero extends ElementoVolador
{

    public function __construct(private string $nombre, private int $numAlas, private int $numMotores, private float $altitud, private float $velocidad, private string $propietario, private int $nRotores)
    {
        parent::__construct($nombre, $numAlas, $numMotores, $altitud, $velocidad);
    }

    public function getPropietario()
    {
        return $this->propietario;
    }

    public function getNRotores()
    {
        return $this->nRotores;
    }

    public function volar(float $altitud): void
    {
        $altitudMaxima = 100 * $this->nRotores;
        if ($altitud <= 0 || $altitud > $altitudMaxima) {
            echo "Altitud incorrecta: $altitud metros. La altitud debe estar entre 0 y $altitudMaxima metros.";
            return;
        }

        while ($this->getAltitud() < $altitud) {
            echo 'Aumentando la altitud en 20 metros';
            $this->setAltitud($this->getAltitud() + 20);
        }

        echo "El helicóptero ha alcanzado la altitud deseada de $altitud metros.";
    }

    public function mostrarInformacion(): string
    {
        return 'Nombre: ' . $this->getNombre() . '. Nº alas: ' . $this->getNumAlas() . '. Nº motores: ' . $this->getNumMotores() . '. Altitud: ' . $this->getAltitud() . '. Velocidad: ' . $this->getVelocidad() . '. Propietario: ' . $this->getPropietario() . '. Nº de rotores: ' . $this->getNRotores() . '.</br></br>';
    }
}
