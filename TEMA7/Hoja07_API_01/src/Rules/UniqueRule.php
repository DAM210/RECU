<?php

declare(strict_types=1);

namespace App\Rules;

use App\Services\DBConnection;
use PDO;

final class UniqueRule extends AbstractRule
{
    private string $table;
    private string $column;
    private ?PDO $db;

    public function __construct(string $table, string $column, string $message = '')
    {
        parent::__construct($message);
        $this->table = $table;
        $this->column = $column;
        $this->db = DBConnection::getInstance()->getConexion();
    }

    public function validate(mixed $value): bool
    {
        $sql = "SELECT COUNT(*) FROM {$this->table} WHERE {$this->column} = :value";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['value' => $value]);
        $count = $stmt->fetchColumn();

        return $count === '0';
    }
}

