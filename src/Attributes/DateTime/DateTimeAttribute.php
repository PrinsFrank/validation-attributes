<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\DateTime;

use DateTime;
use DateTimeImmutable;
use PrinsFrank\ValidationAttributes\Attribute;

interface DateTimeAttribute extends Attribute {
    public function isValid(DateTime|DateTimeImmutable $value): bool;
}
