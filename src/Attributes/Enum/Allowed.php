<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Enum;

use Attribute;
use BackedEnum;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class Allowed implements EnumAttribute {
    /** @param list<BackedEnum> $allowedValues */
    public function __construct(
        private array $allowedValues,
    ) {
    }

    #[Override]
    public function isValid(BackedEnum $value, object $context): bool {
        return in_array($value, $this->allowedValues, true);
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
