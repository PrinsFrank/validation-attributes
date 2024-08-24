<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\String;

use Attribute;
use Override;
use PrinsFrank\ValidationRules\DateTime\StringRule;

#[Attribute]
class Length implements StringRule {
    public function __construct(
        private readonly int $largerThanOrEquals,
        private readonly int $smallerThanOrEquals
    ) {
    }

    #[Override]
    public function isValid(string $value): bool {
        $nrOfCharacters = mb_strlen($value);

        return $nrOfCharacters >= $this->largerThanOrEquals
            && $nrOfCharacters <= $this->smallerThanOrEquals;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'min' => $this->largerThanOrEquals,
            'max' => $this->smallerThanOrEquals,
        ];
    }
}
