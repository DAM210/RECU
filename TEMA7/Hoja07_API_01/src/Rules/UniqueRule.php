<?php

declare(strict_types=1);

namespace App\Rules;

use App\Services\DBConnection;
use PDO;

final class UniqueRule extends AbstractRule
{
    public function __construct(private readonly string $table, private readonly string $column, private readonly ?int $id = null, string $message = '')
    {
        parent::__construct($message);
    }

    public function validate(mixed $value): bool
    {
        $query = "SELECT * FROM {$this->table} WHERE {$this->column} = :value";
        if ($this->id) {
            $query .= "AND id != {$this->id}";
        }
        $stmt = DBConnection::getInstance()->getConexion()->prepare($query);
        $stmt->bindValue(':value', $value);
        $stmt->execute();
        return $stmt->rowCount() === 0;
    }
}
