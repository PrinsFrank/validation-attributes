<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Number;

use Attribute;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class LessThanOrEqual implements NumberAttribute {
    public function __construct(
        private float|int $lessThanOrEqual
    ) {
    }

    #[Override]
    public function isValid(int|float $value): bool {
        return $value <= $this->lessThanOrEqual;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'max' => $this->lessThanOrEqual,
        ];
    }
}
