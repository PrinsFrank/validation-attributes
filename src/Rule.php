<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules;

/** @method isValid() with param of concrete type defined in extending interfaces */
interface Rule {
    /**
     * @return array{
     *     pattern?: string,
     *     required?: bool,
     *     type?: 'email'|'color'|'url'
     * }
     */
    public function getHTMLAttributes(): array;
}
