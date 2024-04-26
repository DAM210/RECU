<?php
namespace Reto\Clases;

class Usuario {
    private $usuario;
    private $password;

    public function __construct($usuario, $password) {
        $this->usuario = $usuario;
        $this->password = $password;
    }

    // Métodos get
    public function getUsuario() {
        return $this->usuario;
    }

    public function getPassword() {
        return $this->password;
    }
}
?>
