<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\String;

use Attribute;
use Override;

#[Attribute]
class HexColor implements StringRule {
    #[Override]
    public function isValid(string $value): bool {
        return preg_match('/^[0-9a-fA-F]{3,8}$/', $value) === 1;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'type' => 'color',
            'pattern' => '[0-9a-fA-F]{3,8}',
        ];
    }
}
