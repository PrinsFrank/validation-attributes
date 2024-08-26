<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\Number;

use Attribute;
use Override;

#[Attribute]
class LessThan implements NumberRule {
    public function __construct(
        private readonly float|int $lessThan
    ) {
    }

    #[Override]
    public function isValid(int|float $value): bool {
        return $value < $this->lessThan;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'max' => $this->lessThan,
        ];
    }
}
