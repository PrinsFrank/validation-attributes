<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\DateTime;

use Attribute;
use DateMalformedStringException;
use DateTime;
use DateTimeImmutable;
use Override;

#[Attribute]
class Before implements DateTimeRule {
    public function __construct(
        private readonly string $modifierString,
    ) {
    }

    /** @throws DateMalformedStringException */
    #[Override]
    public function isValid(DateTime|DateTimeImmutable $value): bool {
        return (new DateTimeImmutable())->modify($this->modifierString)
            ->diff($value)->invert === 1;
    }

    /** @throws DateMalformedStringException */
    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'pattern' => '\d{4}-\d{2}-\d{2}',
            'max' => (new DateTimeImmutable())->modify($this->modifierString)->format('Y-m-d'),
        ];
    }
}
