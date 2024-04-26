<?php

namespace Reto\Clases;

class Imagen {
    private $id;
    private $nombre;
    private $ruta;

    public function __construct($id, $nombre, $ruta) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->ruta = $ruta;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getRuta() {
        return $this->ruta;
    }

    // Métodos adicionales para acceder y manipular atributos
}