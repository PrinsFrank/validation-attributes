<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\String;

use Attribute;
use Override;

#[Attribute]
class ASCII implements StringRule {
    #[Override]
    public function isValid(string $value): bool {
        return preg_match('/[^\x00-\x7F]/', $value) === 0;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'pattern' => '[\x00-\x7F]+',
        ];
    }
}
