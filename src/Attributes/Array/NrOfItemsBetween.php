<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Array;

use Attribute;
use Override;
use PrinsFrank\ValidationAttributes\Exception\InvalidArgumentException;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class NrOfItemsBetween implements ArrayAttribute {
    /**
     * @param int<0, max> $largerThanOrEqual
     * @param int<0, max> $lessThanOrEqual
     * @throws InvalidArgumentException
     */
    public function __construct(
        private int $largerThanOrEqual,
        private int $lessThanOrEqual
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
