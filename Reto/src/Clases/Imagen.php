<?php

namespace Reto\Clases;

class Imagen {
    private int $id;
    private string $nombre;
    private string $ruta;

    public function __construct(int $id, string $nombre, string $ruta) {
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
}