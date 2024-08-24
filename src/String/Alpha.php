<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\String;

use Attribute;
use Override;
use PrinsFrank\ValidationRules\DateTime\StringRule;

#[Attribute]
class Alpha implements StringRule {
    #[Override]
    public function isValid(string $value): bool {
        return preg_match('/^[\p{L}\p{M}]*$/', $value);
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
