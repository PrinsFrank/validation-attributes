<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\String;

use Attribute;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class Pattern implements StringAttribute {
    public function __construct(
        private string $pattern
    ) {
    }

    #[Override]
    public function isValid(string $value): bool {
        return preg_match($this->pattern, $value) === 1;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'pattern' => $this->pattern,
        ];
    }
}
