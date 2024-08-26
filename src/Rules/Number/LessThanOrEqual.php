<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\Number;

use Attribute;
use Override;

#[Attribute]
readonly class LessThanOrEqual implements NumberRule {
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
