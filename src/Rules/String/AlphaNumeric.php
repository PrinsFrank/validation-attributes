<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\String;

use Attribute;
use Override;

#[Attribute]
class AlphaNumeric implements StringRule {
    #[Override]
    public function isValid(string $value): bool {
        return preg_match('/^[\p{L}\p{M}\p{N}]*$/', $value) === 1;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'pattern' => '[\p{L}\p{M}\p{N}]*'
        ];
    }
}
