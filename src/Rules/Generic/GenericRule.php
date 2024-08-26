<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\Generic;

use PrinsFrank\ValidationRules\Rule;

interface GenericRule extends Rule {
    public function isValid(mixed $value): bool;
}
