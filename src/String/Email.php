<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\String;

use Attribute;
use Override;
use PrinsFrank\ValidationRules\DateTime\StringRule;

#[Attribute]
class Email implements StringRule {
    #[Override]
    public function isValid(string $value): bool {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
