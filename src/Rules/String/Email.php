<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\String;

use Attribute;
use Override;

#[Attribute]
readonly class Email implements StringRule {
    #[Override]
    public function isValid(string $value): bool {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'type' => 'email',
        ];
    }
}
