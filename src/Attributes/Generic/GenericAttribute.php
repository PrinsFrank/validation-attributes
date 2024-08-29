<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Generic;

use PrinsFrank\ValidationAttributes\Attribute;

interface GenericAttribute extends Attribute {
    public function isValid(mixed $value): bool;
}
