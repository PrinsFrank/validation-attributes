<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Enum;

use BackedEnum;
use PrinsFrank\ValidationAttributes\Attribute;

interface EnumAttribute extends Attribute {
    public function isValid(BackedEnum $value): bool;
}
