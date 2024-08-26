<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\String;

use Attribute;
use Override;
use PrinsFrank\ValidationRules\Exception\InvalidArgumentException;

#[Attribute]
readonly class Length implements StringRule {
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
            throw new InvalidArgumentException('Length of a string cannot be smaller than zero');
        }

        if ($this->largerThanOrEqual > $this->lessThanOrEqual) {
            throw new InvalidArgumentException('Lower bound is higher than upper bound');
        }
    }

    #[Override]
    public function isValid(string $value): bool {
        $nrOfCharacters = mb_strlen($value);

        return $nrOfCharacters >= $this->largerThanOrEqual
            && $nrOfCharacters <= $this->lessThanOrEqual;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'min' => $this->largerThanOrEqual,
            'max' => $this->lessThanOrEqual,
        ];
    }
}
