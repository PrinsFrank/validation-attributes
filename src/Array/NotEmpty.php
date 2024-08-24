<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Array;

use Attribute;
use Override;

#[Attribute]
class NotEmpty implements ArrayRule {
    #[Override]
    public function isValid(array $value): bool {
        return $value !== [];
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
