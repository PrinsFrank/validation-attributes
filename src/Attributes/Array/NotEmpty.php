<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Array;

use Attribute;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class NotEmpty implements ArrayAttribute {
    #[Override]
    public function isValid(array $value): bool {
        return $value !== [];
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
