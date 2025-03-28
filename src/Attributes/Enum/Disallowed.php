<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Enum;

use Attribute;
use BackedEnum;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class Disallowed implements EnumAttribute {
    /** @param list<BackedEnum> $disallowedValues */
    public function __construct(
        private array $disallowedValues,
    ) {
    }

    #[Override]
    public function isValid(BackedEnum $value, object $context): bool {
        return !in_array($value, $this->disallowedValues, true);
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
