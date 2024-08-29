<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\String;

use Attribute;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class NotBlank implements StringAttribute {
    #[Override]
    public function isValid(string $value): bool {
        return $value !== '';
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'min' => 1,
        ];
    }
}
