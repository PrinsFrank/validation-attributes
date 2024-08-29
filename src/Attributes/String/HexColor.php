<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\String;

use Attribute;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class HexColor implements StringAttribute {
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
