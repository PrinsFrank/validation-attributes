<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\DateTime;

use Attribute;
use DateTime;
use DateTimeImmutable;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class BeforeOrEqual implements DateTimeAttribute {
    public function __construct(
        private DateTimeImmutable $beforeOrEqual,
    ) {
    }

    #[Override]
    public function isValid(DateTime|DateTimeImmutable $value): bool {
        $diff = $this->beforeOrEqual->diff($value);

        return $diff->invert === 1
            || ($diff->y === 0 && $diff->m === 0 && $diff->d === 0 && $diff->h === 0 && $diff->i === 0 && $diff->s === 0 && $diff->f === 0.0);
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'pattern' => '\d{4}-\d{2}-\d{2}',
            'max' => $this->beforeOrEqual->format('Y-m-d'),
        ];
    }
}
