<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\String;

use Attribute;
use Override;

#[Attribute]
class Url implements StringRule {
    #[Override]
    public function isValid(string $value): bool {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'type' => 'url',
        ];
    }
}
