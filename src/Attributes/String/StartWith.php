<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\String;

use Attribute;
use Override;
use PrinsFrank\ValidationAttributes\Exception\InvalidArgumentException;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class StartWith implements StringAttribute {
    /**
     * @param non-empty-string $startWith
     * @throws InvalidArgumentException
     */
    public function __construct(
        private string $startWith,
    ) {
        if ($this->startWith === '') {
            throw new InvalidArgumentException('All strings start with an empty string');
        }
    }

    #[Override]
    public function isValid(string $value): bool {
        return str_starts_with($value, $this->startWith);
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
