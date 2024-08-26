<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules\Rules\String;

use Attribute;
use Override;
use PrinsFrank\ValidationRules\Exception\InvalidArgumentException;

#[Attribute]
class Contain implements StringRule {
    /**
     * @param non-empty-string $endWith
     * @throws InvalidArgumentException
     */
    public function __construct(
        private readonly string $endWith,
    ) {
        if ($this->endWith === '') {
            throw new InvalidArgumentException('All strings contain an empty string');
        }
    }

    #[Override]
    public function isValid(string $value): bool {
        return str_contains($value, $this->endWith);
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'pattern' => '.*' . htmlentities($this->endWith) . '.*',
        ];
    }
}
