<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Generic;

use PrinsFrank\ValidationAttributes\Attribute;

/** @extends Attribute<mixed> */
interface GenericAttribute extends Attribute {
    public function isValid(mixed $value, object $context): bool;
}
