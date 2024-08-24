<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Number;

use Attribute;
use Override;
use PrinsFrank\ValidationRules\DateTime\NumberRule;

#[Attribute]
class LessThanOrEqual implements NumberRule {
    public function __construct(
        private readonly float|int $lessThanOrEqual
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
