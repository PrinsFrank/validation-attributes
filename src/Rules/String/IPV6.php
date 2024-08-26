<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\String;

use Attribute;
use Override;

#[Attribute]
readonly class IPV6 implements StringRule {
    public function __construct(
        private bool $allowPrivate = true,
        private bool $allowReserved = true,
    ) {
    }

    #[Override]
    public function isValid(string $value): bool {
        $options = FILTER_FLAG_IPV6;
        if ($this->allowPrivate === false) {
            $options |= FILTER_FLAG_NO_PRIV_RANGE;
        }

        if ($this->allowReserved === false) {
            $options |= FILTER_FLAG_NO_RES_RANGE;
        }

        return filter_var($value, FILTER_VALIDATE_IP, $options) !== false;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
