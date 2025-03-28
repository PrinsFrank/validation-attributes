<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\DateTime;

use DateTime;
use DateTimeImmutable;
use PrinsFrank\ValidationAttributes\Attribute;

/** @extends Attribute<DateTime|DateTimeImmutable> */
interface DateTimeAttribute extends Attribute {
    public function isValid(DateTime|DateTimeImmutable $value, object $context): bool;
}
