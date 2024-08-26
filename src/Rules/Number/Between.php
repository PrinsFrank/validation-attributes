<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\Number;

use Attribute;
use Override;
use PrinsFrank\ValidationRules\Exception\InvalidArgumentException;

#[Attribute]
class Between implements NumberRule {
    /** @throws InvalidArgumentException */
    public function __construct(
        private readonly float|int $largerThanOrEqual,
        private readonly float|int $lessThanOrEqual
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
