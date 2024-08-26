<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\Number;

use Attribute;
use Override;

#[Attribute]
class LargerThan implements NumberRule {
    public function __construct(
        private readonly float|int $largerThan
    ) {
    }

    #[Override]
    public function isValid(int|float $value): bool {
        return $value > $this->largerThan;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'min' => $this->largerThan,
        ];
    }
}
