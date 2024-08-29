<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\String;

use Attribute;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class MACAddress implements StringAttribute {
    #[Override]
    public function isValid(string $value): bool {
        return filter_var($value, FILTER_VALIDATE_MAC) !== false;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
