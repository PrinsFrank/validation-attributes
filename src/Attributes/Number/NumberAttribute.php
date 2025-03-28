<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Number;

use PrinsFrank\ValidationAttributes\Attribute;

/** @extends Attribute<int|float> */
interface NumberAttribute extends Attribute {
    public function isValid(int|float $value, object $context): bool;
}
