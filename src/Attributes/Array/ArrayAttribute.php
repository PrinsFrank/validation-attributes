<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Array;

use PrinsFrank\ValidationAttributes\Attribute;

interface ArrayAttribute extends Attribute {
    /** @param array<mixed> $value */
    public function isValid(array $value): bool;
}
