<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\Number;

use Attribute;
use Override;

#[Attribute]
class LargerThanOrEqual implements NumberRule {
    public function __construct(
        private readonly float|int $largerThanOrEqual
    ) {
    }

    #[Override]
    public function isValid(int|float $value): bool {
        return $value >= $this->largerThanOrEqual;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'min' => $this->largerThanOrEqual,
        ];
    }
}
