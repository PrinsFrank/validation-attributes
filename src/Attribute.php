<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes;

/** @method isValid() with param of concrete type defined in extending interfaces */
interface Attribute {
    /**
     * @return array{
     *     pattern?: string,
     *     required?: bool,
     *     type?: 'email'|'color'|'url'
     * }
     */
    public function getHTMLAttributes(): array;
}
