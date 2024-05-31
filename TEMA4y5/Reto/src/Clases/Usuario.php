<?php
namespace Reto\Clases;

class Usuario {
    private string $usuario;
    private string $password;

    public function __construct(string $usuario, string $password) {
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
