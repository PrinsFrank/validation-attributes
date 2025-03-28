<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes\Attributes\Generic;

use Attribute;
use Override;
use PrinsFrank\ValidationAttributes\Exception\InvalidContextException;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class RequiredIf implements GenericAttribute {
    public function __construct(
        private string $otherProperty,
        private mixed  $otherPropertyValue,
    ) {
    }

    /** @throws InvalidContextException */
    #[Override]
    public function isValid(mixed $value, object $context): bool {
        if (!property_exists($context, $this->otherProperty)) {
            throw new InvalidContextException(sprintf('Property %s does not exist on context', $this->otherProperty));
        }

        /** @phpstan-ignore property.dynamicName */
        if ($context->{$this->otherProperty} !== $this->otherPropertyValue) {
            return true;
        }

        return $value !== null;
    }

    #[Override]
    public function getHTMLAttributes(): array {
        return [
            'required' => true,
        ];
    }
}
