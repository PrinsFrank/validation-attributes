<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\DateTime;

use Attribute;
use DateTime;
use DateTimeImmutable;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class After implements DateTimeAttribute {
    public function __construct(
        private DateTimeImmutable $after,
    ) {
    }

    #[Override]
    public function isValid(DateTime|DateTimeImmutable $value): bool {
        return $this->after->diff($value)->invert === 0;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'pattern' => '\d{4}-\d{2}-\d{2}',
            'min' => $this->after->format('Y-m-d'),
        ];
    }
}
