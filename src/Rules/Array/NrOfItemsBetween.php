<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\Array;

use Attribute;
use Override;
use PrinsFrank\ValidationRules\Exception\InvalidArgumentException;

#[Attribute]
class NrOfItemsBetween implements ArrayRule {
    /**
     * @param int<0, max> $largerThanOrEqual
     * @param int<0, max> $lessThanOrEqual
     * @throws InvalidArgumentException
     */
    public function __construct(
        private readonly int $largerThanOrEqual,
        private readonly int $lessThanOrEqual
    ) {
        if ($this->largerThanOrEqual < 0 || $this->lessThanOrEqual < 0) {
            throw new InvalidArgumentException('Nr of items cannot be smaller than zero');
        }

        if ($this->largerThanOrEqual > $this->lessThanOrEqual) {
            throw new InvalidArgumentException('Lower bound is higher than upper bound');
        }
    }

    #[Override]
    public function isValid(array $value): bool {
        $nrOfItems = count($value);

        return $nrOfItems >= $this->largerThanOrEqual
            && $nrOfItems <= $this->lessThanOrEqual;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
