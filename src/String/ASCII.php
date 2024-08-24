<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\String;

use Attribute;
use Override;
use PrinsFrank\ValidationRules\DateTime\StringRule;

#[Attribute]
class ASCII implements StringRule {
    #[Override]
    public function isValid(string $value): bool {
        //
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
