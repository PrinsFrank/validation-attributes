<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\String;

use PrinsFrank\ValidationAttributes\Attribute;

interface StringAttribute extends Attribute {
    public function isValid(string $value): bool;
}
