<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\DateTime;

use PrinsFrank\ValidationRules\Rule;

interface NumberRule extends Rule {
    public function isValid(int|float $value): bool;
}
