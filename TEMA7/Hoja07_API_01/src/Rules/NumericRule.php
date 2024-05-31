<?php

declare(strict_types=1);

namespace App\Rules;

final class NumericRule extends AbstractRule
{
    public function validate(mixed $value): bool
    {
        return is_numeric($value);
    }
}