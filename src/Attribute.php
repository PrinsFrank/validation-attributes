<?php declare(strict_types=1);

namespace PrinsFrank\ValidationAttributes;

/** @template T of mixed */
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
