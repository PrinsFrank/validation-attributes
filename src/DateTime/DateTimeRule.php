<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\DateTime;

use DateTime;
use DateTimeImmutable;
use PrinsFrank\ValidationRules\Rule;

interface DateTimeRule extends Rule {
    public function isValid(DateTime|DateTimeImmutable $value): bool;
}
