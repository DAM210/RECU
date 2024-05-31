<?php

declare(strict_types = 1);

namespace App\Services;

use PDO;
use PDOException;

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

final class DBConnection
{
    private static ?PDO $connection = null;

    private function __construct()
    {
    }
    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DBConnection();
        }

        return self::$instance;
    }

    public static function getConexion(): ?PDO
    {
        try {
            if (!self::$connection) {
                self::$connection = new PDO(
                    dsn: $_ENV['DB_DSN'],
                    username: $_ENV['DB_USERNAME'],
                    password: $_ENV['DB_PASSWORD'],
                );

                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            echo match ($e->getCode()) {
                1049    => 'Base de datos no encontrada',
                1045    => 'Acceso denegado',
                2002    => 'Conexión rechazada',
                default => 'Error desconocido',
            };
        }

        return self::$connection;
    }

    public function query($sql, $params = [])
    {
        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute($params);

            return $statement;
        } catch (\PDOException $e) {
            // Manejar errores de la base de datos
            // Por ejemplo, podrías loggearlos o retornar un mensaje de error genérico
            error_log('Error en la consulta: ' . $e->getMessage());

            return false;
        }
    }

    private function __clone()
    {
    }
}
