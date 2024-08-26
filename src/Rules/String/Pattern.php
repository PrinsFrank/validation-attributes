<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\String;

use Attribute;
use Override;

#[Attribute]
class Pattern implements StringRule {
    public function __construct(
        private readonly string $pattern
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
