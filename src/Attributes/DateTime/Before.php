<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\DateTime;

use Attribute;
use DateTime;
use DateTimeImmutable;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class Before implements DateTimeAttribute {
    public function __construct(
        private DateTimeImmutable $before,
    ) {
    }

    #[Override]
    public function isValid(DateTime|DateTimeImmutable $value): bool {
        return $this->before->diff($value)->invert === 1;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'pattern' => '\d{4}-\d{2}-\d{2}',
            'max' => $this->before->format('Y-m-d'),
        ];
    }
}
