<?php

declare(strict_types=1);

namespace App\Rules;

final class MinRule extends AbstractRule
{
    private int $min;

    public function __construct(int $min, string $message = '')
    {
        parent::__construct($message);
        $this->min = $min;
    }

    public function validate(mixed $value): bool
    {
        if (!is_string($value) && !is_numeric($value)) {
            return false;
        }

        return mb_strlen((string) $value) >= $this->min;
    }
}
