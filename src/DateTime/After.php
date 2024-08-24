<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\DateTime;

use Attribute;
use DateTime;
use DateTimeImmutable;
use Override;

#[Attribute]
class After implements DateTimeRule {
    public function __construct(
        private readonly string $modifierString,
    ) {
    }

    #[Override]
    public function isValid(DateTime|DateTimeImmutable $value): bool {
        return (new DateTimeImmutable())->modify($this->modifierString)
            ->diff($value)->invert === 0;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'pattern' => '\d{4}-\d{2}-\d{2}',
            'min' => (new DateTimeImmutable())->modify($this->modifierString)->format('Y-m-d'),
        ];
    }
}
