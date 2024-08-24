<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Number;

use Attribute;
use Override;
use PrinsFrank\ValidationRules\DateTime\NumberRule;

#[Attribute]
class Between implements NumberRule {
    public function __construct(
        private readonly float|int $largerThanOrEqual,
        private readonly float|int $lessThanOrEqual
    ) {
    }

    #[Override]
    public function isValid(int|float $value): bool {
        return $value >= $this->largerThanOrEqual
            && $value <= $this->lessThanOrEqual;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'min' => $this->largerThanOrEqual,
            'max' => $this->lessThanOrEqual,
        ];
    }
}
