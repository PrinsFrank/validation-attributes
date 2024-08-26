<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\DateTime;

use Attribute;
use DateMalformedStringException;
use DateTime;
use DateTimeImmutable;
use Override;

#[Attribute]
readonly class AfterOrEqual implements DateTimeRule {
    public function __construct(
        private string $modifierString,
    ) {
    }

    /** @throws DateMalformedStringException */
    #[Override]
    public function isValid(DateTime|DateTimeImmutable $value): bool {
        $diff = (new DateTimeImmutable())->modify($this->modifierString)->diff($value);
        return $diff->invert === 0
            || ($diff->y === 0 && $diff->m === 0 && $diff->d === 0 && $diff->h === 0 && $diff->i === 0 && $diff->s === 0 && $diff->f === 0.0);
    }

    /** @throws DateMalformedStringException */
    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'pattern' => '\d{4}-\d{2}-\d{2}',
            'min' => (new DateTimeImmutable())->modify($this->modifierString)->format('Y-m-d'),
        ];
    }
}
