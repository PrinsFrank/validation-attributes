<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\String;

use Attribute;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class AlphaNumeric implements StringAttribute {
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
