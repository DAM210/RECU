<?php
namespace Reto\Clases;

use PDO;
use PDOException;

// Carga de .ENV con la librería 'vlucas/phpdotenv'
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

/**
 * Clase para gestionar la conexión a la base de datos.
 */
final class BaseDatos {
    /**
     * @var PDO|null Instancia única de la conexión a la base de datos.
     */
    private static ?PDO $conexion = null;

    /**
     * Constructor privado para evitar instanciación directa.
     */
    final private function __construct() {}

    /**
     * Obtiene la instancia única de la conexión a la base de datos.
     * 
     * @return PDO|null Instancia de PDO o null si hay un error en la conexión.
     */
    final public static function getConexion() : ?PDO {
        try {
            // Si no existe una conexión, se crea una nueva.
            if (!self::$conexion) {
                self::$conexion = new PDO(
                    dsn: $_ENV['DB_DSN'],
                    username: $_ENV['DB_USERNAME'],
                    password: $_ENV['DB_PASSWORD']
                );

                // Establecer atributos ERRMODE
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            echo '<p>' . $e->getMessage() . '</p>';
        }

        return self::$conexion;
    }

    /**
     * Método privado para evitar la clonación de la instancia.
     */
    private function __clone() {}
}
?>