<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\String;

use Attribute;
use Override;

#[Attribute]
class MACAddress implements StringRule {
    #[Override]
    public function isValid(string $value): bool {
        return filter_var($value, FILTER_VALIDATE_MAC) !== false;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
