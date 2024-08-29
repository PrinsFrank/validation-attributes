<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Number;

use Attribute;
use Override;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class LargerThanOrEqual implements NumberAttribute {
    public function __construct(
        private float|int $largerThanOrEqual
    ) {
    }

    #[Override]
    public function isValid(int|float $value): bool {
        return $value >= $this->largerThanOrEqual;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'min' => $this->largerThanOrEqual,
        ];
    }
}
