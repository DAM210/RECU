<?php

declare(strict_types=1);

namespace App\Rules;

final class MaxRule extends AbstractRule
{
    private int $max;

    public function __construct(int $max, string $message = '')
    {
        parent::__construct($message);
        $this->max = $max;
    }

    public function validate(mixed $value): bool
    {
        if (!is_string($value) && !is_numeric($value)) {
            return false;
        }

        return mb_strlen((string) $value) <= $this->max;
    }
}
