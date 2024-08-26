<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\String;

use Attribute;
use Override;

#[Attribute]
readonly class NotBlank implements StringRule {
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
