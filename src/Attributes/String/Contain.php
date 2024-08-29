<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\String;

use Attribute;
use Override;
use PrinsFrank\ValidationAttributes\Exception\InvalidArgumentException;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class Contain implements StringAttribute {
    /**
     * @param non-empty-string $endWith
     * @throws InvalidArgumentException
     */
    public function __construct(
        private string $endWith,
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
