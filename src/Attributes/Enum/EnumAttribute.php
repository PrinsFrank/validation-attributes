<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Enum;

use BackedEnum;
use PrinsFrank\ValidationAttributes\Attribute;

/** @extends Attribute<BackedEnum> */
interface EnumAttribute extends Attribute {
    public function isValid(BackedEnum $value, object $context): bool;
}
