<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\String;

use Attribute;
use Override;
use PrinsFrank\ValidationRules\DateTime\StringRule;

#[Attribute]
class IPV4 implements StringRule {
    public function __construct(
        private readonly bool $allowPrivate = true,
        private readonly bool $allowReserved = true,
    ) {
    }

    #[Override]
    public function isValid(string $value): bool {
        $options = FILTER_FLAG_IPV4;
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
