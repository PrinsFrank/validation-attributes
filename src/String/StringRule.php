<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\DateTime;

use PrinsFrank\ValidationRules\Rule;

interface StringRule extends Rule {
    public function isValid(string $value): bool;
}
