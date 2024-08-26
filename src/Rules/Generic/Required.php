<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\Generic;

use Attribute;
use Override;

#[Attribute]
class Required implements GenericRule {
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
