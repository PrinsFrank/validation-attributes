<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Generic;

use Attribute;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class Required implements GenericAttribute {
    #[Override]
    public function isValid(mixed $value): bool {
        return $value !== null;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'required' => true,
        ];
    }
}
