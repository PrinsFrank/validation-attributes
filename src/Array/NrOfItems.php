<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Array;

use Attribute;
use Override;

#[Attribute]
class NrOfItems implements ArrayRule {
    public function __construct(
        private readonly int $largerThanOrEquals,
        private readonly int $smallerThanOrEquals
    ) {
    }

    #[Override]
    public function isValid(array $value): bool {
        $nrOfItems = count($value);

        return $nrOfItems >= $this->largerThanOrEquals
            && $nrOfItems <= $this->smallerThanOrEquals;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
