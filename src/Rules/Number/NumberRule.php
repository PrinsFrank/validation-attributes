<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\Number;

use PrinsFrank\ValidationRules\Rule;

interface NumberRule extends Rule {
    public function isValid(int|float $value): bool;
}
