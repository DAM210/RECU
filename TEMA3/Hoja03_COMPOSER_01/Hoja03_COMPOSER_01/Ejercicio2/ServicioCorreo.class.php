<?php
class ServicioCorreo {
    public function __construct(private readonly InterfazProveedorCorreo $proveedorCorreo) {
    }

    public function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje)/* :bool */ {
        // Llama al método enviarCorreo del proveedor de correo
        return $this->proveedorCorreo->enviarCorreo($paraQuien, $asunto, $cuerpoMensaje);
    }
}
?>