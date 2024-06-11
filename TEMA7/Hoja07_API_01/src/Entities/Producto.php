<?php

declare(strict_types = 1);

namespace APP\Entities;

use App\Services\DBConnection;
use PDO;

final class Producto
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->getConexion();
        $this->createTable();
    }

    private function createTable(): void
    {
        $sql = 'CREATE TABLE IF NOT EXISTS productos (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(50) NOT NULL,
                descripcion VARCHAR(255) NOT NULL,
                precio DECIMAL(10, 2) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )';
        $this->db->exec(statement: $sql);
    }

    /**
     * @param array<string, mixed> $data
     * @return false|string
     */
    public function create(array $data): false|string
    {
        $sql = 'INSERT INTO productos (nombre, descripcion, precio) VALUES (:nombre, :descripcion, :precio)';
        $stmt = $this->db->prepare(query: $sql);
        $stmt->execute(params: $data);

        return $this->db->lastInsertId();
    }

    // Métodos CRUD

    public function get(): array
    {
        $stmt = $this->db->query('SELECT * FROM productos');

        return $stmt->fetchAll(mode:PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM productos WHERE id = :id');
        $stmt->execute(params:['id' => $id]);
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        return $producto ?: null;
    }

    public function update(int $id, array $data): bool
    {
        $sql = 'UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio WHERE id = :id';
        $stmt = $this->db->prepare($sql);

    return $stmt->execute(array_merge($data, ['id' => $id]));
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM productos WHERE id = :id');

        return $stmt->execute(['id' => $id]);
    }
}
