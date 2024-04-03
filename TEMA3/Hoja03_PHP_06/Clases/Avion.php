<?php

namespace HOJA6\Clases;

use HOJA6\Clases\ElementoVolador;

class Avion extends ElementoVolador
{

    public function __construct(private string $nombre, private int $numAlas, private int $numMotores, private float $altitud, private float $velocidad, private string $companiaAerea, private string $fechaAlta, private float $altitudMaxima)
    {
        parent::__construct($nombre, $numAlas, $numMotores, $altitud, $velocidad);
    }

    public function getCompania()
    {
        return $this->companiaAerea;
    }

    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    public function volar(float $altitud): void
    {
        if ($altitud >= 0 || $altitud <= $this->altitudMaxima) {
            if ($this->getVelocidad() >= 150) {
                do {
                    echo 'Aumentando la velocidad en 100';
                    $this->setAltitud(100);
                } while ($this->getAltitud() < $altitud);
                printf("Altitud: %d metros\n", $this->getAltitud());
            } else {
                printf("Velocidad insuficiente: %d km/h\n", $this->getVelocidad());
            }
        } else {
            printf("Altitud incorrecta: %d metros\n", $altitud);
        }
    }

    public function mostrarInformacion(): string
    {
        return 'Nombre: ' . $this->getNombre() . '. Nº alas: ' . $this->getNumAlas() . '. Nº motores: ' . $this->getNumMotores() . '. Altitud: ' . $this->getAltitud() . '. Velocidad: ' . $this->getVelocidad() . '. Compañia aérea: ' . $this->getCompania() . '. Fecha de alta: ' . $this->getFechaAlta() . '.</br></br>';
    }
}
