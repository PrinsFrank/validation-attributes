<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\String;

use Attribute;
use Override;
use PrinsFrank\ValidationRules\DateTime\StringRule;

#[Attribute]
class EndWith implements StringRule {
    public function __construct(
        private readonly string $endWith,
    ) {
    }

    #[Override]
    public function isValid(string $value): bool {
        return str_ends_with($value, $this->endWith);
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
