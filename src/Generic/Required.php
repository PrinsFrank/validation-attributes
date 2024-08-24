<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules;

use Attribute;
use Override;
use PrinsFrank\ValidationRules\Generic\GenericRule;

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
