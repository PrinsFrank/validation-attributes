<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\String;

use Attribute;
use Override;
use PrinsFrank\ValidationAttributes\Exception\InvalidArgumentException;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class EndWith implements StringAttribute {
    /**
     * @param non-empty-string $endWith
     * @throws InvalidArgumentException
     */
    public function __construct(
        private string $endWith,
    ) {
        if ($this->endWith === '') {
            throw new InvalidArgumentException('All strings end with an empty string');
        }
    }

    #[Override]
    public function isValid(string $value): bool {
        return str_ends_with($value, $this->endWith);
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [];
    }
}
