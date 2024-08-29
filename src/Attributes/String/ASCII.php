<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\String;

use Attribute;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class ASCII implements StringAttribute {
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
