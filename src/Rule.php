<?php declare(strict_types=1);

namespace PrinsFrank\ValidationRules;

interface Rule {
    /** @return array<string, string|bool|int|float> */
    public function getHTMLAttributes(): array;
}
