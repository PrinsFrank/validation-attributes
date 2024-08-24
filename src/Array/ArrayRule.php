<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Array;

use PrinsFrank\ValidationRules\Rule;

interface ArrayRule extends Rule {
    /** @param array<mixed> $value */
    public function isValid(array $value): bool;
}
