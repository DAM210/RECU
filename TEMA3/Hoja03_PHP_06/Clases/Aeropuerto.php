<?php

namespace HOJA6\Clases;

use HOJA6\Clases\ElementoVolador;
use HOJA6\Clases\Avion;

class Aeropuerto
{
    private array $eVoladores;

    public function __construct()
    {
        $this->eVoladores=[];
    }

    public function insertar(ElementoVolador $eVolador): void
    {
        $this->eVoladores[] = $eVolador;
    }

    public function buscar($nombre): void
    {
        $encontrado = false;
        foreach ($this->eVoladores as $eVolador) {
            if ($eVolador->getNombre() == $nombre) {
                echo 'Localizado: ' . $eVolador->mostrarInformacion();
                $encontrado = true;
            }
        }
        if (!$encontrado) {
            echo 'No se ha localizado';
        }
    }

    public function listarCompania($compania): void
    {

        $avionesCompania = [];
        //recorremos el array, si el elemento es un avion y coincide el nombre de la compañia, se añade el elemento al nuevo array de aviones de la compañia
        foreach ($this->eVoladores as $elemento) {
            if ($elemento instanceof Avion && $elemento->getCompania() === $compania) {
                $avionesCompania[] = $elemento;
            }
        }
        //si el array de aviones no esta vacio se recorre y muestra los datos de cada avion
        if (!empty($avionesCompania)) {
            echo "Aviones de la compañía $compania:\n";
            foreach ($avionesCompania as $avion) {
                echo $avion->mostrarInformacion();
            }
        } else {
            echo "No se encontraron aviones de la compañía $compania.";
        }
    }

    public function rotores($nRotores): void
    {
        $helicopterosConRotores = [];
        //recorremos el array, si el elemento es un helicoptero y coincide el nº de rotores, se añade el elemento al nuevo array de helicopteros
        foreach ($this->eVoladores as $elemento) {
            if ($elemento instanceof Helicoptero && $elemento->getNRotores() === $nRotores) {
                $helicopterosConRotores[] = $elemento;
            }
        }
        //si el array de helicopteros no esta vacio se recorre y muestra los datos de cada helicoptero
        if (!empty($helicopterosConRotores)) {
            echo "Helicópteros con $nRotores rotores:\n";
            foreach ($helicopterosConRotores as $helicoptero) {
                echo $helicoptero->mostrarInformacion();
            }
        } else {
            echo "No se encontraron helicópteros con $nRotores rotores.";
        }
    }

    public function despegar($nombreElemento, $altitud, $velocidad): ?ElementoVolador
    {
        //recorre el array y por cada elemento compara el nombre del elemento con el pasado por parametro. Se modifica la velocidad y despega con la altitud pasada por parametro
        foreach ($this->eVoladores as $elemento) {
            if ($elemento->getNombre() === $nombreElemento) {
                $elemento->setVelocidad($velocidad);
                $elemento->volar($altitud);
                return $elemento;
            }
        }
        return null;
    }
}
