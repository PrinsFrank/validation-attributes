<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Number;

use Attribute;
use Override;
use PrinsFrank\ValidationAttributes\Exception\InvalidArgumentException;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class Between implements NumberAttribute {
    /** @throws InvalidArgumentException */
    public function __construct(
        private float|int $largerThanOrEqual,
        private float|int $lessThanOrEqual
    ) {
        if ($this->largerThanOrEqual > $this->lessThanOrEqual) {
            throw new InvalidArgumentException('Lower bound is higher than upper bound');
        }
    }

    #[Override]
    public function isValid(int|float $value): bool {
        return $value >= $this->largerThanOrEqual
            && $value <= $this->lessThanOrEqual;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'min' => $this->largerThanOrEqual,
            'max' => $this->lessThanOrEqual,
        ];
    }
}
