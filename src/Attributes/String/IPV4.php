<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\String;

use Attribute;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class IPV4 implements StringAttribute {
    public function __construct(
        private bool $allowPrivate = true,
        private bool $allowReserved = true,
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

        return filter_var($value, FILTER_VALIDATE_IP, $options) !== false;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
