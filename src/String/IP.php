<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\String;

use Attribute;
use Override;
use PrinsFrank\ValidationRules\DateTime\StringRule;

#[Attribute]
class IP implements StringRule {
    public function __construct(
        private readonly bool $allowPrivate = true,
        private readonly bool $allowReserved = true,
    ) {
    }

    #[Override]
    public function isValid(string $value): bool {
        $options = 0;
        if ($this->allowPrivate === false) {
            $options |= FILTER_FLAG_NO_PRIV_RANGE;
        }

        if ($this->allowReserved === false) {
            $options |= FILTER_FLAG_NO_RES_RANGE;
        }

        return filter_var($value, FILTER_VALIDATE_IP, $options);
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
